<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="/public/logo.png">
    <link rel="stylesheet" href="/public/bootstrap.min.css">
    <script src="/public/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/public/signup.css">
</head>

<body>
    <form action="/SignUp/process/" method="post" style="border:1px solid #ccc">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <?php if(isset($error)) echo "<h1 style='color:red'>" . $error . "</h1>"; ?>
            <?php if(isset($ok)) echo "<h1 style='color:green'>" . $ok . "</h1>"; ?>
            <hr>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="psw_repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw_repeat" required>

            <div class="clearfix">
                <a style="color: white;" href="/"><button type="button" class="cancelbtn">Cancel</button></a>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
</body>

</html>