@extends('layouts.rgr-premium')

@section('title', 'Divisi Formula 1 | Mobil 1 Team RG')
@section('meta_description', 'Jelajahi Divisi Formula 1 Mobil 1 Team RG. Spesifikasi mesin Mercedes F1, pembalap utama Max Verstappen & George Russel, serta jadwal balapan.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg">

    {{-- Hero Division --}}
    <div class="max-w-7xl mx-auto px-6 mb-16">
        <p class="section-label mb-2">FIA FORMULA ONE WORLD CHAMPIONSHIP</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">FORMULA 1 DIVISION</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Puncak teknologi balap dunia. Divisi F1 Mobil 1 Team RG memadukan sasis karbon aerodinamika radikal dengan kekuatan mesin Mercedes F1 Power Unit yang legendaris.
        </p>
    </div>

    {{-- 2-Column: Car Highlight & Drivers --}}
    <div class="max-w-7xl mx-auto px-6 mb-20 grid lg:grid-cols-12 gap-8">
        
        {{-- F1 Car Info Card --}}
        <div class="lg:col-span-7 rgr-card p-8 flex flex-col justify-between" data-reveal>
            <div>
                <p class="section-label mb-2">JET DARAT UTAMA</p>
                <h2 class="font-display font-black text-2xl lg:text-3xl text-pure mb-6">
                    @if($f1Car) {{ $f1Car->model_name }} @else RGR-26 E Performance @endif
                </h2>
                
                @if($f1Car)
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <p class="text-xs text-faint uppercase font-ui tracking-wider">Unit Daya (Power Unit)</p>
                        <p class="text-sm font-display font-bold text-pure mt-1">{{ $f1Car->power_unit }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-faint uppercase font-ui tracking-wider">Sasis & Komposit</p>
                        <p class="text-sm font-display font-bold text-pure mt-1">{{ $f1Car->chassis }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-faint uppercase font-ui tracking-wider">Berat Minimum</p>
                        <p class="text-sm font-display font-bold text-pure mt-1">{{ $f1Car->weight }} kg</p>
                    </div>
                    <div>
                        <p class="text-xs text-faint uppercase font-ui tracking-wider">Kekuatan Mesin</p>
                        <p class="text-sm font-display font-bold text-pure mt-1">{{ $f1Car->power_hp }} HP</p>
                    </div>
                </div>
                
                <p class="text-xs text-muted leading-relaxed mb-6 font-body">
                     {{ $f1Car->aerodynamics_desc }}
                </p>
                @else
                <p class="text-muted text-sm mb-6">Data spesifikasi mobil F1 belum tersedia.</p>
                @endif
            </div>

            <div class="border-t border-steel/20 pt-6 flex justify-between items-center">
                <span class="text-xs font-ui text-muted">Ban Resmi: <strong class="text-pure">Pirelli</strong></span>
                <a href="{{ route('car.specs') }}" class="btn-rgr-ghost text-xs">SPESIFIKASI PENUH</a>
            </div>
        </div>

        {{-- F1 Driver Lineup Card --}}
        <div class="lg:col-span-5 flex flex-col gap-4">
            <p class="section-label px-2">Pembalap Resmi F1</p>
            @foreach($f1Drivers as $dr)
            <div class="rgr-card p-6 relative overflow-hidden" data-reveal>
                <div class="absolute right-[-0.5rem] bottom-[-1.5rem] font-display font-black text-8xl text-pure/[0.03] select-none pointer-events-none">
                    {{ str_pad($dr->permanent_number, 2, '0', STR_PAD_LEFT) }}
                </div>
                
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h3 class="font-display font-bold text-lg text-pure">{{ $dr->name }}</h3>
                        <p class="text-xs text-muted uppercase tracking-wider font-ui mt-1">{{ $dr->country }} ({{ $dr->country_code }})</p>
                    </div>
                    <span class="font-display font-black text-2xl text-rgr">#{{ $dr->permanent_number }}</span>
                </div>
                <p class="text-xs text-muted leading-relaxed font-body">
                    {{ $dr->bio }}
                </p>
            </div>
            @endforeach
        </div>

    </div>

    {{-- Race Calendar / Schedule --}}
    <div class="max-w-7xl mx-auto px-6">
        <p class="section-label mb-4">KALENDER BALAPAN MUSIM 2026</p>
        <h2 class="section-title text-3xl mb-8">RACE SCHEDULE F1</h2>
        
        <div class="grid gap-4">
            @forelse($f1Schedule as $sch)
            <div class="rgr-card p-6 flex flex-col md:flex-row md:items-center justify-between gap-4" data-reveal>
                <div>
                    <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase mb-1 block">SERI {{ $sch->round }}</span>
                    <h3 class="font-display font-bold text-lg text-pure">{{ $sch->race_name }}</h3>
                    <p class="text-xs text-muted font-ui uppercase mt-1">{{ $sch->circuit_name }}, {{ $sch->location }}</p>
                </div>
                
                <div class="flex items-center gap-6">
                    <div class="text-right">
                        <p class="text-xs text-muted uppercase font-ui tracking-wider">Tanggal Balapan</p>
                        <p class="text-sm font-display font-bold text-white mt-1">{{ $sch->race_date->format('d M Y') }}</p>
                    </div>
                    <div>
                        <span class="px-3 py-1 text-[0.62rem] font-display font-bold tracking-wider rounded uppercase {{ $sch->status === 'Upcoming' ? 'bg-rgr/10 text-rgr border border-rgr/20' : 'bg-white/05 text-muted border border-white/05' }}">
                            {{ $sch->status === 'Upcoming' ? 'AKAN DATANG' : 'SELESAI' }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-muted text-sm">Jadwal balapan F1 belum tersedia.</p>
            @endforelse
        </div>
    </div>

    {{-- F1 Specific Gallery --}}
    <div class="max-w-7xl mx-auto px-6 mt-20">
        <p class="section-label mb-4">MEDIA & STRATEGY ACTION</p>
        <h2 class="section-title text-3xl mb-8">F1 PHOTO GALLERY</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                    <span class="text-[0.62rem] font-ui tracking-widest text-muted">MONACO GRAND PRIX FP1</span>
                </div>
                <h4 class="font-display font-bold text-sm text-pure">FP1 Monaco Outlap</h4>
                <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Sesi latihan bebas di tikungan Fairmont Hairpin, menguji tingkat kelenturan suspensi karbon.</p>
            </div>
            <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                    <span class="text-[0.62rem] font-ui tracking-widest text-muted">SILVERSTONE HOTLAP</span>
                </div>
                <h4 class="font-display font-bold text-sm text-pure">Qualifying Hotlap Silverstone</h4>
                <p class="text-[0.68rem] text-muted leading-relaxed mt-1">George Russell memecahkan rekor waktu tercepat sektor 2 pada ban Pirelli Soft Compound.</p>
            </div>
            <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                    <span class="text-[0.62rem] font-ui tracking-widest text-muted">SAKHIR NIGHT PIT STOP</span>
                </div>
                <h4 class="font-display font-bold text-sm text-pure">Night Race Pit Stop Sakhir</h4>
                <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Kerja sama kru mekanik Mobil 1 Team RG menyelesaikan pergantian 4 ban dalam waktu 2.1 detik.</p>
            </div>
        </div>
    </div>

    {{-- F1 Division Specific Sponsors --}}
    <div class="max-w-7xl mx-auto px-6 mt-20">
        <p class="section-label mb-4">SPONSOR & PROGRAM PARTNERS</p>
        <h2 class="section-title text-3xl mb-8">F1 DIVISION PARTNERS</h2>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
            @php
                $f1Sponsors = ['Bank Mandiri', 'Telkomsel Flash', 'Pirelli Indonesia', 'Brembo', 'Akrapovič'];
            @endphp
            @foreach($f1Sponsors as $name)
                <div class="rgr-card p-4 rounded flex flex-col justify-center items-center text-center border-white/05 min-h-[100px]" data-reveal>
                    <span class="text-xs font-display font-bold text-pure">{{ $name }}</span>
                    <span class="text-[0.55rem] font-ui text-rgr uppercase font-bold mt-2">F1 Partner</span>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
