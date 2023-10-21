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
        if (isset($_POST['add'])) {
            $id=$_POST["id"];
            $en_name=$_POST["en_name"];
            $en_surname=$_POST["en_surname"];
            $th_name=$_POST["th_name"];
            $th_surname=$_POST["th_surname"];
            $major_code=$_POST["major_code"];
            $email=$_POST["email"];
            $validate_ = true;
            
            if (empty($id)) {
                $_SESSION['error'] = 'Empty NisitID.';
                $validate_ = false;
            }else if(empty($en_name)){
                $_SESSION['error'] = 'Empty English Name.';
                $validate_ = false;
            }else if(empty($en_surname)){
                $_SESSION['error'] = 'Empty English Surname.';
                $validate_ = false;
            }else if(empty($th_name)){
                $_SESSION['error'] = 'Empty Thai Name.';
                $validate_ = false;
            }else if(empty($th_surname)){
                $_SESSION['error'] = 'Empty Thai Surname.';
                $validate_ = false;
            }else if(empty($major_code)){
                $_SESSION['error'] = 'Empty Major Code.';
                $validate_ = false;
            }else if (!filter_var($email ,FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Invalid email format.";
                $validate_ = false;
            } else if (strlen($major_code) > 3) {
                $_SESSION['error'] = "Must be 3 characters.";
                $validate_ = false;
            }else if (strlen($id) > 10) {
                $_SESSION['error'] = "Must be 10 characters.";
                $validate_ = false;
            }

            if (!$validate_) {
                echo "<div>".$_SESSION['error']."</div>";
                echo "<a href='insert_std_form.html'>Please try again</a>";
            } else {
                $sql = "INSERT INTO `std_info` (`id`, `en_name`, `en_surname`, `th_name`, `th_surname`, `major_code`, `email`) VALUES ($id, '$en_name', '$en_surname', '$th_name', '$th_surname', '$major_code', '$email')";

                $result = mysqli_query($conn ,$sql);
    
                if ($result) {
                    echo "<div>Insert New Record</div>";
                    echo "<div>Successfully!</div>";
                    echo "<a href='student.php'>Back</a>";
                } else {
                    echo "<div class='alert alert-danger'>" . "เกิดข้อผิดพลาบางอย่าง ข้อความการผิดพลาด: " . mysqli_error($conn) . "</div>";
                    echo "<a class='btn btn-primary' href='insert_std_form.html'>กลับไปที่หน้าเพจ</a>";
                    die();
                }
            }
        }
    
?>