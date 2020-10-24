@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
				<style>
					.filter-color-item {

							    /*display: inline-block;*/

							    width: 24px;

							    height: 24px;

							    border-radius: 4px;

							    margin: 2px;

							    cursor: pointer;

							    display: flex;

							    justify-content: center;

							    align-items: center;

							}
					.icon-checkmark4{

						color: #FFFF;

					}
					.alert_title{
						display: none;
					}
				</style>
				@include('errors.note')
        <!-- Form inputs -->
                <!-- Page header -->
			<div class="page-header">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
			            <span class="breadcrumb-item active">Danh mục tài khoản</span>
			        </div>

			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>

			    <div class="header-elements d-none">
			        
			    </div>
			</div>
			</div>
			<!-- /page header -->
				<div class="clearfix"></div>
				<!-- /table -->
				<input type="hidden" name="_token" value="UivGf0w88VQMTRho6HD7pQ5s0xuhTbSDcfTxNzXL"><div class="showLoading"></div>
				<div class="alertListAccount"></div>   
				<div class="row">
				<div class="col-md-12">
				    <div class="card">
				        <div class="card-body">
				        <form method="GET">
				            <div class="row">
				                <div class="col-md-6">
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
				    <div class="col-md-7">
				        <div class="card">
				        <div class="card-header header-elements-inline bg-slate-800">
				            <h5 class="card-title">Danh mục tài khoản</h5>
				            <div class="header-elements">
				                <button class="btn btn-danger" type="button" onclick="removeAllCateAc()"><i class="icon-folder-remove icon-1x"></i> Xóa danh mục</button>
				            </div>
				        </div>
				        <div class="table-responsive">
				                    <table class="table table-striped">
				                <thead>
				                    <tr>
				                        <th>
				                            {{-- <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker border-danger-600 text-danger-800"><span><input type="checkbox" class="form-check-input-styled-danger" onclick="checkAllCheckbox(this)" data-fouc=""></span></div>
				                                    
				                                </label>
				                            </div> --}}
				                            <div class="form-check">
												<label class="form-check-label">
													<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckboxCateAc(this)">
													
												</label>
											</div>
				                        </th>
				                        <th>Tên Danh mục</th>
				                        <th>Ngày tạo</th>
				                        <th>Thao tác</th>
				                    </tr>
				                </thead>
				                <tbody class="categoryAcc" id="categoryAcc">
				                   {{ csrf_field() }}
	                               @foreach($catelist as $row)
				                   <tr>
				                        <td>
				                       {{--  <div class="form-check">
				                                <label class="form-check-label">
				                                    <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="id[]" value="8"></span></div>
				                                </label>
				                            </div> --}}
				                             <div class="form-check form-check-inline">
											<label class="form-check-label formCate">
												<input type="checkbox" class="form-check-input-styled" data-fouc name="selectGroup[]" value="{{ $row->id }}">
											</label>
										</div>
				                        </td>
				                        <td>@if($row->color != null)<span class="badge badge-dark" style="background-color: #{{$row->color}};font-size: 100%;">{{$row->name }}</span> @else {{$row->name}}@endif</td>
				                        <td>{{$row->created_at}}</td>
				                        <td>
				                           
				                            <button class="btn btn-warning" type="button" onclick="getInfoCategory(this)" data-id="{{ $row->id }}" data-name="hihi"><i class="icon-pencil5  icon-1x"></i> Sửa</button>
				                            <a  href="{{asset('home/categories/delete/'.$row->id)}}" class="btn btn-danger" type="button" ><i class="icon-pencil5  icon-1x"></i>xóa</a>
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

				    <div class="col-md-5">
				        <div class="card">
				            <div class="card-header header-elements-inline bg-slate-800">
				                <h5 class="card-title">Thêm mới danh mục</h5>
				            </div>
				            <div class="card-body">
				                <form action="" method="POST" id="form_cate">
				                    
				                    <div class="form-group">
				                        <label for="exampleInputEmail1">Tên danh mục</label>
				                        	
				                        	<input required type="text" name="name" class="form-control" {{-- id="exampleFormControlInput1" --}} id="name_cate_color" placeholder="Tên danh mục..." style="color: rgb(4, 126, 213);">
				                        	<em class="text-danger alert_title">Vui lòng nhập tên danh mục</em>
				                        	<input type="text" class="form-control jscolor" id="jscolor" name="cate_color" value="2a3140" hidden>				                      
				                      </div>
				                      <div class="form-group">

				                            <label>Chọn màu:</label>

				                            <div class="flx" style="display: flex;">

											    <div class="filter-color-item color0" id="btn1" style="background: rgb(241, 44, 67);"></div>

											    <div class="filter-color-item color1" id="btn2" style="background: rgb(241, 107, 122);"></div>

											    <div class="filter-color-item color2" id="btn3" style="background: rgb(255, 139, 3);"></div>

											    <div class="filter-color-item color3" id="btn4" style="background: rgb(245, 212, 113);"></div>

											    <div class="filter-color-item color4" id="btn5" style="background: rgb(31, 197, 121);"></div>

											    <div class="filter-color-item color5" id="btn6" style="background: rgb(0, 179, 218);"></div>

											    <div class="filter-color-item color6" id="btn7" style="background: rgb(4, 126, 213);"></div>

											    <div class="filter-color-item color7" id="btn8" style="background: rgb(117, 99, 208);"></div>

											</div>

				                            

				                        </div>
				                    <div class="form-group">
				                        <a class="btn btn-success submit_category" {{-- type="submit" --}} style="color: #FFF;"><i class="icon-circle-right2 mr-1 icon-1x"></i> Thêm mới</a>
				                    </div>
				                    {{csrf_field()}}
				                </form>
				            </div>
				        </div><!--card-->
				       
				    </div><!--col-md-6-->
				</div><!--row-->

				<!-- /table -->
				<!-- Disabled backdrop -->
				<div id="modal_update_cate" class="modal fade" data-backdrop="false" tabindex="-1">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header bg-warning">
				                <h5 class="modal-title">Cập nhật danh mục</h5>

				                <button type="button" class="close" data-dismiss="modal">×</button>
				            </div>
				             <div class="loadCate"></div>
				            <div class="modalBox mt-1 col-12"></div>
				            <input type="hidden" name="cate_id" value="">            
				            <div class="modal-body row">
				                <div class="col-12">
				                    <div class="alertBox"></div><!--alert-->
				                </div>
				                <div class="col-12">
				                    <input type="hidden" name="cate_id" value="">
				                     <div class="form-group">
				                        <label for="exampleInputEmail1">Tên danh mục</label>
				                        <input type="text" class="form-control" name="cate_name" value="">
				                      </div>
				                     
				                </div><!--col-md-6-->
				               
				                <div class="col-12"><center><button class="text-center btn btn-primary btn_cookie" type="button" onclick="getUpdateCategory()"><i class="icon-circle-right2 mr-1 icon-1x"></i> Cập nhật</button></center></div>
				            </div>
				            
				        </div>
				    </div>
				</div>

			<!-- /disabled backdrop -->    
			</div>
			<script language="javascript">



	  var mautag1 = document.getElementById("btn1");

            var mautag2 = document.getElementById("btn2");

            var mautag3 = document.getElementById("btn3");

            var mautag4 = document.getElementById("btn4");

            var mautag5 = document.getElementById("btn5");

            var mautag6 = document.getElementById("btn6");

            var mautag7 = document.getElementById("btn7");

            var mautag8 = document.getElementById("btn8");

            var div = document.getElementById('name_cate_color');

            // var tag = document.getElementById('icontag');



            // Thiết lập click cho mautag1

            mautag1.onclick = function () {

                div.style.color = "#f12c43";

                // tag.style.color = "#f12c43";

                $('.jscolor').attr('value','f12c43');

                 $('.filter-color-item').removeClass('selected');

                $('#btn1').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn1').append('<i class="icon-checkmark4"></i>');

            };



            mautag2.onclick = function () {

                div.style.color = "#f16b7a";

                // tag.style.color = "#f16b7a";

                $('.jscolor').attr('value','f16b7a');

                $('.filter-color-item').removeClass('selected');

                $('#btn2').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn2').append('<i class="icon-checkmark4"></i>');

                

            };

            mautag3.onclick = function () {

                div.style.color = "#ff8b03";

                // tag.style.color = "#ff8b03";

                $('.jscolor').attr('value','ff8b03');

                 $('.filter-color-item').removeClass('selected');

                $('#btn3').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn3').append('<i class="icon-checkmark4"></i>');

               

            };

            mautag4.onclick = function () {

                div.style.color = "#f5d471";

                // tag.style.color = "#f5d471";

                $('.jscolor').attr('value','f5d471');

                 $('.filter-color-item').removeClass('selected');

                $('#btn4').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn4').append('<i class="icon-checkmark4"></i>');



            };

            mautag5.onclick = function () {

                div.style.color = "#1fc579";

                // tag.style.color = "#1fc579";

                $('.jscolor').attr('value','1fc579');

                 $('.filter-color-item').removeClass('selected');

                $('#btn5').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn5').append('<i class="icon-checkmark4"></i>');

            };

            mautag6.onclick = function () {

                div.style.color = "#00b3da";

                // tag.style.color = "#00b3da";

                $('.jscolor').attr('value','00b3da');

                 $('.filter-color-item').removeClass('selected');

                $('#btn6').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn6').append('<i class="icon-checkmark4"></i>');

            };

            mautag7.onclick = function () {

                div.style.color = "#047ed5";

                // tag.style.color = "#047ed5";

                 $('.jscolor').attr('value','047ed5');

                  $('.filter-color-item').removeClass('selected');

                $('#btn7').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn7').append('<i class="icon-checkmark4"></i>');

            };

            mautag8.onclick = function () {

                div.style.color = "#7563d0";

                // tag.style.color = "#7563d0";

                $('.jscolor').attr('value','7563d0');

                 $('.filter-color-item').removeClass('selected');

                $('#btn8').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn8').append('<i class="icon-checkmark4"></i>');

            };
            function check_namecate(tab,name_cate){
            	 if(name_cate == ''){
				        $(tab+' input[name="name"]').addClass('is-invalid');
				        $(tab+' .alert_title').show();
				    }else{
				        $(tab+' input[name="name"]').removeClass('is-invalid');
				        $(tab+' .alert_title').hide();
				    }
				 if(name_cate == '')
				    {
				        return false;
				    }
				    return true;
            }
            $('.submit_category').click(function(){
                 var name_cate = $('#name_cate_color').val();
                 var color_cate = $('#jscolor').val();
                 var _token = $('#form_cate input[name="_token"]').val();
                 console.log(_token);
                 var tab = '#form_cate';
                 let validate = check_namecate(tab,name_cate);
                 if(validate == true){
                 	$.ajax({
			            url: '{{ url('home/categories/addNameCate') }}',
			            type: 'post',
			            dataType: 'json',
			            data: {name:name_cate,color:color_cate,_token:_token},
			           
			            success:function(result){
			                if(result.status == 200){
			                    alertBox(result.message,"6bbd6e",false,true,true);
			                    
			                   setTimeout(function(){
			                        window.location.reload();
			                     }, 1500)
			                     
			                }
			            },
			        });
                 }
                 
                 
            });	
        </script>
			<!-- /content area -->
			@stop


			