@extends ('frontend.layout')

@section('css')

<style>

.accordion-section .panel-default > .panel-heading {
    border: 0;
    background: #f4f4f4;
    padding: 0;
}
.accordion-section .panel-default .panel-title a {
    display: block;
    font-size: 1.5rem;
}
.accordion-section .panel-default .panel-title a:after {
   
    
    content: "\f106";
    color: black !important;
    float: right;
    margin-top: -12px;
}
.accordion-section .panel-default .panel-title a.collapsed:after {
    content: "\f107";

}
.accordion-section .panel-default .panel-body {
    font-size: 1.2rem;
}
</style>
@endsection
@section('content')
<section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
  <div class="container">
  
	  
	  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" href="#collapse0" aria-expanded="true" aria-controls="collapse0" style="color: black;">
				How do I order?
			  </a>
			</h3>
		  </div>
		  <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
			<div class="panel-body px-3 mb-4" style="color: black !important;">
			  <p>Simply add items to your cart then click ‘Proceed to Checkout’. You will be prompted to enter your delivery details followed by your payment details.</p>
			  
			</div>
		  </div>
		</div>
		
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1" style="color: black;" >
				How far in advance do I need to order?

			  </a>
			</h3>
		  </div>
		  <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
			<div class="panel-body px-3 mb-4" style="color: black;">
			  <p>Orders can be made anytime when our chefs are available including weekends and public holidays.</p>
			</div>
		  </div>
		</div>
		
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2" style="color: black;">
				Is there a minimum order?
			  </a>
			</h3>
		  </div>
		  <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
			<div class="panel-body px-3 mb-4" style="color: black;">
			  <p>No, there is no minimum order. Also, all deliveries are free fow now.</p>
			</div>
		  </div>
		</div>
		
		<div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3" style="color: black;">
				Who cooks the meals?
			  </a>
			</h3>
		  </div>
		  <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
			<div class="panel-body px-3 mb-4">
			  <p>All meals are cooked by our qualified home-based chefs, complying regulated food hygiene manners.</p>
			</div>
		  </div>
		</div>
	  </div>

	  <div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading4">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4" style="color: black;">
				Can I pick up my order?</a>
			</h3>
		  </div>
		  <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
			<div class="panel-body px-3 mb-4">
			  <p>No, we deliver the products to your address.</p>
			</div>
		  </div>
		</div>
	  

	   <div class="panel panel-default ">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading5">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5" style="color: black;">
				I didn’t receive what I ordered. What should I do now?
			  </a>
			</h3>
		  </div>
		  <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
			<div class="panel-body px-3 mb-4">
			  <p>Please contact our Customer Service team (Email: info.foodmood.com.au, Tel: +61426975578), weekdays 8am-6pm, if there are any problems with your order. We’ll be happy to help.</p>
			</div>
		  </div>
		</div>

	   <div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading6">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse3" style="color: black;">
				What if my order does not arrive in time?


			  </a>
			</h3>
		  </div>
		  <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
			<div class="panel-body px-3 mb-4">
			  <p>Please contact our Customer Service team (Email: info.foodmood.com.au, Tel: +61426975578), weekdays 8am-6pm, if your order has not arrived so that we can assist you. Please note that delivery times are 9am-8pm.
			</p>
			</div>
		  </div>
		</div>
	 

	   <div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading7">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapse7" style="color: black;">
				How do I become a home-based chef?


			  </a>
			</h3>
		  </div>
		  <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
			<div class="panel-body px-3 mb-4">
			  <p>Fill out the form provided in the “Become a chef” tab, our staff will check your details from the form first, then you will receive an email about more detailed stages of becoming a home-based chef if you are qualified enough. 
			</p>
			</div>
		  </div>
		</div>
	  

	   <div class="panel panel-default">
		  <div class="panel-heading p-3 mb-3" role="tab" id="heading8">
			<h3 class="panel-title">
			  <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="true" aria-controls="collapse8" style="color: black;">
				Can I place Catering and regular order at the same time?

			  </a>
			</h3>
		  </div>
		  <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
			<div class="panel-body px-3 mb-4">
			  <p>No, catering and regular order are processed differently. You need to make a different order for such circumstances.</p>
			</div>
		  </div>
		</div>
	  </div>
	 
  
  </div>
</section>

@endsection
