@extends('layouts.rgr-premium')

@section('title', 'Partnership & B2B Portal — Mobil 1 Team RG')
@section('meta_description', 'Portal bisnis (B2B) dan Sponsor Hub resmi tim Mobil 1 Team RG. Jelajahi kemitraan korporasi strategis.')

@push('styles')
<style>
.partner-hero {
    position: relative; padding-top: 130px; padding-bottom: 60px;
    background: #F8F9FA; overflow: hidden;
}
.proposal-card {
    background: #FFFFFF;
    border: 1px solid rgba(196, 229, 56, 0.08);
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.02);
    transition: all 0.3s ease;
}
.proposal-card:hover {
    border-color: rgba(196, 229, 56, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(196, 229, 56, 0.05);
}
.stat-card {
    filter: grayscale(100%);
    opacity: 0.65;
    background: #FFFFFF !important;
    border: 1px solid rgba(0,0,0,0.08) !important;
    border-radius: 0 !important;
    transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
}
.stat-card:hover {
    filter: grayscale(0%);
    opacity: 1;
    border-color: rgba(196, 229, 56, 0.35) !important;
    box-shadow: 0 15px 35px rgba(196, 229, 56, 0.06);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">

    {{-- Hero Section --}}
    <section class="partner-hero grid-bg">
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>B2B PORTAL</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">Partnership Hub</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Jadilah bagian dari perjalanan dominasi kami. Hubungkan brand Anda dengan jutaan penonton motorsport global melalui program kolaborasi strategis bernilai tinggi.
            </p>
        </div>
    </section>

    {{-- B2B Proposal / Benefits Section --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10 text-center">
                <p class="section-label mb-2">PENAWARAN KEMITRAAN</p>
                <h2 class="text-3xl font-display font-black text-pure">Kenapa Bermitra dengan M1TRG?</h2>
                <div class="cyan-line mx-auto my-3"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Point 1 --}}
                <div class="proposal-card p-6 rounded" data-reveal>
                    <div class="w-10 h-10 flex items-center justify-center bg-rgr/10 text-rgr rounded mb-4 font-mono font-bold text-lg">01</div>
                    <h3 class="font-display font-bold text-lg text-pure mb-2">Eksposur Global Masif</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Brand Anda akan terpampang di livery sasis mobil balap F1, WEC, IndyCar, dan WRC kami, menjangkau lebih dari 1.6 miliar pemirsa siaran TV global dan ratusan ribu penonton langsung di sirkuit setiap musimnya.
                    </p>
                </div>

                {{-- Point 2 --}}
                <div class="proposal-card p-6 rounded" data-reveal>
                    <div class="w-10 h-10 flex items-center justify-center bg-rgr/10 text-rgr rounded mb-4 font-mono font-bold text-lg">02</div>
                    <h3 class="font-display font-bold text-lg text-pure mb-2">Akses Paddock & Hospitality Elit</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Nikmati fasilitas eksklusif VIP Paddock Club, akses garasi pit-lane, tiket tribun eksklusif untuk klien B2B Anda, serta sesi temu-sapa (meet-and-greet) pribadi dengan jajaran pembalap utama kami di setiap etape.
                    </p>
                </div>

                {{-- Point 3 --}}
                <div class="proposal-card p-6 rounded" data-reveal>
                    <div class="w-10 h-10 flex items-center justify-center bg-rgr/10 text-rgr rounded mb-4 font-mono font-bold text-lg">03</div>
                    <h3 class="font-display font-bold text-lg text-pure mb-2">R&D Bersama & Aktivasi Digital</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Kolaborasi pengembangan teknis komponen, pengujian lapangan secara ekstrem, aktivasi pemasaran digital bersama pembalap, serta kampanye konten media sosial terintegrasi untuk mendongkrak gengsi brand Anda.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Sponsors Grid Section --}}
    <section class="py-16 border-t border-steel/20 bg-white/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-12">
                <h2 class="font-display font-bold text-xl text-pure uppercase tracking-widest flex items-center gap-3">
                    <span class="w-2 h-2 bg-rgr rounded-full"></span> Sponsor & Mitra Aktif Kami
                </h2>
                <p class="text-muted text-xs mt-1">Daftar mitra bisnis korporasi yang menyokong program logistik kompetisi dan rekayasa sasis M1TRG.</p>
            </div>

            {{-- Tier 1 --}}
            <div class="mb-12">

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @if(isset($sponsorsByTier['Title Sponsor']) && count($sponsorsByTier['Title Sponsor']) > 0)
                        @foreach($sponsorsByTier['Title Sponsor'] as $sp)
                            <div class="stat-card p-6 rounded relative overflow-hidden flex flex-col justify-between min-h-[140px]">
                                <div>
                                    <h4 class="font-display font-bold text-pure text-base mb-1">{{ $sp->name }}</h4>
                                    <p class="text-[0.68rem] text-muted leading-relaxed font-body">{{ $sp->description }}</p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-steel/10 flex justify-between items-center text-[0.62rem] text-faint">
                                    <span>TITLE SPONSOR</span>
                                    <a href="{{ $sp->website_url }}" target="_blank" class="hover:text-rgr">&rarr; Website</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-xs text-faint">Belum ada sponsor utama terdaftar.</p>
                    @endif
                </div>
            </div>

            {{-- Tier 2 --}}
            <div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $tech = collect($sponsorsByTier['Technical Partner'] ?? []);
                        $supp = collect($sponsorsByTier['Official Supplier'] ?? []);
                        $tier2 = $tech->merge($supp);
                    @endphp
                    @if(count($tier2) > 0)
                        @foreach($tier2 as $sp)
                            <div class="stat-card p-6 rounded relative overflow-hidden flex flex-col justify-between min-h-[140px]">
                                <div>
                                    <h4 class="font-display font-bold text-pure text-sm mb-1">{{ $sp->name }}</h4>
                                    <p class="text-[0.68rem] text-muted leading-relaxed font-body">{{ $sp->description }}</p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-steel/10 flex justify-between items-center text-[0.62rem] text-faint">
                                    <span class="uppercase">{{ str_replace('_', ' ', $sp->tier) }}</span>
                                    <a href="{{ $sp->website_url }}" target="_blank" class="hover:text-rgr">&rarr; Website</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-xs text-faint">Belum ada mitra teknis terdaftar.</p>
                    @endif
                </div>
            </div>

        </div>
    </section>

    {{-- Contact Section for B2B --}}
    <section class="py-16 border-t border-steel/20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h3 class="font-display font-bold text-2xl text-pure mb-2">Ingin Bergabung sebagai Sponsor?</h3>
            <p class="text-xs text-muted max-w-md mx-auto leading-relaxed mb-6">
                Unduh proposal kemitraan resmi musim 2026 atau jadwalkan pertemuan pribadi dengan manajer komersial B2B kami.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="#" class="btn-rgr text-xs px-6 py-2.5 font-semibold" style="background:#96B81C; border-color:#96B81C; border-radius:0;">Mari Menjadi Bagian dari Sejarah Paddock Kami. Unduh Dokumen Kemitraan.</a>
                <a href="mailto:b2b@mobil1teamrg.co.id" class="border border-steel/30 text-pure text-xs px-6 py-2.5 hover:bg-white/5 transition-colors" style="border-radius:0;">Hubungi Kami</a>
            </div>
        </div>
    </section>

</div>
@endsection
