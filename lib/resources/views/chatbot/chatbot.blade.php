@extends('master')
@section('title','Chatbot')
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
			            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
			            <span class="breadcrumb-item active">Chatbot</span>
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
				    	<button class="btn  bg-success" type="button" data-toggle="modal" data-target="#modal_chatbot"><i class="icon-plus2 mr-2"></i> Thêm mới</button>
				        <button class="btn btn-danger" type="button" onclick="removeAllChatboot(confirm(&quot;Bạn có chắc chắn muốn xóa?&quot;))"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa</button>
				    </div><!--col-md-5-->
				    <div class="col-md-3">
				    <form method="GET" id="formSubmit" class="formSubmit">
				    	{{ csrf_field() }}
				        <div class="row">
				           <div class="form-group col-md-9">
				           	@if($status != 1)
				             <select class="btn btn-primary" id="id_offci" class='id_offci'style=" width: fit-content; float: left;    background-color: #008fe5 !important;" onchange="getChaBotById()">
				             	 <option value="">Chọn tài khoản của bạn</option>
							    @foreach($list as $row)
							    <option value="{{ $row->zalo_id }}">{{ $row->name }}</option>
							   @endforeach
							</select>
							@else
                                <select class="btn btn-primary" id="id_offci" class='id_offci'style=" width: fit-content; float: left;    background-color: #008fe5 !important;" onchange="getChaBotById()">
					             	 <option value="">Chọn tài khoản của bạn</option>
					             	 @foreach($list as $row)
						             	 @foreach($role_page as $value)
						             	   @if($row->zalo_id == $value)
									        <option value="{{ $row->zalo_id }}">{{ $row->name }}</option>
									       @endif
									     @endforeach
									 @endforeach
						         </select>
                                 
                              @endif

				            </div>
				            
				        </div>
				    </form>
				        </div><!--col-md-4-->
				       
				        <div class="col-md-4">
				        {{-- <form method="GET">
				            <div class="row">
				                <div class="col-md-9">
				                    <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
				                </div>
				                <div class="col-md-3">
				                    <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button>
				                </div>
				            </div>
				        </form>  --}}  
				        </div><!--col-md-4-->
				</div>
				</div>
					<div class="card-body">
						<table class="table table-sm">
						  <thead>
						    <tr>
						       <th>
						        	<input type="checkbox" class="selecteallfanpage" style="margin-right: 10px;" value="">
				               </th>
						      <th scope="col">ID</th>
						      <th scope="col">Từ khóa</th>
						      <th scope="col">Từ khóa trả lời</th>
						      <th scope="col">Thao tác</th>
						    </tr>
						  </thead>
						  <tbody class="data-table">
						    

						  </tbody>
						</table>
                         
					</div>
				</div>

		   
			</div>
			<div id="modal_chatbot" class="modal fade" data-backdrop="false" tabindex="-1">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header bg-teal-400">
				                <h5 class="modal-title">Thêm cấu hình chatbot</h5>
				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				            <div class="loadCate"></div>
				             {{ csrf_field() }}
				             <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBoxCate"></div><!--alert-->
				                </div>
				                <div class="col-12">
				                     <div class="form-group">
				                        
				                        <label for="exampleInputEmail1">Khi người dùng nhắn tin chứa 1 trong các từ khóa dưới đây:</label>
				                        	
				                        	<input required="" type="text" name="keywordclient" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tại đây...">				                      
				                        
				                      </div>

				                     <div class="form-group">
				                        
				                        <label for="exampleInputEmail1">Nội dung trả lời:</label>
				                        	<textarea id="exampleFormControlInput1" name="keywordoa" style="width: 100%;" placeholder="Nhập tại đây..." rows="5px"></textarea>				                      
				                        
				                      </div>
				                       <div class="form-group">
				                        
				                        <select name="id_offci" id="id_offci" class="form-control">
				                           <option value="">== Chọn tài khoản ==</option>
				                                @foreach($list as $row)
				                               <option value="{{ $row->zalo_id }}">{{ $row->name }}</option>
                                           @endforeach
				                        </select>			                      
				                        
				                      </div>
				                </div><!--col-md-6-->
				                
				                <div class="col-12"><center><button class="text-center btn btn-primary" id="btn_cookie avepost" type="button" onclick="getaddchatbot(this)" >Thêm mới</button></center></div>
				              
				            </div>
				            
				        </div>
				    </div>
				</div>
   
				<div id="modal_chatbot_edit" class="modal fade" data-backdrop="false" tabindex="-1">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header bg-teal-400">
				                <h5 class="modal-title">Sửa cấu hình chatbot</h5>
				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				            <div class="loadCate"></div>
				            <input type="hidden" name="zalo_id" value=""> 
				             <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBoxCate"></div><!--alert-->
				                </div>
				                <div class="col-12">
				                     <div class="form-group">
				                        
				                        <label for="exampleInputEmail1">Khi người dùng nhắn tin chứa 1 trong các từ khóa dưới đây:</label>
				                        	
				                        	<input required="" type="text" name="keywordclient" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tại đây...">				                      
				                        
				                      </div>

				                     <div class="form-group">
				                        
				                        <label for="exampleInputEmail1">Nội dung trả lời:</label>
				                        	<textarea id="exampleFormControlInput1" name="keywordoa" style="width: 100%;" placeholder="Nhập tại đây..." rows="5px"></textarea>
				                        			                      
				                        
				                      </div>
				                       <div class="form-group">
				                         <label for="exampleInputEmail1">Tài khoản OA:</label>
				                        <select name="id_offci" id="id_offci" class="form-control">
				                           <option value="">== Chọn tài khoản ==</option>
				                                @foreach($list as $row)
				                               <option value="{{ $row->zalo_id }}">{{ $row->name }}</option>
                                           @endforeach
				                        </select>			                      
				                        
				                      </div>
				                </div><!--col-md-6-->
				                
				                <div class="col-12"><center><button class="text-center btn btn-primary" id="btn_cookie avepost" type="button" onclick="getUpdateChatbot(this)" >Cập nhật</button></center></div>
				              
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
						    </div> 
					    </div>
					  </div>
					</div>
					<!--Modal thong bao <-->
				<!-- /disabled backdrop --><!-- Disabled backdrop -->
			<!-- /content area -->
			<script>
				function removeAllChatboot(){
					var arr_select = new Array();
					var _token = $('#formSubmit input[name="_token"]').val();  
						var check_profile = 0;
						$('.selectepageprofile').each(function(i, value){
							if ($(value).is(':checked')) {
								check_profile = 1;
								arr_select.push($(value).val());
							}
						});
						$.ajax({
				            url:"{{ url('chatbot/deleteAll') }}",
				            type:"post",
				            data:{arr_select:arr_select,_token:_token},
				            success:function(result){
				                
				                if(result.status == 200){
				                   var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
					                
					                $('.contentpoppup').append(html);
					                $('#popupmess').modal('show');
					                 setTimeout(function(){
				                        window.location.reload();
				                     }, 2000)

				                }else{
				                	var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Đã xảy ra lỗi, xin vui lòng thử lại!!</p>';
					                $('.contentpoppup').append(html);
					                $('#popupmess').modal('show');
				                }
				            }
				        });

				}

				//chat bot
				function getaddchatbot(){
					            var groups = []; // List of selected groups
						  		var params = {};
						  		let keywordclient  = $('#modal_chatbot input[name="keywordclient"]').val();
						  		let keywordoa  = $('#modal_chatbot textarea[name="keywordoa"]').val();
				                let id_offci = $('#modal_chatbot select[name="id_offci"]').val();
						  		if(keywordclient == ''){
									alertBox('Từ khóa người dùng nhắn tin không được trống',"f44336",false,true,true);
									return false;
								}else if(keywordoa == ''){
									alertBox('Mẫu trả lời không được trống',"f44336",false,true,true);
									return false;
								}else if(id_offci == ''){
									alertBox('Vui lòng chọn tài khoản',"f44336",false,true,true);
									return false;
								}

								// groups.push($('#id_offci').val());
								keywordoa = keywordoa.replace(/(?:\r\n|\r|\n)/g, '\\n');
								params['keywordclient'] = keywordclient;
								params['keywordoa'] = keywordoa;
								params['id_chatbot'] = id_offci;
								params['addnew'] = '1';
								params['id_oa'] = JSON.stringify(groups);
								params['csrf_kingposter'] = getCookie('csrf_kingposter_cookie');
								
							$.ajax({
								url: '{{ url('chatbot/add') }}',
								dataType: 'json',
								type: 'get',
								contentType: 'application/x-www-form-urlencoded',
								data: params,
								success: function( data){
									if(data.status == 200){
										var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+data.message+'</p>';
					                
						                $('.contentpoppup').append(html);
						                $('#popupmess').modal('show');
						                 $('#modal_chatbot').hide();
						                 setTimeout(function(){
					                        window.location.reload();
					                     }, 2000)
									}else{
										var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Đã xảy ra lỗi, xin vui lòng thử lại!!</p>';
						                $('.contentpoppup').append(html);

						                $('#popupmess').modal('show');
						                $('#modal_chatbot').hide();
									}
								}
								// error: function( jqXhr, textStatus, errorThrown ){ 
								// },
								// complete: function(){
									
								// 	alertBox('Lưu thành công chatbot',"success",false,true,true);
								// 	//location.reload();
								// 	// location.reload();
								// }
							});
				 }

				 function changeChatbot(model){
				    let id = $(model).data('id');
				    $('#modal_chatbot_edit').modal('show');
				    if(id){
				        $.ajax({
				            url:"{{ url('chatbot/getInfoChatbotAjax') }}",
				            type:"GET",
				            data:{id:id},
				            success:function(result){

				                if(result.status == 200){

				                   $('#modal_chatbot_edit input[name="keywordclient"]').val(result.data.keyword);
				                   $('#modal_chatbot_edit textarea[name="keywordoa"]').val(result.data.reply);
				                   $('#modal_chatbot_edit input[name="zalo_id"]').val(result.data.id);

				                }
				            }
				        });
				    }
				}


			function getUpdateChatbot(){
			        let keywordclient   = $('#modal_chatbot_edit input[name="keywordclient"]').val();
			        let keywordoa = $('#modal_chatbot_edit textarea[name="keywordoa"]').val();
			        let id_offci = $('#modal_chatbot_edit select[name="id_offci"]').val();
			        let id = $('#modal_chatbot_edit input[name="zalo_id"]').val();
			        keywordoa = keywordoa.replace(/(?:\r\n|\r|\n)/g, '\\n');
			        if(keywordclient == ''){
								alertBox('Từ khóa người dùng nhắn tin không được trống',"f44336",false,true,true);
								return false;
							}else if(keywordoa == ''){
								alertBox('Mẫu trả lời không được trống',"f44336",false,true,true);
								return false;
							}else if(id_offci == ''){
								alertBox('Vui lòng chọn tài khoản',"f44336",false,true,true);
								return false;
							}

			        $.ajax({
			           url:'{{url('chatbot/updateChatbot') }}',
			            dataType: 'json',
			            type: 'GET',
			            contentType: 'application/x-www-form-urlencoded',
			            data:{keywordclient:keywordclient,keywordoa:keywordoa,id_offci:id_offci,id:id},
			            success: function(result){
			               if(result.status == 200){
			                  var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
					                
			                $('.contentpoppup').append(html);
			                $('#popupmess').modal('show');
			                 $('#modal_chatbot_edit').hide();
			                   setTimeout(function(){
			                        window.location.reload();
			                     }, 2000)

			                }else{
			                	var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Đã xảy ra lỗi, xin vui lòng thử lại!!</p>';
						                $('.contentpoppup').append(html);

						                $('#popupmess').modal('show');
						                $('#modal_chatbot_edit').hide();
			                }
			            },
			           
			            
			        });

			    }


			</script>
			@stop


			