<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v9 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{ asset('regform/css/nunito-font.css')}}">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('regform/css/style.css')}}"/>
</head>
<body class="form-v9">
	<div class="page-content">
		<div class="form-v9-content" style="background-image: url('{{ asset('regform/images/form-v9.jpg') }}')";>
            
			<form class="form-detail" action="{{route('seller.register.create')}}" method="post">
				@csrf
                <h2>Seller Registration Form</h2>
				<div class="form-row-total">
					<div class="form-row">
						<input type="text" name="name" id="full-name" class="input-text" placeholder="Your Name">
					</div>
					<div class="form-row">
						<input type="text" name="email" id="your-email" class="input-text" placeholder="Your Email" >
					</div>
				</div>
				<div class="form-row-total">
					<div class="form-row">
						<input type="password" name="pass" id="password" class="input-text" placeholder="Your Password" >
					</div>
					<div class="form-row">
						<input type="password" name="cnfrmpass" id="comfirm-password" class="input-text" placeholder="Comfirm Password" >
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