@extends('layouts.rgr-premium')

@section('title', 'Race Schedule 2026 — Rey Gilang Racing')
@section('meta_description', 'Full 2026 Formula 1 race calendar for Rey Gilang Racing. Track upcoming Grand Prix events including Monaco, Silverstone, and Suzuka.')

@push('styles')
<style>
    .schedule-hero {
        padding-top: 120px;
        padding-bottom: 60px;
        position: relative;
        overflow: hidden;
    }
    .schedule-hero-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(0,212,255,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0,212,255,0.03) 1px, transparent 1px);
        background-size: 60px 60px;
    }

    /* ── Race Card ──────────────────────────────────────────────── */
    .race-card {
        position: relative;
        background: linear-gradient(135deg, rgba(22,22,27,0.9), rgba(15,15,18,0.95));
        border: 1px solid rgba(0,212,255,0.1);
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        overflow: hidden;
    }
    .race-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 3px;
        height: 0;
        background: #00D4FF;
        box-shadow: 0 0 10px #00D4FF;
        transition: height 0.4s ease;
    }
    .race-card:hover {
        border-color: rgba(0,212,255,0.3);
        box-shadow: 0 20px 60px rgba(0,0,0,0.6), 0 0 30px rgba(0,212,255,0.12);
        transform: translateX(6px);
    }
    .race-card:hover::before { height: 100%; }

    /* Next race card — highlighted */
    .race-card.next-race {
        border-color: rgba(0,212,255,0.3);
        box-shadow: 0 0 30px rgba(0,212,255,0.1);
    }
    .race-card.next-race::before { height: 100%; }

    /* Finished card */
    .race-card.finished {
        opacity: 0.55;
    }
    .race-card.finished:hover { opacity: 0.8; }

    .round-num {
        font-family: 'Orbitron', sans-serif;
        font-size: 0.7rem;
        font-weight: 700;
        color: #3A3A50;
        min-width: 2.5rem;
        text-align: center;
    }
    .race-name {
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        color: #E8F4F8;
        font-size: 1rem;
    }
    .circuit-name {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.75rem;
        font-weight: 500;
        color: #6B7A8D;
        letter-spacing: 0.05em;
    }
    .race-date-text {
        font-family: 'Orbitron', sans-serif;
        font-size: 0.78rem;
        font-weight: 700;
        color: #B0C8D4;
    }

    .status-pill-up {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        padding: 0.25rem 0.75rem;
        color: #00D4FF;
        border: 1px solid rgba(0,212,255,0.35);
        background: rgba(0,212,255,0.08);
        display: inline-block;
    }
    .status-pill-done {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        padding: 0.25rem 0.75rem;
        color: #6B7A8D;
        border: 1px solid rgba(107,122,141,0.3);
        display: inline-block;
    }
    .next-pill {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.6rem;
        font-weight: 700;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        padding: 0.2rem 0.6rem;
        color: #0F0F12;
        background: #00D4FF;
        display: inline-block;
        animation: pulsePill 2s ease-in-out infinite;
    }
    @keyframes pulsePill {
        0%, 100% { box-shadow: 0 0 8px rgba(0,212,255,0.4); }
        50%       { box-shadow: 0 0 20px rgba(0,212,255,0.8); }
    }

    /* Countdown mini */
    .mini-countdown {
        font-family: 'Orbitron', sans-serif;
        font-weight: 700;
        font-size: 0.75rem;
        color: #00D4FF;
        letter-spacing: 0.05em;
    }
</style>
@endpush

@section('content')

{{-- Hero --}}
<section class="schedule-hero" id="schedule-hero" aria-label="Schedule Hero">
    <div class="schedule-hero-grid"></div>
    <div class="absolute left-0 top-0 bottom-0 w-[3px] hidden lg:block"
         style="background: linear-gradient(180deg, transparent, #00D4FF 40%, #00D4FF 60%, transparent);">
    </div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <p class="section-label mb-4 flex items-center gap-3">
            <span class="w-6 h-px bg-rgr-cyan"></span>
            FIA Formula 1 World Championship
        </p>
        <h1 class="section-title text-5xl lg:text-7xl mb-4">2026 Calendar</h1>
        <p class="text-ice-2 text-lg">
            {{ ($upcoming->count() ?? 0) }} races remaining · {{ ($finished->count() ?? 0) }} completed
        </p>
    </div>
</section>

{{-- Schedule Content --}}
<section class="pb-24" id="schedule-list" aria-label="Race Calendar">
    <div class="max-w-5xl mx-auto px-6">

        {{-- ── Upcoming Races ──────────────────────────────────────── --}}
        @if($upcoming->count() > 0)
        <div class="mb-16">
            <div class="flex items-center gap-4 mb-8" data-reveal>
                <p class="section-label">Upcoming Races</p>
                <div class="flex-1 h-px bg-rgr-cyan/10"></div>
                <span class="text-muted text-xs font-racing tracking-widest uppercase">
                    {{ $upcoming->count() }} events
                </span>
            </div>

            <div class="flex flex-col gap-3">
                @foreach($upcoming as $race)
                @php $isNext = $nextRace && $nextRace->id === $race->id; @endphp
                <div class="race-card {{ $isNext ? 'next-race' : '' }} p-5 pl-7"
                     data-reveal
                     id="race-{{ $race->id }}"
                     style="transition-delay: {{ $loop->index * 60 }}ms;">

                    {{-- Next Race Badge --}}
                    @if($isNext)
                    <div class="flex items-center gap-2 mb-3">
                        <span class="next-pill">Next Race</span>
                        <span class="text-rgr-cyan/60 text-xs" id="mini-cd-{{ $race->id }}">calculating...</span>
                    </div>
                    @endif

                    <div class="flex items-center gap-4">
                        {{-- Round --}}
                        <span class="round-num text-rgr-cyan/40">R{{ $race->round_number ?? '—' }}</span>

                        {{-- Divider --}}
                        <div class="w-px self-stretch bg-rgr-cyan/10"></div>

                        {{-- Name & Circuit --}}
                        <div class="flex-1 min-w-0">
                            <p class="race-name">{{ $race->grand_prix_name }}</p>
                            <p class="circuit-name mt-0.5">{{ $race->circuit_name }} · {{ $race->country }}</p>
                        </div>

                        {{-- Date --}}
                        <div class="hidden sm:block text-right">
                            <p class="race-date-text">{{ $race->race_date->format('d M') }}</p>
                            <p class="text-muted text-xs font-racing">{{ $race->race_date->format('Y') }}</p>
                        </div>

                        {{-- Status --}}
                        <span class="{{ $isNext ? 'next-pill' : 'status-pill-up' }} ml-2 hidden sm:inline-block">
                            {{ $isNext ? 'Next' : 'Upcoming' }}
                        </span>
                    </div>

                    {{-- Session Times (expanded for next race) --}}
                    @if($isNext)
                    <div class="mt-4 pt-4 border-t border-rgr-cyan/08 grid grid-cols-3 gap-4">
                        @if($race->practice1_date)
                        <div>
                            <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">Practice 1</p>
                            <p class="text-ice text-sm font-medium">{{ $race->practice1_date->format('d M · H:i') }}</p>
                        </div>
                        @endif
                        @if($race->qualifying_date)
                        <div>
                            <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">Qualifying</p>
                            <p class="text-ice text-sm font-medium">{{ $race->qualifying_date->format('d M · H:i') }}</p>
                        </div>
                        @endif
                        <div>
                            <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">Race</p>
                            <p class="text-rgr-cyan text-sm font-bold">{{ $race->race_date->format('d M · H:i') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- ── Completed Races ─────────────────────────────────────── --}}
        @if($finished->count() > 0)
        <div>
            <div class="flex items-center gap-4 mb-8" data-reveal>
                <p class="section-label text-muted">Completed</p>
                <div class="flex-1 h-px bg-steel/30"></div>
                <span class="text-muted text-xs font-racing tracking-widest uppercase">{{ $finished->count() }} events</span>
            </div>

            <div class="flex flex-col gap-2">
                @foreach($finished as $race)
                <div class="race-card finished p-4 pl-7"
                     data-reveal
                     id="race-done-{{ $race->id }}"
                     style="transition-delay: {{ $loop->index * 50 }}ms;">
                    <div class="flex items-center gap-4">
                        <span class="round-num">R{{ $race->round_number ?? '—' }}</span>
                        <div class="w-px self-stretch bg-steel/30"></div>
                        <div class="flex-1 min-w-0">
                            <p class="race-name text-ice-2 line-through decoration-muted text-sm">{{ $race->grand_prix_name }}</p>
                            <p class="circuit-name">{{ $race->circuit_name }}</p>
                        </div>
                        <p class="text-muted text-xs font-racing hidden sm:block">{{ $race->race_date->format('d M Y') }}</p>
                        <span class="status-pill-done">Finished</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

@endsection

@push('scripts')
<script>
    // Mini countdown for "Next Race" card
    (function() {
        @if($nextRace && $nextRace->is_upcoming)
        const raceTimestamp = {{ $nextRace->race_date->timestamp * 1000 }};
        const el = document.getElementById('mini-cd-{{ $nextRace->id }}');
        if (!el) return;

        function pad(n) { return String(n).padStart(2,'0'); }
        function tickMini() {
            const diff = Math.max(0, Math.floor((raceTimestamp - Date.now()) / 1000));
            const d = Math.floor(diff / 86400);
            const h = Math.floor((diff % 86400) / 3600);
            const m = Math.floor((diff % 3600) / 60);
            const s = diff % 60;
            el.textContent = d + 'd ' + pad(h) + 'h ' + pad(m) + 'm ' + pad(s) + 's';
            if (diff > 0) setTimeout(tickMini, 1000);
        }
        tickMini();
        @endif
    })();
</script>
@endpush
