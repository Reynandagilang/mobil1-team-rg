@extends('layouts.rgr-premium')

@section('title', 'RGR Driver Academy — Mobil 1 Team RG')
@section('meta_description', 'Membina talenta masa depan motorsport. Temukan jajaran pembalap muda berbakat di Mobil 1 Team RG Driver Academy.')

@push('styles')
<style>
/* Academy Card Style */
.academy-card {
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(196, 229, 56, 0.08);
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    transition: all 0.4s ease;
}
.academy-card:hover {
    border-color: rgba(196, 229, 56, 0.2);
    transform: translateY(-5px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.05);
}
.academy-card::before {
    content: '';
    position: absolute; top: 0; left: 0;
    width: 3px; height: 100%;
    background: #C8FF2E;
    opacity: 0.15;
}
</style>
@endpush

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg" x-data="academySimulator()">
    
    {{-- Header Title --}}
    <div class="max-w-7xl mx-auto px-6 mb-12" data-reveal>
        <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>PROGRAM TALENTA MUDA</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">RGR DRIVER ACADEMY</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Menemukan, menguji, dan mempersiapkan generasi penerus juara dunia Formula 1. Kami membimbing pembalap muda dari gokart hingga kursi jet darat kelas utama.
        </p>
    </div>

    {{-- Academy Drivers List --}}
    <div class="max-w-7xl mx-auto px-6 mb-20">
        <h2 class="font-display font-bold text-2xl text-pure mb-6" data-reveal>Line-up Pembalap Akademi 2026</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            {{-- Driver 1 --}}
            <div class="academy-card p-6" data-reveal>
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="px-2.5 py-0.5 text-[0.6rem] font-display font-bold tracking-widest text-cyan-500 bg-cyan-500/10 rounded uppercase">
                            FORMULA 2
                        </span>
                        <h3 class="font-display font-bold text-lg text-pure mt-2">Arvid Lindblad</h3>
                        <p class="text-xs text-muted font-ui tracking-wider mt-0.5">Inggris / Swedia · Usia 18</p>
                    </div>
                    <span class="font-display font-black text-2xl text-rgr">#12</span>
                </div>
                <p class="text-xs text-muted leading-relaxed font-body mb-6">
                    Pemenang termuda Grand Prix Macau F4 2023. Memiliki gaya berkendara agresif dengan kemampuan menyalip yang mengagumkan di sirkuit jalan raya sempit.
                </p>
                <div class="border-t border-steel/20 pt-4 flex justify-between text-center text-xs">
                    <div>
                        <p class="text-faint font-ui tracking-wider uppercase">Menang F3</p>
                        <p class="font-display font-bold text-pure mt-0.5">4 Kali</p>
                    </div>
                    <div>
                        <p class="text-faint font-ui tracking-wider uppercase">Podium</p>
                        <p class="font-display font-bold text-pure mt-0.5">9 Kali</p>
                    </div>
                    <div>
                        <p class="text-faint font-ui tracking-wider uppercase">Poin Karir</p>
                        <p class="font-display font-bold text-pure mt-0.5">113 Poin</p>
                    </div>
                </div>
            </div>

            {{-- Driver 2 --}}
            <div class="academy-card p-6" data-reveal>
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="px-2.5 py-0.5 text-[0.6rem] font-display font-bold tracking-widest text-cyan-500 bg-cyan-500/10 rounded uppercase">
                            FORMULA 3
                        </span>
                        <h3 class="font-display font-bold text-lg text-pure mt-2">Kean Nakamura-Berta</h3>
                        <p class="text-xs text-muted font-ui tracking-wider mt-0.5">Jepang / Inggris · Usia 18</p>
                    </div>
                    <span class="font-display font-black text-2xl text-rgr">#08</span>
                </div>
                <p class="text-xs text-muted leading-relaxed font-body mb-6">
                    Juara Dunia Gokart OK FIA 2021. Nakamura-Berta terkenal karena keahlian balapnya yang super presisi dalam mengelola degradasi ban di cuaca panas.
                </p>
                <div class="border-t border-steel/20 pt-4 flex justify-between text-center text-xs">
                    <div>
                        <p class="text-faint font-ui tracking-wider uppercase">Juara Kart</p>
                        <p class="font-display font-bold text-pure mt-0.5">2 Gelar</p>
                    </div>
                    <div>
                        <p class="text-faint font-ui tracking-wider uppercase">Podium F4</p>
                        <p class="font-display font-bold text-pure mt-0.5">7 Kali</p>
                    </div>
                    <div>
                        <p class="text-faint font-ui tracking-wider uppercase">Lap Tercepat</p>
                        <p class="font-display font-bold text-pure mt-0.5">3 Lap</p>
                    </div>
                </div>
            </div>

            {{-- Driver 3 --}}
            <div class="academy-card p-6" data-reveal>
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="px-2.5 py-0.5 text-[0.6rem] font-display font-bold tracking-widest text-cyan-500 bg-cyan-500/10 rounded uppercase">
                            GOKART OK-J
                        </span>
                        <h3 class="font-display font-bold text-lg text-pure mt-2">Enzo Tarnvanichkul</h3>
                        <p class="text-xs text-muted font-ui tracking-wider mt-0.5">Thailand · Usia 16</p>
                    </div>
                    <span class="font-display font-black text-2xl text-rgr">#54</span>
                </div>
                <p class="text-xs text-muted leading-relaxed font-body mb-6">
                    Pemenang Kejuaraan Karting Dunia FIA OK Junior 2022. Salah satu talenta Asia paling menjanjikan yang saat ini sedang mempersiapkan debut balap sasis tunggal.
                </p>
                <div class="border-t border-steel/20 pt-4 flex justify-between text-center text-xs">
                    <div>
                        <p class="text-faint font-ui tracking-wider uppercase">Gelar Kart</p>
                        <p class="font-display font-bold text-pure mt-0.5">1 Gelar</p>
                    </div>
                    <div>
                        <p class="text-faint font-ui tracking-wider uppercase">Kemenangan</p>
                        <p class="font-display font-bold text-pure mt-0.5">18 Kali</p>
                    </div>
                    <div>
                        <p class="text-faint font-ui tracking-wider uppercase">Pole Position</p>
                        <p class="font-display font-bold text-pure mt-0.5">12 Kali</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Interactive Simulator of Academy Training Module --}}
    <div class="max-w-7xl mx-auto px-6">
        <div class="rgr-card p-8 relative overflow-hidden" data-reveal>
            <div class="absolute inset-0 bg-gradient-to-br from-rgr/03 to-transparent pointer-events-none"></div>
            
            <div class="flex flex-col md:flex-row items-start justify-between gap-6 border-b border-steel/20 pb-4 mb-6">
                <div>
                    <span class="text-xs font-ui tracking-widest text-rgr font-bold uppercase">AKSELERATOR EVALUASI PEMBALAP</span>
                    <h2 class="font-display font-bold text-2xl text-pure mt-1">Simulator Tes Fisik & Kognitif Akademi</h2>
                </div>
                <span class="px-2.5 py-1 text-[0.62rem] font-display font-bold text-cyan-400 bg-cyan-400/10 rounded uppercase">
                    SIMULATOR AKTIF
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                
                {{-- Selector --}}
                <div class="space-y-5">
                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">PILIH EVALUASI PEMBALAP</label>
                        <select x-model="selectedId" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                            <option value="arvid">Arvid Lindblad (F2)</option>
                            <option value="kean">Kean Nakamura-Berta (F3)</option>
                            <option value="enzo">Enzo Tarnvanichkul (Gokart)</option>
                        </select>
                    </div>

                    <button @click="runSimulation()" class="btn-rgr text-xs w-full justify-center" :disabled="testing">
                        <span x-text="testing ? 'Menjalankan Tes Kognitif...' : 'Mulai Evaluasi Pembalap'">Mulai Evaluasi Pembalap</span>
                    </button>
                </div>

                {{-- Simulation Output --}}
                <div class="bg-pitch/60 border border-steel/20 p-6 rounded-md min-h-[160px] flex flex-col justify-between">
                    <div>
                        <p class="text-[0.58rem] font-ui text-faint tracking-wider uppercase mb-3">HASIL EVALUASI TELEMETRI FISIK</p>
                        <div class="space-y-2">
                            <div class="flex justify-between text-xs font-mono">
                                <span class="text-muted">Waktu Reaksi:</span>
                                <span class="text-pure font-bold" x-text="reactionTime">0.00s</span>
                            </div>
                            <div class="flex justify-between text-xs font-mono">
                                <span class="text-muted">Toleransi G-Force:</span>
                                <span class="text-pure font-bold" x-text="gForce">0.0G</span>
                            </div>
                            <div class="flex justify-between text-xs font-mono">
                                <span class="text-muted">Akurasi Kemudi:</span>
                                <span class="text-pure font-bold" x-text="accuracy">0%</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 pt-3 border-t border-steel/20 text-xs font-mono text-rgr font-bold" x-text="statusMessage">
                        &gt; Menunggu sinyal untuk memulai evaluasi fisik...
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
function academySimulator() {
    return {
        selectedId: 'arvid',
        testing: false,
        reactionTime: '0.00s',
        gForce: '0.0G',
        accuracy: '0%',
        statusMessage: '> Menunggu sinyal untuk memulai evaluasi fisik...',

        runSimulation() {
            this.testing = true;
            this.reactionTime = 'Menghitung...';
            this.gForce = 'Menghitung...';
            this.accuracy = 'Menghitung...';
            this.statusMessage = '> Mengkalibrasi superkomputer simulasi kognitif...';

            setTimeout(() => {
                if (this.selectedId === 'arvid') {
                    this.reactionTime = '0.14s (Luar Biasa)';
                    this.gForce = '5.4G (Sangat Tinggi)';
                    this.accuracy = '98.5%';
                    this.statusMessage = '> EVALUASI SUKSES: Tingkat kebugaran siap untuk tes lintasan F1 nyata!';
                } else if (this.selectedId === 'kean') {
                    this.reactionTime = '0.16s (Sangat Baik)';
                    this.gForce = '4.8G (Tinggi)';
                    this.accuracy = '97.2%';
                    this.statusMessage = '> EVALUASI SUKSES: Rekomendasi program pengembangan fisik lanjutan.';
                } else {
                    this.reactionTime = '0.19s (Baik)';
                    this.gForce = '3.5G (Normal)';
                    this.accuracy = '94.8%';
                    this.statusMessage = '> EVALUASI SUKSES: Talenta gokart potensial untuk promosi ke Formula 4.';
                }
                this.testing = false;
            }, 1800);
        }
    }
}
</script>
@endpush
