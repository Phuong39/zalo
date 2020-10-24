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
							            <span class="breadcrumb-item active">Danh mục</span>
							        </div>

							        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
							    </div>

							    <div class="header-elements d-none">
                      
							    </div>
							</div>
							</div>

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
					   								<button class="btn btn-primary" type="button" style="margin-left: 12px;" onclick="openmodal()" >Chọn Official Account</button>
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
										                        {{-- <th>
										                        	<div class="form-check">
																		<label class="form-check-label">
																			<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckbox(this)">
																			
																		</label>
																	</div>
										                          
										                        </th> --}}
										                        <th>ID</th>
										                        <th>Hình ảnh</th>
										                        <th>Tên danh mục</th>
										                        <th>Miêu tả</th>
										                        <th>Trạng thái</th>
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
							<!-- /page header -->

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
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary getcategory" data-dismiss="modal" onclick="getcategory()">Lấy danh mục</button>
								</div>

							</div>
						</div>
					</div>
					<div class="modal" id="editcategory">
						<div class="modal-dialog">
							<div class="modal-content">

								<!-- Modal Header -->
								<div class="modal-header bg-warning">
									<h4 class="modal-title">Sửa danh mục</h4>
								</div>

								<!-- Modal body -->
								<div class="modal-body content-category">
								</div>

								<!-- Modal footer -->
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary updatecategory" data-dismiss="modal">Sửa</button>
								</div>

							</div>
						</div>
					</div>
					<!-- The Modal -->

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
			</div>
			<script>
				function openmodal(){
			        $('#myModal').modal('show');
				}

				function getcategory(){
					  $("p").remove(".contentmess");
						var groups = [];
						var check = 0;
						$('.fbnodefanpage:checked').each(function(){
							check = 1;
							groups.push($(this).val());
						});
						if(check == 0){
							 var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn Official Account</p>';
					                
					          $('.modal-body').append(html);
							//alertBox('Vui lòng chọn Official Account',"danger",'.modal-footer',true,true);
							return false;
						}
						$('.loader-zalo').show();
						var params = {};
						params['id_oa'] = JSON.stringify(groups);
						params['_token'] = $('input[name="_token"]').val();
						$.ajax({
							url: '{{ url("shop/loadcategory") }}',
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
								//$('#datatable').DataTable();
								$('.loader-zalo').hide();
								
								
								// return false;
							}
						});
					}
					function loadcategorybyid(ob){
						$("p").remove(".contentmess");
										
						var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Tính năng này đang được cập nhật, vui lòng quay lại sau!</p>';
			                $('.contentpoppup').append(html);
			                $('#popupmess').modal('show');
					}
					
					// function loadcategorybyid(id_category,id_page,name_category,name_des,status,images){
					// 	var check = '';
					// 	if (status == 'show') {
					// 		check = 'checked';
					// 	} else{
					// 		check = '';
					// 	}
					// 	var html = '';
					// 	html += '<div class="form-group">';
					// 	html += '<input type="hidden" name="" value="'+id_category+'" id="id_category" style="width: 100%;" placeholder="nhập tên danh mục ở đây">';
					// 	html += '<input type="hidden" name="" value="'+id_page+'" id="id_offcial" style="width: 100%;" placeholder="nhập tên danh mục ở đây">';
					// 	html += '<label>Tên danh mục</label>';
					// 	html += '<input type="text" name="" value="'+name_category+'" id="edit-name" style="width: 100%;" placeholder="nhập tên danh mục ở đây"></div>';
					// 	html += '<div class="form-group">';
					// 	html += '<label>Miêu tả</label>';
					// 	html += '<textarea style="width: 100%;" id="edit-mieuta">'+name_des+'</textarea></div>';
					// 	html += '<div class="form-group"><label>Hình ảnh</label><div class="multiImages">';
					// 	html += '<input type="hidden" name="image_number" id="" value="'+images+'"><div class="input-group"><input type="text" name="imageURL" class="form-control" id="imageURL_1" value="'+images+'" placeholder="Image URL."><div class="input-group-btn"><button type="button" class="btn btn-default mediaLibraryImage" value="0" onclick="uploadimage()">Upload</button></div><i class="fa fa-times removeImage" style="display:none;" aria-hidden="true"></i></div></div></div>';
					// 	html += '<div class="form-group"><label>Trạng thái</label><div class="form-group groupVtoggle"><label class="switch"><input type="checkbox" class="checkbox-style" id="edit-getimage" name="getimage" aria-label="Unique post" '+check+'><span class="slider round"></span></label><label for="getimage" class="input-text">không hiện thị/ hiện thị</label></div></div>';
					// 	$('.content-category').html(html);

						
					// }
			</script>
			<!-- /content area -->
			@stop


			