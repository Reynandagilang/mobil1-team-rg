@extends('layouts.rgr-premium')

@section('title', 'Mitra Pabrikan Premium — Mobil 1 Team RG')
@section('meta_description', 'Portal resmi mitra pabrikan otomotif global penyedia teknologi dan sasis mobil balap Mobil 1 Team RG.')

@push('styles')
<style>
.partner-hero {
    position: relative; padding-top: 130px; padding-bottom: 50px;
    background: #0B0D10; overflow: hidden;
}
.partner-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(196, 229, 56, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(196, 229, 56, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.partner-card {
    background: #15181D;
    border: 1px solid rgba(255, 255, 255, 0.08);
    transition: all 0.4s ease;
}
.partner-card:hover {
    border-color: rgba(200, 255, 46, 0.22);
    transform: translateY(-4px);
    box-shadow: 0 25px 70px rgba(0,0,0,0.4), 0 0 40px rgba(200, 255, 46, 0.05);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">
    
    {{-- Hero Section --}}
    <section class="partner-hero">
        <div class="partner-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>MANUFACTURER PARTNERS</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">Mitra Pabrikan Premium</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Mobil 1 Team RG bekerja sama secara langsung dengan produsen otomotif terkemuka dunia untuk menyuplai sasis, mesin, dan inovasi rekayasa motorsport terbaik.
            </p>
        </div>
    </section>

    {{-- Partners Grid --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="space-y-8">
                
                {{-- 1. Mercedes-AMG --}}
                <div class="partner-card p-8 rounded-lg flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center">
                    <div class="space-y-3 max-w-2xl">
                        <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-rgr bg-rgr/10 rounded uppercase">
                            FORMULA 1 & GT3 PARTNER
                        </span>
                        <h2 class="font-display font-bold text-3xl text-pure">Mercedes-AMG</h2>
                        <p class="text-xs text-muted leading-relaxed font-body">
                            Penyedia resmi unit daya (Power Unit) V6 Turbo Hybrid berkinerja tinggi untuk divisi utama FIA Formula 1 Mobil 1 Team RG, serta sasis Mercedes-AMG GT3 Evo yang digunakan dalam berbagai kompetisi ketahanan dunia.
                        </p>
                        <div class="flex gap-4 text-xs font-mono text-pure">
                            <p><span class="text-faint">Suplai Utama:</span> F1 Power Unit & GT3 Evo</p>
                            <p><span class="text-faint">Sejak:</span> 2025</p>
                        </div>
                    </div>
                    <a href="{{ route('f1.division') }}" class="btn-rgr text-xs w-full lg:w-fit justify-center">Lihat Divisi F1</a>
                </div>

                {{-- 2. Porsche Motorsport --}}
                <div class="partner-card p-8 rounded-lg flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center">
                    <div class="space-y-3 max-w-2xl">
                        <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-cyan-500 bg-cyan-500/10 rounded uppercase">
                            GTWCA DIVISION PARTNER
                        </span>
                        <h2 class="font-display font-bold text-3xl text-pure">Porsche Motorsport</h2>
                        <p class="text-xs text-muted leading-relaxed font-body">
                            Pemasok resmi armada mobil balap legendaris Porsche 911 GT3 R (generasi 992) untuk merebut kemenangan kejuaraan kontinental di ajang GT World Challenge Asia.
                        </p>
                        <div class="flex gap-4 text-xs font-mono text-pure">
                            <p><span class="text-faint">Suplai Utama:</span> Porsche 911 GT3 R (992)</p>
                            <p><span class="text-faint">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('gt.asia') }}" class="btn-rgr text-xs w-full lg:w-fit justify-center">Lihat Divisi GTWC Asia</a>
                </div>

                {{-- 3. Chevrolet Racing --}}
                <div class="partner-card p-8 rounded-lg flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center">
                    <div class="space-y-3 max-w-2xl">
                        <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-amber-500 bg-amber-500/10 rounded uppercase">
                            NASCAR DIVISION PARTNER
                        </span>
                        <h2 class="font-display font-bold text-3xl text-pure">Chevrolet Racing</h2>
                        <p class="text-xs text-muted leading-relaxed font-body">
                            Penyedia resmi sasis dan mesin V8 Naturally Aspirated Chevrolet Camaro ZL1 untuk kejuaraan balap mobil stok Amerika Serikat di ajang NASCAR Cup Series.
                        </p>
                        <div class="flex gap-4 text-xs font-mono text-pure">
                            <p><span class="text-faint">Suplai Utama:</span> Chevrolet Camaro ZL1 V8</p>
                            <p><span class="text-faint">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('nascar') }}" class="btn-rgr text-xs w-full lg:w-fit justify-center">Lihat Divisi NASCAR</a>
                </div>

                {{-- 4. Aston Martin Racing --}}
                <div class="partner-card p-8 rounded-lg flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center">
                    <div class="space-y-3 max-w-2xl">
                        <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-emerald-500 bg-emerald-500/10 rounded uppercase">
                            GTWCE DIVISION PARTNER
                        </span>
                        <h2 class="font-display font-bold text-3xl text-pure">Aston Martin Racing</h2>
                        <p class="text-xs text-muted leading-relaxed font-body">
                            Mitra penyedia sasis Aston Martin Vantage AMR GT3 bermesin Twin-Turbo V8 untuk berkompetisi di kelas Pro dan Bronze pada kejuaraan ketahanan elit GT World Challenge Europe.
                        </p>
                        <div class="flex gap-4 text-xs font-mono text-pure">
                            <p><span class="text-faint">Suplai Utama:</span> Aston Martin Vantage GT3</p>
                            <p><span class="text-faint">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('gt.europe') }}" class="btn-rgr text-xs w-full lg:w-fit justify-center">Lihat Divisi GTWC Europe</a>
                </div>

                {{-- 5. Ferrari Corse Clienti --}}
                <div class="partner-card p-8 rounded-lg flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center">
                    <div class="space-y-3 max-w-2xl">
                        <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-red-500 bg-red-500/10 rounded uppercase">
                            GT3 / ENDURANCE PARTNER
                        </span>
                        <h2 class="font-display font-bold text-3xl text-pure">Ferrari Corse Clienti</h2>
                        <p class="text-xs text-muted leading-relaxed font-body">
                            Kolaborasi riset teknologi sasis mobil balap Ferrari 296 GT3 bermesin V6 Twin-Turbo yang berfokus pada aerodinamika kolong sasis (*ground-effect*).
                        </p>
                        <div class="flex gap-4 text-xs font-mono text-pure">
                            <p><span class="text-faint">Suplai Utama:</span> Ferrari 296 GT3 Tech</p>
                            <p><span class="text-faint">Sejak:</span> 2024</p>
                        </div>
                    </div>
                    <a href="{{ route('car.specs') }}" class="btn-rgr text-xs w-full lg:w-fit justify-center">Lihat Spesifikasi Sasis</a>
                </div>

                {{-- 6. BMW M --}}
                <div class="partner-card p-8 rounded-lg flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center">
                    <div class="space-y-3 max-w-2xl">
                        <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-indigo-500 bg-indigo-500/10 rounded uppercase">
                            IMSA GTP PARTNER
                        </span>
                        <h2 class="font-display font-bold text-3xl text-pure">BMW M</h2>
                        <p class="text-xs text-muted leading-relaxed font-body">
                            Penyedia resmi unit mobil purwarupa hibrida tercanggih BMW M Hybrid V8 (LMDh) untuk kompetisi balap ketahanan Amerika di ajang IMSA WeatherTech SportsCar Championship.
                        </p>
                        <div class="flex gap-4 text-xs font-mono text-pure">
                            <p><span class="text-faint">Suplai Utama:</span> BMW M Hybrid V8 (LMDh)</p>
                            <p><span class="text-faint">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('endurance.show', 'imsa-6h-the-glen') }}" class="btn-rgr text-xs w-full lg:w-fit justify-center">Lihat Divisi IMSA</a>
                </div>

                {{-- 7. McLaren Racing --}}
                <div class="partner-card p-8 rounded-lg flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center">
                    <div class="space-y-3 max-w-2xl">
                        <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-orange-500 bg-orange-500/10 rounded uppercase">
                            INDYCAR & F1 TECHNICAL PARTNER
                        </span>
                        <h2 class="font-display font-bold text-3xl text-pure">McLaren Racing</h2>
                        <p class="text-xs text-muted leading-relaxed font-body">
                            Kolaborasi rekayasa rekayasa aerodinamika, penyuplai sasis Dallara IR-18 untuk ajang balap roda terbuka Amerika Serikat, serta kerja sama transfer teknologi Formula 1.
                        </p>
                        <div class="flex gap-4 text-xs font-mono text-pure">
                            <p><span class="text-faint">Suplai Utama:</span> Dallara IR-18 Chassis Tech</p>
                            <p><span class="text-faint">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('indycar') }}" class="btn-rgr text-xs w-full lg:w-fit justify-center">Lihat Divisi IndyCar</a>
                </div>

                {{-- 8. Toyota Gazoo Racing --}}
                <div class="partner-card p-8 rounded-lg flex flex-col lg:flex-row gap-8 justify-between items-start lg:items-center">
                    <div class="space-y-3 max-w-2xl">
                        <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-red-600 bg-red-600/10 rounded uppercase">
                            WRC TECHNICAL PARTNER
                        </span>
                        <h2 class="font-display font-bold text-3xl text-pure">Toyota Gazoo Racing</h2>
                        <p class="text-xs text-muted leading-relaxed font-body">
                            Penyedia resmi mobil GR Yaris Rally1 Hybrid untuk ajang balap ketahanan medan berat FIA World Rally Championship (WRC), serta riset gabungan daya hibrida Rally1.
                        </p>
                        <div class="flex gap-4 text-xs font-mono text-pure">
                            <p><span class="text-faint">Suplai Utama:</span> Toyota GR Yaris Rally1 Hybrid</p>
                            <p><span class="text-faint">Sejak:</span> 2026</p>
                        </div>
                    </div>
                    <a href="{{ route('wrc') }}" class="btn-rgr text-xs w-full lg:w-fit justify-center">Lihat Divisi WRC</a>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
