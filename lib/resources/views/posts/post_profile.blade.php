@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
                <style>
                    .previewLinkType .previewLink iframe, .previewLink img, .previewLink video{
                    width: 100%;
                   }
                </style>
                <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
				@include('errors.note')
        <!-- Form inputs -->
                <!-- Page header -->
			<div class="page-header">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
			            <span class="breadcrumb-item active">Quản lý đăng bài</span>
                        <span class="breadcrumb-item active">Đăng bài profile</span>
                        <span class="breadcrumb-item active">Đăng bài ngay</span>
			        </div>

			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>

			    <div class="header-elements d-none">
			        
			    </div>
			</div>
			</div>
			<!-- /page header -->
            <form action="" id="postForm" name="postForm"  accept-charset="utf-8">
				<div class="row">
        <div class="col-md-12">
            <div class="alertPost"></div>
        </div>
        <!--alert-->
        <div class="col-md-6">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-solid border-0 postType">
                    <li class="nav-item" onclick="clickTablPreview('status')" onclick="return false;"><a href="#tabStatus" class="status js-click-status  nav-link active show" data-toggle="tab"><i class="icon-indent-decrease2 mr-1"></i> Trạng thái</a></li>
                    <li class="nav-item " onclick="clickTablPreview('link')"><a href="#tabLink" class="tabLink js-click-link nav-link" data-toggle="tab"><i class="icon-unlink2 mr-1 icon-1x"></i>Link</a></li>
                </ul>
                <!--ul tab-->
                <div class="card-body">
                    <div class="tab-content">
                        <input type="hidden" name="postType" id="postType" value="message" />            
                        <div class="tab-pane fade active show tabStatus" id="tabStatus">
                            <div class="form-group">
                            <label for="" class="title_text">Tiêu đề:</label>
                            <input type="text" name="title" class="form-control " id="tieude" placeholder="Nhập tiêu đề ở đây" value="">
                            <em class="text-danger alert_title">Vui lòng nhập tiêu đề</em>
                        </div>
                            <div class="form-group">
                                <label class="title_text">Nội dung:</label>
   
                                <p class="lead emoji-picker-container">
                                    <textarea name="message" cols="30" id="message" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" data-id="2e0e0462-16c3-4c7b-bf05-7aac6fabf086" data-type="original-input" oninput="myFunction()" {{-- id="myInput" --}} value=""></textarea>

                                </p>
                                <em class="text-danger alert_content">Vui lòng nhập nội dung</em>
                            </div>
                            <div class="form-group">
                                <label for="">Thêm bài viết vào danh mục</label>
                                <select name="cate_id" class="form-control">
                                    <option value="">-- Chọn danh mục --</option>
                                    @foreach($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn bg-primary-800" type="button" onclick="savePostStatus('#tabStatus')"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</button>
                                <button class="btn bg-warning-700" type="button" data-toggle="modal" data-target="#modal_full"><i class="icon-stack mr-2"></i>Chọn từ bài viết đã lưu</button>
                                {{-- <button class="btn bg-info-800" type="button"><i class="icon-select2 mr-2"></i> Sửa bài viết</button> --}}
                            </div>
                            <div class="form-group postStatus" id="postStatus" style="border-top-color: #f44336; padding-top: 11px;">
                                <div class="row">
                            <div class="col-md-6">
                                <select name="defTime" id="defTime" class="form-control">
                                    <option value="60" selected="=&quot;selected&quot;">60Giây</option>
                                    <option value="70">70Giây</option>
                                    <option value="80">80Giây</option>
                                    <option value="90">90Giây</option>
                                    <option value="100">100Giây</option>
                                    <option value="110">110Giây</option>
                                    <option value="120">120Giây</option>
                                    <option value="130">130Giây</option>
                                    <option value="160">160Giây</option>
                                    <option value="190">190Giây</option>
                                    <option value="220">220Giây</option>
                                    <option value="250">250Giây</option>
                                    <option value="280">280Giây</option>
                                    <option value="310">310Giây</option>
                                    <option value="340">340Giây</option>
                                    <option value="390">390Giây</option>
                                    <option value="450">450Giây</option>
                                    <option value="510">510Giây</option>
                                    <option value="570">570Giây</option>
                                    <option value="630">630Giây</option>
                                    <option value="690">690Giây</option>
                                    <option value="750">750Giây</option>
                                    <option value="810">810Giây</option>
                                    <option value="870">870Giây</option>
                                    <option value="930">930Giây</option>
                                    <option value="990">990Giây</option>
                                    <option value="1050">1050Giây</option>
                                    <option value="1110">1110Giây</option>
                                    <option value="1170">1170Giây</option>
                                    <option value="1230">1230Giây</option>
                                    <option value="1290">1290Giây</option>
                                    <option value="1350">1350Giây</option>
                                    <option value="1410">1410Giây</option>
                                    <option value="1470">1470Giây</option>
                                    <option value="1530">1530Giây</option>
                                </select>
                            </div>
                            <!--col-md-6-->
                            <div class="col-md-6">
                               {{--  <button class="btn bg-primary-800" onclick="postProfileStatus('#tabStatus')" id="post" name="post"><i class="icon-paperplane mr-2 icon-1x"></i>Đăng ngay</button> --}}
                               <button onclick="return false;" class="btn bg-primary-800" id="postStatus" name="postStatus">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Đăng ngay
                                    </button>
                               {{--  <a class="btn bg-danger-700" data-toggle="modal" data-target="#modal_schedule"><i class="icon-calendar3 mr-2"></i>Lên lịch</a> --}}
                                <a class="btn bg-danger-700" onclick="schedulePostStatus()"><i class="icon-calendar3 mr-2"></i>Lên lịch</a>

                            </div>
                        </div>
                         <div class="messageBox" style="padding-top: 23px;"></div>
                            </div>
                        </div>
                       
                        <!--tab cart-->
                        <div class="tab-pane fade tabLink" id="tabLink">
                            <div class="form-group">
                            <label for="" class="title_text">Tiêu đề:</label>
                            <input type="text" name="title" class="form-control " placeholder="Nhập tiêu đề ở đây" value="" id="tieude_link">
                            <em class="text-danger alert_title">Vui lòng nhập tiêu đề</em>
                        </div>
                            <div class="form-group">
                                <label class="title_text">Nội dung:</label>
                                <p class="lead emoji-picker-container">
                                  <textarea name="message" id="message_link" cols="30" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" data-id="2e0e0462-16c3-4c7b-bf05-7aac6fabf086" data-type="original-input" oninput="myFunction()" {{-- id="myInput" --}}></textarea>
                                </p>
                                <em class="text-danger alert_content">Vui lòng nhập nội dung</em>
                            </div>
                            <div class="form-group">
                                <label class="title_text">Link</label>
                                <input type="text" name="link" class="form-control" id="link" class="link">
                                <em class="text-danger alert_link">Vui lòng nhập link</em>
                            </div>
                            <div class="form-group">
                                <label for="">Thêm bài viết vào danh mục</label>
                                <select name="cate_id" class="form-control">
                                    <option value="">-- Chọn danh mục --</option>
                                     @foreach($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                               <em class="text-danger alert_category">Vui lòng chọn danh mục bài viết</em>
                            </div>
                            <div class="form-group">
                                <button class="btn bg-primary-800"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</button>
                                <a class="btn bg-warning-700" data-toggle="modal" data-target="#modal_full"><i class="icon-stack mr-2"></i>Chọn từ bài viết đã lưu</a>
                                {{-- <button class="btn bg-info-800"><i class="icon-select2 mr-2"></i> Sửa bài viết</button> --}}
                            </div>
                             <div class="form-group postLink" style="border-top-color: #f44336; padding-top: 11px;" id="postLink">
                               <div class="row">
                            <div class="col-md-6">
                                <select name="defTime" id="defTime" class="form-control">
                                    <option value="60" selected="=&quot;selected&quot;">60Giây</option>
                                    <option value="70">70Giây</option>
                                    <option value="80">80Giây</option>
                                    <option value="90">90Giây</option>
                                    <option value="100">100Giây</option>
                                    <option value="110">110Giây</option>
                                    <option value="120">120Giây</option>
                                    <option value="130">130Giây</option>
                                    <option value="160">160Giây</option>
                                    <option value="190">190Giây</option>
                                    <option value="220">220Giây</option>
                                    <option value="250">250Giây</option>
                                    <option value="280">280Giây</option>
                                    <option value="310">310Giây</option>
                                    <option value="340">340Giây</option>
                                    <option value="390">390Giây</option>
                                    <option value="450">450Giây</option>
                                    <option value="510">510Giây</option>
                                    <option value="570">570Giây</option>
                                    <option value="630">630Giây</option>
                                    <option value="690">690Giây</option>
                                    <option value="750">750Giây</option>
                                    <option value="810">810Giây</option>
                                    <option value="870">870Giây</option>
                                    <option value="930">930Giây</option>
                                    <option value="990">990Giây</option>
                                    <option value="1050">1050Giây</option>
                                    <option value="1110">1110Giây</option>
                                    <option value="1170">1170Giây</option>
                                    <option value="1230">1230Giây</option>
                                    <option value="1290">1290Giây</option>
                                    <option value="1350">1350Giây</option>
                                    <option value="1410">1410Giây</option>
                                    <option value="1470">1470Giây</option>
                                    <option value="1530">1530Giây</option>
                                </select>
                            </div>
                            <!--col-md-6-->
                            <div class="col-md-6">
                               {{--  <button class="btn bg-primary-800" onclick="postProfileStatus('#tabStatus')" id="post" name="post"><i class="icon-paperplane mr-2 icon-1x"></i>Đăng ngay</button> --}}
                               <button onclick="return false;" class="btn bg-primary-800" id="postLink" name="postLink">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Đăng ngay
                                    </button>
                               <a class="btn bg-danger-700" onclick="scheduleLink()"><i class="icon-calendar3 mr-2"></i>Lên lịch</a>

                            </div>
                        </div>
                         <div class="messageBox" style="padding-top: 23px;"></div>
                            </div>
                        </div>
                        <!--tab link-->

                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--col-md-6-->
        <div class="col-md-6">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-solid border-0" style="background-color: #ff7043;">
                    <li class="nav-item"><a href="#" class="nav-link" style="color: #FFFF;"> Xem trước bài viết</a></li>
                </ul>
                <!--ul tab-->
                <div class="card-body">
                    <div class="postPreview">
                        <div class="post">
                            <div class="previewPoster">
                                <img src="assets/img/zaloUser.jpg" style="vertical-align:top;" onerror="this.src = 'assets/img/zaloUser.jpg'"> 
                                <span class="userFullName">Zalo</span>
                                <span class="postPreviewDetails">Now ·zalo</span>
                                <div class="clear"></div>
                            </div>
                            <div class="box-view" id="box-view">
                              
                                <p class="message" id="message"></p>
                                <div class="previewLink"></div>
                                <div class="postDetails">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--postPreview-->
                </div>
                <!--card-body-->
            </div>
            <!--card-->
        </div>
        <!--col-md-6-->
    </div>
    <!--end row-->
   {{--  <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" id="form-group">
                        <label for="">Khoảng cách giữa hai bài đăng (giây)</label>
                        <div class="row">
                            <div class="col-md-6">
                                <select name="defTime" id="defTime" class="form-control">
                                    <option value="60" selected="=&quot;selected&quot;">60Giây</option>
                                    <option value="70">70Giây</option>
                                    <option value="80">80Giây</option>
                                    <option value="90">90Giây</option>
                                    <option value="100">100Giây</option>
                                    <option value="110">110Giây</option>
                                    <option value="120">120Giây</option>
                                    <option value="130">130Giây</option>
                                    <option value="160">160Giây</option>
                                    <option value="190">190Giây</option>
                                    <option value="220">220Giây</option>
                                    <option value="250">250Giây</option>
                                    <option value="280">280Giây</option>
                                    <option value="310">310Giây</option>
                                    <option value="340">340Giây</option>
                                    <option value="390">390Giây</option>
                                    <option value="450">450Giây</option>
                                    <option value="510">510Giây</option>
                                    <option value="570">570Giây</option>
                                    <option value="630">630Giây</option>
                                    <option value="690">690Giây</option>
                                    <option value="750">750Giây</option>
                                    <option value="810">810Giây</option>
                                    <option value="870">870Giây</option>
                                    <option value="930">930Giây</option>
                                    <option value="990">990Giây</option>
                                    <option value="1050">1050Giây</option>
                                    <option value="1110">1110Giây</option>
                                    <option value="1170">1170Giây</option>
                                    <option value="1230">1230Giây</option>
                                    <option value="1290">1290Giây</option>
                                    <option value="1350">1350Giây</option>
                                    <option value="1410">1410Giây</option>
                                    <option value="1470">1470Giây</option>
                                    <option value="1530">1530Giây</option>
                                </select>
                            </div>
                            <!--col-md-6-->
                            <div class="col-md-6">
                               
                               <button onclick="return false;" class="btn bg-primary-800" id="post" name="post">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Đăng ngay
                                    </button>
                                <button class="btn bg-danger-700" onclick="schedulePostStatus()"><i class="icon-calendar3 mr-2"></i>Lên lịch</button>

                            </div>
                        </div>
                         <div class="messageBox"></div>
                        <!--row-->
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-md-6-->
    </div> --}}
    {{csrf_field()}}
</form>
    <!--row-->
    <div class="card">
                          <div class="card-header header-elements-sm-inline">
								
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
                               @if($status != 1)
    				                @foreach($list as $key =>$row)
    				                 <tr class='groupName {{ $row->zalo_id }}Type' id='{{ $row->zalo_id }}'>
    				                   <td>
                                        <label class="form-check-label formProfile formListpost">
                                            <input type="checkbox" class="fbnode checkbox form-check-input-styled" name="selectGroup[]" id="selectgroup_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}">
                                             <label for="selectgroup_{{ $row->zalo_id }}"></label>
                                         </label>
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
    				                    <td> <span class="badge bg-success">Live</span> </td>
    				                    <td></td>
    				                    <td>
    				                       <span class="postStatus_{{ $row->zalo_id }} postStatus"></span> 
    				                    </td>
    				                </tr>
                                    @endforeach
                                @else
                                   @foreach($list as $key =>$row)
                                     @foreach($role_profile as $value)
                                        @if($row->zalo_id == $value)
                                          <tr class='groupName {{ $row->zalo_id }}Type' id='{{ $row->zalo_id }}'>
                                               <td>
                                                <label class="form-check-label formProfile formListpost">
                                                    <input type="checkbox" class="fbnode checkbox form-check-input-styled" name="selectGroup[]" id="selectgroup_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}">
                                                     <label for="selectgroup_{{ $row->zalo_id }}"></label>
                                                 </label>
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
                                                <td> <span class="badge bg-success">Live</span> </td>
                                                <td></td>
                                                <td>
                                                   <span class="postStatus_{{ $row->zalo_id }} postStatus"></span> 
                                                </td>
                                           </tr>
                                        @endif
                                     @endforeach
                                   @endforeach
                                @endif
				           </tbody>
				        </table>
				                            
				            </div>
                             {{$list->links()}}
							
						</div>
                       <div id="modal_full" class="modal fade show" tabindex="-1" style="display: none; padding-right: 17px;">
                            <div class="modal-dialog modal-full">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5 class="modal-title">Danh sách bài viết</h5>
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                    </div>

                                    <div class="modal-body">

                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="">
                                                    <th>
                                                        Chọn
                                                    </th>
                                                    <th>STT</th>
                                                    <th>Tên bài viết</th>
                                                    <th>Danh mục</th>
                                                    <th>Kiểu bài viết</th>
                                                    <th>Ngày tạo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($list_post as $row)
                                                <tr>
                                                    <td>
                                                      <div class="form-check">
                                                        <label class="form-check-label">
                                                           <input type="radio" name="gender" value="{{ $row->id }}" class="form-check-input-styled-danger">
                                                        </label>
                                                    </div>
                                                   
                                                     </td>
                                                    <td>{{ $row->id }}</td>
                                                    <td>{{ $row->post_title }}</td>
                                                    <td>
                                                                                                                                    
                                                      @foreach($category as $cate)
                                                       @if($row->cate_id == $cate->id)                          
                                                           <span class="badge badge-dark">{{$cate->name }}</span>
                                                       @endif
                                                      @endforeach
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                                                    </td>
                                                    <td><span class="badge badge-success">{{ $row->type }}</span></td>
                                                    <td>{{ $row->created_at }}</td>
                                                </tr>
                                              @endforeach                                
                                                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                       {{--  <button type="button" class="btn bg-primary" id="chonbaiviet">chọn bài viết</button> --}}
                                        <input type="button" class="btn bg-primary" value="Chọn bài viết">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="modal_scheduleStatus" class="modal fade show" data-backdrop="false" tabindex="-1" style="padding-right: 17px; display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header  bg-warning-700">
                                    <h5 class="modal-title">Lên lịch đăng</h5>
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
                                         <h6 class="font-weight-semibold">Khoảng cách giữa 2 bài viết</h6>
                                          </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                   {{-- <input type="radio" name="gender" value="#" class="form-check-input-styled-danger" checked> --}}
                                                   <input type="radio" name="timeType" id="intervalMunite" value="minute" checked="">
                                                   Phút
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                   {{-- <input type="radio" name="gender" value="#" class="form-check-input-styled-danger"> --}}
                                                   <input type="radio" name="timeType" id="intervalHour" value="hour">
                                                   Giờ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                              
                                                <select name="scheduledPostInterval" id="scheduledPostInterval" class="form-control">
                                                                                  @for($i =1; $i <=90; $i++)
                                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                                @endfor
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    </div><!--col-md-12-->
                                    
                                     <div class="col-md-6">
                                            <h6 class="font-weight-semibold">Bắt đầu lên lịch đăng:</h6>
                                                  <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <button type="button" class="btn btn-light btn-icon" id="btn_time"><i class="icon-calendar3"></i></button>
                                                        </span>
                                                        <input type="text" class="span2 form-control" value="2020-05-10 15:58:09" id="timeStart" name="time_start">
                                                    </div>
                                            <small style="color:red;margin:5px">
                                              Thời gian hệ thống : <span id='hvn'></span>
                                            </small>
                                        </div><!--col-md-6-->
                                        <div class="col-md-6">
                                        <div class="form-group">
                                         <h6 class="font-weight-semibold">Ngày kết thúc</h6>
                                         <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn btn-light btn-icon" id="btn_time"><i class="icon-calendar3"></i></button>
                                                </span>
                                                <input type="text" class="span2 form-control" value="2020-05-10 15:58:09" id="dpt" name="time_end">
                                            </div>
                                             <div class="alert_title text-danger">Vui lòng chọn lịch đăng</div>
                                          
                                        </div>
                                    </div>
                                    <div class="col-12" id="message">
                                        
                                        <button onclick="return false;" class="text-center btn bg-primary-800" id="saveScheduledPostStatus" name="scheduledpost">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> Lưu lịch đăng
                                        </button>
                                        <div class="thongbao" style="margin-top: 10px;"></div>
                                    </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    {{-- link --}}
                    <div id="modal_scheduleLink" class="modal fade show" data-backdrop="false" tabindex="-1" style="padding-right: 17px; display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header  bg-warning-700">
                                    <h5 class="modal-title">Lên lịch đăng</h5>
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
                                         <h6 class="font-weight-semibold">Khoảng cách giữa 2 bài viết</h6>
                                          </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                   {{-- <input type="radio" name="gender" value="#" class="form-check-input-styled-danger" checked> --}}
                                                   <input type="radio" name="timeType" id="intervalMunite" value="minute" checked="">
                                                   Phút
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                   {{-- <input type="radio" name="gender" value="#" class="form-check-input-styled-danger"> --}}
                                                   <input type="radio" name="timeType" id="intervalHour" value="hour">
                                                   Giờ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                              
                                                <select name="scheduledPostInterval" id="scheduledPostInterval" class="form-control">
                                                                               @for($i =1; $i <=90; $i++)
                                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                                @endfor
                                                                                
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    </div><!--col-md-12-->
                                    
                                     <div class="col-md-6">
                                            <h6 class="font-weight-semibold">Bắt đầu lên lịch đăng:</h6>
                                                  <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <button type="button" class="btn btn-light btn-icon" id="btn_time"><i class="icon-calendar3"></i></button>
                                                        </span>
                                                        <input type="text" class="span2 form-control" value="2020-05-10 15:58:09" id="timeStartv2" name="time_start">
                                                    </div>
                                            <small style="color:red;margin:5px">
                                              Thời gian hệ thống : <span id='hvnv2'></span>
                                            </small>
                                        </div><!--col-md-6-->
                                        <div class="col-md-6">
                                        <div class="form-group">
                                         <h6 class="font-weight-semibold">Ngày kết thúc</h6>
                                         <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn btn-light btn-icon" id="btn_time"><i class="icon-calendar3"></i></button>
                                                </span>
                                                <input type="text" class="span2 form-control" value="28-05-2020 15:50" id="dptv2" name="time_end">
                                            </div>
                                             <div class="alert_title text-danger">Vui lòng chọn lịch đăng</div>
                                          
                                        </div>
                                    </div>
                                    <div class="col-12" id="message">
                                        
                                        <button onclick="return false;" class="text-center btn bg-primary-800" id="saveScheduledPostLink" name="scheduledpost">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> Lưu lịch đăng
                                        </button>
                                        <div class="thongbao" style="margin-top: 10px;"></div>
                                    </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                    </div>
			</div>

            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tính năng này đang được cập nhật, bạn vui lòng quay lại sau !!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary fr" data-dismiss="modal">Ok</button>
        
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
			<!-- /content area -->
            <script>
                    $(function(){
                  $('#dpt').fdatepicker({
                        format: 'dd-mm-yyyy hh:ii',
                        disableDblClickSelection: true,
                        language: 'vi',
                        pickTime: true
                    });
                    $('#timeStart').fdatepicker({
                        format: 'dd-mm-yyyy hh:ii',
                        disableDblClickSelection: true,
                        language: 'vi',
                        pickTime: true
                    });
                });
                    var today = new Date();
                   var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                   var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                   var dateTime = date+' '+time;
                 
                   document.getElementById("hvn").innerHTML = dateTime;
                   $('#timeStart').val(dateTime);
                   $('#dpt').val(dateTime);
                  
  
                    $(function(){
                  $('#dptv2').fdatepicker({
                        format: 'dd-mm-yyyy hh:ii',
                        disableDblClickSelection: true,
                        language: 'vi',
                        pickTime: true
                    });
                    $('#timeStartv2').fdatepicker({
                        format: 'dd-mm-yyyy hh:ii',
                        disableDblClickSelection: true,
                        language: 'vi',
                        pickTime: true
                    });
                });
                var today = new Date();
               var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
               var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
               var dateTime = date+' '+time;
             
               document.getElementById("hvnv2").innerHTML = dateTime;
               $('#timeStartv2').val(dateTime);
               $('#dptv2').val(dateTime);

            </script>
			@stop


			