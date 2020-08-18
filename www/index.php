<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task List</title>
        <link rel="stylesheet" href="/assets/css/bulma.min.css">
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
            <div class="tasks"></div>
            <form id="task-form">
                <input type="text" name="task-text" placeholder="What to do?" id="task-text" autocomplete="off">
                <button class="new-task is-primary" type="submit" name="new-task" id="new-task"></button>
            </form>
        </section>
    </body>
</html>

<script>
    $(document).ready(function() {
        loadFreshTasks();
        $(document).on('click', '.new-task', function(){
            task_text = $('#task-text').val();
            $.ajax({
                url: 'add_task.php',
                type: 'POST',
                data: {
                    text: task_text,
                },
                success: function(response){
                    loadFreshTasks();
                    $('#task-text').val("");
                }
            });
        });

        $(document).on('click', '.remove-btn', function(){
            removed_id = $(this).attr('internal-id');
            $.ajax({
                url: 'remove_task.php',
                type: 'POST',
                data: {
                    internal-id: removed_id,
                },
                success: function(response){
                    loadFreshTasks();
                }
            });
        });


        function loadFreshTasks() {
            $.get("get_tasks.php", {}, function(data, status) {
                $(".tasks").html(data);
            });
        };
    });
</script>