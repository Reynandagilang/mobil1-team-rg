@extends('layouts.rgr-premium')

@section('title', 'F1 Paddock Club — Tiket Eksklusif')
@section('meta_description', 'Pesan tiket resmi F1 Paddock Club bersama Mobil 1 Team RG. Nikmati layanan VIP, katering bintang lima, dan tur pit-lane eksklusif.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg" x-data="{ ticketCount: 1, ticketTier: 'paddock', purchased: false }">

    {{-- Hero Paddock Header --}}
    <div class="max-w-7xl mx-auto px-6 mb-16 text-center">
        <p class="section-label mb-2">EXPERIENCE MOTORSPORT AT THE PINNACLE</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">F1 PADDOCK CLUB</h1>
        <div class="cyan-line my-4 max-w-lg mx-auto"></div>
        <p class="text-muted text-sm max-w-2xl mx-auto leading-relaxed">
            Selamat datang di layanan VIP termegah di dunia balap. F1 Paddock Club menyajikan sudut pandang lintasan terbaik tepat di atas pit-lane, katering gourmet kelas dunia, serta akses langsung melihat garasi jet darat Mobil 1 Team RG.
        </p>
    </div>

    {{-- 2-Column Complex Layout --}}
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-12 gap-8 items-start">
        
        {{-- Left: Complex Privilege Info --}}
        <div class="lg:col-span-7 space-y-6">
            <h2 class="font-display font-black text-2xl text-pure mb-6 flex items-center gap-3">
                <span class="w-6 h-px bg-rgr"></span> LAYANAN VIP EKSKLUSIF
            </h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="rgr-card p-6" data-reveal>
                    <div class="text-rgr mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-base text-pure mb-2">Pit Lane Walk & Garage Tour</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Berjalan langsung di pit-lane saat mobil-mobil dipersiapkan dan nikmati tur eksklusif ke dalam garasi pit Mobil 1 Team RG yang dipandu oleh engineer utama tim.
                    </p>
                </div>

                <div class="rgr-card p-6" data-reveal>
                    <div class="text-rgr mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 3v18M3 12h18"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-base text-pure mb-2">Sudut Pandang Grid Terdepan</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Menikmati panorama lintasan utama dari teras VIP berpendingin udara tepat di atas garis start/finis sirkuit F1 global pilihan Anda.
                    </p>
                </div>

                <div class="rgr-card p-6" data-reveal>
                    <div class="text-rgr mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-base text-pure mb-2">Katering Bintang Lima</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Sajian kuliner mewah yang disiapkan khusus oleh chef internasional terkemuka, dilengkapi bar anggur terbuka terbaik sepanjang akhir pekan.
                    </p>
                </div>

                <div class="rgr-card p-6" data-reveal>
                    <div class="text-rgr mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-base text-pure mb-2">Wawancara Eksklusif Driver</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        Dengarkan langsung analisis strategi pra-balap dalam sesi tanya jawab eksklusif bersama pembalap utama M1TRG Verstappen dan George Russel.
                    </p>
                </div>
            </div>
        </div>

        {{-- Right: High-fidelity Booking Form --}}
        <div class="lg:col-span-5 rgr-card p-8 relative overflow-hidden" data-reveal>
            <div class="absolute inset-0 bg-gradient-to-br from-rgr/05 to-transparent pointer-events-none"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-steel/20">
                    <div>
                        <p class="text-[0.62rem] font-ui tracking-widest text-rgr uppercase font-bold">VIP RESERVATION SYSTEM</p>
                        <h3 class="font-display font-bold text-lg text-pure">RESERVASI TIKET VIP</h3>
                    </div>
                    <span class="px-2 py-0.5 text-[0.55rem] font-display font-bold tracking-widest text-emerald-600 bg-emerald-500/10 rounded uppercase">
                        AKTIF
                    </span>
                </div>

                @guest
                {{-- Guest / Auth Gate State --}}
                <div class="py-8 text-center">
                    <div class="w-12 h-12 rounded-full bg-rgr/10 border border-rgr/20 flex items-center justify-center mx-auto mb-4 text-rgr">
                        🔒
                    </div>
                    <h4 class="font-display font-bold text-pure text-base">Autentikasi Diperlukan</h4>
                    <p class="text-xs text-muted font-body mt-2 leading-relaxed">
                        Anda harus masuk log atau mendaftarkan akun fans Mobil 1 Team RG terlebih dahulu untuk memesan tiket eksklusif Paddock Club VIP.
                    </p>
                    <div class="mt-6 flex flex-col gap-3">
                        <a href="{{ route('login') }}" class="btn-rgr text-xs justify-center">Masuk Akun</a>
                        <a href="{{ route('register') }}" class="btn-rgr-ghost text-xs justify-center">Daftar Akun Fans</a>
                    </div>
                </div>
                @else
                {{-- Authenticated Fans State --}}
                
                {{-- Form Body --}}
                <form action="{{ route('paddock.book') }}" method="POST" class="space-y-5" x-data="{ selectedEvent: '{{ $allRaces->first()->id ?? '' }}' }">
                    @csrf
                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">PILIH SERI BALAPAN FORMULA 1</label>
                        <select name="race_schedule_id" x-model="selectedEvent" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                            @foreach($allRaces as $race)
                                <option value="{{ $race->id }}">Formula 1 — {{ $race->grand_prix_name }} ({{ \Carbon\Carbon::parse($race->race_date)->format('d M Y') }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">PILIH PAKET VIP PADDOCK CLUB</label>
                        <select name="ticket_tier" x-model="ticketTier" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                            <option value="paddock">F1 Paddock Club Standard — Rp 8.500.000</option>
                            <option value="garage">Paddock Club Garage Experience — Rp 12.000.000</option>
                            <option value="royal">Royal Paddock Suite VIP — Rp 18.500.000</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">JUMLAH TAMPILAN TIKET</label>
                        <div class="flex items-center gap-3">
                            <button type="button" @click="ticketCount = Math.max(1, ticketCount - 1)" class="w-10 h-10 flex items-center justify-center border border-steel/60 text-pure rounded hover:border-rgr transition-colors" aria-label="Kurangi jumlah tiket">-</button>
                            <span class="font-display font-bold text-pure text-sm w-10 text-center" x-text="ticketCount">1</span>
                            <button type="button" @click="ticketCount = Math.min(10, ticketCount + 1)" class="w-10 h-10 flex items-center justify-center border border-steel/60 text-pure rounded hover:border-rgr transition-colors" aria-label="Tambah jumlah tiket">+</button>
                            <input type="hidden" name="quantity" :value="ticketCount">
                        </div>
                    </div>

                    {{-- Form Personal Data --}}
                    <div class="space-y-3 pt-2">
                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">Nama Pemegang Tiket</label>
                            <input type="text" value="{{ Auth::user()->name }}" class="w-full bg-pitch border border-steel/60 p-2.5 text-xs text-pure rounded focus:outline-none focus:border-rgr transition-colors" readonly />
                        </div>
                        <div>
                            <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">Email Terdaftar</label>
                            <input type="email" value="{{ Auth::user()->email }}" class="w-full bg-pitch border border-steel/60 p-2.5 text-xs text-pure rounded focus:outline-none focus:border-rgr transition-colors" readonly />
                        </div>
                    </div>

                    {{-- Invoice Footer --}}
                    <div class="pt-6 border-t border-steel/20 mt-6">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-[0.55rem] font-ui text-faint tracking-wider uppercase">ESTIMASI TOTAL HARGA</p>
                                <p class="font-display font-bold text-rgr text-xl mt-0.5">
                                    <span x-text="ticketTier === 'paddock' ? 'Rp ' + (8500000 * ticketCount).toLocaleString('id-ID') : (ticketTier === 'garage' ? 'Rp ' + (12000000 * ticketCount).toLocaleString('id-ID') : 'Rp ' + (18500000 * ticketCount).toLocaleString('id-ID'))"></span>
                                </p>
                            </div>
                            <button type="submit" class="btn-rgr text-xs">Konfirmasi & Reservasi</button>
                        </div>
                    </div>
                </form>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection
