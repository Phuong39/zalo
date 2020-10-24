@extends('master')
@section('title','Danh sách đơn hàng')
@section('main')
			<!-- Content area -->
			<div class="content">
        <!-- Form inputs -->
           @include('errors.note')
				<div class="clearfix"></div>
				<style>
					.nameProduct{
						width: 192px;
					    overflow: hidden;
					    white-space: nowrap;
					    text-overflow: ellipsis;
					}
				</style>	
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
				            	<div class="form-group col-md-3">
		   							<div class="form-group">
		   								<span style="vertical-align: middle;">Tìm thấy tổng số <b>0</b> Đơn hàng</span>
		   							</div>
	   							
				                </div>
				                <div class="form-group col-md-6" >
					             <select class="btn btn-primary" id="id_offci" style=" display:none; width: fit-content; float: left;    background-color: #008fe5 !important;" onchange="getDataOrder()" > 
				             	    <option value="">Chọn tài khoản của bạn</option>
								       @foreach($list as $row)
									    <option value="{{ $row->zalo_id }}" data-name="{{ $row->name }}" data-image="{{ $row->image }}" class="checkzalo_{{ $row->zalo_id }}">{{ $row->name }}</option>
									   @endforeach
								 </select>

	   							<div class="form-group">
	   								<button class="btn btn-success" type="button" style="margin-left: 12px;" data-toggle="modal" data-target=".taikhoanOA">Chọn tài khoản</button>
	   							</div>
	   							
				              </div>
				                <div class="form-group col-md-3">
				                	{{-- <a style="margin: 0px !important;margin-right: 10px !important;" href="" class="btn btn-primary pull-right exportexcelbutton" title=""><i style="margin-right: 10px" class="fa fa-file-excel-o"></i>Xuất file</a> --}}
				                </div>
				               
				                {{-- <div class="col-md-5">
				                    <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
				                </div><!-col-md-9->
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
				            <h5 class="card-title">Danh sách đơn hàng</h5>
				           {{--  <div class="dataTables_length" id="account_length" style="margin: 0 !important;">
							    <label>
							        <span>Show:</span> 
							        <select name="account_length" aria-controls="account" class="" id="show-order" onchange="getDataOrderLimit()">
							            <option value="10">10</option>
							            <option value="20">20</option>
							            <option value="30">30</option>
							            <option value="40">40</option>
							            <option value="50">50</option>
							            <option value="80">80</option>
							            <option value="100">100</option>
							            <option value="150">150</option>
							            <option value="200">200</option>
							            <option value="300">300</option>
							            <option value="400">400</option>
							            <option value="500">500</option>
							            <option value="800">800</option>
							            <option value="1000">1,000</option>
							        </select>
							    </label>
							</div> --}}
							<div class="ins-select">
			                    <div class="wrap-select">
			                        <select ng-model="searchParams.status" onchange="searchOrder()"  id="searchOrder" class="ng-pristine ng-valid ng-not-empty ng-touched">
			                            <option value="search_0">Trạng thái ĐH</option>
			                            
			                                <option value="search_1">Đơn hàng mới</option>
			                            
			                                <option value="search_2">Đang xử lý</option>
			                            
			                                <option value="search_3">Đã xác nhận</option>
			                            
			                                <option value="search_4">Đang giao hàng</option>
			                            
			                                <option value="search_5">Thành công</option>
			                            
			                                <option value="search_6">Hủy</option>
			                            
			                                <option value="search_7">Chuyển hoàn</option>
			                            
			                        </select>
			                    </div>
			                </div>
				        </div>
				        <div class="table-responsive">
				                    <table class="table table-striped">
						                <thead>
						                    <tr>
						                        
						                        <th>STT</th>
						                        <th>TK Zalo</th>
						                        <th>Đơn hàng</th>
						                        <th>Sản phẩm</th>
						                        <th>Tổng giá trị SP</th>
						                        <th>Phí vận chuyển</th>
						                        <th>Khách hàng</th>
						                        <th>Trạng thái ĐH</th>
						                        <th>Trạng thái TT</th>
						                        <th>Thao tác</th>
						                        
						                        
						                    </tr>
						                </thead>
				                <tbody class="contentOrder" id="contentOrder">
				                   {{-- <tr>
				                   	   <td><input type="checkbox" class="selectepageprofile checkallfanpage" value="88ea5c2e036bea35b37a" style="display: block;"><label for="checkbox-88ea5c2e036bea35b37a"></label></td>
									    <td>1</td>
									    <td>#200</td>
									    <td>redmi2airdot</td>
									    <td>10</td>
									    <td>40.000đ</td>
									    <td>Nguyễn Văn A</td>
									    <td>Đang xử lý</td>
									    <td>Chưa thanh toán</td>
									    <td><a href="#" title="Clear logs" class="btn btn-primary " onclick="updateproduct(200)" data-toggle="modal" data-target="#addnew">Xác nhận</a></td>
									</tr> --}}
				               </tbody>
				            </table>
				          
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
			             
				    </div> 
			    </div>
			  </div>
			</div>
			<!--Modal thong bao <-->
				   <div class="modal fade taikhoanOA" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-full">
					    <div class="modal-content">
					      <div class="modal-header" style="border-bottom: 1px solid #cdcdcd;">
					      	 {{ csrf_field() }}
					        <h4 class="modal-title" id="mySmallModalLabel">Chọn tài khoản</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">×</span>
					        </button>
					      </div>
                          <div class="modal-body">
                          	@if($status != 1)
	                          	 @foreach($list as $row)
				                 <div class="groupName 8151621222413048004Type" id="{{ $row->zalo_id }}">

		                                <p class="zalo_name" style=" font-size: 17px; font-weight: 600; color: #356bb2; " title="{{ $row->name }}">
		                                	 <span>

		                                      <input type="checkbox" class="primary checkprofilev_0 selectepageOA checkallprofile profile_{{ $row->zalo_id }}" data-type="profile" value="{{ $row->zalo_id }}"  data-name="{{ $row->name }}" id="check_0">
		                                      
		                                     <label for="selectgroup_8151621222413048004"></label>

		                                   </span>
		                                                             
		                                     <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 50px;height: 50px;" src="{{ $row->image }}">

		                                  {{ $row->name }}

		                            </p>
		            	    	</div>
		            	    	@endforeach
		            	    @else
		            	      @foreach($list as $row)
		            	        @foreach($role_page as $value)
		            	          @if($row->zalo_id == $value)
					                 <div class="groupName 8151621222413048004Type" id="{{ $row->zalo_id }}">
			                                <p class="zalo_name" style=" font-size: 17px; font-weight: 600; color: #356bb2; " title="{{ $row->name }}">
			                                	 <span>

			                                      <input type="checkbox" class="primary checkprofilev_0 selectepageOA checkallprofile profile_{{ $row->zalo_id }}" data-type="profile" value="{{ $row->zalo_id }}"  data-name="{{ $row->name }}" id="check_0">
			                                      
			                                     <label for="selectgroup_8151621222413048004"></label>

			                                   </span>
			                                                             
			                                     <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 50px;height: 50px;" src="{{ $row->image }}">

			                                  {{ $row->name }}

			                            </p>
			            	    	 </div>
		            	    	  @endif
                                 @endforeach
		            	    	@endforeach
	            	    	@endif
	            	    	<div class="modal-footer">

		                        <span class="btn btn-danger" data-dismiss="modal">Đóng</span>

		                        <span class="btn btn-primary btn-save-pageOA" data-dismiss="modal">Chọn</span>

		                    </div>
				         </div> 

					    </div>
					  </div>
					</div>

				    <script>
				    	$( document ).ready(function() {
						     var locationv2 = window.location.href;
						    
						      if(locationv2 == 'https://zalov2.phanmemninja.com/order'){

						            $('.d-md-block').trigger('click');
						      }

						  });
					     function getDataOrder(){
					     	var groups = [];
					    	var id_offci = $('#id_offci').val();
					    	if(id_offci === ''){
					    		var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn tài khoản!!</p>';
					                $('.contentpoppup').append(html);
					                $('#popupmess').modal('show');
					                return false;
					    	}
								// groups.push(id_offci);
								var params = {};
								params['id_oa'] = id_offci;
								params['_token'] = $('input[name="_token"]').val();

								$('.loader-zalo').show();

								$.ajax({
									url: '{{ url("order/getDataOrderOa") }}',
									dataType: 'json',
									type: 'post',
									contentType: 'application/x-www-form-urlencoded',
									data: params,
									success: function( result, textStatus, jQxhr ){
										
                                     
									},
									error: function( jqXhr, textStatus, errorThrown ){ 
									},
									complete: function( data, textStatus, jQxhr){
                                         $('#contentOrder').html(data.responseText);
										
										$('.loader-zalo').hide();
										
									}
								});
					     }
                       function getDataOrderLimit(){
                       	    
	                       	 var id_offci = $('#id_offci').val();
	                       	 if(id_offci == ''){
	                       	 	var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn tài khoản!!</p>';
					                $('.contentpoppup').append(html);
					                $('#popupmess').modal('show');
					                return false;
	                       	 }
	                       	 var limit = $('#show-order').val();
	                       	var _token = $('input[name="_token"]').val();
	                       	var params = {};
	                       	params['id_offci'] = id_offci;
	                       	params['limit']  = limit;
	                       	params['_token']  = _token;
	                       	 $('.loader-zalo').show();
                       	   $.ajax({
									url: '{{ url("order/getDataOrderLimit") }}',
									dataType: 'json',
									type: 'post',
									contentType: 'application/x-www-form-urlencoded',
									data: params,
									success: function( result, textStatus, jQxhr ){
					
									},
									error: function( jqXhr, textStatus, errorThrown ){ 
									},
									complete: function( data, textStatus, jQxhr){

                                         $('#contentOrder').html(data.responseText);
										//$('#datatable').DataTable();
										$('.loader-zalo').hide();
										
									}
								});
                       }

                       $('.btn-save-pageOA').click(function(){
                       	var arr = new Array();
                       	var check = 0;
                       	var params = {};
                       	var k = 0;
                       	var n = 0;
                       	var _token = $('input[name="_token"]').val();
					        $('.selectepageOA').each(function(i, value){
			                     if ($(value).is(':checked')) {
			                            arr.push($(value).val());
			                            check = 1;
			                        }
			                 });
					    $('.loader-zalo').show();
					    var html = 'Đang tải đơn hàng. Tiến độ: <span id="countSend"  style="color: red;"></span>/<span>'+arr.length+'</span>'; 
					            		$(".contentloader").html(html);
					    for (var i = 0; i < arr.length; i++) {
					    	setTimeout( function timer(){
					    		params['zaloid'] = arr[k];
					    		params['_token'] = _token;
						    	$.ajax({
										url: '{{ url("order/getDataOrderOaV2") }}',
										dataType: 'json',
										type: 'post',
										contentType: 'application/x-www-form-urlencoded',
										data: params,
										success: function( result, textStatus, jQxhr ){
						                   if(result.status == 200){
						                   	  var param = '{"zaloid": "'+result.zaloid+'","data":"'+result.tkn+'"}';
						                   	  socket.emit('getOrderZalo',param);
						                   	 
						                   }
										}
									});
						    	 
						    	k++;
						    	n++;
						    	var html2 = '<span>'+n+'</span>';
                                  $('#countSend').html(html2);
						    	if(n == arr.length){
						    		$('.loader-zalo').hide();
						    	}
						    }, i*5000 );
					    }
					         
					});

                    function searchOrder(){
                    	var id_search = $('#searchOrder').val();
                    	if(id_search == 'search_1'){
                    		var value = 'Đơn hàng mới';
                    	}else if(id_search == 'search_2'){
                    		var value = 'Đang xử lý';
                    	}else if(id_search == 'search_3'){
                            var value = 'Đã xác nhận';
                    	}else if(id_search == 'search_4'){
                            var value = 'Đang giao hàng';
                    	}else if(id_search == 'search_5'){
                            var value = 'Thành công';
                    	}else if(id_search == 'search_6'){
                            var value = 'Hủy';
                    	}else if(id_search == 'search_7'){
                              var value = 'Chuyển hoàn';
                    	}else if(id_search == 'search_0'){
                            $('.btn-save-pageOA').click();
                    	}
                    	console.log(value);
                    	$(".table-responsive .obj").filter(function() {
							$(this).toggle($(this).text().indexOf(value) > -1);
						});
                    }


                          

				    </script>

			<!-- /content area -->
			@stop


			