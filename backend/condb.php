<?php
    /* ไฟล์สำหรับเชื่อมฐานข้อมูล */
    $host = "localhost"; //ชื่อโฮส
    $user = "root"; //ชื่อผู้ใช้
    $password = ""; //รหัสผ่าน
    $dbname = "behavior_tracking"; //ชื่อฐานข้อมูล
    $conn = new mysqli($host, $user, $password, $dbname); // ทำการเชื่อมฐานข้อมูล

    if(!$conn){
        die("Failed to connect" . mysqli_connect_error());  //ตรวจสอบว่าสามารถเชื่อมต่อได้ไหมถ้าไม่ได้จะส่งerrorกลับมา
    }