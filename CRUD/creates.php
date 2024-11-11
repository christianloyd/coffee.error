 

<?php
 
include "config.php";
 
if(isset($_POST['submit'])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
       
    $sql = " INSERT INTO form  (fname, lname, email, age, phone, address, gender) VALUES ('$fname', '$lname','$email', '$age', '$phone', '$address', '$gender')";
    $result = $conn->query($sql);
    if ($result == TRUE ) {
        echo " New record created";
          
      }
      else {
        echo "Error:" . $sql . "<br>". $conn->error;
    }
    
     
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Information Form</title>
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
        h2 {
            color:black;
            text-align: center;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 9px 9px 9px rgba(0,0,0,0.5);
        }
        label {
            display: block;
            margin-top: 12px;
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="submit"], input[type="number"]{
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 15px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #6495E9;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
            gap: 20px;
        }
        
        .button {
            
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        
        .view-btn {
            background-color: #3498db;
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
        .result {
            margin-top: 20px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 9px 9px 9px rgba(0,0,0,0.5);
        }
    </style>
</head>
<body>
    <h2>Personal Information</h2>
   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required>
        
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required>
       
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
       
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone">
       
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
       
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
            <input type="submit" name="submit" value="Submit Information" class="button">
           
            <a href="view.php" class="button view-btn">View Records</a>
            </div>
    </form>

</body>
</html>
