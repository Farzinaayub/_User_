<?php
$server_name="localhost";
$username="root";
$password="";
$databse="nwdb";
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
$itemname=$_POST['itemname'];
$quantity=$_POST['quantity'];
$price=$_POST['price_per_piece'];
$sql="INSERT INTO additem VALUES ('$itemname',$quantity,$price)";
if ($conn->query($sql)){
    echo "<BR>";
    echo "New Row Added";
}
else{
    echo "Error:could not execute query";
}
//----------------------connection close---------------------------
$conn->close();
?>

