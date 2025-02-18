<?php
session_start();
include "condb.php";
if(!isset($_SESSION["email"]))
header("location:login.php"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- ดึง sweetlalert มาใช้งาน -->
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 90px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            z-index: 99;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 11.5rem;
                padding: 0;
            }
        }
            
        .navbar {
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
        }

        @media (min-width: 767.98px) {
            .navbar {
                top: 0;
                position: sticky;
                z-index: 999;
            }
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link.active {
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                ระบบตัดคะแนนพฤติกรรม
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                  สวัสดี <?php echo $_SESSION['name'] ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                </ul>
              </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="add_student.php">

                            <span class="ml-2">เพิ่มนักเรียน</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">
                            <span class="ml-2">รายชื่อผู้จัดทำ</span>
                          </a>
                        </li>

                      </ul>
                </div>
            </nav>
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
                              <h5 class="card-title">345k</h5>
                              <p class="card-text">Feb 1 - Apr 1, United States</p>
                              <p class="card-text text-success">18.2% increase since last month</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">ไม่ผ่าน</h5>
                            <div class="card-body">
                              <h5 class="card-title">$2.4k</h5>
                              <p class="card-text">Feb 1 - Apr 1, United States</p>
                              <p class="card-text text-success">4.6% increase since last month</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">ผ่าน</h5>
                            <div class="card-body">
                              <h5 class="card-title">43</h5>
                              <p class="card-text">Feb 1 - Apr 1, United States</p>
                              <p class="card-text text-danger">2.6% decrease since last month</p>
                            </div>
                          </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Traffic</h5>
                            <div class="card-body">
                              <h5 class="card-title">64k</h5>
                              <p class="card-text">Feb 1 - Apr 1, United States</p>
                              <p class="card-text text-success">2.5% increase since last month</p>
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