<?php
    class Book {
        #Begin Properties
        var $id;
        var $price;
        var $title;
        var $author;
        var $year;
        #End Properties
        var $filter;

        function __construct($id,$price,$title,$author,$year)
        {
            $this->id = $id;
            $this->price = $price;
            $this->title = $title;
            $this->author = $author;
            $this->year = $year;
        }

        function display()
        {
            echo $this->price . "<br/>";
            echo $this->title. "<br/>";
            echo $this->author. "<br/>";
            echo $this->year . "<br/>";
        }

        static function getList(){
            $listBook = array();
            array_push($listBook, new Book(1,5,"OOP in PHP            ","DDPHung",2019));
            array_push($listBook, new Book(2,5,"OOP in C#             ","DDPHung",2019));
            array_push($listBook, new Book(3,5,"OOP in JAVA           ","DDPHung",2019));
            array_push($listBook, new Book(4,5,"OOP in Python         ","DDPHung",2019));
            array_push($listBook, new Book(5,5,"OOP in Ruby on Rails  ","DDPHung",2019));

            return $listBook;
        }

        static function connect(){
            $con = new mysqli("localhost","root","","bookmanager","3306");
            $con->set_charset("utf8");
            if($con->connect_error)
                die("Kết nối thất bại. Chi tiết:". $con->connect_error);
            return $con;
        }
        static function getListFromDB(){
            //Bước 1: Tạo kết nối
            $con = Book::connect();
            //Bước 2: Thao tác với CSDL: CRUD
            $sql = "SELECT * FROM book";
            $result = $con->query($sql);
            $lsBook = Array();
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $book = new Book($row["ID"],$row["Price"],$row["Title"],$row["Author"],$row["Year"]);
                    array_push($lsBook, $book);
                }
            }
            //Bước 3: Đóng kết nối
            $con->close();
            return $lsBook;
        }
        /**
         * 
         */
        static function getListFromFile(){
            $arrData = file("data/book.txt");
            // var_dump($arrData);
            $listBook = array();
            foreach ($arrData as $key => $value){
                $arrItem = explode("#",$value);
                $book = new Book($arrItem[0],$arrItem[2],$arrItem[1],$arrItem[3],$arrItem[4]);
                array_push($listBook, $book);
            }
            return $listBook;
        }
        
        /**
         * 
         */
        static function filterList($value,$filterBy,$filterFor){
            // var_dump($arrData);
            // echo $filterFor;
            if($filterFor == "1"){
                return array_filter($value, function($elem) use($filterBy){
                    return strpos($elem->title, $filterBy) !== false;
                });;
            }
            if($filterFor == "2"){
                return array_filter($value, function($elem) use($filterBy){
                    return strpos($elem->author, $filterBy) !== false;
                });;
            }
            if($filterFor == "3"){
                return array_filter($value, function($elem) use($filterBy){
                    return strpos($elem->year, $filterBy) !== false;
                });;
            }
        }

        /**
         * 
         */
        static function deleteBook($bookId){
            // $str = null;
            // $listBook = Book::getListFromFile();
            // // var_dump($listBook)
            // foreach ($listBook as $value) {
            //     # code..
            //     if($bookId == $value->id){
            //         $str = $value->id . "#" . $value->title . "#" . $value->price  . "#" . $value->author . "#" . $value->year ;
            //         var_dump($str);
            //         break;
            //     }
            // }
            // $contents = file_get_contents("data/book.txt");
            // $contents = str_replace($str, '', $contents);
            // $contents = preg_replace("/^\s+/m", '', $contents);
            // //$contents = str_replace("\n\n", "\n",$contents);
            // var_dump($contents);
            // file_put_contents("data/book.txt",$contents);
            $con = Book::connect();
            //Bước 2: Thao tác với CSDL: CRUD
            $sql = "DELETE FROM book WHERE ID = ". $bookId;
            $result = $con->query($sql);
            //Bước 3: Đóng kết nối
            $con->close();
        }
        static function editBook($bookId, $newTitle, $newPrice, $newAuthor, $newYear){
            // $changedInfo = ["$newTitle", $newPrice, $newAuthor, $newYear];
            // $originInfo = null;
            // $str = null;
            // $listBook = Book::getListFromFile();
            // foreach ($listBook as $value) {
            //     # code...
            //     if($bookId == $value->id){
            //         $tempArr = [ $value->title, $value->price, $value->author, $value->year];
            //         $originInfo = $value->id . "#" . $value->title . "#" . $value->price  . "#" . $value->author . "#" . $value->year;
            //         for($i = 0; $i < 4; $i++) {
            //             # code...
            //             if($changedInfo[$i] == "")
            //                 $changedInfo[$i] = $tempArr[$i];
            //         }
            //         break;                 
            //     }
            // }

            // $str = $bookId . "#" . $changedInfo[0] . "#" . $changedInfo[1] . "#" . $changedInfo[2] . "#" . $changedInfo[3];
            // $contents = file_get_contents("data/book.txt");
            // $contents = str_replace($originInfo, $str, $contents);
            // file_put_contents("data/book.txt", $contents);
            $con= Book::connect();
            $sql = "UPDATE book SET Title='$newTitle', Author='$newAuthor', Price='$newPrice', Year='$newYear' WHERE ID=$bookId";
            if($con->query($sql)==true){
                echo "Cập nhật thành công";
            }else {
                echo "Cập nhật thất bại";
            }
        }
    
        static function addBook($Title, $Price, $Author, $Year){
            // $myfile = fopen("data/book.txt", "a") or die("Unable to open file!");
            // fwrite($myfile, "\n". $content);
            // fclose($myfile);
            $con= Book::connect();
            echo $Title;
            echo $Author;
            echo $Price;
            echo $Year;
            $sql = "INSERT INTO book (Title, Author, Price, Year) VALUES ('$Title', '$Author', $Price, $Year);";   
            if($con->query($sql)==true){
                echo "Thêm thành công";
            }else {
                echo "Thêm thất bại";
            }
        }
    

    }
