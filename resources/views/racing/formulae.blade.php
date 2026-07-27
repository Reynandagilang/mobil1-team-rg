@extends('layouts.rgr-premium')

@section('title', 'ABB FIA Formula E World Championship — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi Formula E. Kejuaraan dunia balap mobil listrik jalanan bergengsi bermesin Nissan e-4ORCE.')

@push('styles')
<style>
.fe-hero {
    position: relative; padding-top: 130px; padding-bottom: 60px;
    background: #0B0D10; overflow: hidden;
}
.fe-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(0, 163, 224, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(0, 163, 224, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.fe-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(0, 163, 224, 0.08);
    position: relative; overflow: hidden;
    transition: all 0.4s ease;
}
.fe-card:hover {
    border-color: rgba(0, 163, 224, 0.2);
    transform: translateY(-4px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.06);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">
    
    {{-- Hero Section --}}
    <section class="fe-hero">
        <div class="fe-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-3 flex items-center gap-3" style="color:#00A3E0;"><span class="w-6 h-px bg-cyan-500"></span>FORMULA E DIVISION</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">ABB FIA Formula E</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Masa depan balap listrik jalan raya perkotaan. Mengandalkan efisiensi energi regeneratif puncak dan mesin Nissan e-4ORCE Powertrain Gen3 terbaru.
            </p>
        </div>
    </section>

    {{-- Format & Sirkuit --}}
    <section class="py-12 border-b border-steel/15 bg-white/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="md:col-span-1 fe-card p-6 border-l-4" style="border-left-color: #00A3E0;">
                    <span class="text-[0.62rem] font-ui tracking-widest text-cyan-500 font-bold uppercase">TEKNOLOGI LISTRIK</span>
                    <h3 class="font-display font-bold text-xl text-pure mt-1 mb-3">Gen3 & Nissan e-4ORCE</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Formula E Gen3 adalah jet darat listrik paling efisien di dunia. Dengan motor listrik depan dan belakang yang mampu memulihkan lebih dari 40% energi selama pengereman, mobil ini menyemburkan daya hingga 350kW (470 HP) tanpa emisi.
                    </p>
                </div>
                
                <div class="md:col-span-2 space-y-4">
                    <span class="text-[0.62rem] font-ui tracking-widest text-muted font-bold uppercase">SIRKUIT JALANAN UTAMA</span>
                    <h3 class="font-display font-bold text-2xl text-pure">Eprix Street Circuit</h3>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Diriyah (Arab Saudi)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Balapan malam hari di sirkuit warisan UNESCO yang cepat, sempit, berdebu, dan menantang.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Tokyo Street Circuit (Jepang)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Sirkuit jalanan perkotaan pertama di Jepang yang melingkari Tokyo Big Sight dengan trek bergelombang.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Monaco Street Circuit (Monaco)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Trek legendaris F1 yang disesuaikan, menawarkan menyalip spektakuler berkat strategi Attack Mode.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">London ExCeL (Inggris Raya)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Sirkuit unik semi-indoor/semi-outdoor yang melintasi pusat pameran ExCeL London.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Lineup Pembalap & Mesin --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <h2 class="font-display font-bold text-2xl text-pure">Roster Driver & Mesin Nissan</h2>
                <div class="cyan-line my-3"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Car Specs Card --}}
                <div class="fe-card p-6 flex flex-col justify-between lg:col-span-1">
                    <div>
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-cyan-500 bg-cyan-500/10 rounded uppercase">
                                    GEN3 · #22
                                </span>
                                <h3 class="font-display font-bold text-2xl text-pure mt-3">FE Gen3 Nissan</h3>
                            </div>
                            <span class="font-display font-black text-4xl text-cyan-500">#22</span>
                        </div>
                        <p class="text-xs text-muted mb-6">Mesin Powertrain: Nissan e-4ORCE · Tenaga: 350 kW (470 HP) · Sasis: Carbon Fiber Monocoque · Ban: Hankook iON Race.</p>
                        
                        <div class="pt-4 border-t border-steel/20 text-xs">
                            <p class="font-bold text-pure">Spesifikasi Aero:</p>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Desain sayap delta dengan hambatan aerodinamika minimum untuk memaksimalkan slipstream dan pengereman regeneratif pada sirkuit perkotaan yang sempit.</p>
                        </div>
                    </div>
                    <div class="border-t border-steel/20 pt-4 mt-6 text-center text-xs font-mono flex justify-around">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Bobot</p>
                            <p class="font-display font-bold text-pure mt-1">840 kg</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Regenerasi</p>
                            <p class="font-display font-bold text-pure mt-1">&gt; 40%</p>
                        </div>
                    </div>
                </div>

                {{-- Driver Card --}}
                <div class="lg:col-span-2">
                    @foreach($drivers as $driver)
                    <div class="fe-card p-8 flex flex-col justify-between" style="border-radius: 0 !important;">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="text-xs text-cyan-500 font-ui font-bold tracking-widest uppercase block mb-1">RACE DRIVER</span>
                                    <h3 class="font-display font-bold text-2xl text-pure mb-2">{{ $driver->name }}</h3>
                                    <p class="text-[0.68rem] text-muted font-ui">{{ $driver->country }} (#{{ $driver->permanent_number }})</p>
                                </div>
                                <span class="font-display font-black text-4xl text-cyan-500">#{{ $driver->permanent_number }}</span>
                            </div>
                            <p class="text-xs text-muted leading-relaxed font-body mb-6">{{ $driver->bio }}</p>
                        </div>
                        
                        <div class="border-t border-steel/10 pt-4 grid grid-cols-3 gap-4 text-center text-xs font-mono">
                            <div>
                                <p class="text-faint uppercase font-ui tracking-wider">Podium FE</p>
                                <p class="font-display font-bold text-pure mt-1">{{ $driver->podiums }}</p>
                            </div>
                            <div>
                                <p class="text-faint uppercase font-ui tracking-wider">Poin Karir</p>
                                <p class="font-display font-bold text-pure mt-1">{{ number_format($driver->career_points) }}</p>
                            </div>
                            <div>
                                <p class="text-faint uppercase font-ui tracking-wider">Lisensi</p>
                                <p class="font-display font-bold text-cyan-500 mt-1">Platinum</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
