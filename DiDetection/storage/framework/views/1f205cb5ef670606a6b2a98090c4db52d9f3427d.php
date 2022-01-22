<?php $__env->startSection('content'); ?>
    <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0 ">
        <div class="pt-6 md:p-8 text-center md:text-left w-screen h-screen space-y-4">
            <?php if(Auth::user()): ?>
                <div class="pt-10">
                    <button
                        class="flex items-center bg-blue-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-blue-700  focus:bg-gray-400 focus:outline-none">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <a href="patients/create"><span class="mx-1">Add Patient</span></a>
                    </button>
                    <!-- <a class="border-b-2 pb-2 border-dotted italic text-gray-500" href="patients/create">
                        Add a new patient &rarr;
                    </a> -->
                </div>
            <?php else: ?>
                <p class="py-12 italic">
                    Please login to proceed.
                </p>

            <?php endif; ?>


            <div class="flex flex-col">
                <div class="">
                    <div class="">
                        <div class="overflow-hidden sm:rounded-lg shadow-md">
                            <table id="patients-table" class="min-w-full">
                                <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Patient ID
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Pregnancies
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Glucose
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Blood Pressure
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Skin Thickness
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Insulin
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        BMI
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
                                        Pedegree Fx
                                    </th>
                                    <th scope="col"
                                        class="text-xs font-medium text-gray-700 px-6 py-3 text-left uppercase tracking-wider dark:text-gray-400">
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </figure>



    <div id="edit-modal" aria-hidden="true"
         class="hidden overflow-x-hidden overflow-y-auto fixed top-20 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full">
        <div class="relative w-full max-w-lg px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div
                class="bg-white rounded-lg shadow relative dark:bg-gray-700">

                <form id='edit-patient'
                      class="space-y-6 px-2 lg:px-1 pb-1 sm:pb-1 xl:pb-1"
                      action="" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>



                <!-- This example requires Tailwind CSS v2.0+ -->
                    <div
                        class="bg-white shadow overflow-hidden sm:rounded-lg">

                        <div
                            class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Patient No:
                            </h3>
                            <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-toggle="edit-modal">
                                <svg class="w-5 h-5" fill="currentColor"
                                     viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>

                        </div>
                        <div class="border-t border-gray-200 ">
                            <dl>

                                <div
                                    class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Full name
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                        <input type="text" name="name"
                                               id="name"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder=""
                                               required>

                                    </dd>
                                </div>
                                <div
                                    class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Pregnancies
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <input type="number"
                                               name="pregnancies"
                                               id="pregnancies"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder=""
                                               required>

                                    </dd>
                                </div>
                                <div
                                    class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Glucose
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <input type="number" name="glucose"
                                               id="glucose"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder=""
                                               required>

                                    </dd>
                                </div>
                                <div
                                    class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Blood Pressure
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <input type="number"
                                               name="bloodpressure"
                                               id="bloodpressure"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder=""
                                               required>

                                    </dd>
                                </div>
                                <div
                                    class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Skin Thickness
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <input type="number"
                                               name="skinthickness"
                                               id="skinthickness"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder=""
                                               required>

                                    </dd>
                                </div>
                                <div
                                    class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Insulin
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <input type="number" name="insulin"
                                               id="insulin"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder=""
                                               required>

                                    </dd>
                                </div>
                                <div
                                    class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        BMI
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <input type="number" name="bmi"
                                               id="bmi"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder=""
                                               required>

                                    </dd>
                                </div>
                                <div
                                    class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Pedigree
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <input type="number"
                                               name="diabetespedegreefunction"
                                               id="diabetespedegreefunction"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder=""
                                               required>

                                    </dd>
                                </div>
                                <div
                                    class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Age
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <input type="number" name="age"
                                               id="age"
                                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                               placeholder=""
                                               required>

                                    </dd>
                                </div>

                                <div
                                    class="flex space-x-2 items-center p-4  border-t border-gray-200 rounded-b dark:border-gray-600">

                                    <button data-modal-toggle="edit-modal"
                                            type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        UPDATE
                                    </button>

                                </div>
                            </dl>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script defer>
        $(window).on('load', function () {
            $('#patients-table').DataTable({
                "ajax": {
                    "url": '<?php echo e(route('patients.all')); ?>',
                    "type": "GET"
                },
                "initComplete": function (settings, json) {
                    console.log('initComplete')

                },
                responsive: true,
                columns: [{
                    data: 'id'
                },
                    {
                        data: 'name'
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
                ],
                columnDefs: [{
                    "targets": [0, 2],
                    "className": 'dt-center'
                },
                    {
                        targets: 9,
                        data: null,
                        orderable: false,
                        render: function (data, type, full) {
                            return `<td> <button   class="flex items-center bg-green-500 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-green-700  focus:bg-gray-400 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                                        <path fill-rule="evenodd"
                                                              d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                    <a href="#"><span class="mx-1">Diagnose</span></a>
                                                </button>
                                                <button
                                                    class="flex items-center bg-blue-600 text-white px-2 py-1 text-xs font-semibold  uppercase transition-colors duration-200 transform bg-white rounded hover:bg-blue-700  focus:bg-gray-400 focus:outline-none"
                                                    data-target='#edit-modal'
                                                    data-modal-toggle="edit-modal">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                                    </svg>
                                                    <a href="#"><span class="mx-1">Edit</span></a>
                                                </button><td>`
                        },
                    }
                ]
            })
        })

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ikky/Documents/projects/Type-2-Diabetes-Detection-using-Random-Forest-ML-Algorithm/DiDetection/resources/views/patients/patients.blade.php ENDPATH**/ ?>