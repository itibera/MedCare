<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "head.php"; ?>
</head>

<body>


  <?php include "navbar.php"; ?>
  <p>&nbsp;</p>
  <div class="container">

    <form action="" class="card center-align" id="signup-form">
      <div class="card-content">
        <h5>Create your Account</h5>
        <div class="row ">
          <div class="input-field">
            <input id="name" type="text" class="validate">
            <label for="">Full Name <i class="fas fa-signature right"></i></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field center-align ">
            <input id="email" type="email" class="validate">
            <label for="email">Email <i class="fas fa-envelope right"></i></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field center-align  ">
            <input id="phone" type="text" class="validate" pattern="[0-9]{10}">
            <label for="phone">Mobile No. <i class="fas fa-phone right"></i></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field  center-align">
            <input id="password" type="password" class="validate">
            <label for="password">Password <i class="fas fa-lock right"></i></label>
          </div>
        </div>
        <button class="btn-primary center-align" id="">Sign Up</button>
      </div>
      <br>
      <span>Already have an account? <a href="login.php" style="text-decoration: underline;">Let's Login</a></span>
    </form>
  </div>
  <p>&nbsp;</p>

  <script src="./scripts/styles.js"></script>
</body>

</html>