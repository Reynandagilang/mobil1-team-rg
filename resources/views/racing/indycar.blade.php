@extends('layouts.rgr-premium')

@section('title', 'IndyCar Series — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi NTT IndyCar Series dengan kemitraan pabrikan legendaris Arrow McLaren.')

@push('styles')
<style>
.indy-hero {
    position: relative; padding-top: 130px; padding-bottom: 60px;
    background: #0F181A; overflow: hidden;
}
.indy-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(255, 109, 0, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(255, 109, 0, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.indy-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(255, 109, 0, 0.08);
    position: relative; overflow: hidden;
    transition: all 0.4s ease;
}
.indy-card:hover {
    border-color: rgba(255, 109, 0, 0.2);
    transform: translateY(-4px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.06);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">
    
    {{-- Hero Section --}}
    <section class="indy-hero">
        <div class="indy-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-3 flex items-center gap-3"><span class="w-6 h-px bg-orange-500"></span>INDYCAR DIVISION</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4" style="color: #FF6D00;">NTT IndyCar Series</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Kecepatan ekstrem roda terbuka di sirkuit jalan raya dan sirkuit oval Amerika Serikat. Bermitra erat dengan Arrow McLaren sebagai penyuplai sasis Dallara IR-18 dan dukungan teknis balap.
            </p>
        </div>
    </section>

    {{-- Lineup Pembalap & Mobil --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <h2 class="font-display font-bold text-2xl text-pure">Armada Dallara & Pembalap</h2>
                <div class="cyan-line my-3" style="background: #FF6D00;"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Car 1: #5 --}}
                <div class="indy-card p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-orange-500 bg-orange-500/10 rounded uppercase">
                                    CAR #5 · CHEVROLET
                                </span>
                                <h3 class="font-display font-bold text-xl text-pure mt-2">Dallara IR-18 McLaren</h3>
                            </div>
                            <span class="font-display font-black text-2xl text-orange-500">#5</span>
                        </div>
                        <p class="text-xs text-muted mb-6">Mesin: Chevrolet 2.2L Twin-Turbo V6 (Hybrid) · Tenaga: 700 HP · Karakteristik: Kecepatan tinggi (high speed speedway package).</p>

                        <div class="space-y-4 border-t border-steel/20 pt-4">
                            <h4 class="text-xs font-display font-bold text-pure">PEMBALAP UTAMA:</h4>
                            <div>
                                <p class="text-sm font-bold text-pure">Pato O'Ward <span class="text-muted text-xs font-normal">(Meksiko)</span></p>
                                <p class="text-[0.68rem] text-muted font-body mt-0.5">Bintang muda eksplosif kebanggaan Meksiko, spesialis manuver agresif di sirkuit oval super-speedway.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-steel/20 pt-4 mt-6 text-center text-xs font-mono flex justify-around">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">7 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Podium</p>
                            <p class="font-display font-bold text-pure mt-1">21 Kali</p>
                        </div>
                    </div>
                </div>

                {{-- Car 2: #6 --}}
                <div class="indy-card p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-orange-500 bg-orange-500/10 rounded uppercase">
                                    CAR #6 · CHEVROLET
                                </span>
                                <h3 class="font-display font-bold text-xl text-pure mt-2">Dallara IR-18 McLaren</h3>
                            </div>
                            <span class="font-display font-black text-2xl text-orange-500">#6</span>
                        </div>
                        <p class="text-xs text-muted mb-6">Mesin: Chevrolet 2.2L Twin-Turbo V6 (Hybrid) · Transmisi: 6-speed Sequential · Karakteristik: Downforce jalan raya yang lincah.</p>

                        <div class="space-y-4 border-t border-steel/20 pt-4">
                            <h4 class="text-xs font-display font-bold text-pure">PEMBALAP UTAMA:</h4>
                            <div>
                                <p class="text-sm font-bold text-pure">Nolan Siegel <span class="text-muted text-xs font-normal">(Amerika Serikat)</span></p>
                                <p class="text-[0.68rem] text-muted font-body mt-0.5">Pembalap muda berbakat asal California, dipromosikan berkat performa impresifnya di sirkuit jalan raya.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-steel/20 pt-4 mt-6 text-center text-xs font-mono flex justify-around">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">0 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Podium</p>
                            <p class="font-display font-bold text-pure mt-1">2 Kali</p>
                        </div>
                    </div>
                </div>

                {{-- Car 3: #7 --}}
                <div class="indy-card p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-orange-500 bg-orange-500/10 rounded uppercase">
                                    CAR #7 · CHEVROLET
                                </span>
                                <h3 class="font-display font-bold text-xl text-pure mt-2">Dallara IR-18 McLaren</h3>
                            </div>
                            <span class="font-display font-black text-2xl text-orange-500">#7</span>
                        </div>
                        <p class="text-xs text-muted mb-6">Mesin: Chevrolet 2.2L Twin-Turbo V6 (Hybrid) · Tenaga: 700 HP · Karakteristik: Taktis untuk balapan jalan raya perkotaan.</p>

                        <div class="space-y-4 border-t border-steel/20 pt-4">
                            <h4 class="text-xs font-display font-bold text-pure">PEMBALAP UTAMA:</h4>
                            <div>
                                <p class="text-sm font-bold text-pure">Alexander Rossi <span class="text-muted text-xs font-normal">(Amerika Serikat)</span></p>
                                <p class="text-[0.68rem] text-muted font-body mt-0.5">Juara legendaris Indianapolis 500 tahun 2016, pembalap kawakan dengan taktik pertahanan yang solid.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-steel/20 pt-4 mt-6 text-center text-xs font-mono flex justify-around">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">8 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Podium</p>
                            <p class="font-display font-bold text-pure mt-1">28 Kali</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Prestasi Divisi --}}
    <section class="py-12 border-t border-steel/10 bg-white/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <h2 class="font-display font-bold text-2xl text-pure">Papan Prestasi & Rekor IndyCar</h2>
                <div class="cyan-line my-3" style="background: #FF6D00;"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Card 1 --}}
                <div class="bg-white/60 border border-steel/20 p-6 rounded-md">
                    <p class="text-orange-500 font-display font-black text-4xl mb-2">1 Kali</p>
                    <h3 class="font-display font-bold text-sm text-pure uppercase tracking-wider mb-2">Indianapolis 500 Champion</h3>
                    <p class="text-xs text-muted">Diraih oleh Alexander Rossi pada edisi ke-100 balapan legendaris Indianapolis 500 tahun 2016.</p>
                </div>
                {{-- Card 2 --}}
                <div class="bg-white/60 border border-steel/20 p-6 rounded-md">
                    <p class="text-orange-500 font-display font-black text-4xl mb-2">15 Kali</p>
                    <h3 class="font-display font-bold text-sm text-pure uppercase tracking-wider mb-2">Total Kemenangan Seri</h3>
                    <p class="text-xs text-muted">Akumulasi kemenangan pembalap utama Arrow McLaren M1TRG di berbagai sirkuit oval dan jalan raya Amerika.</p>
                </div>
                {{-- Card 3 --}}
                <div class="bg-white/60 border border-steel/20 p-6 rounded-md">
                    <p class="text-orange-500 font-display font-black text-4xl mb-2">380 km/h</p>
                    <h3 class="font-display font-bold text-sm text-pure uppercase tracking-wider mb-2">Rekor Kecepatan Oval</h3>
                    <p class="text-xs text-muted">Dicapai oleh Pato O'Ward saat sesi kualifikasi Indianapolis Motor Speedway dengan paket aero low-drag.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Push-to-Pass Simulator Widget --}}
    <section class="py-16 border-t border-steel/20" x-data="p2pSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="rgr-card p-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500/03 to-transparent pointer-events-none"></div>
                
                <div class="flex flex-col md:flex-row items-start justify-between gap-6 border-b border-steel/20 pb-4 mb-6">
                    <div>
                        <span class="text-xs font-ui tracking-widest text-orange-500 font-bold uppercase">PUSH-TO-PASS SIMULATOR</span>
                        <h2 class="font-display font-bold text-2xl text-pure mt-1">Simulator Peningkatan Tenaga IndyCar</h2>
                    </div>
                    <span class="px-2.5 py-1 text-[0.62rem] font-display font-bold text-orange-400 bg-orange-400/10 rounded uppercase">
                        HYBRID OVERTAKE SYSTEM
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    
                    <div class="space-y-4">
                        <p class="text-xs text-muted leading-relaxed">
                            NTT IndyCar Series menggunakan sistem *Push-to-Pass* untuk memberikan dorongan tenaga ekstra instan sebesar 60 HP selama durasi terbatas (maksimal 200 detik per balapan) guna memudahkan manuver menyalip.
                        </p>
                        <div class="flex gap-4">
                            <button @click="triggerP2P()" :disabled="p2pActive" class="btn-rgr text-xs flex-1 justify-center" style="background: #FF6D00; border-color: #FF6D00;">
                                <span x-text="p2pActive ? 'Dorongan Aktif!' : 'Aktifkan Push-to-Pass'"></span>
                            </button>
                            <button @click="resetP2P()" class="btn-rgr-ghost text-xs">Reset</button>
                        </div>
                    </div>

                    <div class="bg-pitch/60 border border-steel/20 p-6 rounded-md min-h-[160px] flex flex-col justify-between">
                        <div>
                            <p class="text-[0.58rem] font-ui text-faint tracking-wider uppercase mb-3">TELEMETRI INSTAN MESIN</p>
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Tenaga Mesin:</span>
                                    <span class="text-pure font-bold" x-text="enginePower">640 HP</span>
                                </div>
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Kecepatan Puncak:</span>
                                    <span class="text-pure font-bold" x-text="topSpeed">365 km/jam</span>
                                </div>
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Sisa Waktu Push-to-Pass:</span>
                                    <span class="text-orange-500 font-bold" x-text="timeLeft + ' Detik'">200 Detik</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-steel/20 text-xs font-mono text-orange-400 font-bold animate-pulse" x-text="simStatus">
                            &gt; Siap meluncurkan dorongan tenaga...
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- IndyCar Specific Gallery --}}
    <section class="py-16 bg-white/20 border-t border-steel/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2" style="color: #FF6D00;">GALLERY & MEDIA</p>
                <h2 class="font-display font-bold text-2xl text-pure">IndyCar Action Gallery</h2>
                <div class="cyan-line my-3" style="background: #FF6D00;"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">INDIANAPOLIS 500 QUALIFYING</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Indy 500 Qualy Hotlap</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Pato O'Ward mencatatkan rata-rata kecepatan 233 mph di tikungan oval Indianapolis.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">DETROIT STREET CIRCUIT PIT STOP</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Detroit Pit Lane Action</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Kru mekanik mengganti ban dan menyesuaikan sayap depan Dallara IR-18 Rossi.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">ROAD AMERICA OVERTAKE</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Road America Battle</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Siegel memaksimalkan sistem Push-to-Pass untuk merebut posisi di trek lurus utama.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- IndyCar Division Specific Sponsors --}}
    <section class="py-16 border-t border-steel/20 bg-white/40">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2" style="color: #FF6D00;">DIVISION PARTNERS</p>
                <h2 class="font-display font-bold text-2xl text-pure">IndyCar Series Sponsors</h2>
                <div class="cyan-line my-3" style="background: #FF6D00;"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @php
                    $indySponsors = ['Bank BCA', 'Telkomsel Flash', 'Pirelli Indonesia', 'Ohlins Indonesia', 'Brembo'];
                @endphp
                @foreach($indySponsors as $name)
                    <div class="rgr-card p-4 rounded flex flex-col justify-center items-center text-center border-white/05 min-h-[100px]" data-reveal>
                        <span class="text-xs font-display font-bold text-pure">{{ $name }}</span>
                        <span class="text-[0.55rem] font-ui uppercase font-bold mt-2" style="color: #FF6D00;">IndyCar Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function p2pSimulator() {
    return {
        p2pActive: false,
        enginePower: '640 HP',
        topSpeed: '365 km/jam',
        timeLeft: 200,
        simStatus: '> Siap meluncurkan dorongan tenaga...',
        timer: null,

        triggerP2P() {
            if (this.timeLeft <= 0) {
                this.simStatus = '> Dorongan habis! Push-to-Pass tidak tersedia.';
                return;
            }
            this.p2pActive = true;
            this.enginePower = '700 HP (Dorongan +60 HP)';
            this.topSpeed = '380 km/jam';
            this.simStatus = '> DORONGAN PUSH-TO-PASS AKTIF: Menyalip musuh di trek lurus!';
            
            this.timer = setInterval(() => {
                if (this.timeLeft > 0) {
                    this.timeLeft--;
                } else {
                    this.resetP2P();
                }
            }, 1000);
        },

        resetP2P() {
            clearInterval(this.timer);
            this.p2pActive = false;
            this.enginePower = '640 HP';
            this.topSpeed = '365 km/jam';
            this.simStatus = '> Sistem kembali ke setelan daya standar.';
        }
    }
}
</script>
@endpush
