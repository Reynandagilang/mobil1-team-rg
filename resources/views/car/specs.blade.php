@extends('layouts.rgr-premium')

@section('title', 'Armada Balap — Spesifikasi Teknis Fleet RGR')
@section('meta_description', 'Spesifikasi teknis lengkap untuk armada multi-disiplin Mobil 1 Team RG: Mesin F1, Hypercar, Prototipe Hibrida, GT3, dan GTP.')

@push('styles')
<style>
/* ── Car Specs Hero ────────────────────────────────────────────── */
.car-hero {
    position: relative; min-height: 65vh;
    display: flex; align-items: flex-end;
    overflow: hidden; background: #0F181A;
    padding-bottom: 80px;
}
.car-hero-grid {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(196,229,56,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(196,229,56,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
}
.car-hero-glow {
    position: absolute; top: 20%; left: 50%;
    transform: translateX(-50%);
    width: 900px; height: 450px;
    background: radial-gradient(ellipse, rgba(196,229,56,0.06) 0%, transparent 65%);
    pointer-events: none;
}
.scan-line {
    position: absolute; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, transparent, rgba(196,229,56,0.25), transparent);
    animation: sScan 5s linear infinite; pointer-events: none;
}
@keyframes sScan { 0%{top:-2px} 100%{top:100%} }

/* ── Tabs ──────────────────────────────────────────────────────── */
.cat-tab {
    position: relative;
    font-family: 'Rajdhani', sans-serif;
    font-weight: 700; font-size: 0.78rem;
    letter-spacing: 0.15em; text-transform: uppercase;
    padding: 0.65rem 1.5rem;
    border: 1px solid rgba(196,229,56,0.12);
    color: #4B5563; background: transparent;
    cursor: pointer; transition: all 0.3s ease;
    clip-path: polygon(6px 0%,100% 0%,calc(100% - 6px) 100%,0% 100%);
}
.cat-tab:hover { color: #111827; border-color: rgba(196,229,56,0.35); }
.cat-tab.active {
    color: #FFFFFF; background: #C4E538;
    border-color: #C4E538;
    box-shadow: 0 0 25px rgba(196,229,56,0.25);
}

/* ── Spec Card ─────────────────────────────────────────────────── */
.spec-card {
    position: relative; overflow: hidden;
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(196,229,56,0.08);
    transition: all 0.4s cubic-bezier(0.23,1,0.32,1);
}
.spec-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
    opacity: 0; transition: opacity 0.4s;
}
.spec-card.accent-rgr::before   { background: linear-gradient(90deg, transparent, #C4E538, transparent); opacity: 0.7; }
.spec-card.accent-hyper::before { background: linear-gradient(90deg, transparent, #CFEA5F, transparent); opacity: 0.7; }
.spec-card.accent-hybrid::before{ background: linear-gradient(90deg, transparent, #00C853, transparent); opacity: 0.7; }
.spec-card.accent-gt3::before   { background: linear-gradient(90deg, transparent, #FF6D00, transparent); opacity: 0.7; }
.spec-card.accent-gtp::before   { background: linear-gradient(90deg, transparent, #AA00FF, transparent); opacity: 0.7; }
.spec-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 25px 70px rgba(0,0,0,0.06);
}
.spec-card:hover::before { opacity: 1 !important; }

/* ── Spec Row ──────────────────────────────────────────────────── */
.spec-row {
    display: flex; justify-content: space-between; align-items: center;
    padding: 0.85rem 0;
    border-bottom: 1px solid rgba(0,0,0,0.04);
    gap: 1rem; transition: padding 0.2s;
}
.spec-row:last-child { border-bottom: none; }
.spec-key {
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.75rem; font-weight: 600;
    letter-spacing: 0.1em; text-transform: uppercase; color: #4B5563;
    flex-shrink: 0;
}
.spec-val {
    font-size: 0.875rem; font-weight: 500;
    color: #111827; text-align: right;
}
.spec-val-accent {
    font-family: 'Orbitron', sans-serif;
    font-size: 0.78rem; font-weight: 700; text-align: right;
}

/* ── Car Number Badge ──────────────────────────────────────────── */
.car-number-bg {
    position: absolute; right: -1rem; top: 50%;
    transform: translateY(-50%);
    font-family: 'Orbitron', sans-serif; font-weight: 900;
    font-size: 14rem; line-height: 1;
    opacity: 0.02; pointer-events: none; user-select: none;
}

/* ── Performance Bar ───────────────────────────────────────────── */
.perf-track {
    height: 4px; background: rgba(0,0,0,0.06);
    border-radius: 2px; overflow: hidden;
}
.perf-fill {
    height: 100%; border-radius: 2px;
    transform: translateX(-100%);
    transition: transform 1.4s cubic-bezier(0.23,1,0.32,1);
}
.perf-fill.reveal { transform: translateX(0); }

/* ── Fleet Stat Pills ──────────────────────────────────────────── */
.fleet-pill {
    padding: 1.2rem 2rem; text-align: center;
    border: 1px solid rgba(196,229,56,0.08);
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    transition: all 0.3s ease;
}
.fleet-pill:hover { border-color: rgba(196,229,56,0.22); }
.fleet-pill-val {
    font-family: 'Orbitron', sans-serif;
    font-weight: 900; font-size: 2.2rem; line-height: 1;
    color: #C4E538; text-shadow: 0 1px 2px rgba(196,229,56,0.15);
}
.fleet-pill-lbl {
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.65rem; font-weight: 700;
    letter-spacing: 0.22em; text-transform: uppercase;
    color: #4B5563; margin-top: 0.4rem;
}

/* ── Sponsor Livery Strip ──────────────────────────────────────── */
.livery-partner {
    padding: 0.75rem 1.5rem;
    border: 1px solid rgba(0,161,155,0.1);
    background: rgba(18,18,20,0.5);
    display: flex; align-items: center; justify-content: center;
    transition: all 0.3s ease;
}
.livery-partner:hover { border-color: rgba(0,161,155,0.3); background: rgba(0,161,155,0.05); }
</style>
@endpush
@section('content')

{{-- ── HERO ──────────────────────────────────────────────────────── --}}
<section class="car-hero" id="car-hero" aria-label="Hero Armada Balap">
    <div class="car-hero-grid"></div>
    <div class="car-hero-glow"></div>
    <div class="scan-line" style="opacity:0.25"></div>
    <div class="absolute left-0 top-0 bottom-0 w-[3px] hidden lg:block"
         style="background:linear-gradient(180deg,transparent,#C4E538 30%,#C4E538 70%,transparent)"></div>

    <div class="max-w-7xl mx-auto px-6 w-full pt-24">
        <div class="max-w-3xl">
            <p class="section-label mb-4 flex items-center gap-3">
                <span class="w-6 h-px bg-rgr inline-block"></span>
                Armada Multi-Disiplin · Rincian Teknis
            </p>
            <h1 class="section-title text-5xl lg:text-7xl mb-6">Mesin Balap</h1>
            <p class="text-muted text-xl leading-relaxed mb-8">
                Lima kategori. Lima kejuaraan. Sepuluh mesin balap yang dirancang hingga batas maksimal regulasi masing-masing kelas.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#fleet" class="btn-rgr" id="btn-view-fleet">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"/></svg>
                    Jelajahi Armada
                </a>
                <a href="{{ route('home') }}" class="btn-rgr-ghost" id="btn-back-home">← Kembali</a>
            </div>
        </div>
    </div>
</section>

{{-- ── FLEET STATS ────────────────────────────────────────────────── --}}
<section class="border-y border-rgr/08 py-4" id="fleet-stats" aria-label="Statistik Armada">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-rgr/08">
            <div class="fleet-pill">
                <p class="fleet-pill-val">{{ $fleetStats['total_cars'] ?? 10 }}</p>
                <p class="fleet-pill-lbl">Total Mobil</p>
            </div>
            <div class="fleet-pill">
                <p class="fleet-pill-val">{{ $fleetStats['max_hp'] ?? 1050 }}</p>
                <p class="fleet-pill-lbl">HP Maksimal</p>
            </div>
            <div class="fleet-pill">
                <p class="fleet-pill-val">{{ $fleetStats['max_speed'] ?? 372 }}</p>
                <p class="fleet-pill-lbl">Kec. Puncak km/jam</p>
            </div>
            <div class="fleet-pill">
                <p class="fleet-pill-val">{{ $fleetStats['categories'] ?? 5 }}</p>
                <p class="fleet-pill-lbl">Kategori</p>
            </div>
        </div>
    </div>
</section>

{{-- ── FLEET TABS ─────────────────────────────────────────────────── --}}
<section class="py-24 grid-bg relative" id="fleet" aria-label="Fleet Specifications">
    <div class="absolute inset-0 pointer-events-none"
         style="background:radial-gradient(ellipse at 50% 50%,rgba(196,229,56,0.02) 0%,transparent 60%)"></div>

    <div class="max-w-7xl mx-auto px-6 relative">

        <div class="text-center mb-12" data-reveal>
            <p class="section-label mb-3 flex items-center justify-center gap-3">
                <span class="w-8 h-px bg-rgr"></span>Data Teknis<span class="w-8 h-px bg-rgr"></span>
            </p>
            <h2 class="section-title text-4xl lg:text-5xl mb-4">Rincian Rekayasa</h2>
            <p class="text-muted max-w-lg mx-auto">Pilih kategori untuk melihat lembar spesifikasi teknis lengkap dari setiap mobil.</p>
        </div>

        {{-- Tab Buttons --}}
        <div class="flex flex-wrap gap-2 justify-center mb-12" id="fleet-tabs" role="tablist">
            @foreach($categories as $i => $cat)
            <button class="cat-tab {{ $i === 0 ? 'active' : '' }}"
                    id="tab-{{ strtolower($cat) }}"
                    role="tab"
                    aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                    aria-controls="panel-{{ strtolower($cat) }}"
                    data-cat="{{ $cat }}"
                    style="border-color:{{ $i === 0 ? '#00A19B' : '' }}">
                {{ $cat }}
            </button>
            @endforeach
        </div>

        {{-- Category Panels --}}
        @foreach($categories as $catKey)
        @php
            $catCars = $fleetGrouped->get($catKey, collect());
            $meta    = $categoryMeta[$catKey] ?? [];
            $color   = $meta['color'] ?? '#00A19B';
            $accentClass = match($catKey) {
                'F1'       => 'accent-rgr',
                'Hypercar' => 'accent-hyper',
                'Hybrid'   => 'accent-hybrid',
                'GT3'      => 'accent-gt3',
                'GTP'      => 'accent-gtp',
                default    => 'accent-rgr',
            };
        @endphp

        <div id="panel-{{ strtolower($catKey) }}"
             role="tabpanel"
             aria-labelledby="tab-{{ strtolower($catKey) }}"
             class="{{ $loop->first ? 'block' : 'hidden' }}"
             data-reveal>

            {{-- Category description --}}
            <div class="mb-8 p-6 border border-dashed border-faint/30 bg-carbon/40">
                <div class="flex flex-wrap items-center gap-4 mb-3">
                    <span class="font-display font-black text-2xl" style="color:{{ $color }}">{{ $catKey }}</span>
                    <span class="text-muted text-sm font-ui tracking-wide">{{ $meta['championship'] ?? '' }}</span>
                </div>
                <p class="text-muted leading-relaxed">{{ $meta['description'] ?? '' }}</p>
            </div>

            {{-- Cars Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($catCars as $car)
                <div class="spec-card {{ $accentClass }} relative" id="car-spec-{{ $car->id }}">
                    <span class="car-number-bg" style="color:rgba({{ hexdec(substr($color,1,2)) }},{{ hexdec(substr($color,3,2)) }},{{ hexdec(substr($color,5,2)) }},0.06)">{{ $car->car_number }}</span>

                    <div class="p-7 relative z-10">
                        {{-- Header --}}
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="font-display font-black text-2xl" style="color:{{ $color }}">#{{ $car->car_number }}</span>
                                    <span class="text-faint text-xs font-ui">{{ $car->category }}</span>
                                </div>
                                <h3 class="text-pure font-display font-bold text-xl leading-tight">{{ $car->model_name }}</h3>
                                @if($car->championship)
                                <p class="text-muted text-xs font-ui mt-1">{{ $car->championship }}</p>
                                @endif
                            </div>
                            @if($car->class_entry)
                            <span class="text-xs font-ui font-bold tracking-widest uppercase px-2 py-1"
                                  style="border:1px solid {{ $color }}33; color:{{ $color }}">
                                {{ $car->class_entry }}
                            </span>
                            @endif
                        </div>
                        {{-- Baris Spesifikasi --}}
                        <div class="mb-5">
                            @foreach([
                                ['label' => 'Unit Tenaga',    'val' => $car->power_unit,   'accent' => true],
                                ['label' => 'Sasis',          'val' => $car->chassis,       'accent' => false],
                                ['label' => 'Output Daya',    'val' => ($car->power_hp ? number_format($car->power_hp) . ' HP' : '—'), 'accent' => true],
                                ['label' => 'Kec. Maksimal',  'val' => ($car->top_speed ? $car->top_speed . ' km/jam' : '—'), 'accent' => true],
                                ['label' => 'Bobot',          'val' => ($car->weight ? $car->weight . ' kg' : '—'), 'accent' => false],
                                ['label' => 'Kapasitas BBM',  'val' => ($car->fuel_capacity ? $car->fuel_capacity . ' L' : '—'), 'accent' => false],
                                ['label' => 'Pemasok Ban',    'val' => ($car->tyre_supplier ?? '—'), 'accent' => false],
                            ] as $row)
                            <div class="spec-row">
                                <span class="spec-key">{{ $row['label'] }}</span>
                                <span class="{{ $row['accent'] ? 'spec-val-accent' : 'spec-val' }}"
                                      style="{{ $row['accent'] ? 'color:'.$color : '' }}">
                                    {{ $row['val'] ?? '—' }}
                                </span>
                            </div>
                            @endforeach
                        </div>

                        {{-- Bar Indikator Performa --}}
                        <div class="space-y-3 mb-5">
                            @php
                                $speedPct = $car->top_speed ? min(100, round(($car->top_speed / 380) * 100)) : 70;
                                $powerPct = $car->power_hp  ? min(100, round(($car->power_hp  / 1200) * 100)) : 70;
                            @endphp
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-muted text-xs font-ui tracking-widest uppercase">Kecepatan Puncak</span>
                                    <span class="text-xs font-display font-bold" style="color:{{ $color }}">{{ $speedPct }}%</span>
                                </div>
                                <div class="perf-track">
                                    <div class="perf-fill" data-pct="{{ $speedPct }}"
                                         style="width:{{ $speedPct }}%; background:linear-gradient(90deg,{{ $color }},rgba({{ hexdec(substr($color,1,2)) }},{{ hexdec(substr($color,3,2)) }},{{ hexdec(substr($color,5,2)) }},0.5))"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-muted text-xs font-ui tracking-widest uppercase">Keluaran Tenaga</span>
                                    <span class="text-xs font-display font-bold" style="color:{{ $color }}">{{ $powerPct }}%</span>
                                </div>
                                <div class="perf-track">
                                    <div class="perf-fill" data-pct="{{ $powerPct }}"
                                         style="width:{{ $powerPct }}%; background:linear-gradient(90deg,{{ $color }},rgba({{ hexdec(substr($color,1,2)) }},{{ hexdec(substr($color,3,2)) }},{{ hexdec(substr($color,5,2)) }},0.5))"></div>
                                </div>
                            </div>
                        </div>

                        {{-- Catatan Aerodinamika --}}
                        @if($car->aerodynamics_desc)
                        <div class="pt-4 border-t border-white/04">
                            <p class="section-label mb-2">Aerodinamika</p>
                            <p class="text-muted text-sm leading-relaxed">{{ $car->aerodynamics_desc }}</p>
                        </div>
                        @endif

                        {{-- Sponsor Livery --}}
                        @if($car->livery_sponsor)
                        <div class="mt-4 pt-4 border-t border-white/04 flex items-center gap-3">
                            <span class="text-faint text-xs font-ui uppercase tracking-widest">Sponsor Utama Livery</span>
                            <span class="font-ui font-bold text-sm tracking-widest" style="color:{{ $color }}">{{ $car->livery_sponsor }}</span>
                        </div>
                        @endif

                    </div>
                </div>
                @endforeach
            </div>

        </div>
        @endforeach        {{-- Mitra Teknis (Livery Section) --}}
        @if($technicalPartners->count() > 0)
        <div class="mt-20 pt-16 border-t border-rgr/08" data-reveal>
            <p class="section-label mb-3 text-center">Mitra Teknis pada Livery Mobil</p>
            <h3 class="section-title text-3xl text-center mb-8">Penempatan Sponsor</h3>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach($technicalPartners as $tp)
                <div class="livery-partner">
                    <span class="font-ui font-bold text-sm tracking-widest text-muted hover:text-rgr transition-colors uppercase">{{ $tp->name }}</span>
                </div>
                @endforeach
            </div>
            <p class="text-muted text-sm text-center mt-5 max-w-lg mx-auto">
                Penjenamaan mitra teknis muncul pada zona bodi mobil yang telah ditentukan di kelima kategori balap, dialokasikan sesuai dengan nilai eksposur kejuaraan.
            </p>
        </div>
        @endif
    </div>
</section>

@endsection

@push('scripts')
<script>
// ── Tab Switching ─────────────────────────────────────────────────
document.querySelectorAll('[data-cat]').forEach(btn => {
    btn.addEventListener('click', function() {
        const cat = this.getAttribute('data-cat');

        document.querySelectorAll('[data-cat]').forEach(b => {
            b.classList.remove('active');
            b.setAttribute('aria-selected', 'false');
        });
        document.querySelectorAll('[id^="panel-"]').forEach(p => {
            p.classList.add('hidden');
            p.classList.remove('block');
        });

        this.classList.add('active');
        this.setAttribute('aria-selected', 'true');
        const panel = document.getElementById('panel-' + cat.toLowerCase());
        if (panel) { panel.classList.remove('hidden'); panel.classList.add('block'); }

        // Trigger perf bar animation on newly visible panel
        panel.querySelectorAll('.perf-fill').forEach(bar => {
            bar.classList.remove('reveal');
            requestAnimationFrame(() => setTimeout(() => bar.classList.add('reveal'), 50));
        });
    });
});

// ── Performance Bar Reveal ────────────────────────────────────────
const barObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.querySelectorAll('.perf-fill').forEach(b => b.classList.add('reveal'));
            barObs.unobserve(e.target);
        }
    });
}, { threshold: 0.2 });

document.querySelectorAll('[id^="panel-"]').forEach(p => barObs.observe(p));

// Initial reveal for first panel
setTimeout(() => {
    document.querySelectorAll('#panel-f1 .perf-fill, #panel-hypercar .perf-fill').forEach(b => b.classList.add('reveal'));
}, 600);
</script>
@endpush
