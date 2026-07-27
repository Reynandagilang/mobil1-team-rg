@extends('layouts.rgr-premium')

@section('title', 'Klasemen Kejuaraan Dunia')
@section('meta_description', 'Pantau posisi klasemen langsung pembalap dan konstruktor Mobil 1 Team RG di kejuaraan Formula 1 2026.')

@section('content')
<div class="relative min-h-screen pt-24 pb-20 grid-bg" x-data="{ tab: 'drivers' }">

    {{-- Header --}}
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <p class="section-label mb-2">LIVE STANDINGS</p>
        <h1 class="section-title text-4xl lg:text-6xl mb-4">KLASEMEN KEJUARAAN</h1>
        <div class="cyan-line my-4"></div>
        <p class="text-muted text-sm max-w-xl">
            Hasil pengumpulan poin real-time tim Mobil 1 Team RG di panggung motorsport FIA Formula 1 World Championship.
        </p>
    </div>

    {{-- Tabs --}}
    <div class="max-w-7xl mx-auto px-6 mb-10">
        <div class="flex gap-4 border-b border-steel/20 pb-3">
            <button 
                @click="tab = 'drivers'"
                :class="tab === 'drivers' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-5 py-2.5 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                Klasemen Pembalap
            </button>
            <button 
                @click="tab = 'constructors'"
                :class="tab === 'constructors' ? 'border-rgr text-pure bg-rgr/10' : 'border-transparent text-muted hover:text-pure'"
                class="px-5 py-2.5 text-xs font-ui tracking-wider uppercase border-b-2 font-bold transition-all duration-300">
                Klasemen Konstruktor
            </button>
        </div>
    </div>

    {{-- Standings Grid --}}
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Drivers Standings Table --}}
        <div x-show="tab === 'drivers'" class="rgr-card overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-steel/20 bg-black/[0.02]">
                            <th class="py-4 px-6 text-xs font-ui tracking-wider text-muted uppercase font-bold w-16">Pos</th>
                            <th class="py-4 px-6 text-xs font-ui tracking-wider text-muted uppercase font-bold">Pembalap</th>
                            <th class="py-4 px-6 text-xs font-ui tracking-wider text-muted uppercase font-bold">Konstruktor / Tim</th>
                            <th class="py-4 px-6 text-xs font-ui tracking-wider text-muted uppercase font-bold text-center w-24">Kemenangan</th>
                            <th class="py-4 px-6 text-xs font-ui tracking-wider text-muted uppercase font-bold text-right w-32">Poin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-steel/20 font-body text-sm">
                        @foreach($driverStandings as $stand)
                        <tr class="hover:bg-black/[0.01] transition-colors {{ $stand['team'] === 'Mobil 1 Team RG' || $stand['team'] === 'RG Racing' ? 'bg-rgr/05' : '' }}">
                            <td class="py-4 px-6 font-display font-black text-lg text-muted">{{ $stand['pos'] }}</td>
                            <td class="py-4 px-6 font-display font-bold text-pure">{{ $stand['name'] }}</td>
                            <td class="py-4 px-6 font-ui tracking-wide text-muted uppercase text-xs">{{ $stand['team'] }}</td>
                            <td class="py-4 px-6 text-center text-pure font-ui font-semibold">{{ $stand['wins'] }}</td>
                            <td class="py-4 px-6 text-right font-display font-bold text-rgr text-base">{{ $stand['points'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Constructor Standings Table --}}
        <div x-show="tab === 'constructors'" class="rgr-card overflow-hidden" style="display: none;">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-steel/20 bg-black/[0.02]">
                            <th class="py-4 px-6 text-xs font-ui tracking-wider text-muted uppercase font-bold w-16">Pos</th>
                            <th class="py-4 px-6 text-xs font-ui tracking-wider text-muted uppercase font-bold">Konstruktor</th>
                            <th class="py-4 px-6 text-xs font-ui tracking-wider text-muted uppercase font-bold text-center w-24">Kemenangan</th>
                            <th class="py-4 px-6 text-xs font-ui tracking-wider text-muted uppercase font-bold text-right w-32">Poin</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-steel/20 font-body text-sm">
                        @foreach($constructorStandings as $stand)
                        <tr class="hover:bg-black/[0.01] transition-colors {{ $stand['name'] === 'Mobil 1 Team RG' || $stand['name'] === 'RG Racing' ? 'bg-rgr/05' : '' }}">
                            <td class="py-4 px-6 font-display font-black text-lg text-muted">{{ $stand['pos'] }}</td>
                            <td class="py-4 px-6 flex items-center gap-3">
                                <span class="w-2 h-2 rounded-full" style="background-color: {{ $stand['color'] }}"></span>
                                <span class="font-display font-bold text-pure">{{ $stand['name'] }}</span>
                            </td>
                            <td class="py-4 px-6 text-center text-pure font-ui font-semibold">{{ $stand['wins'] }}</td>
                            <td class="py-4 px-6 text-right font-display font-bold text-rgr text-base">{{ $stand['points'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection
