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
                    #code bai so 4
                    include_once("model/book.php");
                    // $book = new Book(1,50, "OOP in PHP", "ndungithue", 2019);
                    // $book->display();
                    // $ls = Book::getList();
                    $ls = Book::getListFromFile();
                    $filterBy = $_POST["search"];
                    $filterFor = $_POST["searchCat"];
                    if(isset( $filterBy ) && $filterBy != ""){
                        $filteredArray = Book::filterList($ls, $filterBy,$filterFor);
                    }
                    else{
                        $filteredArray = $ls;
                    }
                    // var_dump($ls);
                    ?>

                    <!-- Topbar Search -->
                    <form class="form-inline navbar-search" action="index4.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control bg-light" placeholder="Search for book..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-check mr-2">
                            <input class="form-check-input" type="radio" name="searchCat" id="exampleRadios1" value="1" checked>
                            <label class="form-check-label" for="searchCat">
                                Title
                            </label>
                        </div>
                        <div class="form-check mr-2">
                            <input class="form-check-input" type="radio" name="searchCat" id="exampleRadios2" value="2">
                            <label class="form-check-label" for="searchCat">
                                Author
                            </label>
                        </div>
                        <div class="form-check mr-2">
                            <input class="form-check-input" type="radio" name="searchCat" id="exampleRadios3" value="3">
                            <label class="form-check-label" for="searchCat">
                                Year
                            </label>
                        </div>
                    </form>
                    <table class="table table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Tác giả</th>
                                <th scope="col">Năm xuất bản</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($filteredArray as $key => $book) { ?>
                                <tr>
                                    <th scope="row"><?php echo $key + 1; ?></th>
                                    <td><?php echo $book->title; ?></td>
                                    <td><?php echo $book->author; ?></td>
                                    <td><?php echo $book->year; ?></td>
                                    <td><?php echo $book->price; ?></td>
                                    <td class="align-center">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-outline-warning">Sửa</button>
                                            <button type="button" class="btn btn-outline-info">Xóa</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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