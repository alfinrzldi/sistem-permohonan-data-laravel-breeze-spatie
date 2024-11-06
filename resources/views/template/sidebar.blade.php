<!-- Start Sidebar -->
<div class="fixed left-0 top-0 w-64 h-full bg-white p-4 z-50 transform transition-transform -translate-x-full md:translate-x-0 sidebar-menu">
    <a href="#home">
        <div class="flex items-center justify-center">
            <img class="w-32" src="{{ asset('img/logo/logolamaa.png') }}" alt="Logo-instansi">
        </div>
    </a>
    <ul class="mt-3">
        @if (auth()->user()->hasRole('super-admin'))
        <li class="font-poppins mb-1 group">
            <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-2 text-gray-600 hover:bg-gray-300 hover:text-gray-800 rounded-full {{ request()->routeIs('dashboard') ? 'bg-gray-300 text-blue-900' : '' }}">
                <i class="ri-computer-line mr-3 text-lg"></i>
                <span class="font-bold">Dashboard</span>
            </a>
        </li>
        @endif
        <li class="font-bold font-poppins mb-1">
            PELAYANAN
        </li>
        <li class="font-poppins mb-1 group">
            <a href="{{ route('permohonan.index') }}" class="flex items-center px-2 py-2 text-gray-600 hover:bg-gray-300 hover:text-gray-800 rounded-full {{ request()->routeIs('permohonan.create') ? 'bg-gray-300 text-blue-900' : '' }}">
                <i class="ri-foggy-line mr-1 text-lg"></i>
                <span class="font-bold from-neutral-950">Permohonan</span>
            </a>
        </li>

        @if (auth()->user()->hasRole('super-admin'))
        <li class="font-poppins mb-1 group relative">
            <button onclick="toggleDropdown()" class="flex items-center px-2 py-2 w-full text-left text-gray-600 hover:bg-gray-300 hover:text-gray-800 rounded-full {{ request()->routeIs('user.index') ? 'bg-gray-300 text-blue-900' : '' }}">
                <i class="ri-team-line mr-3 text-lg"></i>
                <span class="font-bold">Manajemen Akun</span>
                <i class="ri-arrow-down-s-line ml-auto"></i>
            </button>
            <!-- Dropdown Content -->
            <ul id="dropdownMenu" class="hidden mt-1 bg-white rounded-md shadow-lg">
                <li>
                    <a href="{{ route('user.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200 rounded">Daftar Pengguna</a>
                </li>
                <li>
                    <a href="{{ route('role.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200 rounded">Kelola Role</a>
                </li>
                <li>
                    <a href="{{ route('permission.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200 rounded">Kelola Permission</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</div>
<div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay hidden"></div>
<!-- End Sidebar -->

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdownMenu');
        dropdown.classList.toggle('hidden');
    }
</script>
