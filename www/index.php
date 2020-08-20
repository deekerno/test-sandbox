<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task List</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body>
        <section class="hero is-medium is-info is-bold">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        Task List
                    </h1>
                    <h2 class="subtitle">
                        All of your tasks...now in a list!
                    </h2>
                </div>
            </div>
        </section>
        <section>
            <div id="tasks"></div>
            <div class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <form id="edit-form">
                        <input class="input is-focused" type="text" name="task-text" placeholder="Updated task text" id="updated-task-text" autocomplete="off" required="true">
                        <button class="update-task button is-primary" type="submit" name="update-task" id="update-task">Update</button>
                    </form>
                </div>
                <button class="modal-close is-large" aria-label="close"></button>
            </div>
            <form id="task-form">
                <input class="input is-focused task-text" type="text" name="task-text" placeholder="What to do?" id="task-text" autocomplete="off" required="true">
                <button class="new-task button is-primary" type="submit" name="new-task" id="new-task">Submit</button>
            </form>
        </section>
    </body>
</html>

<script>
    $(document).ready(function() {
        loadFreshTasks();

        $(document).on('submit', '#task-form', function(e){
            e.preventDefault();
            task_text = $('#task-text').val();
            $.ajax({
                url: 'add_task.php',
                type: 'POST',
                data: {
                    'text': task_text,
                },
                success: function(response){
                    loadFreshTasks();
                    $('#task-text').val("");
                }
            });
        });

        $(document).on('click', '#edit-btn', function(){
            edited_id = $(this).attr('internal-id');
            $('.modal').addClass('is-active');
            $(document).on('submit', '#edit-form', function(){
                updated_task_text = $('#updated-task-text').val();

                $.ajax({
                    url: 'edit_task.php',
                    type: 'POST',
                    data: {
                        'task': updated_task_text,
                        'internal-id': edited_id,
                    },
                    success: function(response){
                        loadFreshTasks();
                        $('.modal').removeClass('is-active')
                    }
                });
            });
        });

        $(document).on('click', '.modal-close', function(){
            $('.modal').removeClass('is-active')
        });

        $(document).on('click', '#remove-btn', function(){
            removed_id = $(this).attr('internal-id');
            $.ajax({
                url: 'remove_task.php',
                type: 'POST',
                data: {
                    'internal-id': removed_id,
                },
                success: function(response){
                    loadFreshTasks();
                }
            });
        });

        $(document).on('click', '#completed-btn', function(){
            removed_id = $(this).attr('internal-id');
            $.ajax({
                url: 'complete_task.php',
                type: 'POST',
                data: {
                    'internal-id': removed_id,
                },
                success: function(response){
                    loadFreshTasks();
                }
            });
        });

        function loadFreshTasks() {
            $.get("get_tasks.php", {}, function(data, status) {
                $("#tasks").html(data);
            });
        };
    });
</script>