<?php

include "config.php";

$message = "";
$messageType = "";
if (isset($_GET['stID'])) {
    $stID = $_GET['stID'];

     
    $sql = "DELETE FROM form WHERE stID = ?";
    
     
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $stID);
    
     
    $result = $stmt->execute();

    if ($result === TRUE) {
        echo " ";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

     
    $stmt->close();
} else {
    echo "No user ID provided for deletion.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
    <style>
        body {
            font-family: "Georgia", serif;
            line-height: 1.6;
            color: #444;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #4a90e2, #ff9ff3);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
        }
        .message {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
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
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
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
        .create-btn {
            background-color: #28a745;
        }
        .create-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Record</h2>
        <?php if (isset($message) && $message): ?>
            <div class="message <?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php else: ?>
            <div class="message">
                <?php 
                    if (isset($result)) {
                        echo $result === TRUE ? "Record deleted successfully" : "Error deleting record: " . $conn->error;
                    } else {
                        echo "No user ID provided for deletion.";
                    }
                ?>
            </div>
        <?php endif; ?>
        
        <div class="button-container">
            <a href="view.php" class="button view-btn">View Records</a>
            <a href="creates.php" class="button create-btn">Create New</a>
        </div>
    </div>
</body>
</html>