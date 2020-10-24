@extends('master')
@section('title','Tài khoản zalo')
@section('main')
<div class="main">
	<style>
		
		.lstitle {
		    display: block;
		    margin-bottom: 15px;
		    color: #008fe5;
		    font-size: 1.375em;
		    font-weight: 500;
		}
		.carousel-item .lstitle {
		    display: block;
		    margin-bottom: 15px;
		    color: #008fe5;
		    font-size: 1.375em;
		    font-weight: 500;
		}
		.carousel-item img {
		    display: block;
		    max-width: 400px;
		    margin: 0 auto 30px;
		}
		.carousel-item p {
		    color: #535353;
		    font-size: .875em;
		    line-height: 1.5;
		}
		.heading-cwc span.title {
		    display: block;
		    margin-bottom: 15px;
		    color: #191919;
		    font-size: 1.375em;
		    font-weight: 400;
		}
		.heading-cwc p {
		    color: #535353;
		    font-size: .875em;
		    line-height: 1.5;
		}
		.content-wrapper{
			border: 1px solid #cdcdcd;
			border-radius: 10px;
		}
		.btn-save-pagegroup {
		    font-size: 14px;
		    color: #000;
		    border-bottom: 1px solid #e0e6ed;
		    padding: 8px;
		    display: block;
		    width: 100%;
		}
         .hidden {
		    display: none!important;
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
						height: 800px; }

						.example-2 {
						position: relative;
						overflow-y: scroll;
						height: 400px; }

						.bt-inbox-item-text {
					    display: inline-block;
					    margin: 8px 0;
					    border-radius: 20px;
					    font-size: 15px;
					    word-wrap: break-word;
					    background: #e0e6ed /*f1f0f0*/;
					    position: relative;
					    -webkit-box-shadow: 0 1px 0.5px rgba(0,0,0,.13);
					    box-shadow: 0 1px 0.5px rgba(0,0,0,.13);
					    padding: 10px 15px;
					    max-width: 70%;
					}
					.time_date {
					  color: #747474;
					  display: block;
					  font-size: 12px;
					  margin: 8px 0 0;
					}
					.bt-chat-mess .bt-chat-messeges-box .bt-load-inbox>.bt-load-inbox-contentv2 {
				    padding-bottom: 10px;
				    position: absolute;
				    top: 0;
				    left: 0;
				    right: 0;
				    bottom: 0;
				    overflow: auto;
				    overflow-x: hidden;
				}
				.box-content{
					position: relative;
				    overflow: hidden;
				    width: 100%;
				    height: calc(85vh - 215px);
				}
				.thumbnail {
				margin-left: 17px;
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
			.fr-rq-buttons {
			    display: flex;
			    margin-top: 13px;
			}
			.fr-button {
			    border: 1px solid #0068ff;
			    border-radius: 3px;
			    cursor: pointer;
			    color: #0068ff;
			    height: 28px;
			    padding: 0 16px 0 18px;
			    margin: auto 20px auto 0;
			    background: white;
			    text-transform: uppercase;
			}
			.fr-button .fr-btn-content {
			    position: relative;
			    top: 3px;
			    font-size: 14px;
			}
			#listMemberGroup{
				display: block;
			    float: left;
			    width: 100%;
			    max-height: calc(100vh - 180px);
			    overflow: auto;
			}
			.fr-button:hover {
			  background-color: #0068ff;
			  color: white;
			}
			.bt-name-chat{
				margin-top: 7px;
			}
	</style>

<!-- Page header -->
	<div class="page-header">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
	    <div class="d-flex">
	        <div class="breadcrumb">
	            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>
	            <span class="breadcrumb-item active">Danh sách nhóm</span>
	        </div>

	        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
	    </div>

	    <div class="header-elements d-none">
	        
	    </div>
	</div>

	</div>
	{{-- <div class="alert alert-info bg-white alert-styled-left alert-arrow-left alert-dismissible" style="border-color: red !important;">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
		Tính năng đang phát triển ! 
    </div> --}}
	<!-- /page header -->
	{{-- @include('errors.note') --}}
<!-- Form inputs -->
	<div class="content-wrapper addMargin" style="min-height: 486px;">
		{{ csrf_field() }}
					    <section class="content-header">
					       <div class="row">
							    <div class="col-md-12">
							    	<button class="btn  bg-warning" type="button" onclick="dongbozalo()"><i class="icon-cogs mr-3"></i> Đồng bộ zalo</button>
							    	<button class="btn  bg-success" type="button" onclick="addFriendGroup()"><i class="fa fa-user-plus" style="font-size: 17px;"></i> Thêm bạn bè vào nhóm</button>
							        <button class="btn btn-danger" type="button" onclick="sendPostGroup()"><i class="icon-paperplane mr-3 style_icon"></i> Đăng bài lên nhóm</button>
							         <button class="btn btn-warning" type="button" onclick="getMemberGroup()"><i class="icon-search4 mr-2"></i> Quét thành viên trong nhóm</button>
							         {{-- <button class="btn btn-info" type="button" onclick="addNewGroupPhone()"><i class="fa fa-users" aria-hidden="true"></i> Tạo nhóm nhanh bằng List SĐT</button> --}}
							          <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".thamgiaGroupLink"><i class="fa fa-users" aria-hidden="true"></i> Tham gia nhóm theo link chia sẻ</button>
							          @if($userid == 21)
							          {{--  <button class="btn btn-danger" type="button" onclick="addMemberNewGroup()"><i class="icon-paperplane mr-3 style_icon"></i>Kéo thành viên nhóm khác về</button> --}}
							          @endif
							    </div>
				            </div>
					    </section>
					    <section class="content container-fluid" style="border: 1px solid #cdcdcd ">					        {{-- <div class="alerts"></div> thẻ  báo lỗi--}}
					        <link href="assets/css/mystyle.css" rel="stylesheet" type="text/css">
					        <div class="bt-comment" style="display: flex !important;">
					        	<!--đã xóa col-md-2 bt-list-fp-->
					            <div class="bt-list-fp" style="">
					                <div class="bt-list-fp-content" style="display: block;">
					                    <div style="position: relative;float: left;width: 100%;">
					                        <input type="text" name="keywords" class="form-control" id="search-stm" onkeyup="searchInboxFanpageProfile(this)" placeholder="Tìm kiếm tài khoản">
					                        <i class="fa fa-search pointer iconsearchfanpageprofile"></i>
					                    </div>
					                    <a class="bt-title">
					                    <span>Tài khoản zalo</span>
					                    <input type="checkbox" class="selecteallfanpage" style="float: right; margin-right: 10px;" value="">
					                    </a>
					                    <div class="bt-box-fp">
                                              @if($status !=1)

                                               @foreach($account as $row)
                                               @if($row->checkcookie !=1)
					                    		<div class="bt-item-fp" title="">
						                            <label style="width: 100%">
						                            <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 20px;height: 20px;" src="{{ $row->image }}">
						                            <span @if($row->checkcookie ==1) style="color: red;" @endif>{{ $row->name }}</span>
						                            
						                            <input type="checkbox" class="selectepageprofile checkallfanpage" id="check_{{ $row->zalo_id }}" data-urlchat="{{ $row->url_chat }}" data-type="fanpage" data-cookie="{{ $row->cookie }}" data-enk="{{ $row->serectkey }}" value="{{ $row->zalo_id }}" data-avatar="{{ $row->image }}" data-name="{{ $row->name }}" style="display: block;">
						                           
						                            </label>
						                        </div>
						                         @endif
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

                                                                  <input type="checkbox" class="selectepageprofile checkallfanpage" id="check_{{ $row->zalo_id }}" data-urlchat="{{ $row->url_chat }}" data-type="fanpage" data-cookie="{{ $row->cookie }}" data-enk="{{ $row->serectkey }}" value="{{ $row->zalo_id }}" data-avatar="{{ $row->image }}" data-name="{{ $row->name }}" style="display: block;">

                                                                @endif

                                                                </label>
                                                            </div>

                                                        @endif

                                                    @endfor

                                                   

                                                    @endforeach
						                       		                    	                                            
					                         @endif
					                    </div>

					                    <a class="btn btn-primary btn-save-pagegroup pull-right custombutton" onclick="selectGroup(this)" style="color: #FFF;">Ok</a>
					                </div>
					            </div>
					            <div class="col-md-2 bt-fix-co2 listFriend" style="border-right: 1px solid #ccc; background-color: #FFFF;">
					                <div class="bt-icon-fill">
					                    <div class="dropdown bt-fill-page pull-left " title="" data-original-title="Lọc theo tag" style="margin-left: 25px;display: flex;">
					                        <div data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lọc thẻ">
					                        	<span style="font-size: 14px">Danh sách bạn bè</span>
					                            
					                        </div>
					                        <div style="display: none;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Thêm Fanpages &amp; Profiles">
					                            <a href="connect-page"><i class="fa fa-user-plus"></i></a>
					                        </div>
					                    </div>
					                    <div class="bt-key-search" style="width: 85%;">
					                        <input type="text" name="keywords" class="form-control" id="search-stm1" onkeyup="searchFriendProfile(this)" placeholder="Tìm kiếm bạn bè">
					                        <i class="fa fa-search pointer"></i>
					                    </div>
					                    <input type="checkbox" class="selecteallfriend" style="margin-top: 13px;float: right;margin-right: 18px;" value="">
					                    <div class="form-group divfriend" style="display: none"><input type="checkbox" class="checkallfriend"> chọn tất cả</div>
					                </div>
					                <div class="bt-loader" style="display: none;"></div>
					                <div class="card example-1 square scrollbar-dusty-grass square thin">
					                	<div class="card-body bodyFriend" style="padding: 0px !important;">
							                <div class="bt-all-comment" style="display: block;">
							                    
							                </div>
						                </div>
					                </div>
					            </div>

					            <div class="col-md-2 bt-fix-co2 list_group" style="background-color: #FFFF;">
					                <div class="bt-icon-fill">
					                  
					                    <div class="dropdown bt-fill-page pull-left " title="" data-original-title="Lọc theo tag" style="margin-left: 25px;display: flex;">
					                        <div data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Lọc thẻ">
					                        	<span style="font-size: 14px">Danh sách nhóm</span>
					                           
					                        </div>
					                        <div style="display: none;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Thêm nhóm">
					                            <span href="connect-page"><i class="fa fa-user-plus"></i></span>

					                        </div>
					                    </div>
					                    <div class="bt-key-search" style="width: 88%;">
					                        <input type="text" name="keywords" class="form-control" id="search-stm1" onkeyup="searchGroupProfile(this)" placeholder="Tìm kiếm nhóm">
					                        <i class="fa fa-search pointer"></i>
					                    </div>
					                    <input type="checkbox" class="selecteallGroup" style="margin-top: 13px;float: right;margin-right: 0px;" value="">
					                    <div class="form-group divfriend" style="display: none"><input type="checkbox" class="checkallgroup"> chọn tất cả</div>
					                </div>
					                <div class="bt-loader" id="bt-loader" style="display: none;"></div>
					                <div class="bt-all-group card example-1 square scrollbar-dusty-grass square thin" style="display: block;">
					                    
					                </div>
					            </div>

					            <div class="col-md-6 bt-chat-content">
					                <div class="bt-default-mess">
					                    <div class="heading-cwc"><span class="title">Chào mừng đến với <strong>Ninja Zalo </strong></span><p>Khám phá những tiện ích hỗ trợ làm việc và chăm sóc khách hàng được tối ưu hoá cho máy tính của bạn.</p></div>
					                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
											 
											  <div class="carousel-inner">
											    <div class="carousel-item active">
											      <img class="d-block w-100" src="https://stc-oa-chat-adm.zdn.vn/images/chat-widget.jpg" alt="First slide">
											      <span class="lstitle">Thu hút khách hàng tiềm năng</span><p>Cài đặt Chat Widget cho website của bạn để có thể chăm sóc khách hàng tốt hơn</p></a>
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="https://stc-oa-chat-adm.zdn.vn/images/inapp-welcome-screen-01.jpg" alt="Second slide">
											      <span class="lstitle">Trải nghiệm xuyên suốt</span><p>Kết nối và giải quyết công việc trên mọi thiết bị với dữ liệu luôn được đồng bộ</p>
											    </div>
											    <div class="carousel-item">
											      <img class="d-block w-100" src="https://stc-oa-chat-adm.zdn.vn/images/inapp-welcome-screen-04.jpg" alt="Third slide">
											      <span class="lstitle">Giải quyết công việc hiệu quả hơn</span>
											    </div>

											  </div>
											  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
											    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
											    <span class="sr-only">Previous</span>
											  </a>
											  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
											    <span class="carousel-control-next-icon" aria-hidden="true"></span>
											    <span class="sr-only">Next</span>
											  </a>
											</div>
					                </div>
					                <div style="display: none;" class="bt-chat-mess">
					                    <div class="row">
					                        <div class="col-md-12 bt-chat-messeges-box">
					                            <div class="row">
					                                <div class="col-md-12 bt-messeges-top-bar">
					                                    <div class="pull-left">
					                                        <div class="leftTime">
					                                        	<input type="hidden" value="" name="" id="iduser">
					                                        	
					                                        	<input type="hidden" value="" name="" id="idgroup">
					                                        </div>
					                                        <div class="totalPostTime"></div>
					                                    </div>
					                                    <div class="pull-right">
					                                        <a class="bt-popup-box-post" target="_blank" href="#" title="">
					                                        <i class="fa fa-window-restore"></i>
					                                        </a>
					                                        <a class="bt-scroll-top-chat" href="#" title="">
					                                        <i class="fa fa-arrow-circle-up"></i>
					                                        </a>
					                                    </div>
					                                </div>
					                                {{-- <div class="box-content"></div> --}}
					                                <div class="col-md-12 bt-load-inbox">
					                                    <div class="bt-load-inbox-content">
					                                    </div>
					                                </div>
					                                <div class="col-md-12 bt-inbox-reply">
					                                    <div class="repyly-bar row">
					                                        <div class="reply-msg-bar">
					                                            <div class="pick-tag">
					                                                <ul>
					                                                </ul>
					                                                <div class="clear"></div>
					                                            </div>
					                                        </div>
					                                    </div>
					                                    <div class="bt-inbox-reply-content">
					                                        <textarea name="" class="bt-make-input-group" style="display: none;"></textarea>
					                                      
					                                    </div>
					                                    <div class="bt-submit-replyv2">
					                                        <div class="bt-make-file pull-left">
					                                            <div class="bt-submit-reply">
					                                                <div class="bt-make-file pull-left">
					                                                    <i style="color: #BBBBBB" class="bt-open-temp-chat fa fa-commenting-o" aria-hidden="true"></i>
					                                                    <div class="bt-drop-chattemp">
					                                                        <div class="title-drop">
					                                                            <a><span>Tin nhắn mẫu</span></a>
					                                                        </div>
					                                                        <ul class="bt-content-drop">
					                                                            <li bt-content-chat-temp="tmfgkfdhgfdhg" class="bt-get-template-chat">test</li>
					                                                        </ul>
					                                                    </div>
					                                                </div>
					                                                <div class="bt-make-file pull-left {{-- mediaLibraryImage --}}" style="padding-left: 5px;">
					                                                	<form id="fileimage" method="POST" action="{{ url('uploadimg') }}" enctype="multipart/form-data">
					                                                	<input required="" id="sendImgOA" type="file" name="file" accept=".png, .jpg, .jpeg, .gif" class="form-control hidden" onchange="changeSendImgGroup(this)">
					                                                	{{ csrf_field() }}
							                                            </form>
					                                                    <i class="fa fa-image" id="imgOA"></i>
					                                                </div>
					                                              
					                                            </div>
					                                        </div>
					                                        <a class="btn btn-primary pull-right" title="" style="color: #FFF;">Gửi</a>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                        <div class="col-md-5 bt-info-user-inbox" style="display: none;">
					                            <div class="row">
					                                <div class="bt-info-basic">
					                                    <a class="bt-avatar-user" href="#" title="">
					                                    <img src="">
					                                    </a>
					                                    <div class="bt-name-user">
					                                        <p class="bt-first"></p>
					                                        <p class="bt-last"></p>
					                                    </div>
					                                </div>
					                                <div class="bt-info-content bt-hidden-ipnut">
					                                    <div class="bt ">
					                                        <div class="col-md-12">
					                                            <div class="fix-icon">
					                                                <i class="fa fa-user"></i>
					                                            </div>
					                                            <span class="text client_fullname_display"></span>
					                                            <input type="text" value="" name="client_fullname" class="client_fullname form-control">
					                                        </div>
					                                    </div>
					                                    <div class="bt ">
					                                        <div class="col-md-12">
					                                            <div class="fix-icon">
					                                                <i class="fa fa-envelope"></i>
					                                            </div>
					                                            <span class="text client_email_display"></span>
					                                            <input type="text" value="" name="client_email" class="client_email form-control">
					                                        </div>
					                                    </div>
					                                    <div class="bt ">
					                                        <div class="col-md-12">
					                                            <div class="fix-icon">
					                                                <i style="font-size: 20px;" class="fa fa-mobile" aria-hidden="true"></i>
					                                            </div>
					                                            <span class="text client_phone_display"></span>
					                                            <input type="text" value="" name="client_phone" class="client_phone form-control">
					                                        </div>
					                                    </div>
					                                    <div class="bt ">
					                                        <div class="col-md-12">
					                                            <div class="fix-icon">
					                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
					                                            </div>
					                                            <span class="text client_address_display"></span>
					                                            <input type="text" value="" name="client_address" class="client_address form-control">
					                                        </div>
					                                    </div>
					                                    <div class="bt-btn-edit-user col-md-12">
					                                        <span class="bt-edit">
					                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					                                        <span class="suahuy">Sửa</span>
					                                        </span>
					                                        <a class="bt-luu" href="javascript:void(0)" onclick="saveInformationClientInLiveChat(this)">
					                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					                                        <span>Lưu</span>
					                                        </a>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <!-- The Modal -->
					        <div class="modal" id="cauhinhnhantin">
					            <div class="modal-dialog">
					                <div class="modal-content">
					                    <!-- Modal Header -->
					                    <div class="modal-header">
					                        <h4 class="modal-title">Cấu hình tin nhắn</h4>
					                    </div>
					                    <!-- Modal body -->
					                    <div class="modal-body">
					                        <div class="form-group">
					                            <label>Khoảng cách giữa 2 tin nhắn</label>
					                            <select name="defTime" id="defTime" class="form-control">
					                                <option value="60">60 Giây</option>
					                                <option value="70">70 Giây</option>
					                                <option value="80">80 Giây</option>
					                                <option value="90">90 Giây</option>
					                                <option value="100">100 Giây</option>
					                                <option value="110">110 Giây</option>
					                                <option value="120">120 Giây</option>
					                                <option value="130">130 Giây</option>
					                                <option value="160">160 Giây</option>
					                                <option value="190">190 Giây</option>
					                                <option value="220">220 Giây</option>
					                                <option value="250">250 Giây</option>
					                                <option value="280">280 Giây</option>
					                                <option value="310">310 Giây</option>
					                                <option value="340">340 Giây</option>
					                                <option value="390">390 Giây</option>
					                                <option value="450">450 Giây</option>
					                                <option value="510">510 Giây</option>
					                                <option value="570">570 Giây</option>
					                                <option value="630">630 Giây</option>
					                                <option value="690">690 Giây</option>
					                                <option value="750">750 Giây</option>
					                                <option value="810">810 Giây</option>
					                                <option value="870">870 Giây</option>
					                                <option value="930">930 Giây</option>
					                                <option value="990">990 Giây</option>
					                                <option value="1050">1050 Giây</option>
					                                <option value="1110">1110 Giây</option>
					                                <option value="1170">1170 Giây</option>
					                                <option value="1230">1230 Giây</option>
					                                <option value="1290">1290 Giây</option>
					                                <option value="1350">1350 Giây</option>
					                                <option value="1410">1410 Giây</option>
					                                <option value="1470">1470 Giây</option>
					                                <option value="1530">1530 Giây</option>
					                            </select>
					                        </div>
					                    </div>
					                    <!-- Modal footer -->
					                    <div class="modal-footer">
					                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					                        <button type="button" class="btn btn-primary caidat" data-dismiss="modal">cài đặt</button>
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
					    </section>
                 </div>
			
<!-- The Modal -->
        <div class="modal" id="postGroup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title"><i class="icon-paperplane mr-3 style_icon"></i>Đăng bài lên nhóm</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        
                        <textarea id="content_mess" style="width: 100%;" placeholder="Nhập nội dung ở đây" rows="8px" name="contentpost"></textarea>

                    </div>
                    <div class="form-group">
                    	<form method="POST" action="" class="uploadimggroup">
							<label class="title_text" style="margin-left: 16px;">Ảnh:</label>
							<input id="imgsendgroup" type="file" name="file" accept=".png, .jpg, .jpeg, .gif" class="form-control hidden" onchange="changeImgsendgroup(this)">
		                    <img id="avatar" class="thumbnail" width="300px" src="global_assets/images/new_seo-10-512.png">
		                 </form>
						</div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        @if(Auth::user()->id == 21)
                        <a href="{{ asset('group/historySendGroup') }}" class="btn btn-warning" target="_blank">Lịch sử</a>
                        @endif
                        <button type="button" class="btn btn-primary " data-dismiss="modal" onclick="sendGroup()">Gửi</button>
                    </div>
                </div>
            </div>
        </div>			
<!-- END The Modal -->

<!-- Modal -->
<div class="modal fade" id="modalmemberGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Danh sách bạn bè trong nhóm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-header" style="border-bottom: 1px solid rgba(0,0,0,.125);padding-bottom: 8px;">
      	<input type="hidden" value="" name="" id="zaloidGroup">
      	<input type="hidden" value="" name="" id="idGroup">
      	<input type="hidden" value="{{ $userid }}" name="" id="userid">
        <div class="dataTables_length" id="account_length" style="margin: 0 !important;">
			    <label>
			        <span>Page:</span> 
			        <select name="account_length" aria-controls="account" class="" id="show-order" onchange="getDataFriendGrLimit()">
			            <option value="1">1</option>
			            <option value="2">2</option>
			            <option value="3">3</option>
			            <option value="4">4</option>
			            <option value="5">5</option>
			            <option value="6">6</option>
			            <option value="7">7</option>
			            <option value="8">8</option>
			            <option value="9">9</option>
			            <option value="10">10</option>
			        </select>
			    </label>
			</div>
			<input type="checkbox" class="selecteallUserGroup" style="margin-top: 13px;float: right;margin-right: 0px;" value="">

      </div>
      <div id="infoFriendGroup"></div>
      <div class="modal-body" id="listMemberGroup">
       
        {{-- <div bt-type="inbox" data-userid="1104325187204574759" bt-content-chat="" isfr="1" bt-id-fanpage="2340839877247952616" bt-id-profile="" class="bt-load-chat loadFriend 5716029740350556538_2340839877247952616" style=" position: relative;">
        	<div class="row">
        		<div class="col-md-8">
        		<div class="bt-avatar-user-chat">
	        	 <img src="https://s120-ava-talk.zadn.vn/b/1/2/9/3/120/c677a34680b420eedc7a4a35bb3846ca.jpg" style=" position: absolute;"> </div><div class="bt-info-chat">
	        	 	<div class="bt-name-chat" style="margin-top: 18px;">Nguyên Ngoc</div></div>
	        	 	<div class="owl-page"></div> 

	        	</div>
	        	<div class="col-md-4">
	        		<div class="fr-rq-buttons" style="float: right;">
	        		<div class="fr-button"><span class="fr-btn-content" data-translate-inner="STR_CONFIRM_DIALOG_ACCEPT">Kết Bạn</span></div>
	        	  </div>
	        	</div>
        	</div>

       </div> --}}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a href="{{ asset('group/historyAddfriendGroup') }}" class="btn btn-warning" target="_blank">Lịch sử</a>
        <button type="button" class="btn btn-primary addFriendGroup">Kết bạn</button>
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

{{-- Modal phần tạo nhóm list sdt --}}
<!-- The Modal -->
<div class="modal" id="addNewGroup">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header bg-warning">
				<h4 class="modal-title">Tạo nhóm bằng List SĐT</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="alert alert-success thongbao" style="display: none; background-color: #00a65a; color: #FFFF;">

				</div>
				<div class="form-group">
					<label>Tên nhóm:</label>
					<input type="text" class="form-control" placeholder="Tên nhóm" name="nameGroup">
					
				</div>
				<div class="form-group">
					<label>Số điện thoại:</label>
					<textarea class="dataphone" style="width: 100%;height: 200px;" placeholder="Nhập danh sách số điện thoại tại đây."></textarea>
					
				</div>
				<div class="alert alert-danger alert-styled-left alert-dismissible" style="border-color:#e53935;"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="fa fa-undefined-sign" aria-hidden="true"></span>&nbsp;Tính năng đang phát triển. Xin cảm ơn</div>
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
				<button type="button" class="btn btn-primary addNewGroupZalo">Tạo nhóm</button>
				
			</div>
		</div>
	</div>
</div>

{{-- tham gia nhóm theo link --}}
<div class="modal fade thamgiaGroupLink" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    	<div class="modal-header" style="border-bottom: 1px solid #cdcdcd;">
        <h4 class="modal-title" id="mySmallModalLabel">Tham gia nhóm theo link</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
       <div class="modal-body">
       	   <div class="container-fluid" id="contentMess">
              <div class="row">
              	 <div class="col-md-4">
              	 	<div class="form-group">
						<label>Nhập link tham gia nhóm:</label>
						<textarea class="dataLinks" style="width: 100%;height: 200px;" placeholder="https://zalo.me/g/idGroup https://zalo.me/g/idGroup"></textarea>
						<span style="color: red;font-size: 12px;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Nhấn Shift + Enter: để xuống dòng</span>
					
				    </div>
              	 </div>
                 <div class="col-md-4 ml-auto">
                 	<div class="form-group">
                 		<label>Tài khoản zalo:</label>
                 		<div class="card example-2 square scrollbar-dusty-grass square thin">
						    <div class="card-body bodyFriend" style="padding: 0px !important;">
						        <div class="bt-all-comment2" style="display: block;">
						        	@if($status != 1)
	                                   @foreach($account as $row)
	                                         @if($row->checkcookie !=1)
									            <div bt-type="inbox" data-userid="8156121327915152395" bt-content-chat="" isfr="1" bt-id-fanpage="2340839877247952616" bt-id-profile="" class="bt-load-chat loadFriend 5716029740350556538_2340839877247952616" style=" position: relative;">
									                <input type="checkbox" class="selectepageZaloGroup checkallZaloGroup" data-type="fanpage" value="{{ $row->zalo_id }}" style="display: block; float:right;">
									                <div class="bt-avatar-user-chat">
									                    <img src="{{ $row->image }}" style=" position: absolute;"> 
									                </div>
									                <div class="bt-info-chat">
									                    <div class="bt-name-chat">{{ $row->name }}</div>
									                </div>
									                <div class="owl-page"></div>
									                <div class="owl-tag pull-right wrap-color">
									                    <div class="tags-cons">
									                        <ul> 
									                        </ul>
									                    </div>
									                </div>
									            </div>
	                                    @endif
	                                   @endforeach
	                                @else
	                                 @foreach($account as $row)
	                                  @if($row->checkcookie !=1)
	                                     @foreach($role_profile as $value)
	                                       @if($value == $row->zalo_id)
	                                          <div bt-type="inbox" data-userid="8156121327915152395" bt-content-chat="" isfr="1" bt-id-fanpage="2340839877247952616" bt-id-profile="" class="bt-load-chat loadFriend 5716029740350556538_2340839877247952616" style=" position: relative;">
									                <input type="checkbox" class="selectepageZaloGroup checkallZaloGroup" data-type="fanpage" value="{{ $row->zalo_id }}" style="display: block; float:right;">
									                <div class="bt-avatar-user-chat">
									                    <img src="{{ $row->image }}" style=" position: absolute;"> 
									                </div>
									                <div class="bt-info-chat">
									                    <div class="bt-name-chat">{{ $row->name }}</div>
									                </div>
									                <div class="owl-page"></div>
									                <div class="owl-tag pull-right wrap-color">
									                    <div class="tags-cons">
									                        <ul> 
									                        </ul>
									                    </div>
									                </div>
									            </div>
	                                       @endif
	                                     @endforeach
	                                  @endif
	                                 @endforeach
	                                  {{--  endif Status --}}
                                   @endif
						        </div>
						    </div>
						</div>
                 	</div>
                 </div>
              </div>
          </div>
         
         <!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
				 <a href="{{ asset('group\historyJoinGroupByLink') }}" class="btn btn-warning" target="_blank">Lịch sử</a>
				<button type="button" class="btn btn-primary addGroupLinkv2">Tham gia nhóm</button>
				
			</div>

       </div>
    </div>
  </div>
</div>

   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
   <script type="text/javascript">
          socket = io('https://sv1.phanmemninja.com');
    var options = {iv:CryptoJS.enc.Hex.parse("00000000000000000000000000000000"), mode: CryptoJS.mode.CBC, padding: CryptoJS.pad.Pkcs7 }; 
    var arr_select = new Array();

    $(".selecteallUserGroup").click(function(){
		$('.checkallUserGroup').not(this).prop('checked', this.checked);
	});
     
      $(".addFriendGroup").click(function(){
      	var arr = new Array();
      	var check = 0;
      	var k = 0;
      	 var zaloId = $('#zaloidGroup').val();
      	 var idGroup = $('#idGroup').val();
      	var env = $('#check_'+zaloId).data('enk');
        var cookie = $('#check_'+zaloId).data('cookie');
         $('.selectepageUserGroup').each(function(i, value){
         	if ($(value).is(':checked')) {
             arr.push($(value).val());
             check = 1;
            }
         });
        if(check == 0){
                
		     var html = '<div class="alert alert-danger alert-styled-left alert-dismissible" style="border-color:#e53935;"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="fa fa-undefined-sign" aria-hidden="true"></span>&nbsp;Vui lòng chọn members trong nhóm để kết bạn.</div>';
				 $('#infoFriendGroup').append(html);
				
				return false;
		 }

         $('.loader-zalo').show();
         var html = 'Đang chạy kết bạn. Tiến độ: <span id="countSend"  style="color: red;"></span>/<span>'+arr.length+'</span>';
		 $(".contentloader").html(html);
         for (var i = 0; i < arr.length; i++) {
         	setTimeout( function timer(){
               var name   = $('#listMemberGroup .check_'+arr[k]).data('name');
               var avatar = $('#listMemberGroup .check_'+arr[k]).data('avatar');
               param = '{"fid": "'+arr[k]+'","cookie":"'+cookie+'","env":"'+env+'","idGroup":"'+idGroup+'","content":"Xin chào, kết bạn với mình nhé :3","name":"'+name+'","avatar":"'+avatar+'"}';
               //console.log(param);
               //var srcParams  = '{"groupid":"1695223612898922902"}';
               //var param = '{"toid": "3434985017902744763","msg":"Xin chào, tôi là 佐助","reqsrc": 21,"srcParams":"'+srcParams+'"}';
               //var param ='{toid: "3434985017902744763", msg: "Xin chào, tôi là 佐助", reqsrc: 21, srcParams: "{"groupid":"1695223612898922902"}"}';
              socket.emit('addFriendGroup',param);
              //console.log(param);
              k++;
              var html2 = '<span>'+k+'</span>';
              $('#countSend').html(html2);
              if(k == arr.length){
              	$('#modalmemberGroup').modal('hide');
              	$('.loader-zalo').hide();
              	$("p").remove(".contentmess");
    		     var html3 = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Kết bạn hoàn thành.</p>';
				 $('.contentpoppup').html(html3);
				 $('#popupmess').modal('show');
              }
         	}, i*30000 );
         }
      });
     
       $(".addGroupLinkv2").click(function(){
       	   var links_array = [];
       	   var arr = new Array();
       	   var check = 0;
           var links  = $('.dataLinks').val().trim();
		   var linkv2 = links.replace(/(\r\n|\n|\r)/gm,";");
		   var links_array = linkv2.split(";");
           var _token = $('input[name="_token"]').val();

             $('.selectepageZaloGroup').each(function(i, value){
	             if ($(value).is(':checked')) {
						check = 1;
						arr.push($(value).val());
					}
	         });
	         if(check == 0){
                
    		     var html = '<div class="alert alert-danger alert-styled-left alert-dismissible" style="border-color:#e53935;"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="fa fa-undefined-sign" aria-hidden="true"></span>&nbsp;Vui lòng chọn tài khoản zalo muốn tham gia nhóm.</div>';
					 $('#contentMess').append(html);
					
					return false;
	         }
	         	$.ajax({
                        url: '{{ url("group/convertArrLink") }}',
                        dataType: 'json',
                        type: 'post',
                        contentType: 'application/x-www-form-urlencoded',
                        data: {_token:_token, arr:arr, links_array:links_array},
                        success: function( data, textStatus, jQxhr ){ 
                              if(data.status == 200){
                              	var k = 0;
                              	 $('.loader-zalo').show();
			            		var html = 'Đang chạy tham gia nhóm...'; 
			            		$(".contentloader").html(html);
                                 for (var i = 0; i < data.data.length; i++) {
                                 	setTimeout( function timer(){
                                       var serectkey = $('#check_'+data.data[k].zaloid).data('enk');
                                       var cookie = $('#check_'+data.data[k].zaloid).data('cookie');
                                       param = '{"zaloid": "'+data.data[k].zaloid+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","link":"'+data.data[k].link+'"}';
                                       // console.log(param);
                                       socket.emit('sendAddLinkGroup',param);
                                       k++;
                                       if(k == data.data.length){
	                                       	$('.loader-zalo').hide();
                                    	    $("p").remove(".contentmess");
						    		        var html3 = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Tham gia nhóm hoàn thành.</p>';
											$('.contentpoppup').html(html3);
											$('.thamgiaGroupLink').modal('hide');
											$('#popupmess').modal('show');
                                       }
                                 	}, i*10000 );
                                 }
                              }
                        },
                        error: function( jqXhr, textStatus, errorThrown ){
                        },
                        complete: function(data, textStatus, jQxhr){
                           
                        }
                    });



	       

       });



    function sendPostGroup(){
    	
				var check_profile = 0;

    	$('.selectepagegroup').each(function(i, value){
					if ($(value).is(':checked')) {
						check_profile = 1;
						arr_select.push($(value).val());
					}
				});
    	
    	if (check_profile == 0) {
    		$("p").remove(".contentmess");
    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn nhóm, trước khi đăng bài!</p>';
					 $('.contentpoppup').append(html);
					$('#popupmess').modal('show');
					return false;
				}

    	$('#postGroup').modal('show');

    }
    function sendGroup(){
    	var _token = $('input[name="_token"]').val();
    	var user = JSON.stringify(arr_select);
		var content = $('textarea[name="contentpost"]').val();
		content = content.replace(/(?:\r\n|\r|\n)/g, '\\n');
		   $('.loader-zalo').show();     
				var data ={};
				
				$('.selectepagegroup').each(function(i, value){

					if ($(value).is(':checked')) {
                         arr_select.push($(value).val());
                        let datacheck = arr_select.filter((v,i) => arr_select.indexOf(v) === i);
						// setTimeout( function timer(){
						// 		    var a = $(value).data('userid');
				  //                   var cookie = $("#check_"+a).data('cookie');
				  //                   var serectkey = $("#check_"+a).data('enk');
				  //                  var param = '{"message": "'+content+'", "clientId": 1591243111297, "visibility": 0, "grid": "'+$(value).val()+'","cookie":"'+cookie+'", "serectkey":"'+serectkey+'"}';
				  //                  console.log(param);
				  //                  socket.emit('sendGroup',param);
				  //                  k++;
				                   
				  //                 if(datacheck.length == k){
				  //                 	$('.loader-zalo').hide();
				  //                 	$("p").remove(".contentmess");
					 //    		     var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Đăng bài lên nhóm thành công!</p>';
						// 				 $('.contentpoppup').append(html);
						// 				$('#popupmess').modal('show');
				                  	
				  //                 }
				                   	
				                  
						// 	    }, i*5000 );


						
                       
						check_profile = 1;
						

					}
				});

                 if(imgsendgroup != ''){
                 	var height = 0;
                 	var width = 0;
                 	var img = new Image();
                 	img.src = imgsendgroup;
						img.onload = function(){
						   height = img.height;
						   width = img.width;
						
						  
						}

							//console.log(height);
				            var sizeimage = getImageSizeInBytes(imgsendgroup);
	                        var url_arr = imgsendgroup.split("/");
	                        var filename  = url_arr[url_arr.length-1];
	                        //var width = 0;
	                        //var height = 0;
                             //console.log(sizeimage);
                            var time = new Date().getTime();
                     

				}

                 var k = 0;
				let datacheck = arr_select.filter((v,i) => arr_select.indexOf(v) === i);
                for (var i = 0; i < datacheck.length; i++) {
                	setTimeout( function timer(){
								    var a = $('.check_'+datacheck[k]).data('userid');
				                    var cookie = $("#check_"+a).data('cookie');
				                    var serectkey = $("#check_"+a).data('enk');
				                   var param = '{"message": "'+content+'", "clientId": 1591243111297, "visibility": 0, "grid": "'+datacheck[k]+'","cookie":"'+cookie+'", "serectkey":"'+serectkey+'"}';
				                   //console.log(param);
				                   socket.emit('sendGroup',param);
				                   k++;
				                   
				                  if(datacheck.length == k){
				                  	$('.loader-zalo').hide();
				                  	$("p").remove(".contentmess");
					    		     var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color:#00a65a"></i>Đăng bài lên nhóm thành công: <span style="color: red;">'+k+'/'+datacheck.length+'</span>!</p>';
										 $('.contentpoppup').append(html);
										$('#popupmess').modal('show');
				                  	
				                  }
				                   	
				                  
							    }, i*60000 );
                     var j = 0;
                	setTimeout( function timer(){
                		            var a = $('.check_'+datacheck[j]).data('userid');
                		            var cookie = $("#check_"+a).data('cookie');
				                    var serectkey = $("#check_"+a).data('enk');
							    	var idsend = datacheck[j];
							    	var time = new Date().getTime();
                                    var params = '{"totalChunk":1,"fileName":"'+filename+'","clientId":'+time+',"totalSize":'+sizeimage+',"toid":"'+datacheck[j]+'","chunkId":1}';
                                       console.log(params);
							  			 var encrypted = CryptoJS.AES.encrypt(params, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
                                       
							  			 var datasend  = '{"filename":"'+filename+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","url_image":"'+imgchiendich+'","encrypted:"'+encrypted+'"}';
							  			 var dataarr = {};
				                         dataarr['filename'] = filename;
				                         dataarr['cookie']  = cookie;
				                         dataarr['serectkey'] = serectkey;
				                         dataarr['url_image'] = imgsendgroup;
				                         dataarr['encrypted'] = encrypted;
				                         dataarr['_token']  = _token;
				                         dataarr['idto']  = idsend;
                                        
				                       	$.ajax({
				                            url: '{{ url("chat/postimagegourp") }}',
				                            dataType: 'json',
				                            type: 'post',
				                            contentType: 'application/x-www-form-urlencoded',
				                            data: dataarr,
				                            success: function( data, textStatus, jQxhr ){ 
				                            	    
				                            	
				                                     var content_c ='';
				                                     var datav2 = JSON.parse(data.data);;
				                                     
					                                var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(datav2.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
					                                var result =  JSON.parse(decrypted);
                       
					                             
					                               sendimagegroupv2(result.data.photoId,content_c,data.idsend,result.data.normalUrl,result.data.thumbUrl,result.data.normalUrl,result.data.hdUrl,cookie,serectkey,a,width,height);
					                               
				                            	
				                               
				                            },
				                            error: function( jqXhr, textStatus, errorThrown ){
				                            },
				                            complete: function(data, textStatus, jQxhr){
				                               
				                            }
				                        });

				                        j++;
							     }, i*60000 );

                }
				   // var data = '{"cookie":"zpw_sek=LGRB.291263581.a0.AIxFeDcYXFI4zjZb-AA4zAA0uP_xcAQ2d9lsXO3EuBs3mEo-W-xmlBN7pgMkdxdMfCLc3CSKsapRemplClndm0","serectkey":"vE9rqYldIZbhJZLtHleJQw==","urlchat":"https://p4-msg-chat.zalo.me","id_profile":"380295570761780131"}';
				   // socket.emit('messprofile',data);
    }

    function addFriendGroup(){
    	var check_profile = 0;
    	var check_group = 0;
    	var arr_select = [];
    	var groupId = '';
    	var arr_group = new Array();
    	$('.selectepagefriend').each(function(i, value){
           if ($(value).is(':checked')) {
           	     check_profile = 1;

           	     arr_select.push($(value).val());

               }
    	});

    	$('.selectepagegroup').each(function(i, value){
           if ($(value).is(':checked')) {
                  
           	     check_group = 1;
           	     arr_group.push($(value).val());
           	     
           	     	    var userid= $(value).data('userid');
           	     	    //console.log(userid);
	    	 		    var cookie = $("#check_"+userid).data('cookie');
    	                var enk  =$("#check_"+userid).data('enk');
		                var param = '{"cookie":"'+cookie+'","serectkey":"'+enk+'","id_profile":"'+userid+'","idto":"'+$(value).val()+'","groupnember":'+JSON.stringify(arr_select)+'}';
		               
		              socket.emit('nemberjoingroup',param);
		    	 	
                  
               }
    	});

    	 // for (var i = 0; i < arr_group.length; i++) {
    	 // 	for (var k = 0; k < arr_select.length; k++){
    	 		
      //           var param = '{"cookie":"'+cookie+'","serectkey":"'+enk+'","id_profile":"'+arr_select[k]+'","idto":"'+arr_group[i]+'","groupnember":'+JSON.stringify(arr_select)+'}';
      //           console.log(param);
      //         //socket.emit('nemberjoingroup',param);
    	 // 	}
    	 // }
    	

    	if (check_profile == 0) {
    		   $("p").remove(".contentmess");
    		         var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn nhóm và bạn bè mà bạn muốn thêm!!</p>';
					 $('.contentpoppup').append(html);
					$('#popupmess').modal('show');
					return false;
				}
		if (check_group == 0) {
		   $("p").remove(".contentmess");
		         var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn nhóm và bạn bè mà bạn muốn thêm!!</p>';
				 $('.contentpoppup').append(html);
				$('#popupmess').modal('show');
				return false;
		}

    }

function searchroledatabt(ob) {
			var value = $(ob).val().toLowerCase();
			$(ob).next('select').find('option').filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
			});
		}

		function dongbozalo(){
			$('.loader-zalo').show(); 
			var check_profile = 0;
			var arr_select = new Array();
			$('.selectepageprofile').each(function(i, value){
					if ($(value).is(':checked')) {
						check_profile = 1;
						arr_select.push($(value).val());
					}
				});
			if (check_profile == 0) {
					$("p").remove(".contentmess");
    		         var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn tài khoản zalo để đồng bộ!!</p>';
					 $('.contentpoppup').html(html);
					$('#popupmess').modal('show');
					return false;
				}
               var k = 0;
				for (var i = 0; i < arr_select.length ; i++) {
					setTimeout( function timer(){  
						var cookie =  $('#check_'+arr_select[k]).data('cookie');
						var serectkey =  $('#check_'+arr_select[k]).data('enk');
						var urlchat =  $('#check_'+arr_select[k]).data('urlchat');
						var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","urlchat":"'+urlchat+'","id_profile":"'+arr_select[k]+'"}'; 
						socket.emit('getfriendnew',data);
						socket.emit('listGroupzalo',data);
						k++;
						if(k == arr_select.length){
							$('.loader-zalo').hide(); 
							$("p").remove(".contentmess");
		    		         var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: #00a65a;"></i>Đồng bộ thành công: <span style="color:red;">'+k+'/'+arr_select.length+'</span>.</p>';
							 $('.contentpoppup').html(html);
							$('#popupmess').modal('show');
						}
					}, i*5000 );
					
				}
		}

		 function sendimagegroupv2(photoId,desc,toid,rawUrl,thumbUrl,normalUrl,hdUrl,cookie,serectkey,id_profile,width,height){
          try{
            var time = new Date().getTime();
           
            var param = '{"photoId":"'+photoId+'","clientId":'+time+',"width":'+width+',"height":'+height+',"grid":"'+toid+'","rawUrl":"'+rawUrl+'","thumbUrl":"'+thumbUrl+'","oriUrl":"'+normalUrl+'","hdUrl":"'+hdUrl+'","desc":"","zsource":301}';
            console.log(param);
             var _token = $('input[name="_token"]').val(); 
            var encrypted = CryptoJS.AES.encrypt(param, CryptoJS.enc.Base64.parse(serectkey),options).ciphertext.toString(CryptoJS.enc.Base64);
            
            var params = {};
            params['encrypted'] = encrypted;
            params['cookie'] = cookie;
            params['_token'] = _token;
              // console.log(params);
            $.ajax({
                url: '{{ url("chat/sendimggroup") }}',
                dataType: 'json',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: {encrypted:encrypted,cookie:cookie, _token:_token},
                success: function( data, textStatus, jQxhr ){

                    var decrypted = CryptoJS.AES.decrypt({ciphertext:CryptoJS.enc.Base64.parse(data.data),salt: ""}, CryptoJS.enc.Base64.parse(serectkey),options).toString(CryptoJS.enc.Utf8);
                     
                    var result =  JSON.parse(decrypted);
                    //console.log(result);

                },
                error: function( jqXhr, textStatus, errorThrown ){ 
                },
                complete: function() {
                }
            });
          } catch(e){
            console.log(e);
          }
    }

    function getMemberGroup(){
    	  var check_profile = 0;
          var zaloId = $('.selectepagegroup').data('userid');
          var serectkey = $('#check_'+zaloId).data('enk');
          var cookie = $('#check_'+zaloId).data('cookie');
          var idGroup = $('.selectepagegroup').val();
        
          
          var _token = $('input[name="_token"]').val();
	    	$('.selectepagegroup').each(function(i, value){
						if ($(value).is(':checked')) {
							check_profile = 1;
							groupId = $(value).val();
						}
					});
	    	 var zalo_id = $(".check_"+groupId).data('userid');
          
	    	if (check_profile == 0) {
	    		$("p").remove(".contentmess");
	    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn 1 nhóm để quét!</p>';
						 $('.contentpoppup').html(html);
						$('#popupmess').modal('show');
						return false;
					}

           $('#modalmemberGroup').modal('show');
            var param = '{"groupId":"'+groupId+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","page":"1","zaloId":"'+zaloId+'","idGroup":"'+idGroup+'"}';
            console.log(param);
            socket.emit('getMemberGroup',param);
            // note phần này đang chạy , api thay đổi nên chuyển sử lý lên server nodejs
            //   $.ajax({
            //     url: '{{ url("group/getMemberGroup") }}',
            //     dataType: 'json',
            //     type: 'post',
            //     contentType: 'application/x-www-form-urlencoded',
            //     data: {groupId:groupId, zalo_id:zalo_id, _token:_token},
            //     success: function( data, textStatus, jQxhr ){
            //        var html = '';
            //        console.log(data.data);
            //         var arr = data.data.groups;
            //         $(arr).each(function(i, value){
                         
            //         	 if(value.groupId == groupId){
            //                  $(value.topMember).each(function(k, valuek){
            //                      console.log(valuek);
            //                       html += '<div class="row">';
            //                       html += '<div class="col-md-8">';
            //                       html += '<div class="bt-avatar-user-chat">';
            //                       html += '<img src="'+valuek.avatar+'" style=" position: absolute;"> </div><div class="bt-info-chat">';
            //                       html += '<div class="bt-name-chat" style="margin-top: 18px;">'+valuek.zaloName+'</div></div>';
            //                       html += '<div class="owl-page"></div> ';
            //                       html += '</div>';
            //                       html += '<div class="col-md-4">';
            //                       html += '<div class="fr-rq-buttons" style="float: right;">';
            //                       html += '<div class="fr-button inforMemberGroup_'+valuek.id+'" data-memberId="'+valuek.id+'" data-groupId="'+value.groupId+'" onclick="addFriendMemberGroup('+valuek.id+')"><span class="fr-btn-content" data-translate-inner="STR_CONFIRM_DIALOG_ACCEPT">Kết Bạn</span></div>';
            //                       html += '</div>';
            //                       html += '</div>';
            //                       html += '</div>';
            //                       $('#listMemberGroup').html(html);
            //                  });
            //         	 }
            //         });

            //     },
            //     error: function( jqXhr, textStatus, errorThrown ){ 
            //     },
            //     complete: function() {
               
            //     }
            // });

         }

         function getDataFriendGrLimit(){
         	 var page = $('#show-order').val();
         	 var zaloId = $('.selectepagegroup').data('userid');
	          var serectkey = $('#check_'+zaloId).data('enk');
	          var cookie = $('#check_'+zaloId).data('cookie');
	          
	          var _token = $('input[name="_token"]').val();
		    	$('.selectepagegroup').each(function(i, value){
							if ($(value).is(':checked')) {
								check_profile = 1;
								groupId = $(value).val();
							}
						});
		    	 var zalo_id = $(".check_"+groupId).data('userid');


	           $('#modalmemberGroup').modal('show');
	            var param = '{"groupId":"'+groupId+'","cookie":"'+cookie+'","serectkey":"'+serectkey+'","page":"'+page+'"}';
	            socket.emit('getMemberGroup',param);

         }


         function addNewGroupPhone(){
         	
         	var check = 0;
         	$('.checkallfanpage').each(function(i, value){
					if ($(value).is(':checked')) {
						check = 1;
						
					}
				});
         	if(check != 1){
                 $("p").remove(".contentmess");
	    		     var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>Vui lòng chọn 1 tài khoản zalo</p>';
						 $('.contentpoppup').html(html);
						$('#popupmess').modal('show');
						return false;
         	}
         	$('#addNewGroup').modal('show');
         }

         $('.locsodtGroup').click(function(){
               var _token = $('input[name="_token"]').val();
		  		count = 0;
		  		phonelist = [];
		  		var groups = []; // List of selected groups
		  		var params = {};
		  		var check = 0;
		  		var zaloid = '';
                 $('.selectepageprofile').each(function(i, value){
					if ($(value).is(':checked')) {
						zaloid = $(value).val();
						
					}
				});
                 console.log($('.dataphone').val());
				if($('.dataphone').val() == ''){
					alertBox('Vui lòng nhập danh sách số điện thoại',"danger",false,true,true);

					return false;
				}
				$('.loader-zalo').show();
				
				params['listphone'] = $('.dataphone').val().trim();
				var phone = params['listphone'].replace(/(\r\n|\n|\r)/gm,";");
    			var phone_array = phone.split(";");
    			phonestart = phone.split(";");
				//console.log(phonestart.length);
    	
    	        var phoneArray = [];
    			
						      for (var i = 0; i <phone_array.length; i++) {
						        
							      number = phone_array[i].slice(0, 2);

							      //console.log(params['listphone'][i]);
							      if(number == '84'){
							      	var phoneVal = phone_array[i].replace(phone_array[i].slice(0, 2), "0");
							      	phoneArray.push(phoneVal);
							      	
							      }else{
							      	phoneArray.push(phone_array[i]);
							      }
							      params['listphone'] = phoneArray;
							      
						      }
    			for (var i = 0; i < 1; i++) {
					params['id_profile'] = zaloid
					params['_token'] = _token;

					var id_profile = $('.checkloadcampselect').val();

					$.ajax({
						url: '{{ url("addfriend/checkphone") }}',
						dataType: 'json',
						type: 'post',
						contentType: 'application/x-www-form-urlencoded',
						data: {_token:_token, phoneArray:phoneArray, zaloid:zaloid},
						success: function( data, textStatus, jQxhr ){
							var cookie = data.cookie;
							var emei  = data.emei;
							var id_profile = data.id_profile;
							var id_user = data.id_user;
							var noidung = data.noidung;
							var serectkey = data.serectkey;

							var phone = data.listphone.replace(/(\r\n|\n|\r)/gm,";");
                            var phone_array = phone.split(";");
                            var a = 0;
                   
							 socket.emit('checklistphone',data);

							
						},
						error: function( jqXhr, textStatus, errorThrown ){ 
						},
						complete: function(){
							
						
						}
					});
				}
    			
		  	});
            
            function addMemberNewGroup(){
            	var zaloid = "";
            	 $('.selectepageprofile').each(function(i, value){
                	if ($(value).is(':checked')) {
		              zaloid = $(value).val();
		            }
		         });

                var memberTypes = [];
                var members     = [];
                var cookie      =  $('#check_'+zaloid).data('cookie');
                var env         =  $('#check_'+zaloid).data('enk');
                $('.selectepageUserGroup').each(function(i, value){
                	if ($(value).is(':checked')) {
		              members.push($(value).val());
		            }
		         });
                for (var i = 0; i < members.length; i++) {
                	memberTypes.push(-1);
                }
                var param = '{"clientId":"1600833885634","createLink": 1,"gdesc":"","gname":"Nhóm mới","memberTypes":'+JSON.stringify(memberTypes)+',"members":'+JSON.stringify(members)+',"nameChanged": 1,"zsource": 601,"cookie":"'+cookie+'","env":"'+env+'"}';
                var data = JSON.parse(param);
                console.log(data);

            }


    

   	  			
   </script>
	
				@stop
