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
                    @forelse ($pendidik as $no => $p)
                    
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
                            <button type="button" onclick="return openModal({{ $p->id }})"
                                class="openModal bg-teal-300 hover:bg-teal-400 cursor-pointer rounded p-2 mx-1 text-red-500 show-modal modal-trigger">
                                <i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border px-4 py-2 text-center">
                                Data masih kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true"
        id="interestModal">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div
                class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        {{-- <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg @click="toggleModal" class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div> --}}
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Hapus Data
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Apakah anda yakin?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <form id='form_id' class="w-full" method="Post" {{-- action="{{url('k_pendidik/'.$s->id.'/destroy')}}" --}}>
                    {{ csrf_field() }}

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Ya
                        </button>
                        <button type="button"
                            class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Batal
                        </button>
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
@section('footer.script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.openModal').on('click', function(e) {
                
                $('#interestModal').removeClass('invisible');
            });
            $('.closeModal').on('click', function(e) {
                $('#interestModal').addClass('invisible');
            });
        });
    </script>
@endsection