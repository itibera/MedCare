<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "head.php"; ?>
</head>

<body>

  <!-- ============Navbar============== -->
  <?php include "navbar.php"; ?>

  <!--=====================End of Navbar=================-->

  <!--=====================Search Contents==================-->
  <p>&nbsp;</p>
  <div class="container">
    <form action="" class="center-align" id="search_con">
      <div class="row">
        <div class="input-field col l4 s12" id="input-from">
          <input id="Pin-Code" type="number" class="validate">
          <label for="Pin-Code">From Area <i class="fas fa-map-marker-alt right"></i></label>
        </div>
        <div class="col l2 s12" style="font-size: 1.25rem; padding-top: 1.55rem; color: #CCCCCC;">
          <i class="fas fa-exchange-alt"></i>
        </div>
        <div class="input-field col l4 s12" id="input-to">
          <input id="medicine-name" type="text" class="validate">
          <label for="medicine-name">Search for Medicine </label>
        </div>
        <div class="col l2 s12" style="padding-top: 1.25rem;">
          <button class="btn-primary center-align" id="search-package-btn">Search</button>
        </div>
      </div>
    </form>
    <!--=========End of search content====================-->

    <!--==================Search Result========================-->

    <p>&nbsp;</p>
    <div class="search-filter-heading">
      <span>Search Results</span>


      <!-- ============ Package List =============== -->
      <div class="row">

        <div class="col s6">
          <div class="card package-card row">
            <div class="card-image col s4">
              <img src="./images/pharmeasy_in/stbotanica-natural-apple-cider-vinegar-with-mother-vinegar-500-ml-raw-unfiltered-unrefined-2-1621503576.jpg" alt="">
            </div>
            <div class="card-content col s8">
              <div>
                <p class="package-title">St.botanica Natural Apple... <span class="btn-acc right">500 Ml</span></p>
              </div>
              <p style="font-size: small;">vitamin C, vitamin E and vitamin A, B complex...</p>
              <br><br>
              <div>
                <p>
                  <span style="font-size: large; line-height: 2;"><b>MRP ₹375</b></span>
                  <span><button class="btn-primary right">Add To Cart</button></span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card package-card row">
            <div class="card-image col s4">
              <img src="./images/pharmeasy_in/stbotanica-natural-apple-cider-vinegar-with-mother-vinegar-500-ml-raw-unfiltered-unrefined-2-1621503576.jpg" alt="">
            </div>
            <div class="card-content col s8">
              <div>
                <p class="package-title">St.botanica Natural Apple... <span class="btn-acc right">500 Ml</span></p>
              </div>
              <p style="font-size: small;">vitamin C, vitamin E and vitamin A, B complex...</p>
              <br><br>
              <div>
                <p>
                  <span style="font-size: large; line-height: 2;"><b>MRP ₹375</b></span>
                  <span><button class="btn-primary right">Add To Cart</button></span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card package-card row">
            <div class="card-image col s4">
              <img src="./images/pharmeasy_in/stbotanica-natural-apple-cider-vinegar-with-mother-vinegar-500-ml-raw-unfiltered-unrefined-2-1621503576.jpg" alt="">
            </div>
            <div class="card-content col s8">
              <div>
                <p class="package-title">St.botanica Natural Apple... <span class="btn-acc right">500 Ml</span></p>
              </div>
              <p style="font-size: small;">vitamin C, vitamin E and vitamin A, B complex...</p>
              <br><br>
              <div>
                <p>
                  <span style="font-size: large; line-height: 2;"><b>MRP ₹375</b></span>
                  <span><button class="btn-primary right">Add To Cart</button></span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card package-card row">
            <div class="card-image col s4">
              <img src="./images/pharmeasy_in/stbotanica-natural-apple-cider-vinegar-with-mother-vinegar-500-ml-raw-unfiltered-unrefined-2-1621503576.jpg" alt="">
            </div>
            <div class="card-content col s8">
              <div>
                <p class="package-title">St.botanica Natural Apple... <span class="btn-acc right">500 Ml</span></p>
              </div>
              <p style="font-size: small;">vitamin C, vitamin E and vitamin A, B complex...</p>
              <br><br>
              <div>
                <p>
                  <span style="font-size: large; line-height: 2;"><b>MRP ₹375</b></span>
                  <span><button class="btn-primary right">Add To Cart</button></span>
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>
      <p>&nbsp;</p>


      <p>&nbsp;</p>

    </div>


    <!--==================End Search Result========================-->
  </div>

  <!-- ========= Footer =========== -->
  <?php include "footer.php"; ?>
  <!-- ========= End of Footer =========== -->
  <script src="./scripts/styles.js"></script>


</body>

</html>