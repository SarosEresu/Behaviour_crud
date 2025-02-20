<!-- หน้าสำหรับการแก้ไขข้อมูลนักเรียน  -->
<?php
    session_start();
    include "condb.php"; //เชื่อมฐานข้อมูล
    $id = $_GET['id']; //ดึงไอดีของข้อมูลที่ต้องการจะแก้ที่ส่งกับURLมาเก็บไว้ในตัวแปร
    $sql ="SELECT * FROM students_list WHERE student_id = '$id'"; //ระบุการกระทำที่จะทำกับฐานข้อมูล

    $result = mysqli_query($conn,$sql); //สั่งใช้งานคำสั่งที่จะกระทำกับฐานข้อมูล
    $row = mysqli_fetch_array($result); //นำคำสั่งที่จะกระทำกับฐานข้อมูลมาแปลงให้้เป็นแถว
?>
<?php
    $title = 'Admin dashboard';
    include_once('navbar.php');
?>
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
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="id" value="<?=$row['student_id']?>" required readonly> 
        <label>ชื่อ-นามสกุล:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$row['name']?>"  required > 
        <label>ลำดับชั้น:</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="vocation" required>
        <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง --> 
        <option value="ปวช.1" <?php if ($row['vocation'] == "ปวช.1") echo 'selected'; ?>>ปวช.1</option> 
        <option value="ปวช.2" <?php if ($row['vocation'] == "ปวช.2") echo 'selected'; ?>>ปวช.2</option> 
        <option value="ปวช.3" <?php if ($row['vocation'] == "ปวช.3") echo 'selected'; ?>>ปวช.3</option> 
        <option value="ปวช.1/Wil" <?php if ($row['vocation'] == "ปวช.1/Wil") echo 'selected'; ?>>ปวช.1/Wil</option> 
        <option value="ปวช.2/Wil" <?php if ($row['vocation'] == "ปวช.2/Wil") echo 'selected'; ?>>ปวช.2/Wil</option> 
        <option value="ปวช.3/Wil" <?php if ($row['vocation'] == "ปวช.3/Wil") echo 'selected'; ?>>ปวช.3/Wil</option> 
        <option value="ปวส.1"   <?php if ($row['vocation'] == "ปวส.1") echo 'selected'; ?>>ปวส.1</option>
        <option value="ปวส.2"   <?php if ($row['vocation'] == "ปวส.2") echo 'selected'; ?>>ปวส.2</option>
        <option value="ปวส.1/Wil"   <?php if ($row['vocation'] == "ปวส.1/Wil") echo 'selected'; ?>>ปวส.1/Wil</option>
        <option value="ปวส.2/Wil"   <?php if ($row['vocation'] == "ปวส.2/Wil") echo 'selected'; ?>>ปวส.2/Wil</option>
        </select>

        <label>ห้อง:</label>
        <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="room" required> 
        <option value="1" <?php if ($row['room'] == "1") echo 'selected'; ?>>1</option> 
        <option value="2" <?php if ($row['room'] == "2") echo 'selected'; ?>>2</option> 
        <option value="3" <?php if ($row['room'] == "3") echo 'selected'; ?>>3</option> 
        <option value="4" <?php if ($row['room'] == "4") echo 'selected'; ?>>4</option> 
        <option value="5" <?php if ($row['room'] == "5") echo 'selected'; ?>>5</option> 
        </select>
        
        <label>สาขาวิชา:</label>
        <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="major" required> 
        <option value="แผนกวิชาเทคนิคพื้นฐาน" <?php if ($row['major'] == "แผนกวิชาเทคนิคพื้นฐาน") echo 'selected'; ?>>แผนกวิชาเทคนิคพื้นฐาน</option> 
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