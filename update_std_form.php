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
    $id = $_GET["id"];
    $sql="SELECT * FROM `std_info` WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="th">
<meta charset="UTF-8">

<head>
    <title>Student Information Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav>
        <div class="p-4 mb-3 bg-primary text-white ">
            <h5 class="fw-semibold ">Edit Students Information</h5>
        </div>
    </nav>
    <form id="registerFrom" class="row g-3 mx-auto p-5 " method="post" action="update_std.php">
        <input type="hidden" value="<?php echo $row["id"];?>" name="id_hidden">
        <div class="col-12 row g-3 align-items-center">
            <div class="col-auto">
                <label for="NisitID" class="col-form-label">id : </label>
            </div>
            <div class="col-auto">
                <input type="password" class="form-control" name="id" value="<?php echo $row["id"]; ?>">
            </div>
            <div class="col-auto">
                <span id="worning" class="form-text">
                    Must be 10 characters.
                </span>
            </div>
        </div>
        <div class="col-md-6">
            <label for="en_name" class="form-label">name</label>
            <input type="text" class="form-control" name="en_name" value="<?php echo $row["en_name"]; ?>">
        </div>
        <div class="col-md-6">
            <label for="en_surname" class="form-label">surname</label>
            <input type="text" name="en_surname" class="form-control" value="<?php echo $row["en_surname"]; ?>">
        </div>

        <div class="col-md-6">
            <label for="th_name" class="form-label">ชื่อ</label>
            <input type="text" name="th_name" class="form-control" value="<?php echo $row["th_name"]; ?>">
        </div>

        <div class="col-md-6">
            <label for="th_surname" class="form-label">นามสกุล</label>
            <input type="text" name="th_surname" class=" form-control" value="<?php echo $row["th_surname"]; ?>">
        </div>
        <div class="col-md-2">
            <label for="major_code" class="form-label">Major</label>
            <input type="text" name="major_code" class="form-control" placeholder="T12" value="<?php echo $row["major_code"]; ?>">
        </div>
        <div class="col-md-10">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="name@example.com" value="<?php echo $row["email"]; ?>">
        </div>
        <div style="display: block;">
            <button class="btn btn-primary" type="submit" name="update">update</button>
            <button class="btn btn-warning" type="reset" name="reset">reset</button>
        </div>
        <div>
            <a href="student.php"> 
                <button type="button" class="btn btn-link">
                    Student Information
                </button>
            </a>
        </div>
    </form>
        
</body>

</html>