<!-- PHP code to establish connection with the localserver -->
<?php

// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'work_db';

// Server is localhost with
// port number 3306
$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database

if( isset($_GET['Name'])){
    $Name=$_GET['Name'];
    $del="DELETE FROM user WHERE Name='$Name'";
    $delete=$mysqli->query($del);
    header("location:fetchcpy.php");
}
$sql = " SELECT * FROM user ORDER BY Name DESC ";
$result = $mysqli->query($sql);
header("Refresh: 10");
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>


<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<title>User Info</title>
<!-- CSS FOR STYLING THE PAGE -->
	<style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<section>
		<h1>User Info</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>User Name</th>
				<th>Date</th>
				<th>Email_id</th>
				<th>User Income</th>
                <th>Ip Address</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			 <?php                 
				// LOOP TILL END OF DATA
                $num=mysqli_num_rows($result);
                if($num>0){
                    while($rows=mysqli_fetch_assoc($result))
                    {
                        echo "<tr>
                        <td>".$rows['Name']."</td>
                        <td>".$rows['Date']."</td>
                        <td>".$rows['Email']."</td>
                        <td>".$rows['Income']."</td>
                        <td>".$rows['IP_address']."</td>
                        <td><a href='fetchcpy.php?Name=".$rows['Name']."'><span class='glyphicon glyphicon-trash'></span>
                        </a></td>
                    </tr>
                   ";
                }				
            } 
			?>
		</table>
	</section>
</body>

</html>
