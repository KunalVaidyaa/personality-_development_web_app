<?php 
	include_once 'controllers/Comment.php';
	$com = new Comment();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Personality Development</title>
   <link rel="stylesheet" href="C:\xampp\htdocs\Personality Development\comment\dashbordStyle.css" />
   <link rel="stylesheet" href="css/comment.css" />

  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <script src="https://kit.fontawesome.com/ab834d5161.js" crossorigin="anonymous"></script>
</head>
<body>
   
  <div class="container">
  <nav>
      <ul>
        <li><a  href="#" class="logo">
          <img src="logo (2).png" alt="">
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a  class="navi" href="http://localhost/Personality%20Development/home.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a  class="navi" href="http://localhost/Personality%20Development/update_profile.php" class="btn"">
          <i class="fas fa-user"></i>
          <span class="nav-item">My Identity</span>
        </a></li>
        <li><a  class="navi" href="http://localhost/Personality%20Development/values.php">
            <i class="fas fa-gem fa-xl"></i>
          <span class="nav-item">values</span>
        </a></li>
        <li><a  class="navi" href="http://localhost/Personality%20Development/Assessment.php">
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
    
          <a  class="navi" href="http://localhost/Personality%20Development/login.php?logout"class="btn btn-warning">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a></li>
      
      </ul>
    </nav>
	<section class="main">
      <section>
       <div class="main-top">
      </div>
     
      <div class="main-skills">
         <div class="col-md-6"> 
        <div class="container">
      <div>
      <div class="container">
      <div class="row">
      <h1>post your suggestions</h1>
    	<div class="box">
 		<ul>
 			<?php 
 				$result = $com->index();
 				while ($data = $result->fetch_assoc()) {
 			 ?>
 			<li><b style="color:black"><?php echo $data['name']; ?><b>  -  <?php echo $com->dateFormat($data['comment_time']); ?> <br>	 <h3><?php echo $data['comment'] ?></h3></li>
 			<?php } ?>
 		</ul>

      

 

 <?php 
	 if (isset($_GET['msg'])) {
		 $msg = $_GET['msg'];
		
	 }
  ?>
<form action="post_comment.php" method="post"><br><br><br>
 <table>
	 <tr>

		 <td><input style="width: 1000px;height: 50px;" type="" name="name" placeholder="Please enter your name"></td>
	 </tr>
	 <tr>
		 <td>
			 <textarea style="width: 1000px;height: 50px;"name="comment" rows="5" cols="30" placeholder="Please enter your comment"></textarea>
		 </td>
	 </tr>
	 <tr>
	
		 <td><input style="width: 1000px;height: 50px; background-color: rgb(250, 130, 87);" type="submit" name="submit" value="Post"></td>
	 </tr>
 </table>
</form>
</div>

</div>
</div>
</div>
  </section>
  
    </div>

	


 	
 </body>
 </html>