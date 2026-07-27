@extends('layouts.rgr-premium')

@section('title', 'Divisi NASCAR Cup Series — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi NASCAR Cup Series. Mengendarai Next-Gen Chevrolet Camaro V8 di sirkuit oval supercepat Amerika Serikat.')

@push('styles')
<style>
.nascar-hero {
    position: relative; padding-top: 130px; padding-bottom: 60px;
    background: #0B0D10; overflow: hidden;
}
.nascar-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(196, 229, 56, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(196, 229, 56, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.nascar-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(196, 229, 56, 0.08);
    position: relative; overflow: hidden;
    transition: all 0.4s ease;
}
.nascar-card:hover {
    border-color: rgba(196, 229, 56, 0.2);
    transform: translateY(-4px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.06);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">
    
    {{-- Hero Section --}}
    <section class="nascar-hero">
        <div class="nascar-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-3 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>STOCK CAR DIVISION</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">NASCAR Cup Series</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Deru mesin naturally aspirated V8 5.86 Liter. Mobil 1 Team RG menantang batas aerodinamis slipstream di sirkuit oval legendaris Amerika seperti Daytona dan Talladega.
            </p>
        </div>
    </section>

    {{-- Line-up Pembalap & Mobil --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <h2 class="font-display font-bold text-2xl text-pure">Pembalap & Armada V8</h2>
                <div class="cyan-line my-3"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                {{-- Team 1 --}}
                <div class="nascar-card p-8">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-rgr bg-rgr/10 rounded uppercase">
                                CAR NO. 24
                            </span>
                            <h3 class="font-display font-bold text-2xl text-pure mt-3">Kyle Larson</h3>
                            <p class="text-xs text-muted font-ui tracking-wider mt-1">Negara: Amerika Serikat · Usia: 32</p>
                        </div>
                        <span class="font-display font-black text-4xl text-rgr">#24</span>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="border-b border-steel/20 pb-3">
                            <p class="text-[0.62rem] text-faint font-ui tracking-widest uppercase">SPESIFIKASI MOBIL</p>
                            <p class="text-sm font-display font-bold text-pure mt-1">Next-Gen Chevrolet Camaro ZL1 V8</p>
                            <p class="text-xs text-muted font-body mt-0.5">Mesin: V8 Naturally Aspirated 5.86L · Tenaga: 670 HP (Short Track) / 510 HP (Superspeedway)</p>
                        </div>
                        <div>
                            <p class="text-[0.62rem] text-faint font-ui tracking-widest uppercase">BIOGRAFI SINGKAT</p>
                            <p class="text-xs text-muted leading-relaxed font-body mt-1">
                                Juara NASCAR Cup Series 2021 dan ahli lintasan tanah liat (dirt track). Larson terkenal dengan gaya membalap menyerang di garis terluar pagar pembatas sirkuit oval.
                            </p>
                        </div>
                    </div>

                    <div class="border-t border-steel/20 pt-4 grid grid-cols-3 gap-2 text-center text-xs font-mono">
                        <div>
                            <p class="text-faint uppercase font-ui tracking-widest text-[0.6rem]">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">27 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint uppercase font-ui tracking-widest text-[0.6rem]">Pole</p>
                            <p class="font-display font-bold text-pure mt-1">18 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint uppercase font-ui tracking-widest text-[0.6rem]">Top 10</p>
                            <p class="font-display font-bold text-pure mt-1">164 Kali</p>
                        </div>
                    </div>
                </div>

                {{-- Team 2 --}}
                <div class="nascar-card p-8">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-rgr bg-rgr/10 rounded uppercase">
                                CAR NO. 48
                            </span>
                            <h3 class="font-display font-bold text-2xl text-pure mt-3">Chase Elliott</h3>
                            <p class="text-xs text-muted font-ui tracking-wider mt-1">Negara: Amerika Serikat · Usia: 29</p>
                        </div>
                        <span class="font-display font-black text-4xl text-rgr">#48</span>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="border-b border-steel/20 pb-3">
                            <p class="text-[0.62rem] text-faint font-ui tracking-widest uppercase">SPESIFIKASI MOBIL</p>
                            <p class="text-sm font-display font-bold text-pure mt-1">Next-Gen Chevrolet Camaro ZL1 V8</p>
                            <p class="text-xs text-muted font-body mt-0.5">Mesin: V8 Naturally Aspirated 5.86L · Transmisi: 5-Speed Sequential Xtrac</p>
                        </div>
                        <div>
                            <p class="text-[0.62rem] text-faint font-ui tracking-widest uppercase">BIOGRAFI SINGKAT</p>
                            <p class="text-xs text-muted leading-relaxed font-body mt-1">
                                Juara NASCAR Cup Series 2020 dan pembalap terpopuler pilihan fans selama enam tahun berturut-turut. Elliott adalah spesialis road course (sirkuit non-oval) terkemuka.
                            </p>
                        </div>
                    </div>

                    <div class="border-t border-steel/20 pt-4 grid grid-cols-3 gap-2 text-center text-xs font-mono">
                        <div>
                            <p class="text-faint uppercase font-ui tracking-widest text-[0.6rem]">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">19 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint uppercase font-ui tracking-widest text-[0.6rem]">Pole</p>
                            <p class="font-display font-bold text-pure mt-1">12 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint uppercase font-ui tracking-widest text-[0.6rem]">Top 10</p>
                            <p class="font-display font-bold text-pure mt-1">152 Kali</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Interactive Simulator Oval Strategy --}}
    <section class="py-16 border-t border-steel/20" x-data="ovalSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="rgr-card p-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-rgr/03 to-transparent pointer-events-none"></div>
                
                <div class="flex flex-col md:flex-row items-start justify-between gap-6 border-b border-steel/20 pb-4 mb-6">
                    <div>
                        <span class="text-xs font-ui tracking-widest text-rgr font-bold uppercase">STRATEGY CALCIATOR</span>
                        <h2 class="font-display font-bold text-2xl text-pure mt-1">Kalkulator Kecepatan Tikungan Oval</h2>
                    </div>
                    <span class="px-2.5 py-1 text-[0.62rem] font-display font-bold text-cyan-400 bg-cyan-400/10 rounded uppercase">
                        SLIPSTREAM SIMULATION
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">PILIH SIRKUIT OVAL</label>
                            <select x-model="selectedCircuit" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                                <option value="daytona">Daytona Superspeedway (Kemiringan 31°)</option>
                                <option value="talladega">Talladega Superspeedway (Kemiringan 33°)</option>
                                <option value="bristol">Bristol Motor Speedway (Kemiringan 26° - Short Track)</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">STRATEGI DRAFTING / SLIPSTREAM</label>
                            <select x-model="draftingMode" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                                <option value="single">Mobil Tunggal (Single Car Run)</option>
                                <option value="tandem">Drafting Tandem (2 Mobil Berurutan)</option>
                                <option value="pack">Balapan Grup Besar (Large Pack Drafting)</option>
                            </select>
                        </div>

                        <button @click="calculateSpeed()" class="btn-rgr text-xs w-full justify-center">Hitung Kecepatan Maksimum</button>
                    </div>

                    <div class="bg-pitch/60 border border-steel/20 p-6 rounded-md min-h-[160px] flex flex-col justify-between">
                        <div>
                            <p class="text-[0.58rem] font-ui text-faint tracking-wider uppercase mb-3">HASIL SIMULASI ESTIMASI</p>
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">G-Force Tikungan:</span>
                                    <span class="text-pure font-bold" x-text="gForce">0.0G</span>
                                </div>
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Kecepatan Puncak:</span>
                                    <span class="text-rgr font-bold" x-text="peakSpeed">0 km/h</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-steel/20 text-xs font-mono text-cyan-400 font-bold" x-text="simStatus">
                            &gt; Siap menghitung aerodinamika sirkuit oval...
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

                </div>
            </div>
        </div>
    </section>

    {{-- NASCAR Specific Gallery --}}
    <section class="py-16 bg-white/20 border-t border-steel/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2">GALLERY & MEDIA</p>
                <h2 class="font-display font-bold text-2xl text-pure">NASCAR Action Gallery</h2>
                <div class="cyan-line my-3"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">DAYTONA 500 DRAFTING PACK</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Daytona 500 drafting pack</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Grup besar mobil Next-Gen membalap rapat berurutan di Daytona Superspeedway.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">BRISTOL NIGHT RACE PIT STOP</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Bristol Pit Road Action</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Kru mekanik mengganti ban kanan dan melakukan pengisian bahan bakar ekstrim.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">TALLADEGA THREE-WIDE FINISH</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Talladega Three-Wide Finish</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Pertarungan sengit tiga mobil sejajar menjelang garis finish Talladega.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- NASCAR Division Specific Sponsors --}}
    <section class="py-16 border-t border-steel/20 bg-white/40">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2">DIVISION PARTNERS</p>
                <h2 class="font-display font-bold text-2xl text-pure">NASCAR Series Sponsors</h2>
                <div class="cyan-line my-3"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @php
                    $nascarSponsors = ['Bank Mandiri', 'Pertamina Lubricants', 'Pirelli Indonesia', 'Brembo', 'Puma Motorsport'];
                @endphp
                @foreach($nascarSponsors as $name)
                    <div class="rgr-card p-4 rounded flex flex-col justify-center items-center text-center border-white/05 min-h-[100px]" data-reveal>
                        <span class="text-xs font-display font-bold text-pure">{{ $name }}</span>
                        <span class="text-[0.55rem] font-ui text-rgr uppercase font-bold mt-2">NASCAR Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function ovalSimulator() {
    return {
        selectedCircuit: 'daytona',
        draftingMode: 'single',
        gForce: '0.0G',
        peakSpeed: '0 km/h',
        simStatus: '> Siap menghitung aerodinamika sirkuit oval...',

        calculateSpeed() {
            if (this.selectedCircuit === 'daytona') {
                if (this.draftingMode === 'single') {
                    this.gForce = '2.8G';
                    this.peakSpeed = '312 km/h';
                    this.simStatus = '> Hambatan angin normal. Kecepatan dibatasi regulasi restrictor plate.';
                } else if (this.draftingMode === 'tandem') {
                    this.gForce = '3.1G';
                    this.peakSpeed = '328 km/h';
                    this.simStatus = '> Slipstream tandem mengurangi pusaran udara belakang mobil depan.';
                } else {
                    this.gForce = '3.5G';
                    this.peakSpeed = '338 km/h';
                    this.simStatus = '> Dorongan turbulensi paket balap mendorong akselerasi ekstrem!';
                }
            } else if (this.selectedCircuit === 'talladega') {
                if (this.draftingMode === 'single') {
                    this.gForce = '2.9G';
                    this.peakSpeed = '315 km/h';
                    this.simStatus = '> Lintasan lurus superlebar memberikan ruang slipstream optimal.';
                } else if (this.draftingMode === 'tandem') {
                    this.gForce = '3.2G';
                    this.peakSpeed = '331 km/h';
                    this.simStatus = '> Pengurangan tekanan hambatan udara (drag) di bumper belakang.';
                } else {
                    this.gForce = '3.6G';
                    this.peakSpeed = '342 km/h';
                    this.simStatus = '> Slipstream grup maksimal mendorong laju mobil di kemiringan 33 derajat!';
                }
            } else { // bristol
                this.gForce = '4.2G'; // High banking short track
                this.peakSpeed = '210 km/h';
                this.simStatus = '> Sirkuit pendek oval ekstrem. G-Force lateral sangat membebani leher pembalap.';
            }
        }
    }
}
</script>
@endpush
