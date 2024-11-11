<?php 
include "config.php";
 
$sql = "SELECT * FROM form";
    
$result = $conn->query($sql);

?>


<!DOCTYPE html>
 
<head>
  
    <title>Records</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f4f8;
            color: #333;
            background: linear-gradient(to bottom right, #4a90e2, #ff9ff3);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9em;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #e8f4f8;
            transition: background-color 0.3s ease;
        }
        .btn {
            padding: 0px 6px;
            text-decoration: none;
            color: white;
            border-radius: 3px;
            font-size: 0.9em;
            transition: background-color 0.3s ease;
        }
        .btn-info {
            background-color: #2ecc71;
        }
        .btn-info:hover {
            background-color: #27ae60;
        }
        .btn-danger {
            background-color: #e74c3c;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            tr {
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 8px;
                overflow: hidden;
            }
            td {
                border: none;
                position: relative;
                padding-left: 50%;
            }
            td:before {
                position: absolute;
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                content: attr(data-label);
                font-weight: bold;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Personal Information Records</h1>
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 
                 


                if ($result !== null  && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td data-label='Student ID'>" . ($row["stID"]) . "</td>";
                        echo "<td data-label='First name'>" . ($row["fname"]) . "</td>";
                        echo "<td data-label='Last name'>"  . ($row["lname"]) . "</td>";
                        echo "<td data-label='Email'>"      . ($row["email"]) . "</td>";
                        echo "<td data-label='Age'>"        . ($row["age"]) . "</td>";
                        echo "<td data-label='Phone'>"      . ($row["phone"]) . "</td>";
                        echo "<td data-label='Address'>"    . ($row["address"]) . "</td>";
                        echo "<td data-label='Gender'>"     . ($row["gender"]) . "</td>";
                        echo "<td data-label='Action'>
                                <a class='btn btn-info' href='update.php?stID=" .  ($row['stID']) . "'>Edit</a>&nbsp;
                                <a class='btn btn-danger' href='delete.php?stID=" .  ($row['stID']) . "'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>