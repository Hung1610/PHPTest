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
                    include_once("model/contact.php");

                    if (isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem'])) {
                        Contact::deleteContact($_POST['deleteItem']);
                    }
                    if (isset($_REQUEST["addContact"])) {
                        $name = $_REQUEST["name"];
                        $email = $_REQUEST["email"];
                        $phone = $_REQUEST["phone"];
                        $tag = $_REQUEST["tag"];
                        Contact::addContact($name, $email, $phone, $tag);
                        //echo "<meta http-equiv='refresh' content='0'>";
                    }
                    // $ls = Contact::getListFromFile();
                    $ls = Contact::getListFromDB();
                    $filterBy = isset($_POST['search']) ? $_POST['search'] : '';
                    $filterFor = isset($_POST['searchCat']) ? $_POST['searchCat'] : '';
                    if (isset($filterBy) && $filterBy != "") {
                        $filteredArray = Contact::filterList($ls, $filterBy, "1");
                    } else {
                        $filteredArray = $ls;
                    }

                    ?>
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($filteredArray as $key => $contact) { ?>
                                    <tr>
                                        <td>
                                            <span><input type="checkbox"></span>
                                            <?php echo $contact->name; ?>
                                        </td>
                                        <td><?php echo $contact->email; ?></td>
                                        <td><?php echo $contact->phone; ?></td>
                                        <!-- <td class="align-center">
                                            <form action="" method="post">
                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-outline-warning" name="editItem" value="<?php echo $contact->id; ?>" data-toggle="modal" data-target="#editBook">Sửa</button>
                                                    <button type="submit" class="btn btn-outline-info" name="deleteItem" value="<?php echo $contact->id; ?>">Xóa</button>
                                                </div>
                                            </form>
                                        </td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Contact -->
                    <div class="modal fade" id="addContact" tabindex="-1" role="dialog" aria-labelledby="ContactAddModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ContactAddModal">Thêm liên hệ mới</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="exampleInputEmail1">Tên</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nhập tên liên hệ">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Nhập email">
                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                                        <label for="exampleInputEmail1">Tag</label>
                                        <select name="tag" class="custom-select" id="inputGroupSelect01">
                                            <option value="0" selected>Chọn tag</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                        <button type="submit" name="addContact" class="btn btn-primary">Lưu</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- Modal Tag -->
                    <div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-labelledby="TagAddModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="TagAddModal">Thêm tag mới</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="exampleInputEmail1">Tên</label>
                                        <input type="text" name="name" class="form-control" placeholder="Nhập tên tag">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                        <button type="submit" name="addTag" class="btn btn-primary">Lưu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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