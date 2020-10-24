@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
				@include('errors.note')
        <!-- Form inputs -->
                <!-- Page header -->
			<div class="page-header">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
			            <a href="#" class="breadcrumb-item">Quản lý đăng bài</a>
			            <span class="breadcrumb-item active">Danh mục bài viết</span>
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
				            <h5 class="card-title">Danh mục bài viết</h5>
				            <div class="header-elements">
				                <button class="btn btn-danger" type="button" onclick="deleteCategory(confirm(&quot;Bạn có chắc chắn muốn xóa?&quot;))"><i class="icon-folder-remove icon-1x"></i> Xóa danh mục</button>
				            </div>
				        </div>
				        <div class="table-responsive">
				                    <table class="table table-striped">
				                <thead>
				                    <tr>
				                        <th>
				                            {{-- <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker border-danger-600 text-danger-800"><span><input type="checkbox" class="form-check-input-styled-danger" onclick="checkAllCheckbox(this)" data-fouc=""></span></div>
				                                </label>
				                            </div> --}}
				                            <div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckbox(this)">
													
												</label>
											</div>
				                        </th>
				                        <th>Tên Danh mục</th>
				                        <th>Ngày tạo</th>
				                        <th>Thao tác</th>
				                    </tr>
				                </thead>
				                <tbody>
				                   
	                               @foreach($catelist as $row)
				                   <tr>
				                        <td>
				                       {{--  <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="id[]" value="{{ $row->id }}"></span></div>
				                                </label>
				                            </div> --}}
				                            <div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled" data-fouc>
												
											</label>
										</div>
				                        </td>
				                        <td>{{ $row->name }}</td>
				                        <td>{{ $row->created_at }}</td>
				                        <td>
				                            <button class="btn btn-warning" type="button" onclick="getInfoCategoryPost(this)" data-id="{{ $row->id }}" data-name="hihi"><i class="icon-pencil5  icon-1x"></i> Sửa</button>
				                            <a  href="{{asset('posts/delete/'.$row->id)}}" class="btn btn-danger" type="button" ><i class="icon-pencil5  icon-1x"></i>xóa</a>
				                        </td>
				                    </tr>
				                    @endforeach
				                   
				                    
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
				                <h5 class="card-title">Thêm mới danh mục</h5>
				            </div>
				            <div class="card-body">
				                <form action="" method="POST">
				                    <input type="hidden" name="_token" value=""> 
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Tên danh mục</label>
				                        	
				                        	<input required type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Tên danh mục...">				                      
				                      </div>
				                    <div class="form-group">
				                        <button class="btn btn-success" type="submit"><i class="icon-circle-right2 mr-1 icon-1x"></i> Thêm mới</button>
				                    </div>
				                    {{csrf_field()}}
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
				            <input type="hidden" name="_token" value=""> 
				            <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBox"></div><!--alert-->
				                </div>
				                <div class="col-12">
				                    <input type="hidden" name="cate_id" value="">
				                     <div class="form-group">
				                        <label for="exampleInputEmail1">Tên danh mục</label>
				                        <input type="text" class="form-control" name="cate_name" value="">
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


			