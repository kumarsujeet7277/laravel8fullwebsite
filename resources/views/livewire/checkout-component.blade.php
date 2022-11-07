	<main id="main" class="main-site">
		<style>
			.cvc{	
				font-size: 13px;
				line-height: 19px;
				display: inline-block;
				height: 43px;
				padding: 2px 20px;
				max-width: 300px;
				width: 100%;
				border: 1px solid #e6e6e6;
			}
		</style>

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div> 
			<div class=" main-content-area">
			<form  wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
					<div class="wrap-address-billing">
						<form action="" wire:submit.prevent="placeOrder">
							<div class="row">
								<div class="col-md-12">
									<h3 class="box-title">Billing Address</h3>
								
									<p class="row-in-form">
										<label for="fname">first name<span>*</span></label>
										<input type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
										@error('firstname')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="lname">last name<span>*</span></label>
										<input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
										@error('lastname')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="email">Email Addreess:</label>
										<input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
										@error('email')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="phone">Phone number<span>*</span></label>
										<input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
										@error('mobile')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="line1">line1<span>*</span></label>
										<input type="text" name="line1" value="" placeholder="Address line 1" wire:model="line1">
										@error('line1')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="line2">line2<span>*</span></label>
										<input type="text" name="line2" value="" placeholder="Address line 2" wire:model="line2">
										@error('line2')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="city">Town / City<span>*</span></label>
										<input  type="text" name="city" value="" placeholder="City name" wire:model="city">
										@error('city')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="province">Province<span>*</span></label>
										<input  type="text" name="province" value="" placeholder="province" wire:model="province">
										@error('province')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="country">Country<span>*</span></label>
										<input type="text" name="country" value="" placeholder="United States" wire:model="country">
										@error('country')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="zip-code">Postcode / ZIP:</label>
										<input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
										@error('zipcode')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form fill-wife">
										<label class="checkbox-field">
											<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="is_shipping_different">
											<span>Ship to a different address?</span>
										</label>
									</p>
									@if ($is_shipping_different)
										
										<h3 class="box-title">Shipping Address</h3>
									
										<p class="row-in-form">
											<label for="fname">first name<span>*</span></label>
											<input type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
											@error('s_firstname')<span class="text-danger">{{$message}}</span>@enderror
										</p>
										<p class="row-in-form">
											<label for="lname">last name<span>*</span></label>
											<input type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
											@error('s_lastname')<span class="text-danger">{{$message}}</span>@enderror
										</p>
										<p class="row-in-form">
											<label for="email">Email Addreess:</label>
											<input type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
											@error('s_email')<span class="text-danger">{{$message}}</span>@enderror
										</p>
										<p class="row-in-form">
											<label for="phone">Phone number<span>*</span></label>
											<input type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_mobile">
											@error('s_mobile')<span class="text-danger">{{$message}}</span>@enderror
										</p>
										<p class="row-in-form">
											<label for="line1">line1<span>*</span></label>
											<input type="text" name="line1" value="" placeholder="Address line 1" wire:model="s_line1">
											@error('s_line1')<span class="text-danger">{{$message}}</span>@enderror
										</p>
										<p class="row-in-form">
											<label for="line1">line2<span>*</span></label>
											<input type="text" name="line2" value="" placeholder="Address line 2" wire:model="s_line2">
											@error('s_line2')<span class="text-danger">{{$message}}</span>@enderror
										</p>
										<p class="row-in-form">
											<label for="city">Town / City<span>*</span></label>
											<input  type="text" name="city" value="" placeholder="City name" wire:model="s_city">
											@error('s_city')<span class="text-danger">{{$message}}</span>@enderror
										</p>
										<p class="row-in-form">
											<label for="province">Province<span>*</span></label>
											<input  type="text" name="province" value="" placeholder="province" wire:model="s_province">
											@error('s_province')<span class="text-danger">{{$message}}</span>@enderror
										</p>
										<p class="row-in-form">
											<label for="country">Country<span>*</span></label>
											<input type="text" name="country" value="" placeholder="United States" wire:model="s_country">
											@error('s_country')<span class="text-danger">{{$message}}</span>@enderror
										</p>
										<p class="row-in-form">
											<label for="zip-code">Postcode / ZIP:</label>
											<input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
											@error('s_zipcode')<span class="text-danger">{{$message}}</span>@enderror
										</p>
									@endif
								</div>
							</div>
					</div>
				

				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>
							<div class="wrap-address-billing">
								@if ($paymentmode == 'card')
									<p class="row-in-form">
										@if (Session::has('stripe_error'))
											<div class="alert alert-danger" role="alert">{{Session::get('stripe_error')}}</div>
										@endif
										<label for="card-no">Card Number</label>
										<input type="text" name="card-no" value="" placeholder="Card Number" wire:model="card_no">
										@error('card_no')<span class="text-danger">{{$message}}</span>@enderror
									</p>

									<p class="row-in-form">
										<label for="exp-month">Expiry Month</label>
										<input type="text" name="exp-month" value="" placeholder="Expiry Month" wire:model="exp_month">
										@error('exp_month')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="exp-year">Expiry Year</label>
										<input type="text" name="exp-year" value="" placeholder="Expiry Year" wire:model="exp_year">
										@error('exp_year')<span class="text-danger">{{$message}}</span>@enderror
									</p>
									<p class="row-in-form">
										<label for="cvc">CVC</label>
										<input type="password" name="cvc" class="cvc" value="" placeholder="CVC" wire:model="cvc">
										@error('cvc')<span class="text-danger">{{$message}}</span>@enderror
									</p>
								@endif
							</div>
						
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
								<span>CashOnDelivery</span>
								<span class="payment-desc">Order Now Cash On Delivery</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
								<span>Debit/Credit Card Pay</span>
								<span class="payment-desc">Order Now With Debit or Credit Card</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
							@error('paymentmode')<span class="text-danger">{{$message}}</span>@enderror
						</div>
						@if (Session::has('checkout'))
							<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{Session::get('checkout')['total']}}</span></p>	
						@endif

						@if($errors->isEmpty())
							<div wire:ignore id="processing" style="font-size: 20px; margin-bottom:20px; padding-left:37px; color:green; display:none; " >
								<i class="fa fa-spinner fa-pulse fa-fw"></i>
								<span>Processing...</span>
							</div>
						@endif

						<button type="submit" class="btn btn-medium">Place order now</button>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed $00.00</span></p>
					</div>
				</div>
			</form>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->