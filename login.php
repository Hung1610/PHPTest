<!--Kiem tra dang nhap-->
<?php
session_start();
if (isset($_SESSION["user"]))
  header("location:index.php");
include_once("model/user.php");
$information = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userName = $_REQUEST["email"];
  $passWord = $_REQUEST["password"];
  $user = User::authentication($userName, $passWord);
  if ($user != null) {
    $information = "Đăng nhập thành công. Chào bạn." . $user->fullName;
    $_SESSION["user"] = serialize($user);
    header("location:index.php");
  } else {
    $information = "Đăng nhập thất bại. Kiểm tra lại thông tin.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>
  <div class="signupSection">
    <div class="info">
      <h2>Quản Lý Danh Bạ</h2>
      <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
    </div>
    <form action="#" method="POST" class="signupForm" name="signupform">
      <h2>Sign In</h2>
      <ul class="noBullet">
        <li>
          <input type="text" class="inputFields" id="username" name="email" placeholder="Username">
        </li>
        <li>
          <input type="password" class="inputFields" id="password" name="password" placeholder="Password" />
        </li>

        <?php if (strlen($information) != 0) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $information ?>
          </div>
        <?php } ?>

        <li id="center-btn">
          <input type="submit" id="join-btn" name="join" alt="Log In" value="Log In">
        </li>
      </ul>
    </form>
  </div>
</body>

</html>