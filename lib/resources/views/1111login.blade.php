<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
   <base href="{{asset('public/layout/frontend/assets/')}}/"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ninja Zalo</title>

  <!-- Global stylesheets -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="css_js_login/styles.css" rel="stylesheet" type="text/css">
  <link href="css_js_login/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css_js_login/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
  <link href="css_js_login/layout.min.css" rel="stylesheet" type="text/css">
  <link href="css_js_login/components.min.css" rel="stylesheet" type="text/css">
  <link href="css_js_login/colors.min.css" rel="stylesheet" type="text/css">

   <link rel="shortcut icon" href="img/icon.png" />

  <!-- /global stylesheets -->
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
    
    <!--content---->

        <!-- Main content -->
<div class="content-wrapper">

<!-- Content area -->
<div class="content d-flex justify-content-center align-items-center">

  <!-- Login form -->
  <form class="login-form wmin-sm-400" method="POST" action="">
  @include('errors.note')
    <div class="card mb-0">
      <div class="tab-content card-body">
        <div class="tab-pane fade show active" id="login-tab1">
          <div class="text-center mb-3">
            <img src="css_js_login/logoninja.png" class="img-fluid">
            <h5 class="mb-0">ĐĂNG NHẬP</h5>
          </div>
                  
          <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
            <div class="form-control-feedback">
              <i class="fa fa-user" style="font-size: 17px; color: grey;" aria-hidden="true"></i>
            </div>
           
            
          </div>

          <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
            <div class="form-control-feedback">
             <i class="fa fa-lock"  style="font-size: 17px;color: grey;" aria-hidden="true"></i>
            </div>
           
          </div>

          <div class="form-group d-flex align-items-center">
            <div class="form-check mb-0">
              <label class="form-check-label">
                <input type="checkbox" name="remember" id="remember"  class="form-input-styled">
                Ghi nhớ mật khẩu
              </label>
            </div>

            <a href="login_password_recover.html" class="ml-auto d-none">Quên mật khẩu?</a>
          </div>

          <div class="form-group mt-4">
          <button type="submit" class="btn btn-primary">ĐĂNG NHẬP <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
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
    <!--content---->
  </div>        
    
  </div>
  <!-- /page content -->
<!-- Core JS files -->
<script src="css_js_login/jquery.min.js"></script>
  <script src="css_js_login/bootstrap.bundle.min.js"></script>
  <script src="css_js_login/blockui.min.js" ></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script src="css_js_login/uniform.min.js"></script>

  <!-- <script src="https://app2.phanmemninja.com/assets/js/app.js" ></script> -->

  <script src="css_js_login/particles.js" ></script>
  <script src="css_js_login/login.js" ></script>
  <!-- /theme JS files -->
</body>
</html>
