@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    Hello {{ Auth::user()->name }}
                </p>


            </div>


        </section>

        <div>

            <div class="pt-6 grid grid-cols-2 gap-0 ">
               
                <div class=" bg-white shadow overflow-hidden sm:rounded-lg dark:bg-gray-800">
                    <div class="px-4 py-5 sm:px-6 ">
                        <h3 class="text-lg leading-6 dark:text-white font-medium text-gray-900">
                            Your Details
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Personal details 
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

                                <dt class="text-sm font-medium text-gray-500 ">
                                    User Photo
                                </dt>
                                <dd>
                                    <div class="card-body">
                                        <form action="{{route('home')}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input type="file" name="image" class="pb-8 block w-full text-sm text-gray-500">

                                            <button class="flex items-center  bg-blue-600 text-white px-2 py-1 text-xs font-semibold  transition-colors duration-200 transform bg-white  hover:bg-blue-700  focus:bg-gray-400 focus:outline-none " type="submit">


                                                <a href="#"><span class="mx-1">Upload</span></a>
                                            </button>

                                        </form>
                                    </div>
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Full name
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{Auth::user()->name}}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Role
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                    @if (Auth::check() &&(Auth::user()->hasRole('Admin')))
                                    Admin
                                    @else
                                    Doctor
                                    @endif
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Email address
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{Auth::user()->email}}
                                </dd>
                            </div>
                            
                            
                            
                        </dl>
                    </div>
                </div>


            </div>
        </div>
    </div>
</main>
@endsection