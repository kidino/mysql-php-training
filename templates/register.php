<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="auth">
    <h1>User Registration</h1>
    <?php if ( isset($_GET['error']) ) : ?>
        <p class="alert"><?php echo $_GET['error']?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="username">Email:</label>
        <input type="text" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" name="submit" value="Register">
    </form>
</body>
</html>