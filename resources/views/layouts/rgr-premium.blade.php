<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'Mobil 1 Team RG — Kekuatan Motorsport Global asal Indonesia. F1, WEC, IMSA & Balapan Ketahanan.')">
    <meta property="og:title" content="@yield('title', 'Mobil 1 Team RG') | M1TRG Motorsport">
    <meta property="og:type" content="website">
    <title>@yield('title', 'Mobil 1 Team RG') | M1TRG Motorsport</title>
    {{-- Google Fonts: Orbitron (Racing Display) + Inter (Body) + Rajdhani (UI) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Sora:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Platinum Light theme replacements
                        'pitch':    '#0B0D10',
                        'carbon':   '#15181D',
                        'carbon-2': '#213033',
                        'carbon-3': '#2C3E42',
                        'steel':    '#3C4547',
                        'steel-2':  '#546063',
                        // Championship Laser Palette
                        'rgr':      '#C8FF2E',
                        'rgr-2':    '#F5A623',
                        'rgr-dark': '#96B81C',
                        // Text - High contrast premium deep slate
                        'pure':     '#FFFEFE',
                        'muted':    '#939FA5',
                        'faint':    '#545C60',
                    },
                    fontFamily: {
                        'display': ['Orbitron', 'sans-serif'],
                        'body':    ['Inter', 'sans-serif'],
                        'ui':      ['Rajdhani', 'sans-serif'],
                    },
                    boxShadow: {
                        'rgr-glow':    '0 0 20px rgba(200,255,46,0.18), 0 0 60px rgba(200,255,46,0.06)',
                        'rgr-glow-lg': '0 0 40px rgba(200,255,46,0.25), 0 0 100px rgba(200,255,46,0.1)',
                        'card':        '0 20px 60px rgba(0,0,0,0.05)',
                        'card-hover':  '0 30px 80px rgba(0,0,0,0.08), 0 0 40px rgba(200,255,46,0.05)',
                    },
                },
            },
        }
    </script>

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* ── Global ──────────────────────────────────────────────── */
        /* CSS Custom Properties --- Nav Stack Height */
        :root {
            --topbar-h: 32px;
            --navbar-h: 68px;
            --nav-total: 100px;
        }
        .nav-offset { padding-top: var(--nav-total) !important; }
        .nav-offset-mt { margin-top: var(--nav-total) !important; }

        *, *::before, *::after { box-sizing: border-box; }
        html { font-size: 16px; }
        body {
            background: #0B0D10;
            color: #FFFEFE;
            font-family: 'Sora', sans-serif;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* ── Scrollbar ───────────────────────────────────────────── */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #0B0D10; }
        ::-webkit-scrollbar-thumb { background: #C8FF2E; border-radius: 2px; }

        /* ══════════════════════════════════════════════════════════
           NAVBAR — Mega-Dropdown Premium System
           ══════════════════════════════════════════════════════════ */

        /* ── Topbar ───────────────────────────────────────────────── */
        .rgr-topbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1001;
            height: 32px;
            background: #111827;
            border-bottom: 1px solid rgba(200,255,46,0.15);
            transition: transform 0.4s ease, opacity 0.4s ease;
        }
        .rgr-topbar.hidden-topbar {
            transform: translateY(-100%);
            opacity: 0;
        }
        .topbar-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .topbar-text {
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.45);
        }
        .topbar-text span { color: rgba(255,255,255,0.75); }
        .topbar-live {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #C8FF2E;
        }
        .topbar-live-dot {
            width: 6px; height: 6px;
            background: #C8FF2E;
            border-radius: 50%;
            animation: pulse-dot 1.5s ease-in-out infinite;
        }
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.7); }
        }
        .topbar-social {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .topbar-social a {
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            transition: color 0.2s;
        }
        .topbar-social a:hover { color: #C8FF2E; }
        .topbar-divider {
            width: 1px; height: 12px;
            background: rgba(255,255,255,0.1);
        }

        /* ── Navbar ──────────────────────────────────────────────── */
        .rgr-nav {
            position: fixed;
            top: 32px; left: 0; right: 0;
            z-index: 1000;
            background: rgba(244,246,249,0.0);
            backdrop-filter: blur(0px);
            -webkit-backdrop-filter: blur(0px);
            border-bottom: 1px solid transparent;
            transition: background 0.4s ease, backdrop-filter 0.4s ease, border-color 0.4s ease, box-shadow 0.4s ease, top 0.4s ease;
        }
        .rgr-nav.topbar-gone { top: 0; }
        .rgr-nav::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, #009B3A 0% 33.3%, #FEDF00 33.3% 66.6%, #C8FF2E 66.6% 100%);
            opacity: 0.7;
            z-index: 1;
        }
        .rgr-nav.scrolled {
            background: rgba(11,13,16,0.95);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom-color: rgba(200,255,46,0.15);
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        /* ── Nav Link ─────────────────────────────────────────────── */
        .nav-link {
            position: relative;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.76rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255, 254, 254, 0.68) !important;
            transition: color 0.25s ease;
            padding: 0.2rem 0;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            white-space: nowrap;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 0;
            width: 0; height: 2px;
            background: #C8FF2E;
            transition: width 0.3s cubic-bezier(0.23,1,0.32,1);
        }
        .nav-link:hover,
        .nav-link.active {
            color: #C8FF2E !important;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .nav-link .nav-chevron {
            width: 10px; height: 10px;
            transition: transform 0.25s ease;
            opacity: 0.45;
            flex-shrink: 0;
        }
        .mega-parent:hover .nav-chevron,
        .mega-parent.mega-open .nav-chevron { transform: rotate(180deg); opacity: 1; }

        /* ══ MEGA DROPDOWN SYSTEM ═════════════════════════════════ */
        .mega-parent { position: static; }

        .mega-panel {
            position: fixed;
            left: 0; right: 0;
            background: #15181D;
            border-top: 2px solid rgba(200,255,46,0.25);
            border-bottom: 1px solid rgba(200,255,46,0.08);
            box-shadow: 0 24px 64px rgba(0,0,0,0.5), 0 4px 16px rgba(0,0,0,0.2);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-6px);
            transition: opacity 0.25s cubic-bezier(0.23,1,0.32,1),
                        transform 0.25s cubic-bezier(0.23,1,0.32,1),
                        visibility 0.25s;
            z-index: 998;
            pointer-events: none;
        }
        .mega-panel.mega-active {
            opacity: 1; visibility: visible;
            transform: translateY(0); pointer-events: auto;
        }
        .mega-panel-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1.75rem 1.5rem 2rem;
        }
        .mega-col-header {
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.58rem;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #C8FF2E;
            margin-bottom: 0.75rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(200,255,46,0.1);
            display: flex; align-items: center; gap: 0.4rem;
        }
        .mega-item {
            display: flex; align-items: center; gap: 0.65rem;
            padding: 0.5rem 0.65rem;
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.8rem; font-weight: 600;
            letter-spacing: 0.06em; color: #374151;
            text-transform: uppercase;
            transition: all 0.18s ease;
            border-left: 2px solid transparent;
        }
        .mega-item:hover {
            color: #FFFEFE; background: rgba(200,255,46,0.035);
            border-left-color: #C8FF2E; padding-left: 0.9rem;
        }
        .mega-item-icon {
            width: 26px; height: 26px;
            background: rgba(200,255,46,0.05); border: 1px solid rgba(200,255,46,0.1);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: 0.6rem; font-family: 'Albert Sans', sans-serif; font-weight: 800;
            color: #C8FF2E;
            transition: background 0.18s;
        }
        .mega-item:hover .mega-item-icon { background: rgba(200,255,46,0.09); }
        .mega-item-label { flex: 1; }
        .mega-item-sub {
            font-size: 0.64rem; color: #9CA3AF; font-weight: 500;
            letter-spacing: 0.03em; text-transform: none;
            display: block; line-height: 1.2;
            font-family: 'Sora', sans-serif;
        }
        .mega-divider {
            width: 1px; background: rgba(0,0,0,0.06); align-self: stretch;
        }
        .mega-featured-card {
            background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
            border: 1px solid rgba(200,255,46,0.18);
            padding: 1.25rem; position: relative; overflow: hidden;
        }
        .mega-featured-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
            background: linear-gradient(90deg, #C8FF2E, #FF6B8A);
        }
        .mega-featured-badge {
            display: inline-flex; align-items: center; gap: 0.3rem;
            font-family: 'Albert Sans', sans-serif; font-size: 0.58rem; font-weight: 700;
            letter-spacing: 0.2em; text-transform: uppercase; color: #C8FF2E;
            background: rgba(200,255,46,0.08); border: 1px solid rgba(200,255,46,0.2);
            padding: 0.18rem 0.5rem; margin-bottom: 0.65rem; display: block;
        }
        .mega-featured-title {
            font-family: 'Albert Sans', sans-serif; font-size: 0.82rem; font-weight: 800;
            color: #FFFFFF; letter-spacing: 0.02em; line-height: 1.3; margin-bottom: 0.35rem;
        }
        .mega-featured-sub {
            font-family: 'Sora', sans-serif; font-size: 0.7rem;
            color: rgba(255,255,255,0.45); line-height: 1.5;
        }
        .mega-featured-link {
            display: inline-flex; align-items: center; gap: 0.35rem; margin-top: 0.9rem;
            font-family: 'Albert Sans', sans-serif; font-size: 0.7rem; font-weight: 700;
            letter-spacing: 0.15em; text-transform: uppercase; color: #C8FF2E;
            transition: gap 0.2s;
        }
        .mega-featured-link:hover { gap: 0.65rem; }

        /* ── Auth Dropdown (small) ──────────────────────────────── */
        .dropdown-parent { position: relative; }
        .dropdown-menu-list {
            position: absolute; top: calc(100% + 10px); right: 0; left: auto;
            width: 200px; background: #15181D;
            border: 1px solid rgba(0,0,0,0.08);
            box-shadow: 0 16px 48px rgba(0,0,0,0.1);
            padding: 0.4rem 0; opacity: 0; visibility: hidden;
            transition: all 0.22s cubic-bezier(0.23,1,0.32,1);
            z-index: 1200; transform: translateY(6px);
        }
        .dropdown-parent:hover .dropdown-menu-list {
            opacity: 1; visibility: visible; transform: translateY(0);
        }
        .dropdown-item {
            display: block; padding: 0.55rem 1.1rem;
            font-family: 'Albert Sans', sans-serif; font-size: 0.76rem; font-weight: 600;
            letter-spacing: 0.06em; text-transform: uppercase; color: #4B5563;
            transition: all 0.18s ease; border-left: 2px solid transparent;
        }
        .dropdown-item:hover {
            color: #FFFEFE; background: rgba(200,255,46,0.04);
            border-left-color: #C8FF2E; padding-left: 1.35rem;
        }
        .dropdown-section-title {
            padding: 0.18rem 1.1rem; font-family: 'Albert Sans', sans-serif;
            font-size: 0.56rem; font-weight: 700; letter-spacing: 0.15em;
            color: #C8FF2E; text-transform: uppercase; margin-bottom: 0.2rem;
        }

        /* ── Logo ────────────────────────────────────────────────── */
        .rgr-logo {
            font-family: 'Albert Sans', sans-serif;
            font-weight: 900;
            letter-spacing: 0.08em;
            background: linear-gradient(
                120deg,
                #C8FF2E 20%,
                #FF9EAF 40%,
                #111827 50%,
                #FF9EAF 60%,
                #C8FF2E 80%
            );
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textShiny 5s linear infinite;
            filter: drop-shadow(0 0 6px rgba(200,255,46,0.3));
        }

        /* ── reactbits.dev Shiny Text Keyframes ───────────────────── */
        @keyframes textShiny {
            0% { background-position: 0% center; }
            100% { background-position: 200% center; }
        }

        /* ── reactbits.dev Cyber Grid Background overlay ──────────── */
        .grid-bg {
            position: relative;
        }
        .grid-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: linear-gradient(to right, rgba(196, 229, 56, 0.04) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(196, 229, 56, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 1;
        }

        /* ── CTA Button ──────────────────────────────────────────── */
        .btn-rgr {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.6rem;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #FFFFFF;
            background: #C8FF2E;
            border: 1px solid #C8FF2E;
            clip-path: polygon(8px 0%, 100% 0%, calc(100% - 8px) 100%, 0% 100%);
            overflow: hidden;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-rgr::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.25), transparent);
            transform: translateX(-100%);
            transition: transform 0.45s ease;
        }
        .btn-rgr:hover { box-shadow: 0 0 30px rgba(200,255,46,0.4), 0 0 70px rgba(200,255,46,0.15); }
        .btn-rgr:hover::before { transform: translateX(100%); }

        .btn-rgr-ghost {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.6rem;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #C8FF2E;
            background: transparent;
            border: 1px solid rgba(200,255,46,0.35);
            clip-path: polygon(8px 0%, 100% 0%, calc(100% - 8px) 100%, 0% 100%);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-rgr-ghost:hover {
            border-color: #C8FF2E;
            background: rgba(200,255,46,0.06);
            box-shadow: 0 0 20px rgba(200,255,46,0.15);
            color: #C8FF2E;
        }

        /* ── Section Helpers ─────────────────────────────────────── */
        .section-label {
            font-family: 'Albert Sans', sans-serif;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.28em;
            text-transform: uppercase;
            color: #C8FF2E;
        }
        .section-title {
            font-family: 'Albert Sans', sans-serif;
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.01em;
            color: #FFFEFE;
        }
        .cyan-line {
            height: 1px;
            background: linear-gradient(90deg, transparent, #C8FF2E, transparent);
            opacity: 0.25;
        }

        /* ── Card ────────────────────────────────────────────────── */
        .rgr-card {
            background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
            border: 1px solid rgba(200,255,46,0.08);
            position: relative;
            overflow: hidden;
            transition: all 0.45s cubic-bezier(0.23,1,0.32,1);
        }
        .rgr-card::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #C8FF2E, transparent);
            opacity: 0;
            transition: opacity 0.4s;
        }
        .rgr-card:hover { border-color: rgba(200,255,46,0.22); box-shadow: 0 25px 70px rgba(0,0,0,0.06), 0 0 40px rgba(200,255,46,0.05); transform: translateY(-4px); }
        .rgr-card:hover::before { opacity: 1; }

        /* ── Grid Background ─────────────────────────────────────── */
        .grid-bg {
            background-image:
                linear-gradient(rgba(200,255,46,0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200,255,46,0.02) 1px, transparent 1px);
            background-size: 65px 65px;
        }

        /* ── Reveal Animation ────────────────────────────────────── */
        [data-reveal] {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        [data-reveal].visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── Sponsor Tiers ───────────────────────────────────────── */
        .sponsor-logo-box {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(200,255,46,0.08);
            background: rgba(255,255,255,0.7);
            transition: all 0.3s ease;
            cursor: default;
        }
        .sponsor-logo-box:hover {
            border-color: rgba(200,255,46,0.22);
            background: rgba(200,255,46,0.04);
        }
        .sponsor-logo-title { padding: 1.5rem 2.5rem; }
        .sponsor-logo-technical { padding: 1rem 1.8rem; }
        .sponsor-logo-supplier { padding: 0.75rem 1.25rem; }

        /* ── Hamburger ───────────────────────────────────────────── */
        .hline { display: block; width: 22px; height: 1.5px; background: #C8FF2E; transition: all 0.3s ease; }

        /* ── Footer ──────────────────────────────────────────────── */
        .rgr-footer { background: #E9ECEF; border-top: 1px solid rgba(200,255,46,0.08); }

        #mob-menu {
            position: fixed !important;
            inset: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 9999 !important;
        }

        /* Infinite Sponsor Ticker animation */
        @keyframes ticker-anim {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .sponsor-ticker-container {
            overflow: hidden;
            width: 100%;
            display: flex;
            mask-image: linear-gradient(to right, transparent, white 20%, white 80%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, white 20%, white 80%, transparent);
        }
        .sponsor-ticker-wrapper {
            display: flex;
            white-space: nowrap;
            animation: ticker-anim 25s linear infinite;
        }
        .sponsor-ticker-item {
            padding: 0 1.75rem;
            font-family: 'Albert Sans', sans-serif;
            font-weight: 700;
            font-size: 0.72rem;
            letter-spacing: 0.2em;
            color: rgba(255, 254, 254, 0.35) !important;
            text-transform: uppercase;
            flex-shrink: 0;
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased">



{{-- ═══════════════════════════════ TOPBAR ════════════════════════════════ --}}
<div class="rgr-topbar" id="rgr-topbar">
    <div class="topbar-inner">
        <div class="topbar-text hidden sm:flex items-center gap-3">
            <span>🇮🇩</span>
            <span><span>Jakarta, Indonesia</span> &middot; Musim 2026</span>
            <span class="topbar-divider"></span>
            <span class="hidden lg:inline">F1 &middot; WEC &middot; IMSA &middot; IndyCar &middot; Formula E &middot; WRC &middot; NASCAR</span>
        </div>
        <div class="topbar-live">
            <span class="topbar-live-dot"></span>
            Musim 2026 Aktif
        </div>
        <div class="topbar-social">
            <a href="#" aria-label="Twitter/X">X</a>
            <span class="topbar-divider"></span>
            <a href="#" aria-label="Instagram">IG</a>
            <span class="topbar-divider"></span>
            <a href="#" aria-label="YouTube">YT</a>
            <span class="topbar-divider"></span>
            @auth
                <a href="{{ route('fan.dashboard') }}" style="color:rgba(200,255,46,0.9);">Fan Zone</a>
            @else
                <a href="{{ route('fan.login') }}" style="color:rgba(200,255,46,0.9);">Fan Login</a>
            @endauth
        </div>
    </div>
</div>

{{-- ═══════════════════════════════ NAVBAR ════════════════════════════════ --}}
<nav class="rgr-nav" id="rgr-nav" role="navigation" aria-label="Navigasi Utama"
     x-data="{ 
         mobileMenuOpen: false, 
         activePanel: null,
         closeTimeout: null,
         openPanel(panel) {
             clearTimeout(this.closeTimeout);
             this.activePanel = panel;
         },
         closePanel() {
             clearTimeout(this.closeTimeout);
             this.closeTimeout = setTimeout(() => {
                 this.activePanel = null;
             }, 300);
         }
     }"
     @keydown.escape.window="mobileMenuOpen = false; activePanel = null">

    {{-- Main row --}}
    <div class="max-w-[1280px] mx-auto px-6 h-[64px] xl:h-[68px] flex items-center justify-between mega-nav-row" id="nav-main-row">

        {{-- Logo --}}
        <a href="{{ route('home') }}" id="nav-logo" class="flex items-center gap-3 group flex-shrink-0">
            <div class="relative w-9 h-9 flex items-center justify-center flex-shrink-0 transition-transform duration-300 group-hover:scale-105"
                 style="clip-path:polygon(50% 0%,100% 28%,100% 72%,50% 100%,0% 72%,0% 28%); background:rgba(200,255,46,0.1); border:1.5px solid rgba(200,255,46,0.35);">
                <span class="font-display font-black text-rgr" style="font-size:0.5rem;letter-spacing:0.04em;">M1TRG</span>
            </div>
            <div class="flex flex-col leading-none">
                <span class="rgr-logo text-sm xl:text-base uppercase font-display font-black tracking-wider whitespace-nowrap">Mobil 1 Team RG</span>
                <span class="font-ui text-[0.54rem] text-muted tracking-[0.18em] uppercase mt-0.5 hidden xl:block">Official Motorsport</span>
            </div>
        </a>

        {{-- Desktop Links --}}
        <div class="hidden xl:flex items-center gap-6 flex-1 justify-center">

            <a href="{{ route('home') }}"
               class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
               id="nav-home">Beranda</a>

            {{-- Racing Programs --}}
            <button class="nav-link mega-parent {{ request()->routeIs('f1.*','indycar','fe','endurance.*','gt.*','ewc','nascar','wrc') ? 'active' : '' }}"
                    @mouseenter="openPanel('racing')" @mouseleave="closePanel()"
                    aria-haspopup="true" :aria-expanded="activePanel === 'racing'">
                Racing Programs
                <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </button>

            {{-- Drivers & Crew --}}
            <button class="nav-link mega-parent {{ request()->routeIs('drivers','about.corporate','about.academy') ? 'active' : '' }}"
                    @mouseenter="openPanel('drivers')" @mouseleave="closePanel()"
                    aria-haspopup="true" :aria-expanded="activePanel === 'drivers'">
                Drivers &amp; Crew
                <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </button>

            {{-- Race Center --}}
            <button class="nav-link mega-parent {{ request()->routeIs('race.schedule','standings','paddock.club') ? 'active' : '' }}"
                    @mouseenter="openPanel('race')" @mouseleave="closePanel()"
                    aria-haspopup="true" :aria-expanded="activePanel === 'race'">
                Race Center
                <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </button>

            <a href="{{ route('partners') }}"
               class="nav-link {{ request()->routeIs('partners') ? 'active' : '' }}"
               id="nav-partners">Partners</a>

            {{-- Media Hub --}}
            <button class="nav-link mega-parent {{ request()->routeIs('about.news','about.magazine','about.media') ? 'active' : '' }}"
                    @mouseenter="openPanel('media')" @mouseleave="closePanel()"
                    aria-haspopup="true" :aria-expanded="activePanel === 'media'">
                Media Hub
                <svg class="nav-chevron" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
            </button>

            <a href="{{ route('shop') }}"
               class="nav-link {{ request()->routeIs('shop') ? 'active' : '' }}"
               id="nav-shop">Shop</a>
        </div>

        {{-- Right: CTA + Hamburger --}}
        <div class="flex items-center gap-3 flex-shrink-0">
            @auth
                <div class="dropdown-parent hidden xl:inline-flex">
                    <button class="btn-rgr flex items-center gap-1.5 focus:outline-none text-xs"
                            style="background:#96B81C;border-color:#96B81C;border-radius:0;padding:0.45rem 1rem;">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 10a4 4 0 100-8 4 4 0 000 8zm-7 8a7 7 0 1114 0H3z"/></svg>
                        {{ Auth::user()->name }}
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="dropdown-menu-list">
                        <a href="{{ route('fan.dashboard') }}" class="dropdown-item">Dasbor Fan Zone</a>
                        <a href="{{ route('dashboard') }}" class="dropdown-item">VIP Paddock Club</a>
                        <div class="h-px bg-gray-100 my-1"></div>
                        <form action="{{ route('fan.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item w-full text-left" style="color:#C8FF2E;">Keluar</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('fan.login') }}"
                   class="hidden xl:inline-flex items-center btn-rgr text-xs gap-1.5"
                   id="nav-cta"
                   style="border-radius:0;padding:0.45rem 1.1rem;letter-spacing:0.1em;">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Fan Portal
                </a>
            @endauth

            <button class="xl:hidden flex flex-col gap-[5px] p-2"
                    id="mob-btn"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    aria-label="Buka menu"
                    :aria-expanded="mobileMenuOpen ? 'true' : 'false'">
                <span class="hline" :style="mobileMenuOpen ? 'transform:translateY(6.5px) rotate(45deg)' : ''"></span>
                <span class="hline" :style="mobileMenuOpen ? 'opacity:0;transform:scaleX(0)' : ''"></span>
                <span class="hline" :style="mobileMenuOpen ? 'transform:translateY(-6.5px) rotate(-45deg)' : ''"></span>
            </button>
        </div>
    </div>

    {{-- ═══ MEGA PANELS ═══ --}}

    {{-- Racing Programs Panel —— 3 Columns --}}
    <div class="mega-panel" id="panel-racing"
         :class="{ 'mega-active': activePanel === 'racing' }"
         @mouseenter="openPanel('racing')" @mouseleave="closePanel()">
        <div class="mega-panel-inner">
            <div class="flex gap-8">
                {{-- Col 1: Formula --}}
                <div class="flex-1 min-w-0">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#C8FF2E" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
                        Formula &amp; Open-Wheel
                    </p>
                    <a href="{{ route('f1.division') }}" class="mega-item">
                        <span class="mega-item-icon">F1</span>
                        <span class="mega-item-label">Formula 1<span class="mega-item-sub">FIA World Championship · Constructor</span></span>
                    </a>
                    <a href="{{ route('indycar') }}" class="mega-item">
                        <span class="mega-item-icon">IC</span>
                        <span class="mega-item-label">NTT IndyCar Series<span class="mega-item-sub">Oval &amp; Road Course · North America</span></span>
                    </a>
                    <a href="{{ route('fe') }}" class="mega-item">
                        <span class="mega-item-icon">FE</span>
                        <span class="mega-item-label">FIA Formula E<span class="mega-item-sub">Electric Single-Seater · Street Circuits</span></span>
                    </a>
                </div>

                <div class="mega-divider"></div>

                {{-- Col 2: Endurance & GT --}}
                <div class="flex-1 min-w-0">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#C8FF2E" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        Endurance &amp; GT
                    </p>
                    <a href="{{ route('endurance.show', '24h-le-mans') }}" class="mega-item">
                        <span class="mega-item-icon">LM</span>
                        <span class="mega-item-label">Le Mans 24 Jam<span class="mega-item-sub">FIA WEC Hypercar · La Sarthe</span></span>
                    </a>
                    <a href="{{ route('endurance.show', 'imsa-6h-the-glen') }}" class="mega-item">
                        <span class="mega-item-icon">IM</span>
                        <span class="mega-item-label">IMSA 6H The Glen<span class="mega-item-sub">GTD Pro · Watkins Glen</span></span>
                    </a>
                    <a href="{{ route('endurance.show', '24h-nurburgring') }}" class="mega-item">
                        <span class="mega-item-icon">NR</span>
                        <span class="mega-item-label">Nürburgring 24 Jam<span class="mega-item-sub">Nordschleife · 25.378 km</span></span>
                    </a>
                    <a href="{{ route('gt.europe') }}" class="mega-item">
                        <span class="mega-item-icon">GT</span>
                        <span class="mega-item-label">GT World Challenge Europe<span class="mega-item-sub">GT3 Pro-Am · SRO Motorsports</span></span>
                    </a>
                    <a href="{{ route('gt.asia') }}" class="mega-item">
                        <span class="mega-item-icon">AS</span>
                        <span class="mega-item-label">GT World Challenge Asia<span class="mega-item-sub">GT3 Silver Cup · Asian Circuits</span></span>
                    </a>
                    <a href="{{ route('ewc') }}" class="mega-item">
                        <span class="mega-item-icon">EW</span>
                        <span class="mega-item-label">FIM EWC<span class="mega-item-sub">Motorcycling Endurance Championship</span></span>
                    </a>
                </div>

                <div class="mega-divider"></div>

                {{-- Col 3: Stock/Off-Road + Feature Card --}}
                <div style="min-width:220px;max-width:245px;">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#C8FF2E" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Stock &amp; Off-Road
                    </p>
                    <a href="{{ route('nascar') }}" class="mega-item">
                        <span class="mega-item-icon">NC</span>
                        <span class="mega-item-label">NASCAR Cup Series<span class="mega-item-sub">Next Gen · Daytona 500</span></span>
                    </a>
                    <a href="{{ route('wrc') }}" class="mega-item">
                        <span class="mega-item-icon">WR</span>
                        <span class="mega-item-label">FIA World Rally Championship<span class="mega-item-sub">Gravel, Tarmac &amp; Snow</span></span>
                    </a>
                    <div class="mega-featured-card mt-4">
                        <span class="mega-featured-badge">&#9679; Musim 2026</span>
                        <p class="mega-featured-title">10 Kejuaraan<br>Aktif</p>
                        <p class="mega-featured-sub">M1TRG bersaing di seluruh disiplin balap dunia dari sirkuit kota hingga hutan rally.</p>
                        <a href="{{ route('endurance.index') }}" class="mega-featured-link">
                            Lihat Semua Program
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="width:10px;height:10px;"><path d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Drivers & Crew Panel —— 2 Columns --}}
    <div class="mega-panel" id="panel-drivers"
         :class="{ 'mega-active': activePanel === 'drivers' }"
         @mouseenter="openPanel('drivers')" @mouseleave="closePanel()">
        <div class="mega-panel-inner">
            <div class="flex gap-8">
                <div style="min-width:280px;">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#C8FF2E" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                        Tim &amp; Personel
                    </p>
                    <a href="{{ route('drivers') }}" class="mega-item">
                        <span class="mega-item-icon">DR</span>
                        <span class="mega-item-label">Pembalap (Line-up)<span class="mega-item-sub">Driver Roster Musim 2026</span></span>
                    </a>
                    <a href="{{ route('about.corporate') }}" class="mega-item">
                        <span class="mega-item-icon">MG</span>
                        <span class="mega-item-label">Manajemen &amp; Strategi<span class="mega-item-sub">Principal · Engineers · Crew Chief</span></span>
                    </a>
                    <a href="{{ route('about.academy') }}" class="mega-item">
                        <span class="mega-item-icon">AC</span>
                        <span class="mega-item-label">Driver Academy<span class="mega-item-sub">Program Pembalap Muda Indonesia</span></span>
                    </a>
                </div>
                <div class="mega-divider"></div>
                <div class="flex-1">
                    <div class="mega-featured-card h-full flex flex-col justify-between" style="min-height:150px;">
                        <div>
                            <span class="mega-featured-badge">&#9679; Driver Program</span>
                            <p class="mega-featured-title">M1TRG Driver Academy</p>
                            <p class="mega-featured-sub">Bergabung dengan program pengembangan pembalap muda terbaik Indonesia untuk bersaing di panggung dunia.</p>
                        </div>
                        <a href="{{ route('about.academy') }}" class="mega-featured-link">
                            Daftar Sekarang
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="width:10px;height:10px;"><path d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Race Center Panel —— 2 Columns --}}
    <div class="mega-panel" id="panel-race"
         :class="{ 'mega-active': activePanel === 'race' }"
         @mouseenter="openPanel('race')" @mouseleave="closePanel()">
        <div class="mega-panel-inner">
            <div class="flex gap-8">
                <div style="min-width:260px;">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#C8FF2E" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        Pusat Data Balapan
                    </p>
                    <a href="{{ route('race.schedule') }}" class="mega-item">
                        <span class="mega-item-icon">SC</span>
                        <span class="mega-item-label">Schedule &amp; Calendar<span class="mega-item-sub">Jadwal Lengkap Musim 2026</span></span>
                    </a>
                    <a href="{{ route('standings') }}" class="mega-item">
                        <span class="mega-item-icon">ST</span>
                        <span class="mega-item-label">Results &amp; Standings<span class="mega-item-sub">Klasemen &amp; Hasil Balapan</span></span>
                    </a>
                    <a href="{{ route('paddock.club') }}" class="mega-item" style="border-left-color:rgba(200,255,46,0.4);">
                        <span class="mega-item-icon" style="background:rgba(200,255,46,0.1);border-color:rgba(200,255,46,0.25);">VIP</span>
                        <span class="mega-item-label" style="color:#111827;font-weight:700;">VIP Paddock Club<span class="mega-item-sub" style="color:#C8FF2E;">Akses Eksklusif Area Paddock</span></span>
                    </a>
                </div>
                <div class="mega-divider"></div>
                <div class="flex-1">
                    <div class="mega-featured-card" style="min-height:150px;">
                        <span class="mega-featured-badge">&#9889; Live Season</span>
                        <p class="mega-featured-title">Musim 2026<br>Sedang Berjalan</p>
                        <p class="mega-featured-sub">Pantau perkembangan klasemen dan jadwal balapan selanjutnya secara real-time di Race Center M1TRG.</p>
                        <a href="{{ route('race.schedule') }}" class="mega-featured-link">
                            Buka Race Center
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="width:10px;height:10px;"><path d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Media Hub Panel —— 2 Columns --}}
    <div class="mega-panel" id="panel-media"
         :class="{ 'mega-active': activePanel === 'media' }"
         @mouseenter="openPanel('media')" @mouseleave="closePanel()">
        <div class="mega-panel-inner">
            <div class="flex gap-8">
                <div style="min-width:260px;">
                    <p class="mega-col-header">
                        <svg fill="none" stroke="#C8FF2E" stroke-width="2.5" viewBox="0 0 24 24" style="width:11px;height:11px;"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9"/></svg>
                        Konten &amp; Media
                    </p>
                    <a href="{{ route('about.news') }}" class="mega-item">
                        <span class="mega-item-icon">PR</span>
                        <span class="mega-item-label">Press Releases<span class="mega-item-sub">Siaran Pers &amp; Pengumuman Resmi</span></span>
                    </a>
                    <a href="{{ route('about.magazine') }}" class="mega-item">
                        <span class="mega-item-icon">GL</span>
                        <span class="mega-item-label">Gallery &amp; Podcasts<span class="mega-item-sub">Foto, Video dan Audio Tim</span></span>
                    </a>
                    <a href="{{ route('about.media') }}" class="mega-item">
                        <span class="mega-item-icon">KT</span>
                        <span class="mega-item-label">Media Kit<span class="mega-item-sub">Logo, Branding &amp; Dokumen Resmi</span></span>
                    </a>
                </div>
                <div class="mega-divider"></div>
                <div class="flex-1">
                    <div class="mega-featured-card">
                        <span class="mega-featured-badge">&#128240; Latest</span>
                        <p class="mega-featured-title">Press Room<br>M1TRG 2026</p>
                        <p class="mega-featured-sub">Akses semua materi media resmi, liputan pers, dan konten eksklusif tim M1TRG.</p>
                        <a href="{{ route('about.news') }}" class="mega-featured-link">
                            Buka Press Room
                            <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="width:10px;height:10px;"><path d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══ MOBILE MENU ═══ --}}
    <div class="xl:hidden fixed inset-0 z-50 bg-white flex flex-col overflow-y-auto"
         id="mob-menu"
         x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-250"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display:none;">

        {{-- Header --}}
        <div class="px-5 py-4 flex items-center justify-between flex-shrink-0"
             style="background:#0f172a; border-bottom:2px solid rgba(200,255,46,0.3);">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 flex items-center justify-center"
                     style="clip-path:polygon(50% 0%,100% 28%,100% 72%,50% 100%,0% 72%,0% 28%); background:rgba(200,255,46,0.15); border:1px solid rgba(200,255,46,0.4);">
                    <span class="font-display font-black" style="font-size:0.46rem; color:rgba(255,80,80,1);">M1TRG</span>
                </div>
                <div>
                    <span class="font-display font-black text-white text-sm tracking-wider uppercase block">Mobil 1 Team RG</span>
                    <span class="font-ui text-[0.54rem] tracking-widest uppercase" style="color:rgba(200,255,46,0.7);">Official Motorsport · 2026</span>
                </div>
            </div>
            <button @click="mobileMenuOpen = false" class="p-1.5" style="color:rgba(200,255,46,0.8);" aria-label="Tutup menu">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Accordion body --}}
        <div class="flex-1 overflow-y-auto" x-data="{ openSection: 'racing' }">

            {{-- Racing Programs --}}
            <div class="border-b border-gray-100">
                <button @click="openSection = openSection === 'racing' ? null : 'racing'"
                        class="w-full px-5 py-4 flex items-center justify-between">
                    <span class="font-display font-black text-xs text-red-600 uppercase tracking-wider">Racing Programs</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="openSection === 'racing' ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openSection === 'racing'" x-transition class="px-5 pb-5" style="display:none;">
                    <p class="text-[0.6rem] font-ui font-bold text-gray-400 uppercase tracking-widest mb-2">Formula &amp; Open-Wheel</p>
                    <a href="{{ route('f1.division') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">F1</span>Formula 1
                    </a>
                    <a href="{{ route('indycar') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">IC</span>IndyCar Series
                    </a>
                    <a href="{{ route('fe') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">FE</span>Formula E
                    </a>
                    <p class="text-[0.6rem] font-ui font-bold text-gray-400 uppercase tracking-widest mb-2 mt-4">Endurance &amp; GT</p>
                    <a href="{{ route('endurance.show', '24h-le-mans') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">LM</span>Le Mans 24H
                    </a>
                    <a href="{{ route('endurance.show', 'imsa-6h-the-glen') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">IM</span>IMSA 6H Glen
                    </a>
                    <a href="{{ route('endurance.show', '24h-nurburgring') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">NR</span>Nürburgring 24H
                    </a>
                    <a href="{{ route('gt.europe') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">GT</span>GTC Europe
                    </a>
                    <a href="{{ route('gt.asia') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">AS</span>GTC Asia
                    </a>
                    <a href="{{ route('ewc') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">EW</span>FIM EWC
                    </a>
                    <p class="text-[0.6rem] font-ui font-bold text-gray-400 uppercase tracking-widest mb-2 mt-4">Stock &amp; Off-Road</p>
                    <a href="{{ route('nascar') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">NC</span>NASCAR Cup
                    </a>
                    <a href="{{ route('wrc') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">WR</span>FIA WRC Rally
                    </a>
                </div>
            </div>

            {{-- Drivers & Crew --}}
            <div class="border-b border-gray-100">
                <button @click="openSection = openSection === 'drivers' ? null : 'drivers'"
                        class="w-full px-5 py-4 flex items-center justify-between">
                    <span class="font-display font-black text-xs text-red-600 uppercase tracking-wider">Drivers &amp; Crew</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="openSection === 'drivers' ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openSection === 'drivers'" x-transition class="px-5 pb-5 space-y-0.5" style="display:none;">
                    <a href="{{ route('drivers') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">DR</span>Pembalap
                    </a>
                    <a href="{{ route('about.corporate') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">MG</span>Manajemen
                    </a>
                    <a href="{{ route('about.academy') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">AC</span>Driver Academy
                    </a>
                </div>
            </div>

            {{-- Race Center --}}
            <div class="border-b border-gray-100">
                <button @click="openSection = openSection === 'race' ? null : 'race'"
                        class="w-full px-5 py-4 flex items-center justify-between">
                    <span class="font-display font-black text-xs text-red-600 uppercase tracking-wider">Race Center</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="openSection === 'race' ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openSection === 'race'" x-transition class="px-5 pb-5 space-y-0.5" style="display:none;">
                    <a href="{{ route('race.schedule') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">SC</span>Schedule
                    </a>
                    <a href="{{ route('standings') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">ST</span>Standings
                    </a>
                    <a href="{{ route('paddock.club') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-bold text-red-600 hover:text-red-700 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-100 border border-red-200 flex items-center justify-center text-[0.48rem] font-black font-display text-red-600 flex-shrink-0">VIP</span>VIP Paddock Club
                    </a>
                </div>
            </div>

            <a href="{{ route('partners') }}" @click="mobileMenuOpen=false"
               class="flex items-center justify-between px-5 py-4 border-b border-gray-100 text-sm font-ui font-bold uppercase tracking-wider text-gray-700 hover:text-red-600 transition-colors">
                Partners
                <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
            </a>

            {{-- Media Hub --}}
            <div class="border-b border-gray-100">
                <button @click="openSection = openSection === 'media' ? null : 'media'"
                        class="w-full px-5 py-4 flex items-center justify-between">
                    <span class="font-display font-black text-xs text-red-600 uppercase tracking-wider">Media Hub</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-200" :class="openSection === 'media' ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="openSection === 'media'" x-transition class="px-5 pb-5 space-y-0.5" style="display:none;">
                    <a href="{{ route('about.news') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">PR</span>Press Releases
                    </a>
                    <a href="{{ route('about.magazine') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">GL</span>Gallery
                    </a>
                    <a href="{{ route('about.media') }}" @click="mobileMenuOpen=false" class="flex items-center gap-2.5 py-2 text-sm font-ui font-semibold text-gray-700 hover:text-red-600 transition-colors uppercase tracking-wider">
                        <span class="w-5 h-5 bg-red-50 border border-red-100 flex items-center justify-center text-[0.48rem] font-black font-display text-red-500 flex-shrink-0">KT</span>Media Kit
                    </a>
                </div>
            </div>

            <a href="{{ route('shop') }}" @click="mobileMenuOpen=false"
               class="flex items-center justify-between px-5 py-4 border-b border-gray-100 text-sm font-ui font-bold uppercase tracking-wider text-gray-700 hover:text-red-600 transition-colors">
                Shop
                <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        {{-- Footer CTA --}}
        <div class="flex-shrink-0 p-4 border-t border-gray-100 bg-gray-50">
            @auth
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center text-white text-xs font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-xs font-ui font-bold text-gray-800 uppercase">{{ Auth::user()->name }}</p>
                        <a href="{{ route('fan.dashboard') }}" class="text-[0.65rem] text-red-600 font-ui uppercase tracking-wider">Dasbor Fan Zone &rarr;</a>
                    </div>
                </div>
                <form action="{{ route('fan.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-2.5 text-xs font-ui font-bold uppercase tracking-wider text-red-600 border border-red-200 hover:bg-red-50 transition-colors">Keluar</button>
                </form>
            @else
                <a href="{{ route('fan.login') }}" class="w-full btn-rgr flex items-center justify-center gap-2 text-xs" style="border-radius:0;">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Masuk Fan Portal
                </a>
            @endauth
        </div>
    </div>

</nav>

{{-- Page Content --}}
<main>
    @yield('content')
</main>

{{-- ═══════════════════════════════ FOOTER ════════════════════════════════ --}}
<footer class="rgr-footer" role="contentinfo">
    <div class="max-w-7xl mx-auto px-6 pt-16 pb-8">

        {{-- Top Grid: Brand + Nav + Contact --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">

            {{-- Brand --}}
            <div>
                <a href="{{ route('home') }}" class="rgr-logo text-xl block mb-5">RG RACING</a>
                <p class="text-muted text-sm leading-relaxed max-w-xs">
                    Kekuatan motorsport global bentukan Indonesia yang berkompetisi di ajang F1, WEC, IMSA, dan berbagai kejuaraan ketahanan dunia sejak 2018.
                </p>
                <div class="flex gap-2.5 mt-6">
                    @foreach(['X', 'IG', 'YT', 'TK'] as $soc)
                    <span class="w-8 h-8 flex items-center justify-center border border-faint hover:border-rgr hover:text-rgr transition-all duration-200 text-muted cursor-pointer font-ui font-bold text-xs">{{ $soc }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Navigation --}}
            <div>
                <h3 class="section-label mb-5">TENTANG KAMI</h3>
                <ul class="grid grid-cols-2 gap-x-4 gap-y-3">
                    @foreach([
                        ['about.history', 'Tentang Kami'],
                        ['about.achievements', 'Prestasi & Statistik'],
                        ['about.partnership', 'Partnership'],
                        ['about.sustainability', 'Keberlanjutan'],
                        ['about.media', 'Pusat Media'],
                        ['about.news', 'Berita Terbaru'],
                        ['about.magazine', 'Majalah Tim'],
                        ['about.join', 'Karir & Lowongan']
                    ] as $link)
                    <li>
                        <a href="{{ route($link[0]) }}" class="text-muted text-sm hover:text-rgr transition-colors duration-200">
                            {{ $link[1] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="section-label mb-5">Markas Tim</h3>
                <p class="text-muted text-sm">Jakarta, Indonesia</p>
                <p class="text-muted text-sm mt-2">Principal: <span class="text-pure font-medium">Rey Gilang</span></p>
                <div class="mt-5 pt-5 border-t border-faint/30">
                    <p class="text-muted text-xs">FIA Formula 1 · FIA WEC · IMSA WeatherTech</p>
                    <p class="text-muted text-xs mt-1">VLN Endurance · ADAC Nürburgring 24H</p>
                </div>
            </div>
        </div>

        {{-- Sponsor Grid by Tier --}}
        @if(isset($sponsorsByTier) && !empty(array_filter(array_map(fn($t) => count($t), $sponsorsByTier ?? []))))
        <div class="mb-10">
            <div class="cyan-line mb-8"></div>

            {{-- Desktop Sponsor Grid --}}
            <div class="hidden xl:block">
                {{-- Title Sponsors --}}
                @if(isset($sponsorsByTier['Title Sponsor']) && count($sponsorsByTier['Title Sponsor']) > 0)
                <div class="mb-6">
                    <p class="text-faint text-xs font-ui tracking-widest uppercase mb-4">Sponsor Utama (Title Partners)</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach($sponsorsByTier['Title Sponsor'] as $sp)
                        <div class="sponsor-logo-box sponsor-logo-title min-w-[160px]">
                            <span class="font-display font-black text-rgr text-sm tracking-widest uppercase">{{ $sp->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Technical Partners --}}
                @if(isset($sponsorsByTier['Technical Partner']) && count($sponsorsByTier['Technical Partner']) > 0)
                <div class="mb-6">
                    <p class="text-faint text-xs font-ui tracking-widest uppercase mb-4">Mitra Teknis (Technical Partners)</p>
                    <div class="flex flex-wrap gap-2.5">
                        @foreach($sponsorsByTier['Technical Partner'] as $sp)
                        <div class="sponsor-logo-box sponsor-logo-technical min-w-[110px]">
                            <span class="font-ui font-bold text-muted hover:text-pure text-xs tracking-widest uppercase transition-colors">{{ $sp->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Official Suppliers --}}
                @if(isset($sponsorsByTier['Official Supplier']) && count($sponsorsByTier['Official Supplier']) > 0)
                <div>
                    <p class="text-faint text-xs font-ui tracking-widest uppercase mb-4">Pemasok Resmi (Official Suppliers)</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($sponsorsByTier['Official Supplier'] as $sp)
                        <div class="sponsor-logo-box sponsor-logo-supplier min-w-[90px]">
                            <span class="font-ui text-faint hover:text-muted text-[0.72rem] tracking-wide uppercase font-semibold transition-colors">{{ $sp->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Mobile Infinite Sponsor Ticker --}}
            <div class="xl:hidden block">
                <p class="text-faint text-[0.55rem] font-ui tracking-widest uppercase mb-4 text-center">OFFICIAL TEAM PARTNERS (INFINITE TICKER)</p>
                <div class="sponsor-ticker-container relative py-3 bg-pitch/50 border-y border-steel/10">
                    <div class="sponsor-ticker-wrapper">
                        @foreach($sponsorsByTier as $tier => $list)
                            @foreach($list as $sp)
                                <div class="sponsor-ticker-item">
                                    {{ $sp->name }}
                                </div>
                            @endforeach
                        @endforeach
                        {{-- Duplicate items for infinite loop --}}
                        @foreach($sponsorsByTier as $tier => $list)
                            @foreach($list as $sp)
                                <div class="sponsor-ticker-item">
                                    {{ $sp->name }}
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        @endif

        {{-- Bottom bar --}}
        <div class="cyan-line mb-6"></div>
        <div class="flex flex-col sm:flex-row justify-between items-center gap-2 text-faint text-xs font-ui">
            <p>&copy; {{ date('Y') }} Mobil 1 Team RG (M1TRG) Motorsport. Seluruh hak cipta dilindungi.</p>
            <p class="text-rgr/50 tracking-[0.3em] uppercase text-[0.6rem]">Ultimate Speed · Gold Standard</p>
        </div>
    </div>
</footer>

{{-- ═══════════════════════════════ SCRIPTS ════════════════════════════════ --}}
<script>
    // -- Topbar + Navbar scroll logic -----------------------------------------
    const nav     = document.getElementById('rgr-nav');
    const topbar  = document.getElementById('rgr-topbar');
    const panels  = document.querySelectorAll('.mega-panel');
    let ticking = false;
    function updateNav() {
        const scrolled   = window.scrollY > 50;
        const topbarGone = window.scrollY > 80;
        nav.classList.toggle('scrolled', scrolled);
        if (topbar) topbar.classList.toggle('hidden-topbar', topbarGone);
        nav.classList.toggle('topbar-gone', topbarGone);
        const navBottom = nav.getBoundingClientRect().bottom;
        panels.forEach(function(p) { p.style.top = navBottom + 'px'; });
        ticking = false;
    }
    window.addEventListener('scroll', function() {
        if (!ticking) { requestAnimationFrame(updateNav); ticking = true; }
    }, { passive: true });
    window.addEventListener('resize', updateNav, { passive: true });
    updateNav();



    // ── Scroll reveal ─────────────────────────────────────────────
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                revealObserver.unobserve(e.target);
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('[data-reveal]').forEach((el, i) => {
        el.style.transitionDelay = `${(i % 4) * 100}ms`;
        revealObserver.observe(el);
    });
</script>

<!-- Slide-over Cart (Alpine.js) -->
<div x-data="globalCart()" x-init="initCart()" @open-cart.window="open = true" @add-to-cart.window="addToCart($event.detail)" class="relative z-50">
    <!-- Floating Proposal Button -->
    <a href="{{ route('partners') }}" class="fixed bottom-24 right-6 bg-[#96B81C] text-white p-4 shadow-xl hover:scale-110 transition-transform flex items-center justify-center z-40 group" style="border-radius: 0 !important;" title="Download Proposal">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
        </svg>
    </a>

    <!-- Floating Cart Badge -->
    <button @click="open = true" class="fixed bottom-6 right-6 bg-[#96B81C] text-white p-4 shadow-xl hover:scale-110 transition-transform flex items-center justify-center gap-2 z-40 group" style="border-radius: 0 !important;">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        <span x-text="itemsCount()" class="font-bold font-mono text-xs bg-white text-[#96B81C] px-2 py-0.5 rounded-full">0</span>
    </button>

    <!-- Backdrop -->
    <div x-show="open" x-transition.opacity @click="open = false" class="fixed inset-0 bg-black/60 z-50 backdrop-blur-sm" style="display:none;"></div>

    <!-- Drawer Panel -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300 transform" 
         x-transition:enter-start="translate-x-full" 
         x-transition:enter-end="translate-x-0" 
         x-transition:leave="transition ease-in duration-200 transform" 
         x-transition:leave-start="translate-x-0" 
         x-transition:leave-end="translate-x-full" 
         class="fixed right-0 top-0 bottom-0 w-full max-w-md bg-white border-l border-steel/10 shadow-2xl z-50 flex flex-col justify-between"
         style="border-radius: 0 !important; display:none;">
         
         <!-- Header -->
         <div class="p-6 border-b border-steel/10 flex justify-between items-center bg-pitch">
             <div>
                 <span class="text-[0.62rem] font-ui tracking-widest text-rgr font-bold uppercase block mb-1">M1TRG MERCHANDISE</span>
                 <h3 class="font-display font-black text-lg text-pure tracking-tight uppercase">KERANJANG BELANJA</h3>
             </div>
             <button @click="open = false" class="text-muted hover:text-pure font-bold text-lg">&times;</button>
         </div>

         <!-- Items List -->
         <div class="flex-1 overflow-y-auto p-6 space-y-4">
             <template x-if="items.length === 0">
                 <div class="text-center py-12 text-muted text-xs font-body">
                     Keranjang belanja Anda kosong.
                 </div>
             </template>
             <template x-for="(item, index) in items" :key="index">
                 <div class="flex items-center justify-between border-b border-steel/5 pb-3">
                     <div class="flex-1 pr-4">
                         <h4 class="font-display font-bold text-sm text-pure" x-text="item.name"></h4>
                         <p class="text-xs text-muted font-mono mt-0.5" x-text="'Rp' + Number(item.price).toLocaleString()"></p>
                         <p class="text-[0.62rem] text-faint font-mono" x-show="item.customInfo" x-text="'Kustom: ' + item.customInfo"></p>
                     </div>
                     <div class="flex items-center gap-3">
                         <div class="flex items-center border border-steel/10">
                             <button @click="updateQty(index, item.qty - 1)" class="px-2 py-0.5 bg-pitch text-pure hover:bg-steel/10 font-bold">-</button>
                             <span x-text="item.qty" class="px-3 font-mono text-xs text-pure"></span>
                             <button @click="updateQty(index, item.qty + 1)" class="px-2 py-0.5 bg-pitch text-pure hover:bg-steel/10 font-bold">+</button>
                         </div>
                         <button @click="removeItem(index)" class="text-rgr hover:text-rgr-dark font-bold text-xs">&times; Hapus</button>
                     </div>
                 </div>
             </template>
         </div>

         <!-- Footer -->
         <div class="p-6 border-t border-steel/10 bg-pitch">
             <div class="flex justify-between items-center mb-4 text-xs font-bold text-pure">
                 <span>Subtotal:</span>
                 <span class="font-mono text-sm" x-text="'Rp' + getSubtotal().toLocaleString()"></span>
             </div>
             <p class="text-[0.62rem] text-muted mb-4 font-body">Biaya pengiriman dan pajak dihitung pada saat proses checkout.</p>
             <button @click="goToCheckout()" class="w-full btn-rgr btn-ferrari justify-center text-xs py-3 font-semibold uppercase tracking-wider" :disabled="items.length === 0">
                 PROSES CHECKOUT
             </button>
         </div>
    </div>
</div>

<script>
function globalCart() {
    return {
        open: false,
        items: [],
        initCart() {
            const raw = localStorage.getItem('rgr_cart');
            if (raw) {
                try {
                    this.items = JSON.parse(raw);
                } catch(e) {
                    this.items = [];
                }
            }
            window.addEventListener('storage', () => {
                const updatedRaw = localStorage.getItem('rgr_cart');
                if (updatedRaw) {
                    try { this.items = JSON.parse(updatedRaw); } catch(e) {}
                }
            });
        },
        saveCart() {
            localStorage.setItem('rgr_cart', JSON.stringify(this.items));
            // Sync with local shop page instances if present
            window.dispatchEvent(new CustomEvent('storage'));
        },
        addToCart(item) {
            const found = this.items.find(i => i.id === item.id && i.customInfo === item.customInfo);
            if (found) {
                found.qty += 1;
            } else {
                this.items.push({
                    id: item.id,
                    name: item.name,
                    price: item.price,
                    qty: 1,
                    customInfo: item.customInfo || ''
                });
            }
            this.saveCart();
            this.open = true; // Auto open cart on add
        },
        updateQty(index, newQty) {
            if (newQty <= 0) {
                this.removeItem(index);
                return;
            }
            this.items[index].qty = newQty;
            this.saveCart();
        },
        removeItem(index) {
            this.items.splice(index, 1);
            this.saveCart();
        },
        itemsCount() {
            return this.items.reduce((acc, curr) => acc + curr.qty, 0);
        },
        getSubtotal() {
            return this.items.reduce((acc, curr) => acc + (curr.price * curr.qty), 0);
        },
        goToCheckout() {
            window.location.href = "{{ route('shop.checkout-v2') }}";
        }
    }
}


</script>

@stack('scripts')
</body>
</html>
