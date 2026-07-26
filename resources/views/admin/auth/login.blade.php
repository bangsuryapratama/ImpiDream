<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Admin — ImpiDream Panel</title>
    <meta name="robots" content="noindex, nofollow">

    <link rel="preload" as="image" type="image/webp" href="{{ asset('assets/logo.webp') }}">
    <link rel="icon" type="image/webp" href="{{ asset('assets/favicon.webp') }}">
    <meta name="theme-color" content="#2E7D64">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #FAFAF8;
            color: #0F172A;
            -webkit-font-smoothing: antialiased;
        }

        .font-heading {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        .shadow-card {
            box-shadow: 0 10px 30px -5px rgba(15, 23, 42, 0.05);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 sm:p-6 selection:bg-[#2E7D64] selection:text-white">

    <div class="w-full max-w-md space-y-8">

        {{-- Header Logo --}}
        <div class="text-center space-y-3">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                <img src="{{ asset('assets/logo.webp') }}" alt="ImpiDream" width="40" height="40" class="h-10 w-auto object-contain" />
                <div class="text-left">
                    <span class="font-extrabold text-2xl tracking-tight text-[#0F172A] block leading-none">ImpiDream</span>
                    <span class="text-[10px] font-bold text-[#2E7D64] uppercase tracking-wider">Admin Panel</span>
                </div>
            </a>
            <p class="text-xs text-slate-500 max-w-xs mx-auto">Masuk ke pusat kendali sistem dengan kredensial administrator</p>
        </div>

        {{-- Flash Alerts --}}
        @if (session('info'))
            <div class="p-4 rounded-2xl bg-blue-50 border border-blue-200 text-blue-800 text-xs font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('info') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-xs font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- Card Form --}}
        <div class="bg-white border border-[#E2E5DF] rounded-3xl p-6 sm:p-8 shadow-card space-y-6">
            <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5">
                @csrf

                {{-- Email Input --}}
                <div class="space-y-2">
                    <label for="email" class="block text-xs font-bold text-[#0F172A] uppercase tracking-wider">Email Administrator</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        placeholder="admin@impidream.id"
                        class="w-full px-4 py-3 bg-[#FAFAF8] border border-[#E2E5DF] rounded-xl text-slate-900 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#2E7D64] focus:border-transparent transition-all" />
                    @error('email')
                        <p class="text-xs font-semibold text-red-600 mt-1 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 fill-current flex-shrink-0" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                {{-- Password Input with Toggle --}}
                <div class="space-y-2">
                    <label for="password" class="block text-xs font-bold text-[#0F172A] uppercase tracking-wider">Kata Sandi</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••••••"
                            class="w-full px-4 py-3 pr-12 bg-[#FAFAF8] border border-[#E2E5DF] rounded-xl text-slate-900 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#2E7D64] focus:border-transparent transition-all" />
                        <button type="button" id="toggle-password" aria-label="Tampilkan Kata Sandi" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-700 p-1 text-xs font-semibold">
                            Lihat
                        </button>
                    </div>
                    @error('password')
                        <p class="text-xs font-semibold text-red-600 mt-1 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 fill-current flex-shrink-0" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                {{-- Checkbox --}}
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2.5 cursor-pointer text-slate-600 hover:text-slate-900">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-[#E2E5DF] text-[#2E7D64] focus:ring-0 cursor-pointer" />
                        <span class="font-medium">Ingat sesi ini</span>
                    </label>
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full py-3.5 px-4 bg-[#2E7D64] hover:bg-[#1B5E4B] text-white font-bold text-sm rounded-xl shadow-sm transition-all active:scale-[0.98]">
                    Masuk ke Admin Panel
                </button>
            </form>
        </div>

        {{-- Footer --}}
        <div class="text-center text-xs text-slate-500 font-medium">
            &copy; {{ date('Y') }} ImpiDream Platform. Enkripsi Sesi Aktif.
        </div>

    </div>

    {{-- Show/Hide Password JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pwdInput = document.getElementById('password');
            const toggleBtn = document.getElementById('toggle-password');

            if (pwdInput && toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    const isPwd = pwdInput.type === 'password';
                    pwdInput.type = isPwd ? 'text' : 'password';
                    toggleBtn.textContent = isPwd ? 'Sembunyi' : 'Lihat';
                });
            }
        });
    </script>

</body>
</html>
