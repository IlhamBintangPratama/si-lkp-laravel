@extends('layout_admin.master')

@section ('content')

<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Detail Siswa
            <button id="back" class="bg-red-400 hover:bg-red-500 rounded-lg border-red-600 text-white py-1 px-2 mt-0 float-right 
            active:bg-red-700 disabled:opacity-50"><<</button>
        </div>
        
        <div class="p-3">
            <table class="table-fixed w-full rounded">
                <tbody>
                    <tr>
                        <td class="w-1/6 px-4 py-2">NIK</td>
                        <td class="w-1/2 px-4 py-2">: {{ $siswa->nik }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Nama Lengkap</td>
                        <td class="w-1/2 px-4 py-2">: {{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">JK</td>
                        <td class="w-1/2 px-4 py-2">: {{ $siswa->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Email</td>
                        <td class="w-1/2 px-4 py-2">: {{ $siswa->email }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">No. Telp</td>
                        <td class="w-1/2 px-4 py-2">: {{ $siswa->no_hp }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById('back').onclick = function(){
        location.href = "{{ url('m_siswa' )}}";
    }
</script>
@endsection