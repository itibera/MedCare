<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "head.php"; ?>
  <style>
    .pimg {
      box-shadow: 0 2px 10px rgb(0 0 0 / 20%);
    }

    .booking-window {
      box-shadow: none;
      border: 1px solid grey;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <?php include "navbar.php"; ?>
  <!--==================Image and booking container===============-->
  <div class="container">
    <div class="row">
      <div class="col s12">
        <h5 class="package-name">Medicine Name</h5>
      </div>
    </div>

    <div class="row">
      <div class="col l7 s12">
        <img class="pimg" src="images/skincare-products.jpg">


      </div>

      <div class="col l5 s12">
        <div class="booking-window" id="">
          <div id="price">
            <span>₹52,000</span>
            <br>
            <br>
            (Including all taxes.)
          </div>
          <div>
            <h5 style="text-align: center;">
              <br>
              Medicine Type
            </h5>
          </div>
          <div>
            <span class="chip" id="med-type">Antipyratic</span>
          </div>
          <br>
          <br>
          <div>
            <form action="">
              <div class="row">
                <div class="input-field col s6">
                  <input id="qty" type="number" class="validate" required>
                  <label for="qty">Quantity</label>
                </div>
                <div class="input-field col s6">
                  <button class="btn-primary center-align" id="add-cart">Add to Cart</button>
                </div>
              </div>
            </form>

          </div>
          <br>
        </div>
      </div>
    </div>

    <!--==============Package includes container========r-->
    <div class="container" id="package-inc">
      <div class="row">
        <div class="col s12">
          <h5>Composition</h5>
        </div>
      </div>

      <div class="row" id="composition">
        <span class="chip">Parameter</span>
        <span class="chip">Parameter</span>
      </div>



    </div>



    <!--======================tabs==============-->


    <div class="row">
      <div class="col s12">
        <ul id="tabs" class="tabs">
          <li class="tab col s3"><a href="#test-swipe-1">Description</a></li>
          <li class="tab col s3"><a href="#test-swipe-2">Uses</a></li>
          <li class="tab col s3"><a href="#test-swipe-3">Side Effects</a></li>
        </ul>
      </div>

      <!--==================================test swipe 1==========================================-->

      <hr>
      <div id="test-swipe-1" class="col s12" style="display: flex;">

      </div>
      <!--==================================test swipe 2============================================-->
      <div id="test-swipe-2" class="col s12 ">

      </div>
      <!--=============test swipe 3==================================-->
      <div id="test-swipe-3" class="col s12 ">

      </div>
    </div>
  </div>
  <p>&nbsp;</p>
  <!-- ========= Footer =========== -->
  <?php include "footer.php"; ?>
  <!-- ========= End of Footer =========== -->
  <script src="./scripts/styles.js"></script>
  <script>
    $(document).ready(function() {
      // console.log(urlParams);

      var errorTemplate = `<div class="center"><h5>There is something error in loading details.</h5></div>
                            <p>&nbsp;</p><div><a href="/">Go to Home Page</a><div>`;




      function getComposition(compositions) {
        var data = "";
        compositions = compositions.split(", ");
        compositions.forEach(composition => {
          data += `<span class="chip">${composition}</span>`;
        })
        return data
      }

      function getsideEffects(sideEffects) {
        var data = "<ul>";
        sideEffects = sideEffects.split("\n");
        sideEffects.forEach(sideEffect => {
          data += `<li>${sideEffect}</li>`;
        })
        data += "</ul>"
        return data
      }

      function setData(data) {
        $('.package-name').html(data.medName);
        $('.pimg').attr("src", data.imageURL);

        // console.log(document('#price'))
        $('#price').html('<span>₹' + data.price + '</span> <br> <br> (Including all taxes.)');
        $('#med-type').html(data.type);

        $('#composition').html(getComposition(data.composition));
        $('#test-swipe-1').html("<br>" + data.description);
        $('#test-swipe-2').html("<br>" + data.uses);
        $('#test-swipe-3').html("<br>" + getsideEffects(data.sideEffects));


      }

      var urlParams = new URLSearchParams(window.location.search);

      // ================= Fetching Data from API ===================
      var medID = urlParams.get('medID')
      console.log(medID)
      $.ajax({
        url: "api/api_medicine.php",
        type: "GET",
        data: {
          medID: medID
        },
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          console.log(dataResult);
          if (dataResult.statusCode == 200) {
            setData(dataResult.data);

          } else if (dataResult.statusCode == 201) {
            $('body').html(errorTemplate);
          }

        }
      });

    });
  </script>
  <script>
    const cart_btn = document.getElementById("add-cart")
    cart_btn.addEventListener("click", (e) => {
      e.preventDefault();
      var urlParams = new URLSearchParams(window.location.search);
      var medID = urlParams.get('medID')
      var qty = document.getElementById("qty").value;
      var data = {
        type: "post",
        email: "itibera5@gmail.com",
        medID: medID,
        qty: qty
      };
      $.ajax({
        url: "api/api_cart.php",
        type: "POST",
        data: data,
        cache: false,
        success: function(dataResult) {
          console.log(dataResult);
          var dataResult = JSON.parse(dataResult);
          console.log(dataResult);
          if (dataResult.statusCode == 200) {
            console.log("Added to Cart!", dataResult);
            M.toast({
              html: 'Added to Cart!'
            })

          } else if (dataResult.statusCode == 201) {
            console.log("Failed to add cart!", dataResult);
            M.toast({
              html: 'Failed to add cart!'
            })
          }
        }
      })
    })
  </script>
</body>

</html>