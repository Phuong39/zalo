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
        </style>
        <!-- Page header -->
            <div class="page-header">
                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
                        <span class="breadcrumb-item active">Quản lý kết bạn</span>
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
                         @if($status !=1)
                        @foreach($account as $row)
                        <div class="bt-item-fp" title="">
                            <label style="width: 100%">

                            <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 20px;height: 20px;" src="{{ $row->image }}">

                            <span @if($row->checkcookie ==1) style="color: red;" @endif> {{ $row->name }}</span>
                            @if($row->checkcookie !=1)

                            <input type="checkbox" class="selectepageprofile checkallprofile" data-type="profile" value="{{ $row->zalo_id }}" data-cookie="{{ $row->cookie }}" data-serectkey="{{ $row->serectkey }}" data-iduser="{{ $row->user_id }}">

                            @endif

                            </label>
                        </div>
                        @endforeach
                        @else
                         @foreach($account as $row)

                                                     @for ($i = 0; $i < count($role_profile); $i++)

                                                        @if($role_profile[$i] == $row->zalo_id)

                                                              <div class="bt-item-fp" title="">
                                                                <label style="width: 100%">

                                                                <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 20px;height: 20px;" src="{{ $row->image }}">

                                                                <span @if($row->checkcookie ==1) style="color: red;" @endif> {{ $row->name }}</span>
                                                                @if($row->checkcookie !=1)

                                                                <input type="checkbox" class="selectepageprofile checkallprofile" data-type="profile" value="{{ $row->zalo_id }}" data-cookie="{{ $row->cookie }}" data-serectkey="{{ $row->serectkey }}" data-iduser="{{ $row->user_id }}">

                                                                @endif

                                                                </label>
                                                            </div>

                                                        @endif

                                                    @endfor

                                                   

                                                    @endforeach
                        @endif

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
                                <button class="btn btn-primary addfriendAll">Đồng ý tất cả</button>
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
                        <h4 class="modal-title">Nhập nội dung tin nhắn</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="hidden" value="" name="" id="name_friend">
                        <input type="hidden" value="" name="" id="id_friend">
                        <textarea id="content_messall" style="width: 100%;" placeholder="nhập nội dung ở đây" rows="8px"></textarea>
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
                     
                </div> 
            </div>
          </div>
        </div>
        <!--Modal thong bao <-->
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script type="text/javascript">
    socket = io('https://sv1.phanmemninja.com');
    function acceptfriend(el,id){
        
        
        $('.selectepageprofile').each(function(i, value){
             if ($(this).is(':checked')) {
                 var id_profile = $(this).val();
                 var cookie = $(this).attr('data-cookie');
                 var serectkey = $(this).attr('data-serectkey');

                 var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_friend":"'+id+'"}';
                 console.log(data);
                 socket.emit('acceptfriendv2',data);
             }
         });
         var success = $(el).parents('.bt-load-chat').find('.bt-name-chat').html();
         alertBox('Bạn với '+success+' đã trở thành bạn bè',"success",false,true,true);
         $(el).parents('.colketban').remove();
         count_loimoi--;
         $('.loimoiketban').html('lời mời kết bạn ('+count_loimoi+')');
    }

     $(".addfriendAll").click(function(){
        console.log("sadasd");
         $('.dongy').trigger('click');

      }); 
</script>
			<!-- /content area -->
			@stop



