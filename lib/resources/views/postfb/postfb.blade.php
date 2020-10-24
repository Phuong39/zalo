@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
				<style>
					.slider {
					    position: absolute;
					    cursor: pointer;
					    top: 0;
					    left: 0;
					    right: 0;
					    bottom: 0;
					    background-color: #ccc;
					    -webkit-transition: .4s;
					    /* transition: .4s; */
					}
					.slider.round {
						    border-radius: 34px;
						}
						input:checked + .slider {
					    background-color: #2196F3 !important;
					}
					.switch {
					    position: relative;
					    display: inline-block;
					    width: 32px;
					    height: 18px;
					    margin: 0;
					    vertical-align: middle;
					}
					.checkbox-style {
						    display: none !important;
						}
						.switch {
							  position: relative;
							  display: inline-block;
							  width: 60px;
							  height: 34px;
							}

							.switch input { 
							  opacity: 0;
							  width: 0;
							  height: 0;
							}

							.slider {
							  position: absolute;
							  cursor: pointer;
							  top: 0;
							  left: 0;
							  right: 0;
							  bottom: 0;
							  background-color: #ccc;
							  -webkit-transition: .4s;
							  transition: .4s;
							}

							.slider:before {
							  position: absolute;
							  content: "";
							  height: 26px;
							  width: 26px;
							  left: 4px;
							  bottom: 4px;
							  background-color: white;
							  -webkit-transition: .4s;
							  transition: .4s;
							}

							input:checked + .slider {
							  background-color: #2196F3;
							}

							input:focus + .slider {
							  box-shadow: 0 0 1px #2196F3;
							}

							input:checked + .slider:before {
							  -webkit-transform: translateX(26px);
							  -ms-transform: translateX(26px);
							  transform: translateX(26px);
							}

							/* Rounded sliders */
							.slider.round {
							  border-radius: 34px;
							}

							.slider.round:before {
							  border-radius: 50%;
							}
							.viewtoken{
								width: 160px;
							    overflow: hidden;
							    white-space: nowrap; 
							    text-overflow: ellipsis;
							}
												</style>
				   <!-- Page header -->
							<div class="page-header">
								<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
							    <div class="d-flex">
							        <div class="breadcrumb">
							            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
							            <a href="#" class="breadcrumb-item">Đăng bài theo facebook</a>
							            <span class="breadcrumb-item active">cấu hình</span>
							        </div>

							        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
							    </div>

							    <div class="header-elements d-none">

							    </div>
							</div>
							</div>
							<!-- /page header -->
                     <div class="content-wrapper addMargin" style="min-height: 316px;">
						    <section class="content-header">
						    </section>
						    <section class="content container-fluid" style="border: 1px solid #2395f3; border-radius: 10px;">
						        <div class="alerts"></div>
						        <div class="homeMessageBox"></div>
						        <form action="https://zalo.phanmemninja.com/postfb" id="postForm" name="postForm" method="post" accept-charset="utf-8">
						           {{ @csrf_field() }}
						            <div class="row">
						                <div class="col-sm-12">
						                    <input type="hidden" name="postId" id="postId" value="">
						                    <div class="panel panel-default">
						                        <div class="panel-body">
						                            <div class="form-group">
						                                <label>Token tài khoản facebook</label>
						                                <button onclick="return false;" class="btn btn-warning" style="float: right;margin-bottom: 0.5rem;" id="listtoken">
						                               <i class="icon-file-text2 mr-2" ></i> List Token & ID 
						                                </button>
						                                <textarea id="autotokenpagefb" style="width: 100%;" class="form-control" rows="8"></textarea>
						                                <label>Id trang facebook hoặc Id Nhóm facebook (id nhóm đã tham gia)</label>
						                                <textarea id="autoid_page" style="width: 100%;" class="form-control"></textarea>
						                                <textarea id="autoid_group" style="width: 100%;display: none;"></textarea>
						                                {{-- <label>Số lượng bài viết muốn đăng</label>
						                                <input type="text" name="" id="autosoluong" style="width: 100%;" class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57 || event.charCode == 46">
						                            </div> --}}
						                            {{-- <div class="form-group">
						                                <label>Thời gian của bài viết</label>
						                                <div class="input-group date">
						                                    <input type="text" class="form-control" id="autoscheduledPostTime1">
						                                    <span class="input-group-addon">
						                                    <span class="fa fa-calendar"></span>
						                                    </span>
						                                </div>
						                            </div> --}}
						                            <div class="form-group">
						                                <label>Chọn thể loại bài viết</label>
						                                <div class="form-group groupVtoggle">
						                                    <label class="switch">
						                                    <input type="checkbox" class="checkbox-style" id="autogetimage" name="getimage" aria-label="Unique post" checked="">
						                                    <span class="slider round"></span>
						                                    </label>
						                                    <label for="getimage" class="input-text">Hình ảnh</label>
						                                </div>
						                                <div class="form-group groupVtoggle">
						                                    <label class="switch">
						                                    <input type="checkbox" class="checkbox-style" id="autogetvideo" name="getvideo" aria-label="Unique post" checked="">
						                                    <span class="slider round"></span>
						                                    </label>
						                                    <label for="getvideo" class="input-text">Video</label>
						                                </div>
						                            </div>
						                            <div class="form-group">
						                               {{--  <button onclick="return false;" class="btn btn-primary" id="savepostauto" name="savepostauto">
						                                <i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu bài viết</button> --}}
						                                <button onclick="return false;" class="btn btn-primary" id="getpagetoken" name="getpagetoken" onclick="getpagetoken()">
						                                <i class="icon-search4 mr-2"></i> Lấy thông tin bài đăng</button>
						                                <button onclick="return false;" class="btn btn-success" id="getnametoken">
						                                <i class="icon-file-check2 mr-2"></i> Lưu Token & ID 
						                                </button>
						                                <button onclick="return false;" class="btn btn-warning" id="schedulePostfb">
						                                <i class="fa fa-calendar" aria-hidden="true"> </i> Lên lịch đăng 
						                                </button>
						                            </div>
						                           
						                           
						                            
						                           
						                            <div class="preloader"></div>
						                            <div class="messageBox"></div>
						                        </div>
						                    </div>
						                    <div class="panel panel-default">
						                        <div class="panel-body table-data">
						                        </div>
						                    </div>
						                    <!-- Save post dialog -->
						                    <div id="postTitleModal" class="modal fade" role="dialog" data-backdrop="static">
						                        <div class="modal-dialog">
						                            <div class="modal-content">
						                                <div class="modal-header">
						                                    <button type="button" class="close" data-dismiss="modal">×</button>
						                                    <h4 class="modal-title">Tiêu đề bài viết</h4>
						                                </div>
						                                <div class="modal-body">
						                                    <div class="messageBoxModal"></div>
						                                    <div class="formField">
						                                        <label class="sr-only" for="postTitle">Tiêu đề bài viết</label>
						                                        <input type="text" name="postTitle" id="postTitle" class="form-control" placeholder="Tiêu đề bài viết" value="">
						                                    </div>
						                                </div>
						                                <div class="modal-footer">
						                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						                                    <button onclick="return false;" id="savePostModal" class="btn btn-primary">Lưu bài viết</button>
						                                </div>
						                            </div>
						                        </div>
						                    </div>
						                    <!-- Save post dialog -->
						                    <div id="postTitleModalauto" class="modal fade" role="dialog" data-backdrop="static">
						                        <div class="modal-dialog">
						                            <div class="modal-content">
						                               <div class="modal-header bg-warning">
											                <h5 class="modal-title">Tiêu đề bài viết</h5>
											                <button type="button" class="close" data-dismiss="modal">×</button>
											            </div>
						                                <div class="modal-body">
						                                    <div class="messageBoxModal"></div>
						                                    <div class="formField">
						                                        <label class="sr-only" for="postTitle">Tiêu đề bài viết</label>
						                                        <input type="text" name="postTitle" id="postTitleauto" class="form-control" placeholder="Tiêu đề bài viết" value="">
						                                    </div>
						                                </div>
						                                <div class="modal-footer">
						                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						                                    <button onclick="return false;" id="savePostModalauto" class="btn btn-primary">Lưu bài viết</button>
						                                </div>
						                            </div>
						                        </div>
						                    </div>
						                </div>
						            </div>
						        </form>
						        <div class="card">
						        	
								        <div class="card-header header-elements-inline bg-slate-800">
								            <h5 class="card-title">Thông tin bài đăng vừa lấy</h5>
								            <div class="header-elements">
								            </div>
								        </div>
								        <div class="table-responsive table-scrollable" style="max-height: 40.5rem;">
											<table class="table bt-table row-border table scroll" id="tableClientLoadFriend" style="width: 100%;">
												<thead>
													<tr class="bg-warning">
														<th class="bt-fix-sort-tb"><input type="checkbox" onclick="choiceall(this)"></th>
														 <th>STT</th>
								                        <th>Nội dung</th>
								                        <th>Ảnh kèm theo</th>
								                        <th>Video</th>
														
													</tr>
												</thead>
												<tbody id="listPost"></tbody>
											</table>
										</div>
								        {{-- <div class="table-responsive">
								            <table class="table table-striped">
								                <thead>
								                    <tr class="">
								                        <th>

								                            <div class="form-check">
																<label class="form-check-label">
																	<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckbox(this)">
																	
																</label>
															</div>
								                        </th>
								                        <th>STT</th>
								                        <th>Nội dung</th>
								                        <th>Ảnh kèm theo</th>
								                        <th>Video</th>
								                        
								                    </tr>
								                </thead>
								                <tbody class="listPost" id="listPost">
 
								                </tbody>
								            </table>

								        </div> --}}
								         
								   
						        </div>
						        <div class="col-md-12">
							                <button onclick="return false;" style="margin-top: 15px !important; color: #FFFF" class="btn btn-primary submitsend" id="submitsend"><i class="icon-paperplane mr-3 style_icon"></i>Đăng ngay</button>
							    <div class="messageBoxv2 col-md-4"></div>           
							    </div>


						        <div class="panel panel-default has-responsive-table">
						            <div class="panel-body">
						                <div id="groupsDataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						                  
								    <div class="col-md-12 card-header header-elements-inline bg-slate-800">
								        <h5 class="card-title">Official Account của bạn</h5>
								        <div class="header-elements">
								        </div>
								    </div>
								    <div class="table-responsive">
								            <table class="table table-striped">
								            <thead>
								                <tr class="">
								                    <th>
								                    	<div class="form-check">
															<label class="form-check-label">
																<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckbox(this)">
																
															</label>
														</div>
								                        
								                    </th>
								                    <th>ID</th>
								                    <th>Hình ảnh</th>
								                    <th>Tên</th>
								                    <th>Danh mục</th>
								                    <th>Trạng thái</th>
								                    <th>Ngày tạo</th>
								                    <th>Trạng thái đăng</th>
								                </tr>
								            </thead>
								            <tbody class="data-table2 accountOA" id="accountOA">
								            	{{ csrf_field() }}
							            	 @if($status !=1)
							            	  @foreach($account as $row)
								             <tr>
								                    <td>
								                    	<div class="form-check form-check-inline groupNamev2">
															<label class="form-check-label formProfile">
																<input type="checkbox" class="fbnodev2 form-check-input-styled" data-fouc value="{{ $row->zalo_id }}" name="selectGroup[]">
																
															</label>
														</div>
												                        
								                    </td>
								                    <td>{{$row->zalo_id }}</td>
								                    <td><img src="{{ $row->image }}" width="40px" height="40px" style="border-radius: 50%!important;"></td>
								                    <td>{{ $row->name }}</td>
								                    <td>
								                    	 		                                       				                          	
								                    </td>
								                    <td>Hoạt động</td>
								                    <td>{{ $row->updated_at }}</td>
								                    <td>
								                        <span class="postStatus_{{ $row->zalo_id }} postStatus"></span>
								                    </td>
								                </tr>
								                 @endforeach
								                 @else

                                                    @foreach($account as $row)
                                                     @for ($i = 0; $i < count($role_page); $i++)
                                                       @if($role_page[$i] == $row->zalo_id)
										             <tr>
										                    <td>
										                    	<div class="form-check form-check-inline groupNamev2">
																	<label class="form-check-label formProfile">
																		<input type="checkbox" class="fbnodev2 form-check-input-styled" data-fouc value="{{ $row->zalo_id }}" name="selectGroup[]">
																		
																	</label>
																</div>
														                        
										                    </td>
										                    <td>{{$row->zalo_id }}</td>
										                    <td><img src="{{ $row->image }}" width="40px" height="40px" style="border-radius: 50%!important;"></td>
										                    <td>{{ $row->name }}</td>
										                    <td>
										                    	 		                                       				                          	
										                    </td>
										                    <td>Hoạt động</td>
										                    <td>{{ $row->updated_at }}</td>
										                    <td>
										                        <span class="postStatus_{{ $row->zalo_id }} postStatus"></span>
										                    </td>
										                </tr>
										                 @endif
										                @endfor
								                 @endforeach
								                @endif
								              
								                
										          </tbody>
										        </table>
								                            
								            </div>
				            


						                 
						                </div>
						                <div id="addToCategoryModal" class="modal fade" role="dialog" data-backdrop="static">
						                    <div class="modal-dialog">
						                        <div class="modal-content">
						                            <div class="modal-header">
						                                <button type="button" class="close" data-dismiss="modal">×</button>
						                                <h4 class="modal-title">Thêm nhóm vào danh mục</h4>
						                            </div>
						                            <div class="modal-body">
						                                <div class="addCateMsgBoxModal"></div>
						                                <select class="form-control nodescategory">
						                                    <option value="">-- Tất cả --</option>
						                                </select>
						                            </div>
						                            <div class="modal-footer">
						                                <button class="btn btn-default" data-dismiss="modal">Close</button>
						                                <button onclick="return false;" id="modalAddCateBtn" class="btn btn-primary">Thêm</button>
						                            </div>
						                        </div>
						                    </div>
						                </div>
						            </div>
						            <div id="addNewCatModal" class="modal fade" role="dialog" data-backdrop="static">
						                <div class="modal-dialog">
						                    <div class="modal-content">
						                        <div class="modal-header">
						                            <button type="button" class="close" data-dismiss="modal">×</button>
						                            <h4 class="modal-title">Create new category</h4>
						                        </div>
						                        <div class="modal-body">
						                            <div class="addNewCatModalMsgBox"></div>
						                            <input type="text" id="newCategoryName" name="newCategoryName" class="form-control" placeholder="New category name">
						                        </div>
						                        <div class="modal-footer">
						                            <button class="btn btn-default" data-dismiss="modal">Close</button>
						                            <button id="addCategory" onclick="return false;" class="btn btn-primary">Create</button>
						                        </div>
						                    </div>
						                </div>
						            </div>
						            {{-- modal --}}
						            <div id="modal_schedule" class="modal fade show" data-backdrop="false" tabindex="-1" style="padding-right: 17px; display: none;">
				                        <div class="modal-dialog modal-lg">
				                            <div class="modal-content">
				                                <div class="modal-header  bg-warning-700">
				                                    <h5 class="modal-title">Lên lịch đăng</h5>
				                                    <button type="button" class="close" data-dismiss="modal">×</button>
				                                </div>
				                                <div class="loadCate"></div>
				                                 {{ csrf_field() }}
				                                <div class="modal-body row">
				                                    <div class="col-12">
				                                        <div class="alertBoxCate"></div><!--alert-->
				                                    </div>
				                                    <div class="col-12">
				                                         <div class="form-group">
				                                         <h6 class="font-weight-semibold">Khoảng cách giữa 2 bài viết</h6>
				                                          </div>
				                                    <div class="row">
				                                        <div class="col-md-4">
				                                            <div class="form-check">
				                                                <label class="form-check-label">
				                                                   {{-- <input type="radio" name="gender" value="#" class="form-check-input-styled-danger" checked> --}}
				                                                   <input type="radio" name="timeType" id="intervalMunite" value="minute" checked="">
				                                                   Phút
				                                                </label>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-4">
				                                            <div class="form-check">
				                                                <label class="form-check-label">
				                                                   {{-- <input type="radio" name="gender" value="#" class="form-check-input-styled-danger"> --}}
				                                                   <input type="radio" name="timeType" id="intervalHour" value="hour">
				                                                   Giờ
				                                                </label>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-4">
				                                            <div class="form-check">
				                                              
				                                                <select name="scheduledPostInterval" id="scheduledPostInterval" class="form-control">
				                                                	                    @for($i =1 ; $i<90;$i++)
				                                                                                <option value="{{ $i}}">{{ $i }}</option>
				                                                                         @endfor
				                                                                                
				                                                 </select>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    </div><!--col-md-12-->

				                                        <div class="col-md-6">
										                    <div class="form-group">
										                     <h6 class="font-weight-semibold">Bắt đầu lên lịch đăng</h6>
										                     <div class="input-group">
										                            <span class="input-group-prepend">
										                                <button type="button" class="btn btn-light btn-icon" id="btn_time"><i class="icon-calendar3"></i></button>
										                            </span>
										                            <input type="text" class="span2 form-control" value="" id="timeStart" name="time_start">
										                        </div>
										                         
										                        <p class="text-danger">Thời gian hệ thống: <span id='hvn'></span></p>
										                    </div>
										                </div>

				                                     <div class="col-md-6">
								                        <h6 class="font-weight-semibold">Ngày kết thúc:</h6>
								                        <div class="input-group">
								                            <span class="input-group-prepend">
								                                <button type="button" class="btn btn-light btn-icon" id="btn_dpt"><i class="icon-calendar3"></i></button>
								                            </span>
								                            <input type="text" class="span2 form-control" value="28-05-2020 10:33:47" id="dpt" name="time_end">
								                        </div>
								                        
								                    </div>
				                                   
				                                    <div class="col-md-6">
				                                        <div class="form-group">
				                                         <h6 class="font-weight-semibold">Số lượng bài viết muốn lấy:</h6>
				                                         <div class="input-group">
				                                               
				                                                <input type="text" class="span2 form-control" value="0" id="number" name="number">
				                                            </div>
				                                            
				                                          
				                                        </div>
				                                    </div>

				                                    <div class="col-12" id="message">
				                                        
				                                        <button onclick="return false;" class="text-center btn bg-primary-800" id="saveScheduledPostfb" name="scheduledpost">
				                                            <i class="fa fa-calendar" aria-hidden="true"></i> Lưu lịch đăng
				                                        </button>
				                                        <div class="thongbao" style="margin-top: 10px;"></div>
				                                    </div>
				                                  
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
                                    
                                    <div class="modal fade bd-example-modal-sm" id="getnametokenmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-sm">
									    <div class="modal-content">
									      <div class="modal-header bg-success" style="border-bottom: 1px solid #cdcdcd;">
									        <h4 class="modal-title" id="mySmallModalLabel">Nhập tên gợi nhớ cho token này</h4>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">×</span>
									        </button>
									      </div>
										       <div class="modal-body">
									             <div class="form-group row">
													<label class="col-form-label col-sm-3">Name</label>
													<div class="col-sm-9">
														<input type="text" placeholder="name" class="form-control nametoken">
													</div>
												</div>
										    </div> 
										    <div class="modal-footer">
		                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		                                       
		                                        <button type="button" class="btn bg-primary" id="addtokenid">Lưu lại</button>
		                                    </div>
									    </div>
									  </div>
									</div>
									<!--Modal get ten token <-->

									<div class="modal fade bd-example-modal-lg" id="modallisttoken" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									  <div class="modal-dialog modal-lg">
									    <div class="modal-content">
									      <div class="modal-header bg-success" style="border-bottom: 1px solid #cdcdcd;">
									        <h4 class="modal-title" id="mySmallModalLabel">List Token & ID</h4>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">×</span>
									        </button>
									      </div>
										       {{-- <div class="modal-body"> --}}
									            <div class="card">

												<div class="table-responsive table-scrollable">
													<table class="table bt-table row-border table scroll" id="tableClientLoadFriend" style="width: 100%;display: block;">
														<thead>
															<tr class="bg-warning">
																
																<th>Chọn</th>
																{{-- <th>STT</th> --}}
																<th>Tên gợi nhớ</th>
																<th>Token</th>
																<th>ID</th>
																<th>Ngày tạo</th>
																
															</tr>
														</thead>
														<tbody id="bt-load-client-content">
															@foreach($listtoken as $key=>$row)
															<tr role="row" class="odd">
																<td class="sorting_1" style="width: 20%;">
                                                                   <div class="form-check">
				                                                        <label class="form-check-label">
				                                                           <input type="radio" name="gender" value="{{ $row->id }}" class="form-check-input-styled-danger">
				                                                        </label>
				                                                    </div>
																</td>
																{{-- <td >{{ $key }}</td> --}}
																<td ><p class="viewtoken">{{ $row->name }}</p></td>
																<td style="width: 29%"><p class="viewtoken">{{ $row->token }}</p></td>
																<td >{{ $row->idfb }}</td>
																<td >{{ $row->created_at }}</td>
															</tr>
															@endforeach
														</tbody>
													</table>
												</div>
											</div>
										   {{--  </div> --}}
										    <div class="modal-footer">
		                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		                                       
		                                        <button type="button" class="btn bg-primary" id="savetokenfb">Chọn</button>
		                                    </div>
									    </div>
									  </div>
									</div>
									<!--Modal thong bao <-->
						            <script>
						            	var array='';
						                $(function(){
						                
						                	$('.groupsOptions').on('click','#createNewCatBtn', function(e) {
						                		$("#addNewCatModal").modal("show");
						                	});
						                
						                	$('#addNewCatModal').on('click','#addCategory', function(e) {
						                		$("#addCategory").prop('disabled', true);
						                		kp_preloader("on","#addNewCatModal .modal-body");
						                		$.ajax({
						                	      url: 'https://zalo.phanmemninja.com/nodes_categories/add_category',
						                	      dataType: 'json',
						                	      type: 'post',
						                	      contentType: 'application/x-www-form-urlencoded',
						                	      data: { 
						                	      	categoryname: $("#newCategoryName").val(),
						                			csrf_kingposter : getCookie("csrf_kingposter_cookie"),
						                	      },
						                	      success: function( data, textStatus, jQxhr ){
						                	      	if(data.status == "success"){
						                                 if(data.message !== null && typeof data.message === 'object'){
						                                   htmlData = "<ul>";
						                                   Object.keys(data.message).forEach(function(key) {
						                                       htmlData += "<li>" + data.message[key] + "</li>";
						                                   });
						                                   htmlData += "</ul>";
						                                 }else{
						                                   htmlData = data.message;
						                                 }
						                                 alertBox(htmlData,"success",".addNewCatModalMsgBox",true,true);
						                               }else{
						                                 if(data.message !== null && typeof data.message === 'object'){
						                                   htmlData = "<ul>";
						                                   Object.keys(data.message).forEach(function(key) {
						                                       htmlData += "<li>" + data.message[key] + "</li>";
						                                   });
						                                   htmlData += "</ul>";
						                                 }else{
						                                   htmlData = data.message;
						                                 }
						                                 alertBox(htmlData,"danger",".addNewCatModalMsgBox",false,true);
						                               }
						                
						                	        $("#addCategory").prop('disabled', false);
						                	        	
						                	      },
						                	      error: function( jqXhr, textStatus, errorThrown ){ 
						                	      	console.log(errorThrown);
						                	      	alertBox("Unable to complete your request, Please try again","danger",".addNewCatModalMsgBox",false,true);
						                	      	$("#addCategory").prop('disabled', false);
						                	      },
						                	      complete: function(){
						                	      	kp_preloader("off","#addNewCatModal .modal-body");
						                	      }
						                	    });
						                	});	
						                });	
						            </script>	<script>
						                $(function(){
						                
						                				$('#checkbox-all,.fbnode').on('change',function(){
						                		var countPages = 0;
						                		var countGroups = 0;
						                		$('.GroupType:visible .fbnode:checked').each(function(){
						                			if($(this).val() != "on"){
						                				countGroups++;
						                			}
						                		});
						                		$('.PageType:visible .fbnode:checked').each(function(){
						                			if($(this).val() != "on"){
						                				countPages++;
						                			}
						                		});
						                		$('#countSelectedNodes .pages').text(countPages);
						                		$('#countSelectedNodes .groups').text(countGroups);
						                		$('#countSelectedNodes .total').text(countPages+countGroups);
						                		$('#countSelectedNodes').show();
						                	});
						                
						                	$("#exportGroupsCSV").on("click",function(){
						                		var csvContent = 'group';
						                		var totalGroups = 0;
						                		$('.GroupType:visible .fbnode:checked').each(function(){
						                			if($(this).val() != "on"){
						                				csvContent += '\r\n'+$(this).val()+',';
						                				totalGroups++;
						                			}
						                		});
						                
						                		if(totalGroups ==0){
						                			alertBox("No groups has been selected","danger",false,true,true);
						                		}else{
						                			alertBox(totalGroups+" Groups has been exported.","success",false,true,true);
						                			exportToCSV(csvContent, 'groups-'+moment().format('DD-MMM-YYYY')+'.csv', 'text/csv;encoding:utf-8');
						                		}
						                	});
						                
						                	$('.groupsOptions').on('click','#refreshCategory', function(e) {
						                		e.preventDefault();
						                		$("#refreshCategory").prop('disabled', true);
						                		var fbaccount = $(this).data("fbaccount");
						                		var category = $(this).data("category");
						                		kp_preloader("on");
						                		$.ajax({
						                			url: 'https://zalo.phanmemninja.com/nodes_categories/refresh/'+fbaccount+"/"+category,
						                			dataType: 'json',
						                			type: 'GET',
						                			contentType: 'application/x-www-form-urlencoded',
						                			success: function( data, textStatus, jQxhr ){
						                				if(data.status == "ok"){
						                					if(data.message !== null && typeof data.message === 'object'){
						                						htmlData = "<ul>";
						                						Object.keys(data.message).forEach(function(key) {
						                							htmlData += "<li>" + data.message[key] + "</li>";
						                						});
						                						htmlData += "</ul>";
						                
						                					}else{
						                						htmlData = data.message;
						                					}
						                					setTimeout(function(){
						                						window.location.replace('https://zalo.phanmemninja.com/'); 
						                					}, 1000);
						                					alertBox(htmlData,"success",false,true,true)
						                				}else{
						                					if(data.message !== null && typeof data.message === 'object'){
						                						htmlData = "<ul>";
						                						Object.keys(data.message).forEach(function(key) {
						                							htmlData += "<li>" + data.message[key] + "</li>";
						                						});
						                						htmlData += "</ul>";
						                					}else{
						                						htmlData = data.message;
						                					}
						                					alertBox(htmlData,"danger",false,false,true);
						                				}
						                				$("#refreshCategory").prop('disabled', false);
						                			},
						                			error: function( jqXhr, textStatus, errorThrown ){ 
						                				console.log(errorThrown);
						                				alertBox("Unable to complete your request, Please try again","danger",true,false,true);
						                				$("#refreshCategory").prop('disabled', false);
						                			},
						                			complete: function(){kp_preloader("off");}
						                		});
						                	});
						                
						                				$('.groupsOptions').on('click','#deleteCategory', function(e) {
						                		e.preventDefault();
						                		$("#deleteCategory").prop('disabled', true);
						                		$.ajax({
						                			url: 'https://zalo.phanmemninja.com/nodes_categories/delete_category',
						                			dataType: 'json',
						                			type: 'post',
						                			contentType: 'application/x-www-form-urlencoded',
						                			data: { 
						                				categoryID: $("#deleteCategory").val(),
						                				csrf_kingposter : getCookie("csrf_kingposter_cookie"),
						                			},
						                			success: function( data, textStatus, jQxhr ){
						                				if(data.status == "success"){
						                					if(data.message !== null && typeof data.message === 'object'){
						                						htmlData = "<ul>";
						                						Object.keys(data.message).forEach(function(key) {
						                							htmlData += "<li>" + data.message[key] + "</li>";
						                						});
						                						htmlData += "</ul>";
						                
						                					}else{
						                						htmlData = data.message;
						                					}
						                					setTimeout(function(){
						                						window.location.replace('https://zalo.phanmemninja.com/'); 
						                					}, 1000);
						                					alertBox(htmlData,"success",false,true,true)
						                				}else{
						                					if(data.message !== null && typeof data.message === 'object'){
						                						htmlData = "<ul>";
						                						Object.keys(data.message).forEach(function(key) {
						                							htmlData += "<li>" + data.message[key] + "</li>";
						                						});
						                						htmlData += "</ul>";
						                					}else{
						                						htmlData = data.message;
						                					}
						                					alertBox(htmlData,"danger",false,false,true);
						                				}
						                
						                				$("#deleteCategory").prop('disabled', false);
						                
						                			},
						                			error: function( jqXhr, textStatus, errorThrown ){ 
						                				console.log(errorThrown);
						                				alertBox("Unable to complete your request, Please try again","danger",true,false,true);
						                				$("#deleteCategory").prop('disabled', false);
						                			}
						                		});
						                	});	
						                
						                $('.groupsOptions').on('click','#hideSelectedNodes', function() {
						                		nodes = [];
						                	// Get all checked nodes
						                	$('.groupName:visible .fbnode:checked').each(function(){
						                		nodes.push($(this).val());
						                	});
						                	$.ajax({
						                		url: 'https://zalo.phanmemninja.com/settings/fb_accounts/hide_nodes',
						                		dataType: 'json',
						                		type: 'post',
						                		contentType: 'application/x-www-form-urlencoded',
						                		data: {
						                			nodes: JSON.stringify(nodes),
						                			csrf_kingposter: getCookie('csrf_kingposter_cookie') 
						                		},
						                		success: function( data, textStatus, jQxhr ){
						                			if(data.response == "ok"){
						                				for (var i = 0; i < nodes.length; i++ ) {
						                												$( "#" + nodes[i] ).css('background','#ffcccc');
						                					$( "#" + nodes[i] ).fadeOut(500, function() { $(this).remove(); });
						                											}
						                			}
						                		},
						                		error: function( jqXhr, textStatus, errorThrown ){ 
						                			console.log(errorThrown);
						                			alertBox('Unable to complete your request',"danger",true,true);
						                		}
						                	});
						                });
						                
						                				$('.groupsOptions').on('click','#unHideSelectedNodes', function() {
						                		nodes = [];
						                	// Get all checked nodes
						                	$('.groupName:visible .fbnode:checked').each(function(){
						                		nodes.push($(this).val());
						                	});
						                	$.ajax({
						                		url: 'https://zalo.phanmemninja.com/settings/fb_accounts/unhide_nodes',
						                		dataType: 'json',
						                		type: 'post',
						                		contentType: 'application/x-www-form-urlencoded',
						                		data: {
						                			nodes: JSON.stringify(nodes),
						                			csrf_kingposter: getCookie('csrf_kingposter_cookie') 
						                		},
						                		success: function( data, textStatus, jQxhr ){
						                			if(data.response == "ok"){
						                				for (var i = 0; i < nodes.length; i++ ) {
						                					$( "#" + nodes[i] ).find(".HiddenNodeBadge span").fadeOut(100, function() { $(this).remove(); });
						                				}
						                			}
						                		},
						                		error: function( jqXhr, textStatus, errorThrown ){ 
						                			console.log(errorThrown);
						                			alertBox('Unable to complete your request',"danger",true,true);
						                		}
						                	});
						                });
						                
						                
						                	$('#toggleHiddenNodes').on('click', function() {
						                		$.ajax({
						                			url: 'https://zalo.phanmemninja.com/home/toggleHiddenNodes',
						                			dataType: 'json',
						                			type: 'post',
						                			contentType: 'application/x-www-form-urlencoded',
						                			data: {
						                				status: $('#toggleHiddenNodes').is(":checked") ? 1 : 0,
						                				csrf_kingposter: getCookie('csrf_kingposter_cookie') 
						                			},
						                			success: function( data, textStatus, jQxhr ){
						                				if(data.status == "ok"){
						                					location.reload();
						                				}
						                			},
						                			error: function( jqXhr, textStatus, errorThrown ){ 
						                				console.log(errorThrown);
						                				alertBox('Unable to complete your request',"danger",true,true);
						                			}
						                		});
						                	});
						                
						                	$('#showGroups').on('click', function() {
						                		$.ajax({
						                			url: 'https://zalo.phanmemninja.com/home/toggleShowGroups',
						                			dataType: 'json',
						                			type: 'post',
						                			contentType: 'application/x-www-form-urlencoded',
						                			data: {
						                				status: $('#showGroups').is(":checked") ? 1 : 0,
						                				csrf_kingposter: getCookie('csrf_kingposter_cookie') 
						                			},
						                			success: function( data, textStatus, jQxhr ){
						                				if(data.status == "ok"){
						                					if($('#showGroups').is(":checked")){
						                						location.reload();
						                					}else{
						                						$(".GroupType").remove();
						                						$(".groupsCount").html("0");
						                						location.reload();
						                					}
						                				}
						                			},
						                			error: function( jqXhr, textStatus, errorThrown ){ 
						                				console.log(errorThrown);
						                				alertBox('Unable to complete your request',"danger",true,true);
						                			}
						                		});
						                	});
						                
						                	$('#showPages').on('click', function() {
						                		$.ajax({
						                			url: 'https://zalo.phanmemninja.com/home/toggleShowPages',
						                			dataType: 'json',
						                			type: 'post',
						                			contentType: 'application/x-www-form-urlencoded',
						                			data: {
						                				status: $('#showPages').is(":checked") ? 1 : 0,
						                				csrf_kingposter: getCookie('csrf_kingposter_cookie') 
						                			},
						                			success: function( data, textStatus, jQxhr ){
						                				if(data.status == "ok"){
						                					if($('#showPages').is(":checked") || !$('#showGroups').is(":checked")){
						                						location.reload();
						                					}else{
						                						$(".PageType").remove();
						                						$(".pagesCount").html("0");
						                						location.reload();
						                					}
						                				}
						                			},
						                			error: function( jqXhr, textStatus, errorThrown ){ 
						                				console.log(errorThrown);
						                				alertBox('Unable to complete your request',"danger",true,true);
						                			}
						                		});
						                	});
						                
						                });	
						                /////
						                $("#postForm #savepostauto").click(function(){
										if($('#autotokenpagefb').val() == ''){
											alertBox('Token không được trống',"f44336","#postForm .messageBox",true,true);
											return false;
										}
										if ($('#autoid_page').val() == '') {
											alertBox('ID trang hoặc ID nhóm không được trống',"f44336","#postForm .messageBox",true,true);
											return false;
										}
										if ($('#autoscheduledPostTime1').val() == '') {
											alertBox('Thời gian lấy bài không được trống',"f44336","#postForm .messageBox",true,true);
											return false;
										}
										if ($('#autosoluong').val() == '') {
											alertBox('Số lượng bài viết muốn đăng không được trống',"f44336","#postForm .messageBox",true,true);
											return false;
										}
										if ($('#autotitle').val() == '') {
											alertBox('Tiêu đề không được trống',"f44336","#postForm .messageBox",true,true);
											return false;
										}
										if (!$('#autogetimage').is(':checked') && !$('#autogetvideo').is(':checked')) {
											alertBox('Bạn phải chọn ảnh hoặc video',"f44336","#postForm .messageBox",true,true);
											return false;
										}
										$('#postTitleModalauto').modal('show');
									});
								$("#savePostModalauto").click(function(){
											if($.trim($("#postTitleModalauto #postTitleauto").val()) != ""){
												
												kp_preloader("on","#postTitleModalauto .modal-body");
												$("#savePostModalauto").prop('disabled', true);

												var params = {};
												var array = [];
												params['autotokenpagefb'] = $('#autotokenpagefb').val();
												params['autoid_page'] = $('#autoid_page').val();
												params['autoid_group'] = $('#autoid_group').val();
												params['autosoluong'] = $('#autosoluong').val();
												params['autoscheduledPostTime1'] = $('#autoscheduledPostTime1').val();
									            params['post_title'] = $("#postTitleModalauto #postTitleauto").val();
									            if ($('#autogetimage').is(':checked')) {
													params['image'] = 1;
												} else {
													params['image'] = 0;
												}
												if ($('#autogetvideo').is(':checked')) {
													params['video'] = 1;
												} else {
													params['video'] = 0;
												}
									            params['_token'] = $('input[name="_token"]').val();
                                                 //console.log(params);
												$.ajax({
													url: '{{ url("postfb/addauto") }}',
													dataType: 'json',
													type: 'post',
													contentType: 'application/x-www-form-urlencoded',
													data: params,
													success: function( data, textStatus, jQxhr ){
														if(data.status == "success"){
															alertBox(data.message,"success","#postTitleModalauto .messageBoxModal",false,false);
															$('#postId').val(data.post_id);
														}else{
															if(data.message !== null && typeof data.message === 'object'){
											                    htmlData = "<ul>";
											                    Object.keys(data.message).forEach(function(key) {
											                        htmlData += "<li>" + data.message[key] + "</li>";
											                    });
											                    htmlData += "</ul>";
											                  }else{
											                    htmlData = data.message;
											                  }
											                  alertBox(htmlData,"danger","#postTitleModalauto .messageBoxModal",false,false);
														}
													},
													error: function( jqXhr, textStatus, errorThrown ){ 
													  console.log(errorThrown);
													  alertBox("Unable to complete your request","danger","#postTitleModalauto .messageBoxModal",false,false);
													},
													complete: function(){
														$("#savePostModalauto").prop('disabled', false);
														kp_preloader("off","#postTitleModalauto .modal-body");
													}
												});
											}else{
												alertBox('CHOOSE_TITLE_POST',"danger","#postTitleModalauto .messageBoxModal",true);
											}
										});
								$("#submitsend").click(function(){
									var groups = []; // List of selected groups
							  		var params = {};
							  		var check = 0;
							  		var checkv2 = 0;
							  		var groupsv2 = [];

                                   $('.groupName:visible .fbnode:checked').each(function(){
                                     
										check = 1;
										groups.push($(this).val());

									});

                                   $('.groupNamev2:visible .fbnodev2:checked').each(function(){
                                     
										checkv2 = 1;
										groupsv2.push($(this).val());

									});
                                  
									
                                   if(check == 0){
                                       
										alertBox('Vui lòng chọn bài viết để đăng!',"e53935","#postForm .messageBoxv2",true,true);
										return false;
									}

									if(checkv2 == 0){
                                       
										alertBox('Vui lòng chọn tài khoản để đăng bài!',"e53935","#postForm .messageBoxv2",true,true);
										return false;
									}
									//console.log(groups);
									var a = 0;
									for (var i =0; i < groups.length; i++) {
                                             var value = groups[i];
                                              var message = array[value].message;
                                               message.replace(/(?:\r\n|\r|\n)/g, '\\n');
								               var message = message.split('\n');
								              var message =  message.filter(function(e){return e});

										     params['content'] = message;
										     params['image'] = array[value].full_picture;
										     params['zaloid'] =groupsv2;
										     params['_token'] = $('input[name="_token"]').val();
										     params['title'] = array[value].message.slice(0, 71)+'...';
                                             var tacgia = array[value].admin_creator;
                                             params['tacgia'] = '';
                                             // if(tacgia == ''){
                                             // 	 params['tacgia'] = '';
                                             // 	}else{
                                             // 		params['tacgia'] = tacgia['name'];
                                             // 	}
                                           
                                           //  var string = array[value].message.slice(0, 146)+'...';
                                           // console.log(string);

											$.ajax({
											url: '{{ url("postfb/sendpostfb") }}',
											dataType: 'json',
											type: 'post',
											contentType: 'application/x-www-form-urlencoded',
											data: params,
											success: function( data, textStatus, jQxhr ){
												
											},
											error: function( jqXhr, textStatus, errorThrown ){
											  $('.table-data').html(jqXhr.responsiveText);
											},
											complete: function(data, textStatus, jQxhr){
												
												
												
											}
										});
											a++
										if(a == groups.length){
											alertBox('Đăng bài thành công!',"00a65a","#postForm .messageBoxv2",true,true);
										}
									}
                                   

								});
 

								$("#getpagetoken").click(function(){
									var params = {};
									params['token'] = $('#autotokenpagefb').val();
									params['id_page'] = $('#autoid_page').val();
									params['id_group'] = $('#autoid_group').val();
									params['scheduledPostTime'] = $('#scheduledPostTime1').val();
									params['soluong'] = $('#autosoluong').val();
									params['_token'] = $('input[name="_token"]').val();
									if ($('#autogetimage').is(':checked')) {
										params['image'] = 1;
									} else {
										params['image'] = 0;
									}
									if ($('#autogetvideo').is(':checked')) {
										params['video'] = 1;
									} else {
										params['video'] = 0;
									}
									if ($('#autotokenpagefb').val() == '') {
										 alertBox("Token facebook không được trống","f44336","#postForm .messageBox",true,true);
										 return false;
									}
									if ($('#autosoluong').val() == '') {
										 alertBox("Số lượng bài viết lấy ra không được trống","f44336","#postForm .messageBox",true,true);
										 return false;
									}
									if ($('#autoid_page').val() == '') {
											alertBox('ID trang hoặc ID nhóm không được trống',"f44336","#postForm .messageBox",true,true);
											return false;
										}
									if (params['video'] == 0 && params['image'] == 0) {
										 //alertBox("Bạn phải chọn dữ liệu lấy ra ảnh hoặc video","danger",false,true,true);
										 alertBox('Bạn phải chọn dữ liệu lấy ra ảnh hoặc video',"f44336","#postForm .messageBox",true,true);
										 return false;
									}
									$('#materialPreloader').show();
									$('.loader-zalo').show();
									params['_token'] = $('input[name="_token"]').val();
									//console.log(params);
									$.ajax({
										url: '{{ url("postfb/getpage") }}',
										dataType: 'json',
										type: 'post',
										contentType: 'application/x-www-form-urlencoded',
										data: params,
										success: function( data, textStatus, jQxhr ){
											if(data.status == 'error'){
                                               $("p").remove(".contentmess");
								    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>'+data.message+'</p>';
												 $('.contentpoppup').append(html);
												 $('.loader-zalo').hide();
												$('#popupmess').modal('show');
											}
										},
										error: function( jqXhr, textStatus, errorThrown ){
										  $('.table-data').html(jqXhr.responsiveText);
										},
										complete: function(data, textStatus, jQxhr){

											 $('.loader-zalo').hide();
												var html = '';
												var datav2 = JSON.parse(data.responseText);
												  array = datav2.data;
	                                           // console.log(array);
												for (var i = 0; i < array.length; i++) {
													//console.log(array[i]);
	                                                  
													html += '<tr class="groupName"> <td> <input type="checkbox" value="'+i+'" class="fbnode" ></td> <td>'+i+'</td> <td>'+array[i].message+'</td> <td style="width: 40%"> <img src="'+array[i].full_picture+'" style="width: 45px; height: 45px;"> </td> <td></td>  </tr>';
												}

												$('#listPost').html(html);
											
											
										}
									});
								}); 
                                $(function(){
								  $('#dpt').fdatepicker({
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
								$("#schedulePostfb").click(function(){
									var groups = []; // List of selected groups
							  		var params = {};
							  		var check = 0;
							  		var checkv2 = 0;
							  		var groupsv2 = [];
									
									   var today = new Date();
									   var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
									   var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
									   var dateTime = date+' '+time;
									 
									   document.getElementById("hvn").innerHTML = dateTime;
									   $('#timeStart').val(dateTime);
									    $('.groupNamev2:visible .fbnodev2:checked').each(function(){
                                         
											checkv2 = 1;
											groupsv2.push($(this).val());

										});
										if ($('#autotokenpagefb').val() == '') {
                                              $("p").remove(".contentmess");
								    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Token facebook không được trống!</p>';
												 $('.contentpoppup').append(html);
												$('#popupmess').modal('show');
												return false;
											 // alertBox("Token facebook không được trống","f44336","#postForm .messageBox",true,true);
											 // return false;
										}
									if ($('#autoid_page').val() == '') {

										       $("p").remove(".contentmess");
								    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>ID trang hoặc ID nhóm không được trống!</p>';
												 $('.contentpoppup').append(html);
												$('#popupmess').modal('show');
												return false;

											// alertBox('ID trang hoặc ID nhóm không được trống',"f44336","#postForm .messageBox",true,true);
											// return false;
										}
									    if(checkv2 == 0){
                                            
                                             $("p").remove(".contentmess");
								    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn tài khoản để lên lịch đăng bài!</p>';
												 $('.contentpoppup').append(html);
												$('#popupmess').modal('show');
												return false;

											// alertBox('Vui lòng chọn tài khoản để đăng bài!',"e53935","#postForm .messageBoxv2",true,true);
											// return false;
										}
										$('#modal_schedule').modal('show');

									
								}); 
								$("#saveScheduledPostfb").click(function(){
									var params = {};
									var groupsv2 = [];
									params['timeStart'] = $('input[name="time_start"').val();
									params['timeend'] = $('input[name="time_end"').val();
									params['number'] = $('#number').val();
									params['zaloid'] = $('#number').val();
									params['token'] = $('#autotokenpagefb').val();
									params['fb_id'] = $('#autoid_page').val();
									params['_token'] = $('input[name="_token"]').val();
                                    var $number = $('#number').val();
                                    if ($('#autotokenpagefb').val() == '') {
										 alertBox("Token facebook không được trống","f44336","#postForm .messageBox",true,true);
										 return false;
									}
									if ($('#autoid_page').val() == '') {
											alertBox('ID trang hoặc ID nhóm không được trống',"f44336","#postForm .messageBox",true,true);
											return false;
										}
                                    if($number <= 0){
                                    	alertBox('Số lượng bài viết muốn lấy không được bằng 0 !',"e53935",".thongbao",true,true);
											return false;
                                    }

                                     $('.groupNamev2:visible .fbnodev2:checked').each(function(){
                                     
										checkv2 = 1;
										groupsv2.push($(this).val());

									});
                                     params['zaloid'] = groupsv2;
                                    $.ajax({
										url: '{{ url("postfb/schedulerpostfb") }}',
										dataType: 'json',
										type: 'post',
										contentType: 'application/x-www-form-urlencoded',
										data: params,
										success: function( data, textStatus, jQxhr ){
										  if(data.status == 200){
										  	alertBox(data.mess,"00a65a",".thongbao",true,true);
										  }
										},
										error: function( jqXhr, textStatus, errorThrown ){
										  $('.table-data').html(jqXhr.responsiveText);
										},
										complete: function(data, textStatus, jQxhr){
											
										}
									});
									
								});

                                 $("#listtoken").click(function(){
                                    $('#modallisttoken').modal('show');

                                 });

                                  $("#getnametoken").click(function(){
                                  	if ($('#autotokenpagefb').val() == '') {
                                              $("p").remove(".contentmess");
								    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Token facebook không được trống!</p>';
												 $('.contentpoppup').append(html);
												$('#popupmess').modal('show');
												return false;
											 
										}
									if ($('#autoid_page').val() == '') {

									       $("p").remove(".contentmess");
							    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>ID trang hoặc ID nhóm không được trống!</p>';
											 $('.contentpoppup').append(html);
											$('#popupmess').modal('show');
											return false;

										
									}

                                      $('#getnametokenmodal').modal('show');
                                  });

                                  $("#addtokenid").click(function(){
                                    
									var token = $('#autotokenpagefb').val();
									var id = $('#autoid_page').val();
									var params ={};
									params['token'] = token;
									params['idfb'] = id;
									params['name'] = $('.nametoken').val();
									params['_token'] =  $('input[name="_token"]').val();
									 $.ajax({
										url: '{{ url("postfb/addtokenid") }}',
										dataType: 'json',
										type: 'post',
										contentType: 'application/x-www-form-urlencoded',
										data: params,
										success: function( data, textStatus, jQxhr ){
										  if(data.status == 200){
										  	 $("p").remove(".contentmess");
								    		     var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+data.message+'</p>';
												 $('.contentpoppup').append(html);
												 $('#getnametokenmodal').modal('hide');
												$('#popupmess').modal('show');

										  }
										},
										error: function( jqXhr, textStatus, errorThrown ){
										  $('.table-data').html(jqXhr.responsiveText);
										},
										complete: function(data, textStatus, jQxhr){
											
										}
									});

                                 });
                                $('#savetokenfb').on('click', function() {
                                	var id = $("#bt-load-client-content input[name='gender']:checked").val();
						        	var params = {};
									params['id'] = id;
									params['_token'] = $('input[name="_token"]').val();

									$.ajax({
										url: '{{ url("postfb/gettokenfb") }}',
										dataType: 'json',
										type: 'post',
										contentType: 'application/x-www-form-urlencoded',
										data: params,
										success: function( data, textStatus, jQxhr ){
										  if(data.status == 200){
										  	 $('textarea#autotokenpagefb').val(data.token);
										  	 $('textarea#autoid_page').val(data.id);
										  	 $('#modallisttoken').modal('hide');
										  }
										},
										error: function( jqXhr, textStatus, errorThrown ){
										  $("p").remove(".contentmess");
							    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Đã xảy ra lỗi vui lòng thử lại !</p>';
											 $('.contentpoppup').append(html);
											$('#popupmess').modal('show');
										},
										complete: function(data, textStatus, jQxhr){
											
										}
									});
                                });
                                  
								
				             	</script>
						        </div>
						    </section>
						</div>
			</div>

			<!-- /content area -->
			@stop


			