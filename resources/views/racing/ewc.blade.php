@extends('layouts.rgr-premium')

@section('title', 'FIM Endurance World Championship (EWC) — Mobil 1 Team RG')
@section('meta_description', 'Mobil 1 Team RG Divisi FIM EWC. Kejuaraan dunia balap ketahanan motor legendaris menggunakan Yamaha YZF-R1.')

@push('styles')
<style>
.ewc-hero {
    position: relative; padding-top: 130px; padding-bottom: 60px;
    background: #0B0D10; overflow: hidden;
}
.ewc-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(196, 229, 56, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(196, 229, 56, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.ewc-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(196, 229, 56, 0.08);
    position: relative; overflow: hidden;
    transition: all 0.4s ease;
}
.ewc-card:hover {
    border-color: rgba(196, 229, 56, 0.2);
    transform: translateY(-4px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.06);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch">
    
    {{-- Hero Section --}}
    <section class="ewc-hero">
        <div class="ewc-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-3 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>FIM EWC DIVISION</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">FIM Endurance World Championship</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Tantangan ketahanan fisik ekstrem 24 jam di atas roda dua. Mobil 1 Team RG menurunkan motor Yamaha YZF-R1 berspesifikasi pabrikan terbaik untuk menaklukkan Le Mans, Spa, dan Bol d'Or.
            </p>
        </div>
    </section>

    {{-- Format & Sirkuit --}}
    <section class="py-12 border-b border-steel/15 bg-white/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="md:col-span-1 ewc-card p-6 border-l-4 border-rgr">
                    <span class="text-[0.62rem] font-ui tracking-widest text-rgr font-bold uppercase">FORMAT DIVISI MOTOR</span>
                    <h3 class="font-display font-bold text-xl text-pure mt-1 mb-3">Balap Ketahanan 24 Jam</h3>
                    <p class="text-xs text-muted leading-relaxed font-body">
                        FIM EWC menguji batas absolut manusia dan mesin. Tiga pembalap bergantian mengendarai satu motor sepanjang 24 jam tanpa henti, menghadapi transisi cuaca malam hari, kelelahan fisik, dan kecepatan pit stop krusial.
                    </p>
                </div>
                
                <div class="md:col-span-2 space-y-4">
                    <span class="text-[0.62rem] font-ui tracking-widest text-muted font-bold uppercase">SIRKUIT UTAMA KALENDER</span>
                    <h3 class="font-display font-bold text-2xl text-pure">Arena EWC Terkejam</h3>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Le Mans Bugatti (Prancis)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Tuan rumah dari 24 Heures Motos, balapan pembuka yang dingin dan menuntut ketahanan rem maksimal.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Circuit de Spa-Francorchamps (Belgia)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Balapan 24 jam legendaris dengan trek super cepat dan perubahan cuaca Ardennes yang sangat sulit diprediksi.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Suzuka Circuit (Jepang)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Suzuka 8 Hours yang legendaris, menguji ketahanan rider di bawah panas lembab musim panas Jepang.</p>
                        </div>
                        <div class="bg-carbon/40 p-4 border border-steel/10 rounded">
                            <h4 class="text-xs font-bold text-pure">Paul Ricard (Prancis)</h4>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Bol d'Or 24 Hours dengan trek lurus Mistral sepanjang 1.8 km yang menyiksa mesin di rpm maksimal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Lineup Pembalap & Motor --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <h2 class="font-display font-bold text-2xl text-pure">Roster Riders & Yamaha YZF-R1</h2>
                <div class="cyan-line my-3"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Motor Specs Card --}}
                <div class="ewc-card p-6 flex flex-col justify-between lg:col-span-1">
                    <div>
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <span class="px-2.5 py-0.5 text-[0.62rem] font-display font-bold tracking-widest text-rgr bg-rgr/10 rounded uppercase">
                                    FORMULA EWC · #7
                                </span>
                                <h3 class="font-display font-bold text-2xl text-pure mt-3">Yamaha YZF-R1</h3>
                            </div>
                            <span class="font-display font-black text-4xl text-rgr">#7</span>
                        </div>
                        <p class="text-xs text-muted mb-6">Mesin: 998cc Crossplane CP4 Inline-4 · Tenaga: 220 HP · Sasis: Aluminium Deltabox · Ban: Bridgestone EWC Spec.</p>
                        
                        <div class="pt-4 border-t border-steel/20 text-xs">
                            <p class="font-bold text-pure">Spesifikasi Aero:</p>
                            <p class="text-[0.68rem] text-muted mt-1 leading-relaxed">Bodi serat karbon ringan dengan winglets aerodinamika depan untuk meminimalkan wheelie dan menjaga stabilitas traksi roda depan di kecepatan 300+ km/jam.</p>
                        </div>
                    </div>
                    <div class="border-t border-steel/20 pt-4 mt-6 text-center text-xs font-mono flex justify-around">
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Bobot</p>
                            <p class="font-display font-bold text-pure mt-1">168 kg</p>
                        </div>
                        <div>
                            <p class="text-faint text-[0.6rem] uppercase tracking-widest">Kapasitas</p>
                            <p class="font-display font-bold text-pure mt-1">24 Liter</p>
                        </div>
                    </div>
                </div>

                {{-- Riders List --}}
                <div class="lg:col-span-2 space-y-6">
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach($riders as $rider)
                        <div class="ewc-card p-6 flex flex-col justify-between" style="border-radius: 0 !important;">
                            <div>
                                <span class="text-xs text-rgr font-ui font-bold tracking-widest uppercase block mb-1">RACE RIDER</span>
                                <h3 class="font-display font-bold text-lg text-pure mb-2">{{ $rider->name }}</h3>
                                <p class="text-[0.68rem] text-muted font-ui mb-4">{{ $rider->country }} (#{{ $rider->permanent_number }})</p>
                                <p class="text-xs text-muted leading-relaxed font-body mb-4">{{ $rider->bio }}</p>
                            </div>
                            <div class="border-t border-steel/10 pt-3 text-[0.65rem] font-mono text-muted">
                                <div>Best Lap: <span class="text-pure font-bold">1:34.850</span></div>
                                <div>Lisensi: <span class="text-rgr font-bold">FIA Gold</span></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
