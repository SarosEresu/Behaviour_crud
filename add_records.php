<?php
    session_start();
    include "condb.php"; //เชื่อมฐานข้อมูล
    $id = $_GET['id']; //ดึงไอดีของข้อมูลที่ต้องการจะแก้ที่ส่งกับURLมาเก็บไว้ในตัวแปร
    $sql = "SELECT * FROM students_list WHERE student_id = '$id'"; //ระบุการกระทำที่จะทำกับฐานข้อมูล
    $sql2 = "SELECT * FROM behaviour_log WHERE student_id ='$id'"; //ระบุการกระทำที่จะทำกับฐานข้อมูล

    $result = mysqli_query($conn,$sql); //สั่งใช้งานคำสั่งที่จะกระทำกับฐานข้อมูล
    $result2 = mysqli_query($conn,$sql2); //สั่งใช้งานคำสั่งที่จะกระทำกับฐานข้อมูล
    $row = mysqli_fetch_array($result); //นำคำสั่งที่จะกระทำกับฐานข้อมูลมาแปลงให้้เป็นแถว


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
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="register_am.php">
                            <span class="ml-2">เพิ่ม Admin</span>
                          </a>
                        </li>

                      </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
        
                </nav>
                <div class="row">
                    <div class=" col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">เพิ่มข้อมูล</h5>
                            <div class="card-body">
                                <div class="table-responsive d-flex justify-content-between">
                                <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                                    <div class="card">
                                        <h5 class="card-header">ข้อมูลส่วนตัว</h5>
                                        <div class="card-body">
                                        <form method="POST" action="update_records.php">
                                        <label>รหัสประจำตัวนักศึกษา:</label>
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="id" value="<?=$row['student_id']?>" disabled readonly > <!-- แสดงไอดี -->
                                        <label>ชื่อ-นามสกุล:</label>
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="name" value="<?=$row['name']?>"  disabled readonly  > <!-- แสดงชื่อ -->
                                        <label>ระดับชั้น:</label>
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="name" value="<?=$row['vocation']?>"  disabled readonly  > <!-- แสดงชื่อ -->
                                        <label>ห้อง:</label>
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="name" value="<?=$row['room']?>"  disabled readonly  > <!-- แสดงชื่อ -->
                                        <label>สาขาวิชา:</label>
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="name" value="<?=$row['major']?>"  disabled readonly  > <!-- แสดงชื่อ -->
                                        <label>คะแนนคงเหลือ:</label>
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="name" value="<?=$row['student_point']?> / 100"  disabled readonly  > <!-- แสดงชื่อ -->
                                        </form>


                                            <!-- pop-up สำหรับการเพิ่มข้อมูลพฤติกรรม -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            เพิ่มข้อมูลความประพฤติ
                                            </button>

                                            <!-- ตัว body ของ pop-up สำหรับการเพิ่มข้อมูลพฤติกรรม -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="insert_records.php" method="POST"> <!-- แบบฟอร์มสำหรับกรอกข้อมูลที่ต้องการจะเพิ่มไปที่ฐานข้อมูล-->
                                                <div class="modal-body">
                                                    <div class="form-group mb-3 ">
                                                        <label for="">รหัสประจำตัวนักศึกษา:</label>
                                                        <input class="form-control form-control-lg mb-3  w-20" type="text" name="id" value="<?=$row['student_id']?>" readonly> <!-- ดึงข้อมูล ID สำหรับการอ้างอิงถึงนักเรียนที่ต้องการจะเพิ่มข้อมูล -->
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="">ระบุคำอธิบายเพิ่มเติม:</label>
                                                        <textarea class="form-control" placeholder="คำอธิบาย...." name="description" style="height: 300px" required></textarea> <!-- กรอกรายละเอียดของข้อมูล -->
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="">คะแนนที่หักลบ, เพิ่ม:</label>
                                                        <input type="number" class="form-control" name ="score" placeholder = "จำนวนคะแนน....." required> <!-- จำนวนคะแนนที่ต้องการจะลบ -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                    <button type="submit" class="btn btn-primary">บันทึก</button> <!-- ปุ่มบันทึกข้อมูล --> 
                                                </div>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                            <a href="index.php" class="btn btn-secondary">กลับ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-8 mb-4 mr-4 mb-lg-0">
                                    <div class="card">
                                    <h5 class="card-header">ตารางความประพฤติ</h5>
                                    <table class="table table-striped mt-3">
                                    <thead>
                                    <tr>
                                        <th>เลขที่</th>
                                        <th>คำอธิบาย</th>
                                        <th>ณ วันที่</th>
                                        <th>คะแนน</th>
                                        <th>ลบข้อมูล</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($row2 = mysqli_fetch_array($result2)){ //ทำการลูปเพื่อนำข้อมูลในตารางlogของนักเรียนออกมาแสดง โดยอ้างอิง ID ที่แสดงจาก url ที่ส่งมา
                                        ?>    
                                    <tr>
                                        <td><?=$row2['log_id']?></td>
                                        <td><?=$row2['log_des']?></td>
                                        <td><?=$row2['log_date']?></td>
                                        <td><?=$row2['point']?></td>
                                        <td><a href="delete_records.php?id=<?=$row2['log_id']?>&point=<?=$row2['point']?>&sid=<?=$row['student_id']?>" class="btn btn-danger">ลบข้อมูล</a></td> <!-- ส่งคะแนนที่จะลบ,เพิ่ม ID นักเรียนผ่าน url ไปที่ backend -->
                                    </tr>
                                    </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                                        </div>
                                    </div>
                                </div>
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
</body>
</html>