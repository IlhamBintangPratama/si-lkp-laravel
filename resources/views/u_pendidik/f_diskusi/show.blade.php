@extends('u_pendidik.layout_admin.master')

@section ('content')

<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Detail Data Nilai
            <button id="back" class="bg-red-400 hover:bg-red-500 rounded-lg border-red-600 text-white py-1 px-2 mt-0 float-right 
            active:bg-red-700 disabled:opacity-50"><<</button>
        </div>
        
        <div class="p-3">
            <table class="table-fixed w-full rounded">
                <tbody>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Nama Siswa</td>
                        <td class="w-1/2 px-4 py-2">: {{ $nilai->sisnilai->nama }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Tema Praktek</td>
                        <td class="w-1/2 px-4 py-2">: {{ $nilai->tema_praktek }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Nilai Kreatifitas</td>
                        <td class="w-1/2 px-4 py-2">: {{ $nilai->nilai_kreatif }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Nilai Ketrampilan</td>
                        <td class="w-1/2 px-4 py-2">: {{ $nilai->nilai_ketrampilan }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Nilai Sikap</td>
                        <td class="w-1/2 px-4 py-2">: {{ $nilai->nilai_sikap }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.getElementById('back').onclick = function(){
        location.href = "{{ url('data_penilaian' )}}";
    }
</script>
@endsection