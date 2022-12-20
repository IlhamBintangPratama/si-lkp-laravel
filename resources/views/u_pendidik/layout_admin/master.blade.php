<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="{{asset('assets/dist/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss@1.0/dist/tailwind.min.css"> --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Dashboard | SI-LKP</title>
</head>
<body>
    <!--Container -->
    @if(auth()->user()->role=="2")
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            @include ('u_pendidik.layout_admin.header')
            <div class="flex flex-1">
                @include ('u_pendidik.layout_admin.sidebar')
                <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                @yield('content')
                @else
                @include ('login')
                </main>
            </div>
        </div>
    </div>
    
    @endif
    <script src="{{asset('assets/main.js')}}"></script>
    <script src="{{asset('assets/src/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/src/multiselect-dropdown.js')}}"></script>
    <script type="text/javascript">
    function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
    }
    dropdown();

    function openSidebar() {
        document.querySelector("#sidebar").classList.toggle("hidden");
    }
</script>
    @yield('footer.script')
</body>

</html>
