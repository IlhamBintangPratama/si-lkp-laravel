@extends('u_pendidik.layout_admin.master')

@section ('content')

<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Detail Materi Harian
            <button id="back" class="bg-red-400 hover:bg-red-500 rounded-lg border-red-600 text-white py-1 px-2 mt-0 float-right 
            active:bg-red-700 disabled:opacity-50"><<</button>
        </div>
        
        <div class="p-3">
            <table class="table-fixed w-full rounded">
                <tbody>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Judul</td>
                        <td class="w-1/2 px-4 py-2">: {{ $m_harian->judul }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Modul</td>
                        <td class="w-1/2 px-4 py-2">:
                            {{-- <iframe src="{{$path}}" width='1366px' height='623px' frameborder='0'>
                                This is an embedded <a target='_blank' href='http://office.com'>
                                    Microsoft Office</a> document, powered by <a target='_blank' 
                                    href='http://office.com/webapps'>Office Online</a></iframe> --}}
                            <a href='{{ asset("materi_file/{$filename}") }}'><button class="text-blue-600 hover:text-blue-700">Lihat Berkas</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Deskripsi</td>
                        <td class="w-1/2 px-4 py-2">:
                            {{ $m_harian->deskripsi }}
                        </td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Tanggal</td>
                        <td class="w-1/2 px-4 py-2">: {{ $m_harian->created_at->format('D, Y-m-d') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById('back').onclick = function(){
        location.href = "{{ url('materi_harian' )}}";
    }
</script>
@endsection