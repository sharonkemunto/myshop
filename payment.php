<div>
<h2 align="center">Pay With Paypal:</h2>

<div id="paypal-button-container"></div>

<script
    src="https://www.paypal.com/sdk/js?client-id=AdoA9L9gtPshwEJFpGsMScItYXkps5nxUAo13SIEKyEH5njQXZ-8U0urNd_bgiQJI991duRq-HvmvDys">
  </script>
<script>
var price = document.getElementById("totals");

console.log(price.innerHTML)
paypal.Buttons({

    createOrder: function(data, actions) {
      // Set up the transaction
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: price.innerHTML/100
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // Capture the funds from the transaction
      return actions.order.capture().then(function(details) {
        // Show a success message to your buyer
        console.log(details)

        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');</script>


</div>


