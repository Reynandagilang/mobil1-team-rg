@extends('layouts.rgr-premium')

@section('title', $event->event_name . ' — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG di ' . $event->event_name . '. ' . Str::limit($event->race_history_text ?? '', 140))

@php
/*
 * Peta identitas visual per-slug balapan
 */
$slugConfig = [
    '24h-le-mans' => [
        'accent'       => '#00C853',       // Sarthe Green
        'accent_rgb'   => '0,200,83',
        'mood_class'   => 'mood-classic',
        'hero_overlay' => 'linear-gradient(135deg, rgba(244,246,249,0.96) 0%, rgba(220,245,225,0.75) 100%)',
        'badge'        => 'LMP1 Hybrid',
        'tagline'      => 'Balapan Terbesar Dunia',
        'atmosphere'   => 'Klasik · Bersejarah · 24 Jam Kejayaan',
        'emoji_flag'   => '🇫🇷',
    ],
    '24h-spa' => [
        'accent'       => '#E8421C',       // Ardennes Crimson
        'accent_rgb'   => '232,66,28',
        'mood_class'   => 'mood-dramatic',
        'hero_overlay' => 'linear-gradient(135deg, rgba(244,246,249,0.96) 0%, rgba(255,230,225,0.75) 100%)',
        'badge'        => 'LMH Hypercar',
        'tagline'      => 'Pertempuran di Ardennes',
        'atmosphere'   => 'Dramatis · Cuaca Ekstrem · Balap Malam',
        'emoji_flag'   => '🇧🇪',
    ],
    '24h-nurburgring' => [
        'accent'       => '#FF6D00',       // Nordschleife Orange
        'accent_rgb'   => '255,109,0',
        'mood_class'   => 'mood-aggressive',
        'hero_overlay' => 'linear-gradient(135deg, rgba(244,246,249,0.96) 0%, rgba(255,240,225,0.75) 100%)',
        'badge'        => 'Kelas GT3',
        'tagline'      => 'Menaklukkan Neraka Hijau',
        'atmosphere'   => 'Agresif · 154 Tikungan · Elevasi Ekstrem',
        'emoji_flag'   => '🇩🇪',
    ],
    'imsa-6h-the-glen' => [
        'accent'       => '#AA00FF',       // Watkins Glen Purple
        'accent_rgb'   => '170,0,255',
        'mood_class'   => 'mood-american',
        'hero_overlay' => 'linear-gradient(135deg, rgba(244,246,249,0.96) 0%, rgba(245,225,255,0.75) 100%)',
        'badge'        => 'Kelas GTP',
        'tagline'      => 'Sprint Menuju Senja',
        'atmosphere'   => 'Amerika · IMSA · Watkins Glen NY',
        'emoji_flag'   => '🇺🇸',
    ],
];

$cfg        = $slugConfig[$event->event_slug] ?? $slugConfig['24h-le-mans'];
$accent     = $cfg['accent'];
$accentRgb  = $cfg['accent_rgb'];
$overlay    = $cfg['hero_overlay'];
$badge      = $cfg['badge'];
$tagline    = $cfg['tagline'];
$atmosphere = $cfg['atmosphere'];
$emojiFlag  = $cfg['emoji_flag'];
@endphp

@push('styles')
<style>
/* ── Per-Event Root Color ────────────────────────────────────────── */
:root {
    --ev-accent: {{ $accent }};
    --ev-rgb:    {{ $accentRgb }};
}

/* ── Event Hero ──────────────────────────────────────────────────── */
.event-hero {
    position: relative; min-height: 100vh;
    display: flex; align-items: center;
    overflow: hidden; background: #0B0D10;
}
.event-hero-grid {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(var(--ev-rgb),0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(var(--ev-rgb),0.04) 1px, transparent 1px);
    background-size: 65px 65px;
    animation: evGridShift 30s linear infinite;
}
@keyframes evGridShift { 0%{transform:translate(0,0)} 100%{transform:translate(65px,65px)} }

.event-hero-overlay {
    position: absolute; inset: 0;
    background: {{ $overlay }};
}
.event-hero-glow {
    position: absolute; top: 30%; left: 50%;
    transform: translateX(-50%);
    width: 800px; height: 500px;
    background: radial-gradient(ellipse, rgba(var(--ev-rgb),0.06) 0%, transparent 65%);
    pointer-events: none;
}

/* ── Event Wordmark ──────────────────────────────────────────────── */
.event-wordmark {
    font-family: 'Orbitron', sans-serif;
    font-weight: 900;
    font-size: clamp(2.5rem, 6vw, 6.5rem);
    line-height: 0.9;
    letter-spacing: -0.02em;
    color: #111827;
}
.event-wordmark .ev-accent {
    display: block;
    background: linear-gradient(135deg, var(--ev-accent) 0%, #111827 50%, var(--ev-accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 0 10px rgba(var(--ev-rgb),0.2));
}

/* ── Stat Chip ───────────────────────────────────────────────────── */
.ev-stat-chip {
    display: flex; flex-direction: column; align-items: center;
    padding: 0.85rem 1.25rem;
    border: 1px solid rgba(var(--ev-rgb),0.12);
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(8px);
    transition: all 0.3s ease;
}
.ev-stat-chip:hover { border-color: rgba(var(--ev-rgb),0.35); }
.ev-stat-val {
    font-family: 'Orbitron', sans-serif; font-weight: 900; font-size: 1.8rem;
    line-height: 1; color: var(--ev-accent);
    text-shadow: 0 1px 3px rgba(var(--ev-rgb),0.15);
}
.ev-stat-lbl {
    font-family: 'Rajdhani', sans-serif; font-size: 0.6rem; font-weight: 700;
    letter-spacing: 0.22em; text-transform: uppercase; color: #4B5563;
    margin-top: 0.3rem; text-align: center;
}

/* ── Circuit Infographic ─────────────────────────────────────────── */
.circuit-info-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(var(--ev-rgb),0.12);
    position: relative; overflow: hidden;
}
.circuit-info-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, transparent, var(--ev-accent), transparent);
}

/* ── Circuit Section Rows ────────────────────────────────────────── */
.circuit-section-row {
    padding: 1rem 0;
    border-bottom: 1px solid rgba(0,0,0,0.04);
    transition: padding-left 0.25s ease;
}
.circuit-section-row:last-child { border-bottom: none; }
.circuit-section-row:hover { padding-left: 0.5rem; }

/* ── Car Spec Strip ──────────────────────────────────────────────── */
.car-strip {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(var(--ev-rgb),0.1);
    position: relative; overflow: hidden;
    transition: all 0.4s ease;
}
.car-strip:hover {
    border-color: rgba(var(--ev-rgb),0.25);
    box-shadow: 0 20px 60px rgba(0,0,0,0.06), 0 0 30px rgba(var(--ev-rgb),0.05);
    transform: translateY(-3px);
}
.car-strip::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, transparent, var(--ev-accent), transparent);
    opacity: 0; transition: opacity 0.4s;
}
.car-strip:hover::before { opacity: 1; }
.car-strip-number {
    position: absolute; right: -0.5rem; top: 50%; transform: translateY(-50%);
    font-family: 'Orbitron', sans-serif; font-weight: 900; font-size: 8rem;
    line-height: 1; opacity: 0.02; pointer-events: none; user-select: none;
    color: var(--ev-accent);
}

/* ── Challenge Card ──────────────────────────────────────────────── */
.challenge-card {
    background: rgba(255,255,255,0.95);
    border: 1px solid rgba(var(--ev-rgb),0.08);
    border-left: 3px solid var(--ev-accent);
    padding: 1.5rem;
    transition: all 0.35s ease;
}
.challenge-card:hover {
    border-color: rgba(var(--ev-rgb),0.25);
    border-left-color: var(--ev-accent);
    box-shadow: 0 15px 40px rgba(0,0,0,0.04);
    transform: translateX(4px);
}

/* ── Event Nav ───────────────────────────────────────────────────── */
.ev-nav-link {
    padding: 0.65rem 1.2rem;
    font-family: 'Rajdhani', sans-serif; font-size: 0.78rem; font-weight: 600;
    letter-spacing: 0.1em; text-transform: uppercase;
    border: 1px solid rgba(var(--ev-rgb),0.1);
    color: #8A8A93; background: transparent;
    transition: all 0.3s ease; text-decoration: none; display: block;
}
.ev-nav-link:hover,
.ev-nav-link.current {
    color: #FFFFFF;
    border-color: rgba(var(--ev-rgb),0.4);
    background: rgba(var(--ev-rgb),0.07);
}
</style>
@endpush

@section('content')

{{-- ═══════════════════════ EVENT HERO ════════════════════════════ --}}
<section class="event-hero" id="event-hero" aria-label="Hero {{ $event->event_name }}">
    <div class="event-hero-grid"></div>
    <div class="event-hero-overlay"></div>
    <div class="event-hero-glow"></div>

    {{-- Line kecepatan dekoratif --}}
    <div class="absolute right-0 top-1/2 -translate-y-1/2 flex flex-col gap-2 opacity-20 hidden lg:flex">
        @for($i=0;$i<6;$i++)
        <div style="width:{{ 150 + rand(0,180) }}px; height:1px; background:linear-gradient(90deg,transparent,{{ $accent }}); animation:speedLine {{ 2.5 + $i*0.3 }}s ease-out infinite; animation-delay:{{ $i*0.2 }}s"></div>
        @endfor
    </div>

    <div class="max-w-7xl mx-auto px-6 w-full relative z-10 pt-24">
        <div class="grid lg:grid-cols-2 gap-16 items-center min-h-screen py-20">

            {{-- Left: Event Identity --}}
            <div>
                {{-- Breadcrumb --}}
                <div class="flex items-center gap-2 mb-6 text-xs font-ui text-muted">
                    <a href="{{ route('endurance.index') }}" class="hover:text-pure transition-colors">Balap Ketahanan</a>
                    <span class="text-faint">/</span>
                    <span style="color:{{ $accent }}">{{ $event->event_name }}</span>
                </div>

                <p class="section-label mb-4 flex items-center gap-3" style="color:{{ $accent }}">
                    <span class="w-6 h-px inline-block" style="background:{{ $accent }}"></span>
                    {{ $emojiFlag }} {{ $event->championship }}
                </p>

                <h1 class="event-wordmark mb-4">
                    @php $words = explode(' ', $event->event_name, 3); @endphp
                    {{ $words[0] ?? '' }}
                    <span class="ev-accent">{{ implode(' ', array_slice($words, 1)) }}</span>
                </h1>

                <p class="text-muted text-lg mb-3">{{ $tagline }}</p>
                <p class="text-sm font-ui tracking-widest uppercase mb-8" style="color:{{ $accent }}">
                    {{ $atmosphere }}
                </p>

                {{-- Class Badge --}}
                <div class="flex flex-wrap items-center gap-3 mb-8">
                    <span class="font-display font-bold text-sm tracking-widest uppercase px-4 py-2"
                          style="border:1px solid {{ $accent }}; color:{{ $accent }}; background:rgba({{ $accentRgb }},0.08)">
                        {{ $badge }}
                    </span>
                    <span class="font-display font-bold text-sm tracking-widest uppercase px-4 py-2"
                          style="border:1px solid rgba({{ $accentRgb }},0.3); color:#FFFFFF">
                        {{ $event->car_used }}
                    </span>
                </div>

                {{-- Event Stats --}}
                <div class="flex flex-wrap gap-3">
                    @if($event->track_length_km)
                    <div class="ev-stat-chip">
                        <span class="ev-stat-val">{{ $event->track_length_km }}</span>
                        <span class="ev-stat-lbl">km/lap</span>
                    </div>
                    @endif
                    @if($event->total_laps_completed)
                    <div class="ev-stat-chip">
                        <span class="ev-stat-val">{{ $event->total_laps_completed }}</span>
                        <span class="ev-stat-lbl">Lap<br>Tuntas</span>
                    </div>
                    @endif
                    @if($event->best_lap_time)
                    <div class="ev-stat-chip">
                        <span class="ev-stat-val" style="font-size:1.2rem">{{ $event->best_lap_time }}</span>
                        <span class="ev-stat-lbl">Waktu Lap<br>Terbaik</span>
                    </div>
                    @endif
                    @if($event->highest_finish_position)
                    <div class="ev-stat-chip">
                        <span class="ev-stat-val">P{{ $event->highest_finish_position }}</span>
                        <span class="ev-stat-lbl">Finis<br>Terbaik</span>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Right: Circuit Infographic SVG --}}
            <div class="hidden lg:block" data-reveal>
                <div class="circuit-info-card p-8">
                    <p class="section-label mb-2" style="color:{{ $accent }}">Skema Sirkuit</p>
                    <h3 class="text-pure font-display font-bold text-xl mb-6">{{ $event->circuit_name }}</h3>

                    {{-- Sirkuit SVG --}}
                    <svg viewBox="0 0 400 260" class="w-full mb-6" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="circuitGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%"   stop-color="{{ $accent }}" stop-opacity="0.9"/>
                                <stop offset="100%" stop-color="{{ $accent }}" stop-opacity="0.3"/>
                            </linearGradient>
                            <filter id="glow">
                                <feGaussianBlur stdDeviation="3" result="b"/>
                                <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
                            </filter>
                        </defs>

                        {{-- Grid --}}
                        @for($gx=0;$gx<=400;$gx+=40)
                        <line x1="{{ $gx }}" y1="0" x2="{{ $gx }}" y2="260" stroke="rgba({{ $accentRgb }},0.05)" stroke-width="0.5"/>
                        @endfor
                        @for($gy=0;$gy<=260;$gy+=40)
                        <line x1="0" y1="{{ $gy }}" x2="400" y2="{{ $gy }}" stroke="rgba({{ $accentRgb }},0.05)" stroke-width="0.5"/>
                        @endfor

                        @if($event->event_slug === '24h-le-mans')
                        <path d="M 60,200 L 60,80 Q 60,50 90,50 L 200,50 Q 230,50 240,70 L 290,70 Q 340,70 360,100 L 360,170 Q 360,200 330,210 L 230,210 Q 210,220 200,210 L 150,210 Q 120,220 90,210 Q 60,200 60,200 Z"
                              fill="none" stroke="url(#circuitGrad)" stroke-width="3" filter="url(#glow)"/>
                        <text x="330" y="145" text-anchor="middle" font-family="Rajdhani" font-size="8" fill="rgba({{ $accentRgb }},0.6)" letter-spacing="2">MULSANNE</text>
                        <line x1="360" y1="100" x2="360" y2="170" stroke="{{ $accent }}" stroke-width="4" opacity="0.7" filter="url(#glow)"/>

                        @elseif($event->event_slug === '24h-spa')
                        <path d="M 50,200 L 50,120 Q 55,80 100,65 L 150,70 Q 190,80 200,110 L 210,90 Q 230,50 280,60 L 340,80 Q 370,100 360,140 L 340,180 Q 320,210 280,215 L 180,215 Q 130,218 90,210 Q 50,200 50,200 Z"
                              fill="none" stroke="url(#circuitGrad)" stroke-width="3" filter="url(#glow)"/>
                        <text x="135" y="85" text-anchor="middle" font-family="Rajdhani" font-size="7" fill="rgba({{ $accentRgb }},0.7)" letter-spacing="1">EAU ROUGE</text>

                        @elseif($event->event_slug === '24h-nurburgring')
                        <path d="M 30,220 L 30,160 Q 35,130 60,110 L 90,95 Q 120,80 140,90 L 160,100 Q 180,110 190,95 L 210,75 Q 240,50 280,60 L 320,75 Q 360,95 370,130 L 365,165 Q 355,195 330,205 L 280,215 L 200,218 L 120,215 Q 70,220 30,220 Z"
                              fill="none" stroke="url(#circuitGrad)" stroke-width="2.5" filter="url(#glow)"/>
                        <text x="200" y="130" text-anchor="middle" font-family="Rajdhani" font-size="8" fill="rgba({{ $accentRgb }},0.5)" letter-spacing="2">NORDSCHLEIFE</text>
                        <circle cx="145" cy="95" r="12" fill="none" stroke="{{ $accent }}" stroke-width="1.5" opacity="0.6"/>
                        <text x="145" y="78" text-anchor="middle" font-family="Rajdhani" font-size="6" fill="{{ $accent }}" opacity="0.7">KARUSSELL</text>

                        @elseif($event->event_slug === 'imsa-6h-the-glen')
                        <path d="M 40,210 L 40,140 Q 42,100 80,80 L 140,70 Q 180,65 200,80 L 240,100 Q 270,115 280,140 L 290,160 Q 300,180 310,170 L 340,150 Q 370,140 375,170 L 370,200 Q 360,220 330,222 L 200,222 L 100,220 Q 50,218 40,210 Z"
                              fill="none" stroke="url(#circuitGrad)" stroke-width="3" filter="url(#glow)"/>
                        <text x="300" y="162" text-anchor="middle" font-family="Rajdhani" font-size="7" fill="rgba({{ $accentRgb }},0.7)" letter-spacing="1">THE BOOT</text>
                        @endif

                        {{-- Start/Finish --}}
                        <line x1="55" y1="195" x2="55" y2="215" stroke="{{ $accent }}" stroke-width="2.5" opacity="0.8"/>
                        <text x="42" y="188" font-family="Rajdhani" font-size="7" fill="{{ $accent }}" opacity="0.7" letter-spacing="1">S/F</text>
                    </svg>

                    {{-- Tabel Data --}}
                    @if(!empty($circuitData))
                    <div class="space-y-2">
                        @foreach([
                            ['label' => 'Sirkuit', 'val' => $circuitData['name'] ?? '—'],
                            ['label' => 'Panjang lintasan',  'val' => $circuitData['length'] ?? '—'],
                            ['label' => 'Jumlah Tikungan',   'val' => ($circuitData['turns'] ?? '—') . ' tikungan'],
                            ['label' => 'Rekor Putaran', 'val' => ($circuitData['lap_record'] ?? '—') . ' — ' . ($circuitData['record_holder'] ?? '')],
                            ['label' => 'Ketinggian',   'val' => $circuitData['altitude'] ?? '—'],
                        ] as $row)
                        <div class="flex justify-between items-center py-1.5 border-b border-white/03">
                            <span class="text-muted text-xs font-ui tracking-widest uppercase">{{ $row['label'] }}</span>
                            <span class="text-pure text-xs font-medium text-right max-w-[55%]">{{ $row['val'] }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="absolute bottom-0 left-0 right-0 h-32 pointer-events-none"
         style="background:linear-gradient(0deg,#050507 0%,transparent 100%)"></div>
</section>

{{-- ═══════════════════════ RACE HISTORY ══════════════════════════ --}}
@if($event->race_history_text)
<section class="py-20 grid-bg relative" id="race-history" aria-label="Riwayat Balapan">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-start" data-reveal>
            <div>
                <p class="section-label mb-3 flex items-center gap-3" style="color:{{ $accent }}">
                    <span class="w-6 h-px inline-block" style="background:{{ $accent }}"></span>
                    Kronik Balapan
                </p>
                <h2 class="section-title text-4xl mb-6">Kiprah M1TRG di<br>{{ $event->event_name }}</h2>
                <div class="prose prose-invert max-w-none">
                    <p class="text-muted text-base leading-relaxed">{{ $event->race_history_text }}</p>
                </div>
            </div>

            {{-- Bagian Sirkuit Utama --}}
            @if(!empty($circuitData['key_sections'] ?? []))
            <div>
                <p class="section-label mb-5" style="color:{{ $accent }}">Sektor Sirkuit Krusial</p>
                <div class="space-y-3">
                    @foreach($circuitData['key_sections'] as $i => $sec)
                    <div class="circuit-section-row pl-4" style="border-left:2px solid {{ $accent }}{{ $i === 0 ? '' : '44' }}">
                        <h4 class="text-pure font-ui font-bold text-base mb-1">{{ $sec['name'] }}</h4>
                        <p class="text-muted text-sm leading-relaxed">{{ $sec['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════ CARS DEPLOYED ═════════════════════════ --}}
@if($eventCars->count() > 0)
<section class="py-20 relative" id="event-cars" aria-label="Mobil yang Diturunkan">
    <div class="max-w-7xl mx-auto px-6">

        <div class="mb-10" data-reveal>
            <p class="section-label mb-3 flex items-center gap-3" style="color:{{ $accent }}">
                <span class="w-6 h-px inline-block" style="background:{{ $accent }}"></span>
                Entri Balapan
            </p>
            <h2 class="section-title text-4xl>">Armada {{ $event->class_category }}<br>yang Diturunkan</h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            @foreach($eventCars as $i => $car)
            <div class="car-strip p-7 relative" data-reveal style="transition-delay:{{ $i * 100 }}ms" id="ev-car-{{ $car->id }}">
                <span class="car-strip-number">{{ $car->car_number }}</span>
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-5">
                        <div>
                            <span class="font-display font-black text-3xl" style="color:{{ $accent }}; text-shadow:0 0 20px rgba({{ $accentRgb }},0.5)">#{{ $car->car_number }}</span>
                            <p class="text-pure font-display font-bold text-xl mt-1">{{ $car->model_name }}</p>
                            @if($car->championship) <p class="text-muted text-xs font-ui mt-0.5">{{ $car->championship }}</p> @endif
                        </div>
                        @if($car->class_entry)
                        <span class="text-xs font-ui font-bold tracking-widest uppercase px-2 py-1"
                              style="border:1px solid rgba({{ $accentRgb }},0.3); color:{{ $accent }}">{{ $car->class_entry }}</span>
                        @endif
                    </div>

                    {{-- Spesifikasi --}}
                    <div class="grid grid-cols-2 gap-x-6 gap-y-2 mb-5">
                        @foreach([
                            ['Unit Tenaga', $car->power_unit],
                            ['Output Daya', ($car->power_hp ? number_format($car->power_hp).' HP' : '—')],
                            ['Sasis',     $car->chassis],
                            ['Kec. Maksimal',   ($car->top_speed ? $car->top_speed.' km/jam' : '—')],
                            ['Bobot Mobil',      ($car->weight ? $car->weight.' kg' : '—')],
                            ['Ban Resmi',       ($car->tyre_supplier ?? '—')],
                        ] as [$lbl, $val])
                        <div>
                            <p class="text-muted text-xs font-ui uppercase tracking-widest">{{ $lbl }}</p>
                            <p class="text-pure text-sm font-medium mt-0.5">{{ $val }}</p>
                        </div>
                        @endforeach
                    </div>

                    @if($car->aerodynamics_desc)
                    <div class="pt-4 border-t border-white/04">
                        <p class="section-label mb-1" style="color:{{ $accent }}">Paket Aerodinamika</p>
                        <p class="text-muted text-sm leading-relaxed">{{ $car->aerodynamics_desc }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════ ENGINEERING CHALLENGES ════════════════ --}}
@if(!empty($challengeData))
<section class="py-20 grid-bg relative" id="challenges" aria-label="Tantangan Rekayasa Teknis">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-10" data-reveal>
            <p class="section-label mb-3 flex items-center gap-3" style="color:{{ $accent }}">
                <span class="w-6 h-px inline-block" style="background:{{ $accent }}"></span>
                Intelijen Rekayasa (Engineering)
            </p>
            <h2 class="section-title text-4xl">Tantangan<br>Balapan</h2>
        </div>

        <div class="space-y-4">
            @foreach($challengeData as $i => $ch)
            <div class="challenge-card" data-reveal style="transition-delay:{{ $i * 80 }}ms">
                <h4 class="text-pure font-display font-bold text-lg mb-2">{{ $ch['title'] }}</h4>
                <p class="text-muted text-sm leading-relaxed">{{ $ch['body'] ?? $ch['desc'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ═══════════════════════ EVENT NAVIGATION ══════════════════════ --}}
<section class="py-16 border-t border-faint/10" id="ev-nav" aria-label="Acara Ketahanan Lainnya">
    <div class="max-w-7xl mx-auto px-6">
        <p class="section-label mb-6 text-center">Seri Balap Ketahanan Lainnya</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
            @foreach($enduranceNavMap as $slug => $name)
            <a href="{{ route('endurance.show', $slug) }}"
               class="ev-nav-link text-center {{ $slug === $event->event_slug ? 'current' : '' }}"
               id="evnav-{{ $slug }}">
                {{ $name }}
            </a>
            @endforeach
        </div>
        <div class="text-center mt-6">
            <a href="{{ route('endurance.index') }}" class="btn-rgr-ghost" id="btn-all-events">
                ← Lihat Semua Balapan Ketahanan
            </a>
        </div>
    </div>
</section>

@endsection
