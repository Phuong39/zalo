@extends('master')

@section('title','Tài khoản zalo')

@section('main')

<div class="main">

	<!-- Page header -->

			{{-- <div class="page-header">

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">

			    <div class="d-flex">

			        <div class="breadcrumb">

			           <img src="https://s120.avatar.talk.zdn.vn/6/8/4/1/2/120/61c9e312cd05c775f7b42157d82c4b11.jpg" width="40px" height="40px" style="border-radius: 50%!important;">

			        </div>

			        <div class="breadcrumb">

			            <img src="https://s120.avatar.talk.zdn.vn/1/1/2/e/10/120/71c4b8c47352f97334a8a88ff793a621.jpg" width="40px" height="40px" style="border-radius: 50%!important;">

			        </div>



			      

			    </div>



			    <div class="header-elements d-none">

			        

			    </div>

			</div>



			</div> --}}

			<!-- /page header -->

			{{-- @include('errors.note') --}}

        <!-- Form inputs -->

		{{-- 	main --}}

		<section class="content container-fluid">

                    @foreach($catelist as $row)
	                   <button class="btn" onclick="runAccount_zalo({{ $row->id }})" style="background-color: #FFFF;"><span class="badge badge-dark" style="background-color: #{{$row->color}};font-size: 100%;">{{$row->name }}</span></button>
	                @endforeach

				        {{-- <div class="alerts"></div> --}}

				        <link href="assets/css/zalo.css" rel="stylesheet" type="text/css">

				        

				        <style type="text/css">

				        	.indexdragdropchat .emojionearea .emojionearea-editor{

								min-height: auto;

								max-height: 80px;

								padding: 10px 10px;

							}

				            .bt-loader {

				            position: absolute;

				            top: 50%;

				            left: 50%;

				            border: 16px solid #f3f3f3;

				            border-radius: 50%;

				            border-top: 16px solid #3498db;

				            width: 120px;

				            height: 120px;

				            -webkit-animation: spin 0.8s linear infinite;

				            animation: spin 0.8s linear infinite;

				            }

				            .bt-loader{

				            border: 16px solid #fff;

				            border-top: 16px solid #3498db;

				            display: none;

				            position: absolute;

				            top: 25%;

				            left: 41%;

				            width: 80px;

				            height: 80px;

				            }

				            @-webkit-keyframes spin {

				            0% { -webkit-transform: rotate(0deg); }

				            100% { -webkit-transform: rotate(360deg); }

				            }

				            @keyframes spin {

				            0% { transform: rotate(0deg); }

				            100% { transform: rotate(360deg); }

				            }

				            .slideshow__page__image {

							    width: 380px !important;

							}

							.container-fluid {

							    border: 1px solid #cdcdcd;

							    /*border-radius: 10px;*/

							}

							

							.tab-content .active, .pill-content .active {

								    display: block;

								}

							/*.tab-content .tab-pane, .pill-content .pill-pane {

								 display: none;

								}*/

								

							/*.nav-tabs .nav-link.active{

							    color: #fff;

							    background-color: #007bff;

							}*/

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

							.bt-drop-chattemp {

							    min-width: 300px;

							    background-color: #fff;

							    position: absolute;

							    left: 0;

							    z-index: 1000;

							    display: none;

							    bottom: 100%;

							}

							.bt-drop-chattemp>.title-drop {

							    background: #0084ff !important;

							    padding: 8px;

							}

							.bt-drop-chattemp>.title-drop>span {

							    color: #fff;

							}

							.bt-content-drop {

							    box-shadow: 0 6px 12px rgba(0,0,0,.175);

							    max-height: 300px;

							    overflow: auto;

							    padding: 8px;

							    border: 1px solid #ededed;

							    margin: 0px;

							}

							.bt-content-drop>li {

							    list-style: none;

							    padding: 10px;

							    border-bottom: 1px solid #ececec;

							    cursor: pointer;

							}

							.tinnhanmau{

								color: #f16b7a;

								padding-top: 11px;

							}

							.alert_content{

								display: none;

							}

							.homet{

								width: 116px;

							}

							.card.me {

								    background-color: #DAE9FF;

								}

						.popover-v2, .zmenu-body.content-only {

						    position: absolute;

						    background: white;

						    padding: 10px;

						    border-radius: 4px;

						    z-index: 9999;

						    box-shadow: 0 4px 8px 0 rgba(0, 26, 51, 0.1);

						    border: solid 1px #e1e4ea;

						}

						.zmenu-item {

						    height: 32px;

						    padding: 0 10px 0 14px;

						    display: flex;

						    align-items: center;

						    cursor: pointer;

						    font-size: 13px;

						    color: #050a19;

						    max-width: 200px;

						    min-width: 120px;

						    position: relative;

						}

						.zmenu-item div:hover {

						  background-color: yellow;

						}



					  .threadChat__btn-is-friend {

							    font-size: 10px;

							    font-weight: 600;

							    color: white;

							    min-width: 48px;

							    height: 20px;

							    line-height: 20px;

							    border-radius: 4px;

							    background-color: #8c95a3;

							    padding: 0 5px;

							    margin-right: 20px;

							    position: relative;

							    top: 0;

							}
							.nameFriend{
								color: #ff7043;
							}
							.zalo_name{
								width: 192px;
							    overflow: hidden;
							    white-space: nowrap; 
							    text-overflow: ellipsis;
							}

				        </style>

				        <div class="homeMessageBox"></div>

				       <div>

						<ul class="nav nav-tabs" style="color: #6e68ff; background-color: #ecf0f5; margin-bottom:0;">

							<li class="nav-item active">

								<a class="nav-link active homet" onclick="activetab(this,'#home')" style="float: left;">Tất cả 

									<div style="width: fit-content; background: red; border-radius: 50%;float: right;margin-top: -5px;">

									<span style=" color: white;padding: 7px;" class="loadtinnhanmoi homenewmess" data-tinnhan="0">0</span>

								</div></a>

								

							</li>

						{{-- <li class="nav-item" onclick="activetab(this,'#menu0')"><a class="nav-link newmes_9038843610399767491" href="#menu0" style="float: left;">Tuandepzai<div style="width: fit-content;background: red;border-radius: 50%;float: right;margin-top: -5px;"><span style="color: white;padding: 7px;" class="loadtinnhanmoi homenewmess countmess_9038843610399767491" data-tinnhan="0">0</span></div></a></li> --}}

					</ul>

						<!-- <span>

							<i class="fa fa-angle-up"></i>

						</span> -->

					</div>

				        

				        <input type="hidden" name="" id="tinnhandangdoc" value="">

				        {{ csrf_field() }}

				        <!-- Tab panes -->



				<div class="tab-content border mb-3 formchat123">

<div id="home" class="tab-pane active" style=" margin-left: 0px; width: 100%;margin-right: 0px; padding-right: 0px; padding-left: 0px;">

				        <div class="chatzalov2" style="display: block;">

							    <div id="container">

							        <nav id="sidebarNav" class="flx " style="height: calc(100vh - 95px);">

							            <div class="flx-cell flx flx-col" style="position: relative; width: 0px; z-index: 5;">

							            	

							                <div id="user-name33">

							                    <div class="truncate title-name choiceaccount" data-toggle="modal" data-target="#chontaikhoan" style="padding-top: 3px;font-weight: 600;max-width: 60%;outline: block; white-space: pre-wrap;word-wrap: break-word;overflow: hidden;white-space: nowrap!important;"></div>

							                    <div style="padding-left: 14px;float: right;padding-top: 0px;" class="titlezalo33">

							                        <a href="#" class="btn btn-primary " data-toggle="modal" data-target="#chontaikhoan">Chọn tài khoản Zalo</a>

							                    </div>

							                </div>

							               

							                <div id="contact-search" class="ovf-hidden web">

							                    <div class="group-search">

							                        <div>

							                            <div style="top: 40px; left: -1px; position: absolute; pointer-events: none;"></div>

							                            <i class="tooltip btn fa fa-search group-search__icon" aria-hidden="true" style="margin-left: 0px;"></i>

							                        </div>

							                        <span class="fake-textholder truncate fk-normal" data-translate-inner="STR_SEARCH_FRIEND" style="left: 58px;">Tìm bạn bè, nhóm và tin nhắn</span><input id="contact-search-input" autocomplete="off" tabindex="-1" type="text" maxlength="100" value="" onkeyup="searchInboxComment(this)">

							                    </div>

							                    <span id="inviteBtn" style="position: relative; top: 10px; padding-right: 0px;display: none;">

							                        <div tabindex="0" aria-hidden="true" class="clickable btn nav-button_add_friend" data-translate-title="STR_CONTACT_ADD_FRIEND" title="ThĂªm báº¡n" style="font-size: 22px; top: -16px;"><i class="fa "></i></div>

							                    </span>

							                    <span id="composeBtn" style="position: relative;">

							                        <div style="top: 35px; left: -16px; position: absolute; pointer-events: none;"></div>

							                        <div tabindex="1" aria-hidden="true" class="clickable btn icon-add-group" data-translate-title="STR_CREATE_CHAT_GROUP" title="Táº¡o nhĂ³m chat"><i class="fa fa-icon-add-group icon" data-toggle="modal" data-target="#creategroup"></i></div>

							                    </span>

							                </div>

							                <div class="conv-container">

							                    <div class="filter-tags-container ">

							                        <div>

							                            <div style="padding-top: 6px; margin-bottom: 2px; display: flex; justify-content: space-between;">

							                                <span class="filter-tag-title filter-title" data-translate-inner="STR_LABEL_CLASS_2">Phân loại</span>

							                                <div style="margin-right: -5px;">

							                                    <div class="filter-tag-title filter-button-section" data-translate-title="STR_CREATE_LBL" title="Tạo thẻ tag" data-toggle="modal" data-target="#createtag"><i class="setting-icon fa fa-tag-add" style="top: -1px;"></i></div>

							                                    <div style="width: 1px; height: 20px; background: rgb(229, 229, 233); margin: 0px 5px; display: inline-block;"></div>

							                                    <div class="filter-tag-title filter-button-section" data-translate-title="STR_HIDE_2" title="áº¨n tháº»">

							                                        <i class="setting-icon fa fa-chevron-up anhienphanloai"></i>

							                                        <div style="top: 32px; left: -25px; width: 275px; position: absolute; pointer-events: none;"></div>

							                                    </div>

							                                </div>

							                            </div>

							                            <div>

							                                <div class="filter-tags phanloaitag">

							                                </div>

							                            </div>

							                        </div>

							                        <div class="nigh-chat-friend">

							                            <div class="night-chat-online-friend"></div>

							                        </div>

							                        <div style="margin-top: 5px; padding-top: 7px; margin-bottom: 2px; display: flex; justify-content: space-between; border-top: 1px solid rgb(229, 229, 233);">

							                            <div style="max-width: 200px; width: calc(100% - 120px);">

							                                <div class="conv-label-title  bt-open-temp-chat3"><span class="filter-tag-title filter-title truncate" data-translate-inner="STR_CONV_ALL" id="viewmess">Tin nhắn</span><i class="fa fa-caret-down" style="position: relative; top: -2px; padding: 5px; font-size: 10px;"></i>



							                                </div>

							                                <div class="popover-v2 undefined popover_chatprofile open" style="display: none; z-index: 10000; opacity: 1; top: 158px; left: 8px; height: inherit;">

																	    <div class="zmenu-body">

																	        <div class="zmenu-item ">

																	            <div class="truncate flx-1" onclick="searchmessage('all')" id="messAll">Tất cả tin nhắn</div>

																	        </div>

																	        <div class="zmenu-item ">

																	            <div class="truncate flx-1" onclick="searchmessage('chuadoc')" id="chuadoc">Tin nhắn chưa đọc</div>

																	        </div>

																	        <div class="zmenu-item ">

																	            <div class="truncate flx-1" onclick="searchmessage('nguoila')" id="nguoila">Tin nhắn từ người lạ</div>

																	        </div>

																	    </div>

																	</div>

							                                <div data-tooltip="" data-position="" class="popover-container " id=""></div>



							                            </div>

							                            <div style="flex: 1 1 0%;"></div>

							                            {{-- <div class="filter-tail-text " data-translate-inner="STR_LABEL_MARK_READ">Đánh dấu đã đọc</div> --}}

							                        </div>

							                    </div>

							                    <div id="conversationListId" class="web" tabindex="999" style="position: relative; display: block; flex: 2 1 0%;">

							                        <div data-tooltip="" data-position="" class="popover-container func-setting popover-container" id=""></div>

							                        <div style="overflow: visible; height: 0px; ">

							                            <div class="virtualized-scroll" style="height: calc(100vh - 276px); width: 100%;" oncontextmenu="return false;">

							                                <div class="bt-loader" style="display: none;"></div>

							                                <div aria-label="grid" class="ReactVirtualized__Grid ReactVirtualized__List" role="grid" tabindex="-2" style="box-sizing: border-box; direction: ltr; height: auto; position: absolute; width: 100%; will-change: transform; overflow: auto;">

							                                    <div class="ReactVirtualized__Grid__innerScrollContainer" style="width: auto; height: 148px; max-height: fit-content; overflow: hidden;">

							                                        {{-- <div onmousedown="mouseDown(this,event)" class="msg-item bt-load-chat  parent_4210893778491785035" style="height: 74px; left: 0px;  width: 100%;">

							                                            <div draggable="false" class="item rel bt-content-chat on_4210893778491785035  " data-hoithoai="4210893778491785035" data-profile="9038843610399767491" data-group="0" data-img="//s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg">

							                                                <div class="avatarzalo" style="position: relative;">

							                                                    <div class="avatar avatar--m conversationList__avatar" title="">

							                                                        <div class="avatar-img  outline" style="background-image: url(//s120-ava-talk.zadn.vn/e/6/2/5/36/120/16782d311b12da6d28daa13e343986b8.jpg);"></div>

							                                                    </div>

							                                                </div>

							                                                <div class="item-content-container">

							                                                    <div class="item-title">

							                                                        <div class="item-title-name truncate   ">Zalo</div>

							                                                        <div class="item-timestamp"> <span>29-3-2020 10:36:28</span></div>

							                                                    </div>

							                                                    <div style="display: flex; flex-grow: 1; align-items: center;">

							                                                        <div class="item-message truncate unread" style="display: flex; color: rgb(122, 134, 154); line-height: 20px;">

							                                                            <div class="conv-last-msg">

							                                                                <div style="overflow: hidden; text-overflow: ellipsis; line-height: 20px;"><span>Bạn đã đăng nhập vào tài khoản Zalo ở trên trình duyệt . Bạn có thể vào phần [Các máy tính đăng nhập], chọn Đăng xuất để thoát khỏi tài khoản Zalo trên thiết bị đó</span></div>

							                                                            </div>

							                                                            <div class="item-action">

							                                                                <div></div>

							                                                                <div class="item-action__menu "><i class="fa fa-tab-icon-more func-setting__icon"></i></div>

							                                                            </div>

							                                                        </div>

							                                                    </div>

							                                                    <div class="conv-filter" style="flex-grow: 1;">

							                                                        <div style="float:right;"><img src="https://s120.avatar.talk.zdn.vn/default" style="width: 20px;height: 20px; border-radius: 50%;"><span style=" color: #4c9aff;">Tuandepzai</span></div>

							                                                    </div>

							                                                </div>

							                                            </div>

							                                        </div> --}}

							                                        {{-- <div onmousedown="mouseDown(this,event)" class="msg-item bt-load-chat  parent_4006120826583964323" style="height: 74px; left: 0px;  width: 100%;">

							                                            <div draggable="false" class="item rel bt-content-chat on_4006120826583964323  " data-hoithoai="4006120826583964323" data-profile="9038843610399767491" data-group="0" data-img="//s120-ava-talk.zadn.vn/6/8/4/1/2/120/61c9e312cd05c775f7b42157d82c4b11.jpg">

							                                                <div class="avatarzalo" style="position: relative;">

							                                                    <div class="avatar avatar--m conversationList__avatar" title="">

							                                                        <div class="avatar-img  outline" style="background-image: url(//s120-ava-talk.zadn.vn/6/8/4/1/2/120/61c9e312cd05c775f7b42157d82c4b11.jpg);"></div>

							                                                    </div>

							                                                </div>

							                                                <div class="item-content-container">

							                                                    <div class="item-title">

							                                                        <div class="item-title-name truncate   ">佐助</div>

							                                                        <div class="item-timestamp"> <span>26-3-2020 9:03:05</span></div>

							                                                    </div>

							                                                    <div style="display: flex; flex-grow: 1; align-items: center;">

							                                                        <div class="item-message truncate unread" style="display: flex; color: rgb(122, 134, 154); line-height: 20px;">

							                                                            <div class="conv-last-msg">

							                                                                <div style="overflow: hidden; text-overflow: ellipsis; line-height: 20px;"><span>[File]</span></div>

							                                                            </div>

							                                                            <div class="item-action">

							                                                                <div></div>

							                                                                <div class="item-action__menu "><i class="fa fa-tab-icon-more func-setting__icon"></i></div>

							                                                            </div>

							                                                        </div>

							                                                    </div>

							                                                    <div class="conv-filter" style="flex-grow: 1;">

							                                                        <div style="float:right;"><img src="https://s120.avatar.talk.zdn.vn/default" style="width: 20px;height: 20px; border-radius: 50%;"><span style=" color: #4c9aff;">Tuandepzai</span></div>

							                                                    </div>

							                                                </div>

							                                            </div>

							                                        </div> --}}

							                                    </div>

							                                </div>

							                                <div class="scroll-content" id="conversationListScrollbar" style="position: relative; overflow: hidden; width: 12px; height: 49px;">

							                                    <div style="position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: scroll; margin-right: -7px; margin-bottom: -7px;">

							                                        <div class="scrollbar-container" style="height: 444px;"></div>

							                                    </div>

							                                    <div style="position: absolute; height: 6px; transition: opacity 200ms ease 0s; opacity: 0; right: 2px; bottom: 2px; left: 2px; border-radius: 3px;">

							                                        <div style="position: relative; display: block; height: 100%; cursor: pointer; border-radius: inherit; background-color: rgba(0, 0, 0, 0.2); width: 0px;"></div>

							                                    </div>

							                                    <div style="position: absolute; width: 6px; transition: opacity 200ms ease 0s; opacity: 0; right: 2px; bottom: 2px; top: 2px; border-radius: 3px;">

							                                        <div style="position: relative; display: block; width: 8px; background-color: rgb(204, 204, 204); border-radius: 3px; height: 30px; transform: translateY(0px);"></div>

							                                    </div>

							                                </div>

							                            </div>

							                        </div>

							                        <div class="resize-triggers">

							                            <div class="expand-trigger">

							                                <div style="width: 333px; height: 50px;"></div>

							                            </div>

							                            <div class="contract-trigger"></div>

							                        </div>

							                    </div>

							                </div>

							            </div>

							        </nav>

							        <div id="resize-handle"></div>

							        <div id="chatOnboard" style="display: block;" class="chatOnboard">

							            <div class="flx flx-col flx-al-c flx-center chat-onboard" style="height: calc(100vh - 95px);">

							                <div style="width: 415px; text-align: center; color: rgb(34, 34, 34); margin-bottom: 50px;">

							                    <div style="font-size: 22px; margin-bottom: 20px;"><span data-translate-inner="STR_WELCOME_SCREEN_MAIN_TITLE">Chào mừng đến với Ninja Zalo</span>&nbsp;<span style="font-weight: 600;">chat profile</span>!</div>

							                    <span data-translate-inner="STR_WELCOME_SCREEN_MAIN_SUBTITLE" style="font-size: 14px;">Hãy cùng Ninja khám phá những tính năng cực kì tiện lợi trên Ninja Zalo</span>

							                </div>

							               

							                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

											 {{--  <ol class="carousel-indicators">

											    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>

											    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

											    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

											  </ol> --}}

											  <div class="carousel-inner">

											    <div class="carousel-item active">

											      <img class="d-block w-100 slideshow__page__image" src="https://zalo-chat-static.zadn.vn/v1/inapp-welcome-screen-04.jpg" alt="First slide" style="object-fit: contain;">

											       <div class="flx flx-col slideshow__page__text"><span class="slideshow__page__text__title truncate-2" data-translate-inner="STR_WELCOME_SCREEN_TITLE_4">Giai quyết công việc hiệu quả lên đến 80%</span><span class="slideshow__page__text__subtitle truncate-5" data-translate-inner="STR_WELCOME_SCREEN_SUBTITLE_4">Công cụ chat zalo nhiều tài khoản cùng lúc số 1 việt nam</span></div>

											    </div>

											    <div class="carousel-item" >

											      <img class="d-block w-100 slideshow__page__image" src="https://zalo-chat-static.zadn.vn/v1/inapp-welcome-screen-03.png" alt="Second slide" style="object-fit: contain; " >

											       <div class="flx flx-col slideshow__page__text"><span class="slideshow__page__text__title truncate-2" data-translate-inner="STR_WELCOME_SCREEN_TITLE_3">Gửi file nặng?</span><span class="slideshow__page__text__subtitle truncate-5" data-translate-inner="STR_WELCOME_SCREEN_SUBTITLE_3">Đã có Zalo PC "xử" hết</span></div>

											    </div>

											    <div class="carousel-item">

											      <img class="d-block w-100 slideshow__page__image" src="https://zalo-chat-static.zadn.vn/v1/inapp-welcome-screen-02.jpg" alt="Third slide" style="object-fit: contain;" >

											      <div class="flx flx-col slideshow__page__text"><span class="slideshow__page__text__title truncate-2" data-translate-inner="STR_WELCOME_SCREEN_TITLE_1">Giải quyết công việc hiệu quả hơn, lên đến 40%</span><span class="slideshow__page__text__subtitle truncate-5" data-translate-inner="STR_WELCOME_SCREEN_SUBTITLE_1">Với Zalo PC</span></div>

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

											 {{--  <div class="slideshow__bottom">

							                        <span class="slideshow__bottom__dot "></span>

							                        <span class="slideshow__bottom__dot "></span>

							                        <span class="slideshow__bottom__dot  selected"></span><span class="slideshow__bottom__dot "></span></div> --}}

											</div>

							            </div>

							        </div>

							        <main style="width: calc(100% - 401px); display: none;position: absolute;height: calc(100vh - 94px);" id="mainchatzalo" class="mainchatzalo">

							            <div class=" main__center dib fl-l animated slideInLeft" id="chatViewContainer" tabindex="1" style="height: calc(100vh - 91px);">

							                <header id="header">

							                    <div class="threadChat nocall">

							                        <div id="ava_chat_box_view" class="threadChat__avatar clickable" style="padding-top: 5px;">

							                            <div class="avatar avatar--sl" title="">

							                                <div class="avatar-img " style="background-image: url(&quot;//s120-ava-talk.zadn.vn/b/b/9/b/3/120/744ef2d00d588b21fcc2d0998d43ac3d.jpg&quot;);"></div>

							                            </div>

							                        </div>

							                        <div class="threadChat__title  ">

							                            <div id="groupNameInput--change">

							                                <div class="title header-title group-title user">

							                                    <div class="truncate content">A10 Huy</div>

							                                    <i class="fa fa-edit edit-icon clickable "></i>

							                                </div>

							                            </div>

							                            <div class="flx" style="min-width: 0px; text-overflow: ellipsis; white-space: nowrap; color: rgb(109, 115, 121);">

							                            	<div class="threadChat__btn-is-friend"><span data-translate-inner="STR_STRANGER" class="friendview">BẠN BÈ</span></div>

							                              {{--   <span class="subtitle header-subtitle">

							                                	<span>

							                                		<span data-translate-inner="STR_LAST_SEEN">Truy cập</span> 

							                                		<span>16 <span data-translate-inner="STR_HOUR_AGOS">giờ trước</span>

							                                	</span>

							                                </span>

							                            </span> --}}



							                                <div class="">

							                                    <i class="fa fa-header-icon-member addnembergroup" style="font-size: 18px; position: relative; top: 3px; margin: 0px 4px;"></i>

							                                    <span class="subtitle-separator  " style="position: relative; display: inline-block;"></span><i class="fa fa-header-icon-tag label-ico-header" data-translate-title="STR_LABEL_CLASS" title="Phân loại" style="font-size: 17px; position: relative; top: 2px; margin: 0px 4px;"></i>

							                                    <div data-tooltip="" data-position="" class="popover-container " id=""></div>

							                                    <ul class="dropdown-menu tagbyprofile">

							                                        <li><a href="#">HTML</a></li>

							                                        <li><a href="#">CSS</a></li>

							                                        <li><a href="#">JavaScript</a></li>

							                                    </ul>

							                                </div>

							                            </div>

							                        </div>

							                    </div>

							                    <div class="flx-fix flx flx-al-c" id="headerBtns">

							                    	{{ csrf_field() }}

							                        <a class="header-btn func-create-group " data-translate-title="STR_ADD_FRIEND_TO_CONVERSATION" title="Thêm bạn vào trò chuyện"></a>

							                        {{-- <a class="header-btn tooltip" data-translate-title="STR_VIDEO_CALL" title="Cuộc gọi video" style="position: relative;display: block;">

							                            <i class="btn btn fa fa-window-restore  openmutilchat" style="font-size: 17px;"></i>

							                            <div style="top: 33px; left: -226px; position: absolute; pointer-events: none;"></div>

							                        </a> --}}

							                        <a class="header-btn func-search tooltip" data-translate-title="STR_SEARCH_MESSAGES" title="Tìm kiếm tin nhắn" style="position: relative;display: none;">

							                            <div style="top: 33px; left: -226px; position: absolute; pointer-events: none;"></div>

							                            <i class="btn fa fa-search " style="font-size: 20px;"></i>

							                        </a>

							                        {{-- <a class="header-btn func-menu" data-translate-title="STR_CONVERSATION_INFO" title="Thông tin cuộc trò chuyện" style="position: relative;" onclick="opendonhang()">

							                            <div style="top: 33px; left: -278px; position: absolute; pointer-events: none;"></div>

							                            <i class="tooltip btn fa fa-sidebar-icn " style="font-size: 20px;"></i>

							                            <div class="notifyContainer" style="top: -7px;display: none;">

							                                <div class="ch"></div>

							                            </div>

							                        </a> --}}

							                    </div>

							                    <div style="font-size: 13px; margin: auto; display: flex; align-items: center;"><div class="flx sendketban" style="font-size: 15px;margin-left: 0px;cursor: pointer; margin-right: 500px;" data-toggle="modal" data-target="#sendsms">{{-- <span class="badge bg-blue" data-translate-inner="STR_PROFILE_ADD_FRIEND"><i class="icon-user-plus mr-2"></i>Kết bạn</span> --}}

							                    </div>

							                </div>

							                <i class="fa fa-tab-icon-more message-view__banner__view-more"></i>

							                <div data-tooltip="" data-position="" class="popover-container func-setting popover-container" id=""></div>

							                </header>

							                <article id="chatView" class="" style="height: calc(100vh - 141px);">

							                    <canvas width="966" id="effectcanvas" height="476" style="display: none; z-index: 9999; position: fixed;"></canvas>

							                    <div id="effectdiv" style="height: 476px; width: 476px; top: 0px; left: 245px; display: none; z-index: 9999; position: absolute;"></div>

							                    <div id="messageView" class="message-view" tabindex="21">

							                        <div class="">

							                            <div data-tooltip="" data-position="" class="popover-container func-setting popover-container" id=""></div>

							                        </div>

							                        <div class="">

							                            <div data-tooltip="" data-position="" class="popover-container func-setting popover-container" id=""></div>

							                        </div>

							                        <div data-tooltip="" data-position="" class="popover-container " id=""></div>

							                        <div class="message-view__blur__overlay"></div>

							                        <div id="dragOverlayMessageView" class="drag-over-overlay"></div>

							                        <div id="messageViewContainer" class=" message-view__scroll " style="position: relative; overflow: hidden; width: 100%; height: 100%;">

							                            <div class="scrollcontentzalo" style="position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; overflow: scroll; margin-right: -7px; margin-bottom: -7px; will-change: transform;">

							                                <div class="message-view__scroll__inner fadeInAndOut " id="messageViewScroll">

							                                    <div class="message-view__guide guggy ">

							                                        <div class="message-view__guide__item flx-col" style="margin-bottom: 0px;">

							                                            <div class="message-view__guide__guggytxt" style="width: 260px; text-align: center; margin-top: 10px; font-weight: 600; pointer-events: none;"><span class="txt-highlight" data-translate-inner="STR_BECOME_FRIEND_3" data-translate-text-arguments="[&quot;A10 Huy&quot;]">Bạn và A10 Huy đã trở thành bạn</span><span class="txt-highlight">&nbsp;!</span></div>

							                                            <div class="guggy-container flx" style="height: 106px; position: unset;"><img draggable="false" src="https://zalo-api.zadn.vn/api/emoticon/sticker/webpc?eid=21458&amp;size=130" class="message-view__guide__guggy clickable"><img draggable="false" src="https://zalo-api.zadn.vn/api/emoticon/sticker/webpc?eid=19773&amp;size=130" class="message-view__guide__guggy clickable"><img draggable="false" src="https://zalo-api.zadn.vn/api/emoticon/sticker/webpc?eid=18869&amp;size=130" class="message-view__guide__guggy clickable"></div>

							                                            <div class="clickable message-view__guide__guggytxt" style="width: 260px; text-align: center; margin-top: 10px;"><span class="txt-highlight" data-translate-inner="STR_SEND_STICKER_WELCOME">Gửi Sticker xin chào</span><span class="txt-highlight">!</span></div>

							                                            <hr style="width: 100%; border-top: 1px solid rgb(229, 229, 233); border-right: none; border-bottom: none; border-left: none; border-image: initial;">

							                                            <div class="clickable message-view__guide__guggytxt" style="width: 260px; text-align: center;"><span class="txt-highlight" data-translate-inner="STR_HELLO">Xin chào</span> <span class="txt-highlight"> A10 Huy </span></div>

							                                        </div>

							                                    </div>

							                                    <div class="chat-date"><span data-translate-inner="STR_DATE_TIME" data-translate-text-arguments="[&quot;10:21&quot;,{&quot;textKey&quot;:&quot;&quot;},{&quot;textKey&quot;:&quot;STR_YESTERDAY_RAW&quot;}]">10:21  Hôm qua</span></div>

							                                    <div class="message-view__ecard">

							                                        <div class="message-view__ecard__item flx-col">

							                                            <div class="message-view__ecard__image __type1" style="background: url(&quot;https://feed-icon.zdn.vn/birthday/6/ecard_birthday_middle_3@2x.png&quot;) 0% 0% / 100%; position: relative;">

							                                                <div class="avatar-img outline" style="background: url(&quot;//s120.avatar.talk.zdn.vn/b/b/9/b/3/120/744ef2d00d588b21fcc2d0998d43ac3d.jpg&quot;) 0% 0% / 100%; width: 67px; height: 67px; position: relative; margin: auto; top: 10px;"></div>

							                                                <div style="text-align: center; position: absolute; bottom: 0px; right: 0px; left: 0px; margin-bottom: 5px; color: rgb(255, 255, 255);">

							                                                    <div class="truncate" style="font-size: 15px; font-weight: 500; padding-left: 10px; padding-right: 10px;">12/08 Sinh nhật của A10 Huy</div>

							                                                    <div class="truncate" style="font-size: 14px; padding-left: 10px; padding-right: 10px;">Hãy gửi lời chúc tốt đẹp!</div>

							                                                </div>

							                                            </div>

							                                            <div class="message-view__ecard__btAction" style="width: 328px;">Gửi Sticker chúc mừng</div>

							                                        </div>

							                                    </div>

							                                </div>

							                            </div>

							                            <div style="position: absolute; height: 6px; transition: opacity 200ms ease 0s; opacity: 0; width: 0px;">

							                                <div style="position: relative; display: block; height: 100%; cursor: pointer; border-radius: inherit; background-color: rgba(0, 0, 0, 0.2); width: 0px;"></div>

							                            </div>

							                            <div style="position: absolute; width: 8px; transition: opacity 200ms ease 0s; opacity: 0; right: 2px; bottom: 2px; top: 2px; border-radius: 3px;">

							                                <div style="position: relative; display: block; width: 100%; cursor: pointer; border-radius: inherit; background-color: rgba(0, 0, 0, 0.2); height: 331px; transform: translateY(141px);"></div>

							                            </div>

							                        </div>

							                        {{-- <img class="message-view__blur " style="opacity: 0.85; image-rendering: pixelated;" src="blob:https://chat.zalo.me/81ec5374-969a-4311-bd76-7ec580141127"> --}}
							                    </div>

							                    <div id="chatInput" class="chat-input web" style="margin-bottom: 35px;">

							                        <div id="chatInput-popover-container"></div>

							                        <div id="dragOverlayInputbox" class="drag-over-overlay"></div>

							                        <div id="chatInputTools" class="chat-input__tools flx-fix flx flx-al-s flx-sp-btw">

							                            <div class="" style="margin-left: 6px; width: 100%; height: 100%; position: relative; display: flex; z-index: 4;">

							                                <div style="position: relative; margin: 0px 8px 0px 7px;display: none;">

							                                    <div style="left: -28px; bottom: 46px; position: absolute; pointer-events: none;"></div>

							                                    <div data-tooltip="" data-position="" class="popover-container chat-input__tools__btn" id="StickerPopupButton"><i class="btn fa fa-smile-o text-center" data-translate-title="STR_SEND_STICKER" title="Gửi Sticker"></i></div>

							                                    <i class="fa fa-N func-unread" style="width: 16px; height: 16px; font-size: 16px; color: rgb(255, 86, 48); background: white; border-radius: 50%; left: 27px; top: 2px; position: absolute;"></i>

							                                </div>

							                                <a class="chat-input__tools__btn text-center sendimage2" data-translate-title="STR_SEND_PHOTO" title="Gửi hình ảnh" style="margin-right: 12px;">

							                                    <div class="inputfile-container " style="position: relative; top: 2px;">

							                                        <form id="fileimage" method="POST" action="{{ url('uploadimg') }}" enctype="multipart/form-data">

							                                            <input type="file" name="file" id="file" class="inputfile hidden" accept=".png, .jpg, .jpeg, .gif" multiple="">

							                                            <input type="button" name="submitimg" class="submitform hidden">

							                                            {{ csrf_field() }}

							                                            </form>

							                                        {{-- <div style="left: -9px; bottom: 40px; position: absolute; pointer-events: none;"></div> --}}

							                                        <label class="tooltip btn fa fa-chatbar-icon-photo iup-image "></label>

							                                    </div>

							                                </a>

							                               {{--  <a class="chat-input__tools__btn text-center sendimage2" data-translate-title="STR_SEND_PHOTO" title="Gửi hình ảnh" style="margin-right: 12px;" onclick="unlock()">

							                                    <div class="inputfile-container " style="position: relative; top: 2px;">

							                                       

							                                        <div style="left: -9px; bottom: 40px; position: absolute; pointer-events: none;"></div>

							                                       <i id="" class="btn fa fa-smile-o text-center" data-translate-title="STR_SEND_STICKER" title="Gửi Sticker"></i>

							                                    </div>

							                                </a> --}}

							                                <div style="margin-right: 14px;display: block;" >

																<div style="left: 81px; bottom: 40px; position: absolute; pointer-events: none;"></div>

																<div style="left: 85px; bottom: 40px; position: absolute; pointer-events: none;"></div>

																<div style="left: 85px; bottom: 40px; position: absolute; pointer-events: none;"></div>

																<a style="display: block;" class="chat-input__tools__btn" data-translate-title="STR_SEND_FILE_1GB" title="Gửi File lên đến 1GB">

																	<div class="inputfile-container text-center" style="position: relative;">

																		<label style=" display: none;">

																			<form id="upfile" enctype="multipart/form-data" method="post">

																				 {{ csrf_field() }}

																				<input type="file" name="file2" id="file2" class="inputfile" multiple="">

																			</form>

																		</label>



																		<label class="btn fa fa-paperclip iup-file" for="file2" style="left: -6px; top: 1px;">

																		</label><span title="Gửi File lên đến 1GB" style="font-size: 10px; font-weight: 700; color: rgb(0, 104, 255); cursor: pointer; pointer-events: none; position: absolute; bottom: 1px; right: 2px;">5MB</span></div>

																</a>

															</div>

															<div class="chat-input__tools__btn" data-translate-title="STR_SEND_CONTACT" title="Tin nhắn mẫu" style="margin-right: 9px;">

																{{ csrf_field() }}

																<div style="left: -8px; bottom: 40px; position: absolute; pointer-events: none;"></div>

																<i id="send-contact-btn" class="fa fa-chatbar-icon-contact text-center btn  bt-open-temp-chat2"></i>

																<div class="bt-drop-chattemp boxtinnhanmau" style="display: none;">
																    <div class="title-drop">

																        <span style="font-size: 14px;">Tin nhắn mẫu</span>

																        <div class="filter-tag-title filter-button-section" data-translate-title="STR_CREATE_LBL" title="Thêm mới tin nhắn mẫu" data-toggle="modal" data-target="#messagesample" style="float: right;"><i class="icon-pencil7" style="padding-top: 4px;color: #FFFF;float: right;"></i></div>

																        

																    </div>



								                                     @foreach($mess_sample as $value)



								                                       <div class="manage-label__item flx flx-al-c id_{{ $value->id }}" id="id_{{ $value->id }}">

																      	<div class="label-sep"></div>

																      {{-- 	<a href="https://zalov2.phanmemninja.com/chat/chatprofile#" class="manage-label__item__input tinnhanmau" onclick="getdatamess({{ $value->id }})"><span>{{ $value->title }}</span></a> --}}
																      	<span class="manage-label__item__input tinnhanmau" onclick="getdatamess({{ $value->id }})">{{ $value->title }}</span>

																      	<div class="manage-label__item__close ">

																      		<i class="fa fa-trash btn" style="font-size: 16px;" title="Xóa" onclick="deletemess({{$value->id}})"></i>

																      	</div>

																      </div>

																      @endforeach



																</div>

														   </div>

							                                <div class="chat-input__tools__btn" data-translate-title="STR_TXT_TOOLTIP_SCREENSHOT" data-translate-text-arguments="[&quot;Alt + PrtScn&quot;]" title="Bạn có thể chụp màn hình trên Zalo PC dành cho máy tính hoặc dùng phím tắt Alt + PrtScn" style="text-align: center; margin-right: 10px;display: none;"><i class="btn fa fa-capture-zalo capture-icon "></i></div>

							                                <div class="chat-input__tools__btn" title="" style="margin-right: 9px;display: none;">

							                                    <div style="left: -8px; bottom: 40px; position: absolute; pointer-events: none;"></div>

							                                    <i class="fa fa-chatbar-icon-contact text-center btn"></i>

							                                </div>

							                                <div class="chat-input__tools__btn" title="" style="margin-right: 14px;display: none;"><i class="fa fa-reminder-icon text-center btn"></i></div>

							                                <div class="chat-input__tools__btn" style="display: none;">

							                                    <div>

							                                        <div data-tooltip="" data-position="" class="popover-container chat-input__tools__btn" id="" style="font-size: 5px; margin: 0px;"><i class="btn btn--s fa fa-chatbar-icon-more-input text-center" data-translate-title="STR_MORE" title="Thêm" style="font-size: 5px; margin: 0px;"></i></div>

							                                    </div>

							                                </div>

							                                <div style="flex: 1 1 0%;"></div>

							                            </div>

							                        </div>

							                        <div class="chat-input__content">

							                            <div class="chat-input__content__input">

							                                <div style="display: flex;">

							                                    <textarea placeholder="Nhập nội dung ghi chú (Bấm Enter để gửi, Shift + Enter để xuống dòng)" rows="6" class="bt-input-note" style="width: 100%;" id="sendmessage"> </textarea>

							                                    <div class="chat-input__content__send">

							                                        <div class="chat-input__content__send" style="padding-right: 67px;"><a id="sendBtn" class="btn btn-txt flx-fix btn-txt-highlight" data-translate-inner="STR_SEND" style="background-color: #2196f3; color: #FFFF;"><span>Gửi</span></a></div>

							                                    </div>

							                                </div>

							                            </div>

							                        </div>

							                    </div>

							                </article>

							            </div>

							            <div data-tooltip="" data-position="" class="popover-container func-setting popover-container" id=""></div>

							        </main>

							    </div>

							</div>



</div>

				</div>

				        

				            

				      

				        <div id="mediaLibModalImage" class="modal fade" role="dialog" tabindex="-1" data-backdrop="true" style="display: none;">

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

				        <div class="modal fade chontaikhoan" id="chontaikhoan" style="display: none;">

				            <div class="modal-dialog modal-full">

				                <div class="modal-content">

				                    <!-- Modal Header -->

				                    <div class="modal-header">

				                        <h4 class="modal-title">Tài khoản Zalo 

				                        	@foreach($admin as $row)

				                        	 @if($row->status != 1)

				                        	 <a class="btn btn-primary addCookie" {{-- data-toggle="modal" data-target="#themqr" --}} {{-- onclick="choiceidzalo2()" --}} style="color: #FFF;" id="addCookie">Thêm QR</a> <a class="btn btn-danger" onclick="Deleteaccountzalo()" style="color: #FFF;">Xóa tài khoản Zalo</a>



				                        	 @endif

				                        	@endforeach

				                        	

				                        </h4>

				                        {{ csrf_field() }}

				                        <button type="button" class="close" data-dismiss="modal">×</button>

				                    </div>



				                   

				                    <!-- Modal body -->

				                    <div class="modal-body">

				                        <div class="row">

				                        	@if($status !=1)
									{{-- Vẫn chạy bình thường, note lại thôi :))
 									--}}
				                        	     {{-- @foreach($account as $row)

						                            <div class="col-md-2" style="    margin-top: 20px;">



		                                                	 <div class='groupName {{ $row->zalo_id }}Type' id='{{ $row->zalo_id }}'>

											                   <span>

							                                        <input type="checkbox" class="fbnode checkbox checkbox-style deleteaccount" name="selectGroup[2]" id="selectgroup_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}">

							                                         <label for="selectgroup_{{ $row->zalo_id }}"></label>

							                                     </span>



							                                     <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 50px;height: 50px;" src="{{ $row->image }}">

									                                <span style=" font-size: 17px;color: #356bb2; font-weight: 600;">{{ $row->name }} @if($row->checkcookie == 1)(Cookie die) @endif</span>

									                                @if($row->checkcookie != 1)



									                                <label class="switch " >

																		<input type="checkbox" class="primary selectepageprofile checkallprofile profile_{{$row->zalo_id}}" data-type="profile" value="{{$row->zalo_id}}"  url-chat="{{$row->url_chat}}" data-cookie="{{$row->cookie}}" data-urlchat= "{{$row->url_chat}}" data-env="{{$row->serectkey}}" data-image="{{$row->image}}" data-name="{{$row->name}}">

																		<span class="slider round"></span>

																	</label>



																	@endif

		                                                      </div>
 

						                            </div>

		                                            @endforeach --}}
		                                            {{-- Vẫn chạy bình thường, note lại thôi :))
 --}}
                                               {{--  @for($i=0; $i<count($accountv2); $i++)
                                                         <div class="col-md-2" style="margin-top: 20px;">
						                            	   <h3>Nhóm {{ $i }} <button type="submit" class="btn btn-primary selecteall_account"  onclick="submit_account({{ $i }})" data-dismiss="modal"><i class="fa fa-play-circle" aria-hidden="true" style="font-size: 14px;"></i> Chạy</button></h3> 
						                            	    @for($j=0; $j<count($accountv2[$i]); $j++)
							                            	    
							                            	    	
							                            	    	<div class='groupName {{ $accountv2[$i][$j]['zalo_id'] }}Type' id='{{ $accountv2[$i][$j]['zalo_id'] }}'>
							                            	    		
																			
                                                                              <span>

									                                        <input type="checkbox" class="fbnode checkbox checkbox-style deleteaccount" name="selectGroup[2]" id="selectgroup_{{ $accountv2[$i][$j]['zalo_id'] }}" value="{{ $accountv2[$i][$j]['zalo_id'] }}">

									                                         <label for="selectgroup_{{ $accountv2[$i][$j]['zalo_id'] }}"></label>

									                                       </span>
		                                                             
									                                         <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 50px;height: 50px;" src="{{ $accountv2[$i][$j]['image'] }}">

											                                <span style=" font-size: 17px; font-weight: 600;@if($accountv2[$i][$j]['checkcookie'] == 1)color: #f44336;@else color: #356bb2; @endif">{{ $accountv2[$i][$j]['name'] }}</span>
                                                                            @if($accountv2[$i][$j]['checkcookie'] != 1)
											                                <label class="switch " >

																				<input type="checkbox" class="primary checkprofilev_{{ $i }} selectepageprofile checkallprofile profile_{{ $accountv2[$i][$j]['zalo_id'] }}" data-type="profile" value="{{ $accountv2[$i][$j]['zalo_id'] }}"  url-chat="{{ $accountv2[$i][$j]['url_chat'] }}" data-cookie="{{ $accountv2[$i][$j]['cookie'] }}" data-urlchat= "{{ $accountv2[$i][$j]['url_chat'] }}" data-env="{{ $accountv2[$i][$j]['serectkey'] }}" data-image="{{ $accountv2[$i][$j]['image'] }}" data-name="{{ $accountv2[$i][$j]['name'] }}" id="check_{{ $i }}">

																				<span class="slider round"></span>

																			</label>
                                                                        @endif
                                                                       
							                            	    	</div>
							                            	    
							                            	       
							                            	     
						                            	    @endfor
						                            	</div>
						                            	   
						                            	@endfor --}}
						                            {{-- node lại --}}
						                             @for($i=0; $i<count($accountv2); $i++)
                                                         <div class="col-md-2" style="margin-top: 20px;">
						                            	   <h3>Nhóm {{ $i }} <button type="submit" class="btn btn-primary selecteall_account"  onclick="submit_account({{ $i }})" data-dismiss="modal"><i class="fa fa-play-circle" aria-hidden="true" style="font-size: 14px;"></i> Chạy</button></h3> 
						                            	 {{--   <span>

						                                        <input type="checkbox" class="fbnode checkbox checkbox-style deleteaccount" name="selectGroup[2]" id="selectgroup_8590890477898106588" value="8590890477898106588">

						                                         <label for="selectgroup_8590890477898106588">Tất cả</label>

						                                       </span> --}}
						                            	    @for($j=0; $j<count($accountv2[$i]); $j++)
							                            	    
							                            	    	
							                            	    	<div class='groupName {{ $accountv2[$i][$j]['zalo_id'] }}Type' id='{{ $accountv2[$i][$j]['zalo_id'] }}'>

											                                <p class="zalo_name" style=" font-size: 17px; font-weight: 600;@if($accountv2[$i][$j]['checkcookie'] == 1)color: #f44336;@else color: #356bb2; @endif" title="{{ $accountv2[$i][$j]['name'] }}">
											                                	@if($accountv2[$i][$j]['checkcookie'] != 1)
	                                                                             <span>

										                                        {{-- <input type="checkbox" class="fbnode checkbox checkbox-style deleteaccount" name="selectGroup[2]" id="selectgroup_{{ $accountv2[$i][$j]['zalo_id'] }}" value="{{ $accountv2[$i][$j]['zalo_id'] }}">
                                                                                  --}}
                                                                                  
                                                                                  <input type="checkbox" class="primary checkprofilev_{{ $i }} selectepageprofile checkallprofile profile_{{ $accountv2[$i][$j]['zalo_id'] }}" data-type="profile" value="{{ $accountv2[$i][$j]['zalo_id'] }}"  url-chat="{{ $accountv2[$i][$j]['url_chat'] }}" data-cookie="{{ $accountv2[$i][$j]['cookie'] }}" data-urlchat= "{{ $accountv2[$i][$j]['url_chat'] }}" data-env="{{ $accountv2[$i][$j]['serectkey'] }}" data-image="{{ $accountv2[$i][$j]['image'] }}" data-name="{{ $accountv2[$i][$j]['name'] }}" id="check_{{ $i }}">
                                                                                  
										                                         <label for="selectgroup_{{ $accountv2[$i][$j]['zalo_id'] }}"></label>

										                                       </span>

										                                       @else
										                                        <span style="margin-left: 21px;"></span>
										                                       @endif
			                                                             
										                                         <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 50px;height: 50px;" src="{{ $accountv2[$i][$j]['image'] }}">

											                                {{ $accountv2[$i][$j]['name'] }}

											                            </p>
                                                                           {{--  @if($accountv2[$i][$j]['checkcookie'] != 1)
											                                <label class="switch " >

																				<input type="checkbox" class="primary checkprofilev_{{ $i }} selectepageprofile checkallprofile profile_{{ $accountv2[$i][$j]['zalo_id'] }}" data-type="profile" value="{{ $accountv2[$i][$j]['zalo_id'] }}"  url-chat="{{ $accountv2[$i][$j]['url_chat'] }}" data-cookie="{{ $accountv2[$i][$j]['cookie'] }}" data-urlchat= "{{ $accountv2[$i][$j]['url_chat'] }}" data-env="{{ $accountv2[$i][$j]['serectkey'] }}" data-image="{{ $accountv2[$i][$j]['image'] }}" data-name="{{ $accountv2[$i][$j]['name'] }}" id="check_{{ $i }}">

																				<span class="slider round"></span>

																			</label>
                                                                        @endif --}}
                                                                       
							                            	    	</div>
							                            	    
							                            	       
							                            	     
						                            	    @endfor
						                            	</div>
						                            	   
						                            	@endfor

		                                     @else

                                                @foreach($account as $row)

	                                                 @for ($i = 0; $i < count($role_profile); $i++)

													    @if($role_profile[$i] == $row->zalo_id)

                                                               <div class="col-md-2" style="    margin-top: 20px;">



		                                                	 <div class='groupName {{ $row->zalo_id }}Type' id='{{ $row->zalo_id }}'>

											                   <span>

							                                        <input type="checkbox" class="fbnode checkbox checkbox-style deleteaccount" name="selectGroup[2]" id="selectgroup_{{ $row->zalo_id }}" value="{{ $row->zalo_id }}">

							                                         <label for="selectgroup_{{ $row->zalo_id }}"></label>

							                                     </span>



							                                     <img style="border-radius: 50%; margin-right: 8px; border: solid 1px #ccc;width: 50px;height: 50px;" src="{{ $row->image }}">

									                                <span style=" font-size: 17px;color: #356bb2; font-weight: 600;">{{ $row->name }} @if($row->checkcookie == 1)(Cookie die) @endif</span>

									                                @if($row->checkcookie != 1)



									                                <label class="switch " >

																		<input type="checkbox" class="primary selectepageprofile checkallprofile profile_{{$row->zalo_id}}" data-type="profile" value="{{$row->zalo_id}}"  url-chat="{{$row->url_chat}}" data-cookie="{{$row->cookie}}" data-urlchat= "{{$row->url_chat}}" data-env="{{$row->serectkey}}" data-image="{{$row->image}}" data-name="{{$row->name}}">

																		<span class="slider round"></span>

																	</label>



																	@endif

		                                                      </div>

													    @endif

													@endfor

						                           

		                                            @endforeach

				                        	@endif

                                           



				                        </div>

				                       

				                    </div>

				                    <!-- Modal footer -->

				                    <div class="modal-footer">

				                        <span class="btn btn-danger" data-dismiss="modal">Đóng</span>

				                        {{-- <span class="btn btn-primary btn-save-pageprofile" data-dismiss="modal">Chọn</span> --}}

				                    </div>

				                </div>

				            </div>

				        </div>

				        <div id="loadimg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                    <div class="modal-body">

				                        <img src="" class="img-responsive content-img">

				                    </div>

				                </div>

				            </div>

				        </div>

				        <div id="loadvideo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                    <div class="modal-body">

				                        <img src="" class="img-responsive content-img">

				                    </div>

				                </div>

				            </div>

				        </div>

				        <!-- The Modal -->

				        <div class="modal" id="creategroup" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                    <!-- Modal Header -->

				                    <div class="modal-header bg-warning">

				                        <h4 class="modal-title">Tạo nhóm</h4>

				                        <button type="button" class="close" data-dismiss="modal">×</button>

				                    </div>

				                    <!-- Modal body -->

				                    <div class="modal-body">

				                       {{--  <div class="form-group">

				                            <label>Chọn tài khoản để lọc bạn bè:</label>

				                            <select class="accountaddgroup">

				                                <option value="0">--Chọn tài khoản--</option>

				                            </select>

				                        </div> --}}

				                        <div class="form-group">

											<label>Chọn tài khoản để lọc bạn bè</label>

											<select  class="accountaddgroup">

												<option value="0">--Chọn tài khoản--</option>

												@foreach($account as $row)

												@if($row->checkcookie !=1)

												<option value="{{$row->zalo_id}}">{{$row->name}}</option>

                                                 @endif

												@endforeach

											</select>

										</div>

				                        <div class="form-group">

				                            <label>Tên cuộc trò chuyện:</label>

				                           

				                            <input type="text" class="form-control border-teal border-1" id="namegroup"  placeholder="Nhập tại đây...">

				                            

				                        </div>

				                        <div class="form-group">

				                            <label>Mời bạn bè vào cuộc trò chuyện:</label>



				                            <input type="search" class="form-control border-teal border-1" id="searchfriend namegroup" onkeyup="searchfriend(this)">

				                            {{-- <em class="text-danger alert_friend">Vui chọn bạn bè để thêm vào nhóm</em> --}}

				                        </div>

				                        <div class="listfriendbyid" style="height: 200px;overflow: auto;">

				                        </div>

				                    </div>

				                    <!-- Modal footer -->

				                    <div class="modal-footer">

				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>

				                        <button type="button" class="btn btn-primary creategroupzalo">Tạo nhóm</button>

				                    </div>

				                </div>

				            </div>

				        </div>

				        <!-- The Modal -->

				        <div class="modal" id="nemberjoingroup" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                    <!-- Modal Header -->

				                    <div class="modal-header bg-warning">

				                        <h4 class="modal-title">Thêm thành viên nhóm</h4>

				                        <button type="button" class="close" data-dismiss="modal">×</button>

				                    </div>

				                    <!-- Modal body -->

				                    <div class="modal-body">

				                        <div class="form-group">

				                            <input type="search" name="" style="width: 100%;" id="searchfriend" onkeyup="searchnember(this)">

				                        </div>

				                        <div class="form-group">

				                            <input type="checkbox" class="nembergroupall checkbox checkbox-style" name="selectGroup[0]" id="selectgroup_all" onclick="checkbox(this)"><label for="selectgroup_all"></label>

				                            Chọn tất cả

				                        </div>

				                        <div class="listfriendjoingroup" style="height: 200px;overflow: auto;">

				                        </div>

				                    </div>

				                    <!-- Modal footer -->

				                    <div class="modal-footer">

				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>

				                        <button type="button" class="btn btn-primary  nemberjoingroupzalo">Thêm thành viên</button>

				                    </div>

				                </div>

				            </div>

				        </div>

								         <!-- The Modal -->

				        <div class="modal" id="sendsms" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                    <!-- Modal Header -->

				                    <div class="modal-header bg-warning">

				                        <h4 class="modal-title">Nhập nội dung kết bạn</h4>

				                    </div>

				                    <!-- Modal body -->

				                    <div class="modal-body" id="dataprofile">

				                        <input type="hidden" value="" name="id_friend" id="id_friend">

				                        <input type="hidden" value="" name="cookiev2" id="cookiev2">

				                        <input type="hidden" value="" name="serectkeyv2" id="serectkeyv2">

				                        <textarea id="content_mess" style="width: 100%;" placeholder="Nội dung kết bạn không quá 150 ký tự !" rows="8px"></textarea>

				                    </div>

				                    <!-- Modal footer -->

				                    <div class="modal-footer">

				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

				                        <button type="button" class="btn btn-primary " data-dismiss="modal" onclick="addfriendv2()">Gửi</button>

				                    </div>

				                </div>

				            </div>

				        </div>



				        <div class="modal" id="loadinfogroup" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                    <!-- Modal Header -->

				                    <div class="modal-header">

				                        <h4 class="modal-title">Thông tin nhóm</h4>

				                        <button type="button" class="close" data-dismiss="modal">×</button>

				                    </div>

				                    <!-- Modal body -->

				                    <div class="modal-body">

				                        <div class="col-md-12">

				                            <div style="text-align: center;">

				                                <h3 style="color: #008fe5;" class="tennhom">nhom dan choi</h3>

				                                <p style="color: #008fe5;" class="thanhvien">Thành viên: 2/1000</p>

				                            </div>

				                        </div>

				                        <div class="col-md-12 thanhvientrongnhom">

				                        </div>

				                    </div>

				                    <!-- Modal footer -->

				                    <div class="modal-footer">

				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

				                        <button type="button" class="btn btn-primary joingroup">Tham gia nhóm</button>

				                    </div>

				                </div>

				            </div>

				        </div>

				        <!-- The Modal -->

				        <div class="modal" id="sendmessallfriend" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                    <!-- Modal Header -->

				                    <div class="modal-header">

				                        <h4 class="modal-title">Gửi tin nhắn cho tất cả bạn bè</h4>

				                        <button type="button" class="close" data-dismiss="modal">×</button>

				                    </div>

				                    <!-- Modal body -->

				                    <div class="modal-body">

				                        <div class="form-group">

				                            <label>Chọn tài khoản để lọc bạn bè</label>

				                            <select onchange="choiceaccountbysendmess(this)" class="accountsendall">

				                                <option value="0">--Chọn tài khoản--</option>

				                            </select>

				                        </div>

				                        <div class="form-group">

				                            <label>Chọn bạn bè</label>

				                            <input type="search" name="" style="width: 100%;" id="searchfriend" onkeyup="searchfriend(this)">

				                        </div>

				                        <div class="form-group">

				                            <input type="checkbox" id="checkbox-all" class="check-all checkbox-style" name="selectAllGroup" onclick="checkallfriendv(this)">

				                            <label for="checkbox-all"></label>

				                            Chọn tất cả

				                        </div>

				                        <div class="listfriendmess" style="height: 200px;overflow: auto;">

				                        </div>

				                        <div class="form-group">

				                            <label>Nội dung cuộc tin nhắn</label>

				                            <div class="col-md-12 bt-inbox-reply" style="padding-left: 0px;padding-right: 0px;">

				                                <div class="bt-inbox-reply-content">

				                                    <textarea name="" class="contentall" style="display: none;"></textarea>

				                                    <div class="emojionearea contentall" role="application">

				                                        <div class="emojionearea-editor" contenteditable="true" placeholder="Nhập tin nhắn ... (Bấm Shift + Enter để xuống dòng)" tabindex="0" dir="ltr" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off"></div>

				                                        <div class="emojionearea-button" title="Use the TAB key to insert emoji faster">

				                                            <div class="emojionearea-button-open"></div>

				                                            <div class="emojionearea-button-close"></div>

				                                        </div>

				                                        

				                                    </div>

				                                </div>

				                                <div class="bt-submit-reply">

				                                    <div class="bt-make-file pull-left">

				                                        <div class="bt-submit-reply">

				                                            <div class="bt-make-file pull-left">

				                                                <i style="color: #BBBBBB" class="bt-open-temp-chat fa fa-commenting-o" aria-hidden="true"></i>

				                                                <div class="bt-drop-chattemp">

				                                                    <div class="title-drop">

				                                                        <a><span>Tin nhắn mẫu</span></a>

				                                                    </div>

				                                                    <ul class="bt-content-drop">

				                                                    </ul>

				                                                </div>

				                                            </div>

				                                            <div class="bt-make-file pull-left mediaLibraryImage" style="padding-left: 5px;">

				                                                <i class="fa fa-image"></i>

				                                            </div>

				                                        </div>

				                                    </div>

				                                </div>

				                            </div>

				                        </div>

				                    </div>

				                    <!-- Modal footer -->

				                    <div class="modal-footer" style="">

				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>

				                        <button type="button" class="btn btn-primary" onclick="sendallmess()">Gửi tin nhắn</button>

				                    </div>

				                </div>

				            </div>

				        </div>

				        <div id="mediaLibModalImage" class="modal fade" role="dialog" tabindex="-1" data-backdrop="true" style="display: none;">

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

				        <!-- New zalo account modal -->

				        <div id="themqr" class="modal" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                	<div class="modal-header bg-success">

						                <h5 class="modal-title">Thêm Cookie</h5>

						                <button type="button" class="close" data-dismiss="modal">×</button>

						            </div>

				                    {{-- <div class="modal-header">

				                        <button type="button" class="close" data-dismiss="modal">×</button>

				                        <h4 class="modal-title">Thêm cookie</h4>

				                    </div> --}}

				                    <div class="modal-body contentqr" style="text-align: center;">

				                    	<div class="col-12">

						                    <div class="alertBox">

						                    	<p class="QR_code"></p>

						                    </div>

		                                   

						                </div>

				                    </div>

				                    <div class="modal-footer">

				                        <input type="hidden" name="" class="idzalo_cookie" value="">

				                        <button type="button" class="btn btn btn-danger" data-dismiss="modal" style="color: #FFF;">Close</button>

				                    </div>

				                </div>

				            </div>

				        </div>

				        <!-- The Modal -->

				        <div class="modal" id="createtag" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                    <!-- Modal Header -->

				                    <div class="modal-header bg-warning">

				                        <h4 class="modal-title">Tạo thẻ phân loại</h4>

				                        <button type="button" class="close" data-dismiss="modal">×</button>

				                    </div>

				                    <!-- Modal body -->

				                    <div class="modal-body">

				                       

				                        <div class="form-group">

				                            <label>Nhập tên:</label>

				                            {{-- <input type="text" name="" style="width: 100%;" id="nametag"> --}}

												

												<div class="input-group">

													<span class="input-group-prepend">

														<span class="input-group-text">

															<i class="icon-price-tags2" id="icontag"></i>

														</span>

													</span>



													<input type="text" class="form-control" id="nametag">

													<input type="text" class="form-control jscolor" id="jscolor" value="ffffff" hidden>

												</div>									



				                        </div>

				                        <div class="form-group">

				                            <label>Chọn màu:</label>

				                            <div class="flx">

											    <div class="filter-color-item color0 selected"  id="btn1" style="background: rgb(241, 44, 67);"></div>

											    <div class="filter-color-item color1" id="btn2"style="background: rgb(241, 107, 122);"></div>

											    <div class="filter-color-item color2" id="btn3" style="background: rgb(255, 139, 3);"></div>

											    <div class="filter-color-item color3" id="btn4" style="background: rgb(245, 212, 113);"></div>

											    <div class="filter-color-item color4" id="btn5" style="background: rgb(31, 197, 121);"></div>

											    <div class="filter-color-item color5" id="btn6" style="background: rgb(0, 179, 218);"></div>

											    <div class="filter-color-item color6" id="btn7" style="background: rgb(4, 126, 213);"></div>

											    <div class="filter-color-item color7" id="btn8" style="background: rgb(117, 99, 208);"></div>

											</div>

				                            {{-- <input name="color_tag" class="jscolor form-control" value="ffffff" autocomplete="off" style="background-image: none; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"> --}}

				                        </div>

				                    </div>

				                    <!-- Modal footer -->

				                    <div class="modal-footer">

				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

				                        <button type="button" class="btn btn-primary createtagall">Tạo Tag</button>

				                    </div>

				                </div>

				            </div>

				        </div>



				        {{-- Modal tạo mới tin nhắn mẫu --}}

				        <div class="modal" id="messagesample" style="display: none;">

				            <div class="modal-dialog">

				                <div class="modal-content">

				                	{{ csrf_field() }}

				                    <!-- Modal Header -->

				                    <div class="modal-header bg-warning">

				                        <h4 class="modal-title">Thêm mới tin nhắn mẫu</h4>

				                        <button type="button" class="close" data-dismiss="modal">×</button>

				                    </div>

				                    <!-- Modal body -->

				                    <div class="modal-body">

				                       

				                        <div class="form-group">

				                            <label>Nhập tiêu đề:</label>

												<div class="input-group">

													

													<input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề ở đây...">

													

												</div>									

                                               <em class="text-danger alert_content">Vui lòng nhập tiêu đề</em>

				                        </div>

				                        <div class="form-group">

				                            <label class="title_text">Nội dung:</label>

				                            <p class="lead emoji-picker-container">

				                                <textarea name="message" cols="30" rows="5" class="form-control" placeholder="Nhập nội dung ở đây..." data-emojiable="converted" data-id="5a88f64d-c08e-4812-9ccb-bc6ff44c1111" data-type="original-input" style="display: none;"></textarea>

				                                <div class="emojionearea bt-make-input-message" id="contentmess" role="application"></div>



				                            </p>

				                            <em class="text-danger alert_content">Vui lòng nhập nội dung</em>

				                        </div>

				                       <div class="alert alert-success thongbao" style="display: none; background-color: #00a65a; color: #FFF;"></div>

				                    </div>

				                    <!-- Modal footer -->

				                    <div class="modal-footer">

				                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

				                        <button type="button" class="btn btn-primary createmessage" onclick="createmessage()">Thêm mới</button>

				                    </div>

				                </div>

				            </div>

				        </div>

				        <div id="questionMarkId" style="display: none;">

				            <ul class="dropdown-menu tagbyprofileall" style="display: block;">

				            </ul>

				        </div>

				    </section>

			{{-- end main	 --}}

<script language="javascript">



	  var mautag1 = document.getElementById("btn1");

            var mautag2 = document.getElementById("btn2");

            var mautag3 = document.getElementById("btn3");

            var mautag4 = document.getElementById("btn4");

            var mautag5 = document.getElementById("btn5");

            var mautag6 = document.getElementById("btn6");

            var mautag7 = document.getElementById("btn7");

            var mautag8 = document.getElementById("btn8");

            var div = document.getElementById('nametag');

            var tag = document.getElementById('icontag');



            // Thiết lập click cho mautag1

            mautag1.onclick = function () {

                div.style.color = "#f12c43";

                tag.style.color = "#f12c43";

                $('.jscolor').attr('value','f12c43');

                 $('.filter-color-item').removeClass('selected');

                $('#btn1').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn1').append('<i class="icon-checkmark4"></i>');

            };



            mautag2.onclick = function () {

                div.style.color = "#f16b7a";

                tag.style.color = "#f16b7a";

                $('.jscolor').attr('value','f16b7a');

                $('.filter-color-item').removeClass('selected');

                $('#btn2').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn2').append('<i class="icon-checkmark4"></i>');

                

            };

            mautag3.onclick = function () {

                div.style.color = "#ff8b03";

                tag.style.color = "#ff8b03";

                $('.jscolor').attr('value','ff8b03');

                 $('.filter-color-item').removeClass('selected');

                $('#btn3').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn3').append('<i class="icon-checkmark4"></i>');

               

            };

            mautag4.onclick = function () {

                div.style.color = "#f5d471";

                tag.style.color = "#f5d471";

                $('.jscolor').attr('value','f5d471');

                 $('.filter-color-item').removeClass('selected');

                $('#btn4').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn4').append('<i class="icon-checkmark4"></i>');



            };

            mautag5.onclick = function () {

                div.style.color = "#1fc579";

                tag.style.color = "#1fc579";

                $('.jscolor').attr('value','1fc579');

                 $('.filter-color-item').removeClass('selected');

                $('#btn5').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn5').append('<i class="icon-checkmark4"></i>');

            };

            mautag6.onclick = function () {

                div.style.color = "#00b3da";

                tag.style.color = "#00b3da";

                $('.jscolor').attr('value','00b3da');

                 $('.filter-color-item').removeClass('selected');

                $('#btn6').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn6').append('<i class="icon-checkmark4"></i>');

            };

            mautag7.onclick = function () {

                div.style.color = "#047ed5";

                tag.style.color = "#047ed5";

                 $('.jscolor').attr('value','047ed5');

                  $('.filter-color-item').removeClass('selected');

                $('#btn7').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn7').append('<i class="icon-checkmark4"></i>');

            };

            mautag8.onclick = function () {

                div.style.color = "#7563d0";

                tag.style.color = "#7563d0";

                $('.jscolor').attr('value','7563d0');

                 $('.filter-color-item').removeClass('selected');

                $('#btn8').addClass('selected');

                $("i.icon-checkmark4").remove();

                $('#btn8').append('<i class="icon-checkmark4"></i>');

            };
            function submit_account(ob){
              
	   	     var check_page = 0;
			 var profilecheck = [];
			 var html = '';
            $('.checkprofilev_'+ob+':checked').each(function(i,value){
		  	   check_page = 1;

				profilecheck.push($(this).val());
				html += $(this).attr('data-name')+',';
				var data = '{"cookie":"'+$(this).attr('data-cookie')+'","serectkey":"'+$(this).attr('data-env')+'","urlchat":"'+$(this).attr('url-chat')+'","id_profile":"'+$(this).val()+'"}';
				var datav2 = '{"page": 1, "count": 100, "cookie":"'+$(this).attr('data-cookie')+'","serectkey":"'+$(this).attr('data-env')+'","id_profile":"'+$(this).val()+'"}';
				
				var id_profile = $(this).val();
				$("li").remove(".checktabs_"+id_profile);
				$('.nav-tabs').append('<li class="nav-item nav-accountzalo checktabs_'+id_profile+'" onclick="activetab(this,\'#menu'+i+'\')"><a class="nav-link newmes_'+$(this).val()+'" style="float: left;">'+$(this).attr('data-name')+'<div style="width: fit-content;background: red;border-radius: 50%;float: right;margin-top: -5px;"><span style="color: white;padding: 7px;" class="loadtinnhanmoi homenewmess countmess_'+$(this).val()+'" data-tinnhan="0"></span></div></li>');
				$('.tab-content').removeClass('mb-1');
				$('.tab-content').append('<div id="menu'+i+'" class="tab-pane fade tabzalo_'+$(this).val()+'"></div>');
				$('#menu'+i+'').html($('#home').html());

	        });
	        var k = 0;

			for (var i = 0; i < profilecheck.length; i++) {
				setTimeout(function timer(){
					 var cookie = $('.profile_'+profilecheck[k]).data('cookie');
					 var serectkey = $('.profile_'+profilecheck[k]).data('env');
					 var urlchat = $('.profile_'+profilecheck[k]).data('urlchat');
					 var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","urlchat":"'+urlchat+'","id_profile":"'+profilecheck[k]+'"}';
				     var datav2 = '{"page": 1, "count": 100, "cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_profile":"'+profilecheck[k]+'"}';
				     setTimeout(function timer(){
                        socket.emit('getfriendnew',data);
				     },i*12000);
				     setTimeout(function timer(){
                       socket.emit('getnamev2',datav2);
				     },i*13000);
					 socket.emit('messprofile',data);
					
					//socket.emit('gettag',data);

					 k++;
				},i*10000);
			}

			// localStorage.setItem("selectprofile", JSON.stringify(profilecheck));
			if (check_page == 0) {
				alertBox('Vui lòng chọn tài khoản',"danger",false,true,true);
				return false;
			} else {
				$('.choiceaccount').html(html.replace(/,+$/,''));
			}
	   }

	     function runAccount_zalo(ob){
		   	var _token = $('input[name="_token"]').val();
	          $.ajax({
			            url: '{{ url('chat/getInforAccount') }}',
			            type: 'post',
			            dataType: 'json',
			            data: {cateId:ob, _token:_token},
			           
			            success:function(result){
			            	var  k = 0;
			            	var n = 0;
			            	var check = [];

			                if(result.status == 200){
			                    for (var i = 0; i < result.data.length; i++) {
			                    	if(result.data[i].checkcookie != 1){
			                    		// console.log(result.data);
			                    		var id_zalo = result.data[i].zalo_id;
                                        var cookie = result.data[i].cookie;
				                    		var serectkey = result.data[i].serectkey;
				                    		var urlchat =  result.data[i].url_chat;
				                    		var id_profile = result.data[i].zalo_id;
				                    		check.push(id_profile);
				                    		var data = '{"cookie":"'+cookie+'","serectkey":"'+serectkey+'","urlchat":"'+urlchat+'","id_profile":"'+id_profile+'"}';
				                    		var datav2 = '{"page": 1, "count": 100, "cookie":"'+cookie+'","serectkey":"'+serectkey+'","id_profile":"'+id_profile+'"}';

	                                    $("li").remove(".checktabs_"+id_zalo);
			                    		$('.nav-tabs').append('<li class="nav-item nav-accountzalo checktabs_'+id_zalo+'" onclick="activetab(this,\'#menu'+k+'\')"><a class="nav-link newmes_'+id_zalo+'" style="float: left;">'+result.data[i].name+'<div style="width: fit-content;background: red;border-radius: 50%;float: right;margin-top: -5px;"><span style="color: white;padding: 7px;" class="loadtinnhanmoi homenewmess countmess_'+id_zalo+'" data-tinnhan="0"></span></div></li>');
										$('.tab-content').removeClass('mb-1');
										$('.tab-content').append('<div id="menu'+k+'" class="tab-pane fade tabzalo_'+id_zalo+'"></div>');
										$('#menu'+k+'').html($('#home').html());
										k++;
                                         
			                    		
			                    		
			                    	}
			                    }
			                    var k = 0;

			                    for (var i = 0; i < check.length; i++) {
			                    	
			                    	setTimeout(function timer(){
			                    			
			                    			if(check.checkcookie != 1){
			                    				
			                    				var cookie1 = $('.profile_'+check[k]).data('cookie');
					                    		var serectkey1 = $('.profile_'+check[k]).data('env');
					                    		var urlchat1 =  $('.profile_'+check[k]).data('urlchat');
					                    		var id_profile1 = check[k];
					                    		var data1 = '{"cookie":"'+cookie1+'","serectkey":"'+serectkey1+'","urlchat":"'+urlchat1+'","id_profile":"'+id_profile1+'"}';
					                    		var datav21 = '{"page": 1, "count": 100, "cookie":"'+cookie1+'","serectkey":"'+serectkey1+'","id_profile":"'+id_profile1+'"}';
	                                            
				                    		   socket.emit('messprofile',data1);
	                                           socket.emit('getnamev2',datav21);
	                                           socket.emit('getfriendnew',data1);
			                    			}

                                            k++;
                                           
			                    		},i*3000);
			                    }
			                     
			                }
			            },
			        });
		   }

		   function sendDataAccount(zaloid){
		   	 var cookie = $('.profile_'+zaloid).data('cookie');
			 var serectkey = $('.profile_'+zaloid).data('env');
			 var urlchat = $('.profile_'+zaloid).data('urlchat');
			 console.log(serectkey);


                
		   }

</script>



     </div>



				@stop