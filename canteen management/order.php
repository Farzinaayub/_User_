<?php
$servername="localhost";
$username="root";
$password="";
$database="nwdb";
//-------------------------connection creation----------------
$conn=new mysqli($servername,$username,$password,$database);
//--------------------------checking connection----------------
if ($conn->connect_error){
    die ("connection failed:".$conn->connect_error);
}
else{
    echo "<b>Connected Successfully";
    echo "<br>";
}
//-------------------------------order-------------------------
$item=$_POST['orderitem'];
$qty=$_POST['qty'];
$sql="UPDATE additem SET quantity=quantity-$qty WHERE itemname='$item'";
if($conn->query($sql)==TRUE){
    echo " Order received ";
    echo "<br>";
    $sq="SELECT * FROM additem WHERE itemname='$item'";
    if($result=$conn->query($sq)){
        while($row=$result->fetch_array()){
            $price=$row[2];
            $cost=$qty*$price;
            echo "your total amount is ".$cost." only";
        }
    }
}
else{
    echo "\nError:could not connect:".$conn->error;
}
$conn->close();
?>