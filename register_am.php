<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> <!-- ดึง bootstrap มาใช้งาน -->
</head>
<body>
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-6">


        <div class="alert alert-primary h4" role="alert">
        ลงทะเบียนเข้าใช้งาน สำหรับอาจารย์
        </div>
        <br>
        <form method="POST" action="้handle_register.php" >
        <label for="">ชื่อ-นามสกุล</label>
        <input type="text" name="name" class="form-control" required> <br>
        <label for="">อีเมล</label>
        <input type="email" name="email" class="form-control w-26" required> <br>
        <label for="">รหัสผ่าน</label>
        <input type="password" name="password" class="form-control w-26" required> <br>
        <div class="mt-2"> 
        <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">    
        <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-primary"> <br>
        </div>
        <a href="login_am.php"> เข้าสู่ระบบ </a>
        </form>
        </div>
        </div>    
    </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>