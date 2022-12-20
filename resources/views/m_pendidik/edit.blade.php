@extends('layout_admin.master')

@section ('content')

<div class="p-8 rounded border border-gray-200">
    <h1 class="font-medium text-3xl">Edit Pendidik</h1>
    {{-- <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> --}}

    <form method="Post" action="{{ url('/m_pendidik/'.$pendidik->id.'/update') }}" name="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mt-8 space-y-6">
            <div>
                <label for="nik" class="text-sm text-gray-700 block mb-1 font-medium">NIK</label>
                <input type="text" name="nik" id="nik" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ old('name', $pendidik->nik) }}" required />
            </div><br>
    
            <div>
                <label for="nama" class="text-sm text-gray-700 block mb-1 font-medium">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ old('name', $pendidik->nama) }}" required />
            </div><br>
            <div class="relative">
                <label for="jk" class="text-sm text-gray-700 block mb-1 font-medium">Jenis Kelamin</label>
                <select class="form-control block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                        id="grid-state" name="jk" required>
                        <option value="">- pilih -</option>
                        @foreach($genders as $gender)
                        <option value="{{ $gender->id }}" {{ $gender->id == $pendidik->jenis_kelamin ? 'selected' : '' }}>{{ $gender->gender }}</option>
                        @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div><br>
            <div>
                <label for="email" class="text-sm text-gray-700 block mb-1 font-medium">Email</label>
                <input type="text" name="email" id="email" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ old('name', $pendidik->email) }}" required />
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
        location.href = "{{ url('m_pendidik') }}";
    }
</script>
@endsection