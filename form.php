<?php
$insert = false;

if (isset($_POST['name'])) {
    // Set Connection Variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create Database Connection
    $conn = mysqli_connect($server, $username, $password);

    // Check for connection success
    if (!$conn) {
        die("Connection tpo this database failed due to " . mysqli_connect_error());
    }

    // echo "Connection Established Successfully:";

    // collecting Post Varaibles
    $country = $_POST['country'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other_detail = $_POST['other_detail'];

    // Query 

    $sql = "INSERT INTO `trip_database`.`terrain_trip` (`country`,`name`, `age`, `gender`, `email`, `phone`, `other_detail`, `date`) VALUES ('$country','$name', '$age', '$gender', '$email', '$phone', '$other_detail', current_timestamp());";
    // echo $sql;

    // Executing Query.
    if ($conn->query($sql) == true) {
        // echo "<Br> <br>Data Successfully inserted";

        $insert = true;
    } else {
        echo "ERROR: $sql <br> $conn->error";
    }

    // Close Connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lixo Office Trip</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img src="bg.jpg" alt="IIT Kharagpur" class="bg">
    <div class="container">

        <h1>Welcom to Terrain Travellers</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if ($insert == true)
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the $country trip</p>";
        ?>
        <form action="form.php" method="post">
            <input type="text" name="country" placeholder="Enter trip country">
            <input type="text" name="name" placeholder="Enter your name">
            <input type="number" name="age" placeholder="Enter your age">
            <input type="text" name="gender" placeholder="Enter your gender">
            <input type="email" name="email" placeholder="Enter your email">
            <input type="phone" name="phone" placeholder="Enter your phone">
            <textarea name="other_detail" placeholder="Enter any other information here"></textarea>
            <button id="btn">submit</button>
        </form>
    </div>
</body>

</html>