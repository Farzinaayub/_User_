<?php
$server_name="localhost";
$username="root";
$password="";
$databse="work_db";
//------------------create connection-------------------------
$conn = new mysqli($server_name,$username,$password,$databse);

//------------------check connection--------------------------

if ($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
else{
  echo "connected successfully";
}
//--------------------------insertion-----------------------------
$Name=$_POST['Name'];
$Date=$_POST['Date'];
$Email=$_POST['Email'];
$Income=$_POST['Income'];
$IP_address=$_POST['IP'];
$sql="INSERT INTO user VALUES ('$Name','$Date','$Email',$Income,'$IP_address')";
if ($conn->query($sql)){
    header("location:user.html");
}
else{
  echo "<BR>";
    echo "Error:could not execute query";
}
//----------------------connection close---------------------------
$conn->close();
?>

