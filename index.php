<?php
$insert = false;
if(isset($_POST['username'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "project";

    $con = mysqli_connect($server, $username, $password, $database, 3306);

    if(!$con){
        die("Connection to the database failed due to: " . mysqli_connect_error());
    }
    
    $username = $_POST['username'];
    $age = $_POST['age']; // Assuming 'age' is the name of the input field for age
    $email = $_POST['email'];

    // Fix SQL query to insert username, age, and email
    $sql = "INSERT INTO `newuser` (`username`, `age`, `email`) VALUES ('$username', '$age' ,'$email')";

    if($con->query($sql) === true){
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="https://admission.raisoni.net/img/campus/ghribmjal.jpg" alt="G.H Raisoni College ">
    <div class="container">
        <h1>Welcome to G.H Raisoni College US Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="username" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age"> <!-- Assuming 'age' input field -->
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
