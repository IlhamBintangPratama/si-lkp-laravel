@extends('layout_admin.master')

@section ('content')

<div class="p-8 rounded border border-gray-200">
    <h1 class="font-medium text-3xl">Tambah Siswa Kelas</h1>
    {{-- <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> --}}

    <form method="Post" action="{{ url('k_siswa') }}" name="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mt-8 space-y-6">
            <div>
                <div class="relative">
                    @foreach ($kelaspk as $item)
                    <input type="text" name="id_kelas" value="{{ $item->id_kelas }}" hidden>
                    @endforeach
                    <label for="nama_pendidik" class="text-sm text-gray-700 block mb-1 font-medium">Pendidik</label>
                    <select name="pendidik" class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                    id="grid-state" required>
                        <option value="" disabled selected>- pilih -</option>
                        @foreach($pendidik as $pk) 
                        @if ($pk->id_guru != null)
                        <option value="{{($pk->id_guru)}}">

                            {{$pk->nama}}
        
                            </option>
                        @endif
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div><br>
                </div>
                <div class="relative">
                    <label for="nama_siswa" class="text-sm text-gray-700 block mb-1 font-medium">Siswa</label>
                    <select name="siswa[]" multiple multiselect-search="true" multiselect-select-all="true" class="form-control bg-gray-100 border border-gray-200 rounded py-2 px-4 block 
                    focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                        {{-- <option value="">- pilih -</option> --}}
                        @foreach(App\Models\Siswa::all() as $sw) 
                        <option value="{{$sw->id}}">

                        {{$sw->nama}}

                        </option>
                        @endforeach
                    </select>
                </div><br>
            </div>
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
        location.href = "{{ url('k_siswa') }}";
    }
</script>
@endsection