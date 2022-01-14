@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="py-3 px-5 bg-gray-50>
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="min-w-full">
<thead class="bg-gray-200 dark:bg-gray-700 ">
   <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">No</th>
   <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">Name</th>
   <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">Email</th>
   <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">Roles</th>
   <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400" width="280px">Action</th>
 </thead>
 <tbody>
 @foreach ($data as $key => $user)
  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ ++$i }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ $user->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">{{ $user->email }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
        
       <a class="btn btn-blue" href="{{ route('users.show',$user->id) }}"><button class="flex items-center bg-blue-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-blue-700  focus:bg-gray-400 focus:outline-none" >Show</button></a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><button class="flex items-center bg-blue-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-blue-700  focus:bg-gray-400 focus:outline-none" >Edit</button></a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
 </tbody>
</table>


{!! $data->render() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection