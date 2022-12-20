@extends('u_pendidik.layout_admin.master')

@section ('content')

<div class="flex flex-col">
    <!-- Stats Row Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
        <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    {{-- @if (count($siswa) != null) --}}
                    {{(count($siswa) != null ? count($siswa) : '0')}} 
                    {{-- @endif --}}
                    
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Siswa Yang di Ampu
                </a>
            </div>
        </div>

        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    {{count($m_pelajaran)}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Materi Pelajaran
                </a>
            </div>
        </div>

        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    {{count($m_video)}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Materi Video
                </a>
            </div>
        </div>

        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    {{count($nilai)}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Belum Dinilai
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="text-4xl text-blue-400 font-bold text-center mt-10">
            Selamat Datang<br>
            <div class="text-2xl mt-6">
                Di halaman dashboard Sistem Informasi LKP
            </div>
        </div>
        
    </div>

</div>
@endsection('content')