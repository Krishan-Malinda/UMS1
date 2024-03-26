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

function welcomeAdmin($rel){
    if (!(mysqli_num_rows($rel)>0)) {
        header("Location:index.php?Login failed!");
    }else{
        foreach($rel as $re) {
            echo '<h3>Hello, '.$re['username'].'</h3>';
        }
    }
}

function viewResult($rel){
    if (!(mysqli_num_rows($rel)>0)) {
        echo 'There is no records!';
    }else{
        echo "<table>
                <tr>
                    <td>User ID</td>
                    <td>User Name</td>
                    <!-- <td>Password</td> -->
                </tr>";
        foreach($rel as $usrs){
            echo "<tr>";
            /* foreach($usrs as $value){
                echo "<td>". $value."</td>";
            } */
            echo "<td>" . $usrs["id"] . "</td><td>" . $usrs["username"] . "</td>";
            echo "</tr>";
        }
        echo "<table>";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitBtn'])) {
    $user = $_POST["username"];
    $pwd = $_POST["password"];

    $query = "SELECT * FROM users WHERE users.username='$user' AND users.password='$pwd'";
    $result = mysqli_query($conn, $query);

    welcomeAdmin($result);
    
    //echo "<form method='POST' action=".htmlspecialchars($_SERVER['PHP_SELF']).">";
    echo "<form method='POST'>";
        echo "<input type='submit' name='allUser' value='View admins'></input> &ensp;";
        echo "<input type='submit' name='addAdmin' value='Add Admin'></input>";
    echo "</form>";
    
}

if(isset($_POST['allUser'])){
    $allUsers = mysqli_query($conn,"SELECT * FROM users");
    viewResult($allUsers);
}

if(isset($_POST['addAdmin'])){
    header("Location:AddAdmin.php");
}

?>

</body>

</html>
<?php mysqli_close($conn); ?>