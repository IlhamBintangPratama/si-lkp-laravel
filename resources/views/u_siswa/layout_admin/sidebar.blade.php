<!--Sidebar-->
<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block" onclick="openSidebar()">

    <ul class="list-reset flex flex-col">
        <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
            <a href="/dashboard_siswa"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                Dashboard
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>
        <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a href="{{ url('mat_harian')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fa fa-users float-left mx-2"></i>
                Materi Harian
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>
        <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a href="{{ url('mat_video')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fa fa-user float-left mx-2"></i>
                Materi Video
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>
        {{-- <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a href="{{ url('data_penilaian')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fa fa-user float-left mx-2"></i>
                Data Penilaian
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li> --}}
        {{-- <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a href="{{ url('diskusi')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fa fa-box float-left mx-2"></i>
                Forum Diskusi
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li> --}}
    </ul>
    
</aside>

<!--/Sidebar-->