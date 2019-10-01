<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Page Nav -->
        <?php include_once("nav.php") ?>
        <!-- End of Nav -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Page Top Bar-->
                <?php include_once("topbar.php") ?>
                <!-- End of Top Bar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    $maSinhVien = $ho = $ten = $ngaysinh = $email = "";
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $maSinhVien = $_REQUEST["txtMaSinhVien"];
                        $ho = $_REQUEST["txtHo"];
                        $ten = $_REQUEST["txtTen"];
                        $ngaysinh = $_REQUEST["datNgaySinh"];
                        $email = $_REQUEST["txtEmail"];
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo "Valid Email!";
                        } else
                            echo "Invalid Email";
                        if ($_FILES["fileAnhDaiDien"]["name"] != "") {
                            move_uploaded_file(
                                $_FILES["fileAnhDaiDien"]["tmp_name"],
                                "uploads/avatar.jpg"
                            );
                        }
                    }
                    ?>
                    <form method="post" enctype="multipart/form-data">
                        <div>
                            <div>
                                <label>Mã sinh viên</label>
                            </div>
                            <div>
                                <input type="text" name="txtMaSinhVien" value="">
                            </div>
                            <div>
                                <label>Họ</label>
                            </div>
                            <div>
                                <input type="text" name="txtHo" value="">
                            </div>
                            <div>
                                <label>Tên</label>
                            </div>
                            <div>
                                <input type="text" name="txtTen" value="">
                            </div>
                            <div>
                                <label>Ngày sinh</label>
                            </div>
                            <div>
                                <input type="date" name="datNgaySinh" value="">
                            </div>
                            <div>
                                <label>Email</label>
                            </div>
                            <div>
                                <input type="email" name="txtEmail" value="">
                            </div>
                            <div>
                                <label>Ảnh đại diện<nav></nav></label>
                            </div>
                            <div>
                                <input type="file" name="fileAnhDaiDien" value="">
                            </div>

                            <div style="padding-top:10px">
                                <input type="submit" name="btnSubmit" value="Luu">
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer> -->
            <?php include_once("footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>