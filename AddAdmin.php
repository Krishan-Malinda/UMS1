<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h2>Add Admin</h2>
    <h4>Enter new admin details</h4>
    <form method="POST">

        <table>
            <tr>
                <td><label>User ID: </label></td>
                <td><input type="text" name="userId" placeholder="Eg:u0001" required></td>
            </tr>
            <tr>
                <td><label>Username: </label></td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td><label>Password: </label></td>
                <td><input type="text" name="password" required><br></td>
            </tr>
            <tr><td><button name="addAdmin">Add</button></td></tr>
        </table>

        
    </form>

    <?php 
        if(isset($_POST['addAdmin'])){
            $uId = $_POST['userId'];
            $uname = $_POST['username'];
            $pwd = $_POST['password'];

            $query = "INSERT INTO users VALUES('$uId', '$uname', '$pwd')";
            $success = mysqli_query($conn,$query);

            if(!$success){
                echo "Can't add this admin!";
            }else{
                echo "Addmin Added Successfully!";
            }
        }
    ?>
    <br><a href='Admin.php'>Go home</a>
    
</body>
</html>

<?php mysqli_close($conn); ?>