<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php $preparedData = $this->payment_model->razorpayPrepareData($payment_gateway['identifier']); ?>

<button class="payment-button float-end gateway <?php echo $payment_gateway['identifier']; ?>-gateway" id="rzp-button1"><?php echo get_phrase('pay_by_razorpay'); ?></button>

<script>
	var options = {
	"key": "<?php echo $preparedData['key']; ?>", // Enter the Key ID generated from the Dashboard
	"amount": "<?php echo $preparedData['amount']; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
	"currency": "<?php echo $payment_gateway['currency']; ?>",
	"name": "<?= $preparedData['name']; ?>",
	"order_id": "<?= $preparedData['order_id']; ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
	"handler": function (response){

        var redirectUrl = "<?php echo $payment_details['success_url'].'/'.$payment_gateway['identifier']; ?>?order_id=" + response.razorpay_order_id + "&payment_id=" + response.razorpay_payment_id + "&signature=" + response.razorpay_signature;
        window.location = redirectUrl;
	},
	"prefill": {
		"name": "<?= $preparedData['prefill']['name']; ?>",
		"email": "<?= $preparedData['prefill']['email']; ?>"
	},
	"theme": {
		"color": "<?= $preparedData['theme']['color']; ?>"
	}};
	
	var rzp1 = new Razorpay(options);
	rzp1.on('payment.failed', function (response){
		
	});

	document.getElementById('rzp-button1').onclick = function(e){
		rzp1.open();
		e.preventDefault();
	}
</script>