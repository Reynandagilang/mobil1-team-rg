@extends('layouts.rgr-premium')

@section('title', 'Register Fan Zone — Mobil 1 Team RG')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-pitch py-24 px-6">
    <div class="max-w-md w-full bg-white border border-steel/15 p-8 relative" style="border-radius: 0 !important;">
        {{-- M-Sport Accent Top Line --}}
        <div class="absolute top-0 left-0 right-0 h-1" style="background: linear-gradient(90deg, #00A3E0 33.3%, #00263E 33.3%, #00263E 66.6%, #C8FF2E 66.6%);"></div>

        <div class="text-center mb-8">
            <span class="text-[0.62rem] font-ui tracking-widest text-rgr font-bold uppercase block mb-1">M1TRG PADDOCK REGISTRATION</span>
            <h2 class="font-display font-black text-3xl text-pure tracking-tight uppercase">BUAT AKUN FANS</h2>
            <p class="text-xs text-muted mt-2 font-body">Dapatkan Paddock Pass digital Anda, dukung pembalap favorit, dan tebak hasil balap dunia.</p>
        </div>

        @if($errors->any())
        <div class="p-4 mb-6 bg-red-500/10 border-l-4 border-red-600 text-xs text-red-600">
            <ul class="list-disc pl-4 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('fan.register.post') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-[0.68rem] font-ui tracking-wider text-pure uppercase font-bold mb-1.5">Nama Lengkap</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}"
                       class="w-full bg-pitch border border-steel/20 px-4 py-2.5 text-xs text-pure focus:outline-none focus:border-rgr"
                       style="border-radius: 0 !important;" placeholder="Masukkan nama lengkap Anda">
            </div>

            <div>
                <label for="email" class="block text-[0.68rem] font-ui tracking-wider text-pure uppercase font-bold mb-1.5">Alamat Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}"
                       class="w-full bg-pitch border border-steel/20 px-4 py-2.5 text-xs text-pure focus:outline-none focus:border-rgr font-mono"
                       style="border-radius: 0 !important;" placeholder="email@domain.com">
            </div>

            <div>
                <label for="password" class="block text-[0.68rem] font-ui tracking-wider text-pure uppercase font-bold mb-1.5">Kata Sandi</label>
                <input type="password" name="password" id="password" required
                       class="w-full bg-pitch border border-steel/20 px-4 py-2.5 text-xs text-pure focus:outline-none focus:border-rgr font-mono"
                       style="border-radius: 0 !important;" placeholder="Minimal 6 karakter">
            </div>

            <div>
                <label for="password_confirmation" class="block text-[0.68rem] font-ui tracking-wider text-pure uppercase font-bold mb-1.5">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full bg-pitch border border-steel/20 px-4 py-2.5 text-xs text-pure focus:outline-none focus:border-rgr font-mono"
                       style="border-radius: 0 !important;" placeholder="Masukkan kembali kata sandi">
            </div>

            <button type="submit" class="w-full btn-rgr btn-ferrari justify-center text-xs py-3 font-semibold uppercase tracking-wider">
                DAFTAR KEANGGOTAAN FANS
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-steel/10 text-center text-xs text-muted">
            Sudah terdaftar? 
            <a href="{{ route('fan.login') }}" class="text-rgr font-bold hover:underline ml-1">Masuk di sini &rarr;</a>
        </div>
    </div>
</div>
@endsection
