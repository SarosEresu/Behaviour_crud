<!-- หน้าสำหรับ ลงทะเบียน admin คนใหม่  -->
<?php
    session_start();
    $title = 'Admin dashboard';
    include_once('navbar.php');
?>
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