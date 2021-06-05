@extends('frontend.layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" integrity="sha512-bYPO5jmStZ9WI2602V2zaivdAnbAhtfzmxnEGh9RwtlI00I9s8ulGe4oBa5XxiC6tCITJH/QG70jswBhbLkxPw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        /**
             * The CSS shown here will not be introduced in the Quickstart guide, but shows
             * how you can use CSS to style your Element's container.
             */
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection
@section('content')


<section class="checkout_area section_padding ">
    <div class="container">

    	@if(count($errors))
    <div class="form-group">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    </div>
@endif

    	@guest
      <div class="returning_customer">
        <div class="check_title">
          <h2>
            Returning Customer?
            <a href="">Click here to login</a>
          </h2>
        </div>
        <p>
          If you have shopped with us before, please enter your details in the
          boxes below. If you are a new customer, please proceed to the
          Billing & Shipping section.
        </p>
        <form class="row contact_form" action="#" method="post" novalidate="novalidate">

          <div class="col-md-6 form-group p_star">
            <input type="text" class="form-control" id="email" name="email" value=" " placeholder="Email" />
            
          </div>
          <div class="col-md-6 form-group p_star">
            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" />
            
          </div>
          <div class="col-md-12 form-group">
            <button type="submit" value="submit" class="btn_3">
              log in
            </button>
            <div class="creat_account">
              <input type="checkbox" id="f-option" name="selector" />
              <label for="f-option">Remember me</label>
            </div>
            <a class="lost_pass" href="#">Lost your password?</a>
          </div>
        </form>
      </div>
      @endguest
      
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="{{route('cart.checkout')}}" method="post" id="payment-form">
            	@csrf
            	@guest
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required />
                
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required />
                
              </div>
              
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required />
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required />
              </div>
              @endguest
				<div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="name_on_card" name="name" placeholder="Name As In Card" required />
                
              </div>
               <div class="col-md-12" style="margin-top: -30px; margin-bottom: 15px;">
                            <label for="card-element">

                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                </div>
              
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" name="add1" placeholder="Address Line 1" required />
              </div>
              <div class="col-md-12 form-group ">
                <input type="text" class="form-control" id="add2" name="add2" placeholder="Address Line 2" />
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="city" name="city" placeholder="City" required />
              </div>
              
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" required />
              </div>
              
              <div class="col-md-12 form-group">
               
                <textarea class="form-control" name="message" id="message" rows="1"
                  placeholder="Order Notes"></textarea>

              </div>
              <div class="col-md-12 form-group">

              <input type="text" id="date" name="datetime" class="form-control"  placeholder="Enter Delivery datetime" required />
          </div>

              <button class="btn_3" type="submit" id="complete-order">Submit</button>

              
            </form>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <li>
                  <a >Product
                    <span>Total</span>
                  </a>
                </li>
                @foreach($items as $item)
                <li>
                  <a >{{$item['name']}}
                    <span class="middle">x  {{$item['quantity']}}</span>
                    <span class="last">${{$item['quantity'] * $item['price']}}</span>
                  </a>
                </li>
                @endforeach
               
              </ul>
              <ul class="list list_2">
                
                
                <li>
                  <a >Total
                    <span>${{$total}}</span>
                  </a>
                </li>
              </ul>
              
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  @push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

	$('#date').datetimepicker();

	</script>

    <script>
        (function () {

            var stripe = Stripe('{{ config('services.stripe.key') }}');
            // Create an instance of Elements.
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Roboto","Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            // Create an instance of the card Element.
            var card = elements.create('card',
                {
                    style: style,
                    hidePostalCode: true,
                }
            );

            card.mount('#card-element');


            card.on('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                    document.getElementById('complete-order').disabled = false;
                } else {
                    displayError.textContent = '';
                }
                {
                    empty: true
                }
            });

            card.on('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                    document.getElementById('complete-order').disabled = false;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');

            // Disable the submit button to prevent repeated clicks

            form.addEventListener('submit', function (event) {
                event.preventDefault();
                document.getElementById('complete-order').disabled = true;

                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('add1').value,
                    address_city: document.getElementById('city').value,
                   	address_zip: document.getElementById('postcode').value
                }
                stripe.createToken(card, options).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                console.log(hiddenInput)
                // Submit the form
                form.submit();
            }


        })();
    </script>
@endpush
