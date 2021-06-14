@extends ('frontend.layout')
@section('content')



 <div class="container">
    <div class="col-12">
     <h2 class="contact-title ">Become a Chef?</h2>
    </div>
    <div class="row">
       
          <div class="col-lg-8 col-md-8">

                        <form class="form-contact contact_form" action="{{route('become.chef')}}" method="post" >
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Why do you want to be a chef??'" placeholder=" Why do you want to be a chef??"></textarea>
                                        @error('message')
                    					<span style="color: red">{{ $message }}</span>
                    					@enderror
                                    </div>
                                </div>

                                @guest
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                        @error('name')
                    					<span style="color: red">{{ $message }}</span>
                    					@enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid" name="phone" id="phone" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Phone Number'" placeholder="Enter your Phone Number">
                                        @error('phone')
                    					<span style="color: red">{{ $message }}</span>
                    					@enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                        @error('email')
                    					<span style="color: red">{{ $message }}</span>
                    					@enderror
                                    </div>
                                </div>

                                @endguest
                                
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button btn_3 boxed-btn" >Send</button>
                            </div>
                        </form>
                    </div>
                    
        
    </div>
                    
    </div>

@endsection


