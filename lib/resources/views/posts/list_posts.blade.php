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
			            <a href="{{ asset('/hone') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
			            <span class="breadcrumb-item active">Quản lý đăng bài</span>
			            <span class="breadcrumb-item active">Danh sách bài viết</span>
			        </div>

			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>

			    <div class="header-elements d-none">
			        
			    </div>
			</div>
			</div>
			<!-- /page header -->
				<div class="card">
				    <div class="card-body">
				        <div class="row">
				            <div class="col-md-5">
				                <a class="btn btn-success" href="{{ asset('posts/createpost')}}"><i class="icon-plus2 mr-2"></i> Tạo bài viết</a>
				                <button class="btn btn-danger" type="button" onclick="removeAllListPost(confirm('Bạn có chắc chắn muốn xóa?'))"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa bài viết</button>
				              {{--   <button class="btn  bg-teal-400" type="button" data-toggle="modal" data-target="#modal_category"><i class="icon-comment-discussion mr-2"></i> Thêm danh mục</button> --}}
				            </div>
				            <!--col-md-5-->
				            {{-- <div class="col-md-3">
				                <form method="GET" id="formSubmit">
				                    <div class="row">
				                        <div class="form-group col-md-9">
				                            <div class="multiselect-native-select">
				                                <select name="cate_group[]" class="multiselect-filtering select_group" multiple="multiple">
				                                    <option disabled="" selected="" class="d-none">Lọc theo danh mục</option>
				                                    <option value="8">Zaloooo</option>
				                                    <option value="30">danh mục tài khoản</option>
				                                </select>
				                                <div class="btn-group" style="width: 100%;">
				                                    <button type="button" class="multiselect dropdown-toggle btn btn-light" data-toggle="dropdown" title="Lọc theo danh mục" style="width: 100%; overflow: hidden; text-overflow: ellipsis;"><span class="multiselect-selected-text">Lọc theo danh mục</span></button>
				                                    <div class="multiselect-container dropdown-menu">
				                                        <div class="multiselect-item multiselect-filter">
				                                            <div class="input-group"><input class="form-control multiselect-search" type="text" placeholder="Search"><i class="icon-search4"></i><span class="input-group-append"><button class="btn btn-light btn-icon multiselect-clear-filter" type="button"><i class="icon-cross2"></i></button></span></div>
				                                        </div>
				                                        <div class="multiselect-item dropdown-item form-check d-none disabled active" tabindex="-1">
				                                        	<label class="form-check-label">
				                                        		<input type="checkbox" value="Lọc theo danh mục" disabled=""> Lọc theo danh mục<span class="form-check-control-indicator"></span></label>
				                                        </div>
				                                        <div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label">
				                                        	<input type="checkbox" value="6"> Facebook<span class="form-check-control-indicator"></span></label>
				                                        </div>
				                                        <div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label">
				                                        	<input type="checkbox" value="7"> Google<span class="form-check-control-indicator"></span></label>
				                                        </div>
				                                        <div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label">
				                                        	<input type="checkbox" value="8"> Zaloooo<span class="form-check-control-indicator"></span></label>
				                                        </div>
				                                        <div class="multiselect-item dropdown-item form-check" tabindex="0"><label class="form-check-label">
				                                        	<input type="checkbox" value="30"> danh mục tài khoản<span class="form-check-control-indicator"></span></label>
				                                        </div>
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                        <div class="col-md-3"><button type="button" class="btn btn-dark" onclick="filterCateGroup()"><i class="icon-filter4 icon-1x"></i> Lọc</button></div>
				                    </div>
				                </form>
				            </div> --}}
				            <!--col-md-4-->
				            <div class="col-md-4">
				                <form method="GET">
				                    <div class="row">
				                        <div class="col-md-9">
				                            <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
				                        </div>
				                        <!--col-md-9-->
				                        <div class="col-md-3">
				                            <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button>
				                        </div>
				                    </div>
				                    <!--row-->
				                </form>
				            </div>
				            <!--col-md-4-->
				        </div>
				    </div>
				    <!-- /form inputs -->
				    <div class="clearfix"></div>
				    <!-- /table -->
				    <input type="hidden" name="_token" value="4OzC4aOrNak8BFHJbYrMBUGi4bCFOHicpUiqsOqk">
				    <div class="showLoading"></div>
				    <div class="alertListAccount"></div>
				    <div class="">
				        <div class="card-header header-elements-inline bg-slate-800">
				            <h5 class="card-title">Danh sách bài viết</h5>
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
				                        <th>Tên bài viết</th>
				                        <th>Danh mục</th>
				                        <th>Kiểu bài viết</th>
				                        <th>Ngày tạo</th>
				                        <th>Thao tác</th>
				                    </tr>
				                </thead>
				                <tbody class="listPost" id="listPost">
				                	{{ csrf_field() }}
				                	@foreach($listPost as $row)
				                    <tr>
				                        <td>
				                           
				                            <div class="form-check form-check-inline">
												<label class="form-check-label formProfile formListpost">
													<input type="checkbox" class="form-check-input-styled" data-fouc name="selectGroup[]" value="{{ $row->id }}">
													
												</label>
											</div>
				                        </td>
				                        <td>{{ $row->id }}</td>
				                        <td>{{ $row->post_title }}</td>
				                        <td>
				                        	 @foreach($category as $cate)
                                               @if($row->cate_id == $cate->id)	                    	
				                    	           <span class="badge badge-dark">{{$cate->name }}</span>
				                    	       @endif
				                              @endforeach	
				                        </td>
				                        <td><span class="badge badge-success">{{ $row->type }}</span></td>
				                        <td>{{ $row->created_at }}</td>
				                        <td>
				                            <form method="POST" action="#">
				                                
				                               {{--  <a class="btn bg-warning-700" href="#"><i class="icon-select2 mr-2"></i> cập nhật</a>  --}}
				                                <a href="{{asset('posts/list_posts/delete/'.$row->id)}}" class="btn btn-dark" type="button" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"> <i class="icon-folder-remove icon-1x"></i> Xóa</a>
				                                
				                            </form>
				                        </td>
				                    </tr>
				                    @endforeach

				                </tbody>
				            </table>

				        </div>
				         {{$listPost->links()}}
				    </div>
				    <!-- /table -->
				    <!-- Disabled backdrop -->
				    <div id="modal_category" class="modal fade" data-backdrop="false" tabindex="-1">
				        <div class="modal-dialog">
				            <div class="modal-content">
				                <div class="modal-header bg-teal-400">
				                    <h5 class="modal-title">Thêm danh mục</h5>
				                    <button type="button" class="close" data-dismiss="modal">×</button>
				                </div>
				                <div class="loadCate"></div>
				                <input type="hidden" name="_token" value="4OzC4aOrNak8BFHJbYrMBUGi4bCFOHicpUiqsOqk">            
				                <div class="modal-body row">
				                    <div class="col-12">
				                        <div class="alertBoxCate"></div>
				                        <!--alert-->
				                    </div>
				                    <div class="col-12">
				                        <div class="form-group">
				                            <label for="exampleInputEmail1">Tên danh mục</label>
				                            <div class="tokenfield form-control"><input type="text" name="cate_id" class="form-control tokenfield-teal" value="" data-fouc="" tabindex="-1" style="position: absolute; left: -10000px;"><input type="text" tabindex="-1" style="position: absolute; left: -10000px;"><input type="text" class="token-input" autocomplete="off" placeholder="" id="1585643699745168-tokenfield" tabindex="0" style="min-width: 60px; width: 0px;"><span style="position:absolute;top:-9999px;left:-9999px;white-space:pre;"></span></div>

				                        </div>
				                    </div>
				                    <!--col-md-6-->
				                    <div class="col-12">
				                        <center><button class="text-center btn btn-primary" id="btn_cookie" type="button" onclick="submitCategory()">Thêm mới</button></center>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				    <!-- /disabled backdrop --><!-- Disabled backdrop -->
				   
				</div>
				   <div class="modal fade bd-example-modal-sm" id="popupmess" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-sm">
							    <div class="modal-content">
							      <div class="modal-header" style="border-bottom: 1px solid #cdcdcd;">
							        <h4 class="modal-title" id="mySmallModalLabel">Thông báo</h4>
							        <button type="button" class="close" {{-- data-dismiss="modal" --}}  onclick="reloadpopup()" aria-label="Close">
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
			<!-- /content area -->
			@stop


			