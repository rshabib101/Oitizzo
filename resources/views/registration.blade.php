@extends('layouts.app')
@section('content')

	<link rel="stylesheet" type="text/css" href="assets/css/nunito.css">
    <link rel="stylesheet" href="assets/css/regstyle.css"/>
	<div class="page-content">
		<div class="form-v9-content" style="overflow: hidden; position: relative; background-image:url('img/1.jpg')">
			<form class="form-detail" action="#" method="post">
				<h2>Registration</h2>
				<div class="form-row-total">
					<div class="form-row">
						<input type="text" name="full-name" id="full-name" class="input-text" placeholder="Your Name" required>
					</div>
					<div class="form-row">
						<input type="text" name="your-email" id="your-email" class="input-text" placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					</div>
				</div>
				<div class="form-row-total">
					<div class="form-row">
						<input type="password" name="password" id="password" class="input-text" placeholder="Your Password" required>
					</div>
					<div class="form-row">
						<input type="password" name="comfirm-password" id="comfirm-password" class="input-text" placeholder="Comfirm Password" required>
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