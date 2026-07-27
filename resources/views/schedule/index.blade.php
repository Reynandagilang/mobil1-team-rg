@extends('layouts.rgr-premium')

@section('title', 'Jadwal & Kalender Balapan — Mobil 1 Team RG')
@section('meta_description', 'Jadwal lengkap kalender balap musim 2026 terintegrasi untuk Formula 1, IndyCar, Endurance, WRC, NASCAR, dan GT World Challenge.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg" 
     x-data="{ 
         tab: 'upcoming', 
         selectedSeries: 'all',
         timeMode: 'visitor',
         userTimezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
         formatTime(utcStr, mode) {
             const d = new Date(utcStr);
             if (mode === 'visitor') {
                 // Convert to visitor local time
                 return d.toLocaleDateString('id-ID', { 
                     day: '2-digit', month: 'short', year: 'numeric', 
                     hour: '2-digit', minute: '2-digit'
                 }) + ' (' + this.userTimezone.split('/').pop().replace('_', ' ') + ')';
             } else {
                 // Display circuit local time mockup based on data attributes
                 return d.toLocaleDateString('id-ID', { 
                     day: '2-digit', month: 'short', year: 'numeric'
                 }) + ' - Waktu Sirkuit';
             }
         }
     }">

    {{-- Header --}}
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>RACE CENTER</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4 font-black">SCHEDULE & CALENDAR</h1>
        <div class="cyan-line my-4"></div>
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <p class="text-muted text-sm max-w-xl">
                Kalender balapan terintegrasi musim 2026 untuk ketujuh divisi balap aktif Mobil 1 Team RG secara global.
            </p>
            
            {{-- Timezone Selector Widget --}}
            <div class="flex items-center gap-2 bg-carbon-2 border border-steel/60 p-1.5 rounded text-xs shrink-0 self-start md:self-auto shadow-sm">
                <span class="text-faint pl-2">ZONA WAKTU:</span>
                <button @click="timeMode = 'visitor'" 
                        :class="timeMode === 'visitor' ? 'bg-rgr text-white font-bold' : 'text-muted hover:text-pure'"
                        class="px-3 py-1 rounded transition-colors uppercase font-ui tracking-wider text-[0.62rem]">
                    Lokal Anda
                </button>
                <button @click="timeMode = 'circuit'" 
                        :class="timeMode === 'circuit' ? 'bg-rgr text-white font-bold' : 'text-muted hover:text-pure'"
                        class="px-3 py-1 rounded transition-colors uppercase font-ui tracking-wider text-[0.62rem]">
                    Sirkuit
                </button>
            </div>
        </div>
    </div>

    {{-- Dynamic Series Filter Bar (One-click) --}}
    <div class="max-w-7xl mx-auto px-6 mb-8">
        <div class="flex flex-wrap gap-2.5 pb-2 border-b border-steel/20">
            @php
                $seriesList = [
                    ['all', 'Semua Seri'],
                    ['f1', 'Formula 1'],
                    ['indycar', 'IndyCar'],
                    ['endurance', 'Endurance (WEC/IMSA)'],
                    ['gtwc', 'GT World Challenge'],
                    ['nascar', 'NASCAR'],
                    ['wrc', 'FIA WRC Rally']
                ];
            @endphp
            @foreach($seriesList as $ser)
                <button 
                    @click="selectedSeries = '{{ $ser[0] }}'"
                    :class="selectedSeries === '{{ $ser[0] }}' ? 'bg-rgr text-white border-rgr' : 'bg-carbon text-muted border-steel/40 hover:text-pure hover:border-steel/60'"
                    class="px-4 py-2 text-xs font-ui tracking-wider uppercase border rounded font-semibold transition-all duration-200">
                    {{ $ser[1] }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- Tabs (Upcoming vs Finished) --}}
    <div class="max-w-7xl mx-auto px-6 mb-8">
        <div class="flex gap-4">
            <button 
                @click="tab = 'upcoming'"
                :class="tab === 'upcoming' ? 'border-rgr text-pure font-bold' : 'border-transparent text-muted hover:text-pure'"
                class="pb-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                Balapan Mendatang
            </button>
            <button 
                @click="tab = 'finished'"
                :class="tab === 'finished' ? 'border-rgr text-pure font-bold' : 'border-transparent text-muted hover:text-pure'"
                class="pb-2 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                Hasil Balapan Selesai
            </button>
        </div>
    </div>

    {{-- Unified Races Schedule Grid --}}
    <div class="max-w-7xl mx-auto px-6">
        
        @php
            $upcomingEvents = [
                ['round' => 2, 'series' => 'f1', 'series_label' => 'FIA FORMULA 1', 'race_name' => 'Grand Prix Monaco', 'circuit' => 'Circuit de Monaco', 'location' => 'Monte Carlo', 'utc' => '2026-05-24T13:00:00Z', 'local_string' => '24 Mei 2026, 15:00'],
                ['round' => 3, 'series' => 'f1', 'series_label' => 'FIA FORMULA 1', 'race_name' => 'Grand Prix Inggris', 'circuit' => 'Silverstone Circuit', 'location' => 'Silverstone, UK', 'utc' => '2026-07-05T14:00:00Z', 'local_string' => '05 Jul 2026, 15:00'],
                ['round' => 105, 'series' => 'indycar', 'series_label' => 'NTT INDYCAR', 'race_name' => 'Indianapolis 500', 'circuit' => 'Indianapolis Motor Speedway', 'location' => 'Indiana, USA', 'utc' => '2026-05-24T16:30:00Z', 'local_string' => '24 Mei 2026, 12:30'],
                ['round' => 3, 'series' => 'endurance', 'series_label' => 'WEC / ENDURANCE', 'race_name' => '24 Hours of Le Mans', 'circuit' => 'Circuit de la Sarthe', 'location' => 'Le Mans, Prancis', 'utc' => '2026-06-13T14:00:00Z', 'local_string' => '13 Jun 2026, 16:00'],
                ['round' => 4, 'series' => 'endurance', 'series_label' => 'WEC / WRC', 'race_name' => 'IMSA 6 Hours of The Glen', 'circuit' => 'Watkins Glen International', 'location' => 'New York, USA', 'utc' => '2026-06-28T14:40:00Z', 'local_string' => '28 Jun 2026, 10:40'],
                ['round' => 5, 'series' => 'gtwc', 'series_label' => 'GT WORLD CHALLENGE', 'race_name' => '24 Hours of Spa', 'circuit' => 'Circuit de Spa-Francorchamps', 'location' => 'Spa, Belgia', 'utc' => '2026-07-26T13:30:00Z', 'local_string' => '26 Jul 2026, 15:30'],
                ['round' => 6, 'series' => 'gtwc', 'series_label' => 'GTWC ASIA', 'race_name' => 'GTWC Asia Fuji Round', 'circuit' => 'Fuji Speedway', 'location' => 'Shizuoka, Jepang', 'utc' => '2026-08-09T05:00:00Z', 'local_string' => '09 Agt 2026, 14:00'],
                ['round' => 15, 'series' => 'nascar', 'series_label' => 'NASCAR CUP Series', 'race_name' => 'Coca-Cola 600', 'circuit' => 'Charlotte Motor Speedway', 'location' => 'North Carolina, USA', 'utc' => '2026-05-24T22:00:00Z', 'local_string' => '24 Mei 2026, 18:00'],
                ['round' => 6, 'series' => 'wrc', 'series_label' => 'FIA WRC RALLY', 'race_name' => 'Rally Italia Sardegna', 'circuit' => 'Sardinia Gravel Stages', 'location' => 'Sardinia, Italia', 'utc' => '2026-06-05T08:00:00Z', 'local_string' => '05 Jun 2026, 10:00']
            ];

            $finishedEvents = [
                ['round' => 1, 'series' => 'f1', 'series_label' => 'FIA FORMULA 1', 'race_name' => 'Grand Prix Bahrain', 'circuit' => 'Bahrain International Circuit', 'location' => 'Sakhir', 'utc' => '2026-03-07T15:00:00Z', 'local_string' => '07 Mar 2026, 18:00', 'result' => 'P1 - Verstappen, P6 - Russell'],
                ['round' => 1, 'series' => 'endurance', 'series_label' => 'WEC / ENDURANCE', 'race_name' => 'Rolex 24 at Daytona', 'circuit' => 'Daytona International Speedway', 'location' => 'Florida, USA', 'utc' => '2026-01-25T18:40:00Z', 'local_string' => '25 Jan 2026, 13:40', 'result' => 'P1 (Overall Winner) - RGR Hypercar'],
                ['round' => 2, 'series' => 'endurance', 'series_label' => 'WEC / ENDURANCE', 'race_name' => 'Qatar 1812 km', 'circuit' => 'Lusail International Circuit', 'location' => 'Lusail, Qatar', 'utc' => '2026-03-02T08:00:00Z', 'local_string' => '02 Mar 2026, 11:00', 'result' => 'P3 - RGR Hypercar #99'],
                ['round' => 1, 'series' => 'wrc', 'series_label' => 'FIA WRC RALLY', 'race_name' => 'Rallye Monte-Carlo', 'circuit' => 'Alps Asphalt Stages', 'location' => 'Gap, Prancis', 'utc' => '2026-01-25T11:00:00Z', 'local_string' => '25 Jan 2026, 12:00', 'result' => 'P1 - RGR Yaris WRC'],
                ['round' => 2, 'series' => 'wrc', 'series_label' => 'FIA WRC RALLY', 'race_name' => 'Rally Sweden', 'circuit' => 'Värmland Snow Stages', 'location' => 'Umeå, Swedia', 'utc' => '2026-02-15T12:00:00Z', 'local_string' => '15 Feb 2026, 13:00', 'result' => 'P2 - RGR Yaris WRC']
            ];
        @endphp

        {{-- Upcoming List --}}
        <div x-show="tab === 'upcoming'" class="space-y-4">
            @foreach($upcomingEvents as $ev)
                <div class="rgr-card p-6 flex flex-col md:flex-row md:items-center justify-between gap-6" 
                     x-show="selectedSeries === 'all' || selectedSeries === '{{ $ev['series'] }}'"
                     data-reveal>
                    <div>
                        <span class="text-[0.68rem] text-rgr font-ui font-black tracking-widest uppercase mb-1.5 block">
                            {{ $ev['series_label'] }} · SERI {{ $ev['round'] }}
                        </span>
                        <h3 class="font-display font-bold text-lg text-pure">{{ $ev['race_name'] }}</h3>
                        <p class="text-xs text-muted font-ui uppercase mt-1">{{ $ev['circuit'] }}, {{ $ev['location'] }}</p>
                    </div>
                    
                    <div class="flex items-center gap-6">
                        <div class="text-left md:text-right">
                            <p class="text-[0.62rem] text-faint uppercase font-ui tracking-wider">JADWAL BALAPAN</p>
                            <p class="text-xs font-display font-bold text-pure mt-1"
                               x-text="timeMode === 'visitor' ? formatTime('{{ $ev['utc'] }}', 'visitor') : '{{ $ev['local_string'] }}'">
                                {{ $ev['local_string'] }}
                            </p>
                        </div>
                        <div class="w-1.5 h-1.5 rounded-full bg-rgr animate-pulse" title="Upcoming Event"></div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Finished List --}}
        <div x-show="tab === 'finished'" class="space-y-4" style="display: none;">
            @foreach($finishedEvents as $ev)
                <div class="rgr-card p-6 flex flex-col md:flex-row md:items-center justify-between gap-6" 
                     x-show="selectedSeries === 'all' || selectedSeries === '{{ $ev['series'] }}'"
                     data-reveal>
                    <div>
                        <span class="text-[0.68rem] text-faint font-ui font-black tracking-widest uppercase mb-1.5 block">
                            {{ $ev['series_label'] }} · SERI {{ $ev['round'] }}
                        </span>
                        <h3 class="font-display font-bold text-lg text-pure">{{ $ev['race_name'] }}</h3>
                        <p class="text-xs text-muted font-ui uppercase mt-1">{{ $ev['circuit'] }}, {{ $ev['location'] }}</p>
                    </div>
                    
                    <div class="flex flex-col md:flex-row md:items-center gap-6">
                        <div class="text-left md:text-right">
                            <p class="text-[0.62rem] text-faint uppercase font-ui tracking-wider">Hasil Akhir Tim</p>
                            <p class="text-xs font-display font-bold text-emerald-600 mt-1">{{ $ev['result'] }}</p>
                        </div>
                        <span class="px-2 py-0.5 text-[0.58rem] font-display font-bold tracking-widest bg-emerald-500/10 text-emerald-600 border border-emerald-500/20 uppercase rounded self-start md:self-auto">
                            SELESAI
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</div>
@endsection
