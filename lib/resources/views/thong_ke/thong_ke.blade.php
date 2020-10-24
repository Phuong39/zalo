@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
				@include('errors.note')
        <!-- Form inputs -->
                <!-- Page header -->
                 <div class="card-header header-elements-sm-inline">
								<h6 class="card-title"><i class="fa fa-bar-chart" aria-hidden="true"></i>Tin nhắn đã gửi và nhận</h6>
								
							</div>
              <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-purple" style="background-color: #8892d6">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-uppercase text-white" title="Statistics">Hôm nay</p>
                                                <p class="text-white m-0">Tin nhắn đã gửi: <b>10</b></p>
                                                <p class="text-white m-0">Tin nhắn đã nhận: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="fa fa-comments-o" aria-hidden="true" style="font-size:48px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-info" style="background-color: #45bbe0">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-white text-uppercase" title="User Today"> 7 ngày qua</p>
                                               <p class="text-white m-0">Tin nhắn đã gửi: <b>10</b></p>
                                                <p class="text-white m-0">Tin nhắn đã nhận: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                               <i class="fa fa-comments-o" aria-hidden="true" style="font-size:48px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-pink" style="background-color: #f06292">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-uppercase text-white" title="Request Per Minute">30 ngày qua</p>
                                                <p class="text-white m-0">Tin nhắn đã gửi: <b>10</b></p>
                                                <p class="text-white m-0">Tin nhắn đã nhận: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="fa fa-comments-o" aria-hidden="true" style="font-size:48px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-success" style="background-color: #78c350">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-white text-uppercase" title="New Downloads">Tất cả</p>
                                                <p class="text-white m-0">Tin nhắn đã gửi: <b>10</b></p>
                                                <p class="text-white m-0">Tin nhắn đã nhận: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="fa fa-comments-o" aria-hidden="true" style="font-size:48px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                        </div>
                        <div class="card-header header-elements-sm-inline">
								<h6 class="card-title"><i class="fa fa-bar-chart" aria-hidden="true"></i>Thống kê kết bạn</h6>
								
							</div>
              <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-purple" style="background-color: #8892d6">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-uppercase text-white" title="Statistics">Hôm nay</p>
                                                <p class="text-white m-0">Kết bạn thành công: <b>10</b></p>
                                                <p class="text-white m-0">Kết bạn thất bại: <b>10</b></p>
                                                <p class="text-white m-0">Tổng kết bạn: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="fa fa-users" aria-hidden="true" style="font-size: 48px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-info" style="background-color: #45bbe0">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-white text-uppercase" title="User Today"> 7 ngày qua</p>
                                               <p class="text-white m-0">Kết bạn thành công: <b>10</b></p>
                                                <p class="text-white m-0">Kết bạn thất bại: <b>10</b></p>
                                                <p class="text-white m-0">Tổng kết bạn: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="fa fa-users" aria-hidden="true" style="font-size: 48px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-pink" style="background-color: #f06292">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-uppercase text-white" title="Request Per Minute">30 ngày qua</p>
                                               <p class="text-white m-0">Kết bạn thành công: <b>10</b></p>
                                                <p class="text-white m-0">Kết bạn thất bại: <b>10</b></p>
                                                <p class="text-white m-0">Tổng kết bạn: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                               <i class="fa fa-users" aria-hidden="true" style="font-size: 48px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-success" style="background-color: #78c350">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-white text-uppercase" title="New Downloads">Tất cả</p>
                                               <p class="text-white m-0">Kết bạn thành công: <b>10</b></p>
                                                <p class="text-white m-0">Kết bạn thất bại: <b>10</b></p>
                                                <p class="text-white m-0">Tổng kết bạn: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="fa fa-users" aria-hidden="true" style="font-size: 48px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                        </div>

                        <div class="card-header header-elements-sm-inline">
								<h6 class="card-title"><i class="fa fa-bar-chart" aria-hidden="true"></i>Thống kê Đăng bài</h6>
								{{-- <div class="header-elements">
									<a class="text-default daterange-ranges font-weight-semibold cursor-pointer dropdown-toggle">
										<i class="icon-calendar3 mr-2"></i>
										<span>February 22 - March 22</span>
									</a>
			                	</div> --}}
							</div>
              <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-purple" style="background-color: #8892d6">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-uppercase text-white" title="Statistics">Hôm nay</p>
                                                <p class="text-white m-0">Thành công: <b>10</b></p>
                                                <p class="text-white m-0">Thất bại: <b>10</b></p>
                                                <p class="text-white m-0">Tổng xử lý: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                               <i class="fa fa-paper-plane" aria-hidden="true" style="font-size:48px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-info" style="background-color: #45bbe0">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-white text-uppercase" title="User Today"> 7 ngày qua</p>
                                               <p class="text-white m-0">Thành công: <b>10</b></p>
                                                <p class="text-white m-0">Thất bại: <b>10</b></p>
                                                <p class="text-white m-0">Tổng xử lý: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="fa fa-paper-plane" aria-hidden="true" style="font-size:48px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-pink" style="background-color: #f06292">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-uppercase text-white" title="Request Per Minute">30 ngày qua</p>
                                               <p class="text-white m-0">Thành công: <b>10</b></p>
                                                <p class="text-white m-0">Thất bại: <b>10</b></p>
                                                <p class="text-white m-0">Tổng xử lý: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="fa fa-paper-plane" aria-hidden="true" style="font-size:48px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-success" style="background-color: #78c350">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-white text-uppercase" title="New Downloads">Tất cả</p>
                                               <p class="text-white m-0">Thành công: <b>10</b></p>
                                                <p class="text-white m-0">Thất bại: <b>10</b></p>
                                                <p class="text-white m-0">Tổng xử lý: <b>10</b></p>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="fa fa-paper-plane" aria-hidden="true" style="font-size:48px"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                        </div>
			</div>
			<!-- /content area -->
			@stop


			