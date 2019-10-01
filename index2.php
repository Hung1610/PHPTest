<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                    <form action="" method="get">
                        <input placeholder="So thu nhat" type="text" name="num1" id="" value="<?php echo $_GET["num1"] ?? "" ?>">
                        <input placeholder="So thu 2" type="text" name="num2" id="" value="<?php echo $_GET["num2"] ?? "" ?>">
                        <select name="operator" id="">
                            <option value="none">Vui long chon phep tinh</option>
                            <option value="add">Cong</option>
                            <option value="subtract">Tru</option>
                            <option value="multiply">Nhan</option>
                            <option value="divide">Chia</option>
                        </select>
                        <button name="btnCalculate" type="submit" value="1">Tinh toan</button>
                    </form>
                    <?php
                    if (isset($_GET["btnCalculate"])) {
                        $num1 = $_GET["num1"];
                        $num2 = $_GET["num2"];
                        $operator = $_GET["operator"];
                        $sign = "";
                        switch ($operator) {
                            case 'add':
                                $result = $num1 + $num2;
                                $sign = "+";
                                break;
                            case 'subtract':
                                $result = $num1 - $num2;
                                $sign = "-";
                                break;
                            case 'multiply':
                                $result = $num1 * $num2;
                                $sign = "*";
                                break;
                            case 'divide':
                                $result = $num1 / $num2;
                                $sign = ":";
                                break;
                            default:
                                $result = "Vui long chon phep tinh";
                        }
                        //$result = $num1 + $num2;
                        echo "<h3>Ket qua " . $num1 . $sign . $num2 . " la " . $result . "<h3>";
                    }
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