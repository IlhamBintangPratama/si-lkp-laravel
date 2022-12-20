<!--Sidebar-->
<aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block" onclick="openSidebar()">

    <ul class="list-reset flex flex-col">
        <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
            <a href="/"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                Dashboard
                <span><i class="fas fa-angle-right float-right"></i></span>
            </a>
        </li>
        <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a href="{{ url('m_user')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fa fa-users float-left mx-2"></i>
                Data User
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>
        <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a href="{{ url('m_siswa')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fa fa-user float-left mx-2"></i>
                Data Siswa
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>
        <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a href="{{ url('m_pendidik')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fa fa-user float-left mx-2"></i>
                Data Pendidik
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>
        <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a href="{{ url('m_kelas')}}"
               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                <i class="fa fa-box float-left mx-2"></i>
                Data Kelas
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>
        <div class="border-b border-light-border py-3 px-2 ml-2">
            <label class="text-gray-800 text-sm font-sans font-hairline">Menu Utama</label>
        </div>
        <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline cursor-pointer" id="arrow" onclick="dropdown()">
                <i class="fa fa-box float-left mx-2"></i>
                Master Data
                <span><i class="fa fa-angle-right float-right"></i></span>
            </a>
        </li>
        <div class="border-b border-light-border py-3 px-2 ml-2" id="submenu">
            <li class="w-full h-full py-3 px-2 border-b border-light-border">
                <a href="{{ url('k_siswa')}}"
                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    Manage Siswa
                    <span><i class="fa fa-angle-right float-right"></i></span>
                </a>
            </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border">
                <a href="{{ url('k_pendidik')}}"
                    class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                    Manage Pendidik
                    <span><i class="fa fa-angle-right float-right"></i></span>
                </a>
            </li>
        </div>
    </ul>
    
</aside>

<!--/Sidebar-->