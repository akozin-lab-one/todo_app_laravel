@extends('Users.layouts.master')

@section('title', 'account_setting')

@section('mainContent')
    <div class="ms-3">
        <a class="text-blue-400 font-bold drop-shadow-md" href="{{route('user#main')}}">
            back
        </a>
    </div>
    <div class="container mx-auto ">
        <div class="grid lg:grid-cols-2 lg:gap-2 md:grid-cols-2 md:gap-2 sm:grid-cols-1 sm:gap-1">
            <div class=" flex justify-center ">
                <div class="">
                    @if (Auth::user()->image == null)
                    <img class="rounded-full w-48 h-48 mx-auto " src="{{asset('storage/image/unknown.jpg')}}" alt="">
                    @else
                    <img class="rounded-full w-48 h-48 mx-auto" src="{{asset('storage/image/pro.jpg')}}" alt="">
                    @endif

                    <div class="mt-4">

                        <input type="file" name="userImage" id="title"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Name" disabled>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="w-96 p-5">
                    <form class="space-y-6" action="#">
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="userName" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Name" value="{{$user->userName}}" disabled>
                        </div>
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="userEmail" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Email Address" value="{{$user->userEmail}}" disabled>
                        </div>
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="Password" id="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="*******" disabled>
                        </div>
                        <div class="mt-6">
                            <a  href="{{route('user.account.editpage', Auth::user()->id)}}">
                                <button type="button" id="submitBtn"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
