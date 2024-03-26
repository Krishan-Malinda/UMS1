<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP Test</title>
</head>

<body>
    <!-- <form method="POST" action="<?php #echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> -->
    <form method="POST" action="Admin.php">
        <input type="username" placeholder="User Name" name="username" required><br>
        <input type="password" placeholder="Password" name="password" required><br>
        <button type="submit" name="submitBtn">Log in</button></p>
    </form>

</body>
</html>

<?php mysqli_close($conn) ?>