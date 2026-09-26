<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>New Task</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/ctasks.css')); ?>">
    </head>
    <body>

        <div class="menu-overlay" id="menuOverlay"></div>

        <main>
            <div class="header">
                <div class="header-row">
                    <div>
                        <h1>New Task</h1>
                        <p>Add a task to your task manager.</p>
                    </div>
                    <a href="<?php echo e(route('tasks.index')); ?>" class="cancel-btn page-back-btn">Back to Tasks</a>
                </div>
            </div>

            <form action="<?php echo e(route('tasks.store')); ?>" method="POST" class="card task-form new-task-form">
                <?php echo csrf_field(); ?>
                <div class="task-form-grid">
                    <div>
                        <label for="task_name">Task name</label>
                        <input id="task_name" name="task_name" type="text" required maxlength="255" placeholder="Add a task" autofocus>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <input id="description" name="description" type="text" placeholder="Optional notes">
                    </div>
                    <div>
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="Pending" selected>Pending</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div>
                        <label for="due_date">Due date</label>
                        <input id="due_date" name="due_date" type="date">
                    </div>
                    <div class="page-form-actions">
                        <button type="submit" class="add-btn">Add Task</button>
                        <a href="<?php echo e(route('tasks.index')); ?>" class="cancel-btn">Cancel</a>
                    </div>
                </div>
            </form>
        </main>

        <script src="<?php echo e(asset('js/menu.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\codes\capito\resources\views/tasks-create.blade.php ENDPATH**/ ?>