<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="/public/logo.png">
    <link rel="stylesheet" href="/public/bootstrap.min.css">
    <script src="/public/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/public/home.css">
</head>

<body>
    <div class="mt-0 p-5 bg-success text-white rounded text-center">
        <h1>To-Do Managment System</h1>
        <p>💜 Welcome Back <?php @session_start();
                            echo $_SESSION["username"]; ?> 💜</p>
        <a href="/login/close/" class="btn btn-danger">Sign Out</a>
    </div>
    <hr>
    <div class="container align-items-center justify-content-center">
        <div class="row">
            <?php if(isset($error)) echo "<h1 style='color:red'>" . $error . "</h1>"; ?>
            <?php if(isset($ok)) echo "<h1 style='color:green'>" . $ok . "</h1>"; ?>
            <a href="/NewTodo/index/" class="btn btn-primary">New To Do</a>
        </div>
        <br>
        <div class="row">
            <table class="table table-hover table-success text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th colspan="2">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once("models/Todo.php");
                        $todo = new Todo();
                        $todos = $todo->get();
                        if($todos){
                            foreach ($todos as $todo) {
                                $id = $todo[0];
                                $title = $todo[1];
                                $description = $todo[2];
                                $status_number = $todo[3];
                                if($status_number == 0){
                                    $status = "PENDING";
                                    $style = "style='color: red;'";
                                }else if($status_number == 1){
                                    $status = "IN PROGRESS";
                                    $style = "style='color: orange;'";
                                }else if($status_number == 2){
                                    $status = "FINISHED";
                                    $style = "style='color: green;'";
                                }

                                echo "<tr>";
                                    echo "<td>" . $title . "</td>";
                                    echo "<td>" . $description . "</td>";
                                    echo "<td $style>" . $status . "</td>";
                                    echo "<td><a href='/UpdateTodo/index/?id=$id' class='btn btn-primary'>Update</a></td>";
                                    echo "<td><form method='post' action='/UpdateTodo/delete/'><input type='hidden' name='id' value='$id'><input type='submit' class='btn btn-danger' value='Delete' onclick=\"return confirm('Do you really wanna delete this To Do?');\"></form></td>"; 
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>