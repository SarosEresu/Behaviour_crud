<!-- หน้าสำหรับ สั่งการ การlogout  -->
<?php
session_start();
session_destroy(); /* ลบ session แล้วแสดงหน้า index */
header("Location: index.php");
exit;
?>