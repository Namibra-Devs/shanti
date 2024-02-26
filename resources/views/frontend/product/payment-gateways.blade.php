{{-- Start: Paystack Area --}}
<div class="option-block" hidden>
  <div class="radio-block">
    <div class="checkbox">
      <label>
        <input name="method" type="radio" class="input-check" value="paystack" data-tabid="paystack"
          data-action="{{ route('product.paystack.submit') }}">
        <span>{{ __('Paystack') }}</span>
      </label>
    </div>
  </div>
</div>

<div class="row gateway-details" id="tab-paystack">
  <input type="hidden" name="txnid" id="ref_id" value="">
  <input type="hidden" name="sub" id="sub" value="0">
  <input type="hidden" name="method" value="Paystack">
</div>
{{-- End: Paystack Area --}}




<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="lc" value="UK">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="ref_id" id="ref_id" value="">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest">
<input type="hidden" name="currency_sign" value="$">
