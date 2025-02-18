<?php
    session_start();
    include "condb.php"; //เชื่อมฐานข้อมูล
    $id = $_GET['id']; //ดึงไอดีของข้อมูลที่ต้องการจะแก้ที่ส่งกับURLมาเก็บไว้ในตัวแปร
    $sql ="SELECT * FROM students_list WHERE student_id = '$id'"; //ระบุการกระทำที่จะทำกับฐานข้อมูล

    $result = mysqli_query($conn,$sql); //สั่งใช้งานคำสั่งที่จะกระทำกับฐานข้อมูล
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
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">แก้ไขข้อมูล</h5>
                            <div class="card-body">
        <!-- แบบฟอร์มสำหรับกรอกข้อมูลที่ต้องการจะแก้ไขไปที่ฐานข้อมูล-->
        <form method="POST" action="update_student.php"> <!-- ระบุว่าต้องการส่งข้อมูลไปที่ไฟล์ใหน เพื่อทำการจัดการกับฐานข้อมูลต่อไป-->
        <label>รหัสประจำตัวนักศึกษา:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="id" value="<?=$row['student_id']?>" required readonly> <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <label>ชื่อ-นามสกุล:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$row['name']?>"  required > <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <label>ลำดับชั้น:</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="vocation" required> <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <option value="ปวช.1" <?php if ($row['vocation'] == "ปวช.1") echo 'selected'; ?>>ปวช.1</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.2" <?php if ($row['vocation'] == "ปวช.2") echo 'selected'; ?>>ปวช.2</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.3" <?php if ($row['vocation'] == "ปวช.3") echo 'selected'; ?>>ปวช.3</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.1/Wil" <?php if ($row['vocation'] == "ปวช.1/Wil") echo 'selected'; ?>>ปวช.1/Wil</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.2/Wil" <?php if ($row['vocation'] == "ปวช.2/Wil") echo 'selected'; ?>>ปวช.2/Wil</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.3/Wil" <?php if ($row['vocation'] == "ปวช.3/Wil") echo 'selected'; ?>>ปวช.3/Wil</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวส.1"   <?php if ($row['vocation'] == "ปวส.1") echo 'selected'; ?>>ปวส.1</option>
        <option value="ปวส.2"   <?php if ($row['vocation'] == "ปวส.2") echo 'selected'; ?>>ปวส.2</option>
        <option value="ปวส.1/Wil"   <?php if ($row['vocation'] == "ปวส.1/Wil") echo 'selected'; ?>>ปวส.1/Wil</option>
        <option value="ปวส.2/Wil"   <?php if ($row['vocation'] == "ปวส.2/Wil") echo 'selected'; ?>>ปวส.2/Wil</option>
        </select>

        <label>ห้อง:</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="room" required> <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <option value="1" <?php if ($row['room'] == "1") echo 'selected'; ?>>1</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="2" <?php if ($row['room'] == "2") echo 'selected'; ?>>2</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="3" <?php if ($row['room'] == "3") echo 'selected'; ?>>3</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="4" <?php if ($row['room'] == "4") echo 'selected'; ?>>4</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="5" <?php if ($row['room'] == "5") echo 'selected'; ?>>5</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        </select>
        
        <label>สาขาวิชา:</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="major" required> <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <option value="แผนกวิชาเทคนิคพื้นฐาน" <?php if ($row['major'] == "แผนกวิชาเทคนิคพื้นฐาน") echo 'selected'; ?>>แผนกวิชาเทคนิคพื้นฐาน</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="แผนกวิชาช่างยนต์"   <?php if ($row['major'] == "แผนกวิชาช่างยนต์") echo 'selected'; ?>>แผนกวิชาช่างยนต์</option>
        <option value="แผนกวิชาช่างกลโรงงาน" <?php if ($row['major'] == "แผนกวิชาช่างกลโรงงาน") echo 'selected'; ?>>แผนกวิชาช่างกลโรงงาน</option>
        <option value="แผนกวิชาช่างไฟฟ้ากําลัง" <?php if ($row['major'] == "แผนกวิชาช่างไฟฟ้ากําลัง") echo 'selected'; ?>>แผนกวิชาช่างไฟฟ้ากําลัง</option>
        <option value="แผนกวิชาเทคนิคคอมพิวเตอร์" <?php if ($row['major'] == "แผนกวิชาเทคนิคคอมพิวเตอร์") echo 'selected'; ?>>แผนกวิชาเทคนิคคอมพิวเตอร์</option>
        <option value="แผนกการบัญชี" <?php if ($row['major'] == "แผนกการบัญชี") echo 'selected'; ?>>แผนกการบัญชี</option>
        <option value="แผนกวิชาการตลาด" <?php if ($row['major'] == "แผนกวิชาการตลาด") echo 'selected'; ?>>แผนกวิชาการตลาด</option>
        <option value="แผนกวิชาการโรงแรม" <?php if ($row['major'] == "แผนกวิชาการโรงแรม") echo 'selected'; ?>>แผนกวิชาการโรงแรม</option>
        <option value="แผนกวิชาการอาหารและโภชนาการ" <?php if ($row['major'] == "แผนกวิชาการอาหารและโภชนาการ") echo 'selected'; ?>>แผนกวิชาการอาหารและโภชนาการ</option>
        <option value="แผนกวิชาเทคโนโลยีสารสนเทศ" <?php if ($row['major'] == "แผนกวิชาเทคโนโลยีสารสนเทศ") echo 'selected'; ?>>แผนกวิชาเทคโนโลยีสารสนเทศ</option>
        <option value="แผนกวิชาหลักสูตรระยะสั้น" <?php if ($row['major'] == "แผนกวิชาหลักสูตรระยะสั้น") echo 'selected'; ?>>แผนกวิชาหลักสูตรระยะสั้น</option>
        </select>
        <input type="submit" class="btn btn-success" value="ยืนยันการแก้ไข">
        <a href="index.php" class="btn btn-secondary">กลับ</a>
        </form></div>
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