@extends('layouts.app')
@section('content')
<div class="m-auto w-4/8 py-24">
<div class="text-center">
    <h1 class="text-5xl uppercase bold">
        Add Patient
    </h1>
</div>
</div>

<div class="flex justify-center pt-20">
    <form action="/patients/{{$id}}" method="post">
        @csrf
        
        <div class="block">
            <input type="text" name="name" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Patient Name...">

        </div>

        <div class="block">
            <input type="number" name="pregnancies" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Pregnancies...">

        </div>

        <div class="block">
            <input type="number" name="glucose" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Glucose...">

        </div>

        <div class="block">
            <input type="number" name="bloodpressure" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Blood Pressure...">

        </div>

        <div class="block">
            <input type="number" name="skinthickness" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Skin Thickness...">

        </div>

        <div class="block">
            <input type="number" name="insulin" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Insulin...">

        </div>

        <div class="block">
            <input type="number" name="bmi" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="BMI...">

        </div>

        <div class="block">
            <input type="number" name="pedegree" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Diabetes Pedegree Function...">

        </div>

        <div class="block">
            <input type="number" name="age" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" placeholder="Age...">

        </div>

        <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80
        uppercase font-bold">
            Submit
        </button>
    </form>
</div>

@endsection