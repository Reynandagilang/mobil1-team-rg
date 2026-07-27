@extends('layouts.rgr-premium')

@section('title', 'Seri Balap Ketahanan — Mobil 1 Team RG')
@section('meta_description', 'Program Balap Ketahanan Mobil 1 Team RG — Le Mans 24 Jam, Nürburgring 24 Jam, dan IMSA 6 Jam The Glen. Tiga balapan legendaris, empat kelas, satu tim.')

@push('styles')
<style>
.endo-hero {
    position: relative; padding-top: 130px; padding-bottom: 60px;
    overflow: hidden; background: #0B0D10;
}
.endo-hero-grid {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(200,255,46,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(200,255,46,0.03) 1px, transparent 1px);
    background-size: 65px 65px;
}
.event-card {
    position: relative; display: block; overflow: hidden;
    background: linear-gradient(135deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(200,255,46,0.08);
    transition: all 0.5s cubic-bezier(0.23,1,0.32,1);
    text-decoration: none;
}
.event-card::before {
    content: ''; position: absolute; top: 0; left: 0;
    width: 0; height: 100%;
    background: linear-gradient(90deg, rgba(200,255,46,0.02), transparent);
    transition: width 0.5s ease;
}
.event-card:hover::before { width: 100%; }
.event-card:hover {
    border-color: rgba(200,255,46,0.22);
    box-shadow: 0 30px 80px rgba(0,0,0,0.06);
    transform: translateY(-5px);
}
.event-card-accent {
    position: absolute; top: 0; left: 0; bottom: 0;
    width: 3px;
    background: linear-gradient(180deg, transparent, var(--event-color, #C8FF2E), transparent);
}
.event-number-bg {
    position: absolute; right: -2rem; bottom: -2rem;
    font-family: 'Orbitron', sans-serif; font-weight: 900;
    font-size: 16rem; line-height: 1;
    color: rgba(0,0,0,0.015); pointer-events: none; user-select: none;
}
.class-badge {
    font-family: 'Rajdhani', sans-serif; font-size: 0.65rem; font-weight: 700;
    letter-spacing: 0.2em; text-transform: uppercase;
    padding: 0.2rem 0.65rem;
}
</style>
@endpush

@section('content')

<section class="endo-hero" id="endo-hero" aria-label="Seri Ketahanan">
    <div class="endo-hero-grid"></div>
    <div class="absolute left-0 top-0 bottom-0 w-[3px] hidden lg:block"
         style="background:linear-gradient(180deg,transparent,#C8FF2E 35%,#C8FF2E 65%,transparent)"></div>

    <div class="max-w-7xl mx-auto px-6 relative">
        <p class="section-label mb-4 flex items-center gap-3">
            <span class="w-6 h-px bg-rgr inline-block"></span>
            Program Balap Global
        </p>
        <h1 class="section-title text-5xl lg:text-7xl mb-5">Balap<br>Ketahanan</h1>
        <p class="text-muted text-xl max-w-2xl leading-relaxed">
            Dari Trek Lurus Mulsanne yang legendaris hingga trek Green Hell Nordschleife — Mobil 1 Team RG bersaing di ajang balap ketahanan paling ekstrem di dunia yang mencakup tiga kejuaraan internasional dan empat kategori mobil.
        </p>
    </div>
</section>

<section class="py-16 pb-24" id="events" aria-label="Acara Balap Ketahanan">
    <div class="max-w-7xl mx-auto px-6">

        @php
        $eventColors = [
            '24h-le-mans'      => '#00C853',
            '24h-spa'          => '#E8421C',
            '24h-nurburgring'  => '#FF6D00',
            'imsa-6h-the-glen' => '#AA00FF',
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($enduranceRaces as $i => $ev)
            @php $evColor = $eventColors[$ev->event_slug] ?? '#00A19B'; @endphp
            <a href="{{ route('endurance.show', $ev->event_slug) }}"
               class="event-card p-8 pl-12"
               data-reveal
               style="transition-delay:{{ $i * 100 }}ms; --event-color:{{ $evColor }}"
               id="event-{{ $ev->id }}">

                <div class="event-card-accent" style="--event-color:{{ $evColor }}"></div>
                <div class="event-number-bg">{{ $i + 1 }}</div>

                {{-- Header --}}
                <div class="mb-6">
                    <p class="text-muted text-xs font-ui tracking-widest uppercase mb-2">{{ $ev->championship }}</p>
                    <h2 class="text-pure font-display font-black text-2xl lg:text-3xl leading-tight mb-2">{{ $ev->event_name }}</h2>
                    <p class="text-muted">{{ $ev->circuit_name }} · {{ $ev->country }}</p>
                </div>

                {{-- Stats Row --}}
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div>
                        <p class="font-display font-bold text-xl" style="color:{{ $evColor }}">{{ $ev->class_category }}</p>
                        <p class="text-muted text-xs font-ui uppercase tracking-widest mt-1">Kelas</p>
                    </div>
                    <div>
                        <p class="text-pure font-display font-bold text-xl">{{ $ev->best_lap_time ?? '—' }}</p>
                        <p class="text-muted text-xs font-ui uppercase tracking-widest mt-1">Lap Terbaik</p>
                    </div>
                    <div>
                        <p class="text-pure font-display font-bold text-xl">P{{ $ev->highest_finish_position ?? '—' }}</p>
                        <p class="text-muted text-xs font-ui uppercase tracking-widest mt-1">Finis Terbaik</p>
                    </div>
                </div>

                {{-- Car + Track --}}
                <div class="flex flex-wrap gap-3 mb-5">
                    <span class="class-badge border text-pure" style="border-color:{{ $evColor }}33; color:{{ $evColor }}; background:{{ $evColor }}11">
                        {{ $ev->car_used }}
                    </span>
                    @if($ev->track_length_km)
                    <span class="class-badge border border-faint/30 text-muted">
                        {{ $ev->track_length_km }} km
                    </span>
                    @endif
                    @if($ev->total_laps_completed)
                    <span class="class-badge border border-faint/30 text-muted">
                        {{ $ev->total_laps_completed }} Putaran
                    </span>
                    @endif
                </div>

                {{-- CTA --}}
                <div class="flex items-center justify-between pt-5 border-t border-white/04">
                    <p class="text-muted text-sm leading-relaxed line-clamp-2 max-w-sm">
                        {{ Str::limit($ev->race_history_text ?? '', 100) }}
                    </p>
                    <span class="flex items-center gap-1 font-ui font-bold text-sm ml-4 flex-shrink-0"
                          style="color:{{ $evColor }}">
                        Jelajahi
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </span>
                </div>

            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
