@extends('layouts.rgr-premium')

@section('title', 'Tentang Kami — Mobil 1 Team RG')
@section('meta_description', 'Profil resmi, sejarah, visi-misi, serta filosofi kampanye warna hitam-emas-merah tim balap independen Mobil 1 Team RG.')

@push('styles')
<style>
.about-hero {
    position: relative; padding-top: 130px; padding-bottom: 50px;
    background: #0B0D10; overflow: hidden;
}
.about-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(196, 229, 56, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(196, 229, 56, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.philosophy-card {
    background: #15181D;
    border: 1px solid rgba(255, 255, 255, 0.08);
    transition: all 0.3s ease;
}
.color-badge-black {
    background: #0B0D10; color: #FFFFFF;
    border: 1px solid rgba(255,255,255,0.15);
}
.color-badge-gold {
    background: #F5A623; color: #0B0D10;
}
.color-badge-red {
    background: #C8FF2E; color: #0B0D10;
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">

    {{-- Hero Section --}}
    <section class="about-hero">
        <div class="about-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>COMPANY PROFILE</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">Tentang Kami</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Kisah dedikasi, kemandirian tim privat, dan tekad murni untuk mendefinisikan ulang batas performa motorsport global.
            </p>
        </div>
    </section>

    {{-- Storytelling & Campaign Section --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
                
                {{-- Left & Middle Column: Storytelling Narrative --}}
                <div class="lg:col-span-2 space-y-6">
                    <h2 class="font-display font-black text-3xl text-pure tracking-tight">Menolak Menjadi Pelengkap Grid</h2>
                    <div class="cyan-line my-4"></div>
                    <div class="text-sm text-muted leading-relaxed font-body space-y-4">
                        <p>
                            <strong>Mobil 1 Team RG</strong> didirikan atas sebuah visi yang sederhana namun menantang: membuktikan bahwa tim independen (privateer) asal Indonesia mampu berdiri sejajar dan mengalahkan raksasa motorsport pabrikan di panggung dunia. Didirikan pada tahun 2018 oleh insinyur balap Rey Gilang, perjalanan kami dimulai dari garasi riset kecil di kawasan Senayan, Jakarta.
                        </p>
                        <p>
                            Di dunia di mana balapan sering didominasi oleh modal korporasi tanpa wajah, kami memilih jalan kemandirian profesional. Kami percaya bahwa kombinasi antara presisi rekayasa aerodinamika, analisis data komparatif superkomputer, dan rasa lapar akan podium adalah satu-satunya bahan bakar yang kami butuhkan untuk menang.
                        </p>
                        <p>
                            Melalui kemitraan teknis eksklusif bersama Mercedes-AMG, Toyota Gazoo, McLaren, Porsche, dan Chevrolet, kami menyatukan sasis berkinerja tinggi dunia dengan dedikasi taktis kru garasi kami. Dari lintasan aspal Formula 1, sirkuit ketahanan legendaris Le Mans dan Spa, hingga medan reli lumpur kasar WRC, kami tidak hanya ikut membalap; kami hadir untuk menetapkan standar baru.
                        </p>
                    </div>

                    {{-- Campaign Box Quote --}}
                    <div class="border-l-4 border-rgr bg-carbon p-6 rounded-r shadow-sm mt-8">
                        <p class="text-pure font-body text-xs italic leading-relaxed">
                            "Mobil 1 Team RG lahir dari semangat kemandirian tim privat (privateer) yang menolak untuk menjadi pelengkap di garis start. Kami hadir dengan identitas Hitam yang melambangkan ketangguhan manajemen dan kekuatan mekanik murni di dalam garasi. Setiap inci lintasan kami lalui dengan target tunggal: podium tertinggi, yang kami visualisasikan lewat guratan warna Emas premium pada bodi kendaraan. Didukung oleh performa pelumas dunia, warna Merah ikonik pada angka '1' bukan sekadar logo, melainkan simbol dari api ambisi kami yang haus akan kejuaraan. Kami tidak hanya ikut membalap; kami hadir untuk menetapkan standar baru di lintasan."
                        </p>
                    </div>
                </div>

                {{-- Right Column: Brand Color Philosophy --}}
                <div class="space-y-6 lg:border-l lg:border-steel/20 lg:pl-10">
                    <h3 class="font-display font-bold text-lg text-pure uppercase tracking-wider">Filosofi Warna Tim</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">Identitas visual kami mencerminkan api ambisi, ketahanan mekanis, dan kemewahan target podium teratas.</p>
                    
                    <div class="space-y-4">
                        {{-- Black --}}
                        <div class="philosophy-card p-4 rounded flex items-start gap-4">
                            <span class="w-12 h-12 flex items-center justify-center font-display font-black text-xs rounded color-badge-black select-none shrink-0 shadow-sm">BK</span>
                            <div>
                                <h4 class="text-xs font-display font-bold text-pure uppercase tracking-wide">Hitam (Ketangguhan)</h4>
                                <p class="text-[0.68rem] text-muted leading-normal mt-1">Melambangkan kedisiplinan operasional manajemen tim dan kekuatan rekayasa mekanik murni di dalam garasi privat kami.</p>
                            </div>
                        </div>

                        {{-- Gold --}}
                        <div class="philosophy-card p-4 rounded flex items-start gap-4">
                            <span class="w-12 h-12 flex items-center justify-center font-display font-black text-xs rounded color-badge-gold select-none shrink-0 shadow-sm">GL</span>
                            <div>
                                <h4 class="text-xs font-display font-bold text-pure uppercase tracking-wide">Emas (Podium Tertinggi)</h4>
                                <p class="text-[0.68rem] text-muted leading-normal mt-1">Representasi visual premium dari target tunggal kami di setiap balapan: berdiri tegak merebut piala di podium nomor satu.</p>
                            </div>
                        </div>

                        {{-- Red --}}
                        <div class="philosophy-card p-4 rounded flex items-start gap-4">
                            <span class="w-12 h-12 flex items-center justify-center font-display font-black text-xs rounded color-badge-red select-none shrink-0 shadow-sm">RD</span>
                            <div>
                                <h4 class="text-xs font-display font-bold text-pure uppercase tracking-wide">Merah Mobil 1 (Api Ambisi)</h4>
                                <p class="text-[0.68rem] text-muted leading-normal mt-1">Simbol dari api semangat membara, determinasi pantang menyerah, dan performa pelumasan motorsport kelas dunia.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Milestones Timeline Section --}}
    <section class="py-16 border-t border-steel/20 bg-carbon-2">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <h3 class="font-display font-bold text-2xl text-pure">Linimasa Sejarah Tim</h3>
                <div class="cyan-line my-3"></div>
            </div>

            <div class="space-y-6">
                
                {{-- 2018 --}}
                <div class="rgr-card p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-3xl text-rgr md:w-28 block shrink-0">2018</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-pure mb-1">Pendirian Garasi Riset Senayan</h4>
                        <p class="text-xs text-muted leading-relaxed font-body">Rey Gilang mendirikan divisi riset teknik balap kecil di Senayan, Jakarta, berfokus pada dinamika suspensi dan rekayasa komponen serat karbon lokal.</p>
                    </div>
                </div>

                {{-- 2019 --}}
                <div class="rgr-card p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-3xl text-rgr md:w-28 block shrink-0">2019</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-pure mb-1">Dominasi Karting Nasional</h4>
                        <p class="text-xs text-muted leading-relaxed font-body">Tim gokart junior M1TRG mendominasi kelas senior di sirkuit Sentul, melahirkan bibit pembalap muda pertama untuk program pembinaan akademi.</p>
                    </div>
                </div>

                {{-- 2020 --}}
                <div class="rgr-card p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-3xl text-rgr md:w-28 block shrink-0">2020</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-pure mb-1">Kemenangan Le Mans Virtual E-Sports</h4>
                        <p class="text-xs text-muted leading-relaxed font-body">Mendirikan divisi simulator profesional saat pandemi global, menyabet podium utama di ajang ketahanan 24 Hours of Le Mans Virtual.</p>
                    </div>
                </div>

                {{-- 2022 --}}
                <div class="rgr-card p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-3xl text-rgr md:w-28 block shrink-0">2022</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-pure mb-1">Debut Kejuaraan Dunia Ketahanan FIA WEC</h4>
                        <p class="text-xs text-muted leading-relaxed font-body">Mengekspansi program balap ke sirkuit internasional kelas LMP2, langsung mencatatkan podium pertama tim di sirkuit ketahanan Spa-Francorchamps.</p>
                    </div>
                </div>

                {{-- 2024 --}}
                <div class="rgr-card p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-3xl text-rgr md:w-28 block shrink-0">2024</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-pure mb-1">Juara Dunia WEC Kelas Hypercar</h4>
                        <p class="text-xs text-muted leading-relaxed font-body">Menyabet mahkota juara dunia konstruktor kelas utama Hypercar menggunakan purwarupa M1TRG Valkyrie-H setelah kemenangan legendaris Le Mans 24 Jam.</p>
                    </div>
                </div>

                {{-- 2025 --}}
                <div class="rgr-card p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-3xl text-rgr md:w-28 block shrink-0">2025</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-pure mb-1">Masuk ke Grid Formula 1</h4>
                        <p class="text-xs text-muted leading-relaxed font-body">Memperoleh lisensi konstruktor utama F1 dari FIA, menggandeng Mercedes-AMG sebagai mitra penyedia mesin hibrida berkinerja tinggi.</p>
                    </div>
                </div>

                {{-- 2026 --}}
                <div class="rgr-card p-6 flex flex-col md:flex-row gap-6 items-start" data-reveal>
                    <span class="font-display font-black text-3xl text-rgr md:w-28 block shrink-0">2026</span>
                    <div>
                        <h4 class="font-display font-bold text-base text-pure mb-1">Ekspansi Global 7 Seri Kejuaraan</h4>
                        <p class="text-xs text-muted leading-relaxed font-body">Melakukan perluasan operasi tim di ajang NASCAR Cup Series, NTT IndyCar Series, FIA World Rally Championship (WRC), dan GT World Challenge global.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Lokasi Markas & Kantor --}}
    <section class="py-16 border-t border-steel/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>GLOBAL OPERATIONS</p>
                <h3 class="font-display font-bold text-2xl text-pure">Lokasi Markas & Kantor</h3>
                <div class="cyan-line my-3"></div>
                <p class="text-xs text-muted leading-relaxed max-w-2xl">Operasional Mobil 1 Team RG dijalankan dari dua basis strategis yang menghubungkan jantung teknis domestik dengan koridor bisnis motorsport Eropa.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                {{-- HQ Sentul --}}
                <div class="rgr-card p-6 rounded" data-reveal>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-10 h-10 flex items-center justify-center bg-rgr text-white font-display font-black text-xs rounded">HQ</span>
                        <div>
                            <h4 class="font-display font-bold text-base text-pure">Kantor Utama (Main Headquarters)</h4>
                            <span class="text-[0.62rem] font-ui tracking-widest text-rgr uppercase font-bold">Markas Pusat Global — Jantung Operasional</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mb-4 text-xs text-muted font-body">
                        <svg class="w-4 h-4 text-rgr shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Area Paddock Sirkuit Internasional Sentul, Bogor, Indonesia</span>
                    </div>

                    <div class="space-y-3">
                        <div class="philosophy-card p-3 rounded flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-rgr/10 text-rgr rounded font-mono font-bold text-[0.6rem] shrink-0">01</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-pure">Pusat Rekayasa Mesin (Main Workshop)</h5>
                                <p class="text-[0.68rem] text-muted leading-relaxed mt-0.5">Tempat perakitan, modifikasi, dan perawatan rutin mobil/motor balap secara fisik.</p>
                            </div>
                        </div>
                        <div class="philosophy-card p-3 rounded flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-rgr/10 text-rgr rounded font-mono font-bold text-[0.6rem] shrink-0">02</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-pure">Gudang Logistik Utama</h5>
                                <p class="text-[0.68rem] text-muted leading-relaxed mt-0.5">Menyimpan unit kendaraan, ban cadangan, alat ukur telemetri, dan suplai pelumas utama dari Mobil 1.</p>
                            </div>
                        </div>
                        <div class="philosophy-card p-3 rounded flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-rgr/10 text-rgr rounded font-mono font-bold text-[0.6rem] shrink-0">03</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-pure">Pusat Latihan Pebalap</h5>
                                <p class="text-[0.68rem] text-muted leading-relaxed mt-0.5">Markas bagi pebalap untuk latihan fisik, simulasi taktik, serta evaluasi langsung di lintasan sirkuit Sentul (Track Day).</p>
                            </div>
                        </div>
                        <div class="philosophy-card p-3 rounded flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-rgr/10 text-rgr rounded font-mono font-bold text-[0.6rem] shrink-0">04</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-pure">Manajemen Domestik</h5>
                                <p class="text-[0.68rem] text-muted leading-relaxed mt-0.5">Mengurus pendaftaran kejuaraan nasional/Asia, hubungan media lokal, dan operasional situs web resmi tim.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- European Office --}}
                <div class="rgr-card p-6 rounded" data-reveal>
                    <div class="flex items-center gap-3 mb-4">
                        <span class="w-10 h-10 flex items-center justify-center bg-pure text-white font-display font-black text-xs rounded">EU</span>
                        <div>
                            <h4 class="font-display font-bold text-base text-pure">Kantor Cabang Internasional (European Hub)</h4>
                            <span class="text-[0.62rem] font-ui tracking-widest text-rgr uppercase font-bold">Kantor Perwakilan Eropa — Pintu Gerbang Internasional</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 mb-4 text-xs text-muted font-body">
                        <svg class="w-4 h-4 text-rgr shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Frankfurt Airport Center / Nürburgring Area, Jerman</span>
                    </div>

                    <div class="space-y-3">
                        <div class="philosophy-card p-3 rounded flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-rgr/10 text-rgr rounded font-mono font-bold text-[0.6rem] shrink-0">01</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-pure">Jembatan Balapan Eropa (European Race Gateway)</h5>
                                <p class="text-[0.68rem] text-muted leading-relaxed mt-0.5">Pusat koordinasi logistik saat berkompetisi atau uji coba di sirkuit legendaris Eropa seperti Nürburgring, Spa-Francorchamps, atau Monza.</p>
                            </div>
                        </div>
                        <div class="philosophy-card p-3 rounded flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-rgr/10 text-rgr rounded font-mono font-bold text-[0.6rem] shrink-0">02</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-pure">Hub Bisnis & Sponsor Global</h5>
                                <p class="text-[0.68rem] text-muted leading-relaxed mt-0.5">Tempat pertemuan bisnis tatap muka dengan manajemen Mobil 1 Global, G-SHOCK Eropa, atau brand multinasional lainnya untuk negosiasi kontrak sponsorship.</p>
                            </div>
                        </div>
                        <div class="philosophy-card p-3 rounded flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-rgr/10 text-rgr rounded font-mono font-bold text-[0.6rem] shrink-0">03</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-pure">Jalur Cepat Komponen FIA (Fast-Track Logistics)</h5>
                                <p class="text-[0.68rem] text-muted leading-relaxed mt-0.5">Mempermudah pembelian, pengiriman, dan pengurusan bea cukai suku cadang balap bersertifikasi FIA (suspensi Ohlins, rem Brembo) langsung dari pabrikan Eropa.</p>
                            </div>
                        </div>
                        <div class="philosophy-card p-3 rounded flex items-start gap-3">
                            <span class="w-7 h-7 flex items-center justify-center bg-rgr/10 text-rgr rounded font-mono font-bold text-[0.6rem] shrink-0">04</span>
                            <div>
                                <h5 class="text-xs font-display font-bold text-pure">Rekrutmen Talenta Internasional</h5>
                                <p class="text-[0.68rem] text-muted leading-relaxed mt-0.5">Mempermudah penyewaan jasa insinyur balap (Race Engineer) atau ahli strategi sirkuit lokal Eropa secara jangka pendek (freelance) saat balapan berlangsung.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
