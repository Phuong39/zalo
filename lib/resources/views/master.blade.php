<!DOCTYPE html>
<html lang="en">
<head>
	<?php header('Access-Control-Allow-Origin: *'); ?>
	<base href="http://localhost/git/v2/tool_zalo/public/layout/frontend/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link rel="shortcut icon" href="assets/img/icon.png" />

	<link href="https://zalo.phanmemninja.com/theme/default/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="https://zalo.phanmemninja.com/theme/default/css/emojionearea.min.css">
	<script src="assets/js/emojione.min.js"></script>
	<link href="assets/css/foundation-datepicker.min.css" rel="stylesheet">



	<!-- /global stylesheets -->

<style>
	.postPreviewDetails {
    margin: 5px 0px;
    display: block;
    color: #9197a3;
    font-size: 12px;
}

.svg-icon {
    display: inline-block;
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    vertical-align: middle;
}
.colorBonus{
   background-color: #0f8cf7;
}
</style>


</head>

<body>
<div class="loader-zalo" style="display: none; position: fixed; width: -webkit-fill-available; height: -webkit-fill-available; background: rgba(34, 45, 50, 0.42); z-index: 1111;">
                  <div class="img-load" style="
                    text-align: center;
                ">
                    {{-- <img src="https://zalo.phanmemninja.com/theme/default/images/loading1.gif" style="padding-top: 200px;"> --}}
                    <img src="assets/img/unnamed.gif" style="padding-top: 200px;">
                    <h2 style="color: #FFFF;" class="contentloader"></h2>
                  </div>
                </div>
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-light" style="background-color: #4267b2; height: 56px;">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center" style="background-color: #4267b2; border-right: 1px solid rgba(255,255,255,.1);">
			<div class="navbar-brand navbar-brand-md">
				<a href="{{ asset('/home') }}" class="d-inline-block">
					<img src="https://zalo.phanmemninja.com/theme/default/images/kp_logo.png?v=kp20180403.png" alt="" style="width: 195px; height: 70px !important;">
				</a>
			</div>

			<div class="navbar-brand navbar-brand-xs">
				<a href="{{ asset('/home') }}" class="d-inline-block">
					<img src="https://quanlyinbox.com/admin_default/images/kp_logo_50.png" alt="" style="height: 2rem;">
				</a>
			</div>
		</div>
		<!-- /header with logos -->


		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="{{ asset('/home') }}" class="d-inline-block">
					<img src="https://zalo.phanmemninja.com/theme/default/images/kp_logo.png?v=kp20180403.png" alt="" style="height: 50px !important; width: 150px;">
				</a>
			</div>

			{{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button> --}}

			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3" style="color: #FFFF;"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3" style="color:#FFFF;"></i>
					</a>
					{{-- <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<span class="logo" style="
						    background-size: cover;
						    width: 175px;
						    height: 37px;
						    text-indent: -9999px;
						    /* margin: 0px 0px 0; */
						    margin-bottom: 12px;
						    display: block;
						    float: left;
						    background: url(assets/login/images/logo_main_1x.png) 0 0 no-repeat;
						    color: #FFFF;
						">Official Account</span>
					</a> --}}
				</li>
			</ul>

			<span class="mr-md-auto">
			{{-- 	<a class="logo" href="{{ url("") }}" style="
			    background-size: cover;
			    width: 175px;
			    height: 37px;
			    text-indent: -9999px;
			    margin: 9px 20px 0;
			    display: block;
			    float: left;
			    background: url(http://localhost/zalovs3/public/layout/frontend/assets/login/images/logo_main_1x.png) 0 0 no-repeat;
			    color: #FFFF;
			">Official Account</a> --}}
			</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                    <i class="icon-bell2" style="color: #FFF;"></i>
                    <span class="d-md-none ml-2">Messages</span>
                    <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">0</span>
                </a>

				</li>

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="assets/img/zaloUser.jpg" class="rounded-circle" alt="">
						<span style="color: #FFF;">{{Auth::user()->email}}</span>
						{{ csrf_field() }}
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Cấu hình</a>
						<a href="{{asset('logout')}}" class="dropdown-item"><i class="icon-switch2"></i> Đăng xuất</a>
					</div>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->

	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">
        
		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">
<style>
	.style_icon{
		font-size: large;
	}
</style>

				<!-- Main navigation -->
				<div class="card card-sidebar-mobile {{-- example-1 square scrollbar-dusty-grass square thin --}}">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Layout -->

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý tài khoản</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">

								<li class="nav-item"><a href="{{ asset('home') }}" class="nav-link"><i class="icon-vcard style_icon"></i><span>Tài khoản zalo</span></a></li>

								<li class="nav-item"><a href="{{ asset('home\categories') }}" class="nav-link"><i class="icon-clipboard3 style_icon"></i><span>Danh mục tài khoản</span></a></li>

						</li>

						{{-- <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý bài viết</div> <i class="icon-menu" title="Layout options"></i></li>

								<li class="nav-item"><a href="{{asset('posts/list_posts')}}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh sách bài viết</span></a></li>

								<li class="nav-item"><a href="{{asset('posts/category')}}" class="nav-link"><i class="fa fa-calendar"></i><span>Danh mục bài viết</span></a></li>
						</li> --}}

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý Chat</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-bubbles2 style_icon"></i><span>Live chat</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="{{ asset('chat/chatprofile') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Chat profile</span></a></li>

								<li class="nav-item"><a href="{{ asset('chat/chatoa') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Chat OA</span></a></li>

							</ul>
						</li>
                         <li class="nav-item">
							<a href="{{asset('chatbot')}}" class="nav-link"><i class="icon-bubble2 style_icon"></i><span>Chatbot</span></a>

						</li>


                        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý Đăng bài</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">

								<li class="nav-item"><a href="{{ asset('posts/createpost') }}" class="nav-link"><i class="icon-pencil5 style_icon"></i><span>Thêm bài viết</span></a></li>
								 <li class="nav-item"><a href="{{asset('posts/list_posts')}}" class="nav-link"><i class="icon-book style_icon"></i><span>Danh sách bài viết</span></a></li>

								<li class="nav-item"><a href="{{asset('posts/category')}}" class="nav-link"><i class="icon-clipboard3 style_icon"></i><span>Danh mục bài viết</span></a></li>


						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-paperplane style_icon"></i> <span>Đăng bài profile</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="{{ asset('posts/profile') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Đăng bài ngay</span></a></li>

								<li class="nav-item"><a href="{{ asset('profile/Schedulerhistory') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh sách lịch đăng</span></a></li>
								<li class="nav-item"><a href="{{ asset('profile/history') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lịch sử đăng bài</span></a></li>
							</ul>
						</li>

						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-paperplane style_icon"></i> <span>Đăng bài OA</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="{{ asset('posts/send_post_oa') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Đăng bài ngay</span></a></li>

								<li class="nav-item"><a href="{{ asset('official/Schedulerhistory') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh sách lịch đăng</span></a></li>
								<li class="nav-item"><a href="{{ asset('official/history') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lịch sử đăng bài</span></a></li>
							</ul>
						</li>

						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-paperplane style_icon"></i> <span>Đăng bài lên Fanpage</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="{{ asset('/postfb') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Cấu hình đăng</span></a></li>

								<li class="nav-item"><a href="{{ asset('/postfb/scheduler') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lập lịch đăng</span></a></li>
								<li class="nav-item"><a href="{{ asset('/postfb/history') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lịch sử đăng</span></a></li>
							</ul>
						</li>

						
                         {{--  note lại ngày 25/9/2020 chuyển sang danh mục Bonus --}}
						 {{--  <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý kết bạn</div> <i class="icon-menu" title="Layout options"></i></li> --}}
						{{-- <li class="nav-item nav-item-submenu">
							<li class="nav-item"><a href="{{asset('addfriend')}}" class="nav-link"><i class="icon-user-plus mr-3 style_icon"></i> <span>Kết bạn theo số điện thoại</span></a></li>
							<li class="nav-item"><a href="{{asset('addfriend/friendinvitation')}}" class="nav-link"><i class="icon-user-plus mr-3 style_icon"></i> <span>Gợi ý kết bạn</span></a></li>
							
							<li class="nav-item"><a href="{{asset('addfriend/log')}}"  class="nav-link"><i class="icon-stack-text mr-3 style_icon"></i> <span>Lịch sử kết bạn</span></a></li>
							<li class="nav-item">
							<a href="{{asset('chiendich')}}" class="nav-link"><i class="icon-paperplane mr-3 style_icon"></i> <span>Chiến dịch</span></a></li>

						</li> --}}
						{{--  end note lại ngày 25/9/2020 chuyển sang danh mục Bonus --}}
						{{-- <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý nhóm</div> <i class="icon-menu" title="Layout options"></i></li>

						<li class="nav-item">
							<a href="{{ asset('/group') }}" class="nav-link"><i class="fa fa-users" aria-hidden="true" style="text-align: center"></i> <span>Danh sách nhóm</span></a>

						</li> --}}
						{{-- end note chuyển sang mục tính năng bonus--}}

						{{-- <li class="nav-item"><a data-toggle="modal" data-target="#exampleModal2" class="nav-link"><i class="fa fa-users" aria-hidden="true" style="text-align: center"></i> <span>Mời bạn bè vào nhóm</span></a></li> --}}

						{{-- <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Đăng bài lên nhóm</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">

								<li class="nav-item"><a data-toggle="modal" data-target="#exampleModal2" class="nav-link"><i class="fa fa-clipboard  "></i><span>Đăng bài ngay</span></a></li>
								<li class="nav-item"><a data-toggle="modal" data-target="#exampleModal2" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lập lich đăng</span></a></li>
								<li class="nav-item"><a data-toggle="modal" data-target="#exampleModal2" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lịch sử bài đăng</span></a></li>

							</ul>
						</li> --}}

						{{-- <li class="nav-item"><a data-toggle="modal" data-target="#exampleModal2" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Bình luận và comment nhóm</span></a></li> --}}

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý bán hàng</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Shop zalo</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="{{ asset('shop/product') }}" class="nav-link"><i class="fa fa-clipboard  "></i>Sản phẩm</a></li>
								<li class="nav-item"><a href="{{ asset('shop/category') }}" class="nav-link"><i class="fa fa-clipboard  "></i>Danh mục</a></li>
								<li class="nav-item"><a  href="{{ asset('shop/attribute') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Thuộc tính</span></a></li>

							</ul>
						</li>
						<li class="nav-item">
							<a href="{{ asset('/order') }}" class="nav-link"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>Đơn hàng</span></a>

						</li>

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Tiện ích</div> <i class="icon-menu" title="Layout options"></i></li>
                         
                         @if(Auth::user()->status != 1)
						<li class="nav-item">
							<a href="{{asset('role/')}}" class="nav-link"><i class="fa fa-user-plus"></i> <span>Thêm & quản lý nhân viên</span></a>

						</li>

						<li class="nav-item">
							<a href="{{asset('setting/')}}" class="nav-link"><i class="icon-cogs"></i> <span>Setting</span></a>

						</li>


						<li class="nav-item">
							<a href="{{asset('thong_ke/statistical')}}" class="nav-link"><i class="fa fa-bar-chart"></i> <span>Thống kê</span></a>

						</li>
						@endif
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Tính năng Bonus</div> <i class="icon-menu" title="Layout options"></i></li>
						
						<li class="nav-item nav-item-submenu">
							<li class="nav-item colorBonus"><a href="{{asset('addfriend')}}" class="nav-link" title="Kết bạn theo số điện thoại"><i class="icon-user-plus  style_icon"></i> <span>Kết bạn theo số điện thoại</span></a></li>
							<li class="nav-item colorBonus"><a href="{{asset('addfriend/friendinvitation')}}" class="nav-link" title="Giợi ý kết bạn"><i class="icon-user-plus style_icon"></i> <span>Gợi ý kết bạn</span></a></li>
							<li class="nav-item colorBonus"><a href="{{asset('addfriend/log')}}"  class="nav-link" title="Lịch sử kết bạn"><i class="icon-stack-text style_icon"></i> <span>Lịch sử kết bạn</span></a></li>
							<li class="nav-item colorBonus">
							  <a href="{{asset('chiendich')}}" class="nav-link" title="Chiến dịch"><i class="icon-paperplane style_icon"></i> <span>Chiến dịch</span></a></li>
							<li class="nav-item colorBonus">
							  <a href="{{ asset('/group') }}" class="nav-link" title="Danh sách nhóm"><i class="fa fa-users" aria-hidden="true" style="text-align: center"></i> <span>Danh sách nhóm</span></a>
						    </li>

						</li>
						<!-- /layout -->

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">
         <div class="alerts" style="display: none;">
         	<div class="alert alert-danger" role="alert">

         	</div>
         	</div>

			<!-- Content area -->
			@yield('main')
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2019 - 2020. <a href="#">Ninjateam</a> by <a href="#" target="_blank">Phần mềm ninja</a>
					</span>


				</div>
			</div>

			
			<!-- /footer -->

		</div>
            <!-- Modal -->
{{-- <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tính năng này đang được cập nhật, bạn vui lòng quay lại sau !!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary fr" data-dismiss="modal">Ok</button>
        
      </div>
    </div>
  </div>
</div> --}}
		<!-- /main content -->

	</div>

	<!-- /page content -->
		<!-- Core JS files -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
{{-- <script src="https://sv1.phanmemninja.com/socket.io/socket.io.js"></script> --}}

	<script src="https://zalo.phanmemninja.com/vendor/elfinder/themes/js/jquery-ui.min.js"></script>

	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script> --}}

    

	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
     <!--js zalo.phanmemninja-->
     <script src="https://zalo.phanmemninja.com/theme/default/js/dropdown.js"></script>

	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="assets/js/uniform.min.js"></script>
	{{-- <script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script> --}}
	<script src="assets/js/typeahead.bundle.min.js"></script>
	<script src="global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="global_assets/js/plugins/pickers/anytime.min.js"></script>
	<script src="global_assets/js/plugins/pickers/pickadate/picker.js"></script>

	<script src="https://app2.phanmemninja.com/assets/js/plugins/datetime/foundation-datepicker.js"></script>
	<script src="https://app2.phanmemninja.com/assets/js/plugins/datetime/foundation-datepicker.vi.js"></script>

	<script src="global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script src="global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>


	<script src="https://zalo.phanmemninja.com/theme/default/js/libs/emojionearea.min.js"></script>
	<script src="https://zalo.phanmemninja.com/theme/default/js/postpreview.js"></script>
	{{-- <script src="https://zalo.phanmemninja.com/theme/default/js/libs/bootstrap-datetimepicker.min.js"></script> --}}
	{{-- testjs --}}
 <script src="https://zalo.phanmemninja.com/theme/default/js/libs/preloader.min.js?v=kp20180403"></script>
{{-- end test js --}}
	<script src="assets/js/app.js"></script>
	<script src="assets/js/form_checkboxes_radios.js"></script>
	<script src="assets/js/1111post.js"></script>
	 <script src="assets/js/helper.js"></script>

	<script src="global_assets/js/demo_pages/dashboard.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
	<!-- /theme JS files -->
	<script src="assets/js/picker_date.js"></script>
	<script src="https://unpkg.com/localforage@1.7.3/dist/localforage.min.js"></script>

   <script>
   

function reloadpopup(){
	
    window.location.reload();
}
var options = {iv:CryptoJS.enc.Hex.parse("00000000000000000000000000000000"), mode: CryptoJS.mode.CBC, padding: CryptoJS.pad.Pkcs7 }; 
 //////////////////////////////////////////////////////////////////////////////////////////////
 ///phần chiến dịch
 $('#bt-load-actor-send').on('click',function(){

				$('.bt-load-ajax').css('display','inline-block');
				$('#bt-load-client-content').html('');
				$('.allcustomerselected').val('');
				$('.hidden-table').show();
				var check = 0;
				$('#bt-load-actor option:selected').each(function(){
					
					check = 1;
					var data = '{"cookie":"'+$(this).attr('data-cookie')+'","serectkey":"'+$(this).attr('data-env')+'","urlchat":"chiendich","id_profile":"'+$(this).val()+'"}';
					
					socket.emit('gettag',data);
				});
				if (check == 0) {
					alertBox('Vui lòng chọn tài khoản zalo.',"danger",false,true,true);
					return false;
				}
				
			});
        $('.theloaichiendich').change(function(){
               
				var id_profile = $('.checkloadcampselect').val();
				
				var dataselect = $(this).val();
				$('.hidden-table table').hide();
				if (dataselect == 1) {
                     $('.bt-key-search').hide();
                     $('.bt-key-search-mess').hide();
					var tagzalo = JSON.parse(localStorage.getItem("tagzalo"));
					//console.log(tagzalo);
					var html = '';
					$.each(tagzalo[id_profile],function(i,m){
						if (typeof(m.text) !== 'undefined') {
							html += '<tr role="row" class="odd"><td class="sorting_'+(i+1)+'" style="width: 20%;"><input name="client_camp[fanpage:461][]" class="datatag data_client_send" gender_client="undefined" name_client="" type="checkbox" value="'+m.id+'" data-from="fanpage:461" data-profile="'+id_profile+'"></td><td style="width: 40%;">'+m.text+'</td><td style="background: '+m.color+';width: 40%;">'+m.color+'</td></tr>';
						}
					});
					$('#tableClientLoadtag #bt-load-client-content').html(html);
					$('#tableClientLoadtag').show();
				} else if(dataselect == 2){
                     $('.bt-key-search').show(); 
					//var tinnhan = JSON.parse(localStorage.getItem("tinnhan"));
					var tinnhan = JSON.parse(localforage.getItem("tinnhan"));
					//console.log(tinnhan);
					//debugger;
					var html = '';
					$.each(tinnhan,function(i,m){
						var group = 'Nhóm';
						if (m.isgroup == 0) {
							group = 'Profile';
						}
						// console.log(id_profile);
						// console.log(m.id_profile);
						if (id_profile == m.id_profile) {

							html += '<tr role="row" class="odd"><td class="sorting_'+(i+1)+'" style="width: 10%;"><input name="client_camp[fanpage:461][]" class="datamess data_client_send" gender_client="undefined" name_client="'+m.namechat+'" type="checkbox" value="'+m.idhoithoai+'" data-from="fanpage:461"></td><td style="width: 40%;">'+m.namechat+'</td><td style="width: 10%;">'+group+'</td><td style="width: 40%;">'+m.datetime+'</td></tr>';
						}
					});
					$('#tableClientLoadTinnhan #bt-load-client-content').html(html);
					$('#tableClientLoadTinnhan').show();
					// $('#tableClientLoadTinnhan').DataTable({
					//   "ordering": false
					// });
				} else if(dataselect == 3) {
					 $('.bt-key-search').show();
					//var banbe = JSON.parse(localStorage.getItem("listfriend"));
					var banbe = JSON.parse(localforage.getItem("listfriend"));
					// var html = '';
					
					// $.each(banbe[id_profile],function(i,m){
					// 	html += '<tr role="row" class="odd"><td class="sorting_'+(i+1)+'" style="width: 20%;"><input name="client_camp[fanpage:461][]" class="datafriend data_client_send" gender_client="undefined" name_client="'+m.zaloName+'" type="checkbox" value="'+m.userId+'" data-from="fanpage:461" ></td><td style="width: 40%"><img src="'+m.avatar+'"/ style="width: 45px; height: 45px;"></td><td style="width: 40%">'+m.zaloName+'</td></tr>';
					// });
					// $('#tableClientLoadFriend #bt-load-client-content').html(html);
					$('#tableClientLoadFriend').show();
					//get data qua socket
					var cookie =  $('#bt-load-actor .profile_'+id_profile).data('cookie');
					var env =  $('#bt-load-actor .profile_'+id_profile).data('env');
					 var data = '{"cookie":"'+cookie+'","serectkey":"'+env+'","id_profile":"'+id_profile+'"}';
					 socket.emit('getfriendnew',data);

				} else if(dataselect == 4){

					$("#listphone").modal();
				}
			});
	        $('.theloaichiendich2').change(function(){
	        	var id_profile = '';
                $('.selecteProfile').each(function(i, value){
		         	if ($(value).is(':checked')) {
		              id_profile = $(value).val();
		            }
		         });
                if(id_profile == ''){

                	return false;
                }
                var cookie = $('.boxScheduler .zaloid_'+id_profile).data('cookie');
                var env = $('.boxScheduler .zaloid_'+id_profile).data('env');
                var dataselect = $(this).val();
                if(dataselect == 1){
                 var data = '{"cookie":"'+cookie+'","serectkey":"'+env+'","id_profile":"'+id_profile+'"}';
                  socket.emit('gettag',data);
                }else if(dataselect == 3){
                	var data = '{"cookie":"'+cookie+'","serectkey":"'+env+'","id_profile":"'+id_profile+'"}';
                  socket.emit('getfriendnew',data);
                }
                
	        });


             


			function choiceall(el){
						$('.data_client_send').not(el).prop('checked', el.checked);
		    }

             $('.submitsend').on('click',function(){
             	var _token = $('input[name="_token"]').val();
				var tenchiendich = $('.name_camp').val();
				var noidungtinnhan = $('.noidungtinnhan').val();
				var images = $('#linkIMG').val();
				var theloai = $('.theloaichiendich').val();
				var datauser = [];
				var type = 0;
				var cookie = '';
				var serectkey = '';
				var id_profile = '';
				if(imgchiendich != ''){
							var height = 0;
		                 	var width = 0;
		                 	var img = new Image();
		                 	img.src = imgchiendich;
								img.onload = function(){
								   height = img.height;
								   width = img.width;
								
								  
								}
				            var sizeimage = getImageSizeInBytes(imgchiendich);
	                        var url_arr = imgchiendich.split("/");
	                        var filename  = url_arr[url_arr.length-1];
	                        //var width = 0;
	                        //var height = 0;
                             //console.log(sizeimage);
                            var time = new Date().getTime();
                     

				}
                noidungtinnhan = noidungtinnhan.replace(/(?:\r\n|\r|\n)/g, '\\n');
                //noidungtinnhan = nl2br(noidungtinnhan);
				$('#bt-load-actor option:selected').each(function(){
					
					check = 1;
					cookie = $(this).attr('data-cookie');
					serectkey = $(this).attr('data-env');
					id_profile = $(this).val();
					//var data = '{"cookie":"'+$(this).attr('data-cookie')+'","serectkey":"'+$(this).attr('data-env')+'","urlchat":"chiendich","id_profile":"'+$(this).val()+'"}';
					
				});

				if (tenchiendich == '') {
					alertBox('Vui lòng nhập tên chiến dịch.',"ff5e5e",".messageBox",true,true);
					return false;
				}
				if (noidungtinnhan == '' && images == '') {
					alertBox('Vui lòng nhập nội dung tin nhắn hoặc ảnh.',"ff5e5e",".messageBox",true,true);
					return false;
				}

				if (theloai == 1) {
					 $("p").remove(".contentmess");
                     $('.loader-zalo').show();
					var check = 0;
					$('.datatag:checked').each(function(){
						var tagzalo = JSON.parse(localStorage.getItem("tagzalo"));
						//.log(tagzalo);

						var id_profile = $(this).attr('data-profile');
						var id_tag = $(this).val();
						console.log(id_tag);
						$.each(tagzalo[id_profile],function(i,m){
							if (id_tag == m.id) {
								//console.log(m);
								if (m.conversations.length >0 ) {
									for (var j = 0; j < m.conversations.length; j++) {
										datauser.push(m.conversations[j]);
									}
								}
							}
						});
						var data ={};
						//console.log(datauser);
						for (var i = 0; i < datauser.length; i++) {
                              
				        //         var param = '{"id_user":"'+datauser[i]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'"}';

							     // // console.log(param);
			  			    //      socket.emit('sendsms',param);
			  			         var k = 0;
							    setTimeout( function timer(){
							    	
							    	 
							    	 //console.log(datauser[k]);
							    	//  var param = '{"idto":"'+datauser[k]+'","idcl":"'+datauser[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'","id_profile":"'+id_profile+'"}';
								   
								    // socket.emit('sendmesstext',param);

							    //      var param = '{"id_user":"'+datauser[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'"}';
						  			  
						  			// socket.emit('sendsms',param);
						  			var param = '{"idto":"'+datauser[k]+'","idcl":"'+datauser[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'","id_profile":"'+id_profile+'"}';
									//console.log(param);
									socket.emit('sendmesstext',param);
						  			k++;
						  			if(k == datauser.length){
								    	$('.loader-zalo').hide();
								    	var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Gửi tin nhắn theo thẻ tag đã hoàn thành <span style="color:red;">'+k+'/'+datauser.length+'</span>!</p>';
					                
						                $('.contentpoppup').html(html);
						                $('#popupmess').modal('show');
								    }
							    }, i*60000 );
							    var j = 0;
							    setTimeout( function timer(){
							    	var idsend = datauser[j];
							    	var time = new Date().getTime();
                                    var params = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"toid":"'+datauser[j]+'","chunkId":1}';
                                        console.log('params: '+params);
							  			 var encrypted = CryptoJS.AES.encrypt(params, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
                                       
							  			 var datasend  = '{"filename":"'+filename+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","url_image":"'+imgchiendich+'","encrypted:"'+encrypted+'"}';
							  			 var data = {};
				                         data['filename'] = filename;
				                         data['cookie']  = cookie;
				                         data['serectkey'] = serectkey;
				                         data['url_image'] = imgchiendich;
				                         data['encrypted'] = encrypted;
				                         data['_token']  = _token;
                                         
				                       	$.ajax({
				                            url: '{{ url("chat/postimagechiendich") }}',
				                            dataType: 'json',
				                            type: 'post',
				                            contentType: 'application/x-www-form-urlencoded',
				                            data: data,
				                            success: function( data, textStatus, jQxhr ){ 
				                            	    
				                            	
				                                     var content_c ='';
					                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
					                                var result =  JSON.parse(decrypted);

					                              console.log(idsend);
					                               sendimage(result.data.photoId,content_c,idsend,result.data.normalUrl,result.data.thumbUrl,result.data.normalUrl,result.data.hdUrl,cookie,serectkey,id_profile,width,height);
					                               
				                            	
				                               
				                            },
				                            error: function( jqXhr, textStatus, errorThrown ){
				                            },
				                            complete: function(data, textStatus, jQxhr){
				                               
				                            }
				                        });

				                        j++;
							     }, i*60000 );


						}

			// 			if(imgchiendich){
			// 				//kem anh
			//   			     var params = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"toid":"'+datauser[i]+'","chunkId":1}';
                            
			// 	  			 var encrypted = CryptoJS.AES.encrypt(params, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);

			// 	  			 var datasend  = '{"filename":"'+filename+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","url_image":"'+imgchiendich+'","encrypted:"'+encrypted+'"}';
                              
	  //                        data['filename'] = filename;
	  //                        data['cookie']  = cookie;
	  //                        data['serectkey'] = serectkey;
	  //                        data['url_image'] = imgchiendich;
	  //                        data['encrypted'] = encrypted;
	  //                        data['_token']  = _token;
			// 							$.ajax({
			//                             url: '{{ url("chat/postimagechiendich") }}',
			//                             dataType: 'json',
			//                             type: 'post',
			//                             contentType: 'application/x-www-form-urlencoded',
			//                             data: data,
			//                             success: function( data, textStatus, jQxhr ){ 
			//                             	for (var i = 0; i < datauser.length; i++) {
			//                                      var content_c ='';
			// 	                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
			// 	                                var result =  JSON.parse(decrypted);
			// // console.log(result);
				                              
			// 	                               sendimage(result.data.photoId,content_c,datauser[i],result.data.normalUrl,result.data.thumbUrl,result.data.normalUrl,result.data.hdUrl,cookie,serectkey,id_profile,width,height);
			// 	                               i++
			// 	                               if(i < datauser.length){
			// 	                               	$('.loader-zalo').hide();
			//                                     alertBox('Gửi chiến dịch thành công!!',"00a65a",".messageBox",true,true);
			// 	                               }
			//                             	}
			                               
			//                             },
			//                             error: function( jqXhr, textStatus, errorThrown ){
			//                             },
			//                             complete: function(data, textStatus, jQxhr){
			//                                 // $('.bt-all-comment').html(data.responseText);
			//                                 // $('#materialPreloader').hide();
			//                                 // $('.bt-make-input').val('');
			//                             }
			//                         });
			// 					}
						 
						$(this).val();
						check = 1;
					});
					if (check == 0) {
						alertBox('Vui lòng chọn thẻ.',"ff5e5e",false,true,true);
						return false;
					}
				}
				//end the loai 1
				if (theloai == 2) {
					 $("p").remove(".contentmess");
					$('.loader-zalo').show();
					var check = 0;
					$('.datamess:checked').each(function(){
						datauser.push($(this).val());
						check = 1;

					});
					var user = JSON.stringify(datauser);
					var data ={};
					
					   for (var i = 0; i < datauser.length; i++) {
	                           
	                            var k = 0;
							    setTimeout( function timer(){
							    	
							    	 
							    	 //console.log(datauser[k]);
							    //      var param = '{"id_user":"'+datauser[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'"}';
						  			// //console.log(param);
						  			// socket.emit('sendsms',param);

						  			var param = '{"idto":"'+datauser[k]+'","idcl":"'+datauser[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'","id_profile":"'+id_profile+'"}';
									//console.log(param);
									socket.emit('sendmesstext',param);
						  			k++;
						  			if(k == datauser.length){
								    	$('.loader-zalo').hide();
								    	var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Gửi tin tới người đã nhắn tin đã hoàn thành <span style="color:red;">'+k+'/'+datauser.length+'</span>!</p>';
					                
						                $('.contentpoppup').html(html);
						                $('#popupmess').modal('show');
								    }
							    }, i*60000 );
                                var j = 0;
							    setTimeout( function timer(){
							    	var idsend = datauser[j];
							    	var time = new Date().getTime();
                                    var params = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"toid":"'+datauser[j]+'","chunkId":1}';
                                        console.log('params: '+params);
							  			 var encrypted = CryptoJS.AES.encrypt(params, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
                                       
							  			 var datasend  = '{"filename":"'+filename+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","url_image":"'+imgchiendich+'","encrypted:"'+encrypted+'"}';
							  			 var data = {};
				                         data['filename'] = filename;
				                         data['cookie']  = cookie;
				                         data['serectkey'] = serectkey;
				                         data['url_image'] = imgchiendich;
				                         data['encrypted'] = encrypted;
				                         data['_token']  = _token;
                                         
				                       	$.ajax({
				                            url: '{{ url("chat/postimagechiendich") }}',
				                            dataType: 'json',
				                            type: 'post',
				                            contentType: 'application/x-www-form-urlencoded',
				                            data: data,
				                            success: function( data, textStatus, jQxhr ){ 
				                            	    
				                            	
				                                     var content_c ='';
					                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
					                                var result =  JSON.parse(decrypted);

					                              console.log(idsend);
					                               sendimage(result.data.photoId,content_c,idsend,result.data.normalUrl,result.data.thumbUrl,result.data.normalUrl,result.data.hdUrl,cookie,serectkey,id_profile,width,height);
					                               
				                            	
				                               
				                            },
				                            error: function( jqXhr, textStatus, errorThrown ){
				                            },
				                            complete: function(data, textStatus, jQxhr){
				                               
				                            }
				                        });

				                        j++;
							     }, i*60000 );
							
			  			

                       }
                    
                       
					if (check == 0) {
						alertBox('Vui lòng chọn khách hàng nhắn tin.',"ff5e5e",".messageBox",true,true);
						return false;
					}
				}
				//end the loai 2
				if (theloai == 3) {
					 $("p").remove(".contentmess");
					$('.loader-zalo').show();
					var check = 0;
					$('.datafriend:checked').each(function(){
						datauser.push($(this).val());
						check = 1;
					});
					var data ={};
					
					for (var i = 0; i < datauser.length; i++) {

						// var userid= datauser[i];
      //                   //debugger;
			  	// 		 var param = '{"id_user":"'+datauser[i]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'"}';
			  	// 		 socket.emit('sendsms',param);
			  	            var k = 0;
							    setTimeout( function timer(){
							    	
							    	 
							    	 //console.log(datauser[k]);
							    //      var param = '{"id_user":"'+datauser[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'"}';
						  			// //console.log(param);
						  			// socket.emit('sendsms',param);
						  			var param = '{"idto":"'+datauser[k]+'","idcl":"'+datauser[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'","id_profile":"'+id_profile+'"}';
									console.log(param);
									socket.emit('sendmesstext',param);

						  			k++;
						  			if(k == datauser.length){
								    	$('.loader-zalo').hide();
								    	var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Gửi tin tới bạn bè đã hoàn thành <span style="color:red;">'+k+'/'+datauser.length+'</span>!</p>';
					                
						                $('.contentpoppup').html(html);
						                $('#popupmess').modal('show');
								    }
							    }, i*60000 );
							    var j = 0;
							    setTimeout( function timer(){
							    	var idsend = datauser[j];
							    	var time = new Date().getTime();
                                    var params = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"toid":"'+datauser[j]+'","chunkId":1}';
                                        console.log('params: '+params);
							  			 var encrypted = CryptoJS.AES.encrypt(params, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
                                       
							  			 var datasend  = '{"filename":"'+filename+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","url_image":"'+imgchiendich+'","encrypted:"'+encrypted+'"}';
							  			 var data = {};
				                         data['filename'] = filename;
				                         data['cookie']  = cookie;
				                         data['serectkey'] = serectkey;
				                         data['url_image'] = imgchiendich;
				                         data['encrypted'] = encrypted;
				                         data['_token']  = _token;
                                         
				                       	$.ajax({
				                            url: '{{ url("chat/postimagechiendich") }}',
				                            dataType: 'json',
				                            type: 'post',
				                            contentType: 'application/x-www-form-urlencoded',
				                            data: data,
				                            success: function( data, textStatus, jQxhr ){ 
				                            	    
				                            	
				                                     var content_c ='';
					                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
					                                var result =  JSON.parse(decrypted);

					                              console.log(idsend);
					                               sendimage(result.data.photoId,content_c,idsend,result.data.normalUrl,result.data.thumbUrl,result.data.normalUrl,result.data.hdUrl,cookie,serectkey,id_profile,width,height);
					                               
				                            	
				                               
				                            },
				                            error: function( jqXhr, textStatus, errorThrown ){
				                            },
				                            complete: function(data, textStatus, jQxhr){
				                               
				                            }
				                        });

				                        j++;
							     }, i*60000 );

			  			
      
                       }
                       
                        
                       //console.log(imgchiendich);
					if (check == 0) {
						alertBox('Vui lòng chọn bạn bè.',"ff5e5e",".messageBox",true,true);
						return false;
					}

				} 
				//end the loai 3
				if (theloai == 4) { 
                     $('.loader-zalo').show();
					datauser =JSON.parse(localStorage.getItem("datacheckphone"));
					//console.log('bat dau: ' + datauser.length);
                    let datacheck = datauser.filter((v,i) => datauser.indexOf(v) === i);
                   // console.log(datacheck.length);
					for (var i = 0; i < datacheck.length; i++) {

						
						 var k = 0;
							    setTimeout( function timer(){


							    //      var param = '{"id_user":"'+datacheck[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'"}';
						  			
						  			// socket.emit('sendsms',param);

						  			var param = '{"idto":"'+datacheck[k]+'","idcl":"'+datacheck[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+noidungtinnhan+'","id_profile":"'+id_profile+'"}';
									console.log(param);
									socket.emit('sendmesstext',param);

						  			k++;
						  			if(k == datauser.length){
								    	$('.loader-zalo').hide();
								    	var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Gửi tin tới số điện thoại đã hoàn thành: <span style="color:red;">'+k+'/'+datauser.length+'</span>!</p>';
					                
						                $('.contentpoppup').html(html);
						                $('#popupmess').modal('show');
								    }
							    }, i*60000 );
							    var j = 0;
							    //console.log(datacheck);
							    setTimeout( function timer(){
							    	var idsend = datacheck[j];
							    	var time = new Date().getTime();
                                    var params = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"toid":"'+datacheck[j]+'","chunkId":1}';
                                        console.log(params);
							  			 var encrypted = CryptoJS.AES.encrypt(params, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
                                       
							  			 var datasend  = '{"filename":"'+filename+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","url_image":"'+imgchiendich+'","encrypted:"'+encrypted+'"}';
							  			 var data = {};
				                         data['filename'] = filename;
				                         data['cookie']  = cookie;
				                         data['serectkey'] = serectkey;
				                         data['url_image'] = imgchiendich;
				                         data['encrypted'] = encrypted;
				                         data['_token']  = _token;
                                         
				                       	$.ajax({
				                            url: '{{ url("chat/postimagechiendich") }}',
				                            dataType: 'json',
				                            type: 'post',
				                            contentType: 'application/x-www-form-urlencoded',
				                            data: data,
				                            success: function( data, textStatus, jQxhr ){ 
				                            	    
				                            	
				                                     var content_c ='';
					                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
					                                var result =  JSON.parse(decrypted);

					                              //console.log(result);
					                               sendimage(result.data.photoId,content_c,idsend,result.data.normalUrl,result.data.thumbUrl,result.data.normalUrl,result.data.hdUrl,cookie,serectkey,id_profile,width,height);
					                               
				                            	
				                               
				                            },
				                            error: function( jqXhr, textStatus, errorThrown ){
				                            },
				                            complete: function(data, textStatus, jQxhr){
				                               
				                            }
				                        });

				                        j++;
							     }, i*60000 );
					}

				}
				//end the loai 4
				
				


             });

		    $('.submitsaveandsend').on('click',function(){
		    	var _token = $('input[name="_token"]').val();
				var tenchiendich = $('.name_camp').val();
				var noidungtinnhan = $('.noidungtinnhan').val();
				var time_send_camp = $('.time-send-camp').val();
				var theloai = $('.theloaichiendich').val();
				var images = $('#linkIMG').val();
				var giogui = $('.chongio').val();
				var datauser = [];
				var type = 0;
				if (tenchiendich == '') {
					alertBox('Vui lòng nhập tên chiến dịch.',"ff5e5e",".messageBox",true,true);
					return false;
				}
				if (noidungtinnhan == '' && images == '') {
					alertBox('Vui lòng nhập nội dung tin nhắn hoặc ảnh.',"ff5e5e",".messageBox",true,true);
					return false;
				}

				if (theloai == 1) {
					var check = 0;
					$('.datatag:checked').each(function(){
						var tagzalo = JSON.parse(localStorage.getItem("tagzalo"));

						var id_profile = $(this).attr('data-profile');
						var id_tag = $(this).val();
						console.log(id_profile);
						$.each(tagzalo[id_profile],function(i,m){
							if (id_tag == m.id) {
								if (m.conversations.length >0 ) {
									for (var j = 0; j < m.conversations.length; j++) {
										datauser.push(m.conversations[j]);
									}
								}
							}
						});
						$(this).val();
						check = 1;
					});
					if (check == 0) {
						alertBox('Vui lòng chọn thẻ.',"ff5e5e",false,true,true);
						return false;
					}
				}
				if (theloai == 2) {
					var check = 0;
					$('.datamess:checked').each(function(){
						datauser.push($(this).val());
						check = 1;
					});
					if (check == 0) {
						alertBox('Vui lòng chọn khách hàng nhắn tin.',"ff5e5e",".messageBox",true,true);
						return false;
					}
				}
				if (theloai == 3) {
					var check = 0;
					$('.datafriend:checked').each(function(){
						datauser.push($(this).val());
						check = 1;
					});
					if (check == 0) {
						alertBox('Vui lòng chọn bạn bè.',"ff5e5e",".messageBox",true,true);
						return false;
					}
				} 
				if (theloai == 4) {
					datauser = listid;
				}
				var params = {};
				params['tenchiendich'] = tenchiendich;
				params['images'] = images;
				params['noidungtinnhan'] = noidungtinnhan;
				params['time_send_camp'] = time_send_camp;
				params['giogui'] = giogui;
				params['id_profile'] = $('.checkloadcampselect').val();
				var id_profile = $('.checkloadcampselect').val();
				var user = JSON.stringify(datauser);
				params['user'] = JSON.stringify(datauser);
				var dataname = [];
				

				if (theloai == 4) {
					type = 1;
					dataname = listidname;
					var res = time_send_camp.split(" To ");
					var date1 = new Date(res[0]); 
					var date2 = new Date(res[1]); 
					  
					// To calculate the time difference of two dates 
					var Difference_In_Time = date2.getTime() - date1.getTime(); 
					  
					// To calculate the no. of days between two dates 
					var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
					if (Difference_In_Days > 0) {
						alertBox('Đối với chiến dịch theo số điện thoại, chúng tôi chỉ cho phép chọn cùng một ngày!',"danger",false,true,true);
						return false;
					}
					
				} else {
					$.each(JSON.parse(localforage.getItem("tinnhan")),function(i,m){
						$.each(datauser,function(j,n){
							if (m.idhoithoai == n) {
								var dtname = {};
								dtname[m.idhoithoai] = m.namechat;
								dataname.push(dtname);
							}
						});
					});
					//var friend = JSON.parse(localStorage.getItem("listfriend"));
					var friend = JSON.parse(localforage.getItem("listfriend"));
					$.each(friend[params['id_profile']],function(i,m){
						$.each(datauser,function(j,n){
							if (m.userId == n) {
								var dtname = {};
								dtname[m.userId] = m.zaloName;
								dataname.push(dtname);
							}
						});
					});
				}
				// console.log(datauser);
				// console.log(unique(dataname));
				// return false;
				params['type'] = type;
				// params['phonelist'] = JSON.stringify(phonelist);
				params['phonelist'] = '';
				params['nameuser'] = JSON.stringify(dataname);
				var nameuser = JSON.stringify(dataname);
				params['_token'] = _token;
				// params['{ config_item('csrf_token_name') }}'] = getCookie('{ config_item('csrf_cookie_name') }}');
				//console.log(params);
				$.ajax({
					url: '{{ url("chiendich/submitsave") }}',
					dataType: 'json',
					type: 'post',
					contentType: 'application/x-www-form-urlencoded',
					// data: {tenchiendich:tenchiendich, images:images, noidungtinnhan:noidungtinnhan, time_send_camp:time_send_camp, giogui:giogui, id_profile:id_profile, user:user, type:type, phonelist:phonelist, nameuser:nameuser,_token:_token},
					data:params,
					success: function( data, textStatus, jQxhr ){
						if (data.code == 401) {
							alertBox(data.mess,"danger",false,true,true);
						} else {

							// alertBox(data.mess,"success",false,true,true);
							alertBox(data.mess,"00a65a",".messageBox",true,true);
						}
					},
					error: function( jqXhr, textStatus, errorThrown ){
					  // $('.table-data').html(jqXhr.responsiveText);
					},
					complete: function(data, textStatus, jQxhr){
						// $('.table-data').html(data.responseText);
						// $('#table-post').DataTable();
						// $('#materialPreloader').hide();
					}
				});
				console.log(datauser);return false;
			});

//////////////
function schedulePostImg(){
     	var tab ="#tabImage";
		    var message = $(tab+' textarea[name="message"]').val();
		    var cateId  = $(tab+ ' select[name="cate_id"]').val();
		    var title  = $(tab+ ' input[name="title"]').val();
		    var mieuta  = $(tab+ ' textarea[name="mieuta"]').val();
		    var tacgia  = $(tab+ ' input[name="tacgia"]').val();
		    var source  = $(tab+ ' input[name="imageURL"]').val();
		    //console.log(source);
		    var type = "image";
		    var link ='';
		    
		    var validate = validateFormImage(tab,title,message,mieuta,cateId,tacgia);
		 groups = [];
		countGroup = 0;
		
		// Get all checked groups
		$('.groupName:visible .fbnode:checked').each(function(){
			groups.push($(this).val());
			countGroup++;
		});

			if(validate == true){
				if(countGroup != 0){
					$('#modal_schedule').modal('show');
				}else{
					alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postImage .messageBox",true,true);
				}
               

			}
     }

 function schedulePostVideo(){
 	var tab ="#tabVideo";

		    var message = $(tab+' textarea[name="message"]').val();
		    var cateId  = $(tab+ ' select[name="cate_id"]').val();
		    var title  = $(tab+ ' input[name="title"]').val();
		    var mieuta  = $(tab+ ' textarea[name="mieuta"]').val();
		    var tacgia  = $(tab+ ' input[name="tacgia"]').val();
		    var file_url  = $(tab+ ' input[name="video_url"]').val();
		    //console.log(file_url);
		    var source = '';
		    //console.log(source);
		    var type = "video";
		    var link ='';
		    
		    var validate = validateFormVideo(tab,title,message,mieuta,cateId,tacgia);
        groups = [];
		countGroup = 0;
		
		// Get all checked groups
		$('.groupName:visible .fbnode:checked').each(function(){
			groups.push($(this).val());
			countGroup++;
		});
		 if(validate == true){
				if(countGroup != 0){
					$('#modal_scheduleVideo').modal('show');
				}else{
					console.log("lkfkjdfhksdjfd");
					alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postVideo .messageBox",true,true);
				}
               

			}
			

 }

 function schedulePostStatus(){

 	var message = $('#tabStatus textarea[name="message"]').val();
		    var cateId  = $('#tabStatus select[name="cate_id"]').val();
		    var post_title  = $('#tabStatus input[name="title"]').val()
		    var tab = "#tabStatus";

			var validate = validateFormStatus(tab,post_title,message,cateId);	
			// Clear groups, groupCount vars
				groups = [];
				countGroup = 0;
				
				// Get all checked groups
				$('.groupName:visible .fbnode:checked').each(function(){
					groups.push($(this).val());
					countGroup++;
				});
				// console.log(validate);
				//  console.log(countGroup);
			if(validate == true){
				if(countGroup != 0){
					$('#modal_scheduleStatus').modal('show');
				}else{
					alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postStatus .messageBox",true,true);
				}
               

			}
 }

 function scheduleLink(){
 	var tab ="#tabLink";
		    var message = $(tab+' textarea[name="message"]').val();
		    var cateId  = $(tab+ ' select[name="cate_id"]').val();
		    var link  = $(tab+ ' input[name="link"]').val();
		    var post_title  = $(tab+ ' input[name="title"]').val();
		    var type = "link";

		    var validate = validateFormLink(tab,post_title,message,link,cateId);
		   groups = [];
		countGroup = 0;
		
		// Get all checked groups
		$('.groupName:visible .fbnode:checked').each(function(){
			groups.push($(this).val());
			countGroup++;
		});
		 if(validate == true){
				if(countGroup != 0){
					$('#modal_scheduleLink').modal('show');
				}else{
					
					alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postStatus .messageBox",true,true);
				}
               

			}

 }
     	// ----------------------- Saving schedule ------------------------ //togglePauseBtn
     	// $(".togglePauseBtn").click(function(){
           

     	// });
function updatestop(el){
	//console.log(el);
   var id=  $(el + ".valuestus").val();
           var status =$(el + '#status').attr('data-value');
           var _token =$('.card-header input[name="_token"]').val();
	           $.ajax({
	            url: '{{ url('posts/updateStop') }}',
	            type: 'post',
	            dataType: 'json',
	            data: {id:id, status:status, _token:_token},
	           
	            success:function(result){
	                if(result.status == 200){
	                	location.reload();
	                     
	                     
	                }else{
	                	
	                }
	            },
	        });
}
	$("#saveScheduledPostImg").click(function(){
	  var tab ="#tabImage";
	  var arr = [];
	   $('input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });
	   var message = $(tab+' textarea[name="message"]').val();
	    message.replace(/(?:\r\n|\r|\n)/g, '\\n');
       var message = message.split('\n');
       var message =  message.filter(function(e){return e});

	  var params = {};
		    params['message'] = message;
		    params['cateId'] = $(tab+ ' select[name="cate_id"]').val();
		    params['title'] = $(tab+ ' input[name="title"]').val();
		    params['mieuta'] = $(tab+ ' textarea[name="mieuta"]').val();
		    params['tacgia'] = $(tab+ ' input[name="tacgia"]').val();
		    params['source'] = $(tab+ ' input[name="imageURL"]').val();

		    params['date_start'] = $('#modal_schedule input[name="time_start"]').val();
		    params['date_end'] = $('#modal_schedule input[name="time_end"]').val();

		    params['_token'] = $('input[name="_token"]').val();
		    params['id_profile'] = arr;
		    params['type'] = 'image';

		     $.ajax({
            url: '{{ url('posts/schedulesadd') }}',
            type: 'post',
            dataType: 'json',
            data: params,
           
            success:function(result){
                if(result.status == 200){
                	 alertBox(result.mess,"00a65a","#message .thongbao",true,true);
                     
                     
                }else{
                	alertBox(result.mess,"f44336","#message .thongbao",true,true);
                }
            },
        });


		    	
		
	});

	$("#saveScheduledPostVideo").click(function(){
	  var tab ="#tabVideo";
	  var arr = [];
	   $('input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });
      var message = $(tab+' textarea[name="message"]').val();
       message.replace(/(?:\r\n|\r|\n)/g, '\\n');
               var message = message.split('\n');
              var message =  message.filter(function(e){return e});
	  var params = {};
		    params['message'] = message;
		    params['cateId'] = $(tab+ ' select[name="cate_id"]').val();
		    params['title'] = $(tab+ ' input[name="title"]').val();
		    params['mieuta'] = $(tab+ ' textarea[name="mieuta"]').val();
		    params['tacgia'] = $(tab+ ' input[name="tacgia"]').val();
		    params['file_url'] = $(tab+ ' input[name="video_url"]').val();

		    params['date_start'] = $('#modal_scheduleVideo input[name="time_start"]').val();
		    params['date_end'] = $('#modal_scheduleVideo input[name="time_end"]').val();

		    params['_token'] = $('input[name="_token"]').val();
		    params['id_profile'] = arr;
		    params['type'] = 'video';

		     $.ajax({
            url: '{{ url('posts/schedulesadd') }}',
            type: 'post',
            dataType: 'json',
            data: params,
           
            success:function(result){
                if(result.status == 200){
                	 alertBox(result.mess,"00a65a","#message .thongbao",true,true);
                     
                     
                }else{
                	alertBox(result.mess,"f44336","#message .thongbao",true,true);
                }
            },
        });


		    	
		
	});



	$("#saveScheduledPostStatus").click(function(){
	  var tab ="#Status";
	  var arr = [];
	   $('input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });

	  var params = {};
		    params['message'] = $('#tabStatus textarea[name="message"]').val();
		    params['cateId']= $('#tabStatus select[name="cate_id"]').val();
		    params['post_title'] = $('#tabStatus input[name="title"]').val(); 
		    var tab = "#tabStatus";

		    params['_token'] = $('input[name="_token"]').val();
		    params['id_profile'] = arr;
		    params['type'] = 'status';
		    params['date_start'] = $('#modal_scheduleStatus input[name="time_start"]').val();
		    params['date_end'] = $('#modal_scheduleStatus input[name="time_end"]').val();

 //console.log(params);
		     $.ajax({
            url: '{{ url('posts/schedulesadd') }}',
            type: 'post',
            dataType: 'json',
            data: params,
           
            success:function(result){
                if(result.status == 200){
                	 alertBox(result.mess,"00a65a","#message .thongbao",true,true);
                     
                     
                }else{
                	alertBox(result.mess,"f44336","#message .thongbao",true,true);
                }
            },
        });


		    	
		
	});

	$("#saveScheduledPostLink").click(function(){
	  var tab ="#tabLink";
	  var arr = [];
	   $('input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });

	  var params = {};
		    params['message'] = $('#tabLink textarea[name="message"]').val();
		    params['cateId']= $('#tabLink select[name="cate_id"]').val();
		    params['post_title'] = $('#tabLink input[name="title"]').val(); 
		    params['link'] = $('#tabLink input[name="link"]').val();
		    var tab = "#tabLink";

		    params['_token'] = $('input[name="_token"]').val();
		    params['id_profile'] = arr;
		    params['type'] = 'link';
		    params['date_start'] = $('#modal_scheduleLink input[name="time_start"]').val();
		    params['date_end'] = $('#modal_scheduleLink input[name="time_end"]').val();

 // console.log(params);
		     $.ajax({
            url: '{{ url('posts/schedulesadd') }}',
            type: 'post',
            dataType: 'json',
            data: params,
           
            success:function(result){
                if(result.status == 200){
                	 alertBox(result.mess,"00a65a","#message .thongbao",true,true);
                     
                     
                }else{
                	alertBox(result.mess,"f44336","#message .thongbao",true,true);
                }
            },
        });


		    	
		
	});


///////
// socket.on('return',function(result){
// 	console.log(result);

// })
 
//----------------------- phần posts/createpost   ---------------------------------    
    $('body').on('click','.bt-open-temp-chat2',function(){      
	// $('.bt-open-temp-chat2').on('click',function(){

		if (!$(this).hasClass('open')) {
			$(this).next('.bt-drop-chattemp').css('display','block');
			$(this).addClass('open');
		} else {
			$(this).next('.bt-drop-chattemp').css('display','none');
			$(this).removeClass('open');
		}
	});

//-- phan pover chatprofile
 $('body').on('click','.bt-open-temp-chat3',function(){  

	// $('.bt-open-temp-chat2').on('click',function(){

		if (!$(this).hasClass('open')) {
			//console.log("dkjfhkdsjghfjdshfhd");
			$(this).next('.popover_chatprofile').css('display','block');
			$(this).addClass('open');
		} else {
			$(this).next('.popover_chatprofile').css('display','none');
			$(this).removeClass('open');
		}
	});

   //--phần status
function validateFormMessage(tab,title,content){
    if(title == ''){
        $(tab+' input[name="title"]').addClass('is-invalid');
        $(tab+' .alert_title').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_title').hide();
    }
    if(content == ''){
        $(tab+' .emojionearea-editor').addClass('is-invalid');
        $(tab+' .alert_content').show();
    }else{
        $(tab+' .emojionearea-editor').removeClass('is-invalid');
        $(tab+' .alert_content').hide();
    }
   

    if(title == '' || content == '')
    {
        return false;
    }
    return true;
}

function getdatamess(id){
	var _token = $('.chat-input__tools__btn input[name="_token"]').val();
  $.ajax({
            url: '{{ url('chat/getdatamess') }}',
            type: 'post',
            dataType: 'json',
            data: {id:id, _token:_token},
           
            success:function(result){
                if(result.status == 200){
                	 $('textarea#sendmessage').val(result.data);
                     
                     
                }
            },
        });

}

function deletemess(id){
    	var _token = $('.chat-input__tools__btn input[name="_token"]').val();
  $.ajax({
            url: '{{ url('chat/deletemess') }}',
            type: 'post',
            dataType: 'json',
            data: {id:id, _token:_token},
           
            success:function(result){
                if(result.status == 200){
                	
                  $("div").remove(".id_"+id);
                     
                }
            },
        });
}

function createmessage()
{
	var tab ="#messagesample";
    let message = document.getElementById("contentmess").innerHTML;
     let title  = $(tab+ ' input[name="title"]').val()
    var _token = $('#messagesample input[name="_token"]').val();
    let validate = validateFormMessage(tab,title,message);
    //console.log(validate);
    if(validate == true){
    	$.ajax({
            url: '{{ url('chat/newmesssample') }}',
            type: 'post',
            dataType: 'json',
            data: {message:message,title:title, _token:_token},
           
            success:function(result){
                if(result.status == 200){
                	
                    $('#messagesample').modal('hide');
                    $('.thongbao').html(result.message);
                    $('.thongbao').show();
                          var html = '';
								html += '<div class="manage-label__item flx flx-al-c id_'+result.id+'" id="id_'+result.id+'">';
								html +=	'<div class="label-sep"></div>';
								
								html +=	'<a href="https://zalov2.phanmemninja.com/chat/chatprofile#" class="manage-label__item__input tinnhanmau" onclick="getdatamess('+result.id+')"><span>'+title+'</span></a>';
								html +=	'<div class="manage-label__item__close ">';
								html +=	'<i class="fa fa-trash btn" style="font-size: 16px;" title="Xóa" onclick="deletemess('+result.id+')"></i>';
								html +=	'</div>';
								html +='</div>';
								$('.boxtinnhanmau').append(html);
     
                }
            },
        });
    }
       
}
function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		            $('.image_1').html('<img src="'+e.target.result+'">');
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#file').click();
		    });
});

function changeImgchiendich(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		            $('.image_1').html('<img src="'+e.target.result+'">');
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#imagechiendich').click();
		    });
});

	function changeImgsendgroup(input){
	    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
	    if(input.files && input.files[0]){
	        var reader = new FileReader();
	        //Sự kiện file đã được load vào website
	        reader.onload = function(e){
	            //Thay đổi đường dẫn ảnh
	            $('#avatar').attr('src',e.target.result);
	            $('.image_1').html('<img src="'+e.target.result+'">');
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$(document).ready(function() {
	    $('#avatar').click(function(){
	        $('#imgsendgroup').click();
	    });
});


function changeImg2(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar2').attr('src',e.target.result);
		            $('.image_1').html('<img src="'+e.target.result+'">');
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
// 		$(document).ready(function() {
// 		    $('#avatar2').click(function(){
// 		        $('#img2').click();
// 		    });
// });   

function changeSendImgOa(input){
	
		     var file = input.files[0];
			    var formData = new FormData($('#fileimage')[0]);
			    //console.log(formData);
			    formData.append('csrf_kingposter', _token);
			     //console.log(file);
			     var _token = $('input[name="_token"]').val(); 
			    var totlsize = file.size;
			            if (totlsize > 512000) {
			                alertBox('Hiện tại chúng tôi chỉ cho phép ảnh dưới 0.5MB',"danger",false,true,true);
			                return false;
			      }

			      $.ajax({
					      url:"{{ route('uploadimage') }}", 
					      method:"POST", 
					      data:formData,
					      contentType: false,
					      processData: false,
					      beforeSend: function() {
					      },
					      success:function(data){
					       var id_fanpage = $('.readding').attr('bt-id-fanpage');
							var id_profile = $('.readding').attr('bt-id-profile');
							var id_commentr = $('.readding').attr('bt-content-id');
							var img = $('.readding .owl-page img').attr('src');
                            var url = data.path;
							if (data.path != '') {
								var html = '';
								html += '<div style="opacity:0.5" class="bt-inbox-item bt-right bt-new-chat">';
								html +=	'<div class="bt-inbox-item-avatar">';
								if (id_fanpage != "") {
									html +=		'<img title="'+img+'" src="'+img+'">';
								}
								if (id_profile != "") {
									html +=		'<img title="" src="'+img+'">';
								}
								html +=	'</div>';
								html +=	'<div class="bt-inbox-item-text">';
								html +=		'<span><img src="'+data.path+'" class="img-responsive"/></span>';
								html +=	'</div>';
								html +='</div>';
								$('.bt-load-inbox-content').append(html);
								$('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
								var params = {};
								params['id_comment'] = id_commentr;
								params['url'] = data.path;
								params['id_fanpage'] = id_fanpage;
								params['id_profile'] = id_profile;
								params['csrf_kingposter'] = _token;
								$.ajax({
									url: '{{ url("chat/sendreplyimage") }}',
									dataType: 'json',
									type: 'post',
									contentType: 'application/x-www-form-urlencoded',
									data: {id_commentr:id_commentr, url:url, id_fanpage:id_fanpage, id_profile:id_profile, _token:_token},
									success: function( data, textStatus, jQxhr ){
									},
									error: function( jqXhr, textStatus, errorThrown ){
									},
									complete: function(data, textStatus, jQxhr){
										$('.bt-new-chat').css('opacity','1');
										$('#materialPreloader').hide();
										// $('.bt-make-input').val('');
									}

								});
							}

											
					     }
					 });
		}


		$(document).ready(function() {
		    $('#imgOA').click(function(){
		        $('#sendImgOA').click();
		    });
});
		function changeSendImgGroup(input){
	
		     var file = input.files[0];
			    var formData = new FormData($('#fileimage')[0]);
			    //console.log(formData);
			    formData.append('csrf_kingposter', _token);
			     //console.log(file);
			     var _token = $('input[name="_token"]').val(); 
			    var totlsize = file.size;
			            if (totlsize > 512000) {
			                alertBox('Hiện tại chúng tôi chỉ cho phép ảnh dưới 0.5MB',"danger",false,true,true);
			                return false;
			      }

			      $.ajax({
					      url:"{{ route('uploadimage') }}", 
					      method:"POST", 
					      data:formData,
					      contentType: false,
					      processData: false,
					      beforeSend: function() {
					      },
					      success:function(data){
					      	console.log(data);
					     //var params ='{"filename":"66533f545b63cf09e47f05d7cede5960.jpg","serectkey":"tiyiJ38l8LQzTQtJ346PtQ==","cookie":"zpw_sek=GfEx.291263581.a0.0-5PDE9Qlmo_3kCTmrg_39buscV0O9ruYoFMHj5YqpIk2yLOioxrFzPixtYpPu8kdprTzFpiuRJWMomVE0I_30","url_image":"https://zalov2.phanmemninja.com/lib/storage/app/hoatv@ninjateam.vn/66533f545b63cf09e47f05d7cede5960.jpg","grid":"318157281548852254","size":"72298"}';
					      

											
					     }
					 });
		}


function activetab(el,id){
        
		$('.nav-item').removeClass('active');
		$(el).addClass('active');
		$('.tab-pane').removeClass('active');
		$('.nav-link').removeClass('active');
		$('.tab-pane').addClass('fade');
		$(''+id+'').removeClass('fade');
		$(''+id+'').addClass('active');
		$('.active .nav-link').addClass('active');

	}

function kp_preloader(status,placeHolder){
    preloader = new $.materialPreloader({placeHolder: placeHolder});
    if(status == "on"){
        preloader.on(placeHolder);
    }else{
        preloader.off(placeHolder);
    }
}
var xhrGetSiteDetails = null;
	function GetSiteDetails(url,callback){
		if(xhrGetSiteDetails!==null) xhrGetSiteDetails.abort();
		xhrGetSiteDetails = $.ajax({
	        url: "{{ url('posts/get_url_info') }}",
	        dataType: "json",
	        type: "get",
	        data: { 
				url: url,
				csrf_kingposter: getCookie('csrf_kingposter_cookie'), 
			},
	        success: callback,
	        error: function(request, status, error) {}
	    });
		
	}



////////////////////////////////////////////////////////////////////////////////////////////// 
//---------------------------------chat OA-------------------------------------------------

function selectPageAndProfile(ob){
	
	$('.bt-chat-mess').hide();
	$('.bt-default-mess').show();
	var that = ob;
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var arr_select = new Array();
	var arr_page = [];
	var check_page = 0;
	var check_profile = 0;
	$('.selectepageprofile').each(function(i, value){
		if ($(value).is(':checked')) {
			check_profile = 1;
			arr_select.push($(value).attr('data-type') + '-' + $(value).val());
		}
	});
	$('.checkallfanpage').each(function(i, value){
		if ($(value).is(':checked')) {
			check_page = 1;
			arr_page.push($(value).val());
		}
	});
	if (check_page == 0) {
		alertBox('Vui lòng chọn Official Account',"f44336",false,true,true);
		return false;
	}
	$('#materialPreloader').show();
	if (check_page == 1) {
		socket.emit('data', arr_page);
		socket.emit('token',  getCookie('csrf_kingposter_cookie'));
	}
	arr_select = JSON.stringify(arr_select);
			// console.log(arr_select); 
			$('.fill-tab').removeClass('active');
			$(this).addClass('active');
			$('.bt-all-comment').css('display','none');
			$('.bt-comment .bt-fix-co4 .bt-loader').css('display','flex'); // Thúy block
			var params = {};
			params['arr_select'] = arr_select;
			// params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
			params['csrf_kingposter'] = '258979ae5b264a3014efa2c4bb816f5e';
			console.log(params);
			$.ajax({
				url: '{{ url("chat/ajaxLoadAllData") }}',
				dataType: 'json',
				type: 'get',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data, textStatus, jQxhr ){

				},
				error: function( jqXhr, textStatus, errorThrown ){
				},
				complete: function(data, textStatus, jQxhr){
					var a = data.responseText;
					//console.log(a);
					$('.bt-comment .bt-fix-co4 .bt-loader').css('display','none');
					$('.bt-all-comment').css('display','block');
					$('.bt-all-comment').html(data.responseText);
					$('#materialPreloader').hide();
					// $('.bt-make-input').val('');
				}
			});
			// $(".dropdown-toggle.nav-fill-tag").trigger("click");
		}

function loadchat(el){
	$('.bt-load-chat').removeClass('readding');
	$(el).parents('.bt-load-chat').addClass('readding');
	$(el).parents('.bt-load-chat').removeClass('chuadoc');
	$('.bt-default-mess').css('display','none');
	$('.bt-chat-mess').css('display','block');
	var bt_id_fanpage = $(el).parents('.bt-load-chat').attr('bt-id-fanpage');
	var bt_id_profile = $(el).parents('.bt-load-chat').attr('bt-id-profile');
	var bt_id_post = $(el).parents('.bt-load-chat').attr('bt-id-post');
	var bt_id_post_first = $(el).parents('.bt-load-chat').attr('bt-id-post-first');
	var last_message = $(el).parents('.bt-load-chat').attr('bt-content-chat');
	var id_user = $(el).parents('.bt-load-chat').attr('bt-content-id');
	var name_user = $(el).parents('.bt-load-chat').find('.bt-content-chat .bt-name-chat').text();
	$('.bt-avatar-user>img').attr('src','https://graph.facebook.com/'+id_user+'/picture?height=100&width=100');
	$('.bt-name-user .bt-first').html(name_user);
	$('.bt-name-user .bt-last').html(id_user);
	if ($(el).parents('.bt-load-chat').attr('bt-type') == 'comment') {
		$('.bt-get-link-post').attr('href','https://facebook.com/'+bt_id_post_first);
		$.ajax({
			'url':'http://localhost/Ninjafanpage/public/ajaxgetinboxid',
			'data': 'id_post='+bt_id_post+'&last_message='+last_message+'&id_user='+id_user+'&bt_id_post_first='+bt_id_post_first+'&bt_id_fanpage='+bt_id_fanpage+'&bt_id_profile='+bt_id_profile,
			'type': 'get',
			'complete': function(result){
				$('.bt-load-inbox-content').html(result.responseText);

				$('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
			}
		});
	} else if ($(el).parents('.bt-load-chat').attr('bt-type') == 'inbox') {
		$('#materialPreloader').show();
		//$('.bt-get-link-post').attr('href','https://facebook.com/'+id_user);
		var params = {};
		params['id_user'] = id_user;
		params['bt_id_fanpage'] = bt_id_fanpage;
		params['bt_id_profile'] = bt_id_profile;
		params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
		$.ajax({
			url: '{{ url("chat/ajaxgetinboxid1") }}',
			dataType: 'json',
			type: 'get',
			contentType: 'application/x-www-form-urlencoded',
			data: params,
			success: function( data, textStatus, jQxhr ){

			},
			error: function( jqXhr, textStatus, errorThrown ){
			},
			complete: function(data, textStatus, jQxhr){
				// console.log(data.responseText);
				$('.bt-load-inbox-content').html(data.responseText);
				// $('.count_chuadoc').each(function(){
				// 	countmess = countmess+$(this).attr('data');
				// 	changeTitle();
				// });
				$('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
				$(el).find('.count_chuadoc').remove();
				$('#materialPreloader').hide();
				// $('.bt-make-input').val('');
			}
		});
	}
}


function searchInboxComment(ob) {
  // var input = document.getElementById("contact-search-input");
  // var filter = input.value.toUpperCase();
  // console.log(filter);

		var value = $(ob).val().toLowerCase();
		console.log(value);

		var el = $(ob).parents('.tab-pane');
		$(el).find('.fake-textholder').html('');
		if (value == '') {
			$(el).find(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat").each(function() {
				$(this).css('display', 'block');
			});
			$(el).find('.fake-textholder').html('Tìm bạn bè, nhóm và tin nhắn');
		} else {
			$(el).find(".ReactVirtualized__Grid__innerScrollContainer >.bt-load-chat").css('display', 'none');
			// $('.bt-make-click-ft').click();
			// $(el).find(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat .conv-last-msg div span").filter(function() {
			
			// 	if ($(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)) {
			// 		$(this).closest('.bt-load-chat').css('display', 'block');
			// 	}
			// });
			$(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
			
		       });

		}
		// $(el).find(".ReactVirtualized__Grid .bt-load-chat .conv-last-msg div span").filter(function() {
		// 	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
		// });
	}

function searchmessage(ob) {
	$('.bt-open-temp-chat3').next('.popover_chatprofile').css('display','none');
			$(this).removeClass('open');
	
  if(ob == 'all'){
  	 

       $('#home.tab-pane.active').find(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat").each(function() {
				$(this).css('display', 'block');
			});
		  }else if(ob == 'chuadoc'){
		  	$('#home.tab-pane.active').find(".ReactVirtualized__Grid__innerScrollContainer >.bt-load-chat").css('display', 'none');
             
             $(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat").filter(function() {  
               //console.log(this);
			  // $(this).toggle($(this).text().toLowerCase().indexOf('unread') > -1);
			  //  $(this).toggle($(this).text().toLowerCase().indexOf('unread') > -1);
			  $('.ReactVirtualized__Grid__innerScrollContainer').find('.chuadoc1').css('display','block');

			
		       });


		  }else if(ob == 'nguoila'){
		  	$('#home.tab-pane.active').find(".ReactVirtualized__Grid__innerScrollContainer >.bt-load-chat").css('display', 'none');
             
             $(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat").filter(function() {  
               //console.log(this);
			  // $(this).toggle($(this).text().toLowerCase().indexOf('unread') > -1);
			  //  $(this).toggle($(this).text().toLowerCase().indexOf('unread') > -1);
			  $('.ReactVirtualized__Grid__innerScrollContainer').find('.nguoila').css('display','block');

			
		       });

		  }

}
// dang bai mmmm
$(document).ready(function(){

		$("#messAll").click(function() {

		    $("#viewmess").html("Tin nhắn");
		  });

		$("#chuadoc").click(function() {

		    $("#viewmess").html("Tin nhắn chưa đọc");
		  });

		$("#nguoila").click(function() {

		    $("#viewmess").html("Tin nhắn từ người lạ");
		  });

        $("input[type='button']").click(function(){
        	var list_id = $("input[name='gender']:checked").val();
        	var params = {};
			params['list_id'] = list_id;
            if(list_id){
               $('#modal_full').modal('hide');
               $.ajax({
				url: '{{ url("posts/selectListPost")}}',
				dataType: 'json',
				type: 'GET',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function(result){

				     console.log(result.data.type);
					if(result.data.type == 'status'){
						$('.js-click-status').trigger('click');
						$('#tieude').attr('value',result.data.post_title);
						var contentview = result.data.content.replace(/(?:\r\n|\r|\n)/g, '<br />');
	                    $('#box-view').html('<p class="message" id="message">'+contentview+'</p>');
	                    $('textarea#message').val(result.data.content);
					}else if(result.data.type == 'link'){
						
						$('.js-click-link').trigger('click');
                        $('.status').removeClass('active show');
		                $('.tabLink').addClass('active show');
						$('#tieude_link').attr('value',result.data.post_title);
	                    //$('#box-view').html('<p class="message" id="message">'+result.data.content+'</p>');
	                    $('textarea#message_link').val(result.data.content);
	                    var contentview = result.data.content.replace(/(?:\r\n|\r|\n)/g, '<br />');
	                    $('.message').html('<p class="message">'+contentview+'</p>');
	                    $('#link').attr('value',result.data.link);
	                    //gtelink
	                    $(".linkError").html("");
						var link = spin($.trim(result.data.link));
						$(".alerts").hide();
						if($.trim(link) != ""){
							if(LinkIsValid(link)){
								$(".previewPost .previewPostlink").html(link);
								if(IsYoutubeVideo(link)){
									
									var videoID = link.match(/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/)[1];

									$(".previewLink").html("<iframe src='https://www.youtube.com/embed/"+videoID+"' width='470px' height='300px' frameborder='0' allowfullscreen='allowfullscreen'></iframe>");
									
									GetSiteDetails(link,function(data) {
										if(data.status == "ok"){
											$(".postPreview .name").html(data.url.title);
											$(".postPreview .description").html(data.url.description);

											if($( "#postForm #name" ).val() == ""){
												$(".postPreview .name").html(data.url.title);
											}
											
											if($( "#postForm #description" ).val() == ""){
												$(".postPreview .description").html(data.url.description);
											}
										}
									});

									if(!$("input[name='caption']").val()){
										$(".postPreview .caption").html("youtube.com");
									}
									
								}else if(IsVideo(link)){
									$(".previewLink").html("<video controls><source src='"+link+"'></source></video>");
								}else{

									$(".postPreview .caption").html(extractDomain(link));

									kp_preloader("on",".postPreview");
									
									GetSiteDetails(link,function(data) {
										if(data.status == "ok"){

											if($('#postForm #name').length == 0){
												$(".postPreview .description").html(data.url.description);
												$(".postPreview .name").html(data.url.title);
												$(".previewLink").html("<img src='"+data.url.image+"'>");
											}

											if($('#postForm #name').length != 0 && $( "#postForm #name" ).val() == ""){
												$(".postPreview .name").html(data.url.title);
											}
											
											if($('#postForm #picture').length != 0 && $( "#postForm #picture" ).val() == ""){
												$(".previewLink").html("<img src='"+data.url.image+"'>");
											}
											
											if($('#postForm #description').length != 0 && $( "#postForm #description" ).val() == ""){
												$(".postPreview .description").html(data.url.description);
											}
										}
										kp_preloader("off",".postPreview");
									});
								 }
							}else{
								alertBox("Invalid link","danger",".linkError",true,true);
								defaultPreview();
							}
						}else{
							defaultPreview();
						}
	                    
	                    
					}else if(result.data.type == 'image'){
						//console.log("ksfsdkhfsdkfh");
                         $('.js-click-image').trigger('click');
                        // console.log(result.data);
						$('#tieude_link').attr('value',result.data.post_title);
						$('#tacgia').attr('value',result.data.tacgia);
						 $('textarea#mieuta').val(result.data.mieuta);
						//$('#noidung').attr('value',result.data.content);
						 var contentview = result.data.content.replace(/(?:\r\n|\r|\n)/g, '<br />');
	                    $('.message').html('<p class="message" id="message">'+contentview+'</p>');
	                    $('textarea#noidung').val(result.data.content);
	                    $('.image_1').html('<img src="'+result.data.image+'">');
	                    $('#avatar').attr('src',result.data.image);
	                    $('#avatar2').attr('src',result.data.image);
	                    $('#imageURL').attr('value',result.data.image);
					}else if(result.data.type == 'video'){
						//console.log(result.data);   thuy456
						 $('.js-click-video').trigger('click');
						 $('#tieude').attr('value',result.data.post_title);
						 $('#tabVideo #tacgia').attr('value',result.data.tacgia);
						 $('#tabVideo #video').attr('value',result.data.video);
						 $('textarea#mieuta').val(result.data.mieuta);
						  var contentview = result.data.content.replace(/(?:\r\n|\r|\n)/g, '<br />');
						 $('.message').html('<p class="message" id="message">'+contentview+'</p>');
						 $('.previewVideoType').html("<video controls><source src='"+result.data.video+"'></source></video>");
						 $('textarea#message').val(result.data.content);
					}
                    
				},
				error: function( jqXhr, textStatus, errorThrown ){

				},

			});
            }
        });


	$('.bt-popup-box-post').on('click',function(){
		$('.bt-load-chat').removeClass('readding');
		$(el).parents('.bt-load-chat').addClass('readding');
		$(el).parents('.bt-load-chat').removeClass('chuadoc');
		$('.bt-default-mess').css('display','none');
		$('.bt-chat-mess').css('display','block');
		var bt_id_fanpage = $(el).parents('.bt-load-chat').attr('bt-id-fanpage');
		var bt_id_profile = $(el).parents('.bt-load-chat').attr('bt-id-profile');
		var bt_id_post = $(el).parents('.bt-load-chat').attr('bt-id-post');
		var bt_id_post_first = $(el).parents('.bt-load-chat').attr('bt-id-post-first');
		var last_message = $(el).parents('.bt-load-chat').attr('bt-content-chat');
		var id_user = $(el).parents('.bt-load-chat').attr('bt-content-id');
		var name_user = $(el).parents('.bt-load-chat').find('.bt-content-chat .bt-name-chat').text();
		$('.bt-avatar-user>img').attr('src','https://graph.facebook.com/'+id_user+'/picture?height=100&width=100');
		$('.bt-name-user .bt-first').html(name_user);
		$('.bt-name-user .bt-last').html(id_user);
		if ($(el).parents('.bt-load-chat').attr('bt-type') == 'comment') {
			$('.bt-get-link-post').attr('href','https://facebook.com/'+bt_id_post_first);
			$.ajax({
				'url':'http://localhost/Ninjafanpage/public/ajaxgetinboxid',
				'data': 'id_post='+bt_id_post+'&last_message='+last_message+'&id_user='+id_user+'&bt_id_post_first='+bt_id_post_first+'&bt_id_fanpage='+bt_id_fanpage+'&bt_id_profile='+bt_id_profile,
				'type': 'get',
				'complete': function(result){
					$('.bt-load-inbox-content').html(result.responseText);

					$('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
				}
			});
		} else if ($(el).parents('.bt-load-chat').attr('bt-type') == 'inbox') {
			$('#materialPreloader').show();
			//$('.bt-get-link-post').attr('href','https://facebook.com/'+id_user);
			var params = {};
			params['id_user'] = id_user;
			params['bt_id_fanpage'] = bt_id_fanpage;
			params['bt_id_profile'] = bt_id_profile;
			params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
			$.ajax({
				url: '{{ url("comment/home/ajaxloadpopup") }}',
				dataType: 'json',
				type: 'post',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data, textStatus, jQxhr ){

				},
				error: function( jqXhr, textStatus, errorThrown ){
				},
				complete: function(data, textStatus, jQxhr){
					// console.log(data.responseText);
					// $('.bt-load-inbox-content').html(data.responseText);
					// // $('.count_chuadoc').each(function(){
					// // 	countmess = countmess+$(this).attr('data');
					// // 	changeTitle();
					// // });
					// $('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
					// $(el).find('.count_chuadoc').remove();
					$('#materialPreloader').hide();
					// $('.bt-make-input').val('');
				}
			});
		}
		
	});
	$('.checkallfriend').click(function(){
		if ($(this).is(':checked')) {
			$('.selectfriend').attr('checked','true');
		} else {
			$('.selectfriend').attr('checked','false');
		}
	});
	$('.caidat').click(function(){
		chatAllFriend(this);
	});
	// $('.checkallfanpage').click(function(){
	// 	if ($(this).is(':checked')) {
	// 		$('.divfriend').hide();
	// 		$('.selecteallprofiles').attr('disabled','disabled');
	// 		$('.checkallprofile').attr('disabled','disabled');
	// 	} else {
	// 		// $('.fillter-tab pull-right').show();
	// 		$('.checkallprofile').removeAttr('disabled');
	// 		$('.selecteallprofiles').removeAttr('disabled');
	// 	}
			
	// });

	$('.selecteallfanpage').click(function(){
		if ($(this).is(':checked')) {
				$('.divfriend').hide();
				// alert('aaaa');
				$('.bt-icon-fill .pull-right').hide();
				$('.selecteallprofiles').attr('disabled','disabled');
				$('.checkallprofile').attr('disabled','disabled');
			} else {
				$('.checkallprofile').removeAttr('disabled');
				$('.selecteallprofiles').removeAttr('disabled');
			}
			
		});

$('.selecteallfriend').click(function(){
					if ($(this).is(':checked')) {
					$('.divfriend').hide();
					// alert('aaaa');
					$('.bt-icon-fill .pull-right').hide();
					$('.selecteallprofiles').attr('disabled','disabled');
					$('.checkallprofile').attr('disabled','disabled');
				} else {
					$('.checkallprofile').removeAttr('disabled');
					$('.selecteallprofiles').removeAttr('disabled');
				}
						
		});



	$('.selecteallprofiles').click(function(){
		$('.divfriend').hide();
		if ($(this).is(':checked')) {
			$('.bt-icon-fill .pull-right').show();
			$('.checkallfanpage').attr('disabled','disabled');
			$('.selecteallfanpage').attr('disabled','disabled');
		} else {
			$('.checkallfanpage').removeAttr('disabled');
			$('.selecteallfanpage').removeAttr('disabled');
		}

	});

	$('.checkallprofile').click(function(){
		$('.divfriend').hide();
		if ($(this).is(':checked')) {
			$('.checkallfanpage').attr('disabled','disabled');
			$('.selecteallfanpage').attr('disabled','disabled');
		} else {
			$('.checkallfanpage').removeAttr('disabled');
			$('.selecteallfanpage').removeAttr('disabled');
		}

	});
	$('#materialPreloader').hide();
	$(".selecteallfanpage").click(function(){
		$('.checkallfanpage').not(this).prop('checked', this.checked);
	});
	$(".selecteallfriend").click(function(){
		console.log(this);
		$('.checkallfriend').not(this).prop('checked', this.checked);
	});
	$(".selecteallGroup").click(function(){
		$('.checkallGroup').not(this).prop('checked', this.checked);
	});
	$(".selecteallprofiles").click(function(){
		$('.checkallprofile').not(this).prop('checked', this.checked);
	});
	
		$('.bt-btn-edit-user>.bt-edit').on('click',function(){
			if ($(this).parents('.bt-info-content').hasClass('bt-hidden-ipnut')) {
				$(this).parents('.bt-info-content').addClass('bt-hidden-text').removeClass('bt-hidden-ipnut');
				$('.suahuy').text('Hủy');
			} else {
				$(this).parents('.bt-info-content').addClass('bt-hidden-ipnut').removeClass('bt-hidden-text');
				$('.suahuy').text('Sửa');
			}
		});


			var el = $(".bt-make-input").emojioneArea({
				placeholder: "Nhập tin nhắn ... (Bấm Enter để gửi, Shift + Enter để xuống dòng)",
				events: {
					keydown: function (editor, event) {
						if(event.which == 13 && !event.shiftKey){
							$('.emojionearea.bt-make-input').attr("tabindex",-1).focus();
							$('.bt-make-input .emojionearea-editor').attr("tabindex",-1).focus();
							$('.bt-submit-reply>a.btn').trigger('click', ['enter']);
							event.preventDefault();
						}
					},
					keyup: function (editor, event) {
						if(event.which == 13 && !event.shiftKey){
							editor.html('');
						}
					},
				}
			});

			var el = $(".bt-make-input-group").emojioneArea({
				placeholder: "Nhập tin nhắn ... (Bấm Enter để gửi, Shift + Enter để xuống dòng)",
				events: {
					keydown: function (editor, event) {
						if(event.which == 13 && !event.shiftKey){
							$('.emojionearea.bt-make-input').attr("tabindex",-1).focus();
							$('.bt-make-input .emojionearea-editor').attr("tabindex",-1).focus();
							$('.bt-submit-replyv2>a.btn').trigger('click', ['enter']);
							event.preventDefault();
						}
					},
					keyup: function (editor, event) {
						if(event.which == 13 && !event.shiftKey){
							editor.html('');
						}
					},
				}
			});

			var el = $(".bt-make-input-message").emojioneArea({
				placeholder: "Nhập nội dung tại đây...",
				
			});

				 $(".mediaLibraryImage").on( 'click', function () {
				 	$('#mediaLibModalImage').modal('show');
				 	getMediaLib();
				 	$("#URLFrom").val("image");
				 	$("#image_number").val($(this).val());
				 });

		 $(".mediaLibraryImage").on( 'click', function () {
		 	$('#mediaLibModalImage').modal('show');
		 	getMediaLib();
		 	$("#URLFrom").val("image");
		 	$("#image_number").val($(this).val());
		 });
		 $('.bt-ajax-unread').on('click', function(){
		 	$('.fill-tab').removeClass('active');
		 	$(this).addClass('active');
		 	$('.bt-all-comment').css('display','none');
		 	$('.bt-comment .bt-fix-co4 .bt-loader').css('display','flex'); //thuy block
		 	
		 });
		 $('.bt-submit-reply>a.btn').on('click',function(){

		 	var content_chat =  $('.emojionearea-editor').html();

		 	sendReplyJs(content_chat);
		 	$('.bt-make-input .emojionearea-editor').html(' ');
		 	$('.bt-make-input').val('');
		 });

		  $('.bt-submit-replyv2>a.btn').on('click',function(){

		 	var content_chat =  $('.emojionearea-editor').html();

		 	sendReplyJsv2(content_chat);
		 	$('.bt-make-input .emojionearea-editor').html(' ');
		 	$('.bt-make-input').val('');
		 });

		});

		function sendReplyJs(content_chat){
			console.log(content_chat);

			var checked1  = 0;
			var checked2  = 0;
			$('.checkallprofile').each(function(){
				if ($(this).is(':checked')) {
					checked1 = 1;
				}
			});
			$('.selectfriend').each(function(){
				if ($(this).is(':checked')) {
					checked2 = 1;
				}
			});
			if (checked1  == 1 && checked2  == 1) {
				post();
				return false;
			}
			$('#materialPreloader').show();
			var csrf_token = $('meta[name="csrf-token"]').attr('content');
			var id_postr = $('#bt-id-post').val();
			var id_fanpage = $('.readding').attr('bt-id-fanpage');
			var id_profile = $('.readding').attr('bt-id-profile');
			var id_commentr = $('.readding').attr('bt-content-id');
			var id_user = $('#bt-id-user-inbox').val();
			var img = $('.readding .owl-page img').attr('src');
			
			var id_repply = $('.global-id_fanpage').val();
			
			if (content_chat != '') {
				var html = '';
				html += '<div style="opacity:0.5" class="bt-inbox-item bt-right bt-new-chat">';
				html +=	'<div class="bt-inbox-item-avatar">';
				if (id_fanpage != "") {
					html +=		'<img title="'+img+'" src="'+img+'">';
				}
				if (id_profile != "") {
					html +=		'<img title="" src="'+img+'">';
				}
				html +=	'</div>';
				html +=	'<div class="bt-inbox-item-text">';
				html +=		'<span>'+content_chat+'</span>';
				html +=	'</div>';
				html +='</div>';
				$('.bt-load-inbox-content').append(html);
				$('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
				var params = {};
				params['id_comment'] = id_commentr;
				params['content_chat'] = content_chat;
				params['id_fanpage'] = id_fanpage;
				params['id_profile'] = id_profile;
				params['csrf_kingposter'] = '86210ff5a76622bd97b3fb009ce2fec1';
				$.ajax({
					url: '{{ url("chat/sendreply") }}',
					dataType: 'json',
					type: 'get',
					contentType: 'application/x-www-form-urlencoded',
					data: params,
					success: function( data, textStatus, jQxhr ){
					},
					error: function( jqXhr, textStatus, errorThrown ){
					},
					complete: function(data, textStatus, jQxhr){
						$('.bt-new-chat').css('opacity','1');
						$('#materialPreloader').hide();
						
					}

				});
			}
		}

		function sendReplyJsv2(content_chat){

			var checked1  = 0;
			var checked2  = 0;
			$('.checkallprofile').each(function(){
				if ($(this).is(':checked')) {
					checked1 = 1;
				}
			});
			$('.selectfriend').each(function(){
				if ($(this).is(':checked')) {
					checked2 = 1;
				}
			});
			if (checked1  == 1 && checked2  == 1) {
				post();
				return false;
			}
			$('#materialPreloader').show();
			var csrf_token = $('meta[name="csrf-token"]').attr('content');
			var id_postr = $('#bt-id-post').val();
			var id_fanpage = $('.readding').attr('bt-id-fanpage');
			var id_profile = $('.readding').attr('bt-id-profile');
			var id_commentr = $('.readding').attr('bt-content-id');
			var id_user = $('#bt-id-user-inbox').val();
			var img = $('.readding .owl-page img').attr('src');
			var id_repply = $('.global-id_fanpage').val();
			if (content_chat != '') {
				var html = '';
				html += '<div style="opacity:0.5" class="bt-inbox-item bt-right bt-new-chat">';
				html +=	'<div class="bt-inbox-item-avatar">';
				if (id_fanpage != "") {
					html +=		'<img title="'+img+'" src="'+img+'">';
				}
				if (id_profile != "") {
					html +=		'<img title="" src="'+img+'">';
				}
				html +=	'</div>';
				html +=	'<div class="bt-inbox-item-text">';
				html +=		'<span>'+content_chat+'</span>';
				html +=	'</div>';
				html +='</div>';
				$('.bt-load-inbox-content').append(html);
				$('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
				var params = {};
				var iduser =  $('#iduser').val();
				var idgroup =  $('#idgroup').val();
				var cookie = $('#check_'+iduser).data('cookie');
				var serectkey = $('#check_'+iduser).data('enk');

               var param = '{"idto":"'+idgroup+'","idcl":"1591762642593","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+content_chat+'","id_profile":"'+iduser+'"}';
				
				// đóng lại do gây lỗi server: socket.emit('sendmesstextgroup',param);

				
			}
		}
//-----------------------------------end chat OA------------------------------------------

/////////////////////////////////////////////////////////////////////////////////////////////   
		$(document).ready(function(){
			//----------tim kiếm ở bảng tài khoản
			$('#country_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
			    var query = $(this).val(); //lấy gía trị ng dùng gõ
			    if(query == ''){
			    	$('#countryList').fadeOut();
			    }
			    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
			    {
			     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
			     $.ajax({
			      url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
			      method:"GET", // phương thức gửi dữ liệu.
			      data:{query:query, _token:_token},
			      success:function(data){ //dữ liệu nhận về
			       $('#countryList').fadeIn();  
			       $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
			     }
			   });
			   }
			 });

			$('#country_name2').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
			    var query = $(this).val(); //lấy gía trị ng dùng gõ
			    if(query == ''){
			    	$('#countryList2').fadeOut();
			    }
			    if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
			    {
			     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
			     $.ajax({
			      url:"{{ route('search2') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
			      method:"GET", // phương thức gửi dữ liệu.
			      data:{query:query, _token:_token},
			      success:function(data){ //dữ liệu nhận về
			       $('#countryList2').fadeIn();
			       $('#countryList2').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
			     }
			   });
			   }
			 });
 
			//-------------end search

			$(".nav-tabs a").click(function(){
				$(this).tab('show');
			});
			$('.nav-tabs a').on('shown.bs.tab', function(event){
			    var x = $(event.target).text();         // active tab
			    var y = $(event.relatedTarget).text();  // previous tab
			    $(".act span").text(x);
			    $(".prev span").text(y);
			});
			var isMobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)/i);
			if(isMobile != null){
				$('body').addClass('mobile-v2');
				$('body').addClass('mobile-ext-v2');
				$('.navbar-static-top').css('max-width','initial');
			}
			var array_avatar = {};
			var heightcal = 0;
			var hoithoai = {};
			var hoithoaigroup = {};
			var tinnhanchuadoc = [];
			var datatag = {};
			var listfriend = {};
		var groups = []; // List of selected groups
		var TOTALPOSTINGTIME = 0; // in milliseconds
		var leftTime = 0;
		var postingInterval = 0;
		var countGroup = 0;
		var nextGroup = 0;
		var timeDeff = 30000; // default 30 seconds
		//var randomInterval =  app_settings['ipri']|number_format }};
		var randomInterval = 0;
		var countmess = 0;
	    socket = io('http://localhost:8686/');
		//socket = io('https://sv3.phanmemninja.com');
		
$(".addallnewfriendv1").click(function(){
        var id_profile = '';
		var cookie = '';
		var serectkey = '';

		var id_user = '';
		var check_fr = 0;
		$('.selectepageprofile').each(function(i, value){
	  		if ($(this).is(':checked')) {
	  			check_fr = 1;
	  			id_profile = $(this).val();
	  			cookie = $(this).attr('data-cookie');
				serectkey = $(this).attr('data-serectkey');
				id_user = $(this).attr('data-serectkey');
	  		}
	  	});
	  	$('.ketbantheodanhba').each(function(i,m){
			var noidung = $('#content_friendall').val();
			var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_profile":"'+id_profile+'","id_user":"'+id_user+'","noidung":"'+noidung+'","id_friend":"'+$(this).val()+'","name_friend":"'+$('#name_friend').val()+'"}';
			socket.emit('addnewfriendv1',data);
			$('#selectgroup_'+$(this).val()+'').parent('.colketban').remove();
		});

});
	function addallnewfriendv1(){
		var id_profile = '';
		var cookie = '';
		var serectkey = '';

		var id_user = '';
		var check_fr = 0;
		$('.selectepageprofile').each(function(i, value){
	  		if ($(this).is(':checked')) {
	  			check_fr = 1;
	  			id_profile = $(this).val();
	  			cookie = $(this).attr('data-cookie');
				serectkey = $(this).attr('data-serectkey');
				id_user = $(this).attr('data-serectkey');
	  		}
	  	});
	  	$('.ketbantheodanhba').each(function(i,m){
			var noidung = $('#content_friendall').val();
			var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_profile":"'+id_profile+'","id_user":"'+id_user+'","noidung":"'+noidung+'","id_friend":"'+$(this).val()+'","name_friend":"'+$('#name_friend').val()+'"}';
			socket.emit('addnewfriendv1',data);
			$('#selectgroup_'+$(this).val()+'').parent('.colketban').remove();
		});
	}
	// function acceptfriend(el,id){
	// 	console.log("sdlkfdsjhfd");
		
	// 	// $('.selectepageprofile').each(function(i, value){
	//  //  		if ($(this).is(':checked')) {
	//  //  			var id_profile = $(this).val();
	//  //  			var cookie = $(this).attr('data-cookie');
	//  //  			var serectkey = $(this).attr('data-serectkey');

	//  //  			var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_friend":"'+id+'"}';
	//  //  			// console.log(data);
	//  //  			socket.emit('acceptfriend',data);
	//  //  		}
	//  //  	});
	//  //  	var success = $(el).parents('.bt-load-chat').find('.bt-name-chat').html();
	//  //  	alertBox('Bạn với '+success+' đã trở thành bạn bè',"success",false,true,true);
	//  //  	$(el).parents('.colketban').remove();
 //  //    	count_loimoi--;
 //  //    	$('.loimoiketban').html('lời mời kết bạn ('+count_loimoi+')');
	// }
		//addfirend theo gợi ý
         $('.addnewfriendv1').click(function(){
		  		$('.selectepageprofile').each(function(i, value){
			  		if ($(this).is(':checked')) {
			  			check = 1;
			  			var id_profile = $(this).val();
			  			var cookie = $(this).attr('data-cookie');
			  			var serectkey = $(this).attr('data-serectkey');
			  			var id_user = $(this).attr('data-serectkey');
			  			var noidung = $('#content_friend').val();
			  			var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_profile":"'+id_profile+'","id_user":"'+id_user+'","noidung":"'+noidung+'","id_friend":"'+$('#id_friend').val()+'","name_friend":"'+$('#name_friend').val()+'"}';
			  			//console.log(data);
			  			socket.emit('addnewfriendv1',data);
			  		}
			  	});
			  	alertBox('Bạn đã gửi lời mời tới '+$('#name_friend').val()+'',"success",false,true,true);
		  	});

         $('.addfriendchat').click(function(){
		  		
			  		
			  			
			  			var id_profile = $(this).val();
			  			var cookie = $(this).attr('data-cookie');
			  			var serectkey = $(this).attr('data-serectkey');
			  			var id_user = $(this).attr('data-serectkey');
			  			var noidung = $('#content_friend').val();
			  			var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_profile":"'+id_profile+'","id_user":"'+id_user+'","noidung":"'+noidung+'","id_friend":"'+$('#id_friend').val()+'","name_friend":"'+$('#name_friend').val()+'"}';
			  			//console.log(data);
			  			//socket.emit('addnewfriendv1',data);
			  		
			  
			  	alertBox('Bạn đã gửi lời mời tới '+$('#name_friend').val()+'',"success",false,true,true);
		  	});


socket.on("returnaddnewfriendv1",function(data){
   console.log(data);
});

socket.on("returnSendMessOA",function(data){
   console.log(data);
});

socket.on("returnOrderZaloid",function(data){
   console.log(data);
});

socket.on("returnOrder",function(data){

 console.log(data);

   if(data.error == 0){
   	 

   	 var arr =  data.data;
   	 var html = '';
   	 for (var i = 0; i <arr.orders.length; i++) {
   	 	html += '<tr class="obj">';
   	 	html += '<td>'+i+'</td>';
        var image = $('.checkzalo_'+data.zaloid).data('image');
   	 	html += '<td><img src="'+image+'" width="40px" height="40px" style="border-radius: 50%!important;"></td>';

   	 	html += '<td><span style="color: #008fe5;">'+arr.orders[i].code+'</span><br><span>'+new Date(arr.orders[i].created_time).toLocaleDateString()+'</span></td>';
   	 	// html += '<td><span style="color: #008fe5;">#10ed6e9</span><br><span>06/19/52628</span></td>';
   	 	var item = '';
        for (var k = 0; k < arr.orders[i].order_items.length; k++) {
        	item += '<p class="nameProduct">'+arr.orders[i].order_items[k].name+'</p>';
        }
        html += '<td style="color: #008fe5;">'+item+'</td>';
   	 	var priceTotal = arr.orders[i].total_amount;
   	 	priceTotal = priceTotal.toLocaleString('it-IT', {currency : 'VND'});
   	 	html += '<td><strong style="color: #2c3436;">'+priceTotal+' VND</strong></td>';
   	 	var shipping = arr.orders[i].shipping.shipping_fee;
        shipping = shipping.toLocaleString('it-IT', {currency : 'VND'});

   	 	html += '<td><strong style="color: #2c3436;">'+shipping+' VNĐ</strong><br><span>'+arr.orders[i].shipping.courier_name+'</span></td>';
   	 	html += '<td>'+arr.orders[i].customer.name+'<br><span>'+arr.orders[i].customer.phone+'</span></td>';
   	 	if(arr.orders[i].status == 1){
   	 		html += '<td style="color:#0f9d58;">Đơn hàng mới</td>';
   	 	}else if(arr.orders[i].status == 3){
   	 		html += '<td style="color:#0f9d58;">Đã xác nhận</td>';
   	 	}else if(arr.orders[i].status == 6){
   	 		html += '<td style="color:#d00;">Hủy bởi Khách</td>';
   	 	}else if(arr.orders[i].status == 2){
           html += '<td style="color:#eda21b;">Đang xử lý</td>';
   	 	}else if(arr.orders[i].status == 7){
            html += '<td style="color:#d00;">Chuyển hoàn</td>';
   	 	}else if(arr.orders[i].status == 4){
            html += '<td style="color:#d00;">Đang giao hàng</td>';
   	 	}else {
             html += '<td style="color:#d00;">Hủy bởi Shop</td>';
   	 	}
   	 	
   	 	html += '<td>Thanh toán khi nhận hàng </td>';
   	 	html += '<td><a href="https://zalov2.phanmemninja.com/order/getOrder/'+arr.orders[i].id+'/'+data.zaloid+'" title="Chi tiết" class="btn btn-primary " target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Chi tiết</a></td>';
   	 	html += '</tr>';

   	 }
   	$('#contentOrder').append(html);

   }
});


socket.on("returnGetGroupZaloId",function(data){
    var pr = JSON.parse(data);
   $('#zaloidGroup').val(pr.zaloid);
   $('#idGroup').val(pr.idGroup);
});

socket.on('returnGetMemGroup', function(data){
   var arr = data.data.currentMems;
   var html = '';
    $(arr).each(function(i, value){
        html += '<div class="row">';
        html += '<div class="col-md-8">';
        html += '<div class="bt-avatar-user-chat">';
        html += '<img src="'+value.avatar+'" style=" position: absolute;"> </div><div class="bt-info-chat">';
        html += '<div class="bt-name-chat" style="margin-top: 18px;">'+value.zaloName+'</div></div>';
        html += '<div class="owl-page"></div> ';
        html += '</div>';
        html += '<div class="col-md-4">';
        html += '<div class="fr-rq-buttons" style="float: right;">';
        html += '<div class="fr-button inforMemberGroup_'+value.id+'" data-memberId="'+value.id+'" data-groupId="'+data.data.groupId+'" onclick="addFriendMemberGroup('+value.id+')"><span class="fr-btn-content" data-translate-inner="STR_CONFIRM_DIALOG_ACCEPT">Kết Bạn</span></div>';
        html += '<input type="checkbox" class="selectepageUserGroup checkallUserGroup check_'+value.id+'" data-type="fanpage" value="'+value.id+'" style="margin-top: 7px;" data-userid="'+value.id+'" data-avatar="'+value.avatar+'" data-name="'+value.zaloName+'">';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $('#listMemberGroup').html(html);
    });

});

socket.on('returnsms',function(data){
  console.log(data);
  $('.bt-new-chat').css('opacity','1');
  $('#materialPreloader').hide();
});

socket.on('returnsmsv2',function(data){
	
  console.log(data);
});

socket.on("acceptfriend", function(data) {
	        var data_profile = JSON.parse(data);
			//console.log(data_profile);
	   	});
			socket.on("ketban", function(data) {
				$('.loader-zalo').hide();
			if (data == '') {
				alertBox('Cookie của bạn không hoạt động',"danger",false,true,true);
				$('#materialPreloader').hide();
				return false;
			}
	        var data_profile = JSON.parse(data);
	         //console.log(data_profile);
	        for (var i = 0; i < data_profile.data.recommItems.length; i++) {
	        	if (data_profile.data.recommItems[i].dataInfo.recommType == 2) {
	        		++count_loimoi;
	        		 var html = '';
					html += '<div class="col-md-2 colketban">';
					html += '<div style="position: absolute;left: 5px; top: 5px;"><input type="checkbox" class="fbnode checkbox checkbox-style" name="selectGroup[1]" id="selectgroup_'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'" value="'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'"><label for="selectgroup_'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'"></label></div>'; 
					html += '<img src="'+data_profile.data.recommItems[i].dataInfo.avatar+'">';
					html += '<p>'+data_profile.data.recommItems[i].dataInfo.displayName+'</p>'; 
					
					html += '<h6>Tin nhắn "'+data_profile.data.recommItems[i].dataInfo.recommInfo.message+'"</h6>'; 
					html += '<button class="boqua" onclick=removiefriend(this,\"'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'\")>Bỏ qua</button><button class="dongy" onclick=acceptfriend(this,\"'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'\") style="margin-left: 5px;">Đồng ý</button>'; 
					html += '</div>';
					$('.data-friend').append(html);

	        	} else if(data_profile.data.recommItems[i].dataInfo.recommType == 1){
	        		listuser.push(data_profile.data.recommItems[i].dataInfo.userId.trim());
	        		// console.log(listuser);
	        		++count_goiy;
	        		var html = '';


	        		html += '<div class="col-md-2 colketban">';
					html += '<div style="position: absolute;left: 5px; top: 5px;"><input type="checkbox" class="fbnode ketbantheodanhba checkbox checkbox-style" name="selectGroup[1]" id="selectgroup_'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'" value="'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'"><label for="selectgroup_'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'"></label></div>'; 
					html += '<img src="'+data_profile.data.recommItems[i].dataInfo.avatar+'">';
					html += '<p>'+data_profile.data.recommItems[i].dataInfo.zaloName+'</p>';
					// html += '<h6>Tên zalo: '+data_profile.data.recommItems[i].dataInfo.zaloName+'</h6>';
					html += '<h6>Gợi ý từ danh bạn điện thoại</h6>';
					// html += '<button style="margin:2px 2px" class="chapnhan" data-toggle="modal" data-target="#sendsms" onclick=changeidfriend(this,\"'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'\")>Nhắn tin</button>'; 
					html += '<button style="margin:2px 2px" class="nhantin" data-toggle="modal" data-target="#sendsms" onclick=changemess(this,\"'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'\")>Nhắn tin</button>'; 
					html += '<button style="margin:2px 2px" class="chapnhan" data-toggle="modal" data-target="#addnewfriend" onclick=changeidfriend(this,\"'+data_profile.data.recommItems[i].dataInfo.userId.trim()+'\")>Kết bạn</button>'; 
					html += '</div>';


					
					$('.data-friendgoiy').append(html);
	        	}
	        	$('.loimoiketban').html('Lời mời kết bạn ('+count_loimoi+')');
	        	$('.goiyketban').html('Gợi ý kết bạn ('+count_goiy+')');
	        	$('.bt-chat-mess').show();
	        	$('#materialPreloader').hide();
	        	// console.log(data_profile.data.recommItems[i].dataInfo.avatar);
	        	var params = {};
	        	params['name'] = data_profile.data.recommItems[i].dataInfo.displayName;
	        	params['avatar'] = data_profile.data.recommItems[i].dataInfo.avatar;
	        	params['dataInfo']  = data_profile.data.recommItems[i].dataInfo.userId;
	        	params['type'] = data_profile.data.recommItems[i].dataInfo.recommType;
	        	params['message'] = data_profile.data.recommItems[i].dataInfo.recommInfo.message;
	        	params['_token'] = $('input[name="_token"]').val();



	    //     	$.ajax({
					// 	url: '{ url("addfriend/addgoiy") }}',
					// 	dataType: 'json',
					// 	type: 'post',
					// 	contentType: 'application/x-www-form-urlencoded',
					// 	data: params,
					// 	success: function( data, textStatus, jQxhr ){
					// 		console.log("sdjkfhdsfdsfhdsgfjdshgfdhgfjghsf");

					// 	},
					// 	error: function( jqXhr, textStatus, errorThrown ){ 
					// 	},
					// 	complete: function(){
							
					// 		// $('#materialPreloader').hide();
					// 		// alertBox('{ l("Lưu thành công chatbot") }}',"success",false,true,true);
					// 		// return false;
					// 	}
					// });


	        }
      	});
		//-------------------------------------------phần lọc số điện thoại--------------------------------------------
	   	var phonelist = [];
		var phonestart = [];
		var datacheckphone = [];
		// var socket = io("https://sv1.phanmemninja.com/",{'forceNew':true });
		var count = 0;
socket.on('checkreturnfriend',function(result){
	console.log(result);
});
		socket.on("returnfriend",function(result){

			//console.log(result);
			var data = JSON.parse(result);
            var _token = $('input[name="_token"]').val();
			

			if (data.status == '600') {
				$('.postStatus_'+data.id_profile).html('cookie không hoạt đông');
				return false;
			}
			if (data.status == '221') {
				$('.postStatus_'+data.id_profile).html('đã vượt quá số lần kết bạn trong một ngày');
                     var phone = data.phone;
                 var mess = data.mess;
				$.ajax({
						url: '{{ url("addfriend/addHistory") }}',
						dataType: 'json',
						type: 'get',
						contentType: 'application/x-www-form-urlencoded',
						data: {id_profile:data.id_profile, phone:phone, mess:mess},
						success: function( data, textStatus, jQxhr ){
							console.log("sdjkfhdsfdsfhdsgfjdshgfdhgfjghsf");

						},
						error: function( jqXhr, textStatus, errorThrown ){ 
						},
						complete: function(){
							
							// $('#materialPreloader').hide();
							// alertBox('{ l("Lưu thành công chatbot") }}',"success",false,true,true);
							// return false;
						}
					});
				
			} else {
			    console.log("ket ban thanh cong vs: "+ data.id_profile + "sdt: " + data.mess.slice(24, 34));
                 // var phone = data.mess.slice(24, 34);
                 var phone = data.phone;
                 var mess = data.mess;
				$.ajax({
						url: '{{ url("addfriend/addHistory") }}',
						dataType: 'json',
						type: 'get',
						contentType: 'application/x-www-form-urlencoded',
						data: {id_profile:data.id_profile, phone:phone, mess:mess},
						success: function( data, textStatus, jQxhr ){
							console.log("sdjkfhdsfdsfhdsgfjdshgfdhgfjghsf");

						},
						error: function( jqXhr, textStatus, errorThrown ){ 
						},
						complete: function(){
							
							// $('#materialPreloader').hide();
							// alertBox('{ l("Lưu thành công chatbot") }}',"success",false,true,true);
							// return false;
						}
					});

				$('.postStatus_'+ data.id_profile).html('hoàn thành kết bạn:<a href="{{ url("addfriend/log") }}" target="_blank">xem lịch sử</a>');
			}
		});
		// socket.on( 'disconnect', function (data) {
			
		// 	console.log( 'jhgfsdgfjsdgfdjsfh' );
		// } );
		socket.on('reciver',function(result){
			console.log(result);
		});

		socket.on('returncheck',function(result){
			console.log(result);
		});

		socket.on('returnAddfriendGroup',function(result){
			var pr = JSON.parse(result);
			var decrypted = CryptoJS.AES.decrypt({ciphertext: CryptoJS.enc.Base64.parse(pr.data),salt: ""}, CryptoJS.enc.Base64.parse(pr.env), options).toString(CryptoJS.enc.Utf8);                
            var data = JSON.parse(decrypted);
			var params = {};
			params['name']   = pr.name;
			params['avatar'] = pr.avatar;
			params['error_code']   = data.error_code;
			params['error_message'] = data.error_message;
			params['_token']  = $('input[name="_token"]').val();
			$.ajax({
                    url: '{{ url("group/addHistoryFriendGroup") }}',
                    dataType: 'json',
                    type: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: params,
                    success: function( data, textStatus, jQxhr ){ 

                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                    },
                    complete: function(data, textStatus, jQxhr){
                       
                    }
                });
		});

		socket.on("returncheckphone",function(result){
            //console.log(result);
			count++;
			if (result.error_code == '0') {
				// console.log(result);
				var html = '<li class="media"><div class="mr-3">';
                html += '<img src="'+result.data.avatar+'" width="40px" height="40px" style="border-radius: 50%!important;"></div>';
                html += '<div class="media-body">'+result.data.zalo_name+'<div class="text-muted">'+result.phone+'</div></div></li>';
                $('.viewdataphone .dataphone').append(html);
               
               var html2 = '<tr role="row" class="odd"><td class="sorting_1" style="width: 20%;">';
                html2 +='<input name="client_camp[fanpage:461][]" class="datafriend data_client_send" gender_client="undefined" name_client="'+result.data.zalo_name+'" type="checkbox" value="'+result.uid+'" data-from="fanpage:461">';
                html2 += '</td><td>'+result.phone+'</td><td style="width: 40%">';
                html2 +='<img src="'+result.data.avatar+'" style="width: 45px; height: 45px;"></td><td style="width: 40%">'+result.data.zalo_name+'</td></tr>';
                $('#tablePhoneLoadFriend #bt-load-client-content').append(html2);	
				$('#tablePhoneLoadFriend').show();

				phonelist.push(result.phone);
				datacheckphone.push(result.data.uid);
                localStorage.setItem("datacheckphone", JSON.stringify(datacheckphone));

			} else if(result.error_code == '221'){
				phonelist.push(result.phone);
			}
			var data = '';
			if (phonelist.length >0) {
				for (var i = 0; i < phonelist.length; i++) {

					data += phonelist[i]+'\r\n';
				}
			}
			$('#list-phone').val(data);
			
			//console.log(count);
			//console.log(count);

			if ((phonestart.length) == count) {

				//console.log(phonelist.length);
				$('.loader-zalo').hide();
				$('.thongbao').html('Đã lọc được '+phonelist.length+' / '+phonestart.length+' số điện thoại có Zalo.');
				$('.thongbao').show();
				var html2 = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Lọc số điện thoai hoành thành.</p>';
				 $('.contentpoppup').html(html2);
				 $('#popupmess').modal('show');
			}



			
		});

		socket.on('returndata',function(result){
            console.log(result);
		});


	$('#adddataphone').click(function(){

		var listphone = $('.list-phone').val().trim();
              var _token = $('input[name="_token"]').val(); 
              if($('.list-phone').val() == ''){
					alertBox('Vui lòng nhập danh sách số điện thoại',"e53935",".messageBoxLoc",true,true);
					return false;
				}else{
					$('.loader-zalo').show();
						$.ajax({
						url: '{{ url("addfriend/adddataphone") }}',
						dataType: 'json',
						type: 'post',
						contentType: 'application/x-www-form-urlencoded',
						data: {listphone:listphone, _token:_token},
						success: function( data, textStatus, jQxhr ){
							$('.loader-zalo').hide();
							if(data.status == 200){
                               alertBox(data.message,"00a65a",".messageBoxLoc",true,true);
							   
							}else{
								alertBox("Thêm mới sdt thất bại!!","e53935",".messageBoxLoc",true,true);
							}
							
							
						},

					});
				}
	});	
	
		$(document).ready(function(){

			// {% if app_settings['disable_dt_plugin'] == 1 %}
			//     $("#groupsDataTable").tablesorter({
			// 		delayInit: true,
			// 		showProcessing: true,
			// 		headers: {
			// 			0: {sorter: false,parser: false,empty:"bottom",extractor:"none",string:"max"},
			// 			1: {sorter: true,parser: "text",empty:"bottom",extractor:"none",string:"max"},
			// 			2: {sorter: false,parser: false,empty:"bottom",extractor:"none",string:"max"},
			// 			4: {sorter: false,parser: false,empty:"bottom",extractor:"none",string:"max"},	
			// 		}
			//     });

			//     /* reAttched Checkbo Event*/
			//     $("#checkbox-all").click(function () {
			// 		$('#groupsDatabale tbody input[type="checkbox"],.dataTable tbody input[type="checkbox"],#datatable tbody input[type="checkbox"]').prop('checked', this.checked);
			// 	});

			// {% else %}
			// 	var translations = {
			//             "lengthMenu": "Display %s records per page,_MENU_",
			//             "zeroRecords": "No records available",
			// 			"info": "('Showing %s to %s of %s ','_START_','_END_','_TOTAL_') ",
			//             "infoFiltered": "(filtered from %s total records)','_MAX_')",
			//             "search":  "Search",
			//             "paginate": {
			// 		        "first": "First",
			// 		        "last": "Last",
			// 		        "next":  "Next",
			// 		        "previous":   "Previous",
			// 		    }
			// 	};

			//     var groupsDataTable = $('#groupsDataTable').DataTable({
			// 		"aaSorting": [],
			// 		"bSort": true,
			// 		"responsive": true,
			//         "aoColumnDefs": [{
			//             'bSortable': false,
			//             'aTargets': [0]
			//         }],
			//         "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
			// 		"iDisplayLength": 100,
			// 		"language": translations,
			//     });
		 //  	{% endif %}

		  	$('#xuatfile').click(function(){
		  		// Example data given in question text
				

				// Building the CSV from the Data two-dimensional array
				// Each column is separated by ";" and new line "\n" for next row
				var csvContent = '';
				for (var i = 0; i < phonelist.length; i++) {
					csvContent += phonelist[i] +'\r\n';
				}

				// The download function takes a CSV string, the filename and mimeType as parameters
				// Scroll/look down at the bottom of this snippet to see how download is called
				var download = function(content, fileName, mimeType) {
				  var a = document.createElement('a');
				  mimeType = mimeType || 'application/octet-stream';

				  if (navigator.msSaveBlob) { // IE10
				    navigator.msSaveBlob(new Blob([content], {
				      type: mimeType
				    }), fileName);
				  } else if (URL && 'download' in a) { //html5 A[download]
				    a.href = URL.createObjectURL(new Blob([content], {
				      type: mimeType
				    }));
				    a.setAttribute('download', fileName);
				    document.body.appendChild(a);
				    a.click();
				    document.body.removeChild(a);
				  } else {
				    location.href = 'data:application/octet-stream,' + encodeURIComponent(content); // only this mime type is supported
				  }
				}
				download(csvContent, 'dowload.csv', 'text/csv;encoding:utf-8');
		  	});
		  	$('#locsodienthoai').click(function(){
		  		//console.log('dsfdsfdsf');
		  		count = 0;
		  		phonelist = [];
		  		var groups = []; // List of selected groups
		  		var params = {};
		  		var check = 0;
		  		var _token = $('#form-group input[name="_token"]').val(); 
		  		//console.log(_token);
				$('.groupName:visible .fbnode:checked').each(function(){
					check = 1;
					groups.push($(this).val());
				});
				if(check == 0){
					alertBox('Vui lòng chọn một tài khoản để chạy lọc',"e53935",".messageBoxLoc",true,true);
					return false;
				}
				if($('.list-phone').val() == ''){
					alertBox('Vui lòng nhập danh sách số điện thoại',"e53935",".messageBoxLoc",true,true);
					return false;
				}
				$('.loader-zalo').show();
				var html = 'Đang quét thông tin số điện thoại...'; 
			    $(".contentloader").html(html);
				params['_token'] = _token;
				//params['listphone'] = $('.list-phone').val().trim();
				var phone2 = $('.list-phone').val().trim();
				
				var phone = phone2.replace(/(\r\n|\n|\r)/gm,";");
				
    			var phone_array = phone.split(";");
    			phonestart = phone.split(";");

    			//console.log("phonestart:",phone_array);
    			 var number;
    			 var phoneArray = [];
    			
						      for (var i = 0; i <phone_array.length; i++) {
						        
							      number = phone_array[i].slice(0, 2);

							      //console.log(params['listphone'][i]);
							      if(number == '84'){
							      	var phoneVal = phone_array[i].replace(phone_array[i].slice(0, 2), "0");
							      	phoneArray.push(phoneVal);
							      	
							      }else{
							      	phoneArray.push(phone_array[i]);
							      }
							      params['listphone'] = phoneArray;
							      
						      }

    			for (var i = 0; i < 1; i++) {
					params['id_profile'] = groups[i];
					var id_profile= groups[i];
                    
                    var listphone = $('.list-phone').val().trim();
                    //console.log(phoneArray);
					$.ajax({
						url: '{{ url("addfriend/checkphone") }}',
						dataType: 'json',
						type: 'post',
						contentType: 'application/x-www-form-urlencoded',
						data: {_token:_token, id_profile:id_profile, phoneArray:phoneArray},
						success: function( data, textStatus, jQxhr ){
							//console.log(data);
							var k = 0;
                           // for (var i = 0; i <phoneArray.length; i++) {
                           // 	  setTimeout( function timer(){
                           //         var param = '{"id_profile": "'+data.id_profile+'","cookie":"'+data.cookie+'","serectkey":"'+data.serectkey+'","phone":"'+phone_array
                           //         [k]+'"}'; 
                           //         socket.emit('checklistphonev2',data);
                           //         k++;
                           // 	  }, i*5000 );
                           // }
                            //checkPhonev2(data);
							socket.emit('checklistphone',data);  // đang chạy note Thúy

							
						},
						error: function( jqXhr, textStatus, errorThrown ){ 
						},
						complete: function(){
							
							
						}
					});
				}
    			
		  	});
		  	function checkPhonev2(data){
                var phone = data.listphone.replace(/(\r\n|\n|\r)/gm,";");
                var phone_array = phone.split(";");
                var k = 0;
                for (var i = 0; i < phone_array.length; i++) {
			        setTimeout( function timer(){
			          var param = '{"phone":"'+phone_array[k]+'","cookie":"'+data.cookie+'","serectkey":"'+data.serectkey+'","id_profile":"'+data.id_profile+'"}';
			           socket.emit('checkPhoneV2',param);
			           k++;
			        }, i*3000 );
			      }

		  	}

		  	$('.locsodt').click(function(){
               var _token = $('input[name="_token"]').val();
		  		count = 0;
		  		phonelist = [];
		  		var groups = []; // List of selected groups
		  		var params = {};
		  		var check = 0;

				if($('.checkloadcampselect').val() == ''){
					alertBox('Vui lòng chọn một tài khoản để chạy lọc',"danger",false,true,true);
					return false;
				}
				if($('.dataphone').val() == ''){
					alertBox('Vui lòng nhập danh sách số điện thoại',"danger",false,true,true);

					return false;
				}
				$('.loader-zalo').show();
				// params['{ config_item('csrf_token_name') }}'] = getCookie('{ config_item('csrf_cookie_name') }}');
				params['listphone'] = $('.dataphone').val().trim();
				var phone = params['listphone'].replace(/(\r\n|\n|\r)/gm,";");
    			var phone_array = phone.split(";");
    			phonestart = phone.split(";");
				console.log(phonestart.length);
    	// 		if (phone_array.length > 10) {
    	// 			alertBox('{ l("Vui lòng nhập danh sách số điện thoại bé hơn hoặc bằng 10 số") }}',"danger",false,true,true);
    	// 			$('.loader-zalo').hide();
					// return false;
    	// 		}

    	 var phoneArray = [];
    			
						      for (var i = 0; i <phone_array.length; i++) {
						        
							      number = phone_array[i].slice(0, 2);

							      //console.log(params['listphone'][i]);
							      if(number == '84'){
							      	var phoneVal = phone_array[i].replace(phone_array[i].slice(0, 2), "0");
							      	phoneArray.push(phoneVal);
							      	
							      }else{
							      	phoneArray.push(phone_array[i]);
							      }
							      params['listphone'] = phoneArray;
							      
						      }
    			for (var i = 0; i < 1; i++) {
					params['id_profile'] = $('.checkloadcampselect').val();
					params['_token'] = _token;

					var id_profile = $('.checkloadcampselect').val();

					$.ajax({
						url: '{{ url("addfriend/checkphone") }}',
						dataType: 'json',
						type: 'post',
						contentType: 'application/x-www-form-urlencoded',
						data: {_token:_token, phoneArray:phoneArray, id_profile},
						success: function( data, textStatus, jQxhr ){
							var cookie = data.cookie;
							var emei  = data.emei;
							var id_profile = data.id_profile;
							var id_user = data.id_user;
							var noidung = data.noidung;
							var serectkey = data.serectkey;

							var phone = data.listphone.replace(/(\r\n|\n|\r)/gm,";");
                            var phone_array = phone.split(";");
                            var a = 0;
                           // for (var i = 0; i < phone_array.length; i++) {
                             
                           // 	 setTimeout(function(){
                           // 	 	a++
                           //   console.log(a);
                           // 	 var data2 = '{"cookie":"'+cookie+'","emei":"'+emei+'","id_profile":"'+id_profile+'","id_user":"'+id_user+'","noidung":"'+noidung+'","serectkey":"'+serectkey+'","listphone":"'+phone_array[a]+'"}';
                           //     var data_check = JSON.parse(data2);
                              
                           //    socket.emit('checklistphone',data_check);
                           //      },i*8000);
                           // }
       //                     var data2 = '{"cookie":"'+cookie+'","emei":"'+emei+'","id_profile":"'+id_profile+'","id_user":"'+id_user+'","noidung":"'+noidung+'","serectkey":"'+serectkey+'","listphone":"0946215083"}';
       //                     var data_check = JSON.parse(data2);
							 socket.emit('checklistphone',data);

							// $('#materialPreloader').hide();
							// alertBox('{ l("Lưu thành công chatbot") }}',"success",false,true,true);
							// return false;
						},
						error: function( jqXhr, textStatus, errorThrown ){ 
						},
						complete: function(){
							
							// $('#materialPreloader').hide();
							// alertBox('{ l("Lưu thành công chatbot") }}',"success",false,true,true);
							// return false;
						}
					});
				}
    			
		  	});

		  	$('.addfriend').click(function(){
		  		var groups = []; // List of selected groups
		  		var params = {};
		  		var check = 0;
				$('.groupName:visible .fbnode:checked').each(function(){
					check = 1;
					groups.push($(this).val());
				});
				if(check == 0){
					alertBox('Vui lòng chọn tài khoản để kết bạn',"e91607",".messageBox",true,true);
					return false;
				}
				if($('.list-phone').val() == ''){
					alertBox('Vui lòng nhập danh sách số điện thoại',"e91607",".messageBox",true,true);
					return false;
				}
				if($('.noidung').val() == ''){
					alertBox('Vui lòng nhập nội dung kết bạn',"e91607",".messageBox",true,true);
					return false;
				}
				
				params['listphone'] = $('.list-phone').val().trim();
				var listphone = $('.list-phone').val().trim();
				params['noidung'] = $('.noidung').val();
				var noidung = $('.noidung').val();
				var phone = params['listphone'].replace(/(\r\n|\n|\r)/gm,";");
    			var phone_array = phone.split(";");
    			var check_phone = 0;
    	// 		for (var i = 0; i < phone_array.length; i++) {
					// var regex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    	// 			if (regex.test(phone_array[i])) {
    	// 				check_phone = 0;
    	// 			} else {
    	// 				check_phone = 1;
    	// 				break;
    	// 			}
    	// 			// if (Number.isInteger(phone_array[i]) == false) {
    	// 			// 	check_phone = 1;
    	// 			// 	break;
    	// 			// }
    	// 		}
    	// 		if (check_phone == 1) {
    	// 			alertBox('{ l("danh sách số điện thoại không đúng định dạng") }}',"danger",false,true,true);
					// return false;
    	// 		}
				params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
				$('.loader-zalo').show();
				for (var i = 0; i < groups.length; i++) {
					params['id_profile'] = groups[i];
					var id_profile = groups[i];
                    //console.log(params);
					//addfriend(params);
					addfriend(listphone,noidung,id_profile);
				}
				alertBox('Hoàn thành gửi lời mời kết bạn, vui lòng xem lịch sử',"00a65a",".messageBox",true,true);
				

		  	});



		  	$("#savepost").click(function(){
		  		var groups = []; 
		  		// List of selected groups
		  		var params = {};
				if($('#keywordclient').val() == ''){
					alertBox('Từ khóa người dùng nhắn tin không được trống',"danger",false,true,true);
					return false;
				}
				if($('#keywordoa').val() == ''){
					alertBox('Mẫu trả lời không được trống',"danger",false,true,true);
					return false;
				}
				var check = 0;
				$('.groupName:visible .fbnode:checked').each(function(){
					check = 1;
					groups.push($(this).val());
				});
				if(check == 0){
					alertBox('Vui lòng chọn Official Account',"danger",false,true,true);
					return false;
				}
				$('#materialPreloader').show();
				params['keywordclient'] = $('#keywordclient').val();
				params['keywordoa'] = $('#keywordoa').val();
				params['id_oa'] = JSON.stringify(groups);
				params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
				$.ajax({
				url: '{{ url("chat/chatbot/add") }}',
				dataType: 'json',
				type: 'post',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data, textStatus, jQxhr ){
					$('#materialPreloader').hide();
					alertBox('Lưu thành công chatbot',"success",false,true,true);
					return false;
				},
				error: function( jqXhr, textStatus, errorThrown ){ 
				},
				complete: function(){
					$('#materialPreloader').hide();
					alertBox('Lưu thành công chatbot',"success",false,true,true);
					return false;
				}
			});
			});
		});

	function addfriend(listphone,noidung,id_profile){

		 var _token = $('.card input[name="_token"]').val(); 
		$.ajax({
			url: '{{ url("addfriend/add") }}',
			dataType: 'json',
			type: 'post',
			contentType: 'application/x-www-form-urlencoded',
			data: {listphone:listphone, noidung:noidung, id_profile:id_profile, _token:_token},
			success: function( data, textStatus, jQxhr ){
				//console.log(data);
				if(data.code == 401){
					//console.log("messe_erro");
					alertBox(''+data.mess+'',"danger",false,true,true);
				} else {

					socket.emit('dataaddfriend',data);
				}
				
			},
			error: function( jqXhr, textStatus, errorThrown ){ 
			},
			complete: function(){
				$('.loader-zalo').hide();
				
			}
		});
	}
///////////////////////////////////////////////////////////////////////////////////////////////
		socket.on( 'connect', function () {
			console.log('dang ket noi');
			// socket.emit('pong','agww');
			// setInterval(function(){
			//  	socket.emit('pong','agww');
			// }, 2000);
		} );

        socket.on( 'returninfogroup', function (data) {
           $('.tennhom').html(data.data.name);
           $('.thanhvien').html('Thành viên:'+data.data.totalMember+'/1000');
           $.each(data.data.currentMems,function(i,m){
                var html = '<div class="col-md-4" style=" text-align: center;">';
                html += '<span><img src="'+m.avatar+'" style="width: 60px;border-radius: 50%;">';
                html += '<p>'+m.dName+'</p></span></div>';
                $('.thanhvientrongnhom').append(html);
           });
        });
        socket.on( 'returnjoingoup', function (data) {
           if (data.error_code == 0) {
                alertBox('Bạn đã tham gia nhóm',"success",false,true,true);
                return false;
           }
        });
        socket.on( 'returnnemberjoingroup', function (data) {
           if (data.error_code == 0) {
                alertBox('Bạn đã mời bạn bè tham gia nhóm thành công',"success",false,true,true);
                return false;
           }
        });

       socket.on( 'returnSendMessOA', function (data) { 
       	  console.log(data);
       });

       socket.on( 'returnAddLinkGroup', function (data) { 
       	  var params = {};
          var pr = JSON.parse(data);
       	  params['zaloid'] = pr.zaloid;
       	  params['link']   = pr.link;
       	  params['code']   = pr.result.error_code;
       	  params['message']= pr.result.error_message;
       	  params['_token'] = $('input[name="_token"]').val();
       	  $.ajax({
                url: '{{ url("group/historyAddLinkGroup") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: params,
                success: function( data, textStatus, jQxhr ){

                    

                },
                error: function( jqXhr, textStatus, errorThrown ){ 
                },
                complete: function() {
                }
            });
 
       });


        $('.joingroup').click(function(){
            var link = $(this).attr('data');
            var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
            var name_profile = $('.profile_'+id_profile).attr('data-name');
            var image_profile = $('.profile_'+id_profile).attr('data-image');
            var cookie = $('.profile_'+id_profile).attr('data-cookie');
            var enk = $('.profile_'+id_profile).attr('data-env');
            var param = '{"cookie":"'+cookie+'","serectkey":"'+enk+'","id_profile":"'+id_profile+'","link":"'+link+'"}';
            socket.emit('joingroup',param);
        });
		$('body').on('click','.fa-header-icon-tag',function(){
           			$('.tagbyprofile').show();
		});
		$('body').on('click','.getNameZalo',function(){
            
            if (!$(this).hasClass('open')) {
				$(this).next('.editName').css('display','block');
				$(this).addClass('open');
			} else {
				$(this).next('.editName').css('display','none');
				$(this).removeClass('open');
			}
			
		});

        $('body').on('change', '.services_ghn, .pick_fee_ship_ghn', function() {
            getFeeShippingGHTK(1);
        });
        $('body').on('click','.nemberjoingroupzalo',function(){
            var groupnember = [];
            var check = 0;
            $('.nembergroup:checked').each(function(i,m){
                groupnember.push($(this).val());
                check = 1;
            });
            if (check == 0) {
                 alertBox('Vui lòng chọn bạn bè',"danger",false,true,true);
                return false;
            }
            var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
            var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
            var name_profile = $('.profile_'+id_profile).attr('data-name');
            var image_profile = $('.profile_'+id_profile).attr('data-image');
            var cookie = $('.profile_'+id_profile).attr('data-cookie');
            var enk = $('.profile_'+id_profile).attr('data-env');
            var param = '{"cookie":"'+cookie+'","serectkey":"'+enk+'","id_profile":"'+id_profile+'","idto":"'+idto+'","groupnember":'+JSON.stringify(groupnember)+'}';
            socket.emit('nemberjoingroup',param);
        });

        $('.selecttinh').change(function() {
            var params = {};
            params['id_tp'] = $(this).val();
            params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
            $.ajax({
                url: '{{ url("chatprofile/home/gethuyen") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: params,
                success: function( data, textStatus, jQxhr ){
                    var html = '<option selected="" value="0" data-name="">-- Chọn Quận/Huyện --</option>';
                    $.each(data,function(i,m){
                        html += '<option value="'+m.maqh+'" data-name="">'+m.name+'</option>';
                    })
                    $('.quanhuyen').html(html);
                },
                error: function( jqXhr, textStatus, errorThrown ){
                },
                complete: function(data, textStatus, jQxhr){
                }

            });
        });

        $('#pick_order_thanhpho,#pick_order_quanhuyen').on('change',function(){
            var thisname = $(this).attr('name');
            var id_select = $(this).val();
            if (thisname == 'pick_order_thanhpho') {
                var actions = 1;
                $('#pick_order_xaphuong').html('<option selected="" value="0" data-name="">-- Không có dữ liệu --</option>');
            }
            if (thisname == 'pick_order_quanhuyen') {
                var actions = 2;
            }
            if (typeof actions !== 'undefined') {
                var params = {};
                params['actions'] = actions;
                params['id_select'] = id_select;
                params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
                $.ajax({
                    url: '{{ url("chatprofile/home/ajaxdatathanhpho") }}',
                    dataType: 'json',
                    type: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: params,
                    success: function( data, textStatus, jQxhr ){
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                    },
                    complete: function(data, textStatus, jQxhr){

                        var html_first = '';
                        var html = '';
                        
                        if (actions == 2) {
                            html_first = '<option selected="" value="0" data-name="">-- Chọn Xã/Phường --</option>';
                        }
                        if (actions == 1) {
                            html_first = '<option selected="" value="0" data-name="">-- Chọn Quận/Huyện --</option>';
                        }
                        
                        $.each ($.parseJSON(data.responseText), function (key, item){
                            html += '<option value="'+item['id']+'" data-name="'+item['name']+'">'+item['name']+'</option>';
                        });
                        if (html == '') {
                            html_first = '';
                            html = '<option selected="" value="0" data-name="">-- Không có dữ liệu --</option>';
                        }
                        
                        if (actions == 2) {
                            $('#pick_order_xaphuong').html(html_first + html);
                        }
                        if (actions == 1) {
                            $('#pick_order_quanhuyen').html(html_first + html);
                        }
                    }

                });
                
            }
        });

        $('#order_thanhpho_ghn').on('change',function(){
            var thisname = $(this).attr('name');
            var id_select = $(this).val();
            if (thisname == 'order_thanhpho_ghn') {
                var actions = 3;
                $('#order_xaphuong_ghn').html('<option selected="" value="0" data-name="">-- Không có dữ liệu --</option>');
            }
            if (typeof actions !== 'undefined') {

                var params = {};
                params['actions'] = actions;
                params['id_select'] = id_select;
                params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
                $.ajax({
                    url: '{{ url("chatprofile/home/ajaxdatathanhpho") }}',
                    dataType: 'json',
                    type: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: params,
                    success: function( data, textStatus, jQxhr ){
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                    },
                    complete: function(result, textStatus, jQxhr){

                        var html_first = '';
                        var html = '';
                        
                        if (actions == 3) {
                            html_first = '<option selected="" value="0" data-wardname="">-- Chọn Xã/Phường --</option>';
                        }
                        
                        $.each ($.parseJSON(result.responseText), function (key, item){
                            html += '<option value="'+item['wardcode']+'" data-wardname="'+item['wardname']+'">'+item['wardname']+'</option>';
                        });
                        if (html == '') {
                            html_first = '';
                            html = '<option selected="" value="0" data-wardname="">-- Không có dữ liệu --</option>';
                        }
                        
                        if (actions == 3) {
                            $('#order_xaphuong_ghn').html(html_first + html);
                        }
                    }

                });
            }
        });
        $('#pick_order_thanhpho_ghn').on('change',function(){
            var thisname = $(this).attr('name');
            var id_select = $(this).val();
            if (thisname == 'pick_order_thanhpho_ghn') {
                var actions = 3;
                $('#pick_order_xaphuong_ghn').html('<option selected="" value="0" data-name="">-- Không có dữ liệu --</option>');
            }
            if (typeof actions !== 'undefined') {


                var params = {};
                params['actions'] = actions;
                params['id_select'] = id_select;
                params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
                $.ajax({
                    url: '{{ url("chatprofile/home/ajaxdatathanhpho") }}',
                    dataType: 'json',
                    type: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: params,
                    success: function( data, textStatus, jQxhr ){
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                    },
                    complete: function(result, textStatus, jQxhr){
                        var html_first = '';
                        var html = '';
                        
                        if (actions == 3) {
                            html_first = '<option selected="" value="0" data-wardname="">-- Chọn Xã/Phường --</option>';
                        }
                        
                        $.each ($.parseJSON(result.responseText), function (key, item){
                            html += '<option value="'+item['wardcode']+'" data-wardname="'+item['wardname']+'">'+item['wardname']+'</option>';
                        });
                        if (html == '') {
                            html_first = '';
                            html = '<option selected="" value="0" data-wardname="">-- Không có dữ liệu --</option>';
                        }
                        
                        if (actions == 3) {
                            $('#pick_order_xaphuong_ghn').html(html_first + html);
                        }
                    }

                });
            }
        });
        $('.cl_change_type_shipping, #pick_order_thanhpho, #pick_order_thanhpho_ghn, #pick_order_quanhuyen, #pick_order_xaphuong, #pick_order_xaphuong_ghn, #order_thanhpho, #order_thanhpho_ghn, #order_quanhuyen, #order_xaphuong, #order_xaphuong_ghn, .pick_transport, .pick_fee_ship').on('change', function() {
            getFeeShipping();
        });
        $('.pick_address, .pick_value_money, .pick_length, .pick_width, .pick_height').on('blur', function() {
            getFeeShipping();
        });
        $('.quanhuyen').change(function() {
            var params = {};
            params['id_xa'] = $(this).val();
            params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
            $.ajax({
                url: '{{ url("chatprofile/home/getxa") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: params,
                success: function( data, textStatus, jQxhr ){
                    var html = '<option selected="" value="0" data-name="">-- Chọn Xã/Phường --</option>';
                    $.each(data,function(i,m){
                        html += '<option value="'+m.xaid+'" data-name="">'+m.name+'</option>';
                    })
                    $('.xaphuong').html(html);
                },
                error: function( jqXhr, textStatus, errorThrown ){
                },
                complete: function(data, textStatus, jQxhr){
                }

            });
        });
        
        $('.ajaxsearchproduct').on('keyup',function(){
            var params = {};
            params['key'] = $(this).val();
            params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
            $.ajax({
                url: '{{ url("chatprofile/home/searchproduct") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: params,
                success: function( data, textStatus, jQxhr ){
                },
                error: function( jqXhr, textStatus, errorThrown ){
                },
                complete: function(data, textStatus, jQxhr){
                    var html = '';
                    if (data.responseText != '[]') {
                        html += '<div class="addproducttoorder">';
                            html += '<div style="width: 25%;"><b>Ảnh</b></div>';
                            html += '<div style="width: 50%;"><span><b>Tên sản phẩm</b></span></div>';
                            html += '<div style="width: 25%;"><span><b>giá</b></span></div>';
                            html += '<div style="border-color:#000;" class="mix-border-bottom"></div>';
                        html += '</div>';
                        $.each ($.parseJSON(data.responseText), function (key, item){
                            if (item.qty != null) {
                                var qty = item.qty;
                                nameproduct = item.product_name+' - '+item.name_comb+' (SL: '+item.qty+')';
                            } else {
                                var qty = item.qty_pro;
                                nameproduct = item.product_name+' (SL: '+item.qty_pro+')';
                            }
                            html += '<div qty_product="'+qty+'" id_comb="'+item.id+'" id_product="'+item.id_product+'" onclick="addproducttoorder(this)" class="addproducttoorder">';
                                if (item.img != '') {
                                    html += '<div style="width: 25%;"><img width="100" height="100" src="'+JSON.parse(item.img)[0]+'"></div>';
                                } else {
                                    html += '<div style="width: 25%;"><img width="100" height="100" src=""></div>';
                                }
                                html += '<div style="width: 50%;"><span class="bt_name_product_choose">'+nameproduct+'</span></div>';
                                if (item.price_comb != null) {
                                    html += '<div style="width: 25%;"><span class="bt_price_product_choose" data-price="'+item.price_comb+'">'+item.price_comb+' đ</span></div>';
                                } else {
                                    html += '<div style="width: 25%;"><span class="bt_price_product_choose" data-price="'+item.price_sale+'">'+item.price_sale+' đ</span></div>';
                                }
                                html += '<div class="mix-border-bottom"></div>';
                            html += '</div>';
                        });
                        $('.bt-result-search-item').html(html).css('display','block');
                    } else {
                        $('.bt-result-search-item').html('không có kết quả').css('display','block');
                    }
                }

            });
        });

        $('#saveordershop').on('click',function(){
        var vali = 1;
        var checkqty = 0;
        if ($('.content-product-add>tr').length < 1) {
            alert('Đơn hàng phải có sản phẩm');
            return false;
        };
        $('.form_add_order').find('input').each(function(){
            var attr = $(this).attr('type');
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            if (attr == 'email' && !testEmail.test($( this ).val()) && $( this ).val() != '') {
                $(this).css('border-color','red');
                $(this)[0].scrollIntoView({
                    block: "start",
                    behavior: "smooth"
                });
                return false;
            }
            if (attr == 'tel' && !validPhone($(this).val()) && $( this ).val() != '') {
                $(this).css('border-color','red');
                $(this)[0].scrollIntoView({
                    block: "start",
                    behavior: "smooth"
                });
                return false;
            }
            if( ! $( this ).prop( 'required' )){

            } else {
                if ( ! $( this ).val() ) {
                    $(this).css('border-color','red');
                    vali = 0;
                    $(this)[0].scrollIntoView({
                        block: "start",
                        behavior: "smooth"
                    });
                    return false;
                } else {
                    $(this).css('border-color','');
                }

            }
            if ($(this).hasClass('arrqtyproduct') && (parseInt($(this).val()) > parseInt($(this).attr('max')))) {
                    $(this).css('border-color','red');
                    vali = 0;
                    checkqty = 1;
            }
        });
        $('.form_add_order').find('select').not('#order_thanhpho_ghn, #order_xaphuong_ghn, #order_xaphuong, #pick_order_thanhpho_ghn, #pick_order_xaphuong_ghn, #pick_order_xaphuong, .cl_change_type_shipping, #bt_change_type_discount').each(function(){
            if ($(this).find('option:selected').val() == "0" && $('.cl_change_type_shipping option:selected').val() == "0") {
                $(this).css('border-color','red');
                vali = 0;
                $(this)[0].scrollIntoView({
                    block: "start",
                    behavior: "smooth"
                });
                return false;
            } else {
                $(this).css('border-color','');
            }
        });
        $('.form_add_order').find('select').not('#order_thanhpho, #order_quanhuyen, #order_xaphuong, #pick_order_thanhpho, #pick_order_quanhuyen, #pick_order_xaphuong, .cl_change_type_shipping, #bt_change_type_discount').each(function(){
            if ($(this).find('option:selected').val() == "0" && $('.cl_change_type_shipping option:selected').val() == "1") {
                $(this).css('border-color','red');
                vali = 0;
                $(this)[0].scrollIntoView({
                    block: "start",
                    behavior: "smooth"
                });
                return false;
            } else {
                $(this).css('border-color','');
            }
        });
        if (vali == 0) {
            return false;
        }
        $('.phone_client, .address_client, .pick_phone, .pick_address, .pick_phone_ghn, .pick_address_ghn').css('border', '1px solid #d2d6de');
        if (!validPhone($('.pick_phone').val()) && $('.cl_change_type_shipping option:selected').val() == "0") {
            $('.pick_phone').css('border', '1px solid #ff0000');
            $('.pick_phone')[0].scrollIntoView({
                block: "start",
                behavior: "smooth"
            });
            return false;
        }
        if (!validPhone($('.pick_phone_ghn').val()) && $('.cl_change_type_shipping option:selected').val() == "1") {
            $('.pick_phone_ghn').css('border', '1px solid #ff0000');
            alert('Số điện thoại của thông tin lấy hàng không hợp lệ!');
            $('.pick_phone_ghn')[0].scrollIntoView({
                block: "start",
                behavior: "smooth"
            });
            return false;
        }
        if ($('.pick_address').val() == '' && $('.cl_change_type_shipping option:selected').val() == "0") {
            $('.pick_address').css('border', '1px solid #ff0000');
            $('.pick_address')[0].scrollIntoView({
                block: "start",
                behavior: "smooth"
            });
            return false;
        }
        if ($('.pick_address_ghn').val() == '' && $('.cl_change_type_shipping option:selected').val() == "1") {
            $('.pick_address_ghn').css('border', '1px solid #ff0000');
            alert('Địa chỉ lấy hàng không được để trống!');
            $('.pick_address_ghn')[0].scrollIntoView({
                block: "start",
                behavior: "smooth"
            });
            return false;
        }
        if (typeof $('.services_ghn:checked').val() == 'undefined' && $('.cl_change_type_shipping option:selected').val() == "1") {
            alert('Chưa chọn Dịch vụ!');
            $('.services_ghn')[0].scrollIntoView({
                block: "start",
                behavior: "smooth"
            });
            return false;
        }
        if (checkqty == 1) {
            alert('Số lượng sản phẩm không đủ');
        }
        if (vali == 1) {
            var formdata = new FormData($(".form_add_order")[0]);
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var data_product_order = [];
            jQuery.each( $('.tr_product_order'), function( i, val ) {
                data_product_order[i] = {
                    id_product: $(val).find('.arridproductoreder').val(),
                    qty_product: $(val).find('.arrqtyproduct').val(),
                    comb_product: $(val).find('.arridpcomboreder').val(),
                    weight_product: $(val).find('.arrweightproduct').val(),
                };
            });
            var json_data_product_order = JSON.stringify(data_product_order);
            var id_cli = $('#tinnhandangdoc').attr('data-idhoithoai');
            var name_cli = $('#order_name_client').val();
            var email_cli = $('#order_email_client').val();
            var phone_cli = $('#order_phone_client').val();
            var address_cli = $('#order_address_client').val();
            var order_thanhpho = $('.selecttinh').val();
            var order_quanhuyen = $('.quanhuyen').val();
            var order_xaphuong = $('.xaphuong').val();
            var order_note = $('#order_note').val();
            var order_ship_price = $('#order_ship_price').val();
            var order_disscount = $('#order_disscount').val();
            
            var change_type_shipping = $('.cl_change_type_shipping option:selected').val();
            var pick_province = $('#pick_order_thanhpho option:selected').attr('data-name');
            var pick_district = $('#pick_order_quanhuyen option:selected').attr('data-name');
            var pick_ward = $('#pick_order_xaphuong option:selected').attr('data-name');
            var pick_phone = $('.pick_phone').val();
            var pick_address = $('.pick_address').val();
            var pick_note = $('.pick_note').val();
            var pick_value_money = $('.pick_value_money').val();
            var transport = $('.pick_transport:checked').val();
            var pick_fee_ship = $('.pick_fee_ship:checked').val();
            var final_price_order = $('input[name="bt-calorder"]').val();
            
            var order_thanhpho_ghn = $('#order_thanhpho_ghn option:selected').val();
            var order_xaphuong_ghn = $('#order_xaphuong_ghn option:selected').val();
            var pick_order_thanhpho_ghn = $('#pick_order_thanhpho_ghn option:selected').val();
            var pick_order_xaphuong_ghn = $('#pick_order_xaphuong_ghn option:selected').val();
            var pick_phone_ghn = $('.pick_phone_ghn').val();
            var pick_address_ghn = $('.pick_address_ghn').val();
            var pick_note_ghn = $('.pick_note_ghn').val();
            var pick_value_money_ghn = $('.pick_value_money_ghn').val();
            var pick_length = $('.pick_length').val();
            var pick_width = $('.pick_width').val();
            var pick_height = $('.pick_height').val();
            var pick_notecode_ghn = $('#pick_notecode_ghn option:selected').val();
            var services_ghn = $('.services_ghn:checked').val();
            var pick_fee_ship_ghn = $('.pick_fee_ship_ghn:checked').val();
            
            // formdata.append('config_item('csrf_token_name') }}', getCookie('{ config_item('csrf_cookie_name') }}'));
            // formdata.append('json_data_product_order', json_data_product_order);
            // formdata.append('phone_cli', phone_cli);
            // formdata.append('id_cli', id_cli);
            // formdata.append('name_cli', name_cli);
            // formdata.append('email_cli', email_cli);
            // formdata.append('address_cli', address_cli);
            // formdata.append('order_thanhpho', order_thanhpho);
            // formdata.append('order_quanhuyen', order_quanhuyen);
            // formdata.append('order_xaphuong', order_xaphuong);
            // formdata.append('order_note', order_note);
            // formdata.append('order_ship_price', order_ship_price);
            // formdata.append('order_disscount', order_disscount);
            
            // formdata.append('change_type_shipping', change_type_shipping);
            // formdata.append('pick_province', pick_province);
            // formdata.append('pick_district', pick_district);
            // formdata.append('pick_ward', pick_ward);
            // formdata.append('pick_phone', pick_phone);
            // formdata.append('pick_address', pick_address);
            // formdata.append('pick_note', pick_note);
            // formdata.append('pick_value_money', pick_value_money);
            // formdata.append('transport', transport);
            // formdata.append('pick_fee_ship', pick_fee_ship);
            // formdata.append('final_price_order', final_price_order);
            
            // formdata.append('order_thanhpho_ghn', order_thanhpho_ghn);
            // formdata.append('order_xaphuong_ghn', order_xaphuong_ghn);
            // formdata.append('pick_order_thanhpho_ghn', pick_order_thanhpho_ghn);
            // formdata.append('pick_order_xaphuong_ghn', pick_order_xaphuong_ghn);
            // formdata.append('pick_phone_ghn', pick_phone_ghn);
            // formdata.append('pick_address_ghn', pick_address_ghn);
            // formdata.append('pick_note_ghn', pick_note_ghn);
            // formdata.append('pick_value_money_ghn', pick_value_money_ghn);
            // formdata.append('pick_length', pick_length);
            // formdata.append('pick_width', pick_width);
            // formdata.append('pick_height', pick_height);
            // formdata.append('pick_notecode_ghn', pick_notecode_ghn);
            // formdata.append('services_ghn', services_ghn);
            // formdata.append('pick_fee_ship_ghn', pick_fee_ship_ghn);
            var params = {};
            params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
            params['json_data_product_order'] = json_data_product_order;
            params['pick_order_thanhpho'] = $('#pick_order_thanhpho').val();
            params['pick_order_quanhuyen'] = $('#pick_order_quanhuyen').val();
            params['pick_order_xaphuong'] = $('#pick_order_xaphuong').val();
            params['phone_cli'] = phone_cli;
            params['id_cli'] = id_cli;
            params['name_cli'] = name_cli;
            params['email_cli'] = email_cli;
            params['address_cli'] = address_cli;
            params['order_thanhpho'] = order_thanhpho;
            params['order_quanhuyen'] = order_quanhuyen;
            params['order_xaphuong'] = order_xaphuong;
            params['order_note'] = order_note;
            params['order_ship_price'] = order_ship_price;
            params['order_disscount'] = order_disscount;
            params['change_type_shipping'] = change_type_shipping;
            params['pick_province'] = pick_province;
            params['pick_district'] = pick_district;
            params['pick_ward'] = pick_ward;
            params['pick_phone'] = pick_phone;
            params['pick_address'] = pick_address;
            params['pick_note'] = pick_note;
            params['pick_value_money'] = pick_value_money;
            params['transport'] = transport;
            params['pick_fee_ship'] = pick_fee_ship;
            params['final_price_order'] = final_price_order;
            params['order_thanhpho_ghn'] = order_thanhpho_ghn;
            params['order_xaphuong_ghn'] = order_xaphuong_ghn;
            params['pick_order_thanhpho_ghn'] = pick_order_thanhpho_ghn;
            params['pick_order_xaphuong_ghn'] = pick_order_xaphuong_ghn;
            params['pick_phone_ghn'] = pick_phone_ghn;
            params['pick_address_ghn'] = pick_address_ghn;
            params['pick_note_ghn'] = pick_note_ghn;
            params['pick_value_money_ghn'] = pick_value_money_ghn;
            params['pick_length'] = pick_length;
            params['pick_width'] = pick_width;
            params['pick_height'] = pick_height;
            params['pick_notecode_ghn'] = pick_notecode_ghn;
            params['services_ghn'] = services_ghn;
            params['pick_fee_ship_ghn'] = pick_fee_ship_ghn;
            
            $.ajax({
                url: '{{ url("chatprofile/home/saveordershop") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: params,
                success: function( data, textStatus, jQxhr ){
                    alertBox('Tạo đơn hàng thành công',"success",false,true,true);
                    $('.taodonhang').fadeOut('slow');
                },
                error: function( jqXhr, textStatus, errorThrown ){
                },
                complete: function(data, textStatus, jQxhr){
                }

            });
        }
    });


        $('body').on('click','.fa-header-icon-member', function(){
            var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
            if (typeof(listfriend[id_profile]) !== 'undefined') {
                var html = '';
                $.each(listfriend[id_profile], function(i,m){
                    html += '<div class="bt-item-fp" title="">';
                    html += '<label style="width: 100%">';
                    html += '<input type="checkbox" class="nembergroup checkbox checkbox-style" name="selectGroup['+i+']" id="selectgroup_'+m.userId+'" value="'+m.userId+'">';
                    html += '<label for="selectgroup_'+m.userId+'"></label>';
                    html += '<img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 50px;height: 50px;" src="'+m.avatar+'">';
                    html += '<span>'+m.zaloName+'</span></label></div>';
                });
                $('.listfriendjoingroup').html(html);
            }
            $("#nemberjoingroup").modal();
        });
		$('body').on('click','.openmutilchat', function(){
			var _token = $('input[name="_token"]').val(); 
			var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
			var idcl = $('#tinnhandangdoc').attr('data-idclid');

			var isgroup = $('#tinnhandangdoc').attr('data-group');
			var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
			var image_user = $('.on_'+idto+'').attr('data-img');
			var name_user = $('.on_'+idto+ ' .item-title-name').html();
			var params = {};
			params['id_user'] = idto;
			params['id_profile'] = id_profile;
			params['name_user'] = name_user;
			params['image_user'] = image_user;
			params['isgroup'] = isgroup;
			params['contentmess'] = $('#messageViewScroll').html();
			var contentmess = $('#messageViewScroll').html();
			params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
			$.ajax({
				url: '{{ url("chat/inboxpopup") }}',
				dataType: 'json',
				type: 'post',
				contentType: 'application/x-www-form-urlencoded',
				data: {id_user:idto, id_profile:id_profile, name_user:name_user, image_user:image_user ,isgroup:isgroup, contentmess:contentmess, _token:_token},
				success: function( data, textStatus, jQxhr ){
					// datatag = data;
				// console.log(datatag);
			},
			error: function( jqXhr, textStatus, errorThrown ){
			},
			complete: function(data, textStatus, jQxhr){
				$('body').append(data.responseText);
				$(this).parents('.chatzalov2').find('.bt-load-inbox-content-'+idto).html($(this).parents('.chatzalov2').find('#messageViewScroll').html());
				$(this).parents('.chatzalov2').find('.bt-load-inbox-content-'+idto).scrollTop($(this).parents('.chatzalov2').find('.bt-load-inbox-content-'+idto)[0].scrollHeight - $(this).parents('.chatzalov2').find('.bt-load-inbox-content-'+idto)[0].clientHeight);
					// $('#materialPreloader').hide();
					// $('.bt-make-input').val('');
				}
			});
		});
		// $('.nav-link').on('click',function(){

		// 	var id = $(this).attr('href');

		// 	$('.tab-pane').removeClass('active');
		// 	$('.tab-pane').addClass('fade');
		// 	$(''+id+'').removeClass('fade');
		// 	$(''+id+'').addClass('active');
		// });
////////////////////
$('#imagechiendich').change(function(){ 
		var file = this.files[0];
		 var _token = $('.chiendich input[name="_token"]').val(); 
		    var formData = new FormData($('.uploadimgproduct')[0]);
		    //console.log(formData);
		    formData.append('_token', _token);
		//console.log(file);
		    
		     //console.log(_token);
		    var totlsize = file.size;
		            if (totlsize > 512000) {
		                alertBox('Hiện tại chúng tôi chỉ cho phép ảnh dưới 0.5MB',"danger",false,true,true);
		                return false;
		      }
		       $.ajax({
			      url:"{{ route('uploadimage') }}", 
			      method:"POST", 
			      data:formData,
			      contentType: false,
			      processData: false,
			      beforeSend: function() {
			      },
			      success:function(data){
			      imgchiendich = data.path;

			      
			     }
			   });

    
});

$('#imgsendgroup').change(function(){ 
		var file = this.files[0];
		 var _token = $('input[name="_token"]').val(); 
		    var formData = new FormData($('.uploadimggroup')[0]);
		    //console.log(formData);
		    formData.append('_token', _token);
		//console.log(file);
		    
		     //console.log(_token);
		    var totlsize = file.size;
		            if (totlsize > 512000) {
		                alertBox('Hiện tại chúng tôi chỉ cho phép ảnh dưới 0.5MB',"danger",false,true,true);
		                return false;
		      }
		       $.ajax({
			      url:"{{ route('uploadimage') }}", 
			      method:"POST", 
			      data:formData,
			      contentType: false,
			      processData: false,
			      beforeSend: function() {
			      },
			      success:function(data){
			      imgsendgroup= data.path;
                   console.log(imgsendgroup);
			      
			     }
			   });

    
});

$('#file').change(function(){ 
    var file = this.files[0];
    var formData = new FormData($('#fileimage')[0]);
    formData.append('csrf_kingposter', _token);
//console.log(file);
     var _token = $('input[name="_token"]').val(); 
    var totlsize = file.size;
            if (totlsize > 512000) {
                alertBox('Hiện tại chúng tôi chỉ cho phép ảnh dưới 0.5MB',"danger",false,true,true);
                return false;
      }
     //console.log(_token);
     $.ajax({
      url:"{{ route('uploadimage') }}", 
      method:"POST", 
      data:formData,
      contentType: false,
      processData: false,
      beforeSend: function() {
      },
      success:function(data){
       var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
						 var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
	                    var idcl = $('#tinnhandangdoc').attr('data-idclid');

	                    var isgroup = $('#tinnhandangdoc').attr('data-group');
	                    var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
	                    var name_profile = $('.profile_'+id_profile).attr('data-name');
	                    var image_profile = $('.profile_'+id_profile).attr('data-image');
	                    var cookie = $('.profile_'+id_profile).attr('data-cookie');
	                    var enk = $('.profile_'+id_profile).attr('data-env');
	                    var content_c = $(this).parents('.chatzalov2').find('.bt-input-note').val();
	                    // var content_chat =  $('.bt-input-note').val();
	                    savemess(1);
						if (isgroup == 0) {
							var sizeimage = getImageSizeInBytes(data.path);
	                        var url_arr = data.path.split("/");
	                        var filename  = url_arr[url_arr.length-1];
	                        var height = 0;
		                 	var width = 0;
		                 	var img = new Image();
		                 	img.src = data.path;
								img.onload = function(){
								   height = img.height;
								   width = img.width;
								
								  
								}
                             //console.log(sizeimage);
                            var time = new Date().getTime();
                            var param = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"toid":"'+idto+'","chunkId":1}';
                          //console.log(param);
							var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(enk),options).ciphertext.toString(CryptoJS.enc.Base64);
	                        var data = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.path+'","encrypted":"'+encrypted+'","filename":"'+filename+'"}';
	                        //cosole.log(data);
	                         // console.log(encrypted);
	                        var params = {};
	                        params['data'] = data;
	                        params['csrf_kingposter'] = _token;
	                        //console.log();
	                        $.ajax({
                            url: '{{ url("chat/postimage") }}',
                            dataType: 'json',
                            type: 'post',
                            contentType: 'application/x-www-form-urlencoded',
                            data: {data:data, _token:_token},
                            success: function( data, textStatus, jQxhr ){
                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(enk),options).toString(CryptoJS.enc.Utf8);
                                var result =  JSON.parse(decrypted);
                                //console.log(result);
                                sendimage(result.data.photoId,content_c,idto,result.data.normalUrl,result.data.thumbUrl,result.data.normalUrl,result.data.hdUrl,cookie,enk,id_profile,width,height);
                            },
                            error: function( jqXhr, textStatus, errorThrown ){
                            },
                            complete: function(data, textStatus, jQxhr){
                                // $('.bt-all-comment').html(data.responseText);
                                // $('#materialPreloader').hide();
                                // $('.bt-make-input').val('');
                            }
                        });
							
						} else {
							// var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.path+'"}';
							// socket.emit('sendimagegroup',param);
						}
     }
   });
 });
		////////////
		// $('#file').change(function() {
		// 	var content_c = $(this).parents('.chatzalov2').find('.bt-input-note').val();
			
  //            var file = this.files[0];

  //           //console.log(file.size);
  //           var totlsize = file.size;
  //           if (totlsize > 512000) {
  //               alertBox('Hiện tại chúng tôi chỉ cho phép ảnh dưới 0.5MB',"danger",false,true,true);
  //               return false;
  //           }
  //           var _token = $('input[name="_token"]').val();
		// 	var formData = new FormData($('#fileimage')[0]);
		// 	//console.log(formData);
		// 	//formData.append('url', '{  url("") }}');
		// 	formData.append('csrf_kingposter',_token);
			
		// 	//console.log(formData);
		// 	$.ajax({
		// 	    type: "POST",
		// 	    url: '{ route("uploadimg") }}',
		// 	    data:formData,
		// 	    //use contentType, processData for sure.
		// 	    contentType: false,
		// 	    processData: false,
		// 	    beforeSend: function() {
		// 	    },
		// 	    success: function(data) {
		// 	    	//console.log(data);
		// 	    	var data = JSON.parse(data);
		// 	    	if (data.status == 400) {
		// 	    		alertBox('Định dạng tập tin không hợp lệ',"danger",false,true,true);
		// 				return false;
		// 	    	} else {
		// 	    		var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
		// 				var idcl = $('#tinnhandangdoc').attr('data-idclid');

		// 				var isgroup = $('#tinnhandangdoc').attr('data-group');
		// 				var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
		// 				var name_profile = $('.profile_'+id_profile).attr('data-name');
		// 				var image_profile = $('.profile_'+id_profile).attr('data-image');
		// 				var cookie = $('.profile_'+id_profile).attr('data-cookie');
		// 				var enk = $('.profile_'+id_profile).attr('data-env');
		// 				// var content_chat =  $('.bt-input-note').val();
  //                       savemess(1);
		// 				if (isgroup == 0) {
		// 					var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.path+'"}';
		// 					socket.emit('sendimageprofile',param);
		// 				} else {
		// 					var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.path+'"}';
		// 					socket.emit('sendimagegroup',param);
		// 				}
		// 	    	}
		// 	    },
		// 	    error: function() {
		// 	    }
		// 	});
		// });
            $("#file2").change(function() {
                var file = this.files[0];
                var formData = new FormData($('#upfile')[0]);
                var _token = $('.inputfile-container input[name="_token"]').val();
                formData.append('csrf_kingposter', _token);
                //console.log(formData);
                $.ajax({
                    url:"{{ route('uploadfile') }}", 
				      method:"POST", 
				      data:formData,
				      contentType: false,
				      processData: false,
                    beforeSend: function() {
                    },
                    success: function(data) {
                        //var data = JSON.parse(data);
                        //console.log(data.status);
                        if (data.status == 400) {
                            alertBox('Định dạng tập tin không hợp lệ',"danger",false,true,true);
                            return false;
                        } else {
                           var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
							var idcl = $('#tinnhandangdoc').attr('data-idclid');

							var isgroup = $('#tinnhandangdoc').attr('data-group');
							var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
							var name_profile = $('.profile_'+id_profile).attr('data-name');
							var image_profile = $('.profile_'+id_profile).attr('data-image');
							var cookie = $('.profile_'+id_profile).attr('data-cookie');
							var enk = $('.profile_'+id_profile).attr('data-env');
							var content =  '';
							var url_file = data.path;
							var filename = data.file_name;
                            var time = new Date().getTime();
                            var checksum = data.checksum;
                            var extension = data.extension;
                            var file_size = data.file_size;
                            var fileName = data.file_name;
                            console.log(enk);
                            if (isgroup == 0) {
                              
                                var param ='{"totalChunk":1,"fileName":"'+data.file_name+'","clientId":'+time+',"totalSize":'+data.file_size+',"toid":"'+idto+'","chunkId":1}';

                                 var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(enk),options).ciphertext.toString(CryptoJS.enc.Base64);

                                $.ajax({
                                    url: '{{ url("chat/postfile") }}',
                                    dataType: 'json',
                                    type: 'post',
                                    contentType: 'application/x-www-form-urlencoded',
                                    data: {params:encrypted, cookie:cookie, url_file:url_file, filename:filename, _token:_token},
                                    success: function (data, textStatus, jQxhr) {

                                    var decrypted = CryptoJS.AES.decrypt({ciphertext: CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(enk), options).toString(CryptoJS.enc.Utf8);
                                       
                                        var result = JSON.parse(decrypted);
                                    //console.log(result);
                                    if(result.error_code == 201){
                                    	 alertBox(result.error_message,"f44336",false,true,true);
                                    }else{
                                       var param= '{"fileId":"'+result.data.fileId+'","checksum":"'+checksum+'","checksumSha":"","extension":"'+extension+'","totalSize":'+file_size+',"fileName":"'+fileName+'","clientId":'+result.data.clientFileId+',"fType":1,"fileCount":0,"fdata":"null","toid":"'+idto+'","fileUrl":"'+url_file+'","zsource":401}';
                                     var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(enk),options).ciphertext.toString(CryptoJS.enc.Base64);

                                      sendfilezalo(encrypted,cookie,_token,enk);
                                    }

                                    
                                       
                                    },
                                    error: function( jqXhr, textStatus, errorThrown ){
                                    	console.log("kjsdhfksdhfdshfkj");
                                    },
                                    complete: function(data, textStatus, jQxhr){
                                        
                                    }
                                });


                            } else {
                                var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content+'","id_profile":"'+id_profile+'","url_file":"'+data.path+'","checksum":"'+data.checksum+'"}';
                                socket.emit('sendfilegroup',param);
                            }
                        }
                    },
                    error: function() {
                    }
                });

            });


		$( ".accountaddgroup" ).change(function() {
			var id_account = $(this).val();
			if (typeof(listfriend[id_account]) !== 'undefined') {
				var html = '';
				$.each(listfriend[id_account], function(i,m){
					html += '<div class="bt-item-fp" title="">';
					html += '<label style="width: 100%">';
					html += '<input type="checkbox" class="friendaddgroup checkbox checkbox-style" name="selectGroup['+i+']" id="selectgroup_'+m.userId+'" value="'+m.userId+'">';
					html += '<label for="selectgroup_'+m.userId+'"></label>';
					html += '<img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 50px;height: 50px;" src="'+m.avatar+'">';
					html += '<span>'+m.zaloName+'</span></label></div>';
				});
				$('.listfriendbyid').html(html);
			}
		});

		$('.creategroupzalo').on('click',function(){
			var selectfriendv1 = [];
			var id_account = $('.accountaddgroup').val();
			var cookie = $('.profile_'+id_account).attr('data-cookie');
			var enk = $('.profile_'+id_account).attr('data-env');
			var check = 0;
			$('.friendaddgroup:checked').each(function(){
				check = 1;
				selectfriendv1.push($(this).val());

			});
			if ($('#namegroup').val() == '') {
				alertBox('Vui lòng nhập tên trò chuyện',"danger",false,true,true);
				return false;
			}
			if (check == 0) {
				alertBox('Vui lòng chọn bạn bè để thêm vào nhóm',"danger",false,true,true);
				return false;
			}
			if (selectfriendv1.length < 2  ) {
				alertBox('Cuộc trò chuyện phải hơn  hoặc bằng 3 thành viên',"danger",false,true,true);
				return false;
			}
			var paramgroup = '{"cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+$('#namegroup').val()+'","id_profile":"'+id_account+'","friend":'+JSON.stringify(selectfriendv1)+'}';
			socket.emit('creategroup',paramgroup);
		});
		

		$("body").on( 'click','.iup-image',function () {
			var content_c = $(this).parents('.chatzalov2').find('.bt-input-note').val();
            console.log(content_c);
            //$('#mediaLibModalImage').modal('show');
            // alert('bbbbbbb');
            $('#file').trigger( "click" );
            //getMediaLib(content_c);
			
		});
////link
 
////
function sendfilezalo(encrypted,cookie,_token,enk){

 $.ajax({ 
                                           
    url: '{{ url("chat/sendfile") }}',
    dataType: 'json',
    type: 'post',
    contentType: 'application/x-www-form-urlencoded',
    data: {param:encrypted, cookie:cookie, _token:_token},
    success: function (data, textStatus, jQxhr) {
    	var decrypted = CryptoJS.AES.decrypt({ciphertext: CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(enk), options).toString(CryptoJS.enc.Utf8);
    	var result = JSON.parse(decrypted);
    	
    	 if(result.error_code == 206){
    	 	alertBox(result.error_message,"f44336",false,true,true);
    	 }
     
    },
    error: function( jqXhr, textStatus, errorThrown ){
    	 
    },
    complete: function(data, textStatus, jQxhr){

    }
});

}
        function getMediaLib(content_c){
            $('#elfinderImage').elfinder({
                url : '{{url("upload/upload_image")}}',
                onlyMimes: ['image'],
                docked: false,
                lang: 'LANG_I18N',
                dialog: { width: 600, modal: true },
                closeOnEditorCallback: true,
                uiOptions: { toolbar : [
                    ['home','up'],['mkdir','upload'],['quicklook'],['rm'],['duplicate','rename'],['search'],['view']
                    ]},
                getFileCallback: function(data) {
                    
                    var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
                    var idcl = $('#tinnhandangdoc').attr('data-idclid');

                    var isgroup = $('#tinnhandangdoc').attr('data-group');
                    var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
                    var name_profile = $('.profile_'+id_profile).attr('data-name');
                    var image_profile = $('.profile_'+id_profile).attr('data-image');
                    var cookie = $('.profile_'+id_profile).attr('data-cookie');
                    var enk = $('.profile_'+id_profile).attr('data-env');
                    
                    savemess(1);
                    if (isgroup == 0) {

                        var sizeimage = getImageSizeInBytes(data.url);
                        var url_arr = data.url.split("/");
                        var filename  = url_arr[url_arr.length-1];
                        var width = 0;
                        var height = 0;
                        function getMeta(url, callback) {
                            var img = new Image();
                            img.src = url;
                            img.onload = function() { callback(this.width, this.height,this.size); }
                        }
                        getMeta(data.url,function(width, height,size) {
                            width = width;
                            height = height
                        });
                        var time = new Date().getTime();
                        var param = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"toid":"'+idto+'","chunkId":1}';
                        var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(enk),options).ciphertext.toString(CryptoJS.enc.Base64);
                        var data = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.url+'","encrypted":"'+encrypted+'","filename":"'+filename+'"}';
                        var params = {};
                        params['data'] = data;
                        params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
                        $.ajax({
                            url: '{{ url("chatprofile/home/postimage") }}',
                            dataType: 'json',
                            type: 'post',
                            contentType: 'application/x-www-form-urlencoded',
                            data: params,
                            success: function( data, textStatus, jQxhr ){
                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(enk),options).toString(CryptoJS.enc.Utf8);
                                var result =  JSON.parse(decrypted);
                                console.log(result);
                                sendimage(result.data.photoId,content_c,idto,result.data.normalUrl,result.data.thumbUrl,result.data.normalUrl,result.data.hdUrl,cookie,enk,id_profile,width,height);
                            },
                            error: function( jqXhr, textStatus, errorThrown ){
                            },
                            complete: function(data, textStatus, jQxhr){
                                
                            }
                        });

                    } else {
                        var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.url+'"}';


                        var sizeimage = getImageSizeInBytes(data.url);
                        var url_arr = data.url.split("/");
                        var filename  = url_arr[url_arr.length-1];
                        var width = 0;
                        var height = 0;
                        function getMeta(url, callback) {
                            var img = new Image();
                            img.src = url;
                            img.onload = function() { callback(this.width, this.height,this.size); }
                        }
                        getMeta(data.url,function(width, height,size) {
                            width = width;
                            height = height
                        });
                        var time = new Date().getTime();
                        var param = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"grid":"'+idto+'","chunkId":1}';
                        console.log(param);
                        var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(enk),options).ciphertext.toString(CryptoJS.enc.Base64);
                        var data = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.url+'","encrypted":"'+encrypted+'","filename":"'+filename+'"}';

                        var params = {};
                        params['data'] = data;
                        params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
                        $.ajax({
                            url: '{{ url("chatprofile/home/postimagegroup") }}',
                            dataType: 'json',
                            type: 'post',
                            contentType: 'application/x-www-form-urlencoded',
                            data: params,
                            success: function( data, textStatus, jQxhr ){
                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(enk),options).toString(CryptoJS.enc.Utf8);
                                var result =  JSON.parse(decrypted);
                                sendimagegroup(result.data.photoId,content_c,idto,result.data.normalUrl,result.data.thumbUrl,result.data.normalUrl,result.data.hdUrl,cookie,enk,id_profile,width,height);
                            },
                            error: function( jqXhr, textStatus, errorThrown ){
                            },
                            complete: function(data, textStatus, jQxhr){
                                
                            }
                        });
                        
                    }
                    $('#mediaLibModalImage').modal('hide');
                }
            }).elfinder('instance');
        }
		$('.anhienphanloai').on('click',function(){
			if ($(this).hasClass('fa-chevron-up')) {
				$(this).removeClass('fa-chevron-up');
				$(this).addClass('fa-chevron-down');
				$('.filter-tags').hide();
			} else {
				$(this).removeClass('fa-chevron-down');
				$(this).addClass('fa-chevron-up');
				$('.filter-tags').show();
			}
		});

		var el1 = $(".contentall").emojioneArea({
			placeholder: "Nhập tin nhắn ... (Bấm Shift + Enter để xuống dòng)",
			events: {
				keydown: function (editor, event) {
				},
				keyup: function (editor, event) {
					if(event.which == 13 && !event.shiftKey){
						editor.html('');
					}
				},
			}
		});
		$('body').keypress(function(e){
			
			if ($('#bt-id-user-inbox').val() != null) {
				var id_profile = $('#bt-id-user-inbox').val();
			}
			
			if ($('#bt-id-user').val() != null) {
				var id_profile = $('#bt-id-user').val();
			}
			var content = $(this).val();
			var that = this;

			if(e.which == 13 && !e.shiftKey){
				if ($(this).val() != '') {
                    
					var params = {};
					params['content'] = content;
					params['id_user'] = $('#tinnhandangdoc').attr('data-idhoithoai');
					params['id_profile'] = $('#tinnhandangdoc').attr('data-idprofile');
					params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
					$.ajax({
						url: '{{ url("chatprofile/home/addnote") }}',
						dataType: 'json',
						type: 'post',
						contentType: 'application/x-www-form-urlencoded',
						data: params,
						success: function( data, textStatus, jQxhr ){
							// var pr = 
							var name_profile = $('.profile_'+data.id_profile).attr('data-name');
							var html = '';
							html += '<div class="bt-tab-user-note-box" id="note_'+data.id_add+'">';
							html += '<div class="bt-content"><div class="bt-name-time">';
							html += '<span class="name"><b>'+name_profile+'</b></span><span class="time"><i>'+data.create_date+'</i></span><span class="time"><i onclick="deletenote('+data.id_add+')" class="fa fa-close delete-note-user"></i></span></div><div class="bt-note">'+data.content+'</div></div></div>';
							$('#btnote .bt-tab-user-note').append(html);
							
							return false;
						},
						error: function( jqXhr, textStatus, errorThrown ){
						},
						complete: function(data, textStatus, jQxhr){
							
						}
					});
				}
				e.preventDefault();
			}
		});
        $('body').on('click','.getinfogroupjoin',function(){
            var link = $(this).attr('data');
            $('.joingroup').attr('data',link);
            var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
            var name_profile = $('.profile_'+id_profile).attr('data-name');
            var image_profile = $('.profile_'+id_profile).attr('data-image');
            var cookie = $('.profile_'+id_profile).attr('data-cookie');
            var enk = $('.profile_'+id_profile).attr('data-env');
            var param = '{"cookie":"'+cookie+'","serectkey":"'+enk+'","id_profile":"'+id_profile+'","link":"'+link+'"}';
            socket.emit('getinfogroupjon',param);
        });
        
		$('body').on('click','.updatetag',function(){
			var el = $(this).parents('.chatzalov2');
			$(el).find('.tagbyprofile').hide();
			var id_user = $(this).attr('data-user');
			var id_profile = $(this).attr('data-profile');
			var color = $(this).attr('data-color');
			var text = $(this).attr('data-text');
			var id_tag = $(this).attr('data-idtag');
			var isgroup = $(this).attr('data-group');
			if ($(this).find('.fa-check').length == 1) {
				$(this).find('.fa-check').remove();
				$(el).find('.parent_'+id_user+' .conv-filter-label').html('');

				if (isgroup == 1) {
					var id_user_p = 'g'+id_user;
				} else {
					var id_user_p = id_user;
				}
				$.each(tagzalo[id_profile],function(i,m){
					if ($.inArray(id_user_p,m.conversations) !== -1) {
						m.conversations.splice($.inArray(id_user_p,m.conversations),1);
						// m.createTime = time;
					}
				});
			} else {

				$(el).find('.checktag').remove();
				$(this).find('a').append('<span class="fa fa-check checktag" style="margin-left: 5px;"></span>');
				var html = '<i class="fa fa-tag-icon-n" style="position: relative; top: -2px;"></i><div class="contentzalo">'+text+'</div>';
				if ($(el).find('.parent_'+id_user+' .item-content-container .conv-filter').hasClass('conv-filter-label')) {
					$(el).find('.parent_'+id_user+' .conv-filter-label').css('color',color);
					$(el).find('.parent_'+id_user+' .conv-filter-label').html(html);
				} else {
					var html = '<div class="conv-filter-label" style="color:'+color+';float:left;"><i class="fa fa-tag-icon-n" style="position: relative; top: -2px;"></i><div class="contentzalo">'+text+'</div></div>';
					$(el).find('.parent_'+id_user+' .item-content-container .conv-filter').html(html);
				}
				
				if (isgroup == 1) {
					var id_user_p = 'g'+id_user;
				} else {
					var id_user_p = id_user;
				}
				$.each(tagzalo[id_profile],function(i,m){
					if (id_tag == m.id) {
						m.conversations.push(id_user_p);
						// m.createTime = time;
					} else {
						
						if ($.inArray(id_user_p,m.conversations) !== -1) {
							m.conversations.splice($.inArray(id_user_p,m.conversations),1);
							// m.createTime = time;
						}
					}
				});
			}
			
			var time = new Date().getTime();
			
			versiontag[id_profile] = versiontag[id_profile]+1;
			var cookie = $('.profile_'+id_profile).attr('data-cookie');
			var enk = $('.profile_'+id_profile).attr('data-env');
			var param = '{"idto":"'+id_user+'","cookie":"'+cookie+'","serectkey":"'+enk+'","tag":'+JSON.stringify(tagzalo[id_profile])+',"id_profile":"'+id_profile+'","versiontag":"'+(versiontag[id_profile])+'"}';
			// console.log(param);
			socket.emit('updatetag',param);
		});

		$('body').on('click','.updatetagall',function(){


			var el = 'body';
			$('#questionMarkId').hide();
			var id_user = $(this).attr('data-user');
			var id_profile = $(this).attr('data-profile');
			var color = $(this).attr('data-color');
			var text = $(this).attr('data-text');
			var id_tag = $(this).attr('data-idtag');
			var isgroup = $(this).attr('data-group');
			if ($(this).find('.fa-check').length == 1) {
				$(this).find('.fa-check').remove();
				$(el).find('.parent_'+id_user+' .conv-filter-label').html('');

				if (isgroup == 1) {
					var id_user_p = 'g'+id_user;
				} else {
					var id_user_p = id_user;
				}
				$.each(tagzalo[id_profile],function(i,m){
					if ($.inArray(id_user_p,m.conversations) !== -1) {
						m.conversations.splice($.inArray(id_user_p,m.conversations),1);
						// m.createTime = time;
					}
				});
			} else {

				$(el).find('.checktag').remove();
				$(this).find('a').append('<span class="fa fa-check checktag" style="margin-left: 5px;"></span>');
				var html = '<i class="fa fa-tag-icon-n" style="position: relative; top: -2px;"></i><div class="contentzalo">'+text+'</div>';
				if ($(el).find('.parent_'+id_user+' .item-content-container .conv-filter').hasClass('conv-filter-label')) {
					$(el).find('.parent_'+id_user+' .conv-filter-label').css('color',color);
					$(el).find('.parent_'+id_user+' .conv-filter-label').html(html);
				} else {
					var html = '<div class="conv-filter-label" style="color:'+color+';float:left;"><i class="fa fa-tag-icon-n" style="position: relative; top: -2px;"></i><div class="contentzalo">'+text+'</div></div>';
					$(el).find('.parent_'+id_user+' .item-content-container .conv-filter').html(html);
				}
				
				if (isgroup == 1) {
					var id_user_p = 'g'+id_user;
				} else {
					var id_user_p = id_user;
				}
				$.each(tagzalo[id_profile],function(i,m){
					if (id_tag == m.id) {
						m.conversations.push(id_user_p);
						// m.createTime = time;
					} else {
						
						if ($.inArray(id_user_p,m.conversations) !== -1) {
							m.conversations.splice($.inArray(id_user_p,m.conversations),1);
							// m.createTime = time;
						}
					}
				});
			}
			
			var time = new Date().getTime();
			
			versiontag[id_profile] = versiontag[id_profile]+1;
			var cookie = $('.profile_'+id_profile).attr('data-cookie');
			var enk = $('.profile_'+id_profile).attr('data-env');
			var param = '{"idto":"'+id_user+'","cookie":"'+cookie+'","serectkey":"'+enk+'","tag":'+JSON.stringify(tagzalo[id_profile])+',"id_profile":"'+id_profile+'","versiontag":"'+(versiontag[id_profile])+'"}';
			// console.log(param);
			socket.emit('updatetag',param);
		});
		// $('.ReactVirtualized__Grid__innerScrollContainer').on('click','.bt-content-chat',function(){
  //             console.log('bt-content-chat');
		// });

		$('body').on('click','.bt-content-chat',function(){

			$('.bt-content-chat').removeClass('selected');
			$(this).addClass('selected');
			$(this).parents('.chatzalov2').find('.chatOnboard').hide();
			$(this).parents('.chatzalov2').find('.mainchatzalo').css('position','relative');
			$(this).parents('.chatzalov2').find('.mainchatzalo').show();
			// $('#chatOnboard').hide();
			// $('#mainchatzalo').show();
			var id_hoithoai = $(this).attr('data-hoithoai');
			var id_profile = $(this).attr('data-profile');
			var isgroup = $(this).attr('data-group');
			var img_user = $(this).attr('data-img');
			var timelastmess = $(this).find('.item-timestamp').html();
			$('#tinnhandangdoc').attr('data-group',isgroup);
			$('#tinnhandangdoc').attr('data-idhoithoai',id_hoithoai);
			$('#tinnhandangdoc').attr('data-idprofile',id_profile);

			var taghtml = '';
            if (typeof(tagzalo[id_profile]) != 'undefined') {
                $.each(tagzalo[id_profile], function(i,m){

                    if (typeof(m.text) != 'undefined') {
                        if ($.inArray(id_hoithoai,m.conversations) !== -1 || $.inArray('g'+id_hoithoai,m.conversations) !== -1) {
                            taghtml += '<li class="updatetag" data-profile="'+id_profile+'" data-user="'+id_hoithoai+'" data-color="'+m.color+'" data-text="'+m.text+'" data-idtag="'+m.id+'" data-group="'+isgroup+'"><span  style="color:'+m.color+'">'+m.text+'</span><span class="fa fa-check checktag" style="margin-left: 5px;"></span></li>';
                            // m.createTime = time;
                        } else {
                            taghtml += '<li class="updatetag" data-profile="'+id_profile+'" data-user="'+id_hoithoai+'" data-color="'+m.color+'" data-text="'+m.text+'" data-idtag="'+m.id+'" data-group="'+isgroup+'"><span style="color:'+m.color+';">'+m.text+'</span></li>';
                        }
                    }
                });
                if (taghtml == '') {
                	
                    $(this).parents('.chatzalov2').find('.tagbyprofile').html('<li>Không có thẻ tag</li>');
                    var value = '<input type="text" name="newName" placeholder="Tên gợi nhớ."><div onclick="addNewName()" class="submitAddName" data-profile="'+id_profile+'" data-user="'+id_hoithoai+'"><i class="fa fa-check-circle" aria-hidden="true" style="margin-left: 5px; color: #0068ff;font-size: 15px;"></i></div>';
                    $('.editName').html(value);
                } else {
                	
                    $(this).parents('.chatzalov2').find('.tagbyprofile').html(taghtml);
                    
                   
                }
                
            }
             var value = '<input type="text" name="newName" placeholder="Tên gợi nhớ."><div onclick="addNewName()" class="submitAddName" data-profile="'+id_profile+'" data-user="'+id_hoithoai+'"><i class="fa fa-check-circle" aria-hidden="true" style="margin-left: 5px; color: #0068ff;font-size: 15px;"></i></div>';
              $('.editName').html(value);
			// $('.tagbyprofile').html(taghtml);
			// getnodebyid(id_profile,id_hoithoai);
			var newarr = getUnique(hoithoai[id_hoithoai].tinnhans,'msgId');
			hoithoai[id_hoithoai].tinnhans = newarr;
			if (isgroup == 1) {
				$(this).parents('.chatzalov2').find('#ava_chat_box_view').find('.avatar').html($(this).parents('.chatzalov2').find('.avatarzalo').html());
			} else {
				$(this).parents('.chatzalov2').find('#ava_chat_box_view').find('.avatar').html('<div class="avatar-img " style="background-image: url('+img_user+')"></div>');
			}
			

			$(this).parents('.chatzalov2').find('.group-title').find('.truncate').html($(this).find('.item-title-name').html());
			// $('.group-title .truncate').html($(this).find('.item-title-name').html());
			//console.log(hoithoai[id_hoithoai]);
			if(hoithoai[id_hoithoai].isFr == 0){
				$(this).parents('.chatzalov2').find('.friendview').html('NGƯỜI LẠ');

				$(this).parents('.chatzalov2').find('.sendketban').html('<span class="badge bg-blue addfriendv2" data-translate-inner="STR_PROFILE_ADD_FRIEND" data-cookie="" data-env=""><i class="icon-user-plus mr-2"></i>Kết bạn</span>');

			}else{

				$(this).parents('.chatzalov2').find('.friendview').html('BẠN BÈ');
				$(this).parents('.chatzalov2').find('.sendketban').html('');

			}
			$(this).parents('.chatzalov2').find('.header-subtitle').html(timelastmess);
			// $('.header-subtitle').html(timelastmess);

			if (hoithoai[id_hoithoai].tinnhans.length > 0) {
				var html = '';
				hoithoai[id_hoithoai].tinnhans.sort(function(a, b){return a.ts - b.ts});
				// console.log(hoithoai[id_hoithoai].tinnhans);
				if(hoithoai[id_hoithoai].tinnhans.length <=10){
					var countRun = 0;
				}else{
					var countRun = hoithoai[id_hoithoai].tinnhans.length - 10;
				}
				for (var i = countRun; i < hoithoai[id_hoithoai].tinnhans.length; i++) {
					$('#tinnhandangdoc').attr('data-idclid',hoithoai[id_hoithoai].tinnhans[i].cliMsgId);

                    //console.log(hoithoai[id_hoithoai].tinnhans[i]);
                    
					var display = '';
					var img = '';

					var noidung = '';
					// var classme = '';
					// if (hoithoai[id_hoithoai].tinnhans[i].type == 1) {
					// 	classme = 'me';
					// }
					if (Array.isArray(hoithoai[id_hoithoai].tinnhans[i].noidung) === true || typeof(hoithoai[id_hoithoai].tinnhans[i].noidung) === 'object') {
						var pr = hoithoai[id_hoithoai].tinnhans[i].noidung;
						// console.log(hoithoai[id_hoithoai].tinnhans[i].noidung.params.catId);
						// return false;
						//console.log(hoithoai);
						if( typeof(hoithoai[id_hoithoai].tinnhans[i].noidung.catId) !== 'undefined'){
							if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
								noidung = '<span class="span-text-img">Tin nhắn đã được thu hồi<span/>';
							} else {
								noidung = '<span class="span-text-img"><img src="https://zalo-api.zadn.vn/api/emoticon/sticker/webpc?eid='+hoithoai[id_hoithoai].tinnhans[i].noidung.id+'&size=130" class="img-responsive" style="width: 100%"><span/>';
							}
						} else {
						 	// console.log(hoithoai[id_hoithoai].tinnhans[i].noidung);
						 	if (typeof(hoithoai[id_hoithoai].tinnhans[i].noidung.deleteMsg) !== 'undefined') {
						 		if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 			noidung = '<span class="span-text-img">Tin nhắn đã được thu hồi<span/>';
						 		} else {
						 			noidung = '<span class="span-text-img">Đã xóa tin nhắn<span/>';
						 		}
						 		
						 	} else {
						 		// console.log(hoithoai[id_hoithoai].tinnhans[i].msgType);
						 		if (hoithoai[id_hoithoai].tinnhans[i].msgType == 'chat.voice') {
						 			if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 				noidung = '<div><audio controls><source src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" type="audio/amr"></audio></div>';
						 			} else {
						 				noidung = '<div><audio controls><source src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" type="audio/amr"></audio></div>';
						 			}
						 		} else {
                                    //console.log(hoithoai[id_hoithoai]);
						 			var prs = JSON.parse(hoithoai[id_hoithoai].tinnhans[i].noidung.params);
						 			if (pr.thumb != '') {
						 				if (hoithoai[id_hoithoai].tinnhans[i].noidung.title != '') {

                                            if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
                                            	if(hoithoai[id_hoithoai].tinnhans[i].msgType == 'chat.recommended'){
                                            		var titlev2 = JSON.parse(hoithoai[id_hoithoai].tinnhans[i].noidung.params);
                                                      noidung = '<a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" target="_blank">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;"/ onclick="loadimg(this)" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" data-toggle="modal" data-target="#loadimg"><h4>'+titlev2.mediaTitle+'</h4><a href="'+titlev2.src+'">'+titlev2.src+'</a><p>'+hoithoai[id_hoithoai].tinnhans[i].noidung.description+'</p>';
                                            	}else{
                                            		 noidung = '<img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;"/ onclick="loadimg(this)" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" data-toggle="modal" data-target="#loadimg">';
                                            	}
                                               
                                            } else {
                                            	var result =  JSON.parse(hoithoai[id_hoithoai].tinnhans[i].noidung.params);

                                            	if (result.src == "www.youtube.com") {
                                                     noidung = '<a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" target="_blank">'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'</a><img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;" onclick="loadimg(this)" data-toggle="modal" data-target="#loadimg" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'"/>';
                                            	} else {
                                            		var titlev2 = JSON.parse(hoithoai[id_hoithoai].tinnhans[i].noidung.params);
                                            		if(hoithoai[id_hoithoai].tinnhans[i].msgType == 'chat.ecard'){
                                            			noidung = '<a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" target="_blank">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p></p><img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" style="width: 100%;" onclick="loadimg(this)" data-toggle="modal" data-target="#loadimg" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'"/><p>'+hoithoai[id_hoithoai].tinnhans[i].noidung.description+'</p>';
                                            		}else{
                                            			 noidung = '<a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" target="_blank">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p></p><img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;" onclick="loadimg(this)" data-toggle="modal" data-target="#loadimg" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'"/><h4>'+titlev2.mediaTitle+'</h4><a href="'+titlev2.src+'">'+titlev2.src+'</a><p>'+hoithoai[id_hoithoai].tinnhans[i].noidung.description+'</p>';
                                            		}
                                            		
                                            		 
                                            	}
                                                

                                            }
						 					
						 				} else {
						 					if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 						noidung = '<img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" style="width: 100%;" onclick="loadimg(this)" data-toggle="modal" data-target="#loadimg" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'"/>';
						 					} else {
						 						var titlev3 = JSON.parse(hoithoai[id_hoithoai].tinnhans[i].noidung.params);
                                                if (hoithoai[id_hoithoai].tinnhans[i].noidung.action == 'recommened.link') {
                                                    noidung = '<img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;"  data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'"/><h4>'+titlev3.mediaTitle+'</h4><a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" class="getinfogroupjoin">'+titlev3.src+'</a><p>'+hoithoai[id_hoithoai].tinnhans[i].noidung.description+'</p>';
                                                } else {
                                                	if(hoithoai[id_hoithoai].tinnhans[i].msgType == 'chat.ecard'){
                                                        noidung = '<img onclick="loadimg(this)" data-toggle="modal" data-target="#loadimg" src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" style="width: 100%;" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'"/><p style="color:#0068ff; text-align:center;">'+hoithoai[id_hoithoai].tinnhans[i].noidung.description+'</p>';
                                                	}else{
                                                		noidung = '<img onclick="loadimg(this)" data-toggle="modal" data-target="#loadimg" src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" style="width: 100%;" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'"/>';
                                                	}
                                                    
                                                }
						 					}

						 				}
						 			} else if (prs.fileExt == 'mp4'){
						 				var size = (prs.fileSize/1024)/1024;

						 				if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 					noidung = '<div onclick="loadvideo(this)" data-toggle="modal" data-target="#loadvideo">video: <a src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p>'+ size.toFixed(2)+' MB</p></div>';
						 				} else {
						 					noidung = '<div>Video: <a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" target="_blank">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p>'+ size.toFixed(2)+' MB</p></div>';
						 				}
						 			} else {
						 				var size = (prs.fileSize/1024)/1024;

						 				if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 					noidung = '<div><a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" target="_blank">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p>'+size.toFixed(2)+' MB</p></div>';
						 				} else {
						 					noidung = '<div><a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" target="_blank">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p>'+size.toFixed(2)+' MB</p></div>';
						 				}
						 			}
						 		}
						 	}
						 }
						} else {
							if (hoithoai[id_hoithoai].isgroup == 1 && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
								noidung = '<span class="span-text-img">'+hoithoai[id_hoithoai].tinnhans[i].noidung+'<span/>';
							} else {
								noidung = '<span class="span-text-img">'+hoithoai[id_hoithoai].tinnhans[i].noidung+'<span/>';
							}
						}
						//console.log(hoithoai[id_hoithoai]);
						var styleme = '';
						if (hoithoai[id_hoithoai].tinnhans[i].type == 0) {
							display = '';
							//console.log(hoithoai);
							if (hoithoai[id_hoithoai].isgroup == 1) {
                                 for (var n = 0; n < hoithoai[id_hoithoai].nember.length; n++) {
                                 	//console.log(hoithoai[id_hoithoai].nember[n].id);
                                 	if(hoithoai[id_hoithoai].nember[n].id == hoithoai[id_hoithoai].tinnhans[i].uidFrom){
                                 		img = hoithoai[id_hoithoai].nember[n].avatar;
                                 	}else{
                                 		img = '//s120.avatar.talk.zdn.vn/default';
                                 	}
                                 }
								
							} else {
								img = img_user;
							}

						} else {
							img = $('.profile_'+id_profile).attr('data-image');
							display = 'me';
							styleme = 'justify-content: flex-end;';
						}
						html += '<div class="chat-item flx '+display+'"> <div class="avatar avatar--s" title="" style="z-index: 1;">';
						html += '<div class="avatar-img  outline" style="background-image: url('+img+');"></div></div>';
						html += '<div class="chat-content flx flx-col flx-cell '+display+'">';
						html += '<div class="chat-message wrap-message rotate-container '+display+'">';
						html += '<div class="" style="display: flex; width: 32%;'+styleme+'">';
						html += '<div class="card  pin-react  last-msg card--text '+display+'">';
						html += '<div><span><span class="text">'+noidung+'</span></span></div>';
						if(hoithoai[id_hoithoai].isgroup == 0){
							html += ' <div class="card-send-time '+display+'"><span class="card-send-time__sendTime">'+hoithoai[id_hoithoai].tinnhans[i].datetime+'</span></div>';
						}else{
							html += ' <div class="card-send-time '+display+'"><span class="card-send-time__sendTime">'+hoithoai[id_hoithoai].tinnhans[i].datetime+' | <span class="nameFriend">'+hoithoai[id_hoithoai].tinnhans[i].name+'</span></span></div>';
						}
						
						html += '</div></div></div></div></div>';

					}
				 //end for
				}
				if (html != '') {
					
					$('.bt-load-inbox-content-'+id_hoithoai).html(html);
					$('.bt-load-inbox-content-'+id_hoithoai).scrollTop(15000);
					$(this).parents('.chatzalov2').find('#messageViewScroll').html(html);

					$(this).parents('.chatzalov2').find('.scrollcontentzalo').scrollTop($(this).parents('.chatzalov2').find('#messageViewScroll').height()+1000);
					var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
					var cookie = $('.profile_'+id_profile).attr('data-cookie');
					var enk = $('.profile_'+id_profile).attr('data-env');
					var url_chat = $('.profile_'+id_profile).attr('url-chat');
					var id_client = $('#tinnhandangdoc').attr('data-idclid');
					var param = '{"idto":"'+idto+'","cookie":"'+cookie+'","serectkey":"'+enk+'","id_profile":"'+id_profile+'","url_chat":"'+url_chat+'","id_client":"'+id_client+'"}';
					socket.emit('seenmess',param);
					$('.on_'+idto+' .item-action').html('');
					return false;
				}

			});


socket.on("returnnember", function(data) {
                  $("p").remove(".contentmess");
		         var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Thêm bạn bè vào nhóm thành công !!</p>';
				 $('.contentpoppup').append(html);
				$('#popupmess').modal('show');
    });

socket.on("new message", function(data) {

				var da = JSON.parse(data);
			console.log(da);
				$('.checkallfanpage').each(function(){
					if ($(this).is(':checked')) {

						var id_page = $(this).val();
						if (id_page ==  da.sender.id || id_page ==  da.recipient.id) {
							var classpage = da.sender.id+'_'+da.recipient.id;
							var classpage1 = da.recipient.id+'_'+da.sender.id;
							var image = '';
							var img = $('.'+classpage+ ' .bt-avatar-user-chat img').attr('src');
							var img1 = $('.'+classpage1+ ' .bt-avatar-user-chat img').attr('src');
							var check_new = 0;
							if (img !== false) {
								image = img;
								check_new = 1;
							}
							if (img1 !== false) {
								image = img1;
								check_new = 1;
							}
							$('.'+classpage1+ ' .bt-avatar-user-chat img').attr('src');
							var mess = '';
							if (da.event_name =='user_send_text') {
								mess = da.message.text;

								var html = '';
								html += '<div class="bt-inbox-item bt-left ">';
								html += '<div class="bt-inbox-item-avatar">';
								html += '<img title="" src="'+$('.readding .bt-avatar-user-chat img').attr('src')+'">';
								html += '</div>';
								html += '<div class="bt-inbox-item-text">';
								html += '<span class="span-text-img">'+da.message.text+'</span>';
								html += '</div></div>';
								playaudio();
								changeTitle();
							} else if(da.event_name =='user_send_image' || da.event_name == 'user_send_sticker'){
		      					// console.log(da.message.attachments[0]);
		      					mess = 'Bạn có một tin nhắn ảnh';
		      					var html = '';
		      					html += '<div class="bt-inbox-item bt-left ">';
		      					html += '<div class="bt-inbox-item-avatar">';
		      					html += '<img title="" src="'+$('.readding .bt-avatar-user-chat img').attr('src')+'">';
		      					html += '</div>';
		      					html += '<div class="bt-inbox-item-text">';
		      					html += '<span class="span-text-img">';
		      					html += '<img src="'+da.message.attachments[0].payload.url+'" class="img-responsive">';
		      					html += '</span></div></div>';
		      					playaudio();
		      					changeTitle();
		      				} else if(da.event_name == 'oa_send_text'){
		      					mess = '<i class="fa fa-reply"></i>'+da.message.text;
		      					var html = '';
		      					// html += '<div class="bt-inbox-item bt-left ">';
		      					// html += '<div class="bt-inbox-item-avatar">';
		      					// html += '<img title="" src="'+image+'">';
		      					// html += '</div>';
		      					// html += '<div class="bt-inbox-item-text">';
		      					// html += '<span class="span-text-img">'+mess+'</span>';
		      					// html += '</div></div>';
		      					
		      				} else if (da.event_name =='oa_send_image' || da.event_name == 'oa_send_sticker') {
		      					// console.log(da.message.attachments[0]);
		      					mess = '<i class="fa fa-reply"></i>Bạn đã gửi tin nhắn ảnh';
		      					var html = '';
		      					// html += '<div class="bt-inbox-item bt-left ">';
		      					// html += '<div class="bt-inbox-item-avatar">';
		      					// html += '<img title="" src="'+image+'">';
		      					// html += '</div>';
		      					// html += '<div class="bt-inbox-item-text">';
		      					// html += '<span class="span-text-img">';
		      					// html += '<img src="'+da.message.attachments[0].payload.url+'" class="img-responsive">';
		      					// html += '</span></div></div>';
		      				} else if(da.event_name =='user_seen_message'){
		      					// mess = 'đã xem tin nhắn bạn gửi.';

		      					var html = '';
		      					// html += '<div class="bt-inbox-item bt-left ">';
		      					// html += '<div class="bt-inbox-item-avatar">';
		      					// html += '<img title="" src="'+image+'">';
		      					// html += '</div>';
		      					// html += '<div class="bt-inbox-item-text">';
		      					// html += '<span class="span-text-img">'+da.message.text+'</span>';
		      				} else if(da.event_name == 'user_received_message'){
		      					return false;
		      				}
		      				// Create a new JavaScript Date object based on the timestamp
							// multiplied by 1000 so that the argument is in milliseconds, not seconds.
							var date = new Date(parseInt(da.timestamp));
							// Hours part from the timestamp
							var day = date.getDate();
							var mon = date.getMonth();
							var year = date.getFullYear();
							var hours = date.getHours();
							// Minutes part from the timestamp
							var minutes = "0" + date.getMinutes();
							// Seconds part from the timestamp
							var seconds = "0" + date.getSeconds();

							// Will display time in 10:30:23 format
							var formattedTime = day + '-'+ (mon+1)+'-'+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
							// console.log(date);

		      				// var pageiduser1 = $('.'+classpage1).attr('bt-content-id');
		      				// var pageid1 = $('.'+classpage1).attr('bt-id-fanpage');
		      				// var classpage1 = $('.'+classpage1).attr('class');
		      				// var colorpage1 = $('.'+classpage1).attr('style');
		      				// var htmlpage1 = 'bt-type="inbox" data-mess="'+classpage1+'" bt-content-chat="" bt-content-id="'+pageiduser1+'" bt-id-fanpage="'+pageid1+'" bt-id-profile="" class="'+classpage1+'" style="'+colorpage1+'"';
		      				// htmlpage1 += $('.'+classpage1).html();
		      				// htmlpage1 += '</div>';



		      				// if (da.event_name =='user_send_text' || da.event_name =='user_send_image' || da.event_name == 'user_send_sticker') {

		      				// }
		      				if ($('.'+classpage+ '').hasClass('readding')) {
		      					$('.bt-load-inbox-content').append(html);
		      				}
		      				$('.'+classpage+ ' .bt-review-chat p span').html(mess);
		      				$('.'+classpage+ ' .bt-date-chat').html(formattedTime);
		      				$('.'+classpage).css('background','#6ad6a424').fadeOut(200);


		      				$('.'+classpage+ ' .bt-review-chat p span').css('color','#333');


		      				

		      				$('.'+classpage1+ ' .bt-date-chat').html(formattedTime);
		      				$('.'+classpage1+ ' .bt-review-chat p span').html(mess);
		      				$('.'+classpage1).css('background','#6ad6a424').fadeOut(200);
		      				$('.'+classpage1+ ' .bt-review-chat p span').css('color','#333');

		      				var htmlpage = '';
		      				var pageiduser = $('.'+classpage).attr('bt-content-id');
		      				var pageid = $('.'+classpage).attr('bt-id-fanpage');
		      				var classpagea = $('.'+classpage).attr('class');
		      				var colorpage = $('.'+classpage).attr('style');
		      				htmlpage += '<div bt-type="inbox" data-mess="'+classpage+'" bt-content-chat="" bt-content-id="'+pageiduser+'" bt-id-fanpage="'+pageid+'" bt-id-profile="" class="'+classpagea+' chuadoc" style="'+colorpage+'">';
		      				htmlpage += $('.'+classpage).html();
		      				htmlpage += '</div>';


		      				heightcal+30;
		      				// console.log(htmlpage);
		      				if (typeof pageiduser !== "undefined") {
		      					$('.'+classpage).remove();
		      					$('.bt-all-comment').prepend(htmlpage);
		      				}



		      				var htmlpage1 = '';
		      				var pageiduser1 = $('.'+classpage1).attr('bt-content-id');

		      				var pageid1 = $('.'+classpage1).attr('bt-id-fanpage');
		      				var classpagea1 = $('.'+classpage1).attr('class');
		      				var colorpage1 = $('.'+classpage1).attr('style');
		      				htmlpage1 += '<div bt-type="inbox" data-mess="'+classpage1+'" bt-content-chat="" bt-content-id="'+pageiduser1+'" bt-id-fanpage="'+pageid1+'" bt-id-profile="" class="'+classpagea1+' chuadoc" style="'+colorpage1+'">';
		      				htmlpage1 += $('.'+classpage1).html();
		      				htmlpage1 += '</div>';

		      				var messbyid = $('.'+classpage).find('.count_chuadoc').attr('data');
		      				if (typeof messbyid !== "undefined") {
		      					$('.'+classpage).find('.count_chuadoc').attr('data',parseInt(messbyid)+1);
		      					$('.'+classpage).find('.count_chuadoc').html('('+(parseInt(messbyid)+1)+')');
		      				}
		      				var messbyid2 = $('.'+classpage1).find('.count_chuadoc').attr('data');
		      				if (typeof messbyid2 !== "undefined") {
		      					$('.'+classpage1).find('.count_chuadoc').attr('data',parseInt(messbyid2)+1);
		      					$('.'+classpage1).find('.count_chuadoc').html('('+(parseInt(messbyid2)+1)+')');
		      				}
		      				if (typeof pageiduser1 !== "undefined") {
		      					$('.'+classpage1).remove();
		      					$('.bt-all-comment').prepend(htmlpage1);
		      				}
		      				$(".bt-load-inbox-content").animate({ scrollTop: ($('.bt-load-inbox-content')[0].scrollHeight+heightcal) }, 2000);
		      				if (typeof pageiduser === "undefined" && typeof pageiduser1 === "undefined") {
		      					var params = {};
		      					params['data'] = data;
								params['_token'] = $('.addMargin input[name="_token"]').val();
								$.ajax({
									url: '{{ url("chat/ajaxloadinboxbyid") }}',
									dataType: 'json',
									type: 'post',
									contentType: 'application/x-www-form-urlencoded',
									data: params,
									success: function( data, textStatus, jQxhr ){

									},
									error: function( jqXhr, textStatus, errorThrown ){
									},
									complete: function(data, textStatus, jQxhr){
										$('.bt-all-comment').prepend(data.responseText);
										//thuy
										// $('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
										// $(el).find('.count_chuadoc').remove();
										// $('#materialPreloader').hide();
										// $('.bt-make-input').val('');

									}
								});
		      				}
		      				
		      			}
		      		}
		      	});


	});
socket.on('returnmessgroup', function(data){
	$('.bt-new-chat').css('opacity','1');
    $('#materialPreloader').hide();
   
   if(data.groupMsgs.length > 0 ){
   	   for (var i = 0; i < data.groupMsgs.length; i++) {
   	   	   var idTo = data.groupMsgs[i].idTo;
   	   	   
   	   }
   }
     
});
socket.on('returnmess', function(data){


  var locationv2 = window.location.href;
		var str = locationv2.split("?");
		if(str[0] == 'http://127.0.0.1:8000/chat/chatprofile'){
		   if($('.ReactVirtualized__Grid__innerScrollContainer').html().length > 0){
				$('.bt-loader').hide();
			}

			if (data.more == 1 ) {

				$('.activetong').show();
				
			}
			if (data.more == 0 ) {
				
				if (data.groupMsgs.length > 0) {
                  
					getmess();
				}
				if (data.groupMsgs.length == 1) {

					playaudio();
				}
				if (data.msgs.length  == 1) {

                    if (data.msgs[0].idTo == '0') {
                        savemesskh(data.msgs[0].uidFrom,data.id_profile);
                    }
					var usechat = $('#tinnhandangdoc').attr('data-idhoithoai');
					if (typeof(usechat) === 'undefined') {
						playaudio();
					} else {
						if (data.msgs[0].idTo  != usechat) {
								
								playaudio();
							}
						}
						
					}
				}
				if (data.clearUnreads.length >0) {
					for (var i = 0; i < data.clearUnreads.length; i++) {
						if (data.clearUnreads[i].lastMsgId != '0') {
							tinnhanchuadoc.push(data.clearUnreads[i].lastMsgId);
						}
					}
				}
				if(data.groupMsgs.length > 0 ){
					for (var i = 0; i < data.groupMsgs.length; i++) {
						if(typeof(hoithoaigroup[data.groupMsgs[i].idTo]) === "undefined"){
							var date = new Date(parseInt(data.groupMsgs[i].ts));
							// Hours part from the timestamp
							var day = date.getDate();
							var mon = date.getMonth();
							var year = date.getFullYear();
							var hours = date.getHours();
							// Minutes part from the timestamp
							var minutes = "0" + date.getMinutes();
							// Seconds part from the timestamp
							var seconds = "0" + date.getSeconds();

							// Will display time in 10:30:23 format
							var formattedTime = day + '-'+ (mon+1)+'-'+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
							hoithoaigroup[data.groupMsgs[i].idTo] = {};
							hoithoaigroup[data.groupMsgs[i].idTo].tinnhans = [];

							
							var tinnhangroup = {};
							tinnhangroup.actionId  = data.groupMsgs[i].actionId;
							tinnhangroup.cliMsgId = data.groupMsgs[i].cliMsgId;
							tinnhangroup.msgId = data.groupMsgs[i].msgId;
							tinnhangroup.msgType = data.groupMsgs[i].msgType;
							tinnhangroup.id_profile = data.id_profile;
							tinnhangroup.name = data.groupMsgs[i].dName;
							tinnhangroup.ts = data.groupMsgs[i].ts;
							tinnhangroup.isgroup = 1;
							tinnhangroup.uidFrom = data.groupMsgs[i].uidFrom;
							if (data.groupMsgs[i].dName == $('.profile_'+data.id_profile).attr('data-name')) {
								tinnhangroup.type = '1';
							} else {
								tinnhangroup.type = '0';
							}
							tinnhangroup.datetime = formattedTime;
							tinnhangroup.noidung  = data.groupMsgs[i].content;
							
							hoithoaigroup[data.groupMsgs[i].idTo].tinnhans.push(tinnhangroup);
						} else {
							var date = new Date(parseInt(data.groupMsgs[i].ts));
							// Hours part from the timestamp
							var day = date.getDate();
							var mon = date.getMonth();
							var year = date.getFullYear();
							var hours = date.getHours();
							// Minutes part from the timestamp
							var minutes = "0" + date.getMinutes();
							// Seconds part from the timestamp
							var seconds = "0" + date.getSeconds();

							// Will display time in 10:30:23 format
							var formattedTime = day + '-'+ (mon+1)+'-'+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
							var tinnhangroup = {};
							tinnhangroup.isgroup = 1;
							tinnhangroup.actionId  = data.groupMsgs[i].actionId;
							tinnhangroup.cliMsgId = data.groupMsgs[i].cliMsgId;
							tinnhangroup.msgId = data.groupMsgs[i].msgId;
							tinnhangroup.datetime = formattedTime;
							tinnhangroup.msgType = data.groupMsgs[i].msgType;
							tinnhangroup.id_profile = data.id_profile;
							tinnhangroup.name = data.groupMsgs[i].dName;
							tinnhangroup.ts = data.groupMsgs[i].ts;
							tinnhangroup.uidFrom = data.groupMsgs[i].uidFrom;
							if (data.groupMsgs[i].dName == $('.profile_'+data.id_profile).attr('data-name')) {
								tinnhangroup.type = '1';
							} else {
								tinnhangroup.type = '0';
							}
							tinnhangroup.noidung  = data.groupMsgs[i].content;
							
							hoithoaigroup[data.groupMsgs[i].idTo].tinnhans.push(tinnhangroup);
							
						}
					}

				}
				if(data.msgs.length >0 ){
					
					for (var i = data.msgs.length - 1; i >= 0; i--) {
						
						if(data.msgs[i].uidFrom != "0") {
							if(typeof(hoithoai[data.msgs[i].uidFrom]) === "undefined"){
								var date = new Date(parseInt(data.msgs[i].ts));
								// Hours part from the timestamp
								var day = date.getDate();
								var mon = date.getMonth();
								var year = date.getFullYear();
								var hours = date.getHours();
								// Minutes part from the timestamp
								var minutes = "0" + date.getMinutes();
								// Seconds part from the timestamp
								var seconds = "0" + date.getSeconds();

								// Will display time in 10:30:23 format
								var formattedTime = day + '-'+ (mon+1)+'-'+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
								hoithoai[data.msgs[i].uidFrom] = {};
								hoithoai[data.msgs[i].uidFrom].name = data.msgs[i].dName;
								hoithoai[data.msgs[i].uidFrom].tinnhans = [];
								var tinnhan = {};
								tinnhan.isgroup = 0;
								tinnhan.actionId  = data.msgs[i].actionId;
								tinnhan.cliMsgId = data.msgs[i].cliMsgId;
								tinnhan.msgId = data.msgs[i].msgId;
								tinnhan.msgType = data.msgs[i].msgType;
								tinnhan.ts = data.msgs[i].ts;
								tinnhan.id_profile = data.id_profile;
								tinnhan.datetime = formattedTime;
								tinnhan.type = '0';
								tinnhan.noidung  = data.msgs[i].content;
								tinnhan.uidFrom  = data.msgs[i].uidFrom;
								hoithoai[data.msgs[i].uidFrom].tinnhans.push(tinnhan);
								
							} else{
								var date = new Date(parseInt(data.msgs[i].ts));
								// Hours part from the timestamp
								var day = date.getDate();
								var mon = date.getMonth();
								var year = date.getFullYear();
								var hours = date.getHours();
								// Minutes part from the timestamp
								var minutes = "0" + date.getMinutes();
								// Seconds part from the timestamp
								var seconds = "0" + date.getSeconds();

								// Will display time in 10:30:23 format
								var formattedTime = day + '-'+ (mon+1)+'-'+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
								var tinnhan = {};
								tinnhan.isgroup = 0;
								tinnhan.actionId  = data.msgs[i].actionId;
								tinnhan.cliMsgId = data.msgs[i].cliMsgId;
								tinnhan.msgId = data.msgs[i].msgId;
								tinnhan.ts = data.msgs[i].ts;
								tinnhan.msgType = data.msgs[i].msgType;
								tinnhan.type = '0';
								tinnhan.id_profile = data.id_profile;
								tinnhan.datetime = formattedTime;                                                                                
								tinnhan.noidung  = data.msgs[i].content;
								tinnhan.uidFrom  = data.msgs[i].uidFrom;
								hoithoai[data.msgs[i].uidFrom].tinnhans.push(tinnhan);
							}
							
						}else {
							if(typeof(hoithoai[data.msgs[i].idTo]) === "undefined"){
								var date = new Date(parseInt(data.msgs[i].ts));
								// Hours part from the timestamp
								var day = date.getDate();
								var mon = date.getMonth();
								var year = date.getFullYear();
								var hours = date.getHours();
								// Minutes part from the timestamp
								var minutes = "0" + date.getMinutes();
								// Seconds part from the timestamp
								var seconds = "0" + date.getSeconds();

								// Will display time in 10:30:23 format
								var formattedTime = day + '-'+ (mon+1)+'-'+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
								hoithoai[data.msgs[i].idTo] = {};
								hoithoai[data.msgs[i].idTo].name = data.msgs[i].dName;
								hoithoai[data.msgs[i].idTo].tinnhans = [];
								var tinnhan = {};
								tinnhan.isgroup = 0;
								tinnhan.actionId  = data.msgs[i].actionId;
								tinnhan.cliMsgId = data.msgs[i].cliMsgId;
								tinnhan.msgId = data.msgs[i].msgId;
								tinnhan.ts = data.msgs[i].ts;
								tinnhan.msgType = data.msgs[i].msgType;
								tinnhan.type = '1';
								tinnhan.id_profile = data.id_profile;
								tinnhan.datetime = formattedTime;
								tinnhan.noidung  = data.msgs[i].content;
								tinnhan.uidFrom  = data.msgs[i].uidFrom;
								hoithoai[data.msgs[i].idTo].tinnhans.push(tinnhan);
							} else {
								var date = new Date(parseInt(data.msgs[i].ts));
								// Hours part from the timestamp
								var day = date.getDate();
								var mon = date.getMonth();
								var year = date.getFullYear();
								var hours = date.getHours();
								// Minutes part from the timestamp
								var minutes = "0" + date.getMinutes();
								// Seconds part from the timestamp
								var seconds = "0" + date.getSeconds();

								// Will display time in 10:30:23 format
								var formattedTime = day + '-'+ (mon+1)+'-'+year+' '+hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
								var tinnhan = {};
								tinnhan.isgroup = 0;
								tinnhan.actionId  = data.msgs[i].actionId;
								tinnhan.cliMsgId = data.msgs[i].cliMsgId;
								tinnhan.msgId = data.msgs[i].msgId;
								tinnhan.ts = data.msgs[i].ts;
								tinnhan.msgType = data.msgs[i].msgType;
								tinnhan.type = '1';
								tinnhan.id_profile = data.id_profile;
								tinnhan.datetime = formattedTime;
								tinnhan.noidung  = data.msgs[i].content;
								tinnhan.uidFrom  = data.msgs[i].uidFrom;
								hoithoai[data.msgs[i].idTo].tinnhans.push(tinnhan);
							}
							
						}
					}
					var user_a = [];
					$.each(hoithoai,function(i,m){
						var user_list = i+'_0';

						user_a.push(user_list);
					});
					getinfo(user_a,data.id_profile);
					
				}
		}
			
			});

var groupmess = [];
socket.on('returngroupmess',  function(data){
	if (data.groups.length > 0) {
		for (var i = 0; i < data.groups.length; i++) {
			groupmess.push(data.groups[i]);
		}
	}
	localforage.setItem("groupmess", JSON.stringify(groupmess));
	// localStorage.setItem("groupmess", JSON.stringify(groupmess));

});

socket.on('returnEditName',  function(data){
    var pr = JSON.parse(data);
    if(pr.status == 200){
    	var div = document.getElementById('item-title-name_'+pr.id_profile);
    	var name = document.getElementById('nameContent');
    	div.innerHTML = pr.alias;
    	name.innerHTML = pr.alias;
    	$('.editName').css('display','none');

    }
   
});

socket.on('returncreategroup',  function(data){
	var id_account = $('.accountaddgroup').val();
	var cookie = $('.profile_'+id_account).attr('data-cookie');
	var enk = $('.profile_'+id_account).attr('data-env');
	var urlchat = $('.profile_'+id_account).attr('url-chat');
	var param = '{"idto":"'+data.data.groupId+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":".","id_profile":"'+id_account+'","urlchat":"'+urlchat+'"}';
	socket.emit('messprofile',param);
	socket.emit('sendmesstextgroup',param);
	if (data.error_code == 0) {
		alertBox('Tạo thành công nhóm',"success",false,true,true);
		// $('#creategroup').hide();
		return false;
	} else {
		alertBox('Tạo nhóm thất bại',"danger",false,true,true);
		return false;
	}

});
socket.on('returndatasend',  function(data){
	// console.log(data);
	   $('.bt-new-chat').css('opacity','1');
        $('#materialPreloader').hide();
	if (data.error_code == 0) {
		
		// alertBox('Gửi tin nhắn thành công',"success",false,true,true);
		return false;
	} else {
		alertBox('Gửi tin nhắn thất bại',"danger",false,true,true);
		return false;
	}
});

var tagzalo = {};
var versiontag = {};
var tagphanloai = [];
$('.createtagall').on('click',function(){

			var check_page = 0;
			$('.checkallprofile:checked').each(function(i,value){
				check_page = 1;
				if ($('#nametag').val() == '') {
					alertBox('Vui lòng nhập tên thẻ',"danger",false,true,true);
					return false;
				}
				if ($('.jscolor').val() == '') {
					alertBox('Vui chọn màu thẻ',"danger",false,true,true);
					return false;
				}
				//debugger;
				var time = new Date().getTime();
				var objtag = {};
				objtag.color = '#'+$('.jscolor').val();
				objtag.text = $('#nametag').val();
				objtag.emoji = '';
				objtag.createTime = time;
				// objtag.id = tagzalo[$(this).val()].length+1;

				console.log(typeof tagzalo);
				var leng = tagzalo[$(this).val()];
				console.log(leng);
				objtag.id = leng.length + 1;
				tagzalo[$(this).val()].push(objtag);
				versiontag[$(this).val()] = versiontag[$(this).val()]+1;
				var cookie = $(this).attr('data-cookie');
				var enk = $(this).attr('data-env');
				var param = '{"cookie":"'+cookie+'","serectkey":"'+enk+'","tag":'+JSON.stringify(tagzalo[$(this).val()])+',"id_profile":"'+$(this).val()+'","versiontag":"'+(versiontag[$(this).val()])+'"}';
				// console.log(param);
				socket.emit('updatetag',param);
				alertBox('Thêm thẻ mới thành công',"success",false,true,true);
				// return false;
			});
			$('.phanloaitag').append('<div class="filter-tag-item"><div class="text truncate" onclick="searchByTagName(this)" data-id="'+$('#nametag').val()+'"><span>'+$('#nametag').val()+'</span></div><div class="close-button"><i class="fa fa-textbox-icon-clear "></i></div></div>');

			if (check_page == 0) {
				alertBox('Vui lòng chọn tài khoản',"danger",false,true,true);
				return false;
			}
		});
socket.on('returngettag',  function(data){
	 //console.log(data);
	if (data.error_code == 0) {
		var result = JSON.parse(data.data.labelData);
		tagphanloai.push('Tất cả');
		$.each(result, function(i,m){
			if (typeof(m.text) !== 'undefined') {
				tagphanloai.push(m.text);
			}
		});


		var htmltag = '<div class="filter-tag-item selected" onclick="searchByTagName(this)" data-id="Tất cả"><div class="text truncate"><span>Tất cả</span></div><div class="close-button"><i class="fa fa-textbox-icon-clear "></i></div></div>';
		$(result).each(function(j,k){
			if (typeof(k.text) !== 'undefined') {
				htmltag += '<div class="filter-tag-item"><div class="text truncate" onclick="searchByTagName(this)" data-id="'+k.text+'"><span>'+k.text+'</span></div><div class="close-button"><i class="fa fa-textbox-icon-clear "></i></div></div>';
			}
		});
		$('.tabzalo_'+data.id_profile+' .phanloaitag').html(htmltag);

		tagzalo[data.id_profile] = result;
		versiontag[data.id_profile] = data.data.version;
		localStorage.setItem("tagzalo", JSON.stringify(tagzalo));



	}
	// console.log(tagphanloai);
	var newtag = deduplicate(tagphanloai);
	if (newtag.length > 0) {
		var html = '';
		$(newtag).each(function(i,m){
			if (m == 'Tất cả') {
				html += '<div class="filter-tag-item selected" onclick="searchByTagName(this)" data-id="'+m+'"><div class="text truncate"><span>'+m+'</span></div><div class="close-button"><i class="fa fa-textbox-icon-clear "></i></div></div>';
			} else {
				html += '<div class="filter-tag-item"><div class="text truncate" onclick="searchByTagName(this)" data-id="'+m+'"><span>'+m+'</span></div><div class="close-button"><i class="fa fa-textbox-icon-clear "></i></div></div>';
			}
			
		});
		$('#home .activetagtong').show();
		$('#home .phanloaitag').html(html);
	}
	// console.log(tagzalo);
	// $(tagzalo).each(function(i,m){
	// 	var htmltag = '<div class="filter-tag-item selected" onclick="searchByTagName(this)" data-id="Tất cả"><div class="text truncate"><span>Tất cả</span></div><div class="close-button"><i class="fa fa-textbox-icon-clear "></i></div></div>';
	// 	$(m).each(function(j,k){
	// 		htmltag += '<div class="filter-tag-item"><div class="text truncate" onclick="searchByTagName(this)" data-id="'+k.text+'"><span>'+k.text+'</span></div><div class="close-button"><i class="fa fa-textbox-icon-clear "></i></div></div>';
	// 	});
		
	// 	$('.tabzalo_'+i+' .phanloaitag').html(htmltag);
	// });

});	
socket.on('returngettagv1',  function(data){
    if (data.error_code == 0) {
		var result = JSON.parse(data.data.labelData);
		$.each(result, function(i,m){
			if (typeof(m.text) !== 'undefined') {
				// console.log(m.text);
			}
		});
	}
});
// var cc = [];
var data_info = [];
socket.on('returninfoprofile',  function(data){
// console.log(data);
	if (data.error_code == 0) {
		var array_avatar = data.data.changed_profiles;
		$.each(hoithoai, function(i, el){
			$.each(array_avatar, function(j, m){
				if (i == m.userId) {
					 //console.log(array_avatar[i].isFr);
					hoithoai[i].avatar = array_avatar[i].avatar;
					hoithoai[i].isFr = array_avatar[i].isFr;
				}
			});
			// hoithoai[i].avatar = 'lol';
			// console.log(array_avatar[i]);
			// if (typeof(array_avatar[i]) !== 'undefined') {
				
			// }
		});
		
		// data_info.push(array_avatar);
		
		// return false;
		
	} else {
		// console.log(data);
		// return false;
	}
	getmess();
	 //console.log("hoithoai");
});
socket.on( 'getfriendnewv1', function (data) {
	
	$.each(data, function(i,m){
		listfriend[i] = m;
	});
	// console.log(data);
	//// nốt ngày 18/6/2020 lỗi tràn DOM  
	//localStorage.setItem("listfriend", JSON.stringify(listfriend));
	localforage.setItem("listfriend", JSON.stringify(listfriend));

	// console.log(listfriend);
	// console.log('aaaa');
} );

socket.on('getfriendmobile',function(data){
	showFriendChienDich(data);
          var _token =  $('input[name="_token"]').val();
          $.each(data,function(i,m){
				$.ajax({
					url: '{{ url("chat/dongboGroup") }}',
					dataType: 'json',
					type: 'post',
					contentType: 'application/x-www-form-urlencoded',
					data: {_token:_token, zaloid:i, datafrined:m},
					success: function( data, textStatus, jQxhr ){

					},
					error: function( jqXhr, textStatus, errorThrown ){
					},
					complete: function(data, textStatus, jQxhr){

					}
				});

			});
          
       });

socket.on('returnlistgroupv2',function(data){
	var body =  JSON.parse(data);
     var _token =  $('input[name="_token"]').val();
	$.each(body,function(i,m){

			$.ajax({
					url: '{{ url("chat/dongbolistGroup") }}',
					dataType: 'json',
					type: 'post',
					contentType: 'application/x-www-form-urlencoded',
					data: {_token:_token, zaloid:i, listgroup:m},
					success: function( data, textStatus, jQxhr ){

					},
					error: function( jqXhr, textStatus, errorThrown ){
					},
					complete: function(data, textStatus, jQxhr){

					}
				});
		
	      });

          
       });


var datanamev2 ={};
socket.on('returngetnamev2', function(req){
     
     datanamev2 = req.data.items;

     for (var i = 0; i < datanamev2.length; i++) {
     	$('#item-title-name_'+datanamev2[i].userId).html(datanamev2[i].alias);
     }


});


function showFriendChienDich(data){
var html = '';
  $.each(data, function(i, el){
		for (var i = 0; i < el.length; i++) {
			
			html += '<tr role="row" class="odd"><td class="sorting_'+(i+1)+'" style="width: 20%;"><input name="client_camp[fanpage:461][]" class="datafriend data_client_send" gender_client="undefined" name_client="'+el[i].zaloName+'" type="checkbox" value="'+el[i].userId+'" data-from="fanpage:461" ></td><td style="width: 40%"><img src="'+el[i].avatar+'"/ style="width: 45px; height: 45px;"></td><td style="width: 40%">'+el[i].zaloName+'</td></tr>';
		}
	});

	$('#tableClientLoadFriend #bt-load-client-content').html(html);

}

function deduplicate(arr) {
	let isExist = (arr, x) => arr.includes(x);
	let ans = [];

	arr.forEach(element => {
		if(!isExist(ans, element)) ans.push(element);
	});

	return ans;
}
function getUnique(arr, comp) {

	const unique = arr
	.map(e => e[comp])

     // store the keys of the unique objects
     .map((e, i, final) => final.indexOf(e) === i && i)

    // eliminate the dead keys & store unique objects
    .filter(e => arr[e]).map(e => arr[e]);

    return unique;
}
function getinfo(id_user,id_profile){
	var cookie = $('.profile_'+id_profile).attr('data-cookie');
	var enk = $('.profile_'+id_profile).attr('data-env');
	var user = [];

	var iduser = id_user+'_0';
	user.push(iduser);

	var data = '{"cookie":"'+cookie+'","serectkey":"'+enk+'","urlchat":"aaaa","id_profile":"'+id_profile+'","user_atr":'+JSON.stringify(id_user)+'}';
	 socket.emit('getinfoprofile',data);
	
	
}

function getmess(){
	
	var uniqueNames = [];
	
	$.each(tinnhanchuadoc, function(i, el){
		if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
	});

	$.each(hoithoai, function(i,m){

		var chuadoc = 0;
		var zxc;
		if (typeof(m) !== "undefined") {
			m.tinnhans = getUnique(m.tinnhans,'msgId');
			m.tinnhans.sort(function(a, b){return b.ts - a.ts});
			
			for (var j = 0; j < m.tinnhans.length; j++) {
				chuadoc++;
				for (var a = 0; a < uniqueNames.length; a++) {
					zxc = 0;
					
					if (m.tinnhans[j].msgId == uniqueNames[a]) {
						zxc = 1;
						break;
					}
				}
				if (zxc == 1) {
					break;
				}
			}
			if (zxc == 0) {
				hoithoai[i].chuadoc = 0;
				hoithoai[i].isgroup = 0;
			} else {
				hoithoai[i].chuadoc = (chuadoc-1);
				hoithoai[i].isgroup = 0;
			}
		}
		
	});

	
	$.each(hoithoaigroup, function(i,m){
		
		var chuadoc = 0;
		var zxc;
		m.tinnhans = getUnique(m.tinnhans,'msgId');
		m.tinnhans.sort(function(a, b){return b.ts - a.ts});

		for (var j = 0; j < m.tinnhans.length; j++) {
			chuadoc++;
			for (var a = 0; a < uniqueNames.length; a++) {
				zxc = 0;
				
				if (m.tinnhans[j].cliMsgId == uniqueNames[a]) {
					zxc = 1;
					break;
				}

			}
			if (zxc == 1) {
				break;
			}
		}
		if (zxc == 0) {
			hoithoaigroup[i].chuadoc = 0;
			hoithoaigroup[i].isgroup = 1;
		} else {
			hoithoaigroup[i].chuadoc = (chuadoc-1);
			hoithoaigroup[i].isgroup = 1;
		}
		
		
	});


	if (groupmess.length >0) {
		
		$.each(hoithoaigroup,function(i,m){
			$.each(groupmess,function(j,v){
				if (i == v.groupId) {

					hoithoaigroup[i].name_group = v.name;
					hoithoaigroup[i].nember = v.topMember;

					hoithoaigroup[i].totalMember = v.totalMember;
				} else {
					
				}

			});
			
		});
	}

	var totalhoithoai = $.extend(hoithoai,hoithoaigroup);
    
	/////note ngày 18/6/2020 lỗi tràn DOM 
	//localStorage.setItem("totalhoithoai", JSON.stringify(totalhoithoai));
	localforage.setItem("totalhoithoai", JSON.stringify(totalhoithoai));

	var lastmess = [];
 
	$.each(totalhoithoai, function(i,m){
		
		var boxchat = {};
		if (m.tinnhans[0].type == 1) {
			boxchat.chuadoc = 0;
		} else {
			boxchat.chuadoc = m.chuadoc;
		}
		boxchat.nguoigui = m.tinnhans[0].type;
		if (typeof(m.name_group) !== "undefined") {

			boxchat.namechat = m.name_group;
			boxchat.totalMember = m.totalMember;
			boxchat.nember = m.nember;
			boxchat.avatar = 'null';
		} else {
			boxchat.totalMember = 0;

			boxchat.namechat = m.name;
			boxchat.nember = 0;
			boxchat.avatar = m.avatar;
		}
		boxchat.cliMsgId = m.tinnhans[0].cliMsgId;
		boxchat.name = m.tinnhans[0].name;
		boxchat.isgroup = m.tinnhans[0].isgroup;
		boxchat.msgType = m.tinnhans[0].msgType;
		boxchat.noidung = m.tinnhans[0].noidung;
		boxchat.id_profile = m.tinnhans[0].id_profile;
		boxchat.ts = m.tinnhans[0].ts;
		boxchat.datetime = m.tinnhans[0].datetime;
		boxchat.idhoithoai = i;
		boxchat.isFr = m.isFr;

		$('.tabzalo_'+m.tinnhans[0].id_profile+' .ReactVirtualized__Grid__innerScrollContainer').html('');

		lastmess.push(boxchat);

	});

	
	
	// return false;
	lastmess.sort(function(a, b){return b.ts - a.ts});
	// xử lý lỗi tràn DOM ngày 24/6 sakura(4)
	//localStorage.setItem("tinnhan", JSON.stringify(lastmess));
	localforage.setItem("tinnhan", JSON.stringify(lastmess));
	var lastmesnew = {};
	for (var i = 0; i < lastmess.length; i++) {
		if (typeof(lastmesnew[lastmess[i].id_profile]) === 'undefined') {

			lastmesnew[lastmess[i].id_profile] = lastmess[i].chuadoc;

		} else {
			
			$.each(lastmesnew, function(j,m){
				
				if (j == lastmess[i].id_profile) {
					lastmesnew[j] = parseInt(m) + parseInt(lastmess[i].chuadoc);
				}
			});
		}
		
	}

	$.each(lastmesnew, function(j,m){
		$('.countmess_'+j+'').html(m);
	});
	var html = '';
	var top_mess = 0;
	var total_tinnhan = 0;
	$.each(lastmess, function(i,m){
		var htmltab = '';
		var noidung = '';
		var classchuadoc = '';
		var nguoila = '';
		var htmltinnhan = '';
		var classboldchuadoc = '';
		var htmltinnhanchuadoc = '';
        if(m.isFr == 0){
        	nguoila = 'nguoila';

        }

        for (var n = 0; n < datanamev2.length ; n++) {
				
				if(datanamev2[n].userId == m.idhoithoai){
					m.namechat = datanamev2[n].alias;
					
				}else{
					m.namechat = m.namechat;
					
				}
				
			}


		if (m.chuadoc >0) {
			total_tinnhan = total_tinnhan+m.chuadoc;
			
			classchuadoc = 'chuadoc1';
            $('.countmess_'+m.id_profile+'').html(''+m.chuadoc+'');
			if (m.chuadoc > 5) {
				htmltinnhanchuadoc = '';
				htmltinnhan = '<i class="fa fa-5plus func-unread" style="width: 22px; height: 16px; font-size: 16px; color: red; background-color: white; border-radius: 8px;"></i>';
			} else {
				htmltinnhan = '<i class="fa fa-'+m.chuadoc+' func-unread" style="width: 22px; height: 16px; font-size: 16px; color: red; background-color: white; border-radius: 8px;"></i>';
			}
			classboldchuadoc = 'item-title-name--bold';
		}
		if (Array.isArray(m.noidung) === true || typeof(m.noidung) === 'object') {
			if (m.noidung.title != "") {

				if (typeof(m.name) !== 'undefined') {
					noidung = m.name+':'+m.noidung.title;
				} else {

					if (m.nguoigui == 1) {
						if (m.msgType == 'share.file') {
							noidung = 'Bạn:[File]';
						} else if(m.msgType == 'chat.voice'){
							noidung = 'Bạn:[Cuộc ghi âm]';
						} else {
							noidung = 'Bạn:[Hình ảnh]';
						}
					} else {
						if (m.msgType == 'share.file') {
							noidung = '[File]';
						} else if(m.msgType == 'chat.voice'){
							noidung = '[Cuộc ghi âm]';
						} else {
							noidung = '[Hình ảnh]';
						}
					}
					
					
				}
				
			} else {
				if (typeof(m.name) !== 'undefined') {

					noidung = m.name+':'+'[Hình ảnh]';
                    if (typeof m.noidung === "object") {
                        if (m.noidung.action == 'recommened.link') {
                            noidung = '[link]'+m.noidung.description;
                        }
                    }
				} else {
					if (m.nguoigui == 1) {
						if (m.msgType == 'share.file') {
							noidung = 'Bạn:[File]';
						} else if(m.msgType == 'chat.voice'){
							noidung = 'Bạn:[Cuộc ghi âm]';
						} else {
							noidung = 'Bạn:[Hình ảnh]';
						}
					} else {
						if (m.msgType == 'share.file') {
							noidung = '[File]';
						} else if(m.msgType == 'chat.voice'){
							noidung = '[Cuộc ghi âm]';
						}else if(m.msgType == 'chat.recommended'){
                            noidung = '[link] '+m.noidung.description;
                        } else {
							noidung = '[Hình ảnh]';
						}
					}
				}
			}
		} else {
			if (typeof(m.name) !== 'undefined') {
				noidung = m.name+':'+m.noidung;
			} else {
				if (m.nguoigui == 1) {
					noidung = 'Bạn:'+m.noidung;
				} else {
					noidung = m.noidung;
				}
				
			}
		}

		var image_profile = $('.profile_'+m.id_profile).attr('data-image');
		var cookiev2 = $('.profile_'+m.id_profile).attr('data-cookie');
		var serectkeyv2 = $('.profile_'+m.id_profile).attr('data-env');
		
		var name_profile = $('.profile_'+m.id_profile).attr('data-name');

		var tinnhandangdoc = '';
		if ($('#tinnhandangdoc').attr('data-idhoithoai') == m.idhoithoai && $('#tinnhandangdoc').attr('data-idprofile') == m.id_profile) {
			tinnhandangdoc = 'selected';
		}
         
		html += '<div onmousedown="mouseDown(this,event)" class="msg-item '+nguoila+' bt-load-chat '+classchuadoc+' parent_'+m.idhoithoai+'" style="height: 74px; left: 0px;  width: 100%;">';
		html += '<div draggable="false" class="item rel bt-content-chat on_'+m.idhoithoai+'  '+tinnhandangdoc+'"  data-hoithoai="'+m.idhoithoai+'" data-profile="'+m.id_profile+'" data-group="'+m.isgroup+'" data-img='+m.avatar+' data-cookie= "'+cookiev2+'" data-env="'+serectkeyv2+'"><div class="avatarzalo" style="position: relative;">';
		if (m.nember != 0) {
			html += '<div class="avatar avatar--m avatar-group group-4 conversationList__avatar" title="">';
			for (var i = 0; i < m.nember.length; i++) {
				html += '<div class="avatar-img  outline" style="background-image: url('+m.nember[i].avatar+');"></div>';
			}
		} else {
			html += '<div class="avatar avatar--m conversationList__avatar" title="">';
			html += '<div class="avatar-img  outline" style="background-image: url('+m.avatar+');"></div>';
		}
		html += '</div></div>';
		html += '<div class="item-content-container"><div class="item-title">';

		html += '<div id="item-title-name_'+m.idhoithoai+'" class="item-title-name truncate  '+classboldchuadoc+' ">'+m.namechat+'</div>';
		html += '<div class="item-timestamp"> <span>'+m.datetime+'</span></div>';

		html += '</div><div style="display: flex; flex-grow: 1; align-items: center;">';
		html += '<div class="item-message truncate unread" style="display: flex; color: rgb(122, 134, 154); line-height: 20px;">';
		html += '<div class="conv-last-msg"><div style="overflow: hidden; text-overflow: ellipsis; line-height: 20px;"><span>'+noidung+'</span></div>';
		html += '</div><div class="item-action">';

		html += '<div>'+htmltinnhan+'</div>';
		html += '<div class="item-action__menu "><i class="fa fa-tab-icon-more func-setting__icon"></i></div>';
		html += '</div></div></div><div class="conv-filter" style="flex-grow: 1;"><div style="float:right;"><img src="'+image_profile+'" style="width: 20px;height: 20px; border-radius: 50%;"/><span style=" color: #4c9aff;">'+name_profile+'</span></div></div></div></div></div>';



		htmltab += '<div onmousedown="mouseDown(this,event)" class="msg-item '+nguoila+' bt-load-chat '+classchuadoc+' parent_'+m.idhoithoai+'" style="height: 74px; left: 0px;  width: 100%;">';
		htmltab += '<div draggable="false" class="item rel bt-content-chat on_'+m.idhoithoai+'  '+tinnhandangdoc+'"  data-hoithoai="'+m.idhoithoai+'" data-profile="'+m.id_profile+'" data-group="'+m.isgroup+'" data-img='+m.avatar+'><div class="avatarzalo" style="position: relative;">';
		if (m.nember != 0) {
			htmltab += '<div class="avatar avatar--m avatar-group group-4 conversationList__avatar" title="">';
			for (var i = 0; i < m.nember.length; i++) {
				htmltab += '<div class="avatar-img  outline" style="background-image: url('+m.nember[i].avatar+');"></div>';
			}
		} else {
			htmltab += '<div class="avatar avatar--m conversationList__avatar" title="">';
			htmltab += '<div class="avatar-img  outline" style="background-image: url('+m.avatar+');"></div>';
		}
		htmltab += '</div></div>';
		htmltab += '<div class="item-content-container"><div class="item-title">';
		htmltab += '<div id="item-title-name_'+m.idhoithoai+'" class="item-title-name truncate  '+classboldchuadoc+' ">'+m.namechat+'</div>';
		htmltab += '<div class="item-timestamp"> <span>'+m.datetime+'</span></div>';

		htmltab += '</div><div style="display: flex; flex-grow: 1; align-items: center;">';
		htmltab += '<div class="item-message truncate unread" style="display: flex; color: rgb(122, 134, 154); line-height: 20px;">';
		htmltab += '<div class="conv-last-msg"><div style="overflow: hidden; text-overflow: ellipsis; line-height: 20px;"><span>'+noidung+'</span></div>';
		htmltab += '</div><div class="item-action">';

		htmltab += '<div>'+htmltinnhan+'</div>';
		htmltab += '<div class="item-action__menu "><i class="fa fa-tab-icon-more func-setting__icon"></i></div>';
		htmltab += '</div></div></div><div class="conv-filter" style="flex-grow: 1;"><div style="float:right;"><img src="'+image_profile+'" style="width: 20px;height: 20px; border-radius: 50%;"/><span style=" color: #4c9aff;">'+name_profile+'</span></div></div></div></div></div>';
		// html += '<div bt-type="inbox"  bt-id-profile="" class="bt-load-chat '+classchuadoc+' parent_'+m.idhoithoai+'" style=" position: relative;">';
		// html += '<a href="#"><div class="bt-avatar-user-chat">';


		// if (m.nember != 0) {
		// 	html += '<div style="position: relative;">';
		// 	html += '<div class="avatar avatar--m avatar-group group-4 conversationList__avatar" title="">';
		// 	for (var i = 0; i < m.nember.length; i++) {
		// 		html += '<div class="avatar-img  outline" style="background-image: url('+m.nember[i].avatar+');"></div>';
		// 	}
		// 	html += '</div>'; 
		// 	html += '</div></div>'; 
		// } else {
		// 	html += '<img src="'+m.avatar+'" style=" position: absolute;"></div>';
		// }
		// html += '<div class="bt-content-chat on_'+m.idhoithoai+'"  data-hoithoai="'+m.idhoithoai+'" data-profile="'+m.id_profile+'" data-group="'+m.isgroup+'" data-img='+m.avatar+'>';
		// html += '<div class="bt-info-chat"><div class="bt-name-chat">'+m.namechat+'</div><div class="bt-date-chat">'+m.datetime+'</div></div>';
		// html += '<div class="bt-review-chat"><p><span> '+noidung+'</span></p><div class="pull-right">'+htmltinnhan+'</div></div><div class="owl-page"><img src="'+image_profile+'"><span>'+name_profile+'</span></div></div>';
		// html += '';

		// var idtag = m.idhoithoai+'_'+m.id_profile;
		// if (typeof(datatag[idtag]) !== 'undefined') {

		// 	var htmltag = '';
		// 	$.each(datatag[idtag], function(a,b){
		// 		if (typeof(b.id_tag) !== 'undefined') {
		// 			htmltag += '<li style="background:'+b.color+'; border: solid 1px #455575;" data-id-status-labels="118" data-id="'+b.id+'"><span style="color: #fff" data-id="'+b.id+'">'+b.tag+'<i class="fa fa-close" onclick="removetag(this,'+b.id+')"></i></span></li>';
		// 		}
		// 	});
		// 	html += '<div class="owl-tag pull-right wrap-color"><div class="tags-cons"><ul>'+htmltag+'</ul></div></div></a></div>';
		// } else {
		// 	html += '<div class="owl-tag pull-right wrap-color"><div class="tags-cons"><ul></ul></div></div></a></div>';
		// }
		top_mess = top_mess+74;
		$('#home .ReactVirtualized__Grid__innerScrollContainer').css('height',top_mess);
		$('#home .ReactVirtualized__Grid__innerScrollContainer').css('max-height','fit-content');


		$('.tabzalo_'+m.id_profile+' .ReactVirtualized__Grid__innerScrollContainer').css('height',top_mess);
		$('.tabzalo_'+m.id_profile+' .ReactVirtualized__Grid__innerScrollContainer').css('max-height','fit-content');
		$('.tabzalo_'+m.id_profile+' .ReactVirtualized__Grid__innerScrollContainer').append(htmltab);
	});
if (total_tinnhan > 0) {
	$('.homet .homenewmess').html(''+total_tinnhan+'');
}
//console.log('xuat hkjdfhshkdfhsdkjf');
$('#home .ReactVirtualized__Grid__innerScrollContainer').html(html);

$.each(lastmess, function(i,m){
	$.each(tagzalo , function(j,n){
		$.each(n , function(k,c){
			if ($.inArray(m.idhoithoai,c.conversations) !== -1 || $.inArray('g'+m.idhoithoai,c.conversations) !== -1) {
				var mk = '<div class="conv-filter-label" style="color:'+c.color+';float:left;"><i class="fa fa-tag-icon-n" style="position: relative; top: -2px;"></i><div class="contentzalo">'+c.text+'</div></div>';
				$('.parent_'+m.idhoithoai+' .item-content-container .conv-filter').append(mk);
			}
		});
	});
});
	// console.log(lastmess);
	var usechat = $('#tinnhandangdoc').attr('data-idhoithoai');
	$('.on_'+usechat).trigger("click");
	// console.log(usechat);
	return false;
}

$('body').on('click','.bt-content-chatv2',function(){
	  $(".bt-load-inbox-content").children().remove();
      var iduser = $(this).data('userid');
      var idgroup = $(this).data('idhoithoai');
      var namegroup = $(this).data('namegroup');
      $('#iduser').val(iduser);
      $('#idgroup').val(idgroup);
      // var html='<p>'+namegroup+'</p>';
      // $('.leftTime').html(html);
	var idhoithoai = $(this).parents('.bt-load-chat').data('idhoithoai');
	
	//console.log(idhoithoai);
        $('.bt-load-chat').removeClass('readding');
		$(this).parents('.bt-load-chat').addClass('readding');
		$(this).parents('.bt-load-chat').removeClass('chuadoc');
		$('.bt-default-mess').css('display','none');
		$('.bt-chat-mess').css('display','block');
		//var totalhoithoai = JSON.parse(localStorage.getItem("totalhoithoai"));
		var totalhoithoai = JSON.parse(localforage.getItem("totalhoithoai"));
		//var tinnhan = JSON.parse(localStorage.getItem("tinnhan"));
		var tinnhan = JSON.parse(localforage.getItem("tinnhan"));
		var html='';

		$.each(totalhoithoai, function(i,m){
            if(i == idhoithoai){
            	
            	//console.log(m);
            	for (var i = m.tinnhans.length -1; i >=0; i--) {
            		 //console.log(m.tinnhans[i].msgType);
            		if(m.tinnhans[i].msgType == 'webchat'){
            			if(m.tinnhans[i].uidFrom == 0){
            				var avt = $('#check_'+m.tinnhans[i].id_profile).data('avatar');
                            html += '<div style="opacity: 1;" class="bt-inbox-item bt-right bt-new-chat">';
					              html += '<div class="bt-inbox-item-avatar">';
					              html += '<img title="'+m.tinnhans[i].name+'" src="'+avt+'">';
					              html += '</div>';
					              html += '<div class="bt-inbox-item-text">';
					              html += '<span>'+m.tinnhans[i].noidung+'</span>';
					              html += '<span class="time_date"> '+m.tinnhans[i].datetime+'    |    '+m.tinnhans[i].name+'</span> </div>';
					              html += '</div>';
					              html += '</div>'; 
					              $('.bt-load-inbox-content').append(html);
            			}else{
            				
            				html += '<div style="opacity: 1;" class="bt-inbox-item bt-left bt-new-chat">';
					              html += '<div class="bt-inbox-item-avatar">';
					              html += '<img title="https://s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg" src="https://s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg">';
					              html += '</div>';
					              html += '<div class="bt-inbox-item-text">';
					              html += '<span>'+m.tinnhans[i].noidung+'</span>';
					              html += '<span class="time_date"> '+m.tinnhans[i].datetime+'    |    '+m.tinnhans[i].name+'</span> </div>';
					              html += '</div>';
					              html += '</div>'; 
					              $('.bt-load-inbox-content').append(html);
            			}
            			
            		}else if(m.tinnhans[i].msgType == 'chat.photo'){
            			if(m.tinnhans[i].uidFrom == 0){
            				var avt = $('#check_'+m.tinnhans[i].id_profile).data('avatar');
                             html +='<div class="bt-inbox-item bt-right">';
	            			html +='<div class="bt-inbox-item-avatar">';
	            			html +='<img title="'+m.tinnhans[i].name+'" src="'+avt+'"> ';
	            			html +=' </div>';
	            			html +='<div class="bt-inbox-item-text">';
	            			html +='<span class="span-text-img"><img src="'+m.tinnhans[i].noidung.thumb+'" class="img-responsive" style="width: 100%"></span>';
	            			html += '<span class="time_date"> '+m.tinnhans[i].datetime+'    |    '+m.tinnhans[i].name+'</span> </div>';
	            			html +='</div>';
	            			html +='</div>';
            			}else{
            				html +='<div class="bt-inbox-item bt-left">';
	            			html +='<div class="bt-inbox-item-avatar">';
	            			html +='<img title="" src="https://s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg"> ';
	            			html +=' </div>';
	            			html +='<div class="bt-inbox-item-text">';
	            			html +='<span class="span-text-img"><img src="'+m.tinnhans[i].noidung.thumb+'" class="img-responsive" style="width: 100%"></span>';
	            			html += '<span class="time_date"> '+m.tinnhans[i].datetime+'    |    '+m.tinnhans[i].name+'</span> </div>';
	            			html +='</div>';
	            			html +='</div>';
            			}
            				
            		}else if(m.tinnhans[i].msgType == 'chat.sticker'){
            			if(m.tinnhans[i].uidFrom == 0){
            				var avt = $('#check_'+m.tinnhans[i].id_profile).data('avatar');
                           html += '<div class="bt-inbox-item bt-left">';
	            			html += '<div class="bt-inbox-item-avatar">';
	            			html += '<img title="'+m.tinnhans[i].name+'" src="'+avt+'"> ';
	            			html += '</div>';
	            			html += '<div class="bt-inbox-item-text">';
	            			html += '<span class="span-text-img"><img src="https://zalo-api.zadn.vn/api/emoticon/sticker/webpc?eid='+m.tinnhans[i].noidung.id+'&size=130" class="img-responsive" style="width: 100%"></span>';
	            			html += '<span class="time_date"> '+m.tinnhans[i].datetime+'    |    '+m.tinnhans[i].name+'</span> </div>';
	            			html += '</div>';
	            			html += '</div>';
            			}else{
            				html += '<div class="bt-inbox-item bt-left">';
	            			html += '<div class="bt-inbox-item-avatar">';
	            			html += '<img title="" src="https://s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg"> ';
	            			html += '</div>';
	            			html += '<div class="bt-inbox-item-text">';
	            			html += '<span class="span-text-img"><img src="https://zalo-api.zadn.vn/api/emoticon/sticker/webpc?eid='+m.tinnhans[i].noidung.id+'&size=130" class="img-responsive" style="width: 100%"></span>';
	            			html += '<span class="time_date"> '+m.tinnhans[i].datetime+'    |    '+m.tinnhans[i].name+'</span> </div>';
	            			html += '</div>';
	            			html += '</div>';
            			}
            			
 
            		}
                    
            	};

            		var avatar = $('#check_'+m.id_profile).data('avatar');

            		
            	}
            	$('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
            	
           

		});
		
         var cookie = $('#check_'+iduser).data('cookie');
         var serectkey = $('#check_'+iduser).data('enk');
          var time = new Date().getTime();
         var urlchat = $('#check_'+iduser).data('urlchat');
		

		var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","urlchat":"'+urlchat+'","id_profile":"'+iduser+'"}';
        //socket.emit('messprofile',data);
		

});

function compare( a, b ) {
	if ( a.datetime < b.datetime ){
		return -1;
	}
	if ( a.datetime > b.datetime ){
		return 1;
	}
	return 0;
}

function sendReplyJs(content_chat){
	
	var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
	var idcl = $('#tinnhandangdoc').attr('data-idclid');

	var isgroup = $('#tinnhandangdoc').attr('data-group');
	var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
	var name_profile = $('.profile_'+id_profile).attr('data-name');
	var image_profile = $('.profile_'+id_profile).attr('data-image');
	var cookie = $('.profile_'+id_profile).attr('data-cookie');
	var enk = $('.profile_'+id_profile).attr('data-env');

	if (isgroup == 0) {
		var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_chat+'","id_profile":"'+id_profile+'"}';
		socket.emit('sendmesstext',param);

	} else {
		var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_chat+'","id_profile":"'+id_profile+'"}';
        
		socket.emit('sendmesstextgroup',param);
	}
}
function sendReplyImage(url,content){
	var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
	var idcl = $('#tinnhandangdoc').attr('data-idclid');

	var isgroup = $('#tinnhandangdoc').attr('data-group');
	var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
	var name_profile = $('.profile_'+id_profile).attr('data-name');
	var image_profile = $('.profile_'+id_profile).attr('data-image');
	var cookie = $('.profile_'+id_profile).attr('data-cookie');
	var enk = $('.profile_'+id_profile).attr('data-env');
	// var content_chat =  $('.bt-input-note').val();
	if (isgroup == 0) {
		var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content+'","id_profile":"'+id_profile+'","url_image":"'+url+'"}';
		socket.emit('sendimageprofile',param);
	} else {
		var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content+'","id_profile":"'+id_profile+'","url_image":"'+url+'"}';
		socket.emit('sendimagegroup',param);
	}
}

$('body').on('click','.chat-input__content__send',function(){
	var content_c = $(this).parents('.chatzalov2').find('.bt-input-note').val();
	content_c = content_c.replace(/(?:\r\n|\r|\n)/g, '\\n');
	console.log(content_c);
	sendReplyJs(content_c);
    savemess(1);
	$(this).parents('.chatzalov2').find('.bt-input-note').val('');
	return false;
	
});
$('body').on('keyup','.bt-input-note',function(event){

	if (event.which == 13) {

        savemess(1);
		var content_c = $(this).parents('.chatzalov2').find('.bt-input-note').val();
		content_c = content_c.replace(/(?:\r\n|\r|\n)/g, '\\n');
		sendReplyJs(content_c);
		$(this).parents('.chatzalov2').find('.bt-input-note').val('');
		return false;
	}
});
$('.btn-save-pageprofile').on('click',function(){
			// $('#chontaikhoan').hide();
			// gettag();
			 $("li").remove(".nav-accountzalo");
			lastmess = [];
			hoithoai = {};
			hoithoaigroup = {};
			tinnhanchuadoc = [];
			$('.bt-loader').show();
			$('.bt-chat-mess').hide();
			$('.bt-default-mess').show();
			var check_page = 0;
			var profilecheck = [];
			var html = '';
			$('.checkallprofile:checked').each(function(i,value){
                 console.log(i);
				check_page = 1;
				profilecheck.push($(this).val());
				html += $(this).attr('data-name')+',';
				var data = '{"cookie":"'+$(this).attr('data-cookie')+'","serectkey":"'+$(this).attr('data-env')+'","urlchat":"'+$(this).attr('url-chat')+'","id_profile":"'+$(this).val()+'"}';
				var datav2 = '{"page": 1, "count": 100, "cookie":"'+$(this).attr('data-cookie')+'","serectkey":"'+$(this).attr('data-env')+'","id_profile":"'+$(this).val()+'"}';
				//console.log(data);

				// setTimeout(function(){
				// 	socket.emit('messprofile',data);
				// 	socket.emit('getfriendnew',data);
				// 	socket.emit('gettag',data);

				// 	socket.emit('getnamev2',datav2);
				// },i*2000);

				var id_profile = $(this).val();
				$('.nav-tabs').append('<li class="nav-item nav-accountzalo" onclick="activetab(this,\'#menu'+i+'\')"><a href="javascript:void(0);" class="nav-link newmes_'+$(this).val()+'" style="float: left;">'+$(this).attr('data-name')+'<div style="width: fit-content;background: red;border-radius: 50%;float: right;margin-top: -5px;"><span style="color: white;padding: 7px;" class="loadtinnhanmoi homenewmess countmess_'+$(this).val()+'" data-tinnhan="0"></span></div></li>');
				$('.tab-content').removeClass('mb-1');
				$('.tab-content').append('<div id="menu_'+id_profile+'" class="tab-pane fade tabzalo_'+$(this).val()+'"></div>');
				$('#menu'+i+'').html($('#home').html());
				
			});
			var k = 0;
			for (var i = 0; i < profilecheck.length; i++) {
				setTimeout(function timer(){
					 var cookie = $('.profile_'+profilecheck[k]).data('cookie');
					 var serectkey = $('.profile_'+profilecheck[k]).data('env');
					 var urlchat = $('.profile_'+profilecheck[k]).data('urlchat');
					 var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","urlchat":"'+urlchat+'","id_profile":"'+profilecheck[k]+'"}';
				     var datav2 = '{"page": 1, "count": 100, "cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_profile":"'+profilecheck[k]+'"}';
				     //console.log(data);
					 socket.emit('messprofile',data);
                    
					   setTimeout(function timer(){
                          socket.emit('getfriendnew',data);
                          //socket.emit('gettag',data);
					   },i*12000);
					   setTimeout(function timer(){
                          socket.emit('getnamev2',datav2);
					   },i*13000);
					   // setTimeout(function timer(){
        //                  socket.emit('gettag',data);
					   // },i*14000);
					
					socket.emit('gettag',data);

					// socket.emit('getnamev2',datav2);
                     
					 k++;
				},i*10000);
			 }

			// localStorage.setItem("selectprofile", JSON.stringify(profilecheck));
			if (check_page == 0) {
				alertBox('Vui lòng chọn tài khoản',"danger",false,true,true);
				return false;
			} else {
				$('.choiceaccount').html(html.replace(/,+$/,''));
			}
		});
});

function loadimg(el){
	var src = $(el).attr('data-img');
	$('#loadimg .modal-body').html('<img src="'+src+'" class="img-responsive" width="100%"/>');
}
function loadvideo(el){
	var src = $(el).find('a').attr('src');
	var html = '<video width="100%" controls><source src="'+src+'" type="video/mp4"></video>';
	$('#loadvideo .modal-body').html(html);
}
function playaudio(){
	// var audio = new Audio(' assets('theme/default/ringtone/ringtone.mp3') }}');
	// audio.play();
}
function changeTitle() {
	countmess++;
	var newTitle = '(' + countmess + ') ' + 'tin nhắn mới';
	document.title = newTitle;
		// console.log(countmess);
	}
	function searchByTagName(ob) {
		//console.log("jhfsdfdfsdfhsdkfhsdfhkj");
		var el = $(ob).parents('.tab-pane');
		$(el).find('.filter-tag-item').removeClass('selected');
		$(ob).parent().addClass('selected');
		var value = $(ob).attr('data-id');

		if (value == 'Tất cả') {
			$(el).find('.filterbystatus').val('0');
			$(el).find(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat").each(function() {
				$(this).css('display', 'block');
			});

		} else {
			$(el).find('.filterbystatus').val(value);
			$(el).find(".ReactVirtualized__Grid__innerScrollContainer >.bt-load-chat").css('display', 'none');
			// $('.bt-make-click-ft').click();
			$(el).find(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat .contentzalo").filter(function() {
				if (String($(this).html()).indexOf(value) == '0') {
					$(this).closest('.bt-load-chat').css('display', 'block');
				}
			});
		}
		
	}

	function mouseDown(el,event) {
		
		var cookiev2 =  $(el).find('.bt-content-chat').attr('data-cookie');
  		var serectkeyv2 =  $(el).find('.bt-content-chat').attr('data-env');
  		var id_user =  $(el).find('.bt-content-chat').attr('data-hoithoai');

  		$('#cookiev2').val(cookiev2);
  		$('#serectkeyv2').val(serectkeyv2);
  		$('#id_friend').val(id_user);



		
		 if(event.which == 3)
	      {	

	      	$('#questionMarkId').show();
	      		var tagzalo = JSON.parse(localStorage.getItem("tagzalo"));
	      		var id_profile = $(el).find('.bt-content-chat').attr('data-profile');
	      		var id_hoithoai = $(el).find('.bt-content-chat').attr('data-hoithoai');
	      		var isgroup = $(el).find('.bt-content-chat').attr('data-group');

	      		


	      		$('#questionMarkId').css({'top':event.pageY+5,'left':event.pageX, 'position':'absolute'});
	      		var taghtml = '';
                if (typeof(tagzalo[id_profile]) != 'undefined') {
                   
                    $.each(tagzalo[id_profile], function(i,m){
                        if (typeof(m.text) != 'undefined') {
                        	 //console.log(tagzalo[id_profile]);
                             taghtml += '<li class="updatetagall" data-profile="'+id_profile+'" data-user="'+id_hoithoai+'" data-color="'+m.color+'" data-text="'+m.text+'" data-idtag="'+m.id+'" data-group="'+isgroup+'"><a href="https://zalov2.phanmemninja.com/chat/chatprofile#"><span href="#"  style="color:'+m.color+';">'+m.text+'</span></a></li>';
                        }
                    });

                    if (taghtml == '') {
                        $('.tagbyprofileall').html('<li>Không có thẻ tag</li>');  
                    } else {
                    	 console.log(tagzalo[id_profile]);
                        $('.tagbyprofileall').html(taghtml);
                    }
                    
                }
	      }
	}
	
	function searchfriend(ob) {
		var value = $(ob).val().toLowerCase();
		debugger;
		$(".listfriendbyid>.bt-item-fp").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
			
		});
	}

	

    function searchnember(ob) {
        var value = $(ob).val().toLowerCase();
        $(".listfriendjoingroup>.bt-item-fp").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    }
	
	function closePopup(id_user){
		console.log("sdfgfsdkjfsdjf");
		$('.dragdropchat_'+id_user).remove();
		$('.indexdragdropchat').each(function(i, v){
			var right = (i + 1) * 285 - 285 + (i + 1) * 15;
			$(this).css('right', right+'px');
		});
	}
	// $(".ReactVirtualized__Grid__innerScrollContainer").mousedown('.bt-load-chat',function(ev){
	//      if(ev.which == 3)
	//       {		
	//       		var id_profile = $(this).find('.bt-load-chat').css('display','none');
	//       		$('#questionMarkId').css({'top':ev.pageY+5,'left':ev.pageX, 'position':'absolute'});
	//             console.log(id_profile);
	//       }
	// });


    function Deleteaccountzalo(){
        var check = 0;
        var groupaccount = [];
        $('.deleteaccount:checked').each(function(){
            groupaccount.push($(this).val());
            check = 1;
        });
        if (check == 0) {
            alertBox("Vui lòng chọn tài khoản muốn xóa","danger",false,true,true);
            return false;
        }
        $.ajax({
            url: '{{ url("settings/fb_accounts/delete") }}',
            dataType: 'json',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: { 
                id: JSON.stringify(groupaccount),
                csrf_kingposter: getCookie('csrf_kingposter_cookie')
            },
            success: function( data, textStatus, jQxhr ){
                if(data.status == "success"){
                   alertBox("Xóa tài khoản thành công","success",false,true,true);
                   location.reload();
                }else{
                    alertBox("Xóa tài khoản không thành công","danger",false,true,true);
                }
            },
            error: function( jqXhr, textStatus, errorThrown ){ 
            },
            complete: function() {
            }
        });
    }
    function addproducttoorder(ab) {
        $('.bt-result-search-item').css('display','none');
        var name_product = $(ab).find('.bt_name_product_choose').text();
        var price_product = $(ab).find('.bt_price_product_choose').attr('data-price');
        var qty_product = $(ab).attr('qty_product');
        var id_product = $(ab).attr('id_product');
        var id_comb = $(ab).attr('id_comb');
        if (id_comb != 'null') {
            var keyadd = '_'+id_comb;
        } else{
            var keyadd = '';
        }
        if ($('.product_'+id_product+keyadd).length < 1) {
            var html = '';
            html += '<tr class="tr_product_order product_'+id_product+keyadd+'">';
                html += '<input class="arridproductoreder" name="idproductadd[]" type="hidden" value="'+id_product+'" />';
                html += '<input class="arridpcomboreder" name="id_combadd[]" type="hidden" value="'+id_comb+'" />';
                html += '<td class="col-md-6">';
                    html += '<i onclick="removeproductorderadd(this)" style="float: left;font-size: 12px;margin-top: 10px;margin-right: 5px; cursor:pointer;" class="fa fa-close text-danger"></i>';
                    html += '<span style="vertical-align: -webkit-baseline-middle;">'+name_product+'</span>';
                html += '</td>';
                html += '<td class="col-md-3">';
                    html += '<span style="vertical-align: -webkit-baseline-middle;" class="price-a-product" data-price="'+price_product+'">'+price_product+' đ</span>';
                html += '</td>';
                html += '<td class="col-md-2">';
                    html += '<input required class="form-control arrqtyproduct" step="any" type="number" name="" value="1" min="1" max="'+qty_product+'" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onblur="minQtyOfProduct(this, \''+price_product+'\')" onkeyup="getQuantitiesProduct(this, \''+price_product+'\', \'arr_id_product_comb_oreder['+$('.tr_product_order').length+'][qty_product]\');">';
                html += '</td>';
                html += '<td class="col-md-2">';
                    html += '<input required class="form-control arrweightproduct" step="any" type="number" name="" value="0" min="0" max="20" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46" onkeyup="maxWeightOfProduct(this, \'arr_id_product_comb_oreder['+$('.tr_product_order').length+'][weight_product]\')" onblur="minWeightOfProduct(this, \'arr_id_product_comb_oreder['+$('.tr_product_order').length+'][weight_product]\')"><span style="float: left; padding-top: 8px;">&nbsp;KG</span>';
                html += '</td>';
            html += '</tr>';
            $('.content-product-add').append(html);
            calculatorSumPrice();
        }
    }
    function removeproductorderadd(ab) {
        $(ab).parent('td').parent('tr').remove();
        
        getFeeShipping();
        calculatorSumPrice();
    }
    function calculatorSumPrice() {
        var sum = 0;
        $('.bt-product-order tbody tr').each(function() {
            sum = sum + (parseFloat($(this).find('.price-a-product').attr('data-price')) * parseInt($(this).find('.arrqtyproduct').val()));
        });
        $('#bt-calproduct').html('<b>'+sum+'</b>');
        
        var shipping_price = 0;
        if ($('.cl_change_type_shipping option:selected').val() == "-1") {
            if ($('#order_ship_price').val() != '') {
                shipping_price = parseFloat($('#order_ship_price').val());
                
                $('#order_ship_price').val(shipping_price);
            }
        }
        if ($('.cl_change_type_shipping option:selected').val() == "0") {
            if ($('input[name="pick_fee_ship"]:checked').val() == "0") {
                shipping_price = parseFloat($('input[name="show_ship_money"]').attr('value'));
            }
        }
        if ($('.cl_change_type_shipping option:selected').val() == "1") {
            if ($('input[name="pick_fee_ship_ghn"]:checked').val() == "2") {
                shipping_price = parseFloat($('input[name="show_ship_money_ghn"]').attr('value'));
            }
        }
        sum = sum + shipping_price;
        
        var discount_price = 0;
        if ($('#bt_change_discount').val() != '') {
            discount_price = parseFloat($('#bt_change_discount').val());
        }
        if ($('#bt_change_type_discount').val() == 1) {
            var discount_amout = 0;
            discount_amout = (discount_price * sum)/100;
            sum = sum - discount_amout;
            
            $('#order_disscount').val(discount_amout);
        } else {
            sum = sum - discount_price;
            
            $('#order_disscount').val(discount_price);
        }
        
        if (sum < 0) {
            sum = 0;
        }
        $('input[name="bt-calorder"]').val(sum);
        $('#bt-calorder').html('<b>'+sum+'</b>').attr('data-price-order', sum);
        // console.log(sum);
    }
    function getFeeShipping() {
        $('.wrap_order_ship_price').css('display', 'block');
        $('.wrap_ghtk').css('display', 'none');
        
        $('.wrap_ghn').css('display', 'none');
        $('.box_shipping').css('display', 'block');
        $('.box_shipping_ghn').css('display', 'none');
        
        var type_shipping = $('.cl_change_type_shipping').val();
        if (type_shipping == "0") {
            $('.wrap_order_ship_price #order_ship_price').val(0);
            $('.wrap_order_ship_price').css('display', 'none');
            $('.wrap_ghtk').css('display', 'block');
            getFeeShippingGHTK(0);
        }
        if (type_shipping == "1") {
            $('.wrap_order_ship_price #order_ship_price').val(0);
            $('.wrap_order_ship_price').css('display', 'none');
            $('.wrap_ghn').css('display', 'block');
            $('.box_shipping').css('display', 'none');
            $('.box_shipping_ghn').css('display', 'block');
            getAvailableServices();
            // getFeeShippingGHTK(1);
        }
    }
    function saveTokenGHTKCreateOrder() {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var token_ghtk_create_order = $('input[name="token_ghtk_create_order"]').val();
        if (token_ghtk_create_order != '') {

            $.ajax({
                url: '{{ url("chatprofile/home/savetokenghtk") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: { 
                    token_ghtk_create_order: token_ghtk_create_order,
                    csrf_kingposter: getCookie('csrf_kingposter_cookie')
                },
                success: function( data, textStatus, jQxhr ){
                    if (data == 1) {
                        $('.wrap_check_token').css('display', 'none');
                        $('.wrap_infor_shipping').css('display', 'block');
                        var html = '<div class="alert alert-success">Lưu token thành công</div>';
                        $('.requiredtokenghtk_create_order').html(html);
                    } else {
                        var html = '<div class="alert alert-danger">Lỗi lưu</div>';
                        $('.requiredtokenghtk_create_order').html(html);
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){ 
                },
                complete: function() {
                }
            });
            
        } else {
            var html = '';
            html += '<span class="invalid-feedback" role="alert" style="color: red">';
                html += '<strong>Nhập token</strong>';
            html += '</span>';
            $('.requiredtokenghtk_create_order').html(html);
            $('.token_ghtk_create_order').css('border-color', 'red');
        }
    }
    function getFeeShippingGHTK(type_shipping) {
        var sum_weight = 0;
        $('.bt-product-order tbody tr').each(function() {
            sum_weight = sum_weight + parseFloat($(this).find('.arrweightproduct').val());
        });
        if (type_shipping == 0) {
            var pick_province = $('#pick_order_thanhpho option:selected').attr('data-name');
            var pick_district = $('#pick_order_quanhuyen option:selected').attr('data-name');
            var pick_ward = $('#pick_order_xaphuong option:selected').attr('data-name');
            var pick_street = $('.pick_address').val();
            
            var province = $('.selecttinh option:selected').html();
            var district = $('.quanhuyen option:selected').html();
            var ward = $('.xaphuong option:selected').html();
            var street = $('.address_client').val();
            
            var value = $('.pick_value_money').val();
            var transport = $('.pick_transport').val();
            
            var ob_infor_ship = {};
            ob_infor_ship['pick_province'] = pick_province;
            ob_infor_ship['pick_district'] = pick_district;
            ob_infor_ship['pick_ward'] = pick_ward;
            ob_infor_ship['pick_street'] = pick_street;
            
            ob_infor_ship['province'] = province;
            ob_infor_ship['district'] = district;
            ob_infor_ship['ward'] = ward;
            ob_infor_ship['street'] = street;
            
            ob_infor_ship['weight'] = sum_weight;
            ob_infor_ship['value'] = value;
            ob_infor_ship['transport'] = transport;
            
            ob_infor_ship = JSON.stringify(ob_infor_ship);
            // console.log(ob_infor_ship);
            // console.log(district);
            // console.log(ward);
            // console.log(street);
        }
        if (type_shipping == 1) {
            var length = $('.pick_length').val();
            var width = $('.pick_width').val();
            var height = $('.pick_height').val();
            var pick_district = $('#pick_order_thanhpho_ghn option:selected').attr('data-district_id');
            var district = $('#order_thanhpho_ghn option:selected').attr('data-district_id');
            var services_id = $('.services_ghn:checked').val();
            var value = $('.pick_value_money_ghn').val();
            
            var ob_infor_ship = {};
            ob_infor_ship['Weight'] = parseInt(sum_weight*1000);
            ob_infor_ship['Length'] = parseInt(length);
            ob_infor_ship['Width'] = parseInt(width);
            ob_infor_ship['Height'] = parseInt(height);
            ob_infor_ship['FromDistrictID'] = parseInt(pick_district);
            ob_infor_ship['ToDistrictID'] = parseInt(district);
            ob_infor_ship['ServiceID'] = parseInt(services_id);
            ob_infor_ship['InsuranceFee'] = parseInt(value);
            
            ob_infor_ship = JSON.stringify(ob_infor_ship);
        }


        $.ajax({
            url: '{{ url("chatprofile/home/calculatorsumshipghtk") }}',
            dataType: 'json',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: { 
                ob_infor_ship: ob_infor_ship,
                type_shipping: type_shipping,
                csrf_kingposter: getCookie('csrf_kingposter_cookie')
            },
            success: function( data, textStatus, jQxhr ){
                // if (data == 1) {
                //     $('.wrap_check_token').css('display', 'none');
                //     $('.wrap_infor_shipping').css('display', 'block');
                //     var html = '<div class="alert alert-success">Lưu token thành công</div>';
                //     $('.requiredtokenghtk_create_order').html(html);
                // } else {
                //     var html = '<div class="alert alert-danger">Lỗi lưu</div>';
                //     $('.requiredtokenghtk_create_order').html(html);
                // }
            },
            error: function( jqXhr, textStatus, errorThrown ){ 
            },
            complete: function(data, textStatus, jQxhr) {
                data = JSON.parse(data.responseText);
                
                if (type_shipping == 0) {
                    if (data.httpcode == 200) {
                        $('input[name="show_ship_money"]').val(data.content);
                        $('.show_ship_money').text(data.content + ' đ').css('color', '#333');
                        calculatorSumPrice();
                    }
                    if (data.httpcode == 403) {
                        $('.show_ship_money').text(data.content).css('color', '#ff0000');
                    }
                }
                if (type_shipping == 1) {
                    if (data.httpcode == 200) {
                        $('input[name="show_ship_money_ghn"]').val(data.content);
                        $('.show_ship_money_ghn').text(data.content + ' đ').css('color', '#333');
                        calculatorSumPrice();
                    }
                    if (data.httpcode == 403) {
                        $('.show_ship_money_ghn').text(data.content).css('color', '#ff0000');
                    }
                }
            }
        });
    }
    function minQtyOfProduct(ob, price) {
        var content = $(ob).val();
        if (content == '') {
            content = 1;
            $(ob).val(content);
        }
        
        getFeeShipping();
        calculatorSumPrice();
    }
    function getQuantitiesProduct(ob, price, qty_hidden) {
        var content = parseInt($(ob).val());
        var max = $(ob).attr('max');
        var total_price = '';
        if (content < 1) {
            content = 1;
            $(ob).val(content);
        }
        if (content > max) {
            content = max;
            $(ob).val(content);
        }
        
        calculatorSumPrice();
    }

    function maxWeightOfProduct(ob, weight_hidden) {
        var content = parseFloat($(ob).val());
        if (content > 20) {
            content = 20;
            $(ob).val(content);
        }
        $('input[name="'+weight_hidden+'"]').val(content);
    }

    function minWeightOfProduct(ob, weight_hidden) {
        if ($(ob).val() == '') {
            content = 0;
            $(ob).val(content);
            $('input[name="'+weight_hidden+'"]').val(content);
        }
        getFeeShipping();
    }
    function getAvailableServices() {
        var sum_weight = 0;
        $('.table tbody tr').each(function() {
            sum_weight = sum_weight + parseFloat($(this).find('.arrweightproduct').val());
        });
        console.log(sum_weight);
        var pick_district = $('#pick_order_thanhpho_ghn option:selected').attr('data-district_id');
        var district = $('#order_thanhpho_ghn option:selected').attr('data-district_id');
        var length = $('.pick_length').val();
        var width = $('.pick_width').val();
        var height = $('.pick_height').val();

        var params = {};
        params['pick_district'] = pick_district;
        params['district'] = district;
        params['sum_weight'] = sum_weight;
        params['length'] = length;
        params['width'] = width;
        params['height'] = height;
        params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
        $.ajax({
            url: '{{ url("chatprofile/home/getavailableservices") }}',
            dataType: 'json',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: params,
            success: function( data, textStatus, jQxhr ){
            },
            error: function( jqXhr, textStatus, errorThrown ){ 
            },
            complete: function(result, textStatus, jQxhr) {

                $('input[name="show_ship_money_ghn"]').val(0);
                $('.show_ship_money_ghn').text(0 + ' đ').css('color', '#333');
                calculatorSumPrice();
                
                data = JSON.parse(result.responseText);
                
                if (data.httpcode == 200) {
                    var html = '';
                    $.each(data, function(i, v) {
                        if (i != 'httpcode') {
                            html += '<input type="radio" style="margin: 4px;" name="services_ghn" id="id_services'+v.serviceid+'_ghn" value="'+v.serviceid+'" class="services_ghn">';
                            html += '<label style="cursor:pointer" for="id_services'+v.serviceid+'_ghn">'+v.name+' (Dự kiến giao <b>'+v.expecteddeliverytime+'</b>)</label>';
                            html += '<br/>';
                        }
                    });
                    $('.box_services_ghn').html(html);
                }
            }
        });
        // $.ajax({
        //     'url':njbase+'/messenger/fanpage/getavailableservices',
        //     'data': 'pick_district='+pick_district+'&district='+district+'&sum_weight='+sum_weight+'&length='+length+'&width='+width+'&height='+height,
        //     'type': 'get',
        //     'complete': function(result){
        //         $('input[name="show_ship_money_ghn"]').val(0);
        //         $('.show_ship_money_ghn').text(0 + ' đ').css('color', '#333');
        //         calculatorSumPrice();
                
        //         data = JSON.parse(result.responseText);
                
        //         if (data.httpcode == 200) {
        //             var html = '';
        //             $.each(data, function(i, v) {
        //                 if (i != 'httpcode') {
        //                     html += '<input type="radio" style="margin: 4px;" name="services_ghn" id="id_services'+v.serviceid+'_ghn" value="'+v.serviceid+'" class="services_ghn">';
        //                     html += '<label style="cursor:pointer" for="id_services'+v.serviceid+'_ghn">'+v.name+' (Dự kiến giao <b>'+v.expecteddeliverytime+'</b>)</label>';
        //                     html += '<br/>';
        //                 }
        //             });
        //             $('.box_services_ghn').html(html);
        //         }
        //     }
        // });
    }
    function maxWeightOfProduct(ob, weight_hidden) {
        var content = parseFloat($(ob).val());
        if (content > 20) {
            content = 20;
            $(ob).val(content);
        }
        $('input[name="'+weight_hidden+'"]').val(content);
    }

    function minWeightOfProduct(ob, weight_hidden) {
        if ($(ob).val() == '') {
            content = 0;
            $(ob).val(content);
            $('input[name="'+weight_hidden+'"]').val(content);
        }
        getFeeShipping();
    }

    function maxValueMoney(ob) {
        var content = parseFloat($(ob).val());
        if (content > 20000000) {
            content = 20000000;
            $(ob).val(content);
        }
    }

    function minValueMoney(ob) {
        if ($(ob).val() == '') {
            content = 0;
            $(ob).val(content);
        }
    }

    function maxLengthWidthHeight(ob) {
        var content = parseFloat($(ob).val());
        if (content > 200) {
            content = 200;
            $(ob).val(content);
        }
    }
    function minLengthWidthHeight(ob) {
        if ($(ob).val() == '') {
            content = 0;
            $(ob).val(content);
        }
    }

    function validPhone(str) {
        var pattern = new RegExp('^(\\+84-|\\+84|0)?\\d{9}$','i');
        return !!pattern.test(str);
    }

    function searchkhuvuc(ob) {
        var value = $(ob).val().toLowerCase();
        $(ob).next('select').find('option').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    }
    function closedonhang(){
        $('.taodonhang').fadeOut("slow");
    }
    function opendonhang(){
        $('.taodonhang').fadeIn("slow");
        var id_user = $('#tinnhandangdoc').attr('data-idhoithoai');
        var img = $('.on_'+id_user).attr('data-img');
        var name = $('.on_'+id_user).find('.item-title-name').html();
        $('.namekhachhang').html(name);
        $('.anhkhachhang').attr('src',img);
    }
    function searchkhuvuc(ob) {
        var value = $(ob).val().toLowerCase();
        $(ob).next('select').find('option').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    }
    function saveTokenGHNCreateOrder() {
        var token_ghn_create_order = $('input[name="token_ghn_create_order"]').val();

        if (token_ghn_create_order != '') {
            $.ajax({
                url: '{{ url("chatprofile/home/savetokenghn") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: { 
                    token_ghn_create_order: token_ghn_create_order,
                    csrf_kingposter: getCookie('csrf_kingposter_cookie')
                },
                success: function( result, textStatus, jQxhr ){
                    if (result == 1) {
                        $('.wrap_check_token').css('display', 'none');
                        $('.wrap_infor_shipping').css('display', 'block');
                        var html = '<div class="alert alert-success">Lưu token thành công</div>';
                        $('.requiredtokenghn_create_order').html(html);
                    } else {
                        var html = '<div class="alert alert-danger">Lỗi lưu</div>';
                        $('.requiredtokenghn_create_order').html(html);
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){ 
                },
                complete: function() {
                }
            });
        } else {
            var html = '';
            html += '<span class="invalid-feedback" role="alert" style="color: red">';
                html += '<strong>Nhập token</strong>';
            html += '</span>';
            $('.requiredtokenghn_create_order').html(html);
            $('.token_ghn_create_order').css('border-color', 'red');
        }
    }

    function savemess(type){
        var id_khach = $('#tinnhandangdoc').attr('data-idhoithoai');
        var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
        var is_group = $('#tinnhandangdoc').attr('data-group');
        var _token = $('input[name="_token"]').val(); 
        var params = {};
        params['id_khach'] = id_khach;
        params['type'] = 1;
        params['id_profile'] = id_profile;
        params['is_group'] = is_group;
        params['csrf_kingposter'] = _token;
        $.ajax({
            url: '{{ url("chat/savemess") }}',
            dataType: 'json',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: params,
            success: function( result, textStatus, jQxhr ){
            },
            error: function( jqXhr, textStatus, errorThrown ){ 
            },
            complete: function() {
            }
        });
    }
    function savemesskh(id_user,id_profle){
        var params = {};
        params['id_khach'] = id_user;
        params['id_profile'] = id_profle;
        params['type'] = 0;
        var id_khach = id_user;
        var id_profile = id_profle;
        var type = 0;

        var _token = $('input[name="_token"]').val();
        params['csrf_kingposter'] = _token;
        $.ajax({
            url: '{{ url("chat/savemess") }}',
            dataType: 'json',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data: {id_khach:id_khach, id_profile:id_profile, type:type, _token:_token},
            success: function( result, textStatus, jQxhr ){
            },
            error: function( jqXhr, textStatus, errorThrown ){ 
            },
            complete: function() {
            }
        });
    }
    function getImageSizeInBytes(imgURL) {
        var request = new XMLHttpRequest();
        request.open("HEAD", imgURL, false);
        request.send(null);
        var headerText = request.getAllResponseHeaders();
        var re = /Content\-Length\s*:\s*(\d+)/i;
        re.exec(headerText);
        return parseInt(RegExp.$1);
    }
    function sendimage(photoId,desc,toid,rawUrl,thumbUrl,normalUrl,hdUrl,cookie,serectkey,id_profile,width,height){
          try{
            var time = new Date().getTime();
            //var param = '{"photoId":"'+photoId+'","clientId":'+time+',"desc":"'+desc+'","width":'+width+',"height":'+height+',"rotation":0,"flip":false,"toid":"'+toid+'","rawUrl":"'+rawUrl+'","thumbUrl":"'+thumbUrl+'","normalUrl":"'+normalUrl+'","hdUrl":"'+hdUrl+'","zsource":301}';
            var param = '{"photoId":"'+photoId+'","clientId":'+time+',"width":'+width+',"height":'+height+',"rotation":0,"flip":false,"toid":"'+toid+'","rawUrl":"'+rawUrl+'","thumbUrl":"'+thumbUrl+'","normalUrl":"'+normalUrl+'","hdUrl":"'+hdUrl+'","zsource":301}';
             var _token = $('input[name="_token"]').val(); 
            var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
            //console.log(encrypted);
            var params = {};
            params['encrypted'] = encrypted;
            params['cookie'] = cookie;
            params['csrf_kingposter'] = _token;
            $.ajax({
                url: '{{ url("chat/postimagezalo") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {encrypted:encrypted,cookie:cookie, _token:_token},
                success: function( data, textStatus, jQxhr ){

                    var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
                     
                    var result =  JSON.parse(decrypted);
                    console.log(result);

                },
                error: function( jqXhr, textStatus, errorThrown ){ 
                },
                complete: function() {
                }
            });
          } catch(e){
            console.log(e);
          }
    }


    //send file zalo
        function sendfile(fileId,desc,toid,cookie,serectkey,id_profile,){
        	console.log("kdsfjghkdjfghfdgjh");
            try{
                var time = new Date().getTime();
                var param = '{"fileId":"'+fileId+'","clientId":'+time+',"desc":"'+desc+'","rotation":0,"flip":false,"toid":"'+toid+'","zsource":301}';

                var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
                var params = {};
                params['encrypted'] = encrypted;
                params['cookie'] = cookie;
                params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
                $.ajax({
                    url: '{{ url("chatprofile/home/postfilezalo") }}',
                    dataType: 'json',
                    type: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: params,
                    success: function( data, textStatus, jQxhr ){

                        var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
                        console.log(decrypted);
                        var result =  JSON.parse(decrypted);

                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                    },
                    complete: function() {
                    }
                });
            } catch(e){
                console.log(e);
            }

        }
        //end send file zalo
    function sendimagegroup(photoId,desc,toid,rawUrl,thumbUrl,normalUrl,hdUrl,cookie,serectkey,id_profile,width,height){
          try{
            var time = new Date().getTime();
            var param = '{"photoId":'+photoId+',"clientId":'+time+',"desc":"'+desc+'","width":'+width+',"height":'+height+',"rotation":0,"flip":false,"grid":"'+toid+'","rawUrl":"'+rawUrl+'","thumbUrl":"'+thumbUrl+'","oriUrl":"'+rawUrl+'","hdUrl":"'+hdUrl+'","zsource":301}';

            var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
            var params = {};
            params['encrypted'] = encrypted;
            params['cookie'] = cookie;
            params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
            $.ajax({
                url: '{{ url("chatprofile/home/postimagezalogroup") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: params,
                success: function( data, textStatus, jQxhr ){

                    var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
                     console.log(decrypted);
                    var result =  JSON.parse(decrypted);

                },
                error: function( jqXhr, textStatus, errorThrown ){ 
                },
                complete: function() {
                }
            });
          } catch(e){
            console.log(e);
          }
    }
    function checkbox(el){
        if($(el).is(":checked")){
            $('.nembergroup').prop('checked', true);
        }else{
            
            $('.nembergroup').prop('checked', false);
        }
    }

   //socket
 		var groups = []; // List of selected groups
		var TOTALPOSTINGTIME = 0; // in milliseconds
		var leftTime = 0;
		var postingInterval = 0;
		var countGroup = 0;
		var nextGroup = 0;
		var timeDeff = 30000; // default 30 seconds
		var randomInterval = 0;
		var countmess = 0;
		var listuser= [];
		var imgchiendich = '';
		var imgsendgroup = '';
		function playaudio(){
			var audio = new Audio('assets/ringtone/tin-nhan-han-quoc.mp3');
			audio.play();
		}
		function changeTitle() {
			countmess++;
			var newTitle = '(' + countmess + ') ' + 'tin nhắn mới';
			document.title = newTitle;
			console.log(countmess);
		}
		var checkreconnect = 0;
		var socket = io("http://localhost:8686/",{'forceNew':true });
		//var socket = io("https://sv3.phanmemninja.com",{'forceNew':true });
		socket.on("reconnect", function(data) {
			checkreconnect = 1;
			// $( ".btn-save-pageprofile" ).trigger( "click" );
		});

		socket.on( 'connect', function () {
			
			console.log( 'connected to server' );
		} );

		// socket.on( 'disconnect', function () {

		// 	socket.emit('join', 'aaaaaaaa');
		// 	console.log( 'disconnected to server' );
		// });

		socket.on('disconnect', (reason) => {
		    socket.emit('join', 'aaaaaaaa');
		    console.log(reason);
		    console.log( 'disconnected to server' );
		  });
		if (checkreconnect==1) {
			var arr_page = [];
			var check_page = 0;
			$('.checkallfanpage').each(function(i, value){
				if ($(value).is(':checked')) {
					check_page = 1;
					arr_page.push($(value).val());
				}
			});
			if (check_page == 1) {
				socket.emit('data', arr_page);
			}
		}
   		var heightcal = 0;
   		socket.on("new message2", function(data) {
             //console.log(data);
   		});



//----------------------------goi y ket ban -------------------------------
function selectPageAndaddfriennd(ob){
		 	
		  	    count_loimoi = 0;
				count_goiy = 0;
			  	$('.data-friend').html('');
				$('.data-friendgoiy').html('');
			  	$('#materialPreloader').show();
			  	var check = 0;
			  	
			  	$('.selectepageprofile').each(function(i, value){
			  		if ($(this).is(':checked')) {
			  			check = 1;
			  			var id_profile = $(this).val();
			  			var cookie = $(this).attr('data-cookie');
			  			var serectkey = $(this).attr('data-serectkey');
			  			var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'"}';
			  			//console.log("asdsadsadsad",data);
			  			//console.log(data);
			  			$('.loader-zalo').show();
			  			socket.emit('ketban',data);
			  		}
			  	});
			  	if (check == 0) {
			  		alert('bạn phải chọn tài khoản');
			  		return false;
			  	}

		  }

function changeidfriend(el,id){
     	$('#id_friend').val(id);
     	var success = $(el).parents('.bt-load-chat').find('.bt-name-chat').html();
     	$('#name_friend').val(success);
     	$(el).parents('.colketban').remove();
     	count_goiy--;
     	$('.goiyketban').html('Gợi ý kết bạn ('+count_goiy+')');

	  	// alertBox('Bạn với '+success+' đã trở thành bạn bè',"success",false,true,true);
     }
     function changemess(el,id){
     	$('#id_friend').val(id);
     
     }


function thongbao(){


	$('.selectepageprofile').each(function(i, value){
			  		if ($(this).is(':checked')) {
			  			check = 1;
			  			var id = $('#id_friend').val();
			  			var cookie = $(this).attr('data-cookie');
			  			var serectkey = $(this).attr('data-serectkey');
			  			var id_user = $(this).attr('data-serectkey');
			  			var content_chat = $('#content_mess').val();
			  			content_chat = content_chat.replace(/(?:\r\n|\r|\n)/g, '\\n');
			  			 var param = '{"id_user":"'+id+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+content_chat+'"}';
			  			socket.emit('sendsms',param);

			  		}
			  		alertBox('Gửi tin nhắn thành công!!',"00a65a",false,true,true);
			  	});
     
	
	 //socket.emit('sendsms',param);
}
function addfriendv2(){

            var id = $('#id_friend').val();
  			var cookie = $('#cookiev2').val();
  			var serectkey = $('#serectkeyv2').val();
  			var content_chat = $('#content_mess').val();

  			 var param = '{"id_user":"'+id+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+content_chat+'"}';
  			 console.log(param);
  			//socket.emit('sendsms',param);
  			var id_profile = $(this).val();
			  			var cookie = $(this).attr('data-cookie');
			  			var serectkey = $(this).attr('data-serectkey');
			  			var id_user = $(this).attr('data-serectkey');
			  			var noidung = $('#content_friend').val();
			  			var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_profile":"'+id_profile+'","id_user":"'+id_user+'","noidung":"'+noidung+'","id_friend":"'+$('#id_friend').val()+'","name_friend":"'+$('#name_friend').val()+'"}';
			  			//console.log(data);
			  			socket.emit('addnewfriendv1',data);
}


function sendAll(){
	var cookie = '';
	var serectkey = '';
	var content_chat = '';
	var n = 0;
	$('.loader-zalo').show();
	$('.selectepageprofile').each(function(i, value){
			  		if ($(this).is(':checked')) {
			  			check = 1;
			  			
			  			 cookie = $(this).attr('data-cookie');
			  			 serectkey = $(this).attr('data-serectkey');
			  			 content_chat = $('#content_messall').val();
			  			
	
			  		}
			  		
			  	});
var k = 0;
content_chat = content_chat.replace(/(?:\r\n|\r|\n)/g, '\\n');
   for (var i = 0; i < listuser.length; i++) {  
             setTimeout( function timer(){

				    	 var param = '{"id_user":"'+listuser[k]+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","content":"'+content_chat+'"}';
				    	 console.log(param);
  			            socket.emit('sendsms',param);
			  			k++;
			  			if(k == listuser.length){
					    	$('.loader-zalo').hide();
					    	var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Gửi tin nhắn theo thẻ tag đã hoàn thành!</p>';
		                
			                $('.contentpoppup').append(html);
			                $('#popupmess').modal('show');
					    }
				    }, i*60000 );

  			 
 
   }
   // alertBox('Gửi tin nhắn thành công!!',"00a65a",false,true,true);
}

function sendfriendsms(){
	var message = $('#content_sms').val();
	var time = new Date().getTime();
	var cookie = $(this).attr('data-cookie');
	var serectkey = $(this).attr('data-serectkey');
    var toid = "";
	 var param = '{"message":"'+message+'","clientId":'+time+',"toid":"'+idto+'"}';
	var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(enk),options).ciphertext.toString(CryptoJS.enc.Base64);
    var data = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.path+'","encrypted":"'+encrypted+'","filename":"'+filename+'"}';
     	$.ajax({
           url:'{{url('home/updateAccount') }}',
            dataType: 'json',
            type: 'post',
            contentType: 'application/x-www-form-urlencoded',
            data:{id:id,id_zalo:id_zalo,cate_id:cate_id},
            success: function(result){
               if(result.status == 200){
                  alertBox(result.message,"6bbd6e",false,true,true);
                   setTimeout(function(){
                        window.location.reload();
                     }, 1500)

                }
            },
           
            
        });

     }
//end goi y ket ban ----------------------------------------------

   //end socket
function alertBox(message,type,errorHolder,showIcon,close){
    var icons = {}; 
    icons['success'] = 'check-circle';
    icons['info'] = 'info-circle';
    icons['warning'] = 'exclamation-circle';
    icons['danger'] = 'exclamation-circle';
    icons['primary'] = 'info-circle';
                
    var html =  "<div class='alert alert-info bg-white alert-styled-left alert-arrow-left alert-dismissible' style='border-color:#"+type+";'>";
    if(close) html += "<button type='button' class='close' data-dismiss='alert'><span>×</span></button>";
    if(showIcon) html += "<span class='fa fa-"+icons[type]+"-sign' aria-hidden='true'></span>&nbsp;";
            html += message+"</div>";

    $( document ).ready(function() {
        if(errorHolder){
            $(errorHolder).hide();
            $(errorHolder).html(html);
            $(errorHolder).fadeIn(300);
        }else{
            $(".alerts").hide();
            $(".alerts").html(html);
            $(".alerts").fadeIn(300);
            setTimeout(function(){$(".alerts").fadeOut();}, 5000);
        }
    });
}
//home accounts
 	function getUpdateAccount(){
        let username   = $('#modal_update input[name="username"]').val();
        let id_zalo = $('#modal_update input[name="id_zalo"]').val();
        let cate_id = $('#modal_update select[name="category_id"]').val();
        let phone = $('#modal_update input[name="phone"]').val();

        $.ajax({
           url:'{{url('home/updateAccount') }}',
            dataType: 'json',
            type: 'GET',
            contentType: 'application/x-www-form-urlencoded',
            data:{username:username,id_zalo:id_zalo,cate_id:cate_id, phone:phone},
            success: function(result){
               if(result.status == 200){
                  alertBox(result.message,"6bbd6e",false,true,true);
                   setTimeout(function(){
                        window.location.reload();
                     }, 1500)

                }
            },
           
            
        });

    }

//end messagebox
   	function choiceidzalo(idzalo){
        $('.idzalo_cookie').val(idzalo);
        $.ajax({
           url:'{{url('home/loadscanqr') }}',
            dataType: 'json',
            type: 'GET',
            contentType: 'application/x-www-form-urlencoded',
            data: {
              csrf_kingposter: getCookie('csrf_kingposter_cookie')
            },
            success: function( data, textStatus, jQxhr ){
                var img = '<img src="data:image/png;base64,'+data.data.base64_qr+'" />';
                $('.QR_code').html(img);
                step2loadcookie(data.data.chk_wait_cfirm,data.emeil);
            },
            error: function( jqXhr, textStatus, errorThrown ){
            },
            complete: function() {
            }
        });

    }
    function choiceidzalo2(idzalo){
		// $('.idzalo_cookie').val(idzalo);
		var _token = $('input[name="_token"]').val();
		$('.idzalo_cookie').val(idzalo);
		$.ajax({
			url: '{{ url("home/loadscanqr") }}',
			dataType: 'json',
			type: 'GET',
			contentType: 'application/x-www-form-urlencoded',
			data: { 
				 csrf_kingposter: getCookie('csrf_kingposter_cookie')
			},
			success: function( data, textStatus, jQxhr ){
				var img = '<img src="data:image/png;base64,'+data.data.base64_qr+'" />';
				$('.QR_code').html(img);
				step2loadcookie(data.data.chk_wait_cfirm,data.emeil);
			},
			error: function( jqXhr, textStatus, errorThrown ){ 
			},
			complete: function() {
			}
		});

	}
   function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
function step2loadcookie(link,emeil){
	//console.log(emeil);
		$.ajax({
			url:'{{url('home/loginstep2') }}',
			dataType: 'json',
			type: 'GET',
			contentType: 'application/x-www-form-urlencoded',
			data: {
				link:link,
				csrf_kingposter: getCookie('csrf_kingposter_cookie')
			},
			success: function( data, textStatus, jQxhr ){
				//console.log(data);
				loginstep3(emeil,data.data.zpw_sek,"#addNewFbAccount",data.data.profile.avatar,data.data.profile.display_name);
			},
			error: function( jqXhr, textStatus, errorThrown ){
			},
			complete: function() {
			}
		});
	}

		function loginstep3(emeil,cookie,model,avatar,name){
			//console.log(emeil);
			//console.log(model);
		$.ajax({
		url: '{{ url("home/getCookie") }}',
		dataType: 'json',
		type: 'get',
		contentType: 'application/x-www-form-urlencoded',
		data: {
			emei: emeil,
			avatar: avatar,
			name: name,
			id_zalo: $('.idzalo_cookie').val(),
			fb_accesstoken: 'zpw_sek='+cookie,
			fb_account: $(model+" #fbAccountId").val(),
			csrf_kingposter: getCookie('csrf_kingposter_cookie')
		},

		success: function( data, textStatus, jQxhr ){
			if(data.status == "success"){
				alertBox(data.message,"6bbd6e",false,true,true);
				
			}else{
				htmlData = "";
				if(data.message !== null && typeof data.message === 'object'){
					Object.keys(data.message).forEach(function(key) {
						htmlData += data.message[key]+" ";
					});
				}else{
					htmlData = data.message;
				}
				alertBox(htmlData,"danger",false,true,true);
			}
		},
		error: function( jqXhr, textStatus, errorThrown ){
			console.log(errorThrown);

		},
		complete: function() {
	          // Re-enable send btn
	          $(model+" #addFbAccountBtn").prop('disabled', false);
	          kp_preloader("off",model+" .modal-body");
	      }
	  });
	}

	//account zalo

	function changeAccount(model){
    let id = $(model).data('id');
    $('#modal_update').modal('show');
    if(id){
        $.ajax({
            url:"{{ url('home/getInfoAccountAjax') }}",
            type:"GET",
            data:{id:id},
            success:function(result){

                if(result.status == 200){
                   $('#modal_update input[name="id_zalo"]').val(result.data.zalo_id);
                   $('#modal_update input[name="username"]').val(result.data.firstname);
                   $('#modal_update input[name="phone"]').val(result.data.phone);

                }
            }
        });
    }
}


// category
function getInfoCategory(model){
    let id = $(model).data('id');
    $('#modal_update_cate').modal('show');
    if(id){
        $.ajax({
            url:"{{ url('home/categories/getInfoCategoryAjax') }}",
            type:"GET",
            data:{id:id},
            success:function(result){

                if(result.status == 200){
                   $('#modal_update_cate input[name="cate_name"]').val(result.data.name);
                   $('#modal_update_cate input[name="cate_id"]').val(result.data.id);

                }
            }
        });
    }
}

function getUpdateCategory(){
    let id   = $('#modal_update_cate input[name="cate_id"]').val();
     let name = $('#modal_update_cate input[name="cate_name"]').val();
    $('#modal_update_cate').modal('show');
    if(name == ''){
    	 console.log('Tên danh mục không được để trống!');
    }else{
    	
        $.ajax({
            url:"{{ url('home/categories/getUpdateCategory') }}",
            type:"GET",
            data:{id:id,name:name},
            success:function(result){

                if(result.status == 200){
                	
                	alertBox(result.message,"6bbd6e",false,true,true);
                   setTimeout(function(){
                        window.location.reload();
                     }, 1500)

                }else{
                	 alertBox(result.message,'f44336','.alertBoxCate',true);
                    //hideLoading('.alerts');
                    setTimeout(function(){
                        window.location.reload();
                     }, 1500);
                }
            }
        });

    }

       

}
//end category
							// function Postprofile(){
							// let description  = $('#tabStatus textarea[name="message"]').val();
							// if(description == ''){
							//  console.log('Nội dung không được để trống!!!!');
							// }else{

							// $.ajax({
							//     url:"{ url('posts/getPostProfile') }}",
							//     type:"GET",
							//     data:{description:description},
							//     success:function(result){

							//         if(result.status == 200){
							//         	alertBox(result.message,'danger','.modalBox',true);
							//            console.log('Thanh cong');
							//            setTimeout(function(){
							//                 window.location.reload();
							//              }, 1000)

							//         }else{
							//         	console.log('that bai');
							//         }
							//     }
							// });

							// }

							// }

function myFunction() {
  var x = document.getElementById("myInput").value;
  document.getElementById("message").innerHTML = x;
}




function getChaBotById(){``
			$('.loader-zalo').show();
			var params = {};
			params['id_offci'] = $('#id_offci').val();
			params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
			$.ajax({
				url: '{{ url("chatbot/get")}}',
				dataType: 'json',
				type: 'get',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data, textStatus, jQxhr ){

				},
				error: function( jqXhr, textStatus, errorThrown ){

				},
				complete: function(data, textStatus, jQxhr) {
					if(data.responseText == ''){
						$('.data-table').html('<p style="font-size:18px;">Trống</p>');
					    $('.loader-zalo').hide();
					}else{
					$('.data-table').html(data.responseText);
					$('.loader-zalo').hide();
				  }
				}
			});
		}

function getAccountByCate(){
        var params = {};
			params['cate_id'] = $('#category').val();
			params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
			console.log(params);
			$.ajax({
				url: '{{ url("home/searchAccountBycate")}}',
				dataType: 'json',
				type: 'GET',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data, textStatus, jQxhr ){

				},
				error: function( jqXhr, textStatus, errorThrown ){

				},
				complete: function(data, textStatus, jQxhr) {
					if(data.responseText == ''){
						$('.data-table').html('<p style="font-size:18px;">Trống</p>');
					    $('.loader-zalo').hide();
					}else{
					$('.data-table').html(data.responseText);
					$('.loader-zalo').hide();
				  }
				}
			});
}

function getAccount2ByCate(){
        var params = {};
			params['cate_id'] = $('#category2').val();
			params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
			console.log(params);
			$.ajax({
				url: '{{ url("home/searchAccount2Bycate")}}',
				dataType: 'json',
				type: 'GET',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data, textStatus, jQxhr ){

				},
				error: function( jqXhr, textStatus, errorThrown ){

				},
				complete: function(data, textStatus, jQxhr) {
					console.log(data.responseText);
					if(data.responseText == ''){
						$('.data-table2').html('<p style="font-size:18px;">Trống</p>');
					    $('.loader-zalo').hide();
					}else{
					$('.data-table2').html(data.responseText);
					$('.loader-zalo').hide();
				  }
				}
			});
}

function searchAccountByname(id){
	 var params = {};
	//console.log(id);
            params['id'] = id;
			params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
			console.log(params);
			$.ajax({
				url: '{{ url("home/searchAccountByname")}}',
				dataType: 'json',
				type: 'GET',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data, textStatus, jQxhr ){

				},
				error: function( jqXhr, textStatus, errorThrown ){

				},
				complete: function(data, textStatus, jQxhr) {
					if(data.responseText == ''){
						$('.data-table').html('<p style="font-size:18px;">Trống</p>');
					    $('.loader-zalo').hide();
					}else{
					$('.data-table').html(data.responseText);
					$('.loader-zalo').hide();
				  }
				}
			});
}

function searchAccountByname2(id){
	 var params = {};
	//console.log(id);
            params['id'] = id;
			params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
			console.log(params);
			$.ajax({
				url: '{{ url("home/searchAccountByname2")}}',
				dataType: 'json',
				type: 'GET',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data, textStatus, jQxhr ){

				},
				error: function( jqXhr, textStatus, errorThrown ){

				},
				complete: function(data, textStatus, jQxhr) {
					if(data.responseText == ''){
						$('.data-table2').html('<p style="font-size:18px;">Trống</p>');
					    $('.loader-zalo2').hide();
					}else{
					$('.data-table2').html(data.responseText);
					$('.loader-zalo2').hide();
				  }
				}
			});
}



    ///////////////////////////////////////////////////////////
           //---------------------get cookie profile
           $(document).ready(function() {
           	   $("#chontaikhoan #addCookie").click(function(){
           	   	 // Clear groups, groupCount vars
					groups = [];
					countGroup = 0;
					
					// Get all checked groups
					$('.groupName:visible .fbnode:checked').each(function(){
						groups.push($(this).val());
						countGroup++;
					});

					if(countGroup != 0){
						 $('#themqr').modal('show');
						//alertBox('POSTING_WAIT',"info","#postLink .messageBox",true,true);	
						
						var unexpectedPostingError = true;
						var currentGroup = groups[nextGroup];
						POST_IN_PROGRESS = true;
						 
						$('.postingStatusErrors').html("");
						if(!$('#selectgroup_' + currentGroup).is(":checked")) return false;
                         choiceidzalo2(currentGroup);
					
						
					}else{
						
						alert("Vui lòng chọn 1 tài khoản để thêm cookie");
						//alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postVideo .messageBox",true,true);	
					}

					
           	   });

           });
    ///////////////////////////////////////////////////////
//end chatbot
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //--------------------------------------phần đăng bài -----------------------------------------------------
 $(document).ready(function() {
    $("#postStatus #postStatus").click(function(){
		    var message = $('#tabStatus textarea[name="message"]').val();
		    var cateId  = $('#tabStatus select[name="cate_id"]').val();
		    var post_title  = $('#tabStatus input[name="title"]').val()
		    var tab = "#tabStatus";
             var type = 'message';
			var validate = validateFormStatus(tab,post_title,message,cateId);			
			if(validate == true){
				var link = '';
              //post(message,link,post_title,cateId);
              postStatus(message,link,post_title,cateId,type);
			}
		});

    $("#postLink #postLink").click(function(){
    	var tab ="#tabLink";
		    var message = $(tab+' textarea[name="message"]').val();
		    var cateId  = $(tab+ ' select[name="cate_id"]').val();
		    var link  = $(tab+ ' input[name="link"]').val();
		    var post_title  = $(tab+ ' input[name="title"]').val();
		    var type = "link";
            
		    var validate = validateFormLink(tab,post_title,message,link,cateId);
			if(validate == true){
			   postStatus(message,link,post_title,cateId,type);
              //postLink(type,message,link,post_title);

			}

		});

     $("#postFormImage #postImage2").click(function(){
    	var tab ="#tabImage";
		    var message = $(tab+' textarea[name="message"]').val();
		    var cateId  = $(tab+ ' select[name="cate_id"]').val();
		    var title  = $(tab+ ' input[name="title"]').val();
		    var mieuta  = $(tab+ ' textarea[name="mieuta"]').val();
		    var tacgia  = $(tab+ ' input[name="tacgia"]').val();
		    var source  = $(tab+ ' input[name="imageURL"]').val();
		    //console.log(source);
		    var type = "image";
		    var link ='';
		    
		    var validate = validateFormImage(tab,title,message,mieuta,cateId,tacgia);
		 
			if(validate == true){
               message.replace(/(?:\r\n|\r|\n)/g, '\\n');
               var message = message.split('\n');
              var message =  message.filter(function(e){return e});

               //console.log(message);
              postImage(type,message,link,title,mieuta,tacgia,source);
              //postImagev2(type,message,link,title,mieuta,tacgia,source);

			}


		});
     

     $("#postFormVideo #postVideo2").click(function(){
    	var tab ="#tabVideo";

		    var message = $(tab+' textarea[name="message"]').val();
		    var cateId  = $(tab+ ' select[name="cate_id"]').val();
		    var title  = $(tab+ ' input[name="title"]').val();
		    var mieuta  = $(tab+ ' textarea[name="mieuta"]').val();
		    var tacgia  = $(tab+ ' input[name="tacgia"]').val();
		    var file_url  = $(tab+ ' input[name="video_url"]').val();
		    //console.log(file_url);
		    var source = '';
		    //console.log(source);
		    var type = "video";
		    var link ='';
		    
		    var validate = validateFormVideo(tab,title,message,mieuta,cateId,tacgia);

		 
			if(validate == true){
				 message.replace(/(?:\r\n|\r|\n)/g, '\\n');
               var message = message.split('\n');
              var message =  message.filter(function(e){return e});

              postVideo(type,message,link,title,mieuta,tacgia,source,file_url);

			}


		});

 });

 function postVideo(type,message,link,post_title,mieuta,tacgia,source,file_url){
         //console.log(post_title);
		//timeDeff = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval);
		timeDeff = timeDeff*1000;

		// Clear groups, groupCount vars
		groups = [];
		countGroup = 0;
		
		// Get all checked groups
		$('.groupName:visible .fbnode:checked').each(function(){
			groups.push($(this).val());
			countGroup++;
		});

		if(countGroup != 0){
			alertBox('POSTING_WAIT',"info","#postLink .messageBox",true,true);	
			// Set the left time
			//var duree = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval) * (countGroup-1);
			//TOTALPOSTINGTIME = duree*1000;
	
			//$(".totalPostTime").html("&sim; "+Math.round(((parseInt($("#postForm #defTime").val())+randomInterval)* (countGroup-1))/60).toFixed(2)+" "+'{ l('MINUTES') }}');	
			
			//startTimer();
			var type ='video';
			sendVideo(type,message,link,post_title,mieuta,tacgia,source,file_url);
			//postingInterval = setTimeout(posting,timeDeff);
			
		}else{
			//console.log("sdfklgsdlflsdfj");
			//alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336",false,true,true);
			alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postVideo .messageBox",true,true);	
		}
		
	}

 function postImagev2(type,message,link,post_title,mieuta,tacgia,source){
   var cookie =  $('.acountzalo').data('cookie');
   var env =  $('.acountzalo').data('env');
   var idto = $('.acountzalo').val();
   var _token = $('input[name="_token"]').val();
   var sizeimage = getImageSizeInBytes(source);
	                        var url_arr = source.split("/");
	                        var filename  = url_arr[url_arr.length-1];
	                        var height = 0;
		                 	var width = 0;
		                 	var img = new Image();
		                 	img.src = source;
								img.onload = function(){
								   height = img.height;
								   width = img.width;
								
								  
								}
                             // console.log(cookie);
                             // console.log(env);
                            var time = new Date().getTime();
                            var param = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"toid":"'+idto+'","chunkId":1}';
                            //console.log(param);
							var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(env),options).ciphertext.toString(CryptoJS.enc.Base64);
	                        //var data = '{"idto":"'+idto+'","cookie":"'+cookie+'","serectkey":"'+env+'","url_image":"'+source+'","encrypted":"'+encrypted+'","filename":"'+filename+'"}';
	                         var datasend = {};
	                        datasend['filename'] = filename;
	                         datasend['cookie']  = cookie;
	                         datasend['serectkey'] = env;
	                         datasend['url_image'] = source;
	                         datasend['encrypted'] = encrypted;
	                         datasend['_token']  = _token;
	              
	                       
	                      
	                        //console.log();
	                        $.ajax({
                            url: '{{ url("chat/postimagechiendich") }}',
                            dataType: 'json',
                            type: 'post',
                            contentType: 'application/x-www-form-urlencoded',
                            data: datasend,
                            success: function( data, textStatus, jQxhr ){
                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(env),options).toString(CryptoJS.enc.Utf8);
                                var result =  JSON.parse(decrypted);
                                console.log(result);
                                if(result.error_code == 0){
                                	var img = result.data.normalUrl;
                                	 postImage(type,message,link,post_title,mieuta,tacgia,img);
                                }else{
                                	$("p").remove(".contentmess");
					    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Đã xảy ra lỗi, vui lòng thử lại sau!</p>';
										 $('.contentpoppup').append(html);
										$('#popupmess').modal('show');
                                }
                                
                                
                            },
                            error: function( jqXhr, textStatus, errorThrown ){
                            },
                            complete: function(data, textStatus, jQxhr){
                               
                            }
                        });

 }

 function postImage(type,message,link,post_title,mieuta,tacgia,source){
         //console.log(post_title);
		//timeDeff = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval);
		timeDeff = timeDeff*1000;

		// Clear groups, groupCount vars
		groups = [];
		countGroup = 0;
		
		// Get all checked groups
		$('.groupName:visible .fbnode:checked').each(function(){
			groups.push($(this).val());
			countGroup++;
		});

		if(countGroup != 0){
			alertBox('POSTING_WAIT',"info","#postLink .messageBox",true,true);	
			// Set the left time
			//var duree = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval) * (countGroup-1);
			//TOTALPOSTINGTIME = duree*1000;
	
			//$(".totalPostTime").html("&sim; "+Math.round(((parseInt($("#postForm #defTime").val())+randomInterval)* (countGroup-1))/60).toFixed(2)+" "+'{ l('MINUTES') }}');	
			
			//startTimer();
			var type ='image';
			send(type,message,link,post_title,mieuta,tacgia,source);
			//postingInterval = setTimeout(posting,timeDeff);
			
		}else{
			//console.log("sdfklgsdlflsdfj");
			//alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336",false,true,true);
			alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postImage .messageBox",true,true);	
		}
		
	}
function postLink(type,message,link,post_title){

		//timeDeff = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval);
		timeDeff = timeDeff*1000;

		// Clear groups, groupCount vars
		groups = [];
		countGroup = 0;
		
		// Get all checked groups
		$('.groupName:visible .fbnode:checked').each(function(){
			groups.push($(this).val());
			countGroup++;
		});

		if(countGroup != 0){
			alertBox('POSTING_WAIT',"info","#postLink .messageBox",true,true);	
			// Set the left time
			//var duree = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval) * (countGroup-1);
			//TOTALPOSTINGTIME = duree*1000;
	
			//$(".totalPostTime").html("&sim; "+Math.round(((parseInt($("#postForm #defTime").val())+randomInterval)* (countGroup-1))/60).toFixed(2)+" "+'{ l('MINUTES') }}');	
			
			//startTimer();
			var type ='link';
			send(type,message,link,post_title);
			//postingInterval = setTimeout(posting,timeDeff);
			
		}else{
			//alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336",false,true,true);
			alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postLink .messageBox",true,true);	
		}
		
	}
function postStatus(message,link,post_title,cateId,type){
	    groups = [];
		countGroup = 0;
	 $('.groupName:visible .fbnode:checked').each(function(){
			groups.push($(this).val());
			countGroup++;
		});
	 if(countGroup != 0){
          var _token = $('input[name="_token"]').val();
			var params = {};
            $('.loader-zalo').show();
            $(".contentloader").html("Đang chạy đăng bài...");
			//message = message.replace(/(?:\r\n|\r|\n)/g, '\\n');
			var k = 0;
			for (var i = 0; i < groups.length; i++) {
				setTimeout( function timer(){
					params["message"] = message;
					params["postType"] = type;
					params["post_title"] = post_title;
					params["zaloid"] = groups[k];
					params["link"] = link;
					params["_token"] = _token;
					$.ajax({
				            url:"{{ url('posts/sendPostStatus') }}",
				            type:"POST",
				            data:params,
				            success:function(data){
                                if(data.status == 200){
                                 $(".postStatus_"+data.zaloid).html("<i class='fa fa-check-circle' aria-hidden='true' style='color:#21b384'></i> "+data.message);
                                }else if(data.status == 401){
                                	$(".postStatus_"+data.zaloid).html("<i class='fa fa-times' aria-hidden='true' style='color:red'></i>"+data.message);
                                }else if(data.status == 402){
                                   $(".postStatus_"+data.zaloid).html("<i class='fa fa-times' aria-hidden='true' style='color:red'></i>"+data.message);
                                }
				            }
				        });
					k++;
					if(k == groups.length){
						$('.loader-zalo').hide();
						 $("p").remove(".contentmess");
		    		     var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Đăng bài hoàn thành</p>';
							 $('.contentpoppup').append(html);
							$('#popupmess').modal('show');
					}
			      }, i*60000 );
			}
			
	 }else{

			alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postStatus .messageBox",true,true);	
		}
}
 function post(message,link,post_title,cateId){
 	//console.log("adadasd");
		//timeDeff = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval);
		timeDeff = timeDeff*1000; 

		// Clear groups, groupCount vars
		groups = [];
		countGroup = 0;
		
		// Get all checked groups
		$('.groupName:visible .fbnode:checked').each(function(){
			groups.push($(this).val());
			countGroup++;
		});

		if(countGroup != 0){
			alertBox('POSTING_WAIT',"info","#postStatus .messageBox",true,true);	
			// Set the left time
			//var duree = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval) * (countGroup-1);
			//TOTALPOSTINGTIME = duree*1000;
	
			//$(".totalPostTime").html("&sim; "+Math.round(((parseInt($("#postForm #defTime").val())+randomInterval)* (countGroup-1))/60).toFixed(2)+" "+'{ l('MINUTES') }}');	
			
			//startTimer();
			var type = "message";
			var mieuta = '';
			var tacgia = '';
			var source = '';
			var file_url = '';
			//message = message.replace(/(?:\r\n|\r|\n)/g, '\\n');
			send(type,message,link,post_title,mieuta,tacgia,source,file_url,cateId);
			
			
		}else{

			//alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336",false,true,true);
			alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336","#postStatus .messageBox",true,true);	
		}
		
	}

	// function startTimer(){
	// 	console.log("sdfhsdkjfhds");
	// 	var h = Math.floor(TOTALPOSTINGTIME / 36e5),
	//      	m = Math.floor((TOTALPOSTINGTIME % 36e5) / 6e4),
	//      	s = Math.floor((TOTALPOSTINGTIME % 6e4) / 1000);
		
	//     h= (h<10)?"0"+h: h;
	//     m= (m<10)?"0"+m: m;
	//     s= (s<10)? "0"+s : s;
		
	//     $(".leftTime").html("&sim; "+h+":"+m+":"+s);
	//     TOTALPOSTINGTIME = TOTALPOSTINGTIME - 1000;
			
	//    if( h==0 && m==0 && s==0 ){
	// 		clearTimeout(leftTime);
	// 		$(".leftTime").html("Done");
	// 		alertBox("POSTING_COMPLETED","success","#postForm .messageBox",true);	
	// 		$("#postForm #post").prop('disabled', false);
	// 	}else{
	// 		$("#postForm #post").prop('disabled', true);
	// 		leftTime = setTimeout(startTimer,1000);
	// 		$("#pauseButton").prop('disabled', false);
	// 		$("#pauseButton").removeClass("btnDisabled");
	// 	}
	// }
function deleteHistoryprofile(){
	var arr = [];
	 $('input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });
	
	 var _token = $('#historyProfile input[name="_token"]').val();
	 
	 $.ajax({
		        url: '{{ url("profile/deleteHisrotyProf")}}',
		        dataType: 'json',
		        type: 'post',
		        contentType: 'application/x-www-form-urlencoded',
		        data: { arr:arr, _token:_token},
		        success: function( data){
				  	alertBox(data.message,"14c1d7",false,true,true);
				  	setTimeout(function(){
                        window.location.reload();
                     }, 1500)
		        },
		        error: function( jqXhr, textStatus, errorThrown ){
		         
		        },
		        complete: function(){
		        	//kp_preloader("off");
		        }
		    });
	

}
function removeAllAccountProf(){
	 var _token = $('#accountprofile input[name="_token"]').val();
	 //console.log(_token);
	var arr = [];
    $('.formProfile input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });
     $.ajax({
		        url: '{{ url("home/deleteAccountProf")}}',
		        dataType: 'json',
		        type: 'post',
		        contentType: 'application/x-www-form-urlencoded',
		        data: { arr:arr, _token:_token},
		        success: function( data){
				  	alertBox(data.message,"14c1d7",false,true,true);
				  	setTimeout(function(){
                        window.location.reload();
                     }, 1500)
		        },
		        error: function( jqXhr, textStatus, errorThrown ){
		         
		        },
		        complete: function(){
		        	//kp_preloader("off");
		        }
		    });

}

function removeAllAccountOA(){
	 var _token = $('#accountOA input[name="_token"]').val();
	 //console.log(_token);
	var arr = [];
    $('.formOA input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });
    //console.log(arr);
     $.ajax({
		        url: '{{ url("home/deleteAccountOA")}}',
		        dataType: 'json',
		        type: 'post',
		        contentType: 'application/x-www-form-urlencoded',
		        data: { arr:arr, _token:_token},
		        success: function( data){
				  	alertBox(data.message,"14c1d7",false,true,true);
				  	setTimeout(function(){
                        window.location.reload();
                     }, 1500)
		        },
		        error: function( jqXhr, textStatus, errorThrown ){
		         
		        },
		        complete: function(){
		        	//kp_preloader("off");
		        }
		    });

}

function checkAllCheckboxOA(model){
    var isChecked = model.checked;
    if(isChecked) {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = true;
            $('.formOA .uniform-checker span').addClass('checked');
        });
    } else {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = false;
            $('.formOA .uniform-checker span').removeClass('checked');
        });
    }
}

function checkAllCheckbox(model){
    var isChecked = model.checked;
    if(isChecked) {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = true;
            $('.formProfile .uniform-checker span').addClass('checked');
        });
    } else {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = false;
            $('.formProfile .uniform-checker span').removeClass('checked');
        });
    }
}

function checkAllCheckboxfb(model){
    var isChecked = model.checked;
    if(isChecked) {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = true;
            $('.formPostfb .uniform-checker span').addClass('checked');
        });
    } else {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = false;
            $('.formPostfb .uniform-checker span').removeClass('checked');
        });
    }
}

function checkAllCheckboxscheduleProfile(model){
    var isChecked = model.checked;
    if(isChecked) {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = true;
            $('.formScheProfile .uniform-checker span').addClass('checked');
        });
    } else {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = false;
            $('.formScheProfile .uniform-checker span').removeClass('checked');
        });
    }
}

///////////////////Category Account ////////////////
function checkAllCheckboxCateAc(model){
    var isChecked = model.checked;
    if(isChecked) {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = true;
            $('.formCate .uniform-checker span').addClass('checked');
        });
    } else {
        $('input[name="selectGroup[]"]').each(function() {
            this.checked = false;
            $('.formCate .uniform-checker span').removeClass('checked');
        });
    }
}
function removeAllCateAc(){
	 var _token = $('#categoryAcc input[name="_token"]').val();
	 //console.log(_token);
	var arr = [];
    $('.formCate input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });
    //console.log(arr);
     $.ajax({
		        url: '{{ url("home/categories/deleteCateAc")}}',
		        dataType: 'json',
		        type: 'post',
		        contentType: 'application/x-www-form-urlencoded',
		        data: { arr:arr, _token:_token},
		        success: function( data){
				  	alertBox(data.message,"14c1d7",false,true,true);
				  	setTimeout(function(){
                        window.location.reload();
                     }, 1500)
		        },
		        error: function( jqXhr, textStatus, errorThrown ){
		         
		        },
		        complete: function(){
		        	//kp_preloader("off");
		        }
		    });

}

function removeAllListPost(){
	 var _token = $('#listPost input[name="_token"]').val();
	 //console.log(_token);
	var arr = [];
    $('.formListpost input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });
    //console.log(arr);
     $.ajax({
		        url: '{{ url("posts/deleteAllListPost")}}',
		        dataType: 'json',
		        type: 'post',
		        contentType: 'application/x-www-form-urlencoded',
		        data: { arr:arr, _token:_token},
		        success: function( data){

		        	$("p").remove(".contentmess");
	    		       var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+data.message+'</p>';
						 $('.contentpoppup').append(html);
						$('#popupmess').modal('show');
				  	// alertBox(data.message,"14c1d7",false,true,true);
				  	// setTimeout(function(){
       //                  window.location.reload();
       //               }, 1500)
		        },
		        error: function( jqXhr, textStatus, errorThrown ){
		         
		        },
		        complete: function(){
		        	//kp_preloader("off");
		        }
		    });

}


function send(type,message,link,post_title,mieuta,tacgia,source,file_url,cateId){
		var unexpectedPostingError = true;
		var currentGroup = groups[nextGroup];
		POST_IN_PROGRESS = true;
		// update the left time
		//var duree = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval) * (countGroup-nextGroup);
		//TOTALPOSTINGTIME = duree*1000;
		// Clear errors
		$('.postingStatusErrors').html("");
		if(!$('#selectgroup_' + currentGroup).is(":checked")) return false;
         var arr = [];
		 $('input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });
		 //console.log(arr);
		// Get post data
		var _token = $('input[name="_token"]').val();
		var params = {};
		params["message"] = message;
		params["postType"] = type;
		params["groupID"] = currentGroup;
		params["csrf_kingposter"] = _token;
		var groupID = currentGroup;
		////message = message.replace(/(?:\r\n|\r|\n)/g, '\\n');
		//console.log(source);
		//console.log(params);
		// params["tieude"] = $(".tieude").val();
		// params["tacgia"] = $(".tacgia").val();
		// params["mieuta"] = $(".mieuta").val();
		// params["groupID"] = currentGroup;
		// params["postType"] = type;
		// params["csrf_kingposter"] = getCookie('csrf_kingposter_cookie');
		// if($.trim($("#postForm #message").val()) != ""){
		// 	params["message"] = $("#postForm #message").val();
		// }

		// params['fb_preset_id'] =  $("#postForm #fb_preset_id").val();

		// {% for i in 0..max_num_img_post %}
		//     params["image_{i}}"] = $("#postForm #imageURL_{i}}").val();
		// {% endfor %}
		// params['allow_spherical_photo'] = $('#enable360Image', "#postForm").is(":checked") ? 1 : 0;

		// if($("#postForm #postType").val() == "video"){
		// 	if($.trim($("#postForm #video").val()) != ""){
		// 		params["video"] = $("#postForm #video").val();
		// 	}
		// 	if($.trim($("#postForm #video-description").val()) != ""){
		// 		params["description_video"] = $("#postForm #video-description").val();
		// 	}
		// }

		// params['itemprice'] = $("#postForm #itemprice").val();
		// params['itemname'] = $("#postForm #itemname").val();
		
		// if($("#postForm #postType").val() == "link"){
		// 	if($.trim($("#postForm #link").val()) != "") 
		// 		params["link"] = $("#postForm #link").val();
			
		// 	if($(".linkSubFields").is(':visible')){
		// 		if($.trim($("#postForm #picture").val()) != "") 
		// 			params["picture"] = $("#postForm #picture").val(); 
			
		// 		if($.trim($("#postForm #name").val()) != "") 
		// 			params["name"] = $("#postForm #name").val();
			
		// 		if($.trim($("#postForm #caption").val()) != "") 
		// 			params["caption"] = $("#postForm #caption").val();
			
		// 		if($.trim($("#postForm #description").val()) != "") 
		// 			params["description"] = $("#postForm #description").val();
		// 	}
		// }
		// 	kp_preloader("on");
        
			//$(".postStatus_"+currentGroup).html("<span class='badge'>Đang đăng bài...<span>");
			//console.log(file_url);
			//var noidung = message.replace(/(?:\r\n|\r|\n)/g, '\n');

			//console.log(noidung);
			$.ajax({
		        url: '{{ url("posts/getPostProfile")}}',
		        dataType: 'json',
		        type: 'post',
		        contentType: 'application/x-www-form-urlencoded',
		        data: {message:message, type:type, arr:arr,link:link,mieuta:mieuta,tacgia:tacgia,source:source,post_title:post_title,file_url:file_url,cateId:cateId, _token:_token},
		        success: function( data, textStatus, jQxhr ){
				  	if(data.status == "success"){
				  		$('#'+currentGroup).removeClass('postingError');
						$('#'+currentGroup).addClass('postingSuccess');
						$(".postStatus_"+currentGroup).html("Đã đăng");
					}else{
						$('#'+currentGroup).removeClass('postingSuccess');
						$('#'+currentGroup).addClass('postingError');
						htmlData = "";
	                	if(data.message !== null && typeof data.message === 'object'){
							Object.keys(data.message).forEach(function(key) {
							    htmlData += data.message[key]+" ";
							});
	                	}else{
	                		htmlData = data.message;
	                	}
	                	//alertBox("htmlData","f44336","#postStatus .messageBox",true,true);
						 //$(".postStatus_"+currentGroup).html("<i class='fa fa-info-circle' aria-hidden='true'></i> "+htmlData);
						 $("p").remove(".contentmess");
		    		     var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Cấu hình đăng bài thành công!</p>';
							 $('.contentpoppup').append(html);
							$('#popupmess').modal('show');
							}
		        },
		        error: function( jqXhr, textStatus, errorThrown ){
		  
					 $("p").remove(".contentmess");
		    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Đã xảy ra lỗi ,vui lòng thử lại sau !</p>';
							 $('.contentpoppup').append(html);
							$('#popupmess').modal('show');
		        },
		        complete: function(){
		        	//kp_preloader("off");
		        }
		    });
	}

	function sendVideo(type,message,link,post_title,mieuta,tacgia,source,file_url,cateId){
		var unexpectedPostingError = true;
		var currentGroup = groups[nextGroup];
		POST_IN_PROGRESS = true;

		$('.postingStatusErrors').html("");
		if(!$('#selectgroup_' + currentGroup).is(":checked")) return false;
         var arr = [];
		 $('input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
        });
		 //console.log(arr);
		// Get post data
		var _token = $('input[name="_token"]').val();
		var params = {};
		params["message"] = message;
		params["postType"] = type;
		params["groupID"] = currentGroup;
		params["csrf_kingposter"] = _token;
		var groupID = currentGroup;
        $("p").remove(".contentmess");
	     var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Cấu hình đăng bài thành công!</p>';
			 $('.contentpoppup').append(html);
			$('#popupmess').modal('show');
			$.ajax({
		        url: '{{ url("posts/getPostProfile")}}',
		        dataType: 'json',
		        type: 'post',
		        contentType: 'application/x-www-form-urlencoded',
		        data: {message:message, type:type, arr:arr,link:link,mieuta:mieuta,tacgia:tacgia,source:source,post_title:post_title,file_url:file_url,cateId:cateId, _token:_token},
		        success: function( data, textStatus, jQxhr ){
				  	if(data.status == "success"){
				  		$('#'+currentGroup).removeClass('postingError');
						$('#'+currentGroup).addClass('postingSuccess');
						$(".postStatus_"+currentGroup).html("Đã đăng");
					}else{
						$('#'+currentGroup).removeClass('postingSuccess');
						$('#'+currentGroup).addClass('postingError');
						htmlData = "";
	                	if(data.message !== null && typeof data.message === 'object'){
							Object.keys(data.message).forEach(function(key) {
							    htmlData += data.message[key]+" ";
							});
	                	}else{
	                		htmlData = data.message;
	                	}
	                	//alertBox("htmlData","f44336","#postStatus .messageBox",true,true);
						 //$(".postStatus_"+currentGroup).html("<i class='fa fa-info-circle' aria-hidden='true'></i> "+htmlData);
						
							}
		        },
		        error: function( jqXhr, textStatus, errorThrown ){

					 // $("p").remove(".contentmess");
		    // 		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Đã xảy ra lỗi ,vui lòng thử lại sau !</p>';
						// 	 $('.contentpoppup').append(html);
						// 	$('#popupmess').modal('show');
		        },
		        complete: function(){
		        	//kp_preloader("off");
		        }
		    });
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//thêm bài viết
   //--phần status
function validateFormStatus(tab,title,content,cateId){
    if(title == ''){
        $(tab+' input[name="title"]').addClass('is-invalid');
        $(tab+' .alert_title').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_title').hide();
    }
    if(content == ''){
        $(tab+' .emojionearea-editor').addClass('is-invalid');
        $(tab+' .alert_content').show();
    }else{
        $(tab+' .emojionearea-editor').removeClass('is-invalid');
        $(tab+' .alert_content').hide();
    }
    if(cateId == ''){
        $(tab+' select[name="cate_id"]').addClass('is-invalid');
        $(tab+' .alert_category').show();
    }else{
        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
        $(tab+' .alert_category').hide();
    }

    if(title == '' || content == '' || cateId == '')
    {
        return false;
    }
    return true;
}

function savePostStatus(tab)
{
    let message = $(tab+' textarea[name="message"]').val();
    let cateId  = $(tab+ ' select[name="cate_id"]').val();
     let post_title  = $(tab+ ' input[name="title"]').val()
     let _token  = $('input[name="_token"]').val();
    let type = "status";
    let validate = validateFormStatus(tab,post_title,message,cateId);

    if(validate == true){
    	$.ajax({
            url: '{{ url('posts/addNewPost') }}',
            type: 'post',
            dataType: 'json',
            data: {message:message,post_title:post_title,cate_id:cateId,type:type,_token:_token},
           
            success:function(result){
                if(result.status == true){
                    //alertBox(result.message,"6bbd6e",false,true,true);
                    $("p").remove(".contentmess");
    		       var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i><p>'+result.message+'';
					 $('.contentpoppup').append(html);
					$('#popupmess').modal('show');
					
                   // setTimeout(function(){
                   //      window.location.reload();
                   //   }, 2000)
                     
                }
            },
        });
    }
       
}
  //--phần bài viết kèm link

function LinkIsValid(url) {    
      var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
      return regexp.test(url);    
 }

function validateFormLink(tab,title,content,link,cateId){
    if(title == ''){
        $(tab+' input[name="title"]').addClass('is-invalid');
        $(tab+' .alert_title').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_title').hide();
    }
    if(content == ''){
        $(tab+' .emojionearea-editor').addClass('is-invalid');
        $(tab+' .alert_content').show();
    }else{
        $(tab+' .emojionearea-editor').removeClass('is-invalid');
        $(tab+' .alert_content').hide();
    }
    if(link == ''){
        $(tab+' input[name="link"]').addClass('is-invalid');
        $(tab+' .alert_link').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_link').hide();
    }
    if(cateId == ''){
        $(tab+' select[name="cate_id"]').addClass('is-invalid');
        $(tab+' .alert_category').show();
    }else{
        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
        $(tab+' .alert_category').hide();
    }

    if(title == '' || content == '' || cateId == '' || link =='')
    {
        return false;
    }
    return true;
}

function savePostLink(tab)
{
    let message = $(tab+' textarea[name="message"]').val();
    let cateId  = $(tab+ ' select[name="cate_id"]').val();
    let link  = $(tab+ ' input[name="link"]').val();
    let post_title  = $(tab+ ' input[name="title"]').val();
    let type = "link";
    let _token = $('input[name="_token"]').val();
    let validate = validateFormLink(tab,post_title,message,link,cateId);
    if(validate == true){
    	if(LinkIsValid(link)){

    	 $.ajax({
            url: '{{ url('posts/addNewPost') }}',
            type: 'post',
            dataType: 'json',
            data: {message:message,link:link,post_title:post_title,cate_id:cateId,type:type,_token:_token},
           
            success:function(result){
                if(result.status == true){
                     $("p").remove(".contentmess");
    		       var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
					 $('.contentpoppup').append(html);
					$('#popupmess').modal('show');
                   // setTimeout(function(){
                   //      window.location.reload();
                   //   }, 2000)
                     
                }
            },
        });
      }else{
				alertBox("Link không đúng định dạng!","f44336",false,true,true);

			}
    }
   
    
       

}

function validateFormImage(tab,title,message,mieuta,cateId,tacgia){
	//console.log("mieuta");
    if(title == ''){
        $(tab+' input[name="title"]').addClass('is-invalid');
        $(tab+' .alert_title').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_title').hide();
    }
    if(message == ''){
        $(tab+' .emojionearea-editor').addClass('is-invalid');
        $(tab+' .alert_content').show();
    }else{

        $(tab+' .emojionearea-editor').removeClass('is-invalid');
        $(tab+' .alert_content').hide();
    }
    if(mieuta == ''){

        $(tab+' .emojionearea-editor2').addClass('is-invalid');
        $(tab+' .alert_mieuta').show();
    }else{

        $(tab+' .emojionearea-editor2').removeClass('is-invalid');
        $(tab+' .alert_mieuta').hide();
    }
     if(tacgia == ''){
        $(tab+' input[name="tacgia"]').addClass('is-invalid');
        $(tab+' .alert_tacgia').show();
    }else{
        $(tab+' input[name="tacgia"]').removeClass('is-invalid');
        $(tab+' .alert_tacgia').hide();
    }
    if(cateId == ''){
        $(tab+' select[name="cate_id"]').addClass('is-invalid');
        $(tab+' .alert_category').show();
    }else{
        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
        $(tab+' .alert_category').hide();
    }

    if(title == '' || message == '' || cateId == '' || mieuta =='' || tacgia =='')
    {
        return false;
    }
    return true;
}

function savePostImage(tab)
{

    let cateId  = $(tab+ ' select[name="cate_id"]').val();
    let message = $(tab+' textarea[name="message"]').val();
    let mieuta  = $(tab+ ' textarea[name="mieuta"]').val();

    let tacgia  = $(tab+ ' input[name="tacgia"]').val();
    let title  = $(tab+ ' input[name="title"]').val();
    let validate = validateFormImage(tab,title,message,mieuta,cateId,tacgia);
    let type = "image";
    var file = input.files[0];
			    var formData = new FormData($('#addPostImg')[0]);
			    console.log(file);
			    formData.append('csrf_kingposter', _token);
			     //console.log(file);
			     var _token = $('input[name="_token"]').val();
   
       

}
//  function videoPostPreview(){
//    // resetPostPreview();
//    //console.log("jksdfhksdjhfdshf");
//     var videoBlock = "<div class='previewVideoType'>";

//         if($.trim($("#video").val()) != ""){
//             var videoLink = spin($("#video").val());
           
//             if(IsYoutubeVideo(videoLink)){
//                 var videoID = $("#video").val().match(/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/)[1];
                
//                 var regexp = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                
//                 $("#postVideoDetails .input-group").removeClass("inputError");

//                 if(!regexp.test($("#video").val())){
//                     $("#postVideoDetails .input-group").addClass("inputError");
//                     alertBox("Invalid Youtube video link","danger",false,true,true);
//                 }

//                 videoBlock += "<iframe src='https://www.youtube.com/embed/"+videoID+"' width='100%' height='300px' frameborder='0' allowfullscreen='allowfullscreen'></iframe>";
//             }else if(IszaloVideo(videoLink)){
//                 var myRegexp = /\d+/;
//                 var match = myRegexp.exec(videoLink);
//                 videoBlock += "<iframe src='https://www.zalo.com/video/embed?video_id="+match[0]+"' height='300px' width='100%' frameborder='0'></iframe>";
//             }else{
//                 videoBlock += "<video controls><source src='"+videoLink+"'></source></video>";
//             }
//         }
//         videoBlock += "</div>";
//     $('.postPreview').append(videoBlock);
// }

$(document).ready(function() {
	// $( ".postTypeVideo" ).click(function() {
	// 	//console.log("kjsdfhdkshfksdhfd");
	// 	// loadaccount(2);
	// 	// $('.contentoffci').show();
	// 	// $("#postVideoDetails").show();
	// 	// $("#postImageDetails").hide();
	// 	// $("#postLinkDetails").hide();
	// 	// $(this).addClass("postTypeActive");
	// 	// $(".postTypeMessage").removeClass("postTypeActive");
	// 	// $(".postTypeImage").removeClass("postTypeActive");
	// 	// $(".postTypeLink").removeClass("postTypeActive");
	// 	// $("input[name='postType']").val("video");
	// 	videoPostPreview();
	// });

    $("#addPostImg #post").click(function(){
    	    var tab= '#tabImage';
    	    var _token = $('input[name="_token"]').val();
    	    console.log(_token);
			var formData = new FormData($('#addPostImg')[0]);
			formData.append('csrf_kingposter', _token);

			// var form = document.forms.namedItem("addPostImg"); // high importance!, here you need change "yourformname" with the name of your form
   //          var formdata = new FormData(form);
			//var cateId  = $("#tabImage #cate_id").val();
			
			
			var cateId  = $(tab+' select[name="cate_id"]').val();
			var message = $(tab+' textarea[name="message"]').val();
		    var mieuta  = $(tab+ ' textarea[name="mieuta"]').val();

		    var tacgia  = $(tab+ ' input[name="tacgia"]').val();
		    var title  = $(tab+ ' input[name="title"]').val();
		    var _token  = $('input[name="_token"]').val();
		    var type = "image";
		    var validate = validateFormImage(tab,title,message,mieuta,cateId,tacgia);
		    if(validate == true){
		    	var params = {};
		    	params['cateId'] = cateId;
		    	params['csrf_kingposter'] = _token;
		    	params['message'] = message;
		    	 $.ajax({
			      url:"{{ route('uploadimage') }}", 
			      method:"POST", 
			      data:formData,
			      contentType: false,
			      processData: false,
			      beforeSend: function() {
			      },
			      success:function(data){
                      var imageURL = data.path;
                      $.ajax({
				            url: '{{ url('posts/addNewPost') }}',
				            type: 'post',
				            dataType: 'json',
				            data:{message:message,type:type,mieuta:mieuta,tacgia:tacgia,title:title,cateId:cateId,_token:_token,imageURL:imageURL,_token:_token},
				            success:function(result){
				                if(result.status == true){
				                    //alertBox(result.message,"6bbd6e",false,true,true);
				                     $("p").remove(".contentmess");
					    		       var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
										 $('.contentpoppup').append(html);
										$('#popupmess').modal('show');
				                    //alertBox(result.message,"f44336","#form-group #messageBox",true,true);
				                   // setTimeout(function(){
				                   //      window.location.reload();
				                   //   }, 2000)
				                     
				                }
				            },
				        });

			        }
			      });
		    	 
		    }
		});


function validateFormVideo(tab,title,message,mieuta,cateId,tacgia){
	//console.log("mieuta");
    if(title == ''){
        $(tab+' input[name="title"]').addClass('is-invalid');
        $(tab+' .alert_title').show();
    }else{
        $(tab+' input[name="title"]').removeClass('is-invalid');
        $(tab+' .alert_title').hide();
    }
    if(message == ''){
        $(tab+' .emojionearea-editor').addClass('is-invalid');
        $(tab+' .alert_content').show();
    }else{

        $(tab+' .emojionearea-editor').removeClass('is-invalid');
        $(tab+' .alert_content').hide();
    }
    if(mieuta == ''){

        $(tab+' .emojionearea-editor3').addClass('is-invalid');
        $(tab+' .alert_mieuta').show();
    }else{

        $(tab+' .emojionearea-editor3').removeClass('is-invalid');
        $(tab+' .alert_mieuta').hide();
    }
     if(tacgia == ''){
        $(tab+' input[name="tacgia"]').addClass('is-invalid');
        $(tab+' .alert_tacgia').show();
    }else{
        $(tab+' input[name="tacgia"]').removeClass('is-invalid');
        $(tab+' .alert_tacgia').hide();
    }
    if(cateId == ''){
        $(tab+' select[name="cate_id"]').addClass('is-invalid');
        $(tab+' .alert_category').show();
    }else{
        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
        $(tab+' .alert_category').hide();
    }

    if(title == '' || message == '' || cateId == '' || mieuta =='' || tacgia =='')
    {
        return false;
    }
    return true;
}

    $("#addPostvideo #savepostVideo").click(function(){
    	    var tab= '#tabVideo';
    	    var _token = $('input[name="_token"]').val();
    	   // console.log(_token);
			var formData = new FormData($('#addPostvideo')[0]);
			formData.append('csrf_kingposter', _token);

			// var form = document.forms.namedItem("addPostImg"); // high importance!, here you need change "yourformname" with the name of your form
   //          var formdata = new FormData(form);
			//var cateId  = $("#tabImage #cate_id").val();
			
			
			var cateId  = $(tab+' select[name="cate_id"]').val();
			var message = $(tab+' textarea[name="message"]').val();
		    var mieuta  = $(tab+ ' textarea[name="mieuta"]').val();

		    var tacgia  = $(tab+ ' input[name="tacgia"]').val();
		    var title  = $(tab+ ' input[name="title"]').val();
		    var type = "video";

		    var validate = validateFormVideo(tab,title,message,mieuta,cateId,tacgia);
		    if(validate == true){
		    	var params = {};
		    	params['cateId'] = cateId;
		    	params['csrf_kingposter'] = _token;
		    	params['message'] = message;
		    	 $.ajax({
			      url:"{{ route('uploadvideo') }}",
			      method:"POST", 
			      data:formData,
			      contentType: false,
			      processData: false,
			      beforeSend: function() {
			      },
			      success:function(data){
                      var videoURL = data.path;
                      //console.log(data.path);
                      $.ajax({
				            url: '{{url('posts/addNewPost') }}',
				            type: 'post',
				            dataType: 'json',
				            data:{message:message,type:type,mieuta:mieuta,tacgia:tacgia,title:title,cateId:cateId,videoURL:videoURL,_token:_token},
				            success:function(result){
				                if(result.status == true){
				                    //alertBox(result.message,"6bbd6e",false,true,true);
				                    //alertBox(result.message,"f44336","#form-group #messageBox",true,true);
				                   // setTimeout(function(){
				                   //      window.location.reload();
				                   //   }, 1500)
			                      $("p").remove(".contentmess");
				    		       var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
									 $('.contentpoppup').append(html);
									$('#popupmess').modal('show');
				                }
				            },
				        });

			         }
			      });
		    	 
		    }
		});

 });
// end post image
function videoPostPreview(){
   // resetPostPreview();
   //console.log("jksdfhksdjhfdshf");
    var videoBlock = "<div class='previewVideoType'>";

        if($.trim($("#video").val()) != ""){
            var videoLink = spin($("#video").val());
           
            if(IsYoutubeVideo(videoLink)){
                var videoID = $("#video").val().match(/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/)[1];
                
                var regexp = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                
                $("#postVideoDetails .input-group").removeClass("inputError");

                if(!regexp.test($("#video").val())){
                    $("#postVideoDetails .input-group").addClass("inputError");
                    alertBox("Invalid Youtube video link","danger",false,true,true);
                }

                videoBlock += "<iframe src='https://www.youtube.com/embed/"+videoID+"' width='100%' height='300px' frameborder='0' allowfullscreen='allowfullscreen'></iframe>";
            }else if(IszaloVideo(videoLink)){
                var myRegexp = /\d+/;
                var match = myRegexp.exec(videoLink);
                videoBlock += "<iframe src='https://www.zalo.com/video/embed?video_id="+match[0]+"' height='300px' width='100%' frameborder='0'></iframe>";
            }else{
                videoBlock += "<video controls><source src='"+videoLink+"'></source></video>";
            }
        }
        videoBlock += "</div>";
    $('.postPreview').append(videoBlock);
}
//////////
function searchInboxFanpageProfile(ob) {
	var value = $(ob).val().toLowerCase();
	$(".bt-list-fp-content>.bt-box-fp>.bt-item-fp").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
	});
}

function searchFriendProfile(ob) {
	var value = $(ob).val().toLowerCase();
	$(".listFriend>.loadFriend").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
	});
}

function selectGroup(ob){
	

             	//$('#bt-loader').css('display','block');
             	$('.loader-zalo').show();
				var arr_select = new Array();
				var arr_page = [];
				var check_page = 0;
				var check_profile = 0;
				$('.selectepageprofile').each(function(i, value){
					if ($(value).is(':checked')) {
						check_profile = 1;
						arr_select.push($(value).val());
					}
				});

				
				if (check_profile == 0) {
					$("p").remove(".contentmess");
    		         var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn tài khoản!!</p>';
					 $('.contentpoppup').append(html);
					$('#popupmess').modal('show');
					//alertBox('Vui lòng chọn tài khoản',"f44336",false,true,true);
					return false;
				}
				
				
					//var banbe = JSON.parse(localStorage.getItem("listfriend"));
					var banbe = JSON.parse(localforage.getItem("listfriend"));
					var html = '';
					var _token = $('input[name="_token"]').val();
					$.ajax({
				            url:"{{ url('chat/getdatafriend') }}",
				            type:"POST",
				            data:{_token:_token,arr_select:arr_select},
				            success:function(data){
				            	//console.log(data);

                              for (var i = 0; i < data.length; i++) {
                              	   var dataarr = JSON.parse(data[i].data);
                              	   for (var n = 0; n <dataarr.length ; n++) {
                              	   	   html += '<div bt-type="inbox" data-userid="'+dataarr[n].userId+'" bt-content-chat="" isFr="'+dataarr[n].isFr+'" bt-id-fanpage="2340839877247952616" bt-id-profile="" class="bt-load-chat loadFriend 5716029740350556538_2340839877247952616" style=" position: relative;">' ;
		                                 html +='<input type="checkbox" class="selectepagefriend checkallfriend" data-type="fanpage" value="'+dataarr[n].userId+'" style="display: block; float:right;">';
				                        html += '<div class="bt-avatar-user-chat"> <img src="'+dataarr[n].avatar+'" style=" position: absolute;"> </div>';
				                       
				                        html += '<div class="bt-info-chat">';
				                        html +='<div class="bt-name-chat">'+dataarr[n].zaloName+'</div>';
				                        html += '</div>';
				                        
				                        html +='<div class="owl-page">';
				                        // html +=' <img src="">';
				                        html +='</div> <div class="owl-tag pull-right wrap-color"> <div class="tags-cons"><ul>';
				                        html += ' </ul> </div></div></div>'; 
				                        $('.bt-all-comment').html(html);
				                        $('.list_group .bt-loader').css('display','none');
				                        if(n < dataarr.length){
				                        	$('.loader-zalo').hide();
				                        }
                              	   }
                              }
				                
				            }
				        });	


				     //note lại	phần bạn bè		
					// $.each(banbe,function(i,m){
					// 	var j =0;

					// 	for (var n = 0; n < arr_select.length; n++) {
							
					// 	   if(arr_select[n] == i){
					// 	   	 for (var k = 0; k < m.length; k++) {

					// 	   	 	 html += '<div bt-type="inbox" data-userid="'+m[k].userId+'" bt-content-chat="" bt-content-id="5716029740350556538" bt-id-fanpage="2340839877247952616" bt-id-profile="" class="bt-load-chat loadFriend 5716029740350556538_2340839877247952616" style=" position: relative;">' ;
     //                             html +='<input type="checkbox" class="selectepagefriend checkallfriend" data-type="fanpage" value="'+m[k].userId+'" style="display: block; float:right;">';
		   //                      html += '<div class="bt-avatar-user-chat"> <img src="https:'+m[k].avatar+'" style=" position: absolute;"> </div>';
		                       
		   //                      html += '<div class="bt-info-chat">';
		   //                      html +='<div class="bt-name-chat">'+m[k].zaloName+'</div>';
		   //                      html += '</div>';
		                        
		   //                      html +='<div class="owl-page">';
		   //                      // html +=' <img src="">';
		   //                      html +='</div> <div class="owl-tag pull-right wrap-color"> <div class="tags-cons"><ul>';
		   //                      html += ' </ul> </div></div></div>'; 
		   //                      $('.bt-all-comment').html(html);
		   //                      $('.list_group .bt-loader').css('display','none');
		   //                      j++;
		                        
		                         
					// 	   	 }
					// 	   	  if(j == m.length){
     //                                  $('.loader-zalo').hide();
					// 	   	 	 }
						   	   
					// 	    }
					// 	  }
						  

					// });
					///end note bạn bè

					//danh sahc nhom
					//var tinnhan = JSON.parse(localStorage.getItem("tinnhan"));
					  //var tinnhan = JSON.parse(localforage.getItem("tinnhan"));
					//var groupmess = JSON.parse(localStorage.getItem("groupmess"));
					//var groupmess = JSON.parse(localforage.getItem("groupmess"));
					// tin nhắn
					//var totalhoithoai = JSON.parse(localStorage.getItem("totalhoithoai"));
					//var totalhoithoai = JSON.parse(localforage.getItem("totalhoithoai"));
				
					var html2 = '';
					var avt= 'https://s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg';
                     $.ajax({
				            url:"{{ url('chat/getdatagroup') }}",
				            type:"POST",
				            data:{_token:_token,arr_select:arr_select},
				            success:function(data){
				            	for (var i = 0; i < data.length; i++) {
				            		var arr = JSON.parse(data[i].data);
				            		//console.log(arr);
				            		for (var n = 0; n < arr.data.groups.length; n++) {
				            			var zaloname = $("#check_"+data[i].zalo_id).data('name');
										  var image = $("#check_"+data[i].zalo_id).data('avatar');
										if(arr.data.groups[n].avt != null){avt = arr.data.groups[n].avt;}else{avt= 'https://s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg';}
										 html2 += '<div bt-type="inbox" id="inforgroup" data-namegroup="'+arr.data.groups[n].name+'" data-userid="'+arr.data.groups[n].creatorId+'" bt-content-chat="" data-idhoithoai="'+arr.data.groups[n].groupId+'" bt-content-id="'+arr.data.groups[n].groupId+'" bt-id-fanpage="2340839877247952616" bt-id-profile="" class="bt-load-chat  5716029740350556538_2340839877247952616" style=" position: relative;"> <input type="checkbox" class="selectepagegroup checkallGroup check_'+arr.data.groups[n].groupId+'" data-type="fanpage" value="'+arr.data.groups[n].groupId+'" style="margin-right: 8px;display: block; float: right;" data-userid="'+data[i].zalo_id+'">' ;
			                              
				                        html2 += '<div class="bt-avatar-user-chat"> <img src="'+avt+'" style=" position: absolute;"> </div>';
				                        html2 +=' <div class="bt-content-chatv2" data-namegroup="'+arr.data.groups[n].name+'" data-userid="'+arr.data.groups[n].creatorId+'" data-idhoithoai="'+arr.data.groups[n].groupId+'">';
				                        html2 += '<div class="bt-info-chat">';
				                        html2 +='<div class="bt-name-chat">'+arr.data.groups[n].name+'</div>';
				                        html2 += '</div>';
				                        html2 +='</div>';
				                        html2 +='<div class="owl-page">';
				                        html2 +=' <img src="'+image+'">';
				                        html2 +='<span>'+zaloname+'</span></div> <div class="owl-page"><span>'+arr.data.groups[n].totalMember+' thành viên</span></div><div class="owl-tag pull-right wrap-color"> <div class="tags-cons"><ul>';
				                        html2 += ' </ul> </div></div></div>';
				                        $('.bt-all-group').html(html2);
									   
				            		}
				            	}

                              
				                
				            }
				        });	
                    // note phần nhóm
					// $.each(tinnhan,function(i,m){

					// 	for (var n = 0; n < arr_select.length; n++) {
					// 		if(m.id_profile == arr_select[n]){
					// 			if (m.isgroup == 1) {
									
					// 						var zaloname = $("#check_"+m.id_profile).data('name');
					// 					  var image = $("#check_"+m.id_profile).data('avatar');
										
					// 					 html += '<div bt-type="inbox" id="inforgroup" data-namegroup="'+m.namechat+'" data-userid="'+m.id_profile+'" bt-content-chat="" data-idhoithoai="'+m.idhoithoai+'" bt-content-id="'+m.idhoithoai+'" bt-id-fanpage="2340839877247952616" bt-id-profile="" class="bt-load-chat  5716029740350556538_2340839877247952616" style=" position: relative;"> <input type="checkbox" class="selectepagegroup checkallfanpage" data-type="fanpage" value="'+m.idhoithoai+'" style="margin-right: 8px;display: block; float: right;" data-userid="'+m.id_profile+'">' ;
			                              
				 //                        html += '<div class="bt-avatar-user-chat"> <img src="'+avt+'" style=" position: absolute;"> </div>';
				 //                        html +=' <div class="bt-content-chatv2" data-namegroup="'+m.namechat+'" data-userid="'+m.id_profile+'" data-idhoithoai="'+m.idhoithoai+'">';
				 //                        html += '<div class="bt-info-chat">';
				 //                        html +='<div class="bt-name-chat">'+m.namechat+'</div>';
				 //                        html += '</div>';
				 //                        html +='</div>';
				 //                        html +='<div class="owl-page">';
				 //                        html +=' <img src="'+image+'">';
				 //                        html +='<span>'+zaloname+'</span></div> <div class="owl-page"><span>'+m.totalMember+' thành viên</span></div><div class="owl-tag pull-right wrap-color"> <div class="tags-cons"><ul>';
				 //                        html += ' </ul> </div></div></div>'; 
				                       

				 //                        $('.bt-all-group').html(html);
					// 				    // var htmlv2 = '<div class="bt-load-inbox-contentv2" id="idGroup_'+m.idhoithoai+'"></div>';
					// 				    // var htmlv2 = '<div class="bt-load-inbox-content idGroup_'+m.idhoithoai+'" id="idGroup_'+m.idhoithoai+'"></div>';
					// 				    // $('.bt-load-inbox').append(htmlv2);
									   
		                           
                                        
									

					// 			}
					// 		}

							
					// 	}

					// });
					// end note phần nhóm
        //           $.each(totalhoithoai,function(l,m){
		      //                  if(m.isgroup == 1){
		      //                  	var htmlv3 ='';
		      //                   htmlv3 = '<p>adhgsajdsadghj</p>';
        //                          $('.idGroup_'+l).append(htmlv3);
        //           //                   for (var i = m.tinnhans.length -1; i >=0; i--) {
        //           //                   	if(m.tinnhans[i].msgType == 'webchat'){
        //     			   //                if(m.tinnhans[i].uidFrom == 0){
        //     			   //                	var hml ='';
        //     			   //                	var avt = $('#check_'+m.tinnhans[i].id_profile).data('avatar');
					   //           //                hml += '<div style="opacity: 1;" class="bt-inbox-item bt-right bt-new-chat">';
								// 		        //       hml += '<div class="bt-inbox-item-avatar">';
								// 		        //       hml += '<img title="'+m.tinnhans[i].name+'" src="'+avt+'">';
								// 		        //       hml += '</div>';
								// 		        //       hml += '<div class="bt-inbox-item-text">';
								// 		        //       hml += '<span>'+m.tinnhans[i].noidung+'</span>';
								// 		        //       hml += '<span class="time_date"> '+m.tinnhans[i].datetime+'    |    '+m.tinnhans[i].name+'</span> </div>';
								// 		        //       hml += '</div>';
								// 		        //       hml += '</div>'; 
										            
        //           //                            $('.idGroup_'+l).append(hml);
        //     			   //                }
        //     			   //              }
					            		 
				    //         		// }
                                     
		                             
                                    
			     //                   }
								// });
					
					
                   
             }


function changeVideo(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
			            //console.log(e.target.result);
			           $('.previewVideoType').html('<video controls><source src="'+e.target.result+'" type="video/mp4"></video>');

		        }

		        
		            //$( "#video" ).trigger('propertychange');
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar3').click(function(){
		        $('#video').click();
		    });
		});
function changeimage(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
			            //console.log(e.target.result);
			           //$('.previewVideoType').html('<video controls><source src="'+e.target.result+'" type="video/mp4"></video>');

		        }

		        
		            //$( "#video" ).trigger('propertychange');
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar3').click(function(){
		        $('#campaign-file-image-product').click();
		    });
		});

// phần lấy thông tin danh mục bài viết
 function getInfoCategoryPost(model){
    let id = $(model).data('id');
    $('#modal_update').modal('show');
    if(id){
        $.ajax({
            url:"{{ url('posts/getInfoCategoryAjax') }}",
            type:"GET",
            data:{id:id},
            success:function(result){
                
                if(result.status == 200){
                   $('#modal_update input[name="cate_name"]').val(result.data.name);
                   $('#modal_update input[name="cate_id"]').val(result.data.id);

                }
            }
        });
    }
}
//end post
$('.carousel').carousel({
  interval: 2000
})

function saveFormUpdateCategory(){
     
     let id   = $('#modal_update input[name="cate_id"]').val();
     let name = $('#modal_update input[name="cate_name"]').val();
    $('#modal_update').modal('show');
    if(name == ''){
    	 console.log('Tên danh mục không được để trống!');
    }else{
    	
        $.ajax({
            url:"{{ url('posts/getUpdateCategory') }}",
            type:"GET",
            data:{id:id,name:name},
            success:function(result){

                if(result.status == 200){
                	
                	alertBox(result.message,"6bbd6e",false,true,true);
                   setTimeout(function(){
                        window.location.reload();
                     }, 1500)

                }else{
                	 alertBox(result.message,'f44336','.alertBoxCate',true);
                    //hideLoading('.alerts');
                    setTimeout(function(){
                        window.location.reload();
                     }, 1500);
                }
            }
        });

    }

}



//phan thêm bài viết


   </script>
</body>
</html>
