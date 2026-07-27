@extends('layouts.rgr-premium')

@section('title', 'Pesanan Sukses — Mobil 1 Team RG Fan Shop')
@section('meta_description', 'Detail invoice pesanan kustomisasi jersey dan merchandise resmi Mobil 1 Team RG.')

@push('styles')
<style>
.success-bg {
    background: #0F181A;
}
.invoice-card {
    background: #FFFFFF;
    border: 1px solid rgba(196, 229, 56, 0.08);
    box-shadow: 0 30px 70px rgba(0,0,0,0.06);
}
.barcode-sim {
    background-image: repeating-linear-gradient(90deg, #111827, #111827 2px, transparent 2px, transparent 6px);
    height: 40px; width: 100%; max-w-xs; margin: 0 auto;
}
</style>
@endpush

@section('content')
<div class="min-h-screen pt-32 pb-20 success-bg">
    <div class="max-w-3xl mx-auto px-6">
        
        {{-- Success Banner --}}
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4 border border-emerald-300">
                <svg class="w-8 h-8 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
            </div>
            <p class="section-label mb-1 text-emerald-500 font-bold uppercase tracking-wider">ORDER CONFIRMED</p>
            <h1 class="font-display font-black text-3xl lg:text-4xl text-pure">Terima Kasih Atas Pesanan Anda!</h1>
            <p class="text-muted text-xs mt-2 max-w-md mx-auto">Pesanan simulasi Anda telah berhasil disimpan secara persisten di database tim Mobil 1 Team RG.</p>
        </div>

        {{-- Invoice Bill Card --}}
        <div class="invoice-card rounded-xl p-8 space-y-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center border-b border-steel/10 pb-6 gap-4">
                <div>
                    <span class="text-[0.62rem] font-ui text-faint uppercase tracking-wider block">NOMOR INVOICE</span>
                    <p class="font-mono text-base font-bold text-pure mt-1" x-text="'{{ $order->invoice_number }}'">{{ $order->invoice_number }}</p>
                </div>
                <div class="text-left md:text-right">
                    <span class="text-[0.62rem] font-ui text-faint uppercase tracking-wider block">TANGGAL PEMBELIAN</span>
                    <p class="text-xs font-mono text-pure mt-1">{{ $order->created_at->format('d M Y - H:i') }} WIB</p>
                </div>
            </div>

            {{-- Customer Information --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-b border-steel/10 pb-6 text-xs">
                <div>
                    <h4 class="font-display font-bold text-pure uppercase tracking-wider mb-2">DETAIL PELANGGAN</h4>
                    <div class="space-y-1.5 font-mono text-muted">
                        <p><span class="text-faint">Nama:</span> <span class="text-pure font-bold">{{ $order->customer_name }}</span></p>
                        <p><span class="text-faint">Email:</span> <span class="text-pure font-bold">{{ $order->customer_email }}</span></p>
                        <p><span class="text-faint">HP:</span> <span class="text-pure font-bold">{{ $order->customer_phone }}</span></p>
                    </div>
                </div>
                <div>
                    <h4 class="font-display font-bold text-pure uppercase tracking-wider mb-2">PENGIRIMAN & PEMBAYARAN</h4>
                    <div class="space-y-1.5 font-mono text-muted">
                        <p><span class="text-faint">Kurir:</span> <span class="text-pure font-bold">{{ $order->shipping_courier }}</span></p>
                        <p><span class="text-faint">Metode:</span> <span class="text-pure font-bold">{{ $order->payment_method }}</span></p>
                        <p><span class="text-faint">Alamat:</span> <span class="text-pure font-bold leading-normal">{{ $order->shipping_address }}</span></p>
                    </div>
                </div>
            </div>

            {{-- Items Ordered --}}
            <div>
                <h4 class="font-display font-bold text-pure uppercase tracking-wider mb-4 text-xs">DAFTAR MERCHANDISE</h4>
                <div class="divide-y divide-steel/10 border-t border-b border-steel/10">
                    @foreach($order->items as $item)
                    <div class="py-3 flex justify-between items-center text-xs font-mono">
                        <div>
                            <p class="font-bold text-pure">{{ $item->product_name }}</p>
                            @if($item->custom_info)
                            <p class="text-[0.62rem] text-muted mt-0.5">{{ $item->custom_info }}</p>
                            @endif
                            <p class="text-muted mt-1">Rp {{ number_format($item->price, 0, ',', '.') }} x {{ $item->qty }}</p>
                        </div>
                        <span class="font-bold text-pure">Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Total Summary --}}
            <div class="space-y-2 border-b border-steel/10 pb-6 text-xs font-mono">
                <div class="flex justify-between text-muted">
                    <span>Subtotal:</span>
                    <span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                </div>
                @if($order->discount > 0)
                <div class="flex justify-between text-emerald-500">
                    <span>Potongan Harga ({{ $order->promo_code }}):</span>
                    <span>-Rp {{ number_format($order->discount, 0, ',', '.') }}</span>
                </div>
                @endif
                <div class="flex justify-between text-muted">
                    <span>Biaya Pengiriman:</span>
                    <span>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm font-bold text-pure border-t border-dashed border-steel/20 pt-2">
                    <span>TOTAL PEMBAYARAN:</span>
                    <span class="text-rgr text-base font-black">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                </div>
            </div>

            {{-- Barcode & Return Button --}}
            <div class="text-center pt-4 space-y-4">
                <div class="barcode-sim opacity-40"></div>
                <p class="text-[0.62rem] font-mono text-muted tracking-widest">{{ strtoupper($order->invoice_number) }}</p>
                <div class="pt-4">
                    <a href="{{ route('shop') }}" class="btn-rgr text-xs">Kembali ke Toko</a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
