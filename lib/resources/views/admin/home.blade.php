@extends('admin.master')
@section('title','Tài khoản zalo')
@section('main')
<div class="content">
	<!-- Page header -->
			<div class="page-header">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="http://app2.phanmemninja.com" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
			            <a href="http://app2.phanmemninja.com/setting" class="breadcrumb-item">Cấu hình</a>
			            <span class="breadcrumb-item active">Tài khoản zalo</span>
			        </div>

			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>

			    <div class="header-elements d-none">
			        
			    </div>
			</div>
			</div>
			<!-- /page header -->
        <!-- Form inputs -->
				<div class="card">
				    <div class="card-body">
				    <div class="row">
				    <div class="col-md-5">
				        <a href="https://oauth.zaloapp.com/v3/auth?app_id=1932623747349214078&amp;redirect_uri=https://zalo.phanmemninja.com/settings/fb_accounts&amp;state=textwhatyouwant"class="btn btn-success" type="button" data-target="#modal_backdrop"><i class="icon-plus2 mr-2"></i> Thêm tài khoản</a>
				        <button class="btn btn-danger" type="button" onclick="removeAllAccount(confirm(&quot;Bạn có chắc chắn muốn xóa?&quot;))"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa tài khoản</button>
				        <button class="btn btn-primary" type="button" onclick="checkCookie()"><i class="icon-shield-check mr-3 icon-1x"></i> Check Cookie</button>
				        <button class="btn  bg-teal-400" type="button" data-toggle="modal" data-target="#modal_category"><i class="icon-comment-discussion mr-2"></i> Thêm danh mục</button>
				    </div><!--col-md-5-->
				    <div class="col-md-3">
				    <form method="GET" id="formSubmit">
				        <div class="row">
				                        <div class="form-group col-md-9">
				            <div class="multiselect-native-select"><select name="cate_group[]" class="multiselect-filtering select_group" multiple="multiple">
				                <option disabled="" selected="" class="d-none">Lọc theo danh mục</option> 
				                                                                        <option value="3">ahihio</option>
				                                                        <option value="6">Facebook</option>
				                                                        <option value="7">Googoo</option>
				                                                        <option value="8">Zaloooo</option>
				                                                        <option value="10">Bán hàng haha</option>
				                                                        <option value="14">Ahii</option>
				                                                        <option value="15">hihi</option>
				                                            </select><div class="btn-group" style="width: 100%;"><button type="button" class="multiselect dropdown-toggle btn btn-light" data-toggle="dropdown" title="Lọc theo danh mục" style="width: 100%; overflow: hidden; text-overflow: ellipsis;"><span class="multiselect-selected-text">Lọc theo danh mục</span></button><div class="multiselect-container dropdown-menu"><div class="multiselect-item multiselect-filter"><div class="input-group"><input class="form-control multiselect-search" type="text" placeholder="Search"><i class="icon-search4"></i><span class="input-group-append"><button class="btn btn-light btn-icon multiselect-clear-filter" type="button"><i class="icon-cross2"></i></button></span></div></div><div class="multiselect-item dropdown-item form-check d-none disabled active" tabindex="-1"><label class="form-check-label"><input type="checkbox" value="Lọc theo danh mục" disabled=""> Lọc theo danh mục<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="checkbox" value="3"> ahihio<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="checkbox" value="6"> Facebook<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="checkbox" value="7"> Googoo<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="checkbox" value="8"> Zaloooo<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="checkbox" value="10"> Bán hàng haha<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="checkbox" value="14"> Ahii<span class="form-check-control-indicator"></span></label></div><div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label"><input type="checkbox" value="15"> hihi<span class="form-check-control-indicator"></span></label></div></div></div></div>
				            </div>
				            <div class="col-md-3"><button type="button" class="btn btn-dark" onclick="filterCateGroup()"><i class="icon-filter4 icon-1x"></i> Lọc</button></div>
				        </div>
				    </form>
				        </div><!--col-md-4-->
				       
				        <div class="col-md-4">
				        <form method="GET">
				            <div class="row">
				                <div class="col-md-9">
				                    <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
				                </div><!--col-md-9-->
				                <div class="col-md-3">
				                    <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button>
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
				        <h5 class="card-title">Danh sách tài khoản</h5>
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
				                                <div class="uniform-checker border-danger-600 text-danger-800"><span><input type="checkbox" class="form-check-input-styled-danger" onclick="checkAllCheckbox(this)" data-fouc=""></span></div>
				                            </label>
				                        </div>
				                    </th>
				                    <th>ID</th>
				                    <th>Hình ảnh</th>
				                    <th>Tên</th>
				                    <th>Danh mục</th>
				                    <th>Cookie</th>
				                    <th>Proxy</th>
				                    <th>Ngày tạo</th>
				                    <th>Thao tác</th>
				                </tr>
				            </thead>
				            <tbody>
				          
				               
				                <tr>
				                    <td>
				                        <div class="form-check">
				                            <label class="form-check-label">
				                                <div class="uniform-checker"><span><input type="checkbox" name="id[]" class="form-check-input-styled" value="29" data-fouc=""></span></div>
				                            </label>
				                        </div>
				                    </td>
				                    <td>100045229119027</td>
				                    <td><img src="https://graph.facebook.com/100045229119027/picture?redirect=1&amp;height=150&amp;width=150&amp;type=normal" width="40px" height="40px"></td>
				                    <td>Hoàng Ngọc Hà</td>
				                    <td><span class="badge badge-dark">Bán hàng haha</span></td>
				                    <td> <span class="badge bg-success">Live</span> </td>
				                    <td></td>
				                    <td>2020-03-20 09:42:38</td>
				                    <td>
				                        <form method="POST" action="http://app2.phanmemninja.com/setting/29">
				                             <input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL">
				                             <input type="hidden" name="_method" value="DELETE">                           
				                            <a class="btn btn-primary" href="#"><i class="icon-shield-check"></i> Thêm cookie</a>
				                            <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"> <i class="icon-folder-remove icon-1x"></i> Xóa</button>
				                        </form>
				                    </td>
				                </tr>
				                        </tbody>
				        </table>
				                            
				            </div>
				</div>
				<!-- /table -->

				<!-- Disabled backdrop -->
				<div id="modal_backdrop" class="modal fade" data-backdrop="false" tabindex="-1">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header bg-success">
				                <h5 class="modal-title">Thêm tài khoản Facebook</h5>
				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				            <div class="modalBox"></div>
				            <input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL">            <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBox"></div><!--alert-->
				                </div>
				                <div class="col-6">
				                     <div class="form-group">
				                        <label for="exampleInputEmail1">Tài khoản</label>
				                        <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="FB username/email" value="">
				                        <small class="text-danger alert_username">Vui lòng nhập tài khoản</small>
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Mật khẩu</label>
				                        <input type="password" class="form-control" name="password" placeholder="FB password" value="">
				                        <small class="text-danger alert_password">Vui lòng nhập mật khẩu</small>
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Danh mục</label>
				                       <select name="category_id" id="category" class="form-control">
				                           <option value="">== Chọn danh mục ==</option>
				                                                                             <option value="3">ahihio</option>
				                                                     <option value="6">Facebook</option>
				                                                     <option value="7">Googoo</option>
				                                                     <option value="8">Zaloooo</option>
				                                                     <option value="10">Bán hàng haha</option>
				                                                     <option value="14">Ahii</option>
				                                                     <option value="15">hihi</option>
				                                                                         </select>
				                       <small class="text-danger alert_category">Vui lòng chọn danh mục</small>
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                    <label for="exampleInputEmail1">Proxy</label>
				                    <input type="text" class="form-control" name="proxy" placeholder="Ví dụ: 192.168.1.120:8000" value="">
				                  </div>
				                </div><!--col-md-6-->
				                <div class="col-12">
				                    <div class="form-group">
				                    <label for="exampleInputEmail1">User-Agent</label>
				                    <input type="text" class="form-control" name="user_agent" value="Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19">
				                    <p class="text-danger">User-Agent: là trình duyệt bạn sử dung để đăng nhập, để trống trường này chúng tôi sẽ lấy trình duyệt mặc định</p>
				                  </div>
				                </div><!--col-md-12-->
				                <div class="col-12"><center><button class="text-center btn btn-primary btn_cookie" type="button" onclick="loginFacebookViaPass('#modal_backdrop')">Lấy cookie</button></center></div>
				                <div class="col-12 mt-1 checkPoint">
				                    <div class="row">
				                        <div class="col-md-8">
				                        <input type="text" name="code" class="form-control is-invalid" placeholder="Vui lòng nhập ứng dụng Facebook">
				                    </div>
				                    <div class="col-md-4"><button class="btn btn-primary" type="button" onclick="getValueCookie('#modal_backdrop')">Đăng nhập</button></div>
				                    </div>
				                </div>
				                <div class="form-group col-12">
				                    <p class="text-danger">Mật khẩu tài khoản Facebook của bạn sẽ KHÔNG được lưu trữ, chúng tôi chỉ sử dụng mật khẩu để tạo mã thông báo facebook</p>
				                </div>
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
				                        <em>Mỗi danh mục cách nhau bởi 1 dấu phẩy ","</em>
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
				                <h5 class="modal-title">Cập nhật tài khoản Facebook</h5>
				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				            <div class="modalBox"></div>
				            <input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL">            <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBox"></div><!--alert-->
				                </div>
				                <div class="col-6">
				                     <div class="form-group">
				                        <label for="exampleInputEmail1">Tài khoản</label>
				                        <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="FB username/email" value="">
				                        <small class="text-danger alert_username">Vui lòng nhập tài khoản</small>
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Mật khẩu</label>
				                        <input type="password" class="form-control" name="password" placeholder="FB password" value="">
				                        <small class="text-danger alert_password">Vui lòng nhập mật khẩu</small>
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Danh mục</label>
				                       <select name="category_id" id="category" class="form-control">
				                           <option value="">== Chọn danh mục ==</option>
				                                                                             <option value="3">ahihio</option>
				                                                     <option value="6">Facebook</option>
				                                                     <option value="7">Googoo</option>
				                                                     <option value="8">Zaloooo</option>
				                                                     <option value="10">Bán hàng haha</option>
				                                                     <option value="14">Ahii</option>
				                                                     <option value="15">hihi</option>
				                                                                         </select>
				                       <small class="text-danger alert_category">Vui lòng chọn danh mục</small>
				                      </div>
				                </div><!--col-md-6-->
				                <div class="col-6">
				                    <div class="form-group">
				                    <label for="exampleInputEmail1">Proxy</label>
				                    <input type="text" class="form-control" name="proxy" placeholder="Ví dụ: 192.168.1.120:8000" value="">
				                  </div>
				                </div><!--col-md-6-->
				                <div class="col-12">
				                    <div class="form-group">
				                    <label for="exampleInputEmail1">User-Agent</label>
				                    <input type="text" class="form-control" name="user_agent" value="Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19">
				                    <p class="text-danger">User-Agent: là trình duyệt bạn sử dung để đăng nhập, để trống trường này chúng tôi sẽ lấy trình duyệt mặc định</p>
				                  </div>
				                </div><!--col-md-12-->
				                <div class="col-12"><center><button class="text-center btn btn-primary btn_cookie" type="button" onclick="loginFacebookViaPass('#modal_update')">Lấy cookie</button></center></div>
				                <div class="col-12 mt-1 checkPoint">
				                    <div class="row">
				                        <div class="col-md-8">
				                        <input type="text" name="code" class="form-control is-invalid" placeholder="Vui lòng nhập ứng dụng Facebook">
				                    </div>
				                    <div class="col-md-4"><button class="btn btn-primary" type="button" onclick="getValueCookie('#modal_update')">Đăng nhập</button></div>
				                    </div>
				                </div>
				                <div class="form-group col-12">
				                    <p class="text-danger">Mật khẩu tài khoản Facebook của bạn sẽ KHÔNG được lưu trữ, chúng tôi chỉ sử dụng mật khẩu để tạo mã thông báo facebook</p>
				                </div>
				            </div>
				            
				        </div>
				    </div>
				</div>
				<!-- /disabled backdrop -->    </div>
				      </div>
				@stop