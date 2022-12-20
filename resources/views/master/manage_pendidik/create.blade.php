@extends('layout_admin.master')

@section ('content')

<div class="p-8 rounded border border-gray-200">
    <h1 class="font-medium text-3xl">Tambah Guru Kelas</h1>
    {{-- <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> --}}

    <form method="Post" action="{{ url('k_pendidik') }}" name="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mt-8 space-y-6">
            <div>
                @foreach ($kelaspk as $item)
                <input type="text" name="id_kelas" value="{{ $item->id_kelas }}" hidden>
                @endforeach
                <label for="nama_pendidik" class="text-sm text-gray-700 block mb-1 font-medium">Nama Pendidik</label>
                <select name="select[]" multiple multiselect-search="true" multiselect-select-all="true" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                    {{-- <option value="">- pilih -</option> --}}
                    @foreach(App\Models\Pendidik::all() as $pk) 
                    <option value="{{$pk->id}}">

                    {{$pk->nama}}

                    </option>
                    @endforeach
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
        location.href = "{{ url('k_pendidik') }}";
    }
</script>
@endsection