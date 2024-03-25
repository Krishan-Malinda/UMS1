<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP Test</title>
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p><input type="text" placeholder="User ID" name="userId"></p>
        <p><button type="submit" name="submitBtn">Find</button></p>
    </form>

<?php 
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submitBtn'])){
        $user = $_POST["userId"];

        $query = "SELECT * FROM users WHERE id='$user'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0){
            echo "<table>
                    <tr>
                        <td>User ID</td>
                        <td>User Name</td>
                    </tr>";
            foreach($result as $re){
                echo "<tr>";
                echo "<td>".$re["id"]."</td><td>" . $re["username"]. "</td>";
                echo "</tr>";
            }
            echo "<table>";
        }else{
            echo'error';
        }
    }   
?>
</body>
</html>


<?php mysqli_close($conn) ?>