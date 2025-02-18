<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-3 badge bg-light text-dark">
                <h5>ระบบล็อคอิน</h5>
                <form method="POST" action="handle_login.php">
                    <input type="text" name="email" class="form-control" required placeholder="อีเมล"><br>
                    <input type="password" name="password" class="form-control" required placeholder="รหัสผ่าน"><br>
                    
                    <?php
                    if (isset($_SESSION["Error"])) {
                        echo '<div class="text-danger">' . $_SESSION["Error"] . '</div>';
                        unset($_SESSION["Error"]); // เคลียร์ข้อความ error หลังแสดงผล
                    }
                    ?>
                    <input type="submit" name="submit" class="btn btn-primary" value="ล็อคอิน">
                </form>    
            </div>
        </div>
        <a href="register.php">ระบบลงทะเบียนสำหรับนักศึกษา</a><br>
        <a href="register_am.php">ระบบลงทะเบียนสำหรับอาจารย์</a><br>
    </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>
