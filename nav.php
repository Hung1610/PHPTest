<?php
include_once("model/tag.php");

if (isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem'])) {
    Tag::deleteTag($_POST['deleteItem']);
}
if (isset($_REQUEST["addTag"])) {
    $name = $_REQUEST["name"];
    Tag::addTag($name);
    //echo "<meta http-equiv='refresh' content='0'>";
}
// $ls = Tag::getListFromFile();
$ls = Tag::getListFromDB();
$filterBy = isset($_POST['search']) ? $_POST['search'] : '';
$filterFor = isset($_POST['searchCat']) ? $_POST['searchCat'] : '';
if (isset($filterBy) && $filterBy != "") {
    $filteredArray = Tag::filterList($ls, $filterBy, "1");
} else {
    $filteredArray = $ls;
}

?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-light sidebar accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-address-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Danh Bạ</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <li data-toggle="modal" data-target="#addContact" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        <span>Thêm liên hệ</span>
    </li>

    <li class="nav-item"><a class="nav-link" href="index.php">Danh bạ</a></li>
    <li class="nav-item"><a class="nav-link" href="index.php">Thường xuyên liên hệ</a></li>
    <li class="nav-item"><a class="nav-link" href="index.php">Liên hệ trùng lặp</a></li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php foreach ($filteredArray as $key => $tag) { ?>
        <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tags"></i><span><?php echo $tag->name; ?></span><span class="float-right"><?php echo $tag->total; ?></span></a></li>
    <?php } ?>

    <li class="nav-item">
        <button data-toggle="modal" data-target="#addTag" class="btn ">
            <i class="fas fa-plus"></i>
            <span>Thêm tag</span>
        </button>
    </li>
</ul>
<!-- End of Sidebar -->