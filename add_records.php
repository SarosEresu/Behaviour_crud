<!-- หน้าเพิ่มข้อมูลพฤติกรรม -->
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

<?php
    $title = 'Admin dashboard';
    include_once('navbar.php');
?>
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
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="name" value="<?=$row['vocation']?>"  disabled readonly  > <!-- แสดงชั้น -->
                                        <label>ห้อง:</label>
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="name" value="<?=$row['room']?>"  disabled readonly  > <!-- แสดงห้อง -->
                                        <label>สาขาวิชา:</label>
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="name" value="<?=$row['major']?>"  disabled readonly  > <!-- แสดงสาขา -->
                                        <label>คะแนนคงเหลือ:</label>
                                        <input class="form-control form-control-lg mb-3  m-25" type="text" name="name" value="<?=$row['student_point']?> / 100"  disabled readonly  > <!-- แสดงคะแนน -->
                                        </form>


                
                                                                              
                                                                                        <!-- ปุ่มเปิด Modal -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                เพิ่มข้อมูลความประพฤติ
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="insert_records.php" method="POST">
                                                            <div class="modal-body">
                                                                <div class="form-group mb-3">
                                                                    <label for="">รหัสประจำตัวนักศึกษา:</label>
                                                                    <input class="form-control" type="text" name="id" value="<?=$row['student_id']?>" readonly>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="">ระบุคำอธิบายเพิ่มเติม:</label>
                                                                    <textarea class="form-control" name="description" placeholder="คำอธิบาย...." style="height: 100px" required></textarea>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="">คะแนนที่หักลบ, เพิ่ม:</label>
                                                                    <input type="number" class="form-control" name="score" placeholder="จำนวนคะแนน....." required>
                                                                </div>
                                                                <div class="btn-group" role="group" aria-label="Toggle Delete/Add">
                                                                    <input type="radio" class="btn-check" name="action" id="delete" value="-" autocomplete="off" checked>
                                                                    <label class="btn btn-outline-danger" for="delete">ลบ</label>

                                                                    <input type="radio" class="btn-check" name="action" id="add" value="+" autocomplete="off">
                                                                    <label class="btn btn-outline-success" for="add">เพิ่ม</label>
                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                                <button type="submit" class="btn btn-primary">บันทึก</button>
                                                            </div>
                                                        </form>
                                                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
</body>
</html>