<!-- หน้าสำหรับ ลงทะเบียน admin คนใหม่  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียน</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> <!-- ดึง bootstrap มาใช้งาน -->
    <style>
      .gradient-custom {
        /* fallback for old browsers */
        background: #831a1a;
        }
        hr {
        color: #831a1a;
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
        }
        .card-registration .select-arrow {
        top: 13px;
        }
    </style>
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">แบบฟอร์มลงทะเบียน แอดมิน</h3>
            <hr>
            <form method="POST" action="handle_register_am.php">

              <div class="row">
              <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="number" id="lastName" class="form-control form-control-lg" placeholder="เบอร์โทร..." name="tel" required/>
                  </div>

                  </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="firstName" class="form-control form-control-lg" placeholder="ชื่อผู้ใช้งาน.." name="name" required/>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="email" id="lastName" class="form-control form-control-lg" placeholder="อีเมล..." name="email" required/>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="password" id="lastName" class="form-control form-control-lg" placeholder="รหัสผ่าน..." name="password" required/>
                  </div>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <input data-mdb-ripple-init class="btn btn-danger btn-lg" type="submit" value="ยืนยัน" />
                <a href="index.php" class="btn btn-warning btn-lg">ย้อนกลับ</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>