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
    <form action="" class="center-align" id="search-medicine-form">
      <div class="row">
        <div class="input-field col l4 s12" id="input-from">
          <input id="Pin-Code" type="number" class="validate">
          <label for="Pin-Code">From Area <i class="fas fa-map-marker-alt right"></i></label>
        </div>
        <div class="col l2 s12" style="font-size: 1.25rem; padding-top: 1.55rem; color: #CCCCCC;">
          <i class="fas fa-exchange-alt"></i>
        </div>
        <div class="input-field col l4 s12" id="input-to">
          <input id="medicine-name" type="text" class="validate" required>
          <label for="medicine-name">Search for Medicine </label>
        </div>
        <div class="col l2 s12" style="padding-top: 1.25rem;">
          <button class="btn-primary center-align" id="search-medicine-btn">Search</button>
        </div>
      </div>
    </form>
    <!--=========End of search content====================-->

    <!--==================Search Result========================-->

    <p>&nbsp;</p>
    <div class="">
      <h5>Search Results</h5>


      <!-- ============ Package List =============== -->
      <div class="row" id="search-items">





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
  <script>
    function setData(searchItems) {
      // cardMedicines = searchItems;
      var data = '';
      

      searchItems.forEach(searchItem => {
        data += `<div class="col s12 l6">
                <div class="card package-card row">
                  <div class="card-image col m4">
                    <img src="${searchItem.image}" alt="">
                  </div>
                  <div class="card-content col s12 m8">
                    <div>
                      <p class="package-title">${searchItem.name.substring(0,25)}</p>
                    </div>
                    <p style="font-size: small;">${searchItem.company}</p>
                    <p style="font-size: 1rem; margin-top: 10px; font-weight: 500;">${searchItem.packQty}</p>
                    <br>
                    <div>
                      <p>
                        <span style="font-size: 1rem; line-height: 2.5; font-weight: 600;">MRP: ₹${searchItem.price}</span>
                        <a class="btn-primary right" href="medicine-details.php?medID=${searchItem.id}">See Details</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>`;

        
      });

      $('#search-items').html(data);
     
    }
    $('#search-medicine-form').submit(function(e) {
      e.preventDefault()
      var searchParam= document.getElementById('medicine-name').value;
      $.ajax({
        url: "api/api_search.php",
        type: "GET",
        data: {
          searchParam: searchParam
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
    })
  </script>


</body>

</html>