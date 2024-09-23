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
            Laporan Nilai Siswa
        </div>
        <div class="p-3">
            <div class="mb-3">
                <button type="button" class="openModal block bg-teal-300 hover:bg-teal-400 right-0 py-2 px-3 text-white rounded-lg float-right mb-3" 
                    data-modal-target="interestModal" data-modal-toggle="interestModal">
                    <i class="fas fa-print"></i></button>
            </div>
            <table class="table-responsive w-full rounded">
                <thead>
                    <tr>
                        <th class="border w-0 px-4 py-2">No</th>
                        <th class="border w-1/5 px-4 py-2">Nama Siswa</th>
                        <th class="border w-1/5 px-4 py-2">Tema Praktek</th>
                        <th class="border w-1/12 px-4 py-2">Nilai Kreatif</th>
                        <th class="border w-1/6 px-4 py-2">Nilai Ketrampilan</th>
                        <th class="border w-1/6 px-4 py-2">Nilai Sikap</th>
                        <th class="border w-1/6 px-4 py-2">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporan as $no => $p)
                    
                    <tr>
                        <td class="border px-4 py-2">{{ $laporan->firstItem()+$no }}</td>
                        <td class="border px-4 py-2">{{ $p->nama }}</td>
                        <td class="border px-4 py-2">{{ $p->tema_praktek }}</td>
                        <td class="border px-4 py-2">{{ $p->nilai_kreatif }}</td>
                        <td class="border px-4 py-2">{{ $p->nilai_ketrampilan }}</td>
                        <td class="border px-4 py-2">{{ $p->nilai_sikap }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ url('/cetak-laporan/'.$p->id.'/print') }}" type="button" class="py-2 px-4 transition-colors text-white bg-green-600 border active:bg-green-800 font-medium 
                            border-green-700 rounded-lg hover:bg-green-700 disabled:opacity-50" target="_blank">
                            <i class="fas fa-print"></i></a>
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
        <!-- Main modal -->
        <div id="interestModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="w-full max-w-2xl ml-auto mr-auto mt-20 shadow dark:bg-gray-700">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Cetak Laporan Nilai
                        </h3>
                        <button type="button" id="closeModal" class="closeModal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="interestModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="{{ url('a_nilai/tanggal')}}" method="get" class="form-inline">
                            <div>
                                <label for="dari" class="text-sm text-gray-700 block mb-1 font-medium">Dari</label>
                                <input type="date" name="dari" id="dari" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"autocomplete="off" required="required" />
                            </div><br>
                            <div>
                                <label for="sampai" class="text-sm text-gray-700 block mb-1 font-medium">Sampai</label>
                                <input type="date" name="sampai" id="sampai" autocomplete="off" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" required="required" />
                            </div><br>
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <a href="" data-modal-hide="default-modal" type="button" class="py-2 px-4 transition-colors text-white bg-green-600 border active:bg-green-800 font-medium 
                                border-green-700 rounded-lg hover:bg-green-700 disabled:opacity-50" onclick="this.href='{{url('cetak-laporan-nilai')}}/'+document.getElementById('dari').value + '/' +document.getElementById('sampai').value" 
                                target="_blank">Cetak</a>
                                {{-- <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button> --}}
                            </div>
                        </form>
                    </div>
                    <!-- Modal footer -->
                    
                </div>
            </div>
        </div>
        <div class="card-footer py-4">
            <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                {{ $laporan->links()}}
                </ul>
            </nav>
        </div>

    </div>
</div>
{{-- <script>
    setTimeout(function() {
    $('#notif').fadeOut('slow');}, 3000
    );
    function openModal(id){
        var form = document.querySelector('#form_id');
        form.action = `{{url('m_pendidik/${id}/destroy')}}`
    }
</script> --}}
@endsection
@section('footer.script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.openModal').on('click', function(e) {
                
                $('#interestModal').removeClass('hidden');
            });
            $('.closeModal').on('click', function(e) {
                $('#interestModal').addClass('hidden');
            });
        });
    </script>
@endsection