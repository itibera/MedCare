<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "head.php"; ?>
  <style>
    .btn-accent,
    .btn-accent:hover {
      cursor: auto;
      box-shadow: none;
    }

    .address-card {
      border: 1px solid #DDD;
      box-shadow: none;
    }

    .card .card-title {
      font-size: 18px;
      font-weight: 600;
    }

    /* footer {
      position: fixed;
      bottom: 0;
      z-index: 100;
      display: flex;
      width: inherit;
      background-color: white;
    }
    footer .container {
      display: flex;
      width: inherit;
    } */
  </style>
</head>

<body>

  <?php include "navbar.php"; ?>

  <br>
  <div class="container">
    <h5>Cart Items</h5>
    <div class="row" id="cart-items">

    </div>
    <p>&nbsp;</p>
    <hr>
    <h5>Select Delivery Address</h5>
    <form id="delivery-address" class="row">
      <div class="input-field col s12 l6 offset-l3">
        <input id="full-name" type="text" class="validate" required>
        <label for="full-name">Full Name</label>
      </div>
      <div class="input-field col s12 l6 offset-l3">
        <textarea id="address" class="materialize-textarea" required></textarea>
        <label for="address">Address (with Pincode)</label>
      </div>
      <div class="input-field col s12 l6 offset-l3">
        <input id="phone-number" type="text" class="validate" required>
        <label for="phone-number">Phone</label>
      </div>
    </form>

    <footer>
      <hr>
      <div class="container">
        <div class="row">
          <div class="col s6">
            <h6 id="total-price"></h6>
          </div>
          <div class="col s6">
            <button class="btn-primary right" id="place-order">
              Place Order
            </button>
          </div>
        </div>
      </div>
    </footer>
    <p>&nbsp;</p>

  </div>


  <script src="./scripts/styles.js"></script>
  <script>
    // var cardMedicines = [];
    function setData(cartItems) {
      // cardMedicines = cartItems;
      var data = '';
      var total_price = 0;

      cartItems.forEach(cartItem => {
        data += `<div class="col s12 l6">
                <div class="card package-card row">
                  <div class="card-image col m4">
                    <img src="${cartItem.image}" alt="">
                  </div>
                  <div class="card-content col s12 m8">
                    <div>
                      <p class="package-title">${cartItem.name.substring(0,25)}</p>
                    </div>
                    <p style="font-size: small;">${cartItem.company}</p>
                    <p style="font-size: 1rem; margin-top: 10px; font-weight: 500;">${cartItem.packQty}</p>
                    <br>
                    <div>
                      <p>
                        <span style="font-size: 1rem; line-height: 2.5; font-weight: 600;">MRP: ₹${cartItem.price}</span>
                        <span class="btn-accent right black-text"><b>QTY: ${cartItem.cartQty}</b></span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>`;

        total_price += (cartItem.price * cartItem.cartQty);
      });

      $('#cart-items').html(data);
      $('#total-price').html('Total: ' + total_price);
    }

    var errorTemplate = `<div class="center"><h5>No Cart Items</h5></div>
                            <p>&nbsp;</p><div class="center"><a href="/">Go to Home Page</a><div>`;

    $(document).ready(function() {
      var data = {
        type: 'get',
        email: 'itibera5@gmail.com'
      }
      $.ajax({
        url: "api/api_cart.php",
        type: "GET",
        data: data,
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          console.log(dataResult);
          if (dataResult.statusCode == 200) {
            setData(dataResult.data);

          } else if (dataResult.statusCode == 201) {
            $('#cart-items').html(errorTemplate);
            document.getElementById('delivery-address').style.display = 'none';
            document.getElementById('place-order').style.display = 'none';
          }
        }
      });

    });

    const placeOrder = document.getElementById('place-order');
    placeOrder.addEventListener('click', (e) => {
      e.preventDefault();

      var fullName = document.getElementById('full-name').value;
      var address = document.getElementById('address').value;
      var phoneNumber = document.getElementById('phone-number').value;

      address = fullName + ' | ' + address + ' | ' + phoneNumber;

      var data = {
        type: 'new_order',
        email: 'itibera5@gmail.com',
        address: address
      }
      $.ajax({
        url: "api/api_order.php",
        type: "POST",
        data: data,
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          // console.log(dataResult);
          if (dataResult.statusCode == 200) {
            console.log("Success!")

          } else if (dataResult.statusCode == 201) {
            $('body').html(errorTemplate);
          }
        }
      });
    })
  </script>

</body>

</html>