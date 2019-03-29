<!-- set up a container element for the button; -->
<div id="paypal-button-container"></div>

<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

<script>
    // Render the PayPal button into #deposit-employment-form
    paypal.Buttons({
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        // deposit_amount is got from onchange in html
                        value: deposit_amount
                    }
                }]
            });
        },
        // finalize the transaction
        onApprove: function(data) {
            return fetch('get-paypal-transaction.js', {
                headers: {
                    'content-type': 'application/json'
                },
                body: JSON.stringify({
                    orderID: data.orderID
                })
            }).then(function(res) {
                return res.json();
            }).then(function(details) {
                alert('Transaction approved by ' + details.payer_given_name);
            })
        }
    }).render('#deposit-employment-form');
</script>
