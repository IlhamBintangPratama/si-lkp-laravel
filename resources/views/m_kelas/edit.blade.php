@extends('layout_admin.master')

@section ('content')

<div class="p-8 rounded border border-gray-200">
    <h1 class="font-medium text-3xl">Edit Kelas</h1>
    {{-- <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> --}}

    <form method="Post" action="{{ url('/m_kelas/'.$kelas->id.'/update') }}" name="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mt-8 space-y-6">
            <div>
                <label for="nama_kelas" class="text-sm text-gray-700 block mb-1 font-medium">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ old('name', $kelas->nama_kelas) }}" required />
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
        location.href = "{{ url('m_kelas') }}";
    }
</script>
@endsection