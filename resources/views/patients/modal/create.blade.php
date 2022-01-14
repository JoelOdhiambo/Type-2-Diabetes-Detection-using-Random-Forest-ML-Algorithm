<div id="create-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed top-20 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full">
                                            <div class="relative w-full max-w-lg px-4 h-full md:h-auto">
                                                <!-- Modal content -->
                                                <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">

                                                    <form id='edit-patient'class="space-y-6 px-2 lg:px-1 pb-1 sm:pb-1 xl:pb-1" action="/patients" method="post"enctype="multipart/form-data">
                                                        @csrf

                                                        <!-- This example requires Tailwind CSS v2.0+ -->
                                                        <div class=" bg-white shadow overflow-hidden sm:rounded-lg ">

                                                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                Add Patient
                                                                </h3>
                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="create-modal">
                                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                                    </svg>
                                                                </button>

                                                            </div>
                                                            <div class="border-t border-gray-200 ">
                                                                <dl>
                                                                    
                                                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                        <dt class="text-sm font-medium text-gray-500">
                                                                            Full name
                                                                        </dt>
                                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                                                                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Patient Name..." required>

                                                                        </dd>
                                                                    </div>
                                                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                        <dt class="text-sm font-medium text-gray-500">
                                                                            Pregnancies
                                                                        </dt>
                                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                            <input type="number" name="pregnancies" id="pregnancies" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Pregnancies..." required>

                                                                        </dd>
                                                                    </div>
                                                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                        <dt class="text-sm font-medium text-gray-500">
                                                                            Glucose
                                                                        </dt>
                                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                            <input type="number" name="glucose" id="glucose" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Glucose..." required>

                                                                        </dd>
                                                                    </div>
                                                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                        <dt class="text-sm font-medium text-gray-500">
                                                                            Blood Pressure
                                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                            <input type="number" name="bloodpressure" id="bloodpressure" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Blood Pressure..." required>

                                                                        </dd>
                                                                    </div>
                                                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                        <dt class="text-sm font-medium text-gray-500">
                                                                            Skin Thickness
                                                                        </dt>
                                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                            <input type="number" name="skinthickness" id="skinthickness" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Skin Thickness..." required>

                                                                        </dd>
                                                                    </div>
                                                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                        <dt class="text-sm font-medium text-gray-500">
                                                                            Insulin
                                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                            <input type="number" name="insulin" id="insulin" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Insulin..." required>

                                                                        </dd>
                                                                    </div>
                                                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                        <dt class="text-sm font-medium text-gray-500">
                                                                            BMI
                                                                        </dt>
                                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                            <input type="number" name="bmi" id="bmi" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="BMI..." required>

                                                                        </dd>
                                                                    </div>
                                                                    <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                        <dt class="text-sm font-medium text-gray-500">
                                                                            Pedigree
                                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                            <input type="number" name="pedegree" id="pedegree" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Diabetes Pedegree Function..." required>

                                                                        </dd>
                                                                    </div>
                                                                    <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                                                        <dt class="text-sm font-medium text-gray-500">
                                                                            Age
                                                                        </dt>
                                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                                                            <input type="number" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Age..." required>

                                                                        </dd>
                                                                    </div>

                                                                    <div class="flex space-x-2 items-center p-4  border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                        
                                                                    <button data-modal-toggle="create-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                                                        
                                                                    </div>
                                                                </dl>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>