@extends('layouts.rgr-premium')

@section('title', 'Login Fans RGR')
@section('meta_description', 'Masuk ke akun fans Mobil 1 Team RG untuk memesan tiket F1 Paddock Club VIP.')

@section('content')
<div class="relative min-h-screen pt-28 pb-20 flex items-center justify-center grid-bg">
    <div class="w-full max-w-md px-6">
        
        <div class="rgr-card p-8 relative overflow-hidden" data-reveal>
            <div class="absolute inset-0 bg-gradient-to-br from-rgr/03 to-transparent pointer-events-none"></div>
            
            <div class="text-center mb-8 relative z-10">
                <span class="text-xs font-ui tracking-widest text-rgr uppercase font-bold">WELCOME BACK FANS</span>
                <h1 class="font-display font-black text-2xl text-pure mt-1">LOG IN TO M1TRG HUB</h1>
                <div class="cyan-line my-3 max-w-[80px] mx-auto"></div>
            </div>

            @if($errors->any())
            <div class="p-3 bg-rgr/10 border border-rgr/20 rounded text-rgr text-xs mb-6 font-ui">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5 relative z-10">
                @csrf
                <div>
                    <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-pitch border border-steel/60 p-3 text-xs text-pure rounded focus:outline-none focus:border-rgr transition-colors" placeholder="nama@domain.com" required />
                </div>

                <div>
                    <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1.5">Kata Sandi</label>
                    <input type="password" name="password" class="w-full bg-pitch border border-steel/60 p-3 text-xs text-pure rounded focus:outline-none focus:border-rgr transition-colors" placeholder="••••••••" required />
                </div>

                <button type="submit" class="btn-rgr w-full justify-center text-xs mt-2">Masuk Akun</button>
            </form>

            <div class="text-center mt-6 text-xs text-muted font-body relative z-10">
                Belum punya akun fans? 
                <a href="{{ route('register') }}" class="text-rgr hover:underline font-bold">Daftar Sekarang</a>
            </div>

        </div>
    </div>
</div>
@endsection
