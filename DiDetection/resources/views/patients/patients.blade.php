@extends('layouts.app')
@section('content')

<!-- Chart JS script -->



<figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0 ">
    <div class="pt-6 md:p-8 text-center md:text-left w-screen h-screen space-y-4">

        @if (Auth::user())
        <div class="shadow-lg rounded-lg overflow-hidden">
            <div class="py-3 px-5 bg-gray-50"><span class="mx-1 font-bold">Analytics</span></div>
            <div class="grid grid-cols-3 gap-4">
                <div><canvas class="p-10" id="chartBar" style="width:100%;height:400px;"></canvas></div>
                <div>Put graph 2</div>
                <div>Put graph 3</div>
            </div>
           
        </div>
        <div class="max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 md:max-w-2xl">
        </div>



        <div class="pt-10">
            <button class="flex items-center bg-blue-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-blue-700  focus:bg-gray-400 focus:outline-none" data-target='#create-modal' data-modal-toggle="create-modal">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                <a href="#"><span class="mx-1">Add Patient</span></a>
            </button>
            <!-- <a class="border-b-2 pb-2 border-dotted italic text-gray-500" href="patients/create">
                Add a new patient &rarr;
            </a> -->
        </div>
        @else
        <p class="py-12 italic">
            Please login to proceed.
        </p>

        @endif



        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden sm:rounded-lg shadow-md">
                        <table id="patients-table" class="min-w-full">

                            <thead class="bg-gray-200 dark:bg-gray-700 ">
                                <tr>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Patient ID
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Name
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Pregnancies
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Glucose
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Blood Pressure
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Skin Thickness
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Insulin
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        BMI
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Pedegree Fx
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Age
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Diagnose</span>
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($patients as $patient)
                            <tbody>
                                @if (isset(Auth::user()->id) && Auth::user()->id==$patient->user_id)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">
                                        {{$patient->id}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">
                                        {{$patient->name}}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 font-semibold whitespace-nowrap text-center dark:text-gray-400 ">
                                        {{$patient->pregnancies}}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 font-semibold whitespace-nowrap text-center dark:text-gray-400">
                                        {{$patient->glucose}}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 font-semibold whitespace-nowrap text-center dark:text-gray-400">
                                        {{$patient->bloodpressure}}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 font-semibold whitespace-nowrap text-center dark:text-gray-400">
                                        {{$patient->skinthickness}}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 font-semibold whitespace-nowrap text-center dark:text-gray-400">
                                        {{$patient->insulin}}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 font-semibold whitespace-nowrap text-center dark:text-gray-400">
                                        {{$patient->bmi}}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 font-semibold whitespace-nowrap text-center dark:text-gray-400">
                                        {{$patient->diabetespedegreefunction}}
                                    </td>
                                    <td class="text-sm text-gray-500 px-6 py-4 font-semibold whitespace-nowrap text-center dark:text-gray-400">
                                        {{$patient->age}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="flex items-center bg-green-500 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-green-700  focus:bg-gray-400 focus:outline-none button"  data-modal-toggle="diagnose-modal" data-target="diagnose-modal" onclick="this.classList.toggle('button-loading')">
                                            
                                            <svg class="clipboard" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                            </svg>
                                            
                                            <a href="#"><span class="mx-1 button-text">Diagnose</span></a>
                                        </button>
                                        @include('patients.modal.diagnose')

                                    </td>
                                    <td>
                                        <button class="flex items-center bg-blue-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-blue-700  focus:bg-gray-400 focus:outline-none" data-target="edit-modal" data-id="{{$patient->id}}" data-modal-toggle="edit-modal">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg><a href="#"><span class="mx-1">Edit</span></a>
                                        </button>



                                        @include('patients.modal.edit')
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="/patients/{{$patient->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="flex items-center bg-red-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-red rounded hover:bg-red-700  focus:bg-gray-400 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg><span class="mx-1">Delete</span>
                                            </button>
                                        </form>
                                    </td>

                                </tr>

                                @endif
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>






    </div>
</figure>
@include('patients.modal.create')
@endsection

@push('scripts')
<script defer>
    $(window).on('load', function() {
        console.log('script loaded')
        const ctx = document.getElementById('chartBar').getContext('2d');

        (async () => {
            const patientMonthsResponse = await ajaxRequest('GET', "{{ route('graph.patients.months') }}")
            console.log(patientMonthsResponse)
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: patientMonthsResponse.labels,
                    datasets: [{
                        label: '# of Votes',
                        data: patientMonthsResponse.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                    }],

                },
                options: {
                    scales: {
                        y: {
                            max: Math.max(...patientMonthsResponse.data) + 5,
                            beginAtZero: true
                        }
                    }
                }
            });
        })()
    })
</script>
@endpush