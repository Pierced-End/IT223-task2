<?php
    include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
            font-style: italic;
        }
        .count {
            margin-bottom: 15px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Table Data</h1>
        
        <?php
        
	        $sql = "SELECT id, name, email, contact, gender FROM usertbl ORDER BY id";
	        $result = mysqli_query($conn, $sql);
	        
	        if (!$result) {
	            echo "<p class='no-data'>Error: " . mysqli_error($conn) . "</p>";
	        } else {
	            $row_count = mysqli_num_rows($result);
	            
	            echo "<div class='count'>Total Users: " . $row_count . "</div>";
	            
	            if ($row_count > 0) {
	                echo "<table>";
	                echo "<thead>";
	                echo "<tr>";
	                echo "<th>ID</th>";
	                echo "<th>Name</th>";
	                echo "<th>Email</th>";
	                echo "<th>Contact</th>";
	                echo "<th>Gender</th>";
	                echo "</tr>";
	                echo "</thead>";
	                echo "<tbody>";

	                while($row = mysqli_fetch_assoc($result)) {
	                    echo "<tr>";
	                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
	                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
	                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
	                    echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
	                    echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
	                    echo "</tr>";
	                }
	                
	                echo "</tbody>";
	                echo "</table>";
	            } else {
	                echo "<p class='no-data'>No users found in the database.</p>";
	            }
	            
	            mysqli_free_result($result);
	        }

	        mysqli_close($conn);
        ?>
    </div>
</body>
</html>