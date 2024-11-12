@extends('template.main')

@section('content')

<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Permohonan Data</h1>
    <p class="font-poppins text-gray-400">Permohonan data balai wilayah sungai Kalimantan III Banjarmasin</p>
</div>

<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <a href="{{ route('permohonan.create') }}" class="font-medium w-40 h-10 mt-1 px-3 py-2 bg-blue-700 border shadow-sm border-blue-800 block rounded-md sm:text-sm text-white hover:bg-blue-900 hover:text-white">
                Buat Permohonan
            </a>
        </div>
        @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin'))
            <form method="GET" action="{{ route('permohonan.index') }}" class="mt-4 mb-4">
                <div class="flex space-x-2">
                    <select name="status" class="border rounded-md p-3">
                        <option value="">Semua Status</option>
                        <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    </select>
                    <button type="submit" class="px-4 py-2 bg-blue-700 border shadow-sm border-blue-800 block rounded-md sm:text-sm text-white hover:bg-blue-900 hover:text-white">Cari</button>
                </div>
            </form>
        @endif
    </div>

    <!-- Table -->
    <div class="overflow-x-auto mt-5">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dibuat Pada</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Selesai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail</th>
                    @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin') || auth()->user()->hasRole('pengelola-permohonan'))
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Update</th>
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($permohonan as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $status_class = 'text-blue-700';
                            $bg_class = 'bg-blue-300';
                            switch ($item->status) {
                                case 'Diproses':
                                    $status_class = 'text-yellow-600';
                                    $bg_class = 'bg-yellow-300';
                                    break;
                                case 'Diterima':
                                    $status_class = 'text-green-600';
                                    $bg_class = 'bg-green-300';
                                    break;
                                case 'Ditolak':
                                    $status_class = 'text-red-600';
                                    $bg_class = 'bg-red-300';
                                    break;
                            }
                        @endphp
                        <span class="font-medium {{ $status_class }} {{ $bg_class }} bg-opacity-30 p-1 rounded">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->waktu_selesai ?? 'Tidak ada waktu' }}</td>

                    <!-- Kolom Detail dan Download untuk Pemohon -->
                    @if(auth()->user()->hasRole('role:pemohon'))
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('permohonan.show', $item->id) }}" class="text-stone-700 hover:underline">
                            <i class="ri-eye-line"></i> Detail
                        </a>
                        @if($item->file_upload) <!-- Cek jika file sudah diupload -->
                            <br>
                            <a href="{{ route('permohonan.download', $item->id) }}" class="text-purple-500 hover:underline">
                                <i class="ri-download-cloud-line"></i> Download
                            </a>
                        @endif
                    </td>
                @endif
                
                @if(auth()->user()->hasRole('super-admin') || auth()->user()->hasRole('admin') || auth()->user()->hasRole('pengelola-permohonan'))
                <!-- Aksi untuk admin -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('permohonan.updateStatus', ['id' => $item->id, 'status' => 'Diproses']) }}" class="text-orange-400 hover:underline">
                        <i class="ri-reset-right-line"></i> Diproses
                    </a>
                    <br>
                    <a href="{{ route('permohonan.updateStatus', ['id' => $item->id, 'status' => 'Diterima']) }}" class="text-green-600 hover:underline">
                        <i class="ri-checkbox-circle-line"></i> Diterima
                    </a>
                    <br>
                    <a href="{{ route('permohonan.updateStatus', ['id' => $item->id, 'status' => 'Ditolak']) }}" class="text-red-600 hover:underline">
                        <i class="ri-close-circle-line"></i> Ditolak
                    </a>
                    <br>
                    <!-- Tombol upload dengan validasi warna -->
                    <a href="{{ route('permohonan.uploadForm', $item->id) }}"
                        class="hover:underline {{ $item->file_upload ? 'text-green-600' : 'text-blue-600' }}">
                        <i class="ri-upload-cloud-line"></i> Upload
                    </a>
                </td>
            
                <!-- Kolom Update untuk admin -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('permohonan.show', $item->id) }}" class="text-stone-700 hover:underline"><i class="ri-eye-line"></i> Detail</a>
                    <br>
                    <a href="{{ route('permohonan.edit', $item->id) }}" class="text-amber-600 hover:underline"><i class="ri-edit-2-line"></i> Edit</a>
                    <br>
                    <form action="{{ route('permohonan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permohonan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">
                            <i class="ri-delete-bin-line"></i> Hapus
                        </button>
                    </form>
                </td>
            @else
                <!-- Aksi untuk role selain admin atau super-admin -->
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('permohonan.show', $item->id) }}" class="text-stone-700 hover:underline"><i class="ri-eye-line"></i> Detail</a>
                    @if($item->file_upload) <!-- Cek jika file sudah diupload -->
                        <br>
                        <a href="{{ route('permohonan.download', $item->id) }}" class="text-purple-500 hover:underline">
                            <i class="ri-download-cloud-line"></i> Download
                        </a>
                    @endif
                </td>
            @endif            
                </tr>
                @endforeach
            </tbody>                
        </table>
    </div>
</div>

@endsection
