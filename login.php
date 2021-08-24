<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "head.php"; ?>
</head>

<body>


  <?php include "navbar.php"; ?>

  <p>&nbsp;</p>

  <div class="container">
    <form action="" class="card center-align" id="login-form">
      <div class="card-content">
        <h5 class="center-align">Login to your Account</h5>
        <div class="row">
          <div class="input-field center-align  ">
            <input id="user-email" type="email" class="validate">
            <label for="user-email">Email <i class="fas fa-envelope right"></i></label>
          </div>
        </div>

        <div class="row">
          <div class="input-field center-align">
            <input id="user-password" type="password" class="validate">
            <label for="user-password">Password <i class="fas fa-lock right"></i></label>
          </div>
        </div>

        <div>
          <button class="btn-primary center-align" id="">Login</button>
        </div>
        <br>
        <a href="">Forgot password?</a>
        <p>&nbsp;</p>
      </div>
      <span>Don't have an account? <a href="signup.php" style="text-decoration: underline;">Let's Sign Up</a></span>
    </form>
  </div>
  <p>&nbsp;</p>
  <?php include "footer.php"; ?>

  <script src="./scripts/styles.js"></script>
</body>

</html>