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
			            <a href="#" class="breadcrumb-item">Chiến dịch</a>
			            <span class="breadcrumb-item active">Lịch sử</span>
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
				        <button class="btn btn-danger" type="button" onclick="removeAllAccount(confirm(&quot;Bạn có chắc chắn muốn xóa?&quot;))"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa</button>
				    </div><!--col-md-5-->

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
					<div class="card-body">
						<table class="table table-sm">
						  <thead>
						    <tr>
						       <th>
						        	<div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckbox(this)">
													
												</label>
											</div>
				               </th>
						      <th scope="col">STT</th>
						      <th scope="col">Tên chiến dịch</th>
						      <th scope="col">Trạng thái</th>
						      <th scope="col">Tiến trình</th>
						      <th scope="col">Thời gian gửi</th>
						      <th scope="col">Thời gian bắt đầu</th>
						      <th scope="col">Thời gian kết thúc</th>
						      <th scope="col">Thao tác</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($history as $key =>$value)
						    <tr>
						    <th>
				    		 <div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled" name="selectGroup[]" data-fouc value="">
												
											</label>
							</div>
						      </th>
						      <th scope="row">{{ $key }}</th>
						      <td>{{ $value->tenchiendich }}</td>
						      <td>Đang chạy</td>
						      <td>100%</td>
						      <td>{{ $value->giogui }}</td>
						      <td>{{ $value->date_send }}</td>
						      <td>{{ $value->date_end }}</td>
						      <td>
						      	<button type="button" class="btn btn-success  btn-sm"><i class="fa fa-play" aria-hidden="true"></i></button>
						      	<button type="button" class="btn btn-success  btn-sm"><i class="fa fa-folder-open" aria-hidden="true"></i></button>
						      </td>
						    </tr>
						    @endforeach

						  </tbody>
						</table>
                         
					</div>
				</div>

			</div>
			<!-- /content area -->
			@stop


			