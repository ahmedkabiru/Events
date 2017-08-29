<?php
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='opeyemi.kabiru@yahoo.com'; // Business email ID
?>
<div class="main-1">
<div class="row">
    <div class="col-lg-12">
    <p>Thanks for booking event (<?php echo $events->ev_title;?>).</p>
    <h3>Booking Information</h3>
<table class="table table-hover">
  <tr><td>First Name:</td><td><?php echo $events->first_name;  ?></td></tr>
  <tr><td>Last Name:</td><td><?php echo $events->last_name;  ?></td></tr>
  <tr><td>Email:</td><td><?php echo $events->email;  ?></td></tr>
   <tr><td>Gender:</td><td><?php echo $events->gender;  ?></td></tr>
  <tr><td>Address:</td><td><?php echo $events->address;  ?></td></tr>
  <tr><td>State:</td><td><?php echo $events->state;  ?></td></tr>
  <tr><td>Country:</td><td><?php echo $events->country;  ?></td></tr>
  <tr><td>Phone No:</td><td><?php echo $events->phone;  ?></td></tr>
  <tr><td>Amount:</td><td>&#8358;<?php echo $events->ev_amount;  ?></td></tr>
  <tr><td>Payment Status:</td><td><?php echo $events->payment_status;  ?></td></tr>
  </table>
  <fieldset>
  <legend>Click the below Button to Proceed for Payment</legend>
 <div class="btn">
 <form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()"> Pay </button> 
</form>
 <!--    <form action="<?php echo $paypal_url ?>" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="<?php echo  str_replace("'",' ',$events->ev_title);?>">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="<?php echo  $events->ev_amount;?>">
    <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="<?php echo base_url().'welcome/cancel'?>">
    <input type="hidden" name="return" value="<?php echo base_url().'welcome/success'?>">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>  -->
    </fieldset>
    </div>
    </div>
    </div>
    </div>

    <?php  $refNo=uniqid();?>
    <?php  $price =$events->ev_amount *100; ?>
<script>

  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_live_8e0a5cdae19378ee845c60fc0275f3b2c1d5269c',
      email: "<?php echo $events->email; ?>",
      amount: "<?php echo $price; ?>",
      ref: "<?php echo $refNo  ?>",
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
         window.location = "<?php echo base_url()?>welcome/success?amount=<?php echo $events->ev_amount?>&reference=" + response.reference;
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>