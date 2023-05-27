<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <link rel="shortcut icon" href="assets/icon.png">
    <title>SIGN UP</title>
</head>

<body>
    <main>
        <h1>Register</h1>
        <form name="registerform" action="action_page.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter username">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password">
            <label for="password_confirm">Confirm Password:</label>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm password">
            <div class="formtgl">
                <label>Tanggal Lahir:</label>
                <input type="date" name="lahir">
            </div>
            <label>Jenis Kelamin:</label>
            <div class="formjk">
                <input type="radio" id="man" name="jk" value="MAN">
                <label for="man">Laki-laki</label>
                <input type="radio" id="woman" name="jk" value="WOMAN">
                <label for="woman">Perempuan</label>
            </div>
            <div class="term">
                <input type="checkbox" name="agree">
                <p>I agree to the <a href="#">Terms & Policy</a></p>
            </div>
            <input type="submit" value="Register">
        </form>
    </main>
</body>

</html>