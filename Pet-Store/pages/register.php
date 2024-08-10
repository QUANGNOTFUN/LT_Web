<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form with Buttons and Logo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../asset/css/register.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <label for="usename">User Name</label>
        <input type="text" id="usename"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email"><br>
        <label for="password">Password</label><br>
        <input type="text" id="password"><br>
        <label for="confirmPassword">Confirm Password</label><br>
        <input type="text" id="confirmPassword"><br>
        <div class="button-container">
            <button onclick="validateForm()">Submit</button>
            <button onclick="clearForm()">Clear</button>
        </div>
        <p>Or</p>
        <a href="index.html"><img src="../asset/images/icon/logo.png" alt="Logo"></a>
    </div>
</body>

</html>