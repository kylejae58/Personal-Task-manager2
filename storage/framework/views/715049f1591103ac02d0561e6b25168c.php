<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link rel="stylesheet" href="<?php echo e(asset('css/home.css')); ?>">
</head>

<body>

    


    <!-- Dark Overlay -->
    <div class="menu-overlay" id="menuOverlay"></div>



    <!-- Main Content -->
    <main>

        <!-- Welcome -->
        <div class="dashboard-heading">
            <h1>Welcome in, Caps!</h1>
            <p>“Stay organized. Stay focused.”</p>
        </div>


        <!-- Dashboard -->
        <section class="dashboard-grid">


            <!-- Task Manager -->
            <article class="dashboard-panel">

                <div class="panel-heading">
                    <h2>Task Manager</h2>

                    <a href="<?php echo e(route('tasks.index')); ?>">
                        View all
                    </a>
                </div>


                <?php if($pendingTasks->isEmpty()): ?>

                    <p class="dashboard-empty">
                        No pending tasks.
                    </p>

                <?php else: ?>

                    <ul class="dashboard-task-list">

                        <?php $__currentLoopData = $pendingTasks->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>

                                <span class="dashboard-task-number">
                                    <?php echo e($loop->iteration); ?>

                                </span>

                                <span>
                                    <?php echo e($task->task_name); ?>

                                </span>

                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                <?php endif; ?>

            </article>


            <!-- Upcoming Tasks / Calendar -->
            <article class="dashboard-panel">

                <div class="panel-heading">
                    <h2>Upcoming Tasks</h2>
                </div>


                <?php if($calendarTasks->isEmpty()): ?>

                    <p class="dashboard-empty">
                        No upcoming tasks.
                    </p>

                <?php else: ?>

                    <ul class="dashboard-task-list calendar-preview">

                        <?php $__currentLoopData = $calendarTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <li>

                                <span>
                                    <?php echo e(\Carbon\Carbon::parse($task->due_date)->format('M d, Y')); ?>

                                </span>

                                <strong>
                                    <?php echo e($task->task_name); ?>

                                </strong>

                            </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                <?php endif; ?>

            </article>


        </section>

    </main>


</body>

</html><?php /**PATH C:\xampp\htdocs\codes\capito\resources\views/home.blade.php ENDPATH**/ ?>