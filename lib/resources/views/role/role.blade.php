@extends('master')
@section('title','Quản lý nhân viên')
@section('main')
			<!-- Content area -->
			<div class="content" style="background-color: #FFFF;">
				<style>
					.erros_mess{
						display: none;
					}
                    .bt-info-chat{
                        padding-top: 15px;
                    }
                    .example-2 {
                        position: relative;
                        overflow-y: scroll;
                        height: 372px;
                    }
                    .titleAccount{
                        color: #4582EC;
                        font-size: 16px;
                    }
				</style>
        <!-- Form inputs -->
                <!-- Page header -->
                <link href="assets/css/mystyle.css" rel="stylesheet" type="text/css">
			<div class="page-header">

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="https://zalov2.phanmemninja.com/home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
			            <span class="breadcrumb-item active">Thêm & quản lý nhân viên</span>
			        </div>

			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>

			    <div class="header-elements d-none">
			        
			    </div>
			</div>
			</div>
			<!-- /page header -->
				<div class="clearfix"></div>
				<!-- /table -->
				
				<div class="showLoading"></div>
				<div class="alertListAccount"></div> 
               @if($status !=1)
				<form action="" id="postForm" name="postForm" method="post" accept-charset="utf-8">
				    {{ csrf_field() }}                                                                                                                 
				    <div class="bt-content-padd25">
       {{--  <div class="alertnj">
            @if(request()->input('add') == '1')
                <div class="alert alert-success">Thêm thành công</div>
                @elseif(request()->input('add') == '2')
                <div class="alert alert-danger">Đã tồn tại</div>
                @elseif(request()->input('add') == '3')
                <div class="alert alert-danger">Quá số lượng tài khoản cho phép (5 tài khoản)</div>
                @endif
        </div> --}}
        <div class="panel panel-default">
           <div class="card-header header-elements-inline bg-slate-800">
		        <h5 class="card-title"><i class="icon-pencil6 mr-2"></i>Thêm nhân viên</h5>
		        <div class="header-elements">
		        </div>
		    </div>

            <div class="panel-body" style="margin-top: 15px;">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="col-md-2 bt-title-form">
                            <span><b>Username:</b></span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="email" class="form-control emailaccount" required="">
                            <div class="requiredemail"></div>
                            <em class="text-danger alert_email erros_mess">Vui lòng nhập email</em>
                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="col-md-2 bt-title-form">
                            <span><b>Email:</b></span>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="username" class="form-control username" required="">
                            <em class="text-danger alert_username erros_mess">Vui lòng nhập username</em>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="col-md-2 bt-title-form">
                            <span><b>Password:</b></span>
                        </div>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control password" required="">
                            <em class="text-danger alert_password erros_mess">Vui lòng nhập password</em>
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="display: none">
                    <div class="col-md-12">
                        <div class="col-md-2 bt-title-form">
                            <span><b>Quyền</b></span>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control role-select" name="role" id="select_role_id">
                                <option value="2">Admin</option>
                                <option value="3">Sale</option>
                            </select>
                        </div>
                    </div>
                </div>

                	 <div class="form-group row">

	                    <div class="col-md-6">
	                        <div class="col-md-4 bt-title-form">
	                            <span><b>Quyền Official Account</b></span>
	                        </div>
	                        <div class="col-md-8">
	                            <input onkeyup="searchroledatabt(this)" style="border-bottom: none;" type="text" class="form-control" name="" placeholder="Tìm kiếm Official Account">
	                            <select class="form-control role-page-select" name="role_page[]" multiple="">
	                               @foreach($accountoa as $row)
	                                <option value="{{$row->zalo_id }}">{{ $row->name }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                    </div>

	                    <div class="col-md-6">
                        <div class="col-md-4 bt-title-form">
                            <span><b>Quyền Profile</b></span>
                        </div>
                        <div class="col-md-8">
                            <input onkeyup="searchroledatabt(this)" style="border-bottom: none;" type="text" class="form-control" name="" placeholder="Tìm kiếm Profile">
                            <select class="form-control role-profile-select" name="role_profile[]" multiple="">
                               @foreach($profile as $row)
                                <option value="{{ $row->zalo_id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>


                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="col-md-2 bt-title-form"></div>
                        <div class="col-md-6">
                            <div class="btn-config btn btn-primary adduser">Thêm thành viên</div>
                        </div>
                    </div>
                    <div class="messageErorrs" style="padding-top: 23px;"></div>
                </div>
            </div>
        </div>
        <div style="margin-top: 40px;" class="panel panel-default">
            <div class="card-header header-elements-inline bg-slate-800">
                    <div class="col-md-8">
                         <h5 class="card-title"><i class="icon-clipboard3 mr-2"></i>Danh sách nhân viên</h5>
                    </div>
                    <div class="col-sm-4">
                         <h5 class="card-title"><i class="icon-user-check mr-2"></i>Tổng tài khoản: {{ $count }} /10</h5>
                    </div>
		       
		        <div class="header-elements">
		        </div>
		    </div>
            <div class="panel-body">
                <div class="box-role">
                    <div class="row">
                        <div class="col-lg-12 list-roles">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Phone</th>
                                        <th>Danh mục</th>
                                        <th>Họ tên</th>
                                        <th>Email</th>
                                        <th>Quyền Official Account</th>
                                        <th>Quyền Profile</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-user="363">
                                        <td>tran van thuy</td>
                                        <td>dev11@ninjateam.vn</td>
                                        <td>
                                            <input onkeyup="searchroledatabt(this)" style="border-bottom: none;" type="text" class="form-control" name="" placeholder="Tìm kiếm Official Account">
                                            <select class="form-control role-page-select select_role_page_id_363" name="role_page" multiple="">
                                                <option value="2340839877247952616">Điện máy xanh xanh</option>
                                                <option value="2194945920378496135" selected="">Dien may vang</option>
                                            </select>
                                        </td>
                                        <td onclick="abc()">
                                            <input onkeyup="searchroledatabt(this)" style="border-bottom: none;" type="text" class="form-control" name="" placeholder="Tìm kiếm Profile">
                                            <select class="form-control role-profile-select select_role_profile_id_363" name="role_page" multiple="">
                                                <option value="5453796668602421788" selected="">Quân</option>
                                                <option value="9038843610399767491">Tuandepzai</option>
                                            </select>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <a data-id-user="" class="btn btn-primary btn-xs" onclick="updateMember(this,363)" style="color:#FFFF;"><i class="fa fa-check"></i> Áp dụng</a>
                                            <a data-id-user="" class="btn btn-danger btn-xs btn-delete-member" onclick="deleteuser(this,363)" style="color:#FFFF;"><i class="fa fa-trash" style="color: #FFF"></i> Xóa</a>
                                        </td>
                                    </tr> --}}

                                    @foreach($list as $key=>$row)
                                    <tr data-id-user="{{ $row->id }}">
                                        <td>{{ $key }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>
                                            @foreach($category as $cate)
                                             @if($row->category == $cate->id)                            
                                                 @if($cate->color != null)<span class="badge badge-dark" style="background-color: #{{$cate->color}};font-size: 100%;">{{$cate->name }}</span> @else {{$cate->name}}@endif
                                                  @endif
                                            @endforeach 

                                        </td>
                                        <td>{{ $row->firstname }}</td>
                                        <td>{{ $row->email }}</td>

                                        <td style="width: 217px;">
                                            {{-- <input onkeyup="searchroledatabt(this)" style="border-bottom: none;" type="text" class="form-control" name="" placeholder="Tìm kiếm Official Account">
                                            <div class="card example-2 square scrollbar-dusty-grass square thin">
                                            <div class="card-body bodyFriend" style="padding: 0px !important;">
                                                <div class="bt-all-comment2" style="display: block;">
                                                    @foreach($accountoa as $value1)
                                                    <div bt-type="inbox" data-userid="8156121327915152395" bt-content-chat="" isfr="1" class="bt-load-chat ">
                                                        
                                                        <input  type="checkbox" class="checkallZaloGroup select_{{ $value1->zalo_id }}" data-type="fanpage" value="{{ $value1->zalo_id }}" style="display: block; float:right;">
                                                         
                                                        <div class="bt-avatar-user-chat">
                                                            <img src="{{ $value1->image }}" style=" position: absolute;"> 
                                                        </div>
                                                        <div class="bt-info-chat">
                                                            <div class="bt-name-chat">{{ $value1->name }}</div>
                                                        </div>
                                                        <div class="owl-page"></div>
                                                        <div class="owl-tag pull-right wrap-color">
                                                            <div class="tags-cons">
                                                                <ul> 
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                        
                                                 </div>
                                            </div>
                                         </div> --}}
                                        </td>

                                        <td style="width: 217px;">
                                            {{-- <input onkeyup="searchroledatabt(this)" style="border-bottom: none;" type="text" class="form-control" name="" placeholder="Tìm kiếm Profile">
                                             <div class="card example-2 square scrollbar-dusty-grass square thin">
                                            <div class="card-body bodyFriend" style="padding: 0px !important;">
                                                <div class="bt-all-comment2" style="display: block;">
                                                    @foreach($profile as $value)
                                                    <div bt-type="inbox" data-userid="8156121327915152395" bt-content-chat="" isfr="1" class="bt-load-chat " >
                                                        <input  type="checkbox" class="checkallZaloGroup select_{{ $value->zalo_id }}" data-type="fanpage" value="{{ $value->zalo_id }}" style="display: block; float:right;">
                                                        <div class="bt-avatar-user-chat">
                                                            <img src="{{ $value->image }}" style=" position: absolute;"> 
                                                        </div>
                                                        <div class="bt-info-chat">
                                                            <div class="bt-name-chat">{{ $value->name }}</div>
                                                        </div>
                                                        <div class="owl-page"></div>
                                                        <div class="owl-tag pull-right wrap-color">
                                                            <div class="tags-cons">
                                                                <ul> 
                                                              </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                        
                                                 </div>
                                            </div>
                                         </div> --}}

                                        </td>
                                        <td style="vertical-align: middle;">
                                           {{--  <a data-id-user="" class="btn btn-primary btn-xs" onclick="updateMember(this,{{ $row->id }})" style="color:#FFFF;"><i class="fa fa-check"></i> Áp dụng</a> --}}
                                            <button class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#modal_updateRole" onclick="getDataUserNV({{ $row->id }})"> Cập nhật</button>
                                            <a data-id-user="" class="btn btn-danger btn-xs btn-delete-member" onclick="deleteuser(this,{{ $row->id }})" style="color:#FFFF;"><i class="fa fa-trash" style="color: #FFF"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                         {{-- {{$list->links()}} --}}
                    </div>
                </div>
            </div>
        </div>

         <div class="modal fade bd-example-modal-sm" id="popupmess" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header" style="border-bottom: 1px solid #cdcdcd;">
                    <h4 class="modal-title" id="mySmallModalLabel">Thông báo</h4>
                    <button type="button" class="close" data-dismiss="modal"  onclick="reloadpopup()" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                       <div class="modal-body contentpoppup">
                          <p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn nhóm, trước khi đăng bài!</p>
                    </div> 
                </div>
              </div>
            </div>
    <!--Modal thong bao <-->
    </div>
</form>

     <div id="modal_updateRole" class="modal fade" data-backdrop="false" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title">Cập nhật tài khoản Nhân viên</h5>
                                <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
                            {{-- <div class="modalBox"><div class="alert alert-danger alert-styled-left alert-dismissible" style="border-color:#e53935;"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="fa fa-undefined-sign" aria-hidden="true"></span>&nbsp;Đang cập nhật tính năng. Xin cảm ơn</div></div> --}}
                             {{ csrf_field() }}
                             <input type="hidden" name="idCheck" value="">
                            <div class="modal-body row">
                                
                                <div class="col-4">
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Tên:</label>
                                        <input type="text" class="form-control" name="username"  placeholder="Họ và Tên" value="">
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Email:</label>
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="">
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Danh mục:</label>
                                       <select name="category_id" id="category" class="form-control">
                                           <option value="">== Chọn danh mục ==</option>
                                          
                                                @foreach($category as $cate)
                                                    <option value="{{ $cate->id }}" id="selectCateID_{{ $cate->id }}">{{ $cate->name }}</option>
                                                @endforeach
                                          
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại:</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại ở đây.." value="">
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Mật khẩu:</label>
                                        <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu ở đây.." value="">
                                        <span style="color: red;font-size: 12px;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Nếu đổi mật khẩu mới nhập trường này.</span>
                                      </div>

                                </div><!--col-md-6-->

                                 <div class="col-4">
                                    <div class="form-group">
                                        <label class="titleAccount">Tài khoản zalo Profile:</label>
                                        <div class="card example-2 square scrollbar-dusty-grass square thin">
                                            <div class="card-body bodyFriend" style="padding: 0px !important;">
                                                <div class="bt-all-comment2" style="display: block;">
                                                 @foreach($profile as $value)
                                                    <div bt-type="inbox" data-userid="8156121327915152395" bt-content-chat="" isfr="1"  class="bt-load-chat "  id="bodycolor_{{ $value->zalo_id }}" {{-- @foreach($roleAcc as $row) @if($row->roleProfile == $value->zalo_id)style=" position: relative; background-color: #008ff3b8;" @endif  @endforeach --}}>
                                                        <input id="select_{{ $value->zalo_id }}" type="checkbox" class="selectepageZaloProfile checkallZaloGroup select_{{ $value->zalo_id }}" data-type="fanpage" value="{{ $value->zalo_id }}" style="display: block; float:right;" {{-- @foreach($roleAcc as $row) @if($row->roleProfile == $value->zalo_id) checked @endif  @endforeach --}}>
                                                        <div class="bt-avatar-user-chat">
                                                            <img src="{{ $value->image }}" style=" position: absolute;"> 
                                                        </div>
                                                        <div class="bt-info-chat">
                                                            <div class="bt-name-chat">{{ $value->name }}</div>
                                                        </div>
                                                        <div class="owl-page"></div>
                                                        <div class="owl-tag pull-right wrap-color">
                                                            <div class="tags-cons">
                                                                <ul> 
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--col-md-6-->
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="titleAccount">Tài khoản zalo Official:</label>
                                        <div class="card example-2 square scrollbar-dusty-grass square thin">
                                            <div class="card-body bodyFriend" style="padding: 0px !important;">
                                                <div class="bt-all-comment2" style="display: block;">
                                                      @foreach($accountoa as $value)
                                                      
                                                    <div bt-type="inbox" data-userid="8156121327915152395" class="bt-load-chat loadFriend 5716029740350556538_2340839877247952616"  id="bodycolor_{{ $value->zalo_id }}" {{-- @foreach($roleAcc as $row) @if($row->rolePage == $value->zalo_id)style=" position: relative; background-color: #008ff3b8;" @endif  @endforeach --}}>
                                                        <input id="select_{{ $value->zalo_id }}"  type="checkbox" class="selectepageZaloOfficial checkallZaloGroup select_{{ $value->zalo_id }}" data-type="fanpage" value="{{ $value->zalo_id }}" style="display: block; float:right;">
                                                        <div class="bt-avatar-user-chat">
                                                            <img src="{{ $value->image }}" style=" position: absolute;"> 
                                                        </div>
                                                        <div class="bt-info-chat">
                                                            <div class="bt-name-chat">{{ $value->name }}</div>
                                                        </div>
                                                        <div class="owl-page"></div>
                                                        <div class="owl-tag pull-right wrap-color">
                                                            <div class="tags-cons">
                                                                <ul> 
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                   @endforeach
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--col-md-6-->

                                <div class="col-12 mt-1 checkPoint">
                                    <div class="row">
                                        
                                    <div class="col-md-4"><button class="btn btn-primary" type="button" onclick="updateInforUserNV()">Cập nhật</button></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>


@endif
			<!-- /disabled backdrop -->    

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
			<script type="text/javascript">

			$(document).ready(function(){
                   var locationv2 = window.location.href;
            
                      if(locationv2 == 'https://zalov2.phanmemninja.com/role'){

                            $('.d-md-block').trigger('click');
                      }
                      
				function validateForm(emailaccount,username,password){
				    if(emailaccount == ''){
				        $('#postForm input[name="email"]').addClass('is-invalid');
				        $('#postForm .alert_email').show();
				    }else{
				        $('#postForm input[name="email"]').removeClass('is-invalid');
				        $('#postForm .alert_email').hide();
				    }
				    if(username == ''){
				        $('#postForm input[name="username"]').addClass('is-invalid');
				        $('#postForm .alert_username').show();
				    }else{
				        $('#postForm input[name="username"]').removeClass('is-invalid');
				        $('#postForm .alert_username').hide();
				    }
				    if(password == ''){
				        $('#postForm input[name="password"]').addClass('is-invalid');
				        $('#postForm .alert_password').show();
				    }else{
				        $('#postForm input[name="password"]').removeClass('is-invalid');
				        $('#postForm .alert_password').hide();
				    }

				    if(emailaccount == '' || username == '' || password == '')
				    {
				        return false;
				    }
				    return true;
				}
			$('.adduser').click(function(){
				  var params = {};
                  var emailaccount = $('.emailaccount').val();
                  var username = $('.username').val();
                  var password = $('.password').val();
				 var validate = validateForm(emailaccount,username,password);
                 if(validate == true){
                 	params['emailaccount'] = $('.emailaccount').val();
					params['username'] = $('.username').val();
					params['password'] = $('.password').val();
					params['role_page_select'] = JSON.stringify($('.role-page-select').val());
					params['role_profile_select'] = JSON.stringify($('.role-profile-select').val());
					params['_token'] = $('input[name="_token"]').val();
					
					$.ajax({
						url: '{{ url("role/add") }}',
						dataType: 'json',
						type: 'post',
						contentType: 'application/x-www-form-urlencoded',
						data: params,
						success: function( data, textStatus, jQxhr ){
							
							if (data.status == '404') {
								alertBox(data.mess,"e53935",'.messageErorrs',true,true);

							} else {
								alertBox(data.mess,"00a65a",'.messageErorrs',true,true);
                                setTimeout(function(){
                                    window.location.reload();
                                 }, 1000)
							}
							 //location.reload();
							 
							
						},
						error: function( jqXhr, textStatus, errorThrown ){ 
						},
						complete: function( data, textStatus, jQxhr){
							
						}
					});

                 }

				
				
				
				
			});

		});
			function updateMember(el, id){
					var params = {};
					params['id'] = id;
					params['page'] = JSON.stringify($('.select_role_page_id_'+id).val());
					params['profile'] = JSON.stringify($('.select_role_profile_id_'+id).val());
					params['_token'] = $('input[name="_token"]').val();
					console.log(params);
					$.ajax({
						url: '{{ url("role/update") }}',
						dataType: 'json',
						type: 'post',
						contentType: 'application/x-www-form-urlencoded',
						data: params,
						success: function( data, textStatus, jQxhr ){
							if (data.status == '404') {
								alertBox(data.mess,"e53935",'.messageErorrs',true,true);
							} else {
								alertBox(data.mess,"00a65a",'.messageErorrs',true,true);
							}
							//location.reload();
							setTimeout(function(){
		                        window.location.reload();
		                     }, 1000)
							
						},
						error: function( jqXhr, textStatus, errorThrown ){ 
						},
						complete: function( data, textStatus, jQxhr){
							
						}
					});
				}

				function deleteuser(el,id){
					var params = {};
					params['id'] = id;
					params['page'] = JSON.stringify($('.select_role_page_id_'+id).val());
					params['profile'] = JSON.stringify($('.select_role_profile_id_'+id).val());
					params['_token'] = $('input[name="_token"]').val();

					$.ajax({
						url: '{{ url("role/delete") }}',
						dataType: 'json',
						type: 'post',
						contentType: 'application/x-www-form-urlencoded',
						data: params,
						success: function( data, textStatus, jQxhr ){
							if (data.status == '404') {
								//alertBox(data.mess,"e53935",'.messageErorrs',true,true);
                                 $("p").remove(".contentmess");
                                   var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>'+data.mess+'</p>';
                                     $('.contentpoppup').html(html);
                                    $('#popupmess').modal('show');
							} else {
								//alertBox(data.mess,"00a65a",'.messageErorrs',true,true);
                                $("p").remove(".contentmess");
                                   var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+data.mess+'</p>';
                                     $('.contentpoppup').html(html);
                                    $('#popupmess').modal('show');
							}
							//location.reload();
							// setTimeout(function(){
		     //                    window.location.reload();
		     //                 }, 1000)
							
						},
						error: function( jqXhr, textStatus, errorThrown ){ 
						},
						complete: function( data, textStatus, jQxhr){
							
						}
					});
				}
            function getDataUserNV(ob){
                  var _token = $('input[name="_token"]').val();
                  $(".selectepageZaloProfile").prop('checked', false); 
                  $(".selectepageZaloOfficial").prop('checked', false);
                  $(".bt-load-chat").css({ 'background-color' : '', 'opacity' : '' });
                $.ajax({
                        url: '{{ url("role/getDataUserNV") }}',
                        dataType: 'json',
                        type: 'post',
                        contentType: 'application/x-www-form-urlencoded',
                        data: {id:ob, _token:_token},
                        success: function( data, textStatus, jQxhr ){
                            if(data.status == 200){
                                 
                                 $('#modal_updateRole input[name="username"]').val(data.data.firstname);
                                 $('#modal_updateRole input[name="email"]').val(data.data.email);
                                 $('#modal_updateRole input[name="phone"]').val(data.data.phone);
                                 $('#modal_updateRole input[name="idCheck"]').val(data.data.id);
                                 if(data.data.category != null){
                                    document.getElementById("selectCateID_"+data.data.category).selected = "true";
                                 }
                                 
                            }else if(data.status == 202){

                                 var arr = data.data.data;
                                 $('#modal_updateRole input[name="username"]').val(data.data.firstname);
                                 $('#modal_updateRole input[name="email"]').val(data.data.email);
                                 $('#modal_updateRole input[name="phone"]').val(data.data.phone);
                                 $('#modal_updateRole input[name="idCheck"]').val(data.data.id);
                                  for (var i = 0; i <arr.length; i++) {
                                    
                                        if(arr[i].roleProfile != null){
                                            document.getElementById("select_"+arr[i].roleProfile).checked = "true";
                                            document.getElementById("bodycolor_"+arr[i].roleProfile).style.backgroundColor = "#2196f38f";
                                        }
                                     
                                  }
                                   for (var i = 0; i <arr.length; i++) {
                                       if(arr[i].rolePage != null){
                                                document.getElementById("select_"+arr[i].rolePage).checked = "true";
                                                document.getElementById("bodycolor_"+arr[i].rolePage).style.backgroundColor = "#2196f38f";
                                            }
                                   }
                                 if(data.data.category != null){
                                    
                                    document.getElementById("selectCateID_"+data.data.category).selected = "true";
                                 }

                                
                            }
                            
                        },
                        error: function( jqXhr, textStatus, errorThrown ){ 
                        },
                        complete: function( data, textStatus, jQxhr){
                            
                        }
                    });
            }

            function updateInforUserNV(){
                var _token = $('input[name="_token"]').val();
                 var arr = new Array();
                 var arrv2 = new Array();
                var params = {};
                params['email'] = $('#modal_updateRole input[name="email"]').val();
                params['password'] = $('#modal_updateRole input[name="password"]').val();
                params['phone'] = $('#modal_updateRole input[name="phone"]').val();
                params['_token'] = _token;
                params['name'] = $('#modal_updateRole input[name="username"]').val();
                params['cateid'] = $('#modal_updateRole select[name="category_id"]').val();
                params['id']     =$('#modal_updateRole input[name="idCheck"]').val();
                // lấy account zalo profile
                $('.selectepageZaloProfile').each(function(i, value){
                     if ($(value).is(':checked')) {
                            arr.push($(value).val());
                        }
                 });

                // lấy account zalo official
                 $('.selectepageZaloOfficial').each(function(i, value){
                     if ($(value).is(':checked')) {
                            arrv2.push($(value).val());
                        }
                 });

                 params['roleProfile'] = arr;
                 params['rolePage'] = arrv2;
                 $.ajax({
                        url: '{{ url("role/updateInforUserNV") }}',
                        dataType: 'json',
                        type: 'post',
                        contentType: 'application/x-www-form-urlencoded',
                        data: params,
                        success: function( data, textStatus, jQxhr ){
                            if(data.status == 200){
                                
                                  var html3 = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+data.message+'</p>';
                                    $('.contentpoppup').html(html3);
                                    $('#modal_updateRole').modal('hide');
                                    $('#popupmess').modal('show');
                                 
                            }else{
                                 var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Đã xảy ra lỗi vui lòng thử lại.</p>';
                                 $('.contentpoppup').html(html);
                                $('#modal_updateRole').modal('hide');
                                $('#popupmess').modal('show');
                            }
                            
                        },
                        error: function( jqXhr, textStatus, errorThrown ){ 
                        },
                        complete: function( data, textStatus, jQxhr){
                            
                        }
                    });
            }
         </script>
			@stop




			