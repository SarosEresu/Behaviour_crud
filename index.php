<!-- หน้าแรกสำหรับ แอดมิน  -->
<?php
session_start();
include "condb.php"; /* เชื่อมฐานข้อมูล */
if(!isset($_SESSION["email"])) /* ถ้าไม่มีการล็อคอิน ให้ไปที่หน้าล็อคอิน */
header("location:login.php");


?>
<?php
    $title = 'Admin dashboard';
    include_once('navbar.php');
?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
        
                </nav>
                <h1 class="h2">หน้าต่างสรุปผล</h1>
                <p>หน้าต่างสรุปผลกิจกรรมต่างๆภายในระบบ</p>
                <div class="row my-4">
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">จำนวนนักศึกษาในระบบ</h5>
                            <div class="card-body">
                            <?php 
                            $students_list_query = "SELECT * FROM students_list WHERE status='0'"; /* คำนวนจำนวนนักเรียนทั้งหมด */
                            $student_list_query_run = mysqli_query($conn, $students_list_query);

                            if ($student_list_total = mysqli_num_rows($student_list_query_run)) {	
                                echo '<h4 class="mb-0">' . $student_list_total . '</h4>';
                            } else {
                                echo '<h4 class="mb-0">No Data</h4>';
                            }
                            ?>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">ไม่ผ่าน</h5>
                            <div class="card-body">
                            <?php 
                            $students_list_query = "SELECT * FROM students_list WHERE status='0' AND student_point <= '60'"; /* คำนวนจำนวนนักเรียนที่ผ่าน */
                            $student_list_query_run = mysqli_query($conn, $students_list_query);

                            if ($student_list_total = mysqli_num_rows($student_list_query_run)) {	
                                echo '<h4 class="mb-0">' . $student_list_total . '</h4>';
                            } else {
                                echo '<h4 class="mb-0">No Data</h4>';
                            }
                            ?>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">ผ่าน</h5>
                            <div class="card-body">
                            <?php 
                            $students_list_query = "SELECT * FROM students_list WHERE status='0' AND student_point > '60'"; /* คำนวนจำนวนนักเรียนที่ไม่ผ่าน */
                            $student_list_query_run = mysqli_query($conn, $students_list_query);

                            if ($student_list_total = mysqli_num_rows($student_list_query_run)) {	
                                echo '<h4 class="mb-0">' . $student_list_total . '</h4>';
                            } else {
                                echo '<h4 class="mb-0">No Data</h4>';
                            }
                            ?>
                            </div>
                          </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">รายชื่อนักเรียน</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">รหัสประจำตัวนักศึกษา</th>
                                            <th scope="col">ชื่อ-นามสกุล</th>
                                            <th scope="col">ระดับชั้น</th>
                                            <th scope="col">ห้อง</th>
                                            <th scope="col">สาขาวิชา</th>
                                            <th scope="col">คะแนน</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $sql = "SELECT * FROM students_list WHERE status = 0";
                                            $result = mysqli_query($conn,$sql);
                                            
                                            while($row=mysqli_fetch_array($result)){
                                          ?> 
                                            <tr> 
                                            <td><?=$row['student_id']?></td>    <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
                                            <td><?=$row['name']?></td>          <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
                                            <td><?=$row['vocation']?></td>          <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
                                            <td><?=$row['room']?></td>         <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
                                            <td><?=$row['major']?></td>         <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
                                            <td><?=$row['student_point']?></td>
                                            <td><a href="add_records.php?id=<?=$row['student_id']?>" class="btn btn-primary">ข้อมูลความประพฤติ</a></td>   <!-- ลิงค์ไปที่หน้าเพิ่มข้อมูลความประพฤตินักเรียน อ้างอิงถึงข้อมูลนักเรียนที่ต้องการจะเพิ่ม ด้วย ID ที่ส่งผ่าน URL-->     
                                            <td><a href="edit_student.php?id=<?=$row['student_id']?>" class="btn btn-warning">แก้ไข</a></td>       <!-- ลิงค์ไปที่หน้าแก้ไขข้อมูลนักเรียน อ้างอิงถึงข้อมูลนักเรียนที่ต้องการจะแก้ไข ด้วย ID ที่ส่งผ่าน URL-->
                                            <td><button onclick="confirmDelete(<?=$row['student_id']?>)" class="btn btn-danger">ลบข้อมูล</button></td> <!-- สั่งใช้งาน script เมื่อมีการ click ที่ปุ่มๆนี้ให้แสดง pop-up ของ sweetalert เพื่อแสดงหน้าต่างสั่งลบข้อมูล-->

                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> <!-- เด้ง pop-up เพื่อยืนยันว่าจะลบข้อมูลนี้หรือไม่ -->
    <script>function confirmDelete(id) {
    Swal.fire({
        title: 'คุณแน่ใจหรือไม่?',
        text: "การลบข้อมูลนี้ไม่สามารถกู้คืนได้!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'ลบข้อมูล',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => { // เมื่อเงื่อนไขสั่งลบเป็นจริงให้ทำการสั่งลบ
        if (result.isConfirmed) {
            window.location.href = `delete_student.php?id=${id}`;
        }
    });
}</script>
</body>
</html>