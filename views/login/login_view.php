<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/public/logo.png">
    <link rel="stylesheet" href="/public/bootstrap.min.css">
	<script src="/public/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/public/login.css">
</head>

<body style="background-color:#f1f1f1">
    <div class="mt-0 p-5 bg-secondary text-white rounded text-center">
        <h1>To-Do Managment System</h1>
        <p>by S. Alarcón Rodriguez 💜</p>
    </div>
    <?php if(isset($error)) echo "<h1 style='color:red'>" . $error . "</h1>"; ?>
    <form action="/login/process/" method="post">
        <div class="imgcontainer">
            <img height="300" width="100" src="/public/profile.png" alt="Avatar" class="avatar">
        </div>
        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
                
            <button type="submit">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <a href="/SignUp/index/" class="btn btn-danger cancelbtn">Sign Up</a>
        </div>
    </form>
</body>
</html>