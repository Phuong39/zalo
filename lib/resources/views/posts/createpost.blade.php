@extends('master')
@section('title','Thêm bài viết')
@section('main')
<div class="content">
	<style>
		.form-control {
			    border: 1px solid #eee;
			    box-shadow: none;
			}
			.hidden {
			    display: none!important;
			}
			#avatar {
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
	<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
	<!-- Page header -->
			<div class="page-header">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			    <div class="d-flex">
			        <div class="breadcrumb">
			            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
                        <span class="breadcrumb-item active">Quản lý đăng bài</span>
			            <span class="breadcrumb-item active">Thêm bài viết</span>
			        </div>

			        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
			    </div>

			    <div class="header-elements d-none">
			        
			    </div>
			</div>

			</div>
			<!-- /page header -->
			@include('errors.note')
        <!-- Form inputs -->
				
				<!-- Form inputs -->
			<div class="content">
                  <!--  start main -->
                  <div class="row">
    <div class="col-md-12">
        <div class="alertPost"></div>
    </div>
    <!--alert-->
    <div class="col-md-6">
        <div class="card">
            <ul class="nav nav-tabs nav-tabs-solid border-0">
                <li class="nav-item" onclick="clickTablPreview('status')"><a href="#tabStatus" class="nav-link active show" data-toggle="tab"><i class="icon-indent-decrease2 mr-1"></i> Trạng thái</a></li>
                {{-- <li class="nav-item" onclick="clickTablPreview('cart')"><a href="#tabCart" class="nav-link" data-toggle="tab"><i class="icon-store mr-1 icon-1x"></i> Bán hàng</a></li> --}}
                <li class="nav-item" onclick="clickTablPreview('link')"><a href="#tabLink" class="nav-link" data-toggle="tab"><i class="icon-unlink2 mr-1 icon-1x"></i>Link</a></li>
                <li class="nav-item" onclick="clickTablPreview('image')"><a href="#tabImage" class="nav-link" data-toggle="tab"><i class="icon-image3 mr-1 icon-1x"></i> Image</a></li>
                <li class="nav-item" onclick="clickTablPreview('video')"><a href="#tabVideo" class="nav-link postTypeVideo" data-toggle="tab"><i class="icon-video-camera3 mr-1 icon-1x"></i> Video</a></li>
            </ul>
            <!--ul tab-->
            <div class="card-body">
                <div class="tab-content">
                     {{ csrf_field() }}            
                    <div class="tab-pane fade active show" id="tabStatus">
                        <div class="form-group">
                            <label for="" class="title_text">Tiêu đề:</label>
                            <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề ở đây" value="">
                            <em class="text-danger alert_title">Vui lòng nhập tiêu đề</em>
                        </div>
                        <div class="form-group">
                            <label class="title_text">Nội dung:</label>
                            <p class="lead emoji-picker-container">
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" data-id="5a88f64d-c08e-4812-9ccb-bc6ff44c1111" data-type="original-input" style="display: block;"></textarea>

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
                            <em class="text-danger alert_category">Vui lòng chọn danh mục bài viết</em>
                        </div>
                        <div class="form-group">
                            <button class="btn bg-primary-800" type="button" onclick="savePostStatus('#tabStatus')"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</button>
                            <a class="btn bg-warning-700" href="{{ asset('posts/list_posts') }}"><i class="icon-stack mr-2"></i>Danh sách bài viết</a>
                        </div>
                    </div>
                    <!--tab status-->

                  {{--   <div class="tab-pane fade" id="tabCart">
                        <form action="{{ url('posts/postCreateCart') }}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="title_text">Tiêu đề</label>
                            <input required="" type="text" name="selltitle" class="form-control" oninvalid="this.setCustomValidity('Vui lòng nhập tiêu đề')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label class="title_text">Giá</label>
                            <input required="" type="text" name="sellprice" class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57 || event.charCode == 46" oninvalid="this.setCustomValidity('Vui lòng nhập giá')" oninput="setCustomValidity('')">
                            
                        </div>
                        <div class="form-group">
                            <label class="title_text">Vị trí</label>
                            <input required="" type="text" name="selllocation" class="form-control" oninvalid="this.setCustomValidity('Vui lòng nhập vị trí')" oninput="setCustomValidity('')">
                            
                        </div>
                        <div class="form-group">
                            <label class="title_text">Mô tả</label>
                            <textarea required="" name="selldescription" cols="30" rows="5" class="form-control" oninvalid="this.setCustomValidity('Vui lòng nhập mô tả')" oninput="setCustomValidity('')"></textarea>
                            
                        </div>
                        <div class="form-group">
                            <div class="loadImg">
                            </div>
                            <!--loadImg-->
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
							<label  class="title_text">Ảnh:</label>
							<input required="" id="img2" type="file" name="img" class="form-control hidden" onchange="changeImg2(this)">
		                    <img id="avatar2" class="thumbnail" width="300px" src="global_assets/images/new_seo-10-512.png">
						</div>
                        <div class="form-group">
                            <label for="">Thêm bài viết vào danh mục</label>
                            <select name="cate_id" class="form-control" required="" oninvalid="this.setCustomValidity('Vui lòng chọn danh mục bài viết')" oninput="setCustomValidity('')">
                                <option value="">Chọn danh mục</option>
                                 @foreach($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <em class="text-danger alert_category">Vui lòng chọn danh mục bài viết</em>
                        </div>
                        <div class="form-group">
                            <button class="btn bg-primary-800"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</button>
                            <a class="btn bg-warning-700" href="#"><i class="icon-stack mr-2"></i>Danh sách bài viết</a>
                        </div>
                        {{ csrf_field() }}
                        </form>
                    </div> --}}
                    <!--tab cart-->

                    <div class="tab-pane fade" id="tabLink">
                         {{ csrf_field() }}
                        <div class="form-group">
                            <label for="" class="title_text">Tiêu đề:</label>
                            <input required type="text" name="title" class="form-control" placeholder="Nhập tiêu đề ở đây" value="">
                            <em class="text-danger alert_title">Vui lòng nhập tiêu đề</em>
                        </div>
                        <div class="form-group">
                            <label class="title_text">Nội dung:</label>
                            <p class="lead emoji-picker-container">
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" style="display: block;" data-id="d2f93c24-603a-41d7-894e-7a9422050dd6" data-type="original-input"></textarea>
  
                            </p>
                          <em class="text-danger alert_content">Vui lòng nhập nội dung</em>
                        </div>
                        <div class="form-group">
                            <label class="title_text">Link</label>
                            <input type="text" name="link" id="link" class="form-control" {{-- onchange="loadSite(this)" --}}>
                            <em class="text-danger alert_link">Vui lòng nhập link</em>
                        </div>
                        <input type="hidden" name="picture">
                        <input type="hidden" name="name">
                        <input type="hidden" name="caption">
                        <input type="hidden" name="description">
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
                            <button class="btn bg-primary-800" onclick="savePostLink('#tabLink')"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</button>
                            <a class="btn bg-warning-700" href="{{ asset('posts/list_posts') }}"><i class="icon-stack mr-2"></i>Danh sách bài viết</a>
                        </div>
                    </div>
                    <!--tab link-->
 	              
                    <div class="tab-pane fade" id="tabImage">
                        <form  method="post" enctype="multipart/form-data" id="addPostImg" name="addPostImg" class="addPostImg">
                        <div class="form-group">
                            <label for="" class="title_text">Tiêu đề:</label>
                            <input  type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề ở đây" value="">
                             <em class="text-danger alert_title">Vui lòng nhập tiêu đề</em>
                        </div>
                        <div class="form-group">
                            <label for="" class="title_text">Tác giả:</label>
                            <input  type="text" name="tacgia" class="form-control" placeholder="Nhập tác giả ở đây" value="">
                            <em class="text-danger alert_tacgia">Vui lòng nhập tác giả</em>
                        </div>
                        <div class="form-group">
                            <label for="" class="title_text">Miêu tả:</label>
                            <p class="lead emoji-picker-container2">
                           <textarea  name="mieuta" cols="30" rows="5" class="form-control" placeholder="Nhập miêu tả ở đây" data-emojiable="converted" style="display: block;" data-id="17fde7c8-1254-45ba-b352-586293fccc2d" data-type="original-input"></textarea>
                           
                          </p>
                          <em class="text-danger alert_mieuta">Vui lòng nhập miêu tả</em>
                        </div> 
                        <div class="form-group">
                            <label class="title_text">Nội dung:</label>
                            <p class="lead emoji-picker-container">
                                <textarea  name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" style="display: block;" data-id="17fde7c8-1254-45ba-b352-586293fccc2d" data-type="original-input"></textarea>
                             
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
							<input  id="file" type="file" name="file" accept=".png, .jpg, .jpeg, .gif" class="form-control hidden" onchange="changeImg(this)">
		                    <img id="avatar" class="thumbnail" width="300px" src="global_assets/images/new_seo-10-512.png">
						</div>
                        <div class="form-group">
                            <label for="">Thêm bài viết vào danh mục</label>
                            <select  name="cate_id" class="form-control">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <em class="text-danger alert_category">Vui lòng chọn danh mục bài viết</em>
                        </div>
                        <div class="form-group alertmessage">
                            <button class="btn bg-primary-800" id="post" name="post"{{-- onclick="savePostImage('#tabImage')" --}} type="button"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</button>
                            <a class="btn bg-warning-700" href="{{ asset('posts/list_posts') }}"><i class="icon-stack mr-2"></i>Danh sách bài viết</a>

                            <div class="messageBox" style="padding-top: 11px;"></div>
                        </div>
                        {{ csrf_field() }}
                      </form>
                    </div>

                    <!--tab image-->
                    <div class="tab-pane fade" id="tabVideo">
                         <form action="{{-- {{ url('posts/addPostVideo') }} --}}" method="post" enctype="multipart/form-data" id="addPostvideo" name="addPostvideo" class="addPostvideo">
                        <div class="form-group">
                            <label for="" class="title_text">Tiêu đề:</label>
                            <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề ở đây" value="">
                            <em class="text-danger alert_title">Vui lòng nhập tiêu đề</em>
                        </div>
                        <div class="form-group">
                            <label for="" class="title_text">Tác giả:</label>
                            <input  type="text" name="tacgia" class="form-control" placeholder="Nhập tác giả ở đây" value="">
                           <em class="text-danger alert_tacgia">Vui lòng nhập tác giả</em>
                        </div>
                        <div class="form-group">
                            <label for="" class="title_text">Miêu tả:</label>
                            <p class="lead emoji-picker-container3">
                            <textarea  name="mieuta" cols="30" rows="5" class="form-control" placeholder="Nhập miểu tả ở đây" data-emojiable="converted" {{-- style="display: block;" --}} data-id="17fde7c8-1254-45ba-b352-586293fccc2d" data-type="original-input"></textarea>
                            </p>
                           <em class="text-danger alert_mieuta">Vui lòng nhập miêu tả</em>
                        </div>
                        <div class="form-group">
                            <label class="title_text">Nội dung:</label>
                            <p class="lead emoji-picker-container">
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Nhập nội dung ở đây" data-emojiable="converted" style="display:block;" data-id="c7d60962-163c-483b-9dbd-a168d3c53573" data-type="original-input"></textarea>

                            </p>
                            <em class="text-danger alert_content">Vui lòng nhập nội dung</em>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="video" value="">
                        </div>
                        <div class="form-group">
                        	<label class="title_text">Video:</label>
                           <div class="input-group">
							{{-- <input type="text" name="file" class="form-control" id="file" value="" placeholder="Định dạng video (3gp, avi, mov, mp4, mpeg, mpeg4, vob, wmv...etc)."> --}}
							<div class="input-group-btn">
                                <input  id="video" type="file" name="video" class="form-control hidden" onchange="changeVideo(this)">
                                <a id="avatar3" class="btn btn-info" style="color: #FFF">Upload video</a>
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
                            <a class="btn bg-primary-800" type="button" {{-- onclick="savePostVideo('#tabVideo')" --}} id="savepostVideo" name="savepostVideo"><i class="icon-floppy-disk mr-2 icon-1x"></i>Lưu bài viết</a>
                            <a class="btn bg-warning-700" href="{{ asset('posts/list_posts') }}"><i class="icon-stack mr-2"></i>Danh sách bài viết</a>
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
            <ul class="nav nav-tabs nav-tabs-solid border-0" style="background-color: #ff7043">
                <li class="nav-item"><a href="#" class="nav-link" style="color: #FFFF;"> Xem trước bài viết</a></li>
            </ul>
            <!--ul tab-->
            <div class="card-body">
                <div class="postPreview">
                    <div class="post">
                        <div class="previewPoster">
                            <img src="assets/img/zaloUser.jp" style="vertical-align:top;" onerror="this.src = 'http://app2.phanmemninja.com/assets/images/user.jpg'"> 
                            <span class="userFullName">zalo</span>
                            <span class="postPreviewDetails">Now ·zalo</span>
                            <div class="clear"></div>
                        </div>
                        <div class="box-view">
                            <p class="message">
                                <span class="defaultMessage" style="width: 60%"></span>
                                <span class="defaultMessage" style="width: 80%"></span>
                                <span class="defaultMessage" style="width: 40%"></span>
                            </p>
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
<div class="row">
    <div class="col-md-12">
        <div class="alertPost"></div>
    </div>
    <!--alert-->
   
</div>
<div class="modal fade bd-example-modal-sm" id="popupmess" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header" style="border-bottom: 1px solid #cdcdcd;">
            <h4 class="modal-title" id="mySmallModalLabel">Thông báo</h4>
            <button type="button" class="close" data-dismiss="modal" {{-- onclick="reloadpopup()" --}} aria-label="Close">
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

	@stop