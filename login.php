<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>เข้าสู่ระบบ</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    body{
        font-family: 'Poppins', sans-serif;
        background: #ececec;
    }

    /*------------ Login container ------------*/

    .box-area{
        width: 930px;
    }

    /*------------ Right box ------------*/

    .right-box{
        padding: 40px 30px 40px 40px;
    }

    /*------------ Custom Placeholder ------------*/

    ::placeholder{
        font-size: 16px;
    }

    .rounded-4{
        border-radius: 20px;
    }
    .rounded-5{
        border-radius: 30px;
    }


    /*------------ For small screens------------*/

    @media only screen and (max-width: 768px){

        .box-area{
            margin: 0 10px;

        }
        .left-box{
            height: 100px;
            overflow: hidden;
        }
        .right-box{
            padding: 20px;
        }

    }
</style>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #831a1a;">
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">เว็ปตัดคะแนนความประพฤติ</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">และบันทึกพฤติกรรม</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="d-flex flex-column justify-content-center header-text mb-4">
                     <img src="img/logo03.png" alt="">
                </div>
                <form action="handle_login.php" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="อีเมล" name="email">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="รหัสผ่าน" name="password">
                </div>
                <?php
                    if (isset($_SESSION["Error"])) {
                        echo '<div class="text-danger">' . $_SESSION["Error"] . '</div>';
                        unset($_SESSION["Error"]); // เคลียร์ข้อความ error หลังแสดงผล
                    }
                    ?>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-danger w-100 fs-6" type="submit">เข้าสู่ระบบ</button>
                </div>
                <div class="row">
                    <small>ไม่มีบัญชี? <a href="register.php">ลงทะเบียน</a></small>
                </div>
                </form>
          </div>
       </div> 

      </div>
    </div>

</body>
</html>