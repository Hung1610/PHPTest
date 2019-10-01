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
    }
