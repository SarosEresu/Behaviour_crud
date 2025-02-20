<!-- หน้าสำหรับ แสดงรายชื่อผู้จัดทำ  -->
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
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">รายชื่อผู้จัดทำ</h3>
            <hr>
            <form method="POST" action="handle_register.php"> <!-- ส่งค่าข้อมูลเพื่อจัดการกับฐานข้อมูลต่อไป -->

              <div class="row">
                <div class="col-md-6 mb-4">

                    <div class="card m-2" style="width: 18rem;">
                            <img src="img/418643656_1835159836943885_7502355402834492248_n.jpg" class="card-img-top" alt="Profile 1">
                            <div class="card-body text-center">
                                <h5 class="card-title">นายกตัญญู เรืองวงษ์</h5>
                                <p class="card-text">รหัสนักศึกษา: 66309010013<br>สาขาวิชา: เทคโนโลยีสารสนเทศ<br>สาขางาน: โปรแกรมคอมพิวเตอร์</p>
                            </div>
                        </div>

                </div>
                <div class="col-md-6 mb-4">

                <div class="card m-2" style="width: 18rem;">
                            <img src="img/f4296d32-f9fa-431d-a0bb-ab94548601d3.jpg" class="card-img-top" alt="Profile 2">
                            <div class="card-body text-center">
                                <h5 class="card-title">นางสาวกังสดาล บุญสอน</h5>
                                <p class="card-text">รหัสนักศึกษา: 66309010022<br>สาขาวิชา: เทคโนโลยีสารสนเทศ<br>สาขางาน: โปรแกรมคอมพิวเตอร์</p>
                            </div>
                        </div>

                </div>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>   
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
</body>
</html>
