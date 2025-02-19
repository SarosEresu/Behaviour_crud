<!-- หน้าสำหรับ แสดงรายชื่อผู้จัดทำ  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body style="background: #831a1a">
<div class="container shadow p-3 mt-5 bg-white rounded text-center">
  
    <!-- ปุ่มเด้ง pop-up รายชื่อผู้จัดทำ -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        รายชื่อผู้จัดทำ
    </button>

    <!-- ตัว body ของ pop-up -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ผู้จัดทำ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container d-flex flex-wrap justify-content-center">
                        <!-- การ์ดคนที่ 1 -->
                        <div class="card m-2" style="width: 18rem;">
                            <img src="img/418643656_1835159836943885_7502355402834492248_n.jpg" class="card-img-top" alt="Profile 1">
                            <div class="card-body text-center">
                                <h5 class="card-title">นายกตัญญู เรืองวงษ์</h5>
                                <p class="card-text">รหัสนักศึกษา: 66309010013<br>สาขาวิชา: เทคโนโลยีสารสนเทศ<br>สาขางาน: โปรแกรมคอมพิวเตอร์</p>
                            </div>
                        </div>

                        <!-- การ์ดคนที่ 2 -->
                        <div class="card m-2" style="width: 18rem;">
                            <img src="img/f4296d32-f9fa-431d-a0bb-ab94548601d3.jpg" class="card-img-top" alt="Profile 2">
                            <div class="card-body text-center">
                                <h5 class="card-title">นางสาวกังสดาล บุญสอน</h5>
                                <p class="card-text">รหัสนักศึกษา: 66309010022<br>สาขาวิชา: เทคโนโลยีสารสนเทศ<br>สาขางาน: โปรแกรมคอมพิวเตอร์</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

</div>   
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
