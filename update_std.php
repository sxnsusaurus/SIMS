<?php
    $servername="localhost";
    $username="root";
    $password="12345678";
    $dbname="students";
    // create connection
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Connection failed ".mysqli_connect_error());
    }
    $id=$_POST["id"];
    $id_hidden=$_POST["id_hidden"];
    $en_name=$_POST["en_name"];
    $en_surname=$_POST["en_surname"];
    $th_name=$_POST["th_name"];
    $th_surname=$_POST["th_surname"];
    $major_code=$_POST["major_code"];
    $email=$_POST["email"];

    $sql="UPDATE `std_info` SET `id`= '$id',`en_name`='$en_name',`en_surname`='$en_surname',`th_name`='$th_name',`th_surname`='$th_surname',`major_code`='$major_code',`email`='$email' WHERE `id`='$id_hidden'";

    $result = mysqli_query($conn,$sql);
    if($result){
        header("location: student.php");
        exit(0);
    }else{
        die("Connection failed ".mysqli_connect_error($conn));
    }
?>