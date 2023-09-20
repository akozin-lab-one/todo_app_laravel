@extends('Users.layouts.master')

@section('title', 'passwordChange')

@section('mainContent')
    <div class="container flex justify-center max-h-full align-middle">
        <div class="bg-blue-300 p-20">
            <form action="{{route('user.change.password')}}" method="post">
                @csrf
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old
                        Password</label>
                    <input type="password" name="oldPassword" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="*******">
                    <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                    @error('oldPassword')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                        Password</label>
                    <input type="password" name="newPassword" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="*******">
                    @error('newPassword')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                        Password</label>
                    <input type="Password" name="confirmPassword" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="*******">
                    @error('confirmPassword')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-dark-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change</button>
                </div>
            </form>
        </div>
    </div>
@endsection
