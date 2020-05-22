<style>
  .creditCardForm .form-control {
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  .creditCardForm .form-group .transparent {
    opacity: 0.1;
  }
</style>

<div class="checkout-left-content">
  <form class="creditCardForm dimmer" id="paymentFrm" method="post" action="<?=cn($module."/stripe/create_payment_step2")?>">
    <div class="loader"></div>
    <div class="dimmer-content">
      <fieldset class="form-fieldset m-t-20">
        <!-- display errors returned by createToken -->
        <div class="payment-errors alert alert-icon alert-danger alert-dismissible d-none">
          <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
          <span class="payment-errors-message"></span>
        </div>
        <div class="form-group">
          <label class="form-label"><?=lang("user_information")?></label>
          <div class="input-icon">
            <span class="input-icon-addon">
              <i class="fe fe-user"></i>
            </span>
            <input type="text" class="form-control" name="name" id="name" placeholder="<?=lang("Your_name")?>" required autofocus >
          </div>    
          <div class="input-icon m-t-20">
            <span class="input-icon-addon">
              <i class="fe fe-mail"></i>
            </span>
            <input type="text" class="form-control" id="email"  value="<?php echo strip_tags($email); ?>" readonly>
          </div>
        </div>
        <div class="form-group"  id="card-number-field">
          <label class="form-label"><?=lang("card_number")?></label>
          <input type="text" class="form-control card-number" name="card_num" id="card_num" autocomplete="off" required>
        </div>
        <div class="row">
          <div class="col-sm-8">
            <div class="form-group">
              <label  class="form-label"><span class="hidden-xs"><?=lang("expiry_date")?></span> </label>
              <div class="input-group">
                <input type="number" name="exp_month" id="exp_month" class="card-expiry-month form-control" placeholder="MM" required>
                <input type="number" name="exp_year" id="exp_year" class="card-expiry-year form-control" placeholder="YY"  required>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="form-group">
              <label class="form-label"><?=lang("CVV")?></label>
              <input type="number" name="cvv" id="cvv" class="form-control card-cvc" autocomplete="off" required>
            </div>
          </div>
        </div>

        <div class="form-group text-center" id="credit_cards">
          <img src="<?php echo BASE; ?>assets/images/payments/visa.jpg" id="visa">
          <img src="<?php echo BASE; ?>assets/images/payments/mastercard.jpg" id="mastercard">
          <img src="<?php echo BASE; ?>assets/images/payments/amex.jpg" id="amex">
        </div>
        
        <!-- hidden token input -->
        <input type="hidden" name="order[item_ids]" value="<?php echo strip_tags($item_ids); ?>">
        <input type="hidden" name="order[email]" value="<?php echo strip_tags($email); ?>">
        <input type="hidden" name="order[link]" value="<?php echo strip_tags($link); ?>">
        <input type="hidden" name="order[price]" value="<?php echo strip_tags($price); ?>">
        <input type="hidden" name="<?php echo strip_tags($this->security->get_csrf_token_name());?>" value="<?php echo strip_tags($this->security->get_csrf_hash());?>">
      </fieldset>
      <!-- submit button -->
      <div class="card-footer text-left">
        <input type="submit" id="payBtn" class="btn btn-pill btn-submit btn-gradient btn-block mr-1 mb-1" value="<?=lang("Make_payment")?>">
      </div>
    </div>
  </form>
</div>

<script src="<?php echo BASE; ?>assets/plugins/stripe/payform.min.js" charset="utf-8"></script>
<script src="<?php echo BASE; ?>assets/plugins/stripe/script.js"></script>

<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey("<?php echo get_option("stripe_publishable_key", '')?>");

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        $(".creditCardForm.dimmer").removeClass('active');
        //display the errors on the form
        $(".payment-errors").removeClass('d-none');
        $(".payment-errors-message").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}

$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
      //disable the submit button to prevent repeated clicks
      $('#payBtn').attr("disabled", "disabled");
      $(".creditCardForm.dimmer").addClass('active');
      //create single-use token to charge the user
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
      
      //submit from callback
      return false;
    });
});
</script>

