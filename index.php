<?php
$submit = false;
    if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "";
    
        $con = mysqli_connect($server, $username, $password);
    
        if(!$con){
            die("Connection t this database failed due to".mysqli_connect_error());
        }
        // echo "Success connected to database";
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];
        $sql = "INSERT INTO `trip`.`trip`(`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
        // echo $sql;
    
        if($con->query($sql) == true){
            $submit = true;
            // echo"Successfully inserted";
        }else{
            echo"Error ".$sql."<br>".$con->error ;
        }
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="LovelyProfessionalUniversity">
    <div class="container">
        <h1>Welcome to Lovely Professional University JAPAN trip form</h1>
        <p>
            Enter you details and submit this form to confirm your participation in the trip
        </p>
        <?php
            if($submit == true){
                echo"<p class='submitMSG'>
                <b>Thanks for submitting your form. We are happy to see you joining with.</b>
            </p>";
            }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id = "name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone number">
            <textarea type="desc" name = "desc" id = "desc" cols ="30" rows = "10" placeholder="Enter your text"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>