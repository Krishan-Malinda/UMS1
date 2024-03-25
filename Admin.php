<?php include 'connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitBtn'])) {
    $user = $_POST["userId"];
    $pwd = $_POST["password"];

    $query = "SELECT * FROM users WHERE users.id='$user' AND users.password='$pwd'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)>0) {
        foreach ($result as $re) {
            echo '<h3>Hello, '.$re['username'].'</h3>';
        }
    }
}


echo "<form action='#' method='POST'>";
    echo "<button name='allUser'>View All Users</button>";
echo "</form>";


    if(isset($_POST['allUser'])){
        $allUsers = mysqli_query($conn,"SELECT * FROM users");
        if(mysqli_num_rows($allUsers)>0){
            echo "<table>
                    <tr>
                        <td>User ID</td>
                        <td>User Name</td>
                    </tr>";
            foreach($allUsers as $usrs){
                echo "<tr>";
                echo "<td>" . $usrs["id"] . "</td><td>" . $usrs["username"] . "</td>";
                echo "</tr>";
            }
            echo "<table>";
        }
    }
?>

</body>

</html>
<?php mysqli_close($conn); ?>