<?php
include 'condb.php';
$vocation = isset($_GET['vocation']) ? $_GET['vocation'] : "";
$room = isset($_GET['room']) ? $_GET['room'] : "";
$major = isset($_GET['major']) ? $_GET['major'] : "";

// SQL Query
$sql = "SELECT * FROM students_list WHERE status = 0";

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สรุปผล</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- ดึง sweetlalert มาใช้งาน -->
</head>
<body>
    <div class="container">
    <form method="GET" class="d-flex justify-content-center row g-3">

        <div class="col-md-3">
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

        <div class="col-md-4">
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

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">กรองข้อมูล</button>
            <a href="index.php" class="btn btn-warning">กลับหน้าแรก</a>
        </div>
    </form>     
<?php
// เริ่มคำสั่ง Export ไฟล์ PDF
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ], 
    'default_font' => 'sarabun'
]);
 // สิ้นสุดคำสั่ง Export ไฟล์ PDF ในส่วนบน เริ่มกำหนดตำแหน่งเริ่มต้นในการนำเนื้อหามาแสดงผลผ่าน
$mpdf->SetFont('sarabun','',25);
ob_start();  //ฟังก์ชัน ob_start()
?>
    <div class="container">
        <br>
        <h4 class="text-center">สรุปข้อมูลการตัดคะแนนพฤติกรรม</h4>
        <?php if(isset($_GET['vocation']) || isset($_GET['room']) || isset($_GET['major'])){
        ?>
        <p><?php echo $_GET['major'] . " ระดับชั้น " . $_GET['vocation'] . " ห้อง " . $_GET['room'];?></p>  
        <?php } ?>
        <table class="table">
            <thead>
            <tr>
                <th>รหัสประจำตัวนักศีกษา</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ระดับชั้น</th>
                <th>ห้อง</th>
                <th>สาขาวิชา</th>
                <th>สถานะ</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <?php 
                                            
                while($row=mysqli_fetch_array($result)){
            ?> 
            <tr> 
            <td><?=$row['student_id']?></td>    <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?=$row['name']?></td>          <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?=$row['vocation']?></td>          <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?=$row['room']?></td>         <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?=$row['major']?></td>         <!--ดึงข้อมูลจากฐานข้อมูลออกมาแสดง -->
            <td><?php if($row['student_point'] >= 70){
                echo "ผ่าน";
            }else{
                echo "ไม่ผ่าน";
            }?></td>
            </tr>
            <?php
                                        }
                                        ?>
            </tbody>
        </table>
        <?php
 // คำสั่งการ Export ไฟล์เป็น PDF
$html = ob_get_contents();      // เรียกใช้ฟังก์ชัน รับข้อมูลที่จะมาแสดงผล
$mpdf->WriteHTML('<style> 
    body { font-size: 21px; font-family: sarabun; } 
    table { font-size: 21px; } 
    h4 { font-size: 24px; }
</style>');

$mpdf->WriteHTML($html);
$mpdf->Output('Report.pdf');

ob_end_flush();                 // ปิดการแสดงผลข้อมูลของไฟล์ HTML ณ จุดนี้
?>

<!--การสร้างลิงค์ เรียกไฟล์ myReport.pdf แสดงผลไฟล์ PDF  -->
<a href="Report.pdf"><button class="btn btn-primary">ส่งออกเป็นไฟล์ PDF</button></a>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
</html>