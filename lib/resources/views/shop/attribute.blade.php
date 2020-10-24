@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
				
				   <!-- Page header -->
							<div class="page-header">
								<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
							    <div class="d-flex">
							        <div class="breadcrumb">
							            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
							            
							            <span class="breadcrumb-item active">Shop zalo</span>
							            <span class="breadcrumb-item active">Thuộc tính</span>
							        </div>

							        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
							    </div>

							    <div class="header-elements d-none">
                      
							    </div>
							</div>
							</div>
							<!-- /page header -->
                            <div class="row">
								<div class="col-md-12">
								    <div class="card">
								        <div class="card-body">
								           {{ csrf_field() }}
								        <form method="GET">
								            <div class="row">
								            	<div class="form-group col-md-4">
									            
					   							<div class="form-group">
					   								<button class="btn btn-success" type="button" style="margin-left: 12px;" onclick="loadcategorybyid()">Thêm mới</button>
					   								<button class="btn btn-primary" type="button" style="margin-left: 12px;" data-toggle="modal" data-target="#myModal" >Chọn Official Account</button>
					   							</div>
					   							
								            </div>
								               {{--  <div class="col-md-2"><button class="btn btn-danger" type="button" onclick="deleteHistoryprofile()"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa sản phẩm</button></div> --}}
								                <div class="col-md-5">
								                    <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
								                </div><!--col-md-9-->
								                <div class="col-md-2">
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
								            <h5 class="card-title">Danh mục sản phẩm</h5>
								        </div>
								        <div class="table-responsive">
								                    <table class="table table-striped">
										                <thead>
										                    <tr>
										                       
										                        <th style="text-align: center;">ID</th>
										                        <th>Tên kiểu thuộc tính</th>
										                        <th>Thuộc tính</th>
										                        <th>Offcial Account</th>
										                        <th>Sự kiện</th>  
										                    </tr>
										                </thead>
								                <tbody class="historyProfile" id="historyProfile">
								                   
								               </tbody>
								            </table>
								           
								          </div>
								    </div>
								    </div><!--col-md-6-->

								</div><!--row-->
			</div>

			<!-- The Modal -->
				<div class="modal" id="myModal">
					<div class="modal-dialog">
						<div class="modal-content">
                            {{ csrf_field() }}
							<!-- Modal Header -->
							<div class="modal-header bg-warning">
								<h4 class="modal-title">Danh sách Official Account</h4>
							</div>

							<!-- Modal body -->
							<div class="modal-body">
							  @if($status != 1)
								@foreach($list as $row)
								<div class="form-grorp">
									<input type='checkbox' class='checkbox checkbox-style fbnodefanpage' name='checkbox[]' id='checkbox-{{ $row->zalo_id }}'  value='{{ $row->zalo_id }}' />
									<label for='checkbox-{{ $row->zalo_id }}'></label>
									<span>{{ $row->name }}</span>
								</div>
								@endforeach
							  @else
							    @foreach($list as $row)
							      @foreach($role_page as $value)
							        @if($row->zalo_id == $value)
										<div class="form-grorp">
											<input type='checkbox' class='checkbox checkbox-style fbnodefanpage' name='checkbox[]' id='checkbox-{{ $row->zalo_id }}'  value='{{ $row->zalo_id }}' />
											<label for='checkbox-{{ $row->zalo_id }}'></label>
											<span>{{ $row->name }}</span>
										</div>
								    @endif
								  @endforeach
								@endforeach
							  @endif

							</div>

							<!-- Modal footer -->
							<div class="modal-footer">
								<div class="contentmess"></div>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary" onclick="getattributetype()">Lấy thuộc tính</button>
							</div>

						</div>
					</div>
				</div>

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
<script>
	function loadcategorybyid(ob){
			$("p").remove(".contentmess");
							
			var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Tính năng này đang được cập nhật, vui lòng quay lại sau!</p>';
                $('.contentpoppup').append(html);
                $('#popupmess').modal('show');
		}

		function getattributetype(){
			console.log("dskfjdskjfdkjf");
			var groups = [];
			var check = 0;
			$('.fbnodefanpage:checked').each(function(){
				check = 1;
				groups.push($(this).val());
			});
			if(check == 0){
				alertBox('Vui lòng chọn Official Account!',"f44336",".contentmess",true,true);
				return false;
			}
			$('.loader-zalo').show();
			var params = {};
			params['id_oa'] = JSON.stringify(groups);
			params['_token'] = $('input[name="_token"]').val();
			$.ajax({
				url: '{{ url("shop/loadattribute") }}',
				dataType: 'json',
				type: 'post',
				contentType: 'application/x-www-form-urlencoded',
				data: params,
				success: function( data, textStatus, jQxhr ){
					
				},
				error: function( jqXhr, textStatus, errorThrown ){ 
				},
				complete: function( data, textStatus, jQxhr){
					// $('#materialPreloader').hide();
					$('.table-responsive').html(data.responseText);
					//$('#datatable').DataTable();
					$('.loader-zalo').hide();
					
				}
			});
		}

</script>
			<!-- /content area -->
			@stop


			