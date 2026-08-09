@extends('layouts.app')

@section('title', 'Kalkulator Menabung Harian Presisi — ImpiDream')
@section('meta_description', 'Hitung alokasi menabung harian, bulanan, dan estimasi waktu pencapaian impian finansialmu secara instan dan presisi.')
@section('canonical_url', route('calculator'))

@section('content')
<div class="py-12 sm:py-16 bg-[#FAFAF8] dark:bg-slate-950 transition-colors duration-300">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Title --}}
        <div class="text-center space-y-4 mb-12">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-emerald-50 text-[#2E7D64] dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-200/60 dark:border-emerald-800/60">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                Kalkulator Impian Interaktif
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                Simulasikan Target Menabung Harianmu
            </h1>
            <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base max-w-xl mx-auto">
                Masukkan nama impian dan estimasi harga barang untuk mengetahui berapa alokasi menabung presisi yang kamu butuhkan setiap hari.
            </p>
        </div>

        {{-- Main Calculator Grid Card --}}
        <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-3xl p-6 sm:p-10 shadow-xl shadow-slate-200/50 dark:shadow-none space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                {{-- Left Form Inputs --}}
                <div class="space-y-5">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#2E7D64]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Rincian Impian
                    </h3>

                    {{-- Item Name --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5 uppercase tracking-wider">Nama Barang / Impian</label>
                        <input type="text" id="calcItemName" placeholder="Contoh: MacBook Air M2 / Honda Vario 160" value="MacBook Air M2 256GB" 
                            class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-[#2E7D64] focus:border-transparent transition-all outline-none">
                    </div>

                    {{-- Item Price --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5 uppercase tracking-wider">Estimasi Harga (Rp)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-sm font-bold text-[#2E7D64]">Rp</span>
                            <input type="text" id="calcItemPrice" placeholder="16.000.000" value="16.000.000" 
                                class="w-full pl-11 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-900 dark:text-white text-sm font-bold focus:ring-2 focus:ring-[#2E7D64] focus:border-transparent transition-all outline-none">
                        </div>
                    </div>

                    {{-- Target Months Slider --}}
                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Target Waktu (Bulan)</label>
                            <span id="calcMonthsDisplay" class="text-sm font-bold text-[#2E7D64] bg-emerald-50 dark:bg-emerald-950/60 px-2.5 py-0.5 rounded-lg border border-emerald-200/60 dark:border-emerald-800/60">10 Bulan</span>
                        </div>
                        <input type="range" id="calcMonthsRange" min="1" max="36" value="10" 
                            class="w-full accent-[#2E7D64] cursor-pointer">
                        <div class="flex justify-between text-[11px] text-slate-400 mt-1">
                            <span>1 Bulan</span>
                            <span>18 Bulan</span>
                            <span>36 Bulan</span>
                        </div>
                    </div>

                    {{-- Category Selector --}}
                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5 uppercase tracking-wider">Kategori Impian</label>
                        <select id="calcCategory" class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-900 dark:text-white text-sm focus:ring-2 focus:ring-[#2E7D64] outline-none">
                            <option value="Elektronik" selected>Gadget & Produktivitas</option>
                            <option value="Kendaraan">Kendaraan & Mobilitas</option>
                            <option value="Travel & Liburan">Travel & Liburan</option>
                            <option value="Life Milestone">Momen & Pernikahan</option>
                            <option value="Umum">Kebutuhan Lainnya</option>
                        </select>
                    </div>
                </div>

                {{-- Right Calculation Result Banner --}}
                <div class="bg-gradient-to-br from-[#2E7D64] to-[#1d5242] text-white rounded-2xl p-6 sm:p-8 flex flex-col justify-between shadow-lg relative overflow-hidden">
                    
                    {{-- Decorative Background --}}
                    <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="space-y-6 relative z-10">
                        <div class="flex items-center justify-between border-b border-white/20 pb-4">
                            <span class="text-xs font-medium text-emerald-100 uppercase tracking-wider">Hasil Kalkulasi Presisi</span>
                            <span id="resultCategoryBadge" class="text-[10px] font-bold bg-white/20 px-2.5 py-1 rounded-full text-white backdrop-blur-sm">Elektronik</span>
                        </div>

                        <div>
                            <p class="text-xs text-emerald-100 font-medium">Kebutuhan Menabung Harian:</p>
                            <h2 id="resultDailyTarget" class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight mt-1">Rp 53.334</h2>
                            <p class="text-[11px] text-emerald-200 mt-1">/ hari selama 300 hari (~10 bulan)</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 pt-2">
                            <div class="bg-white/10 backdrop-blur-md rounded-xl p-3 border border-white/10">
                                <span class="text-[10px] text-emerald-200 font-medium block">Target Bulanan:</span>
                                <span id="resultMonthlyTarget" class="text-base font-bold text-white">Rp 1.600.000</span>
                            </div>
                            <div class="bg-white/10 backdrop-blur-md rounded-xl p-3 border border-white/10">
                                <span class="text-[10px] text-emerald-200 font-medium block">Total Hari:</span>
                                <span id="resultTotalDays" class="text-base font-bold text-white">300 Hari</span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/20 relative z-10 space-y-3">
                        <div class="flex items-center gap-2 text-xs text-emerald-100">
                            <svg class="w-4 h-4 text-emerald-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>100% Menabung Mandiri Tanpa Bunga & Utang</span>
                        </div>
                        <a href="{{ route('home') }}#download" class="w-full inline-flex items-center justify-center gap-2 py-3 px-6 bg-white text-[#2E7D64] hover:bg-emerald-50 rounded-xl font-bold text-sm shadow-md transition-all">
                            <span>Mulai Rencana Impian Ini</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const itemName = document.getElementById('calcItemName');
    const itemPrice = document.getElementById('calcItemPrice');
    const monthsRange = document.getElementById('calcMonthsRange');
    const monthsDisplay = document.getElementById('calcMonthsDisplay');
    const category = document.getElementById('calcCategory');

    const resultDailyTarget = document.getElementById('resultDailyTarget');
    const resultMonthlyTarget = document.getElementById('resultMonthlyTarget');
    const resultTotalDays = document.getElementById('resultTotalDays');
    const resultCategoryBadge = document.getElementById('resultCategoryBadge');

    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(number);
    }

    function parsePrice(str) {
        return parseFloat(str.replace(/[^0-9]/g, '')) || 0;
    }

    function recalculate() {
        const price = parsePrice(itemPrice.value);
        const months = parseInt(monthsRange.value) || 1;
        const totalDays = months * 30;

        monthsDisplay.textContent = months + ' Bulan';
        resultTotalDays.textContent = totalDays + ' Hari';
        resultCategoryBadge.textContent = category.value;

        if (price > 0 && months > 0) {
            const daily = Math.ceil(price / totalDays);
            const monthly = Math.ceil(price / months);

            resultDailyTarget.textContent = formatRupiah(daily);
            resultMonthlyTarget.textContent = formatRupiah(monthly);
        } else {
            resultDailyTarget.textContent = 'Rp 0';
            resultMonthlyTarget.textContent = 'Rp 0';
        }
    }

    itemPrice.addEventListener('input', function (e) {
        let raw = parsePrice(e.target.value);
        if (raw > 0) {
            e.target.value = new Intl.NumberFormat('id-ID').format(raw);
        }
        recalculate();
    });

    monthsRange.addEventListener('input', recalculate);
    category.addEventListener('change', recalculate);

    recalculate();
});
</script>
@endsection
