@extends('layouts.master')

@section('title', 'registerPage')

@section('mainContent')
    <div class="grid grid-cols-2 gap-2 mt-28">
        <div class="flex justify-center align-center h-96">
            <img class="border border-gray-300 rounded shadow-md" src="{{ asset('storage/image/note.png') }}" alt="">
        </div>
        <div class="flex justify-center align-center p-3">
            <div class="border border-gray-300 drop-shadow-md rounded p-3">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="">
                        <label class="block mb-1 text-md font-medium text-gray-900 dark:text-white"
                            for="">Name</label>
                        <input type="text" class="form-input px-8 py-2 rounded-full" name="name">
                        @error('name')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
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
                        <label class="block mb-1 text-md font-medium text-gray-900 dark:text-white" for="">Confirm
                            Password</label>
                        <input type="password" class="form-input px-8 py-2 rounded-full" name="password_confirmation">
                        @error('password_confirmation')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="">
                        <a class="me-12" href="{{ route('Auth#login') }}">Already Have?</a>
                        <button type="submit" class="bg-gray-900 text-white px-3 py-1 rounded mt-3 ">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
