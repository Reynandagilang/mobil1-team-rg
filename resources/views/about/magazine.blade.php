@extends('layouts.rgr-premium')

@section('title', 'RGR Magazine - Edisi Digital')
@section('meta_description', 'Baca majalah eksklusif M1TRG Magazine edisi bulanan yang membahas analisis mendalam teknis dan profil pembalap.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg">
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <p class="section-label mb-2">ABOUT US</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">RGR MAGAZINE</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Majalah digital bulanan eksklusif yang membedah riset teknologi aerodinamika markas M1TRG Jakarta, strategi pit-stop, dan galeri foto sirkuit.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">
        {{-- Edisi Spesial --}}
        <div class="rgr-card p-8 flex flex-col justify-between md:col-span-2 border-rgr" data-reveal>
            <div>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">Edisi Spesial: Desain & Interaktivitas</span>
                <h3 class="font-display font-bold text-3xl text-pure mb-4">Formula Sukses Web Motorsport Modern</h3>
                
                <div class="grid md:grid-cols-2 gap-8 text-sm text-muted leading-relaxed font-body mb-6">
                    <div>
                        <h4 class="font-display font-bold text-pure text-base mb-2">1. Tampilan: Pilih Tailwind CSS dibanding Bootstrap</h4>
                        <p class="text-xs">
                            Website balap itu butuh visual yang agresif, modern, dan unik. Kalau pakai Bootstrap, tampilan websitemu bakal kelihatan kaku dan mirip website kantoran atau portal berita. Dengan Tailwind, kamu bisa bikin transisi animasi yang halus (misal: efek hover saat foto pembalap disorot), desain kartu yang estetik, dan tata letak (layout) grid foto galeri yang dinamis dengan sangat mudah.
                        </p>
                        <p class="text-xs mt-2 italic text-rgr">
                            Contoh Kasus: Kamu bisa bikin tagline tim dengan efek gradasi warna neon khas racing hanya dengan beberapa baris kelas Tailwind.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-display font-bold text-pure text-base mb-2">2. Interaktivitas: Gunakan Vue.js untuk Efek Canggih</h4>
                        <p class="text-xs">
                            Untuk website tim balap, Laravel polosan (+ Blade Template) sudah lebih dari cukup. Tapi kalau kamu mau websitemu terasa super premium tanpa loading putar-putar saat pindah halaman, Vue.js adalah jodoh terbaik buat Laravel. Di website tim balap, Vue.js bakal keren banget buat menangani fitur interaktif seperti:
                        </p>
                        <ul class="list-disc pl-4 text-xs mt-2 space-y-1">
                            <li><strong>Countdown Timer:</strong> Hitung mundur otomatis menuju hari balapan secara real-time.</li>
                            <li><strong>Live Race Results:</strong> Klasemen poin atau hasil balapan yang bisa difilter berdasarkan tahun atau sirkuit tanpa perlu refresh halaman web.</li>
                            <li><strong>Galeri Foto Pop-up:</strong> Buka foto-aksi motor/mobil di sirkuit dengan efek lightbox yang mulus dan ringan.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <button class="btn-rgr text-xs w-fit">BACA EDISI DIGITAL (PDF)</button>
        </div>

        <div class="rgr-card p-8 flex flex-col justify-between" data-reveal>
            <div>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">EDISI JUNI 2026</span>
                <h3 class="font-display font-bold text-2xl text-pure mb-4">Merah Laser & Kecepatan Mutakhir</h3>
                <p class="text-sm text-muted leading-relaxed font-body mb-6">
                    Membahas secara mendalam transisi visual ke tema Championship Laser, perolehan podium ganda di kejuaraan, dan rahasia sasis hibrida di trek lurus Spa-Francorchamps.
                </p>
            </div>
            <button class="btn-rgr text-xs w-fit">BACA EDISI DIGITAL (PDF)</button>
        </div>

        <div class="rgr-card p-8 flex flex-col justify-between" data-reveal>
            <div>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">EDISI MEI 2026</span>
                <h3 class="font-display font-bold text-2xl text-pure mb-4">Mastering Wet Weather Setup</h3>
                <p class="text-sm text-muted leading-relaxed font-body mb-6">
                    Bagaimana para insinyur M1TRG merancang peta distribusi daya baterai listrik (MGU-K) pada lintasan basah ekstrim untuk mencegah ban mengalami slip.
                </p>
            </div>
            <button class="btn-rgr text-xs w-fit">BACA EDISI DIGITAL (PDF)</button>
        </div>

        <div class="rgr-card p-8 flex flex-col justify-between" data-reveal>
            <div>
                <span class="text-xs text-muted font-ui font-bold tracking-widest uppercase block mb-1">EDISI APRIL 2026</span>
                <h3 class="font-display font-bold text-2xl text-pure mb-4">Pusat Aerodinamika & Terowongan Angin Baru</h3>
                <p class="text-sm text-muted leading-relaxed font-body mb-6">
                    Mengupas tuntas peresmian fasilitas pengujian aerodinamika terowongan angin baru M1TRG di Jakarta Utara, serta kelebihannya dalam mensimulasikan turbulensi udara belakang.
                </p>
            </div>
            <button class="btn-rgr-ghost text-xs w-fit">ARSIP MAJALAH</button>
        </div>

        <div class="rgr-card p-8 flex flex-col justify-between" data-reveal>
            <div>
                <span class="text-xs text-muted font-ui font-bold tracking-widest uppercase block mb-1">EDISI MARET 2026</span>
                <h3 class="font-display font-bold text-2xl text-pure mb-4">Inovasi Bahan Bakar Bio & Tenaga V6</h3>
                <p class="text-sm text-muted leading-relaxed font-body mb-6">
                    Menyelidiki masa depan e-fuel Pertamax Turbo dan bagaimana kolaborasi teknis ini berhasil menjaga performa kompresi tinggi mesin V6 Turbo Hibrida F1 RGR.
                </p>
            </div>
            <button class="btn-rgr-ghost text-xs w-fit">ARSIP MAJALAH</button>
        </div>
    </div>
</div>
@endsection
