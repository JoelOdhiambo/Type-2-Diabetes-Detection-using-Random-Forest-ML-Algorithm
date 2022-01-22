<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Styles -->
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<style>
    .active{
        color: red;
    }
</style>

</head>

<body class="bg-gray-100 h-screen antialiased leading-none font-body">
    <!-- <div id="app">
        <header class="bg-blue-900 py-6">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="<?php echo e(url('/')); ?>" class="text-lg font-semibold text-gray-100 no-underline">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div> -->
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16 text-white">
                <?php if(auth()->guard()->guest()): ?>
                <a class="no-underline hover:underline " href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                <?php if(Route::has('register')): ?>
                <a class="no-underline hover:underline" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                <?php endif; ?>
                <?php else: ?>


                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                        <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">

                    </div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                            <a href="<?php echo e(route('home')); ?>" class="text-gray-300 px-3 hover:bg-gray-700 hover:text-white active:bg-yellow-400 px-3 py-2 rounded-md text-sm font-medium <?php echo e(request()->is('/home')?'active':''); ?>" >Dashboard</a>

                            <a href="/patients" class="text-gray-300 hover:bg-gray-700 hover:text-white active:bg-yellow-400 px-3 py-2 rounded-md text-sm font-medium">Patients</a>

                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="sm:hidden" id="mobile-menu">
                    <div class="px-2 pt-2 pb-3 space-y-1">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

                        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Patients</a>

                    </div>
                </div>
                <a href="<?php echo e(route('logout')); ?>" class="no-underline hover:underline" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
                    <?php echo e(csrf_field()); ?>

                </form>

                <?php endif; ?>
            </div>
        </div>
    </nav>
    </div>
    </header>

    <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    <script src="https:////cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function()
        {
            var table=$('#patients-table').DataTable();

            table.on('click','.edit',function () {
                $tr=$(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr=$tr.prev('.parent');
                }

                var data=table.row($tr).data();
                console.log(data);

                $('name').val(data[1]);
                $('pregnancies').val(data[2]);
                $('glucose').val(data[3]);
                $('bloodpressure').val(data[4]);
                $('skinthickness').val(data[5]);
                $('insulin').val(data[6]);
                $('bmi').val(data[7]);
                $('diabetespedegreefunction').val(data[8]);
                $('age').val(data[9]);

                $('edit-patient').attr('action','/patients/',+data[0]);
                $('edit-patients').modal('show');

            });
        });
    </script>
</body>

</html>
<?php /**PATH /home/ikky/Documents/projects/Type-2-Diabetes-Detection-using-Random-Forest-ML-Algorithm/DiDetection/resources/views/layouts/app.blade.php ENDPATH**/ ?>