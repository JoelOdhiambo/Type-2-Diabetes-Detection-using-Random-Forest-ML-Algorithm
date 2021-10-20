@extends('layouts.app')
@section('content')
<figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
    <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
        <blockquote>
            <p class="text-lg font-semibold">
                “Tailwind CSS is the only framework that I've seen scale
                on large teams. It’s easy to customize, adapts to any design,
                and the build size is tiny.”
            </p>
        </blockquote>
        <div class="pt-10">
            <a class="border-b-2 pb-2 border-dotted italic text-gray-500" href="patients/create">
                Add a new patient &rarr;
            </a>
        </div>


        @foreach ($patients as $patient )
        <div class="m-auto">
            <div class="float-right">
                <a href="patients/{{$patient->id}}/edit" class="border-b-2 pb-2 border-dotted italic text-red-500">
                    Edit &rarr;
                </a>
                
                <form action="/patients/{{$patient->id}}" method="post" class="pt-3">
                    @csrf
                    @method('delete')
                    <button class="border-b-2 pb-2 border-dotted italic text-red-500" type="submit">
                        Delete &rarr;
                    </button>

                </form>
            </div>

            <span class="uppercase text-blue-500 font-bold text-xs italic">
                ID {{$patient->id}}
            </span>
            <h2 class="text-gray-700 py-6">
                Name {{$patient->name}}
            </h2>
            <p class="text-gray-700 py-6">
                Pregnancies {{$patient->pregnancies}}
            </p>

            <p class="text-gray-700 py-6">
                Glucose {{$patient->glucose}}
            </p>
            <p class="text-gray-700 py-6">
                Blood Pressure {{$patient->bloodpressure}}
            </p>
            <p class="text-gray-700 py-6">
                Skin Thickness {{$patient->skinthickness}}
            </p>
            <p class="text-gray-700 py-6">
                Insulin {{$patient->insulin}}
            </p>
            <p class="text-gray-700 py-6">
                BMI {{$patient->bmi}}
            </p>
            <p class="text-gray-700 py-6">
                Pedegree Function {{$patient->diabetespedegreefunction}}
            </p>
            <p class="text-gray-700 py-6">
                Age {{$patient->age}}
            </p>


        </div>
        @endforeach


    </div>
</figure>
@endsection