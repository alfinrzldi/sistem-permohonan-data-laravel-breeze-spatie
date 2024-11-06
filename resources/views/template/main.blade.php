<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/style.css">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo/logolamaa.png') }}" type="image/x-icon"> <!-- Ganti path sesuai lokasi favicon -->
    
    <title>Pelayanan | Balai Wilayah Sungai Kalimantan III</title> <!-- Static title -->
</head>
<body>
 <!-- Start Main -->
 <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-100 min-h-screen border-l border-gray-100 font-poppins transition-all">
    @include('template.sidebar') <!-- Sidebar -->

   <!-- Navbar Start -->
   <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-gray-400 sticky top-0 left-0 z-30">
    <button type="button" class="text-2xl text-gray-600 sidebar-toggle">
        <i class="ri-menu-line"></i>
    </button>
    <ul class="flex items-center text-base ml-4 ">
        <li class="font-poppins mr-2">
            <a href="{{route('dashboard')}}" class="text-xl ri-home-2-line hover:text-gray-500">Home</a>
        </li>
        <li class="mr-2">
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-xl ri-logout-box-r-line font-poppins hover:text-gray-500">
                    Keluar
                </button>
            </form>
        </li>
    </ul>

    <ul class="ml-auto flex items-center">
        <li class="dropdown mr-2">
            <button type="button" class="dropdown-toggle text-gray-400 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-50 hover:text-gray-600">
                <i class="ri-notification-3-line"></i>
            </button>
            <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                    <button type="button" data-tab="notification" data-tab-page="notifications" class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                </div>
                <div class="my-2"> 
                    <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                            {{-- <li>
                                <a href="{{ route('permohonan.show', $notification->data['permohonan_id']) }}" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                    <div class="ml-2">
                                        <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">
                                            {{ $notification->data['message'] }}
                                        </div>
                                        <div class="text-[11px] text-gray-400">
                                            Status: {{ $notification->data['status'] }}
                                        </div>
                                    </div>
                                </a>
                            </li> --}}
                     
                        {{-- @if (auth()->user()->unreadNotifications->isEmpty())
                            <li class="py-2 px-4 text-gray-500 text-[13px]">
                                Tidak ada notifikasi baru.
                            </li>
                        @endif --}}
                    </ul>
                </div>
            </div> 
        </li> 
    </ul>
    
        {{-- <!-- Tombol Fullscreen -->
       {{-- <li class="mr-4">
            <button id="fullscreen-toggle" class="text-gray-400 hover:text-gray-600">
                <i class="ri-fullscreen-line"></i>
            </button> --}}
        {{-- </li>  --}}
             {{-- <li class="mr-2">
                <button type="button">
                    @if (Auth::check())
                    <img src="{{ asset('storage/' . Auth::user()->photos) }}" alt="User Photo" class="w-8 h-8 rounded block object-cover align-middle">
                    @endif
                </button>
            </li> --}}
   
</div>
<!-- Navbar End -->

    <!-- Dynamic Content Section -->
    <div class="p-6">
        @yield('content') <!-- Tempat untuk konten dinamis -->
    </div>

</main>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebarMenu = document.querySelector('.sidebar-menu');
    const sidebarOverlay = document.querySelector('.sidebar-overlay');

    sidebarToggle.addEventListener('click', function () {
        sidebarMenu.classList.toggle('-translate-x-full'); // Buka/tutup sidebar
        sidebarOverlay.classList.toggle('hidden'); // Tampilkan/sembunyikan overlay
    });

    // Klik overlay untuk menutup sidebar
    sidebarOverlay.addEventListener('click', function () {
        sidebarMenu.classList.add('-translate-x-full'); // Menutup sidebar
        sidebarOverlay.classList.add('hidden'); // Menyembunyikan overlay
    });
});

</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
