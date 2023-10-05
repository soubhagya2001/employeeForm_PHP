

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <div class="header">
            <h1>EMPLOYEE DETAILS FORM</h1>
        </div>

        <div class="form">

            <form method="POST" action="index.php">
            <div class="data">
            <label for="name">Name :</label>
            <input type="text" placeholder="Enter Name" name="name" required>
            </div>

            <div class="data">
            <label for="fname">Father Name : </label>
            <input type="text" name="fname" placeholder="Enter Father's Name" required>
            </div>

            <div class="data">
            <label for="age">Age :</label>
            <input type="number" name="age" placeholder="Enter Age" required>
            </div>

            <div class="data">
                <label for="gender">Gender :</label>
                <input type="text" name="gender" placeholder="Enter Gender" required>
            </div>

            <div class="data">
            <label for="phone">Phone : </label>
            <input type="tel" name="phone" placeholder="Enter Phone Number" required>
            </div>

            <div class="data">
            <label for="email">Email : </label>
            <input type="email" name="email" placeholder="Enter Email" required>
            </div>

            <div class="data">
                <label for="dept">Department :</label>
                <input type="text" name="dept" placeholder="Enter Department Name" required>
            </div>

            <div class="data">
                <label for="add">Address : </label>
                <textarea name="add" id="" cols="30" rows="2" placeholder="Enter Address " required></textarea>
            </div>
            
            <div class="submission">
                <input type="submit" value="register" id="submit" class="btn">
                <input type="button" value="details"  id="details" class="btn" onClick="window.location.href='display.php';">
            </div>
           
            </form>
        
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>


<?php
include("connection.php");


if($_POST['name']){
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dept = $_POST['dept'];
    $add = $_POST['add'];

    $query = "INSERT INTO emp1 (`name`, `fname`, `age`, `gender`, `phone`, `email`, `dept`, `address`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";



    $stmt = mysqli_prepare($conn, $query);


    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssisssss", $name, $fname, $age, $gender, $phone, $email, $dept, $add);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Data added successfully !')</script>";
        } else {
            echo "<script>alert('Data adding failed !')</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Statement preparation failed !')</script>";
    }
    
    

    
}  
?>
