@extends('template.main')

@section('content')
<div class="p-6">
    <!-- Tampilan statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card Statistik diproses, diterima, ditolak -->
        <div class="bg-white rounded-md border border-gray-100 p-6">
            <div class="flex justify-between">
                <div>
                    <div class="text-2xl font-semibold mb-1">{{$diproses}}</div>
                    <div class="text-sm font-medium text-gray-400">Diproses</div>
                </div>                     
                <div class="ri-send-plane-line text-5xl text-yellow-400"></div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6">
            <div class="flex justify-between">
                <div>
                    <div class="text-2xl font-semibold mb-1">{{$diterima}}</div>
                    <div class="text-sm font-medium text-gray-400">Diterima</div>
                </div>                     
                <div class="ri-check-double-fill text-5xl text-green-400"></div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6">
            <div class="flex justify-between">
                <div>
                    <div class="text-2xl font-semibold mb-1">{{$ditolak}}</div>
                    <div class="text-sm font-medium text-gray-400">Ditolak</div>
                </div>                     
                <div class="ri-close-large-fill text-5xl text-red-400"></div>
            </div>
        </div>
        <div class="bg-white rounded-md border border-gray-100 p-6">
            <div class="flex justify-between">
                <div>
                    <div class="text-base font-poppins font-bold mb-1">Panduan Aplikasi</div>
                    <div class="text-sm font-poppins text-gray-400 hover:text-blue-500"><a href="download">Download</a></div>
                </div>                     
                <div class="ri-file-pdf-2-line text-5xl text-black"></div>
            </div>
        </div>
    </div>
</div>

<!-- Tampilan Hasil Survey -->
<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6">
        <h1 class="font-medium mb-6">Hasil Survey</h1>
        <div class="space-y-6">
            @foreach ($questionsData as $questionKey => $choices)
                <p class="font-poppins text-gray-600">{{ $loop->iteration }}. {{ str_replace('_', ' ', $questionKey) }}</p>
                <div class="relative w-full h-96 mb-2 flex items-center justify-center">
                    <canvas id="surveyChart{{ $loop->iteration }}" class="w-full h-full"></canvas>
                </div>
            @endforeach
        </div>
    </div>              
</div>

<!-- Include Chart.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const surveyData = @json($questionsData);

    const labels = [
        "kesesuaian persyaratan pelayanan dengan jenis pelayanannya",
        "kemudahan prosedur pelayanan di unit ini",
        "kecepatan waktu dalam memberikan layanan",
        "kewajaran biaya/tarif dalam pelayanan",
        "kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hal yang diberikan",
        "kompentensi/kemampuan petugas dalam pelayanan",
        "Perilaku petugas dalam pelayanan terkait kesopanan dan keramahan",
        "Kualitas sarana dan prasarana",
        "Penanganan pengaduan pengguna layanan",
        "Pelayanan yang diberikan"
    ];

    Object.keys(surveyData).forEach((questionKey, index) => {
        const ctx = document.getElementById(`surveyChart${index + 1}`).getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(surveyData[questionKey]),
                datasets: [{
                    label: `Hasil Survey: ${labels[index]}`,
                    data: Object.values(surveyData[questionKey]),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 5
                        }
                    }
                }
            }
        });
    });
</script>


@endsection
