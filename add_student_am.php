<!-- หน้าเพิ่มข้อมูลนักเรียน -->
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
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">แบบฟอร์มลงทะเบียน</h3>
            <hr>
            <form method="POST" action="handle_register.php"> <!-- ส่งค่าข้อมูลเพื่อจัดการกับฐานข้อมูลต่อไป -->

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="number" id="firstName" class="form-control form-control-lg" placeholder="รหัสนักศึกษา.." name="student_id"/>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="lastName" class="form-control form-control-lg" placeholder="ชื่อนามสกุล.." name="name"/>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                <select class="select form-control-lg w-2" name="vocation" required>
                    <option value="">ระดับ..</option> 
                    <option value="ปวช.1">ปวช.1</option> 
                    <option value="ปวช.2">ปวช.2</option> 
                    <option value="ปวช.3">ปวช.3</option>
                    <option value="ปวช.1/wil">ปวช.1/wil</option> 
                    <option value="ปวช.2/wil">ปวช.2/wil</option> 
                    <option value="ปวช.3/wil">ปวช.3/wil</option>  
                    <option value="ปวส.1">ปวส.1</option>  
                    <option value="ปวส.2">ปวส.2</option>  
                    <option value="ปวส.1/wil">ปวส.1/wil</option>  
                    <option value="ปวส.2/wil">ปวส.2/wil</option>
                  </select>
                  

                </div>
                <div class="col-md-6 mb-4 d-flex align-items-center">

                <select class="select form-control-lg" name="room" required>
                  <option value="">ห้อง..</option> 
                    <option value="1">1</option> 
                    <option value="2">2</option> 
                    <option value="3">3</option>
                    <option value="4">4</option> 
                    <option value="5">5</option> 
                  </select>

                </div>
                <div class="col-md-6 mb-4 d-flex align-items-center" >

                <select class="select form-control-lg" name="major" required>
                <option value="">แผนก..</option>   
                <option value="แผนกวิชาเทคนิคพื้นฐาน">แผนกวิชาเทคนิคพื้นฐาน</option> 
                <option value="แผนกวิชาช่างยนต์">แผนกวิชาช่างยนต์</option>
                <option value="แผนกวิชาช่างกลโรงงาน" >แผนกวิชาช่างกลโรงงาน</option>
                <option value="แผนกวิชาช่างไฟฟ้ากําลัง">แผนกวิชาช่างไฟฟ้ากําลัง</option>
                <option value="แผนกวิชาเทคนิคคอมพิวเตอร์">แผนกวิชาเทคนิคคอมพิวเตอร์</option>
                <option value="แผนกการบัญชี">แผนกการบัญชี</option>
                <option value="แผนกวิชาการตลาด">แผนกวิชาการตลาด</option>
                <option value="แผนกวิชาการโรงแรม">แผนกวิชาการโรงแรม</option>
                <option value="แผนกวิชาการอาหารและโภชนาการ">แผนกวิชาการอาหารและโภชนาการ</option>
                <option value="แผนกวิชาเทคโนโลยีสารสนเทศ">แผนกวิชาเทคโนโลยีสารสนเทศ</option>
                <option value="แผนกวิชาหลักสูตรระยะสั้น">แผนกวิชาหลักสูตรระยะสั้น</option>
                  </select>

                </div>
                <div class="col-md-6 mb-4">


                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <input type="email" id="emailAddress" class="form-control form-control-lg" name="email" required  placeholder="อีเมล.."/>

                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                    <input type="password" id="phoneNumber" class="form-control form-control-lg" name="password" required  placeholder="รหัสผ่าน"/>

                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-12">

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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
</html>