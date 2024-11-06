<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BWSKAL III | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="icon" href="{{ asset('img/logo/logolamaa.png') }}" type="image/x-icon">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white shadow-2xl h-full w-full flex">
            <!-- Left Side (Form) -->
            <div class="w-1/2 p-16 flex flex-col justify-center">
                <div class="flex flex-col items-center mb-5">
                    <!-- Logo -->
                    <img src="{{ asset('img/logo/logo lama.png') }}" alt="Logo PUPR" class="h-24 mb-3" />
                    <h2 class="text-3xl font-medium text-gray-700">Selamat Datang</h2>
                    <p class="text-gray-500 text-md">Pelayanan Balai Wilayah Sungai Kalimantan III</p>
                </div>

                <!-- Notification Alert for Errors -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded" role="alert">
                        <strong>Perhatian!</strong> {{ $errors->first() }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        <strong>Sukses!</strong> {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div class="mb-6 w-full">
                        <x-input-label for="email" :value="__('Email')" class="block text-gray-900 text-md"/>
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus class="w-full px-4 py-3 border border-gray-300 rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-gray-400" placeholder="Masukan Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-8 w-full">
                        <x-input-label for="password" :value="__('Password')" class="block text-gray-900 text-md"/>
                        <x-text-input id="password" type="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg text-lg focus:outline-none focus:ring-2 focus:ring-gray-400" placeholder="Masukan Password"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <button type="submit" class="w-full bg-black text-white font-semibold py-3 rounded-lg text-lg hover:bg-gray-800 transition duration-500">
                        {{ __('Log in') }}
                    </button>
                </form>
            </div>

            <!-- Right Side (Swiper Slider for Image) -->
            <div class="w-1/2 bg-black hidden md:block relative">
                <div class="swiper mySwiper h-full">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('img/mountain.jpg') }}" alt="Mountain Image" class="w-full h-full object-cover" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('img/cloud.png') }}" alt="Forest Image" class="w-full h-full object-cover" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('img/green.jpg') }}" alt="Beach Image" class="w-full h-full object-cover" />
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Navigation -->
                    <div class="swiper-button-next text-gray-500 hover:text-gray-600"></div>
                    <div class="swiper-button-prev text-gray-500 hover:text-gray-600"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            speed: 1500,
        });
    </script>
</body>
</html>
