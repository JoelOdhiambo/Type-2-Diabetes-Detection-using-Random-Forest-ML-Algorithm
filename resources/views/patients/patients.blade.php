@extends('layouts.app')
@section('content')



<figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0 ">
    <div class="pt-6 md:p-8 text-center md:text-left w-screen h-screen space-y-4">

        @if (Auth::user())
        <div class="shadow-lg rounded-lg overflow-hidden container mx-auto">
            <div class="py-3 px-5 bg-gray-50"><span class="mx-1 font-bold uppercase">Analytics</span></div>
            <div class="grid grid-cols-3 gap-4 pt-6 text-center">
                <div><span class="mx-1 font-medium px-15 ">Patients</span><canvas class="p-10 " id="chartBar" style="width:100%;height:300px;"></canvas></div>
                <div><span class="mx-1 font-medium px-15">Diabetic Patients</span><canvas class="p-10" id="chartBar2" style="width:100%;height:300px;"></canvas></div>
                <div><span class="mx-1 font-medium px-15">Non-Diabetic Patients</span><canvas class="p-10" id="chartBar3" style="width:100%;height:300px;"></canvas></div>
            </div>

        </div>




        <div class="pt-10">
            <button class="flex items-center bg-blue-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-blue-700  focus:bg-gray-400 focus:outline-none" data-modal-toggle="create-modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                <a href="#"><span class="mx-1">Add Patient</span></a>
            </button>
           
        </div>
        @else
        <p class="py-12 italic">
            Please login to proceed.
        </p>

        @endif



        <div class="flex flex-col" style="margin-bottom:15px">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8 ">
                    <div class="overflow-hidden sm:rounded-lg shadow-md p-5">
                        <table id="patients-table">
                            <thead class="bg-gray-200 dark:bg-gray-700">
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
                                        Pedigree Fx
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Age
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Diagnosis
                                    </th>
                                    <th scope="col" class="text-xs font-bold font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                        </table>

                    </div>
                </div>
            </div>
        </div>


    </div>
</figure>

@include('patients.modal.create')
@include('patients.modal.edit')
@endsection

@push('scripts')
<script defer>
    $(window).on('load', function() {

        const datatableSelect = $('.dataTables_wrapper select')

        //Load Datatable
        const patientsTable = $('#patients-table').DataTable({
            "initComplete": function(settings, json) {

            },
            "ajax": {
                "url": "{{ route('patients.all') }}",
                "type": "GET"
            },
            columns: [{
                    data: null,
                    "render": function(data, type, full, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'name',
                },
                {
                    data: 'pregnancies'
                },
                {
                    data: 'glucose'
                },
                {
                    data: 'bloodpressure'
                },
                {
                    data: 'skinthickness'
                },
                {
                    data: 'insulin'
                },
                {
                    data: 'bmi'
                },
                {
                    data: 'diabetespedegreefunction'
                },
                {
                    data: 'age'
                },
                {
                    data: 'diagnosis',
                    "render": function(data, type, full, meta) {
                        return data ?? 'No diagnosis'
                    }
                },
            ],
            columnDefs: [{
                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
                    "className": 'dt-center'
                },
                {
                    "targets": [1, 2, 5],
                    "className": 'dt-center2'
                },
                {
                    targets: 11,
                    data: null,
                    orderable: false,
                    render: function(data, type, row, meta) {
                        return `<div style="display:flex; justify-content:start;" ><td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                 <button style="margin-right:8px;"  class=" diagnose-btn flex items-center bg-green-500 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-green-700  focus:bg-gray-400 focus:outline-none button">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
                                         <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                         <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                     </svg>
                                     Diagnose
                                             </button>
                                         </td>

                                     <td class="pr-4">
                                         <button style="margin-right:8px;" class="edit-btn flex items-center bg-blue-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-blue-700  focus:bg-gray-400 focus:outline-none" data-toggle="edit-modal">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                 <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                             </svg>Edit
                                         </button>
                                     </td>

                                     @if (Auth::check() && Auth::user()->hasRole('Admin'))
                                         <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                             <button type="button"
                                                 class="delete-btn flex items-center bg-red-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-red rounded hover:bg-red-700  focus:bg-gray-400 focus:outline-none">
                                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                     <path fill-rule="evenodd"
                                                         d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                         clip-rule="evenodd" />
                                                 </svg><span class="mx-1">Delete</span>
                                             </button>
                                         </td>
                                     @endif</div>`
                    },
                }
            ]
        })

        //patientsTable.ajax.reload()

        $(`#patients-table tbody`).on('click', '.diagnose-btn', async function() {
            var data = patientsTable.row($(this).parents('tr')).data();
            const originalBtn = $(this).html()
            $(this).html(`<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
               <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
               <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
             </svg>Diagnosing`)

            try {
                const patientData = {
                    patient_id: data.id,
                    pregnancies: data.pregnancies,
                    glucose: data.glucose,
                    bloodpressure: data.bloodpressure,
                    skinthickness: data.skinthickness,
                    bmi: data.bmi,
                    insulin: data.insulin,
                    diabetespedegreefunction: data.diabetespedegreefunction,
                    age: data.age
                }
                const response = await ajaxRequest('POST', "{{ route('patient.inference') }}",
                    patientData)
                if (response?.result) {
                    if (response.result?.error) {
                        alert(response.result?.error)
                        return
                    }
                    alert(JSON.stringify(response.result))
                    patientsTable.ajax.reload()
                }
            } catch (error) {
                const message = error?.message || error?.responseJSON?.message ||
                    "Something went wrong, unable to diagnose patient"
                alert(message)
            } finally {
                $(this).html(originalBtn)
            }

        })


        let modal = $('#edit-modal');
        let modal_close = $('#modal-close');
        let editPatientId = null

        $(`#patients-table tbody`).on('click', '.edit-btn', async function() {
            var data = patientsTable.row($(this).parents('tr')).data();

            $('#patient_id').val(data.id);
            $('#Name').val(data.name);
            $('#Pregnancies').val(data["pregnancies"]);
            $('#Glucose').val(data.glucose);
            $('#Bloodpressure').val(data.bloodpressure);
            $('#Skinthickness').val(data.skinthickness);
            $('#Insulin').val(data.insulin);
            $('#Bmi').val(data.bmi);
            $('#Pedegree').val(data.diabetespedegreefunction);
            $('#Age').val(data.age);

            toggleModal('edit-modal', true)
            editPatientId = data.id
        })



        $(`#update-patient-record`).on('click', async function() {
            try {
                const editData = {
                    name: $('#Name').val(),
                    pregnancies: $('#Pregnancies').val(),
                    glucose: $('#Glucose').val(),
                    bloodpressure: $('#Bloodpressure').val(),
                    skinthickness: $('#Skinthickness').val(),
                    insulin: $('#Insulin').val(),
                    bmi: $('#Bmi').val(),
                    diabetespedegreefunction: $('#Pedegree').val(),
                    age: $('#Age').val()
                }

                const response = await ajaxRequest('PATCH',
                    `{{ route('patients.update', '') }}/${editPatientId}`, editData)

                if (response?.message) {
                    alert(response.message || 'Patient record updated successfully')
                    patientsTable.ajax.reload()
                }
            } catch (error) {
                const message = error?.message || error?.responseJSON?.message ||
                    "Something went wrong, unable to update patient record"
                console.log(error)
                alert(message)
            } finally {
                editPatientId = null
            }
        })

        $(`#patients-table tbody`).on('click', '.delete-btn', async function() {
            var data = patientsTable.row($(this).parents('tr')).data();
            try {
                const response = await ajaxRequest('DELETE',
                    `{{ route('patients.update', '') }}/${data.id}`)
                if (response?.message) {
                    alert(response?.message || 'Patient record deleted successfully')
                    patientsTable.ajax.reload()
                }
            } catch (error) {
                const message = error?.message || error?.responseJSON?.message ||
                    "Something went wrong, unable to update patient record"
                alert(message)

            }
        })


        const ctx = document.getElementById('chartBar').getContext('2d');
        const ctx2 = document.getElementById('chartBar2').getContext('2d');
        const ctx3 = document.getElementById('chartBar3').getContext('2d');

        (async () => {
            const patientMonthsResponse = await ajaxRequest('GET',
                "{{ route('graph.patients.months') }}")
            console.log(patientMonthsResponse)
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: patientMonthsResponse.labels,
                    datasets: [{
                        label: 'No. of Patients',
                        data: patientMonthsResponse.data,
                        backgroundColor: [

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
        })();


        (async () => {
            const withDiabetesResponse = await ajaxRequest('GET',
                "{{ route('graph.patients.withdiabetes') }}")
            console.log(withDiabetesResponse)
            const myChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: withDiabetesResponse.labels,
                    datasets: [{
                        label: 'No. of Patients',
                        data: withDiabetesResponse.data,
                        backgroundColor: [

                            'rgba(255, 159, 64, 0.2)'
                        ],
                    }],

                },
                options: {
                    scales: {
                        y: {
                            max: Math.max(...withDiabetesResponse.data) + 5,
                            beginAtZero: true
                        }
                    }
                }
            });
        })();


        (async () => {
            const withoutDiabetesResponse = await ajaxRequest('GET',
                "{{ route('graph.patients.withoutdiabetes') }}")
            console.log(withoutDiabetesResponse)
            const myChart = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: withoutDiabetesResponse.labels,
                    datasets: [{
                        label: 'No. of Patients',
                        data: withoutDiabetesResponse.data,
                        backgroundColor: [

                            'rgba(255, 159, 64, 0.2)'
                        ],
                    }],

                },
                options: {
                    scales: {
                        y: {
                            max: Math.max(...withoutDiabetesResponse.data) + 5,
                            beginAtZero: true
                        }
                    }
                }
            });
        })();


    })
</script>
@endpush