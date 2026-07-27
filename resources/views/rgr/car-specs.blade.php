@extends('layouts.rgr-premium')

@section('title', 'RGR-26 E Performance — Car Specs')
@section('meta_description', 'Explore the full technical specifications of the RGR-26 E Performance — the 2026 Formula 1 machine from Rey Gilang Racing. Power Unit, Chassis, Aerodynamics, Performance data.')

@push('styles')
<style>
    /* ── Car Page Hero ──────────────────────────────────────────── */
    .car-hero {
        position: relative;
        min-height: 70vh;
        display: flex;
        align-items: flex-end;
        overflow: hidden;
        background: #0F0F12;
        padding-bottom: 80px;
    }
    .car-hero-bg {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(0,212,255,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0,212,255,0.03) 1px, transparent 1px);
        background-size: 60px 60px;
    }
    .car-hero-glow {
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translateX(-50%);
        width: 900px;
        height: 400px;
        background: radial-gradient(ellipse, rgba(0,212,255,0.10) 0%, transparent 65%);
        pointer-events: none;
    }

    /* ── Spec Card ──────────────────────────────────────────────── */
    .spec-card {
        position: relative;
        background: linear-gradient(145deg, rgba(22,22,27,0.95), rgba(30,30,37,0.85));
        border: 1px solid rgba(0,212,255,0.1);
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .spec-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        transition: opacity 0.4s;
    }
    .spec-card.cyan-accent::before {
        background: linear-gradient(90deg, transparent, #00D4FF, transparent);
        opacity: 0.6;
    }
    .spec-card.white-accent::before {
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
        opacity: 0.3;
    }
    .spec-card:hover {
        transform: translateY(-5px);
        border-color: rgba(0,212,255,0.3);
        box-shadow: 0 25px 70px rgba(0,0,0,0.7), 0 0 40px rgba(0,212,255,0.12);
    }
    .spec-card:hover::before { opacity: 1 !important; }

    /* ── Spec Row ───────────────────────────────────────────────── */
    .spec-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.85rem 0;
        border-bottom: 1px solid rgba(0,212,255,0.06);
        gap: 1rem;
        transition: background 0.2s;
    }
    .spec-row:last-child { border-bottom: none; }
    .spec-row:hover { padding-left: 8px; padding-right: 8px; margin: 0 -8px; }

    .spec-key {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #6B7A8D;
        flex-shrink: 0;
    }
    .spec-val {
        font-family: 'Inter', sans-serif;
        font-size: 0.875rem;
        font-weight: 500;
        color: #E8F4F8;
        text-align: right;
    }
    .spec-val.highlighted {
        color: #00D4FF;
        font-family: 'Orbitron', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        text-shadow: 0 0 12px rgba(0,212,255,0.4);
    }

    /* ── Icon Box ───────────────────────────────────────────────── */
    .icon-box {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(0,212,255,0.2);
        flex-shrink: 0;
        background: rgba(0,212,255,0.05);
    }

    /* ── Performance Bars ───────────────────────────────────────── */
    .perf-bar-track {
        height: 4px;
        background: rgba(0,212,255,0.1);
        border-radius: 2px;
        overflow: hidden;
        position: relative;
    }
    .perf-bar-fill {
        height: 100%;
        border-radius: 2px;
        background: linear-gradient(90deg, #00D4FF, rgba(0,212,255,0.6));
        box-shadow: 0 0 10px rgba(0,212,255,0.5);
        transform: translateX(-100%);
        transition: transform 1.2s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .perf-bar-fill.animated { transform: translateX(0); }

    /* ── Tab Navigation ─────────────────────────────────────────── */
    .tab-btn {
        font-family: 'Rajdhani', sans-serif;
        font-weight: 700;
        font-size: 0.8rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        padding: 0.75rem 1.5rem;
        border: 1px solid rgba(0,212,255,0.1);
        color: #6B7A8D;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }
    .tab-btn:hover { color: #00D4FF; border-color: rgba(0,212,255,0.3); }
    .tab-btn.active {
        color: #0F0F12;
        background: #00D4FF;
        border-color: #00D4FF;
        box-shadow: 0 0 20px rgba(0,212,255,0.4);
    }

    /* ── Divider Line ───────────────────────────────────────────── */
    .vert-divider {
        width: 1px;
        background: linear-gradient(180deg, transparent, rgba(0,212,255,0.3), transparent);
        align-self: stretch;
    }

    /* ── Blueprint Overlay ──────────────────────────────────────── */
    .blueprint-card {
        position: relative;
        background: rgba(0,10,18,0.6);
        border: 1px solid rgba(0,212,255,0.15);
        overflow: hidden;
    }
    .blueprint-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(0,212,255,0.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0,212,255,0.06) 1px, transparent 1px);
        background-size: 30px 30px;
        pointer-events: none;
    }
    .scan-line {
        position: absolute;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(0,212,255,0.5), transparent);
        animation: scanLine 4s linear infinite;
        pointer-events: none;
    }
    @keyframes scanLine {
        0%   { top: -2px; }
        100% { top: 100%; }
    }
</style>
@endpush

@section('content')

{{-- ═══════════════════════════════════════════════════════════════
     CAR PAGE HERO
═══════════════════════════════════════════════════════════════ --}}
<section class="car-hero" aria-label="Car Hero">
    <div class="car-hero-bg"></div>
    <div class="car-hero-glow"></div>

    {{-- Scan Line Effect --}}
    <div class="scan-line" style="opacity: 0.3;"></div>

    {{-- Vertical Accent --}}
    <div class="absolute left-0 top-0 bottom-0 w-[3px] hidden lg:block"
         style="background: linear-gradient(180deg, transparent, #00D4FF 30%, #00D4FF 70%, transparent);">
    </div>

    <div class="max-w-7xl mx-auto px-6 w-full pt-[104px]">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            {{-- Left: Car Info --}}
            <div class="animate-slide-up">
                <p class="section-label mb-4 flex items-center gap-3">
                    <span class="w-6 h-px bg-rgr-cyan"></span>
                    2026 Constructor · Technical Breakdown
                </p>
                <h1 class="section-title text-5xl lg:text-6xl xl:text-7xl mb-4">
                    @if($car) {{ $car->model_name }} @else RGR-26 @endif
                </h1>
                <h2 class="text-ice-2 text-xl lg:text-2xl font-light mb-8">
                    E Performance
                </h2>

                @if($car)
                <div class="flex flex-wrap gap-5 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-8 bg-rgr-cyan"></div>
                        <div>
                            <p class="text-muted text-xs font-racing uppercase tracking-widest">Power</p>
                            <p class="text-ice font-bold">{{ number_format($car->power_hp) }} HP</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-8 bg-rgr-cyan"></div>
                        <div>
                            <p class="text-muted text-xs font-racing uppercase tracking-widest">Top Speed</p>
                            <p class="text-ice font-bold">{{ $car->top_speed }} km/h</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-1 h-8 bg-rgr-cyan"></div>
                        <div>
                            <p class="text-muted text-xs font-racing uppercase tracking-widest">Weight</p>
                            <p class="text-ice font-bold">{{ $car->weight }} kg</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="flex gap-4">
                    <a href="#tech-specs" class="btn-rgr" id="btn-view-specs">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7"/>
                        </svg>
                        View Specs
                    </a>
                    <a href="{{ route('home') }}" class="btn-rgr-outline" id="btn-back-home">
                        ← Back
                    </a>
                </div>
            </div>

            {{-- Right: Blueprint Car View --}}
            <div class="blueprint-card p-8 relative" data-reveal>
                <div class="blueprint-grid"></div>
                <div class="scan-line"></div>

                <div class="relative z-10">
                    {{-- RGR-26 Blueprint SVG --}}
                    <svg viewBox="0 0 800 300" class="w-full" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="bpBody" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%"  stop-color="rgba(0,212,255,0.15)"/>
                                <stop offset="100%" stop-color="rgba(0,212,255,0.05)"/>
                            </linearGradient>
                            <filter id="bpGlow">
                                <feGaussianBlur stdDeviation="2" result="b"/>
                                <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
                            </filter>
                        </defs>

                        <!-- Ground shadow -->
                        <ellipse cx="400" cy="280" rx="300" ry="10" fill="rgba(0,212,255,0.06)"/>

                        <!-- Rear Wheel Blueprint -->
                        <circle cx="210" cy="240" r="48" fill="none" stroke="#00D4FF" stroke-width="1.5" opacity="0.7"/>
                        <circle cx="210" cy="240" r="32" fill="none" stroke="#00D4FF" stroke-width="0.8" opacity="0.4"/>
                        <circle cx="210" cy="240" r="8"  fill="rgba(0,212,255,0.3)"/>
                        <!-- Wheel spokes -->
                        <line x1="210" y1="208" x2="210" y2="272" stroke="#00D4FF" stroke-width="0.5" opacity="0.3"/>
                        <line x1="178" y1="240" x2="242" y2="240" stroke="#00D4FF" stroke-width="0.5" opacity="0.3"/>
                        <line x1="187" y1="217" x2="233" y2="263" stroke="#00D4FF" stroke-width="0.5" opacity="0.3"/>
                        <line x1="233" y1="217" x2="187" y2="263" stroke="#00D4FF" stroke-width="0.5" opacity="0.3"/>

                        <!-- Front Wheel Blueprint -->
                        <circle cx="600" cy="240" r="42" fill="none" stroke="#00D4FF" stroke-width="1.5" opacity="0.7"/>
                        <circle cx="600" cy="240" r="28" fill="none" stroke="#00D4FF" stroke-width="0.8" opacity="0.4"/>
                        <circle cx="600" cy="240" r="8"  fill="rgba(0,212,255,0.3)"/>
                        <line x1="600" y1="212" x2="600" y2="268" stroke="#00D4FF" stroke-width="0.5" opacity="0.3"/>
                        <line x1="572" y1="240" x2="628" y2="240" stroke="#00D4FF" stroke-width="0.5" opacity="0.3"/>
                        <line x1="580" y1="220" x2="620" y2="260" stroke="#00D4FF" stroke-width="0.5" opacity="0.3"/>
                        <line x1="620" y1="220" x2="580" y2="260" stroke="#00D4FF" stroke-width="0.5" opacity="0.3"/>

                        <!-- Main Body Blueprint -->
                        <path d="M175,230 L175,182 Q185,148 240,140 L385,130 Q438,75 520,70 L610,72 Q658,75 688,98 L700,135 L690,182 L175,230 Z"
                              fill="url(#bpBody)" stroke="#00D4FF" stroke-width="1" opacity="0.8" filter="url(#bpGlow)"/>

                        <!-- Cockpit -->
                        <path d="M385,130 Q428,90 492,82 Q525,78 548,85 L575,97 Q550,104 515,110 Q462,120 425,125 Z"
                              fill="rgba(0,212,255,0.06)" stroke="#00D4FF" stroke-width="1" opacity="0.7"/>

                        <!-- Halo -->
                        <path d="M425,88 Q462,62 505,62 Q535,62 558,74" stroke="#00D4FF" stroke-width="2.5" fill="none" opacity="0.9" filter="url(#bpGlow)"/>
                        <path d="M425,88 L558,74" stroke="rgba(0,212,255,0.2)" stroke-width="0.5" fill="none"/>

                        <!-- Center line -->
                        <line x1="175" y1="190" x2="700" y2="140" stroke="rgba(0,212,255,0.15)" stroke-width="0.5" stroke-dasharray="8,8"/>

                        <!-- Rear Wing Blueprint -->
                        <rect x="140" y="132" width="55" height="7" rx="1" fill="rgba(0,212,255,0.1)" stroke="#00D4FF" stroke-width="1" opacity="0.8"/>
                        <rect x="152" y="148" width="35" height="5" rx="1" fill="rgba(0,212,255,0.06)" stroke="#00D4FF" stroke-width="0.8" opacity="0.7"/>
                        <line x1="167" y1="132" x2="167" y2="200" stroke="#00D4FF" stroke-width="0.8" opacity="0.5"/>

                        <!-- Front Wing Blueprint -->
                        <path d="M628,205 L712,208 L718,218 L628,222 Z" fill="rgba(0,212,255,0.08)" stroke="#00D4FF" stroke-width="1" opacity="0.8"/>
                        <path d="M632,198 L710,201 L714,205 L632,205 Z" fill="rgba(0,212,255,0.06)" stroke="#00D4FF" stroke-width="0.8" opacity="0.7"/>

                        <!-- DRS indicator -->
                        <path d="M140,125 L195,125" stroke="#00D4FF" stroke-width="0.5" stroke-dasharray="4,4" opacity="0.5"/>
                        <text x="145" y="120" font-family="Rajdhani,sans-serif" font-size="9" fill="#00D4FF" opacity="0.6" letter-spacing="1">DRS</text>

                        <!-- Dimension Lines -->
                        <line x1="140" y1="260" x2="720" y2="260" stroke="rgba(0,212,255,0.3)" stroke-width="0.5"/>
                        <line x1="140" y1="255" x2="140" y2="265" stroke="rgba(0,212,255,0.4)" stroke-width="0.8"/>
                        <line x1="720" y1="255" x2="720" y2="265" stroke="rgba(0,212,255,0.4)" stroke-width="0.8"/>
                        <text x="390" y="273" text-anchor="middle" font-family="Rajdhani,sans-serif" font-size="9" fill="rgba(0,212,255,0.5)" letter-spacing="2">5.5m OVERALL LENGTH</text>

                        <!-- Power Unit indicator -->
                        <rect x="280" y="152" width="90" height="38" rx="2" fill="rgba(0,212,255,0.08)" stroke="rgba(0,212,255,0.4)" stroke-width="0.8" stroke-dasharray="4,3"/>
                        <text x="325" y="167" text-anchor="middle" font-family="Rajdhani,sans-serif" font-size="8" fill="#00D4FF" letter-spacing="1" opacity="0.7">POWER</text>
                        <text x="325" y="178" text-anchor="middle" font-family="Rajdhani,sans-serif" font-size="8" fill="#00D4FF" letter-spacing="1" opacity="0.7">UNIT</text>

                        <!-- Air intake indicator -->
                        <ellipse cx="494" cy="75" rx="24" ry="14" fill="rgba(0,212,255,0.06)" stroke="#00D4FF" stroke-width="1" opacity="0.7"/>
                        <text x="494" y="79" text-anchor="middle" font-family="Rajdhani,sans-serif" font-size="7" fill="#00D4FF" opacity="0.6" letter-spacing="0.5">INTAKE</text>

                        <!-- M1TRG Label -->
                        <text x="420" y="175" font-family="Orbitron,sans-serif" font-weight="900" font-size="18" fill="rgba(0,212,255,0.25)" letter-spacing="4">RGR-26</text>
                    </svg>

                    <div class="mt-4 flex items-center justify-between">
                        <p class="text-rgr-cyan/60 text-xs font-racing tracking-widest uppercase">Technical Blueprint View</p>
                        <p class="text-muted text-xs">Scale 1:50</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     PERFORMANCE INDICATORS
═══════════════════════════════════════════════════════════════ --}}
<section class="py-16 border-y border-rgr-cyan/08" id="perf-indicators" aria-label="Performance Indicators">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-0 divide-x divide-rgr-cyan/08" data-reveal>
            @foreach([
                ['label' => 'Top Speed',       'value' => ($car->top_speed ?? 372).' km/h', 'pct' => 95],
                ['label' => '0–100 km/h',      'value' => '< 2.5s',                          'pct' => 98],
                ['label' => 'Downforce',        'value' => '4800+ N',                          'pct' => 87],
                ['label' => 'Braking Distance', 'value' => '< 15m',                            'pct' => 95],
                ['label' => 'Cornering G',      'value' => '6.5G',                             'pct' => 91],
                ['label' => 'Power Output',     'value' => ($car->power_hp ?? 1050).' HP',    'pct' => 100],
            ] as $i => $perf)
            <div class="px-4 py-6 text-center">
                <p class="text-rgr-cyan font-display font-bold text-xl mb-1">{{ $perf['value'] }}</p>
                <p class="text-muted text-xs font-racing tracking-widest uppercase mb-3">{{ $perf['label'] }}</p>
                <div class="perf-bar-track">
                    <div class="perf-bar-fill" data-width="{{ $perf['pct'] }}" style="width: {{ $perf['pct'] }}%;"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     TECH SPECS SECTION
═══════════════════════════════════════════════════════════════ --}}
<section class="py-24 grid-bg relative" id="tech-specs" aria-label="Technical Specifications">
    <div class="absolute inset-0" style="background: radial-gradient(ellipse at 50% 50%, rgba(0,212,255,0.04) 0%, transparent 60%);"></div>

    <div class="max-w-7xl mx-auto px-6 relative">

        <div class="text-center mb-16" data-reveal>
            <p class="section-label mb-3 flex items-center justify-center gap-3">
                <span class="w-8 h-px bg-rgr-cyan"></span>
                Full Technical Data
                <span class="w-8 h-px bg-rgr-cyan"></span>
            </p>
            <h2 class="section-title text-4xl lg:text-5xl">Engineering Breakdown</h2>
        </div>

        {{-- Tab Navigation --}}
        <div class="flex flex-wrap gap-2 mb-10 justify-center" id="spec-tabs" role="tablist">
            @foreach($techSpecs as $key => $group)
            <button class="tab-btn {{ $loop->first ? 'active' : '' }}"
                    id="tab-{{ $key }}"
                    role="tab"
                    aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                    aria-controls="panel-{{ $key }}"
                    data-tab="{{ $key }}">
                {{ $group['title'] }}
            </button>
            @endforeach
        </div>

        {{-- Spec Panels --}}
        @foreach($techSpecs as $key => $group)
        <div class="{{ $loop->first ? 'block' : 'hidden' }}"
             id="panel-{{ $key }}"
             role="tabpanel"
             aria-labelledby="tab-{{ $key }}"
             data-reveal>

            <div class="grid lg:grid-cols-2 gap-8">

                {{-- Spec Table Card --}}
                <div class="spec-card {{ $group['color'] === 'cyan' ? 'cyan-accent' : 'white-accent' }} p-8">
                    {{-- Card Header --}}
                    <div class="flex items-center gap-4 mb-8">
                        <div class="icon-box">
                            @if($group['icon'] === 'bolt')
                            <svg class="w-6 h-6 text-rgr-cyan" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            @elseif($group['icon'] === 'wrench')
                            <svg class="w-6 h-6 text-rgr-cyan" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>
                            </svg>
                            @elseif($group['icon'] === 'wind')
                            <svg class="w-6 h-6 text-rgr-cyan" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path d="M9.59 4.59A2 2 0 1111 8H2m10.59 11.41A2 2 0 1014 16H2m15.73-8.27A2.5 2.5 0 1119.5 12H2"/>
                            </svg>
                            @else
                            <svg class="w-6 h-6 text-rgr-cyan" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/>
                                <path d="M12 2v4M12 18v4M2 12h4M18 12h4"/>
                            </svg>
                            @endif
                        </div>
                        <div>
                            <p class="text-muted text-xs font-racing tracking-widest uppercase">Technical Data</p>
                            <h3 class="text-ice font-display font-bold text-xl">{{ $group['title'] }}</h3>
                        </div>
                    </div>

                    {{-- Spec Rows --}}
                    <div>
                        @foreach($group['specs'] as $spec)
                        <div class="spec-row">
                            <span class="spec-key">{{ $spec['label'] }}</span>
                            <span class="spec-val {{ $group['color'] === 'cyan' ? 'highlighted' : '' }}">
                                {{ $spec['value'] }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Notes / Visual Card --}}
                <div class="spec-card cyan-accent p-8 flex flex-col justify-between">
                    <div>
                        <p class="section-label mb-4">Engineering Notes</p>
                        @if($key === 'aerodynamics' && $car->aerodynamics_notes)
                            <p class="text-ice-2 leading-relaxed text-sm">{{ $car->aerodynamics_notes }}</p>
                        @elseif($key === 'chassis' && $car->suspension_notes)
                            <p class="text-ice-2 leading-relaxed text-sm">{{ $car->suspension_notes }}</p>
                        @elseif($key === 'powertrain')
                            <p class="text-ice-2 leading-relaxed text-sm">
                                The RGR-HP2026 Hybrid V6 represents RGR's most advanced power unit,
                                combining a turbocharged 1.6-litre V6 ICE with a dual-motor hybrid
                                system. Energy harvested under braking is deployed instantaneously
                                to deliver seamless, linear power delivery throughout the rev range.
                            </p>
                        @else
                            <p class="text-ice-2 leading-relaxed text-sm">
                                The RGR-26 performance metrics are a result of relentless
                                wind-tunnel development and computational fluid dynamics
                                simulations. Every parameter is optimized for championship
                                performance across all circuit types.
                            </p>
                        @endif
                    </div>

                    {{-- Decorative Metric --}}
                    <div class="mt-8 pt-6 border-t border-rgr-cyan/08">
                        @if($key === 'powertrain')
                            <div class="flex items-center gap-4">
                                <span class="font-display font-black text-5xl text-rgr-cyan" style="text-shadow: 0 0 30px rgba(0,212,255,0.5)">{{ $car->power_hp ?? 1050 }}</span>
                                <div>
                                    <p class="text-ice font-bold text-lg">Combined HP</p>
                                    <p class="text-muted text-xs font-racing tracking-widest uppercase">ICE + ERS Output</p>
                                </div>
                            </div>
                        @elseif($key === 'chassis')
                            <div class="flex items-center gap-4">
                                <span class="font-display font-black text-5xl text-ice" style="text-shadow: 0 0 20px rgba(255,255,255,0.2)">{{ $car->weight ?? 798 }}</span>
                                <div>
                                    <p class="text-ice font-bold text-lg">Kilograms</p>
                                    <p class="text-muted text-xs font-racing tracking-widest uppercase">Minimum Race Weight</p>
                                </div>
                            </div>
                        @elseif($key === 'aerodynamics')
                            <div class="flex items-center gap-4">
                                <span class="font-display font-black text-5xl text-rgr-cyan" style="text-shadow: 0 0 30px rgba(0,212,255,0.5)">4800+</span>
                                <div>
                                    <p class="text-ice font-bold text-lg">Newtons</p>
                                    <p class="text-muted text-xs font-racing tracking-widest uppercase">Downforce at 250 km/h</p>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center gap-4">
                                <span class="font-display font-black text-5xl text-rgr-cyan" style="text-shadow: 0 0 30px rgba(0,212,255,0.5)">{{ $car->top_speed ?? 372 }}</span>
                                <div>
                                    <p class="text-ice font-bold text-lg">km/h</p>
                                    <p class="text-muted text-xs font-racing tracking-widest uppercase">Top Speed Record</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        @endforeach

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     DRIVER CTA
═══════════════════════════════════════════════════════════════ --}}
<section class="py-20 relative overflow-hidden" id="drivers-cta" aria-label="Drivers CTA">
    <div class="absolute inset-0" style="background: radial-gradient(ellipse at 50% 50%, rgba(0,212,255,0.05) 0%, transparent 70%);"></div>
    <div class="max-w-7xl mx-auto px-6 text-center" data-reveal>
        <p class="section-label mb-3">Behind the Wheel</p>
        <h2 class="section-title text-4xl lg:text-5xl mb-4">The Pilots</h2>
        <p class="text-ice-2 max-w-md mx-auto mb-8">Meet the drivers who push the RGR-26 to its absolute limit every race weekend.</p>
        <a href="{{ route('drivers') }}" class="btn-rgr inline-flex" id="cta-drivers-car-page">
            Meet Our Drivers
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script>
    // ── Tab Switching ──────────────────────────────────────────────
    document.querySelectorAll('[data-tab]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const tabKey = this.getAttribute('data-tab');

            // Deactivate all tabs & panels
            document.querySelectorAll('[data-tab]').forEach(function(b) {
                b.classList.remove('active');
                b.setAttribute('aria-selected', 'false');
            });
            document.querySelectorAll('[id^="panel-"]').forEach(function(p) {
                p.classList.add('hidden');
                p.classList.remove('block');
            });

            // Activate target
            this.classList.add('active');
            this.setAttribute('aria-selected', 'true');
            const panel = document.getElementById('panel-' + tabKey);
            if (panel) {
                panel.classList.remove('hidden');
                panel.classList.add('block');
            }
        });
    });

    // ── Performance Bar Animation ──────────────────────────────────
    const perfBars = document.querySelectorAll('.perf-bar-fill');
    const barObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                barObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });
    perfBars.forEach(bar => {
        bar.style.width = bar.getAttribute('data-width') + '%';
        bar.style.transform = 'translateX(-100%)';
        barObserver.observe(bar);
    });
</script>
@endpush
