@extends('layouts.rgr-premium')

@section('title', 'Mobil 1 Team RG — Kekuatan Motorsport Global')
@section('meta_description', 'Mobil 1 Team RG — Konstruktor balap Formula 1 dan Endurance asal Indonesia. Berkompetisi di FIA F1, WEC, IMSA, dan Nürburgring 24 Jam.')

@push('styles')
<style>
.hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: #0B0D10; /* Terang premium */
}
.hero-video-container {
    position: absolute; inset: 0; z-index: 0; overflow: hidden;
}
.hero-video-container video {
    width: 100%; height: 100%; object-fit: cover; opacity: 0.15; filter: brightness(1.1) contrast(1.0) saturate(1.0) grayscale(0.5);
}
.hero-video-overlay {
    position: absolute; inset: 0;
    background: radial-gradient(circle at 60% 40%, rgba(244, 246, 249, 0.2) 20%, #0B0D10 85%);
    z-index: 1;
}
.hero-grid {
    position: absolute; inset: 0; z-index: 2;
    background-image:
        linear-gradient(rgba(200,255,46,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(200,255,46,0.03) 1px, transparent 1px);
    background-size: 72px 72px;
    animation: gridShift 25s linear infinite;
}
@keyframes gridShift { 0%{transform:translate(0,0)} 100%{transform:translate(72px,72px)} }

.hero-radial {
    position: absolute; inset: 0; z-index: 2;
    background: radial-gradient(ellipse 70% 55% at 60% 45%, rgba(200,255,46,0.06) 0%, transparent 70%);
}
.hero-vline {
    position: absolute; left: 0; top: 0; bottom: 0; z-index: 3;
    width: 3px;
    background: linear-gradient(180deg, transparent, #C8FF2E 30%, #C8FF2E 70%, transparent);
}
.hero-speed-lines {
    position: absolute; right: 0; top: 50%; transform: translateY(-50%); z-index: 2;
    display: flex; flex-direction: column; gap: 8px; opacity: 0.2;
}
.hero-speed-line {
    height: 1px;
    background: linear-gradient(90deg, transparent, #C8FF2E);
    animation: speedLine 3s ease-out infinite;
}
.hero-speed-line:nth-child(1){width:240px;animation-delay:0s}
.hero-speed-line:nth-child(2){width:160px;animation-delay:0.25s}
.hero-speed-line:nth-child(3){width:300px;animation-delay:0.5s}
.hero-speed-line:nth-child(4){width:200px;animation-delay:0.75s}
.hero-speed-line:nth-child(5){width:280px;animation-delay:1s}
@keyframes speedLine{0%{transform:translateX(100%);opacity:0}15%{opacity:1}85%{opacity:0.4}100%{transform:translateX(-100px);opacity:0}}

.hero-wordmark {
    font-family: 'Albert Sans', sans-serif;
    font-weight: 900;
    font-size: clamp(3.5rem, 9vw, 9.5rem);
    line-height: 0.88;
    letter-spacing: -0.02em;
    color: #FFFEFE;
}
.hero-wordmark .accent {
    display: block;
    background: linear-gradient(135deg, #C8FF2E 0%, #D97706 50%, #F5A623 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    filter: drop-shadow(0 0 35px rgba(200,255,46,0.35));
}

/* ── STAT PILL ─────────────────────────────────────────────────── */
.stat-pill {
    display: flex; flex-direction: column; align-items: center;
    padding: 0.9rem 1.4rem;
    border: 1px solid rgba(200,255,46,0.1);
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(8px);
    position: relative; overflow: hidden;
    transition: all 0.3s ease;
}
.stat-pill::before {
    content:''; position:absolute; top:0; left:0; right:0; height:2px;
    background: linear-gradient(90deg,transparent,#C8FF2E,transparent);
    opacity:0; transition:opacity 0.3s;
}
.stat-pill:hover { border-color:rgba(200,255,46,0.3); transform:translateY(-3px); }
.stat-pill:hover::before { opacity:1; }
.stat-pill-val {
    font-family:'Orbitron',sans-serif; font-weight:900; font-size:2rem;
    line-height:1; color:#C8FF2E;
    text-shadow: 0 1px 3px rgba(200,255,46,0.15);
}
.stat-pill-lbl {
    font-family:'Rajdhani',sans-serif; font-size:0.65rem; font-weight:700;
    letter-spacing:0.2em; text-transform:uppercase; color:#4B5563; margin-top:0.3rem;
}

/* ── TELEMETRY ─────────────────────────────────────────────────── */
.telemetry-panel {
    position: relative;
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(244,246,249,0.95));
    border: 1px solid rgba(200,255,46,0.12);
    overflow: hidden;
}
.telemetry-panel::before {
    content:''; position:absolute; top:0; left:0; right:0; height:2px;
    background: linear-gradient(90deg, transparent, #C8FF2E 30%, #C8FF2E 70%, transparent);
}
.telemetry-scan {
    position: absolute; left:0; right:0; height:1px;
    background: linear-gradient(90deg,transparent,rgba(200,255,46,0.25),transparent);
    animation: tScan 3.5s linear infinite; pointer-events:none;
}
@keyframes tScan{0%{top:-1px}100%{top:100%}}

.rpm-track {
    width: 100%; height: 6px;
    background: rgba(200,255,46,0.1);
    border-radius: 3px; overflow: hidden;
}
.rpm-fill {
    height: 100%; border-radius: 3px;
    background: linear-gradient(90deg, #C8FF2E, #F5A623);
    box-shadow: 0 0 12px rgba(200,255,46,0.4);
    transition: width 0.5s ease;
}
.gear-display {
    font-family:'Orbitron',sans-serif; font-weight:900; font-size:5rem; line-height:1;
    color:#C8FF2E; text-shadow:0 0 20px rgba(200,255,46,0.3);
    text-align:center; width:100%;
}
.speed-display {
    font-family:'Orbitron',sans-serif; font-weight:900;
    font-size:3.5rem; line-height:1; color:#111827;
    text-shadow:0 1px 3px rgba(17,24,39,0.15); text-align:center;
}
.tele-label {
    font-family:'Rajdhani',sans-serif; font-size:0.65rem; font-weight:700;
    letter-spacing:0.22em; text-transform:uppercase; color:#4B5563;
    text-align:center; margin-top:0.25rem;
}

/* ── COUNTDOWN ─────────────────────────────────────────────────── */
.countdown-box {
    display:flex; flex-direction:column; align-items:center;
    background:rgba(200,255,46,0.03); border:1px solid rgba(200,255,46,0.08);
    padding:1rem 1.2rem; min-width:76px; position:relative;
}
.countdown-box::after {
    content:''; position:absolute; left:50%; top:50%;
    transform:translate(-50%,-50%); width:100%; height:1px;
    background:rgba(200,255,46,0.08);
}
.countdown-num {
    font-family:'Orbitron',sans-serif; font-weight:900; font-size:2.5rem;
    line-height:1; color:#C8FF2E; text-shadow:0 1px 3px rgba(200,255,46,0.15);
}
.countdown-unit {
    font-family:'Rajdhani',sans-serif; font-size:0.58rem; font-weight:700;
    letter-spacing:0.2em; text-transform:uppercase; color:#4B5563; margin-top:0.3rem;
}

/* ── DRIVER CARD ───────────────────────────────────────────────── */
.driver-card {
    position:relative; overflow:hidden;
    background: linear-gradient(160deg,rgba(255,255,255,0.98),rgba(248,249,250,0.95));
    border:1px solid rgba(200,255,46,0.08);
    cursor:pointer;
    transition: all 0.5s cubic-bezier(0.23,1,0.32,1);
}
.driver-card::before {
    content:''; position:absolute; top:0; left:0; right:0; height:2px;
    background:linear-gradient(90deg,transparent,#C8FF2E,transparent);
    transform:translateX(-100%); transition:transform 0.6s ease;
}
.driver-card:hover::before { transform:translateX(100%); }
.driver-card:hover {
    border-color:rgba(200,255,46,0.22);
    box-shadow:0 30px 80px rgba(0,0,0,0.06), 0 0 50px rgba(200,255,46,0.05);
    transform:translateY(-6px);
}
.driver-bg-number {
    position:absolute; right:-1rem; top:50%; transform:translateY(-50%);
    font-family:'Orbitron',sans-serif; font-weight:900; font-size:12rem; line-height:1;
    color:rgba(200,255,46,0.02); pointer-events:none; user-select:none;
    transition: color 0.5s ease, font-size 0.5s ease;
}
.driver-card:hover .driver-bg-number {
    color:rgba(200,255,46,0.04); font-size:14rem;
}
.driver-portrait {
    width:100%; height:320px; object-fit:cover; object-position:top;
    filter:grayscale(10%) contrast(1.05);
    transition:filter 0.5s ease, transform 0.5s ease;
}
.driver-card:hover .driver-portrait { filter:grayscale(0%) contrast(1.1); transform:scale(1.03); }
.driver-portrait-placeholder {
    width:100%; height:320px;
    background:linear-gradient(180deg, rgba(200,255,46,0.02) 0%, rgba(244,246,249,0.8) 100%);
    display:flex; align-items:center; justify-content:center; position:relative; overflow:hidden;
}

/* ── NEWS CARD ─────────────────────────────────────────────────── */
.news-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(200,255,46,0.08);
    overflow:hidden; transition: all 0.4s ease;
}
.news-card:hover {
    border-color: rgba(200,255,46,0.22);
    box-shadow: 0 25px 70px rgba(0,0,0,0.06);
    transform:translateY(-3px);
}
.news-cat-badge {
    font-family:'Rajdhani',sans-serif; font-size:0.62rem; font-weight:700;
    letter-spacing:0.2em; text-transform:uppercase; padding:0.2rem 0.6rem;
    background: rgba(200,255,46,0.08); color:#C8FF2E;
    border: 1px solid rgba(200,255,46,0.2);
}
.news-image-placeholder {
    width:100%; height:200px;
    background:linear-gradient(135deg, rgba(200,255,46,0.02) 0%, rgba(244,246,249,0.8) 100%);
    display:flex; align-items:center; justify-content:center;
}

/* ── RACE GALLERY CARD ────────────────────────────────────────── */
.race-gallery-card {
    position:relative; overflow:hidden;
    border:1px solid rgba(200,255,46,0.08);
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    transition: all 0.4s ease;
    text-decoration: none; display:block;
}
.race-gallery-card:hover {
    border-color: rgba(200,255,46,0.22);
    transform: translateX(6px);
    box-shadow: 0 25px 70px rgba(0,0,0,0.06);
}
.race-gallery-card::before {
    content:''; position:absolute; top:0; left:0; width:3px; height:0;
    background:#C8FF2E; box-shadow:0 0 10px rgba(200,255,46,0.5);
    transition:height 0.4s ease;
}
.race-gallery-card:hover::before { height:100%; }

/* ── ENDURANCE HUB CARD ────────────────────────────────────────── */
.endo-card {
    position:relative; overflow:hidden;
    border:1px solid rgba(200,255,46,0.08);
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    transition: all 0.4s ease;
    text-decoration: none; display:block;
}
.endo-card:hover {
    border-color: rgba(200,255,46,0.22);
    transform: translateX(6px);
    box-shadow: 0 25px 70px rgba(0,0,0,0.06);
}
.endo-card::before {
    content:''; position:absolute; top:0; left:0; width:3px; height:0;
    background:#C8FF2E; box-shadow:0 0 10px rgba(200,255,46,0.5);
    transition:height 0.4s ease;
}
.endo-card:hover::before { height:100%; }

.btn-ferrari {
    background: #96B81C !important;
    border-color: #96B81C !important;
    transition: all 0.2s cubic-bezier(0.19, 1, 0.22, 1) !important;
}
.btn-ferrari:hover {
    box-shadow: 0 0 35px rgba(150,184,28,0.6) !important;
    transform: scale(1.05) skewX(-3deg) !important;
}

/* ── Mobile Layout Overrides ─────────────────────────────────────── */
@media (max-width: 1279px) {
    .hero-video-container video {
        display: none !important;
    }
    .hero-video-container {
        background-image: url('{{ asset("assets/gt3_hero_portrait.png") }}') !important;
        background-size: cover !important;
        background-position: center !important;
        opacity: 0.95 !important;
    }
    .hero-video-overlay {
        background: linear-gradient(180deg, rgba(15,18,29,0.3) 0%, rgba(244,246,249,0.98) 95%) !important;
    }
    .hero-buttons-container {
        flex-direction: column !important;
    }
    .hero-buttons-container a {
        width: 100% !important;
        justify-content: center !important;
    }
}
html.view-mode-mobile .hero-video-container video {
    display: none !important;
}
html.view-mode-mobile .hero-video-container {
    background-image: url('{{ asset("assets/gt3_hero_portrait.png") }}') !important;
    background-size: cover !important;
    background-position: center !important;
    opacity: 0.95 !important;
}
html.view-mode-mobile .hero-video-overlay {
    background: linear-gradient(180deg, rgba(15,18,29,0.3) 0%, rgba(244,246,249,0.98) 95%) !important;
}
html.view-mode-mobile .hero-buttons-container {
    flex-direction: column !important;
}
html.view-mode-mobile .hero-buttons-container a {
    width: 100% !important;
    justify-content: center !important;
}

/* ── Flip Card Styles ────────────────────────────────────────────── */
.driver-card-wrapper {
    perspective: 1000px;
}
.driver-card-inner {
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    transform-style: preserve-3d;
}
.driver-card-inner.is-flipped {
    transform: rotateY(180deg);
}
.driver-card-front, .driver-card-back {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
}
</style>
@endpush

@section('content')

{{-- ═════════════════════════════ HERO ════════════════════════════ --}}
<section class="hero" id="hero" aria-label="Banner Utama">
    <div class="hero-video-container">
        <video autoplay muted loop playsinline id="hero-bg-video">
            <source src="https://assets.mixkit.co/videos/preview/mixkit-formula-one-race-car-on-a-track-32363-large.mp4" type="video/mp4">
        </video>
        <div class="hero-video-overlay"></div>
    </div>
    <div class="hero-grid"></div>
    <div class="hero-radial"></div>
    <div class="hero-vline hidden xl:block"></div>
    <div class="hero-speed-lines hidden xl:block">
        @for($i=0;$i<5;$i++)<div class="hero-speed-line"></div>@endfor
    </div>

    <div class="max-w-7xl mx-auto px-8 w-full pt-28 xl:pt-20">
        <div class="grid xl:grid-cols-2 gap-16 items-center min-h-[90vh] py-20">

            {{-- Left: Copy --}}
            <div>
                {{-- Title Sponsor Badge --}}
                @if(isset($titleSponsors) && $titleSponsors->count() > 0)
                <div class="flex items-center gap-4 mb-6">
                    <span class="text-pure text-xs font-ui tracking-widest uppercase font-bold">Didukung oleh</span>
                    @foreach($titleSponsors->take(1) as $ts)
                    <span class="font-display font-black text-rgr-dark text-sm tracking-widest uppercase
                                 border-2 border-rgr px-4 py-1.5 bg-rgr/10 shadow-sm">{{ $ts->name }}</span>
                    @endforeach
                </div>
                @endif

                <p class="section-label mb-4 flex items-center gap-3 font-extrabold text-rgr-dark text-[0.75rem]">
                    <span class="w-10 h-[2px] bg-rgr-dark inline-block"></span>
                    FIA Formula 1 · WEC · IMSA · Musim 2026
                </p>

                <h1 class="hero-wordmark mb-7 text-4xl xl:text-7xl font-black font-display uppercase tracking-tighter">
                    Mobil 1<br>
                    <span class="accent">Team RG</span>
                </h1>

                <h2 class="font-display font-black text-4xl leading-none text-pure mb-6 xl:hidden tracking-tighter uppercase">
                    <span class="block text-red-600">PRESISI</span>
                    <span class="block text-pure mb-2">JERMAN.</span>
                    <span class="block text-red-600">PASSION</span>
                    <span class="block text-pure">ITALIA.</span>
                </h2>
                <p class="text-pure text-lg font-display font-bold leading-tight tracking-wider mb-3 hidden xl:block">
                    "EMOSI DI SETIAP PUTARAN, PRESISI DI SETIAP DETIK."
                </p>
                <p class="text-muted text-sm leading-relaxed max-w-md mb-6 font-body">
                    Dari Jakarta menuju sirkuit paling ikonik di dunia. Mobil 1 Team RG (M1TRG) menggabungkan gairah emosional performa Italia dan rekayasa presisi teknologi Jerman di tujuh kejuaraan balap dunia.
                </p>

                <div class="flex items-center gap-2 mb-8 text-muted text-xs">
                    <span class="w-1.5 h-1.5 bg-rgr rounded-full animate-pulse inline-block"></span>
                    Principal: <span class="text-pure font-semibold ml-1">Rey Gilang</span>
                    &nbsp;·&nbsp; Markas: <span class="text-pure font-semibold ml-1">Jakarta, Indonesia</span>
                </div>

                <div class="flex flex-wrap gap-4 mb-12 hero-buttons-container">
                    <a href="{{ route('car.specs') }}" class="btn-rgr btn-ferrari flex items-center justify-center gap-2" id="cta-car-specs">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Eksplorasi Armada
                    </a>
                    <a href="{{ route('endurance.index') }}" class="btn-rgr-ghost flex items-center justify-center" id="cta-endurance">
                        Balap Ketahanan
                    </a>
                </div>

                {{-- Team Stats --}}
                @if($team)
                <div class="flex flex-wrap gap-3">
                    <div class="stat-pill">
                        <span class="stat-pill-val">{{ $team->constructors_titles }}</span>
                        <span class="stat-pill-lbl">Gelar<br>Konstruktor</span>
                    </div>
                    <div class="stat-pill">
                        <span class="stat-pill-val">{{ $team->drivers_titles }}</span>
                        <span class="stat-pill-lbl">Gelar<br>Pembalap</span>
                    </div>
                    @if($primaryCar)
                    <div class="stat-pill">
                        <span class="stat-pill-val">{{ number_format($primaryCar->top_speed) }}</span>
                        <span class="stat-pill-lbl">Kec. Puncak<br>km/jam</span>
                    </div>
                    <div class="stat-pill">
                        <span class="stat-pill-val">{{ number_format($primaryCar->power_hp) }}</span>
                        <span class="stat-pill-lbl">Kombinasi<br>Tenaga HP</span>
                    </div>
                    @endif
                    @if(isset($driverStats))
                    <div class="stat-pill">
                        <span class="stat-pill-val">{{ $driverStats['total_podiums'] }}</span>
                        <span class="stat-pill-lbl">Total<br>Podium</span>
                    </div>
                    @endif
                </div>
                @endif
            </div>

            {{-- Right: Telemetry & Next Race (Data Performance) --}}
            <div class="hidden lg:block" data-reveal>
                <div class="telemetry-panel p-8 relative flex flex-col justify-between h-full min-h-[460px]" 
                     style="background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94)); border: 1px solid rgba(200,255,46,0.15); border-radius: 0;">
                    
                    <div>
                        {{-- Widget Header --}}
                        <div class="flex items-center justify-between mb-4 pb-2 border-b border-steel/10">
                            <div>
                                <p class="text-[0.6rem] font-ui tracking-widest text-rgr uppercase font-bold">BMW M-PERFORMANCE DATA</p>
                                <h3 class="font-display font-black text-lg text-pure tracking-tight">TELEMETRY & NEXT GP</h3>
                            </div>
                            <span class="px-2 py-0.5 text-[0.55rem] font-display font-bold tracking-widest text-emerald-600 bg-emerald-500/10 rounded uppercase animate-pulse">
                                ONLINE
                             </span>
                        </div>

                        {{-- Countdown Widget --}}
                        <div class="p-4 bg-pitch/80 border border-steel/10 rounded mb-4 text-center font-mono">
                            <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider mb-1.5">COUNTDOWN TO NEXT START</p>
                            <div class="grid grid-cols-4 gap-2 text-pure">
                                <div class="p-1.5 bg-white/70 border border-steel/10 rounded">
                                    <span class="font-black text-lg font-display">04</span>
                                    <p class="text-[0.5rem] text-muted uppercase">Hari</p>
                                </div>
                                <div class="p-1.5 bg-white/70 border border-steel/10 rounded">
                                    <span class="font-black text-lg font-display">12</span>
                                    <p class="text-[0.5rem] text-muted uppercase">Jam</p>
                                </div>
                                <div class="p-1.5 bg-white/70 border border-steel/10 rounded">
                                    <span class="font-black text-lg font-display">48</span>
                                    <p class="text-[0.5rem] text-muted uppercase">Menit</p>
                                </div>
                                <div class="p-1.5 bg-white/70 border border-steel/10 rounded">
                                    <span class="font-black text-lg font-display">35</span>
                                    <p class="text-[0.5rem] text-muted uppercase">Detik</p>
                                </div>
                            </div>
                        </div>

                        {{-- Circuit Poetic Info (Ferrari) --}}
                        <div class="mb-4">
                            <p class="text-[0.55rem] font-ui text-rgr uppercase tracking-wider mb-1 font-bold">TANTANGAN LINTASAN</p>
                            <p class="text-xs text-muted leading-relaxed italic font-body">
                                "Di mana aspal membelah angin lembah Ardennes, Eau Rouge menuntut keyakinan tanpa ragu. Setiap mili detik di tanjakan curam ini adalah ujian nyali, sebuah tarian indah antara batas cengkeraman ban dan keberanian murni pembalap."
                            </p>
                        </div>

                        {{-- Mini Telemetry (BMW) --}}
                        <div class="space-y-2 border-t border-steel/10 pt-3">
                            <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider mb-1">M1TRG REAL-TIME PERFORMANCE</p>
                            <div class="flex justify-between text-xs font-mono py-1 border-b border-steel/5">
                                <span class="text-muted">Top Speed Terakhir (Sepang):</span>
                                <span class="font-bold text-pure">324.8 km/jam</span>
                            </div>
                            <div class="flex justify-between text-xs font-mono py-1 border-b border-steel/5">
                                <span class="text-muted">Lap Terkalkulasi Tim:</span>
                                <span class="font-bold text-pure">5,124 Lap</span>
                            </div>
                            <div class="flex justify-between text-xs font-mono py-1">
                                <span class="text-muted">Posisi Klasemen Konstruktor:</span>
                                <span class="font-bold text-rgr">P1 (284 Poin)</span>
                            </div>
                        </div>
                    </div>

                    {{-- Action Footer --}}
                    <div class="pt-4 border-t border-steel/10 mt-4 text-center">
                        <a href="{{ route('paddock.club') }}" class="btn-rgr btn-ferrari text-xs w-full justify-center">Eksplor Paddock Club VIP</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- Bottom fade --}}
    <div class="absolute bottom-0 left-0 right-0 h-32 pointer-events-none"
         style="background:linear-gradient(0deg,#0B0D10 0%,transparent 100%)"></div>
    {{-- Scroll cue --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce opacity-40">
        <span class="text-muted text-xs font-ui tracking-widest uppercase">Gulir</span>
        <svg class="w-4 h-4 text-rgr" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
    </div>
</section>

{{-- Mobile Compact Race Countdown Bar --}}
<div class="lg:hidden bg-zinc-950 border-y border-red-600/30 py-3.5 px-6 flex items-center justify-between z-30 font-mono sticky top-16" style="border-radius: 0 !important;">
    <div class="flex items-center gap-1.5 text-white">
        <span class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></span>
        <span class="text-[0.68rem] font-display font-bold uppercase tracking-wider text-white/90">
            @if(isset($nextRace))
                [{{ $nextRace->grand_prix_name }}]
            @else
                [Mandalika GTWC]
            @endif
        </span>
    </div>
    <div class="flex items-center gap-1 text-[#C8FF2E] font-display font-black text-sm tracking-widest">
        <span class="text-white/40 text-[0.68rem] font-ui mr-1">➔</span>
        <span id="mob-days">00</span>D :
        <span id="mob-hours">00</span>H :
        <span id="mob-minutes">00</span>M
    </div>
</div>

{{-- ═══════════════════════ DYNAMIC HERO STATS BAR ═══════════════════════ --}}
<section class="border-y border-steel/20 bg-pitch relative z-20 py-8" id="team-stats" aria-labelledby="team-stats-heading">
    <h2 id="team-stats-heading" class="sr-only">Statistik Tim</h2>
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-2 lg:grid-cols-4 gap-6 text-center" role="list">
        <div class="card-rgr p-4 border-r border-steel/20 last:border-0" role="listitem" data-reveal>
            <p class="font-display font-black text-3xl lg:text-4xl text-rgr" aria-label="15 Kejuaraan Dunia">15</p>
            <p class="text-xs text-pure font-ui font-bold tracking-wider uppercase mt-1">Kejuaraan Dunia</p>
            <p class="text-[0.68rem] text-muted font-body mt-1">2x F1 · 2x WEC · 1x Indy 500 · 10x WRC</p>
        </div>
        <div class="card-rgr p-4 border-r border-steel/20 last:border-0" role="listitem" data-reveal>
            <p class="font-display font-black text-3xl lg:text-4xl text-pure" aria-label="250 lebih Podium Kejuaraan">250+</p>
            <p class="text-xs text-pure font-ui font-bold tracking-wider uppercase mt-1">Podium Kejuaraan</p>
            <p class="text-[0.68rem] text-muted font-body mt-1">F1 · WEC · NASCAR · GTWC · Indy · WRC</p>
        </div>
        <div class="card-rgr p-4 border-r border-steel/20 last:border-0" role="listitem" data-reveal>
            <p class="font-display font-black text-3xl lg:text-4xl text-pure" aria-label="5800 lebih Poin Karir Total">5.800+</p>
            <p class="text-xs text-pure font-ui font-bold tracking-wider uppercase mt-1">Poin Karir Total</p>
            <p class="text-[0.68rem] text-muted font-body mt-1">Akumulasi Seluruh Divisi Tim Global</p>
        </div>
        <div class="card-rgr p-4 last:border-0" role="listitem" data-reveal>
            <p class="font-display font-black text-3xl lg:text-4xl text-rgr" aria-label="9 Divisi Balap Aktif">9</p>
            <p class="text-xs text-pure font-ui font-bold tracking-wider uppercase mt-1">Divisi Balap Aktif</p>
            <p class="text-[0.68rem] text-muted font-body mt-1">F1 · WEC · FE · EWC · IMSA · NASCAR · GTWC · Indy · WRC</p>
        </div>
    </div>
</section>

{{-- ═══════════════════════ LIVE RACE HUB & COMMENTARY FEED ═══════════════════════ --}}
<section class="py-20 border-b border-steel/20 bg-pitch text-pure relative z-20" id="live-race-hub" aria-labelledby="live-race-hub-heading">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            
            {{-- Left: Live Hub Status --}}
            <div class="lg:col-span-1 space-y-6" data-reveal>
                <div>
                    <p class="section-label mb-2 flex items-center gap-3 text-rgr">
                        <span class="w-6 h-px bg-rgr"></span> LIVE HUB
                    </p>
                    <h3 class="font-display font-black text-3xl uppercase tracking-tight">Race Status</h3>
                    <div class="cyan-line my-3"></div>
                </div>

                {{-- Status Card --}}
                <div class="rgr-card p-6 bg-carbon/40 border-white/05 rounded space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted uppercase font-bold">ACTIVE WEEKEND</span>
                        <span class="flex items-center gap-1.5 px-2 py-0.5 text-[0.58rem] font-display font-bold tracking-widest text-emerald-400 bg-emerald-500/10 rounded animate-pulse">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> LIVE TRACKING
                        </span>
                    </div>

                    <div>
                        <h4 class="font-display font-bold text-lg text-pure">24h Le Mans</h4>
                        <p class="text-xs text-muted">Circuit de la Sarthe, Prancis</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 border-t border-white/05 pt-4 text-xs">
                        <div>
                            <span class="text-muted block text-[0.62rem] uppercase tracking-wider font-semibold">Track Status</span>
                            <span class="font-bold text-emerald-400 flex items-center gap-1.5 mt-0.5">
                                <span class="w-2.5 h-2.5 bg-emerald-400 inline-block rounded-sm"></span> GREEN FLAG
                            </span>
                        </div>
                        <div>
                            <span class="text-muted block text-[0.62rem] uppercase tracking-wider font-semibold">Current Lap</span>
                            <span class="font-bold text-pure mt-0.5 block font-mono">Lap 182 / 500</span>
                        </div>
                        <div>
                            <span class="text-muted block text-[0.62rem] uppercase tracking-wider font-semibold">M1TRG Entry P1</span>
                            <span class="font-bold text-pure mt-0.5 block font-mono">#99 Verstappen / Russell</span>
                        </div>
                        <div>
                            <span class="text-muted block text-[0.62rem] uppercase tracking-wider font-semibold">Gap to P2</span>
                            <span class="font-bold text-rgr mt-0.5 block font-mono">-0.485s</span>
                        </div>
                    </div>

                    <div class="border-t border-white/05 pt-4 space-y-2 text-xs">
                        <div class="flex justify-between">
                            <span class="text-muted">Weather:</span>
                            <span class="font-semibold text-pure">Light Drizzle (16°C)</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted">Track Temp:</span>
                            <span class="font-semibold text-pure">19.5°C</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-muted">Tire Choice:</span>
                            <span class="font-semibold text-amber-400">Pirelli Wet Compound</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Live Commentary / Pit-Wall Feed --}}
            <div class="lg:col-span-2 space-y-6" data-reveal>
                <div>
                    <h3 class="font-display font-black text-3xl uppercase tracking-tight flex items-center gap-3">
                        <span class="w-2 h-2 bg-rgr rounded-full animate-ping"></span> Pit-Wall Live Feed
                    </h3>
                    <p class="text-xs text-muted mt-1">Simulasi komunikasi tim strategis dan pembaruan pit stop secara real-time langsung dari paddock sirkuit.</p>
                </div>

                <div class="rgr-card p-6 bg-carbon/40 border border-white/05 rounded min-h-[300px] flex flex-col justify-between">
                    {{-- Feed Container --}}
                    <div class="space-y-4 font-mono text-xs overflow-y-auto max-h-[320px] pr-2 scrollbar-thin text-left" id="live-feed-log">
                        <div class="text-faint">[10:42:01] SYSTEM: Live feed connection established. Monitoring telemetry...</div>
                        <div class="text-muted"><span class="text-rgr">[10:42:15] PIT WALL:</span> Driver George Russell reports slight understeer in Turn 12 (Pouhon).</div>
                        <div class="text-muted"><span class="text-rgr">[10:43:05] TELEMETRY:</span> Front tire wear calculated at 42%. Fuel capacity sufficient for 12 more laps.</div>
                        <div class="text-emerald-600 font-semibold"><span class="text-rgr">[10:44:20] PIT ENTRY:</span> Car #99 entering pit lane for driver change. Max Verstappen preparing gear.</div>
                        <div class="text-pure font-bold"><span class="text-rgr">[10:45:10] PIT STOP:</span> Tyres swapped (Pirelli Hard). Fuel topped up. Max Verstappen takes over. Stop time: 2.15 seconds.</div>
                    </div>

                    {{-- Feed Status Info --}}
                    <div class="mt-4 pt-3 border-t border-steel/10 flex justify-between items-center text-[0.62rem] text-faint">
                        <span>DATA SOURCE: TELEMETRY SYSTEM M1TRG-v4</span>
                        <span class="flex items-center gap-1 text-emerald-600 font-semibold">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-600 inline-block animate-ping"></span> FEED ACTIVE
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const feedLog = document.getElementById('live-feed-log');
        const events = [
            { time: '10:46:12', type: 'TRACK', msg: 'Green flag remains active. Verstappen sets personal best sector 1 (38.84s).' },
            { time: '10:47:04', type: 'TELEMETRY', msg: 'Lap 183 completed. Current pace: 2:21.450. Gap to P2 (Ferrari #51) extends to 0.741s.' },
            { time: '10:48:30', type: 'PIT WALL', msg: 'Verstappen reports track drying up in Sector 3. Requesting telemetry comparison with slick tires.' },
            { time: '10:49:15', type: 'STRATEGY', msg: 'Predictive software indicates slick tire crossover point in approximately 4 laps.' },
            { time: '10:50:50', type: 'TRACK', msg: 'Yellow Flag Sector 2. Incident involving GT3 entry #88. Off track at Les Combes.' },
            { time: '10:51:40', type: 'TRACK', msg: 'Green Flag Sector 2. Track cleared. Verstappen regains full speed.' }
        ];

        let index = 0;
        setInterval(() => {
            if (index < events.length) {
                const ev = events[index];
                const newLog = document.createElement('div');
                newLog.className = 'text-muted animate-fade-in text-left';
                
                let typeColor = 'text-rgr';
                if (ev.type === 'TRACK') typeColor = 'text-emerald-400';
                if (ev.type === 'STRATEGY') typeColor = 'text-amber-400';
                
                newLog.innerHTML = `<span class="text-faint">[${ev.time}]</span> <span class="${typeColor}">[${ev.type}]:</span> ${ev.msg}`;
                feedLog.appendChild(newLog);
                
                // Auto scroll to bottom
                feedLog.scrollTop = feedLog.scrollHeight;
                index++;
            } else {
                // reset to loop simulator messages
                index = 0;
            }
        }, 8000); // add a new telemetry log every 8 seconds
    });
</script>

{{-- ═══════════════════════ RACE COUNTDOWN ═══════════════════════ --}}
<section class="py-20 grid-bg relative" id="countdown" aria-label="Hitung Mundur Balapan">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid lg:grid-cols-2 gap-10 items-start">

            {{-- Next Race Info --}}
            @if($nextRace)
            <div data-reveal>
                <p class="section-label mb-3 flex items-center gap-3">
                    <span class="w-6 h-px bg-rgr inline-block"></span>
                    Grand Prix Berikutnya
                </p>
                <h2 class="section-title text-4xl lg:text-5xl mb-6">{{ $nextRace->grand_prix_name }}</h2>
                <div class="grid grid-cols-2 gap-5 mb-8">
                    <div>
                        <p class="text-muted text-xs font-ui tracking-widest uppercase mb-1">Sirkuit</p>
                        <p class="text-pure font-medium">{{ $nextRace->circuit_name }}</p>
                    </div>
                    <div>
                        <p class="text-muted text-xs font-ui tracking-widest uppercase mb-1">Negara</p>
                        <p class="text-pure font-medium">{{ $nextRace->country }}</p>
                    </div>
                    <div>
                        <p class="text-muted text-xs font-ui tracking-widest uppercase mb-1">Tanggal Balapan</p>
                        <p class="text-pure font-medium">{{ $nextRace->race_date->format('d M Y · H:i') }}</p>
                    </div>
                    @if($nextRace->round_number)
                    <div>
                        <p class="text-muted text-xs font-ui tracking-widest uppercase mb-1">Putaran</p>
                        <p class="text-pure font-medium">R{{ $nextRace->round_number }} / 22</p>
                    </div>
                    @endif
                </div>
                <a href="{{ route('home') }}#schedule" class="btn-rgr-ghost" id="btn-full-cal">
                    Kalender Lengkap
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            @endif

            {{-- Circuit Line Map graphic wrapper --}}
            @if($nextRace)
            <div class="rgr-card p-6 flex flex-col justify-center items-center relative overflow-hidden" data-reveal>
                <div class="absolute inset-0 bg-gradient-to-br from-rgr/03 to-transparent pointer-events-none"></div>
                <p class="text-[0.62rem] font-ui tracking-widest text-rgr uppercase font-bold mb-4">PETA STRATEGI LINTASAN</p>
                {{-- Minimalist abstract high-tech circuit line simulation --}}
                <div class="w-64 h-36 border border-steel/20 relative flex items-center justify-center rounded bg-pitch/40">
                    <svg class="w-48 h-24 text-rgr opacity-75" viewBox="0 0 200 100" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        {{-- Procedural high-tech race track line shape --}}
                        <path d="M 20 50 C 20 20, 80 20, 100 40 C 120 60, 140 80, 180 80 C 190 50, 150 20, 120 20 C 90 20, 60 80, 20 50 Z" />
                    </svg>
                    <span class="absolute top-2 left-2 text-[0.55rem] font-ui text-faint tracking-wider">SEKTOR 1 / DRS ZONE</span>
                    {{-- Blink dot simulating car --}}
                    <div class="absolute w-2 h-2 rounded-full bg-red-600 animate-ping" style="left: 45%; top: 38%;"></div>
                    <div class="absolute w-1.5 h-1.5 rounded-full bg-red-500" style="left: 45%; top: 38%;"></div>
                </div>
                <p class="text-xs text-muted font-ui tracking-wide mt-3 text-center">Zona DRS Utama diaktifkan di lintasan lurus sepanjang 800 meter.</p>
            </div>
            @endif

            {{-- Countdown Panel --}}
            <div class="telemetry-panel p-8 lg:p-10" data-reveal id="countdown-panel">
                @if($nextRace && $nextRace->is_upcoming)
                <p class="section-label text-center mb-6">Balapan Dimulai Dalam</p>
                <div class="flex justify-center gap-3 flex-wrap" id="countdown-display">
                    <div class="countdown-box"><span class="countdown-num" id="cd-d">00</span><span class="countdown-unit">Hari</span></div>
                    <span class="text-rgr font-display font-black text-3xl self-center">:</span>
                    <div class="countdown-box"><span class="countdown-num" id="cd-h">00</span><span class="countdown-unit">Jam</span></div>
                    <span class="text-rgr font-display font-black text-3xl self-center">:</span>
                    <div class="countdown-box"><span class="countdown-num" id="cd-m">00</span><span class="countdown-unit">Menit</span></div>
                    <span class="text-rgr font-display font-black text-3xl self-center">:</span>
                    <div class="countdown-box"><span class="countdown-num" id="cd-s">00</span><span class="countdown-unit">Detik</span></div>
                </div>
                <div class="mt-8 pt-6 border-t border-steel/30 space-y-2">
                    @if($nextRace->qualifying_date)
                    <div class="flex justify-between text-sm">
                        <span class="text-muted font-ui tracking-wide uppercase text-xs">Kualifikasi</span>
                        <span class="text-pure">{{ $nextRace->qualifying_date->format('d M · H:i') }}</span>
                    </div>
                    @endif
                    @if($nextRace->practice1_date)
                    <div class="flex justify-between text-sm">
                        <span class="text-muted font-ui tracking-wide uppercase text-xs">Latihan 1</span>
                        <span class="text-pure">{{ $nextRace->practice1_date->format('d M · H:i') }}</span>
                    </div>
                    @endif
                </div>
                @else
                <div class="flex flex-col items-center justify-center h-40 text-center">
                    <p class="section-label mb-2">Akhir Musim</p>
                    <p class="text-pure text-xl font-display font-bold">2026 Selesai</p>
                    <p class="text-muted mt-2 text-sm">Sampai jumpa di 2027</p>
                </div>
                @endif
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════ DRIVER SPOTLIGHT ══════════════════════ --}}
<section class="py-24 relative" id="drivers" aria-label="Sorotan Pembalap">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4" data-reveal>
            <div>
                <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>Line-Up 2026</p>
                <h2 class="section-title text-4xl lg:text-5xl">Sorotan Pembalap</h2>
            </div>
        </div>

        @if($spotlightDrivers->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($spotlightDrivers as $i => $driver)
            <div class="driver-card-wrapper h-[530px]" x-data="{ flipped: false }" @click="flipped = !flipped" data-reveal style="transition-delay:{{ $i * 150 }}ms">
                <div class="driver-card-inner w-full h-full relative" :class="flipped ? 'is-flipped' : ''" style="transform-style: preserve-3d;">
                    
                    <!-- Front Side -->
                    <div class="driver-card-front absolute inset-0 w-full h-full bg-white border border-steel/15 flex flex-col justify-between" style="backface-visibility: hidden; -webkit-backface-visibility: hidden; border-radius:0 !important;">
                        <!-- Portrait -->
                        @if($driver->avatar_url)
                        <img src="{{ asset('storage/'.$driver->avatar_url) }}" alt="{{ $driver->name }}" class="driver-portrait h-[320px] w-full object-cover object-top flex-shrink-0" loading="lazy" decoding="async">
                        @else
                        <div class="driver-portrait-placeholder h-[320px] w-full bg-zinc-950 flex items-center justify-center flex-shrink-0">
                            <span class="font-display font-black text-[8rem] text-rgr/10">#{{ $driver->permanent_number }}</span>
                        </div>
                        @endif
                        
                        <!-- Basic Info -->
                        <div class="p-6 flex-1 flex flex-col justify-between bg-zinc-950">
                            <div class="flex items-start justify-between">
                                <div class="text-left">
                                    <p class="text-zinc-400 text-xs font-ui tracking-widest uppercase mb-1">{{ $driver->country_code ?? $driver->country }}</p>
                                    <h3 class="text-white font-display font-black text-2xl leading-none">
                                        {{ $driver->first_name }}<br><span class="text-red-600">{{ $driver->last_name }}</span>
                                    </h3>
                                </div>
                                <span class="font-display font-black text-3xl text-red-600 leading-none">#{{ $driver->permanent_number }}</span>
                            </div>
                            <span class="text-[0.65rem] font-ui text-zinc-500 uppercase tracking-widest block border-t border-zinc-800 pt-3 mt-2 text-left">TAP UNTUK LIHAT DATA TEKNIS ➔</span>
                        </div>
                    </div>

                    <!-- Back Side (Telemetry/Stats) -->
                    <div class="driver-card-back absolute inset-0 w-full h-full bg-[#0F121D] border border-red-600/30 p-6 flex flex-col justify-between text-white text-left" style="backface-visibility: hidden; -webkit-backface-visibility: hidden; transform: rotateY(180deg); border-radius:0 !important;">
                        <div>
                            <div class="flex justify-between items-start border-b border-zinc-800 pb-4 mb-4">
                                <div class="text-left">
                                    <p class="text-red-600 text-xs font-ui tracking-widest uppercase mb-1">M1TRG TELEMETRY</p>
                                    <h3 class="font-display font-black text-xl text-white">{{ $driver->name }}</h3>
                                </div>
                                <span class="font-display font-black text-2xl text-red-600">#{{ $driver->permanent_number }}</span>
                            </div>
                            
                            <div class="space-y-3 font-mono text-xs">
                                <div class="flex justify-between">
                                    <span class="text-zinc-400">Lisensi Balap:</span>
                                    <span class="text-white font-bold">FIA SUPER LICENSE</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-zinc-400">Best Lap Time:</span>
                                    <span class="text-emerald-400 font-bold">1:41.050 (SPA)</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-zinc-400">Gelar Dunia:</span>
                                    <span class="text-red-600 font-bold">{{ $driver->world_championships }} Kali</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-zinc-400">Kemenangan GP:</span>
                                    <span class="text-white font-bold">{{ $driver->podiums }} Podium</span>
                                </div>
                            </div>
                            
                            @if($driver->bio)
                            <p class="text-zinc-400 text-xs mt-6 leading-relaxed font-body italic text-left">
                                "{{ $driver->bio }}"
                            </p>
                            @endif
                        </div>
                        
                        <span class="text-[0.65rem] font-ui text-red-600 uppercase tracking-widest block border-t border-zinc-800 pt-3 text-left">TAP KEMBALI UNTUK FOTO ➔</span>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- ═══════════════════════ INTEGRATED MINI STANDINGS ═══════════════════════ --}}
<section class="py-16 border-t border-white/05 bg-pitch relative z-20" id="leaderboard" aria-labelledby="leaderboard-heading">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid lg:grid-cols-12 gap-8 items-center">
            
            <div class="lg:col-span-5" data-reveal>
                <p class="section-label mb-2 flex items-center gap-3">
                    <span class="w-6 h-px bg-rgr"></span>
                    POSISI KLASMEN SEMENTARA F1
                </p>
                <h2 class="section-title text-3xl lg:text-4xl mb-4">LEADERBOARD F1</h2>
                <p class="text-muted text-sm leading-relaxed mb-6">
                    Mobil 1 Team RG memimpin ketat di jajaran konstruktor dan pembalap global. Di bawah ini adalah posisi klasemen mini untuk 3 besar pembalap Formula 1 musim 2026.
                </p>
                <a href="{{ route('standings') }}" class="btn-rgr-ghost text-xs">LIHAT KLASEMEN LENGKAP</a>
            </div>

            <div class="lg:col-span-7 rgr-card p-6 overflow-hidden" data-reveal>
                <p class="text-[0.62rem] font-ui tracking-widest text-rgr uppercase font-bold mb-4">TOP 3 DRIVERS STANDINGS</p>
                <div class="space-y-3">
                    {{-- Pos 1 --}}
                    <div class="flex items-center justify-between p-3.5 bg-rgr/05 border border-rgr/20 rounded">
                        <div class="flex items-center gap-4">
                            <span class="font-display font-black text-xl text-rgr">P1</span>
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Max Verstappen</h4>
                                <p class="text-[0.65rem] text-muted font-ui uppercase">Mobil 1 Team RG</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="font-display font-bold text-rgr text-sm">186 Poin</span>
                        </div>
                    </div>

                    {{-- Pos 2 --}}
                    <div class="flex items-center justify-between p-3.5 bg-white/[0.01] border border-white/05 rounded">
                        <div class="flex items-center gap-4">
                            <span class="font-display font-black text-xl text-muted">P2</span>
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Charles Leclerc</h4>
                                <p class="text-[0.65rem] text-muted font-ui uppercase">Ferrari</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="font-display font-bold text-pure text-sm">152 Poin</span>
                        </div>
                    </div>

                    {{-- Pos 3 --}}
                    <div class="flex items-center justify-between p-3.5 bg-white/[0.01] border border-white/05 rounded">
                        <div class="flex items-center gap-4">
                            <span class="font-display font-black text-xl text-muted">P3</span>
                            <div>
                                <h4 class="font-display font-bold text-white text-sm">Lando Norris</h4>
                                <p class="text-[0.65rem] text-muted font-ui uppercase">McLaren</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="font-display font-bold text-pure text-sm">145 Poin</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════ LATEST NEWS ═══════════════════════════ --}}
@if($latestArticles->count() > 0)
<section class="py-20 grid-bg relative" id="news" aria-label="Berita Terbaru">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-end justify-between mb-12" data-reveal>
            <div>
                <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>Kabar Terbaru</p>
                <h2 class="section-title text-4xl">Berita & Informasi</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            @foreach($latestArticles as $i => $article)
            <article class="news-card" data-reveal style="transition-delay:{{ $i * 100 }}ms" id="news-{{ $article->id }}">
                {{-- Image --}}
                @if($article->main_image)
                <img src="{{ asset('storage/'.$article->main_image) }}"
                     alt="{{ $article->title }}"
                     class="w-full h-52 object-cover"
                     loading="lazy" decoding="async">
                @else
                <div class="news-image-placeholder">
                    <span class="text-faint font-ui text-sm tracking-widest uppercase">{{ $article->category }}</span>
                </div>
                @endif

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="news-cat-badge">{{ $article->category }}</span>
                        <span class="text-muted text-xs font-ui">{{ $article->formatted_date }}</span>
                        <span class="text-faint text-xs font-ui">{{ $article->read_time }}</span>
                    </div>
                    <h3 class="text-pure font-semibold text-lg leading-snug mb-3 line-clamp-2">{{ $article->title }}</h3>
                    <p class="text-muted text-sm leading-relaxed line-clamp-3">{{ $article->summary }}</p>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
{{-- ═══════════════════════ F1 FEATURED RACES GALLERY ════════════════════════ --}}
<section class="py-20 relative" id="f1-featured" aria-label="Galeri Balapan Utama">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-12" data-reveal>
            <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>Seri Unggulan</p>
            <h2 class="section-title text-4xl lg:text-5xl mb-4">Sirkuit F1 Legendaris Pilihan</h2>
            <p class="text-muted max-w-xl">Menguji batas maksimal kecepatan jet darat Mobil 1 Team RG di sirkuit jalan raya tersulit dan lintasan bersejarah tercepat di dunia.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Card 1: Monaco --}}
            <div class="race-gallery-card p-6" data-reveal>
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <p class="text-muted text-xs font-ui tracking-widest uppercase mb-2">MONACO GP</p>
                        <h3 class="text-pure font-display font-bold text-xl mb-1 leading-tight">Circuit de Monaco</h3>
                        <p class="text-muted text-sm mb-3">Monte Carlo · Monako</p>
                        <div class="flex flex-wrap gap-x-5 gap-y-1">
                            <span class="text-xs font-ui text-rgr">Sirkuit Jalan Raya</span>
                            <span class="text-xs font-ui text-muted">19 Tikungan</span>
                            <span class="text-xs font-ui text-muted">Panjang 3.337 km</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-1 ml-4">
                        <span class="font-display font-bold text-rgr text-sm">1:12.909</span>
                        <span class="text-faint text-xs font-ui uppercase tracking-widest">Rekor Lap</span>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-steel/20 flex items-center justify-between">
                    <span class="text-muted text-xs font-body">Balapan jalan raya paling lambat namun paling menuntut presisi kemudi ekstrem.</span>
                    <a href="{{ route('paddock.club') }}" class="text-rgr text-xs font-ui font-bold flex items-center gap-1">
                        Pesan Tiket VIP
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            {{-- Card 2: Silverstone --}}
            <div class="race-gallery-card p-6" data-reveal>
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <p class="text-muted text-xs font-ui tracking-widest uppercase mb-2">BRITISH GP</p>
                        <h3 class="text-pure font-display font-bold text-xl mb-1 leading-tight">Silverstone Circuit</h3>
                        <p class="text-muted text-sm mb-3">Silverstone · Inggris</p>
                        <div class="flex flex-wrap gap-x-5 gap-y-1">
                            <span class="text-xs font-ui text-rgr">Lintasan Klasik</span>
                            <span class="text-xs font-ui text-muted">18 Tikungan</span>
                            <span class="text-xs font-ui text-muted">Panjang 5.891 km</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-1 ml-4">
                        <span class="font-display font-bold text-rgr text-sm">1:27.097</span>
                        <span class="text-faint text-xs font-ui uppercase tracking-widest">Rekor Lap</span>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-steel/20 flex items-center justify-between">
                    <span class="text-muted text-xs font-body">Kombinasi tikungan kecepatan tinggi legendaris seperti Maggots, Becketts, dan Chapel.</span>
                    <a href="{{ route('paddock.club') }}" class="text-rgr text-xs font-ui font-bold flex items-center gap-1">
                        Pesan Tiket VIP
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            {{-- Card 3: Monza --}}
            <div class="race-gallery-card p-6" data-reveal>
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <p class="text-muted text-xs font-ui tracking-widest uppercase mb-2">ITALIAN GP</p>
                        <h3 class="text-pure font-display font-bold text-xl mb-1 leading-tight">Autodromo Nazionale Monza</h3>
                        <p class="text-muted text-sm mb-3">Monza · Italia</p>
                        <div class="flex flex-wrap gap-x-5 gap-y-1">
                            <span class="text-xs font-ui text-rgr">Katedral Kecepatan</span>
                            <span class="text-xs font-ui text-muted">11 Tikungan</span>
                            <span class="text-xs font-ui text-muted">Panjang 5.793 km</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-1 ml-4">
                        <span class="font-display font-bold text-rgr text-sm">1:21.046</span>
                        <span class="text-faint text-xs font-ui uppercase tracking-widest">Rekor Lap</span>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-steel/20 flex items-center justify-between">
                    <span class="text-muted text-xs font-body">Lintasan lurus panjang yang mendominasi lebih dari 75% lap dengan pengereman keras di chicane.</span>
                    <a href="{{ route('paddock.club') }}" class="text-rgr text-xs font-ui font-bold flex items-center gap-1">
                        Pesan Tiket VIP
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            {{-- Card 4: Singapore --}}
            <div class="race-gallery-card p-6" data-reveal>
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <p class="text-muted text-xs font-ui tracking-widest uppercase mb-2">SINGAPORE GP</p>
                        <h3 class="text-pure font-display font-bold text-xl mb-1 leading-tight">Marina Bay Street Circuit</h3>
                        <p class="text-muted text-sm mb-3">Marina Bay · Singapura</p>
                        <div class="flex flex-wrap gap-x-5 gap-y-1">
                            <span class="text-xs font-ui text-rgr">Balapan Malam</span>
                            <span class="text-xs font-ui text-muted">19 Tikungan</span>
                            <span class="text-xs font-ui text-muted">Panjang 4.940 km</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-1 ml-4">
                        <span class="font-display font-bold text-rgr text-sm">1:35.867</span>
                        <span class="text-faint text-xs font-ui uppercase tracking-widest">Rekor Lap</span>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-steel/20 flex items-center justify-between">
                    <span class="text-muted text-xs font-body">Tantangan kelembapan udara tropis malam hari di sirkuit jalan raya yang sempit.</span>
                    <a href="{{ route('paddock.club') }}" class="text-rgr text-xs font-ui font-bold flex items-center gap-1">
                        Pesan Tiket VIP
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════ GLOBAL MOTORSPORT DIVISIONS ═══════════════════════ --}}
<section class="py-24 bg-white/40 border-t border-steel/10" id="divisions" aria-label="Divisi Motorsport">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-12" data-reveal>
            <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>EKOSISTEM BALAP</p>
            <h2 class="section-title text-4xl lg:text-5xl mb-4">Divisi Motorsport Global</h2>
            <p class="text-muted max-w-xl">Dari sirkuit aspal Formula 1 hingga jalur lumpur WRC Rally, Mobil 1 Team RG berkompetisi di jajaran kompetisi motorsport terelit dunia.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- 1. Formula 1 --}}
            <a href="{{ route('f1.division') }}" class="rgr-card p-6 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <span class="text-[0.58rem] font-ui font-black text-rgr tracking-widest uppercase">SINGLE SEATER</span>
                    <h3 class="font-display font-bold text-xl text-pure mt-2">Formula 1</h3>
                    <p class="text-xs text-muted mt-2 leading-relaxed">Kasta tertinggi balapan roda terbuka global dengan inovasi teknologi aerodinamika jet darat.</p>
                </div>
                <div class="mt-6 pt-4 border-t border-steel/10 flex justify-between items-center text-xs font-mono">
                    <span class="text-faint">Pabrikan: Mercedes-AMG</span>
                    <span class="text-rgr font-bold">&rarr;</span>
                </div>
            </a>

            {{-- 2. IndyCar --}}
            <a href="{{ route('indycar') }}" class="rgr-card p-6 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <span class="text-[0.58rem] font-ui font-black text-orange-500 tracking-widest uppercase">SINGLE SEATER</span>
                    <h3 class="font-display font-bold text-xl text-pure mt-2">IndyCar Series</h3>
                    <p class="text-xs text-muted mt-2 leading-relaxed">Kecepatan roda terbuka ekstrem hingga 380 km/jam di lintasan oval dan jalanan Amerika.</p>
                </div>
                <div class="mt-6 pt-4 border-t border-steel/10 flex justify-between items-center text-xs font-mono">
                    <span class="text-faint">Pabrikan: Arrow McLaren</span>
                    <span class="text-orange-500 font-bold">&rarr;</span>
                </div>
            </a>

            {{-- 3. WRC Rally --}}
            <a href="{{ route('wrc') }}" class="rgr-card p-6 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <span class="text-[0.58rem] font-ui font-black text-red-600 tracking-widest uppercase">OFF-ROAD / RALLY</span>
                    <h3 class="font-display font-bold text-xl text-pure mt-2">WRC Rally</h3>
                    <p class="text-xs text-muted mt-2 leading-relaxed">Menaklukkan jalur salju, lumpur kasar, dan kerikil terjal di kejuaraan reli dunia.</p>
                </div>
                <div class="mt-6 pt-4 border-t border-steel/10 flex justify-between items-center text-xs font-mono">
                    <span class="text-faint">Pabrikan: Toyota Gazoo</span>
                    <span class="text-red-600 font-bold">&rarr;</span>
                </div>
            </a>

            {{-- 4. NASCAR --}}
            <a href="{{ route('nascar') }}" class="rgr-card p-6 flex flex-col justify-between hover:-translate-y-1 transition-all duration-300">
                <div>
                    <span class="text-[0.58rem] font-ui font-black text-amber-500 tracking-widest uppercase">STOCK CAR</span>
                    <h3 class="font-display font-bold text-xl text-pure mt-2">NASCAR Series</h3>
                    <p class="text-xs text-muted mt-2 leading-relaxed">Pertarungan bumper-to-bumper mobil stok bermesin V8 murni di lintasan oval legendaris.</p>
                </div>
                <div class="mt-6 pt-4 border-t border-steel/10 flex justify-between items-center text-xs font-mono">
                    <span class="text-faint">Pabrikan: Chevrolet</span>
                    <span class="text-amber-500 font-bold">&rarr;</span>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════ ENDURANCE HUB ════════════════════════ --}}
@if(isset($enduranceEvents) && $enduranceEvents->count() > 0)
<section class="py-20 relative" id="endurance" aria-label="Program Ketahanan">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-12" data-reveal>
            <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>Seri Balap</p>
            <h2 class="section-title text-4xl lg:text-5xl mb-4">Program Balap Ketahanan</h2>
            <p class="text-muted max-w-xl">Lima kategori mobil. Empat kejuaraan ketahanan. Satu tim menembus batas maksimal.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($enduranceEvents as $i => $ev)
            <a href="{{ route('endurance.show', $ev->event_slug) }}"
               class="endo-card p-6"
               data-reveal
               style="transition-delay:{{ $i * 80 }}ms"
               id="endo-card-{{ $ev->id }}">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <p class="text-muted text-xs font-ui tracking-widest uppercase mb-2">{{ $ev->championship }}</p>
                        <h3 class="text-pure font-display font-bold text-xl mb-1 leading-tight">{{ $ev->event_name }}</h3>
                        <p class="text-muted text-sm mb-3">{{ $ev->circuit_name }} · {{ $ev->country }}</p>
                        <div class="flex flex-wrap gap-x-5 gap-y-1">
                            <span class="text-xs font-ui text-rgr">{{ $ev->class_category }}</span>
                            <span class="text-xs font-ui text-muted">{{ $ev->car_used }}</span>
                            @if($ev->highest_finish_position)
                            <span class="text-xs font-ui text-muted">Finis Terbaik P{{ $ev->highest_finish_position }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-1 ml-4">
                        @if($ev->best_lap_time)
                        <span class="font-display font-bold text-rgr text-sm">{{ $ev->best_lap_time }}</span>
                        <span class="text-faint text-xs font-ui uppercase tracking-widest">Lap Terbaik</span>
                        @endif
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-steel/20 flex items-center justify-between">
                    <span class="text-muted text-xs font-ui">{{ $ev->track_length_km ?? '—' }} km per lap</span>
                    <span class="text-rgr text-xs font-ui font-bold flex items-center gap-1">
                        Lihat Balapan
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
// ── Countdown Timer ────────────────────────────────────────────────
(function() {
    const secs = {{ $countdownSeconds ?? 0 }};
    if (secs <= 0) return;
    const target = Date.now() + secs * 1000;
    const els = {
        d: document.getElementById('cd-d'),
        h: document.getElementById('cd-h'),
        m: document.getElementById('cd-m'),
        s: document.getElementById('cd-s'),
        // Mobile Sticky Bar elements
        md: document.getElementById('mob-days'),
        mh: document.getElementById('mob-hours'),
        mm: document.getElementById('mob-minutes'),
    };
    const p = n => String(n).padStart(2,'0');
    function tick() {
        const diff = Math.max(0, Math.floor((target - Date.now()) / 1000));
        const days = Math.floor(diff / 86400);
        const hours = Math.floor((diff % 86400) / 3600);
        const mins = Math.floor((diff % 3600) / 60);
        const secs = diff % 60;

        if (els.d) els.d.textContent = p(days);
        if (els.h) els.h.textContent = p(hours);
        if (els.m) els.m.textContent = p(mins);
        if (els.s) els.s.textContent = p(secs);

        if (els.md) els.md.textContent = p(days);
        if (els.mh) els.mh.textContent = p(hours);
        if (els.mm) els.mm.textContent = p(mins);

        if (diff > 0) setTimeout(tick, 1000);
    }
    tick();
})();
</script>
@endpush
