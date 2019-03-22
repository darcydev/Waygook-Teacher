<!-- set up a container element for the button -->
<div id="paypal-button-container"></div>


<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

<script>

    // get amount from deposit-employment-form
    var amount = $('#employment-deposit').val();
    console.log(amount);

    // Render the PayPal button into #deposit-employment-form
    paypal.Buttons({
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '0.01'
                    }
                }]
            });
        },
        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#deposit-employment-form');
</script>
