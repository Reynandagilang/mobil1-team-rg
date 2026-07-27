@extends('layouts.rgr-premium')

@section('title', 'Pusat Media & Siaran Pers — Mobil 1 Team RG')
@section('meta_description', 'Akses unduhan siaran pers resmi, foto resolusi tinggi, dan informasi kontak media tim Mobil 1 Team RG.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg">
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>MEDIA HUB</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4 font-black">MEDIA CENTRE</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Akses cepat bagi jurnalis untuk memperoleh aset digital resmi, logo tim, siaran pers kejuaraan, dan informasi kontak koordinator hubungan media.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8 mb-12">
        {{-- Press Inquiries --}}
        <div class="rgr-card p-8 rounded" data-reveal>
            <h3 class="font-display font-bold text-xl text-pure mb-4">Layanan Siaran Pers</h3>
            <p class="text-xs text-muted leading-relaxed font-body mb-6">
                Kami menyediakan pembaruan berkala mengenai jalannya musim kompetisi F1, ketahanan Le Mans, serta reli dunia kepada jurnalis terdaftar. Hubungi kami untuk konpers eksklusif.
            </p>
            <div class="flex gap-4">
                <a href="{{ route('about.news') }}" class="btn-rgr text-xs">Lihat Rilis Berita</a>
            </div>
        </div>

        {{-- Contact Card --}}
        <div class="rgr-card p-8 rounded" data-reveal>
            <h3 class="font-display font-bold text-xl text-pure mb-4">Hubungan Media & Humas</h3>
            <p class="text-xs text-muted leading-relaxed font-body mb-4">
                Pertanyaan wawancara eksklusif, pengajuan akreditasi sirkuit, dan permintaan konpers tim dapat dialamatkan langsung ke:
            </p>
            <div class="space-y-2 text-xs">
                <p class="text-pure">Surel: <span class="text-rgr">media@mobil1teamrg.co.id</span></p>
                <p class="text-pure">Telepon: <span class="text-rgr">+62 21 8899 7766</span></p>
                <p class="text-muted">Office: Area Paddock Sirkuit Internasional Sentul, Bogor, Indonesia.</p>
            </div>
        </div>
    </div>

    {{-- Password Protected Media Kit Area --}}
    <div class="max-w-7xl mx-auto px-6">
        <div class="rgr-card p-8 rounded" 
             x-data="{ 
                 password: '', 
                 unlocked: false, 
                 errorMsg: '', 
                 checkPassword() {
                     if (this.password === 'M1TRG2026') {
                         this.unlocked = true;
                         this.errorMsg = '';
                     } else {
                         this.errorMsg = 'Password salah! Hubungi Media Relations untuk mendapatkan akses.';
                         this.unlocked = false;
                     }
                 }
             }" data-reveal>
            
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8">
                
                {{-- Form area --}}
                <div class="max-w-xl space-y-4">
                    <span class="px-2.5 py-0.5 text-[0.58rem] font-display font-bold tracking-widest text-rgr bg-rgr/10 border border-rgr/20 rounded uppercase">
                        SECURE LOGISTICS
                    </span>
                    <h3 class="font-display font-black text-2xl text-pure">Media Kit Download Area</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Halaman ini dilindungi kata sandi khusus untuk jurnalis terakreditasi FIA / IMI. Dapatkan dokumen rilis livery sasis resmi, foto resolusi tinggi pembalap, dan panduan brand.
                    </p>
                    
                    {{-- Lock Status --}}
                    <div x-show="!unlocked" class="space-y-3 pt-2">
                        <div class="flex flex-wrap gap-3 items-center">
                            <input type="password" 
                                   x-model="password" 
                                   @keydown.enter="checkPassword()"
                                   placeholder="Masukkan Password Media..." 
                                   class="bg-pitch border border-steel/60 text-pure text-xs px-4 py-2.5 rounded focus:outline-none focus:border-rgr w-64">
                            <button @click="checkPassword()" 
                                    class="btn-rgr text-xs py-2.5">
                                Buka Akses
                            </button>
                        </div>
                        <p class="text-[0.68rem] text-muted italic">Password default untuk demonstrasi: <strong class="text-rgr">M1TRG2026</strong></p>
                        <p x-show="errorMsg" x-text="errorMsg" class="text-xs text-rgr font-semibold mt-1"></p>
                    </div>
                </div>

                {{-- Download Area (Hidden until unlocked) --}}
                <div class="lg:w-[450px] shrink-0 w-full" x-show="unlocked" x-transition>
                    <div class="bg-emerald-500/10 border border-emerald-500/20 p-5 rounded space-y-4">
                        <div class="flex items-center gap-2 text-emerald-600 text-xs font-bold uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            Akses Terbuka
                        </div>
                        
                        <div class="space-y-2.5">
                            <a href="#" class="flex items-center justify-between p-3 bg-carbon-2 border border-steel/30 rounded text-xs text-pure hover:bg-carbon-3 transition-colors">
                                <span>Livery Mobil Balap 2026 (Hi-Res PNG)</span>
                                <span class="text-rgr font-bold">&darr; 42 MB</span>
                            </a>
                            <a href="#" class="flex items-center justify-between p-3 bg-carbon-2 border border-steel/30 rounded text-xs text-pure hover:bg-carbon-3 transition-colors">
                                <span>Roster & Biografi Pembalap (PDF)</span>
                                <span class="text-rgr font-bold">&darr; 8.4 MB</span>
                            </a>
                            <a href="#" class="flex items-center justify-between p-3 bg-carbon-2 border border-steel/30 rounded text-xs text-pure hover:bg-carbon-3 transition-colors">
                                <span>Kit Logo Resmi Mobil 1 Team RG (SVG/EPS)</span>
                                <span class="text-rgr font-bold">&darr; 15.6 MB</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
