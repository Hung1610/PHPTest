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
        <?php include_once("nav.php")?>
        <!-- End of Nav -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Page Top Bar-->
                <?php include_once("topbar.php")?>
                <!-- End of Top Bar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Helllo PHP</h1>
                    </div>

                    <!-- Content Row -->
                        <?php
                        define('PI', '3.14');
                        /**
                         * Tinh dien tich hinh tron
                         * @param $banKinh Ban kinh hinh tron
                         * @return Dientichhinhtrong tich hinh tron co ban kinh la $banKinh
                         */
                        function dienTichHinhTron($banKinh)
                        {
                            $s = pi() * pow($banKinh, 2);
                            return $s;
                        }
                        function sum($n)
                        {
                            $s = 0;
                            for ($i = 0; $i < $n; $i++) {
                                $s += $i;
                            }

                            return $s;
                        }
                        function displayToday()
                        {
                            $dayOfWeek = [
                                "Sun",
                                "Mon",
                                "Tue",
                                "Wed",
                                "Thu",
                                "Fri",
                                "sat",
                            ];
                            $day = date("w");
                            return $dayOfWeek[$day];
                            //var_dump($day);
                        }
                        echo "hello";
                        $a = 5;
                        $b = 6;
                        $c = $a + $b;
                        echo "<h3>ket qua cua phep tinh la " . $c . "</h3>";
                        $c = "hello";
                        echo "<br>";
                        echo "$c";
                        echo '$c';
                        echo "<br>";

                        $r = 5;
                        $s = dienTichHinhTron($r);
                        echo "ket qua la $s";
                        $n = 6;
                        $tong = sum($n);
                        echo "tong cua n so dau tien la $tong";
                        echo "hom nay la" . displayToday();

                        ?>

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
            <?php include_once("footer.php")?>
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