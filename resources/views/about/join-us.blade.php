@extends('layouts.rgr-premium')

@section('title', 'Bergabung Bersama Tim | Mobil 1 Team RG')
@section('meta_description', 'Buka karir motorsport impian Anda. Temukan lowongan insinyur aerodinamika, mekanik pit-stop, dan staf operasional RGR.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg">
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <p class="section-label mb-2">ABOUT US</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">JOIN OUR TEAM</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Membangun masa depan motorsport bersama. Mobil 1 Team RG membuka kesempatan karir bagi talenta terbaik dunia untuk bergabung dalam divisi teknik dan operasional balap.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8">
        <div class="rgr-card p-8 flex flex-col justify-between" data-reveal>
            <div>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">DIVISI TEKNIK & AERODINAMIKA</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3 mt-1">Senior CFD Aerodynamicist</h3>
                <p class="text-xs text-muted leading-relaxed font-body mb-6">
                    Menganalisis dan mengoptimalkan aliran udara sasis Venturi ground-effect menggunakan superkomputer simulasi tingkat lanjut di markas tim M1TRG Jakarta.
                </p>
            </div>
            <button class="btn-rgr text-xs w-fit">LAMAR SEKARANG</button>
        </div>

        <div class="rgr-card p-8 flex flex-col justify-between" data-reveal>
            <div>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">DIVISI DATA & TELEMETRI</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3 mt-1">Race Systems Software Engineer</h3>
                <p class="text-xs text-muted leading-relaxed font-body mb-6">
                    Merancang, menguji, dan memelihara infrastruktur telemetri real-time 5G antara pit-wall sirkuit dengan ruang kontrol teknik pusat RGR.
                </p>
            </div>
            <button class="btn-rgr text-xs w-fit">LAMAR SEKARANG</button>
        </div>

        <div class="rgr-card p-8 flex flex-col justify-between" data-reveal>
            <div>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">DIVISI OPERASIONAL BALAP</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3 mt-1">Kru Mekanik Pit-Stop</h3>
                <p class="text-xs text-muted leading-relaxed font-body mb-6">
                    Bertanggung jawab atas presisi pengerjaan penggantian ban, dongkrak mobil, dan penyesuaian sudut sayap depan di sirkuit dalam target waktu di bawah 2.0 detik.
                </p>
            </div>
            <button class="btn-rgr text-xs w-fit">LAMAR SEKARANG</button>
        </div>

        <div class="rgr-card p-8 flex flex-col justify-between" data-reveal>
            <div>
                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">DIVISI HUMAS & PEMASARAN</span>
                <h3 class="font-display font-bold text-xl text-pure mb-3 mt-1">Koordinator Hubungan Fans & VIP Paddock</h3>
                <p class="text-xs text-muted leading-relaxed font-body mb-6">
                    Mengelola kampanye keterlibatan komunitas pendukung global, meluncurkan buletin majalah digital, dan mengoordinasikan layanan VIP Paddock Club di lokasi sirkuit.
                </p>
            </div>
            <button class="btn-rgr text-xs w-fit">LAMAR SEKARANG</button>
        </div>
    </div>
</div>
@endsection
