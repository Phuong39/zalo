@extends('master')
@section('title','Cấu hình cài đặt')
@section('main')
	<!-- Content area -->
			<div class="content">
				<style>
					.last{
						display: none;
					}
				</style>
				<div class="card" id="form_login">
						<div class="card-header header-elements-inline">
							<h5 class="card-title">Đăng nhập</h5>
							<div class="header-elements">
								<div class="list-icons">
			                		<a class="list-icons-item" data-action="collapse"></a>
			                		<a class="list-icons-item" data-action="reload"></a>
			                		<a class="list-icons-item" data-action="remove"></a>
			                	</div>
		                	</div>
						</div>

						<div class="card-body">
							<form action="#">
							<div class="form-group">
								<label>User:</label>
								<input type="text" class="form-control" placeholder="Tài khoản đăng nhập" name="user">
								<em class="text-danger alert_user last">Vui lòng nhập User</em>
							</div>

							<div class="form-group">
								<label>Password:</label>
								<input type="password" class="form-control" placeholder="Mật khẩu" name="password">
								<em class="text-danger alert_password last">Vui lòng nhập password</em>
							</div>
							<div class="form-group">
								<label>Mã Cty:</label>
								<input type="text" class="form-control" placeholder="Mã công ty" name="macty">
								<em class="text-danger alert_macty last">Vui lòng nhập mã Cty</em>
							</div>
							<div class="form-group">
								<label>Domain:</label>
								<input type="text" class="form-control" placeholder="Domain" name="domain">
								<em class="text-danger alert_domain last">Vui lòng nhập Domain</em>
							</div>
							<div class="form-group">
								<label>Loại tài khoản:</label>
								<select class="btn btn-primary" name="phanloai">
				             	 <option value="">Chọn loại tài khoản</option>
	    							    <option value="NHAN_VIEN">Nhân Viên</option>
	   							</select>
	   							<em class="text-danger alert_phanloai last">Vui lòng chọn loại tài khoản</em>
							</div>

							<div class="text-right">
								<a type="submit" class="btn btn-primary" id="submit_login" style="color: #FFFF;">Đăng nhập<i class="icon-paperplane ml-2"></i></a>
							</div>
							{{ csrf_field() }}
							</form>
						</div>
					</div>
					<div class="">
					    <div class="card-header header-elements-inline bg-slate-800">
					        <h5 class="card-title">Tài khoản đăng nhập gần đây</h5>
					        <div class="header-elements">
					        </div>
					    </div>
					    <div class="table-responsive">
					        <table class="table table-striped">
					            <thead>
					                <tr class="">
					                    <th>STT</th>
					                    <th>User</th>
					                    <th>Mã công ty</th>
					                    <th>Domain</th>
					                    <th>Loại tài khoản</th>
					                    <th>Thao tác</th>
					                </tr>
					            </thead>
					            <tbody class="data-table2 accountOA" id="accountOA">
					               @foreach($account as $key=>$row)
					                <tr>
					                    <td>{{ $key }}</td>
					                    <td>{{ $row->User }}</td>
					                    <td>{{ $row->MaCongTy }}</td>
					                    <td>{{ $row->Domain }}</td>
					                    <td>{{ $row->LoaiTaiKhoan }}</td>
					                    <td class="loginST">                         
					                            <button class="btn btn btn-success" type="button" data-account="{{ $row->User }}" onclick="loginStep2({{ $row->id }})"> Đăng nhập</button>
					                    </td>
					                </tr>
					                @endforeach
					            </tbody>
					        </table>
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
			<!-- /content area -->
			<script>
				  $('#submit_login').on('click',function(){
                     var user = $('input[name="user"]').val();
                     var pass = $('input[name="password"]').val();
                     var macty = $('input[name="macty"]').val();
                     var domain = $('input[name="domain"]').val();
                     var loaitk= $('select[name="phanloai"]').val();
                      let _token  = $('input[name="_token"]').val();
                     let validate = validateFormLogin(user,pass,macty,domain,loaitk);
                      if(validate == true){
                          var params = {};
                          params['user'] = user;
                          params['pass'] = pass;
                          params['macty'] = macty;
                          params['domain'] = domain;
                          params['loatk'] = loaitk;
                          params['_token'] = _token;
                          $.ajax({
					            url: '{{ url('setting/loginApiDomain') }}',
					            type: 'post',
					            dataType: 'json',
					            data: params,
					           
					            success:function(result){
					                if(result.status == 200){
					                    
					                    var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
					                
					                $('.contentpoppup').html(html);
					                $('#popupmess').modal('show');
					                }else{
					                	// $("p").remove(".contentmess");
                                         var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>'+result.message+'</p>';
						                $('.contentpoppup').html(html);
						                $('#popupmess').modal('show');
					                }
					            },
					        });
                      }
                     

				  });

				  function validateFormLogin(user,pass,macty,domain,loaitk){
				  	var tab = "#form_login"
					    if(user == ''){
					        $(tab+' input[name="user"]').addClass('is-invalid');
					        $(tab+' .alert_user').show();
					    }else{
					        $(tab+' input[name="user"]').removeClass('is-invalid');
					        $(tab+' .alert_user').hide();
					    }
					    if(pass == ''){
					       $(tab+' input[name="password"]').addClass('is-invalid');
					        $(tab+' .alert_password').show();
					    }else{
					        $(tab+' input[name="password"]').removeClass('is-invalid');
					        $(tab+' .alert_password').hide();
					    }
					    if(macty == ''){
					        $(tab+' input[name="macty"]').addClass('is-invalid');
					        $(tab+' .alert_macty').show();
					    }else{
					         $(tab+' input[name="macty"]').removeClass('is-invalid');
					        $(tab+' .alert_macty').hide();
					    }
					     if(domain == ''){
					        $(tab+' input[name="domain"]').addClass('is-invalid');
					        $(tab+' .alert_domain').show();
					    }else{
					         $(tab+' input[name="domain"]').removeClass('is-invalid');
					        $(tab+' .alert_domain').hide();
					    }
					    if(loaitk == ''){
					       $(tab+' select[name="phanloai"]').addClass('is-invalid');
                           $(tab+' .alert_phanloai').show();
					    }else{
					         $(tab+' select[name="phanloai"]').removeClass('is-invalid');
                             $(tab+' .alert_phanloai').hide();
					    }

					    if(user == '' || pass == '' || macty == '' || domain =='' || loaitk =='')
					    {
					        return false;
					    }
					    return true;
					}

					function loginStep2(ob){
						 let _token  = $('input[name="_token"]').val();
                         $.ajax({
					            url: '{{ url('setting/loginStep2') }}',
					            type: 'post',
					            dataType: 'json',
					            data: {id:ob,_token: _token},
					           
					            success:function(result){
					                if(result.status == 200){
					                    
					                    var html = '<p ><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>'+result.message+'</p>';
					                
					                $('.contentpoppup').html(html);
					                $('#popupmess').modal('show');
					                }else{
					                	// $("p").remove(".contentmess");
                                         var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>'+result.message+'</p>';
						                $('.contentpoppup').html(html);
						                $('#popupmess').modal('show');
					                }
					            },
					        });
					}
			</script>
			@stop