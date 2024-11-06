@extends('template.main')

@section('content')
{{-- 
@if (Auth::check())
        <h1 class="ml-10 font-extrabold text-gray-700 text-transform: uppercase "> Halo {{Auth::user()->name}}, Anda Berhasil Login </h1>
        @endif --}}

<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-md border border-gray-100 p-6">
            <div class="flex justify-between">
                <div>
                    <div class="text-2xl font-semibold mb-1">{{$diproses}}</div>
                    <div class="text-sm font-medium text-gray-400">Diproses</div>
                </div>                     
                <div class="ri-send-plane-line text-5xl text-yellow-400 ">
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6">
            <div class="flex justify-between">
                <div>
                    <div class="text-2xl font-semibold mb-1">{{$diterima}}</div>
                    <div class="text-sm font-medium text-gray-400">Diterima</div>
                </div>                     
                <div class="ri-check-double-fill text-5xl text-green-400 ">
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6">
            <div class="flex justify-between">
                <div>
                    <div class="text-2xl font-semibold mb-1">{{$ditolak}}</div>
                    <div class="text-sm font-medium text-gray-400">Ditolak</div>
                </div>                     
                <div class="ri-close-large-fill text-5xl text-red-400 ">
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6">
            <div class="flex justify-between">
                <div>
                    <div class="text-base font-poppins font-bold mb-1">Panduan Aplikasi</div>
                    <div class="text-sm font-poppins text-gray-400 hover:text-blue-500"><a href="dowonload">Download</a></div>
                </div>                     
                <div class="ri-file-pdf-2-line text-5xl text-black ">
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-5">
        <div class="bg-white rounded-md border border-gray-100 p-6">
            <div class="flex justify-between">
                <div>
                    <div class="text-2xl font-semibold mb-1">0</div>
                    <div class="text-sm font-medium text-gray-400">Pesan Masuk</div>
                </div>                     
                <div class="ri-folders-line text-5xl text-blue-800 ">
                </div>
            </div>
        </div>
    </div> --}}
</div>
<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6">
        <div class="p-6">
            <h1 class="font-medium mb-6">Hasil Survey</h1>
            <div class="space-y-6">
                <!-- Survey Chart 1 -->
                <p class="font-poppins text-gray-600">1. Jawaban Survey no.1</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart1" class="w-full h-full"></canvas>
                </div>
                
                <!-- Survey Chart 2 -->
                <p class="font-poppins text-gray-600">2. Jawaban Survey no.2</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart2" class="w-full h-full"></canvas>
                </div>
    
                <!-- Survey Chart 3 -->
                <p class="font-poppins text-gray-600">3. Jawaban Survey no.3</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart3" class="w-full h-full"></canvas>
                </div>
    
                <!-- Survey Chart 4 -->
                <p class="font-poppins text-gray-600">4. Jawaban Survey no.4</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart4" class="w-full h-full"></canvas>
                </div>
    
                <!-- Survey Chart 5 -->
                <p class="font-poppins text-gray-600">5. Jawaban Survey no.5</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart5" class="w-full h-full"></canvas>
                </div>
    
                <!-- Survey Chart 6 -->
                <p class="font-poppins text-gray-600">6. Jawaban Survey no.6</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart6" class="w-full h-full"></canvas>
                </div>
    
                <!-- Survey Chart 7 -->
                <p class="font-poppins text-gray-600">7. Jawaban Survey no.7</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart7" class="w-full h-full"></canvas>
                </div>
    
                <!-- Survey Chart 8 -->
                <p class="font-poppins text-gray-600">8. Jawaban Survey no.8</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart8" class="w-full h-full"></canvas>
                </div>
    
                <!-- Survey Chart 9 -->
                <p class="font-poppins text-gray-600">9. Jawaban Survey no.9</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart9" class="w-full h-full"></canvas>
                </div>
    
                <!-- Survey Chart 10 -->
                <p class="font-poppins text-gray-600">10. Jawaban Survey no.10</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart10" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>              
    </div>
</div>
@endsection