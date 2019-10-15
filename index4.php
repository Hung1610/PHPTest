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
                    
                    if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
                    {
                        Book::deleteFromFile($_POST['deleteItem']);
                    }
                    if (isset($_REQUEST["addBook"])) {
                        $id = $_REQUEST["id"];
                        $title = $_REQUEST["Title"];
                        $price = $_REQUEST["Price"];
                        $author = $_REQUEST["Author"];
                        $year = $_REQUEST["Year"];
                        $content = $id . "#" . $title . "#" . $price . "#" . $author . "#" . $year;
                        Book::addToFile($content);
                        //echo "<meta http-equiv='refresh' content='0'>";
                    }
                    $ls = Book::getListFromFile();
                    $filterBy = isset($_POST['search']) ? $_POST['search'] : '';
                    $filterFor = isset($_POST['searchCat']) ? $_POST['searchCat'] : '';
                    if (isset($filterBy) && $filterBy != "") {
                        $filteredArray = Book::filterList($ls, $filterBy, $filterFor);
                    } else {
                        $filteredArray = $ls;
                    }
                    // var_dump($ls);
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="float-left">
                                <!-- Topbar Search -->
                                <form class="form-inline navbar-search" action="index4.php" method="post">
                                    <div class="input-group mr-2">
                                        <input name="search" type="text" class="form-control bg-light" placeholder="Search for book..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="radio" name="searchCat" id="exampleRadios1" value="1" <?php if (isset($filterFor) && $filterFor == "1") echo "checked"; elseif(!isset($filterFor)) echo "checked"; ?>>
                                        <label class="form-check-label" for="searchCat">
                                            Title
                                        </label>
                                    </div>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="radio" name="searchCat" id="exampleRadios2" value="2" <?php if (isset($filterFor) && $filterFor == "2") echo "checked" ?>>
                                        <label class="form-check-label" for="searchCat">
                                            Author
                                        </label>
                                    </div>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="radio" name="searchCat" id="exampleRadios3" value="3" <?php if (isset($filterFor) && $filterFor == "3") echo "checked" ?>>
                                        <label class="form-check-label" for="searchCat">
                                            Year
                                        </label>
                                    </div>
                                </form>
                            </div>

                            <div class="float-right pb-3">
                                <button data-toggle="modal" data-target="#addBook" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Them</button>
                                <!-- Modal -->
                                <div class="modal fade" id="editBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Them sach moi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="addForm" method="POST">
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Title">ID</label>
                                                        <div class="col-md-10">
                                                            <input id="id" name="id" type="text" placeholder="ID" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Title">Title</label>
                                                        <div class="col-md-10">
                                                            <input id="Title" name="Title" type="text" placeholder="Title" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Title">Price</label>
                                                        <div class="col-md-10">
                                                            <input id="Title" name="Price" type="text" placeholder="Price" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <!-- Select Basic -->
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Year">Year</label>
                                                        <div class="col-md-10">
                                                            <select id="Year" name="Year" class="form-control">
                                                                <option value="2019">2019</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2010">2010</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Text input-->
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Author">Author</label>
                                                        <div class="col-md-10">
                                                            <input id="Author" name="Author" type="text" placeholder="Author" class="form-control input-md">

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="editItem" class="btn btn-outline-success col-md-2" form="addForm" value="Submit">Submit</button>
                                                <!-- <button type="submit" form="addForm" class="btn btn-outline-success col-md-2" data-dismiss="modal">Add</button> -->
                                                <button class="btn btn-outline-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Them sach moi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="addForm" method="POST">
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Title">ID</label>
                                                        <div class="col-md-10">
                                                            <input id="id" name="id" type="text" placeholder="ID" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Title">Title</label>
                                                        <div class="col-md-10">
                                                            <input id="Title" name="Title" type="text" placeholder="Title" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Title">Price</label>
                                                        <div class="col-md-10">
                                                            <input id="Title" name="Price" type="text" placeholder="Price" class="form-control input-md">
                                                        </div>
                                                    </div>
                                                    <!-- Select Basic -->
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Year">Year</label>
                                                        <div class="col-md-10">
                                                            <select id="Year" name="Year" class="form-control">
                                                                <option value="2019">2019</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2010">2010</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Text input-->
                                                    <div class="form-group d-flex">
                                                        <label class="pt-1 col-md-2 control-label" for="Author">Author</label>
                                                        <div class="col-md-10">
                                                            <input id="Author" name="Author" type="text" placeholder="Author" class="form-control input-md">

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="addBook" class="btn btn-outline-success col-md-2" form="addForm" value="Submit">Submit</button>
                                                <!-- <button type="submit" form="addForm" class="btn btn-outline-success col-md-2" data-dismiss="modal">Add</button> -->
                                                <button class="btn btn-outline-primary col-md-2" type="button" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                            <button type="button" class="btn btn-outline-warning" name="editItem" value="<?php echo $book->id; ?>" data-toggle="modal" data-target="#editBook">Sửa</button>
                                            <button type="button" class="btn btn-outline-info" name="deleteItem" value="<?php echo $book->id; ?>" >Xóa</button>
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