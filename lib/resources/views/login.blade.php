<!DOCTYPE html>
<html lang="en">
<head>
	<base href="{{asset('public/layout/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>

	<!-- Global stylesheets -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="global_assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="assets/js/app.js"></script>
	<script src="global_assets/js/demo_pages/dashboard.js"></script>
	<!-- /theme JS files -->
	<style>
		 body {
            margin: 0;
            font: normal 75% Arial, Helvetica, sans-serif;
            }
            canvas {
            display: block;
            vertical-align: bottom;
            }
            /* ---- particles.js container ---- */
            #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
               background-image: linear-gradient(293deg, #1f65db 0%, #627cd9 100%);
                background-image: linear-gradient(293deg, #005df9 0%, #627cd9a6 100%);
            }
            .content-wrapper{
                margin:auto;
                position:absolute;
                top:0;
                right:0;
                bottom:0;
                left:0;
            }
        .alert-dismissible{padding-right:0px;}
        .alert-dismissible .close{top: -15px; right: -15px;}
        .form-group-feedback{width:100%;}
        h1{font-size:20px;}
		
	</style>

</head>

<body>
	<!-- Page content -->
	<div class="page-content">
  <div class="app" id="particles-js">
    <!-- Main content -->
<div class="content-wrapper">

<!-- Content area -->
<div class="content d-flex justify-content-center align-items-center">

  <!-- Login form -->
  <form class="login-form wmin-sm-400" method="POST" action="">
  	@include('errors.note')
  <input type="hidden" name="_token" value="XBlJH5GN4ajMlBJAOevKY5IYPIlgyTiW0nZCWrCp">    <div class="card mb-0">
      <div class="tab-content card-body">
        <div class="tab-pane fade show active" id="login-tab1">
          <div class="text-center mb-3">
            <h5 class="mb-0">ĐĂNG NHẬP</h5>
          </div>
                    
          <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" name="email" class="form-control " placeholder="email" value="{{old('email')}}">
            <div class="form-control-feedback">
              <i class="icon-user text-muted"></i>
            </div>
                      </div>

          <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="password" name="password" class="form-control " placeholder="Mật khẩu">
            <div class="form-control-feedback">
              <i class="icon-lock2 text-muted"></i>
            </div>
                      </div>

          <div class="form-group d-flex align-items-center">
            <div class="form-check mb-0">
              <label class="form-check-label">
                <div class="uniform-checker" id="uniform-remember"><span class="checked"><input type="checkbox" name="remember" id="remember" class="form-input-styled" checked="" data-fouc="" value="Remember Me"></span></div>
                Ghi nhớ mật khẩu
              </label>
            </div>

            <a href="login_password_recover.html" class="ml-auto">Quên mật khẩu?</a>
          </div>

          <div class="form-group mt-4">
          <button type="submit" class="btn btn-primary">ĐĂNG NHẬP <i class="icon-circle-right2 ml-2"></i></button>
          </div>
        </div>
      </div>
    </div>
    {{csrf_field()}}
  </form>
  <!-- /login form -->

</div>
<!-- /content area -->

</div>
<!-- /main content -->

  <canvas class="particles-js-canvas-el" width="1903" height="310" style="width: 100%; height: 100%;"></canvas></div>        
		
	</div>
    </div>
   
</body>
</html>
