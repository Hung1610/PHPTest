<?php
    class Tag {
        #Begin Properties
        var $id;
        var $name;
        var $total;

        function __construct($id,$name)
        {
            $this->id = $id;
            $this->name = $name;
        }

        static function connect(){
            $con = new mysqli("localhost","root","","contactmanager","3306");
            $con->set_charset("utf8");
            if($con->connect_error)
                die("Kết nối thất bại. Chi tiết:". $con->connect_error);
            return $con;
        }

        static function getListFromDB(){
            //Bước 1: Tạo kết nối
            $con = Tag::connect();
            //Bước 2: Thao tác với CSDL: CRUD
            $sql = "SELECT t.*, COUNT(c.Id) AS contacts FROM tag AS t LEFT JOIN contact AS c ON t.Id = c.Tag GROUP BY t.id";
            $result = $con->query($sql);
            $lsTag = Array();
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $tag = new Tag($row["Id"],$row["Name"]);
                    $tag->total = $row["contacts"];
                    array_push($lsTag, $tag);
                }
            }
            //Bước 3: Đóng kết nối
            $con->close();
            return $lsTag;
        }
        
        /**
         * 
         */
        static function filterList($value,$filterBy,$filterFor){
            // var_dump($arrData);
            // echo $filterFor;
            if($filterFor == "1"){
                return array_filter($value, function($elem) use($filterBy){
                    return strpos($elem->name, $filterBy) !== false;
                });;
            }
            // if($filterFor == "2"){
            //     return array_filter($value, function($elem) use($filterBy){
            //         return strpos($elem->author, $filterBy) !== false;
            //     });;
            // }
            // if($filterFor == "3"){
            //     return array_filter($value, function($elem) use($filterBy){
            //         return strpos($elem->year, $filterBy) !== false;
            //     });;
            // }
        }

        /**
         * 
         */
        static function deleteTag($tagId){
            $con = Tag::connect();
            //Bước 2: Thao tác với CSDL: CRUD
            $sql = "DELETE FROM tag WHERE Id = ". $tagId;
            $result = $con->query($sql);
            //Bước 3: Đóng kết nối
            $con->close();
        }
        static function editTag($tagId, $newName){
            $con= Tag::connect();
            $sql = "UPDATE tag SET Name='$newName' WHERE Id=$tagId";
            if($con->query($sql)==true){
                echo "Cập nhật thành công";
            }else {
                echo "Cập nhật thất bại";
            }
        }
    
        static function addTag($Name){
            $con= Tag::connect();
            $sql = "INSERT INTO tag (Name) VALUES ('$Name');";   
            if($con->query($sql)==true){
                echo "Thêm thành công";
            }else {
                echo "Thêm thất bại";
            }
        }
    

    }
