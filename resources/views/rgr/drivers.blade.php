@extends('layouts.rgr-premium')

@section('title', 'Drivers — Rey Gilang Racing')
@section('meta_description', 'Meet the Rey Gilang Racing drivers for the 2026 F1 season. Enzo Valentini and Kael Adriansen lead the charge for RGR.')

@push('styles')
<style>
    .drivers-hero {
        position: relative;
        padding-top: 120px;
        padding-bottom: 60px;
        overflow: hidden;
    }
    .drivers-hero-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(0,212,255,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0,212,255,0.03) 1px, transparent 1px);
        background-size: 60px 60px;
    }

    /* ── Full Driver Card ────────────────────────────────────────── */
    .driver-full-card {
        position: relative;
        background: linear-gradient(160deg, rgba(22,22,27,0.97), rgba(15,15,18,0.98));
        border: 1px solid rgba(0,212,255,0.12);
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    }
    .driver-full-card::after {
        content: '';
        position: absolute;
        top: 0; right: 0; bottom: 0;
        width: 3px;
        background: linear-gradient(180deg, transparent, #00D4FF, transparent);
        opacity: 0;
        transition: opacity 0.4s;
    }
    .driver-full-card:hover {
        border-color: rgba(0,212,255,0.3);
        box-shadow: 0 30px 80px rgba(0,0,0,0.8), 0 0 50px rgba(0,212,255,0.1);
        transform: translateY(-4px);
    }
    .driver-full-card:hover::after { opacity: 1; }

    .driver-bg-number {
        position: absolute;
        right: -2rem;
        top: 50%;
        transform: translateY(-50%);
        font-family: 'Orbitron', sans-serif;
        font-weight: 900;
        font-size: 18rem;
        line-height: 1;
        color: rgba(0,212,255,0.03);
        user-select: none;
        pointer-events: none;
        transition: color 0.4s, font-size 0.4s;
    }
    .driver-full-card:hover .driver-bg-number {
        color: rgba(0,212,255,0.06);
        font-size: 20rem;
    }

    .driver-img-area {
        aspect-ratio: 3/4;
        overflow: hidden;
        position: relative;
        background: linear-gradient(180deg, rgba(0,212,255,0.05), rgba(0,0,0,0));
    }
    .driver-img-area img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        filter: grayscale(15%) contrast(1.1);
        transition: all 0.5s ease;
    }
    .driver-full-card:hover .driver-img-area img {
        filter: grayscale(0%) contrast(1.15);
        transform: scale(1.04);
    }

    .driver-img-placeholder {
        aspect-ratio: 3/4;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, rgba(0,212,255,0.04), rgba(0,0,0,0.3));
        position: relative;
    }

    .stat-grid-item {
        padding: 1rem;
        border-right: 1px solid rgba(0,212,255,0.06);
        border-bottom: 1px solid rgba(0,212,255,0.06);
        transition: background 0.3s;
    }
    .stat-grid-item:hover { background: rgba(0,212,255,0.04); }

    /* Reserve driver card —— subtle styling */
    .reserve-card {
        background: linear-gradient(135deg, rgba(22,22,27,0.7), rgba(15,15,18,0.8));
        border: 1px solid rgba(0,212,255,0.06);
        transition: all 0.4s ease;
    }
    .reserve-card:hover {
        border-color: rgba(0,212,255,0.2);
        box-shadow: 0 15px 40px rgba(0,0,0,0.5);
    }
</style>
@endpush

@section('content')

{{-- Hero --}}
<section class="drivers-hero" id="drivers-hero" aria-label="Drivers Hero">
    <div class="drivers-hero-grid"></div>
    <div class="absolute left-0 top-0 bottom-0 w-[3px] hidden lg:block"
         style="background: linear-gradient(180deg, transparent, #00D4FF 40%, #00D4FF 60%, transparent);">
    </div>
    <div class="max-w-7xl mx-auto px-6 relative">
        <p class="section-label mb-4 flex items-center gap-3">
            <span class="w-6 h-px bg-rgr-cyan"></span>
            2026 Driver Lineup
        </p>
        <h1 class="section-title text-5xl lg:text-7xl mb-4">Our Pilots</h1>
        <p class="text-ice-2 text-lg max-w-xl">
            The human edge. Two drivers. One mission. The podium.
        </p>
    </div>
</section>

{{-- ── Race Drivers ─────────────────────────────────────────────── --}}
<section class="py-16" id="race-drivers" aria-label="Race Drivers">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-8">

            @foreach($drivers->where('role', 'Race Driver') as $driver)
            <article class="driver-full-card" data-reveal id="driver-profile-{{ $driver->id }}">
                <span class="driver-bg-number">{{ $driver->permanent_number }}</span>

                <div class="grid grid-cols-5">
                    {{-- Portrait --}}
                    <div class="col-span-2">
                        @if($driver->profile_image)
                        <div class="driver-img-area">
                            <img src="{{ asset('storage/'.$driver->profile_image) }}"
                                 alt="{{ $driver->name }} — M1TRG Driver"
                                 loading="lazy" decoding="async">
                        </div>
                        @else
                        <div class="driver-img-placeholder">
                            <div>
                                <span class="font-display font-black text-8xl text-rgr-cyan/15 block text-center">
                                    {{ $driver->permanent_number }}
                                </span>
                                <div class="w-20 h-32 mx-auto mt-4 relative">
                                    <div class="absolute inset-0 bg-gradient-to-b from-rgr-cyan/10 to-transparent"
                                         style="clip-path: polygon(30% 0%, 70% 0%, 85% 20%, 85% 65%, 100% 100%, 0% 100%, 15% 65%, 15% 20%);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="col-span-3 p-6 lg:p-8 flex flex-col">
                        {{-- Header --}}
                        <div class="mb-6">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">
                                        {{ $driver->country_code ?? $driver->country }}
                                    </p>
                                    <h2 class="text-ice font-display font-black text-2xl leading-tight">
                                        {{ $driver->name }}
                                    </h2>
                                </div>
                                <span class="font-display font-black text-3xl text-rgr-cyan leading-none"
                                      style="text-shadow: 0 0 20px rgba(0,212,255,0.5)">
                                    #{{ $driver->permanent_number }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-rgr-cyan"></span>
                                <span class="text-rgr-cyan text-xs font-racing tracking-widest uppercase">
                                    {{ $driver->role }}
                                </span>
                            </div>
                        </div>

                        {{-- Stats --}}
                        <div class="grid grid-cols-2 gap-px bg-rgr-cyan/06 border border-rgr-cyan/06 flex-1">
                            <div class="stat-grid-item bg-carbon-2">
                                <p class="text-rgr-cyan font-display font-black text-2xl">{{ $driver->podiums }}</p>
                                <p class="text-muted text-xs font-racing tracking-widest uppercase mt-1">Podiums</p>
                            </div>
                            <div class="stat-grid-item bg-carbon-2">
                                <p class="text-rgr-cyan font-display font-black text-2xl">{{ number_format($driver->career_points, 0) }}</p>
                                <p class="text-muted text-xs font-racing tracking-widest uppercase mt-1">Career Pts</p>
                            </div>
                            <div class="stat-grid-item bg-carbon-2">
                                <p class="text-ice font-display font-bold text-lg">{{ $driver->country }}</p>
                                <p class="text-muted text-xs font-racing tracking-widest uppercase mt-1">Nationality</p>
                            </div>
                            <div class="stat-grid-item bg-carbon-2">
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="w-2 h-2 rounded-full bg-rgr-cyan animate-pulse"></span>
                                    <p class="text-rgr-cyan text-sm font-racing tracking-wide uppercase">Active</p>
                                </div>
                                <p class="text-muted text-xs font-racing tracking-widest uppercase mt-1">Status</p>
                            </div>
                        </div>

                    </div>
                </div>
            </article>
            @endforeach

        </div>

        {{-- Reserve Driver --}}
        @php $reserve = $drivers->where('role', 'Reserve')->first(); @endphp
        @if($reserve)
        <div class="mt-12 pt-10 border-t border-rgr-cyan/08" data-reveal>
            <p class="section-label mb-6">Reserve Driver</p>
            <div class="reserve-card p-6 flex items-center gap-8 max-w-2xl">
                <span class="font-display font-black text-6xl text-rgr-cyan/20">#{{ $reserve->permanent_number }}</span>
                <div class="flex-1">
                    <p class="text-muted text-xs font-racing tracking-widest uppercase mb-1">{{ $reserve->country_code ?? $reserve->country }}</p>
                    <h3 class="text-ice font-display font-bold text-xl mb-1">{{ $reserve->name }}</h3>
                    <p class="text-rgr-cyan/70 text-xs font-racing tracking-widest uppercase">Reserve / Test Driver</p>
                </div>
                <div class="text-right">
                    <p class="text-rgr-cyan font-display font-bold text-lg">{{ $reserve->career_points }}</p>
                    <p class="text-muted text-xs font-racing uppercase tracking-widest">Career Pts</p>
                </div>
            </div>
        </div>
        @endif

    </div>
</section>

@endsection
