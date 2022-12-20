@extends('u_pendidik.layout_admin.master')

@section ('content')

<div class="p-8 rounded border border-gray-200">
    <h1 class="font-medium text-3xl">Tambah Materi Video</h1>
    {{-- <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> --}}

    <form method="Post" action="{{ url('data_penilaian') }}" name="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mt-8 space-y-6">
            <div>
                <label for="judul" class="text-sm text-gray-700 block mb-1 font-medium">Nama Siswa</label>
                <select name="siswa" class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                    id="grid-state" required>
                    <option value="" disabled selected>- pilih -</option>
                    @foreach($siswa as $pk) 
                    @if ($pk->id_siswa != null)
                    <option value="{{($pk->id_siswa)}}">

                    {{$pk->nama}}

                    </option>
                    @endif
                    @endforeach
                </select>
            </div><br>
            <div>
                <label for="tema" class="text-sm text-gray-700 block mb-1 font-medium">Tema Praktek</label>
                <input type="text" name="tema" id="tema" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" required />
            </div><br>
            <div>
                <label for="n_kreatif" class="text-sm text-gray-700 block mb-1 font-medium">Nilai Kreatif</label>
                <select name="n_kreatif" class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                    id="grid-state" required>
                    <option value="" disabled selected>- pilih -</option>
                    <option value="A">A = Sangat Baik</option>
                    <option value="B">B = Baik</option>
                    <option value="C">C = Cukup</option>
                    <option value="D">D = Kurang</option>
                </select>
            </div><br>
            <div>
                <label for="n_ketrampilan" class="text-sm text-gray-700 block mb-1 font-medium">Nilai Ketrampilan</label>
                <select name="n_ketrampilan" class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                    id="grid-state" required>
                    <option value="" disabled selected>- pilih -</option>
                    <option value="A">A = Sangat Baik</option>
                    <option value="B">B = Baik</option>
                    <option value="C">C = Cukup</option>
                    <option value="D">D = Kurang</option>
                </select>
            </div><br>
            <div>
                <label for="n_sikap" class="text-sm text-gray-700 block mb-1 font-medium">Nilai Sikap</label>
                <select name="n_sikap" class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                    id="grid-state" required>
                    <option value="" disabled selected>- pilih -</option>
                    <option value="A">A = Sangat Baik</option>
                    <option value="B">B = Baik</option>
                    <option value="C">C = Cukup</option>
                    <option value="D">D = Kurang</option>
                </select>
            </div><br>
            
        </div>
    
        <div class="space-x-4 mt-8">
            <button class="py-2 px-4 transition-colors text-white bg-green-600 border active:bg-green-800 font-medium 
            border-green-700 rounded-lg hover:bg-green-700 disabled:opacity-50">Simpan</button>
    
            <!-- Secondary -->
            <a id="back" style="cursor: pointer;" class="py-2 px-4 bg-red-400 border border-red-200 text-red-900 rounded-lg hover:bg-red-500 active:bg-red-700 disabled:opacity-50">Kembali</a>
        </div>
    </form>
</div>
<script>
    document.getElementById('back').onclick = function(){
        location.href = "{{ url('data_penilaian') }}";
    }
</script>
@endsection