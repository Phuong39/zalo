@extends('master')
@section('title','Danh mục tài khoản')
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
			            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
			            <a href="#" class="breadcrumb-item">Cấu hình</a>
			            <span class="breadcrumb-item active">Kết bạn theo số điện thoại</span>
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
				<div class="col-md-8">
				    <div class="card">
                        <div class="alert alert-info" style="background-color: #00c0ef;">
                            <strong style="color: red;">Chú ý:</strong style="color: #2a3140;"> Mỗi tài khoản kết bạn với 50 sdt trong 1 ngày!!.
                        </div>
                        <div class="alert alert-success thongbao" style="display: none; background-color: #00a65a; color: #FFF;"></div>
                        <div class="form-group" id="form-group">
                            <label style="margin-top: 10px;margin-left: 10px;" class="title_text">Số điện thoại:</label>
                            <textarea class="list-phone form-control" style="width: 98%;height: 200px; margin-left: 10px" id="list-phone"></textarea>
                            <input type="file" name="" class="choicefile" id="choicefile" style="margin-left: 10px;">
                            {{ csrf_field() }}
                        </div>
                        <div class="form-group" style="margin-left: 10px;">
                            <button class="btn btn-primary" type="button" id="locsodienthoai" ><i class="icon-shield-check mr-3 icon-1x"></i> Lọc số điện thoại</button>

                            <button class="btn btn-primary" type="button" id="xuatfile" ><i class="icon-shield-check mr-3 icon-1x"></i>Xuất file(.csv)</button>
                        </div>
                        <div class="form-group">
                            <label class="title_text" style="margin-left: 11px;">Nội dung kết bạn:</label>
                            <textarea class="noidung form-control" style="width: 98%;height: 200px;margin-left: 11px"></textarea>
                        </div>

                        </div>
                        <a class="btn btn-primary addfriend" style="color: #FFF;"><i class="icon-shield-check mr-3 icon-1x"></i> Kết bạn ngay</a>
                    
                     
				    </div><!--col-md-12-->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header header-elements-inline" style="background-color: #ff7043; color: #FFF;" >
                                <h6 class="card-title">Thông tin số điện thoại vừa lọc</h6>
                                <div class="header-elements">
                                    <span class="badge bg-danger-400 badge-pill">+86</span>
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
                                    <form method="GET">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value="">
                                            </div><!--col-md-9-->
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button>
                                            </div>
                                        </div><!--row-->
                                    </form>   
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
                                                    <input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckbox(this)">
                                                    
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
                                @foreach($account as $row)
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
                            @endforeach
                                </tbody>
                            </table>

                        </div>
                         {{--  {{$account->links()}} --}}
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
                    </script>
            </div>
			<!-- /content area -->
			@stop



