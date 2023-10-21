<!DOCTYPE html>
<html lang="th">
<meta charset="UTF-8">

<head>
    <title>Student Information Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
</head>

<body style="padding: 5%">
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-brand" mb-0 h1>Connected successfully</br></span>
        </div>
        <div style="margin:10px;" class="d-flex justify-content-end">
            <a href='insert_std_form.html'>
                <button type="button" class="btn btn-warning">Insert new record</button>
            </a>
        </div>
    </nav>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors','1');
    ini_set('display_startup_errors','1');

    $servername="localhost";
    $username="root";
    $password="12345678";
    $dbname="students";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Connection failed ".mysqli_connect_error());
    }
    $sql="SELECT * FROM `std_info`";
    $result=mysqli_query($conn,$sql);
    if($result){
        if(mysqli_num_rows($result)>0){
            echo "<table class=table caption-top p-4 mb-3>";
            echo "<tr class=table-info><th >id</th>";
            echo "<th >name</th><th>surname</th>";
            echo "<th >ชื่อ</th><th >นามสกุล</th>";
            echo "<th >Major</th><th >email</th>";
            echo "<th >delete</th><th >edit</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row["id"]."</td>";
                echo "<td>".$row["en_name"]."</td>";
                echo "<td>".$row["en_surname"]."</td>";
                echo "<td>".$row["th_name"]."</td>";
                echo "<td>".$row["th_surname"]."</td>";
                echo "<td>".$row["major_code"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td><a href='delete_std.php ? id=".$row['id']."'><button type=button class=btn ><img width=35px src=https://cdn-icons-png.flaticon.com/128/6711/6711573.png></button></a></td>";
                echo "<td><a href='update_std_form.php ? id=".$row['id']."'><button type=button class=btn ><img width=35px src=https://cdn-icons-png.flaticon.com/128/1634/1634406.png></button></a></td></tr>";
            }
            echo "</table>";
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>