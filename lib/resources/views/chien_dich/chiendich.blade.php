@extends('master')
@section('title','Chiến dịch zalo')
@section('main')
			<!-- Content area -->
			<div class="content">
                <style>
                	.thumbnail {
					    display: block;
					    padding: 4px;
					    margin-bottom: 20px;
					    line-height: 1.42857143;
					    background-color: #fff;
					    border: 1px solid #ddd;
					    border-radius: 4px;
					    -webkit-transition: border .2s ease-in-out;
					    -o-transition: border .2s ease-in-out;
					    transition: border .2s ease-in-out;
					}
					.bt-key-search .fa-search {
					    position: absolute;
					    right: 29px;
					    top: 2%;
					    color: #e0e6ed;
					}
					.bt-key-search-mess .fa-search {
					    position: absolute;
					    right: 29px;
					    top: 2%;
					    color: #e0e6ed;
					}
					#search-stm1{
						border: 1px solid #00bcd4 !important;
					}
					.alert_content{
						display: none;
					}
					.example-2 {
					    position: relative;
					    overflow-y: scroll;
					    height: 400px;
					}
					.bt-load-chat {
					    padding: 10px;
					    padding-right: 0px;
					    border-bottom: 1px solid #e0e6ed;
					    float: left;
					    width: 100%;
					}
					.bt-avatar-user-chat {
					    vertical-align: middle;
					    border-radius: 50%;
					    overflow: hidden;
					    width: 50px;
					    height: 50px;
					    position: relative;
					    top: 5%;
					    float: left;
					    margin-right: 10px;
					    margin-top: 1%;
					}
					.bt-avatar-user-chat img {
					    width: 100%;
					    height: 100%;
					    object-fit: cover;
					}
                </style>
				@include('errors.note')
             <!-- Form inputs -->
                <!-- Page header -->
               
			<div class="page-header">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
			            
			            <span class="breadcrumb-item active">Chiến dịch</span>
			        </div>

			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>

			    <div class="header-elements d-none">
			        
			    </div>
			</div>
			</div>
			<!-- /page header -->
				<div class="card">
					 <div class="alert alert-warning alert-styled-left alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
					Để sử dụng tính năng này, bạn vui lòng chạy trước phần livechat->chatprofile.
			    </div>
					<ul class="nav nav-tabs nav-tabs-solid border-0">
		                <li class="nav-item" {{-- onclick="clickTablChiendich('profile')" --}}><a href="#tabProfile" class="nav-link active show" data-toggle="tab"><i class="icon-indent-decrease2 mr-1"></i> Chiến dịch Profile</a></li>
		                
		                <li class="nav-item" {{-- onclick="clickTablChiendich('OA')" --}}><a href="#tabOA" class="nav-link" data-toggle="tab"><i class="icon-unlink2 mr-1 icon-1x"></i>Chiến dịch OA</a></li>
		            </ul>
                      <div class="tab-content">
                      	<div class="tab-pane fade active show" id="tabProfile">
                      		 <div class="table-responsive">
				        	<form method="POST" action="" class="uploadimgproduct">
				        		{{ csrf_field() }}
							    <div class="form-group col-md-6" style="padding-top: 15px;">
							        <label><b>Tên chiến dịch</b></label>
							        <input required="" type="text" name="name_camp" class="form-control name_camp" placeholder="Nhập tên chiến dịch ở đây...">
							    </div>
							    <div class="col-md-12">
							        <div class="row">
							            <div class="col-md-6">
							                <div class="col-md-12" style="padding: 0px;margin-left: 15px;">
							                    <label><b>Danh sách tài khoản zalo</b></label>
							                    {{-- <span class="bt-load-ajax" style="float: right; display: inline-block;"><i class="fa fa-refresh fa-spin"></i></span> --}}
							                    <a id="bt-load-actor-send" style="float: right;" href="javascript:void(0)" title="" class="btn btn-primary"><i class="icon-spinner4 spinner"></i> Tải danh sách</a>
							                    <select id="bt-load-actor" class="form-control checkloadcampselect" size="8">
                                                      @if($status !=1)
                                                     @foreach($account as $row)
							                        <option class="profile_{{ $row->zalo_id }}" @if($row->checkcookie == 1)disabled style="color: red;" @endif value="{{ $row->zalo_id }}" data-cookie="{{ $row->cookie }}" data-env="{{ $row->serectkey }}" data-name="{{ $row->name }}">{{ $row->name }}</option>  
                                                     @endforeach
                                                     @else
                                                        @foreach($account as $row)

							                             @foreach ($role_profile as $value)

							                                @if($value == $row->zalo_id)
                                                               <option class="profile_{{ $row->zalo_id }}" @if($row->checkcookie == 1)disabled style="color: red;" @endif value="{{ $row->zalo_id }}" data-cookie="{{ $row->cookie }}" data-env="{{ $row->serectkey }}" data-name="{{ $row->name }}">{{ $row->name }}</option>  

							                                @endif

							                            @endforeach

							                            @endforeach
                                                     @endif
							                    </select>
							                </div>
							                <div class="col-md-12 box-token-camp" style="display: none;">
							                    <p style="margin-bottom: 5px;"><b><i class="fa fa-code"></i> Token</b></p>
							                    <span><i>{name}: Tên khách hàng</i></span><br>
							                </div>
							                <div class="col-md-12" style="padding-top: 15px;">
							                    <label><b>Nội dung nhắn tin</b></label>
							                    <textarea style="width: 100%" class="noidungtinnhan" rows="6" placeholder="Nhập nội dung tại đây..."></textarea>
							                </div>
							                <div class="col-md-12">

							                    <div class="form-group chiendich">
							                    	
							                    	{{ csrf_field() }}
													<label  class="title_text">Ảnh:</label>
													<input  id="imagechiendich" type="file" name="file" accept=".png, .jpg, .jpeg, .gif" class="form-control hidden" onchange="changeImgchiendich(this)" hidden>
													<input type="text" id="nameimg" name="linkIMG" value="" hidden class="linkIMG">
								                    <img id="avatar" class="thumbnail" width="300px" src="global_assets/images/new_seo-10-512.png">
								                   
												</div>
							                    <p style="color: red">Chú ý: chỉ được upload ảnh dưới 0.5MB.</p>
							                    <p style="color: red">Chú ý: thời gian giãn cách gửi tin là 1 phút/người.</p>
							                </div>
							            </div>
							            <div class="col-md-6">
							                <div class="hidden-table" style="display: none;border: 1px solid rgb(204, 204, 204); padding: 5px;">
							                    <div>
							                        <select class="btn btn-primary theloaichiendich">
							                            <option value="0">--Chọn thể loại chiến dịch--</option>
							                            <option value="1">Nhắn tin theo thẻ tag</option>
							                            <option value="2">Nhắn tin tới những người đã nhắn tin</option>
							                            <option value="3">Nhắn tin tới bạn bè</option>
							                            <option value="4" data-toggle="modal" data-target="#listphone">Nhắn tin tới số điện thoại</option>
							                        </select>
							                         <div class="bt-key-search" style="width: 30%; float: right; display: none;">
								                        <input type="text" name="keywords" class="form-control" id="search-stm1" onkeyup="searchFriendChien_dich(this)" placeholder="Tìm kiếm bạn bè">
								                        <i class="fa fa-search pointer"></i>
								                    </div>
								                    <div class="bt-key-search-mess" style="width: 30%; float: right; display: none;">
								                        <input type="text" name="keywords" class="form-control" id="search-stm1" onkeyup="searchMessChien_dich(this)" placeholder="Tìm kiếm">
								                        <i class="fa fa-search pointer"></i>
								                    </div>
								                    
							                    </div>
							                   
							                    <div>Vui lòng chọn thể loại chiến dịch</div>

							                    <div class="card">
													
													<div class="table-responsive table-scrollable">
														<table class="table bt-table row-border table scroll" id="tableClientLoadTinnhan" style="width: 100%; display: none;">
															<thead>
																<tr class="bg-warning">
																	<th class="bt-fix-sort-tb" style="width: 10%;"><input id="get_all_client_send" type="checkbox" name="" value="" onclick="choiceall(this)"></th>
																	<th>Tên khách hàng</th>
																	<th>Type</th>
																	<th>Ngày nhắn tin</th>
																</tr>
															</thead>
															<tbody id="bt-load-client-content">
																
															</tbody>
														</table>
													</div>
												</div>
                                                {{-- table tab --}}
							                    <table id="tableClientLoadtag" class="bt-table row-border table scroll" style="width: 100%;display: none;">
							                        <thead class="">
							                            <tr>
							                                <th class="bt-fix-sort-tb"><input id="get_all_client_send" type="checkbox" name="" value="" style="width: 20%;" onclick="choiceall(this)"></th>
							                                <th class="bt-fix-sort-tb" style="width: 40%;">Tên thẻ</th>
							                                <th class="bt-fix-sort-tb" style="width: 40%;">Màu sắc</th>
							                            </tr>
							                        </thead>
							                        <tbody id="bt-load-client-content">
							                        </tbody>
							                    </table>

			                    				<div class="card">

													<div class="table-responsive table-scrollable">
														<table class="table bt-table row-border table scroll" id="tableClientLoadFriend" style="width: 100%;display: none;">
															<thead>
																<tr class="bg-warning">
																	<th class="bt-fix-sort-tb"><input id="get_all_client_send" type="checkbox" name="" value="" style="width: 20%;" onclick="choiceall(this)"></th>
																	<th>Hình ảnh</th>
																	<th>Tên</th>
																	
																</tr>
															</thead>
															<tbody id="bt-load-client-content">
																
															</tbody>
														</table>
													</div>
												</div>

												<div class="card">

													<div class="table-responsive table-scrollable">
														<table class="table bt-table row-border table scroll" id="tablePhoneLoadFriend" style="width: 100%;display: none;">
															<thead>
																<tr class="bg-warning">
																	<th class="bt-fix-sort-tb"><input id="get_all_client_send" type="checkbox" name="" value="" style="width: 20%;" onclick="choiceall(this)"></th>
																	<th>Phone</th>
																	<th>Hình ảnh</th>
																	<th>Tên</th>
																	
																</tr>
															</thead>
															<tbody id="bt-load-client-content">
																
															</tbody>
														</table>
													</div>
												</div>
							                    

							                    <input type="hidden" value="" class="allcustomerselected" name="allcustomerselected">
							                </div>
							            </div>
							        </div>
							     
							        <div class="row">
							            
							            <div class="col-md-12">
							                <a style="margin-top: 15px !important; color: #FFFF" class="btn btn-primary submitsend"><i class="icon-paperplane mr-3 style_icon"></i>Gửi ngay</a>
							                @if(Auth::user()->id == 21)
							                  <a data-toggle="modal" data-target="#modalnangcao" style="margin-top: 15px !important; color: #FFFF;" class="btn btn-primary sendnangcao"><i class="icon-cogs mr-3"></i>Lên lịch gửi chiến dịch</a>
							                @endif
							            </div>
							             <div class="messageBox" style="padding-top: 23px;"></div>
							        </div>
							    </div>
							</form>

				          </div>
                      	</div>

                      	<div class="tab-pane fade" id="tabOA">{{-- <p style="color: red;">Tính Năng đang phát triển</p> --}}
                      		{{-- @if($active  == 1) --}}
                      		 {{-- kiểm tra active --}}
                            <div class="table-responsive">
				        	<form method="POST" action="" class="uploadimgproductOA">
				        		{{ csrf_field() }}
							    <div class="form-group col-md-6" style="padding-top: 15px;">
							        <label><b>Tên chiến dịch</b></label>
							        <input required="" type="text" name="name_camp_oa" class="form-control name_camp" placeholder="Nhập tên chiến dịch ở đây...">
							    </div>
							    <div class="col-md-12">
							        <div class="row">
							            <div class="col-md-6">
							                <div class="col-md-12" style="padding: 0px;margin-left: 15px;">
							                    <label><b>Danh sách tài khoản Zalo Official</b></label>

							                    <a id="bt-load-actor-send-oa" style="float: right;" href="javascript:void(0)" title="" class="btn btn-primary"><i class="icon-spinner4 spinner"></i> Tải danh sách</a>
							                    <select id="bt-load-actor-oa" class="form-control checkloadcampselectOA" size="8" name="OAId">
							                    	@if($status != 1)
	                                                    @foreach($accountOA as $row)
	                                                    <option class="oa_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}" data-zaloId="{{ $row->zalo_id }}" data-token="" data-name="">{{ $row->name }}</option>  
	                                                    @endforeach
	                                                @else
	                                                   @foreach($accountOA as $row)
	                                                      @foreach($role_page as $value)
                                                             @if($value == $row->zalo_id)
                                                                <option class="oa_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}" data-zaloId="{{ $row->zalo_id }}" data-token="" data-name="">{{ $row->name }}</option>  
                                                             @endif
	                                                      @endforeach
	                                                   @endforeach
	                                                @endif
							                    </select>
							                </div>
							                <div class="col-md-12 box-token-camp" style="display: none;">
							                    <p style="margin-bottom: 5px;"><b><i class="fa fa-code"></i> Token</b></p>
							                    <span><i>{name}: Tên khách hàng</i></span><br>
							                </div>
							                <div class="col-md-12" style="padding-top: 15px;">
							                    <label><b>Nội dung nhắn tin</b></label>
							                    <textarea style="width: 100%" class="noidungtinnhan_oa" rows="6" placeholder="Nhập nội dung tại đây..."></textarea>
							                    <em class="text-danger alert_content">Vui lòng nhập nội dung chiến dịch</em>
							                </div>
							                <div class="col-md-12">

							                    <div class="form-group chiendich">
							                    	
							                    	{{ csrf_field() }}
													<label  class="title_text">Ảnh:</label>
													<input  id="imagechiendichOA" type="file" name="file" accept=".png, .jpg, .jpeg, .gif" class="form-control hidden" onchange="changeImgchiendichOA(this)" hidden>
													<input type="text" id="nameimg" name="linkIMG" value="" hidden class="linkIMG">
								                    <img id="avatarOA" class="thumbnail" width="300px" src="global_assets/images/new_seo-10-512.png">
								                   
												</div>
							                    <p style="color: #0066ff;"><strong style="color: red;">Chú ý:</strong> chỉ được upload ảnh dưới 0.5MB.</p>
							                    <p style="color: #0066ff;"><strong style="color: red;">Chú ý:</strong> thời gian giãn cách gửi tin là 30s /người.</p>
							                </div>
							            </div>
							            <div class="col-md-6">
							                <div class="hidden-table" style="display: none;border: 1px solid rgb(204, 204, 204); padding: 5px;">
							                    <div>
							                        <select class="btn btn-primary theloaichiendichOA" name="theloaiOA">
							                            <option value="0">--Chọn thể loại chiến dịch--</option>
							                            <option value="1">Nhắn tin tới những người đã nhắn tin</option>
							                            <option value="2">Gửi tin đến người đã quan tâm shop</option>
							                        </select>
							                         <div class="bt-key-search" style="width: 30%; float: right; display: none;">
								                        <input type="text" name="keywords" class="form-control" id="search-stm1" onkeyup="searchFriendChien_dich(this)" placeholder="Tìm kiếm bạn bè">
								                        <i class="fa fa-search pointer"></i>
								                    </div>
								                    <div class="bt-key-search-mess" style="width: 30%; float: right; display: none;">
								                        <input type="text" name="keywords" class="form-control" id="search-stm1" onkeyup="searchMessChien_dich(this)" placeholder="Tìm kiếm">
								                        <i class="fa fa-search pointer"></i>
								                    </div>
								                    
							                    </div>
							                   
							                    <div>Vui lòng chọn thể loại chiến dịch</div>

							                    <div class="card">
													
													<div class="table-responsive table-scrollable">
														<table class="table bt-table row-border table scroll" id="tableClientLoadTinnhan" style="width: 100%; display: none;">
															<thead>
																<tr class="bg-warning">
																	<th class="bt-fix-sort-tb" style="width: 10%;"><input id="get_all_client_send" type="checkbox" name="" value="" onclick="choiceall(this)"></th>
																	<th>Tên khách hàng</th>
																	<th>Type</th>
																	<th>Ngày nhắn tin</th>
																</tr>
															</thead>
															<tbody id="bt-load-client-content">
																
															</tbody>
														</table>
													</div>
												</div>
                                                {{-- table tab --}}
							                    <table id="tableClientLoadtag" class="bt-table row-border table scroll" style="width: 100%;display: none;">
							                        <thead class="">
							                            <tr>
							                                <th class="bt-fix-sort-tb"><input id="get_all_client_send" type="checkbox" name="" value="" style="width: 20%;" onclick="choiceall(this)"></th>
							                                <th class="bt-fix-sort-tb" style="width: 40%;">Tên thẻ</th>
							                                <th class="bt-fix-sort-tb" style="width: 40%;">Màu sắc</th>
							                            </tr>
							                        </thead>
							                        <tbody id="bt-load-client-content">
							                        </tbody>
							                    </table>

							                    				<div class="card">

																	<div class="table-responsive table-scrollable">
																		<div class="img-load-oa" style="text-align: center; display: none;">
														                    
														                    <img src="https://whitefish.skyrun.com/components/com_jomholiday/assets/images/04-spinner.gif" style="height: 80px;">
														                    <h5 style="color: #2196f3;" class="contentloader">Đang tải danh sách...</h5>
														                  </div>
																		<table class="table bt-table row-border table scroll" id="tableClientLoadSendMess" style="width: 100%;display: none;">
																			<thead>
																				<tr class="bg-warning">
																					<th class="bt-fix-sort-tb"><input id="get_all_client_send" type="checkbox" name="" value="" style="width: 20%;" onclick="choiceall(this)"></th>
																					<th>Hình ảnh</th>
																					<th>Tên</th>
																					
																				</tr>
																			</thead>
																			<tbody id="bt-load-client-content-sendMess-Oa">
																				
																			</tbody>
																		</table>

																		<table class="table bt-table row-border table scroll" id="tableClientLoadNQT" style="width: 100%;display: none;">
																			<thead>
																				<tr class="bg-warning">
																					<th class="bt-fix-sort-tb"><input id="get_all_client_send" type="checkbox" name="" value="" style="width: 20%;" onclick="choiceall(this)"></th>
																					<th>Hình ảnh</th>
																					<th>Tên</th>
																					
																				</tr>
																			</thead>
																			<tbody id="bt-load-client-content-Nguoi-Quan-Tam">
																				
																			</tbody>
																		</table>
																	</div>
																</div>
							                    

							                    <input type="hidden" value="" class="allcustomerselected" name="allcustomerselected">
							                </div>
							            </div>
							        </div>
							     
							        <div class="row">
							            
							            <div class="col-md-12">
							                <a style="margin-top: 15px !important; color: #FFFF" class="btn btn-primary sendMessOa"><i class="icon-paperplane mr-3 style_icon"></i>Gửi ngay</a>
							            </div>
							             <div class="messageBox" style="padding-top: 23px;"></div>
							        </div>
							    </div>
							</form>

				          </div>
				          {{-- kiểm tra active --}}
				         {{--  @endif --}}

                      	</div>
                      </div>
				        
				</div>

			</div>
			
			<!-- The Modal -->
			  <div class="modal" id="listphone">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <!-- Modal Header -->
			        <div class="modal-header bg-warning">
			          <h4 class="modal-title">Danh sách số điện thoại</h4>
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <!-- Modal body -->
			        <div class="modal-body">
			        	<div class="alert alert-success thongbao" style="display: none; background-color: #00a65a; color: #FFFF;">
						 
						</div>
			          	<textarea class="dataphone" style="width: 100%;height: 200px;"></textarea>
			          	<p style="color: red">Chú ý: Mỗi ngày bạn nên gửi 50 tin nhắn để tránh spam.</p>
			          	<p style="color: red">Chú ý: Mỗi giờ bạn chỉ được gửi tin nhắn tới 10 số điện thoại.</p>
			          	<p style="color: red">Chú ý: Thời gian lọc giãn cách mỗi sdt là 3s</p>
			          	{{-- <div class="alert alert-danger alert-styled-left alert-dismissible" style="border-color:#e53935;"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="fa fa-undefined-sign" aria-hidden="true"></span>&nbsp;Tính năng này tạm đóng để tiến hành cập nhật , nâng cấp. Xin cảm ơn</div> --}}
			        </div>
			        <!-- Modal footer -->
			        <div class="modal-footer">
			          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
			          <button type="button" class="btn btn-primary locsodt">Lọc</button>
			        </div>
			      </div>
			    </div>
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
					<div class="modal fade bd-example-modal-lg" id="modalnangcao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					       <!-- Modal Header -->

					        {{-- <div class="modal-header bg-warning">
					          <h4 class="modal-title">Đăng bài nâng cao</h4>
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div> --}}
					        
					         <!-- Modal body -->
					        <div class="modal-body">
					        	 <div class="row">
							      <div class="col-md-6 ml-auto">
				                 	<div class="form-group">
				                 		<label>Tài khoản zalo:</label>
				                 		<div class="card example-2 square scrollbar-dusty-grass square thin">
										    <div class="card-body bodyFriend" style="padding: 0px !important;">
										        <div class="bt-all-comment2" style="display: block;">
										        	@if($status != 1)
					                                   @foreach($account as $row)
					                                         @if($row->checkcookie !=1)
													            <div bt-type="inbox" class="bt-load-chat loadFriend boxScheduler" style=" position: relative;">
													                <input type="checkbox" class="selecteProfile zaloid_{{ $row->zalo_id }}" data-cookie="{{ $row->cookie }}" data-env="{{ $row->serectkey }}" value="{{ $row->zalo_id }}" style="display: block; float:right;">
													                <div class="bt-avatar-user-chat">
													                    <img src="{{ $row->image }}" style=" position: absolute;"> 
													                </div>
													                <div class="bt-info-chat">
													                    <div class="bt-name-chat">{{ $row->name }}</div>
													                </div>
													                <div class="owl-page"></div>
													                <div class="owl-tag pull-right wrap-color">
													                    <div class="tags-cons">
													                        <ul> 
													                        </ul>
													                    </div>
													                </div>
													            </div>
					                                    @endif
					                                   @endforeach
					                                @else
					                                 @foreach($account as $row)
					                                  @if($row->checkcookie !=1)
					                                     @foreach($role_profile as $value)
					                                       @if($value == $row->zalo_id)
					                                          <div bt-type="inbox"  class="bt-load-chat loadFriend boxSchedulers" style=" position: relative;">
													                <input type="checkbox" class="selecteProfile zaloid_{{ $row->zalo_id }}" data-type="fanpage" value="{{ $row->zalo_id }}" style="display: block; float:right;" data-cookie="{{ $row->cookie }}" data-env="{{ $row->serectkey }}">
													                <div class="bt-avatar-user-chat">
													                    <img src="{{ $row->image }}" style=" position: absolute;"> 
													                </div>
													                <div class="bt-info-chat">
													                    <div class="bt-name-chat">{{ $row->name }}</div>
													                </div>
													                <div class="owl-page"></div>
													                <div class="owl-tag pull-right wrap-color">
													                    <div class="tags-cons">
													                        <ul> 
													                        </ul>
													                    </div>
													                </div>
													            </div>
					                                       @endif
					                                     @endforeach
					                                  @endif
					                                 @endforeach
					                                  {{--  endif Status --}}
				                                   @endif
										        </div>
										    </div>
										</div>
				                 	</div>
				                 </div>
							      <div class="col-md-6 ml-auto"  style="text-align: center;" >
							      	<div class="form-group">
				                 		<label>Chọn thể loại chiến dịch:</label>
				                 		<select class="theloaichiendich2">
				                            <option value="0">--Chọn thể loại chiến dịch--</option>
				                            <option value="1">Nhắn tin theo thẻ tag</option>
				                            <option value="3">Nhắn tin tới bạn bè</option>
				                        </select>
				                        <div class="card example-2 square scrollbar-dusty-grass square thin">
										    <div class="card-body bodyFriend" style="padding: 0px !important;">
										        <div class="bt-all-comment2" style="display: block;">

										            {{-- <div bt-type="inbox" data-userid="8156121327915152395" bt-content-chat="" isfr="1" bt-id-fanpage="2340839877247952616" bt-id-profile="" class="bt-load-chat loadFriend 5716029740350556538_2340839877247952616" style=" position: relative;">
										                <input type="checkbox" class="selectepageZaloGroup checkallZaloGroup" data-type="fanpage" value="8151621222413048004" style="display: block; float:right;">
										                <div class="bt-avatar-user-chat">
										                    <img src="https://s120-ava-talk.zadn.vn/a/3/1/1/1/120/72c8e452e55604c8aa1c40ed8ff3bd8e.jpg" style=" position: absolute;"> 
										                </div>
										                <div class="bt-info-chat">
										                    <div class="bt-name-chat">Hương Giáp</div>
										                </div>
										                <div class="owl-page"></div>
										                <div class="owl-tag pull-right wrap-color">
										                    <div class="tags-cons">
										                        <ul> 
										                        </ul>
										                    </div>
										                </div>
										            </div> --}}

										        </div>
										    </div>
										</div>

				                 	</div>
							      </div>
							    </div>
					          	
					        </div>
					        
					        <!-- Modal footer -->
					        <div class="modal-footer">
					          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
					          <button type="button" class="btn btn-primary">Bắt đầu chạy</button>
					        </div>
					    </div>
					  </div>
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
			<!-- /content area -->
			<script>
				var imgchiendichOA = '';
				function changeImgchiendichOA(input){
				    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
				    if(input.files && input.files[0]){
				        var reader = new FileReader();
				        //Sự kiện file đã được load vào website
				        reader.onload = function(e){
				            //Thay đổi đường dẫn ảnh
				            $('#avatarOA').attr('src',e.target.result);
				           // $('.image_1').html('<img src="'+e.target.result+'">');
				        }
				        reader.readAsDataURL(input.files[0]);
				    }
				}
				$(document).ready(function() {
				    $('#avatarOA').click(function(){
				        $('#imagechiendichOA').click();
				    });
				});
                  // upload img
                  $('#imagechiendichOA').change(function(){ 
						var file = this.files[0];
						 var _token = $('.chiendich input[name="_token"]').val(); 
						    var formData = new FormData($('.uploadimgproductOA')[0]);
						    formData.append('_token', _token);
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
							      imgchiendichOA = data.path;

							      
							     }
							   });

				    
				});
				 function searchFriendChien_dich(ob){
                      var value = $(ob).val().toLowerCase();
						$(".table-scrollable .odd").filter(function() {
							$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
						});
				 }
				 function searchMessChien_dich(ob){
                      var value = $(ob).val().toLowerCase();
						$(".table-scrollable .odd-mess").filter(function() {
							$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
						});
				 }

				  $('#bt-load-actor-send-oa').on('click',function(){

                    $('.img-load-oa').show();
					$('.bt-load-ajax').css('display','inline-block');
					$('#bt-load-client-content').html('');
					$('.allcustomerselected').val('');
					$('.hidden-table').show();
					var _token = $('input[name="_token"]').val();
					var check = 0;
					$('#bt-load-actor-oa option:selected').each(function(){
						$('.img-load-oa').hide();
						check = 1;
						// var zaloid = $(this).attr('data-zaloId');
						//  $.ajax({
					 //            url: '{{ url('chiendich/getDataZaloOa') }}',
					 //            type: 'post',
					 //            dataType: 'json',
					 //            data: {zaloid:zaloid, _token:_token},
					           
					 //            success:function(result){
					 //            	if(result.status == 200){
					 //            		 var html = '';
					 //            		 $('.img-load-oa').hide();
					 //            		for (var i = 0; i < result.data.length; i++) {
					            			
      //                              html += '<tr role="row" class="odd"><td class="sorting_" style="width: 20%;"><input name="client_camp[fanpage:461][]" class="dataSendOa data_client_send" gender_client="undefined" name_client="'+result.data[i].name+'" type="checkbox" value="'+result.data[i].user_id+'" data-userApp="'+result.data[i].user_id_by_app+'" ></td><td style="width: 40%"><img src="'+result.data[i].avatar+'"/ style="width: 45px; height: 45px;"></td><td style="width: 40%">'+result.data[i].name+'</td></tr>';
					 //            		}
					 //            		$('#tableClientLoadSendMess #bt-load-client-content-sendMess-Oa').html(html);
					 //            	}
					              
					 //            },
					 //        });
					});
					if (check == 0) {
						var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn tài khoản zalo để lấy thống tin.</p>';
		                $('.contentpoppup').html(html);
		                $('#popupmess').modal('show');
						return false;
					}
					
				});

				   $('.theloaichiendichOA').change(function(){
                         $('.img-load-oa').show();
						var dataselect = $(this).val();
						var id_oa = $('.checkloadcampselectOA').val();
						var _token = $('input[name="_token"]').val();
						if(dataselect == 1){
							 $.ajax({
					            url: '{{ url('chiendich/getDataZaloOa') }}',
					            type: 'post',
					            dataType: 'json',
					            data: {zaloid:id_oa, _token:_token},
					           
					            success:function(result){
					            	if(result.status == 200){
					            		 var html = '';
					            		 $('.img-load-oa').hide();
					            		for (var i = 0; i < result.data.length; i++) {
					            			
                                   html += '<tr role="row" class="odd"><td class="sorting_" style="width: 20%;"><input name="client_camp[fanpage:461][]" class="dataSendOa data_client_send" gender_client="undefined" name_client="'+result.data[i].name+'" type="checkbox" value="'+result.data[i].user_id+'" data-userApp="'+result.data[i].user_id_by_app+'" ></td><td style="width: 40%"><img src="'+result.data[i].avatar+'"/ style="width: 45px; height: 45px;"></td><td style="width: 40%">'+result.data[i].name+'</td></tr>';
					            		}
					            		$('#tableClientLoadSendMess #bt-load-client-content-sendMess-Oa').html(html);
					            	}
					              
					            },
					        });
                          
						}else if(dataselect == 2){
                             $.ajax({
					            url: '{{ url('chiendich/getNguoiQuanTam') }}',
					            type: 'post',
					            dataType: 'json',
					            data: {zaloid:id_oa, _token:_token},
					           
					           success: function( result, textStatus, jQxhr ){
					
									},
								error: function( jqXhr, textStatus, errorThrown ){ 
								},
								complete: function( data, textStatus, jQxhr){
                                      $('.img-load-oa').hide();
                                     $('#tableClientLoadNQT #bt-load-client-content-Nguoi-Quan-Tam').html(data.responseText);
									
									$('.loader-zalo').hide();
									
								}
					        });
						}
						

				   });

				  $('.theloaichiendichOA').change(function(){
                      var dataselect = $(this).val();
                      if (dataselect == 1) {
                        $('#tableClientLoadSendMess').show();
                        $('#tableClientLoadNQT').hide();
                      }else{
                      	$('#tableClientLoadNQT').show();
                      	$('#tableClientLoadSendMess').hide();
                      }
				  });

				  $('.sendMessOa').on('click',function(){
				  	  var dataSend = [];
				  	  var dataSendQT = [];
                      var _token = $('input[name="_token"]').val();
					  var tenchiendich = $('.name_camp_oa').val();
					  var noidungtinnhan = $('.noidungtinnhan_oa').val();
					  var dataselect = $('select[name="theloaiOA"]').val();
					  var check = 0;
                      
                     
                     if(noidungtinnhan == ''){

					        $('.noidungtinnhan_oa').addClass('is-invalid');
					        $(' .alert_content').show();
					        return false;
					    }else{

					        $(' .noidungtinnhan_oa').removeClass('is-invalid');
					        $(' .alert_content').hide();
					    }

					 var zaloid = $('select[name="OAId"]').val();
                     if(dataselect == 1){
                     	$('.dataSendOa:checked').each(function(){
							dataSend.push($(this).val());
							check = 1;
							
						  });
                     	if(check == 0){
		                        var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn bạn bè cần gửi chiến dịch.</p>';
				                $('.contentpoppup').html(html);
				                $('#popupmess').modal('show');
								 return false;
		                     }

                           $.ajax({
					            url: '{{ url('chiendich/getDataSendSK') }}',
					            type: 'post',
					            dataType: 'json',
					            data: {zaloid:zaloid, _token:_token},
					           
					            success:function(result){
					            	if(result.status == 200){

					            		var k = 0;
					            		var j = 0;
					            		$('.loader-zalo').show();
					            		var html = 'Đang gửi chiến dịch. Tiến độ: <span id="countSend"  style="color: red;"></span>/<span>'+dataSend.length+'</span>'; 
					            		$(".contentloader").html(html);
					            		var content = noidungtinnhan.replace(/(?:\r\n|\r|\n)/g, '\\n');
					            		for (var i = 0; i < dataSend.length; i++) {
					            			 setTimeout( function timer(){
					            			 	  var params = {};
					            			 	  params['zaloUserid']  = dataSend[k];
					            			 	  params['content']  = String(content);
					            			 	  params['tkn']  = result.data;
					            			 	  params['img']  = imgchiendichOA;
					            			 	  params['_token']   = _token;
 
					            			 	  $.ajax({
											            url: '{{ url('chiendich/sendMessageOA') }}',
											            type: 'post',
											            dataType: 'json',
											            data: params,
											            success:function(result){
											            	
											              
											            },
											        });

					            			 	
                                                k++;
                                                 var html2 = '<span>'+k+'</span>';
                                                 $('#countSend').html(html2);
                                                 if(imgchiendichOA == ''){
                                                 	 if(k == dataSend.length){
                                                 	$('.loader-zalo').hide();
                                                	 $("p").remove(".contentmess");
									    		     var html3 = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Gửi chiến dịch hoàn thành.</p>';
														 $('.contentpoppup').html(html3);
														$('#popupmess').modal('show');
                                                    }
                                                 }
                                                
					            			 }, i*30000 );
					            			 if(imgchiendichOA != ''){
					            			 	setTimeout( function timer(){
					            			 	  var params = {};
					            			 	  params['zaloUserid']  = dataSend[j];
					            			 	  params['content']  = noidungtinnhan;
					            			 	  params['tkn']  = result.data;
					            			 	  params['img']  = imgchiendichOA;
					            			 	  params['_token']   = _token;
 
					            			 	  $.ajax({
											            url: '{{ url('chiendich/sendMessageImgOA') }}',
											            type: 'post',
											            dataType: 'json',
											            data: params,
											            success:function(result){
											            	
											              
											            },
											        });

					            			 	
                                                j++;
                                                if(j == dataSend.length){
                                                	$('.loader-zalo').hide();
                                                	 $("p").remove(".contentmess");
									    		     var html3 = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Gửi chiến dịch hoàn thành.</p>';
														 $('.contentpoppup').html(html3);
														$('#popupmess').modal('show');
                                                }
					            			 }, i*40000 );
					            			 }
					            		}
					            	
					            	}
					              
					            },
					        });
                     }else if(dataselect == 2){
                        $('.dataSendOaQT:checked').each(function(){
							dataSendQT.push($(this).val());
							check = 1;
							
						 });
						if(check == 0){

		                        var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn bạn bè cần gửi chiến dịch.</p>';
				                $('.contentpoppup').html(html);
				                $('#popupmess').modal('show');
								 return false;
		                     }
		                 $.ajax({
					            url: '{{ url('chiendich/getDataSendSK') }}',
					            type: 'post',
					            dataType: 'json',
					            data: {zaloid:zaloid, _token:_token},
					           
					            success:function(result){
					            	if(result.status == 200){
					            		var k = 0;
					            		var j = 0;
					            		$('.loader-zalo').show();
					            		var html = 'Đang gửi chiến dịch. Tiến độ: <span id="countSend"  style="color: red;"></span>/<span>'+dataSendQT.length+'</span>'; 
					            		$(".contentloader").html(html);
					            		for (var i = 0; i < dataSendQT.length; i++) {
					            			
					            			 setTimeout( function timer(){
					            			 	 var params = {};
					            			 	  params['zaloUserid']  = dataSendQT[k];
					            			 	  params['content']  = noidungtinnhan;
					            			 	  params['tkn']  = result.data;
					            			 	  params['img']  = imgchiendichOA;
					            			 	  params['_token']   = _token;
 
					            			 	  $.ajax({
											            url: '{{ url('chiendich/sendMessageOA') }}',
											            type: 'post',
											            dataType: 'json',
											            data: params,
											            success:function(result){
											            	
											              
											            },
											        });

					            			 	
                                                k++;
                                                 var html2 = '<span>'+k+'</span>';
                                                 $('#countSend').html(html2);
                                                 
                                                if(imgchiendichOA == ''){
                                                 if(k == dataSend.length){
                                                 	$('.loader-zalo').hide();
                                                	 $("p").remove(".contentmess");
									    		     var html3 = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Gửi chiến dịch hoàn thành.</p>';
														 $('.contentpoppup').html(html3);
														$('#popupmess').modal('show');
                                                   }
                                                 }
					            			 }, i*30000 );
					            			  if(imgchiendichOA != ''){
					            			 	setTimeout( function timer(){
					            			 	  var params = {};
					            			 	  params['zaloUserid']  = dataSendQT[j];
					            			 	  params['content']  = noidungtinnhan;
					            			 	  params['tkn']  = result.data;
					            			 	  params['img']  = imgchiendichOA;
					            			 	  params['_token']   = _token;
 
					            			 	  $.ajax({
											            url: '{{ url('chiendich/sendMessageImgOA') }}',
											            type: 'post',
											            dataType: 'json',
											            data: params,
											            success:function(result){
											            	
											              
											            },
											        });

					            			 	
                                                j++;
                                                if(j == dataSendQT.length){
                                                	$('.loader-zalo').hide();
                                                	 $("p").remove(".contentmess");
									    		     var html3 = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Gửi chiến dịch hoàn thành.</p>';
														 $('.contentpoppup').html(html3);
														$('#popupmess').modal('show');
                                                }
					            			  }, i*40000 );
					            			 }
					            		}
					            	
					            	}
					              
					            },
					        });


                     }  

				  });

				
			</script>
			@stop


			