@extends('layouts.app')
@section('content')
<div class="m-auto w-4/8 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">
            Update Patient
        </h1>
    </div>
</div>

<div class="flex justify-center pt-20">
    <form action="/patients/{{$patient->id}}" method="post">
        @csrf
        @method('PUT')
        <span class="uppercase text-blue-500 font-bold text-xs italic">
            ID {{$patient->id}}
        </span>
        <div class="block">
            <input type="text" name="name" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Patient Name..." value="{{$patient->name}}">

        </div>

        <div class="block">
            <input type="number" name="pregnancies" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Pregnancies..." value="{{$patient->pregnancies}}">

        </div>

        <div class="block">
            <input type="number" name="glucose" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Glucose..." value="{{$patient->glucose}}">

        </div>

        <div class="block">
            <input type="number" name="bloodpressure" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Blood Pressure..." value="{{$patient->bloodpressure}}">

        </div>

        <div class="block">
            <input type="number" name="skinthickness" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Skin Thickness..." value="{{$patient->skinthickness}}">

        </div>

        <div class="block">
            <input type="number" name="insulin" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Insulin..." value="{{$patient->insulin}}">

        </div>

        <div class="block">
            <input type="number" name="bmi" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="BMI..." value="{{$patient->bmi}}">

        </div>

        <div class="block">
            <input type="number" name="pedegree" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Diabetes Pedegree Function..." value="{{$patient->diabetespedegreefunction}}">

        </div>

        <div class="block">
            <input type="number" name="age" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Age..." value="{{$patient->age}}">

        </div>

        <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80
        uppercase font-bold">
            Submit
        </button>
    </form>
</div>

@endsection
