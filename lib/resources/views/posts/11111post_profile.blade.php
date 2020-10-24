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
			            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
			            <a href="#" class="breadcrumb-item">Cấu hình</a>
			            <span class="breadcrumb-item active">Danh mục tài khoản</span>
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
                    <li class="nav-item" onclick="clickTablPreview('status')" onclick="return false;"><a href="#tabStatus" class="nav-link active show" data-toggle="tab"><i class="icon-indent-decrease2 mr-1"></i> Trạng thái</a></li>
                    <li class="nav-item" onclick="clickTablPreview('link')"><a href="#tabLink" class="nav-link" data-toggle="tab"><i class="icon-unlink2 mr-1 icon-1x"></i>Link</a></li>
                </ul>
                <!--ul tab-->
                <div class="card-body">
                    <div class="tab-content">
                        <input type="hidden" name="postType" id="postType" value="message" />            
                        <div class="tab-pane fade active show tabStatus" id="tabStatus">
                            <div class="form-group">
                            <label for="" class="title_text">Tiêu đề:</label>
                            <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề ở đây" value="">
                            <em class="text-danger alert_title">Vui lòng nhập tiêu đề</em>
                        </div>
                            <div class="form-group">
                                <label class="title_text">Nội dung:</label>
   
                                <p class="lead emoji-picker-container">
                                    <textarea name="message" cols="30" id="message" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" data-id="2e0e0462-16c3-4c7b-bf05-7aac6fabf086" data-type="original-input" oninput="myFunction()" id="myInput"></textarea>

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
                        </div>
                       
                        <!--tab cart-->
                        <div class="tab-pane fade tabLink" id="tabLink">
                            <div class="form-group">
                                <label class="title_text">Nội dung:</label>
                                <p class="lead emoji-picker-container">
                                  <textarea name="message" cols="30" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" data-id="2e0e0462-16c3-4c7b-bf05-7aac6fabf086" data-type="original-input" oninput="myFunction()" id="myInput"></textarea>
                                </p>
                                
                            </div>
                            <div class="form-group">
                                <label class="title_text">Link</label>
                                <input type="text" name="title" class="form-control" id="link" class="link">
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
                                <button class="btn bg-primary-800"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</button>
                                <button class="btn bg-warning-700"><i class="icon-stack mr-2"></i>Chọn từ bài viết đã lưu</button>
                                {{-- <button class="btn bg-info-800"><i class="icon-select2 mr-2"></i> Sửa bài viết</button> --}}
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
                <ul class="nav nav-tabs nav-tabs-solid border-0">
                    <li class="nav-item">Xem trước bài viết</li>
                </ul>
                <!--ul tab-->
                <div class="card-body">
                    <div class="postPreview">
                        <div class="post">
                            <div class="previewPoster">
                                <img src="https://s120.avatar.talk.zdn.vn/6/8/4/1/2/120/61c9e312cd05c775f7b42157d82c4b11.jpg" style="vertical-align:top;" onerror="this.src = 'https://s120.avatar.talk.zdn.vn/6/8/4/1/2/120/61c9e312cd05c775f7b42157d82c4b11.jpg'"> 
                                <span class="userFullName">佐助</span>
                                <span class="postPreviewDetails">Now ·zalo</span>
                                <div class="clear"></div>
                            </div>
                            <div class="box-view">
                              
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
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
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
                               <button onclick="return false;" class="btn bg-primary-800" id="post" name="post">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Đăng ngay
                                    </button>
                                <button class="btn bg-danger-700"><i class="icon-calendar3 mr-2"></i>Lên lịch</button>
                            </div>
                        </div>
                        <!--row-->
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-md-6-->
    </div>
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
				                @foreach($list as $row)
				                 <tr class='groupName {{ $row->zalo_id }}Type' id='{{ $row->zalo_id }}'>
				                   <td>
                                        <input type="checkbox" class="fbnode checkbox checkbox-style" name="selectGroup[2]" id="selectgroup_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}">
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
				                       <span class="postStatus_{{ $row->zalo_id }} postStatus" style="color: red;"></span> 
				                    </td>
				                </tr>
                                @endforeach
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
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <div class="uniform-checker border-danger-600 text-danger-800"><span><input type="checkbox" class="form-check-input-styled-danger" onclick="checkAllCheckbox(this)" data-fouc=""></span></div>
                                                            </label>
                                                        </div>
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
                                                            <div class="uniform-choice border-danger-600 text-danger-800"><span class=""><input type="radio" name="radio-styled-color" class="form-check-input-styled-danger" data-fouc=""></span></div>
                                                           
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
                                        <button type="button" class="btn bg-primary">chọn bài viết</button>
                                    </div>
                                </div>
                            </div>
                        </div>
		   
			</div>
			<!-- /content area -->
			@stop


			