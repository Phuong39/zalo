@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content">
                 {{ csrf_field() }}
                <style>
                    .previewLinkType .previewLink iframe, .previewLink img, .previewLink video{
                    width: 100%;
                   }
                   .form-control {
                border: 1px solid #eee;
                        box-shadow: none;
                    }
                    .hidden {
                        display: none!important;
                    }
                    #avatar2 {
                        cursor: pointer;
                    }
                    .thumbnail {
                        display: block;
                        padding: 4px;
                        margin-bottom: 20px;
                        line-height: 1.42857143;
                        background-color: #fff;
                        border: 1px solid #ddd;
                        border-radius: 4px;
                        -webkit-transition: border .2s ease-in-out;
                        -o-transition: border .2s ease-in-out;
                        transition: border .2s ease-in-out;
                    }
                    .previewLinkType .previewLink iframe, .previewLink img, .previewLink video{
                            width: 100%;
                        }
                        .previewImageType img {
                            width: 100%;
                            min-height: 178px;
                        }
                        .alert_mieuta,.alert_tacgia{display: none;}

                </style>
                <link href="https://app2.phanmemninja.com/assets/js/plugins/datetime/foundation-datepicker.min.css" rel="stylesheet">
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
                        <span class="breadcrumb-item active">Đăng bài OA</span>
                        <span class="breadcrumb-item active">Đăng bài ngay</span>
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
            <div class="alertPost"></div>
        </div>
        <!--alert-->
        <div class="col-md-6">
            <div class="card">
                <ul class="nav nav-tabs nav-tabs-solid border-0 postType">
                   <li class="nav-item" onclick="clickTablPreview('image')"><a href="#tabImage" class="nav-link active show js-click-image" data-toggle="tab"><i class="icon-image3 mr-1 icon-1x"></i> Image</a></li>
                <li class="nav-item" onclick="clickTablPreview('video')"><a href="#tabVideo" class="nav-link js-click-video" data-toggle="tab"><i class="icon-video-camera3 mr-1 icon-1x"></i> Video</a></li>
                </ul>
                <!--ul tab-->
                <div class="card-body">
                    <div class="tab-content">
                        {{ csrf_field() }}
                        <input type="hidden" name="postType" id="postType" value="message" />            
                         <div class="tab-pane fade active show" id="tabImage">
                        <form action="" method="post" enctype="multipart/form-data" id="postFormImage" name="postFormImage">
                        <div class="form-group">
                            <label for="" class="title_text">Tiêu đề:</label>
                            <input required type="text" name="title" class="form-control" placeholder="Nhập tiêu đề ở đây" value="" id='tieude_link'>
                            <em class="text-danger alert_title">Vui lòng nhập tiêu đề</em>
                        </div>
                        <div class="form-group">
                            <label for="" class="title_text">Tác giả:</label>
                            <input required type="text" name="tacgia" class="form-control" placeholder="Nhập tác giả ở đây" value="" id="tacgia"> 
                           <em class="text-danger alert_tacgia">Vui lòng nhập tác giả</em>
                        </div>
                        <div class="form-group">
                            <label for="" class="title_text">Miêu tả:</label>
                            <p class="lead emoji-picker-container2">
                            <textarea required name="mieuta" cols="30" rows="5" class="form-control" placeholder="Nhập miểu tả ở đây" data-emojiable="converted" style="display: block;" data-id="17fde7c8-1254-45ba-b352-586293fccc2d" data-type="original-input" id="mieuta"></textarea>
                            </p>
                           <em class="text-danger alert_mieuta">Vui lòng nhập miêu tả</em>
                        </div>
                        <div class="form-group">
                            <label class="title_text">Nội dung:</label>
                            <p class="lead emoji-picker-container">
                                <textarea required name="message" cols="30" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" style="display: block;" data-id="17fde7c8-1254-45ba-b352-586293fccc2d" data-type="original-input" id="noidung"></textarea>

                            </p>
                            <em class="text-danger alert_content">Vui lòng nhập nội dung</em>
                        </div>
                        <div class="form-group">
                            <div class="loadImg">
                            </div>
                            <!--loadImg-->
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label  class="title_text">Ảnh:</label>
                            <input type="text" hidden="" name="imageURL" id="imageURL" value="">
                            <input required id="img2" type="file" name="img2" accept=".png, .jpg, .jpeg, .gif" class="form-control hidden" onchange="changeImg2(this)">
                            <img id="avatar2" class="thumbnail" width="300px" src="global_assets/images/new_seo-10-512.png">
                        </div>
                        <div class="form-group">
                            <label for="">Thêm bài viết vào danh mục</label>
                            <select required name="cate_id" class="form-control">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                             <em class="text-danger alert_category">Vui lòng chọn danh mục bài viết</em>
                        </div>
                        <div class="form-group">
                            <button class="btn bg-primary-800" {{-- onclick="savePostImage('#tabImage')" --}}type="submit"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</button>
                             <button class="btn bg-warning-700" type="button" data-toggle="modal" data-target="#modal_full"><i class="icon-stack mr-2"></i>Chọn từ bài viết đã lưu</button>
                        </div>
                         <div class="form-group postImage" id="postImage">
                        <label for="">Khoảng cách giữa hai bài đăng (giây)</label>
                        <div class="row" >
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

                               {{-- start post job --}}
                               <button onclick="return false;" class="btn bg-primary-800" id="postImage2" name="postImage">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Đăng ngay
                                    </button>
                                   {{--  end post job --}}

                             {{--    <button onclick="return false;" class="btn bg-primary-800" id="postImagev3" name="postImage">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Đăng ngay
                                    </button> --}}
                                <a class="btn bg-danger-700" onclick="schedulePostImg()"><i class="icon-calendar3 mr-2"></i>Lên lịch</a>
                            </div>
                            
                        </div>
                        <!--row-->
                         <div class="messageBox" style="padding-top: 23px;"></div>
                    </div>
                        {{ csrf_field() }}
                      </form>
                    </div>
                       
                        <!--tab image-->
                        <div class="tab-pane fade tabVideo" id="tabVideo">
                         <form action="" method="post" enctype="multipart/form-data" name="postFormVideo" id="postFormVideo">
                        <div class="form-group">
                            <label for="" class="title_text">Tiêu đề:</label>
                            <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề ở đây" value="" id="tieude">
                            <em class="text-danger alert_title">Vui lòng nhập tiêu đề</em>
                        </div>
                        <div class="form-group">
                            <label for="" class="title_text">Tác giả:</label>
                            <input required type="text" name="tacgia" class="form-control " id="tacgia" placeholder="Nhập tác giả ở đây" value="">
                           
                        </div>
                        <div class="form-group">
                            <label for="" class="title_text">Miêu tả:</label>
                            <textarea required name="mieuta" cols="30" rows="5" class="form-control" placeholder="Nhập miểu tả ở đây" data-emojiable="converted" {{-- style="display: block;" --}} data-id="17fde7c8-1254-45ba-b352-586293fccc2d" data-type="original-input" id="mieuta"></textarea>
                           
                        </div>
                        <div class="form-group">
                            <label class="title_text">Nội dung:</label>
                            <p class="lead emoji-picker-container">
                                <textarea name="message" cols="30" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" style="display:block;" data-id="c7d60962-163c-483b-9dbd-a168d3c53573" data-type="original-input" id="message"></textarea>

                            </p>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="video" value="">
                        </div>
                        <div class="form-group">
                            <label class="title_text">Video:</label>
                           <div class="input-group">
                            <input type="text" name="video_url" class="form-control" id="video" value="" placeholder="Định dạng video (3gp, avi, mov, mp4, mpeg, mpeg4, vob, wmv...etc).">
                            <div class="input-group-btn">
                                <input required="" id="img3" type="file" name="img3" class="form-control hidden" onchange="changeVideo(this)">
                                <a id="avatar3" class="btn btn-info">Video</a>
                            </div>
                        </div>
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
                            <button class="btn bg-primary-800" onclick="savePostVideo('#tabVideo')"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</button>
                            <a class="btn bg-warning-700" data-toggle="modal" data-target="#modal_full"><i class="icon-stack mr-2"></i>Chọn từ bài viết đã lưu</a>
                        </div>
                         <div class="form-group" id="postVideo">
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
                               {{--  <button class="btn bg-primary-800" onclick="postProfileStatus('#tabStatus')" id="post" name="post"><i class="icon-paperplane mr-2 icon-1x"></i>Đăng ngay</button> --}}
                               <button onclick="return false;" class="btn bg-primary-800" id="postVideo2" name="postVideo">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Đăng ngay
                                    </button>
                                <a class="btn bg-danger-700" onclick="schedulePostVideo()"><i class="icon-calendar3 mr-2"></i>Lên lịch</a>
                            </div>
                            
                        </div>
                        <div class="messageBox" style="padding-top: 23px;"></div>
                        <!--row-->
                     </div>
                     {{ csrf_field() }}
                    </form>
                    </div>
                    <!--tab video-->
                    
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
                              
                                <div class="box-view"><p class="message"><span class="defaultMessage" style="width: 60%"></span><span class="defaultMessage" style="width: 80%"></span><span class="defaultMessage" style="width: 40%"></span></p><p class="sell_title_prev"></p><p class="sell_price_prev"></p><p class="sell_localtion_prev"></p><p class="sell_description_prev"></p><div class="clearfix"></div><div class="previewImageType pit1"><div class="image_1"></div></div></div>
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

    {{csrf_field()}}

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
				                                <div class="checkbox uniform-checker">
                                                  <label><input type="checkbox" value="" class="form-check-input-styled"></label>
                                                </div>
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
    				                @foreach($list as $row)
    				                 <tr class='groupName {{ $row->zalo_id }}Type' id='{{ $row->zalo_id }}'>
    				                   <td>
                                            <input type="checkbox" class="fbnode checkbox checkbox-style" name="selectGroup[]" id="selectgroup_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}">
                                             <label for="selectgroup_{{ $row->zalo_id }}"></label>
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
    				                       <span class="postStatus_{{ $row->zalo_id }} postStatus" style="color: #008fe5;"></span> 
    				                    </td>
    				                </tr>
                                    @endforeach
                                 @else
                                   @foreach($list as $row)
                                     @foreach($role_page as $value)
                                        @if($row->zalo_id == $value)
                                          <tr class='groupName {{ $row->zalo_id }}Type' id='{{ $row->zalo_id }}'>
                                           <td>
                                                <input type="checkbox" class="fbnode checkbox checkbox-style" name="selectGroup[]" id="selectgroup_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}">
                                                 <label for="selectgroup_{{ $row->zalo_id }}"></label>
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
                                               <span class="postStatus_{{ $row->zalo_id }} postStatus" style="color: #008fe5;"></span> 
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
							@foreach($account as $row)
                              @if($row->checkcookie != 1)
                             <input type="hidden" value="8097233930629553451" class="acountzalo" data-cookie="{{ $row->cookie }}" data-env="{{ $row->serectkey }}">
                             @endif
                            @endforeach
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
			</div>
                <div id="modal_schedule" class="modal fade show" data-backdrop="false" tabindex="-1" style="padding-right: 17px; display: none;">
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
                                                    @for($i=1; $i<=90; $i++)
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
                                                        <input type="text" class="span2 form-control" value="" id="timeStart" name="time_start">
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
                                                <input type="text" class="span2 form-control" value="" id="timeEnd" name="time_end">
                                            </div>
                                             <div class="alert_title text-danger">Vui lòng chọn lịch đăng</div>
                                          
                                        </div>
                                    </div>
                                    <div class="col-12" id="message">
                                        
                                        <button onclick="return false;" class="text-center btn bg-primary-800" id="saveScheduledPostImg" name="scheduledpost">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> Lưu lịch đăng
                                        </button>
                                        <div class="thongbao" style="margin-top: 10px;"></div>
                                    </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   <!--  video -->
                   <div id="modal_scheduleVideo" class="modal fade show" data-backdrop="false" tabindex="-1" style="padding-right: 17px; display: none;">
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
                                                    @for($i=1; $i<=90; $i++)
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
                                                        <input type="text" class="span2 form-control" value="" id="timeStartv2" name="time_start">
                                                    </div>
                                            <small style="color:red;margin:5px">
                                              Thời gian hệ thống : <span id="hvn2"></span>
                                            </small>
                                        </div><!--col-md-6-->
                                        <div class="col-md-6">
                                        <div class="form-group">
                                         <h6 class="font-weight-semibold">Ngày kết thúc</h6>
                                         <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn btn-light btn-icon" id="btn_time"><i class="icon-calendar3"></i></button>
                                                </span>
                                                <input type="text" class="span2 form-control" value="" id="timeEndv2" name="time_end">
                                            </div>
                                             <div class="alert_title text-danger">Vui lòng chọn lịch đăng</div>
                                          
                                        </div>
                                    </div>
                                    <div class="col-12" id="message">
                                        
                                        <button onclick="return false;" class="text-center btn bg-primary-800" id="saveScheduledPostVideo" name="scheduledpost">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> Lưu lịch đăng
                                        </button>
                                        <div class="thongbao" style="margin-top: 10px;"></div>
                                    </div>
                                  
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
              $(function(){
                  $('#timeEnd').fdatepicker({
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
               $('#timeEnd').val(dateTime);

              //video
              $(function(){
                  $('#timeEndv2').fdatepicker({
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
             
               document.getElementById("hvn2").innerHTML = dateTime;
               $('#timeStartv2').val(dateTime);
               $('#timeEndv2').val(dateTime);

              $("#postFormImage #postImagev3").click(function(){
                var tab ="#tabImage";
                    var message = $(tab+' textarea[name="message"]').val();
                    var cateId  = $(tab+ ' select[name="cate_id"]').val();
                    var title  = $(tab+ ' input[name="title"]').val();
                    var mieuta  = $(tab+ ' textarea[name="mieuta"]').val();
                    var tacgia  = $(tab+ ' input[name="tacgia"]').val();
                    var source  = $(tab+ ' input[name="imageURL"]').val();
                    //console.log(source);
                    var type = "image";
                    var link ='';
                    
                    var validate = validateFormImagev3(tab,title,message,mieuta,cateId,tacgia);
                 
                    if(validate == true){
                       message.replace(/(?:\r\n|\r|\n)/g, '\\n');
                       var message = message.split('\n');
                      var message =  message.filter(function(e){return e});

                       //console.log(message);
                      postImage(type,message,link,title,mieuta,tacgia,source);
                      //postImagev2(type,message,link,title,mieuta,tacgia,source);

                    }


                });

              function validateFormImagev3(tab,title,message,mieuta,cateId,tacgia){
                    
                    if(title == ''){
                        $(tab+' input[name="title"]').addClass('is-invalid');
                        $(tab+' .alert_title').show();
                    }else{
                        $(tab+' input[name="title"]').removeClass('is-invalid');
                        $(tab+' .alert_title').hide();
                    }
                    if(message == ''){
                        $(tab+' .emojionearea-editor').addClass('is-invalid');
                        $(tab+' .alert_content').show();
                    }else{

                        $(tab+' .emojionearea-editor').removeClass('is-invalid');
                        $(tab+' .alert_content').hide();
                    }
                    if(mieuta == ''){

                        $(tab+' .emojionearea-editor2').addClass('is-invalid');
                        $(tab+' .alert_mieuta').show();
                    }else{

                        $(tab+' .emojionearea-editor2').removeClass('is-invalid');
                        $(tab+' .alert_mieuta').hide();
                    }
                     if(tacgia == ''){
                        $(tab+' input[name="tacgia"]').addClass('is-invalid');
                        $(tab+' .alert_tacgia').show();
                    }else{
                        $(tab+' input[name="tacgia"]').removeClass('is-invalid');
                        $(tab+' .alert_tacgia').hide();
                    }
                    if(cateId == ''){
                        $(tab+' select[name="cate_id"]').addClass('is-invalid');
                        $(tab+' .alert_category').show();
                    }else{
                        $(tab+' select[name="cate_id"]').removeClass('is-invalid');
                        $(tab+' .alert_category').hide();
                    }

                    if(title == '' || message == '' || cateId == '' || mieuta =='' || tacgia =='')
                    {
                        return false;
                    }
                    return true;
                }
        </script>
			<!-- /content area -->
			@stop


			