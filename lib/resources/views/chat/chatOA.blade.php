@extends('master')
@section('title','Tài khoản zalo')
@section('main')
<div class="main">
	
	<style>
		/*https://stc-oa-chat-adm.zdn.vn/css/images/slider_next_prev.png) ;*/
		/*.carousel-control-next-icon {
		    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='https://stc-oa-chat-adm.zdn.vn/css/images/slider_next_prev.png' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
		}*/
		.lstitle {
		    display: block;
		    margin-bottom: 15px;
		    color: #008fe5;
		    font-size: 1.375em;
		    font-weight: 500;
		}
		.carousel-item .lstitle {
		    display: block;
		    margin-bottom: 15px;
		    color: #008fe5;
		    font-size: 1.375em;
		    font-weight: 500;
		}
		.carousel-item img {
		    display: block;
		    max-width: 400px;
		    margin: 0 auto 30px;
		}
		.carousel-item p {
		    color: #535353;
		    font-size: .875em;
		    line-height: 1.5;
		}
		.heading-cwc span.title {
		    display: block;
		    margin-bottom: 15px;
		    color: #191919;
		    font-size: 1.375em;
		    font-weight: 400;
		}
		.heading-cwc p {
		    color: #535353;
		    font-size: .875em;
		    line-height: 1.5;
		}
		.content-wrapper{
			border: 1px solid #cdcdcd;
			border-radius: 10px;
		}
		.btn-save-pageprofile2 {
		    font-size: 14px;
		    color: #000;
		    border-bottom: 1px solid #e0e6ed;
		    padding: 8px;
		    display: block;
		    width: 100%;
		}
         .hidden {
		    display: none!important;
		}
      /* note*/
    .bt-fix-co4 .bt-all-form_api {
		    display: block;
		    float: left;
		    width: 100%;
		    max-height: calc(100vh - 180px);
		    overflow: auto;
		}
	.bt-fix-co4 .bt-all-list-lich-hen {
		    display: block;
		    float: left;
		    width: 100%;
		    max-height: calc(100vh - 180px);
		    overflow: auto;
		}
		.bt-fix-co4 .bt-all-list-edit-lich-hen {
		    display: block;
		    float: left;
		    width: 100%;
		    max-height: calc(100vh - 180px);
		    overflow: auto;
		}
		.last_mess{
			display: none;
		}
		.bt-load-lichhen{
			padding: 10px;
		    padding-right: 0px;
		    border-bottom: 1px solid #e0e6ed;
		    float: left;
		    width: 100%;
		}
		.bt-name-lh {
		    text-overflow: ellipsis;
		    width: 117px;
		   
		    white-space: nowrap;
		}
		.bt-all-list-edit-lich-hen{
			padding: 10px;
		    padding-right: 0px;
		    border-bottom: 1px solid #e0e6ed;
		    float: left;
		    width: 100%;
		}
	</style>
<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
	    <div class="d-flex">
	        <div class="breadcrumb">
	            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
	            <span class="breadcrumb-item active">Chat OA</span>
	        </div>

	        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
	    </div>

	    <div class="header-elements d-none">
	        
	    </div>
	</div>

	</div>
	<!-- /page header -->
	{{-- @include('errors.note') --}}
<!-- Form inputs -->
	<div class="content-wrapper addMargin" style="min-height: 486px;">
		{{ csrf_field() }}
					    <section class="content-header">
					    </section>
					    <section class="content container-fluid">
					        {{-- <div class="alerts"></div> thẻ thông báo lỗi--}}
					        <link href="https://zalo.phanmemninja.com/theme/default/css/mystyle.css" rel="stylesheet" type="text/css">
					        <div class="bt-comment" style="display: flex !important;">
					        	<!--đã xóa col-md-2 bt-list-fp-->
					            <div class="bt-list-fp" style="">
					                <div class="bt-list-fp-content" style="display: block;">
					                    <div style="position: relative;float: left;width: 100%;">
					                        <input type="text" name="keywords" class="form-control" id="search-stm" onkeyup="searchInboxFanpageProfile(this)" placeholder="Tìm kiếm Official Account, profiles">
					                        <i class="fa fa-search pointer iconsearchfanpageprofile"></i>
					                    </div>
					                    <a class="bt-title">
					                    <span>Tất cả Official Account</span>
					                    <input type="checkbox" class="selecteallfanpage" style="float: right; margin-right: 10px;" value="">
					                    </a>
					                    <div class="bt-box-fp">
					                    	@if($status != 1)
						                    	 @foreach($list_oa as $row)
							                        <div class="bt-item-fp" title="">
							                            <label style="width: 100%">
							                            <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 20px;height: 20px;" src="{{ $row->image }}">
							                            <span>{{ $row->name }}</span>
							                            <input type="checkbox" class="selectepageprofile checkallfanpage" data-type="fanpage" value="{{ $row->zalo_id }}" style="display: block;">
							                            </label>
							                        </div>
						                        @endforeach
					                    	@else
                                                  @foreach($list_oa as $row)
                                                   @for ($i = 0; $i < count($role_page); $i++)
                                                    @if($role_page[$i] == $row->zalo_id)
	                                                    <div class="bt-item-fp" title="">
								                            <label style="width: 100%">
								                            <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 20px;height: 20px;" src="{{ $row->image }}">
								                            <span>{{ $row->name }}</span>
								                            <input type="checkbox" class="selectepageprofile checkallfanpage" data-type="fanpage" value="{{ $row->zalo_id }}" style="display: block;">
								                            </label>
								                        </div>
                                                    @endif
							                        
							                        @endfor
							                        @endforeach
					                    	@endif
                                            
					                        
					                    </div>

					                    <a class="btn btn-primary btn-save-pageprofile2 pull-right custombutton" onclick="selectPageAndProfile(this)" style="color: #FFF;">Ok</a>
					                </div>
					            </div>
					            <div class="col-md-4 bt-fix-co4">
					                <div class="bt-icon-fill">
					                    <div style="" class="bt-show-fp pull-left">
					                        <i class="fa fa-arrow-left"></i>
					                    </div>
					                    <ul class="fillter-tab pull-right" style="display: none;">
					                        <select onchange="chatUseAppProfile(this)">
					                            <option value="0">---Chọn thể loại nhắn tin---</option>
					                            <option value="1">Mời sử dụng ứng dụng</option>
					                            <option value="2">Nhắn tin với từng người</option>
					                            <option value="3">Nhắn tin với tất cả</option>
					                        </select>
					                    </ul>
					                    <div class="dropdown bt-fill-page pull-left " title="" data-original-title="Lọc theo tag" style="margin-left: 25px;display: flex;">
					                        <div data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lọc thẻ">
					                            <a class="dropdown-toggle nav-fill-tag bt-make-click-ft" data-toggle="dropdown"><i class="fa fa-tags"></i></a>
					                            <ul style="min-width: 260px;max-height: 400px;overflow: auto;overflow-x: hidden;" class="dropdown-menu bt-drop-tag">
					                                <li onclick="unByStatus(this)" class="" style="background: #999;" data-id="none"><span>Lọc không thẻ</span></li>
					                                <a onclick="clearByStatus(this)" data-toggle="tooltip" data-placement="top" title="" class="btn btn-primary pull-right clearfilterstatus" data-original-title="Bỏ lọc"><i class="fa fa-trash" style="color: #fff;"></i></a>
					                            </ul>
					                        </div>
					                         @foreach($act_code as $row)
					                        @if($row->act_code == 1)
					                         @foreach($user_Business as $value)
					                            <input class="abc" name="account" type="hidden" value="{{ $value->NguoiDungID }}" id='Acc_users'>
					                         @endforeach
					                         @endif
					                         @endforeach

					                         @foreach($act_code as $row)
					                         @if($row->act_code == 1)
						                         <div class="form-group col-md-4">
									             <select class="btn btn-primary" id="id_form" style=" width: fit-content; float: left;    background-color: #008fe5 !important;" onchange="activeForm()">
									             	    <option value="0">Danh sách chát</option>
			     										<option value="1">Thêm mới lịch hẹn</option>
			     										<option value="2">Danh sách lịch hẹn</option>
				   										  
				   	   							 </select>
								               </div>
								               {{-- <div class="form-group col-md-4 accountBu" style=" padding: 0 30px;">
									             <select class="btn btn-primary" id="Acc_users" name="account" style=" width: fit-content; float: left;background-color: #008fe5 !important;">
									             	    <option value="">Chọn danh tài khoản</option>
									             	    @foreach($user_Business as $value)
			     										<option value="{{ $value->NguoiDungID }}">{{ $value->Username }}</option>
			     										@endforeach
				   										  
				   	   							 </select>
				   	   							 <input class="abc" name="account" id="Acc_users" type="hidden" value="">
				   	   							 <em class="text-danger alert_account last_mess">Vui lòng chọn tài khoản</em>
								               </div> --}}
								               @endif
							               @endforeach
					                        <div style="display: none;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Thêm Fanpages &amp; Profiles">
					                            <a href="connect-page"><i class="fa fa-user-plus"></i></a>
					                        </div>
					                    </div>
					                    <div class="bt-key-search">
					                        <input type="text" name="keywords" class="form-control" id="search-stm1" onkeyup="searchInboxComment(this)" placeholder="Tìm kiếm tin nhắn, bình luận">
					                        <i class="fa fa-search pointer"></i>
					                    </div>
					                    <div class="form-group divfriend" style="display: none"><input type="checkbox" class="checkallfriend"> chọn tất cả</div>
					                </div>
					                <div class="bt-loader" style="display: none;"></div>
					                <div class="bt-all-comment" style="display: block;">
					                    
					                </div>
					                @foreach($act_code as $row)
					                @if($row->act_code == 1)
					                <div class="bt-all-form_api" style="display: none;">
					                     <div class="card">
											<div class="card-header header-elements-inline">
												<h5 class="card-title">Thêm mới lịch hẹn</h5>
											</div>

											<div class="card-body">
												<form action="#" id="form_OA">
												<div class="form-group">
													<label>Tiêu đề:</label>
													<input type="text" class="form-control" placeholder="Tiêu đề" name="tieude">
													<em class="text-danger alert_tieude last_mess">Vui lòng nhập tiêu đề</em>
												</div>

												{{-- <div class="form-group">
													<label>Mã KH:</label>
													<input type="text" class="form-control" placeholder="Mã khách hàng" name="makh">
													<em class="text-danger alert_makh last_mess">Vui lòng nhập mã khách hàng</em>
												</div> --}}

												<div class="form-group">
													<label>Tên KH:</label>
													<input type="text" class="form-control" placeholder="Tên khách hàng" name="nameKH">
													<em class="text-danger alert_nameKH last_mess">Vui lòng nhập tên Khách hàng</em>
												</div>
												<div class="form-group">
													<label>Ngày sinh:</label>
													{{-- <input type="text" class="form-control" placeholder="Ngày sinh" name="ngaysinh"> --}}
													<input type="date" id="birthday" name="ngaysinh" class="form-control">
													<em class="text-danger alert_ngaysinh last_mess">Vui lòng nhập Ngày sinh</em>
												</div>
												<div class="form-group">
													<label class="d-block">Giới tính:</label>

													<div class="form-check form-check-inline">
														<label class="form-check-label">
															<input type="radio" id="female" name="gender" value="1" >
															Nam
														</label>
													</div>

													<div class="form-check form-check-inline">
														<label class="form-check-label">
															<input type="radio" id="female" name="gender" value="0">
															Nữ
														</label>
													</div>
												</div>
												{{-- <div class="form-group frm_oa">
													<select class="btn btn-success" name="calc_shipping_provinces" name="tinh_tp" required="">
													  <option value="">Tỉnh / Thành phố</option>
													</select>
													<em class="text-danger alert_tinh_tp last_mess">Vui lòng chọn tỉnh thành</em>
													<select class="btn btn-info" name="calc_shipping_district" name="quan_huyen" required="">
													  <option value="">Quận / Huyện</option>
													</select>
													<em class="text-danger alert_quan_huyen last_mess">Vui lòng chọn Quận, Huyện</em>
													<input class="billing_address_1" name="tinh_tp" type="hidden" value="">
                                                    <input class="billing_address_2" name="quan_huyen" type="hidden" value="">
												</div> --}}
												<div class="form-group">
													<label>Địa chỉ:</label>
													<input type="text" class="form-control" placeholder="Địa chỉ" name="diachi">
													<em class="text-danger alert_diachi last_mess">Vui lòng nhập địa chỉ</em>
												</div>
												<div class="form-group">
													<label>Phone:</label>
													<input type="text" class="form-control" placeholder="Số điện thoại" name="phone">
													<em class="text-danger alert_phone last_mess">Vui lòng nhập số điện thoại</em>
												</div>
												<div class="form-group">
													<label>Email:</label>
													<input type="email" class="form-control" placeholder="Email" name="email">
													<em class="text-danger alert_email last_mess">Vui lòng nhập Email</em>
												</div>
												<div class="form-group">
													<label>Ghi chú:</label>
													<textarea rows="5" cols="5" class="form-control" placeholder="Thêm ghi chú" name="ghichu"></textarea>
												</div>
												<div class="form-group">
													<label>Số lượng khách:</label>
													<input type="text" class="form-control" placeholder="Số lượng khách" name="numberKH">
													<em class="text-danger alert_number last_mess">Vui lòng nhập số lượng khách</em>
												</div>
												<div class="form-group">
							                     <label>Thời gian hẹn:</label>
							                     <div class="input-group">
							                            <span class="input-group-prepend">
							                                <button type="button" class="btn btn-light btn-icon" id="btn_time"><i class="icon-calendar3"></i></button>
							                            </span>
							                            <input type="text" class="span2 form-control" value="" id="timeStart" name="time_start">
							                        </div>
							                         
							                        <p class="text-danger">Thời gian hệ thống: <span id='hvn'></span></p>
							                    </div>

												<div class="text-right">
													<a class="btn btn-primary" id="submitform" style="color: #FFFF;">Submit<i class="icon-paperplane ml-2"></i></a>
												</div>
												{{ csrf_field() }}
												</form>
											</div>
										</div>
					                </div>
					                <div class="bt-all-list-lich-hen" style="display: none;">
					                	{{-- @foreach($list_lichhen as $row)
					                	<div bt-type="inbox" style=" position: relative;" class="bt-load-lichhen">
						                        <div class="bt-content-chat">
						                            <div class="bt-info-chat">
						                            	<div class="bt-name-lh">Mã lịch hẹn: {{ $row->MaHoSoLichHen }}</div>
						                                 <div class="bt-date-chat">{{ $row->created_at }}</div>
						                                
						                            </div>
						                            <div class="bt-review-chat">
						                            	<br/><p><span>Tiêu đề: {{ $row->TieuDe }}</span></p>
						                            	<p><span>Tên KH: {{ $row->TenKhachHangDatHen }}</span></p>
						                            	<p><span>Phone: {{ $row->SoDienThoai }}</span></p>
						                            	<div class="pull-right">
						                                    <i class="fa fa-pencil" aria-hidden="true" onclick="eidt_lichhen({{ $row->id }})"></i>
						                                    <i class="fa fa-trash" aria-hidden="true"></i>
						                                </div>
						                            </div>
						                        </div>
						                        <div class="owl-page">
						                            <img src="https://s160-ava-talk.zadn.vn/d/d/e/3/1/160/e16ac4d3fc63cfb5d32b545476163404.jpg">
						                            <span>adminklain</span>
						                        </div>
						                        <div class="owl-tag pull-right wrap-color">
						                        <div class="tags-cons"><ul>
						                            
						                        </ul>
						                        </div>
						                   </div>
						                   
						                </div>
						                @endforeach --}}
					                </div>

					                <div class="bt-all-list-edit-lich-hen" style="display: none;">
						                 	  <div class="card">
													<div class="card-header header-elements-inline">
														<h5 class="card-title">Chỉnh sửa lịch hẹn</h5>
													</div>

													<div class="card-body">
														<form action="#" id="form_edit">
														<div class="form-group">
															<label>Tiêu đề:</label>
															<input type="text" class="form-control" placeholder="Tiêu đề" name="tieude_edit">
															<em class="text-danger alert_tieude last_mess">Vui lòng nhập tiêu đề</em>
														</div>

														{{-- <div class="form-group">
															<label>Mã KH:</label>
															<input type="text" class="form-control" placeholder="Mã khách hàng" name="makh_edit">
															<em class="text-danger alert_makh last_mess">Vui lòng nhập mã khách hàng</em>
														</div> --}}

														<div class="form-group">
															<label>Tên KH:</label>
															<input type="text" class="form-control" placeholder="Tên khách hàng" name="nameKH_edit">
															<em class="text-danger alert_nameKH last_mess">Vui lòng nhập tên Khách hàng</em>
														</div>
														<div class="form-group">
															<label>Ngày sinh:</label>
															<input type="text" id="start" name="trip-start" class="form-control" value="" >
{{-- 															<input type="text"  placeholder="Ngày sinh" name="ngaysinh_edit"> --}}
															<em class="text-danger alert_ngaysinh last_mess">Vui lòng nhập Ngày sinh</em>
														</div>
														<div class="form-group">
															<label class="d-block">Giới tính:</label>

															<div class="form-check form-check-inline">
																<label class="form-check-label">
																	<input type="radio" id="nam" class="female_edit" name="gender" value="1" >
																	Nam
																</label>
															</div>

															<div class="form-check form-check-inline">
																<label class="form-check-label">
																	<input type="radio" id="nu" class="female_edit" name="gender" value="0">
																	Nữ
																</label>
															</div>
														</div>
														{{-- <div class="form-group frm_oa"> --}}
															{{-- <select class="btn btn-success" name="calc_shipping_provinces" name="tinh_tp" required="">
															  <option value="">Tỉnh / Thành phố</option>
															</select> --}}
															
																{{-- <label>Tỉnh / Thành phố:</label>
																<input class="form-control" name="tinh_tp_edit" type="text" value="">
																<em class="text-danger alert_tinh_tp last_mess">Vui lòng chọn tỉnh thành</em> --}}
															
															{{-- <select class="btn btn-info" name="calc_shipping_district" name="quan_huyen" required="">
															  <option value="">Quận / Huyện</option>
															</select> --}}
															
																
														  
															
		                                                    
														{{-- </div> --}}
													{{-- 	<div class="form-group frm_oa">
															<label>Quận, Huyện:</label>
																<input class="form-control" name="quan_huyen_edit" type="text" value="">
																<em class="text-danger alert_quan_huyen last_mess">Vui lòng chọn Quận, Huyện</em>
														</div> --}}
														<div class="form-group">
															<label>Địa chỉ:</label>
															<input type="text" class="form-control" placeholder="Địa chỉ" name="diachi_edit">
															<em class="text-danger alert_diachi last_mess">Vui lòng nhập địa chỉ</em>
														</div>
														<div class="form-group">
															<label>Phone:</label>
															<input type="text" class="form-control" placeholder="Số điện thoại" name="phone_edit">
															<em class="text-danger alert_phone last_mess">Vui lòng nhập số điện thoại</em>
														</div>
														<div class="form-group">
															<label>Email:</label>
															<input type="email" class="form-control" placeholder="Email" name="email_edit">
															<em class="text-danger alert_email last_mess">Vui lòng nhập Email</em>
														</div>
														<div class="form-group">
															<label>Ghi chú:</label>
															<textarea rows="5" cols="5" class="form-control" placeholder="Thêm ghi chú" name="ghichu_edit"></textarea>
														</div>
														<div class="form-group">
															<label>Số lượng khách:</label>
															<input type="text" class="form-control" placeholder="Số lượng khách" name="numberKH_edit">
															<em class="text-danger alert_number last_mess">Vui lòng nhập số lượng khách</em>
														</div>
														<div class="form-group">
									                     <label>Thời gian hẹn:</label>
									                     <div class="input-group">
									                            <span class="input-group-prepend">
									                                <button type="button" class="btn btn-light btn-icon" id="btn_time"><i class="icon-calendar3"></i></button>
									                            </span>
									                            <input type="text" class="span2 form-control" value="" id="editTime" name="time_start_edit">
									                            <input class="IDNguoiDung" name="NguoiDungID" type="hidden" value="">
									                            <input class="IDLichHen" name="IDLichHen" type="hidden" value="">
									                        </div>
									                         
									                        <p class="text-danger">Thời gian hệ thống: <span id='hvn'></span></p>
									                    </div>

														<div class="text-right">
															<a class="btn btn-primary" id="submitEditForm" style="color: #FFFF;">Cập nhật<i class="icon-paperplane ml-2"></i></a>
														</div>
														{{ csrf_field() }}
														</form>
													</div>
												</div>
						                 </div>
					                @endif
					                @endforeach
					                
					            </div>
					            <div class="col-md-6 bt-chat-content">
					                <div class="bt-default-mess">
					                    <div class="heading-cwc"><span class="title">Chào mừng đến với <strong>Ninja Zalo OA </strong></span><p>Khám phá những tiện ích hỗ trợ làm việc và chăm sóc khách hàng được tối ưu hoá cho máy tính của bạn.</p></div>
					                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
											  {{-- <ol class="carousel-indicators">
											    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
											    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
											    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
											  </ol> --}}
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="https://stc-oa-chat-adm.zdn.vn/images/chat-widget.jpg" alt="First slide">
											      <span class="lstitle">Thu hút khách hàng tiềm năng</span><p>Cài đặt Chat Widget cho website của bạn để có thể chăm sóc khách hàng tốt hơn</p></a>
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="https://stc-oa-chat-adm.zdn.vn/images/inapp-welcome-screen-01.jpg" alt="Second slide">
											      <span class="lstitle">Trải nghiệm xuyên suốt</span><p>Kết nối và giải quyết công việc trên mọi thiết bị với dữ liệu luôn được đồng bộ</p>
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="https://stc-oa-chat-adm.zdn.vn/images/inapp-welcome-screen-04.jpg" alt="Third slide">
											      <span class="lstitle">Giải quyết công việc hiệu quả hơn</span>
											    </div>

											  </div>
											  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
					                </div>
					                <div style="display: none;" class="bt-chat-mess">
					                    <div class="row">
					                        <div class="col-md-12 bt-chat-messeges-box">
					                            <div class="row">
					                                <div class="col-md-12 bt-messeges-top-bar">
					                                    <div class="pull-left">
					                                        <div class="leftTime"></div>
					                                        <div class="totalPostTime"></div>
					                                    </div>
					                                    <div class="pull-right">
					                                        <a class="bt-popup-box-post" target="_blank" href="#" title="">
					                                        <i class="fa fa-window-restore"></i>
					                                        </a>
					                                        <a class="bt-scroll-top-chat" href="#" title="">
					                                        <i class="fa fa-arrow-circle-up"></i>
					                                        </a>
					                                    </div>
					                                </div>
					                                <div class="col-md-12 bt-load-inbox">
					                                    <div class="bt-load-inbox-content">
					                                    </div>
					                                </div>
					                                <div class="col-md-12 bt-inbox-reply">
					                                    <div class="repyly-bar row">
					                                        <div class="reply-msg-bar">
					                                            <div class="pick-tag">
					                                                <ul>
					                                                </ul>
					                                                <div class="clear"></div>
					                                            </div>
					                                        </div>
					                                    </div>
					                                    <div class="bt-inbox-reply-content">
					                                        <textarea name="" class="bt-make-input" style="display: none;"></textarea>
					                                        {{-- <div class="emojionearea bt-make-input" role="application">
					                                            <div class="emojionearea-editor" contenteditable="true" placeholder="Nhập tin nhắn ... (Bấm Enter để gửi, Shift + Enter để xuống dòng)" tabindex="0" dir="ltr" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off"></div>
					                                          
					                                          
					                                        </div> --}}
					                                    </div>
					                                    <div class="bt-submit-reply">
					                                        <div class="bt-make-file pull-left">
					                                            <div class="bt-submit-reply">
					                                                <div class="bt-make-file pull-left">
					                                                    <i style="color: #BBBBBB" class="bt-open-temp-chat fa fa-commenting-o" aria-hidden="true" title="Tin nhắn mẫu"></i>
					                                                    <div class="bt-drop-chattemp">
					                                                        <div class="title-drop">
					                                                            <a><span>Tin nhắn mẫu</span></a>
					                                                        </div>
					                                                        <ul class="bt-content-drop">
					                                                            <li bt-content-chat-temp="tmfgkfdhgfdhg" class="bt-get-template-chat">test</li>
					                                                        </ul>
					                                                    </div>
					                                                </div>
					                                                <div class="bt-make-file pull-left {{-- mediaLibraryImage --}}" style="padding-left: 5px;">
					                                                	<form id="fileimage" method="POST" action="{{ url('uploadimg') }}" enctype="multipart/form-data">
					                                                	<input required="" id="sendImgOA" type="file" name="file" accept=".png, .jpg, .jpeg, .gif" class="form-control hidden" onchange="changeSendImgOa(this)">
					                                                	{{ csrf_field() }}
							                                            </form>
					                                                    <i class="fa fa-image" id="imgOA" title="Gửi hình ảnh"></i>
					                                                </div>
					                                                <div class="bt-make-file pull-left " style="padding-left: 5px;">
					                                                	<i class="fa fa-pencil-square-o" aria-hidden="true" title="Thêm lịch hẹn" id="addNewLichHen"></i>
					                                                </div>
					                                                {{-- <a class="chat-input__tools__btn text-center sendimage2" data-translate-title="STR_SEND_PHOTO" title="Gửi hình ảnh" style="margin-right: 12px;">
							                                    <div class="inputfile-container " style="position: relative; top: 2px;">
							                                        <form id="fileimage" method="POST" action="{{ url('uploadimg') }}" enctype="multipart/form-data">
							                                            <input type="file" name="file" id="file" class="inputfile hidden" accept=".png, .jpg, .jpeg, .gif" multiple="">
							                                            {{ csrf_field() }}
							                                            </form>
							                                        <div style="left: -9px; bottom: 40px; position: absolute; pointer-events: none;"></div>
							                                        <i class="fa fa-image"></i>
							                                    </div>
							                                </a> --}}
					                                            </div>
					                                        </div>
					                                        <a class="btn btn-primary pull-right" title="" style="color: #FFF;">Gửi</a>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                        <div class="col-md-5 bt-info-user-inbox" style="display: none;">
					                            <div class="row">
					                                <div class="bt-info-basic">
					                                    <a class="bt-avatar-user" href="#" title="">
					                                    <img src="">
					                                    </a>
					                                    <div class="bt-name-user">
					                                        <p class="bt-first"></p>
					                                        <p class="bt-last"></p>
					                                    </div>
					                                </div>
					                                <div class="bt-info-content bt-hidden-ipnut">
					                                    <div class="bt ">
					                                        <div class="col-md-12">
					                                            <div class="fix-icon">
					                                                <i class="fa fa-user"></i>
					                                            </div>
					                                            <span class="text client_fullname_display"></span>
					                                            <input type="text" value="" name="client_fullname" class="client_fullname form-control">
					                                        </div>
					                                    </div>
					                                    <div class="bt ">
					                                        <div class="col-md-12">
					                                            <div class="fix-icon">
					                                                <i class="fa fa-envelope"></i>
					                                            </div>
					                                            <span class="text client_email_display"></span>
					                                            <input type="text" value="" name="client_email" class="client_email form-control">
					                                        </div>
					                                    </div>
					                                    <div class="bt ">
					                                        <div class="col-md-12">
					                                            <div class="fix-icon">
					                                                <i style="font-size: 20px;" class="fa fa-mobile" aria-hidden="true"></i>
					                                            </div>
					                                            <span class="text client_phone_display"></span>
					                                            <input type="text" value="" name="client_phone" class="client_phone form-control">
					                                        </div>
					                                    </div>
					                                    <div class="bt ">
					                                        <div class="col-md-12">
					                                            <div class="fix-icon">
					                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
					                                            </div>
					                                            <span class="text client_address_display"></span>
					                                            <input type="text" value="" name="client_address" class="client_address form-control">
					                                        </div>
					                                    </div>
					                                    <div class="bt-btn-edit-user col-md-12">
					                                        <span class="bt-edit">
					                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					                                        <span class="suahuy">Sửa</span>
					                                        </span>
					                                        <a class="bt-luu" href="javascript:void(0)" onclick="saveInformationClientInLiveChat(this)">
					                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					                                        <span>Lưu</span>
					                                        </a>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <!-- The Modal -->
					        <div class="modal" id="cauhinhnhantin">
					            <div class="modal-dialog">
					                <div class="modal-content">
					                    <!-- Modal Header -->
					                    <div class="modal-header">
					                        <h4 class="modal-title">Cấu hình tin nhắn</h4>
					                    </div>
					                    <!-- Modal body -->
					                    <div class="modal-body">
					                        <div class="form-group">
					                            <label>Khoảng cách giữa 2 tin nhắn</label>
					                            <select name="defTime" id="defTime" class="form-control">
					                                <option value="60">60 Giây</option>
					                                <option value="70">70 Giây</option>
					                                <option value="80">80 Giây</option>
					                                <option value="90">90 Giây</option>
					                                <option value="100">100 Giây</option>
					                                <option value="110">110 Giây</option>
					                                <option value="120">120 Giây</option>
					                                <option value="130">130 Giây</option>
					                                <option value="160">160 Giây</option>
					                                <option value="190">190 Giây</option>
					                                <option value="220">220 Giây</option>
					                                <option value="250">250 Giây</option>
					                                <option value="280">280 Giây</option>
					                                <option value="310">310 Giây</option>
					                                <option value="340">340 Giây</option>
					                                <option value="390">390 Giây</option>
					                                <option value="450">450 Giây</option>
					                                <option value="510">510 Giây</option>
					                                <option value="570">570 Giây</option>
					                                <option value="630">630 Giây</option>
					                                <option value="690">690 Giây</option>
					                                <option value="750">750 Giây</option>
					                                <option value="810">810 Giây</option>
					                                <option value="870">870 Giây</option>
					                                <option value="930">930 Giây</option>
					                                <option value="990">990 Giây</option>
					                                <option value="1050">1050 Giây</option>
					                                <option value="1110">1110 Giây</option>
					                                <option value="1170">1170 Giây</option>
					                                <option value="1230">1230 Giây</option>
					                                <option value="1290">1290 Giây</option>
					                                <option value="1350">1350 Giây</option>
					                                <option value="1410">1410 Giây</option>
					                                <option value="1470">1470 Giây</option>
					                                <option value="1530">1530 Giây</option>
					                            </select>
					                        </div>
					                    </div>
					                    <!-- Modal footer -->
					                    <div class="modal-footer">
					                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					                        <button type="button" class="btn btn-primary caidat" data-dismiss="modal">cài đặt</button>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <div id="mediaLibModalImage" class="modal fade" role="dialog" tabindex="-1" data-backdrop="true">
					            <div class="modal-dialog">
					                <div class="modal-content">
					                    <div class="modal-header">
					                        <button type="button" class="close" data-dismiss="modal">×</button>
					                        <h4 class="modal-title">Media library</h4>
					                    </div>
					                    <div class="modal-body">
					                        <div id="elfinderImage"></div>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </section>
                 </div>
			
	<div class="modal fade bd-example-modal-sm" id="popupmess" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header" style="border-bottom: 1px solid #cdcdcd;">
		        <h4 class="modal-title" id="mySmallModalLabel">Thông báo</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
			       <div class="modal-body contentpoppup">
		             {{-- <p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn nhóm, trước khi đăng bài!</p> --}}
			    </div> 
		    </div>
		  </div>
		</div>
		<!--Modal thong bao <-->		

   </div>
   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script> --}}
   <script src="https://sv1.phanmemninja.com/socket.io/socket.io.js"></script>
   <script src="assets/js/districts.min.js"></script>
   <script type="text/javascript">
          socket = io('https://sv1.phanmemninja.com');
           $(function(){
			  $('#editTime').fdatepicker({
					format: 'dd-mm-yyyy hh:ii',
					disableDblClickSelection: true,
					language: 'vi',
					pickTime: true
				});
			    $('#timeStart').fdatepicker({
					format: 'dd-mm-yyyy hh:ii',
					disableDblClickSelection: true,
					language: 'vi',
					pickTime: true
				});
			});
          $( document ).ready(function() {
		     var locationv2 = window.location.href;
		    
		      if(locationv2 == 'https://zalov2.phanmemninja.com/chat/chatoa'){

		            $('.d-md-block').trigger('click');
		      }

		      //date time
		       var today = new Date();
				   var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
				   var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
				   var dateTime = date+' '+time;
				 
				   document.getElementById("hvn").innerHTML = dateTime;
				   $('#timeStart').val(dateTime);
		  });

   	  function activeForm(){
   	  	$id = $('#id_form').val();
   	  	if($id == 0){
           $('.bt-all-comment').show();
           $('.bt-all-form_api').hide();
           $('.bt-all-list-lich-hen').hide();
           $('.bt-all-list-edit-lich-hen').hide();
   	  	}else if($id == 1){
           $('.bt-all-comment').hide();
           $('.bt-all-list-edit-lich-hen').hide();
            $('.bt-all-list-lich-hen').hide();
           $('.bt-all-form_api').show();
   	  	}else if($id == 2){
   	  		getListLichHen();
            $('.bt-all-comment').hide();
            $('.bt-all-list-edit-lich-hen').hide();
            $('.bt-all-form_api').hide();
            $('.bt-all-list-lich-hen').show();

   	  	}
   	  }
   	  $('#addNewLichHen').on('click',function(){
          $('.bt-all-comment').hide();
	      $('.bt-all-list-edit-lich-hen').hide();
	      $('.bt-all-list-lich-hen').hide();
	      $('.bt-all-form_api').show();
   	  });

   	  $('#submitform').on('click',function(){
   	  	var params = {};
        
        var tieude = $('input[name="tieude"]').val();
        var makh   = $('input[name="makh"]').val();
        var tenkh  = $('input[name="nameKH"]').val();
        var ngaysinh = $('input[name="ngaysinh"]').val();
        var diachi   = $('input[name="diachi"]').val();
        var phone    = $('input[name="phone"]').val();
        var email    = $('input[name="email"]').val();
        var ghichu   = $('textarea[name="ghichu"]').val();
        var tinh_tp  = '';
        var quan_huyen = '';
        var number = $('input[name="numberKH"]').val();
        var dateTime = $('input[name="time_start"]').val();
        // var account = $('.accountBu select[name="account"]').val();
        var account = $('input[name="account"]').val();
        var _token = $('input[name="_token"]').val();
        let validate = validateformOA(tieude,makh,tenkh,number,diachi,phone,email,account);
        var gioitinh = 1;
        $('#female:checked').each(function(){
			gioitinh = $(this).val();
			
		});
        

         if(validate == true){
         	 params['tieude'] = tieude;
         	 params['gioitinh'] = gioitinh;
	        params['makh'] = makh;
	        params['tenkh'] = tenkh;
	        params['ngaysinh'] = ngaysinh;
	        params['diachi'] = diachi;
	        params['phone'] = phone;
	        params['email'] = email;
	        params['ghichu'] = ghichu;
	        params['tinh_tp'] = tinh_tp;
	        params['quan_huyen'] = quan_huyen;
	        params['idAcc'] = account;
	        params['number'] = number;
	        params['dateTime'] = dateTime;
	        params['_token'] = _token;
	        //console.log(params);
	         $.ajax({
		            url: '{{ url('chat/submitFormOA') }}',
		            type: 'post',
		            dataType: 'json',
		            data: params,
		           
		            success:function(result){
		                if(result.status == 200){
		                	var form = document.querySelector('#form_OA');
	                         form.reset();
		                    // $("p").remove(".contentmess");
		                    var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
		                
		                $('.contentpoppup').html(html);
		                $('#popupmess').modal('show');
		                }else{
		                	// $("p").remove(".contentmess");
                             var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>'+result.message+'</p>';
			                $('.contentpoppup').html(html);
			                $('#popupmess').modal('show');
		                }
		            },
		        });
         }
       

   	  });

   	  function getListLichHen(){
   	  	 var params = {};
   	  	 params['call'] = 'getLichHen';
   	  	 params['_token'] = $('input[name="_token"]').val();
   	  	 $.ajax({
		            url: '{{ url('chat/getListLichHen') }}',
		            type: 'post',
		            dataType: 'json',
		            data: params,
		           
		            success:function(result){
		            	var html = '';
		            	console.log(result);
		               for (var i = 0; i < result.length; i++) {
		               	html += ' <div bt-type="inbox" style=" position: relative;" class="bt-load-lichhen del_'+result[i].id+'">';
		               	html += ' <div class="bt-content-chat">';
		               	html += '<div class="bt-info-chat">';
		               	html += '<div class="bt-name-lh">Mã lịch hẹn: '+result[i].MaHoSoLichHen+'</div>';
		               	html += ' <div class="bt-date-chat">'+result[i].created_at+'</div>';
		               	html += ' </div>';
		               	html += ' <div class="bt-review-chat">';
		               	html += ' <br><p><span>Tiêu đề: '+result[i].TieuDe+'</span></p>';
		               	html += ' <p><span>Tên KH: '+result[i].TenKhachHangDatHen+'</span></p>';
		               	html += ' <p><span>Phone: '+result[i].SoDienThoai+'</span></p>';
		               	html += ' <div class="pull-right">';
		               	html += ' <i class="fa fa-pencil" aria-hidden="true" onclick="eidt_lichhen('+result[i].id+')"></i>';
		               	html += ' <i class="fa fa-trash" aria-hidden="true" onclick="del_lichhen('+result[i].id+')"></i>';
		               	html += '  </div>';
		               	html += '  </div>';
		               	html += '  </div>';
		               	html += '  <div class="owl-page">';
		               	html += '  <img src="https://s160-ava-talk.zadn.vn/d/d/e/3/1/160/e16ac4d3fc63cfb5d32b545476163404.jpg">';
		               	html += '  <span>adminklain</span>';
		               	html += '  </div>';
		               	html += '  <div class="owl-tag pull-right wrap-color">';
		               	html += '   <div class="tags-cons"><ul>';
		               	html += '    </ul>';
		               	html += '     </div>';
		               	html += '     </div>';
		               	html += '     </div>';
		               }
		               $('.bt-all-list-lich-hen').html(html);
		            },
		        });
   	  }

   	  function del_lichhen(ob){
   	  	var params = {};
   	  	params['id'] = ob;
   	  	params['_token'] = $('input[name="_token"]').val();
         $.ajax({
		            url: '{{ url('chat/del_lichhen') }}',
		            type: 'post',
		            dataType: 'json',
		            data: params,
		           
		            success:function(result){
		                if(result.status == 200){
		                    $('.del_'+ob).hide();
		                    var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
		                
		                $('.contentpoppup').html(html);
		                $('#popupmess').modal('show');
		                }else{
		                	
                             var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Đã xảy ra lỗi, Vui lòng thử lại.</p>';
			                $('.contentpoppup').html(html);
			                $('#popupmess').modal('show');
		                }
		            },
		        });
   	  	}


   	   function validateformOA(tieude,makh,tenkh,number,diachi,phone,email,ghichu,account){
		  	var tab = "#form_OA"
			    if(tieude == ''){
			        $(tab+' input[name="tieude"]').addClass('is-invalid');
			        $(tab+' .alert_tieude').show();
			    }else{
			        $(tab+' input[name="tieude"]').removeClass('is-invalid');
			        $(tab+' .alert_tieude').hide();
			    }
			    // if(makh == ''){
			    //    $(tab+' input[name="makh"]').addClass('is-invalid');
			    //     $(tab+' .alert_makh').show();
			    // }else{
			    //     $(tab+' input[name="makh"]').removeClass('is-invalid');
			    //     $(tab+' .alert_makh').hide();
			    // }
			    if(tenkh == ''){
			        $(tab+' input[name="nameKH"]').addClass('is-invalid');
			        $(tab+' .alert_nameKH').show();
			    }else{
			         $(tab+' input[name="nameKH"]').removeClass('is-invalid');
			        $(tab+' .alert_nameKH').hide();
			    }
			     if(number == ''){
			        $(tab+' input[name="numberKH"]').addClass('is-invalid');
			        $(tab+' .alert_number').show();
			    }else{
			         $(tab+' input[name="numberKH"]').removeClass('is-invalid');
			        $(tab+' .alert_number').hide();
			    }
			    if(diachi == ''){
			        $(tab+' input[name="diachi"]').addClass('is-invalid');
			        $(tab+' .alert_diachi').show();
			    }else{
			         $(tab+' input[name="diachi"]').removeClass('is-invalid');
			        $(tab+' .alert_diachi').hide();
			    }
			    if(phone == ''){
			        $(tab+' input[name="phone"]').addClass('is-invalid');
			        $(tab+' .alert_phone').show();
			    }else{
			          $(tab+' input[name="phone"]').removeClass('is-invalid');
			         $(tab+' .alert_phone').hide();
			    }
			    // if(email == ''){
			    //     $(tab+' input[name="email"]').addClass('is-invalid');
			    //     $(tab+' .alert_email').show();
			    // }else{
			    //      $(tab+' input[name="email"]').removeClass('is-invalid');
			    //      $(tab+' .alert_email').hide();
			    // }
			    if(account == ''){
			        $('.accountBu select[name="account"]').addClass('is-invalid');
			        $('.alert_account').show();
			    }else{
			         $('.accountBu select[name="account"]').removeClass('is-invalid');
                     $('.alert_account').hide();
			    }


			    if(tieude == '' || number == '' || tenkh == '' || diachi =='' || phone =='' || account == '')
			    {
			        return false;
			    }
			    return true;
			}
   </script>
   <script>
		if (address_2 = localStorage.getItem('address_2_saved')) {
		  $('select[name="calc_shipping_district"] option').each(function() {
		    if ($(this).text() == address_2) {
		      $(this).attr('selected', '')
		    }
		  })
		  $('input.billing_address_2').attr('value', address_2)
		}
		if (district = localStorage.getItem('district')) {
		  $('select[name="calc_shipping_district"]').html(district)
		  $('select[name="calc_shipping_district"]').on('change', function() {
		    var target = $(this).children('option:selected')
		    target.attr('selected', '')
		    $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
		    address_2 = target.text()
		    $('input.billing_address_2').attr('value', address_2)
		    district = $('select[name="calc_shipping_district"]').html()
		    localStorage.setItem('district', district)
		    localStorage.setItem('address_2_saved', address_2)
		  })
		}
		$('select[name="calc_shipping_provinces"]').each(function() {
		  var $this = $(this),
		    stc = ''
		  c.forEach(function(i, e) {
		    e += +1
		    stc += '<option value=' + e + '>' + i + '</option>'
		    $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
 $this.on('change', function(i) {
		    if (address_1 = localStorage.getItem('address_1_saved')) {
		      $('select[name="calc_shipping_provinces"] option').each(function() {
		        if ($(this).text() == address_1) {
		          $(this).attr('selected', '')
		           
		           
		        }
		        $('input.billing_address_1').attr('value', address_1)
		      })

		    }
		})
		    $this.on('change', function(i) {
		      i = $this.children('option:selected').index() - 1
		      var str = '',
		        r = $this.val()
		      if (r != '') {
		        arr[i].forEach(function(el) {
		          str += '<option value="' + el + '">' + el + '</option>'
		          $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
		        })
		        var address_1 = $this.children('option:selected').text()
		        var district = $('select[name="calc_shipping_district"]').html()
		        localStorage.setItem('address_1_saved', address_1)
		        localStorage.setItem('district', district)
		        $('select[name="calc_shipping_district"]').on('change', function() {
		          var target = $(this).children('option:selected')
		          target.attr('selected', '')
		          $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
		          var address_2 = target.text()
		          $('input.billing_address_2').attr('value', address_2)
		          district = $('select[name="calc_shipping_district"]').html()
		          localStorage.setItem('district', district)
		          localStorage.setItem('address_2_saved', address_2)
		        })
		      } else {
		        $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
		        district = $('select[name="calc_shipping_district"]').html()
		        localStorage.setItem('district', district)
		        localStorage.removeItem('address_1_saved', address_1)
		      }
		    })
		  })
		})

		function eidt_lichhen(ob){
            $('.bt-all-comment').hide();
            $('.bt-all-form_api').hide();
            $('.bt-all-list-lich-hen').hide();
            $('.bt-all-list-edit-lich-hen').show();
            var _token = $('input[name="_token"]').val();
             $.ajax({
		            url: '{{ url('chat/getDataById') }}',
		            type: 'post',
		            dataType: 'json',
		            data: {id:ob, _token:_token},
		           
		            success:function(result){
		                if(result.status == 200){
		                	//console.log(result.data);
		                	 $('.bt-all-list-edit-lich-hen input[name="tieude_edit"]').val(result.data.TieuDe);
		                	 $('.bt-all-list-edit-lich-hen input[name="nameKH_edit"]').val(result.data.TenKH);
		                	 $('.bt-all-list-edit-lich-hen input[name="ngaysinh_edit"]').val(result.data.NgaySinh);
		                	 $('.bt-all-list-edit-lich-hen input[name="diachi_edit"]').val(result.data.DiaChi);
		                	 $('.bt-all-list-edit-lich-hen input[name="phone_edit"]').val(result.data.Phone);
		                	 $('.bt-all-list-edit-lich-hen input[name="email_edit"]').val(result.data.Email);
		                	 $('.bt-all-list-edit-lich-hen input[name="numberKH_edit"]').val(result.data.SoLuongKhach);
		                	 $('.bt-all-list-edit-lich-hen input[name="time_start_edit"]').val(result.data.ThoiGianHen);
		                	 $('.bt-all-list-edit-lich-hen textarea[name="ghichu_edit"]').val(result.data.GhiChu);
		                	 $('.bt-all-list-edit-lich-hen input[name="tinh_tp_edit"]').val(result.data.MaTinhThanh);
		                	 $('.bt-all-list-edit-lich-hen input[name="quan_huyen_edit"]').val(result.data.MaQuanHuyen);
		                	 $('.form-group input[name="trip-start"]').val(result.data.NgaySinh);
		                	 $('input[name="NguoiDungID"]').val(result.data.NguoiDungID);
		                	 $('input[name="IDLichHen"]').val(result.data.IDLichHen);
		                	 if(result.data.gioitinh == 1){
                               document.getElementById("nam").checked = true;
		                	 }else if(result.data.gioitinh == 0){
                                document.getElementById("nu").checked = true;
		                	 }
		                }
		            },
		        });
		}
		$('#submitEditForm').on('click',function(){
            var params = {};
       
	        var tieude = $('input[name="tieude_edit"]').val();
	        var makh   = '';
	        var tenkh  = $('input[name="nameKH_edit"]').val();
	        var ngaysinh = $('input[name="trip-start"]').val();
	        var diachi   = $('input[name="diachi_edit"]').val();
	        var phone    = $('input[name="phone_edit"]').val();
	        var email    = $('input[name="email_edit"]').val();
	        var ghichu   = $('textarea[name="ghichu_edit"]').val();
	        var tinh_tp  = '';
	        var quan_huyen = '';
	        var number = $('input[name="numberKH_edit"]').val();
	        var dateTime = $('input[name="time_start_edit"]').val();
	        var NguoiDungID = $('input[name="NguoiDungID"]').val();
	        var IDLichHen = $('input[name="IDLichHen"]').val();
	        var account = "abc";
	        var _token = $('input[name="_token"]').val();
	        let validate = validateformEdit(tieude,tenkh,number,diachi,phone,email,account);
	        var gioitinh = 1;
	        $('.female_edit:checked').each(function(){
				gioitinh = $(this).val();
				
			});
	         if(validate == true){
	         	 params['tieude'] = tieude;
	         	 params['gioitinh'] = gioitinh;
		        params['makh'] = makh;
		        params['tenkh'] = tenkh;
		        params['ngaysinh'] = ngaysinh;
		        params['diachi'] = diachi;
		        params['phone'] = phone;
		        params['email'] = email;
		        params['ghichu'] = ghichu;
		        params['tinh_tp'] = tinh_tp;
		        params['quan_huyen'] = quan_huyen;
		        params['idAcc'] = account;
		        params['number'] = number;
		        params['dateTime'] = dateTime;
		        params['NguoiDungID'] = NguoiDungID;
		        params['IDLichHen'] = IDLichHen;
		        params['_token'] = _token;
		        //console.log(params);
		         $.ajax({
			            url: '{{ url('chat/submitEditForm') }}',
			            type: 'post',
			            dataType: 'json',
			            data: params,
			           
			            success:function(result){
			                if(result.status == 200){
			                    // $("p").remove(".contentmess");
			                    var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
			                
			                $('.contentpoppup').html(html);
			                $('#popupmess').modal('show');
			                }else{
			                	// $("p").remove(".contentmess");
	                             var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>'+result.message+'</p>';
				                $('.contentpoppup').html(html);
				                $('#popupmess').modal('show');
			                }
			            },
			        });
	         }

		});

		function validateformEdit(tieude,tenkh,number,diachi,phone,email,ghichu,account){
		  	var tab = "#form_edit"
			    if(tieude == ''){
			        $(tab+' input[name="tieude"]').addClass('is-invalid');
			        $(tab+' .alert_tieude').show();
			    }else{
			        $(tab+' input[name="tieude"]').removeClass('is-invalid');
			        $(tab+' .alert_tieude').hide();
			    }
			    // if(makh == ''){
			    //    $(tab+' input[name="makh"]').addClass('is-invalid');
			    //     $(tab+' .alert_makh').show();
			    // }else{
			    //     $(tab+' input[name="makh"]').removeClass('is-invalid');
			    //     $(tab+' .alert_makh').hide();
			    // }
			    if(tenkh == ''){
			        $(tab+' input[name="nameKH"]').addClass('is-invalid');
			        $(tab+' .alert_nameKH').show();
			    }else{
			         $(tab+' input[name="nameKH"]').removeClass('is-invalid');
			        $(tab+' .alert_nameKH').hide();
			    }
			     if(number == ''){
			        $(tab+' input[name="numberKH"]').addClass('is-invalid');
			        $(tab+' .alert_number').show();
			    }else{
			         $(tab+' input[name="numberKH"]').removeClass('is-invalid');
			        $(tab+' .alert_number').hide();
			    }
			    if(diachi == ''){
			        $(tab+' input[name="diachi"]').addClass('is-invalid');
			        $(tab+' .alert_diachi').show();
			    }else{
			         $(tab+' input[name="diachi"]').removeClass('is-invalid');
			        $(tab+' .alert_diachi').hide();
			    }
			    if(phone == ''){
			        $(tab+' input[name="phone"]').addClass('is-invalid');
			        $(tab+' .alert_phone').show();
			    }else{
			          $(tab+' input[name="phone"]').removeClass('is-invalid');
			         $(tab+' .alert_phone').hide();
			    }
			    // if(email == ''){
			    //     $(tab+' input[name="email"]').addClass('is-invalid');
			    //     $(tab+' .alert_email').show();
			    // }else{
			    //      $(tab+' input[name="email"]').removeClass('is-invalid');
			    //      $(tab+' .alert_email').hide();
			    // }
			    if(account == ''){
			        $('.accountBu select[name="account"]').addClass('is-invalid');
			        $('.alert_account').show();
			    }else{
			         $('.accountBu select[name="account"]').removeClass('is-invalid');
                     $('.alert_account').hide();
			    }


			    if(tieude == '' || tenkh == '' || number =='' || diachi =='' || phone =='' || account == '')
			    {
			        return false;
			    }
			    return true;
			}
	</script>
	
				@stop
