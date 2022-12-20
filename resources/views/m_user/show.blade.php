@extends('layout_admin.master')

@section ('content')

<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Detail User
            <button id="back" class="bg-red-400 hover:bg-red-500 rounded-lg border-red-600 text-white py-1 px-2 mt-0 float-right 
            active:bg-red-700 disabled:opacity-50"><<</button>
        </div>
        <div class="p-3">
            <table class="table-fixed w-full rounded">
                <tbody>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Nama</td>
                        <td class="w-1/2 px-4 py-2">: {{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Email</td>
                        <td class="w-1/2 px-4 py-2">: {{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td class="w-1/6 px-4 py-2">Role</td>
                        <td class="w-1/2 px-4 py-2">: {{ ($user->role == 1) ? 'pendidik' : 'siswa '}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-yellow-700 px-2 py-3 border-solid border-gray-200 border-b">
            <p style="color: white">RESET PASSWORD</p>
        </div>
        <div class="p-3">
            <p>Untuk password default user dengan role pendidik dan siswa sama yaitu</p><p style="color: red">12345</p><br><br>
            <form method="Post" action="{{ url('/m_user/'.$user->id.'/reset') }}" name="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <button class="py-2 px-5 transition-colors bg-blue-600 border active:bg-blue-800 font-medium 
            border-blue-700 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50">Proses</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById('back').onclick = function(){
        location.href = "{{ url('m_user') }}";
    }
</script>
@endsection