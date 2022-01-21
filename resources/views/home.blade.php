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
                <!-- This example requires Tailwind CSS v2.0+ -->
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

                <!-- <div class=" bg-white shadow overflow-hidden sm:rounded-lg bg-opacity-0">



                    <div class="md:shrink-0 max-w-md px-8 py-4 mx-auto mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800">


                        <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="https://images.pexels.com/photos/2589653/pexels-photo-2589653.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Profile image" />
                        <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">Design Tools</h2>

                        <p class="mt-2 text-gray-600 dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>

                        <div class="flex justify-end mt-4">
                            <a href="#" class="text-xl font-medium text-blue-500 dark:text-blue-300">John Doe</a>
                        </div>
                    </div>
                </div>



                <div class="md:shrink-0 max-w-md px-8 py-4 mx-auto mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800">


                    <img class="inline object-cover w-16 h-16 mr-2 rounded-full" src="https://images.pexels.com/photos/2589653/pexels-photo-2589653.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Profile image" />
                    <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">Design Tools</h2>

                    <p class="mt-2 text-gray-600 dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>

                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-xl font-medium text-blue-500 dark:text-blue-300">John Doe</a>
                    </div>
                </div>


                <div class="max-w-md px-8 py-4 mx-auto mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800">


                    <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">Design Tools</h2>

                    <p class="mt-2 text-gray-600 dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>

                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-xl font-medium text-blue-500 dark:text-blue-300">John Doe</a>
                    </div>
                </div>

                <div class="max-w-md px-8 py-4 mx-auto mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex justify-center -mt-16 md:justify-end">
                        <img class="object-cover w-20 h-20 border-2 border-blue-500 rounded-full dark:border-blue-400" alt="Testimonial avatar" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=76&q=80">
                    </div>

                    <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">Design Tools</h2>

                    <p class="mt-2 text-gray-600 dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>

                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-xl font-medium text-blue-500 dark:text-blue-300">John Doe</a>
                    </div>
                </div>

                <div class="max-w-md px-8 py-4 mx-auto mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="flex justify-center -mt-16 md:justify-end">
                        <img class="object-cover w-20 h-20 border-2 border-blue-500 rounded-full dark:border-blue-400" alt="Testimonial avatar" src="https://images.unsplash.com/photo-1499714608240-22fc6ad53fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=76&q=80">
                    </div>

                    <h2 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white md:mt-0 md:text-3xl">Design Tools</h2>

                    <p class="mt-2 text-gray-600 dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae dolores deserunt ea doloremque natus error, rerum quas odio quaerat nam ex commodi hic, suscipit in a veritatis pariatur minus consequuntur!</p>

                    <div class="flex justify-end mt-4">
                        <a href="#" class="text-xl font-medium text-blue-500 dark:text-blue-300">John Doe</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</main>
@endsection