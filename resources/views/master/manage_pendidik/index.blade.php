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
            Manage Pendidik
        </div>
        <div class="p-3">
            {{-- <div class="mb-3">
                <a class="bg-teal-300 hover:bg-teal-400 right-0 py-2 px-3 text-white rounded-lg float-right mb-3" href="{{ url('/manage_pendidik/create') }}">
                    <i class="fas fa-plus"></i></a>
            </div> --}}
            <table class="table-responsive w-full rounded">
                <thead>
                    <tr>
                        <th class="border px-4 py-2" style="width: 0%">No</th>
                        <th class="border px-4 py-2" style="width: 47.5%">Kelas</th>
                        <th class="border px-4 py-2" style="width: 47.5%">Jumlah Pendidik</th>
                        <th class="border px-4 py-2" style="width: 5%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kls as $no => $s)
                    <tr>
                        <td class="border px-4 py-2">{{ $kls->firstItem()+$no }}</td>
                        <td class="border px-4 py-2">{{ $s->nama_kelas }}</td>
                        <td class="border px-4 py-2">{{ $s->total }}</td>
                        
                        <td class="border px-4 py-2">
                            <a class="bg-teal-300 hover:bg-teal-400 cursor-pointer rounded p-2 mx-1 text-white" href="{{ url('/k_pendidik/'.$s->id.'/show') }}">
                                    <i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-center">
                                Data masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="card-footer py-4">
            <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                {{ $kls->links()}}
                </ul>
            </nav>
        </div>

    </div>
</div>
<script>
    setTimeout(function() {
    $('#notif').fadeOut('slow');}, 3000
    );
</script>
@endsection