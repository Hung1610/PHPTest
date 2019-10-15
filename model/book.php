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
        static function addToFile($content){
            $myfile = fopen("data/book.txt", "a") or die("Unable to open file!");
            fwrite($myfile, "\n". $content);
            fclose($myfile);
        }

        /**
         * 
         */
        static function deleteBook($bookId){
            $str = null;
            $listBook = Book::getListFromFile();
            // var_dump($listBook)
            foreach ($listBook as $value) {
                # code..
                if($bookId == $value->id){
                    $str = $value->id . "#" . $value->title . "#" . $value->price  . "#" . $value->author . "#" . $value->year ;
                    var_dump($str);
                    break;
                }
            }
            $contents = file_get_contents("data/book.txt");
            $contents = str_replace($str, '', $contents);
            $contents = preg_replace("/^\s+/m", '', $contents);
            //$contents = str_replace("\n\n", "\n",$contents);
            var_dump($contents);
            file_put_contents("data/book.txt",$contents);
        }

        /**
         * 
         */
        static function editBook($bookId, $newTitle, $newPrice, $newAuthor, $newYear){
            $changedInfo = ["$newTitle", $newPrice, $newAuthor, $newYear];
            $originInfo = null;
            $str = null;
            $listBook = Book::getListFromFile();
            foreach ($listBook as $value) {
                # code...
                if($bookId == $value->id){
                    $tempArr = [ $value->title, $value->price, $value->author, $value->year];
                    $originInfo = $value->id . "#" . $value->title . "#" . $value->price  . "#" . $value->author . "#" . $value->year;
                    for($i = 0; $i < 4; $i++) {
                        # code...
                        if($changedInfo[$i] == "")
                            $changedInfo[$i] = $tempArr[$i];
                    }
                    break;                 
                }
            }

            $str = $bookId . "#" . $changedInfo[0] . "#" . $changedInfo[1] . "#" . $changedInfo[2] . "#" . $changedInfo[3];
            $contents = file_get_contents("data/book.txt");
            $contents = str_replace($originInfo, $str, $contents);
            file_put_contents("data/book.txt", $contents);
        }

    }
