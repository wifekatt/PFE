
<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="utf-8">
    <title> VOTING LOGIN</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
<form class="box" onsubmit="return validate();" action="loginprocess.php" method="POST">

<h1> login </h1>
<input type="text" name="name" placeholder="Enter Username" id="username">
<input type="password" name="pass" placeholder="Enter Password" id="password">
<div class="g-recaptcha" data-sitekey="6LeTZroeAAAAAIzVh6k4sR25ZM1Qrif7irLgtXQT"></div>
<input type="submit" name="sub" id="sub" value="Login"  >
</form>
</body>
</html>