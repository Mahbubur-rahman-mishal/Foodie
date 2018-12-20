  <?php
  session_start();
  require_once 'connect.php';
  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-red fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Foodie</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="nav navbar-nav">
          <li>
            <a href="index.php">Home </a>

          </li>
          <li><a href="faq.php">FAQ</a>

          </li>
          <li><a href="about_us.php">About Us</a>

          </li>


          <li><a href="contact_us.php">Contact Us</a>  </li>

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cuisine </a>

            <ul class="dropdown-menu">
              <li><a href="result.php">Thai</a>

              </li>
              <li><a href="result.php">Chinese</a>

              </li>
              <li><a href="result.php">Italian</a>

              </li>
              <li role="separator" class="divider"></li>
              <li><a href="result.php">Other Cuisine</a>  </li>

            </ul>
          </li>
        </ul>

        <?php

        if(isset($_SESSION['valid'])!=true){
          ?>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="sign_in.php">Sign In</a></li>
          <li><a href="sign_up.php">Sign Up</a></li>
          </ul>
        <?php
        }
        else{
          ?>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>
          </ul>
          <?php
        }
        ?>

    </div>
  </div>
</nav>