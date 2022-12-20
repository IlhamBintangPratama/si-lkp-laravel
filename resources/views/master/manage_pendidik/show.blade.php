@extends('layout_admin.master')

@section ('content')

<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Daftar Pendidik Kelas
            <button id="back" class="bg-red-400 hover:bg-red-500 rounded-lg border-red-600 text-white py-1 px-2 mt-0 float-right 
            active:bg-red-700 disabled:opacity-50"><<</button>
        </div>
        
        <div class="p-3">
            <div class="mb-3">
                @foreach ($kelaspk as $k)
                <a class="bg-teal-300 hover:bg-teal-400 right-0 py-2 px-3 text-white rounded-lg float-left mb-3" href="{{ url('/k_pendidik/'.$k->id_kelas.'/create') }}">
                    <i class="fas fa-plus"></i></a>
                @endforeach
                
            </div>
            <table class="table-responsive w-full rounded">
                <thead>
                    <tr>
                        <th class="border px-4 py-2" style="width: 0%">No</th>
                        <th class="border px-4 py-2" style="width: 85%">Nama Pendidik</th>
                        {{-- <th class="border px-4 py-2" style="width: 47.5%">Jumlah Pendidik</th> --}}
                        <th class="border px-4 py-2" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelaspendidik as $no => $s)
                    <tr>
                        <td class="border px-4 py-2">{{ $kelaspendidik->firstItem()+$no }}</td>
                        <td class="border px-4 py-2">{{ $s->nama }}</td>
                        
                        <td class="border px-4 py-2">
                            {{-- <a class="bg-teal-300 hover:bg-teal-400 cursor-pointer rounded p-2 mx-1 text-white" href="{{ url('/m_siswa/'.$s->id.'/show') }}"> --}}
                                {{-- <i class="fas fa-eye"></i></a> --}}
                        {{-- <a class="bg-teal-300 hover:bg-teal-400 cursor-pointer rounded p-2 mx-1 text-white" href="{{ url('/m_siswa/'.$s->id_kelas.'/edit') }}"> --}}
                                {{-- <i class="fas fa-edit"></i></a> --}}
                        <button class="bg-teal-300 hover:bg-teal-400 cursor-pointer rounded p-2 mx-1 text-red-500 show-modal modal-trigger" 
                        data-modal='modalHapus'
                        onclick="return openModal({{$s->id}})"
                        >
                                <i class="fas fa-trash"></i>
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- @foreach ($kelaspendidik as $no => $s)
        
        @endforeach --}}
        <div id='modalHapus' class="modal-wrapper">
            <div class="overlay close-modal"></div>
            <div class="modal modal-centered">
                <div class="modal-content shadow-lg p-5">
                    <div class="border-b pb-3 pt-0 mb-4">
                       <div class="flex justify-between items-center text-xl font-bold">
                            Hapus Data
                            <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                                <i class="fas fa-times text-gray-700"></i>
                            </span>
                       </div>
                    </div>
                    <!-- Modal content -->
                    <form id='form_id' class="w-full" method="Post" 
                        {{-- action="{{url('k_pendidik/'.$s->id.'/destroy')}}" --}}
                    >
                        {{ csrf_field() }} 
                        <div>
                            Apakah anda yakin?
                        </div>
                        
                        <div class="mt-5">
                            <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'> Ya </button>
                            <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-3 px-4 rounded'>
                                Batal
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer py-4">
            <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                {{ $kelaspendidik->links()}}
                </ul>
            </nav>
        </div>
    </div>
</div>
<script>
    document.getElementById('back').onclick = function(){
        location.href = "{{ url('k_pendidik' )}}";
    }

    function openModal(id){
        var form = document.querySelector('#form_id');
        form.action = `{{url('k_pendidik/${id}/destroy')}}`
    }
</script>
@endsection