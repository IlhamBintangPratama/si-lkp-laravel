<header class="bg-nav">
    <div class="flex justify-between">
        <div class="p-1 mx-3 inline-flex items-center">
            <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
            <h1 class="text-white p-2">SI LKP</h1>
        </div>
        <div class="p-1 flex flex-row items-center">
            
            <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
            <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Siswa</a>
            <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t pin-r" style="margin-top: 11rem; margin-left: -2.3rem; background-color: #3F495E;">
                <ul class="list-reset">
                  <li><a href="#" class="no-underline px-4 py-2 block text-white hover:bg-gray-700">My account</a></li>
                  {{-- <li><a href="#" class="no-underline px-4 py-2 block text-white hover:bg-gray-700">Notifications</a></li> --}}
                  <li><hr class="border-t mx-2 border-grey-ligght"></li>
                  <li><a href="{{ route('logout')}}" class="no-underline px-4 py-2 block text-white hover:bg-gray-700">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>