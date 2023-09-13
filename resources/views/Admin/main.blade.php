@extends('Admin.layouts.master')

@section('title', 'mainPage')

@section('mainContent')
    <section class="container mx-auto ">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1">
            <div class="flex justify-center items-center h-96">
                <div class="flex items-center justify-center text-center border border-blue-500 w-72 h-72 rounded-full">
                    <div class="">
                        <h3 class="text-blue-700 font-bold text-xl">Month</h3>
                        <h2 class="text-blue-500 font-semibold text-xl">{{$todayMonth}}</h2>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center h-96">
                <div class="flex items-center justify-center text-center border border-blue-500 w-72 h-72 rounded-full">
                    <div class="">
                        <h3 class="text-blue-700 font-bold text-xl">Days</h3>
                        <h2 class="text-blue-500 font-semibold text-xl">{{$todayDay}}</h2>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center h-96">
                <div class="flex items-center justify-center text-center border border-blue-500 w-72 h-72 rounded-full">
                    <div class="">
                        <h3 class="text-blue-700 font-bold text-xl">Users</h3>
                        <h2 class="text-blue-500 font-semibold text-xl">{{$userCount[0]->user_count}}</h2>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center h-96">
                <div class="flex items-center justify-center text-center border border-blue-500 w-72 h-72 rounded-full">
                    <div class="">
                        <h3 class="text-blue-700 font-bold text-xl">Total Users</h3>
                        <h2 class="text-blue-500 font-semibold text-xl">{{$userCount[0]->user_count}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
