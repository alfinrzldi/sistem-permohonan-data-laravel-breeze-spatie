@extends('template.main')

@section('content')

<div class="p-6">
    <h1 class="font-poppins font-bold text-2xl">Detail Permohonan</h1>
</div>

<div class="px-2 py-1">
    <div class="bg-white rounded-md border border-gray-600 shadow-lg p-6">
        <div class="space-y-6">
            <div class="mb-4">
                <label class="font-medium">Nama Lengkap:</label>
                <p class="text-gray-700">{{ $permohonan->nama_lengkap }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Email:</label>
                <p class="text-gray-700">{{ $permohonan->email }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Nomor Identitas:</label>
                <p class="text-gray-700">{{ $permohonan->nomor_iden }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Alamat:</label>
                <p class="text-gray-700">{{ $permohonan->alamat }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Telephone:</label>
                <p class="text-gray-700">{{ $permohonan->telphone }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Pekerjaan:</label>
                <p class="text-gray-700">{{ $permohonan->pekerjaan }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">File Identitas:</label>
                <p>
                    <a href="{{ asset('storage/' . $permohonan->file_identitas) }}" target="_blank" class="text-blue-600 hover:underline">Lihat File</a>
                </p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Nama Perusahaan:</label>
                <p class="text-gray-700">{{ $permohonan->nama_perusahaan }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Alamat Perusahaan:</label>
                <p class="text-gray-700">{{ $permohonan->alamat_perusahaan }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Rincian Informasi:</label>
                <p class="text-gray-700">{{ $permohonan->rincian_informasi }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Jenis Informasi:</label>
                <p class="text-gray-700">{{ $permohonan->jenis_informasi ?? 'Tidak ada' }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Jenis Lainnya:</label>
                <p class="text-gray-700">{{ $permohonan->informasi_lainnya ?? 'Tidak ada informasi lainnya' }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Tujuan Penggunaan:</label>
                <p class="text-gray-700">{{ $permohonan->tujuan_penggunaan ?? 'Tidak Ada' }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Tujuan Lainnya   :</label>
                <p class="text-gray-700">{{ $permohonan->tujuan_lainnya ?? 'Tidak ada tujuan lainnya' }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Waktu Masuk:</label>
                <p class="text-gray-700">{{ $permohonan->created_at }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Waktu Selesai:</label>
                <p class="text-gray-700">{{ $permohonan->waktu_selesai }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Status:</label>
                @php
                    // Menentukan warna berdasarkan status
                    $status_class = 'text-blue-700'; // Default
                    $bg_class = 'bg-blue-300'; // Default background color
                    switch ($permohonan->status) {
                        case 'Diproses':
                            $status_class = 'text-yellow-600';
                            $bg_class = 'bg-yellow-300'; // Background untuk 'Diproses'
                            break;
                        case 'Diterima':
                            $status_class = 'text-green-600';
                            $bg_class = 'bg-green-300'; // Background untuk 'Diterima'
                            break;
                        case 'Ditolak':
                            $status_class = 'text-red-600';
                            $bg_class = 'bg-red-300'; // Background untuk 'Ditolak'
                            break;
                    }
                @endphp
                <span class="font-medium {{ $status_class }} {{ $bg_class }} bg-opacity-30 p-1 rounded">
                    {{ $permohonan->status }}
                </span>
            </div>
        </div>
        <div class="mt-6 flex justify-start">
            <a class="bg-blue-500 p-2 pl-7 pr-7 hover:bg-blue-800 duration-200 text-white font-bold rounded-md" href="{{ route('permohonan.index') }}">Kembali</a>
        </div>
    </div>
</div>

@endsection
