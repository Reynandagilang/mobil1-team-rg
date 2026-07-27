@extends('layouts.rgr-premium')

@section('title', 'Prestasi & Statistik Tim — Mobil 1 Team RG')
@section('meta_description', 'Papan statistik utama prestasi karir dan tabel garis waktu hasil balapan Mobil 1 Team RG.')

@push('styles')
<style>
.achieve-hero {
    position: relative; padding-top: 130px; padding-bottom: 50px;
    background: #F8F9FA; overflow: hidden;
}
.stat-card {
    background: #FFFFFF;
    border: 1px solid rgba(196, 229, 56, 0.08);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
    transition: all 0.3s ease;
}
.stat-card:hover {
    border-color: rgba(196, 229, 56, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(196, 229, 56, 0.05);
}
.timeline-table {
    width: 100%; border-collapse: collapse; text-align: left;
}
.timeline-table th {
    padding: 1rem; background: rgba(196, 229, 56, 0.02);
    border-bottom: 2px solid rgba(196, 229, 56, 0.08);
    font-family: 'Outfit', sans-serif; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.1em;
}
.timeline-table td {
    padding: 1.25rem 1rem; border-bottom: 1px solid rgba(0, 0, 0, 0.04);
}
.timeline-row:hover {
    background: rgba(196, 229, 56, 0.01);
}
.badge-p1 {
    background: #FFFBEB; color: #D97706; border: 1px solid #FDE68A;
}
.badge-p2 {
    background: #F3F4F6; color: #4B5563; border: 1px solid #E5E7EB;
}
.badge-p3 {
    background: #FFF7ED; color: #C2410C; border: 1px solid #FFEDD5;
}
.badge-title {
    font-size: 0.58rem; font-weight: 800; font-family: 'Outfit', sans-serif; letter-spacing: 0.05em;
    padding: 0.25rem 0.5rem; border-radius: 3px; display: inline-block;
}
.badge-dnf {
    background: #FEE2E2; color: #EF4444; border: 1px solid #FCA5A5;
}
.badge-mid {
    background: #EFF6FF; color: #3B82F6; border: 1px solid #93C5FD;
}
.badge-last {
    background: #F3F4F6; color: #374151; border: 1px solid #D1D5DB;
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">

    {{-- Hero Section --}}
    <section class="achieve-hero grid-bg">
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>PERFORMANCE HUB</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">Prestasi & Statistik</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Catatan komprehensif pencapaian karir Mobil 1 Team RG sepanjang sejarah kejuaraan motorsport internasional dan nasional.
            </p>
        </div>
    </section>

    {{-- Papan Statistik Utama (Career Highlights Dashboard) --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <h2 class="font-display font-bold text-xl text-pure uppercase tracking-widest flex items-center gap-3">
                    <span class="w-2 h-2 bg-rgr rounded-full"></span> Papan Statistik Utama
                </h2>
                <p class="text-muted text-xs mt-1">Infografis akumulasi seluruh data balapan resmi M1TRG.</p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Card 1: Race Starts --}}
                <div class="stat-card p-8 rounded text-center relative overflow-hidden" data-reveal>
                    <div class="absolute -right-6 -bottom-6 text-faint opacity-10 font-display font-black text-7xl select-none">ST</div>
                    <span class="text-xs text-muted font-ui tracking-wider block uppercase mb-2">Total Balapan</span>
                    <span class="font-display font-black text-4xl lg:text-5xl text-pure tracking-tight">480</span>
                    <span class="text-[0.62rem] text-rgr font-ui font-semibold block mt-2">starts across 7 divisions</span>
                </div>

                {{-- Card 2: Wins --}}
                <div class="stat-card p-8 rounded text-center relative overflow-hidden" data-reveal>
                    <div class="absolute -right-6 -bottom-6 text-faint opacity-10 font-display font-black text-7xl select-none">P1</div>
                    <span class="text-xs text-muted font-ui tracking-wider block uppercase mb-2">Podium Utama (P1)</span>
                    <span class="font-display font-black text-4xl lg:text-5xl text-amber-500 tracking-tight">102</span>
                    <span class="text-[0.62rem] text-amber-600 font-ui font-semibold block mt-2">victory / first place finishes</span>
                </div>

                {{-- Card 3: Total Podiums --}}
                <div class="stat-card p-8 rounded text-center relative overflow-hidden" data-reveal>
                    <div class="absolute -right-6 -bottom-6 text-faint opacity-10 font-display font-black text-7xl select-none">POD</div>
                    <span class="text-xs text-muted font-ui tracking-wider block uppercase mb-2">Total Podium</span>
                    <span class="font-display font-black text-4xl lg:text-5xl text-pure tracking-tight">258</span>
                    <span class="text-[0.62rem] text-muted font-ui font-semibold block mt-2">P1, P2, and P3 finishes</span>
                </div>

                {{-- Card 4: Poles --}}
                <div class="stat-card p-8 rounded text-center relative overflow-hidden" data-reveal>
                    <div class="absolute -right-6 -bottom-6 text-faint opacity-10 font-display font-black text-7xl select-none">PP</div>
                    <span class="text-xs text-muted font-ui tracking-wider block uppercase mb-2">Pole Position</span>
                    <span class="font-display font-black text-4xl lg:text-5xl text-rgr tracking-tight">76</span>
                    <span class="text-[0.62rem] text-rgr font-ui font-semibold block mt-2">fastest qualifying times</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Tabel Garis Waktu (Race Results Timeline) --}}
    <section class="py-16 border-t border-steel/20 bg-white/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <h2 class="font-display font-bold text-xl text-pure uppercase tracking-widest flex items-center gap-3">
                    <span class="w-2 h-2 bg-rgr rounded-full"></span> Garis Waktu Prestasi Balap
                </h2>
                <p class="text-muted text-xs mt-1">Rekam jejak podium dan hasil akhir kejuaraan diurutkan mundur dari musim terbaru.</p>
            </div>

            <div class="rgr-card overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="timeline-table">
                        <thead>
                            <tr>
                                <th>Tahun/Musim</th>
                                <th>Kejuaraan & Seri</th>
                                <th>Hasil Akhir</th>
                                <th>Pembalap</th>
                            </tr>
                        </thead>
                        <tbody class="text-xs text-muted">
                            
                            {{-- 2026 Spa GP (First Position) --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2026</td>
                                <td>
                                    <span class="text-pure block font-medium">FIA Formula 1 World Championship</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 12 - GP Spa-Francorchamps</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Podium Utama & Lap Tercepat</span>
                                </td>
                                <td class="font-medium text-pure">Enzo Valentini</td>
                            </tr>

                            {{-- 2026 Barcelona GP (Middle Position) --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2026</td>
                                <td>
                                    <span class="text-pure block font-medium">FIA Formula 1 World Championship</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 5 - GP Catalunya</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-mid">Posisi Tengah (P10)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Finis Zona Poin Menengah</span>
                                </td>
                                <td class="font-medium text-pure">Oscar Piastri</td>
                            </tr>

                            {{-- 2026 WEC Imola (DNF) --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2026</td>
                                <td>
                                    <span class="text-pure block font-medium">FIA World Endurance Championship (WEC)</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 2 - 6 Hours of Imola</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-dnf">DNF (Mesin Rusak)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Sistem Hybrid MGU-K Mengalami Overheat</span>
                                </td>
                                <td class="font-medium text-pure">Sofia Hartmann</td>
                            </tr>

                            {{-- 2026 IndyCar Barber (Last Position) --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2026</td>
                                <td>
                                    <span class="text-pure block font-medium">NTT IndyCar Series</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 4 - GP Barber Motorsports Park</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-last">Posisi Terakhir (P27)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Insiden Tabrakan Sayap Depan Rusak</span>
                                </td>
                                <td class="font-medium text-pure">David Malukas</td>
                            </tr>

                            {{-- 2026 Monaco GP --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2026</td>
                                <td>
                                    <span class="text-pure block font-medium">FIA Formula 1 World Championship</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 6 - GP Monaco</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Pole Position & Pemenang Balapan</span>
                                </td>
                                <td class="font-medium text-pure">Enzo Valentini</td>
                            </tr>

                            {{-- 2026 Spa 24H --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2026</td>
                                <td>
                                    <span class="text-pure block font-medium">FIA World Endurance Championship (WEC)</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 3 - 24 Hours of Spa</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Overall Winner (Hypercar)</span>
                                </td>
                                <td class="font-medium text-pure">Sofia Hartmann / Marco Pietrini</td>
                            </tr>

                            {{-- 2026 The Glen --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2026</td>
                                <td>
                                    <span class="text-pure block font-medium">IMSA WeatherTech SportsCar Championship</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 4 - 6 Hours of The Glen</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">GTP Class Winner</span>
                                </td>
                                <td class="font-medium text-pure">Marcus Ericsson / Yuki Endo</td>
                            </tr>

                            {{-- 2025 Indy 500 --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2025</td>
                                <td>
                                    <span class="text-pure block font-medium">NTT IndyCar Series</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 6 - Indianapolis 500</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Indy 500 Winner</span>
                                </td>
                                <td class="font-medium text-pure">Pato O'Ward</td>
                            </tr>

                            {{-- 2025 ISSOM Sentul --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2025</td>
                                <td>
                                    <span class="text-pure block font-medium">Kejurnas ISSOM (Indonesia Super Touring)</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 4 - Sirkuit Internasional Sentul</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Kelas ITCR 1500 Pro</span>
                                </td>
                                <td class="font-medium text-pure">Rey Gilang</td>
                            </tr>

                            {{-- 2025 Mandalika MRS --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2025</td>
                                <td>
                                    <span class="text-pure block font-medium">Mandalika Racing Series (MRS)</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 3 - Pertamina Mandalika Circuit</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Pole Position & Lap Tercepat</span>
                                </td>
                                <td class="font-medium text-pure">Rey Gilang</td>
                            </tr>

                            {{-- 2024 Le Mans --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2024</td>
                                <td>
                                    <span class="text-pure block font-medium">FIA World Endurance Championship (WEC)</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 4 - 24 Hours of Le Mans</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">World Champion Constructor Title</span>
                                </td>
                                <td class="font-medium text-pure">Sofia Hartmann / Yuki Endo</td>
                            </tr>

                            {{-- 2024 Nurburgring 24H --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2024</td>
                                <td>
                                    <span class="text-pure block font-medium">ADAC TOTAL 24h Nürburgring</span>
                                    <span class="text-[0.68rem] text-faint">SP9 Class - Nordschleife</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p3">Juara 3 (P3)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Podium Finish on SP9</span>
                                </td>
                                <td class="font-medium text-pure">Marco Pietrini</td>
                            </tr>

                            {{-- 2023 WEC LMP2 --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2023</td>
                                <td>
                                    <span class="text-pure block font-medium">FIA WEC LMP2 Division</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 5 - Spa 6 Hours</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">LMP2 Class Winner</span>
                                </td>
                                <td class="font-medium text-pure">Sofia Hartmann</td>
                            </tr>

                            {{-- 2022 ISSOM Sentul --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2022</td>
                                <td>
                                    <span class="text-pure block font-medium">Kejurnas ISSOM Touring Car</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 2 - Sirkuit Sentul</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p2">Juara 2 (P2)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">ITCR 1500 Class</span>
                                </td>
                                <td class="font-medium text-pure">Rey Gilang</td>
                            </tr>

                            {{-- 2021 WEC Spa --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2021</td>
                                <td>
                                    <span class="text-pure block font-medium">FIA World Endurance Championship (WEC)</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 1 - 6 Hours of Spa</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">LMP2 Debut Class Winner</span>
                                </td>
                                <td class="font-medium text-pure">Sofia Hartmann</td>
                            </tr>

                            {{-- 2020 Le Mans Virtual --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2020</td>
                                <td>
                                    <span class="text-pure block font-medium">24 Hours of Le Mans Virtual (E-Sports)</span>
                                    <span class="text-[0.68rem] text-faint">Kejuaraan Ketahanan Sim-Racing Global</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Virtual Endurance Champion</span>
                                </td>
                                <td class="font-medium text-pure">Enzo Valentini / George Russell</td>
                            </tr>

                            {{-- 2020 ISSOM Sentul --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2020</td>
                                <td>
                                    <span class="text-pure block font-medium">Kejurnas ISSOM Touring Car</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 3 - Sirkuit Sentul</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Kelas ITCR 1500 Pro</span>
                                </td>
                                <td class="font-medium text-pure">Rey Gilang</td>
                            </tr>

                            {{-- 2019 Gokart Sentul --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2019</td>
                                <td>
                                    <span class="text-pure block font-medium">Kejurnas Gokart Etape 4</span>
                                    <span class="text-[0.68rem] text-faint">Sirkuit Sentul Karting</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p1">Juara 1 (P1)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Kelas Senior Max</span>
                                </td>
                                <td class="font-medium text-pure">Rey Gilang</td>
                            </tr>

                            {{-- 2018 MRS Mandalika --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2018</td>
                                <td>
                                    <span class="text-pure block font-medium">Mandalika Racing Series (MRS)</span>
                                    <span class="text-[0.68rem] text-faint">Putaran 1 - Sirkuit Mandalika</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p3">Juara 3 (P3)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Kelas Underbone 150</span>
                                </td>
                                <td class="font-medium text-pure">Rey Gilang</td>
                            </tr>

                            {{-- 2018 Gokart Sentul --}}
                            <tr class="timeline-row">
                                <td class="font-display font-bold text-pure text-sm">2018</td>
                                <td>
                                    <span class="text-pure block font-medium">Kejurnas Gokart Etape 1</span>
                                    <span class="text-[0.68rem] text-faint">Sirkuit Sentul Karting</span>
                                </td>
                                <td>
                                    <span class="badge-title badge-p2">Juara 2 (P2)</span>
                                    <span class="text-[0.68rem] block text-faint mt-1">Kelas Senior Max</span>
                                </td>
                                <td class="font-medium text-pure">Rey Gilang</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
