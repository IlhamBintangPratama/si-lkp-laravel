@extends('layout_admin.master')

@section ('content')
@if ($message = Session::get('errors'))
<div id="notif" class="bg-green-300 mb-2 border border-green-300 text-green-600 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Error!</strong>
    <span class="block sm:inline">{{ $message }}.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>

@endif
@if ($message = Session::get('success'))
<div id="notif" class="bg-green-300 mb-2 border border-green-300 text-green-600 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ $message }}.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>

@endif
<div class="p-8 rounded border border-gray-200">
    <h1 class="font-medium text-3xl">My Account</h1>
    {{-- <p class="text-gray-600 mt-6">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos dolorem vel cupiditate laudantium dicta.</p> --}}

    <form method="Post" action="{{ route('changeProfile')}}" autocomplete="off" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mt-8 space-y-6">
            <div>
                <label for="name" class="text-sm text-gray-700 block mb-1 font-medium">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ old('name', $profile->name) }}"  />
            </div><br>
    
            <div>
                <label for="email" class="text-sm text-gray-700 block mb-1 font-medium">Email</label>
                <input type="email" name="email" id="email" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full" value="{{ old('name', $profile->email) }}"  />
            </div><br>
            
            {{-- <div class="{{ $errors->has('current-password') ? 'has-error' : '' }}"> --}}
            <div>
                <label for="current-password" class="text-sm text-gray-700 block mb-1 font-medium">Current Password</label>
                <input type="password" name="current-password" id="current-password" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"  />
                {{-- @error('current-password')
                    <span>{{ $message }}</span>
                @enderror --}}
                {{-- @if ($errors->has('current-password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('current-password') }}</strong>
                    </span>
                @endif --}}
            </div><br>

            {{-- <div class="{{ $errors->has('new-password') ? 'has-error' : '' }}"> --}}
                <div>
                <label for="new-password " class="text-sm text-gray-700 block mb-1 font-medium">New Password</label>
                <input type="password" name="new-password" id="new-password" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
                {{-- @if ($errors->has('new-password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('new-password') }}</strong>
                    </span>
                @endif --}}
            </div><br>

            <div>
                <label for="new-password-confirm" class="text-sm text-gray-700 block mb-1 font-medium">Confirm New Password</label>
                <input type="password" name="new-password-confirm" id="new-password-confirm" class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block 
                focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"/>
            </div><br>
        </div>
    
        <div class="space-x-4 mt-8">
            <button class="py-2 px-4 transition-colors text-white bg-green-600 border active:bg-green-800 font-medium 
            border-green-700 rounded-lg hover:bg-green-700 disabled:opacity-50">Update Profile</button>
    
            <!-- Secondary -->
            {{-- <a id="back" style="cursor: pointer" class="py-2 px-4 bg-red-400 border border-red-200 text-red-900 rounded-lg hover:bg-red-500 active:bg-red-700 disabled:opacity-50">Kembali</a> --}}
        </div>
        <script>
            setTimeout(function() {
            $('#notif').fadeOut('slow');}, 3000
            );
            $(document).ready(function(){
                $("#email").attr("autocomplete", "off");
                $("#new-password").attr("autocomplete", "off");
                $("#new-password-confirm").attr("autocomplete", "off");
            });
        </script>
    </form>
</div>
@endsection