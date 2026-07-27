@extends('layouts.rgr-premium')

@section('title', 'Toko Merchandise Resmi — Mobil 1 Team RG')
@section('meta_description', 'Beli merchandise resmi Mobil 1 Team RG: Topi F1, Jaket Tim, Miniatur Diecast, dan kustomisasi jersey balap Anda sendiri.')

@push('styles')
<style>
.shop-hero {
    position: relative; padding-top: 130px; padding-bottom: 50px;
    background: #0B0D10; overflow: hidden;
}
.shop-hero-grid {
    position: absolute; inset: 0;
    background-image: linear-gradient(rgba(196, 229, 56, 0.02) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(196, 229, 56, 0.02) 1px, transparent 1px);
    background-size: 60px 60px;
}
.shop-card {
    background: linear-gradient(145deg, rgba(255,255,255,0.98), rgba(248,249,250,0.94));
    border: 1px solid rgba(196, 229, 56, 0.08);
    transition: all 0.35s ease;
}
.shop-card:hover {
    border-color: rgba(196, 229, 56, 0.2);
    transform: translateY(-4px);
    box-shadow: 0 20px 45px rgba(0,0,0,0.06);
}
.jersey-preview-box {
    background: radial-gradient(circle at 50% 50%, #1a1a24 0%, #0c0c10 100%);
    border: 1.5px solid rgba(196, 229, 56, 0.3);
    box-shadow: 0 15px 35px rgba(0,0,0,0.4);
}
</style>
@endpush

@section('content')
<div class="min-h-screen bg-pitch" x-data="shopSystem()">
    
    {{-- Hero Section --}}
    <section class="shop-hero">
        <div class="shop-hero-grid"></div>
        <div class="max-w-7xl mx-auto px-6 relative">
            <p class="section-label mb-2 flex items-center gap-3"><span class="w-6 h-px bg-rgr"></span>RG RACING FAN SHOP</p>
            <h1 class="section-title text-5xl lg:text-7xl mb-4">Official Merchandise</h1>
            <p class="text-muted text-lg max-w-2xl leading-relaxed">
                Dukung tim kesayangan Anda dengan merchandise resmi bersertifikat keaslian. Koleksi premium kami dirancang menggunakan material terbaik untuk para penggemar motorsport sejati.
            </p>
        </div>
    </section>

    {{-- Interactive Jersey Customizer --}}
    <section class="py-12 border-b border-steel/20 bg-pitch/40">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <h2 class="font-display font-bold text-2xl text-pure">Pusat Kustomisasi Jersey RGR</h2>
                <p class="text-xs text-muted mt-1">Rancang jersey balap kustom Anda sendiri dengan nama dan nomor punggung pilihan Anda secara real-time.</p>
                <div class="cyan-line my-3"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                {{-- Customizer Controls (5 Cols) --}}
                <div class="lg:col-span-5 space-y-4">
                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">NAMA PADA JERSEY (Maks 12 Huruf)</label>
                        <input type="text" x-model="jerseyName" maxlength="12" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-mono text-pure uppercase rounded focus:outline-none focus:border-rgr transition-colors">
                    </div>

                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">NOMOR BALAP (0 - 99)</label>
                        <input type="number" x-model="jerseyNumber" min="0" max="99" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-mono text-pure rounded focus:outline-none focus:border-rgr transition-colors">
                    </div>

                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">EDISI TEMA WARNA</label>
                        <select x-model="jerseyTheme" class="w-full bg-pitch border border-steel/60 p-3 text-xs font-ui text-pure uppercase tracking-wider rounded focus:outline-none focus:border-rgr transition-colors">
                            <option value="laser">Championship Laser Red</option>
                            <option value="cyan">Classic Cyan Edition</option>
                            <option value="stealth">Stealth Carbon Black</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">UKURAN JERSEY</label>
                        <div class="flex gap-2">
                            <template x-for="sz in ['S', 'M', 'L', 'XL', 'XXL']">
                                <button @click="jerseySize = sz" :class="jerseySize === sz ? 'bg-rgr text-white border-rgr' : 'bg-pitch text-muted border-steel/60'" class="flex-1 py-2 text-xs font-ui border font-bold transition-all" x-text="sz"></button>
                            </template>
                        </div>
                    </div>

                    <button @click="addCustomJersey()" class="btn-rgr text-xs w-full justify-center mt-2">Tambahkan Jersey Kustom ke Keranjang</button>
                </div>

                {{-- Customizer Preview (7 Cols) --}}
                <div class="lg:col-span-7 flex justify-center">
                    <div class="jersey-preview-box w-full max-w-[420px] aspect-[4/5] rounded-xl p-8 relative flex flex-col justify-between overflow-hidden">
                        {{-- Futuristic accents --}}
                        <div class="absolute top-0 right-0 w-24 h-24 bg-rgr/20 rounded-full blur-3xl"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-cyan-500/10 rounded-full blur-3xl"></div>
                        
                        <div class="flex justify-between items-center z-10">
                            <span class="text-[0.55rem] font-ui tracking-widest text-rgr bg-rgr/10 px-2 py-0.5 rounded uppercase font-bold">RGR CUSTOM LAB</span>
                            <span class="font-mono text-xs text-muted" x-text="'SIZE: ' + jerseySize"></span>
                        </div>

                        {{-- Stylized Jersey Back Render --}}
                        <div class="my-auto flex flex-col items-center justify-center text-center relative py-4 z-10">
                            {{-- T-Shirt outline graphic or glow --}}
                            <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none">
                                <svg class="w-64 h-64 fill-current text-white" viewBox="0 0 24 24"><path d="M12 2L4 5v3c0 5.25 3.4 10.15 8 11.5 4.6-1.35 8-6.25 8-11.5V5l-8-3z"/></svg>
                            </div>

                            <p class="font-display font-black text-3xl uppercase tracking-widest leading-none"
                               :class="jerseyTheme === 'laser' ? 'text-rgr' : (jerseyTheme === 'cyan' ? 'text-cyan-400' : 'text-slate-400')"
                               x-text="jerseyName || 'YOUR NAME'"></p>
                            
                            <p class="font-display font-black text-[9rem] leading-none mt-2 select-none tracking-tighter"
                               :class="jerseyTheme === 'laser' ? 'text-white' : (jerseyTheme === 'cyan' ? 'text-cyan-200' : 'text-slate-200')"
                               x-text="jerseyNumber !== '' ? jerseyNumber : '99'"></p>
                        </div>

                        <div class="flex justify-between items-end z-10">
                            <div>
                                <p class="text-[0.5rem] text-faint uppercase font-ui tracking-widest">Harga Kustomisasi</p>
                                <p class="text-xs font-mono font-bold text-pure mt-0.5">Rp 650.000</p>
                            </div>
                            <span class="text-[0.6rem] font-ui text-muted uppercase tracking-wider" x-text="'EDISI: ' + jerseyTheme"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Main Shop Area --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                
                {{-- Left Sidebar: Filters & Mini Cart --}}
                <div class="space-y-6">
                    {{-- Categories Filter --}}
                    <div class="rgr-card p-6">
                        <h3 class="font-display font-bold text-lg text-pure mb-4 uppercase tracking-wider">Kategori Produk</h3>
                        <div class="flex flex-col gap-2">
                            <button @click="activeCategory = 'ALL'" :class="activeCategory === 'ALL' ? 'text-rgr font-bold' : 'text-muted'" class="text-left text-xs uppercase font-ui tracking-wider hover:text-pure transition-colors">Semua Produk</button>
                            <button @click="activeCategory = 'Apparel'" :class="activeCategory === 'Apparel' ? 'text-rgr font-bold' : 'text-muted'" class="text-left text-xs uppercase font-ui tracking-wider hover:text-pure transition-colors">Apparel / Pakaian</button>
                            <button @click="activeCategory = 'Diecast'" :class="activeCategory === 'Diecast' ? 'text-rgr font-bold' : 'text-muted'" class="text-left text-xs uppercase font-ui tracking-wider hover:text-pure transition-colors">Diecast Miniatur</button>
                            <button @click="activeCategory = 'Accessories'" :class="activeCategory === 'Accessories' ? 'text-rgr font-bold' : 'text-muted'" class="text-left text-xs uppercase font-ui tracking-wider hover:text-pure transition-colors">Aksesoris & Lainnya</button>
                        </div>
                    </div>

                    {{-- Mini Shopping Cart (Sticky) --}}
                    <div class="rgr-card p-6 sticky top-28">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-display font-bold text-lg text-pure uppercase tracking-wider">Keranjang</h3>
                            <span class="bg-rgr/10 text-rgr text-[0.68rem] font-bold px-2 py-0.5 rounded font-mono" x-text="cartItemCount() + ' Item'">0 Item</span>
                        </div>
                        
                        <div class="divide-y divide-steel/20 max-h-[200px] overflow-y-auto mb-4 pr-1">
                            <template x-for="item in cart" :key="item.id + (item.customInfo || '')">
                                <div class="py-3 flex justify-between items-start gap-2 text-xs">
                                    <div class="flex-1">
                                        <p class="font-bold text-pure" x-text="item.name"></p>
                                        <p class="text-[0.65rem] text-muted font-mono" x-show="item.customInfo" x-text="item.customInfo"></p>
                                        <p class="text-muted mt-0.5" x-text="'Rp ' + formatPrice(item.price) + ' x ' + item.qty"></p>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <button @click="changeQty(item.id, item.customInfo, -1)" class="w-5 h-5 bg-steel/20 rounded flex items-center justify-center text-pure hover:bg-steel/40 font-bold">-</button>
                                        <button @click="changeQty(item.id, item.customInfo, 1)" class="w-5 h-5 bg-steel/20 rounded flex items-center justify-center text-pure hover:bg-steel/40 font-bold">+</button>
                                    </div>
                                </div>
                            </template>
                            <template x-if="cart.length === 0">
                                <p class="text-muted text-xs py-4 text-center">Keranjang belanja kosong.</p>
                            </template>
                        </div>

                        {{-- Promo Code Input --}}
                        <div class="border-t border-steel/20 pt-4 mb-4">
                            <label class="text-[0.58rem] font-ui text-muted uppercase tracking-wider block mb-1">KODE KUPON PROMO</label>
                            <div class="flex gap-2">
                                <input type="text" x-model="promoInput" class="w-full bg-pitch border border-steel/60 p-2 text-xs font-mono text-pure rounded focus:outline-none">
                                <button @click="applyPromo()" class="px-3 bg-steel/20 border border-steel/40 rounded text-xs text-pure hover:bg-steel/40 font-ui font-bold">Gunakan</button>
                            </div>
                            <p class="text-[0.62rem] mt-1 text-emerald-500 font-bold" x-show="appliedDiscount > 0" x-text="appliedPromoName + ' Aktif (-' + (appliedDiscount * 100) + '%)'"></p>
                        </div>

                        <div class="border-t border-steel/20 pt-4 space-y-3">
                            <div class="flex justify-between text-xs font-mono text-muted">
                                <span>Subtotal:</span>
                                <span x-text="'Rp ' + formatPrice(cartSubtotal())">Rp 0</span>
                            </div>
                            <div class="flex justify-between text-xs font-mono text-emerald-500" x-show="appliedDiscount > 0">
                                <span>Potongan Harga:</span>
                                <span x-text="'-Rp ' + formatPrice(cartDiscountAmount())">-Rp 0</span>
                            </div>
                            <div class="flex justify-between text-xs font-mono font-bold text-pure border-t border-dashed border-steel/20 pt-2">
                                <span>TOTAL:</span>
                                <span x-text="'Rp ' + formatPrice(cartTotal())">Rp 0</span>
                            </div>
                            <button @click="openCheckout()" :disabled="cart.length === 0" class="btn-rgr text-xs w-full justify-center disabled:opacity-40 disabled:cursor-not-allowed">Checkout Sekarang</button>
                        </div>
                    </div>
                </div>

                {{-- Right Grid: Product List --}}
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <template x-for="product in filteredProducts()" :key="product.id">
                            <div class="shop-card p-5 rounded-md flex flex-col justify-between">
                                <div>
                                    <div class="aspect-square bg-steel/05 rounded mb-4 flex items-center justify-center text-faint text-xs font-mono relative overflow-hidden">
                                        <span class="px-2 py-0.5 text-[0.6rem] font-bold bg-rgr/15 text-rgr rounded absolute top-3 left-3" x-text="product.category"></span>
                                        <svg class="w-12 h-12 stroke-[1] text-steel/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                    </div>
                                    <h4 class="font-display font-bold text-pure text-base leading-snug mb-1" x-text="product.name"></h4>
                                    <p class="text-[0.7rem] text-muted leading-relaxed font-body mb-4" x-text="product.desc"></p>
                                </div>
                                <div class="border-t border-steel/10 pt-4 flex justify-between items-center mt-3">
                                    <span class="font-mono text-sm font-bold text-pure" x-text="'Rp ' + formatPrice(product.price)"></span>
                                    <button @click="openProductModal(product)" class="btn-rgr text-[0.68rem] px-3 py-1.5 rounded">Beli / Detail</button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Product Detail & Options Modal --}}
    <div x-show="showProductModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm" style="display: none;">
        <div class="bg-pitch border border-steel/20 rounded-md p-8 max-w-md w-full relative" x-show="selectedProduct">
            <button @click="showProductModal = false" class="absolute top-4 right-4 text-muted hover:text-pure text-xl font-bold">×</button>
            <span class="px-2 py-0.5 text-[0.58rem] font-bold bg-rgr/10 text-rgr rounded uppercase font-ui tracking-wider" x-text="selectedProduct?.category"></span>
            <h3 class="font-display font-bold text-2xl text-pure mt-2 mb-1" x-text="selectedProduct?.name"></h3>
            <p class="text-xs text-muted mb-6" x-text="selectedProduct?.desc"></p>

            <div class="space-y-4 mb-8">
                {{-- Sizes (for Apparel) --}}
                <template x-if="selectedProduct?.category === 'Apparel'">
                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">PILIH UKURAN</label>
                        <div class="flex gap-2">
                            <template x-for="sz in ['S', 'M', 'L', 'XL', 'XXL']">
                                <button @click="selectedSize = sz" :class="selectedSize === sz ? 'bg-rgr text-white border-rgr' : 'bg-pitch text-muted border-steel/60'" class="flex-1 py-1.5 text-xs font-mono border font-bold transition-all" x-text="sz"></button>
                            </template>
                        </div>
                    </div>
                </template>

                {{-- Scale (for Diecast) --}}
                <template x-if="selectedProduct?.category === 'Diecast'">
                    <div>
                        <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">SKALA MINIATUR</label>
                        <div class="flex gap-2">
                            <template x-for="sc in ['1:43', '1:18']">
                                <button @click="selectedScale = sc" :class="selectedScale === sc ? 'bg-rgr text-white border-rgr' : 'bg-pitch text-muted border-steel/60'" class="flex-1 py-1.5 text-xs font-mono border font-bold transition-all" x-text="sc"></button>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <div class="flex justify-between items-center pt-4 border-t border-steel/20">
                <span class="font-mono text-lg font-bold text-pure" x-text="'Rp ' + formatPrice(selectedProduct?.price)"></span>
                <button @click="confirmAddToCart()" class="btn-rgr text-xs">Tambahkan ke Keranjang</button>
            </div>
        </div>
    </div>

    {{-- Checkout Modal --}}
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm" style="display: none;">
        <div class="bg-pitch border border-steel/20 rounded-md p-8 max-w-md w-full relative">
            <h3 class="font-display font-bold text-2xl text-pure mb-2">Simulasi Checkout Fans</h3>
            <p class="text-xs text-muted mb-6">Masukkan data diri untuk memproses pesanan simulasi Anda.</p>

            <form @submit.prevent="submitCheckout()" class="space-y-4">
                <div>
                    <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">NAMA LENGKAP</label>
                    <input type="text" x-model="customerName" required class="w-full bg-steel/05 border border-steel/30 p-2.5 text-xs text-pure rounded focus:outline-none focus:border-rgr" placeholder="Contoh: Budi Santoso">
                </div>
                <div>
                    <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">EMAIL PEMBELI</label>
                    <input type="email" x-model="customerEmail" required class="w-full bg-steel/05 border border-steel/30 p-2.5 text-xs text-pure rounded focus:outline-none focus:border-rgr" placeholder="Contoh: budi@gmail.com">
                </div>
                <div>
                    <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">NOMOR HP / WHATSAPP</label>
                    <input type="text" x-model="customerPhone" required class="w-full bg-steel/05 border border-steel/30 p-2.5 text-xs text-pure rounded focus:outline-none focus:border-rgr" placeholder="Contoh: 08123456789">
                </div>
                <div>
                    <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">ALAMAT LENGKAP PENGIRIMAN</label>
                    <textarea x-model="shippingAddress" required class="w-full bg-steel/05 border border-steel/30 p-2.5 text-xs text-pure rounded focus:outline-none focus:border-rgr h-16" placeholder="Alamat jalan, kota, provinsi, dan kode pos..."></textarea>
                </div>
                <div>
                    <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">KURIR PENGIRIMAN</label>
                    <select x-model="shippingCourier" @change="updateShippingCost()" class="w-full bg-steel/05 border border-steel/30 p-2.5 text-xs text-pure rounded focus:outline-none focus:border-rgr">
                        <option value="JNE">JNE Express (Rp 15.000)</option>
                        <option value="DHL">DHL Express (Rp 95.000)</option>
                        <option value="FedEx">FedEx Premium Air (Rp 120.000)</option>
                    </select>
                </div>
                <div>
                    <label class="text-[0.62rem] font-ui text-muted uppercase tracking-wider block mb-1">METODE PEMBAYARAN SIMULASI</label>
                    <select x-model="paymentMethod" class="w-full bg-steel/05 border border-steel/30 p-2.5 text-xs text-pure rounded focus:outline-none focus:border-rgr">
                        <option value="Simulasi Mandiri/BCA">Simulasi Transfer Bank Mandiri / BCA</option>
                        <option value="Simulasi Visa/CC">Simulasi Kartu Kredit / Visa</option>
                        <option value="Simulasi Gopay">Simulasi Saldo Gopay / OVO</option>
                    </select>
                </div>

                <div class="border-t border-steel/20 pt-4 mt-6 flex justify-end gap-3">
                    <button type="button" @click="showModal = false" class="btn-rgr-ghost text-xs">Batal</button>
                    <button type="submit" class="btn-rgr text-xs">Kirim Pesanan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Order Success Banner --}}
    <div x-show="showSuccess" class="fixed bottom-6 right-6 z-50 bg-emerald-500 text-white px-5 py-3 rounded shadow-lg flex items-center gap-3 text-xs" style="display: none;">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
        <div>
            <p class="font-bold">Pesanan Berhasil Dikirim!</p>
            <p class="opacity-90">Simulasi checkout berhasil diselesaikan.</p>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
function shopSystem() {
    return {
        activeCategory: 'ALL',
        showModal: false,
        showSuccess: false,
        showProductModal: false,
        selectedProduct: null,
        selectedSize: 'M',
        selectedScale: '1:43',
        promoInput: '',
        appliedDiscount: 0,
        appliedPromoName: '',
        
        // Checkout Form State
        customerName: '',
        customerEmail: '',
        customerPhone: '',
        shippingAddress: '',
        shippingCourier: 'JNE',
        shippingCost: 15000,
        paymentMethod: 'Simulasi Mandiri/BCA',

        // Jersey Customizer State
        jerseyName: '',
        jerseyNumber: '99',
        jerseyTheme: 'laser',
        jerseySize: 'L',

        cart: [],
        products: [
            { id: 1, name: 'M1TRG F1 Aero Cap (Edition 2026)', category: 'Apparel', price: 450000, desc: 'Topi aerodinamis resmi F1 dengan bordir 3D logo Mobil 1 Team RG kualitas premium.' },
            { id: 2, name: 'RGR Team Softshell Jacket', category: 'Apparel', price: 1850000, desc: 'Jaket Softshell premium tahan angin & air yang digunakan kru pit-wall.' },
            { id: 3, name: 'RGR Valkyrie-H WEC Miniature', category: 'Diecast', price: 1200000, desc: 'Miniatur diecast skala 1:43 mobil Hypercar pemenang sirkuit Le Mans.' },
            { id: 4, name: 'Mercedes-AMG GT3 M1TRG 1:18 Model', category: 'Diecast', price: 2400000, desc: 'Model diecast presisi tinggi berskala 1:18 dengan livery laser chrome.' },
            { id: 5, name: 'RGR Pit-Wall Carbon Keychain', category: 'Accessories', price: 180000, desc: 'Gantungan kunci serat karbon asli dari sisa sasis mobil balap RGR.' },
            { id: 6, name: 'RGR Official Thermal Bottle', category: 'Accessories', price: 350000, desc: 'Botol air minum vakum termal berbahan stainless steel kualitas medis.' }
        ],

        init() {
            // Load cart from localStorage
            const raw = localStorage.getItem('rgr_cart');
            if (raw) {
                try {
                    this.cart = JSON.parse(raw);
                } catch(e) {
                    this.cart = [];
                }
            }
            // Listen to storage syncs
            window.addEventListener('storage', () => {
                const updatedRaw = localStorage.getItem('rgr_cart');
                if (updatedRaw) {
                    try { this.cart = JSON.parse(updatedRaw); } catch(e) {}
                }
            });
        },

        saveCart() {
            localStorage.setItem('rgr_cart', JSON.stringify(this.cart));
            // Trigger global cart to refresh
            window.dispatchEvent(new CustomEvent('storage'));
        },

        filteredProducts() {
            if (this.activeCategory === 'ALL') return this.products;
            return this.products.filter(p => p.category === this.activeCategory);
        },

        openProductModal(product) {
            this.selectedProduct = product;
            this.selectedSize = 'M';
            this.selectedScale = '1:43';
            this.showProductModal = true;
        },

        confirmAddToCart() {
            let customText = '';
            if (this.selectedProduct.category === 'Apparel') {
                customText = 'Ukuran: ' + this.selectedSize;
            } else if (this.selectedProduct.category === 'Diecast') {
                customText = 'Skala: ' + this.selectedScale;
            }

            const item = {
                id: this.selectedProduct.id,
                name: this.selectedProduct.name,
                price: this.selectedProduct.price,
                qty: 1,
                customInfo: customText
            };

            // Send to global cart via window event
            window.dispatchEvent(new CustomEvent('add-to-cart', { detail: item }));
            
            // Local sync
            let found = this.cart.find(i => i.id === item.id && i.customInfo === item.customInfo);
            if (found) {
                found.qty++;
            } else {
                this.cart.push(item);
            }
            this.saveCart();

            this.showProductModal = false;
        },

        addCustomJersey() {
            let name = this.jerseyName.trim() || 'YOUR NAME';
            let num = this.jerseyNumber !== '' ? this.jerseyNumber : '99';
            let info = 'Kustom: ' + name.toUpperCase() + ' #' + num + ' (' + this.jerseySize + ', ' + this.jerseyTheme.toUpperCase() + ')';
            
            let item = {
                id: 999, // Custom Jersey ID
                name: 'M1TRG Custom Jersey',
                price: 650000,
                qty: 1,
                customInfo: info
            };

            // Send to global cart via window event
            window.dispatchEvent(new CustomEvent('add-to-cart', { detail: item }));

            // Local sync
            let found = this.cart.find(i => i.id === item.id && i.customInfo === item.customInfo);
            if (found) {
                found.qty++;
            } else {
                this.cart.push(item);
            }
            this.saveCart();

            // alert banner simulation
            this.showSuccess = true;
            setTimeout(() => this.showSuccess = false, 3000);
        },

        changeQty(id, customInfo, delta) {
            let found = this.cart.find(item => item.id === id && item.customInfo === customInfo);
            if (found) {
                found.qty += delta;
                if (found.qty <= 0) {
                    this.cart = this.cart.filter(item => !(item.id === id && item.customInfo === customInfo));
                }
            }
            this.saveCart();
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

        updateShippingCost() {
            if (this.shippingCourier === 'JNE') {
                this.shippingCost = 15000;
            } else if (this.shippingCourier === 'DHL') {
                this.shippingCost = 95000;
            } else if (this.shippingCourier === 'FedEx') {
                this.shippingCost = 12000;
            }
        },

        cartItemCount() {
            return this.cart.reduce((sum, item) => sum + item.qty, 0);
        },

        cartSubtotal() {
            return this.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
        },

        cartDiscountAmount() {
            return this.cartSubtotal() * this.appliedDiscount;
        },

        cartTotal() {
            return this.cartSubtotal() - this.cartDiscountAmount();
        },

        formatPrice(val) {
            return new Intl.NumberFormat('id-ID').format(val);
        },

        openCheckout() {
            window.location.href = "{{ route('shop.checkout-v2') }}";
        }
    }
}
</script>
@endpush
