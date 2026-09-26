<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}">

</head>

<body>

    <main>

        <!-- HEADER -->

        <div class="header">

            <div class="header-row">

                <div>

                    <!-- Go back to Home -->
                    <a href="{{ route('home') }}" class="back-btn">
                        ← Home
                    </a>

                    <h1>Task Manager</h1>

                    <p>
                        Keep track of what needs to be done.
                    </p>

                </div>


                <!-- Add Task -->
                <a href="{{ route('tasks.create') }}" class="header-add-btn">
                    + Add Task
                </a>

            </div>

        </div>


        <!-- PENDING TASKS -->

        <div class="task-group card">

            <h2 class="task-group-title status-pending">
                Pending Tasks
            </h2>


            @if ($tasks->where('status', 'Pending')->isEmpty())

                <p class="empty-state">
                    No pending tasks.
                </p>

            @else

                <ul class="task-list">

                    @foreach ($tasks->where('status', 'Pending') as $task)

                        <li class="task-item">

                            <!-- Task information -->
                            <div class="task-left">

                                <!-- Complete button -->
                                <form
                                    action="{{ route('tasks.toggle', $task) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="toggle-btn"
                                    >
                                    </button>

                                </form>


                                <div>

                                    <!-- Task name -->
                                    <p class="task-title">
                                        {{ $task->task_name }}
                                    </p>


                                    <!-- Status and due date -->
                                    <div class="task-meta">

                                        <span class="task-status status-pending">
                                            Pending
                                        </span>


                                        @if ($task->due_date)

                                            <span class="task-due-date">
                                                Due:
                                                {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                            </span>

                                        @endif

                                    </div>


                                    <!-- Description -->
                                    @if ($task->description)

                                        <p class="task-description">
                                            {{ $task->description }}
                                        </p>

                                    @endif

                                </div>

                            </div>


                            <!-- Buttons -->
                            <div class="task-actions">

                                <button
                                    type="button"
                                    class="edit-btn"
                                    onclick="showEdit({{ $task->id }})"
                                >
                                    Edit
                                </button>


                                <form
                                    action="{{ route('tasks.destroy', $task) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-btn"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </li>


                        <!-- EDIT FORM -->

                        <li
                            id="edit-{{ $task->id }}"
                            class="task-edit"
                            style="display: none;"
                        >

                            <form
                                action="{{ route('tasks.update', $task) }}"
                                method="POST"
                                class="card task-form"
                            >

                                @csrf

                                @method('PUT')


                                <div class="task-form-grid">

                                    <!-- Task name -->
                                    <div>

                                        <label>
                                            Task name
                                        </label>

                                        <input
                                            type="text"
                                            name="task_name"
                                            value="{{ $task->task_name }}"
                                            required
                                        >

                                    </div>


                                    <!-- Description -->
                                    <div>

                                        <label>
                                            Description
                                        </label>

                                        <input
                                            type="text"
                                            name="description"
                                            value="{{ $task->description }}"
                                        >

                                    </div>


                                    <!-- Status -->
                                    <div>

                                        <label>
                                            Status
                                        </label>

                                        <select name="status">

                                            <option value="Pending" selected>
                                                Pending
                                            </option>

                                            <option value="Completed">
                                                Completed
                                            </option>

                                        </select>

                                    </div>


                                    <!-- Due date -->
                                    <div>

                                        <label>
                                            Due date
                                        </label>

                                        <input
                                            type="date"
                                            name="due_date"
                                            value="{{ $task->due_date }}"
                                        >

                                    </div>


                                    <!-- Save / Cancel -->
                                    <div>

                                        <button
                                            type="submit"
                                            class="save-btn"
                                        >
                                            Save
                                        </button>

                                        <button
                                            type="button"
                                            class="delete-btn"
                                            onclick="hideEdit({{ $task->id }})"
                                        >
                                            Cancel
                                        </button>

                                    </div>

                                </div>

                            </form>

                        </li>

                    @endforeach

                </ul>

            @endif

        </div>


        <!-- COMPLETED TASKS -->

        <div class="task-group card">

            <h2 class="task-group-title status-completed">
                Completed Tasks
            </h2>


            @if ($tasks->where('status', 'Completed')->isEmpty())

                <p class="empty-state">
                    No completed tasks.
                </p>

            @else

                <ul class="task-list">

                    @foreach ($tasks->where('status', 'Completed') as $task)

                        <li class="task-item">

                            <!-- Task information -->
                            <div class="task-left">

                                <!-- Undo complete -->
                                <form
                                    action="{{ route('tasks.toggle', $task) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="toggle-btn completed"
                                    >
                                        ✓
                                    </button>

                                </form>


                                <div>

                                    <!-- Task name -->
                                    <p class="task-title completed">
                                        {{ $task->task_name }}
                                    </p>


                                    <!-- Status and due date -->
                                    <div class="task-meta">

                                        <span class="task-status status-completed">
                                            Completed
                                        </span>


                                        @if ($task->due_date)

                                            <span class="task-due-date">
                                                Due:
                                                {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                            </span>

                                        @endif

                                    </div>


                                    <!-- Description -->
                                    @if ($task->description)

                                        <p class="task-description">
                                            {{ $task->description }}
                                        </p>

                                    @endif

                                </div>

                            </div>


                            <!-- Buttons -->
                            <div class="task-actions">

                                <button
                                    type="button"
                                    class="edit-btn"
                                    onclick="showEdit({{ $task->id }})"
                                >
                                    Edit
                                </button>


                                <form
                                    action="{{ route('tasks.destroy', $task) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-btn"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </li>


                        <!-- EDIT FORM -->

                        <li
                            id="edit-{{ $task->id }}"
                            class="task-edit"
                            style="display: none;"
                        >

                            <form
                                action="{{ route('tasks.update', $task) }}"
                                method="POST"
                                class="card task-form"
                            >

                                @csrf

                                @method('PUT')


                                <div class="task-form-grid">

                                    <!-- Task name -->
                                    <div>

                                        <label>
                                            Task name
                                        </label>

                                        <input
                                            type="text"
                                            name="task_name"
                                            value="{{ $task->task_name }}"
                                            required
                                        >

                                    </div>


                                    <!-- Description -->
                                    <div>

                                        <label>
                                            Description
                                        </label>

                                        <input
                                            type="text"
                                            name="description"
                                            value="{{ $task->description }}"
                                        >

                                    </div>


                                    <!-- Status -->
                                    <div>

                                        <label>
                                            Status
                                        </label>

                                        <select name="status">

                                            <option value="Pending">
                                                Pending
                                            </option>

                                            <option value="Completed" selected>
                                                Completed
                                            </option>

                                        </select>

                                    </div>


                                    <!-- Due date -->
                                    <div>

                                        <label>
                                            Due date
                                        </label>

                                        <input
                                            type="date"
                                            name="due_date"
                                            value="{{ $task->due_date }}"
                                        >

                                    </div>


                                    <!-- Save / Cancel -->
                                    <div>

                                        <button
                                            type="submit"
                                            class="save-btn"
                                        >
                                            Save
                                        </button>

                                        <button
                                            type="button"
                                            class="delete-btn"
                                            onclick="hideEdit({{ $task->id }})"
                                        >
                                            Cancel
                                        </button>

                                    </div>

                                </div>

                            </form>

                        </li>

                    @endforeach

                </ul>

            @endif

        </div>

    </main>


    <!-- SIMPLE JAVASCRIPT FOR EDIT -->

    <script>

        function showEdit(id) {
            document.getElementById('edit-' + id).style.display = 'block';
        }

        function hideEdit(id) {
            document.getElementById('edit-' + id).style.display = 'none';
        }

    </script>

</body>

</html>