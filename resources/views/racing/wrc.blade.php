@extends('layouts.rgr-premium')

@section('title', 'WRC Rally Division — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi World Rally Championship dengan dukungan pabrikan Toyota Gazoo Racing.')

@push('styles')
<style>
.wrc-hero {
    position: relative; padding-top: 130px; padding-bottom: 60px;
    background: #0F181A; overflow: hidden;
}
.wrc-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(224, 0, 0, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(224, 0, 0, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.wrc-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(224, 0, 0, 0.08);
    position: relative; overflow: hidden;
    transition: all 0.4s ease;
}
.wrc-card:hover {
    border-color: rgba(224, 0, 0, 0.2);
    transform: translateY(-4px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.06);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">
    
    {{-- Hero Section --}}
    <section class="wrc-hero">
        <div class="wrc-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-3 flex items-center gap-3"><span class="w-6 h-px bg-red-600"></span>WRC RALLY DIVISION</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4 text-red-600">World Rally Championship</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Menaklukkan jalur salju ekstrem, lumpur tebal, dan kerikil terjal di seluruh penjuru dunia. Bermitra resmi dengan Toyota Gazoo Racing untuk menyuplai sasis hybrid penakluk reli dunia.
            </p>
        </div>
    </section>

    {{-- Lineup Pembalap & Mobil --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <h2 class="font-display font-bold text-2xl text-pure">Armada Rally1 & Pembalap</h2>
                <div class="cyan-line my-3" style="background: #E00000;"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- WRC Car: #69 --}}
                <div class="wrc-card p-6 flex flex-col justify-between lg:col-span-1">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-red-600 bg-red-600/10 rounded uppercase">
                                    CAR #69 · TOYOTA
                                </span>
                                <h3 class="font-display font-bold text-xl text-pure mt-2">Toyota GR Yaris Rally1</h3>
                            </div>
                            <span class="font-display font-black text-2xl text-red-600">#69</span>
                        </div>
                        <p class="text-xs text-muted mb-6">Mesin: 1.6L Direct Injection Turbo + Motor Listrik 100kW · Tenaga Maksimal: 500 HP · Karakteristik: Torsi instan pada putaran mesin rendah.</p>

                        <div class="space-y-4 border-t border-steel/20 pt-4">
                            <h4 class="text-xs font-display font-bold text-pure">SPESIFIKASI SASIS:</h4>
                            <div class="space-y-1.5 font-mono text-[0.68rem] text-muted">
                                <p><span class="text-faint">Struktur:</span> Spaceframe Baja & Karbon</p>
                                <p><span class="text-faint">Transmisi:</span> 5-speed Sequential AWD</p>
                                <p><span class="text-faint">Ban:</span> Pirelli P Zero / Scorpion</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Driver WRC: Kalle --}}
                <div class="wrc-card p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-red-600 bg-red-600/10 rounded uppercase">
                                    RALLY DRIVER · FINLANDIA
                                </span>
                                <h3 class="font-display font-bold text-xl text-pure mt-2">Kalle Rovanperä</h3>
                            </div>
                            <span class="font-display font-black text-2xl text-red-600">#69</span>
                        </div>
                        <p class="text-xs text-muted leading-relaxed mb-6">Juara dunia WRC termuda sepanjang sejarah. Terkenal dengan kemampuannya mengendalikan mobil di kecepatan tinggi pada lintasan licin bersalju.</p>

                        <div class="space-y-2 border-t border-steel/20 pt-4 font-mono text-xs">
                            <div class="flex justify-between">
                                <span class="text-faint">Podium WRC:</span>
                                <span class="text-pure font-bold">24 Kali</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-faint">Gelar Dunia WRC:</span>
                                <span class="text-red-500 font-bold">2 Kali (2022, 2023)</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Driver WRC: Ogier --}}
                <div class="wrc-card p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-red-600 bg-red-600/10 rounded uppercase">
                                    RALLY DRIVER · PRANCIS
                                </span>
                                <h3 class="font-display font-bold text-xl text-pure mt-2">Sébastien Ogier</h3>
                            </div>
                            <span class="font-display font-black text-2xl text-red-600">#17</span>
                        </div>
                        <p class="text-xs text-muted leading-relaxed mb-6">Legenda hidup olahraga reli dunia dengan 8 gelar juara dunia. Memiliki gaya mengemudi yang rapi, efisien, dan sangat taktis.</p>

                        <div class="space-y-2 border-t border-steel/20 pt-4 font-mono text-xs">
                            <div class="flex justify-between">
                                <span class="text-faint">Podium WRC:</span>
                                <span class="text-pure font-bold">98 Kali</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-faint">Gelar Dunia WRC:</span>
                                <span class="text-red-500 font-bold">8 Kali</span>
                            </div>
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
                <h2 class="font-display font-bold text-2xl text-pure">Papan Prestasi & Rekor WRC</h2>
                <div class="cyan-line my-3" style="background: #E00000;"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Card 1 --}}
                <div class="bg-white/60 border border-steel/20 p-6 rounded-md">
                    <p class="text-red-600 font-display font-black text-4xl mb-2">10 Gelar</p>
                    <h3 class="font-display font-bold text-sm text-pure uppercase tracking-wider mb-2">World Rally Championship Titles</h3>
                    <p class="text-xs text-muted">Akumulasi gelar juara dunia pembalap utama kami, Kalle Rovanperä (2) dan Sébastien Ogier (8).</p>
                </div>
                {{-- Card 2 --}}
                <div class="bg-white/60 border border-steel/20 p-6 rounded-md">
                    <p class="text-red-600 font-display font-black text-4xl mb-2">122 Kali</p>
                    <h3 class="font-display font-bold text-sm text-pure uppercase tracking-wider mb-2">Total Kemenangan Reli</h3>
                    <p class="text-xs text-muted">Total rekor kemenangan etape reli tingkat global WRC di seluruh dunia sepanjang karier pembalap kami.</p>
                </div>
                {{-- Card 3 --}}
                <div class="bg-white/60 border border-steel/20 p-6 rounded-md">
                    <p class="text-red-600 font-display font-black text-4xl mb-2">68 Meter</p>
                    <h3 class="font-display font-bold text-sm text-pure uppercase tracking-wider mb-2">Lompatan Udara Terjauh</h3>
                    <p class="text-xs text-muted">Dicatat oleh Kalle Rovanperä saat melintasi bukit lumpur ikonik di etape reli tercepat, Rally Finland.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Hybrid Boost Simulator Widget --}}
    <section class="py-16 border-t border-steel/20" x-data="wrcHybridSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="rgr-card p-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-red-600/03 to-transparent pointer-events-none"></div>
                
                <div class="flex flex-col md:flex-row items-start justify-between gap-6 border-b border-steel/20 pb-4 mb-6">
                    <div>
                        <span class="text-xs font-ui tracking-widest text-red-600 font-bold uppercase">RALLY HYBRID TELEMETRY</span>
                        <h2 class="font-display font-bold text-2xl text-pure mt-1">Simulator Etape & Hybrid Boost WRC</h2>
                    </div>
                    <span class="px-2.5 py-1 text-[0.62rem] font-display font-bold text-red-500 bg-red-500/10 rounded uppercase">
                        RALLY1 HYBRID UNIT
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    
                    <div class="space-y-4">
                        <p class="text-xs text-muted leading-relaxed">
                            Mobil Rally1 modern dibekali motor listrik 100 kW yang melepaskan daya dorong hybrid otomatis saat akselerasi. Tekan tombol gas untuk mensimulasikan dorongan hybrid melintasi tikungan lumpur!
                        </p>
                        <div class="flex gap-4">
                            <button @mousedown="pressThrottle()" @mouseup="releaseThrottle()" @touchstart="pressThrottle()" @touchend="releaseThrottle()" class="btn-rgr text-xs flex-1 justify-center select-none" style="background: #E00000; border-color: #E00000;">
                                <span>TAHAN PEDAL GAS (Hybrid Boost)</span>
                            </button>
                        </div>
                        <p class="text-[0.6rem] text-faint">*Tahan klik mouse atau sentuh tombol untuk melepaskan daya dorong hybrid secara berkelanjutan.</p>
                    </div>

                    <div class="bg-pitch/60 border border-steel/20 p-6 rounded-md min-h-[160px] flex flex-col justify-between">
                        <div>
                            <p class="text-[0.58rem] font-ui text-faint tracking-wider uppercase mb-3">TELEMETRI INSTAN SASIS</p>
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Putaran Mesin (RPM):</span>
                                    <span class="text-pure font-bold" x-text="rpm">2,200 RPM</span>
                                </div>
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Tenaga Gabungan:</span>
                                    <span class="text-pure font-bold" x-text="hp">380 HP</span>
                                </div>
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Status Motor Listrik:</span>
                                    <span class="font-bold" :class="boostActive ? 'text-red-500' : 'text-muted'" x-text="boostStatus">Regenerasi Daya (0 kW)</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-steel/20 text-xs font-mono text-red-500 font-bold" x-text="stageStatus">
                            &gt; Siap meluncur di etape...
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

    {{-- WRC Specific Gallery --}}
    <section class="py-16 bg-white/20 border-t border-steel/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2" style="color: #EF4444;">GALLERY & MEDIA</p>
                <h2 class="font-display font-bold text-2xl text-pure">WRC Action Gallery</h2>
                <div class="cyan-line my-3" style="background: #EF4444;"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">RALLY SWEDEN SNOW DRIFT</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Rally Sweden Snow Drift</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">GR Yaris Rally1 meluncur melintasi tumpukan salju ekstrem di Umeå.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">MONTE CARLO ASPHALT HARPIN</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Monte Carlo Hairpin Descent</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Ogier menuruni lereng aspal basah pegunungan Alpen dengan presisi kemudi.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">FINLAND GRAVEL JUMP</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Finland Colin's Crest Jump</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Rovanperä melompati bukit kerikil di etape tercepat WRC Finland.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- WRC Division Specific Sponsors --}}
    <section class="py-16 border-t border-steel/20 bg-white/40">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2" style="color: #EF4444;">DIVISION PARTNERS</p>
                <h2 class="font-display font-bold text-2xl text-pure">WRC Series Sponsors</h2>
                <div class="cyan-line my-3" style="background: #EF4444;"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @php
                    $wrcSponsors = ['Pertamina Lubricants', 'G-Shock (Casio)', 'Pirelli Indonesia', 'Ohlins Indonesia', 'Oakley Indonesia'];
                @endphp
                @foreach($wrcSponsors as $name)
                    <div class="rgr-card p-4 rounded flex flex-col justify-center items-center text-center border-white/05 min-h-[100px]" data-reveal>
                        <span class="text-xs font-display font-bold text-pure">{{ $name }}</span>
                        <span class="text-[0.55rem] font-ui uppercase font-bold mt-2" style="color: #EF4444;">WRC Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function wrcHybridSimulator() {
    return {
        boostActive: false,
        rpm: '2,200 RPM',
        hp: '380 HP',
        boostStatus: 'Regenerasi Daya (0 kW)',
        stageStatus: '> Siap meluncur di etape...',
        timer: null,

        pressThrottle() {
            this.boostActive = true;
            this.rpm = '6,800 RPM';
            this.hp = '500 HP (Power Maksimum)';
            this.boostStatus = 'DEPLOI HYBRID AKTIF (+100 kW)';
            this.stageStatus = '> AKSELERASI PENUH: Meluncur melompati bukit kerikil!';
        },

        releaseThrottle() {
            this.boostActive = false;
            this.rpm = '2,200 RPM';
            this.hp = '380 HP';
            this.boostStatus = 'Regenerasi Daya (Braking)';
            this.stageStatus = '> Deselerasi: Mengisi ulang baterai hybrid di zona pengereman.';
        }
    }
}
</script>
@endpush
