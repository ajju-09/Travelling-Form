<?php
$insert = false;
if(isset($_POST['name'])){

    // Set a connection variables 
     $server = "localhost";
     $username = "root";
     $password = "";

     // Create a database connection
     $conn = mysqli_connect($server, $username, $password);

     // Check for connection success
     if(!$conn){
        die("connecion to this database failed due to ". mysqli_connect_error());
     }
    //  echo "Successfully connected to database";

    // Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile_no = $_POST['phone'];
    $desc = $_POST['desc']; 

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `mobile no.`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$mobile_no', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query 
    if($conn->query($sql) == true){
        // echo "Successfully inserted";
        //Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $conn->error";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container">
        <img class="image" src="image2.webp" alt="trip image">
        <h1>Welcome to C.K.P.C.E.T Us trip form</h1>
        <p>Enter your details and submit thid form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p id='submitMsg'>Thanks for submiting your form. We are happy to see you joining us for the US trip </p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required/>

            <input type="text" name="age" id="age" placeholder="Enter your age" required/>

            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required/>

            <input type="email" name="email" id="email" placeholder="Enter your email" required/>

            <input type="tel" name="phone" id="phone" placeholder="Enter your mobile no." required/>
           <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other informaion here"></textarea>

           <button class="btn">Submit</button>
        </form>
    </div>
<script src="script.js"></script>

</body>
</html>