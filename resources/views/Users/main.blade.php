@extends('Users.layouts.master')

@section('title', 'userMain')

@section('mainContent')
    <div class="container  static">
        <div class="grid lg:grid-cols-3 lg:gap-3 md:grid-cols-2 md:gap-2 sm:grid-cols-1 sm:gap-2 ">
            <div class="p-3">
                <h3 class="font-bold text-blue-600 text-center">ToDo</h3>
                @if ($task !== '')
                    @foreach ($task as $ta )
                    @if ($ta->status === 0)
                    <div class="bg-gray-300 rounded p-3 mt-2 w-96">
                        <div class="flex justify-end">
                            <span>{{$ta->date}}</span>
                        </div>
                        <div class="flex justify-between my-2">
                            <h4>{{$ta->title}}</h4>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-22  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="TaskStatus" id="status" disabled>
                                <option value="">please choose</option>
                                <option @if ($ta->status === 0)
                                    selected
                                @endif class="text-xs">ToDo</option>
                                <option @if ($ta->status === 1)
                                    selected
                                @endif class="text-xs">Doing</option>
                                <option @if ($ta->status === 10)
                                    selected
                                @endif class="text-xs">Done</option>
                            </select>
                        </div>
                        <p class=" lg:text-base md:text-base sm:text-xs ">{{$ta->description}}</p>
                        <div class="flex justify-end mt-2">
                            <a href="{{route('user#delete', $ta->id)}}">
                                <button class="bg-red-800 text-white w-14 text-xs h-7 rounded hover:bg-red-600">Delete</button>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else

                @endif
            </div>
            <div class="p-3">
                <h3 class="font-bold text-blue-600 text-center">Doing</h3>
                @if ($task !== '')
                    @foreach ($task as $ta )
                    @if ($ta->status === 1)
                    <div class="bg-gray-300 rounded p-3 mt-2 md:w-64 lg:w-96">
                        <div class="flex justify-end">
                            <span>{{$ta->date}}</span>
                        </div>
                        <div class="flex justify-between my-2">
                            <h4>{{$ta->title}}</h4>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-22  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="TaskStatus" id="status" disabled>
                                <option value="">please choose</option>
                                <option @if ($ta->status === 0)
                                    selected
                                @endif class="text-xs">ToDo</option>
                                <option @if ($ta->status === 1)
                                    selected
                                @endif class="text-xs">Doing</option>
                                <option @if ($ta->status === 10)
                                    selected
                                @endif class="text-xs">Done</option>
                            </select>
                        </div>
                        <p class="sm:text-xs md:text-base text-base ">{{$ta->description}}</p>
                        <div class="flex justify-end mt-2">
                            <a href="{{route('user#delete', $ta->id)}}">
                                <button class="bg-red-800 text-white w-14 text-xs h-7 rounded hover:bg-red-600">Delete</button>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else

                @endif
            </div>
            <div class="">
                <h3 class="font-bold text-blue-600 text-center">Done</h3>
                @if ($task !== '')
                    @foreach ($task as $ta )
                    @if ($ta->status === 10)
                    <div class="bg-gray-300 rounded p-3 mt-2 md:w-64 lg:w-96">
                        <div class="flex justify-end">
                            <span>{{$ta->date}}</span>
                        </div>
                        <div class="flex justify-between my-2">
                            <h4>{{$ta->title}}</h4>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-22  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="TaskStatus" id="status" disabled>
                                <option value="">please choose</option>
                                <option @if ($ta->status === 0)
                                    selected
                                @endif class="text-xs">ToDo</option>
                                <option @if ($ta->status === 1)
                                    selected
                                @endif class="text-xs">Doing</option>
                                <option @if ($ta->status === 10)
                                    selected
                                @endif class="text-xs">Done</option>
                            </select>
                        </div>
                        <p class="sm:text-xs md:text-base text-base ">{{$ta->description}}</p>
                        <div class="flex justify-end mt-2">
                            <a href="{{route('user#delete', $ta->id)}}">
                                <button class="bg-red-800 text-white w-14 text-xs h-7 rounded hover:bg-red-600">Delete</button>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                @else

                @endif
            </div>
        </div>
        <div class="flex justify-end  absolute bottom-10 right-12 ">

            <!-- Modal toggle -->
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block text-white lg:me-3 me-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-md"
                type="button" id="getBtn">
                create
            </button>

            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Enjoy Your Daily lists...
                            </h3>
                            <form class="space-y-6" action="#">
                                <div>
                                    <label for="title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        Title</label>
                                    <input type="text" name="email" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Title" required>
                                </div>
                                <div class="flex justify-between">
                                    <div>
                                        <label for="date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                            Set Time</label>
                                        <input type="hidden" value="{{Auth::user()->id}}" name="userId" id="userId">
                                        <input type="date" name="email" id="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            placeholder="Title" required>
                                    </div>
                                    <div>
                                        <label for="status"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Status</label>

                                        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="TaskStatus" id="status" required>
                                            <option value="">please choose</option>
                                            <option value="0">ToDo</option>
                                            <option value="1">Doing</option>
                                            <option value="10">Done</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label for="desc"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <textarea name="description" placeholder="please write your description" id="desc"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required cols="30" rows="10"></textarea>
                                </div>

                                <button type="button" id="submitBtn"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('myAjax')
    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function() {
                $parent = $(this).parents("form");

                $data = {
                    'taskTitle'  : $parent.find('#title').val(),
                    'userId'  : $parent.find('#userId').val(),
                    'taskDate'   : $parent.find('#date').val(),
                    'taskStatus' : $parent.find('#status').val(),
                    'taskDesc'   : $parent.find('#desc').val(),
                }
                console.log($data);

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/user/ajax/create',
                    data:$data,
                    dataType:'json'
                });

                location.reload();
            });
        });
    </script>
@endsection
