@extends('layouts.rgr-premium')

@section('title', 'Fans Dashboard — Mobil 1 Team RG')
@section('meta_description', 'Pusat Akreditasi Fans VIP Mobil 1 Team RG. Lihat tiket Paddock Club Anda dan pantau telemetri tim secara langsung.')

@push('styles')
<style>
/* Holographic Paddock Pass Style */
.hologram-pass {
    background: linear-gradient(135deg, #111827 0%, #1f2937 50%, #111827 100%);
    border: 1px solid rgba(196, 229, 56, 0.2);
    position: relative;
    overflow: hidden;
    box-shadow: 0 30px 80px rgba(0,0,0,0.15);
}
.hologram-pass::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.05) 50%, transparent);
    transform: translateX(-100%);
    animation: holoShine 4s infinite linear;
}
@keyframes holoShine {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* Dial Gauge Circle */
.dial-gauge {
    position: relative;
    width: 100px;
    height: 100px;
}
.dial-track {
    fill: none;
    stroke: rgba(0, 0, 0, 0.05);
    stroke-width: 8;
}
.dial-value {
    fill: none;
    stroke: #C4E538;
    stroke-width: 8;
    stroke-linecap: round;
    transition: stroke-dashoffset 0.3s ease;
}

/* Digital Scan line effect */
.panel-grid-overlay {
    background-size: 15px 15px;
    background-image: linear-gradient(to right, rgba(0,0,0,0.01) 1px, transparent 1px),
                      linear-gradient(to bottom, rgba(0,0,0,0.01) 1px, transparent 1px);
}
</style>
@endpush

@section('content')
<div class="relative min-h-screen pt-28 pb-20 panel-grid-overlay bg-pitch" x-data="pitwallSimulator()">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Flash Success Alert --}}
        @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-600 rounded text-sm font-ui flex items-center gap-3 animate-pulse">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        {{-- Welcome Banner --}}
        <div class="rgr-card p-8 mb-10 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="absolute inset-0 bg-gradient-to-r from-rgr/03 to-transparent pointer-events-none"></div>
            <div>
                <p class="text-xs font-ui tracking-widest text-rgr uppercase font-bold">VIP MEMBERSHIP HUB</p>
                <h1 class="font-display font-black text-3xl lg:text-4xl text-pure mt-1">HALO, {{ strtoupper(Auth::user()->name) }}</h1>
                <p class="text-xs text-muted font-body mt-1">Akun Terdaftar: {{ Auth::user()->email }} · Status Akreditasi: <span class="text-emerald-500 font-bold">Inner Circle VIP</span></p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('paddock.club') }}" class="btn-rgr text-xs">Pesan Tiket VIP Baru</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-rgr-ghost text-xs">Keluar Akun</button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Left column: Ticket & Passes --}}
            <div class="lg:col-span-1 space-y-6">
                <div>
                    <h2 class="font-display font-bold text-xl text-pure mb-1">Tiket & Akreditasi VIP</h2>
                    <p class="text-xs text-muted mb-4">Akses Paddock Pass digital Anda untuk sirkuit terkait.</p>
                </div>

                @if($tickets->isEmpty())
                <div class="rgr-card p-8 text-center">
                    <p class="text-sm text-muted font-body">Anda belum memiliki reservasi tiket Paddock Club VIP.</p>
                    <a href="{{ route('paddock.club') }}" class="text-rgr font-bold text-xs hover:underline mt-3 inline-block">Beli tiket perdana Anda sekarang &rarr;</a>
                </div>
                @else
                <div class="space-y-4">
                    @foreach($tickets as $ticket)
                    <div class="rgr-card p-5 relative overflow-hidden" x-data="{ openPass: false }">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="px-2 py-0.5 text-[0.6rem] font-display font-bold tracking-widest text-rgr bg-rgr/10 rounded uppercase">
                                    {{ strtoupper($ticket->ticket_tier) }}
                                </span>
                                <h3 class="font-display font-bold text-base text-pure mt-2 leading-snug">{{ $ticket->event_name }}</h3>
                                <p class="text-[0.65rem] text-muted font-ui tracking-wider mt-0.5">KODE: {{ $ticket->booking_code }}</p>
                            </div>
                            <span class="text-xs font-display font-bold text-emerald-500 bg-emerald-500/10 px-2 py-0.5 rounded">
                                ACTIVE
                            </span>
                        </div>

                        <div class="border-t border-steel/20 pt-4 flex items-center justify-between">
                            <div class="text-[0.65rem] text-muted font-body">
                                <div>Jumlah: <span class="text-pure font-bold">{{ $ticket->quantity }} Tiket</span></div>
                                <div class="mt-0.5">Total: <span class="text-rgr font-bold">Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</span></div>
                            </div>
                            <button @click="openPass = true" class="btn-rgr-ghost text-[0.65rem] py-1 px-3">Tampilkan Pass</button>
                        </div>

                        {{-- Holographic Digital Pass Modal --}}
                        <div x-show="openPass" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-md flex items-center justify-center p-6" x-transition style="display: none;">
                            <div class="w-full max-w-sm hologram-pass rounded-lg p-6 relative" @click.away="openPass = false">
                                
                                {{-- Logo header --}}
                                <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
                                    <span class="font-display font-black tracking-widest text-lg text-white">RG <span class="text-rgr">RACING</span></span>
                                    <span class="text-[0.62rem] font-ui tracking-widest text-cyan-400 font-bold bg-cyan-400/10 px-2.5 py-1 rounded">VIP PADDOCK ACCREDITATION</span>
                                </div>

                                {{-- Ticket holder details --}}
                                <div class="space-y-4 mb-6">
                                    <div>
                                        <p class="text-[0.55rem] text-gray-400 uppercase tracking-widest">BALAPAN</p>
                                        <p class="font-display font-bold text-white text-lg">{{ $ticket->event_name }}</p>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-[0.55rem] text-gray-400 uppercase tracking-widest">PEMEGANG TIKET</p>
                                            <p class="text-xs text-white font-body font-bold">{{ Auth::user()->name }}</p>
                                        </div>
                                        <div>
                                            <p class="text-[0.55rem] text-gray-400 uppercase tracking-widest">PAKET VIP</p>
                                            <p class="text-xs text-rgr font-display font-bold uppercase">{{ $ticket->ticket_tier }} TIER</p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-[0.55rem] text-gray-400 uppercase tracking-widest">KODE BOOKING</p>
                                            <p class="text-xs text-white font-mono font-bold">{{ $ticket->booking_code }}</p>
                                        </div>
                                        <div>
                                            <p class="text-[0.55rem] text-gray-400 uppercase tracking-widest">SEAT / SUITE</p>
                                            <p class="text-xs text-cyan-400 font-display font-bold">SUITE-{{ rand(10, 99) }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Holographic QR simulation --}}
                                <div class="bg-white/05 border border-white/10 p-4 rounded flex items-center justify-between mb-6">
                                    <div class="w-16 h-16 bg-white p-1 rounded">
                                        {{-- Simulated high-tech QR barcode --}}
                                        <div class="w-full h-full bg-slate-900 flex flex-wrap gap-[2px]">
                                            @for ($k = 0; $k < 100; $k++)
                                                <div class="w-[6px] h-[6px] {{ rand(0,1) ? 'bg-white' : 'bg-transparent' }}"></div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="flex-1 pl-4">
                                        <p class="text-[0.58rem] text-gray-300 font-mono tracking-wider">KODE AKSES AKTIF</p>
                                        <p class="text-[0.52rem] text-gray-400 font-body mt-1 leading-relaxed">Pindai kode QR ini di gerbang masuk VIP Paddock sirkuit resmi.</p>
                                    </div>
                                </div>

                                <button @click="openPass = false" class="btn-rgr text-xs w-full justify-center">Tutup Akses Pass</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Right columns: Interactive telemetry simulator --}}
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <h2 class="font-display font-bold text-xl text-pure mb-1">Race Control & Pit-Wall Simulator</h2>
                    <p class="text-xs text-muted mb-4">Uji interaktif telemetry mobil Mobil 1 Team RG secara real-time langsung dari ruang kemudi garasi.</p>
                </div>

                <div class="rgr-card p-6 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-rgr/03 to-transparent pointer-events-none"></div>
                    
                    {{-- Simulator Header --}}
                    <div class="flex items-center justify-between mb-6 border-b border-steel/20 pb-4">
                        <div class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-rgr animate-ping"></span>
                            <span class="text-xs font-ui tracking-widest text-pure font-bold uppercase">LIVE TELEMETRY: CAR #22 (RUSSELL)</span>
                        </div>
                        <span class="px-2 py-0.5 text-[0.62rem] font-display font-black text-cyan-400 bg-cyan-400/10 rounded uppercase">
                            DRS ZONE ACTIVE
                        </span>
                    </div>

                    {{-- GAUGE DIALS --}}
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center mb-8">
                        {{-- Speed --}}
                        <div class="flex flex-col items-center">
                            <div class="dial-gauge mb-3">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <circle class="dial-track" cx="50" cy="50" r="40" />
                                    <circle class="dial-value" cx="50" cy="50" r="40" 
                                            :stroke-dasharray="251.2"
                                            :stroke-dashoffset="251.2 - (251.2 * (speed / 380))" />
                                </svg>
                                <span class="absolute inset-0 flex items-center justify-center font-display font-black text-pure text-lg" x-text="speed">0</span>
                            </div>
                            <span class="text-[0.62rem] text-muted font-ui tracking-widest uppercase">KECEPATAN (KM/H)</span>
                        </div>

                        {{-- RPM --}}
                        <div class="flex flex-col items-center">
                            <div class="dial-gauge mb-3">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <circle class="dial-track" cx="50" cy="50" r="40" />
                                    <circle class="dial-value" cx="50" cy="50" r="40" 
                                            stroke="#00C853"
                                            :stroke-dasharray="251.2"
                                            :stroke-dashoffset="251.2 - (251.2 * (rpm / 15000))" />
                                </svg>
                                <span class="absolute inset-0 flex items-center justify-center font-display font-black text-pure text-sm" x-text="(rpm/1000).toFixed(1) + 'k'">0</span>
                            </div>
                            <span class="text-[0.62rem] text-muted font-ui tracking-widest uppercase">MESIN (RPM)</span>
                        </div>

                        {{-- Tyre Temp --}}
                        <div class="flex flex-col items-center">
                            <div class="dial-gauge mb-3">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <circle class="dial-track" cx="50" cy="50" r="40" />
                                    <circle class="dial-value" cx="50" cy="50" r="40" 
                                            stroke="#AA00FF"
                                            :stroke-dasharray="251.2"
                                            :stroke-dashoffset="251.2 - (251.2 * (tyreTemp / 140))" />
                                </svg>
                                <span class="absolute inset-0 flex items-center justify-center font-display font-black text-pure text-lg" x-text="tyreTemp">0</span>
                            </div>
                            <span class="text-[0.62rem] text-muted font-ui tracking-widest uppercase">SUHU BAN (°C)</span>
                        </div>

                        {{-- Fuel --}}
                        <div class="flex flex-col items-center">
                            <div class="dial-gauge mb-3">
                                <svg class="w-full h-full" viewBox="0 0 100 100">
                                    <circle class="dial-track" cx="50" cy="50" r="40" />
                                    <circle class="dial-value" cx="50" cy="50" r="40" 
                                            stroke="#FFA000"
                                            :stroke-dasharray="251.2"
                                            :stroke-dashoffset="251.2 - (251.2 * (fuel / 110))" />
                                </svg>
                                <span class="absolute inset-0 flex items-center justify-center font-display font-black text-pure text-lg" x-text="fuel.toFixed(0)">0</span>
                            </div>
                            <span class="text-[0.62rem] text-muted font-ui tracking-widest uppercase">BAHAN BAKAR (KG)</span>
                        </div>
                    </div>

                    {{-- SIMULATION MESSAGES / STATUS --}}
                    <div class="bg-pitch/60 border border-steel/20 p-4 rounded-md mb-6 relative">
                        <p class="text-[0.58rem] font-ui text-faint tracking-wider uppercase mb-1">RACE STATUS & LOGS</p>
                        <p class="text-xs text-pure font-mono" x-text="logMessage">&gt; Telemetri online. Menunggu komando pit-wall...</p>
                        
                        {{-- Pit Countdown Indicator --}}
                        <div x-show="pitstopTimer > 0" class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center gap-2">
                            <span class="text-[0.65rem] font-ui text-rgr font-bold">PIT STOP IN PROGRESS:</span>
                            <span class="font-display font-black text-rgr text-lg" x-text="pitstopTimer.toFixed(1) + 's'">0.0s</span>
                        </div>
                    </div>

                    {{-- INTERACTIVE BUTTONS --}}
                    <div class="flex flex-wrap gap-4">
                        <button @click="accelerate()" class="btn-rgr text-xs flex-1 justify-center">
                            Geber Gas (Akselerasi)
                        </button>
                        <button @click="toggleDrs()" class="btn-rgr-ghost text-xs flex-1 justify-center" :class="drsActive ? 'bg-cyan-400/20 text-cyan-500 border-cyan-400' : ''">
                            <span x-text="drsActive ? 'Matikan DRS' : 'Nyalakan DRS'">Nyalakan DRS</span>
                        </button>
                        <button @click="performPitstop()" class="btn-rgr-ghost text-xs flex-1 justify-center" :disabled="pitstopTimer > 0">
                            Panggil Masuk Pit Stop
                        </button>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
function pitwallSimulator() {
    return {
        speed: 280,
        rpm: 10500,
        tyreTemp: 92,
        fuel: 85,
        drsActive: false,
        pitstopTimer: 0,
        logMessage: '> Menuju Tikungan 12 Monza (Parabolica). Grip optimal.',
        interval: null,

        init() {
            // Live fluctuations to make the telemetry feel alive!
            this.interval = setInterval(() => {
                if (this.pitstopTimer > 0) return;

                // Speed fluctuations
                let speedDiff = (Math.random() - 0.5) * 6;
                this.speed = Math.floor(Math.max(120, Math.min(372, this.speed + speedDiff)));

                // RPM fluctuations
                let rpmDiff = (Math.random() - 0.5) * 800;
                this.rpm = Math.floor(Math.max(8000, Math.min(14500, this.rpm + rpmDiff)));

                // Tyre temp
                let tempDiff = (Math.random() - 0.5) * 1.5;
                this.tyreTemp = Math.floor(Math.max(80, Math.min(115, this.tyreTemp + tempDiff)));

                // Slowly consume fuel
                this.fuel = Math.max(0, this.fuel - 0.05);

                if (this.speed > 340) {
                    this.logMessage = '> Mobil berada di batas kecepatan puncak! DRS memotong hambatan udara.';
                } else if (this.speed < 180) {
                    this.logMessage = '> Pengereman keras di tikungan lambat. Ban mengalami tekanan grip lateral.';
                } else {
                    this.logMessage = '> Akselerasi stabil di lintasan lurus. Aliran aerodinamis sasis optimal.';
                }
            }, 1000);
        },

        accelerate() {
            if (this.pitstopTimer > 0) return;
            this.speed = Math.min(365, this.speed + 35);
            this.rpm = Math.min(14900, this.rpm + 2500);
            this.tyreTemp = Math.min(118, this.tyreTemp + 5);
            this.logMessage = '> Gas ditekan maksimal! Unit daya menyalurkan 1000 daya kuda penuh.';
        },

        toggleDrs() {
            if (this.pitstopTimer > 0) return;
            this.drsActive = !this.drsActive;
            if (this.drsActive) {
                this.speed = Math.min(378, this.speed + 25);
                this.logMessage = '> Flap DRS dibuka! Mengurangi gaya hambat aerodinamis belakang untuk kecepatan garis lurus.';
            } else {
                this.logMessage = '> Flap DRS ditutup kembali sebelum pengereman masuk tikungan.';
            }
        },

        performPitstop() {
            if (this.pitstopTimer > 0) return;
            this.speed = 80;
            this.rpm = 4000;
            this.tyreTemp = 65;
            this.logMessage = '> Memasuki pit-lane sirkuit. Kecepatan dibatasi 80 km/h.';
            
            this.pitstopTimer = 2.1;
            let countdown = setInterval(() => {
                this.pitstopTimer = Math.max(0, this.pitstopTimer - 0.1);
                if (this.pitstopTimer <= 0) {
                    clearInterval(countdown);
                    this.tyreTemp = 100; // Fresh preheated tyres
                    this.speed = 120;
                    this.rpm = 9500;
                    this.logMessage = '> Pit stop sukses! Ban baru terpasang dalam 2,1 detik. Kembali ke lintasan!';
                }
            }, 100);
        }
    }
}
</script>
@endpush
