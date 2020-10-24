@extends('master')
@section('title','Kết bạn theo số điện thoại')
@section('main')
			<!-- Content area -->
            
			<div class="content">

                <style>
                    .title_text {
                        font-size: 15px;
                        color: #000;
                    }
                    .scrollbar-deep-purple::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-deep-purple::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-deep-purple::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #512da8; }

.scrollbar-deep-purple {
scrollbar-color: #512da8 #F5F5F5;
}

.scrollbar-cyan::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-cyan::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-cyan::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #00bcd4; }

.scrollbar-cyan {
scrollbar-color: #00bcd4 #F5F5F5;
}

.scrollbar-dusty-grass::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-dusty-grass::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-dusty-grass::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-image: -webkit-linear-gradient(330deg, #d4fc79 0%, #96e6a1 100%);
background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); }

.scrollbar-ripe-malinka::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-ripe-malinka::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-ripe-malinka::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-image: -webkit-linear-gradient(330deg, #f093fb 0%, #f5576c 100%);
background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%); }

.bordered-deep-purple::-webkit-scrollbar-track {
-webkit-box-shadow: none;
border: 1px solid #512da8; }

.bordered-deep-purple::-webkit-scrollbar-thumb {
-webkit-box-shadow: none; }

.bordered-cyan::-webkit-scrollbar-track {
-webkit-box-shadow: none;
border: 1px solid #00bcd4; }

.bordered-cyan::-webkit-scrollbar-thumb {
-webkit-box-shadow: none; }

.square::-webkit-scrollbar-track {
border-radius: 0 !important; }

.square::-webkit-scrollbar-thumb {
border-radius: 0 !important; }

.thin::-webkit-scrollbar {
width: 6px; }

.example-1 {
position: relative;
overflow-y: scroll;
height: 471px; }

                </style>
				@include('errors.note')
        <!-- Form inputs -->
                <!-- Page header -->
			<div class="page-header">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
			            <span class="breadcrumb-item active">Quản lý kết bạn</span>
                        <span class="breadcrumb-item active">Kết bạn theo số điện thoại</span>
                         {{-- <a class="btn btn-primary addfriendVesion2" style="color: #FFF;">A</a> --}}
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
				{{ csrf_field() }}
				<div class="alertListAccount"></div>
				<div class="row">
				<div class="col-md-8">
                  {{--   <div class="alert alert-danger alert-styled-left alert-dismissible" style="border-color:#e53935;"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="fa fa-undefined-sign" aria-hidden="true"></span>&nbsp;Tính năng này tạm đóng để tiến hành cập nhật , nâng cấp. Xin cảm ơn</div> --}}
				    <div class="card">
                        <div class="alert alert-info" style="background-color: #00a65a; color: #FFFF;">
                            <strong style="color: #f0ff43;">Chú ý:</strong> Mỗi tài khoản kết bạn với 50 sdt trong 1 ngày!!.
                        </div>
                        <div class="alert alert-success thongbao" style="display: none; background-color: #00a65a; color: #FFF;"></div>
                        <div class="form-group" id="form-group">
                            <label style="margin-top: 10px;margin-left: 10px;" class="title_text">Số điện thoại:</label>

                            <textarea class="list-phone form-control" style="width: 98%;height: 200px; margin-left: 10px" id="list-phone" placeholder="0963695043&#10;0985357976&#10;0983664313&#10;......"></textarea>
                             <span style="color: red;font-size: 12px;margin-left: 10px;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Nhấn dữ Shift + Enter: để xuống dòng</span>
                            <input type="file" name="" class="choicefile" id="choicefile" style="margin-left: 10px;">
                            {{ csrf_field() }}
                        </div>
                        <div class="form-group" style="margin-left: 10px;">
                            <div class="messageBoxLoc" style="padding-top: 23px;"></div>
                            <button class="btn btn-primary" type="button" id="locsodienthoai" ><i class="icon-search4 mr-3 icon-1x"></i> Lọc số điện thoại</button>

                            <button class="btn btn-primary" type="button" id="xuatfile" ><i class="icon-download4 mr-3 icon-1x"></i>Xuất file(.csv)</button>
                             <button class="btn btn-primary" type="button" id="adddataphone"><i class="icon-mobile mr-3 icon-1x"></i>Đồng bộ sdt vào điện thoại</button>

                        </div>
                        <div class="form-group">
                            <label class="title_text" style="margin-left: 11px;">Nội dung kết bạn:</label>
                            <textarea class="noidung form-control" style="width: 98%;height: 200px;margin-left: 11px" placeholder="Nhập nội dung kết bạn tại đây, tối đa 150 kí tự."></textarea>
                        </div>

                        </div>
                        <a class="btn btn-primary addfriend" style="color: #FFF;"><i class="icon-people mr-3 icon-1x"></i> Kết bạn ngay</a>
                       
                        <div class="messageBox" style="padding-top: 23px;"></div>
                     
				    </div><!--col-md-12-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header header-elements-inline" style="background-color: #ff7043; color: #FFF;" >
                                <h6 class="card-title">Số zalo có liên quan đến bạn</h6>
                                <div class="header-elements">
                                   {{--  <span class="badge bg-danger-400 badge-pill">+86</span> --}}
                                </div>
                            </div>

                            <div class="card-body viewdataphone">
                                <div class="chart mb-3" id="bullets"></div>
                                 <!-- Grid column -->

                                    <!-- Exaple 1 -->
                                    <div class="card example-1 square scrollbar-dusty-grass square thin">
                                      <div class="card-body">
                                       <ul class="media-list dataphone">

                                          {{--   <li class="media">
                                                <div class="mr-3">
                                                   <img src="https://s120.avatar.talk.zdn.vn/2/1/d/1/2/120/8562f13ab84c7a97bcc031798f470f5d.jpg" width="40px" height="40px" style="border-radius: 50%!important;">
                                                </div>
                                                
                                                <div class="media-body">
                                                   SakujaJP
                                                    <div class="text-muted">0973102879</div>
                                                </div>
                                             
                                            </li> --}}
                                           
                                        </ul>
                                      </div>
                                    </div>
                                    <!-- Exaple 1 -->

                               
                            </div>
                        </div>
                    </div>




				<!-- /table -->

			</div>
            <div class="card" style="margin-top: 17px">
             {{csrf_field()}}
                          <div class="card-body">
                                <div class="row">
                                <div class="col-md-5">
                                   
                                </div><!--col-md-5-->
                                <div class="col-md-3">
                                <form method="GET" id="formSubmit">
                                    <div class="row">
                                       <div class="">
                                                <div class="form-group">
                                                   
                                                   <select name="category_id" id="category" class="form-control">
                                                       <option value="">== Chọn danh mục ==</option>
                                                        @foreach($category as $cate)
                                                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                        @endforeach
                                                           
                                                    </select>

                                                  </div>
                                            </div>
                                       
                                    </div>
                                </form>
                                    </div><!--col-md-4-->
                                   
                                    <div class="col-md-4">
                                    {{-- <form method="GET">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
                                            </div><!--col-md-9-->
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button>
                                            </div>
                                        </div><!--row-->
                                    </form>  --}}  
                                    </div><!--col-md-4-->
                            </div>
                            </div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr class="">
                                    <th>
                                        <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input-styled-warning" onclick="checkAllCheckboxAddfriend(this)">
                                                    
                                                </label>
                                            </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Danh mục</th>
                                    <th>Cookie</th>
                                    <th>Trạng thái đăng</th>
                                </tr>
                                </thead>
                                <tbody>
                            @if($status !=1)
                                @foreach($account as $row)
                                <tr class="groupName">
                                     
                                    <td class="formAddfriend">
                                        @if($row->checkcookie !=1)
                                         {{-- @if($row->user_id == 21) --}}
                                        <input type="checkbox" class="fbnode checkbox form-check-input-styled" name="selectGroup[]" id="selectgroup_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}">
                                        @endif
                                         <label for="selectgroup_{{ $row->zalo_id }}"></label>
                                         {{-- @endif --}}
                                     </td>
                                    <td>{{ $row->zalo_id }}</td>
                                    <td><img src="{{ $row->image }}" width="40px" height="40px" style="border-radius: 50%!important;"></td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        @foreach($category as $cate)
                                      @if($row->cate_id == $cate->id)                            
                                         <span class="badge badge-dark">{{$cate->name }}</span>
                                          @endif
                                     @endforeach 
                                    </td>
                                    <td> @if($row->checkcookie != 1) <span class='badge bg-success postStatus_{{ $row->zalo_id}} postStatus'>Live</span> @else <span class="badge bg-danger">Die</span> @endif </td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                            @else
                                    @foreach($account as $row)

                                                     @for ($i = 0; $i < count($role_profile); $i++)

                                                        @if($role_profile[$i] == $row->zalo_id)

                                                               <tr class="groupName">
                                     
                                                                    <td>
                                                                        @if($row->checkcookie !=1)
                                                                        <input type="checkbox" class="fbnode checkbox form-check-input-styled" name="selectGroup[2]" id="selectgroup_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}">
                                                                         <label for="selectgroup_{{ $row->zalo_id }}"></label>
                                                                         @endif
                                                                     </td>
                                                                    <td>{{ $row->zalo_id }}</td>
                                                                    <td><img src="{{ $row->image }}" width="40px" height="40px" style="border-radius: 50%!important;"></td>
                                                                    <td>{{ $row->name }}</td>
                                                                    <td>
                                                                        @foreach($category as $cate)
                                                                      @if($row->cate_id == $cate->id)                            
                                                                         <span class="badge badge-dark">{{$cate->name }}</span>
                                                                          @endif
                                                                     @endforeach 
                                                                    </td>
                                                                    <td> @if($row->checkcookie != 1) <span class='badge bg-success postStatus_{{ $row->zalo_id}} postStatus'>Live</span> @else <span class="badge bg-danger">Die</span> @endif </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>

                                                        @endif

                                                    @endfor

                                                   

                                                    @endforeach

                            @endif
                                </tbody>
                            </table>

                        </div>
                         {{--  {{$account->links()}} --}}
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
                    <script type="text/javascript">
                        var input = document.getElementById("choicefile");
                            var output = document.getElementById("list-phone");


                            input.addEventListener("change", function () {
                                //console.log();
                              if (this.files && this.files[0]) {
                                var myFile = this.files[0];
                                var reader = new FileReader();
                                
                                reader.addEventListener('load', function (e) {
                                  output.textContent = e.target.result;
                                });
                                
                                reader.readAsBinaryString(myFile);
                              }   
                            });

                            function checkAllCheckboxAddfriend(model){
                                var isChecked = model.checked;
                                if(isChecked) {
                                    $('input[name="selectGroup[]"]').each(function() {
                                        this.checked = true;
                                        $('.formAddfriend span').addClass('checked');
                                    });
                                } else {
                                    $('input[name="selectGroup[]"]').each(function() {
                                        this.checked = false;
                                        $('.formAddfriend span').removeClass('checked');
                                    });
                                }
                            }
                         $('.addfriendVesion2').on('click',function(){
                             var groups = [];
                             var check = 0;
                             var listphone = $('.list-phone').val().trim();
                             var phone = listphone.replace(/(\r\n|\n|\r)/gm," ");
                             var arr_phone = phone.split(' ');

                             $('.groupName:visible .fbnode:checked').each(function(){
                                check = 1;
                                groups.push($(this).val());
                            });
                            if(check == 0){
                                alertBox('Vui lòng chọn tài khoản để kết bạn',"e91607",".messageBox",true,true);
                                return false;
                            }
                            if(groups.length < 2){
                                 alertBox('Vui lòng chọn 2 tài khoản zalo trở lên, để sử dụng tính năng này.',"e91607",".messageBox",true,true);
                                 return false;
                            }
                            if($('.list-phone').val() == ''){
                                alertBox('Vui lòng nhập danh sách số điện thoại',"e91607",".messageBox",true,true);
                                return false;
                            }
                            if($('.noidung').val() == ''){
                                alertBox('Vui lòng nhập nội dung kết bạn',"e91607",".messageBox",true,true);
                                return false;
                            }
                            if(arr_phone.length < 50){
                                 alertBox('Danh sách số điện thoại phải lớn hơn 50.',"e91607",".messageBox",true,true);
                                return false;
                            }
                            


                         });
                    </script>
            </div>
			<!-- /content area -->
			@stop



