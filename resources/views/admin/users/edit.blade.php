@extends('adminlte::page')

@section('content')
    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Account</h3>
            </div>

            <form method="POST" action="{{route('users.update',$user)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="first_name">First Name <span class="required-form">*</span></label>
                        <input type="text"
                               class="form-control @error('first_name') is-invalid @enderror"
                               name="first_name"
                               id="first_name"
                               placeholder="Enter Your First Name"
                               value="{{ $user->first_name}}"
                               autofocus
                               required
                        >
                        @error('first_name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">Last Name <span class="required-form">*</span></label>
                        <input type="text"
                               class="form-control @error('last_name') is-invalid @enderror"
                               name="last_name"
                               id="last_name"
                               placeholder="Enter Your Last Name"
                               value="{{ $user->last_name }}"
                               autofocus
                               required
                        >
                        @error('last_name')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email <span class="required-form">*</span></label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               id="email"
                               placeholder="Enter Your Email"
                               value="{{ $user->email }}"
                               required
                        >
                        @error('email')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone <span class="required-form">*</span></label>
                        <input type="text"
                               class="form-control @error('phone') is-invalid @enderror"
                               name="phone"
                               id="phone"
                               placeholder="Enter Your Phone"
                               value="{{ $user->phone }}"
                               autofocus
                               required
                        >
                        @error('phone')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password <span class="required-form">*</span></label>
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               id="password"
                               placeholder="Enter Your Password"
                               required
                               minlength="8"
                        >
                        @error('password')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation <span class="required-form">*</span></label>
                        <input type="password"
                               class="form-control @error('password_confirmation') is-invalid @enderror"
                               name="password_confirmation"
                               id="password_confirmation"
                               placeholder="Enter Your Password again"
                               required
                               minlength="8"
                        >
                        @error('password_confirmation')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    @if(auth()->user()->isAdmin())
                    <div class="form-group">
                        <label for="role">Assign Role <span class="required-form">*</span></label>
                        <select name="role" id="role" class="form-control select2 @error('role') is-invalid @enderror"
                                required>
                            <option value="">Select</option>
                            <option value="1"
                                    @if($user->role == 1) selected @endif >Admin
                            </option>
                            <option value="2"
                                    @if($user->role  == 2) selected @endif >Staff
                            </option>
                            <option value="3"
                                    @if($user->role == 3) selected @endif >Chef
                            </option>

                        </select>
                        @error('role')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status <span class="required-form">*</span></label>
                        <select name="status" id="status"
                                class="form-control select2 @error('status') is-invalid @enderror"
                                required>
                            <option value="">Select</option>
                            <option value="1"
                                    @if($user->status == 1) selected @endif >Active
                            </option>
                            <option value="0"
                                    @if($user->status  == 0) selected @endif >Deactive


                        </select>
                        @error('status')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    @endif
                </div>
                

                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    </div>
@endsection
