@extends('master')
@section('title','Officall - Thêm sản phẩm')
@section('main')
  <!-- Content area -->
			<div class="content" style="background-color: #FFFF;">
				<style>
					.content-bc-compose .content-bc-compose-inside {
					    position: relative;
					    max-width: 100%;
					    height: 100%;
					    margin: 0 auto;
					}
					.content-bc-compose-inside .title-cbc {
					    display: block;
					    /* margin-bottom: 24px; */
					    color: #000;
					    font-size: 2.125em;
					    font-weight: bold;
					}
					.form-default .label-group {
					    display: block;
					    position: relative;
					    float: left;
					    margin-bottom: 20px;
					    padding: 6px 15px;
					    color: #57576B;
					    font-size: 1em;
					    font-weight: 500;
					    line-height: 1;
					    border-radius: 30px;
					    -moz-border-radius: 30px;
					    -webkit-border-radius: 30px;
					}
					.form-default .line-form {
					    position: relative;
					    clear: both;
					    margin-bottom: 10px;
					}
					.pad-left-180 {
					    padding-left: 180px!important;
					}
					.form-default .line-form .label {
					    position: absolute;
					    top: 0;
					    left: 0;
					    padding-top: 6px;
					    color: #333;
					    font-size: 0.75rem;
					    font-weight: bold;
					}
					.align-right {
					    text-align: right;
					}
					.form-default .line-form.pad-left-180 .label {
					    width: 170px;
					}
					.form-default .line-form .label i {
					    font-style: normal;
					    color: #f00;
					}
					.form-default .line-form .ctn-line {
					    position: relative;
					    display: block;
					}
					/*input, select, textarea {
					    display: inline-block;
					    background-color: #fff;
					    width: 100%;
					    padding: 6px 10px 7px;
					    font-size: 0.75rem;
					    font-family: "Roboto", "Helvetica Neue", "Helvetica", Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif;
					    border: 1px solid #ccc;
					    -webkit-box-shadow: 0 1px 1px 0 rgba(218, 218, 218, 0.5);
					    box-shadow: 0 1px 1px 0 rgba(218, 218, 218, 0.5);
					}*/
					.ctn-line input{
						 display: inline-block;
					     background-color: #fff;
					     width: 100%;
					     padding: 6px 10px 7px;
					     font-size: 0.75rem;
					     font-family: "Roboto", "Helvetica Neue", "Helvetica", Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif;
					     border: 1px solid #ccc;
					     -webkit-box-shadow: 0 1px 1px 0 rgba(218, 218, 218, 0.5);
					     box-shadow: 0 1px 1px 0 rgba(218, 218, 218, 0.5);
					}
					.line-form textarea{
						 display: inline-block;
					     background-color: #fff;
					     width: 100%;
					     padding: 6px 10px 7px;
					     font-size: 0.75rem;
					     font-family: "Roboto", "Helvetica Neue", "Helvetica", Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif;
					     border: 1px solid #ccc;
					     -webkit-box-shadow: 0 1px 1px 0 rgba(218, 218, 218, 0.5);
					     box-shadow: 0 1px 1px 0 rgba(218, 218, 218, 0.5);
					}
					.form-default .line-form {
					    position: relative;
					    clear: both;
					    margin-bottom: 10px;
					}
					#category-dropdown {
					    max-width: 290px;
					}
					.wrap-multiselect {
					    display: block;
					    position: relative;
					    background-color: #fff;
					    width: 100%;
					    padding: 0!important;
					    font-size: 0.75rem;
					    font-family: "Roboto", "Helvetica Neue", "Helvetica", Arial, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif;
					    border: 1px solid #ddd;
					    -webkit-box-shadow: 0 1px 1px 0 rgba(218, 218, 218, 0.5);
					    box-shadow: 0 1px 1px 0 rgba(218, 218, 218, 0.5);
					}
					.form-default .line-form .ctn-line .btn-add {
					    position: absolute;
					    top: 0;
					    right: 0;
					}
					.btn.btn-default {
					    color: #008fe5;
					    background-color: #fff;
					    border-color: #008fe5;
					    -webkit-box-shadow: 0 1px 1px 0 rgba(197, 197, 197, 0.5);
					    box-shadow: 0 1px 1px 0 rgba(197, 197, 197, 0.5);
					}
					.btn.btn-sm {
					    padding: 6px 10px;
					    font-size: 0.75rem;
					}
					.content-bc-compose .split-form.sub.in-store {
					    width: 370px;
					}
					.content-bc-compose .split-form.sub {
					    position: absolute;
					    /*top: 54px;*/
					    right: 0;
					    z-index: 12;
					    /*width: 320px;*/
					    padding-left: 30px;
					}
					.form-default .line-form.line-block .label {
					    position: static;
					    display: block;
					    width: auto;
					    margin-bottom: 5px;
					}
					.form-default .line-form .suggestion-label {
					    color: #999;
					    font-size: 0.688rem;
					    font-style: normal;
					}
					.box-img-store {
					    border: none;
					    margin-bottom: 0px;
				     }
				     .box-img-store {
					    position: relative;
					    background-color: #e8e8e8;
					    width: 100%;
					    height: 100%;
					    margin-bottom: 15px;
					    -webkit-box-shadow: 0 1px 2px 0 rgba(174, 174, 174, 0.5);
					    box-shadow: 0 1px 2px 0 rgba(174, 174, 174, 0.5);
					    border: 1px dashed #b5c2cb;
					}
					/*.box-img-store .box-img-store-ins {
					    position: absolute;
					    top: -80px;
					    left: -80px;
					    width: 500px;
					    height: 500px;
					    -webkit-transform: scale(0.68);
					    -moz-transform: scale(0.68);
					    -ms-transform: scale(0.68);
					    -o-transform: scale(0.68);
					    transform: scale(0.68);
					}*/
					.cropit-image-preview {
					    background-color: #f8f8f8;
					    background-size: cover;
					    border-radius: 3px;
					   /* width: 505px;*/
					    height: 252px;
					    cursor: move;
					}
					.icz-img {
					    position: absolute;
					    top: 50%;
					    left: 50%;
					    margin-top: -24px;
					    margin-left: -29px;
					}
					.icz.icz-img {
					    background-position: 0 -234px;
					    width: 57px;
					    height: 47px;
					}
					.icz {
					    display: inline-block;
					    background-image: url(https://oa.zalo.me/managestore/images/main_sprites_zoa_1x.1.0.25.png);
					    background-repeat: no-repeat;
					    width: 24px;
					    height: 24px;
					    vertical-align: middle;
					    text-indent: -9999px;
					}
					.box-img-store .img-fake {
					    display: block;
					    width: 100%;
					    height: auto;
					}
					.popover {
					    background-clip: padding-box;
					    background-color: #fff;
					    border: 1px solid rgba(0, 0, 0, 0.2);
					    border-radius: 6px;
					    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
					    display: none;
					    left: 0;
					    max-width: 500px;
					    padding: 1px;
					    position: absolute;
					    text-align: left;
					    top: 0;
					    white-space: normal;
					    z-index: 1010;
					}
					.popover-info-why.pos-left {
					    left: 24px;
					    right: inherit;
					}
					.dimension-input {
					    max-width: 57px;
					    margin-right: 5px;
					}
					.block-variation {
					    background-color: #f6f7f9;
					    margin-bottom: 10px;
					    padding: 10px 0;
					    border-radius: 4px;
					    -moz-border-radius: 4px;
					    -webkit-border-radius: 4px;
					}
					.block-variation .line-b-var {
					    position: relative;
					    padding: 10px 15px;
					    padding-left: 140px;
					}
					.block-variation .line-b-var .label-var {
					    position: absolute;
					    top: 20px;
					    left: 20px;
					    color: #191919;
					    font-size: 0.813em;
					    font-weight: bold;
					}
					.block-variation .line-b-var .ctn-var ul.list-var1 li {
					    float: left;
					}
					ol, ul, ul li {
					    list-style: none;
					}
					.block-variation .line-b-var .ctn-var ul.list-var1 li a {
					    display: block;
					    position: relative;
					    background-color: #fff;
					    margin-right: 7px;
					    padding: 7px 10px;
					    color: #191919;
					    font-size: 0.813em;
					    border-radius: 4px;
					    -moz-border-radius: 4px;
					    -webkit-border-radius: 4px;
					    -webkit-box-shadow: inset 0 0 0 1px #eaeaea;
					    box-shadow: inset 0 0 0 1px #eaeaea;
					}
					.content-bc-compose .content-bc-compose-inside .bottom-cbc {
					    position: relative;
					    clear: both;
					    padding-bottom: 30px;
					    padding-top: 20px;
					}
					.btn.applyBtn, .btn.btn-primary {
					    color: #fff;
					    background-color: #008fe5;
					    border-color: #008fe5;
					    -webkit-box-shadow: 0 1px 1px 0 rgba(197, 197, 197, 0.5);
					    box-shadow: 0 1px 1px 0 rgba(197, 197, 197, 0.5);
					}
					.content-bc-compose .content-bc-compose-inside .bottom-cbc .btn.fl {
					    margin-right: 10px;
					}
					.btn {
					    display: inline-block;
					    background-color: #fff;
					    padding: 6px 12px;
					    vertical-align: middle;
					    cursor: pointer;
					    border: 1px solid #ddd;
					    white-space: nowrap;
					    -webkit-box-shadow: 0 1px 1px 0 rgba(197, 197, 197, 0.2);
					    box-shadow: 0 1px 1px 0 rgba(197, 197, 197, 0.2);
					    color: #000;
					    font-size: 0.875rem;
					    font-weight: 500;
					    text-align: center;
					    line-height: 1.42857;
					    -webkit-user-select: none;
					    -moz-user-select: none;
					    -ms-user-select: none;
					    user-select: none;
					    border-radius: 3px;
					    -moz-border-radius: 3px;
					    -webkit-border-radius: 3px;
					}
					.box-img-store .func-upload {
					    position: absolute;
					    bottom: 10px;
					    right: 10px;
					    z-index: 3;
					    background-color: rgba(0, 0, 0, 0.15);
					    width: 50px;
					    height: 50px;
					    border-radius: 100%;
					    -moz-border-radius: 100%;
					    -webkit-border-radius: 100%;
					}
					#image_file {
					    width: 0.1px;
					    height: 0.1px;
					    opacity: 0;
					    overflow: hidden;
					    position: absolute;
					    z-index: -1;
					}
					.class_label_image {
					    display: inline-block;
					    position: relative;
					    width: 50px;
					    height: 50px;
					    cursor: pointer;
					    position: absolute;
					    top: 10px;
					    left: 10px;
					    content: "";
					    background: url(https://oa.zalo.me/managestore/images/main_sprites_zoa_1x.1.0.1.png) -204px -204px no-repeat;
					    width: 30px;
					    height: 30px;
					}
					input[type="range"] {
					    box-shadow: none;
					    padding: 0px;
					    margin-top: 5px;
					    cursor: pointer;
					}
					.form-default .line-form .ctn-line .tips {
					    color: #999;
					    font-size: 0.75rem;
					    line-height: 20px;
					}
                   /*thumnai*/
                   .each-img-upload {
					    width: 74px;
					    margin-right: 5px;
					    margin-bottom: 5px;
					}
					.each-img-upload {
					    float: left;
					    position: relative;
					}
					.delete-img {
					    position: absolute;
					    top: 3px;
					    right: 4px;
					    opacity: .3;
					    color: red;
					    border: 1px solid red;
					    z-index: 10;
					}
					.each-img {
					    width: 100%;
					    height: 76px;
					    margin-bottom: 5px;
					    border: 1px dashed #1791f2;
					}
					.each-img img {
					    max-height: 100px;
					    max-width: 100%;
					}
					.image_upload {
					    width: 100%;
					    height: auto;
					    min-height: 50px;
					}
					.each-img i {
					    color: #1791f2;
					    font-size: 15px;
					    border-radius: 50%;
					    border: 1px solid #1791f2;
					    padding: 7px;
					}
					/*css phần tài khoản zalo OA*/
					.example-2 {
                        position: relative;
                        overflow-y: scroll;
                        height: 372px;
                    }
                    .bt-load-chat {
					    padding: 10px;
					    padding-right: 0px;
					    border-bottom: 1px solid #e0e6ed;
					    float: left;
					    width: 100%;
					}
					.bt-avatar-user-chat {
					    vertical-align: middle;
					    border-radius: 50%;
					    overflow: hidden;
					    width: 50px;
					    height: 50px;
					    position: relative;
					    top: 5%;
					    float: left;
					    margin-right: 10px;
					    margin-top: 1%;
					}
					.bt-avatar-user-chat img {
					    width: 100%;
					    height: 100%;
					    object-fit: cover;
					}
					.bt-name-chat {
					    text-overflow: ellipsis;
					    width: 117px;
					    overflow: hidden;
					    white-space: nowrap;
					}
					.bt-load-chat .bt-content-chat, .owl-page {
					    float: left;
					    width: calc(100% - 80px);
					}
					.owl-tag {
					    float: right;
					}
					.wrap-color {
					    width: 70%;
					    text-align: right;
					}
				</style>
				<div class="page-broadcast-inside ng-scope" ng-app="productModule" ng-controller="productController">
					 	<div class="modalBox"><div class="alert alert-danger alert-styled-left alert-dismissible" style="border-color:#e53935;"><button type="button" class="close" data-dismiss="alert"><span>×</span></button><span class="fa fa-undefined-sign" aria-hidden="true"></span>&nbsp;Đang cập nhật tính năng. Xin cảm ơn!</div></div>
	<div class="content-bc-compose autoHeight" style="height: 30px;">
		<div class="content-bc-compose-inside form-default">
			<span class="title-cbc fl" id="header_name">Thêm sản phẩm mới</span>
			<div class="clear"></div>

			<form id="product_form" enctype="multipart/form-data" class="ng-pristine ng-valid ng-valid-min ng-valid-max ng-valid-pattern">
				{{ csrf_field() }}        
				<input type="hidden" name="id" id="productId" autocomplete="off">
				<input type="hidden" name="originalPrice" id="originalPrice" autocomplete="off">
				<input type="hidden" name="discountPercent" id="discountPercent" autocomplete="off">
				<input type="hidden" name="isAcceptPause" id="isAcceptPause" autocomplete="off">
				<input type="hidden" name="priceDiscount" id="priceDiscount" autocomplete="off">
				<input type="hidden" name="contactPrice" ng-value="isContactsPrice()" autocomplete="off" value="false">
				<input type="hidden" name="adId" id="adId" autocomplete="off">
				<input type="hidden" name="adUrl" id="adUrl" autocomplete="off">
				<input type="hidden" name="attributeTypeIdList" id="attributeTypeIdList" autocomplete="off">
				<input type="hidden" name="variationList" id="variationList" autocomplete="off" value="[]">
				<input type="hidden" name="hasCustomVariation" id="hasCustomVariation" autocomplete="off">
				<input type="hidden" name="variationListBackup" id="variationListBackup" autocomplete="off">
				<input type="hidden" name="shippingBoxmeIntegrated" id="shippingBoxmeIntegrated" value="false" autocomplete="off">

				<div class="split-form main in-store">
					<div class="alert alert-danger" id="alert_error" style="display: none"></div>
					<div class="alert alert-success" id="alert_success" style="display: none"></div>
					<span class="label-group">Thông tin cơ bản</span>
					<div class="line-form pad-left-180">
						<label class="label align-right">Tên sản phẩm (<i>*</i>)</label> 
						<span class="ctn-line"> 
							<input type="text" name="name" id="name" placeholder="Tên sản phẩm" style="max-width: 350px">
						</span>
					</div>
					<div class="line-form pad-left-180">
						<div id="err_name" class="err-field"></div>
					</div>
					<div class="line-form pad-left-180">
						<label class="label align-right">Giá sản phẩm (<i>*</i>)</label>
						<div class="ctn-line">
							<div style="display: inline-block; position: relative; width: 350px; margin-right: 20px;">
								<input id="price" name="price" {{-- onkeypress="validateNumber(event);" onkeyup="validatePrice();"  type="text" ng-model="productPrice" ng-disabled="variationList.length > 0 || isContactsPrice()" ng-change="productPrice = formatPrice(productPrice); onProductPriceChange(productPrice)" ng-init="initProductPrice()" --}} class="ng-pristine ng-untouched ng-valid ng-empty">
							
							</div>
						
						</div>
					</div>
					<div class="line-form pad-left-180">
						<!-- ngIf: variationList.length == 0 --><div id="err_price" class="err-field ng-scope" ng-if="variationList.length == 0"></div><!-- end ngIf: variationList.length == 0 -->
					</div>
					<div class="line-form pad-left-180">
						<label class="label align-right">Mã sản phẩm (<i>*</i>)</label>
						<span class="ctn-line"> 
							<input type="text" ng-disabled="variationList.length > 0" style="max-width: 350px" name="code" id="code"> 
							<input type="hidden" name="originalCode" id="originalCode" autocomplete="off">
						</span>
					</div>
					<div class="line-form pad-left-180">
						<div id="err_code" class="err-field"></div>
					</div>
					<div class="line-form pad-left-180">
						<label class="label align-right">Số lượng: </label> 
						<span class="ctn-line"> 
							<input id="quantityInput" type="number" name="quantity" style="max-width: 100px" min="1" max="100000" step="1" hide-zero="" ng-model="productQuantity" title=" " pattern="\d*" ng-keypress="onQuantityEnter($event)" ng-change="onQuantityChange();" class="ng-pristine ng-untouched ng-valid ng-empty ng-valid-min ng-valid-max ng-valid-pattern"> 
							<br>
							
							<span id="tip_quantity" class="tips">
								Tối thiểu 1 và tối đa 100,000 sản phẩm. Bấm <a ng-click="changeQuantityModal(0)">vào đây</a> để cập nhật
								<input id="quantityEnable" type="number" style="display: none;" name="quantityEnable" ng-model="quantityEnable" class="ng-pristine ng-untouched ng-valid ng-empty">
							</span>
						</span>
					</div>
					<div class="line-form pad-left-180">
						<div id="err_quan" class="err-field"></div>
					</div>
					<div class="space x2"></div>
					<div class="line-form pad-left-180">
						<label class="label align-right">Loại sản phẩm (<i>*</i>)</label>
						<div id="productTypeMenu" class="ctn-line dropdown keep-open">
							<span class="wrap-select" id="dLabel1" data-toggle="dropdown" aria-expanded="true"> 
								<!-- ngIf: !productTypeSelected --><i ng-if="!productTypeSelected" class="ng-scope">Chọn loại sản phẩm</i><!-- end ngIf: !productTypeSelected --> 
								<!-- ngIf: productTypeSelected -->
								<input id="productType" type="hidden" name="productType" autocomplete="off">
							</span>
							
							
						</div>
						<span id="err_productType" class="error" style="display: none;"></span>
					</div>
					{{-- <div class="line-form pad-left-180">
						<label class="label align-right">Danh mục</label> 
						<span class="ctn-line" style="max-width: 350px"> 
							 
						
						</span>
					</div> --}}
					<div class="line-form pad-left-180">
						<div id="err_collectionId" class="err-field"></div>
					</div>
					<div id="content_extra"></div>
				
				</div>
				<div class="split-form sub in-store" style="top: 45px">
					<p class="line-form line-block">
						<label class="label">Ảnh sản phẩm (<i>*</i>)</label>
						<span class="suggestion-label">Tối đa 10 ảnh. Mỗi ảnh tối đa 1 Mb.</span>
					</p>
					<div class="alert alert-danger" id="alert_error_image" style="display: none"></div>
					<div class="alert alert-success" id="alert_success_image" style="display: none"></div>
					{{-- <div id="image-editor" class="image-editor">
						<div class="box-img-store">
							<div class="box-img-store-ins cropit-image-preview product-review" crossorigin="Anonymous" style="background-repeat: no-repeat;">
							</div>
							<i class="icz icz-img icon-review"></i> 
							<img class="img-fake" id="avatarPro" src="/managestore/images/fake_1x1.png" alt="">
							<a href="javascript:void(0);" class="func-upload buttonAction">
								<input type="file" id="image_file" name="image_file" class="upload" onchange="changeImageProduct(this);" accept="image/*" multiple=""> 
								<label class="class_label_image" for="image_file"></label>
							</a>
						</div>
						<input type="range" class="cropit-image-zoom-input buttonAction" style="margin-bottom: 10px" min="0" max="1" step="0.01">
					</div> --}}
					{{-- <a href="javascript:void(0);" class="btn btn-default btn-sm buttonAction" onclick="choseImage();">
						Lưu hình ảnh
					</a> --}}
					<div class="space x2"></div>
					<input type="hidden" id="data_root" name="data_root" autocomplete="off">
					<div class="box-lib-img-store">
						<div class="sortable ui-sortable" style="margin: 10px;">
								<div class="each-img-upload ui-sortable-handle" id="i0">
									{{-- <i class="far fa-trash-alt btn btn-outline-warning delete-img d-none"></i> --}}
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img0">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Ảnh bìa
									</div>
									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="0">
								</div>
								<div class="each-img-upload ui-sortable-handle" id="i1">
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img1">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Image 1
									</div>

									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="1">
								</div>
								<div class="each-img-upload ui-sortable-handle" id="i2">
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img2">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Image 2
									</div>

									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="2">
								</div>
								<div class="each-img-upload ui-sortable-handle" id="i3">
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img3">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Image 3
									</div>

									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="3">
								</div>
								<div class="each-img-upload ui-sortable-handle" id="i4">
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img4">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Image 4
									</div>

									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="4">
								</div>
								<div class="each-img-upload ui-sortable-handle" id="i5">
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img5">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Image 5
									</div>

									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="5">
								</div>
								<div class="each-img-upload ui-sortable-handle" id="i6">
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img6">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Image 6
									</div>

									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="6">
								</div>
								<div class="each-img-upload ui-sortable-handle" id="i7">
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img7">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Image 7
									</div>

									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="7">
								</div>
								<div class="each-img-upload ui-sortable-handle" id="i8">
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img8">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Image 8
									</div>

									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="8">
								</div>
								<div class="each-img-upload ui-sortable-handle" id="i9">
									<i class="fa fa-trash-o btn btn-outline-warning delete-img d-none" aria-hidden="true"></i>
									<div class="each-img d-flex justify-content-center align-items-center">
										<img src="" alt="" class="d-none image_upload" id="img9">
										<i class="fa fa-plus" aria-hidden="true"></i>
									</div>
									<div class="img-text text-center">
										Image 9
									</div>

									<input type="file" name="file" class="info d-none up-img-input" multiple="" id="9">
								</div>
							</div>
							
					</div>
					{{-- <a href="javascript:void(0);" class="btn btn-default btn-sm" >Upload hình ảnh</a> --}}
				</div>
				<div class="in-store">
					<span class="label-group">Thông tin vận chuyển</span>
					<div class="line-form pad-left-180">
						<label class="label align-right">Khối lượng (<i>*</i>)
							<a class="more-info" id="weight-more-info" href="#!" role="button" data-toggle="dropdown" title="Tìm hiểu thêm">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</a>
							{{-- <div class="popover popover-info-why pos-left" role="menu" aria-labelledby="weight-more-info">
								<div class="line-why">
									<p>Khối lượng sản phẩm sau khi đóng gói</p>
								</div>
							</div> --}}
						</label> 
						<span class="ctn-line"> 
							<input id="weight" name="weight" type="number" style="max-width: 190px;" min="100" max="100000" title=" " ng-disabled="variationList.length > 0" onkeypress="onKeyPressWeight(event)" onchange="onChangeWeight(event)"> 
								<br>
							<span class="tips">Đơn vị gram. Tối thiểu 100gram, tối đa 100,000gram.</span> 
							<span id="err_weight" class="error" style="display: none;"></span>
						</span>
					</div>
					<div class="line-form pad-left-180">
						<label class="label align-right">Kích thước 
							<a class="more-info" id="dimensions-more-info" href="#!" role="button" data-toggle="dropdown" title="Tìm hiểu thêm">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
							</a>
							{{-- <div class="popover popover-info-why pos-left" role="menu" aria-labelledby="dimensions-more-info">
								<div class="line-why">
									<p>Kích thước sản phẩm sau khi đóng gói (Dài x Rộng x Cao)</p>
								</div>
							</div> --}}
						</label> 
						<span class="ctn-line"> 
							<input id="length" name="length" type="text" placeholder="Dài" class="dimension-input" onkeypress="onKeyPressDimension(event)" onchange="onChangeDimension(event)"> 
							<input id="width" name="width" type="text" placeholder="Rộng" class="dimension-input" onkeypress="onKeyPressDimension(event)" onchange="onChangeDimension(event)"> 
							<input id="height" name="height" type="text" placeholder="Cao" class="dimension-input" onkeypress="onKeyPressDimension(event)" onchange="onChangeDimension(event)">
							<br>
							<span class="tips">Đơn vị Centimet. Tối thiểu 1 cm, tối đa 1,000 cm.</span> 
							<span id="err_dimensions" class="error" style="display: none;"></span>
						</span>
					</div>
					<div class="space x2"></div>
					<span class="label-group">Thông tin chi tiết</span>
					<div class="line-form pad-left-180">
						<label class="label align-right">Mô tả sản phẩm</label> 
                         <textarea name="" rows="30" name="content" id="content"></textarea>
						
					</div>
					<div class="line-form pad-left-180">
						<div id="err_desc" class="err-field"></div>
					</div>
					{{-- <fieldset class="line-form pad-left-180" ng-disabled="'' == 'true'">
						<label class="label align-right">Thuộc tính sản phẩm</label>
						<div class="space"></div>
						<div class="block-variation" ng-show="!hasCustomVariation &amp;&amp; attributeTypeList.length > 0">
							<div class="line-b-var otr">
								<label class="label-var">Chọn thuộc tính</label>
								<div class="ctn-var has-scroll">
									<ul class="list-var1" id="ul-attribute-type">
										<!-- ngRepeat: row in attributeTypeList --><li ng-repeat="row in attributeTypeList" id="11005" on-ng-repeat-finish-render="resizeAttributeTypeListWidth" class="ng-scope">
											<a ng-show="'' != 'true'" ng-class="isAttributeTypeSelected(row.id) ? 'active' : ''" href="javascript:void(0);" ng-click="onClickToSelectAttributeType(row.id)" class="ng-binding">
												Màu sắc
											</a>
											
										</li><!-- end ngRepeat: row in attributeTypeList --><li ng-repeat="row in attributeTypeList" id="11004" on-ng-repeat-finish-render="resizeAttributeTypeListWidth" class="ng-scope">
											<a ng-show="'' != 'true'" ng-class="isAttributeTypeSelected(row.id) ? 'active' : ''" href="javascript:void(0);" ng-click="onClickToSelectAttributeType(row.id)" class="ng-binding">
												Kích thước
											</a>
											
										</li><!-- end ngRepeat: row in attributeTypeList --><li ng-repeat="row in attributeTypeList" id="11003" on-ng-repeat-finish-render="resizeAttributeTypeListWidth" class="ng-scope">
											<a ng-show="'' != 'true'" ng-class="isAttributeTypeSelected(row.id) ? 'active' : ''" href="javascript:void(0);" ng-click="onClickToSelectAttributeType(row.id)" class="ng-binding">
												Chất liệu
											</a>
											
										</li><!-- end ngRepeat: row in attributeTypeList --><li ng-repeat="row in attributeTypeList" id="11002" on-ng-repeat-finish-render="resizeAttributeTypeListWidth" class="ng-scope">
											<a ng-show="'' != 'true'" ng-class="isAttributeTypeSelected(row.id) ? 'active' : ''" href="javascript:void(0);" ng-click="onClickToSelectAttributeType(row.id)" class="ng-binding">
												Khối lượng
											</a>
											
										</li><!-- end ngRepeat: row in attributeTypeList --><li ng-repeat="row in attributeTypeList" id="11001" on-ng-repeat-finish-render="resizeAttributeTypeListWidth" class="ng-scope">
											<a ng-show="'' != 'true'" ng-class="isAttributeTypeSelected(row.id) ? 'active' : ''" href="javascript:void(0);" ng-click="onClickToSelectAttributeType(row.id)" class="ng-binding">
												Dung lượng
											</a>
											
										</li><!-- end ngRepeat: row in attributeTypeList -->
									</ul>
								</div>
							</div>
							<!-- ngRepeat: row in selectedAttributeTypeList -->
						</div>
						<div id="div-table-wrapper-variation" class="content-table has-scroll" style="max-height: none;">
							<!-- ngIf: variationList.length > 0 -->
						</div>
					</fieldset> --}}
					<div class="space x2"></div>
					
					
					
					<div class="space x2"></div>
					<!-- ngIf: '' != '' -->
				</div>
				<div class="bottom-cbc pad-left-180">
					<input type="hidden" value="" id="isDiscount" autocomplete="off">
					<input type="hidden" name="hasEvent" value="" id="hasEvent" msginevent="" listeventid="" autocomplete="off">
					<a href="javascript:void(0)" class="btn btn-primary fl buttonAction" data-toggle="modal" data-target="#selectAccount" {{-- onclick="confirmSubmit();" --}} id="button">Chọn tài khoản
					</a> 
					<a href="javascript:void(0)" class="btn fr" id="buttonCancel" onclick="goLink('/managestore/admin/manageproduct?index=' + localStorage.getItem('currentPage'))" style="float: left;">
						Hủy
					</a>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="warning-hide-product-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-md" style="width: 300px">
			<div class="modal-content">
				<div class="wrap-popup">
					<a aria-hidden="true" data-dismiss="modal" class="close c-close" title="Đóng lại"></a>
					<div class="header-popup">
						<span class="title">Ẩn sản phẩm</span>
					</div>
					<div class="popup-inside popup-default">
						<p style="text-align: center" id="warning-hide-product-modal-content"></p>
						<div class="bottom align-center">
							<div class="bottom align-center">
								<a id="warning-hide-product-modal-button-ok" href="javacript:void(0);" class="btn btn-default btn-sm mg-right-10" data-dismiss="modal">
									Đồng ý
								</a> 
								<a id="warning-hide-product-modal-button-cancel" href="javacript:void(0);" class="btn btn-sm" data-dismiss="modal">
									Hủy
								</a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="updateSL-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" style="width: 480px">
			<div class="modal-content">
				<div class="wrap-popup">
					<h3 class="title-popup">
						Cập nhật số lượng sản phẩm
						<a class="close c-close" aria-hidden="true" data-dismiss="modal" title="Đóng lại"></a>
					</h3>
					<div class="popup-inside popup-cancel-modal">
						<ul class="list-why">
							<li>
								<input type="radio" id="check-on" name="quantity" value="on" ng-model="manageQuantity" class="ng-pristine ng-untouched ng-valid ng-empty">
								<label for="check-on">
									<span></span> Bổ sung số lượng sản phẩm
								</label>
								<!-- ngIf: manageQuantity == 'on' --><div id="err_modal" style="color: red; margin: 0 0 0 20px; font-size: 0.85em;"></div>
								<p></p>
							</li>
							<li>
								<input type="radio" id="check-off" name="quantity" value="off" ng-model="manageQuantity" class="ng-pristine ng-untouched ng-valid ng-empty">
								<label for="check-off">
									<span></span>
									Ngừng quản lý số lượng sản phẩm
								</label>
							</li>
						</ul>
						<a class="btn btn-primary fr" href="#!" ng-click="onAcceptQuantity()">Đồng ý</a>
						<a class="btn btn-link fr" href="#!" data-dismiss="modal">Bỏ qua</a>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			</div> 

			<!-- Modal -->
<div class="modal fade" id="selectAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chọn tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card example-2 square scrollbar-dusty-grass square thin">
            <div class="card-body bodyFriend" style="padding: 0px !important;">
                <div class="bt-all-comment2" style="display: block;">
                	
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" onclick="confirmSubmit()">Tạo sản phẩm</button>
      </div>
    </div>
  </div>
</div>
			{{-- end content --}}
	<script>

		function confirmSubmit(){
			var arr = new Array();
			var arr_image= new Array();
			var check = 0;
			var k = 0;
			var _token = $('#product_form input[name="_token"]').val();
          $('.checkallZaloGroup').each(function(i, value){
				if ($(value).is(':checked')) {
					check = 1;
					arr.push($(value).val());
				}
			});
          if(check == 0 ){
             alert('Vui lòng chọn tài khoản');
             return false;
          }
           
           var params = {};
           params['name'] = $('#product_form input[name="name"]').val();
           params['price'] = $('#product_form input[name="price"]').val();
           params['code'] = $('#product_form input[name="code"]').val();
           params['quantity'] = $('#product_form input[name="quantity"]').val();
           params['weight'] = $('#product_form input[name="weight"]').val();
           params['length'] = $('#product_form input[name="length"]').val();
           params['width'] = $('#product_form input[name="width"]').val();
           params['height'] = $('#product_form input[name="height"]').val();
           params['content'] = $('#product_form textarea[name="content"]').val();
           params['_token'] = $('#product_form input[name="_token"]').val();
            params['arr_img'] = arr_image;
            params['idzalo'] = arr;
			$(".sortable .image_upload.selected").each(function(){
				arr_image.push(this.src);
			});
			for (var i = 0 ; i < arr_image.length; i++) {
               setTimeout( function timer(){ 
				  $.ajax({
					url: '{{ url("shop/uploadImg") }}',
					dataType: 'json',
					type: 'post',
					contentType: 'application/x-www-form-urlencoded',
					data: {_token: _token, data:arr_image[k]},
					success: function( data, textStatus, jQxhr ){
						
					},
					error: function( jqXhr, textStatus, errorThrown ){ 
					},
					complete: function( data, textStatus, jQxhr){

					}
				});
				  k++;
			  }, i*5000 );

			}		
            
            //console.log(params);
           $.ajax({
					url: '{{ url("shop/addNewProduct") }}',
					dataType: 'json',
					type: 'post',
					contentType: 'application/x-www-form-urlencoded',
					data: params,
					success: function( data, textStatus, jQxhr ){
						
					},
					error: function( jqXhr, textStatus, errorThrown ){ 
					},
					complete: function( data, textStatus, jQxhr){

					}
				});
		}

		function changeImageProduct(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatarPro').attr('src',e.target.result);
		            $('.box-img-store-ins').hide();
		            $('.icz-img').hide();
		            $('.image_1').html('<img src="'+e.target.result+'">');
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatarPro').click(function(){
		        $('#image_file').click();
		    });
         });

		$(".each-img").on('click',function(){
			$(this).closest(".each-img-upload").find('.up-img-input').click();
		});
		$(".buttonAction").on('click',function(){
			 var _token = $('#product_form input[name="_token"]').val();
			 var status = "getAccount";
			 $.ajax({
					url: '{{ url("shop/getAccountOA") }}',
					dataType: 'json',
					type: 'post',
					contentType: 'application/x-www-form-urlencoded',
					data: {status: status, _token:_token},
					success: function( data, textStatus, jQxhr ){
						// console.log(data);
						var html = '';
						for (var i = 0; i <data.length; i++) {
						html += '<div bt-type="inbox" data-userid="8156121327915152395" bt-content-chat="" isfr="1" class="bt-load-chat ">';
                        html += ' <input type="checkbox" class="checkallZaloGroup select_'+data[i].zalo_id+'" data-type="fanpage" value="'+data[i].zalo_id+'" style="display: block; float:right;">';
                        html += '<div class="bt-avatar-user-chat">';
                        html += '<img src="'+data[i].image+'" style=" position: absolute;">';
                        html += '</div>';
                        html += '<div class="bt-info-chat">';
                        html += '<div class="bt-name-chat">'+data[i].name+'</div>';
                        html += '</div>';
                        html += '<div class="owl-page"></div>';
                        html += '<div class="owl-tag pull-right wrap-color">';
                        html += '<div class="tags-cons">';
                        html += '<ul>';
                        html += '</ul>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        }
                        $('.bt-all-comment2').html(html);

                      
					}
				});
		});

		$('.up-img-input').on('change',function(){
		id = this.id;
		parent = $(this).parent().parent();
		countFiles = $(this)[0].files.length;
		sizefile = $(this)[0].files[0].size;
		if(sizefile < 2097152){
			imgPath = $(this)[0].value;
			extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
			image_holder = $("#image-holder");
			image_holder.empty();
			if (extn == "png" || extn == "jpg" || extn == "jpeg") {
				if (typeof (FileReader) != "undefined") {
					for (var i = 0; i < countFiles; i++) {
						reader = new FileReader();
						reader.onload = function (e) {
							parent.find('#i'+id).find('i').addClass('d-none');
							parent.find('#i'+id).find('.delete-img').removeClass('d-none');
							img = parent.find('#i'+id).find('#img'+id);
							img.attr('src',e.target.result);
							img.addClass("selected");
							img.removeClass('d-none');
							
							id++;
						}
						reader.readAsDataURL($(this)[0].files[i]);
					}
				} else {
					thongbao("Trình duyệt không hỗ trợ xem ảnh");
				}
			} else {
				thongbao("Chưa chọn ảnh nào");
			}
			
			
		}else{
			thongbao("Dung lượng ảnh lớn hơn 2MB");
		}
	});
	</script>
@stop