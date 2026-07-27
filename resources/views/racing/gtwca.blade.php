@extends('layouts.rgr-premium')

@section('title', 'GT World Challenge Asia — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi GT World Challenge Asia. Ajang balap mobil sport GT3 paling prestisius di kawasan Asia Pasifik.')

@push('styles')
<style>
.gta-hero {
    position: relative; padding-top: 130px; padding-bottom: 60px;
    background: #0B0D10; overflow: hidden;
}
.gta-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(196, 229, 56, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(196, 229, 56, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.gta-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(196, 229, 56, 0.08);
    position: relative; overflow: hidden;
    transition: all 0.4s ease;
}
.gta-card:hover {
    border-color: rgba(196, 229, 56, 0.2);
    transform: translateY(-4px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.06);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">
    
    {{-- Hero Section --}}
    <section class="gta-hero">
        <div class="gta-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-3 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>GT3 DIVISION ASIA</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">GT World Challenge Asia</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Persaingan balap ketahanan GT3 bergengsi di wilayah Asia Pasifik. Mobil 1 Team RG menurunkan dua armada Porsche 911 GT3 R generasi terbaru untuk merebut mahkota kejuaraan kontinental.
            </p>
        </div>
    </section>

    {{-- Format Kompetisi & Kalender Sirkuit Utama --}}
    <section class="py-12 border-b border-steel/15 bg-white/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Format --}}
                <div class="md:col-span-1 rgr-card p-6 border-l-4 border-rgr">
                    <span class="text-[0.62rem] font-ui tracking-widest text-rgr font-bold uppercase">KARAKTERISTIK SERI</span>
                    <h3 class="font-display font-bold text-xl text-pure mt-1 mb-3">Persaingan Asia Pasifik</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Seri ini sangat menarik karena jaraknya dekat dengan Indonesia, bahkan banyak pembalap dan tim papan atas dari Asia Tenggara (termasuk Indonesia) yang langganan turun di sini. Karakteristiknya didominasi oleh sirkuit-sirkuit modern berstandar F1.
                    </p>
                </div>
                {{-- Sirkuit --}}
                <div class="md:col-span-2 space-y-4">
                    <span class="text-[0.62rem] font-ui tracking-widest text-muted font-bold uppercase">KALENDER SIRKUIT UTAMA</span>
                    <h3 class="font-display font-bold text-2xl text-pure">Sirkuit Utama Asia</h3>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Sepang International Circuit (Malaysia)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Usually menjadi seri pembuka atau penutup. Banyak tim regional yang sangat hafal dengan karakter sirkuit ini.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Fuji Speedway & Suzuka Circuit (Jepang)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Dua sirkuit legendaris di Jepang. Seri di Jepang ini sangat bergengsi karena tim-tim pabrikan lokal Jepang ikut turun gunung sebagai wildcard.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Chang International Circuit (Buriram, Thailand)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Sirkuit modern yang sangat panas, menguji ketahanan fisik pembalap dan sistem pendingin mobil.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Mandalika International Circuit (Indonesia)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Menariknya, dalam kalender musim balap terbaru, Sirkuit Mandalika di Lombok mulai dilirik dan masuk sebagai salah satu tuan rumah resmi untuk seri GTWC Asia!</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded md:col-span-2">
                            <h4 class="text-xs font-bold text-pure">Shanghai International Circuit (China)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Salah satu sirkuit F1 dengan trek lurus terpanjang yang menguji performa mesin.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Lineup Pembalap & Mobil --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <h2 class="font-display font-bold text-2xl text-pure">Roster Pembalap & Armada Porsche</h2>
                <div class="cyan-line my-3"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                {{-- Car #55 Pro-Am --}}
                <div class="gta-card p-8 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-rgr bg-rgr/10 rounded uppercase">
                                    PRO-AM CLASS · #55
                                </span>
                                <h3 class="font-display font-bold text-2xl text-pure mt-3">Porsche 911 GT3 R (992)</h3>
                                <p class="text-xs text-muted font-body mt-1">Mesin: 4.2L Flat-Six Naturally Aspirated · Tenaga: 565 HP · Sasis: Lightweight Aluminium-Steel</p>
                            </div>
                            <span class="font-display font-black text-4xl text-rgr">#55</span>
                        </div>

                        <div class="space-y-4 border-t border-steel/20 pt-4 mb-6">
                            <h4 class="text-xs font-display font-bold text-pure">PANDUAN PEMBALAP:</h4>
                            <div>
                                <p class="text-xs font-bold text-pure">Rio Haryanto <span class="text-muted font-normal">(Indonesia)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Pembalap kebanggaan Indonesia, mantan bintang Formula 1 dengan pengalaman balap GT Asia yang sangat kaya.</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-pure">Alessio Picariello <span class="text-muted font-normal">(Belgia)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Pembalap pabrikan Porsche, pemegang gelar juara GT Cup Asia dengan konsistensi lap terbaik.</p>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-steel/20 pt-4 grid grid-cols-3 gap-2 text-center text-xs font-mono">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">4 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Podium</p>
                            <p class="font-display font-bold text-pure mt-1">11 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Pole</p>
                            <p class="font-display font-bold text-pure mt-1">5 Kali</p>
                        </div>
                    </div>
                </div>

                {{-- Car #66 Silver Cup --}}
                <div class="gta-card p-8 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-cyan-500 bg-cyan-500/10 rounded uppercase">
                                    SILVER CUP · #66
                                </span>
                                <h3 class="font-display font-bold text-2xl text-pure mt-3">Porsche 911 GT3 R (992)</h3>
                                <p class="text-xs text-muted font-body mt-1">Mesin: 4.2L Flat-Six Naturally Aspirated · Transmisi: 6-Speed Sequential Constant-Mesh</p>
                            </div>
                            <span class="font-display font-black text-4xl text-cyan-500">#66</span>
                        </div>

                        <div class="space-y-4 border-t border-steel/20 pt-4 mb-6">
                            <h4 class="text-xs font-display font-bold text-pure">PANDUAN PEMBALAP:</h4>
                            <div>
                                <p class="text-xs font-bold text-pure">Yifei Ye <span class="text-muted font-normal">(Tiongkok)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Pembalap elit Porsche Asia Pasifik, ahli sirkuit Shanghai dan Suzuka.</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-pure">Tanart Sathienthirakul <span class="text-muted font-normal">(Thailand)</span></p>
                                <p class="text-[0.65rem] text-muted font-body mt-0.5">Pembalap berpengalaman tinggi di kancah GT Asia Tenggara, mahir dalam menjaga daya tahan ban.</p>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-steel/20 pt-4 grid grid-cols-3 gap-2 text-center text-xs font-mono">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Kemenangan</p>
                            <p class="font-display font-bold text-pure mt-1">2 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Podium</p>
                            <p class="font-display font-bold text-pure mt-1">6 Kali</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Pole</p>
                            <p class="font-display font-bold text-pure mt-1">3 Kali</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Interactive Simulator: Pit Stop Penalty Ballast --}}
    <section class="py-16 border-t border-steel/20" x-data="bopSimulator()">
        <div class="max-w-7xl mx-auto px-6">
            <div class="rgr-card p-8 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-rgr/03 to-transparent pointer-events-none"></div>
                
                <div class="flex flex-col md:flex-row items-start justify-between gap-6 border-b border-steel/20 pb-4 mb-6">
                    <div>
                        <span class="text-xs font-ui tracking-widest text-rgr font-bold uppercase">SUCCESS BALLAST & PIT PENALTY</span>
                        <h2 class="font-display font-bold text-2xl text-pure mt-1">Kalkulator Penalti Pit Stop Sukses (Success Penalty)</h2>
                    </div>
                    <span class="px-2.5 py-1 text-[0.62rem] font-display font-bold text-cyan-400 bg-cyan-400/10 rounded uppercase">
                        GT ASIA REGULATION
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">POSISI HASIL BALAPAN SEBELUMNYA</label>
                            <select x-model="lastPosition" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                                <option value="1">Juara 1 (P1)</option>
                                <option value="2">Juara 2 (P2)</option>
                                <option value="3">Juara 3 (P3)</option>
                                <option value="4">Luar Podium (P4 ke bawah)</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">KATEGORI KELAS PEMBALAP</label>
                            <select x-model="driverClass" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                                <option value="pro_am">Pro-Am Cup (#55 - Rio / Alessio)</option>
                                <option value="silver">Silver Cup (#66 - Yifei / Tanart)</option>
                            </select>
                        </div>

                        <button @click="calculatePenalty()" class="btn-rgr text-xs w-full justify-center">Simulasikan Waktu Wajib Pit Stop</button>
                    </div>

                    <div class="bg-pitch/60 border border-steel/20 p-6 rounded-md min-h-[160px] flex flex-col justify-between">
                        <div>
                            <p class="text-[0.58rem] font-ui text-faint tracking-wider uppercase mb-3">DURASI MINIMUM PIT STOP BERIKUTNYA</p>
                            <div class="space-y-2">
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Tambahan Waktu Penalti:</span>
                                    <span class="text-rgr font-bold" x-text="penaltyTime">0 Detik</span>
                                </div>
                                <div class="flex justify-between text-xs font-mono">
                                    <span class="text-muted">Total Durasi Wajib Pit:</span>
                                    <span class="text-pure font-bold" x-text="totalPitTime">0 Detik</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-steel/20 text-xs font-mono text-cyan-400 font-bold" x-text="penaltyStatus">
                            &gt; Siap menghitung regulasi pit-stop GT World Challenge Asia...
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

    {{-- GTWCA Specific Gallery --}}
    <section class="py-16 bg-white/20 border-t border-steel/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2">GALLERY & MEDIA</p>
                <h2 class="font-display font-bold text-2xl text-pure">GTWCA Action Gallery</h2>
                <div class="cyan-line my-3"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">SUZUKA 10h GT3 DENSE PACK</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Suzuka 10h GT3 Pack</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Porsche 911 GT3 R #55 meluncur cepat menuruni tikungan 130R sirkuit Suzuka.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">FUJI SPEEDWAY STRAIGHT</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Fuji Speedway Straight Run</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Yifei Ye memanfaatkan slipstream di lintasan lurus utama sepanjang 1.47 km sirkuit Fuji.</p>
                </div>
                <div class="rgr-card p-4 rounded overflow-hidden" data-reveal>
                    <div class="h-48 bg-white/05 rounded mb-3 flex items-center justify-center border border-white/05 relative">
                        <span class="text-[0.62rem] font-ui tracking-widest text-muted">MANDALIKA ROAD CRUISE</span>
                    </div>
                    <h4 class="font-display font-bold text-sm text-pure">Mandalika Heat Testing</h4>
                    <p class="text-[0.68rem] text-muted leading-relaxed mt-1">Kru mekanik mengukur suhu ban Porsche #66 pada aspal panas sirkuit Mandalika.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- GTWCA Division Specific Sponsors --}}
    <section class="py-16 border-t border-steel/20 bg-white/40">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <p class="section-label mb-2">DIVISION PARTNERS</p>
                <h2 class="font-display font-bold text-2xl text-pure">GTWCA Series Sponsors</h2>
                <div class="cyan-line my-3"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @php
                    $gtwcaSponsors = ['Bank Mandiri', 'Telkomsel Flash', 'Pirelli Indonesia', 'Brembo', 'Oakley Indonesia'];
                @endphp
                @foreach($gtwcaSponsors as $name)
                    <div class="rgr-card p-4 rounded flex flex-col justify-center items-center text-center border-white/05 min-h-[100px]" data-reveal>
                        <span class="text-xs font-display font-bold text-pure">{{ $name }}</span>
                        <span class="text-[0.55rem] font-ui text-rgr uppercase font-bold mt-2">GTWCA Partner</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
function bopSimulator() {
    return {
        lastPosition: '1',
        driverClass: 'pro_am',
        penaltyTime: '0 Detik',
        totalPitTime: '0 Detik',
        penaltyStatus: '> Siap menghitung regulasi pit-stop GT World Challenge Asia...',

        calculatePenalty() {
            let basePit = this.driverClass === 'pro_am' ? 65 : 75; // Pro-Am base pit stop is shorter in regulations
            let extra = 0;

            if (this.lastPosition === '1') {
                extra = 15; // 15s penalty for winning
                this.penaltyStatus = '> PENALTI SUKSES MAKSIMAL: Wajib diam tambahan 15 detik pada pit-stop berikutnya.';
            } else if (this.lastPosition === '2') {
                extra = 10;
                this.penaltyStatus = '> PENALTI MODERAT: Tambahan 10 detik karena finis P2.';
            } else if (this.lastPosition === '3') {
                extra = 5;
                this.penaltyStatus = '> PENALTI RINGAN: Tambahan 5 detik karena finis P3.';
            } else {
                extra = 0;
                this.penaltyStatus = '> TANPA PENALTI: Durasi pit-stop standar sesuai kelas masing-masing.';
            }

            this.penaltyTime = extra + ' Detik';
            this.totalPitTime = (basePit + extra) + ' Detik';
        }
    }
}
</script>
@endpush
