<?php
$servername="localhost";
$username="root";
$password="";
$database="nwdb";
//----------------------connection creation--------------------------------------
$conn=new mysqli($servername,$username,$password,$database);
//------------------------check connection---------------------------------------
if ($conn->connect_error){
    echo("connection failed:".$conn->connect_error);
}
else{
    echo "--------------------------connected successfully------------------------------";
}
//-----------------------------fetching------------------------------------------
// 
$item=$_POST["itemnm"];
$sql="SELECT * FROM additem WHERE itemname='$item'";
if ($result=$conn->query($sql)){
    if ($result->num_rows>0){
        while($row=$result->fetch_array()){
            echo "<BR>";
            echo "\nitem: ".$row[0];
            echo "<BR>";
            echo "\nquantity: ".$row[1];
            echo "<BR>";
            echo "priceperpiece: ".$row[2];
            echo "<BR>";
            echo "<BR>";
        }
        $result->close();
    }
    else{
        echo "<BR>";
        echo "\n not available";
    }
}
else{
    echo "\nError:could not connect";
}
$conn->close();
?>