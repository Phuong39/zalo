@extends('admin.master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
        <!-- Form inputs -->
                <!-- Page header -->
			<div class="page-header">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="http://app2.phanmemninja.com" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
			            <a href="http://app2.phanmemninja.com/setting" class="breadcrumb-item">Cấu hình</a>
			            <span class="breadcrumb-item active">Danh mục tài khoản</span>
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
				<input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL"><div class="showLoading"></div>
				<div class="alertListAccount"></div>   
				<div class="row">
				<div class="col-md-12">
				    <div class="card">
				        <div class="card-body">
				        <form method="GET">
				            <div class="row">
				                <div class="col-md-6">
				                    <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
				                </div><!--col-md-9-->
				                <div class="col-md-3">
				                    <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button>
				                </div>
				            </div>
				        </form>
				        </div>
				    </div>
				    </div><!--col-md-12-->
				    <div class="col-md-7">
				        <div class="card">
				        <div class="card-header header-elements-inline bg-slate-800">
				            <h5 class="card-title">Danh mục tài khoản</h5>
				            <div class="header-elements">
				                <button class="btn btn-danger" type="button" onclick="deleteCategory(confirm(&quot;Bạn có chắc chắn muốn xóa?&quot;))"><i class="icon-folder-remove icon-1x"></i> Xóa danh mục</button>
				            </div>
				        </div>
				        <div class="table-responsive">
				                    <table class="table table-striped">
				                <thead>
				                    <tr>
				                        <th>
				                            <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker border-danger-600 text-danger-800"><span><input type="checkbox" class="form-check-input-styled-danger" onclick="checkAllCheckbox(this)" data-fouc=""></span></div>
				                                </label>
				                            </div>
				                        </th>
				                        <th>Tên Danh mục</th>
				                        <th>Ngày tạo</th>
				                        <th>Thao tác</th>
				                    </tr>
				                </thead>
				                <tbody>
				                                        <tr>
				                        <td>
				                        <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="id[]" value="15"></span></div>
				                                </label>
				                            </div>
				                        </td>
				                        <td>hihi</td>
				                        <td>2020-03-19 13:53:19</td>
				                        <td>
				                            <button class="btn btn-warning" type="button" onclick="updateCategory(this)" data-id="15" data-name="hihi"><i class="icon-pencil5  icon-1x"></i> Cập nhật</button>
				                        </td>
				                    </tr>
				                                        <tr>
				                        <td>
				                        <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="id[]" value="14"></span></div>
				                                </label>
				                            </div>
				                        </td>
				                        <td>Ahii</td>
				                        <td>2020-03-19 11:30:15</td>
				                        <td>
				                            <button class="btn btn-warning" type="button" onclick="updateCategory(this)" data-id="14" data-name="Ahii"><i class="icon-pencil5  icon-1x"></i> Cập nhật</button>
				                        </td>
				                    </tr>
				                                        <tr>
				                        <td>
				                        <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="id[]" value="10"></span></div>
				                                </label>
				                            </div>
				                        </td>
				                        <td>Bán hàng haha</td>
				                        <td>2020-03-19 09:13:08</td>
				                        <td>
				                            <button class="btn btn-warning" type="button" onclick="updateCategory(this)" data-id="10" data-name="Bán hàng haha"><i class="icon-pencil5  icon-1x"></i> Cập nhật</button>
				                        </td>
				                    </tr>
				                                        <tr>
				                        <td>
				                        <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="id[]" value="6"></span></div>
				                                </label>
				                            </div>
				                        </td>
				                        <td>Facebook</td>
				                        <td>2020-03-17 15:15:41</td>
				                        <td>
				                            <button class="btn btn-warning" type="button" onclick="updateCategory(this)" data-id="6" data-name="Facebook"><i class="icon-pencil5  icon-1x"></i> Cập nhật</button>
				                        </td>
				                    </tr>
				                                        <tr>
				                        <td>
				                        <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="id[]" value="7"></span></div>
				                                </label>
				                            </div>
				                        </td>
				                        <td>Googoo</td>
				                        <td>2020-03-17 15:15:41</td>
				                        <td>
				                            <button class="btn btn-warning" type="button" onclick="updateCategory(this)" data-id="7" data-name="Googoo"><i class="icon-pencil5  icon-1x"></i> Cập nhật</button>
				                        </td>
				                    </tr>
				                                        <tr>
				                        <td>
				                        <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="id[]" value="8"></span></div>
				                                </label>
				                            </div>
				                        </td>
				                        <td>Zaloooo</td>
				                        <td>2020-03-17 15:15:41</td>
				                        <td>
				                            <button class="btn btn-warning" type="button" onclick="updateCategory(this)" data-id="8" data-name="Zaloooo"><i class="icon-pencil5  icon-1x"></i> Cập nhật</button>
				                        </td>
				                    </tr>
				                                        <tr>
				                        <td>
				                        <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="id[]" value="3"></span></div>
				                                </label>
				                            </div>
				                        </td>
				                        <td>ahihio</td>
				                        <td>2020-03-17 10:46:40</td>
				                        <td>
				                            <button class="btn btn-warning" type="button" onclick="updateCategory(this)" data-id="3" data-name="ahihio"><i class="icon-pencil5  icon-1x"></i> Cập nhật</button>
				                        </td>
				                    </tr>
				                                    </tbody>
				            </table>
				            <div class="mt-1 mb-1 ml-3">
				                
				            </div>
				                    </div>
				    </div>
				    </div><!--col-md-6-->

				    <div class="col-md-5">
				        <div class="card">
				            <div class="card-header header-elements-inline bg-slate-800">
				                <h5 class="card-title">Thêm mới tài khoản</h5>
				            </div>
				            <div class="card-body">
				                <form action="http://app2.phanmemninja.com/setting/category/store" method="POST">
				                    <input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL"> 
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Tên danh mục</label>
				                        <div class="tokenfield form-control"><input type="text" name="cate_id" class="form-control tokenfield-teal" data-fouc="" tabindex="-1" style="position: absolute; left: -10000px;"><input type="text" tabindex="-1" style="position: absolute; left: -10000px;"><input type="text" class="token-input" autocomplete="off" placeholder="" id="1584678602296112-tokenfield" tabindex="0" style="min-width: 60px; width: 605.078px;"><span style="position:absolute;top:-9999px;left:-9999px;white-space:pre;"></span></div>
				                        <em>Mỗi danh mục cách nhau bởi 1 dấu phẩy ","</em>
				                      </div>
				                    <div class="form-group">
				                        <button class="btn btn-success" type="submit"><i class="icon-circle-right2 mr-1 icon-1x"></i> Thêm mới</button>
				                    </div>
				                </form>
				            </div>
				        </div><!--card-->
				    </div><!--col-md-6-->
				</div><!--row-->

				<!-- /table -->
				<!-- Disabled backdrop -->
				<div id="modal_update" class="modal fade" data-backdrop="false" tabindex="-1">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header bg-warning">
				                <h5 class="modal-title">Cập nhật danh mục</h5>
				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				            <div class="modalBox mt-1 col-12"></div>
				            <input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL">            <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBox"></div><!--alert-->
				                </div>
				                <div class="col-12">
				                    <input type="hidden" name="cate_id" value="">
				                     <div class="form-group">
				                        <label for="exampleInputEmail1">Tên danh mục</label>
				                        <input type="text" class="form-control" name="cate_name" value="">
				                        <small class="text-danger alert_username">Vui lòng tên danh mục</small>
				                      </div>
				                </div><!--col-md-6-->
				               
				                <div class="col-12"><center><button class="text-center btn btn-primary btn_cookie" type="button" onclick="saveFormUpdateCategory()"><i class="icon-circle-right2 mr-1 icon-1x"></i> Cập nhật</button></center></div>
				            </div>
				            
				        </div>
				    </div>
				</div>

			<!-- /disabled backdrop -->    
			</div>
			<!-- /content area -->
			@stop


			