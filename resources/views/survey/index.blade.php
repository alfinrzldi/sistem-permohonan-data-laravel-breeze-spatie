    @extends('template.main')

    @section('content')
    <!-- Konten -->
    <div class="p-6">
        <h1 class="font-poppins font-bold text-xl">Form Survey Pelayanan</h1>
        <p class="font-poppins text-gray-400">Diharapkan  user mengisi survey dengan lengkap </p>
    </div>
    <div class="px-6 py-2">
        <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6"> 
            <form method="POST" action="{{ route('survey.store') }}">
                @csrf
                <!-- Pertanyaan 1 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        1. Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question1-option1" name="0" value="Tidak Sesuai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question1-option1" class="ml-2 font-poppins text-sm text-slate-700">Tidak Sesuai</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question1-option2" name="0" value="Cukup Sesuai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question1-option2" class="ml-2 font-poppins text-sm text-slate-700">Cukup Sesuai</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question1-option3" name="0" value="Sesuai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question1-option3" class="ml-2 font-poppins text-sm text-slate-700">Sesuai</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question1-option4" name="0" value="Sangat Sesuai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question1-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Sesuai</label>
                        </div>
                    </div>
                </label>

                <!-- Pertanyaan 2 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        2. Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question2-option1" name="1" value="Tidak Mudah" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question2-option1" class="ml-2 font-poppins text-sm text-slate-700"> Sangat Tidak Mudah</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question2-option2" name="1" value="Cukup Mudah" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question2-option2" class="ml-2 font-poppins text-sm text-slate-700"> Cukup Mudah</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question2-option3" name="1" value="Mudah" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question2-option3" class="ml-2 font-poppins text-sm text-slate-700"> Mudah</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question2-option4" name="1" value="Sangat Mudah" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question2-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Mudah</label>
                        </div>
                    </div>
                </label>

                <!-- Pertanyaan 3 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        3. Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question3-option1" name="2" value="Tidak Cukup Cepat" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question3-option1" class="ml-2 font-poppins text-sm text-slate-700"> Tidak Cukup Cepat</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question3-option2" name="2" value="Cukup Cepat" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question3-option2" class="ml-2 font-poppins text-sm text-slate-700"> Cukup Cepat</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question3-option3" name="2" value="Cepat" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question3-option3" class="ml-2 font-poppins text-sm text-slate-700"> Cepat</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question3-option4" name="2" value="Sangat Cepat" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question3-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Cepat</label>
                        </div>
                    </div>
                </label>

                <!-- Pertanyaan 4 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        4. Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question4-option1" name="3" value="Sangat Mahal" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question4-option1" class="ml-2 font-poppins text-sm text-slate-700"> Sangat Mahal</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question4-option2" name="3" value="Mahal" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question4-option2" class="ml-2 font-poppins text-sm text-slate-700"> Mahal</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question4-option3" name="3" value="Murah" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question4-option3" class="ml-2 font-poppins text-sm text-slate-700"> Murah</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question4-option4" name="3" value="Sangat Murah" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question4-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Murah/Gratis</label>
                        </div>
                    </div>
                </label>

                <!-- Pertanyaan 5 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        5. Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question5-option1" name="4" value="Tidak Sesuai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question5-option1" class="ml-2 font-poppins text-sm text-slate-700"> Tidak Sesuai</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question5-option2" name="4" value="Cukup Sesuai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question5-option2" class="ml-2 font-poppins text-sm text-slate-700"> Cukup Sesuai</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question5-option3" name="4" value="Sesuai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question5-option3" class="ml-2 font-poppins text-sm text-slate-700"> Sesuai</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question5-option4" name="4" value="Sangat Sesuai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question5-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Sesuai</label>
                        </div>
                    </div>
                </label>

                <!-- Pertanyaan 6 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        6. Bagaimana pendapat Saudara tentang kompetensi/ kemampuan petugas dalam pelayanan?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question6-option1" name="5" value="Tidak Kompeten" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question6-option1" class="ml-2 font-poppins text-sm text-slate-700"> Tidak Kompeten</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question6-option2" name="5" value="Cukup Kompeten" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question6-option2" class="ml-2 font-poppins text-sm text-slate-700"> Cukup Kompeten</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question6-option3" name="5" value="Kompeten" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question6-option3" class="ml-2 font-poppins text-sm text-slate-700"> Kompeten</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question6-option4" name="5" value="Sangat Kompeten" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question6-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Kompeten</label>
                        </div>
                    </div>
                </label>

                <!-- Pertanyaan 7 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        7. Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question7-option1" name="6" value="Buruk" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question7-option1" class="ml-2 font-poppins text-sm text-slate-700"> Buruk</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question7-option2" name="6" value="Cukup" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question7-option2" class="ml-2 font-poppins text-sm text-slate-700"> Cukup</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question7-option3" name="6" value="Baik" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question7-option3" class="ml-2 font-poppins text-sm text-slate-700"> Baik</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question7-option4" name="6" value="Sangat Baik" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question7-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Baik</label>
                        </div>
                    </div>
                </label>

                <!-- Pertanyaan 8 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        8. Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question8-option1" name="7" value="Buruk" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question8-option1" class="ml-2 font-poppins text-sm text-slate-700"> Buruk</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question8-option2" name="7" value="Cukup" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question8-option2" class="ml-2 font-poppins text-sm text-slate-700"> Cukup</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question8-option3" name="7" value="Baik" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question8-option3" class="ml-2 font-poppins text-sm text-slate-700"> Baik</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question8-option4" name="7" value="Sangat Baik" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question8-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Baik</label>
                        </div>
                    </div>
                </label>

                <!-- Pertanyaan 9 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        9. Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question9-option1" name="8" value="Buruk" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question9-option1" class="ml-2 font-poppins text-sm text-slate-700"> Buruk</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question9-option2" name="8" value="Cukup" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question9-option2" class="ml-2 font-poppins text-sm text-slate-700"> Cukup</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question9-option3" name="8" value="Baik" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question9-option3" class="ml-2 font-poppins text-sm text-slate-700"> Baik</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question9-option4" name="8" value="Sangat Baik" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question9-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Baik</label>
                        </div>
                    </div>
                </label>

                <!-- Pertanyaan 10 -->
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        10. Secara keseluruhan, bagaimana pendapat Saudara tentang pelayanan yang diberikan?
                    </span>
                    <div class="space-y-2 ml-3">
                        <div class="flex items-center">
                            <input type="radio" id="question10-option1" name="9" value="Buruk" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question10-option1" class="ml-2 font-poppins text-sm text-slate-700"> Buruk</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question10-option2" name="9" value="Cukup" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question10-option2" class="ml-2 font-poppins text-sm text-slate-700"> Cukup</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question10-option3" name="9" value="Baik" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question10-option3" class="ml-2 font-poppins text-sm text-slate-700"> Baik</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="question10-option4" name="9" value="Sangat Baik" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="question10-option4" class="ml-2 font-poppins text-sm text-slate-700">Sangat Baik</label>
                        </div>
                    </div>
                </label>
                <label class="block mb-4">
                    <span class="block mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 text-sm font-poppins text-slate-700">
                        11. Apakah ada saran untuk pelayanan kami?
                    </span>
                    <input type="text" name="Saran" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Saran" />
                </label>
                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Kirim</button>
            </form>
        </div>
    </div>
    <!-- end konten -->
    @endsection
