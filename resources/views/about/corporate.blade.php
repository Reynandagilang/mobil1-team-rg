@extends('layouts.rgr-premium')

@section('title', 'Struktur Korporat Tim | Mobil 1 Team RG')
@section('meta_description', 'Tata kelola korporat, dewan direksi, kepemimpinan tim, dan struktur manajemen Mobil 1 Team RG.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg">
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <p class="section-label mb-2">ABOUT US</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">CORPORATE STRUCTURE</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Di balik kecepatan mobil di lintasan, terdapat organisasi manajemen kelas dunia yang dirancang untuk efisiensi taktis maksimal.
        </p>
    </div>

    {{-- Section 1: Executive Leadership --}}
    <div class="max-w-7xl mx-auto px-6 mb-16">
        <h2 class="font-display font-bold text-xl text-pure uppercase tracking-widest mb-6 flex items-center gap-3">
            <span class="w-2 h-2 bg-rgr rounded-full"></span> Executive Leadership
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rgr-card p-6" data-reveal>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">FOUNDER & TEAM PRINCIPAL</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3">Rey Gilang</h3>
                <p class="text-xs text-muted leading-relaxed font-body">
                    Memimpin visi strategis teknis dan operasional harian seluruh tim di markas Jakarta serta memandu komunikasi pit-wall di setiap seri balapan.
                </p>
            </div>

            <div class="rgr-card p-6" data-reveal>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">CHIEF TECHNICAL OFFICER</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3">Adrian Newey Jr.</h3>
                <p class="text-xs text-muted leading-relaxed font-body">
                    Bertanggung jawab penuh atas divisi aerodinamika, integrasi mesin hibrida Mercedes-AMG, dan pengembangan inovasi sasis serat karbon terbaru.
                </p>
            </div>

            <div class="rgr-card p-6" data-reveal>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">CHIEF FINANCIAL OFFICER</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3">Elena Rostova</h3>
                <p class="text-xs text-muted leading-relaxed font-body">
                    Mengelola kepatuhan batas anggaran tahunan (FIA cost cap) senilai $135 juta dan merancang strategi pendanaan kemitraan sponsor global.
                </p>
            </div>
        </div>
    </div>

    {{-- Section 2: Technical & Racing Operations --}}
    <div class="max-w-7xl mx-auto px-6 mb-16">
        <h2 class="font-display font-bold text-xl text-pure uppercase tracking-widest mb-6 flex items-center gap-3">
            <span class="w-2 h-2 bg-rgr rounded-full"></span> Racing Operations & Engineering
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="rgr-card p-6" data-reveal>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">HEAD OF RACE OPERATIONS</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3">Sarah Sterling</h3>
                <p class="text-xs text-muted leading-relaxed font-body">
                    Mengelola logistik global, kru pit-stop, pengujian simulator, dan kepatuhan peraturan FIA di semua divisi kejuaraan.
                </p>
            </div>

            <div class="rgr-card p-6" data-reveal>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">HEAD OF AERODYNAMICS</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3">Dr. Hiroshi Tanaka</h3>
                <p class="text-xs text-muted leading-relaxed font-body">
                    Mengawasi pengujian terowongan angin (wind tunnel) mandiri tim dan merancang aerodinamika kolong sasis Venturi untuk downforce ekstrem.
                </p>
            </div>

            <div class="rgr-card p-6" data-reveal>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">CHIEF INFORMATION OFFICER</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3">Anindya Surya</h3>
                <p class="text-xs text-muted leading-relaxed font-body">
                    Bertanggung jawab atas infrastruktur superkomputer, transmisi telemetri sasis real-time dari sirkuit ke markas besar Jakarta, dan pertahanan siber data balap.
                </p>
            </div>
        </div>
    </div>

    {{-- Section 3: Development & Brand Strategy --}}
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="font-display font-bold text-xl text-pure uppercase tracking-widest mb-6 flex items-center gap-3">
            <span class="w-2 h-2 bg-rgr rounded-full"></span> Talent & ESG Strategy
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="rgr-card p-6" data-reveal>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">HEAD OF DRIVER DEVELOPMENT (ACADEMY)</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3">Marcus Ericsson</h3>
                <p class="text-xs text-muted leading-relaxed font-body">
                    Memimpin pencarian bakat pembalap muda berbakat global dan merancang modul latihan di simulator performa tinggi M1TRG Driver Academy.
                </p>
            </div>

            <div class="rgr-card p-6" data-reveal>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">DIRECTOR OF SUSTAINABILITY & ESG</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3">Clara Vandermeer</h3>
                <p class="text-xs text-muted leading-relaxed font-body">
                    Merintis program efisiensi bahan bakar bio-fuel netral karbon dan memimpin aksi nol emisi logistik (Net Zero 2030) seluruh unit operasional tim.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
