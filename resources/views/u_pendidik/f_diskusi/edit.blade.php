@extends('u_pendidik.layout_admin.master')

@section ('content')

<div class="p-8 rounded border border-gray-200">
    <h1 class="font-medium text-3xl">Edit Data Nilai</h1>
    {{-- <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> --}}

    <form method="Post" action="{{ url('/data_penilaian/'.$nilai->id.'/update') }}" name="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mt-8 space-y-6">
            <div>
                <label for="siswa" class="text-sm text-gray-700 block mb-1 font-medium">Nama Siswa</label>
                <select class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                        id="grid-state" name="siswa" required>
                    <option disabled>--pilih--</option>
                    @foreach($siswa as $sis)
                    <option value="{{ $sis->id_siswa }}" {{ $sis->id == $nilai->id_siswa ? 'selected' : '' }}>{{ $sis->nama }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div><br>
    
            <div>
                <label for="tema" class="text-sm text-gray-700 block mb-1 font-medium">Tema Prakter</label>
                <input type="text" name="tema" id="tema" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ old('name', $nilai->tema_praktek) }}" required />
            </div><br>
            <div class="relative">
                <label for="n_kreatif" class="text-sm text-gray-700 block mb-1 font-medium">Nilai Kreatifitas</label>
                <select class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                        id="grid-state" name="n_kreatif" required>
                    <option disabled selected>--pilih--</option>
                    <option value="A" {{ $nilai->nilai_kreatif == 'A' ? 'selected' : '' }}>A = Sangat Baik</option>
                    <option value="B" {{ $nilai->nilai_kreatif == 'B' ? 'selected' : '' }}>B = Baik</option>
                    <option value="C" {{ $nilai->nilai_kreatif == 'C' ? 'selected' : '' }}>C = Cukup</option>
                    <option value="D" {{ $nilai->nilai_kreatif == 'D' ? 'selected' : '' }}>D = Kurang</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div><br>
            <div class="relative">
                <label for="n_ketrampilan" class="text-sm text-gray-700 block mb-1 font-medium">Nilai Ketrampilan</label>
                <select class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                        id="grid-state" name="n_ketrampilan" required>
                    <option disabled selected>--pilih--</option>
                    <option value="A" {{ $nilai->nilai_ketrampilan == 'A' ? 'selected' : '' }}>A = Sangat Baik</option>
                    <option value="B" {{ $nilai->nilai_ketrampilan == 'B' ? 'selected' : '' }}>B = Baik</option>
                    <option value="C" {{ $nilai->nilai_ketrampilan == 'C' ? 'selected' : '' }}>C = Cukup</option>
                    <option value="D" {{ $nilai->nilai_ketrampilan == 'D' ? 'selected' : '' }}>D = Kurang</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div><br>
            <div class="relative">
                <label for="n_sikap" class="text-sm text-gray-700 block mb-1 font-medium">Nilai Sikap</label>
                <select class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                        id="grid-state" name="n_sikap" required>
                    <option disabled selected>--pilih--</option>
                    <option value="A" {{ $nilai->nilai_sikap == 'A' ? 'selected' : '' }}>A = Sangat Baik</option>
                    <option value="B" {{ $nilai->nilai_sikap == 'B' ? 'selected' : '' }}>B = Baik</option>
                    <option value="C" {{ $nilai->nilai_sikap == 'C' ? 'selected' : '' }}>C = Cukup</option>
                    <option value="D" {{ $nilai->nilai_sikap == 'D' ? 'selected' : '' }}>D = Kurang</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div><br>
        </div>
    
        <div class="space-x-4 mt-8">
            <button class="py-2 px-4 transition-colors text-white bg-green-600 border active:bg-green-800 font-medium 
            border-green-700 rounded-lg hover:bg-green-700 disabled:opacity-50">Simpan</button>
    
            <!-- Secondary -->
            <a id="back" style="cursor: pointer" class="py-2 px-4 bg-red-400 border border-red-200 text-red-900 rounded-lg hover:bg-red-500 active:bg-red-700 disabled:opacity-50">Kembali</a>
        </div>
    </form>
</div>
<script>
    document.getElementById('back').onclick = function(){
        location.href = "{{ url('data_penilaian') }}";
    }
</script>
@endsection