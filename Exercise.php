<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Personality Development</title>
  <link rel="stylesheet" href="css/dashbordStyle.css" />
  <link rel="stylesheet" href="css/Exercise.css" />

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

    <section class="main">
      <section>
       <div class="main-top">
      </div>
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
      ?>
      <div class="main-skills">
         <div class="col-md-6"> 
        <div class="container">
      <div>
      <div class="container">
      <div class="row">
        <div class="col-md-6">
         <h1>Upskilling Steps.. </h1>  
         Personality development involves enhancing various aspects of one's character, behavior, and mindset to become a more effective and well-rounded individual. </br><h4>Here are some exercises and activities that can help you in your journey towards personality development:</h4>  
        </div>
        </br>
        <div>
    <input id="item1" type="checkbox" checked>
    <label for="item1">Self-reflection and Journaling</label>

    <input id="item2" type="checkbox">
    <label for="item2">Active Listening</label>

    <input id="item3" type="checkbox">
    <label for="item3">Goal Setting</label>

    <input id="item4" type="checkbox">
    <label for="item4">Effective Communication:</label>

    <input onclick="myFunction()"id="item5" type="checkbox">
    <label for="item5">Emotional Intelligence</label>
    <script>
function myFunction() {
  alert("Keep your dreams alive");
}
</script>
        </div>
    </div>
      <div class="col-md-6">
      <img id = "right" src= "images/Personal goals-pana.png"/>  </div>
      </div>
      </div>
</div>

</div>

  </section>
     
       
    
      <section class="main-course">
        <h1 ><b style="font-size: 25px;"> Easy Tools</b></h1>
       
          <div class="main-skills">
             <div class="card">
             <i class="fa-brands fa-youtube fa-xl"></i>
                <h3> watch videos</h3>
                <p>top youtube videos for </br>self improvemen </p>
                <a   href="https://www.youtube.com/watch?v=hE6I9apUvrk&list=RDLVOM--rXPXaJk&index=2"target="_blank"><button>Get Started</button></a>
              </div>
              <div class="card">
              <i class="fa-solid fa-book-open-reader fa-xl"></i>
                <h3>Read Articals</h3>
                <p>top Articals website for</br> self improvemen </p>
                <a   href="https://www.verywellmind.com/"target="_blank"> <button>Get Started</button></a>
              </div>
              <div class="card">
              <i class="fa-solid fa-person-chalkboard fa-xl"></i>
                <h3>courses</h3>
                <p>top free courses for systematic </br> learning</p>
                <a   href="https://alison.com/courses/personal-development"target="_blank"><button>Get Started</button></a>
              </div>
              <div class="card">
              <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                <h3>exploring</h3>
                <p>tay new things by research on </br> goolgle</br> </p>
                <a   href="https://www.google.com/"target="_blank"><button>Get Started</button></a>
              </div>
          </div>
        
      </section>
    </section>
    </div>

</div>

</body>
</html>