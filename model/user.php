<?php 
class User{
    var $userName;
    var $passWord;
    var $fullName;
    
    function User($userName, $passWord, $fullName){
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->fullName = $fullName;
    }

    /**
     * Xác thực người dùng
     * @param $userName string Tên đăng nhập
     * @param $passWord string Mật khẩu
     * @return User hoặc null nếu không tồn tại
     */
    static function authentication ($userName, $passWord){
        if ($userName == "abc@gmail.com" && $passWord == "123")
            return new User($userName,$passWord,"Zũng Nguyễn");
        else return null;
    }

    /**
     * 
     */
    static function authorization ($userName, $passWord){

    }
}
?>