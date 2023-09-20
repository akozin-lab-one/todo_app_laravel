@extends('layouts.master')

@section('title', 'loginPage')

@section('mainContent')
@if (Session::has('show_password_changed_message'))
<div class=" w-full h-20 fixed top-3 flex justify-center">
    <div id="toast-success" class="flex mt-3 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal">Password changed successfully. Please login again.</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
</div>
@endif
<div class="flex items-center justify-center h-screen  w-screen">
    <div class="h-56">
        <div class="border border-gray-300 drop-shadow-md rounded p-3">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="">
                    <label class="block mb-1 text-md font-medium text-gray-900 dark:text-white"
                        for="">Email</label>
                    <input type="email" class="form-input px-8 py-2 rounded-full" name="email">
                    @error('email')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label class="block mb-1 text-md font-medium text-gray-900 dark:text-white"
                        for="">Password</label>
                    <input type="password" class="form-input px-8 py-2 rounded-full" name="password">
                    @error('password')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="">
                    <a class="me-12" href="{{ route('Auth#register') }}">Don't You Have?</a>
                    <button type="submit" class="bg-gray-900 text-white px-3 py-1 rounded mt-3 ">Sigin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
