<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #415645;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 32px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #000000;
  font-size: 12px;
}
.form .message a {
  color: #0000ff;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #696969; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #696969, #8DC26F);
  background: -moz-linear-gradient(right, #696969, #8DC26F);
  background: -o-linear-gradient(right, #696969, #8DC26F);
  background: linear-gradient(to left, #696969, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

</style>
<!doctype html>
<html lang="en">
<head>

</head>
<title>Login</title>
<body>

<div class="login-page">
  <div class="form">
    {{ Form::open(array('url'=>'admin_login','class' => 'login-form')) }}
    @if(Session::has('error'))
	<div class="alert-box success">
 	 <h2>{{ Session::get('error') }}</h2>
	</div>
    @endif
	<div class="controls">
	 {{ Form::label('username', 'Username',array('style'=>'float:left;')) }}
	{{ Form::text('username','',array('id'=>'','class'=>'form-control span6','placeholder' => 'UserName','id' => 'username')) }}
	<p class="errors">{{$errors->first('email')}}</p>
	</div>
	<div class="controls">
	 {{ Form::label('password', 'Enter Password',array('style'=>'float:left;')) }}
	{{ Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Password','id' => 'password')) }}
	<p class="errors">{{$errors->first('password')}}</p>
	</div>
      <button>Login</button>
      <p class="message">Not registered? <a href="register">Create an account</a></p>
    {{ Form::close() }}
  </div>
</div>

</body>
</html>



