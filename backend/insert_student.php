<?php
include "condb.php";

$name = $_POST['name'];
$major = $_POST['major'];

$sql = "INSERT INTO students_list(name, major) VALUES('$name','$major')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script type='text/javascript'>";
    echo "window.location = '../frontend/add_student.php?do=ok';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "window.location = '../frontend/add_student.php?do=ok';";
    echo "</script>";
}
?>
