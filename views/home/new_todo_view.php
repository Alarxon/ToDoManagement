<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New To Do</title>
    <link rel="icon" type="image/x-icon" href="/public/logo.png">
    <link rel="stylesheet" href="/public/bootstrap.min.css">
	<script src="/public/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/public/home.css">
</head>
<body>
<form action="/NewTodo/process/" method="post" style="border:1px solid #ccc">
        <div class="container">
            <h1>New To Do</h1>
            <p>Please fill in this form to create a new To Do.</p>
            <?php if(isset($error)) echo "<h1 style='color:red'>" . $error . "</h1>"; ?>
            <?php if(isset($ok)) echo "<h1 style='color:green'>" . $ok . "</h1>"; ?>
            <hr>

            <label for="title"><b>Title</b></label>
            <input type="text" placeholder="Enter Title" name="title" required>

            <label for="description"><b>Description</b></label>
            <textarea placeholder="Enter Description" minlength="1" maxlength="1024" name="description" rows="3"></textarea>

            <label for="status"><b>Status</b></label>
            <select name="status">
                <option value="0">Pending</option>
                <option value="1">In Progress</option>
                <option value="2">Finished</option>
            </select>

            <div class="clearfix">
                <a style="color: white;" href="/home/index/"><button type="button" class="cancelbtn">Cancel</button></a>
                <button type="submit" class="signupbtn">Create</button>
            </div>
        </div>
    </form>
</body>
</html>