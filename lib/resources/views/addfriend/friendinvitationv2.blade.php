@extends('master')
@section('title','Danh mục tài khoản')
@section('main')
			<!-- Content area -->
			<div class="content-wrapper addMargin" style="min-height: 213px;">

<style>
    .btn-save-pageprofilev2{
        font-size: 14px;
            color: #000;
            border-bottom: 1px solid #e0e6ed;
            padding: 8px;
            display: block;
            width: 100%;
    }
   /* sendimg*/
                .preview-images-zone {
            width: 100%;
            border: 1px solid #ddd;
            min-height: 180px;
            /* display: flex; */
            padding: 5px 5px 0px 5px;
            position: relative;
            overflow:auto;
        }
        .preview-images-zone > .preview-image:first-child {
            height: 185px;
            width: 185px;
            position: relative;
            margin-right: 5px;
        }
        .preview-images-zone > .preview-image {
            height: 90px;
            width: 90px;
            position: relative;
            margin-right: 5px;
            float: left;
            margin-bottom: 5px;
        }
        .preview-images-zone > .preview-image > .image-zone {
            width: 100%;
            height: 100%;
        }
        .preview-images-zone > .preview-image > .image-zone > img {
            width: 100%;
            height: 100%;
        }
        .preview-images-zone > .preview-image > .tools-edit-image {
            position: absolute;
            z-index: 100;
            color: #fff;
            bottom: 0;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
            display: none;
        }
        .preview-images-zone > .preview-image > .image-cancel {
            font-size: 18px;
            position: absolute;
            top: 0;
            right: 0;
            font-weight: bold;
            margin-right: 10px;
            cursor: pointer;
            display: none;
            z-index: 100;
        }
        .preview-image:hover > .image-zone {
            cursor: move;
            opacity: .5;
        }
        .preview-image:hover > .tools-edit-image,
        .preview-image:hover > .image-cancel {
            display: block;
        }
        .ui-sortable-helper {
            width: 90px !important;
            height: 90px !important;
        }

        .container {
            padding-top: 50px;
        }
</style>
        <!-- Page header -->
            <div class="page-header">
                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
                        <a href="#" class="breadcrumb-item">Quản lý kết bạn</a>
                        <span class="breadcrumb-item active">Gợi ý kết bạn</span>
                        {{-- <button onclick="acceptfriend()" class="btn btn-bg-danger">submit</button> --}}
                    </div>

                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none">

                </div>
            </div>
            </div>
    <section class="content container-fluid">
        {{ csrf_field() }}
        {{-- <div class="alerts"></div> --}}
        <link href="https://zalo.phanmemninja.com/theme/default/css/mystyle.css" rel="stylesheet" type="text/css">
        <div class="bt-comment" style="display: block;">
            <div class="row">
            <div class="col-md-2 bt-list-fp" style="padding-left:10px;">
                <div class="bt-list-fp-content" style="display: block;">
                    {{ csrf_field() }}
                    <div style="position: relative;float: left;width: 100%;">
                        <input type="text" name="keywords" class="form-control" id="search-stm" onkeyup="searchInboxFanpageProfile(this)" placeholder="Tìm kiếm profiles">
                        <i class="fa fa-search pointer iconsearchfanpageprofile"></i>
                    </div>
                    <a class="bt-title">
                    <span>Tất cả Profile</span>
                    <input type="checkbox" class="selecteallprofiles" style="float: right; margin-right: 10px;" value="">
                    </a>
                    <div class="bt-box-fp">

                        @foreach($account as $row)
                        <div class="bt-item-fp" title="">
                            <label style="width: 100%">

                            <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 20px;height: 20px;" src="{{ $row->image }}">

                            <span @if($row->checkcookie ==1) style="color: red;" @endif> {{ $row->name }}</span>
                            @if($row->checkcookie !=1)

                            <input type="checkbox" class="selectepageprofile checkallprofile" data-type="profile" value="{{ $row->zalo_id }}" data-cookie="{{ $row->cookie }}" data-serectkey="{{ $row->serectkey }}==" data-iduser="{{ $row->user_id }}">

                            @endif

                            </label>
                        </div>
                        @endforeach

                    </div>
                    <a class="btn btn-primary btn-save-pageprofilev2 pull-right custombutton" onclick="selectPageAndaddfriennd(this)">Ok</a>
                </div>
            </div>
            <div class="col-md-10 bt-chat-content">
                <div class="bt-default-mess" style="display: none;">
                    <!-- <img style="margin-top: 25px;height: 250px;" class="img-responsive" src="https://zalo.phanmemninja.com/theme/default/images/addfriend.png"> -->
                    <div class="">Chọn một một tài khoản để lấy gợi ý kết bạn!</div>
                </div>
                <div style="" class="bt-chat-mess">
                    <div class="panel panel-defaut">
                        <div class="panel-body">
                            <div class="form-group">
                                <label style="font-size: 16px; font-weight: 600;" class="col-md-12 loimoiketban">Lời mời kết bạn (0)</label>
                                <button class="btn btn-primary">Đồng ý tất cả</button>
                                <div class="row data-friend" style="height: auto; overflow: auto;"></div>
                            </div>
                            <div class="form-group">
                                <label style="font-size: 16px; font-weight: 600;" class="col-md-12 goiyketban">Gợi ý kết bạn (0)</label>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addallnewfriend">Kết bạn với 50 người một ngày</button>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#sendallsms"><i class="icon-paperplane mr-3 style_icon"></i>Gửi tin nhắn cho tất cả</button>
                                <div class="row data-friendgoiy" style="height: auto; overflow: auto;">
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div id="mediaLibModalImage" class="modal fade" role="dialog" tabindex="-1" data-backdrop="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Media library</h4>
                    </div>
                    <div class="modal-body">
                        <div id="elfinderImage"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="addallnewfriend">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Nội dung kết bạn</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" value="" name="" id="name_friend">
                        <input type="hidden" value="" name="" id="id_friend">
                        <textarea id="content_friendall" style="width: 100%;" placeholder="nhập nội dung ở đây"></textarea>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary addallnewfriendv1" data-dismiss="modal">Kết bạn</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="addnewfriend">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Nội dung kết bạn</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" value="" name="" id="name_friend">
                        <input type="hidden" value="" name="" id="id_friend">
                        <textarea id="content_friend" style="width: 100%;" placeholder="nhập nội dung ở đây"></textarea>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary addnewfriendv1" data-dismiss="modal">Kết bạn</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->
        <div class="modal" id="sendsms">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Nhập nội dung tin nhắn</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" value="" name="" id="name_friend">
                        <input type="hidden" value="" name="" id="id_friend">
                        <textarea id="content_mess" style="width: 100%;" placeholder="nhập nội dung ở đây" rows="8px"></textarea>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary " data-dismiss="modal" onclick="thongbao()">Gửi</button>
                    </div>
                </div>
            </div>
        </div>
         <!-- The Modal -->
        <div class="modal" id="sendallsms">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <!-- Modal Header -->
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Gửi tin nhắn cho tất cả</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" value="" name="" id="name_friend">
                        <input type="hidden" value="" name="" id="id_friend">
                        <textarea id="content_messall" style="width: 100%;" placeholder="Nhập nội dung ở đây..." rows="8px"></textarea>
                    </div>
                    <div class="container">
                        <form id="fileimage" method="POST" action="{{ asset('/uploadimg') }}" enctype="multipart/form-data">
                        <fieldset class="form-group">
                            <i class="icon-cloud-upload mr-2 icon-2x" style="color: #5cabf3;"></i>
                            <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                            <input type="file" id="pro-image" name="file" style="display: none;" class="form-control" multiple>
                        </fieldset>
                        </form>
                        <div class="preview-images-zone">
                            {{-- <div class="preview-image preview-show-1">
                                <div class="image-cancel" data-no="1">x</div>
                                <div class="image-zone"><img id="pro-img-1" src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw=="></div>
                                
                            </div>
                            <div class="preview-image preview-show-2">
                                <div class="image-cancel" data-no="2">x</div>
                                <div class="image-zone"><img id="pro-img-2" src="https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg"></div>
                                
                            </div>
                            <div class="preview-image preview-show-3">
                                <div class="image-cancel" data-no="3">x</div>
                                <div class="image-zone"><img id="pro-img-3" src="http://i.stack.imgur.com/WCveg.jpg"></div>
                                <div class="tools-edit-image"><a href="javascript:void(0)" data-no="3" class="btn btn-light btn-edit-image">edit</a></div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary " data-dismiss="modal" onclick="sendAll()">Gửi</button>
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
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    socket = io('https://sv1.phanmemninja.com');
    function acceptfriend(el,id){
        
        
        $('.selectepageprofile').each(function(i, value){
             if ($(this).is(':checked')) {
                 var id_profile = $(this).val();
                 var cookie = $(this).attr('data-cookie');
                 var serectkey = $(this).attr('data-serectkey');

                 var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_friend":"'+id+'"}';
                 // console.log(data);
                 socket.emit('acceptfriend',data);
             }
         });
         var success = $(el).parents('.bt-load-chat').find('.bt-name-chat').html();
         alertBox('Bạn với '+success+' đã trở thành bạn bè',"success",false,true,true);
         $(el).parents('.colketban').remove();
         count_loimoi--;
         $('.loimoiketban').html('lời mời kết bạn ('+count_loimoi+')');
    }
    //send  ia\mage
            $(document).ready(function() {
            document.getElementById('pro-image').addEventListener('change', readImage, false);
            
            //$( ".preview-images-zone" ).sortable();
            
            $(document).on('click', '.image-cancel', function() {
                let no = $(this).data('no');
                $(".preview-image.preview-show-"+no).remove();
            });
        });



        var num = 4;
        function readImage() {
            if (window.File && window.FileList && window.FileReader) {
                var _token = $('input[name="_token"]').val(); 
                var file = this.files[0];
                var formData = new FormData($('#fileimage')[0]);
                formData.append('_token', _token);
                var totlsize = file.size;

                if (totlsize > 512000) {
                     var html = '<p ><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Hiện tại chúng tôi chỉ cho phép ảnh dưới 0.5MB!!</p>';
                                    $('.contentpoppup').append(html);
                                    $('#popupmess').modal('show');
                    //alertBox('Hiện tại chúng tôi chỉ cho phép ảnh dưới 0.5MB',"danger",false,true,true);
                    return false;
                  }

                var files = event.target.files; //FileList object
                var output = $(".preview-images-zone");

                for (let i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (!file.type.match('image')) continue;
                    
                    var picReader = new FileReader();
                    
                    picReader.addEventListener('load', function (event) {
                        var picFile = event.target;
                        
                        // var html =  '<div class="preview-image preview-show-' + num + '">' +
                        //             '<div class="image-cancel" data-no="' + num + '">x</div>' +
                        //             '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                        //             '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                        //             '</div>';

                         var html =  '<div class="preview-image preview-show-' + num + '">' +
                                    '<div class="image-cancel" data-no="' + num + '">x</div>' +
                                    '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                                    '</div>';

                        output.append(html);
                        num = num + 1;
                    });

                    picReader.readAsDataURL(file);
                }
                console.log(formData);
                $("#pro-image").val('');
                $.ajax({
                  url:"{{ route('uploadimage') }}", 
                  method:"POST", 
                  data:formData,
                  contentType: false,
                  processData: false,
                  beforeSend: function() {
                  },
                  success:function(data){ 
                    console.log(data);

                  }
             });
            } else {
                console.log('Browser not support');
            }
        }
</script>
			<!-- /content area -->
			@stop



