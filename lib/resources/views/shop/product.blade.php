@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
        <!-- Form inputs -->
           @include('errors.note')
				<div class="clearfix"></div>
				<!-- /table -->
				 {{ csrf_field() }}
				 <div class="showLoading"></div>
				<div class="alertListAccount"></div>   
				<div class="row">
				<div class="col-md-12">
				    <div class="card">
				        <div class="card-body">
				           {{ csrf_field() }}
				        <form method="GET">
				            <div class="row">
				            	<div class="form-group col-md-2">
				            		@if($status != 1)
						             <select class="btn btn-primary" id="id_offci" style=" width: fit-content; float: left;    background-color: #008fe5 !important;" onchange="getattribute()">
					             	        <option value="">Chọn tài khoản của bạn</option>
	    							     @foreach($list as $row)
										    <option value="{{ $row->zalo_id }}">{{ $row->name }}</option>
										   @endforeach
		   							</select>
		   							@else
		   							  <select class="btn btn-primary" id="id_offci" style=" width: fit-content; float: left;    background-color: #008fe5 !important;" onchange="getattribute()">
					             	        <option value="">Chọn tài khoản của bạn</option>
					             	        @foreach($list as $row)
					             	          @foreach($role_page as $value)
					             	            @if($row->zalo_id  == $value)
										         <option value="{{ $row->zalo_id }}">{{ $row->name }}</option>
                                                @endif
										      @endforeach
										   @endforeach
		   							</select>
		   							@endif
					            </div>
					            <div class="form-group col-md-2">
					            	<div class="form-group">
		   								<button class="btn btn-success" type="button" style="margin-left: 12px;" onclick="dongbozalo()"><i class="icon-spinner4 spinner"></i> Đồng bộ zalo</button>
		   							</div>
					            </div>
					            <div class="form-group col-md-2">
					            	<div class="form-group">
		   								<a href="https://zalov2.phanmemninja.com/shop/addProduct" class="btn btn-success" type="button" style="margin-left: 12px;"><i class="icon-plus3"></i>Tạo sản phẩm</a>
		   							</div>
					            </div>
				               {{--  <div class="col-md-2"><button class="btn btn-danger" type="button" onclick="deleteHistoryprofile()"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa sản phẩm</button></div> --}}
				                {{-- <div class="col-md-5">
				                    <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
				                </div>
				                <div class="col-md-2">
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
				            <h5 class="card-title">Danh sách sản phẩm</h5>
				        </div>
				        <div class="table-responsive">
				                    <table class="table table-striped">
						                <thead>
						                    <tr>
						                        <th>
						                        	<input type="checkbox" class="selecteallfanpage" style="margin-right: 10px;" value="">
						                          
						                        </th>
						                        <th>ID</th>
						                        <th>Mã sản phẩm</th>
						                        <th>Hình ảnh</th>
						                        <th>Tên sản phẩm</th>
						                        <th>Giá</th>
						                        <th>Danh mục</th>
						                        <th>Trạng thái</th>
						                        <th>Tình trạng duyệt</th>
						                        <th>Thao tác</th>
						                        
						                    </tr>
						                </thead>
				                <tbody class="historyProfile" id="historyProfile">
				                   
				               </tbody>
				            </table>
				           {{--  <div class="mt-1 mb-1 ml-3">
				                <div class="alert alert-info bg-white alert-styled-left alert-arrow-left alert-dismissible" style="border-color: #f43636 !important;">
									<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
									Tính năng đanh phát triển!!
							    </div>
				            </div> --}}
				                    </div>
				    </div>
				    </div><!--col-md-6-->

				</div><!--row-->
			<div class="modal fade bd-example-modal-sm" id="popupmess" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header" style="border-bottom: 1px solid #cdcdcd;">
			        <h4 class="modal-title" id="mySmallModalLabel">Thông báo</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
				<!-- /table -->
				    </div>

				    <script>
					    function dongbozalo(){
					    	$("p").remove(".contentmess");
					    	var groups = [];
					    	var id_offci = $('#id_offci').val();
					    	if(id_offci === ''){
					    		var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn tài khoản!!</p>';
					                $('.contentpoppup').append(html);
					                $('#popupmess').modal('show');
					                return false;
					    	}
								groups.push(id_offci);
								var params = {};
								params['id_oa'] = JSON.stringify(groups);
								params['_token'] = $('input[name="_token"]').val();

								$('.loader-zalo').show();
								$.ajax({
									url: '{{ url("shop/dongbo") }}',
									dataType: 'json',
									type: 'post',
									contentType: 'application/x-www-form-urlencoded',
									data: params,
									success: function( data, textStatus, jQxhr ){
										// $('#materialPreloader').hide();
										
										// return false;
									},
									error: function( jqXhr, textStatus, errorThrown ){ 
									},
									complete: function( data, textStatus, jQxhr){
										
										getattribute();
										$("p").remove(".contentmess");
										// $('.table-responsive').html(data.responseText);
										// $('#datatable').DataTable();
										//alertBox('đồng bộ thành công',"success",false,true,true);
										var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Đồng bộ thành công!</p>';
					                
							                $('.contentpoppup').append(html);
							                $('#popupmess').modal('show');
										$('.loader-zalo').hide();
										// return false;
									}
								});
					    }

					    function getattribute(){
								var groups = [];
								var id_offci = $('#id_offci').val();
								if(id_offci === ''){
					    		var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn tài khoản!!</p>';
					                $('.contentpoppup').append(html);
					                $('#popupmess').modal('show');
					                return false;
					    	    }
								groups.push(id_offci);
								$('.loader-zalo').show();
								var params = {};
								params['id_oa'] = JSON.stringify(groups);
								params['_token'] = $('input[name="_token"]').val();
								$.ajax({
									url: '{{ url("shop/loadproduct") }}',
									dataType: 'json',
									type: 'post',
									contentType: 'application/x-www-form-urlencoded',
									data: params,
									success: function( data, textStatus, jQxhr ){
										// $('#materialPreloader').hide();
										
										// return false;
									},
									error: function( jqXhr, textStatus, errorThrown ){ 
									},
									complete: function( data, textStatus, jQxhr){

										// $('#materialPreloader').hide();
										$('#historyProfile').html(data.responseText);
										//$('#datatable').DataTable();
										$('.loader-zalo').hide();
										
										// return false;
									}
								});
							}

							function updateproduct(ob){
								$("p").remove(".contentmess");
										
								var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Tính năng này đang được cập nhật, vui lòng quay lại sau!</p>';
			                
					                $('.contentpoppup').append(html);
					                $('#popupmess').modal('show');
							}



				    </script>
			<!-- /content area -->
			@stop


			