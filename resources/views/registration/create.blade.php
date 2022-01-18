@extends('layouts.app')
@section('content')

	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/nunito.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/regstyle.css')}}"/>
	<div class="page-content">
		<div class="form-v9-content" style="overflow: hidden; position: relative;">
			<form class="form-detail" action="{{ route('registrations.store')}}" method="post">
                @csrf
				<h3 class="pb-2" style="color:red;text-align:center; ">Registration</h3>
				<div class="form-row-total">
					<div class="form-row">
						<input type="text" name="name" id="full-name" class="input-text" placeholder="Your Name" required>
					</div>
					<div class="form-row">
						<input type="number" name="number" id="your-email" class="input-text" placeholder="Your Number" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					</div>
				</div>
                <div class="form-row-total">
					<div class="form-row">
						<input type="email" name="email" id="full-name" class="input-text" placeholder="Your Email" required>
					</div>
                   </div>  
                   <div class="form-row-total">
					<div class="form-row mb-5">
                            <label for="category">Select Category</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="" style="display: none" selected>Select Category</option>
                                @foreach($categories as $c)
                                <option value="{{ $c->id }}"> {{ $c->name }} </option>
                                @endforeach
                            </select>
                  </div>
                  <div class="form-row mb-5">
                            <label for="category">Select District</label>
                            <select name="district_id" id="category" class="form-control">
                                <option value="" style="display: none" selected>Select Category</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->id }}"> {{ $district->name }} </option>
                                @endforeach
                            </select>
                  </div>
				</div>
				<div class="form-row-total">
					<div class="form-row">
						<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="form-row">
						<input type="password" name="password_confirmation" id="comfirm-password" class="input-text" placeholder="Comfirm Password" required>
					</div>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div>
			</form>
		</div>
	</div>
</body>
</html>
@endsection