<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | GIS Indonesia</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo1.png') }}">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="flex flex-col md:flex-row bg-green-600 border border-green-800 rounded-2xl shadow-xl max-w-4xl w-full overflow-hidden">
        
        <!-- Logo di Kiri -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 bg-green-700">
            <img src="{{ asset('assets/images/logo/logo-03-2.png') }}" alt="Logo" class="max-w-xs">
        </div>

        <!-- Form Login di Kanan -->
        <div class="w-full md:w-1/2 p-8 bg-white">
            <h1 class="text-3xl font-bold text-green-700 mb-6 text-center">Masuk ke Akun </h1>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-green-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-2 border border-green-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 text-sm">
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-green-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border border-green-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 text-sm">
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CAPTCHA -->
                <div class="mb-4">
                    <label for="captcha" class="block text-sm font-medium text-green-700 mb-1">Kode Captcha</label>
                    
                    <div class="flex items-center gap-3 mb-2">
                        <!-- Gambar captcha -->
                        <img src="{{ captcha_src() }}" id="captcha-img" class="h-12 rounded border border-green-300">
                
                        <!-- Tombol refresh -->
                        <button type="button"
                                class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition"
                                onclick="refreshCaptcha()">
                            ⟳
                        </button>
                    </div>
                
                    <input type="text" name="captcha" id="captcha"
                        class="w-full px-4 py-2 border border-green-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-500 text-sm"
                        placeholder="Masukkan kode di atas" required>
                
                    @error('captcha')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <script>
                    function refreshCaptcha() {
                        const captcha = document.getElementById('captcha-img');
                        // tambahkan query random untuk mencegah cache
                        captcha.src = '{{ url("captcha") }}?t=' + Date.now();
                    }
                </script>
                
                

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center text-sm text-gray-700">
                        <input type="checkbox" name="remember" class="rounded border-green-300 text-green-600 shadow-sm focus:ring-green-500">
                        <span class="ml-2">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-green-600 hover:underline">Lupa password?</a>
                    @endif
                </div>

                <!-- Login Button -->
                <div>
                    <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-md shadow-sm transition text-lg">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
