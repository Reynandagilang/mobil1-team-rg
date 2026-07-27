@extends('layouts.rgr-premium')

@section('title', 'Kabar & Berita Tim RGR')
@section('meta_description', 'Berita terbaru, analisis teknis pasca-balap, dan rilis pers resmi langsung dari tim pit-wall Mobil 1 Team RG.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg">
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <p class="section-label mb-2">ABOUT US</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">LATEST NEWS</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Semua artikel resmi, wawancara pembalap, rilis teknis sasis, dan laporan hasil akhir sirkuit.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($articles as $art)
        <article class="rgr-card p-6 flex flex-col justify-between" data-reveal>
            <div>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-2">{{ $art->category }}</span>
                <h3 class="font-display font-bold text-lg text-pure mb-3 leading-tight">{{ $art->title }}</h3>
                <p class="text-xs text-muted leading-relaxed font-body mb-6">
                    {{ $art->summary }}
                </p>
            </div>
            
            <div class="border-t border-white/05 pt-4 flex justify-between items-center text-xs text-muted">
                <span>{{ $art->author }}</span>
                <span>{{ \Carbon\Carbon::parse($art->published_at)->format('d M Y') }}</span>
            </div>
        </article>
        @empty
        <p class="text-muted text-sm col-span-3 text-center py-12">Belum ada artikel berita yang dipublikasikan.</p>
        @endforelse
    </div>
</div>
@endsection
