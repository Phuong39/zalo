<!DOCTYPE html>
<html lang="en">
<head>
	<base href="{{asset('public/layout/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="https://zalo.phanmemninja.com/theme/default/css/emojionearea.min.css">
	<script src="https://zalo.phanmemninja.com/theme/default/js/libs/emojione.min.js"></script>
	<!-- /global stylesheets -->
<style>
	.postPreviewDetails {
    margin: 5px 0px;
    display: block;
    color: #9197a3;
    font-size: 12px;
}

</style>


</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-light">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center" style="background-color: #4267b2">
			<div class="navbar-brand navbar-brand-md">
				<a href="index.html" class="d-inline-block">
					<img src="https://zalo.phanmemninja.com/theme/default/images/kp_logo.png?v=kp20180403.png" alt="" style="width: 60px; ">
				</a>
			</div>

			<div class="navbar-brand navbar-brand-xs">
				<a href="index.html" class="d-inline-block">
					<img src="global_assets/images/logo_icon_light.png" alt="">
				</a>
			</div>
		</div>
		<!-- /header with logos -->


		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="index.html" class="d-inline-block">
					<img src="global_assets/images/logo_dark.png" alt="">
				</a>
			</div>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>

			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-people"></i>
						<span class="d-md-none ml-2">Users</span>
						<span class="badge badge-mark border-pink-400 ml-auto ml-md-0"></span>
					</a>

					<div class="dropdown-menu dropdown-content wmin-md-300">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Users online</span>
							<a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								<li class="media">
									<div class="mr-3">
										<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Jordana Ansley</a>
										<span class="d-block text-muted font-size-sm">Lead web developer</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Will Brason</a>
										<span class="d-block text-muted font-size-sm">Marketing manager</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-danger"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Hanna Walden</a>
										<span class="d-block text-muted font-size-sm">Project manager</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Dori Laperriere</a>
										<span class="d-block text-muted font-size-sm">Business developer</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-warning-300"></span></div>
								</li>

								<li class="media">
									<div class="mr-3">
										<img src="global_assets/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
									</div>
									<div class="media-body">
										<a href="#" class="media-title font-weight-semibold">Vanessa Aurelius</a>
										<span class="d-block text-muted font-size-sm">UX expert</span>
									</div>
									<div class="ml-3 align-self-center"><span class="badge badge-mark border-grey-400"></span></div>
								</li>
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-grey mr-auto">All users</a>
							<a href="#" class="text-grey"><i class="icon-gear"></i></a>
						</div>
					</div>
				</li>
			</ul>

			<span class="navbar-text ml-md-3 mr-md-auto">
				<span class="badge bg-pink-400 badge-pill">16 orders</span>
			</span>

			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                    <i class="icon-bell2"></i>
                    <span class="d-md-none ml-2">Messages</span>
                    <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">2</span>
                </a>

				</li>

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="https://s120.avatar.talk.zdn.vn/6/8/4/1/2/120/61c9e312cd05c775f7b42157d82c4b11.jpg" class="rounded-circle" alt="">
						<span>{{Auth::user()->email}}</span>
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


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Layout -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý tài khoản</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">

								<li class="nav-item"><a href="{{ asset('home') }}" class="nav-link"><i class="fa fa-calendar"></i><span>Tài khoản zalo</span></a></li>

								<li class="nav-item"><a href="{{ asset('home\categories') }}" class="nav-link"><i class="fa fa-calendar"></i><span>Danh mục tài khoản</span></a></li>

						</li>

						{{-- <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý bài viết</div> <i class="icon-menu" title="Layout options"></i></li>

								<li class="nav-item"><a href="{{asset('posts/list_posts')}}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh sách bài viết</span></a></li>

								<li class="nav-item"><a href="{{asset('posts/category')}}" class="nav-link"><i class="fa fa-calendar"></i><span>Danh mục bài viết</span></a></li>
						</li> --}}

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý Chat</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Live chat</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="{{ asset('chat/chatprofile') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Chat profile</span></a></li>

								<li class="nav-item"><a href="{{ asset('chat/chatoa') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Chat OA</span></a></li>

							</ul>
						</li>
                         <li class="nav-item">
							<a href="{{asset('chatbot')}}" class="nav-link"><i class="fa fa-comment-o" aria-hidden="true"></i> <span>Chatbot</span></a>

						</li>


                        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý Đăng bài</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">

								<li class="nav-item"><a href="{{ asset('posts/createpost') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Thêm bài viết</span></a></li>
								 <li class="nav-item"><a href="{{asset('posts/list_posts')}}" class="nav-link"><i class="fa fa-clipboard"></i><span>Danh sách bài viết</span></a></li>

								<li class="nav-item"><a href="{{asset('posts/category')}}" class="nav-link"><i class="fa fa-calendar"></i><span>Danh mục bài viết</span></a></li>


						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-comment-o" aria-hidden="true"></i> <span>Đăng bài profile</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="{{ asset('posts/profile') }}" class="nav-link"><i class="fa fa-clipboard  "></i><span>Đăng bài ngay</span></a></li>

								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh sách lịch đăng</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lịch sử đăng bài</span></a></li>
							</ul>
						</li>

						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-comment-o" aria-hidden="true"></i> <span>Đăng bài OA</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Đăng bài ngay</span></a></li>

								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh sách lịch đăng</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lịch sử đăng bài</span></a></li>
							</ul>
						</li>

						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-comment-o" aria-hidden="true"></i> <span>Đăng bài lên fanpage</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Đăng ngay</span></a></li>

								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh sách lịch đăng</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lịch sử đăng bài</span></a></li>
							</ul>
						</li>

						

						  <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý kết bạn</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">
							<li class="nav-item"><a href="{{asset('addfriend')}}" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Kết bạn theo số điện thoại</span></a></li>
							<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Đặt lịch kết bạn</span></a></li>
							<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Lịch sử kết bạn</span></a></li>

						</li>
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý nhóm</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Tham gia nhóm</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">

								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i>Lập lịch tham gia nhóm</a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lịch sử tham gia nhóm</span></a></li>


							</ul>
						</li>

						<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true" style="text-align: center"></i> <span>Mời bạn bè vào nhóm</span></a></li>

						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Đăng bài lên nhóm</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">

								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Đăng bài ngay</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lập lich đăng</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Lịch sử bài đăng</span></a></li>

							</ul>
						</li>

						<li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Bình luận và comment nhóm</span></a></li>

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Quản lý bán hàng</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Shop zalo</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i>Sản phẩm</a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i>Danh mục</a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Thuộc tính</span></a></li>

							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>Đơn hàng</span></a>

						</li>

						<li class="nav-item">
							<a href="{{asset('chiendich')}}" class="nav-link"><i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Chiến dịch</span></a>

						</li>

						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Tiện ích</div> <i class="icon-menu" title="Layout options"></i></li>

						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa fa-user-plus"></i> <span>Thêm quản lý nhân viên</span></a>

						</li>
						<li class="nav-item">
							<a href="{{asset('thong_ke/statistical')}}" class="nav-link"><i class="fa fa-bar-chart"></i> <span>Thống kê</span></a>

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

		<!-- /main content -->

	</div>
	<!-- /page content -->
		<!-- Core JS files -->

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script> --}}
<script src="https://sv1.phanmemninja.com/socket.io/socket.io.js"></script>
	<script src="global_assets/js/main/jquery.min.js"></script>
	<script src="global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
     <!--js zalo.phanmemninja-->
     <script src="https://zalo.phanmemninja.com/theme/default/js/dropdown.js"></script>
	<!-- Theme JS files -->
	<script src="global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="global_assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="https://zalo.phanmemninja.com/theme/default/js/libs/emojionearea.min.js"></script>
	<script src="https://zalo.phanmemninja.com/theme/default/js/postpreview.js"></script>
	{{-- testjs --}}
 <script src="https://zalo.phanmemninja.com/theme/default/js/libs/preloader.min.js?v=kp20180403"></script>
{{-- end test js --}}
	<script src="assets/js/app.js"></script>
	<script src="assets/js/1111post.js"></script>
	 <script src="assets/js/helper.js"></script>
	
	<script src="global_assets/js/demo_pages/dashboard.js"></script>
	<!-- /theme JS files -->
   <script>

   	
        //var options = {iv:CryptoJS.enc.Hex.parse("00000000000000000000000000000000"), mode: CryptoJS.mode.CBC, padding: CryptoJS.pad.Pkcs7 }; 
 //////////////////////////////////////////////////////////////////////////////////////////////
 	//-------------------------------------------phần lọc số điện thoại--------------------------------------------
	    var phonelist = [];
		var phonestart = [];
		var socket = io("https://sv1.phanmemninja.com/",{'forceNew':true });
		var count = 0;
	socket.on("returnfriend",function(result){
			var data = JSON.parse(result);
             console.log(data.status);
			if (data.status == '600') {
				$('.postStatus_'+data.id_profile).html('cookie không hoạt đông');
				return false;
			}
			if (data.status == '221') {
				$('.postStatus_'+data.id_profile).html('đã vượt quá số lần kết bạn trong một ngày');
				
			} else {
				$('.postStatus_'+ data.id_profile).html('hoàn thành kết bạn:<a href="{{ url("addfriend/log") }}">xem lịch sử</a>');
			}
		});
	var input = document.getElementById("choicefile");
	var output = document.getElementById("list-phone");
	
	$(document).ready(function(){
        $('#locsodienthoai').click(function(){
		  		//console.log('dsfdsfdsf');
		  		count = 0;
		  		phonelist = [];
		  		var groups = []; // List of selected groups
		  		var params = {};
		  		var check = 0;
				$('.groupName:visible .fbnode:checked').each(function(){
					check = 1;
					groups.push($(this).val());
				});
				if(check == 0){
					alertBox('Vui lòng chọn một tài khoản để chạy lọc',"f44336",false,true,true);
					return false;
				}
				if($('.list-phone').val() == ''){
					alertBox('Vui lòng nhập danh sách số điện thoại',"f44336",false,true,true);
					return false;
				}
				console.log(check);
				$('.loader-zalo').show();
				params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
				params['listphone'] = $('.list-phone').val().trim();
				var phone = params['listphone'].replace(/(\r\n|\n|\r)/gm,";");
    			var phone_array = phone.split(";");
    			phonestart = phone.split(";");
    			//console.log("phonestart:",phonestart);
    			for (var i = 0; i < 1; i++) {
					params['id_profile'] = groups[i];

					$.ajax({
						url: '{{ url("addfriend/checkphone") }}',
						dataType: 'json',
						type: 'get',
						contentType: 'application/x-www-form-urlencoded',
						data: params,
						success: function( data, textStatus, jQxhr ){
							//console.log("sadasdas");
							socket.emit('checklistphone',data);
							// $('#materialPreloader').hide();
							// alertBox('Lưu thành công chatbot',"success",false,true,true);
							// return false;
						},
						error: function( jqXhr, textStatus, errorThrown ){ 
						},
						complete: function(){
							
							// $('#materialPreloader').hide();
							// alertBox('Lưu thành công chatbot',"success",false,true,true);
							// return false;
						}
					});
				}
    			
		  	});

	});       
///////////////////////////////////////////////////////////////////////////////////////////////
//----------------------- phần posts/createpost   ---------------------------------    
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
		        $('#img').click();
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
		$(document).ready(function() {
		    $('#avatar2').click(function(){
		        $('#img2').click();
		    });
});    

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
					console.log(a);
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
//
$(document).ready(function(){

  //    $('.btn-save-pageprofile').on('click',function(){
		// 	// $('#chontaikhoan').hide();
		// 	// gettag();
		// 	lastmess = [];
		// 	hoithoai = {};
		// 	hoithoaigroup = {};
		// 	tinnhanchuadoc = [];
		// 	$('.bt-loader').show();
		// 	$('.bt-chat-mess').hide();
		// 	$('.bt-default-mess').show();
		// 	var check_page = 0;
		// 	var profilecheck = [];
		// 	var html = '';
		// 	$('.checkallprofile:checked').each(function(i,value){

		// 		check_page = 1;
		// 		profilecheck.push($(this).val());
		// 		html += $(this).attr('data-name')+',';
		// 		var data = '{"cookie":"'+$(this).attr('data-cookie')+'","serectkey":"'+$(this).attr('data-env')+'","urlchat":"'+$(this).attr('url-chat')+'","id_profile":"'+$(this).val()+'"}';
		// 		console.log(data);
		// 		setTimeout(function(){
		// 			socket.emit('messprofile',data);
		// 			socket.emit('getfriendnew',data);
		// 			socket.emit('gettag',data);
		// 		},i*2000);
		// 		var id_profile = $(this).val();
		// 		$('.nav-tabs').append('<li class="nav-item" onclick="activetab(this,\'#menu'+i+'\')"><a class="nav-link newmes_'+$(this).val()+'" href="#menu'+i+'" style="float: left;">'+$(this).attr('data-name')+'<div style="width: fit-content;background: red;border-radius: 50%;float: right;margin-top: -5px;"><span style="color: white;padding: 7px;" class="loadtinnhanmoi homenewmess countmess_'+$(this).val()+'" data-tinnhan="0"></span></div></li>');
		// 		$('.tab-content').removeClass('mb-1');
		// 		$('.tab-content').append('<div id="menu'+i+'" class="container tab-pane fade tabzalo_'+$(this).val()+'"></div>');
		// 		$('#menu'+i+'').html($('#home').html());
		// 		// $('.tab-content').addClass('mb-3');
		// 		// var el = $(".tabzalo_"+$(this).val()+" .bt-input-note").emojioneArea({
		// 		// 	placeholder: "Nhập tin nhắn ... (Bấm Enter để gửi, Shift + Enter để xuống dòng)",
		// 		// 	events: {
		// 		// 		keydown: function (editor, event) {
		// 		// 			if(event.which == 13 && !event.shiftKey){
		// 		// 				var content_chat = $('.tabzalo_'+id_profile+' .bt-input-note').val()
		// 		// 				sendReplyJs(content_chat);
		// 		// 				$('.tabzalo_'+id_profile+' .emojionearea.bt-make-input').attr("tabindex",-1).focus();
		// 		// 				$('.tabzalo_'+id_profile+' .bt-make-input .emojionearea-editor').attr("tabindex",-1).focus();
								
		// 		// 				event.preventDefault();
		// 		// 			}
		// 		// 		},
		// 		// 		keyup: function (editor, event) {
		// 		// 			if(event.which == 13 && !event.shiftKey){
		// 		// 				editor.html('');
		// 		// 			}
		// 		// 		},
		// 		// 	}
		// 		// });
		// 		// var el1 = $("#home .bt-input-note").emojioneArea({
		// 		// 	placeholder: "Nhập tin nhắn ... (Bấm Enter để gửi, Shift + Enter để xuống dòng)",
		// 		// 	events: {
		// 		// 		keydown: function (editor, event) {
		// 		// 			if(event.which == 13 && !event.shiftKey){
		// 		// 				sendReplyJs($('#home .bt-input-note').val());
		// 		// 				$('#home .emojionearea.bt-make-input').attr("tabindex",-1).focus();
		// 		// 				$('#home .bt-make-input .emojionearea-editor').attr("tabindex",-1).focus();
								
		// 		// 				event.preventDefault();
		// 		// 			}
		// 		// 		},
		// 		// 		keyup: function (editor, event) {
		// 		// 			if(event.which == 13 && !event.shiftKey){
		// 		// 				editor.html('');
		// 		// 			}
		// 		// 		},
		// 		// 	}
		// 		// });
		// 	});

		// 	// localStorage.setItem("selectprofile", JSON.stringify(profilecheck));
		// 	if (check_page == 0) {
		// 		alertBox('Vui lòng chọn tài khoản',"danger",false,true,true);
		// 		return false;
		// 	} else {
		// 		$('.choiceaccount').html(html.replace(/,+$/,''));
		// 	}
		// });

	
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
	$(".selecteallprofiles").click(function(){
		$('.checkallprofile').not(this).prop('checked', this.checked);
	});
		// $('.bt-show-fp').click(function(){
			
		// 	if ($('.bt-show-fp').hasClass('.pull-right') === false) {
		// 		$('.bt-list-fp').hide();
		// 	} else {
		// 		$('.bt-list-fp').show();
		// 	}

		// });
		$('.bt-btn-edit-user>.bt-edit').on('click',function(){
			if ($(this).parents('.bt-info-content').hasClass('bt-hidden-ipnut')) {
				$(this).parents('.bt-info-content').addClass('bt-hidden-text').removeClass('bt-hidden-ipnut');
				$('.suahuy').text('Hủy');
			} else {
				$(this).parents('.bt-info-content').addClass('bt-hidden-ipnut').removeClass('bt-hidden-text');
				$('.suahuy').text('Sửa');
			}
		});
		// setInterval(function(){
		// 	selectPageAndProfilev1();
		// }, 20000);
			/*$('.bt-make-input').keyup(function(){
				if ($('.bt-make-input').text() != '') {
					$('.bt-make-placeholder').css('display','none');
				} else {
					$('.bt-make-placeholder').css('display','block');
				}
			});
			$('#bt-get-input-file').on('click',function(){
				$("#bt-input-file").trigger('click');
			});*/
			// var el = $(".bt-make-input").emojioneArea({
			// 	placeholder: "Nhập tin nhắn ... (Bấm Enter để gửi, Shift + Enter để xuống dòng)",
			// 	events: {
			// 		keydown: function (editor, event) {
			// 			if(event.which == 13 && !event.shiftKey){
			// 				var content_chat = editor.context.innerText;
			// 				sendReplyJs(content_chat);
			// 			}
			// 		},
			// 		keyup: function (editor, event) {
			// 			if(event.which == 13 && !event.shiftKey){
			// 				editor.html('');
			// 			}
			// 		},
			// 	}
			// });

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

				 $(".mediaLibraryImage").on( 'click', function () {
				 	$('#mediaLibModalImage').modal('show');
				 	getMediaLib();
				 	$("#URLFrom").val("image");
				 	$("#image_number").val($(this).val());
				 });
			// $('.bt-all-comment').on('click','.bt-load-chat',function() {
			// 	$('.bt-load-chat').removeClass('readding');
			// 	$(this).addClass('readding');
			// 	$(this).removeClass('chuadoc');
			// 	$('.bt-default-mess').css('display','none');
			// 	$('.bt-chat-mess').css('display','block');
			// 	var bt_id_fanpage = $(this).attr('bt-id-fanpage');
			// 	var bt_id_profile = $(this).attr('bt-id-profile');
			// 	var bt_id_post = $(this).attr('bt-id-post');
			// 	var bt_id_post_first = $(this).attr('bt-id-post-first');
			// 	var last_message = $(this).attr('bt-content-chat');
			// 	var id_user = $(this).attr('bt-content-id');
			// 	var name_user = $(this).find('.bt-content-chat .bt-name-chat').text();
			// 	$('.bt-avatar-user>img').attr('src','https://graph.facebook.com/'+id_user+'/picture?height=100&width=100');
			// 	$('.bt-name-user .bt-first').html(name_user);
			// 	$('.bt-name-user .bt-last').html(id_user);
			// 	if ($(this).attr('bt-type') == 'comment') {
			// 		$('.bt-get-link-post').attr('href','https://facebook.com/'+bt_id_post_first);
			// 		$.ajax({
			// 			'url':'http://localhost/Ninjafanpage/public/ajaxgetinboxid',
			// 			'data': 'id_post='+bt_id_post+'&last_message='+last_message+'&id_user='+id_user+'&bt_id_post_first='+bt_id_post_first+'&bt_id_fanpage='+bt_id_fanpage+'&bt_id_profile='+bt_id_profile,
			// 			'type': 'get',
			// 			'complete': function(result){
			// 				$('.bt-load-inbox-content').html(result.responseText);
			// 				$('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
			// 			}
			// 		});
			// 	} else if ($(this).attr('bt-type') == 'inbox') {
			// 		$('#materialPreloader').show();
		 //    		//$('.bt-get-link-post').attr('href','https://facebook.com/'+id_user);
		 //    		var params = {};
		 //    		params['id_user'] = id_user;
		 //    		params['bt_id_fanpage'] = bt_id_fanpage;
		 //    		params['bt_id_profile'] = bt_id_profile;
		 //    		params['#');
		 //    		$.ajax({
		 //    			url: '#',
		 //    			dataType: 'json',
		 //    			type: 'post',
		 //    			contentType: 'application/x-www-form-urlencoded',
		 //    			data: params,
		 //    			success: function( data, textStatus, jQxhr ){

		 //    			},
		 //    			error: function( jqXhr, textStatus, errorThrown ){
		 //    			},
		 //    			complete: function(data, textStatus, jQxhr){
		 //    				console.log(data.responseText);
		 //    				$('.bt-load-inbox-content').html(data.responseText);
		 //    				$('.bt-load-inbox-content').scrollTop($('.bt-load-inbox-content')[0].scrollHeight - $('.bt-load-inbox-content')[0].clientHeight);
		 //    				$('#materialPreloader').hide();
			// 				// $('.bt-make-input').val('');
			// 			}
			// 		});
		 //    	}
		 //    });
		 // $('.bt-ajax-load-all').on('click',function(){
		 // 	var arr_select = new Array();

		 // 	$('.selectepageprofile').each(function(i, value){
		 // 		if ($(value).is(':checked')) {
		 // 			arr_select.push($(value).attr('data-type') + '-' + $(value).val());
		 // 		}
		 // 	});
		 // 	arr_select = JSON.stringify(arr_select);
		 // 	$('.fill-tab').removeClass('active');
		 // 	$(this).addClass('active');
		 // 	$('.bt-all-comment').css('display','none');
		 // 	$('.bt-comment .bt-fix-co4 .bt-loader').css('display','flex'); //thuy block
		 // 	$.ajax({
		 // 		'url':'http://localhost/Ninjafanpage/public/ajaxgetlistall',
		 // 		'data': 'arr_select=' + arr_select,
		 // 		'type': 'get',
		 // 		'complete': function(result){
		 // 			$('.bt-comment .bt-fix-co4 .bt-loader').css('display','none');
		 // 			$('.bt-all-comment').css('display','block');
		 // 			$('.bt-all-comment').html(result.responseText);
		 // 		}
		 // 	});
		 // });
		 // $('.bt-ajax-comment').on('click',function(){
		 // 	var arr_select = new Array();

		 // 	$('.selectepageprofile').each(function(i, value){
		 // 		if ($(value).is(':checked')) {
		 // 			arr_select.push($(value).attr('data-type') + '-' + $(value).val());
		 // 		}
		 // 	});
		 // 	arr_select = JSON.stringify(arr_select);
		 // 	$('.fill-tab').removeClass('active');
		 // 	$(this).addClass('active');
		 // 	$('.bt-all-comment').css('display','none');
		 // 	$('.bt-comment .bt-fix-co4 .bt-loader').css('display','flex'); //thuy block
		 // 	$.ajax({
		 // 		'url':'http://localhost/Ninjafanpage/public/ajaxgetlistcom',
		 // 		'data': 'arr_select=' + arr_select,
		 // 		'type': 'get',
		 // 		'complete': function(result){
		 // 			$('.bt-comment .bt-fix-co4 .bt-loader').css('display','none');
		 // 			$('.bt-all-comment').css('display','block');
		 // 			$('.bt-all-comment').html(result.responseText);
		 // 		}
		 // 	});
		 // });
		 // $('.bt-ajax-inbox').on('click',function(){
		 // 	var arr_select = new Array();

		 // 	$('.selectepageprofile').each(function(i, value){
		 // 		if ($(value).is(':checked')) {
		 // 			arr_select.push($(value).attr('data-type') + '-' + $(value).val());
		 // 		}
		 // 	});
		 // 	arr_select = JSON.stringify(arr_select);
		 // 	$('.fill-tab').removeClass('active');
		 // 	$(this).addClass('active');
		 // 	$('.bt-all-comment').css('display','none');
		 // 	$('.bt-comment .bt-fix-co4 .bt-loader').css('display','flex'); //Thuy block
		 // 	$.ajax({
		 // 		'url':'http://localhost/Ninjafanpage/public/ajaxgetlistinbox',
		 // 		'data': 'arr_select=' + arr_select,
		 // 		'type': 'get',
		 // 		'complete': function(result){
		 // 			$('.bt-all-comment').html(result.responseText);
		 // 			$('.bt-all-comment').css('display','block');
		 // 			$('.bt-comment .bt-fix-co4 .bt-loader').css('display','none');
		 // 		}
		 // 	});
		 // });
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
		 	$.ajax({
		 		'url':'http://localhost/Ninjafanpage/public/ajaxunread',
		 		'data': '',
		 		'type': 'get',
		 		'complete': function(result){
		 			$('.bt-all-comment').html(result.responseText);
		 			$('.bt-comment .bt-fix-co4 .bt-loader').css('display','none');
		 			$('.bt-all-comment').css('display','block');
		 		}
		 	});
		 });
		 $('.bt-submit-reply>a.btn').on('click',function(){
		 	var content_chat =  el[0].emojioneArea.getText();
		 	// alert('aaaaaaaaa');
		 	// return false;
		 	sendReplyJs(content_chat);
		 	$('.bt-make-input .emojionearea-editor').html(' ');
		 	$('.bt-make-input').val('');
		 });

		 // $.ajax({
		 // 	'url':'http://localhost/Ninjafanpage/public/ajaxgetlistall',
		 // 	'data': '',
		 // 	'type': 'get',
		 // 	'complete': function(result){
		 // 		$('.bt-all-comment').html(result.responseText);
		 // 		$('.bt-load-body').css('display','none');
		 // 		$('.bt-comment').css('display','flex');
		 // 	},
		 // });

		});

		function sendReplyJs(content_chat){

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
			// var content_chat = $('.bt-make-input').val();
			var id_repply = $('.global-id_fanpage').val();
			// console.log(content_chat);
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
				//params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
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
						// $('.bt-make-input').val('');
					}

				});
			}
		}
//-----------------------------------end chat OA------------------------------------------

/////////////////////////////////////////////////////////////////////////////////////////////   
		$(document).ready(function(){

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
		socket = io('https://sv1.phanmemninja.com');
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
			params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
			$.ajax({
				url: '{{ url("chatprofile/home/inboxpopup") }}',
				dataType: 'json',
				type: 'post',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
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
		$('#file').change(function() {
			var content_c = $(this).parents('.chatzalov2').find('.bt-input-note').val();
			var file = this.files[0];

            console.log(file.size);
            var totlsize = file.size;
            if (totlsize > 512000) {
                alertBox('Hiện tại chúng tôi chỉ cho phép ảnh dưới 0.5MB',"danger",false,true,true);
                return false;
            }
			var formData = new FormData($('#fileimage')[0]);
			formData.append('url', '{{ url("") }}');
			formData.append('csrf_kingposter', getCookie('csrf_kingposter_cookie'));
			console.log(formData);
			$.ajax({
			    type: "POST",
			    url: '{{ url("upfileimage.php") }}',
			    data: formData,
			    //use contentType, processData for sure.
			    contentType: false,
			    processData: false,
			    beforeSend: function() {
			    },
			    success: function(data) {
			    	var data = JSON.parse(data);
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
						// var content_chat =  $('.bt-input-note').val();
                        savemess(1);
						if (isgroup == 0) {
							var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.path+'"}';
							socket.emit('sendimageprofile',param);
						} else {
							var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.path+'"}';
							socket.emit('sendimagegroup',param);
						}
			    	}
			    },
			    error: function() {
			    }
			});
		});
            $("#file2").change(function() {
                var file = this.files[0];
                var formData = new FormData($('#upfile')[0]);
                formData.append('csrf_kingposter', getCookie('csrf_kingposter_cookie'));
                $.ajax({
                    type: "POST",
                    url: 'https://zalov2.phanmemninja.com/upfile.php',
                    data: formData,
                    //use contentType, processData for sure.
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                    },
                    success: function(data) {
                        var data = JSON.parse(data);
                       // console.log(data);
                        if (data.status == 400) {
                            alertBox('Định dạng tập tin không hợp lệ',"danger",false,true,true);
                            return false;
                        } else {
                            var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
                            var idcl = $('#tinnhandangdoc').attr('data-idclid');

                            var isgroup = $('#tinnhandangdoc').attr('data-group');
                            var url_arr = data.path.split("/");
                            var filename  = url_arr[url_arr.length-1];
                            var time = new Date().getTime();
                            var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
                            var name_profile = $('.profile_'+id_profile).attr('data-name');
                            var image_profile = $('.profile_'+id_profile).attr('data-image');
                            var cookie = $('.profile_'+id_profile).attr('data-cookie');
                            var enk = $('.profile_'+id_profile).attr('data-env');
                            var checksum = data.checksum;
                            var content =  '';
                            var fileExt = 'xlsx';
                            var sizefile= data.file_size;
                            if (isgroup == 0) {
                                ///"{"fileSize":"8514", "checksum":"eb0e157aa605b898ec62ab0f15160922", "checksumSha":"null", "fileExt":"xlsx", "fdata":"", "fType":1}"
                                //var param = '{"fileName":"'+filename+'","clientId":'+time+',"checksum":'+checksum+',"fileSize":"'+data.file_size+'","toid":"'+idto+'","fdata":"","fType":1}';
                                //?///var param ='{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizefile+',"toid":"'+idto+'","chunkId":1}';
                                var param ='{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizefile+',"toid":"'+idto+'","fileExt":"'+fileExt+'","checksum":"'+checksum+'","chunkId":1}';
                                //console.log(param);
                                //var param = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"checksum":'+checksum+',"toid":"'+idto+'","chunkId":1}';
                                var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(enk),options).ciphertext.toString(CryptoJS.enc.Base64);
                                var data = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content+'","id_profile":"'+id_profile+'","url_file":"'+data.path+'","encrypted":"'+encrypted+'","checksum":"'+checksum+'","filename":"'+filename+'"}';
                                //var param = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content+'","id_profile":"'+id_profile+'","url_file":"'+data.path+'","checksum":"'+data.checksum+'"}';
                                var params = {};
                                params['data'] = data;
                                params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
                                $.ajax({
                                    url: '{{ url("chatprofile/home/postfile") }}',
                                    dataType: 'json',
                                    type: 'post',
                                    contentType: 'application/x-www-form-urlencoded',
                                    data: params,
                                    success: function (data, textStatus, jQxhr) {
                                       // console.log(enk);
                                       
                                        var decrypted = CryptoJS.AES.decrypt({
                                            ciphertext: CryptoJS.enc.Base64.parse(data.data),

                                            salt: ""
                                        }, CryptoJS.enc.Base64.parse(enk), options).toString(CryptoJS.enc.Utf8);
                                        console.log(decrypted);
                                        var result = JSON.parse(decrypted);
                                        console.log(result);

                                        sendfile(result.data.fileId,content,idto,cookie,enk,id_profile,width,height);
                                    },
                                    error: function( jqXhr, textStatus, errorThrown ){
                                    },
                                    complete: function(data, textStatus, jQxhr){
                                        // $('.bt-all-comment').html(data.responseText);
                                        // $('#materialPreloader').hide();
                                        // $('.bt-make-input').val('');
                                    }
                                });
                                //console.log(param);

                                socket.emit('sendfileprofile',param);
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
		// $('.tab-pane').on('click','#sendBtn',function(){
		// 	var content_c = $(this).parents('.chatzalov2').find('.bt-input-note').val();
		// 	sendReplyJs(content_c);
		// });
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
				var time = new Date().getTime();
				var objtag = {};
				objtag.color = '#'+$('.jscolor').val();
				objtag.text = $('#nametag').val();
				objtag.emoji = '';
				objtag.createTime = time;
				objtag.id = tagzalo[$(this).val()].length+1;
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

		$("body").on( 'click','.iup-image',function () {
			var content_c = $(this).parents('.chatzalov2').find('.bt-input-note').val();
            
            $('#mediaLibModalImage').modal('show');
            // alert('bbbbbbb');
            getMediaLib(content_c);
			// $('#file').trigger( "click" );
		});

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
                    
                    // $('#campaign-file-image-product').val(data.url);
                    var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
                    var idcl = $('#tinnhandangdoc').attr('data-idclid');

                    var isgroup = $('#tinnhandangdoc').attr('data-group');
                    var id_profile = $('#tinnhandangdoc').attr('data-idprofile');
                    var name_profile = $('.profile_'+id_profile).attr('data-name');
                    var image_profile = $('.profile_'+id_profile).attr('data-image');
                    var cookie = $('.profile_'+id_profile).attr('data-cookie');
                    var enk = $('.profile_'+id_profile).attr('data-env');
                    // var content_chat =  $('.bt-input-note').val();
                    savemess(1);
                    if (isgroup == 0) {
                        
                        // socket.emit('sendimageprofile',param);

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
                        //console.log(param);
                        var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(enk),options).ciphertext.toString(CryptoJS.enc.Base64);
                        var data = '{"idto":"'+idto+'","idcl":"'+idcl+'","cookie":"'+cookie+'","serectkey":"'+enk+'","content":"'+content_c+'","id_profile":"'+id_profile+'","url_image":"'+data.url+'","encrypted":"'+encrypted+'","filename":"'+filename+'"}';
                        //cosole.log(data);
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
                                //var data2 = "2WgcS+YqyVF+OHWrCdyHNn3ug6v2CNlGmHesvs47zz9St1/VDgV+gv7n/x9z6m4nC4DFAEvQvt14iaOFF1QWjRHN2d03yeKj/t8cnL3EQDUw6NYMM3zJPvAI7OspL7FFehRNDv/svlrieLTwgJMw4XU+Uz/MhoG1HCWIBbXztvhTsukWP6gUlZKi3m8cytIu+ETV8SjLunQ3X9nkgymRAiTFqUMW/+itpT8u1wrhh/vE4NGU+UVJq6tXqj/af7e5o4TopZVbXXg9h1I7ibhvpINxItJMVMnxWUW0b2yH+pT1QvtwoJang7N9e26wnEmglNnW26s495GiOBE4sVAXHenLooziAm0seTQ8TD+yG2E4TvklA0hih+ZMg24N6Y6JrwOPBAczjq+sOP4H0XgQnCcw+5hw3M37B3pxeC5jyzFZIUpDKWYptIuOQQ0qrOq/LULTzwXqunisqR5o150brkmeNjYDpuo2A76o7MYOT92iejiQl+EvfhBxiu7DkSifOqqTE0vFP1OpmbuZ4K/MRQ==";
                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(enk),options).toString(CryptoJS.enc.Utf8);
                                var result =  JSON.parse(decrypted);
                                console.log(result);
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
                                // $('.bt-all-comment').html(data.responseText);
                                // $('#materialPreloader').hide();
                                // $('.bt-make-input').val('');
                            }
                        });
                        // socket.emit('sendimagegroup',param);
                    }
                    // sendReplyImage(data.url,content);
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
		// var el = $("body .bt-input-note").emojioneArea({
		// 	placeholder: "Nhập tin nhắn ... (Bấm Enter để gửi, Shift + Enter để xuống dòng)",
		// 	events: {
		// 		keydown: function (editor, event) {
		// 			if(event.which == 13 && !event.shiftKey){
		// 				alert('aaaaaaa');
		// 				sendReplyJs($('.bt-input-note').val());
		// 				$('.emojionearea.bt-make-input').attr("tabindex",-1).focus();
		// 				$('.bt-make-input .emojionearea-editor').attr("tabindex",-1).focus();
						
		// 				event.preventDefault();
		// 			}
		// 		},
		// 		keyup: function (editor, event) {
		// 			if(event.which == 13 && !event.shiftKey){
		// 				editor.html('');
		// 			}
		// 		},
		// 	}
		// });
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
		$('.bt-input-note').keypress(function(e){
			// alert('aaaaaaa');
			// var csrf_token = $('meta[name="csrf-token"]').attr('content');
			if ($('#bt-id-user-inbox').val() != null) {
				var id_profile = $('#bt-id-user-inbox').val();
			}
			// console.log(id_profile);
			if ($('#bt-id-user').val() != null) {
				var id_profile = $('#bt-id-user').val();
			}
			var content = $(this).val();
			var that = this;

			// console.log(content);
			if(e.which == 13 && !e.shiftKey){
                console.log("aadddNote");
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
							// alertBox('Thêm ghi chú tin nhắn thành công',"success",false,true,true);
							return false;
						},
						error: function( jqXhr, textStatus, errorThrown ){
						},
						complete: function(data, textStatus, jQxhr){
							// $('.bt-all-comment').html(data.responseText);
							// $('#materialPreloader').hide();
							// $('.bt-make-input').val('');
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
		$('.chatzalov2').on('click','.bt-content-chat',function(){
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
                            taghtml += '<li class="updatetag" data-profile="'+id_profile+'" data-user="'+id_hoithoai+'" data-color="'+m.color+'" data-text="'+m.text+'" data-idtag="'+m.id+'" data-group="'+isgroup+'"><a href="#"><span href="#"  style="color:'+m.color+'">'+m.text+'</span><span class="fa fa-check checktag" style="margin-left: 5px;"></span></a></li>';
                            // m.createTime = time;
                        } else {
                            taghtml += '<li class="updatetag" data-profile="'+id_profile+'" data-user="'+id_hoithoai+'" data-color="'+m.color+'" data-text="'+m.text+'" data-idtag="'+m.id+'" data-group="'+isgroup+'"><a href="#"><span href="#"  style="color:'+m.color+';">'+m.text+'</span></a></li>';
                        }
                    }
                });
                if (taghtml == '') {
                    $(this).parents('.chatzalov2').find('.tagbyprofile').html('<li>Không có thẻ tag</li>');
                } else {
                    $(this).parents('.chatzalov2').find('.tagbyprofile').html(taghtml);
                }
                
            }
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
			$(this).parents('.chatzalov2').find('.header-subtitle').html(timelastmess);
			// $('.header-subtitle').html(timelastmess);
			if (hoithoai[id_hoithoai].tinnhans.length > 0) {
				var html = '';
				hoithoai[id_hoithoai].tinnhans.sort(function(a, b){return a.ts - b.ts});
				// console.log(hoithoai[id_hoithoai].tinnhans);
				for (var i = 0; i < hoithoai[id_hoithoai].tinnhans.length; i++) {
					$('#tinnhandangdoc').attr('data-idclid',hoithoai[id_hoithoai].tinnhans[i].cliMsgId);

                    console.log(hoithoai[id_hoithoai].tinnhans[i]);

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
						if( typeof(hoithoai[id_hoithoai].tinnhans[i].noidung.catId) !== 'undefined'){
							if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
								noidung = '<p>'+name+':</p><span class="span-text-img">[Sticker]<span/>';
							} else {
								noidung = '<span class="span-text-img">[Sticker]<span/>';
							}
						} else {
						 	// console.log(hoithoai[id_hoithoai].tinnhans[i].noidung);
						 	if (typeof(hoithoai[id_hoithoai].tinnhans[i].noidung.deleteMsg) !== 'undefined') {
						 		if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 			noidung = '<p>'+hoithoai[id_hoithoai].tinnhans[i].name+':</p><span class="span-text-img">[Sticker]<span/>';
						 		} else {
						 			noidung = '<span class="span-text-img">Đã xóa tin nhắn<span/>';
						 		}
						 		
						 	} else {
						 		// console.log(hoithoai[id_hoithoai].tinnhans[i].msgType);
						 		if (hoithoai[id_hoithoai].tinnhans[i].msgType == 'chat.voice') {
						 			if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 				noidung = '<p>'+hoithoai[id_hoithoai].tinnhans[i].name+':</p><div><audio controls><source src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" type="audio/amr"></audio></div>';
						 			} else {
						 				noidung = '<div><audio controls><source src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" type="audio/amr"></audio></div>';
						 			}
						 		} else {
                                    console.log(hoithoai[id_hoithoai].tinnhans[i].noidung);
						 			var prs = JSON.parse(hoithoai[id_hoithoai].tinnhans[i].noidung.params);
						 			if (pr.thumb != '') {
						 				if (hoithoai[id_hoithoai].tinnhans[i].noidung.title != '') {

                                            if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
                                                noidung = '<p>'+hoithoai[id_hoithoai].tinnhans[i].name+':</p><p>'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</p><img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;"/ onclick="loadimg(this)" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" data-toggle="modal" data-target="#loadimg">';
                                            } else {
                                                noidung = '<p>'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</p><img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;" onclick="loadimg(this)" data-toggle="modal" data-target="#loadimg" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'"/>';
                                            }
						 					
						 				} else {
						 					if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 						noidung = '<p>'+hoithoai[id_hoithoai].tinnhans[i].name+':</p><img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;" onclick="loadimg(this)" data-toggle="modal" data-target="#loadimg" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'"/>';
						 					} else {
                                                if (hoithoai[id_hoithoai].tinnhans[i].noidung.action == 'recommened.link') {
                                                    noidung = '<a href="javascript:void(0)" class="getinfogroupjoin" data-toggle="modal" data-target="#loadinfogroup" data="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'"><img src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;"  data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'"/><p>'+hoithoai[id_hoithoai].tinnhans[i].noidung.description+'</p></a>';
                                                } else {
                                                    noidung = '<img onclick="loadimg(this)" data-toggle="modal" data-target="#loadimg" src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'" style="width: 100%;" data-img="'+hoithoai[id_hoithoai].tinnhans[i].noidung.thumb+'"/>';
                                                }
						 					}

						 				}
						 			} else if (prs.fileExt == 'mp4'){
						 				var size = (prs.fileSize/1024)/1024;

						 				if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 					noidung = '<p>'+hoithoai[id_hoithoai].tinnhans[i].name+':</p><div onclick="loadvideo(this)" data-toggle="modal" data-target="#loadvideo">video: <a src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p>'+ size.toFixed(2)+' MB</p></div>';
						 				} else {
						 					noidung = '<div onclick="loadvideo(this)" data-toggle="modal" data-target="#loadvideo">video: <a src="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p>'+ size.toFixed(2)+' MB</p></div>';
						 				}
						 			} else {
						 				var size = (prs.fileSize/1024)/1024;

						 				if (hoithoai[id_hoithoai].isgroup == 1  && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
						 					noidung = '<p>'+hoithoai[id_hoithoai].tinnhans[i].name+':</p><div><a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" target="_blank">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p>'+size.toFixed(2)+' MB</p></div>';
						 				} else {
						 					noidung = '<div><a href="'+hoithoai[id_hoithoai].tinnhans[i].noidung.href+'" target="_blank">'+hoithoai[id_hoithoai].tinnhans[i].noidung.title+'</a><p>'+size.toFixed(2)+' MB</p></div>';
						 				}
						 			}
						 		}
						 	}
						 }
						} else {
							if (hoithoai[id_hoithoai].isgroup == 1 && hoithoai[id_hoithoai].tinnhans[i].type == 0) {
								noidung = '<p>'+hoithoai[id_hoithoai].tinnhans[i].name+':</p><span class="span-text-img">'+hoithoai[id_hoithoai].tinnhans[i].noidung+'<span/>';
							} else {
								noidung = '<span class="span-text-img">'+hoithoai[id_hoithoai].tinnhans[i].noidung+'<span/>';
							}
						}
						var styleme = '';
						if (hoithoai[id_hoithoai].tinnhans[i].type == 0) {
							display = '';
							if (hoithoai[id_hoithoai].isgroup == 1) {
								img = '//s120.avatar.talk.zdn.vn/default';
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
						html += '<div class="" style="display: flex; width: 100%;'+styleme+'">';
						html += '<div class="card  pin-react  last-msg card--text '+display+'">';
						html += '<div><span><span class="text">'+noidung+'</span></span></div>';
						html += ' <div class="card-send-time '+display+'"><span class="card-send-time__sendTime">'+hoithoai[id_hoithoai].tinnhans[i].datetime+'</span></div>';
						html += '</div></div></div></div></div>';
					}
				}
				if (html != '') {
					
					$('.bt-load-inbox-content-'+id_hoithoai).html(html);
					$('.bt-load-inbox-content-'+id_hoithoai).scrollTop(15000);
					$(this).parents('.chatzalov2').find('#messageViewScroll').html(html);
					// $('#messageViewScroll').html(html);
					$(this).parents('.chatzalov2').find('.scrollcontentzalo').scrollTop($(this).parents('.chatzalov2').find('#messageViewScroll').height()+1000);

					console.log($('#messageViewScroll').height());
					console.log($('#messageViewScroll')[0].clientHeight);
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

				// if (html != '') {
				// 	$('.bt-default-mess').hide();
				// 	$('.bt-chat-mess').show();
				// 	$('.messageViewScroll').html(html);
				// 	$('.messageViewScroll').scrollTop($('.messageViewScroll')[0].scrollHeight - $('.messageViewScroll')[0].clientHeight);

				// 	$('.bt-load-inbox-content-'+id_hoithoai).html(html);
				// 	if ($('.indexdragdropchat').hasClass('.bt-load-inbox-content-'+id_hoithoai)) {
				// 		$('.bt-load-inbox-content-'+id_hoithoai).scrollTop($('.bt-load-inbox-content-'+id_hoithoai)[0].scrollHeight - $('.bt-load-inbox-content-'+id_hoithoai)[0].clientHeight);
				// 	}
				// 	var idto = $('#tinnhandangdoc').attr('data-idhoithoai');
				// 	var cookie = $('.profile_'+id_profile).attr('data-cookie');
				// 	var enk = $('.profile_'+id_profile).attr('data-env');
				// 	var url_chat = $('.profile_'+id_profile).attr('url-chat');
				// 	var id_client = $('#tinnhandangdoc').attr('data-idclid');
				// 	var param = '{"idto":"'+idto+'","cookie":"'+cookie+'","serectkey":"'+enk+'","id_profile":"'+id_profile+'","url_chat":"'+url_chat+'","id_client":"'+id_client+'"}';
				// 	socket.emit('seenmess',param);
				// 	$('.on_'+idto+' .tinnhanmoi').remove();


				// 	var img_node = $('.parent_'+id_hoithoai+ ' .bt-avatar-user-chat').html();
				// 	var nome_node = $('.parent_'+id_hoithoai+ ' .bt-name-chat').html();
				// 	$('.bt-info-basic .bt-avatar-user').html('');
				// 	$('.bt-info-basic .bt-name-user .bt-first').html(nome_node);
				// 	$('.bt-info-basic .bt-name-user .bt-last').html(id_hoithoai);
				// 	// console.log(img_node);
				// }
			});


socket.on('returnmess', function(data){
			// playaudio();
			// if ($('.bt-all-comment').html() == '') {
			// 	$('.bt-loader').show();
			// } else {
			// 	$('.bt-loader').hide();
			// }
			console.log(data);

			if($('.ReactVirtualized__Grid__innerScrollContainer').html().length > 0){
				$('.bt-loader').hide();
			}
			if (data.more == 1 ) {

				$('.activetong').show();
				// if (data.groupMsgs.length > 0) {
				// 	$('.bt-loader').hide();
				// }
				// if (data.msgs.length  > 0) {
				// 	$('.bt-loader').hide();
				// }
			}
			if (data.more == 0 ) {
				// $('.bt-loader').hide();
				// localStorage.setItem("cuoctrotruyen", JSON.stringify($.extend(hoithoai,hoithoaigroup)));
				// $('.checkallprofile:checked').each(function(i,value){

				// 	var data = '{"cookie":"'+$(this).attr('data-cookie')+'","serectkey":"'+$(this).attr('data-env')+'","urlchat":"'+$(this).attr('url-chat')+'","id_profile":"'+$(this).val()+'"}';
				// 	setTimeout(function(){
				// 		socket.emit('messprofile',data);
				// 		socket.emit('getfriendnew',data);
				
				// 	},i*2000);
				// });
				//console.log(data.groupMsgs.length);
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
								// console.log('aaaa');
								playaudio();
							}
						}
						// console.log(data.msgs[0].idTo);
						// console.log(usechat);
						// if (data.msgs[0].idTo  != usechat) {
						// 	console.log('aaaa');
						// 	playaudio();
						// }
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

							//hoithoaigroup[data.groupMsgs[i].idTo].tinnhans = [];
							var tinnhangroup = {};
							tinnhangroup.actionId  = data.groupMsgs[i].actionId;
							tinnhangroup.cliMsgId = data.groupMsgs[i].cliMsgId;
							tinnhangroup.msgId = data.groupMsgs[i].msgId;
							tinnhangroup.msgType = data.groupMsgs[i].msgType;
							tinnhangroup.id_profile = data.id_profile;
							tinnhangroup.name = data.groupMsgs[i].dName;
							tinnhangroup.ts = data.groupMsgs[i].ts;
							tinnhangroup.isgroup = 1;
							if (data.groupMsgs[i].dName == $('.profile_'+data.id_profile).attr('data-name')) {
								tinnhangroup.type = '1';
							} else {
								tinnhangroup.type = '0';
							}
							tinnhangroup.datetime = formattedTime;
							tinnhangroup.noidung  = data.groupMsgs[i].content;
							//console.log(tinnhangroup);
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
							if (data.groupMsgs[i].dName == $('.profile_'+data.id_profile).attr('data-name')) {
								tinnhangroup.type = '1';
							} else {
								tinnhangroup.type = '0';
							}
							tinnhangroup.noidung  = data.groupMsgs[i].content;
							//console.log(tinnhangroup);
							hoithoaigroup[data.groupMsgs[i].idTo].tinnhans.push(tinnhangroup);
						}
					}

				}
				if(data.msgs.length >0 ){
					
					for (var i = data.msgs.length - 1; i >= 0; i--) {
						
						if(data.msgs[i].uidFrom != "0") {
							// getinfo(data.msgs[i].uidFrom,data.id_profile);
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
								hoithoai[data.msgs[i].uidFrom].tinnhans.push(tinnhan);
							}
							
						}else {
							// getinfo(data.msgs[i].idTo,data.id_profile);
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
			});

var groupmess = [];
socket.on('returngroupmess',  function(data){
	// console.log(data);
	if (data.groups.length > 0) {
		for (var i = 0; i < data.groups.length; i++) {
			groupmess.push(data.groups[i]);
		}
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
	if (data.error_code == 0) {
		alertBox('Gửi tin nhắn thành công',"success",false,true,true);
		return false;
	} else {
		alertBox('Gửi tin nhắn thất bại',"danger",false,true,true);
		return false;
	}
});

var tagzalo = {};
var versiontag = {};
var tagphanloai = [];

socket.on('returngettag',  function(data){
	// console.log(data);
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
// var cc = [];
var data_info = [];
socket.on('returninfoprofile',  function(data){

	if (data.error_code == 0) {
		var array_avatar = data.data.changed_profiles;
		$.each(hoithoai, function(i, el){
			$.each(array_avatar, function(j, m){
				if (i == m.userId) {
					// console.log('aaaa');
					hoithoai[i].avatar = array_avatar[i].avatar;
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
	localStorage.setItem("listfriend", JSON.stringify(listfriend));
	// console.log(listfriend);
	// console.log('aaaa');
} );	
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
	console.log(id_profile);
	var cookie = $('.profile_'+id_profile).attr('data-cookie');
	var enk = $('.profile_'+id_profile).attr('data-env');
	var user = [];

	var iduser = id_user+'_0';
	// user.push(iduser);

	var data = '{"cookie":"'+cookie+'","serectkey":"'+enk+'","urlchat":"aaaa","id_profile":"'+id_profile+'","user_atr":'+JSON.stringify(id_user)+'}';
	 console.log(data);
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
			//console.log(m.tinnhans);
			for (var j = 0; j < m.tinnhans.length; j++) {
				chuadoc++;
				for (var a = 0; a < uniqueNames.length; a++) {
					zxc = 0;
					// console.log(m.tinnhans[j].actionId);
					// console.log(tinnhanchuadoc[a]);
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
		// console.log(ab);
	});


	// var uniqueNames = [];
	// $.each(tinnhanchuadoc, function(i, el){
	//     if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
	// });

	
	$.each(hoithoaigroup, function(i,m){
		var chuadoc = 0;
		var zxc;
		m.tinnhans = getUnique(m.tinnhans,'msgId');
		m.tinnhans.sort(function(a, b){return b.ts - a.ts});

		for (var j = 0; j < m.tinnhans.length; j++) {
			chuadoc++;
			for (var a = 0; a < uniqueNames.length; a++) {
				zxc = 0;
				// console.log(m.tinnhans[j].actionId);
				// console.log(tinnhanchuadoc[a]);
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
		
		// console.log(ab);
	});
	// console.log(hoithoaigroup);
	// return false;

	if (groupmess.length >0) {
		
		$.each(hoithoaigroup,function(i,m){
			$.each(groupmess,function(j,v){
				if (i == v.groupId) {

					hoithoaigroup[i].name_group = v.name;
					hoithoaigroup[i].nember = v.topMember;
					// for (var i = 0; i < topMember.length; i++) {
					// 	for (var i = 0; i < Things.length; i++) {
					// 		Things[i]
					// 	}
					// }
					hoithoaigroup[i].totalMember = v.totalMember;
				} else {
					
				}

			});
			
		});
	}
	// var hoithoainew = $.map(hoithoai, function(value, index) {
	//     return [value];
	// });
	var totalhoithoai = $.extend(hoithoai,hoithoaigroup);
    
	localStorage.setItem("cuoctrotruyen", JSON.stringify(totalhoithoai));
	// console.log(hoithoaigroup);
	// console.log(totalhoithoai);
	// return false;

	// console.log(array_avatar);
	


	// $.each(totalhoithoai,function(i,m){
	// 	$.each(array_avatar,function(k,l){
	// 		// console.log(k);
	// 		if (i == k) {
	// 			totalhoithoai[i].avatar = array_avatar[i].info[0].avatar;
	// 			totalhoithoai[i].gender = array_avatar[i].info[0].gender;
	// 			totalhoithoai[i].phoneNumber = array_avatar[i].info[0].phoneNumber;
	// 			totalhoithoai[i].ngaysinh = array_avatar[i].info[0].ngaysinh;
	// 		}
	// 	});
	// })
	// $.each(array_avatar,function(k,l){
	// 	console.log(l.info);
	// });
	// console.log(hoithoai);
	// console.log(totalhoithoai);
	
	// return false;
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
		$('.tabzalo_'+m.tinnhans[0].id_profile+' .ReactVirtualized__Grid__innerScrollContainer').html('');
		lastmess.push(boxchat);
	});

	
	
	// return false;
	lastmess.sort(function(a, b){return b.ts - a.ts});
	localStorage.setItem("tinnhan", JSON.stringify(lastmess));
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
    console.log(lastmess);
	$.each(lastmess, function(i,m){
		var htmltab = '';
		var noidung = '';
		var classchuadoc = '';
		var htmltinnhan = '';
		var classboldchuadoc = '';
		var htmltinnhanchuadoc = '';

		 
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
		var name_profile = $('.profile_'+m.id_profile).attr('data-name');

		var tinnhandangdoc = '';
		if ($('#tinnhandangdoc').attr('data-idhoithoai') == m.idhoithoai && $('#tinnhandangdoc').attr('data-idprofile') == m.id_profile) {
			tinnhandangdoc = 'selected';
		}

		html += '<div onmousedown="mouseDown(this,event)" class="msg-item bt-load-chat '+classchuadoc+' parent_'+m.idhoithoai+'" style="height: 74px; left: 0px;  width: 100%;">';
		html += '<div draggable="false" class="item rel bt-content-chat on_'+m.idhoithoai+'  '+tinnhandangdoc+'"  data-hoithoai="'+m.idhoithoai+'" data-profile="'+m.id_profile+'" data-group="'+m.isgroup+'" data-img='+m.avatar+'><div class="avatarzalo" style="position: relative;">';
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
		html += '<div class="item-title-name truncate  '+classboldchuadoc+' ">'+m.namechat+'</div>';
		html += '<div class="item-timestamp"> <span>'+m.datetime+'</span></div>';

		html += '</div><div style="display: flex; flex-grow: 1; align-items: center;">';
		html += '<div class="item-message truncate unread" style="display: flex; color: rgb(122, 134, 154); line-height: 20px;">';
		html += '<div class="conv-last-msg"><div style="overflow: hidden; text-overflow: ellipsis; line-height: 20px;"><span>'+noidung+'</span></div>';
		html += '</div><div class="item-action">';

		html += '<div>'+htmltinnhan+'</div>';
		html += '<div class="item-action__menu "><i class="fa fa-tab-icon-more func-setting__icon"></i></div>';
		html += '</div></div></div><div class="conv-filter" style="flex-grow: 1;"><div style="float:right;"><img src="'+image_profile+'" style="width: 20px;height: 20px; border-radius: 50%;"/><span style=" color: #4c9aff;">'+name_profile+'</span></div></div></div></div></div>';



		htmltab += '<div onmousedown="mouseDown(this,event)" class="msg-item bt-load-chat '+classchuadoc+' parent_'+m.idhoithoai+'" style="height: 74px; left: 0px;  width: 100%;">';
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
		htmltab += '<div class="item-title-name truncate  '+classboldchuadoc+' ">'+m.namechat+'</div>';
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
console.log('xuat hkjdfhshkdfhsdkjf');
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
	sendReplyJs(content_c);
    savemess(1);
	$(this).parents('.chatzalov2').find('.bt-input-note').val('');
	return false;
	
});
$('body').on('keyup','.bt-input-note',function(event){

	if (event.which == 13) {

        savemess(1);
		var content_c = $(this).parents('.chatzalov2').find('.bt-input-note').val();
		sendReplyJs(content_c);
		$(this).parents('.chatzalov2').find('.bt-input-note').val('');
		return false;
	}
});
$('.btn-save-pageprofile').on('click',function(){
			// $('#chontaikhoan').hide();
			// gettag();
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

				check_page = 1;
				profilecheck.push($(this).val());
				html += $(this).attr('data-name')+',';
				var data = '{"cookie":"'+$(this).attr('data-cookie')+'","serectkey":"'+$(this).attr('data-env')+'","urlchat":"'+$(this).attr('url-chat')+'","id_profile":"'+$(this).val()+'"}';
				console.log(data);
				setTimeout(function(){
					socket.emit('messprofile',data);
					socket.emit('getfriendnew',data);
					socket.emit('gettag',data);
				},i*2000);
				var id_profile = $(this).val();
				$('.nav-tabs').append('<li class="nav-item" onclick="activetab(this,\'#menu'+i+'\')"><a class="nav-link newmes_'+$(this).val()+'" href="#menu'+i+'" style="float: left;">'+$(this).attr('data-name')+'<div style="width: fit-content;background: red;border-radius: 50%;float: right;margin-top: -5px;"><span style="color: white;padding: 7px;" class="loadtinnhanmoi homenewmess countmess_'+$(this).val()+'" data-tinnhan="0"></span></div></li>');
				$('.tab-content').removeClass('mb-1');
				$('.tab-content').append('<div id="menu'+i+'" class="container tab-pane fade tabzalo_'+$(this).val()+'"></div>');
				$('#menu'+i+'').html($('#home').html());
				// $('.tab-content').addClass('mb-3');
				// var el = $(".tabzalo_"+$(this).val()+" .bt-input-note").emojioneArea({
				// 	placeholder: "Nhập tin nhắn ... (Bấm Enter để gửi, Shift + Enter để xuống dòng)",
				// 	events: {
				// 		keydown: function (editor, event) {
				// 			if(event.which == 13 && !event.shiftKey){
				// 				var content_chat = $('.tabzalo_'+id_profile+' .bt-input-note').val()
				// 				sendReplyJs(content_chat);
				// 				$('.tabzalo_'+id_profile+' .emojionearea.bt-make-input').attr("tabindex",-1).focus();
				// 				$('.tabzalo_'+id_profile+' .bt-make-input .emojionearea-editor').attr("tabindex",-1).focus();
								
				// 				event.preventDefault();
				// 			}
				// 		},
				// 		keyup: function (editor, event) {
				// 			if(event.which == 13 && !event.shiftKey){
				// 				editor.html('');
				// 			}
				// 		},
				// 	}
				// });
				// var el1 = $("#home .bt-input-note").emojioneArea({
				// 	placeholder: "Nhập tin nhắn ... (Bấm Enter để gửi, Shift + Enter để xuống dòng)",
				// 	events: {
				// 		keydown: function (editor, event) {
				// 			if(event.which == 13 && !event.shiftKey){
				// 				sendReplyJs($('#home .bt-input-note').val());
				// 				$('#home .emojionearea.bt-make-input').attr("tabindex",-1).focus();
				// 				$('#home .bt-make-input .emojionearea-editor').attr("tabindex",-1).focus();
								
				// 				event.preventDefault();
				// 			}
				// 		},
				// 		keyup: function (editor, event) {
				// 			if(event.which == 13 && !event.shiftKey){
				// 				editor.html('');
				// 			}
				// 		},
				// 	}
				// });
			});

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
		console.log("mouse sdfhksdjf");
		console.log(event.which);
		 if(event.which == 3)
	      {		$('#questionMarkId').show();
	      		var tagzalo = JSON.parse(localStorage.getItem("tagzalo"));
	      		var id_profile = $(el).find('.bt-content-chat').attr('data-profile');
	      		var id_hoithoai = $(el).find('.bt-content-chat').attr('data-hoithoai');
	      		var isgroup = $(el).find('.bt-content-chat').attr('data-group');
	      		$('#questionMarkId').css({'top':event.pageY+5,'left':event.pageX, 'position':'absolute'});
	      		var taghtml = '';
                if (typeof(tagzalo[id_profile]) != 'undefined') {
                    console.log(tagzalo[id_profile]);
                    $.each(tagzalo[id_profile], function(i,m){
                        if (typeof(m.text) != 'undefined') {
                             taghtml += '<li class="updatetagall" data-profile="'+id_profile+'" data-user="'+id_hoithoai+'" data-color="'+m.color+'" data-text="'+m.text+'" data-idtag="'+m.id+'" data-group="'+isgroup+'"><a href="#"><span href="#"  style="color:'+m.color+';">'+m.text+'</span></a></li>';
                        }
                    });
                    if (taghtml == '') {
                        $('.tagbyprofileall').html('<li>Không có thẻ tag</li>');  
                    } else {
                        $('.tagbyprofileall').html(taghtml);
                    }
                    
                }
	      }
	}
	
	function searchfriend(ob) {
		var value = $(ob).val().toLowerCase();
		$(".listfriendbyid>.bt-item-fp").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
		});
	}

    function searchnember(ob) {
        var value = $(ob).val().toLowerCase();
        $(".listfriendjoingroup>.bt-item-fp").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    }
	function searchInboxComment(ob) {

		var value = $(ob).val().toLowerCase();
		var el = $(ob).parents('.tab-pane');
		$(el).find('.fake-textholder').html('');
		if (value == '') {
			$(el).find(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat").each(function() {
				$(this).css('display', 'block');
			});
			$(el).find('.fake-textholder').html('Tìm kiếm tin nhắn theo nội dung');
		} else {
			$(el).find(".ReactVirtualized__Grid__innerScrollContainer >.bt-load-chat").css('display', 'none');
			// $('.bt-make-click-ft').click();
			$(el).find(".ReactVirtualized__Grid__innerScrollContainer>.bt-load-chat .conv-last-msg div span").filter(function() {
				if (String($(this).html()).indexOf(value) > -1) {
					$(this).closest('.bt-load-chat').css('display', 'block');
				}
			});
		}
		// $(el).find(".ReactVirtualized__Grid .bt-load-chat .conv-last-msg div span").filter(function() {
		// 	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
		// });
	}
	function activetab(el,id){
		// var id = $(this).attr('href');
		$('.nav-item').removeClass('active');
		$(el).addClass('active');
		$('.tab-pane').removeClass('active');
		$('.tab-pane').addClass('fade');
		$(''+id+'').removeClass('fade');
		$(''+id+'').addClass('active');
	}
	function closePopup(id_user){
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

        var params = {};
        params['id_khach'] = id_khach;
        params['type'] = 1;
        params['id_profile'] = id_profile;
        params['is_group'] = is_group;
        params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
        $.ajax({
            url: '{{ url("chatprofile/home/savemess") }}',
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
        params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
        $.ajax({
            url: '{{ url("chatprofile/home/savemess") }}',
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
            var param = '{"photoId":"'+photoId+'","clientId":'+time+',"desc":"'+desc+'","width":'+width+',"height":'+height+',"rotation":0,"flip":false,"toid":"'+toid+'","rawUrl":"'+rawUrl+'","thumbUrl":"'+thumbUrl+'","normalUrl":"'+normalUrl+'","hdUrl":"'+hdUrl+'","zsource":301}';

            var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
            var params = {};
            params['encrypted'] = encrypted;
            params['cookie'] = cookie;
            params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
            $.ajax({
                url: '{{ url("chatprofile/home/postimagezalo") }}',
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
    //send file zalo
        function sendfile(fileId,desc,toid,cookie,serectkey,id_profile,){
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
		//var socket = io("https://sv1.phanmemninja.com",{'forceNew':true });
		socket.on("reconnect", function(data) {
			checkreconnect = 1;
			// $( ".btn-save-pageprofile" ).trigger( "click" );
		});

		socket.on( 'connect', function () {
			console.log( 'connected to server' );
		} );

		socket.on( 'disconnect', function () {
			socket.emit('join', 'aaaaaaaa');
			console.log( 'disconnected to server' );
		} );
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
		socket.on("new message", function(data) {

			var da = JSON.parse(data);
			//console.log(da);
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
							params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
							$.ajax({
								url: '{{ url("comment/home/ajaxloadinboxbyid") }}',
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
	      				// $('.'+classpage).html('aaaaaaaaaaaaaaaaaaaaaaaaa');
	      				// $('.'+classpage1).html('aaaaaaaaaaaaaaaaaaaaaaaaa');
	      			}
	      		}
	      	});


});
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

        $.ajax({
           url:'{{url('home/updateAccount') }}',
            dataType: 'json',
            type: 'GET',
            contentType: 'application/x-www-form-urlencoded',
            data:{username:username,id_zalo:id_zalo,cate_id:cate_id},
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
				loginstep3(emeil,data.data.zpw_sek,"#addNewFbAccount");
			},
			error: function( jqXhr, textStatus, errorThrown ){
			},
			complete: function() {
			}
		});
	}

		function loginstep3(emeil,cookie,model){
			//console.log(emeil);
			//console.log(model);
		$.ajax({
		url: '{{ url("home/getCookie") }}',
		dataType: 'json',
		type: 'get',
		contentType: 'application/x-www-form-urlencoded',
		data: {
			emei: emeil,
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


//chat bot
function getaddchatbot(){
	            var groups = []; // List of selected groups
		  		var params = {};
		  		let keywordclient  = $('#modal_chatbot input[name="keywordclient"]').val();
		  		let keywordoa  = $('#modal_chatbot input[name="keywordoa"]').val();
                let id_offci = $('#modal_chatbot select[name="id_offci"]').val();
		  		if(keywordclient == ''){
					alertBox('Từ khóa người dùng nhắn tin không được trống',"f44336",false,true,true);
					return false;
				}else if(keywordoa == ''){
					alertBox('Mẫu trả lời không được trống',"f44336",false,true,true);
					return false;
				}else if(id_offci == ''){
					alertBox('Vui lòng chọn tài khoản',"f44336",false,true,true);
					return false;
				}

				// groups.push($('#id_offci').val());
				
				params['keywordclient'] = keywordclient;
				params['keywordoa'] = keywordoa;
				params['id_chatbot'] = id_offci;
				params['addnew'] = '1';
				params['id_oa'] = JSON.stringify(groups);
				params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
				
			$.ajax({
				url: '{{ url('chatbot/add') }}',
				dataType: 'json',
				type: 'get',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data){
					//console.log();
					alertBox(data.message,"success",false,true,true);
					//location.reload();
					return false;
				}
				// error: function( jqXhr, textStatus, errorThrown ){ 
				// },
				// complete: function(){
					
				// 	alertBox('Lưu thành công chatbot',"success",false,true,true);
				// 	//location.reload();
				// 	// location.reload();
				// }
			});
 }

function getChaBotById(){
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

function changeChatbot(model){
    let id = $(model).data('id');
    $('#modal_chatbot_edit').modal('show');
    if(id){
        $.ajax({
            url:"{{ url('chatbot/getInfoChatbotAjax') }}",
            type:"GET",
            data:{id:id},
            success:function(result){

                if(result.status == 200){
                   $('#modal_chatbot_edit input[name="keywordclient"]').val(result.data.keyword);
                   $('#modal_chatbot_edit input[name="keywordoa"]').val(result.data.reply);
                   $('#modal_chatbot_edit input[name="zalo_id"]').val(result.data.id);

                }
            }
        });
    }
}

function getUpdateChatbot(){
        let keywordclient   = $('#modal_chatbot_edit input[name="keywordclient"]').val();
        let keywordoa = $('#modal_chatbot_edit input[name="keywordoa"]').val();
        let id_offci = $('#modal_chatbot_edit select[name="id_offci"]').val();
        let id = $('#modal_chatbot_edit input[name="zalo_id"]').val();
        if(keywordclient == ''){
					alertBox('Từ khóa người dùng nhắn tin không được trống',"f44336",false,true,true);
					return false;
				}else if(keywordoa == ''){
					alertBox('Mẫu trả lời không được trống',"f44336",false,true,true);
					return false;
				}else if(id_offci == ''){
					alertBox('Vui lòng chọn tài khoản',"f44336",false,true,true);
					return false;
				}

        $.ajax({
           url:'{{url('chatbot/updateChatbot') }}',
            dataType: 'json',
            type: 'GET',
            contentType: 'application/x-www-form-urlencoded',
            data:{keywordclient:keywordclient,keywordoa:keywordoa,id_offci:id_offci,id:id},
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
//end chatbot
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //--------------------------------------phần đăng bài -----------------------------------------------------
 $(document).ready(function() {
    $("#postForm #post").click(function(){
			$("#postForm .messageBox").removeClass("error");
			$("#postForm .messageBox").html("");
			var a =$.trim($("#postForm #message").val());
			console.log(a);
			if($("#postForm #postType").val() == "message" && $.trim($("#postForm #message").val()) == ""){
                $('#tabStatus .alert_content').show();	
			}else if($("#postForm #postType").val() == "link" && $.trim($("#postForm #link").val()) == ""){
				alertBox('POST_EMPTY',"danger","#postForm .messageBox",true);	
			}else if($("#postForm #postType").val() == "image" && $.trim($("#postForm #imageURL_0").val()) == ""){
				if ($(".tieude").val() == "") {
					alertBox('Tiêu đề không được trống',"danger","#postForm .messageBox",true);
					return false;
				}
				if ($(".mieuta").val() == "") {
					alertBox('Miêu tả không được trống',"danger","#postForm .messageBox",true);
					return false;
				}
				alertBox('POST_EMPTY',"danger","#postForm .messageBox",true);	
			}else if($("#postForm #postType").val() == "video"){
				if ($(".tieude").val() == "") {
					alertBox('Tiêu đề không được trống',"danger","#postForm .messageBox",true);
					return false;
				}
				if ($(".mieuta").val() == "") {
					alertBox('Miêu tả không được trống',"danger","#postForm .messageBox",true);
					return false;
				}
				post();
			}else{
				post();
			}
		});

 });

 function post(){
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
			alertBox('POSTING_WAIT',"info","#postForm .messageBox",true);	
			// Set the left time
			// var duree = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval) * (countGroup-1);
			// TOTALPOSTINGTIME = duree*1000;
	
			//$(".totalPostTime").html("&sim; "+Math.round(((parseInt($("#postForm #defTime").val())+randomInterval)* (countGroup-1))/60).toFixed(2)+" "+'{ l('MINUTES') }}');	
			
			//startTimer();
			send();
			//postingInterval = setTimeout(posting,timeDeff);
			
		}else{
			alertBox('Vui lòng chọn nhóm để đăng bài!!',"f44336",false,true,true);	
		}
		
	}

		function send(){
		var unexpectedPostingError = true;
		var currentGroup = groups[nextGroup];
		POST_IN_PROGRESS = true;
		// update the left time
		//var duree = random(parseInt($("#postForm #defTime").val()),parseInt($("#postForm #defTime").val())+randomInterval) * (countGroup-nextGroup);
		//TOTALPOSTINGTIME = duree*1000;
		// Clear errors
		$('.postingStatusErrors').html("");
		if(!$('#selectgroup_' + currentGroup).is(":checked")) return false;
		// Get post data
		var params = {};
		params["tieude"] = $(".tieude").val();
		params["tacgia"] = $(".tacgia").val();
		params["mieuta"] = $(".mieuta").val();
		params["groupID"] = currentGroup;
		params["postType"] = $("#postForm #postType").val();
		params["csrf_kingposter"] = getCookie('csrf_kingposter_cookie');
		if($.trim($("#postForm #message").val()) != ""){
			params["message"] = $("#postForm #message").val();
		}
		//params['fb_preset_id'] =  $("#postForm #fb_preset_id").val();

		// {% for i in 0..max_num_img_post %}
		//     params["image_{i}}"] = $("#postForm #imageURL_{i}}").val();
		// {% endfor %}
		//params['allow_spherical_photo'] = $('#enable360Image', "#postForm").is(":checked") ? 1 : 0;

		// if($("#postForm #postType").val() == "video"){
		// 	if($.trim($("#postForm #video").val()) != ""){
		// 		params["video"] = $("#postForm #video").val();
		// 	}
		// 	if($.trim($("#postForm #video-description").val()) != ""){
		// 		params["description_video"] = $("#postForm #video-description").val();
		// 	}
		// }

		//params['itemprice'] = $("#postForm #itemprice").val();
		//params['itemname'] = $("#postForm #itemname").val();
		
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
			//kp_preloader("on");
			$(".postStatus_"+currentGroup).html("<span class='badge'>Đang đăng bài...<span>");
			$.ajax({
		        url: '{{ url("posts/getPostProfile")}}',
		        dataType: 'json',
		        type: 'get',
		        contentType: 'application/x-www-form-urlencoded',
		        data: params,
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
						$(".postStatus_"+currentGroup).html("<i class='fa fa-info-circle' aria-hidden='true'></i> "+htmlData);
					}
		        },
		        error: function( jqXhr, textStatus, errorThrown ){
		   //      	$('#'+currentGroup).removeClass('postingSuccess');
					// $('#'+currentGroup).addClass('postingError');
					// $(".postStatus_"+currentGroup).html("<i class='fa fa-info-circle' aria-hidden='true'></i> "+textStatus+" : "+errorThrown);
					 $(".postStatus_"+currentGroup).html("<i class='fa fa-info-circle' aria-hidden='true'></i> Tài khoản bạn đã đăng quá giới hạn 1 ngày!!");
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
    let type = "status";
    let validate = validateFormStatus(tab,post_title,message,cateId);
    if(validate == true){
    	$.ajax({
            url: '{{ url('posts/addNewPost') }}',
            type: 'get',
            dataType: 'json',
            data: {message:message,post_title:post_title,cate_id:cateId,type:type},
           
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,"6bbd6e",false,true,true);
                   setTimeout(function(){
                        window.location.reload();
                     }, 1500)
                     
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
    let validate = validateFormLink(tab,post_title,message,link,cateId);
    if(validate == true){
    	if(LinkIsValid(link)){

    	 $.ajax({
            url: '{{ url('posts/addNewPost') }}',
            type: 'get',
            dataType: 'json',
            data: {message:message,link:link,post_title:post_title,cate_id:cateId,type:type},
           
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,"6bbd6e",false,true,true);
                   setTimeout(function(){
                        window.location.reload();
                     }, 1500)
                     
                }
            },
        });
      }else{
				alertBox("Link không đúng định dạng!","f44336",false,true,true);

			}
    }
   
    
       

}
function savePostImage(tab)
{
    let message = $(tab+' textarea[name="message"]').val();
    let cateId  = $(tab+ ' select[name="cate_id"]').val();
    let imageURL  = $(tab+ ' input[name="img"]').val();
    let post_title  = $(tab+ ' input[name="title"]').val();
    let type = "image";
    if(message == ''){
    	alertBox('Nội dung không được để trống!',"f44336",false,true,true);

    }else if(imageURL == ''){
    	alertBox('image không được để trống!',"f44336",false,true,true);

    }else if(cateId == ''){
    	alertBox('Vui lòng chọn danh mục bài viết !',"f44336",false,true,true);
    }else {

    	 $.ajax({
            url: '{{ url('posts/addNewPost') }}',
            type: 'get',
            dataType: 'json',
            data: {message:message,imageURL:imageURL,post_title:post_title,cate_id:cateId,type:type},
           
            success:function(result){
                if(result.status == true){
                    alertBox(result.message,"6bbd6e",false,true,true);
                   setTimeout(function(){
                        window.location.reload();
                     }, 1500)
                     
                }
            },
        });
    }
       

}
// end post image




function changeVideo(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
			            //console.log(e.target.result);
			            $('.previewVideoType').html('<video width="320" height="240" controls><source src="'+e.target.result+'" type="video/mp4"></video>');
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar3').click(function(){
		        $('#img3').click();
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

	function getMediaLib(){
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
				sendReplyImage(data.url);
				$('#mediaLibModalImage').modal('hide');
			}
		}).elfinder('instance');
}



   </script>
</body>
</html>
