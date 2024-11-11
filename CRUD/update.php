<?php 

include "config.php";

if (isset($_POST['update'])) {
    $stID = $_POST['stID'];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    
    $sql = "UPDATE `form` SET `fname` = ?, `lname` = ?, `email` = ?, `age` = ?, `phone` = ?, `address` = ?, `gender` = ? WHERE `stID` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssisssi", $fname, $lname, $email, $age, $phone, $address, $gender, $stID);
    $result = $stmt->execute();
    
    if ($result === TRUE) {
        echo "Record Updated Successfully";
    }
}

if (isset($_GET['stID'])) {
    $stID = $_GET['stID'];
    $sql = "SELECT * FROM `form` WHERE `stID` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $stID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $age = $row['age'];
        $phone = $row['phone'];
        $address = $row['address'];
        $gender = $row['gender'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
     
    <title>Update Personal Information</title>
    <style>
        body {
            font-family:"Georgia", serif;
            line-height: 1.6;
            color: #444;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background: linear-gradient(to bottom right, #4a90e2, #ff9ff3);
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
             
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        h2 {
            color:black;
            text-align: center;
        }
        form {
            display: grid;
            gap: 20px;
        }
        label {
            font-weight: bold;
            color: #34495e;
            margin-bottom: 5px;
            display: block;
            margin-top: 12px;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }
        input[type="submit"] {
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            background-color: #007bff;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
            gap: 20px;
        }
        
            .button {
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        
        .view-btn {
            background-color: #007bff;
        }
        .view-btn:hover {
            background-color: #0056b3;
        }
        .radio-group {
            margin-top: 10px;
        }
        .radio-group label {
            display: inline-block;
            margin-right: 15px;
        }
        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 15px;
            }
        }
    </style>
</head>
<body> 
    <h2>Update Personal Information</h2>
    <div class="container">
       
        <?php
        if (isset($_POST['update'])) {
            if ($result === TRUE) {
                echo "<div class='message success'>Record Updated Successfully</div>";
            }  
        }
        ?>
        <form action="" method="POST">
            <input type="hidden" name="stID" value="<?php echo  ($stID); ?>">
           
            <div>
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo  ($fname); ?>" required>
            </div>
           
            <div>
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo  ($lname); ?>" required>
            </div>
           
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo  ($email); ?>" required>
            </div>
           
            <div>
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="<?php echo  ($age); ?>" required>
            </div>
           
            <div>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo  ($phone); ?>" required>
            </div>
         
            <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo ($address); ?>" required>
            </div>
           
            <div class="radio-group">
            <label>Gender:</label>
            <label for="male">
                <input type="radio" id="male" name="gender" value="Male" required> Male
            </label>
            <label for="female">
                <input type="radio" id="female" name="gender" value="Female" required> Female
            </label>
        </div>
        <div class="button-container">
            <input type="submit" name="update" value="Update Information" class="button">
           
            <a href="view.php" class="button view-btn">View Records</a>
            </div>
        </form>
    </div>
</body>
</html>

