@extends('layouts.rgr-premium')

@section('title', 'Line-up Pembalap 2026 | Mobil 1 Team RG')
@section('meta_description', 'Temui roster pembalap kelas dunia Mobil 1 Team RG yang berlaga di Formula 1, Le Mans 24 Jam, Spa 24 Jam, Nürburgring 24 Jam, dan IMSA.')

@section('content')
{{-- Grid Background & Spacing --}}
<div class="relative min-h-screen pt-24 pb-20 grid-bg" x-data="{ activeTab: 'ALL' }">

    {{-- Title Header --}}
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <p class="section-label mb-2">ROSTER PEMBALAP AKTIF</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">DRIVERS LINE-UP</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Kombinasi antara talenta kelas dunia, presisi teknologi tinggi, dan ambisi motorsport murni di 5 kategori balap utama global.
        </p>
    </div>

    {{-- Interactive Tab Filter (Alpine.js) --}}
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <div class="flex flex-wrap gap-2 border-b border-steel/20 pb-3">
            <button 
                @click="activeTab = 'ALL'"
                :class="activeTab === 'ALL' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                Semua Kategori
            </button>
            <button 
                @click="activeTab = 'F1'"
                :class="activeTab === 'F1' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                Formula 1
            </button>
            <button 
                @click="activeTab = 'Endurance'"
                :class="activeTab === 'Endurance' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                WEC / Endurance
            </button>
            <button 
                @click="activeTab = 'IMSA'"
                :class="activeTab === 'IMSA' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                IMSA
            </button>
            <button 
                @click="activeTab = 'IndyCar'"
                :class="activeTab === 'IndyCar' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                IndyCar
            </button>
            <button 
                @click="activeTab = 'WRC'"
                :class="activeTab === 'WRC' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                WRC Rally
            </button>
            <button 
                @click="activeTab = 'NASCAR'"
                :class="activeTab === 'NASCAR' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                NASCAR
            </button>
            <button 
                @click="activeTab = 'GTWCE'"
                :class="activeTab === 'GTWCE' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                GTWCE Europe
            </button>
            <button 
                @click="activeTab = 'GTWCA'"
                :class="activeTab === 'GTWCA' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                GTWCA Asia
            </button>
            <button 
                @click="activeTab = 'EWC'"
                :class="activeTab === 'EWC' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                FIM EWC (Motor)
            </button>
            <button 
                @click="activeTab = 'FormulaE'"
                :class="activeTab === 'FormulaE' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                Formula E
            </button>
            <button 
                @click="activeTab = 'Academy'"
                :class="activeTab === 'Academy' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-4 py-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                M1TRG Academy
            </button>
        </div>
    </div>

    {{-- Drivers Grid --}}
    @php
    $driverImages = [
        'F1' => [
            'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&h=500&q=80',
            'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&h=500&q=80'
        ],
        'Endurance' => [
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&h=500&q=80',
            'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&h=500&q=80'
        ],
        'IMSA' => [
            'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=400&h=500&q=80',
            'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?auto=format&fit=crop&w=400&h=500&q=80'
        ],
        'IndyCar' => [
            'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=400&h=500&q=80',
            'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=400&h=500&q=80'
        ],
        'WRC' => [
            'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=400&h=500&q=80',
            'https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?auto=format&fit=crop&w=400&h=500&q=80'
        ],
        'NASCAR' => [
            'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?auto=format&fit=crop&w=400&h=500&q=80',
            'https://images.unsplash.com/photo-1534308983496-4fabb1a015ee?auto=format&fit=crop&w=400&h=500&q=80'
        ],
        'GTWCE' => [
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&h=500&q=80',
            'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&h=500&q=80'
        ],
        'GTWCA' => [
            'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&h=500&q=80',
            'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=400&h=500&q=80'
        ],
        'Academy' => [
            'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=400&h=500&q=80',
            'https://images.unsplash.com/photo-1628157582853-a796fa650a6a?auto=format&fit=crop&w=400&h=500&q=80'
        ]
    ];
    @endphp

    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @if($drivers->isEmpty())
            <div class="empty-state" role="status">
                <svg width="48" height="48" fill="none" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18a8 8 0 110-16 8 8 0 010 16zm-1-11h2v4h-2zm0 6h2v2h-2z" fill="currentColor"/></svg>
                <h4>Belum Ada Pembalap</h4>
                <p>Data pembalap sedang diperbarui. Silakan kembali lagi nanti.</p>
            </div>
            @else
            @foreach($drivers as $driver)
            @php
            $categoryImages = $driverImages[$driver->category] ?? $driverImages['Academy'];
            $imageIndex = $loop->index % count($categoryImages);
            $imgUrl = $categoryImages[$imageIndex];
            
            // Atribut Teknis BMW
            $license = match($driver->category) {
                'F1' => 'Platinum',
                'Endurance', 'IMSA', 'IndyCar', 'WRC', 'NASCAR' => 'Gold',
                'GTWCE', 'GTWCA' => 'Silver',
                default => 'Bronze'
            };
            $bestLap = match($driver->category) {
                'F1' => '1:18.420',
                'Endurance', 'IMSA' => '3:22.150',
                'IndyCar' => '1:06.450',
                'WRC' => '5:42.100',
                default => '2:16.850'
            };
            $drivingStyle = match($loop->index % 4) {
                0 => 'Precision Apex Carving',
                1 => 'Late Braking Attacker',
                2 => 'Tyre-Conservation Smooth',
                default => 'Wet Weather Mastery'
            };
            @endphp
            <div 
                x-show="activeTab === 'ALL' || activeTab === '{{ $driver->category }}'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                class="rgr-card flex flex-col justify-between overflow-hidden"
                style="border-radius: 0 !important;"
                id="driver-card-{{ $driver->id }}">
                
                {{-- Background Big Number --}}
                <div class="absolute right-[-1rem] bottom-[-2rem] font-display font-black text-9xl text-pure/[0.03] select-none pointer-events-none">
                    {{ str_pad($driver->permanent_number, 2, '0', STR_PAD_LEFT) }}
                </div>

                {{-- Driver Info Body --}}
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <span class="px-2 py-0.5 text-[0.6rem] font-display font-bold tracking-widest text-rgr bg-rgr/10 rounded uppercase">
                                @if($driver->category === 'Endurance')
                                     WEC / Endurance
                                @elseif($driver->category === 'IMSA')
                                     IMSA GTP
                                @elseif($driver->category === 'IndyCar')
                                     IndyCar Series
                                @elseif($driver->category === 'WRC')
                                     WRC Rally
                                @elseif($driver->category === 'GTWCE')
                                     GTWCE Europe
                                @elseif($driver->category === 'GTWCA')
                                     GTWCA Asia
                                @elseif($driver->category === 'EWC')
                                     FIM EWC (Motor)
                                @elseif($driver->category === 'FormulaE')
                                     Formula E
                                @elseif($driver->category === 'Academy')
                                     M1TRG Academy
                                @else
                                     {{ $driver->category }}
                                @endif
                            </span>
                            <h3 class="font-display font-bold text-lg text-pure mt-2 leading-tight">{{ $driver->name }}</h3>
                            <p class="text-xs text-muted uppercase tracking-wider font-ui mt-1">{{ $driver->country }} ({{ $driver->country_code }})</p>
                        </div>
                        <span class="font-display font-black text-2xl text-rgr">#{{ $driver->permanent_number }}</span>
                    </div>

                    <p class="text-xs text-muted leading-relaxed font-body">
                        {{ $driver->bio }}
                    </p>
                </div>

                {{-- Atribut Atribut Teknis BMW (Tabel Spesifikasi) --}}
                <div class="px-6 pb-6 pt-3 border-t border-steel/10 bg-black/[0.01]">
                    <div class="grid grid-cols-2 gap-x-4 gap-y-1.5 text-[0.68rem] font-mono">
                        <div class="flex justify-between border-b border-steel/5 pb-1">
                            <span class="text-muted">Lisensi FIA:</span>
                            <span class="font-bold text-pure">{{ $license }}</span>
                        </div>
                        <div class="flex justify-between border-b border-steel/5 pb-1">
                            <span class="text-muted">Lap Terbaik:</span>
                            <span class="font-bold text-pure">{{ $bestLap }}</span>
                        </div>
                        <div class="flex justify-between col-span-2">
                            <span class="text-muted">Gaya Balap:</span>
                            <span class="font-bold text-rgr">{{ $drivingStyle }}</span>
                        </div>
                    </div>
                </div>

                {{-- Driver Stats Foot --}}
                <div class="border-t border-steel/20 bg-black/[0.02] p-4 grid grid-cols-3 gap-2 text-center">
                    <div>
                        <p class="text-xs text-faint uppercase font-ui tracking-wider">Podium</p>
                        <p class="text-sm font-display font-bold text-pure mt-1">{{ $driver->podiums }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-faint uppercase font-ui tracking-wider">Poin Karir</p>
                        <p class="text-sm font-display font-bold text-pure mt-1">{{ number_format($driver->career_points, 0) }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-faint uppercase font-ui tracking-wider">Gelar Juara</p>
                        <p class="text-sm font-display font-bold text-pure mt-1">{{ $driver->world_championships }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>

    {{-- ── INTERACTIVE DRIVER COMPARE TOOL ────────────────────────────────────── --}}
    <div class="max-w-7xl mx-auto px-6 mt-20" x-data="driverComparer()">
        <div class="mb-10 text-center" data-reveal>
            <p class="section-label mb-2 flex items-center justify-center gap-3">
                <span class="w-6 h-px bg-rgr"></span>KOMPARASI STRATEGIS
            </p>
            <h2 class="section-title text-3xl lg:text-4xl">Alat Banding Pembalap Interaktif</h2>
            <p class="text-muted max-w-lg mx-auto mt-2">Bandingkan atribut performa, keahlian teknis sirkuit, dan insting balap antar pembalap utama secara langsung.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            {{-- Driver 1 Selection --}}
            <div class="lg:col-span-4 rgr-card p-6" data-reveal>
                <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-2">PEMBALAP KIRI</label>
                <select x-model="driverLeft" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors mb-6">
                    <template x-for="d in driverData">
                        <option :value="d.id" x-text="d.name"></option>
                    </template>
                </select>

                <div class="text-center">
                    <div class="w-24 h-24 rounded-full bg-rgr/10 border-2 border-rgr/30 flex items-center justify-center mx-auto mb-4">
                        <span class="font-display font-black text-3xl text-rgr" x-text="'#' + getDriver(driverLeft).number">#00</span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-pure" x-text="getDriver(driverLeft).name">Driver Name</h3>
                    <p class="text-xs text-muted font-ui tracking-wider mt-1" x-text="getDriver(driverLeft).championship + ' Division'"></p>
                </div>
            </div>

            {{-- Stat Comparison Bars (Middle) --}}
            <div class="lg:col-span-4 rgr-card p-6" data-reveal>
                <h3 class="font-display font-bold text-center text-base text-pure mb-6">ATRIBUT SKILL SIRKUIT</h3>
                
                <div class="space-y-5">
                    {{-- Pace / Speed --}}
                    <div>
                        <div class="flex justify-between text-[0.65rem] font-ui text-muted uppercase tracking-wider mb-1.5">
                            <span class="text-rgr font-bold" x-text="getDriver(driverLeft).stats.pace"></span>
                            <span>Kualifikasi / Pace</span>
                            <span class="text-cyan-500 font-bold" x-text="getDriver(driverRight).stats.pace"></span>
                        </div>
                        <div class="h-2 bg-pitch rounded overflow-hidden flex">
                            <div class="h-full bg-rgr transition-all duration-500" :style="'width: ' + (getDriver(driverLeft).stats.pace / 2) + '%'"></div>
                            <div class="h-full bg-cyan-400 transition-all duration-500 ml-auto" :style="'width: ' + (getDriver(driverRight).stats.pace / 2) + '%'"></div>
                        </div>
                    </div>

                    {{-- Tyre Preservation --}}
                    <div>
                        <div class="flex justify-between text-[0.65rem] font-ui text-muted uppercase tracking-wider mb-1.5">
                            <span class="text-rgr font-bold" x-text="getDriver(driverLeft).stats.tyre"></span>
                            <span>Manajemen Ban</span>
                            <span class="text-cyan-500 font-bold" x-text="getDriver(driverRight).stats.tyre"></span>
                        </div>
                        <div class="h-2 bg-pitch rounded overflow-hidden flex">
                            <div class="h-full bg-rgr transition-all duration-500" :style="'width: ' + (getDriver(driverLeft).stats.tyre / 2) + '%'"></div>
                            <div class="h-full bg-cyan-400 transition-all duration-500 ml-auto" :style="'width: ' + (getDriver(driverRight).stats.tyre / 2) + '%'"></div>
                        </div>
                    </div>

                    {{-- Wet / Rain pace --}}
                    <div>
                        <div class="flex justify-between text-[0.65rem] font-ui text-muted uppercase tracking-wider mb-1.5">
                            <span class="text-rgr font-bold" x-text="getDriver(driverLeft).stats.wet"></span>
                            <span>Kendali Hujan (Wet)</span>
                            <span class="text-cyan-500 font-bold" x-text="getDriver(driverRight).stats.wet"></span>
                        </div>
                        <div class="h-2 bg-pitch rounded overflow-hidden flex">
                            <div class="h-full bg-rgr transition-all duration-500" :style="'width: ' + (getDriver(driverLeft).stats.wet / 2) + '%'"></div>
                            <div class="h-full bg-cyan-400 transition-all duration-500 ml-auto" :style="'width: ' + (getDriver(driverRight).stats.wet / 2) + '%'"></div>
                        </div>
                    </div>

                    {{-- Aggression --}}
                    <div>
                        <div class="flex justify-between text-[0.65rem] font-ui text-muted uppercase tracking-wider mb-1.5">
                            <span class="text-rgr font-bold" x-text="getDriver(driverLeft).stats.aggression"></span>
                            <span>Agresivitas Salip</span>
                            <span class="text-cyan-500 font-bold" x-text="getDriver(driverRight).stats.aggression"></span>
                        </div>
                        <div class="h-2 bg-pitch rounded overflow-hidden flex">
                            <div class="h-full bg-rgr transition-all duration-500" :style="'width: ' + (getDriver(driverLeft).stats.aggression / 2) + '%'"></div>
                            <div class="h-full bg-cyan-400 transition-all duration-500 ml-auto" :style="'width: ' + (getDriver(driverRight).stats.aggression / 2) + '%'"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Driver 2 Selection --}}
            <div class="lg:col-span-4 rgr-card p-6" data-reveal>
                <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-2">PEMBALAP KANAN</label>
                <select x-model="driverRight" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors mb-6">
                    <template x-for="d in driverData">
                        <option :value="d.id" x-text="d.name" :disabled="d.id == driverLeft"></option>
                    </template>
                </select>

                <div class="text-center">
                    <div class="w-24 h-24 rounded-full bg-cyan-400/10 border-2 border-cyan-400/30 flex items-center justify-center mx-auto mb-4">
                        <span class="font-display font-black text-3xl text-cyan-500" x-text="'#' + getDriver(driverRight).number">#00</span>
                    </div>
                    <h3 class="font-display font-bold text-lg text-pure" x-text="getDriver(driverRight).name">Driver Name</h3>
                    <p class="text-xs text-muted font-ui tracking-wider mt-1" x-text="getDriver(driverRight).championship + ' Division'"></p>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
function driverComparer() {
    return {
        driverLeft: 1,
        driverRight: 2,
        driverData: [
            { id: 1, name: 'Max Verstappen', number: 33, championship: 'Formula 1', stats: { pace: 98, tyre: 94, wet: 97, aggression: 96 } },
            { id: 2, name: 'George Russell', number: 63, championship: 'Formula 1', stats: { pace: 95, tyre: 89, wet: 91, aggression: 90 } },
            { id: 3, name: 'Nyck de Vries', number: 17, championship: 'FIA WEC Hypercar', stats: { pace: 88, tyre: 91, wet: 87, aggression: 85 } },
            { id: 4, name: 'Renger van der Zande', number: 01, championship: 'IMSA GTP', stats: { pace: 90, tyre: 92, wet: 89, aggression: 92 } },
        ],
        getDriver(id) {
            return this.driverData.find(d => d.id == id) || this.driverData[0];
        }
    }
}
</script>
@endpush
@endsection
