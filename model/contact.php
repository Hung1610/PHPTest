<?php
    class Contact {
        #Begin Properties
        var $id;
        var $name;
        var $email;
        var $phone;
        var $tag;
        #End Properties
        var $filter;

        function __construct($id,$name,$email,$phone,$tag)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->tag = $tag;
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
            $con = Contact::connect();
            //Bước 2: Thao tác với CSDL: CRUD
            $sql = "SELECT * FROM contact";
            $result = $con->query($sql);
            $lsContact = Array();
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    $contact = new Contact($row["Id"],$row["Name"],$row["Email"],$row["Phone"],$row["Tag"]);
                    array_push($lsContact, $contact);
                }
            }
            //Bước 3: Đóng kết nối
            $con->close();
            return $lsContact;
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
        static function deleteContact($contactId){
            $con = Contact::connect();
            //Bước 2: Thao tác với CSDL: CRUD
            $sql = "DELETE FROM contact WHERE Id = ". $contactId;
            $result = $con->query($sql);
            //Bước 3: Đóng kết nối
            $con->close();
        }
        static function editContact($contactId, $newEmail, $newName, $newAuthor, $newTag){
            $con= Contact::connect();
            $sql = "UPDATE contact SET Email='$newEmail', Author='$newAuthor', Name='$newName', Tag='$newTag' WHERE Id=$contactId";
            if($con->query($sql)==true){
                echo "Cập nhật thành công";
            }else {
                echo "Cập nhật thất bại";
            }
        }
    
        static function addContact($Name, $Email, $Phone, $Tag){
            $con= Contact::connect();
            $sql = "INSERT INTO contact (Name, Email, Phone, Tag) VALUES ('$Name', '$Email', $Phone, $Tag);";   
            if($con->query($sql)==true){
                echo "Thêm thành công";
            }else {
                echo "Thêm thất bại";
            }
        }
    

    }
