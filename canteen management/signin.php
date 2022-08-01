<?php
$servername="localhost";
$username="root";
$password="";
$database="nwdb";
$conn=new mysqli($servername,$username,$password,$database);
if ($conn->connect_error){
    die ("connection failed:".$conn->connect_error);
}
else{
    echo "connected successfully";
}
$name=$_POST['name'];
$dept=$_POST['dept'];
$batch=$_POST['batch'];
$reg=$_POST['reg'];
$yr=$_POST['yr'];
$contact=$_POST['contact'];
$sql="INSERT INTO main VALUES('$name','$dept','$batch',$reg,$yr,$contact,DEFAULT)";
if($result=$conn->query($sql)){
    echo "<BR>";
    echo "New Row Added";
}
else{
    echo "<BR>";
    echo "error,could not execute query";
}
$conn->close();
?>
