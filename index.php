<!-- หน้าแรกสำหรับ แอดมิน  -->
<?php
session_start();
include "condb.php"; /* เชื่อมฐานข้อมูล */
if(!isset($_SESSION["email"])) /* ถ้าไม่มีการล็อคอิน ให้ไปที่หน้าล็อคอิน */
header("location:login.php");

$search = isset($_GET['search']) ? $_GET['search'] : "";
$vocation = isset($_GET['vocation']) ? $_GET['vocation'] : "";
$room = isset($_GET['room']) ? $_GET['room'] : "";
$major = isset($_GET['major']) ? $_GET['major'] : "";

// SQL Query
$sql = "SELECT * FROM students_list WHERE status = 0";

if (!empty($search)) {
    $sql .= " AND name LIKE ?";
}
if (!empty($vocation)) {
    $sql .= " AND vocation = ?";
}

if (!empty($room)) {
    $sql .= " AND room = ?";
}

if (!empty($major)) {
    $sql .= " AND major = ?";
}

$stmt = $conn->prepare($sql);

// Bind Parameters ตามเงื่อนไขที่ได้รับ
$params = [];
$types = "";

if (!empty($search)) {
    $search = "%$search%";
    $params[] = &$search;
    $types .= "s";
}

if (!empty($vocation)) {
    $params[] = &$vocation;
    $types .= "s";
}

if (!empty($room)) {
    $params[] = &$room;
    $types .= "s";
}

if (!empty($major)) {
    $params[] = &$major;
    $types .= "s";
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

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
                            $students_list_query = "SELECT * FROM students_list WHERE status='0' AND student_point < '70'"; /* คำนวนจำนวนนักเรียนที่ผ่าน */
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
                            $students_list_query = "SELECT * FROM students_list WHERE status='0' AND student_point >= '70'"; /* คำนวนจำนวนนักเรียนที่ไม่ผ่าน */
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
<form method="GET" class="d-flex row g-3 mb-3">

<div class="col-md-3">
            <input type="text" class="form-control" name="search" placeholder="ค้นหาด้วยชื่อ..." value="<?= htmlspecialchars($search) ?>">
        </div>

<div class="col-md-2">
    <select name="vocation" class="form-select">
        <option value="">------เลือกระดับชั้น-------</option>
        <?php
        $vocations = ["ปวช.1", "ปวช.2", "ปวช.3", "ปวช.1wil", "ปวช.2wil", "ปวช.3wil", "ปวส.1", "ปวส.2", "ปวส.1wil", "ปวส.2wil"];
        foreach ($vocations as $v) {
            echo "<option value='$v' " . ($vocation == $v ? "selected" : "") . ">$v</option>";
        }
        ?>
    </select>
</div>

<div class="col-md-2">
    <select name="room" class="form-select">
        <option value="">-----เลือกห้อง-----</option>
        <?php
        $rooms = ["1", "2", "3", "4", "5"];
        foreach ($rooms as $r) {
            echo "<option value='$r' " . ($room == $r ? "selected" : "") . ">$r</option>";
        }
        ?>
    </select>
</div>

<div class="col-md-2">
    <select name="major" class="form-select">
        <option value="">-----เลือกแผนกวิชา------</option>
        <?php
        $majors = [
            "แผนกวิชาเทคนิคพื้นฐาน", "แผนกวิชาช่างยนต์", "แผนกวิชาช่างกลโรงงาน", "แผนกวิชาช่างไฟฟ้ากําลัง", 
            "แผนกวิชาเทคนิคคอมพิวเตอร์", "แผนกการบัญชี", "แผนกวิชาการตลาด", "แผนกวิชาการโรงแรม", 
            "แผนกวิชาการอาหารและโภชนาการ", "แผนกวิชาเทคโนโลยีสารสนเทศ", "แผนกวิชาหลักสูตรระยะสั้น"
        ];
        foreach ($majors as $m) {
            echo "<option value='$m' " . ($major == $m ? "selected" : "") . ">$m</option>";
        }
        ?>
    </select>    
</div>

<div class="col-md-2">
    <button type="submit" class="btn btn-primary">กรองข้อมูล</button>
    <a href="?" class="btn btn-secondary">ล้างค่า</a>
</div>
</form>   
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