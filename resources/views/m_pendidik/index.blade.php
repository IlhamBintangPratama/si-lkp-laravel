@extends('layout_admin.master')

@section('content')
@if ($message = Session::get('created'))
<div id="notif" class="bg-green-300 mb-2 border border-green-300 text-green-600 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ $message }}.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>

@endif
@if ($message = Session::get('updated'))
<div id="notif" class="bg-green-300 mb-2 border border-green-300 text-green-600 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ $message }}.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>

@endif
@if ($message = Session::get('deleted'))
<div id="notif" class="bg-green-300 mb-2 border border-green-300 text-green-600 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ $message }}.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>

@endif
@if ($message = Session::get('warning'))
<div id="notif" class="bg-orange-300 mb-2 border border-orange-300 text-orange-dark px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Oops!</strong>
    <span class="block sm:inline">{{ $message }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-orange" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>
@endif
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Data Pendidik
        </div>
        <div class="p-3">
            <div class="mb-3">
                <a class="bg-teal-300 hover:bg-teal-400 right-0 py-2 px-3 text-white rounded-lg float-right mb-3" href="{{ url('/m_pendidik/create') }}">
                    <i class="fas fa-plus"></i></a>
            </div>
            <table class="table-responsive w-full rounded">
                <thead>
                    <tr>
                        <th class="border w-0 px-4 py-2">No</th>
                        <th class="border w-1/5 px-4 py-2">NIK</th>
                        <th class="border w-1/5 px-4 py-2">Nama Lengkap</th>
                        <th class="border w-1/12 px-4 py-2">JK</th>
                        <th class="border w-1/6 px-4 py-2">Email</th>
                        <th class="border w-1/6 px-4 py-2">No. Telp</th>
                        <th class="border w-1/6 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendidik as $no => $p)
                    
                    <tr>
                        <td class="border px-4 py-2">{{ $pendidik->firstItem()+$no }}</td>
                        <td class="border px-4 py-2">{{ $p->nik }}</td>
                        <td class="border px-4 py-2">{{ $p->nama }}</td>
                        <td class="border px-4 py-2">{{ $p->gender }}</td>
                        <td class="border px-4 py-2">{{ $p->email }}</td>
                        <td class="border px-4 py-2">{{ $p->no_hp }}</td>
                        
                        <td class="border px-4 py-2">
                            <a class="bg-teal-300 hover:bg-teal-400 cursor-pointer rounded p-2 mx-1 text-white" href="{{ url('/m_pendidik/'.$p->id.'/show') }}">
                                    <i class="fas fa-eye"></i></a>
                            <a class="bg-teal-300 hover:bg-teal-400 cursor-pointer rounded p-2 mx-1 text-white" href="{{ url('/m_pendidik/'.$p->id.'/edit') }}">
                                    <i class="fas fa-edit"></i></a>
                            <button class="bg-teal-300 hover:bg-teal-400 cursor-pointer rounded p-2 mx-1 text-red-500 show-modal modal-trigger" 
                            data-modal='modalHapus'
                            onclick="return openModal({{$p->id}})"
                            >
                                    <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                {{ $pendidik->links()}}
                </ul>
            </nav>
        </div>

    </div>
</div>
<script>
    setTimeout(function() {
    $('#notif').fadeOut('slow');}, 3000
    );
    function openModal(id){
        var form = document.querySelector('#form_id');
        form.action = `{{url('m_pendidik/${id}/destroy')}}`
    }
</script>
@endsection