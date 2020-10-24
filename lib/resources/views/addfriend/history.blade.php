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
				                    {{-- <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value=""> --}}
				                </div><!--col-md-9-->
				                <div class="col-md-2">
				                    {{-- <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button> --}}
				                </div>
				                {{-- <div class="col-md-3">
				                    <div class="messageBox" style="padding-top: 23px;"><div class="alert alert-info bg-white alert-styled-left alert-arrow-left alert-dismissible" style="border-color:#e91607;"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="fa fa-undefined-sign" aria-hidden="true"></span>&nbsp;Phần này đang được cập nhật, bạn vui lòng quay lại sau !!!</div></div>
				                </div> --}}
				            </div>
				        </form>
				        </div>
				    </div>
				    </div><!--col-md-12-->
				    <div class="col-md-12">
				        <div class="card">
					        <div class="card-header header-elements-inline bg-slate-800">
					        	<div class="col-md-10">
									<h5 class="card-title"><i class="icon-pencil7 mr-3 icon-2x"></i>Thêm chiến dịch</h5>
						            <div class="header-elements">
								</div>
								 </div>
				            <div class="col-md-2">
				            	<a class="btn bg-warning-700" href="{{ asset('addfriend/td_addfriend') }}"><i class="icon-select2 mr-2"></i> Theo dõi kết bạn</a>
				            </div>
					            {{-- <h5 class="card-title">Lịch sử kết bạn theo SDT</h5> --}}
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
					                        <th>Hình ảnh</th>
					                        <th>Tên</th>
					                        <th>Số điện thoại kết bạn</th>
					                        <th>Ngày kết bạn</th>
					                        <th>Trạng thái</th>
					                    </tr>
					                </thead>
					                <tbody>
					                	@foreach($history as $key =>$row)
					                       <tr>
					                        <td>
					                       <div class="form-check form-check-inline">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled" name="selectGroup[]" data-fouc value="{{ $row->id }}">
												
											</label>
										</div>
					                        </td>
					                        <td>{{ $row->id }}</td>
					                        <td><img src="{{ $row->image }}" class="rounded-circle" alt="" style="max-height: 2.12503rem;"></td>
					                        <td>{{ $row->name }}</td>
					                        <td>{{ $row->phone }}</td>
					                        <td>
					                        	@if($row->date_add == '')
					                        	{{ $row->created_at }}
					                        	@else
					                        	{{ $row->date_add }}
					                        	@endif
					                        </td>
					                        <td>{{ $row->status }}</td>
					                        
					                    </tr>
					                    @endforeach
					                  </tbody>
					            </table>
					            {{$history->links()}}
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


			