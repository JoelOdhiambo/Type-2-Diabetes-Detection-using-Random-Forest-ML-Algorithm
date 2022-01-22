@extends('layouts.app')
@section('content')

<!-- Chart JS script -->
<!-- Main modal -->

<!-- Modal toggle -->

<figure class="md:flex bg-gray-100  p-8 md:p-0 ">
    <div class="pt-6 md:p-8 text-center md:text-left w-screen h-screen space-y-4">

        @if (Auth::user())

        <table class="min-w-full">
            <div class="py-3 px-5 bg-gray-50 uppercase "><span class="mx-1 font-bold">System Users</span></div>

            <thead class="bg-gray-200 dark:bg-gray-700 ">
                <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">Name</th>
                <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">E-Mail</th>
                <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">Doctor</th>
                <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">Admin</th>
                <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400"></th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
                    <form action="{{route('admin.assign')}}" method="post">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{$user->name}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{$user->email}}<input type="hidden" name="email" value="{{$user->email}}"></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white"><input type="checkbox" {{$user->hasRole('Doctor')?'checked':''}} name='role_doctor'></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white"><input type="checkbox" {{$user->hasRole('Admin')?'checked':''}} name='role_admin'></td>

                        {{csrf_field()}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white"><button type="submit" class="flex items-center bg-green-500 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-green-700  focus:bg-gray-400 focus:outline-none button">Assign Role</button></td>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>



        @else
        <p class="py-12 italic">
            Please login to proceed.
        </p>

        @endif










    </div>
</figure>

@endsection
