<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
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

                    <a href="{{ route('tasks.index') }}">
                        View all
                    </a>
                </div>


                @if ($pendingTasks->isEmpty())

                    <p class="dashboard-empty">
                        No pending tasks.
                    </p>

                @else

                    <ul class="dashboard-task-list">

                        @foreach ($pendingTasks->take(5) as $task)

                            <li>

                                <span class="dashboard-task-number">
                                    {{ $loop->iteration }}
                                </span>

                                <span>
                                    {{ $task->task_name }}
                                </span>

                            </li>

                        @endforeach

                    </ul>

                @endif

            </article>


            <!-- Upcoming Tasks / Calendar -->
            <article class="dashboard-panel">

                <div class="panel-heading">
                    <h2>Upcoming Tasks</h2>
                </div>


                @if ($calendarTasks->isEmpty())

                    <p class="dashboard-empty">
                        No upcoming tasks.
                    </p>

                @else

                    <ul class="dashboard-task-list calendar-preview">

                        @foreach ($calendarTasks as $task)

                            <li>

                                <span>
                                    {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                </span>

                                <strong>
                                    {{ $task->task_name }}
                                </strong>

                            </li>

                        @endforeach

                    </ul>

                @endif

            </article>


        </section>

    </main>


</body>

</html>