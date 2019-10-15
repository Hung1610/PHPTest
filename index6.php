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
                    BÀI SỐ 6
                    <button type="button" onclick="testAjax()">Test Javascript</button>
                    <button type="button" onclick="getList()">Get List</button>
                    <div id='contentAjax'></div>
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
    <script>
        function testAjax() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var user = JSON.parse(this.responseText);
                    var str = "<ul>";
                    str += "<li>";
                    str += "username: " + user.userName;
                    str += "</li>";
                    str += "<li>";
                    str += "password: " + user.passWord;
                    str += "</li>";
                    str += "<li>";
                    str += "full name: " + user.fullName;
                    str += "</li>";
                    str += "</ul>";
                    document.getElementById('contentAjax').innerHTML = str;
                }
            }
            xhttp.open("GET", "testajax.php?username=abc", true);
            xhttp.send();
        }
        function getList() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // var bookList = JSON.parse(this.responseText);
                    // console.log(bookList);
                    // document.getElementById('contentAjax').innerHTML = bookList;
                    document.getElementById('contentAjax').innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", "getlist.php", true);
            xhttp.send();
        }
    </script>
</body>

</html>