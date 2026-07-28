@extends('layouts.rgr-premium')

@section('title', 'Proses Checkout Keanggotaan — Mobil 1 Team RG')
@section('meta_description', 'Proses checkout keanggotaan premium Mobil 1 Team RG Fan Zone. Dapatkan akses eksklusif paddock dan merchandise premium.')

@section('content')
<div class="min-h-screen bg-pitch py-24" x-data="checkoutV2System()" x-init="initCheckout()">
    <div class="max-w-7xl mx-auto px-6">

        <div class="mb-8">
            <span class="text-[0.62rem] font-ui tracking-widest text-rgr font-bold uppercase block mb-1">M1TRG SECURE CHECKOUT</span>
            <h2 class="font-display font-black text-3xl text-pure tracking-tight uppercase">PROSES PEMBAYARAN FANS</h2>
            <div class="cyan-line my-3"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            {{-- Left: Billing & Payment Form (7 Cols) --}}
            <div class="lg:col-span-7 bg-carbon border border-steel/15 p-8 relative" style="border-radius:0 !important;">
                <div class="absolute top-0 left-0 right-0 h-1" style="background: linear-gradient(90deg, #F5A623 33.3%, #0B0D10 33.3%, #C8FF2E 66.6%);"></div>

                <form @submit.prevent="submitOrder()" class="space-y-6">
                    <div>
                        <h3 class="font-display font-bold text-lg text-pure border-b border-steel/10 pb-2 mb-4">1. Informasi Pengiriman</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-[0.62rem] font-ui text-pure uppercase tracking-wider font-bold mb-1">Nama Penerima</label>
                                <input type="text" x-model="customerName" required
                                       class="w-full bg-pitch border border-steel/20 px-3 py-2 text-xs text-pure focus:outline-none focus:border-rgr"
                                       style="border-radius:0 !important;">
                            </div>
                            <div>
                                <label for="phone" class="block text-[0.62rem] font-ui text-pure uppercase tracking-wider font-bold mb-1">Nomor Telepon / WhatsApp</label>
                                <input type="text" x-model="customerPhone" required
                                       class="w-full bg-pitch border border-steel/20 px-3 py-2 text-xs text-pure focus:outline-none focus:border-rgr font-mono"
                                       style="border-radius:0 !important;">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block text-[0.62rem] font-ui text-pure uppercase tracking-wider font-bold mb-1">Alamat Email Pembeli</label>
                            <input type="email" x-model="customerEmail" required
                                   class="w-full bg-pitch border border-steel/20 px-3 py-2 text-xs text-pure focus:outline-none focus:border-rgr font-mono"
                                   style="border-radius:0 !important;">
                        </div>
                        <div class="mt-4">
                            <label for="address" class="block text-[0.62rem] font-ui text-pure uppercase tracking-wider font-bold mb-1">Alamat Lengkap Pengiriman</label>
                            <textarea x-model="shippingAddress" required rows="3"
                                      class="w-full bg-pitch border border-steel/20 px-3 py-2 text-xs text-pure focus:outline-none focus:border-rgr"
                                      style="border-radius:0 !important;" placeholder="Nama jalan, nomor rumah, kelurahan, kecamatan, kota, kode pos..."></textarea>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-display font-bold text-lg text-pure border-b border-steel/10 pb-2 mb-4">2. Ekspedisi Balap</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="border p-4 flex flex-col justify-between cursor-pointer" :class="shippingCourier === 'JNE' ? 'border-rgr bg-rgr/03' : 'border-steel/15 bg-pitch/10'" style="border-radius:0 !important;">
                                <input type="radio" name="courier" value="JNE" x-model="shippingCourier" @change="updateShippingCost()" class="sr-only">
                                <span class="text-xs font-bold text-pure">JNE Logistics</span>
                                <span class="text-[0.65rem] text-muted mt-1 font-body">Pengiriman Reguler (3-5 Hari)</span>
                                <span class="font-mono text-xs font-bold text-rgr mt-3 block">Rp 15.000</span>
                            </label>
                            <label class="border p-4 flex flex-col justify-between cursor-pointer" :class="shippingCourier === 'DHL' ? 'border-rgr bg-rgr/03' : 'border-steel/15 bg-pitch/10'" style="border-radius:0 !important;">
                                <input type="radio" name="courier" value="DHL" x-model="shippingCourier" @change="updateShippingCost()" class="sr-only">
                                <span class="text-xs font-bold text-pure">DHL Express Air</span>
                                <span class="text-[0.65rem] text-muted mt-1 font-body">Pengiriman Udara (1-2 Hari)</span>
                                <span class="font-mono text-xs font-bold text-rgr mt-3 block">Rp 95.000</span>
                            </label>
                            <label class="border p-4 flex flex-col justify-between cursor-pointer" :class="shippingCourier === 'FedEx' ? 'border-rgr bg-rgr/03' : 'border-steel/15 bg-pitch/10'" style="border-radius:0 !important;">
                                <input type="radio" name="courier" value="FedEx" x-model="shippingCourier" @change="updateShippingCost()" class="sr-only">
                                <span class="text-xs font-bold text-pure">FedEx Track Priority</span>
                                <span class="text-[0.65rem] text-muted mt-1 font-body">Kurir Prioritas Sirkuit (Instant)</span>
                                <span class="font-mono text-xs font-bold text-rgr mt-3 block">Rp 120.000</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <h3 class="font-display font-bold text-lg text-pure border-b border-steel/10 pb-2 mb-4">3. Gerbang Pembayaran Midtrans</h3>
                        
                        <div class="p-4 border border-steel/15 bg-pitch/30 text-xs text-muted leading-relaxed font-body" style="border-radius:0 !important;">
                            <p class="font-bold text-pure mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-rgr" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                Transaksi Aman dengan Midtrans Snap
                            </p>
                            Pembayaran Anda akan diproses secara aman menggunakan teknologi enkripsi Midtrans Snap. Anda dapat memilih metode pembayaran seperti Kartu Kredit, Transfer Virtual Account Bank (BCA, Mandiri, BNI, BRI), QRIS/Gopay, Alfamart/Indomaret secara instan.
                        </div>
                    </div>

                    <button type="submit" class="w-full btn-rgr btn-ferrari justify-center text-xs py-3 font-semibold uppercase tracking-wider" :disabled="loading">
                        <span x-show="!loading">BAYAR SEKARANG & SELESAIKAN ORDER</span>
                        <span x-show="loading">MEMPROSES PEMBAYARAN...</span>
                    </button>
                </form>
            </div>

            {{-- Right: Order Summary (5 Cols) --}}
            <div class="lg:col-span-5 bg-carbon border border-steel/15 p-6" style="border-radius:0 !important;">
                <h3 class="font-display font-bold text-lg text-pure mb-4 border-b border-steel/10 pb-2">Ringkasan Pesanan</h3>
                
                <div class="divide-y divide-steel/10 max-h-[300px] overflow-y-auto pr-1 mb-6">
                    <template x-for="item in cart" :key="item.id + (item.customInfo || '')">
                        <div class="py-3 flex justify-between items-start gap-4 text-xs">
                            <div class="flex-1">
                                <h4 class="font-display font-bold text-pure" x-text="item.name"></h4>
                                <p class="text-[0.62rem] text-muted font-mono" x-show="item.customInfo" x-text="item.customInfo"></p>
                                <p class="text-muted font-mono mt-0.5" x-text="'Rp ' + formatPrice(item.price) + ' x ' + item.qty"></p>
                            </div>
                            <span class="font-mono font-bold text-pure" x-text="'Rp ' + formatPrice(item.price * item.qty)"></span>
                        </div>
                    </template>
                </div>

                {{-- Promos --}}
                <div class="mb-6">
                    <label class="block text-[0.62rem] font-ui text-muted uppercase tracking-wider font-bold mb-1">Gunakan Kode Promo</label>
                    <div class="flex gap-2">
                        <input type="text" x-model="promoInput" class="w-full bg-pitch border border-steel/15 px-3 py-2 text-xs font-mono text-pure" style="border-radius:0 !important;" placeholder="Contoh: RGR2026">
                        <button @click="applyPromo()" type="button" class="btn-rgr text-xs font-bold px-4 py-2" style="border-radius:0 !important;">Gunakan</button>
                    </div>
                    <p class="text-[0.62rem] text-emerald-500 font-bold mt-1" x-show="appliedDiscount > 0" x-text="'Kupon ' + appliedPromoName + ' aktif (-' + (appliedDiscount*100) + '%)'"></p>
                </div>

                {{-- Calculation Table --}}
                <div class="space-y-3 pt-4 border-t border-steel/10 text-xs">
                    <div class="flex justify-between font-mono text-muted">
                        <span>Subtotal:</span>
                        <span x-text="'Rp ' + formatPrice(getSubtotal())"></span>
                    </div>
                    <div class="flex justify-between font-mono text-emerald-500" x-show="appliedDiscount > 0">
                        <span>Diskon Promo:</span>
                        <span x-text="'-Rp ' + formatPrice(getDiscountAmount())"></span>
                    </div>
                    <div class="flex justify-between font-mono text-muted">
                        <span>Ongkos Kirim:</span>
                        <span x-text="'Rp ' + formatPrice(shippingCost)"></span>
                    </div>
                    <div class="flex justify-between font-mono font-bold text-pure border-t border-steel/10 pt-3 text-sm">
                        <span>Total Pembayaran:</span>
                        <span x-text="'Rp ' + formatPrice(getTotal())"></span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
function checkoutV2System() {
    return {
        cart: [],
        customerName: "{{ Auth::check() ? Auth::user()->name : '' }}",
        customerEmail: "{{ Auth::check() ? Auth::user()->email : '' }}",
        customerPhone: '',
        shippingAddress: '',
        shippingCourier: 'JNE',
        shippingCost: 15000,
        paymentMethod: 'Simulasi Visa/CC',
        
        // CC Form details
        ccNumber: '',
        ccExpiry: '',
        ccCvv: '',
        
        // Promos
        promoInput: '',
        appliedDiscount: 0,
        appliedPromoName: '',
        
        loading: false,

        initCheckout() {
            const raw = localStorage.getItem('rgr_cart');
            if (raw) {
                try {
                    this.cart = JSON.parse(raw);
                } catch(e) {
                    this.cart = [];
                }
            }
            if (this.cart.length === 0) {
                alert('Keranjang belanja Anda kosong, silakan pilih produk terlebih dahulu.');
                window.location.href = "{{ route('shop') }}";
            }
        },

        updateShippingCost() {
            if (this.shippingCourier === 'JNE') {
                this.shippingCost = 15000;
            } else if (this.shippingCourier === 'DHL') {
                this.shippingCost = 95000;
            } else if (this.shippingCourier === 'FedEx') {
                this.shippingCost = 120000;
            }
        },

        applyPromo() {
            let code = this.promoInput.trim().toUpperCase();
            if (code === 'RGR2026') {
                this.appliedDiscount = 0.20; // 20%
                this.appliedPromoName = 'RGR2026';
            } else if (code === 'INDOPRIDE') {
                this.appliedDiscount = 0.15; // 15%
                this.appliedPromoName = 'INDOPRIDE';
            } else if (code === 'LASER10') {
                this.appliedDiscount = 0.10; // 10%
                this.appliedPromoName = 'LASER10';
            } else {
                alert('Kode kupon promo tidak valid!');
                this.appliedDiscount = 0;
                this.appliedPromoName = '';
            }
        },

        getSubtotal() {
            return this.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        },

        getDiscountAmount() {
            return this.getSubtotal() * this.appliedDiscount;
        },

        getTotal() {
            return this.getSubtotal() - this.getDiscountAmount() + this.shippingCost;
        },

        formatPrice(val) {
            return new Intl.NumberFormat('id-ID').format(val);
        },

        submitOrder() {
            this.loading = true;

            let csrfElement = document.querySelector('meta[name="csrf-token"]');
            let csrfToken = csrfElement ? csrfElement.getAttribute('content') : '';

            let formData = new FormData();
            formData.append('customer_name', this.customerName);
            formData.append('customer_email', this.customerEmail);
            formData.append('customer_phone', this.customerPhone);
            formData.append('shipping_address', this.shippingAddress);
            formData.append('shipping_courier', this.shippingCourier);
            formData.append('shipping_cost', this.shippingCost);
            formData.append('payment_method', 'Midtrans Gateway');
            formData.append('promo_code', this.appliedPromoName);
            formData.append('subtotal', this.getSubtotal());
            formData.append('discount', this.getDiscountAmount());
            formData.append('total', this.getTotal());
            formData.append('cart_items', JSON.stringify(this.cart));

            fetch('{{ route("checkout.place") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                this.loading = false;
                if (data.success && data.snap_token) {
                    // Open Midtrans Snap popup
                    window.snap.pay(data.snap_token, {
                        onSuccess: (result) => {
                            // Clear cart
                            localStorage.removeItem('rgr_cart');
                            window.dispatchEvent(new CustomEvent('storage'));
                            // Redirect to success page
                            window.location.href = data.redirect_url;
                        },
                        onPending: (result) => {
                            // Clear cart
                            localStorage.removeItem('rgr_cart');
                            window.dispatchEvent(new CustomEvent('storage'));
                            // Redirect to success page to see payment status
                            window.location.href = data.redirect_url;
                        },
                        onError: (result) => {
                            alert('Pembayaran gagal dilakukan. Silakan coba kembali.');
                        },
                        onClose: () => {
                            // If closed, we can still redirect to success page to let them pay later or see details
                            window.location.href = data.redirect_url;
                        }
                    });
                } else {
                    alert(data.message || 'Gagal memproses pesanan.');
                }
            })
            .catch(err => {
                this.loading = false;
                console.error(err);
                alert('Terjadi kesalahan koneksi.');
            });
        }
    }
}
</script>
@endsection
