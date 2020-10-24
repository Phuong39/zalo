@extends('master')
@section('title','Tài khoản zalo')
@section('main')
<div class="content">
	<style>
		.field-icon {
		  float: right;
		  margin-left: -25px;
		  margin-top: -25px;
		  position: relative;
		  z-index: 2;
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
	<!-- Page header -->
			<div class="page-header">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
			            <span class="breadcrumb-item active">Tài khoản zalo</span>
			        </div>

			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>

			    <div class="header-elements d-none">
			        
			    </div>
			</div>

			</div>
			<!-- /page header -->
			@include('errors.note')
        <!-- Form inputs -->
				<div class="card">
				    <div class="card-body">
				    <div class="row">
				    <div class="col-md-5">
                         @foreach($admin as $row)
                         @if($row->status != 1)
					        <a href="https://oauth.zaloapp.com/v3/auth?app_id=4078878391981186695&amp;redirect_uri=https://zalov2.phanmemninja.com/home&amp;state=textwhatyouwant"class="btn btn-success" type="button" data-target="#modal_backdrop"><i class="icon-plus2 mr-2"></i> Thêm tài khoản</a>
					        <button class="btn btn-primary" type="button" onclick="updateInfo()"><i class="icon-magazine mr-2 icon-1x"></i> Cập nhật info Zalo</button>
					        <button class="btn btn-warning" type="button" data-toggle="modal" data-target=".settingProxy"><i class="icon-magazine mr-2 icon-1x"></i>Thiết lập Proxy</button>
					        <button class="btn btn-danger" type="button" onclick="removeAllAccountProf()"><i class="icon-folder-remove mr-2 icon-1x"></i> Xóa tài khoản</button>
					        @endif
				        @endforeach

				    </div><!--col-md-5-->
				    <div class="col-md-3">
				    <form method="GET" id="formSubmit">
				        <div class="row">
				           <div class="">
				                    <div class="form-group">
				                       
				                       <select name="category_id" id="category" class="form-control" onchange="getAccountByCate()">
				                           <option value="">== Lọc theo danh mục ==</option>
				                                @foreach($category as $cate)
				                               <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                           @endforeach
				                        </select>
                                         {{ csrf_field() }}
				                      </div>
				                </div>
				           
				        </div>
				    </form>
				        </div><!--col-md-4-->
				       
				        <div class="col-md-4">
				            <div class="row">
				                <div class="col-md-9">
				                    {{-- <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value=""> --}}
				                    <input type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Nhập tên tài khoản tìm kiếm tại đây..." />
				                    <div id="countryList"><br>
				                    	
				                </div><!--col-md-9-->
				                <div class="col-md-3">

				                    {{-- <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button> --}}
				                </div>
				                 
				            </div><!--row-->
  
				        </div><!--col-md-4-->
				        {{ csrf_field() }}

				</div>
				</div>
				<!-- /form inputs -->
				<div class="clearfix"></div>
				<!-- /table -->
				<input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL">
				<div class="showLoading"></div>
				<div class="alertListAccount"></div>   
				<div class="">
				    <div class="card-header header-elements-inline bg-slate-800">
				        <h5 class="card-title">Tài khoản của bạn</h5>
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
				                    <th>Số điện thoại</th>
				                    <th>Hình ảnh</th>
				                    <th>Tên</th>
				                    <th>Danh mục</th>
				                    <th>Cookie</th>
				                    <th>Proxy</th>
				                    <th>Thao tác</th>
				                </tr>
				            </thead>
				            <tbody class="data-table accountprofile" id="accountprofile">
				                 {{csrf_field()}}
				               @if($status != 1)
				                   @foreach($account as $row)
						                <tr>
						                    <td>
						                    	<div class="form-check form-check-inline">
													<label class="form-check-label formProfile">
														<input type="checkbox" class="form-check-input-styled" data-fouc value="{{ $row->zalo_id }}" name="selectGroup[]">
														
													</label>
												</div>
						                    </td>
						                    <td>{{$row->zalo_id}}</td>
						                    <td>{{$row->phone }}</td>
						                    <td><img src="{{$row->image}}" width="40px" height="40px" style="border-radius: 50%!important;"></td>
						                    <td>{{$row->name}}</td>
						                    <td>

		                                     @foreach($category as $cate)
		                                     @if($row->cate_id == $cate->id)	                    	
						                    	 @if($cate->color != null)<span class="badge badge-dark" style="background-color: #{{$cate->color}};font-size: 100%;">{{$cate->name }}</span> @else {{$cate->name}}@endif
						                    	  @endif
						                    @endforeach	
						                    </td>
						                    <td>@if($row->checkcookie != 1) <span class='badge bg-success postStatus_{{ $row->zalo_id}} postStatus'>Live</span> @else <span class="badge bg-danger">Die</span> @endif </td>
						                    <td><a href="http://192.168.1.55:10000" target="_blank">http://192.168.1.55:10000</a></td>
						                    <td>
						                        <form method="POST" action="#">
						                             <input type="hidden" name="_token" value="">
						                             <input type="hidden" name="_method" value="DELETE">                           
						                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal_backdrop" onclick="choiceidzalo('{{$row->zalo_id}}')"><i class="icon-plus2" data-id="{{$row->zalo_id}}" ></i> Thêm cookie</button>
		                                            @foreach($admin as $rowv2)
		                                            @if($rowv2->status != 1)
						                            <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update" data-name="{{ $row->cate_id }}" data-name="{{ $row->name }}" data-id="{{ $row->id }}" onclick="changeAccount(this)"> Cập nhật</button>
						                            <a href="{{asset('home/delete/').'/'.$row->zalo_id}}" class="btn btn-danger" type="submit"  style="color:#FFFFFF"> <i class="icon-folder-remove icon-1x"></i> Xóa</a>
						                            @endif
		                                            @endforeach
						                        </form>
						                    </td>
						                </tr>
						                @endforeach
						        @else
                                      @foreach($accountv2 as $row)
                                          @for ($i = 0; $i < count($role_profile); $i++)
	                                          @if($role_profile[$i] == $row->zalo_id)
		                                          <tr>
										                    <td>
										                    	<div class="form-check form-check-inline">
																	<label class="form-check-label formProfile">
																		<input type="checkbox" class="form-check-input-styled" data-fouc value="{{ $row->zalo_id }}" name="selectGroup[]">
																		
																	</label>
																</div>
										                        {{-- <div class="form-check">
										                            <label class="form-check-label">
										                                <div class="uniform-checker"><span><input type="checkbox" name="id[]" class="form-check-input-styled" value="{{ $row->id }}" data-fouc=""></span></div>
										                            </label>
										                        </div> --}}
										                    </td>
										                    <td>{{$row->zalo_id}}</td>
										                    <td>{{$row->phone }}</td>
										                    <td><img src="{{$row->image}}" width="40px" height="40px" style="border-radius: 50%!important;"></td>
										                    <td>{{$row->name}}</td>
										                    <td>

						                                     @foreach($category as $cate)
						                                     @if($row->cate_id == $cate->id)	                    	
										                    	{{--  <span class="badge badge-dark">{{$cate->name }}</span> --}}
										                    	 @if($cate->color != null)<span class="badge badge-dark" style="background-color: #{{$cate->color}};font-size: 100%;">{{$cate->name }}</span> @else {{$cate->name}}@endif
										                    	  @endif
										                    @endforeach	
										                    </td>
										                    <td>@if($row->checkcookie != 1) <span class='badge bg-success postStatus_{{ $row->zalo_id}} postStatus'>Live</span> @else <span class="badge bg-danger">Die</span> @endif </td>
										                    {{-- <td><span class='badge bg-success postStatus_{{ $row->zalo_id}} postStatus'>Live</span></td> --}}
										                    {{-- <td>{{ $row->created_at }}</td> --}}
										                    <td>
										                        <form method="POST" action="#">
										                             <input type="hidden" name="_token" value="">
										                             <input type="hidden" name="_method" value="DELETE">                           
										                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal_backdrop" onclick="choiceidzalo('{{$row->zalo_id}}')"><i class="icon-plus2 mr-2" data-id="{{$row->zalo_id}}" ></i> Thêm cookie</button>
						                                            @foreach($admin as $rowv2)
						                                            @if($rowv2->status != 1)
										                            <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update" data-name="{{ $row->cate_id }}" data-name="{{ $row->name }}" data-id="{{ $row->id }}" onclick="changeAccount(this)"> Cập nhật</button>
										                            <a href="{{asset('home/delete/').'/'.$row->zalo_id}}" class="btn btn-danger" type="submit"  style="color:#FFFFFF"> <i class="icon-folder-remove icon-1x"></i> Xóa</a>
										                            @endif
						                                            @endforeach
										                        </form>
										                    </td>
										                </tr>
	                                          @endif
                                                    
                                          @endfor
						           

						                @endforeach
				               @endif
				              
				                
				                        </tbody>
				        </table>
				                            
				            </div>
				            {{-- {{$list->links()}}
 --}}
				</div>

				<!-- /table -->

				<!-- Disabled backdrop -->
				<div id="modal_backdrop" class="modal fade" data-backdrop="false" tabindex="-1">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header bg-success">
				                <h5 class="modal-title">Thêm Cookie</h5>
				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				            <div class="modalBox"></div>
				            <input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL">
				            <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBox">
				                    	<p style="margin-left:175px " class="QR_code"></p>
				                    </div>
                                   
				                </div>
				               
 
				            </div>
				            <div class="modal-footer">

								<input type="hidden" name="" class="idzalo_cookie" value="8128708935458910258">
							</div>
				        </div>
				    </div>
				</div>
				<!-- /disabled backdrop --><!-- Disabled backdrop -->
				<div id="modal_category" class="modal fade" data-backdrop="false" tabindex="-1">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header bg-teal-400">
				                <h5 class="modal-title">Thêm danh mục</h5>
				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				            <div class="loadCate"></div>
				            <input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL">            <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBoxCate"></div><!--alert-->
				                </div>
				                <div class="col-12">
				                     <div class="form-group">
				                        <label for="exampleInputEmail1">Tên danh mục</label>
				                        <div class="tokenfield form-control"><input type="text" name="cate_id" class="form-control tokenfield-teal" value="" data-fouc="" tabindex="-1" style="position: absolute; left: -10000px;"><input type="text" tabindex="-1" style="position: absolute; left: -10000px;"><input type="text" class="token-input" autocomplete="off" placeholder="" id="1584678244131119-tokenfield" tabindex="0" style="min-width: 60px; width: 0px;"><span style="position:absolute;top:-9999px;left:-9999px;white-space:pre;"></span></div>
				                        
				                      </div>
				                </div><!--col-md-6-->
				                
				                <div class="col-12"><center><button class="text-center btn btn-primary" id="btn_cookie" type="button" onclick="submitCategory()">Thêm mới</button></center></div>
				              
				            </div>
				            
				        </div>
				    </div>
				</div>
				<!-- /disabled backdrop --><!-- Disabled backdrop -->
				<div id="modal_update" class="modal fade" data-backdrop="false" tabindex="-1">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header bg-warning">
				                <h5 class="modal-title">Cập nhật tài khoản zalo</h5>
				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				            <div class="modalBox"></div>
				            <input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL">            <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBox"></div><!--alert-->
				                </div>
				                <div class="col-6">
				                     <div class="form-group">
				                        <label for="exampleInputEmail1">Tên:</label>
				                        <input type="text" class="form-control" name="username"  placeholder="name" value="">
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">ID_ZALO:</label>
				                        <input type="text" class="form-control" name="id_zalo" placeholder="ID_ZALO" value="" disabled>
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Danh mục:</label>
				                       <select name="category_id" id="category" class="form-control">
				                           <option value="">== Chọn danh mục ==</option>
				                           @foreach($category as $cate)
				                               <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                           @endforeach
				                        </select>

				                      </div>
				                </div><!--col-md-6-->
				                 <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Số điện thoại:</label>
				                        <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại ở đây.." value="">
				                      </div>
				                </div><!--col-md-6-->
				                 <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Mật khẩu:</label>
				                        <input type="text" class="form-control" name="zalo_pass" placeholder="Nhập mật khẩu ở đây.." value="">
				                      </div>
				                </div><!--col-md-6-->

				                <div class="col-12 mt-1 checkPoint">
				                    <div class="row">
				                        
				                    <div class="col-md-4"><button class="btn btn-primary" type="button" onclick="getUpdateAccount(this)">Cập nhật</button></div>
				                    </div>
				                </div>
				            </div>
				            
				        </div>
				    </div>
				</div>

				<div id="modal_update_Officlal" class="modal fade" data-backdrop="false" tabindex="-1">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header bg-warning">
				                <h5 class="modal-title">Cập nhật tài khoản zalo OA</h5>
				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				            <div class="modalBox"></div>
				            <input type="hidden" name="_token" value="">
				            <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBox"></div><!--alert-->
				                </div>
				                <div class="col-6">
				                     <div class="form-group">
				                        <label for="exampleInputEmail1">Tên</label>
				                        <input type="text" class="form-control" name="username"  placeholder="name" value="">
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">ID_ZALO</label>
				                        <input type="text" class="form-control" name="id_zalo" placeholder="ID_ZALO" value="" disabled>
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Danh mục</label>
				                       <select name="category_id" id="category" class="form-control">
				                           <option value="">== chọn danh mục ==</option>
				                           @foreach($category as $cate)
				                               <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                           @endforeach
				                        </select>

				                      </div>
				                </div><!--col-md-6-->
				                
				                <div class="col-12 mt-1 checkPoint">
				                    <div class="row">
				                        
				                    <div class="col-md-4"><button class="btn btn-primary" type="button" onclick="getUpdateAccount(this)">Cập nhật</button></div>
				                    </div>
				                </div>
				            </div>
				            
				        </div>
				    </div>
				</div>
				<!-- /disabled backdrop -->    </div>
				<!-- Form inputs -->
				<div class="card">
				    <div class="card-body">
				    <div class="row">
				    <div class="col-md-5">
                         @foreach($admin  as $rowv2)
                         @if($rowv2->status !=1)
				        <a href="https://oauth.zaloapp.com/v3/oa/permission?app_id=1903187922727299234&redirect_uri=https://zalov2.phanmemninja.com/home"class="btn btn-success" type="button" data-target="#modal_backdrop"><i class="icon-plus2 mr-2"></i> Thêm tài khoản</a>
				        <button class="btn btn-danger" type="button" onclick="removeAllAccountOA()"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa tài khoản</button>
				        @endif
                         @endforeach

				      
				    </div><!--col-md-5-->
				    <div class="col-md-3">
				    <form method="GET" id="formSubmit">
				        <div class="row">
				           <div class="">
				                    <div class="form-group">
				                        
				                       <select name="category_id" id="category2" class="form-control" onchange="getAccount2ByCate()">
				                           <option value="">== Lọc theo danh mục ==</option>
				                           @foreach($category as $cate)
				                               <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                           @endforeach
				                        </select>
                                        {{ csrf_field() }}
				                      </div>
				                </div>
				           
				        </div>
				    </form>
				        </div><!--col-md-4-->
				       
				        <div class="col-md-4">
				        <form method="GET">
				            <div class="row">
				               {{--  <div class="col-md-9">
				                    <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
				                </div><!-col-md-9->
				                <div class="col-md-3">
				                    <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button>
				                </div> --}}
				                <div class="col-md-9">
				                <input type="text" name="country_name2" id="country_name2" class="form-control input-lg" placeholder="Nhập tên tài khoản tìm kiếm tại đây..." />
				                    <div id="countryList2"><br>
				                 </div>
				            </div><!--row-->
				        </form>   
				        </div><!--col-md-4-->
				</div>
				</div>
				<!-- /form inputs -->
				<div class="clearfix"></div>
				<!-- /table -->
				<input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL"><div class="showLoading"></div>
				<div class="alertListAccount"></div>   
				<div class="">
				    <div class="card-header header-elements-inline bg-slate-800">
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
												<label class="form-check-label formOA">
													<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckboxOA(this)">
													
												</label>
											</div>
				                        {{-- <div class="form-check">
				                            <label class="form-check-label">
				                                <div class="uniform-checker border-danger-600 text-danger-800"><span><input type="checkbox" class="form-check-input-styled-danger" onclick="checkAllCheckbox(this)" data-fouc=""></span></div>
				                            </label>
				                        </div> --}}
				                    </th>
				                    <th>ID</th>
				                    <th>Số điện thoại</th>
				                    <th>Hình ảnh</th>
				                    <th>Tên</th>
				                    <th>Danh mục</th>
				                    <th>Trạng thái</th>
				                    <th>Ngày tạo</th>
				                    <th>Thao tác</th>
				                </tr>
				            </thead>
				            <tbody class="data-table2 accountOA" id="accountOA">
				            	{{csrf_field()}}
				            	@if($status != 1)
				            	    @foreach($list_oa as $row)
						                <tr>
						                    <td>
						                    	<div class="form-check form-check-inline">
													<label class="form-check-label formOA" id="formOA">
														<input type="checkbox" class="form-check-input-styled" data-fouc value="{{ $row->zalo_id }}" name="selectGroup[]">
														
													</label>
												</div>
						                        {{-- <div class="form-check">
						                            <label class="form-check-label">
						                                <div class="uniform-checker"><span><input type="checkbox" name="id[]" class="form-check-input-styled" value="29" data-fouc=""></span></div>
						                            </label>
						                        </div> --}}
						                    </td>
						                    <td>{{$row->zalo_id}}</td>
						                    <td>{{ $row->phone }}</td>
						                    <td><img src="{{$row->image}}" width="40px" height="40px" style="border-radius: 50%!important;"></td>
						                    <td>{{$row->name}}</td>
						                    <td>
						                    	 @foreach($category as $cate)
				                                       @if($row->cate_id == $cate->id)	                    	
							                    	 <span class="badge badge-dark">{{$cate->name }}</span>
							                    	  @endif
						                          @endforeach	
						                    </td>
						                    <td>Hoạt động</td>
						                    <td>{{ $row->created_at }}</td>
						                    <td>
						                        <form method="POST" action="#">
						                             <input type="hidden" name="_token" value="">
						                             <input type="hidden" name="_method" value="DELETE">                           
						                           
						                            {{-- <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update_Officlal" data-name="" data-id="" onclick="changeAccount(this)"> Cập nhật</button> --}}
						                            @foreach($admin as $rowv2)
						                            @if($rowv2->status != 1)
						                            <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update" data-name="{{ $row->cate_id }}" data-name="{{ $row->name }}" data-id="{{ $row->id }}" onclick="changeAccount(this)"> Cập nhật</button>
						                            <a href="{{asset('home/delete/').'/'.$row->zalo_id}}" class="btn btn-danger" type="submit"  style="color:#FFFFFF"> <i class="icon-folder-remove icon-1x"></i> Xóa</a>
						                            @endif
						                            @endforeach
						                        </form>
						                    </td>
						                </tr>
				                @endforeach
				            	@else
                                     @foreach($list_oa as $row)
                                     @for ($i = 0; $i < count($role_page); $i++)
										  @if($role_page[$i] == $row->zalo_id)
											        <tr>
									                    <td>
									                    	<div class="form-check form-check-inline">
																<label class="form-check-label formOA" id="formOA">
																	<input type="checkbox" class="form-check-input-styled" data-fouc value="{{ $row->zalo_id }}" name="selectGroup[]">
																	
																</label>
															</div>
									                        {{-- <div class="form-check">
									                            <label class="form-check-label">
									                                <div class="uniform-checker"><span><input type="checkbox" name="id[]" class="form-check-input-styled" value="29" data-fouc=""></span></div>
									                            </label>
									                        </div> --}}
									                    </td>
									                    <td>{{$row->zalo_id}}</td>
									                    <td>{{ $row->phone }}</td>
									                    <td><img src="{{$row->image}}" width="40px" height="40px" style="border-radius: 50%!important;"></td>
									                    <td>{{$row->name}}</td>
									                    <td>
									                    	 @foreach($category as $cate)
							                                       @if($row->cate_id == $cate->id)	                    	
										                    	 <span class="badge badge-dark">{{$cate->name }}</span>
										                    	  @endif
									                          @endforeach	
									                    </td>
									                    <td>Hoạt động</td>
									                    <td>{{ $row->created_at }}</td>
									                    <td>
									                        <form method="POST" action="#">
									                             <input type="hidden" name="_token" value="">
									                             <input type="hidden" name="_method" value="DELETE">                           
									                           
									                            {{-- <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update_Officlal" data-name="" data-id="" onclick="changeAccount(this)"> Cập nhật</button> --}}
									                            @foreach($admin as $rowv2)
									                            @if($rowv2->status != 1)
									                            <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_update" data-name="{{ $row->cate_id }}" data-name="{{ $row->name }}" data-id="{{ $row->id }}" onclick="changeAccount(this)"> Cập nhật</button>
									                            <a href="{{asset('home/delete/').'/'.$row->zalo_id}}" class="btn btn-danger" type="submit"  style="color:#FFFFFF"> <i class="icon-folder-remove icon-1x"></i> Xóa</a>
									                            @endif
									                            @endforeach
									                        </form>
									                    </td>
									                </tr>
										  @endif    

									@endfor
						              
						                @endforeach
				            	@endif
				            	

				                        </tbody>
				        </table>
				                            
				            </div>
				            {{$list_oa->links()}}

				</div>

				<!-- /table -->

				<!-- /disabled backdrop -->    </div>

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
	             
		    </div> 
	    </div>
	  </div>
	</div>
	<!--Modal thong bao <-->
	{{-- tham gia nhóm theo link --}}
@if($status != 1)
<div class="modal fade settingProxy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header" style="border-bottom: 1px solid #cdcdcd;">
        <h4 class="modal-title" id="mySmallModalLabel">Thiết lập Proxy</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
       <div class="modal-body">
       	   <div class="container-fluid" id="contentMess">
              <div class="row">
              	 <div class="col-md-6">
              	 	<div class="form-group">
						<label>Proxy</label>
						<textarea class="dataLinks" id="listProxy" style="width: 100%;height: 200px;" placeholder="http://192.168.1.55:10000&#10;http://192.168.1.55:10000"></textarea>
					    <button class="btn btn-success addProxy">Thêm mới</button>
				    </div>
              	 </div>
                 <div class="col-md-6 ml-auto">
                 	<div class="form-group">
                 		<label>Tài khoản zalo:</label>
                 		<div class="card example-2 square scrollbar-dusty-grass square thin">
						    <div class="card-body bodyFriend" style="padding: 0px !important;">
						        <div class="bt-all-comment2" style="display: block;">
	                                   @foreach($account as $row)
	                                         @if($row->checkcookie !=1)
									            <div bt-type="inbox" class="bt-load-chat loadFriend" style=" position: relative;">
									                <div class="bt-avatar-user-chat">
									                    <img src="{{ $row->image }}" style=" position: absolute;"> 
									                </div>
									                <div class="bt-info-chat">
									                    <div class="bt-name-chat">{{ $row->name }}</div>
									                </div>
									                <div class="owl-page"></div>
									                <div class="owl-tag pull-right wrap-color">
									                    <div class="tags-cons">
									                        <select name="" class="LinkProxy" data-zaloid="{{ $row->zalo_id }}">
									                        	<option value="">Chưa có Proxy</option>
									                        	@foreach($listProxy as $value)
									                        	  <option value="{{ $value->proxy }}">{{ $value->proxy }}</option>
									                        	@endforeach
									                        </select>
									                    </div>
									                </div>
									                <input type="hidden" value="{{ $row->zalo_id }}" name="" class="pr_idzalo">
									                <input type="hidden" value="{{ $row->proxy }}" name="" class="pr_proxy" id="pr_proxy_{{ $row->zalo_id }}">
									            </div>
	                                    @endif
	                                   @endforeach
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
				<button type="button" class="btn btn-primary saveSettingProxy">Lưu thiết lập</button>
				
			</div>

       </div>
    </div>
  </div>
</div>
@endif
 <script>
 	$(".toggle-password").click(function() {

	  $(this).toggleClass("fa-eye fa-eye-slash");
	  var input = $($(this).attr("toggle"));
	  if (input.attr("type") == "password") {
	    input.attr("type", "text");
	  } else {
	    input.attr("type", "password");
	  }
	});

   $('.LinkProxy').change(function(){
      var proxy = $(this).val();
      var zaloid = $(this).attr("data-zaloid");
      $('#pr_proxy_'+zaloid).val(proxy);
      
   });

	$(".saveSettingProxy").click(function() {
		var _token = $('input[name="_token"]').val();
		var data = $('.pr_idzalo').map(function() {
		  return {
		    zaloid: $(this).val(),
		    proxy: $(this).next('.pr_proxy').val()
		  };
		}).get();
		$.ajax({
                url: '{{ url("home/saveSettingProxy") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {data:data, _token:_token},
                success: function( data, textStatus, jQxhr ){ 
                    if(data.status == 200){
                    	location.reload();
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                },
                complete: function(data, textStatus, jQxhr){
                   
                }
            });
		
	});
	$(".addProxy").click(function() {
		var _token = $('input[name="_token"]').val();
		var listProxy = $('#listProxy').val().trim();
		var arr = listProxy.replace(/(\r\n|\n|\r)/gm,";");
    	var arr_proxy = arr.split(";");
		$.ajax({
                url: '{{ url("home/saveProxy") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {arr_proxy:arr_proxy, _token:_token},
                success: function( data, textStatus, jQxhr ){ 
                    if(data.status == 200){
                    	location.reload();
                    }
                },
                error: function( jqXhr, textStatus, errorThrown ){
                },
                complete: function(data, textStatus, jQxhr){
                   
                }
            });
	});
	function updateInfo(){
		var arr = [];
		var check = 0;
		var k = 0;
	    $('.formProfile input[name="selectGroup[]"]:checked').each(function() {
            arr.push($(this).val());
            check = 1;
        });
        if(check != 1){
	       var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn 1 tài khoản zalo</p>';
			 $('.contentpoppup').html(html);
			$('#popupmess').modal('show');
			return false;
        }
        $('.loader-zalo').show();
        var html = 'Đang cập nhật thông tin tài khoản zalo: <span id="countSend"  style="color: red;"></span>/<span>'+arr.length+'</span>'; 
		$(".contentloader").html(html);
        for (var i = 0; i < arr.length; i++) {
        	var _token = $('input[name="_token"]').val();
        	setTimeout( function timer(){ 
        		$.ajax({
                    url: '{{ url("home/updateInfo") }}',
                    dataType: 'json',
                    type: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: {zalo_id:arr[k], _token:_token},
                    success: function( data, textStatus, jQxhr ){ 

                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                    },
                    complete: function(data, textStatus, jQxhr){
                       
                    }
                });
                var html2 = '<span>'+k+'</span>';
                $('#countSend').html(html2);
              k++;
              if(k == arr.length){
              	$('.loader-zalo').hide();
    		     var html3 = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Cập nhật hoàn thành.</p>';
				 $('.contentpoppup').html(html3);
				$('#popupmess').modal('show');
              }
        	}, i*2000 );
        }
	}
 </script>
				@stop