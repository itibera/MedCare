<?php
if (isset($_POST['add-med'])) {
  // Include the database configuration file 
  include_once 'db.php';

  // File upload configuration 
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
  $medName = $_POST['med_name'];
  $company = $_POST['comp_name'];
  $qty = $_POST['qty'];
  $type = $_POST['type'];
  $category = $_POST['category'];
  $composition = $_POST['compositions'];
  $uses = $_POST['uses'];
  $price = $_POST['med_price'];
  $sideEffects = $_POST['side-effect'];
  $description = $_POST['description'];




  $medID = "MED" . strtotime("now");
  mkdir("med-image/" . $medID);
  $targetDir = "/med-image/" . $medID . "/";

  $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
  $fileName = $_FILES['med_image']['name'];
  if (!empty($fileName)) {

    // File upload path 
    $thumb_image = basename($_FILES['med_image']['name']);
    $targetFilePath = $targetDir . $thumb_image;

    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    if (in_array($fileType, $allowTypes)) {

      // Upload file to server 
      if (move_uploaded_file($_FILES["med_image"]["tmp_name"], SITE_ROOT . $targetFilePath)) {

        // Image db insert sql 
        $insertValuesSQL .= "('" . $medID . "','" . $medName . "', '" . $company . "', '" . $qty . "', '" . $price . "', '" . $composition . "', '" . $thumb_image . "', '" . $uses . "', '" . $type . "', '" . $category . "', '" . $sideEffects . "', '" . $description . "'),";
      } else {
        $errorUpload .= $fileName . ' | ';
      }
    } else {
      $errorUploadType .= $fileName . ' | ';
    }

    if (!empty($insertValuesSQL)) {
      $insertValuesSQL = trim($insertValuesSQL, ',');
      // Insert image file name into database 
      $insert = $conn->query("INSERT INTO medicine VALUES $insertValuesSQL");

      if ($insert) {
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
        $statusMsg = "Medicine Added successfully." . $errorMsg;
      } else {
        $statusMsg = "Sorry, there was an error uploading your file.";
      }
    }
  } else {
    $statusMsg = 'Please select a file to upload.';
  }

  // Display status message 
  echo $statusMsg;
  // echo "\n Medicine Added Successfully.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "head.php"; ?>
</head>

<body>

  <!-- ============Navbar============== -->
  <?php include "navbar.php"; ?>
  <div class="container">


    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s6">
          <input id="med_name" name="med_name" type="text" class="validate">
          <label for="med_name">Medicine Name</label>
        </div>
        <div class="input-field col s6">
          <input id="comp_name" name="comp_name" type="text" class="validate">
          <label for="comp_name">Company Name</label>
        </div>
        <div class="input-field col s6">
          <input id="qty" name="qty" type="text" class="validate">
          <label for="qty">Quantity(e.g.- 14 Tablet in Strip)</label>
        </div>
        <div class="input-field col s6">
          <input id="type" name="type" type="text" class="validate">
          <label for="type">Medicine Type (e.g.- anti alergetic, anti diabetic)</label>
        </div>
        <div class="input-field col s6">
          <input id="category" name="category" type="text" class="validate">
          <label for="category">Category (e.g.- device, syrup/tablet) </label>
        </div>
        <div class="input-field col s6">
          <input id="compositions" name="compositions" type="text" class="validate">
          <label for="compositions">Composition (if multiple then separate by comma ",") </label>
        </div>
        <div class="input-field col s6">
          <input id="med_price" name="med_price" type="text" class="validate">
          <label for="med_price">Price</label>
        </div>
        <div class="file-field input-field col s12">
          <div class="btn right">
            <span>Upload Medicine Photos</span>
            <input type="file" name="med_image">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
        <div class="input-field col s6">
          <textarea id="description" name="description" class="materialize-textarea"></textarea>
          <label for="description">Description</label>
        </div>
        <div class="input-field col s6">
          <textarea id="uses" name="uses" class="materialize-textarea"></textarea>
          <label for="uses">Uses</label>
        </div>
        <div class="input-field col offset-s3 s6">
          <textarea id="side-effect" name="side-effect" class="materialize-textarea"></textarea>
          <label for="side-effect">Side Effects</label>
        </div>
        <br>

      </div>
      <div class="center">
        <input value="Add Medicine" type="submit" class="btn-primary" name="add-med">
      </div>
    </form>
  </div>
  <p>&nbsp;</p>


  <script src="./scripts/styles.js"></script>


</body>

</html>