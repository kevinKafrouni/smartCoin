<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2 style="text-align: center;">Create an account</h2>
    <form action="" method="post">
        <label for="fname">First Name</label><input type="text" name="fname" id="fname">
        <label for="lname">Last Name</label><input type="text" name="lname" id="lname">
        <label for="username">Username</label><input type="text" name="username" id="username">
        <label for="password">Password</label><input type="password" name="password" id="password">
        <label for="checkpassword">Verify Password</label><input type="password" name="checkpassword" id="checkpassword">
        <button type="submit">Create</button>
        
    </form>
    <div>
        <p class="form-end">Already Have an account ? <span><a href="login.html">Login</a></span></p>
    </div>
</body>
</html>