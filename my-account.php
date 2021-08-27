<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'head.php';
  ?>
  <style>
    .collapsible-header i {
      font-size: 2.25rem;
      width: auto;
      margin: 0.5rem;
      margin-right: 1.5rem;
    }
  </style>
</head>

<body>
  <!-- ============Navbar============== -->
  <?php
  include 'navbar.php';
  ?>

  <div class="container">

    <p>&nbsp;</p>
    <h4>Your Orders</h4>
    <hr>
    <div id="order-list">
      <!-- <div class="center grey-text"><h5>You Don't have any orders.</h5></div>
      <br><br>
      <div class="center"><a href="/" class="btn-primary">Start Ordering</a></div> -->
      <ul class="collapsible">

        <li>
          <div class="collapsible-header"><i class="far fa-check-circle"></i>Second</div>
          <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
          <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
      </ul>
    </div>

  </div>

  <script src="scripts/styles.js"></script>
  <script>
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, {});

    function getItems(items) {
      var itemsHTML = '';
      items.forEach(item => {
        itemsHTML += `<div class="col s12 l6">
                        <div class="card package-card row z-depth-0">
                          <div class="card-image col m4">
                            <img src="${item.image}" alt="">
                          </div>
                          <div class="card-content col s12 m8">
                            <div>
                              <p class="package-title">${item.name.substring(0,25)}</p>
                            </div>
                            <p style="font-size: small;">${item.company}</p>
                            <p style="font-size: 1rem; margin-top: 10px; font-weight: 500;">${item.packQty}</p>
                            <br>
                            <div>
                              <p>
                                <span style="font-size: 1rem; line-height: 2.5; font-weight: 600;">MRP: ₹${item.price}</span>
                                <span class="btn-accent right black-text"><b>QTY: ${item.ordQty}</b></span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>`;
      })

      return itemsHTML;
    }

    function getDeliveryStatus(status) {
      if (status == "order_placed") {
        return `class="fas fa-truck"`;
      } else if (status == "cancelled") {
        return `class="fas fa-ban"`;
      } else {
        return `class="far fa-check-circle"`;
      }
    }

    function setData(orders) {
      var ordersHTML = '<ul class="collapsible">';

      orders.forEach(order => {
        var address = order.address.split(" | ");

        ordersHTML += `<li>
                        <div class="collapsible-header">
                          <i ${getDeliveryStatus(order.status)}></i>
                          <div>
                            <div>${address[0]}</div>
                            <div>${order.items.length} item(s) | <b>Order Amount ₹${order.amount}</b> | Ordered on : ${order.date}</div>
                          </div>
                        </div>
                        <div class="collapsible-body">
                          <div>
                            <div>${address[0]}</div>
                            <div>${address[1]}. Phone - ${address[2]}</div>
                          </div>
                          <br>
                          <h5>Ordered Items</h5>
                          <hr>
                          <div class="row">
                            ${getItems(order.items)}                            
                          </div>
                        </div>
                      </li>`;
      })

      ordersHTML += '</ul>';

      document.getElementById('order-list').innerHTML = ordersHTML;
    }

    $(document).ready(function() {
      $.ajax({
        url: "api/api_order.php",
        type: "GET",
        data: {
          type: "get",
          email: "itibera5@gmail.com"
        },
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          // console.log(dataResult);
          if (dataResult.statusCode == 200) {
            setData(dataResult.data);
            var elems = document.querySelectorAll('.collapsible');
            // console.log(elems)
            var instances = M.Collapsible.init(elems, {});
          }
          if (dataResult.statusCode == 201) {
            $('body').html(errorTemplate);
          }
        }

      })


    })
  </script>

</body>

</html>