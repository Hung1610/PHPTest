<?php
include_once("model/book.php");
$listBook = array();
array_push($listBook, new Book(1, 5, "OOP in PHP            ", "DDPHung", 2019));
array_push($listBook, new Book(2, 5, "OOP in C#             ", "DDPHung", 2019));
array_push($listBook, new Book(3, 5, "OOP in JAVA           ", "DDPHung", 2019));
array_push($listBook, new Book(4, 5, "OOP in Python         ", "DDPHung", 2019));
array_push($listBook, new Book(5, 5, "OOP in Ruby on Rails  ", "DDPHung", 2019));
$out = array_values($listBook);
//echo json_encode($out);
?>

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
        <?php foreach ($listBook as $key => $book) { ?>
            <tr>
                <th scope="row"><?php echo $key + 1; ?></th>
                <td><?php echo $book->title; ?></td>
                <td><?php echo $book->author; ?></td>
                <td><?php echo $book->year; ?></td>
                <td><?php echo $book->price; ?></td>
                <td class="align-center">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-warning" name="editItem" value="<?php echo $book->id; ?>" data-toggle="modal" data-target="#editBook">Sửa</button>
                        <button type="button" class="btn btn-outline-info" name="deleteItem" value="<?php echo $book->id; ?>">Xóa</button>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>