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

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-light">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center" style="background-color: #4267b2">
			<div class="navbar-brand navbar-brand-md">
				{{-- <a href="index.html" class="d-inline-block">
					<img src="https://zalo.phanmemninja.com/theme/default/images/kp_logo.png?v=kp20180403.png" alt="" style="width: 204px;
    height: 103px;">
				</a> --}}
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
						<img src="https://graph.facebook.com/100045229119027/picture?redirect=1&amp;height=150&amp;width=150&amp;type=normal" class="rounded-circle" alt="">
						<span>{{Auth::user()->email}}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><img src="https://graph.facebook.com/100045229119027/picture?redirect=1&amp;height=150&amp;width=150&amp;type=normal" class="rounded-circle" width="20px" height="20px" alt=""> Ho??ng Ng???c H??</a>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> C???u h??nh</a>
						<a href="{{asset('logout')}}" class="dropdown-item"><i class="icon-switch2"></i> ????ng xu???t</a>
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
						
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-cog"></i><span>C???u h??nh</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="{{ asset('home') }}" class="nav-link"><i class="fa fa-calendar"></i><span>T??i kho???n zalo</span></a></li>
								
								<li class="nav-item"><a href="{{ asset('danhmuc') }}" class="nav-link"><i class="fa fa-calendar"></i><span>Danh m???c t??i kho???n</span></a></li>
								
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Qu???n l?? b??i vi???t</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh s??ch b??i vi???t</span></a></li>
								
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-calendar"></i><span>Qu???n l?? danh m???c b??i vi???t</span></a></li>
								
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-paper-plane" aria-hidden="true"></i> <span>????ng b??i profile</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>????ng b??i profile</span></a></li>
								
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh s??ch l???ch ????ng</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>L???ch s??? ????ng b??i</span></a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-comment-o" aria-hidden="true"></i> <span>????ng b??i OA</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>????ng ngay</span></a></li>
								
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>Danh s??ch l???ch ????ng</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>L???ch s??? ????ng b??i</span></a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>K???t b???n</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>K???t b???n theo s??? ??i???n tho???i</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>?????t l???ch k???t b???n</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>L???ch s??? k???t b???n</span></a></li>
								
							</ul>
						</li>
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Qu???n l?? nu??i nh??m</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Tham gia nh??m</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i>T??m ki???m & tham gia nh??m</a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i>---L???p l???ch tham gia nh??m</a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>---L???ch s??? tham gia nh??m</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>????ng b??i theo nh??m</span></a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>T????ng t??c nh??m</span></a></li>
								
							</ul>
						</li>
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Ti???n t??ch</div> <i class="icon-menu" title="Layout options"></i></li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-users" aria-hidden="true"></i> <span>Qu???n l?? b??n h??ng</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Content styling">
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i>T??m ki???m & tham gia nh??m</a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i>L???p l???ch tham gia nh??m</a></li>
								<li class="nav-item"><a href="content_page_header.html" class="nav-link"><i class="fa fa-clipboard  "></i><span>L???ch s??? tham gia nh??m</span></a></li>
								
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>????n h??ng</span></a>
							
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa fa-comment-o" aria-hidden="true"></i> <span>Chatbot</span></a>
							
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Chi???n d???ch</span></a>
							
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="fa fa-shopping-bag" aria-hidden="true"></i> <span>Shop zalo</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Page layouts">
								<li class="nav-item"><a href="layout_fixed_navbar.html" class="nav-link">S???n ph???m</a></li>
								<li class="nav-item"><a href="layout_fixed_sidebar_custom.html" class="nav-link">Danh m???c</a></li>
								<li class="nav-item"><a href="layout_fixed_sidebar_native.html" class="nav-link">Thu???c t??nh</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa fa-user-plus"></i> <span>Th??m qu???n l?? nh??n vi??n</span></a>
							
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa fa-bar-chart"></i> <span>Th???ng k??</span></a>
							
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
						&copy; 2019 - 2020. <a href="#">Ninjateam</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Ph???n m???m ninja</a>
					</span>

					
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
