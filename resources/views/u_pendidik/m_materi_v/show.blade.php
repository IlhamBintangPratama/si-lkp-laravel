@extends('u_pendidik.layout_admin.master')

@section ('content')

<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            Detail Materi Video
            <button id="back" class="bg-red-400 hover:bg-red-500 rounded-lg border-red-600 text-white py-1 px-2 mt-0 float-right 
            active:bg-red-700 disabled:opacity-50"><<</button>
        </div>
        
        <div class="p-3">
            <div class="mt-5 ">
                <video width="80%" height="40%" controls>
                    <source src='{{ asset("materi_file/{$filename}") }}' type="video/mp4">
                    Your browser does not support the video tag.
                </video><br>
                <h3 class="text-lg font-bold">{{ $m_video->judul }}</h3>
                <p>
                    {{ $m_video->created_at->format('D, Y-m-d') }}
                </p>
                <p class="mt-5 bg-slate-400">
                    Deskripsi: <br>
                    {{ $m_video->deskripsi }}
                </p>
            </div>
            
        </div>
    </div>
</div>
<script>
    document.getElementById('back').onclick = function(){
        location.href = "{{ url('materi_video' )}}";
    }
</script>
@endsection