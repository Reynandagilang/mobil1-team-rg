@extends('layouts.rgr-premium')

@section('title', 'GT World Challenge Europe — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi GT World Challenge Europe. Kompetisi balap mobil sport GT3 terbaik di sirkuit legendaris Eropa.')

@push('styles')
<style>
.gt-hero {
    position: relative; padding-top: 130px; padding-bottom: 60px;
    background: #0B0D10; overflow: hidden;
}
.gt-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(196, 229, 56, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(196, 229, 56, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.gt-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(196, 229, 56, 0.08);
    position: relative; overflow: hidden;
    transition: all 0.4s ease;
}
.gt-card:hover {
    border-color: rgba(196, 229, 56, 0.2);
    transform: translateY(-4px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.06);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">
    
    {{-- Hero Section --}}
    <section class="gt-hero">
        <div class="gt-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-3 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>GT3 DIVISION EUROPE</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">GT World Challenge Europe</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Persaingan ketat mobil sport kelas GT3 di sirkuit legendaris Eropa. Mobil 1 Team RG menurunkan tiga unit armada tangguh berspesifikasi balap ketahanan terbaik.
            </p>
        </div>
    </section>

    {{-- Format Kompetisi & Kalender Sirkuit Utama --}}
    <section class="py-12 border-b border-steel/15 bg-white/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Format --}}
                <div class="md:col-span-1 rgr-card p-6 border-l-4 border-rgr">
                    <span class="text-[0.62rem] font-ui tracking-widest text-rgr font-bold uppercase">FORMAT KOMPETISI</span>
                    <h3 class="font-display font-bold text-xl text-pure mt-1 mb-3">Sprint & Endurance Cup</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Ini adalah seri regional tertua dan paling kompetitif. Balapannya dibagi menjadi dua format: <strong>Sprint Cup</strong> (balapan pendek 1 jam) dan <strong>Endurance Cup</strong> (balapan ketahanan 3 jam atau lebih).
                    </p>
                </div>
                {{-- Sirkuit --}}
                <div class="md:col-span-2 space-y-4">
                    <span class="text-[0.62rem] font-ui tracking-widest text-muted font-bold uppercase">KALENDER SIRKUIT UTAMA</span>
                    <h3 class="font-display font-bold text-2xl text-pure">Arena Balap Legendaris</h3>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Circuit de Spa-Francorchamps (Belgia)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Rumah dari balapan legendaris CrowdStrike 24 Hours of Spa. Ini adalah balapan 24 jam khusus mobil GT3 terbesar di dunia dan menjadi puncak dari musim GTWC Europe.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Monza (Italia)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Sirkuit super cepat yang menguji top speed maksimal mobil GT3.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Paul Ricard / Magny-Cours (Prancis)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Sering menjadi arena balapan ketahanan malam hari (night race).</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Nürburgring (Jerman)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Sirkuit teknis dan legendaris di Eropa yang menguji ketahanan fisik pembalap dan mekanik.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded md:col-span-2">
                            <h4 class="text-xs font-bold text-pure">Barcelona-Catalunya / Valencia (Spanyol)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Sering menjadi seri penutup musim balap.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Drivers and Cars Lineup --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <h2 class="font-display font-bold text-2xl text-pure">Armada Mobil & Pembalap</h2>
                <div class="cyan-line my-3"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Car 1: #99 PRO --}}
                <div class="gt-card p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.6rem] font-display font-bold tracking-widest text-rgr bg-rgr/10 rounded uppercase">
                                    PRO CLASS · #99
                                </span>
                                <h3 class="font-display font-bold text-xl text-pure mt-2">Mercedes-AMG GT3 Evo</h3>
                            </div>
                            <span class="font-display font-black text-2xl text-rgr">#99</span>
                        </div>
                        <p class="text-xs text-muted mb-6">Mesin: V8 6.3L Naturally Aspirated · Tenaga: 550 HP · Karakteristik: Downforce tinggi & pengereman stabil.</p>

                        <div class="space-y-4 border-t border-steel/20 pt-4">
                            <h4 class="text-xs font-display font-bold text-pure">LINE-UP PEMBALAP:</h4>
                            <div>
                                <p class="text-xs font-bold text-pure">Jules Gounon <span class="text-muted font-normal">(Prancis)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Spesialis trek basah, Juara Spa 24 Jam tiga kali berturut-turut.</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-pure">Raffaele Marciello <span class="text-muted font-normal">(Swiss)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Pakar kualifikasi tercepat, dikenal dengan gaya menyalip super agresif.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-steel/20 pt-4 mt-6 text-center text-xs font-mono flex justify-around">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">6 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Podium</p>
                            <p class="font-display font-bold text-pure mt-1">14 Kali</p>
                        </div>
                    </div>
                </div>

                {{-- Car 2: #88 GOLD --}}
                <div class="gt-card p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.6rem] font-display font-bold tracking-widest text-cyan-500 bg-cyan-500/10 rounded uppercase">
                                    GOLD CUP · #88
                                </span>
                                <h3 class="font-display font-bold text-xl text-pure mt-2">Mercedes-AMG GT3 Evo</h3>
                            </div>
                            <span class="font-display font-black text-2xl text-cyan-500">#88</span>
                        </div>
                        <p class="text-xs text-muted mb-6">Mesin: V8 6.3L Naturally Aspirated · Transmisi: 6-Speed Sequential · Karakteristik: Torsi melimpah di rpm rendah.</p>

                        <div class="space-y-4 border-t border-steel/20 pt-4">
                            <h4 class="text-xs font-display font-bold text-pure">LINE-UP PEMBALAP:</h4>
                            <div>
                                <p class="text-xs font-bold text-pure">Maro Engel <span class="text-muted font-normal">(Jerman)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Pembalap veteran Nürburgring Nordschleife dengan konsistensi lap tinggi.</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-pure">Luca Stolz <span class="text-muted font-normal">(Jerman)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Ahli manajemen ban Pirelli dan pembalap taktis di lintasan sempit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-steel/20 pt-4 mt-6 text-center text-xs font-mono flex justify-around">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">3 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Podium</p>
                            <p class="font-display font-bold text-pure mt-1">8 Kali</p>
                        </div>
                    </div>
                </div>

                {{-- Car 3: #77 BRONZE --}}
                <div class="gt-card p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.6rem] font-display font-bold tracking-widest text-emerald-500 bg-emerald-500/10 rounded uppercase">
                                    BRONZE CUP · #77
                                </span>
                                <h3 class="font-display font-bold text-xl text-pure mt-2">Aston Martin Vantage GT3</h3>
                            </div>
                            <span class="font-display font-black text-2xl text-emerald-500">#77</span>
                        </div>
                        <p class="text-xs text-muted mb-6">Mesin: V8 4.0L Twin-Turbo · Tenaga: 535 HP · Karakteristik: Sangat lincah di tikungan cepat (high speed corner).</p>

                        <div class="space-y-4 border-t border-steel/20 pt-4">
                            <h4 class="text-xs font-display font-bold text-pure">LINE-UP PEMBALAP:</h4>
                            <div>
                                <p class="text-xs font-bold text-pure">Valentino Rossi <span class="text-muted font-normal">(Italia)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Legenda MotoGP 9 kali juara dunia yang bertransisi menjadi bintang balap mobil GT3.</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-pure">Maxime Martin <span class="text-muted font-normal">(Belgia)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Spesialis ketahanan legendaris, memberikan bimbingan teknis tingkat tinggi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-steel/20 pt-4 mt-6 text-center text-xs font-mono flex justify-around">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">2 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-wider">Podium</p>
                            <p class="font-display font-bold text-pure mt-1">5 Kali</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Interactive Simulator: Tyre Pressure --}}
    <section class="py-16 border-t border-steel/20" x-data="tyreSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="rgr-card p-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-rgr/03 to-transparent pointer-events-none"></div>
                
                <div class="flex flex-col md:flex-row items-start justify-between gap-6 border-b border-steel/20 pb-4 mb-6">
                    <div>
                        <span class="text-xs font-ui tracking-widest text-rgr font-bold uppercase">TYRE DATA STRATEGY</span>
                        <h2 class="font-display font-bold text-2xl text-pure mt-1">Kalkulator Tekanan Ban & Suhu Trek</h2>
                    </div>
                    <span class="px-2.5 py-1 text-[0.62rem] font-display font-bold text-emerald-400 bg-emerald-400/10 rounded uppercase">
                        OPTIMAL GRIP WINDOW
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">KONDISI CUACA & TREK</label>
                            <select x-model="trackCondition" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                                <option value="dry_hot">Panas Kering (Suhu Aspal 42°C)</option>
                                <option value="dry_cool">Dingin Kering (Suhu Aspal 18°C)</option>
                                <option value="wet">Basah / Hujan (Suhu Aspal 14°C)</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">SENYAWA BAN PIRELLI</label>
                            <select x-model="tyreCompound" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                                <option value="slick_hard">Slick - Keras (P Zero DHF)</option>
                                <option value="slick_soft">Slick - Lunak (P Zero DHE)</option>
                                <option value="rain">Cinturato - Hujan (WH)</option>
                            </select>
                        </div>

                        <button @click="calculateTyrePressure()" class="btn-rgr text-xs w-full justify-center">Hitung Tekanan Ban Target (PSI)</button>
                    </div>

                    <div class="bg-pitch/60 border border-steel/20 p-6 rounded-md min-h-[160px] flex flex-col justify-between">
                        <div>
                            <p class="text-[0.58rem] font-ui text-faint tracking-wider uppercase mb-3">TEKANAN BAN OPTIMAL DINGIN / PANAS</p>
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Tekanan Dingin Awal:</span>
                                    <span class="text-pure font-bold" x-text="coldPressure">0.0 PSI</span>
                                </div>
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Tekanan Target Panas:</span>
                                    <span class="text-emerald-500 font-bold" x-text="hotPressure">0.0 PSI</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-steel/20 text-xs font-mono text-cyan-400 font-bold" x-text="tyreStatus">
                            &gt; Siap menghitung tekanan ban ideal GT3...
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

    {{-- GTWCE Specific Gallery --}}
    <section class="py-16 bg-white/20 border-t border-steel/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2">GALLERY & MEDIA</p>
                <h2 class="font-display font-bold text-2xl text-pure">GTWCE Action Gallery</h2>
                <div class="cyan-line my-3"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">SPA 24h DAWN DRIFT</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Spa 24h Dawn Ascent</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Mercedes-AMG GT3 #99 melintasi Eau Rouge saat fajar menyingsing.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">MONZA CHICANE BRAKING</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Monza Chicane Battle</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Valentino Rossi melakukan pengereman keras di chicane pertama sirkuit Monza.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">NURBURGRING PIT LANE RAIN</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Nürburgring Pit Stop Wet</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Kru mekanik bersiap menyambut AMG #88 untuk beralih ke ban hujan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- GTWCE Division Specific Sponsors --}}
    <section class="py-16 border-t border-steel/20 bg-white/40">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2">DIVISION PARTNERS</p>
                <h2 class="font-display font-bold text-2xl text-pure">GTWCE Series Sponsors</h2>
                <div class="cyan-line my-3"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @php
                    $gtwceSponsors = ['Bank BCA', 'Pirelli Indonesia', 'Ohlins Indonesia', 'Brembo', 'Puma Motorsport'];
                @endphp
                @foreach($gtwceSponsors as $name)
                    <div class="rgr-card p-4 rounded flex flex-col justify-center items-center text-center border-white/05 min-h-[100px]" data-reveal>
                        <span class="text-xs font-display font-bold text-pure">{{ $name }}</span>
                        <span class="text-[0.55rem] font-ui text-rgr uppercase font-bold mt-2">GTWCE Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function tyreSimulator() {
    return {
        trackCondition: 'dry_hot',
        tyreCompound: 'slick_hard',
        coldPressure: '0.0 PSI',
        hotPressure: '0.0 PSI',
        tyreStatus: '> Siap menghitung tekanan ban ideal GT3...',

        calculateTyrePressure() {
            if (this.trackCondition === 'dry_hot') {
                if (this.tyreCompound === 'slick_hard') {
                    this.coldPressure = '18.5 PSI';
                    this.hotPressure = '26.8 PSI';
                    this.tyreStatus = '> Grip optimal di cuaca panas. Hindari over-inflated agar ban tidak melepuh.';
                } else {
                    this.coldPressure = '17.8 PSI';
                    this.hotPressure = '27.2 PSI';
                    this.tyreStatus = '> Senyawa lunak cepat panas. Mulai dengan tekanan dingin lebih rendah.';
                }
            } else if (this.trackCondition === 'dry_cool') {
                this.coldPressure = '20.2 PSI';
                this.hotPressure = '26.5 PSI';
                this.tyreStatus = '> Udara dingin menghambat pemanasan ban. Butuh tekanan dingin awal lebih tinggi.';
            } else { // wet
                this.coldPressure = '22.5 PSI';
                this.hotPressure = '29.0 PSI';
                this.tyreStatus = '> Tekanan tinggi dibutuhkan pada ban hujan untuk membuang genangan air sirkuit.';
            }
        }
    }
}
</script>
@endpush
