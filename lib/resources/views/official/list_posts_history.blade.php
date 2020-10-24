@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
        <!-- Form inputs -->
           @include('errors.note')
				<div class="clearfix"></div>
				<!-- /table -->
				<input type="hidden" name="_token" value="dQQHrNFaYgJsqCsU02PY31slSNul3uKavUedLG8j"><div class="showLoading"></div>
				<div class="alertListAccount"></div>   
				<div class="row">
				<div class="col-md-12">
				    <div class="card">
				        <div class="card-body">
				        <input type="hidden" name="_token" value="dQQHrNFaYgJsqCsU02PY31slSNul3uKavUedLG8j">        
				        <form method="GET">
				            <div class="row">
				                <div class="col-md-2"><button class="btn btn-danger" type="button" onclick="deleteHistoryprofile()"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa lịch sử</button></div>
				                <div class="col-md-5">
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
				    <div class="col-md-12">
				        <div class="card">
				        <div class="card-header header-elements-inline bg-slate-800">
				            <h5 class="card-title">Lịch sử bài đăng</h5>
				        </div>
				        <div class="table-responsive">
				                    <table class="table table-striped">
				                <thead>
				                    <tr>
				                        <th>
				                        	<div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckbox(this)">
													
												</label>
											</div>
				                          
				                        </th>
				                        <th>ID</th>
				                        <th>Tài khoản</th>
				                        <th>Tên bài viết</th>
				                        <th>Kiểu bài viết</th>
				                        <th>Danh mục</th>
				                        <th>Thời gian đăng</th>
				                        <th>Trạng thái</th>
				                        <th>Thông báo lỗi</th>
				                        
				                    </tr>
				                </thead>
				                <tbody class="historyProfile" id="historyProfile">
				                    @foreach($history_profile as $row)                           
				                   <tr>
				                        <td>
				                        <div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled" name="selectGroup[]" data-fouc value="{{ $row->id }}">
												
											</label>
										</div>
				                        </td>
				                        <td>{{ $row->id }}</td>
				                        <td>{{ $row->name }}</td>
				                        <td>{{ $row->post_title }}</td>
				                        <td>{{ $row->type }}</td>
				                       
				                        <td>
				                        	@foreach($category as $cate)
				                        	@if($row->cate_id == $cate->id)
				                        	<span class="badge badge-dark">{{$cate->name }}</span>
				                        	@endif
				                        	@endforeach
				                        </td>
				                        
				                       
				                        <td>{{ $row->created_at }}</td>
				                        <td> 
                                            @if($row->status_post == 1)
				                        	<span class="badge bg-success">Thành công</span>
				                        	@elseif($row->status_post == 0)
				                        	<span class="badge bg-warning ">Đang xử lý</span>
				                        	@else
				                        	<span class="badge bg-danger">Thất bại</span>
				                        	@endif
				                        </td>
				                        <td>  </td>
				                       
				                    </tr>
                                  @endforeach
                                  {{csrf_field()}}
				               </tbody>
				            </table>
				            {{ $history_profile->links() }}
				            <div class="mt-1 mb-1 ml-3">
				                
				            </div>
				                    </div>
				    </div>
				    </div><!--col-md-6-->

				</div><!--row-->

				<!-- /table -->
				    </div>
			<!-- /content area -->
			@stop


			