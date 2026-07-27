@extends('layouts.rgr-premium')

@section('title', 'Dasbor Fan Zone — Mobil 1 Team RG')

@section('content')
<div class="min-h-screen bg-pitch py-24">
    <div class="max-w-7xl mx-auto px-6">
        
        {{-- Success/Error Alerts --}}
        @if(session('success'))
        <div class="p-4 mb-6 bg-emerald-500/10 border-l-4 border-emerald-600 text-xs text-emerald-600">
            {{ session('success') }}
        </div>
        @endif
        @if($errors->any())
        <div class="p-4 mb-6 bg-red-500/10 border-l-4 border-red-600 text-xs text-red-600">
            {{ $errors->first() }}
        </div>
        @endif

        {{-- Header Profile Hub --}}
        <div class="bg-white border border-steel/15 p-8 mb-8 relative flex flex-col md:flex-row justify-between items-center gap-6" style="border-radius:0 !important;">
            <div class="absolute top-0 left-0 right-0 h-1" style="background: linear-gradient(90deg, #00A3E0 33.3%, #00263E 33.3%, #00263E 66.6%, #C8FF2E 66.6%);"></div>
            
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 flex items-center justify-center font-display font-black text-2xl text-white relative uppercase" 
                     style="background: {{ $user->avatar_color }}; clip-path: polygon(50% 0%, 100% 28%, 100% 72%, 50% 100%, 0% 72%, 0% 28%);">
                    {{ substr($user->name, 0, 2) }}
                </div>
                <div>
                    <span class="text-[0.62rem] font-ui tracking-widest text-rgr font-bold uppercase">M1TRG MEMBER</span>
                    <h2 class="font-display font-black text-2xl text-pure tracking-tight uppercase">{{ $user->name }}</h2>
                    <p class="text-xs text-muted font-mono mt-0.5">ID: #M1-{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }} · Bergabung: {{ $user->created_at->format('M Y') }}</p>
                </div>
            </div>

            <div class="flex gap-4 text-center">
                <div class="p-4 border border-steel/10 bg-pitch min-w-[100px]">
                    <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider">Poin Fans</p>
                    <p class="font-display font-black text-2xl text-rgr mt-1">{{ $user->points }}</p>
                </div>
                <div class="p-4 border border-steel/10 bg-pitch min-w-[100px]">
                    <p class="text-[0.55rem] font-ui text-muted uppercase tracking-wider">Level Keanggotaan</p>
                    <p class="font-display font-black text-sm text-pure mt-2.5 uppercase tracking-wide">
                        @if($user->points >= 150)
                            🏆 Titanium
                        @elseif($user->points >= 80)
                            🥇 Gold Pass
                        @elseif($user->points >= 30)
                            🥈 Silver Pass
                        @else
                            🥉 Bronze Pass
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Left column: Custom Profile & Settings --}}
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white border border-steel/15 p-6" style="border-radius:0 !important;">
                    <h3 class="font-display font-bold text-lg text-pure mb-1">Kustomisasi Profil</h3>
                    <p class="text-[0.68rem] text-muted mb-4">Ubah identitas paddock dan pilih pembalap favorit Anda.</p>

                    <form action="{{ route('fan.profile.update') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-[0.62rem] font-ui text-pure uppercase tracking-wider font-bold mb-1">Nama Tampilan</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" required
                                   class="w-full bg-pitch border border-steel/15 px-3 py-2 text-xs text-pure focus:outline-none focus:border-rgr"
                                   style="border-radius:0 !important;">
                        </div>

                        <div>
                            <label for="avatar_color" class="block text-[0.62rem] font-ui text-pure uppercase tracking-wider font-bold mb-1">Warna Badge Profil</label>
                            <select name="avatar_color" id="avatar_color" required
                                    class="w-full bg-pitch border border-steel/15 px-3 py-2 text-xs text-pure focus:outline-none focus:border-rgr"
                                    style="border-radius:0 !important;">
                                <option value="#C8FF2E" @selected($user->avatar_color == '#C8FF2E')>Merah Ferrari (#C8FF2E)</option>
                                <option value="#00A3E0" @selected($user->avatar_color == '#00A3E0')>Biru Muda BMW (#00A3E0)</option>
                                <option value="#00263E" @selected($user->avatar_color == '#00263E')>Biru Tua BMW (#00263E)</option>
                                <option value="#111827" @selected($user->avatar_color == '#111827')>Hitam Carbon (#111827)</option>
                                <option value="#FFB300" @selected($user->avatar_color == '#FFB300')>Kuning Racing (#FFB300)</option>
                            </select>
                        </div>

                        <div>
                            <label for="favorite_driver_id" class="block text-[0.62rem] font-ui text-pure uppercase tracking-wider font-bold mb-1">Pembalap Favorit</label>
                            <select name="favorite_driver_id" id="favorite_driver_id"
                                    class="w-full bg-pitch border border-steel/15 px-3 py-2 text-xs text-pure focus:outline-none focus:border-rgr"
                                    style="border-radius:0 !important;">
                                <option value="">-- Pilih Pembalap --</option>
                                @foreach($drivers as $d)
                                    <option value="{{ $d->id }}" @selected($user->favorite_driver_id == $d->id)>
                                        #{{ $d->permanent_number }} {{ $d->name }} ({{ $d->category }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="w-full btn-rgr btn-ferrari justify-center text-xs py-2 font-semibold uppercase tracking-wider">
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>

            {{-- Right column: Prediction Center & History --}}
            <div class="lg:col-span-2 space-y-8">
                
                {{-- Prediction League Center --}}
                <div class="bg-white border border-steel/15 p-6" style="border-radius:0 !important;">
                    <h3 class="font-display font-bold text-lg text-pure mb-1">Liga Prediksi Paddock (Prediction League)</h3>
                    <p class="text-[0.68rem] text-muted mb-4">Tebak siapa pembalap M1TRG yang akan memenangkan GP atau seri balapan berikutnya. Tebakan yang benar akan menghasilkan +50 Poin Fans!</p>

                    @if($upcomingRaces->count() > 0)
                        <form action="{{ route('fan.predict') }}" method="POST" class="space-y-4 p-4 border border-rgr/10 bg-rgr/03">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="race_schedule_id" class="block text-[0.62rem] font-ui text-pure uppercase tracking-wider font-bold mb-1">Pilih Balapan (GP F1)</label>
                                    <select name="race_schedule_id" id="race_schedule_id" required
                                            class="w-full bg-white border border-steel/15 px-3 py-2 text-xs text-pure focus:outline-none focus:border-rgr"
                                            style="border-radius:0 !important;">
                                        @foreach($upcomingRaces as $race)
                                            <option value="{{ $race->id }}">
                                                {{ $race->grand_prix_name }} ({{ $race->race_date->format('d M Y') }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="driver_id" class="block text-[0.62rem] font-ui text-pure uppercase tracking-wider font-bold mb-1">Prediksi Pembalap Pemenang</label>
                                    <select name="driver_id" id="driver_id" required
                                            class="w-full bg-white border border-steel/15 px-3 py-2 text-xs text-pure focus:outline-none focus:border-rgr"
                                            style="border-radius:0 !important;">
                                        @foreach($drivers as $d)
                                            <option value="{{ $d->id }}">
                                                #{{ $d->permanent_number }} {{ $d->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn-rgr btn-ferrari text-xs py-2 px-6 font-semibold uppercase tracking-wider">
                                Kunci Prediksi Saya
                            </button>
                        </form>
                    @else
                        <div class="p-4 bg-pitch border border-steel/10 text-xs text-muted text-center">
                            Tidak ada balapan mendatang yang tersedia untuk diprediksi saat ini.
                        </div>
                    @endif
                </div>

                {{-- Prediction History --}}
                <div class="bg-white border border-steel/15 p-6" style="border-radius:0 !important;">
                    <h3 class="font-display font-bold text-lg text-pure mb-4">Riwayat Prediksi Paddock Anda</h3>

                    @if($predictions->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left border-collapse font-mono">
                                <thead>
                                    <tr class="border-b border-steel/20 text-muted text-[0.65rem] uppercase">
                                        <th class="py-2">Balapan</th>
                                        <th class="py-2">Tanggal Balap</th>
                                        <th class="py-2">Prediksi Rider/Driver</th>
                                        <th class="py-2">Status</th>
                                        <th class="py-2 text-right">Poin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($predictions as $p)
                                        <tr class="border-b border-steel/5 hover:bg-pitch/40">
                                            <td class="py-3 font-display font-bold text-pure">{{ $p->grand_prix_name }}</td>
                                            <td class="py-3 text-muted">{{ \Carbon\Carbon::parse($p->race_date)->format('d-m-Y') }}</td>
                                            <td class="py-3 text-pure font-bold">#{{ $p->permanent_number }} {{ $p->driver_name }}</td>
                                            <td class="py-3">
                                                @if($p->status == 'correct')
                                                    <span class="px-2 py-0.5 text-[0.6rem] font-bold text-emerald-600 bg-emerald-500/10 uppercase">BENAR</span>
                                                @elseif($p->status == 'incorrect')
                                                    <span class="px-2 py-0.5 text-[0.6rem] font-bold text-red-600 bg-red-500/10 uppercase">SALAH</span>
                                                @else
                                                    <span class="px-2 py-0.5 text-[0.6rem] font-bold text-amber-600 bg-amber-500/10 uppercase">PENDING</span>
                                                @endif
                                            </td>
                                            <td class="py-3 text-right font-bold text-pure">+{{ $p->points_awarded }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-6 text-center text-xs text-muted">
                            Anda belum memasukkan prediksi balapan apa pun. Mulai tebak pemenang di atas!
                        </div>
                    @endif
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
