<!DOCTYPE html>
<html>
<head>
	<title>Currency Converter App</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

	<section>
		
		<div class="text-center mt-5">
			
			<h2>Currency Converter App</h2>

		</div>


		<div class="mt-5">
			
			<div class="offset-md-4 col-md-4 offset-md-4 border border-dark p-5 bg-white">

				<div class="error-div">
					
					@if(Session::has('error'))

                            <div class="alert alert-danger">
                                    
                                 {{Session::get('error')}}
                                    
                            </div>

                    @endif

                    @if($errors->any())
                        <div class="alert alert danger">
                            <ul>
                                @foreach($errors->all() as $error)

                                	<div class="alert alert-danger">
                                		
                                   		 <li>{{ $error }}</li>

                                	</div>

                                @endforeach
                            </ul>
                        </div>
                    @endif

				</div>
				
				<form method="POST" action="{{url('/save')}}">

					@csrf

					<div class="form-group mt-5">
					    <label for="exampleInputEmail1" class="font-weight-bold">Email address</label>
					    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
					    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>

					<div class="form-group">
					    <label for="exampleInputPassword1" class="font-weight-bold">Amount (USD)</label>
					    <input type="number" class="form-control" id="exampleInputPassword1" name="amount" placeholder="How much do you want to change.." value="{{old('amount')}}">
					</div>
					
					<div class="form-group">
					    <label for="exampleFormControlSelect1" class="font-weight-bold"> Payment Currency</label>
					    <select class="form-control" id="mycurrency" name="currency" onchange="myFunction()">
					      <option value="NGN">NGN</option>
					      <option value="KES">KES</option>
					      <option value="GHS">GHS</option>
					      <option value="EUR">EUR</option>
					      <option value="GBP">GBP</option>
					      <option value="USD">USD</option>
					    </select>
					</div>

					<div class="form-group">
					    <label for="exampleInputPassword1" class="font-weight-bold">Amount Due To Pay</label>
					    <input type="number" class="form-control" id="exampleInputPassword1" name="amount" placeholder="How much do you want to change.." value="200000" readonly="">
					</div>

					<button type="submit" class="btn btn-primary">Pay Now</button>
				</form>

			</div>

		</div>
	</section>





<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>