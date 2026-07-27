@extends('layouts.rgr-premium')

@section('title', 'Rey Gilang Racing — Home')
@section('meta_description', 'Rey Gilang Racing — Indonesian Formula 1 Team. Meet our drivers, explore the RGR-26 E Performance, and track our 2026 season.')

@push('styles')
<style>
    /* ── Hero ─────────────────────────────────────────────────────── */
    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        background: #0F0F12;
    }

    .hero-bg-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(0,212,255,0.04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0,212,255,0.04) 1px, transparent 1px);
        background-size: 80px 80px;
        animation: gridMove 20s linear infinite;
    }
    @keyframes gridMove {
        0%   { transform: translate(0, 0); }
        100% { transform: translate(80px, 80px); }
    }

    .hero-bg-glow {
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translateX(-50%);
        width: 800px;
        height: 500px;
        background: radial-gradient(ellipse, rgba(0,212,255,0.08) 0%, transparent 70%);
        pointer-events: none;
    }
    .hero-bg-glow-2 {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 400px;
        height: 400px;
        background: radial-gradient(ellipse, rgba(255,30,60,0.05) 0%, transparent 70%);
        pointer-events: none;
    }

    /* ── Hero Typography ──────────────────────────────────────────── */
    .hero-team-name {
        font-family: 'Orbitron', sans-serif;
        font-weight: 900;
        font-size: clamp(3rem, 8vw, 8.5rem);
        line-height: 0.9;
        letter-spacing: -0.02em;
        color: #E8F4F8;
        text-shadow: 0 0 80px rgba(0,212,255,0.2);
    }
    .hero-team-name .highlight {
        display: block;
        background: linear-gradient(135deg, #00D4FF 0%, #ffffff 50%, #00D4FF 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        filter: drop-shadow(0 0 30px rgba(0,212,255,0.4));
    }

    .hero-chassis-label {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: #00D4FF;
    }

    /* ── Speed Lines ─────────────────────────────────────────────── */
    .speed-lines {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 6px;
        opacity: 0.25;
    }
    .speed-line {
        height: 1px;
        background: linear-gradient(90deg, transparent, #00D4FF);
        animation: speedIn 2.5s ease-out infinite;
    }
    .speed-line:nth-child(1) { width: 200px; animation-delay: 0s; }
    .speed-line:nth-child(2) { width: 300px; animation-delay: 0.2s; }
    .speed-line:nth-child(3) { width: 150px; animation-delay: 0.4s; }
    .speed-line:nth-child(4) { width: 280px; animation-delay: 0.6s; }
    .speed-line:nth-child(5) { width: 220px; animation-delay: 0.8s; }
    @keyframes speedIn {
        0%   { transform: translateX(100%); opacity: 0; }
        20%  { opacity: 1; }
        80%  { opacity: 0.5; }
        100% { transform: translateX(-50px); opacity: 0; }
    }

    /* ── Stat Pills ──────────────────────────────────────────────── */
    .stat-pill {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1rem 1.5rem;
        border: 1px solid rgba(0,212,255,0.15);
        background: rgba(22,22,27,0.6);
        backdrop-filter: blur(10px);
        position: relative;
        transition: all 0.3s ease;
    }
    .stat-pill::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, #00D4FF, transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }
    .stat-pill:hover { border-color: rgba(0,212,255,0.4); transform: translateY(-3px); }
    .stat-pill:hover::before { opacity: 1; }

    .stat-value {
        font-family: 'Orbitron', sans-serif;
        font-weight: 800;
        font-size: 2rem;
        line-height: 1;
        color: #00D4FF;
        text-shadow: 0 0 20px rgba(0,212,255,0.5);
    }
    .stat-label {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #6B7A8D;
        margin-top: 0.25rem;
    }

    /* ── Countdown ──────────────────────────────────────────────── */
    .countdown-panel {
        position: relative;
        background: linear-gradient(135deg, rgba(22,22,27,0.95), rgba(30,30,37,0.9));
        border: 1px solid rgba(0,212,255,0.15);
        overflow: hidden;
    }
    .countdown-panel::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, #00D4FF 30%, #00D4FF 70%, transparent);
    }
    .countdown-digit-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        background: rgba(0,212,255,0.04);
        border: 1px solid rgba(0,212,255,0.12);
        padding: 1rem 1.25rem;
        min-width: 80px;
        position: relative;
        overflow: hidden;
    }
    .countdown-digit-box::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 1px;
        background: rgba(0,212,255,0.2);
    }
    .countdown-num {
        font-family: 'Orbitron', sans-serif;
        font-weight: 900;
        font-size: 2.5rem;
        line-height: 1;
        color: #00D4FF;
        text-shadow: 0 0 25px rgba(0,212,255,0.6);
    }
    .countdown-label {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.6rem;
        font-weight: 700;
        letter-spacing: 0.2em;
        color: #6B7A8D;
        margin-top: 0.35rem;
        text-transform: uppercase;
    }

    /* ── Driver Card ────────────────────────────────────────────── */
    .driver-card {
        position: relative;
        background: linear-gradient(160deg, rgba(22,22,27,0.9), rgba(15,15,18,0.95));
        border: 1px solid rgba(0,212,255,0.1);
        overflow: hidden;
        cursor: pointer;
        transition: all 0.45s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .driver-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, #00D4FF, transparent);
        transform: translateX(-100%);
        transition: transform 0.5s ease;
    }
    .driver-card:hover::before { transform: translateX(100%); }
    .driver-card:hover {
        border-color: rgba(0,212,255,0.35);
        box-shadow: 0 25px 70px rgba(0,0,0,0.7), 0 0 40px rgba(0,212,255,0.15), inset 0 0 30px rgba(0,212,255,0.03);
        transform: translateY(-6px);
    }

    .driver-number {
        position: absolute;
        right: -10px;
        top: 50%;
        transform: translateY(-50%);
        font-family: 'Orbitron', sans-serif;
        font-weight: 900;
        font-size: 10rem;
        line-height: 1;
        color: rgba(0,212,255,0.04);
        user-select: none;
        pointer-events: none;
        transition: color 0.4s ease, font-size 0.4s ease;
    }
    .driver-card:hover .driver-number {
        color: rgba(0,212,255,0.08);
        font-size: 11rem;
    }

    .driver-portrait {
        width: 100%;
        height: 320px;
        object-fit: cover;
        object-position: top center;
        filter: grayscale(20%) contrast(1.1);
        transition: filter 0.4s ease, transform 0.5s ease;
    }
    .driver-card:hover .driver-portrait {
        filter: grayscale(0%) contrast(1.15);
        transform: scale(1.03);
    }

    .driver-portrait-placeholder {
        width: 100%;
        height: 320px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        background: linear-gradient(180deg, rgba(0,212,255,0.03) 0%, rgba(0,212,255,0.08) 100%);
        position: relative;
        overflow: hidden;
    }
    .driver-silhouette {
        width: 60%;
        height: 85%;
        background: linear-gradient(180deg, rgba(0,212,255,0.15) 0%, rgba(0,212,255,0.05) 100%);
        clip-path: polygon(30% 0%, 70% 0%, 80% 15%, 80% 60%, 100% 100%, 0% 100%, 20% 60%, 20% 15%);
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .driver-flag {
        font-size: 1.5rem;
        line-height: 1;
    }

    /* ── Schedule Strip ─────────────────────────────────────────── */
    .race-row {
        display: grid;
        grid-template-columns: auto 1fr auto auto;
        align-items: center;
        gap: 1.5rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(0,212,255,0.06);
        transition: all 0.3s ease;
    }
    .race-row:hover {
        background: rgba(0,212,255,0.04);
        border-bottom-color: rgba(0,212,255,0.15);
    }
    .race-row:last-child { border-bottom: none; }

    .round-badge {
        font-family: 'Orbitron', sans-serif;
        font-size: 0.7rem;
        font-weight: 700;
        color: #6B7A8D;
        min-width: 2rem;
        text-align: center;
    }
    .status-badge {
        font-family: 'Rajdhani', sans-serif;
        font-size: 0.65rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        padding: 0.2rem 0.6rem;
    }
    .status-upcoming {
        color: #00D4FF;
        border: 1px solid rgba(0,212,255,0.4);
        background: rgba(0,212,255,0.08);
    }
    .status-finished {
        color: #6B7A8D;
        border: 1px solid rgba(107,122,141,0.3);
    }
</style>
@endpush

@section('content')

{{-- ═══════════════════════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════════════════════ --}}
<section class="hero-section" id="hero" aria-label="Hero Banner">
    <div class="hero-bg-grid"></div>
    <div class="hero-bg-glow"></div>
    <div class="hero-bg-glow-2"></div>

    {{-- Speed Lines (right side decoration) --}}
    <div class="speed-lines">
        <div class="speed-line"></div>
        <div class="speed-line"></div>
        <div class="speed-line"></div>
        <div class="speed-line"></div>
        <div class="speed-line"></div>
    </div>

    {{-- Vertical Accent Left --}}
    <div class="absolute left-0 top-0 bottom-0 w-[3px] hidden lg:block"
         style="background: linear-gradient(180deg, transparent, #00D4FF 40%, #00D4FF 60%, transparent);">
    </div>

    <div class="max-w-7xl mx-auto px-6 w-full pt-[104px]">
        <div class="grid lg:grid-cols-2 gap-16 items-center min-h-screen py-20">

            {{-- Left: Text Content --}}
            <div class="animate-slide-up">
                <p class="hero-chassis-label mb-4 flex items-center gap-3">
                    <span class="w-8 h-px bg-rgr-cyan inline-block"></span>
                    Formula 1 · Season 2026
                </p>

                <h1 class="hero-team-name mb-6">
                    REY<br>
                    <span class="highlight">GILANG</span>
                    RACING
                </h1>

                <p class="text-ice-2 text-lg leading-relaxed max-w-md mb-4">
                    Indonesian-born. Globally dominant. The RGR-26 E Performance is engineered at the bleeding edge of
                    aerodynamics, power, and precision.
                </p>

                <p class="text-muted text-sm mb-10 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-rgr-cyan inline-block animate-pulse"></span>
                    Principal: <span class="text-ice ml-1">Rey Gilang</span>
                    &nbsp;·&nbsp; Base: <span class="text-ice ml-1">Jakarta, Indonesia</span>
                </p>

                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="{{ route('car.specs') }}" class="btn-rgr" id="cta-explore-car">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Explore RGR-26
                    </a>
                    <a href="{{ route('drivers') }}" class="btn-rgr-outline" id="cta-drivers">
                        Meet the Drivers
                    </a>
                </div>

                {{-- Team Stats --}}
                @if($team)
                <div class="flex flex-wrap gap-3">
                    <div class="stat-pill">
                        <span class="stat-value">{{ $team->constructors_titles }}</span>
                        <span class="stat-label">Constructor<br>Titles</span>
                    </div>
                    <div class="stat-pill">
                        <span class="stat-value">{{ $team->drivers_titles }}</span>
                        <span class="stat-label">Driver<br>Titles</span>
                    </div>
                    @if($activeCar)
                    <div class="stat-pill">
                        <span class="stat-value">{{ number_format($activeCar->top_speed) }}</span>
                        <span class="stat-label">Top Speed<br>km/h</span>
                    </div>
                    <div class="stat-pill">
                        <span class="stat-value">{{ number_format($activeCar->power_hp) }}</span>
                        <span class="stat-label">Combined<br>HP</span>
                    </div>
                    @endif
                </div>
                @endif
            </div>

            {{-- Right: Car Visual --}}
            <div class="relative hidden lg:flex items-center justify-center" data-reveal>
                {{-- Glow Ring --}}
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-[480px] h-[480px] rounded-full border border-rgr-cyan/10"
                         style="animation: glowPulse 4s ease-in-out infinite;"></div>
                    <div class="absolute w-[360px] h-[360px] rounded-full border border-rgr-cyan/06"
                         style="animation: glowPulse 4s ease-in-out infinite 0.5s;"></div>
                </div>

                {{-- Car Silhouette SVG --}}
                <div class="relative z-10 text-center">
                    <svg viewBox="0 0 800 250" class="w-full max-w-xl" xmlns="http://www.w3.org/2000/svg">
                        <!-- F1 Car simplified side-view SVG -->
                        <defs>
                            <linearGradient id="bodyGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%"   stop-color="#1E1E25"/>
                                <stop offset="50%"  stop-color="#252530"/>
                                <stop offset="100%" stop-color="#1a1a22"/>
                            </linearGradient>
                            <linearGradient id="cyanAccent" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%"   stop-color="#00D4FF" stop-opacity="0.0"/>
                                <stop offset="40%"  stop-color="#00D4FF" stop-opacity="1.0"/>
                                <stop offset="100%" stop-color="#00D4FF" stop-opacity="0.0"/>
                            </linearGradient>
                            <filter id="glowFilter">
                                <feGaussianBlur stdDeviation="3" result="blur"/>
                                <feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge>
                            </filter>
                        </defs>

                        <!-- Shadow -->
                        <ellipse cx="400" cy="235" rx="280" ry="12" fill="rgba(0,212,255,0.08)"/>

                        <!-- Rear Wheel -->
                        <circle cx="220" cy="200" r="42" fill="#1a1a22" stroke="#00D4FF" stroke-width="1.5" opacity="0.9"/>
                        <circle cx="220" cy="200" r="28" fill="#0F0F12" stroke="rgba(0,212,255,0.3)" stroke-width="1"/>
                        <circle cx="220" cy="200" r="8"  fill="#00D4FF" opacity="0.6"/>

                        <!-- Front Wheel -->
                        <circle cx="590" cy="200" r="38" fill="#1a1a22" stroke="#00D4FF" stroke-width="1.5" opacity="0.9"/>
                        <circle cx="590" cy="200" r="25" fill="#0F0F12" stroke="rgba(0,212,255,0.3)" stroke-width="1"/>
                        <circle cx="590" cy="200" r="8"  fill="#00D4FF" opacity="0.6"/>

                        <!-- Main Body -->
                        <path d="M180,190 L180,150 Q190,120 240,115 L380,108 Q430,60 510,58 L600,60 Q650,62 680,80 L690,110 L680,150 L180,190 Z"
                              fill="url(#bodyGrad)" stroke="rgba(0,212,255,0.2)" stroke-width="0.5"/>

                        <!-- Cockpit / Halo -->
                        <path d="M380,108 Q420,75 480,68 Q510,65 530,70 L560,80 Q540,85 510,90 Q460,100 420,105 Z"
                              fill="#16161B" stroke="rgba(0,212,255,0.25)" stroke-width="0.5"/>
                        <!-- Halo device -->
                        <path d="M420,75 Q450,55 490,55 Q520,55 540,65" stroke="#00D4FF" stroke-width="2" fill="none" opacity="0.7" filter="url(#glowFilter)"/>

                        <!-- Cyan accent stripe along body -->
                        <path d="M200,155 L650,115" stroke="url(#cyanAccent)" stroke-width="2.5" fill="none" filter="url(#glowFilter)"/>
                        <path d="M200,162 L650,122" stroke="url(#cyanAccent)" stroke-width="1" fill="none" opacity="0.4"/>

                        <!-- M1TRG Livery Text -->
                        <text x="350" y="148" font-family="Orbitron,sans-serif" font-weight="900" font-size="16"
                              fill="rgba(0,212,255,0.6)" letter-spacing="3">RGR</text>

                        <!-- Rear Wing -->
                        <rect x="145" y="105" width="52" height="6" rx="1" fill="#1E1E25" stroke="#00D4FF" stroke-width="0.8"/>
                        <rect x="155" y="120" width="32" height="4" rx="1" fill="#1E1E25" stroke="rgba(0,212,255,0.3)" stroke-width="0.5"/>
                        <line x1="171" y1="105" x2="171" y2="160" stroke="rgba(0,212,255,0.3)" stroke-width="1"/>

                        <!-- Front Wing -->
                        <path d="M620,170 L695,172 L700,180 L620,182 Z" fill="#1E1E25" stroke="#00D4FF" stroke-width="0.8"/>
                        <path d="M625,165 L690,167 L693,170 L625,170 Z" fill="#252530" stroke="rgba(0,212,255,0.4)" stroke-width="0.5"/>

                        <!-- Engine Air Intake -->
                        <ellipse cx="480" cy="62" rx="22" ry="12" fill="#0F0F12" stroke="rgba(0,212,255,0.4)" stroke-width="1"/>
                    </svg>

                    <p class="font-display font-bold text-rgr-cyan/60 text-sm tracking-widest mt-2">
                        RGR-26 E PERFORMANCE
                    </p>
                </div>
            </div>

        </div>
    </div>

    {{-- Bottom gradient fade --}}
    <div class="absolute bottom-0 left-0 right-0 h-32 pointer-events-none"
         style="background: linear-gradient(0deg, #0F0F12 0%, transparent 100%);">
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce opacity-50">
        <span class="text-muted text-xs font-racing tracking-widest uppercase">Scroll</span>
        <svg class="w-4 h-4 text-rgr-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     RACE COUNTDOWN SECTION
═══════════════════════════════════════════════════════════════ --}}
<section class="py-20 grid-bg relative" id="countdown" aria-label="Next Race Countdown">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-10 items-start">

            {{-- Left: Next Race Info --}}
            @if($nextRace)
            <div data-reveal>
                <p class="section-label mb-3 flex items-center gap-3">
                    <span class="w-6 h-px bg-rgr-cyan inline-block"></span>
                    Next Race
                </p>
                <h2 class="section-title text-4xl lg:text-5xl mb-6">
                    {{ $nextRace->grand_prix_name }}
                </h2>
                <div class="flex flex-wrap gap-6 mb-8">
                    <div>
                        <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">Circuit</p>
                        <p class="text-ice font-medium">{{ $nextRace->circuit_name }}</p>
                    </div>
                    <div>
                        <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">Country</p>
                        <p class="text-ice font-medium">{{ $nextRace->country }}</p>
                    </div>
                    <div>
                        <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">Race Date</p>
                        <p class="text-ice font-medium">{{ $nextRace->race_date->format('d M Y · H:i') }} WIB</p>
                    </div>
                    @if($nextRace->round_number)
                    <div>
                        <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">Round</p>
                        <p class="text-ice font-medium">Round {{ $nextRace->round_number }} / 22</p>
                    </div>
                    @endif
                </div>
                <a href="{{ route('schedule') }}" class="btn-rgr-outline" id="btn-full-schedule">
                    Full Race Calendar
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            @else
            <div data-reveal>
                <p class="section-label mb-3">Season</p>
                <h2 class="section-title text-4xl mb-4">Season 2026</h2>
                <p class="text-muted">All races for the 2026 season have been completed.</p>
            </div>
            @endif

            {{-- Right: Countdown Panel --}}
            <div class="countdown-panel p-8 lg:p-10" data-reveal id="countdown-panel">
                @if($nextRace && $nextRace->is_upcoming)
                <p class="section-label mb-6 text-center">
                    Race Starts In
                </p>
                <div class="flex justify-center gap-3 flex-wrap" id="countdown-display">
                    <div class="countdown-digit-box">
                        <span class="countdown-num" id="cd-days">00</span>
                        <span class="countdown-label">Days</span>
                    </div>
                    <div class="text-rgr-cyan font-display font-black text-3xl self-center">:</div>
                    <div class="countdown-digit-box">
                        <span class="countdown-num" id="cd-hours">00</span>
                        <span class="countdown-label">Hours</span>
                    </div>
                    <div class="text-rgr-cyan font-display font-black text-3xl self-center">:</div>
                    <div class="countdown-digit-box">
                        <span class="countdown-num" id="cd-mins">00</span>
                        <span class="countdown-label">Mins</span>
                    </div>
                    <div class="text-rgr-cyan font-display font-black text-3xl self-center">:</div>
                    <div class="countdown-digit-box">
                        <span class="countdown-num" id="cd-secs">00</span>
                        <span class="countdown-label">Secs</span>
                    </div>
                </div>
                <div class="mt-8 pt-6 border-t border-rgr-cyan/10">
                    @if($nextRace->qualifying_date)
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-muted font-racing tracking-wide uppercase text-xs">Qualifying</span>
                        <span class="text-ice">{{ $nextRace->qualifying_date->format('d M · H:i') }}</span>
                    </div>
                    @endif
                    @if($nextRace->practice1_date)
                    <div class="flex justify-between text-sm">
                        <span class="text-muted font-racing tracking-wide uppercase text-xs">Practice 1</span>
                        <span class="text-ice">{{ $nextRace->practice1_date->format('d M · H:i') }}</span>
                    </div>
                    @endif
                </div>
                @else
                <div class="flex flex-col items-center justify-center h-40 text-center">
                    <p class="section-label mb-2">Season Wrap</p>
                    <p class="text-ice text-xl font-display font-bold">2026 Campaign Complete</p>
                    <p class="text-muted mt-2 text-sm">See you in 2027</p>
                </div>
                @endif
            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     DRIVER LINEUP SECTION
═══════════════════════════════════════════════════════════════ --}}
<section class="py-24 relative" id="drivers-section" aria-label="Driver Lineup">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4" data-reveal>
            <div>
                <p class="section-label mb-2 flex items-center gap-3">
                    <span class="w-6 h-px bg-rgr-cyan inline-block"></span>
                    2026 Line-Up
                </p>
                <h2 class="section-title text-4xl lg:text-5xl">Our Drivers</h2>
            </div>
            <a href="{{ route('drivers') }}" class="btn-rgr-outline self-start sm:self-auto" id="btn-all-drivers">
                All Profiles
            </a>
        </div>

        {{-- Driver Grid (Asymmetric: first card larger) --}}
        @if($drivers->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($drivers as $index => $driver)
            <div class="driver-card {{ $index === 0 ? 'md:col-span-2 lg:col-span-1' : '' }}"
                 data-reveal style="transition-delay: {{ $index * 150 }}ms;"
                 id="driver-card-{{ $driver->id }}">

                {{-- Big Background Number --}}
                <span class="driver-number">{{ $driver->permanent_number }}</span>

                {{-- Portrait --}}
                @if($driver->profile_image)
                    <img src="{{ asset('storage/' . $driver->profile_image) }}"
                         alt="{{ $driver->name }} — M1TRG Race Driver"
                         class="driver-portrait"
                         loading="lazy" decoding="async">
                @else
                    {{-- Placeholder portrait with animated silhouette --}}
                    <div class="driver-portrait-placeholder">
                        <div class="driver-silhouette"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="font-display font-black text-6xl text-rgr-cyan/20">
                                {{ $driver->permanent_number }}
                            </span>
                        </div>
                    </div>
                @endif

                {{-- Card Info --}}
                <div class="p-5 relative z-10">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">
                                {{ $driver->country_code ?? $driver->country }}
                            </p>
                            <h3 class="text-ice font-display font-bold text-xl leading-tight">
                                {{ $driver->name }}
                            </h3>
                        </div>
                        <span class="text-rgr-cyan font-display font-black text-2xl leading-none">
                            #{{ $driver->permanent_number }}
                        </span>
                    </div>
                    <p class="text-muted text-xs font-racing tracking-widest uppercase mb-4">
                        {{ $driver->role }}
                    </p>

                    {{-- Stats Row --}}
                    <div class="grid grid-cols-2 gap-3 pt-4 border-t border-rgr-cyan/08">
                        <div>
                            <p class="text-rgr-cyan font-display font-bold text-lg">{{ $driver->podiums }}</p>
                            <p class="text-muted text-xs font-racing tracking-wide uppercase">Podiums</p>
                        </div>
                        <div>
                            <p class="text-rgr-cyan font-display font-bold text-lg">{{ number_format($driver->career_points, 0) }}</p>
                            <p class="text-muted text-xs font-racing tracking-wide uppercase">Pts Career</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 border border-steel/30">
            <p class="text-muted">Driver data is currently unavailable.</p>
        </div>
        @endif

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     CAR TEASER SECTION
═══════════════════════════════════════════════════════════════ --}}
<section class="py-20 relative overflow-hidden" id="car-teaser" aria-label="Car Teaser">
    {{-- Background --}}
    <div class="absolute inset-0 grid-bg opacity-50"></div>
    <div class="absolute inset-0" style="background: radial-gradient(ellipse at 50% 50%, rgba(0,212,255,0.06) 0%, transparent 65%);"></div>

    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="text-center mb-12" data-reveal>
            <p class="section-label mb-3 flex items-center justify-center gap-3">
                <span class="w-8 h-px bg-rgr-cyan inline-block"></span>
                2026 Machine
                <span class="w-8 h-px bg-rgr-cyan inline-block"></span>
            </p>
            <h2 class="section-title text-5xl lg:text-6xl mb-4">
                @if($activeCar) {{ $activeCar->model_name }} @else RGR-26 @endif
            </h2>
            <p class="text-ice-2 max-w-lg mx-auto leading-relaxed">
                Every millimeter engineered to dominate. The RGR-26 E Performance is our most sophisticated machine yet —
                a fusion of raw power and surgical aerodynamics.
            </p>
        </div>

        {{-- Spec Highlights --}}
        @if($activeCar)
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12" data-reveal>
            @foreach([
                ['label' => 'Power Unit', 'value' => $activeCar->power_unit],
                ['label' => 'Horsepower', 'value' => number_format($activeCar->power_hp) . ' HP'],
                ['label' => 'Top Speed',  'value' => $activeCar->top_speed . ' km/h'],
                ['label' => 'Weight',     'value' => $activeCar->weight . ' kg'],
            ] as $spec)
            <div class="rgr-card p-5 text-center">
                <p class="text-rgr-cyan font-display font-bold text-lg leading-tight mb-1">{{ $spec['value'] }}</p>
                <p class="text-muted text-xs font-racing tracking-widest uppercase">{{ $spec['label'] }}</p>
            </div>
            @endforeach
        </div>
        @endif

        <div class="text-center" data-reveal>
            <a href="{{ route('car.specs') }}" class="btn-rgr inline-flex" id="btn-car-specs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/>
                </svg>
                Explore Full Car Specs
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     RECENT / UPCOMING RACE STRIP
═══════════════════════════════════════════════════════════════ --}}
@if(isset($raceSchedules) && $raceSchedules->isNotEmpty())
<section class="py-20" id="race-strip" aria-label="Race Schedule Strip">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-end justify-between mb-10" data-reveal>
            <div>
                <p class="section-label mb-2 flex items-center gap-3">
                    <span class="w-6 h-px bg-rgr-cyan inline-block"></span>
                    Calendar
                </p>
                <h2 class="section-title text-4xl">Race Schedule</h2>
            </div>
            <a href="{{ route('schedule') }}" class="btn-rgr-outline hidden sm:inline-flex" id="btn-schedule-all">
                Full Calendar
            </a>
        </div>

        <div class="rgr-card overflow-hidden" data-reveal>
            {{-- Upcoming Races --}}
            @if(isset($raceSchedules['Upcoming']))
            @foreach($raceSchedules['Upcoming']->take(5) as $race)
            <div class="race-row">
                <span class="round-badge">R{{ $race->round_number ?? '—' }}</span>
                <div>
                    <p class="text-ice font-medium text-sm">{{ $race->grand_prix_name }}</p>
                    <p class="text-muted text-xs mt-0.5">{{ $race->circuit_name }}</p>
                </div>
                <p class="text-ice-2 text-xs font-racing tracking-wide hidden sm:block">
                    {{ $race->race_date->format('d M Y') }}
                </p>
                <span class="status-badge status-upcoming">Upcoming</span>
            </div>
            @endforeach
            @endif

            {{-- Finished Races (last 3) --}}
            @if(isset($raceSchedules['Finished']))
            @foreach($raceSchedules['Finished']->take(3) as $race)
            <div class="race-row opacity-60">
                <span class="round-badge">R{{ $race->round_number ?? '—' }}</span>
                <div>
                    <p class="text-ice-2 font-medium text-sm line-through decoration-muted">{{ $race->grand_prix_name }}</p>
                    <p class="text-muted text-xs mt-0.5">{{ $race->circuit_name }}</p>
                </div>
                <p class="text-muted text-xs font-racing tracking-wide hidden sm:block">
                    {{ $race->race_date->format('d M Y') }}
                </p>
                <span class="status-badge status-finished">Finished</span>
            </div>
            @endforeach
            @endif
        </div>

    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
    // ── Countdown Timer ────────────────────────────────────────────
    (function () {
        const totalSeconds = {{ $countdownSeconds ?? 0 }};
        if (totalSeconds <= 0) return;

        const raceTime = Date.now() + totalSeconds * 1000;

        const cdDays  = document.getElementById('cd-days');
        const cdHours = document.getElementById('cd-hours');
        const cdMins  = document.getElementById('cd-mins');
        const cdSecs  = document.getElementById('cd-secs');

        if (!cdDays) return;

        function pad(n) { return String(n).padStart(2, '0'); }

        function tick() {
            const diff = Math.max(0, Math.floor((raceTime - Date.now()) / 1000));
            const d = Math.floor(diff / 86400);
            const h = Math.floor((diff % 86400) / 3600);
            const m = Math.floor((diff % 3600) / 60);
            const s = diff % 60;

            cdDays.textContent  = pad(d);
            cdHours.textContent = pad(h);
            cdMins.textContent  = pad(m);
            cdSecs.textContent  = pad(s);

            if (diff > 0) {
                requestAnimationFrame(() => setTimeout(tick, 1000));
            }
        }

        tick();
    })();
</script>
@endpush
