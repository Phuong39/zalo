@extends('master')
@section('title','Lịch sử')
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
				                {{-- <div class="col-md-5">
				                    <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
				                </div><!--col-md-9-->
				                <div class="col-md-3">
				                    <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button>
				                </div> --}}
				            </div>
				        </form>
				        </div>
				    </div>
				    </div><!--col-md-12-->
				    <div class="col-md-12">
				        <div class="card">
				        <div class="card-header header-elements-inline bg-slate-800">
				            <h5 class="card-title">Lịch sử tham gia nhóm theo link</h5>
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
				                        <th>zaloID</th>
				                        <th>Tài khoản</th>
				                        <th>Link nhóm</th>
				                        <th>Ngày tham gia</th>
				                        <th>Mã lỗi</th>
				                        <th>Trạn thái duyệt</th>
				                        
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
				                        <td><a href="javascript:void(0)">{{ $row->zaloid }}</a></td>
				                        <td>{{ $row->name }}</td>
				                        <td>{{ $row->link }}</td>
				                        <td>{{ $row->created_at }}</td>
				                        <td>{{ $row->code }}</td>
				                        <td>{{ $row->message }}</td>
				                       
				                    </tr>
				                @endforeach
                                 
                                  {{csrf_field()}}
				               </tbody>
				            </table>
				            <div class="mt-1 mb-1 ml-3">
				                {{$history->links()}}
				            </div>
				                    </div>
				    </div>
				    </div><!--col-md-6-->

				</div><!--row-->

				<!-- /table -->
		 </div>

@stop