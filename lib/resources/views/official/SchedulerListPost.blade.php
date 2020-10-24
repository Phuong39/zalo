@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
				 {{ csrf_field() }}
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
				                <div class="col-md-2"><button class="btn btn-danger" type="button" onclick="deleteScheduleOA()"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa </button></div>
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
					            <h5 class="card-title">Danh sách lịch đăng Offical</h5>
					            {{ csrf_field() }}
					        </div>
					        <div class="table-responsive">
					                    <table class="table table-striped">
					                <thead>
					                    <tr>
					                        <th>
					                            <div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckboxScheOA(this)">
													
												</label>
											</div>
					                        </th>
					                        <th>ID</th>
					                        <th>Tên</th>
					                        <th>Danh mục</th>
					                        <th>Kiểu</th>
					                        <th>Ngày bắt đầu</th>
					                        <th>Ngày kết thúc</th>
					                        <th>Trạng thái</th>
					                        <th>Tác vụ</th>
					                    </tr>
					                </thead>
					                <tbody>
                                      @foreach($history as $row)
					                       <tr>
					                        <td>
					                       <div class="form-check form-check-inline formScheOA">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled" name="selectGroup[]" data-fouc value="{{$row->id}}">
												
											</label>
										</div>
					                        </td>
					                        <td>{{$row->id_profile}}</td>
					                        <td>{{$row->name}}</td>
					                        <td>
					                        	@foreach($cate as $value)
					                        	  @if($row->cateId == $value->id)
					                        	     <span class="badge badge-dark">{{$value->name}}</span>
					                        	   @endif
					                        	   @endforeach
					                        </td>
					                        <td><span class="badge badge-dark">{{ $row->type_post }}</span></td>
					                        <td>{{$row->time_start}}</td>
					                        <td>{{$row->time_end}}</td>
					                        <td>
					                        	@if($row->stop == 0)
					                        	<span class="badge bg-success">Đang chạy..</span>
					                        	@else
					                        	<span class="badge bg-danger">Đã dừng</span>
					                        	@endif
					                        </td>
					                        <td>
					                        	@if($row->stop == 0)
					                        	<button type="button" class="btn btn-primary togglePauseBtn valuestus" onclick="updatestop('.togglePauseBtn')" value="{{$row->id}}" id="status" data-value="1">
									               <i class="fa fa-pause" aria-hidden="true"></i></button>
									               @else
									               <button type="button" class="btn btn-primary toggleStartBtn valuestus" onclick="updatestop('.toggleStartBtn')" value="{{$row->id}}" id="status" data-value="0">
									                  <i class="fa fa-play" aria-hidden="true"></i></button>
									                  @endif
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

				</div><!--row-->

				<!-- /table -->
				    </div>
			<!-- /content area -->
			<script>
				function checkAllCheckboxScheOA(model){
				    var isChecked = model.checked;
				    if(isChecked) {
				        $('input[name="selectGroup[]"]').each(function() {
				            this.checked = true;
				            $('.formScheOA .uniform-checker span').addClass('checked');
				        });
				    } else {
				        $('input[name="selectGroup[]"]').each(function() {
				            this.checked = false;
				            $('.formScheOA .uniform-checker span').removeClass('checked');
				        });
				    }
				}
            	function deleteScheduleOA(){
					var arr = [];
					 $('input[name="selectGroup[]"]:checked').each(function() {
				            arr.push($(this).val());
				        });
					
					 var _token = $('.content input[name="_token"]').val();
					 
					 $.ajax({
						        url: '{{ url("official/deleteScheduleOA")}}',
						        dataType: 'json',
						        type: 'post',
						        contentType: 'application/x-www-form-urlencoded',
						        data: { arr:arr, _token:_token},
						        success: function( data){
								  	alertBox(data.message,"14c1d7",false,true,true);
								  	setTimeout(function(){
				                        window.location.reload();
				                     }, 1500)
						        },
						        error: function( jqXhr, textStatus, errorThrown ){
						         
						        },
						        complete: function(){
						        	//kp_preloader("off");
						        }
						    });
					

				}
            </script>
			@stop


			