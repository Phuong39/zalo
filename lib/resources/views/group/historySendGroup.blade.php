@extends('master')
@section('title','Lịch sử gửi tin nhắn trong groups')
@section('main')
     <!-- Content area -->
	<div class="content">
        <!-- Form inputs -->
           @include('errors.note')
				<div class="clearfix"></div>
				<!-- /table -->
				<div class="showLoading"></div>
				<div class="alertListAccount"></div>   
				<div class="row">
				<div class="col-md-12">
				    <div class="card">
				        <div class="card-body">   
				        <form method="GET">
				            <div class="row">
				                <div class="col-md-2"><button class="btn btn-danger" type="button" onclick="deleteHistoryprofile()"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa lịch sử</button></div>
				            
				            </div>
				        </form>
				        </div>
				    </div>
				    </div><!--col-md-12-->
				    <div class="col-md-12">
				        <div class="card">
				        <div class="card-header header-elements-inline bg-slate-800">
				            <h5 class="card-title">Lịch sử gửi tin nhắn trong groups</h5>
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
				                        <th>STT</th>
				                        <th>Tên nhóm</th>
				                        <th>Code</th>
				                        <th>Trạng thái</th>
				                        <th>Ngày gửi</th>
				                        <th>Hành động</th>
				                    </tr>
				                </thead>
				                <tbody class="historyProfile" id="historyProfile">
				                	@foreach($history as $key=>$row)
				                    <tr>
				                        <td>
					                        <div class="form-check form-check-inline formProfile">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled" name="selectGroup[]" data-fouc value="">
													
												</label>
											</div>
				                        </td>
				                        <td>{{ $key }}</td>
				                        <td>{{ $row->name }}</td>
				                        <td>{{ $row->code }}</td>
				                        <td>{{ $row->message }}</td>
				                        <td>{{ $row->created_at }}</td>
				                        	<td>
			                                    <div class="dropdown">
			                                        <button type="button" class="btn btn-sm btn-secondary btn-clean" data-toggle="dropdown">
			                                            <i class="icon-menu7"></i>
			                                        </button>
			                                        <div class="dropdown-menu">
			                                            <a href="javascript:void(0)" class="dropdown-item" data-id="{{ $row->id }}"> Chi tiết</a>                                     
			                                        </div>
			                                    </div>
			                                </td>
				                    </tr>
                                 @endforeach
                                  {{csrf_field()}}
				               </tbody>
				            </table>
				            <div class="mt-1 mb-1 ml-3">
				                
				            </div>
				                    </div>
				    </div>
				    </div><!--col-md-6-->

				</div><!--row-->

				<!-- /table -->
		 </div>
@stop