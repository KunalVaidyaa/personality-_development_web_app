<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         
         $message[] = 'image updated succssfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Personality Development</title>
  <link rel="stylesheet" href="css/update_profile.css" />
  <link rel="stylesheet" href="css/profile.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <script src="https://kit.fontawesome.com/ab834d5161.js" crossorigin="anonymous"></script>
</head>
<body>
   
  <div class="container">
  <nav>
      <ul>
        <li><a  href="#" class="logo">
          <img src="images/logo (2).png" alt="">
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a  class="navi" href="home.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a  class="navi" href="update_profile.php" class="btn"">
          <i class="fas fa-user"></i>
          <span class="nav-item">My Identity</span>
        </a></li>
        <li><a  class="navi" href="values.php">
            <i class="fas fa-gem fa-xl"></i>
          <span class="nav-item">values</span>
        </a></li>
        <li><a  class="navi" href="Assessment.php">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Assessment Test</span>
        </a></li>
        <li><a  class="navi" href=" Exercise.php">
            <i class="fas fa-dumbbell fa-xl"></i>
            <span class="nav-item">Upskilling  Exercise</span>
          </a></li>
          <li><a  class="navi" href="http://localhost/personality%20Development/comment/suggestions.php">
            <i class="fas fa-head-side-virus fa-xl"></i>
            <span class="nav-item">Suggestions</span>
          </a></li>
      
          <li>
          <a  class="navi" href="home.php?logout=<?php echo $user_id; ?>"class="btn btn-warning">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a></li>
      
      </ul>
    </nav>
<div class="update-profile">
<section class="main">
    <div class="container">
   
    <div class="content">
      <div class="title">My Identity</div>

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
              echo '<script> alert (<div class="message">'.$message.'</div>)</script>';
            
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      </form>
    </div>
  </div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
    </section>
  </div>
</body>
</html>