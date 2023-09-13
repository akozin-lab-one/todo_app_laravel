@extends('Users.layouts.master')

@section('title', 'userEditPage')

@section('mainContent')
    <div class="ms-3">
        <a class="text-blue-400 font-bold drop-shadow-md" href="{{ route('user.account.detail', $user->id) }}">
            back
        </a>
    </div>
    <div class="container mx-auto ">
        <form class="space-y-6" method="POST" action="{{route('user.account.edit')}}" enctype="multipart/form-data">
            @csrf
            <div class="grid lg:grid-cols-2 lg:gap-2 md:grid-cols-2 md:gap-2 sm:grid-cols-1 sm:gap-1">
                <div class=" flex justify-center ">
                    <div class="">
                        @if (Auth::user()->image == null)
                        <img class="rounded-full w-48 h-48 " src="{{asset('storage/image/unknown.jpg')}}" alt="">
                        @else
                        <img class="rounded-full w-48 h-48 " src="{{asset('storage/image/pro.jpg')}}" alt="">
                        @endif
                        <div class="">

                            <input type="file" name="userImage" id="title"
                                class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Name">
                                @error('userImage')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="w-96 p-5">

                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="userName" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Name" value="{{old('userName', $user->name)}}">
                                @error('userName')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="userEmail" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Email Address" value="{{old('userEmail',$user->email)}}">
                                @error('userEmail')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password</label>
                            <input type="password" name="oldPassword" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="*******" >
                                <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                @error('oldPassword')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                            <input type="password" name="newPassword" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="*******" >
                                @error('newPassword')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="Password" name="confirmPassword" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="*******" >
                                @error('confirmPassword')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <button type="submit" id="submitBtn"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
