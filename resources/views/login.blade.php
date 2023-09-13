@extends('layouts.master')

@section('title', 'loginPage')

@section('mainContent')
<div class="flex items-center justify-center h-screen  w-screen">
    <div class=" h-56">
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
