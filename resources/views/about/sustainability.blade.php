@extends('layouts.rgr-premium')

@section('title', 'Keberlanjutan & Nol Karbon')
@section('meta_description', 'Komitmen tim Mobil 1 Team RG terhadap kelestarian lingkungan dan target Net Zero Carbon 2030.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg">
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <p class="section-label mb-2">ABOUT US</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">SUSTAINABILITY</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Kecepatan tanpa mengorbankan masa depan. Mobil 1 Team RG berkomitmen penuh mewujudkan Net Zero Carbon pada tahun 2030 di seluruh aktivitas operasional.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">
        <div class="rgr-card p-8" data-reveal>
            <h3 class="font-display font-bold text-2xl text-pure mb-4">Bahan Bakar Hibrida 100% Berkelanjutan</h3>
            <p class="text-sm text-muted leading-relaxed font-body">
                Melalui kolaborasi erat dengan mitra teknis kami Pertamax Turbo, divisi F1 M1TRG mengembangkan formulasi bahan bakar sintetis e-fuel ramah lingkungan generasi terbaru yang memangkas emisi CO2 hingga 85%.
            </p>
        </div>

        <div class="rgr-card p-8" data-reveal>
            <h3 class="font-display font-bold text-2xl text-pure mb-4">Markas Logistik Nol Emisi</h3>
            <p class="text-sm text-muted leading-relaxed font-body">
                Pusat perancangan teknologi M1TRG di Jakarta ditenagai penuh oleh jaringan sel surya mandiri dan sistem pengelolaan air bersiklus tertutup (closed-loop) untuk meminimalkan limbah industri.
            </p>
        </div>

        <div class="rgr-card p-8" data-reveal>
            <h3 class="font-display font-bold text-2xl text-pure mb-4">Daur Ulang Serat Karbon</h3>
            <p class="text-sm text-muted leading-relaxed font-body">
                Kami mendaur ulang 100% limbah sasis serat karbon yang rusak pasca-tabrakan sirkuit. Serat karbon bekas ini diolah kembali menjadi komponen simulator latihan balap akademi serta furnitur markas tim.
            </p>
        </div>

        <div class="rgr-card p-8" data-reveal>
            <h3 class="font-display font-bold text-2xl text-pure mb-4">Kemitraan Logistik Hijau</h3>
            <p class="text-sm text-muted leading-relaxed font-body">
                Bekerja sama dengan penyedia logistik global untuk meminimalkan penerbangan kargo udara. Kami memprioritaskan kargo laut dan menggunakan armada truk bertenaga listrik/bio-fuel selama musim balap berlangsung.
            </p>
        </div>
    </div>
</div>
@endsection
