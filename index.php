<?php
$insert = false;
if(isset($_POST['Name'])){
    //set connection variables
    $servername ="localhost";
    $username = "root";
    $password = "";
    $database = "trip";
    
    //create a database connection
    $con = mysqli_connect($servername, $username, $password, $database);
    //check for connection issues
    if(!$con){
        die("connection to this database failed due to" .
        mysqli_connect_error());
    }
   //echo "Success connecting to db";

   //collect post variables
   $Name = $_POST['Name'];
   $Year = $_POST['Year'];
   $Gender = $_POST['Gender'];
   $Email = $_POST['Email'];
   $Phone = $_POST['Phone'];
   $desc = $_POST['desc'];
   $sql = "INSERT INTO `trip`.`trip` (`Name`, `Year`, `Gender`, `Email`, `Phone`, `other`, `reg_date`) VALUES ('$Name', '$Year', '$Gender', '$Email', '$Phone', '$desc', current_timestamp());";
   //echo $sql;

   //excute the query
   if($con->query($sql) == true){
    //echo "Successfully inserted";

    //flag for successfull insertion
    $insert = true;
   }
   else{
    echo "ERROR: $sql <br> $con->error";
   }
   //close the database
   $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="JUET">
    <div class="container">
        <h1>Welcome to JUET Annual Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
            echo "<p class='submit-msg'>Thanks for submitting your form. We are happy to see you joining.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="Name" id="name" placeholder="Enter your name">
            <input type="text" name="Year" id="year" placeholder="Enter your Year">
            <input type="text" name="Gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="Email" id="email" placeholder="Enter your Email">
            <input type="phone" name="Phone" id="phone" placeholder="Enter your Phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>