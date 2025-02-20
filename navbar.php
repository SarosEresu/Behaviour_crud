<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
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
        hr {
        color: #831a1a;
        }

        .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
        }
        .card-registration .select-arrow {
        top: 13px;
        }
    </style>
</head>
<body>
    <nav class="navbar p-3" style="background: #831a1a">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand text-white" href="#" >
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
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse"  style="background: #831a1a" >
                <div class="position-sticky">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="index.php">
                            <span class="text-white ml-2">หน้าแรก</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="add_student_am.php">
                            <span class="text-white ml-2">เพิ่มนักเรียน</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="register_am.php">
                            <span class="text-white ml-2">เพิ่ม Admin</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="made.php">
                            <span class="text-white ml-2">รายชื่อผู้จัดทำ</span>
                          </a>
                        </li>
                      </ul>
                </div>
            </nav>