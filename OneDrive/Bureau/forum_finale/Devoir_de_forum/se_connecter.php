
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Se connecter</h1>
    <form action="auth.php" method="POST">
        <span><?= $msg; ?></span>
        <label> User Name :
            <input name="user_name" type="email" required>
        </label>
        <label> Password :
            <input name="password" type="password" required>
        </label>
        <input type="submit" value="Save">
    </form>
</body>
</html>