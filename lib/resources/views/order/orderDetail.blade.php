@extends('master')
@section('title','Chi tiết đơn hàng')
@section('main')

<div class="content">
	<style>
		.order-detail .group-main {
		    width: 100%;
		    margin-bottom: 30px;
		}
		.order-detail .group-main .title-group {
		    position: relative;
		}
		.order-detail .group-main .title-group .id {
		    display: block;
		    margin-bottom: 10px;
		    color: #191919;
		    font-size: 1em;
		    font-weight: bold;
		    text-transform: uppercase;
		}
		.status.status-success {
		    color: #0f9d58;
		}
		.status {
		    display: inline-block;
		    height: 16px;
		    line-height: 16px;
		    color: #191919;
		    font-size: 12px;
		}
		.order-detail .group-main .title-group .line-g {
		    display: block;
		    margin-bottom: 5px;
		    color: #57576B;
		    font-size: 0.813rem;
		}
		.order-detail .group-main .title-group .line-g {
		    display: block;
		    margin-bottom: 5px;
		    color: #57576B;
		    font-size: 0.813rem;
		}
		.order-detail .group-main .title-group .status-group {
		    text-align: right;
		}
		.order-detail .group-main .title-group .dropdown {
		    position: absolute;
		    top: 0;
		    right: 0;
		}
		.btn.btn-dropdown {
		    position: relative;
		    padding-right: 22px;
		}
		.btn.btn-sm {
		    padding: 6px 10px;
		    font-size: 0.75rem;
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
		.status.status-success {
		    color: #0f9d58;
		}
		.sub-action-menu {
		    top: unset;
		    right: 0px;
		}
		.dropdown-menu {
		    width: 190px;
		}
		.sub-action-menu {
		    position: absolute;
		    top: 100%;
		    right: 2px;
		    z-index: 99;
		    background-color: #fff;
		    min-width: 170px;
		    -webkit-box-shadow: 0 5px 7px 0 rgba(0, 0, 0, 0.2);
		    box-shadow: 0 5px 7px 0 rgba(0, 0, 0, 0.2);
		    border: solid 1px rgba(0, 0, 0, 0.1);
		    border-radius: 3px;
		    -moz-border-radius: 3px;
		    -webkit-border-radius: 3px;
		}
		.sub-action-menu li {
		    float: none!important;
		    background-color: #fff;
		    padding: 5px;
		    border: 0;
		    border-bottom: 1px solid #e2e4e9;
		}
		.sub-action-menu li a {
		    display: block;
		    width: 100%;
		    padding: 5px;
		    color: #000!important;
		    font-size: 0.813rem!important;
		    text-align: left;
		}
		.status.status-pending {
		    color: #eda21b;
		}
		.status.status-doing {
		    color: #0c74bb;
		}
		.status.status-denied, .status.status-end {
		    color: #d00;
		}
		.order-detail .group-main .title-group .status-group .tips {
		    display: block;
		    position: relative;
		    margin-top: 5px;
		    color: #fc4a4a;
		    font-size: 0.688rem;
		}
		a, img, label, li, span {
		    text-decoration: none;
		    -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
		}
		.icz.icz-question-mini {
		    background-position: -384px -136px;
		    width: 16px;
		    height: 16px;
		}
		.icz {
		    display: inline-block;
		    background-image: url(../images/main_sprites_zoa_1x.1.0.25.png);
		    background-repeat: no-repeat;
		    width: 24px;
		    height: 24px;
		    vertical-align: middle;
		    text-indent: -9999px;
		}
		.order-detail .wrap-group {
		    display: -webkit-box;
		    display: -ms-flexbox;
		    display: flex;
		    -ms-flex-wrap: wrap;
		    flex-wrap: wrap;
		    margin: 0 -10px;
		}
		.order-detail .group {
		    -ms-flex-negative: 0;
		    flex-shrink: 0;
		    width: 33.3333333333%;
		    margin-bottom: 40px;
		    padding: 0 10px;
		}
		.order-detail .group h4 {
		    display: block;
		    margin-bottom: 15px;
		    color: #191919;
		    font-size: 0.875em;
		    font-weight: bold;
		    text-transform: uppercase;
		}
		.order-detail .group .group-inside {
		    position: relative;
		    background-color: #f4f5f9;
		    height: calc(100% - 24px);
		    padding: 12px;
		    border-radius: 6px;
		    -moz-border-radius: 6px;
		    -webkit-border-radius: 6px;
		}
		.note-input {
		    background-color: #f1f3f7;
		    min-height: 120px;
		    padding: 15px;
		    border: 1px solid #e0e8ef;
		    -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.08);
		    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.08);
		}
		table td .total-price {
		    color: #f31b0c;
		    font-size: 1.25em;
		    font-weight: bold;
		}
		table td .sale-price {
		    color: #f31b0c;
		}
		ol, ul, ul li {
		    list-style: none;
		}
	</style>
	 <div ng-app="ProductOrderModule" ng-controller="ProductOrderDetailController" ng-init="getOrderInfo('17672273'); resetDataCancelReasonModal();" class="ng-scope">

    <div class="page-manage-inside">
        <div class="order-detail">
        	@if($status == 6)
            <div class="alert alert-danger ng-hide" ng-show="order.statusEnum=='Z_Cancel'"><span style="word-wrap: break-word;" class="ng-binding">Đơn hàng đã bị hủy. Lý do: {{ $cancel_reason }} </span></div>
            @endif
           {{--  <div class="alert alert-success ng-hide" ng-show="order.statusEnum=='Z_New' &amp;&amp; order.hasShipping &amp;&amp; !order.hasSelfShipping"><span>Đơn hàng mới. Bạn xác nhận đơn hàng để chuyển qua đơn vị vận chuyển.</span></div> --}}
            <div class="group-main">
            	{{csrf_field()}}
                <div class="title-group">
                	<input type="hidden" name="valueStatus" class="valueStatus" value="">
                	<input type="hidden" name="orderId" class="orderId" value="">
                    <span class="id ng-binding">Đơn hàng {{ $code }} - @if($status == 1)<span class="status  status-success">Đơn hàng mới </span> @elseif($status == 3) <span class="status" style="color:#0c74bb;"> Đã xác nhận </span> @elseif($status == 6) <span class="status" style="color:#d00;"> Hủy bởi Khách </span> @elseif($status == 2) <span class="status" style="color:#eda21b;">Đang xử lý </span> @elseif($status == 7) <span class="status" style="color:#d00;"> Chuyển hoàn </span>@elseif($status == 4) <span class="status" style="color:#eda21b;"> Đang giao hàng </span> @else <span class="status" style="color:#d00;"> Hủy bởi Shop </span> @endif</span>

                    {{-- <span class="line-g ng-binding">Ngày đặt: 17/08/2020 13:05  - Nguồn: Zalo Shop</span>
                    <span ng-show="order.hasUpdatedHistory" class="line-g ng-binding ng-hide">Cập nhật: 17/08/2020 13:05  (Bởi: )</span> --}}
                    <span ng-show="order.hasUpdatedHistory" class="line-g ng-hide">
                        <a class="link" data-toggle="modal" ng-click="loadUpdateHistory('17672273', 0)">Lịch sử cập nhật đơn hàng</a>
                    </span>
                    
                   
                    @if($status == 3 || $status == 7 || $status == 6 || $status == 4)
                    <div class="dropdown status-group">
                        <a class="btn btn-sm btn-dropdown" id="choose-m2" role="button" data-toggle="dropdown" aria-expanded="true" ng-disabled="isDisabledUpdateStatus">
                            <span class="status  status-doing">@if($status == 4)<span class="status  status-success" style="color:#eda21b;">Đang giao hàng </span>@elseif($status == 7)<span style="color: #d00;" class="status  status-success">Chuyển hoàn </span>@elseif($status == 3)<span style="color: #0c74bb;" class="status  status-success">Đã xác nhận </span>@elseif($status == 6)<span style="color: #d00;" class="status  status-success">Hủy </span>@endif</span>
                        </a>
                        <ul class="dropdown-menu sub-action-menu clearfix" role="menu" aria-labelledby="choose-m2" style="min-width:155px;">
                            <li ng-repeat="item in possibleSubmitStatusList" class="ng-scope">
                                <a href="javascript:void(0)" onclick="onClickNewStatus(4);"><span class="status status-pending">Đang giao hàng</span></a>
                            </li>
                            <li ng-repeat="item in possibleSubmitStatusList" class="ng-scope">
                                <a href="javascript:void(0)" onclick="onClickNewStatus(7);"><span class="status status-denied">Chuyển hoàn</span></a>
                            </li>
                            <li ng-repeat="item in possibleSubmitStatusList" class="ng-scope">
                                <a href="javascript:void(0)" onclick="onClickNewStatus(item);"><span class="status status-success">Thành công</span></a>
                            </li>
                            <li ng-repeat="item in possibleSubmitStatusList" class="ng-scope">
                                <a href="javascript:void(0)" onclick="onClickNewStatus(item);" data-toggle="modal" data-target="#modalHuyOrder"><span class="status status-denied">Hủy</span></a>
                            </li>
                        </ul>
                        <div class="tips ng-binding" ng-show="order.isOrderV2 &amp;&amp; order.statusDetailWarningHover">Tự động hủy vào ngày 10/09/2020 23:59 
                            <a id="more-info" role="button" data-toggle="dropdown">
                                <i class="icz icz-question-mini mini"></i>
                            </a>
                            <div class="popover-info-why" role="menu" aria-labelledby="more-info">
                                <div class="line-why">
                                    <p style="color: #d00" class="ng-binding">Tự động hủy sau
10/09/2020 23:59 
nếu không cập nhật kết quả giao hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif($status == 1 || $status == 2)
                     <div class="dropdown status-group">
                        <a class="btn btn-sm dropdown-toggle" id="choose-m2" role="button" data-toggle="dropdown" aria-expanded="false" ng-disabled="isDisabledUpdateStatus">
                            <span class="status  status-success" id="orderNew">@if($status == 3) <span style="color:#0c74bb;">Đã xác nhận</span> @elseif($status == 1) <span style="color:#0f9d58;">Đơn hàng mới</span> @elseif($status == 2) <span style="color:#eda21b;">Đang xử lý</span> @else Không xác định @endif</span>
                            
                        </a>
                        <ul class="dropdown-menu sub-action-menu clearfix" role="menu" aria-labelledby="choose-m2" style="min-width:155px;">
                            <li ng-repeat="item in possibleSubmitStatusList" class="ng-scope">
                                <a href="javascript:void(0)" onclick="onClickNewStatus(2);"><span class="status status-pending">Đang xử lý</span></a>
                            </li><li ng-repeat="item in possibleSubmitStatusList" class="ng-scope">
                                <a href="javascript:void(0)" onclick="onClickNewStatus(3);"><span class="status status-doing">Đã xác nhận</span></a>
                            </li><li ng-repeat="item in possibleSubmitStatusList" class="ng-scope">
                                <a href="javascript:void(0)" onclick="onClickNewStatus(6);"><span class="status status-denied">Hủy</span></a>
                            </li>
                        </ul>
                        {{-- <div class="tips ng-binding" ng-show="order.isOrderV2 &amp;&amp; order.statusDetailWarningHover">Tự động hủy vào ngày 21/08/2020 23:59 
                            <a id="more-info" role="button" data-toggle="dropdown">
                                <i class="icz icz-question-mini mini"></i>
                            </a>
                            <div class="popover-info-why" role="menu" aria-labelledby="more-info">
                                <div class="line-why">
                                    <p style="color: #d00" class="ng-binding">Tự động hủy sau
21/08/2020 23:59 
nếu không cập nhật kết quả xác nhận đơn hàng</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    @endif


                </div>
            </div>
            <div class="wrap-group">
                <div class="group">
                    <h4>Người nhận</h4>
                    <div class="group-inside">
                     
                        <p><strong class="ng-binding">{{ $shipping->receiver_name }}</strong> </p>
                        <p class="ng-binding">Điện thoại: {{ $shipping->receiver_phone }}</p>
                        <p class="ng-binding">Địa chỉ: {{ $shipping->deliver_address }}</p>
                        <p class="ng-binding">Tỉnh/ Thành phố: {{ $shipping->deliver_district }} - {{ $shipping->deliver_city }}</p>
                        <div class="func-wrap">
                            <a class="func-item" ng-show="true" ng-click="showQRCallAudioModal(order);"><i class="ica ica-call"></i></a>
                            <a class="func-item" ng-click="openChat(order.createdBy)"><i class="ica ica-chat-circle"></i></a>
                        </div>
                       
                       
                    </div>
                </div>
                <div class="group">
                    <h4>Lưu ý của KH</h4>
                    <div class="group-inside">
                        <p style="word-break: break-word;" class="ng-binding">{{ $extra_note }}</p>
                    </div>
                </div>
                <div class="group">
                    <h4>Đánh giá chung</h4>
                    <div class="group-inside">
                       
                        <p ng-show="totalOrder <= 0" class="ng-hide">Chưa từng mua hàng</p>
                        <p ng-show="totalOrder < 10 &amp;&amp; totalOrder > 0" class="ng-hide">Đã từng mua hàng</p>
                        <p ng-show="totalOrder > 10" class="">Thường xuyên mua hàng</p>
                        {{-- <p>
                            <a class="btn btn-default btn-sm" ng-disabled="order.hasFeedbacked" ng-click="setFeedbackDataByOrder(order)" data-toggle="modal" data-target="#rating-feedback-modal">Review &amp; Feedback</a>
                        </p> --}}
                    </div>
                </div>
                <div class="group">
                    <h4>Thông tin giao hàng</h4>
                    <div class="group-inside">
                        <p ng-show="order.shippingTrackingCode" class="ng-binding ng-hide"><strong>Mã vận đơn:</strong> N/A</p>
                        <p style="word-break: break-word;" class="ng-binding"><strong>Hình thức giao hàng:</strong> Shop Tự Vận Chuyển</p>
                        <p class="ng-binding"><strong>Đơn vị giao hàng:</strong> {{ $shipping->courier_name }}</p>
                        <p class="ng-binding"><strong>Phí vận chuyển:</strong> {{ number_format($shipping->shipping_fee) }} VND</p>
                        <p class="ng-binding"><strong>Dự kiến giao hàng:</strong> {{ $shipping->expected_delivery_time }}</p>
                    </div>
                </div>
                <div class="group">
                    <h4>Thông tin thanh toán</h4>
                    <div class="group-inside">
                        <p class="ng-binding"><strong>Hình thức thanh toán:</strong> @if($payment->method == 1) COD @else N/A @endif</p>
                        <p class="ng-binding"><strong>Tình trạng thanh toán:</strong> @if($payment->status == 1) Thanh toán khi nhận hàng @else N/A @endif</p>
                        <p class="ng-binding"><strong>TransactionId: </strong> </p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="title-table">Thông tin đơn hàng</h2>
        <div class="content-table has-bordered">
            <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <th style="width:40%">Sản phẩm</th>
                        <th class="align-right" style="width:20%">Đơn giá</th>
                        <th class="align-right" style="width:20%">Số lượng</th>
                        <th class="align-right" style="width:20%">Tạm tính</th>
                    </tr>
                    @foreach($order_items as $row)
                    <!-- ngRepeat: product in order.products --><tr ng-repeat="product in order.products" class="ng-scope">
                        <td class="align-middle">
                            <a class="link ng-binding" href="/managestore/admin/manageproduct/view?id=f0750cb553f0baaee3e1&amp;name=Loa Karaoke Kimiso KM S1 Tặng 01 Micro Hát Hàng Chất Lượng&amp;code=KMS1" target="_blank" ng-show="product.code">{{ $row->name }}</a>
                            <a class="link ng-binding ng-hide" href="/managestore/admin/manageproduct/view?id=f0750cb553f0baaee3e1&amp;name=Loa Karaoke Kimiso KM S1 Tặng 01 Micro Hát Hàng Chất Lượng" target="_blank" ng-show="!product.code">{{ $row->name }}</a>
                            <br>
                            <!-- ngRepeat: row in product.variation.attributes -->
                            <span class="ng-binding">&nbsp;&nbsp;&nbsp;&nbsp;- Loại sản phẩm: N/A <br></span>
                        </td>
                        <td class="align-top align-right">
                            <strong class="nu ng-binding">{{ number_format($row->price) }} VND</strong>
                            <br>
                            <span class="sale-price ng-binding" ng-show="product.discountPercent > 0">(-40%)</span>
                        </td>
                        <td class="align-top align-right ng-binding">{{ $row->quantity }}</td>
                        <td class="align-top align-right"><strong class="ng-binding">{{ number_format($row->price)}} VND</strong></td>
                    </tr><!-- end ngRepeat: product in order.products -->

                    @endforeach

                    <tr>
                        <td class="align-top align-right" colspan="3">Tổng tạm tính</td>
                        <td class="align-top align-right"><strong class="ng-binding">{{ number_format($row->price) }} VND</strong></td>
                    </tr>
                    <tr>
                        <td class="align-top align-right" colspan="3">Phí vận chuyển</td>
                        <td class="align-top align-right"><strong class="ng-binding">{{ number_format($shipping->shipping_fee) }} VND</strong></td>
                    </tr>
                    <tr>
                        <td class="align-top align-right" colspan="3">Tổng cộng</td>
                        <td class="align-top align-right"><span class="total-price ng-binding">{{ number_format($total_amount) }} VND</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="space x3"></div>
        <h2 class="title-table">GHI CHÚ CỦA ADMIN</h2>
        <textarea class="note-input ng-pristine ng-untouched ng-valid ng-empty" ng-model="order.adminNote" ng-disabled="isDisabledUpdateNote" style="width: 100%" name="contentAD"></textarea>
        <div class="bottom-mn">
            <a class="btn btn-primary fl mg-right-10" href="javascript:void(0)" ng-disabled="isDisabledUpdateNote &amp;&amp; isDisabledUpdateStatus" onclick="onClickSubmitUpdateOrder();">Lưu thiết lập</a>
            <a class="btn fl" href="javascript:void(0)" onclick="goLink('/managestore/admin/order/manageproductorder')">Hủy</a>
        </div>
    </div>

    <!-- Feedback Modal -->
    <div class="modal fade" id="rating-feedback-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" style="width:840px">
            <div class="modal-content">
                <div class="wrap-popup">
                    <h3 class="title-popup">Phản hồi/ Đánh giá<a class="close c-close" aria-hidden="true" data-dismiss="modal" title="Đóng lại"></a></h3>
                    <div class="popup-inside">
                        <div class="detail-rating-write">
                            <div class="left-drw">
                                <!-- ngRepeat: product in feedbackData.productList | limitTo:1 --><div class="item-product ng-scope" ng-repeat="product in feedbackData.productList | limitTo:1">
                                    <div class="img-product">
                                        <div class="img-product-img" style="background-image:url(https://store-photo-s500.zdn.vn/8/d693a53c247ccd22946d.jpg)"></div>
                                    </div>
                                    <div class="desc">
                                        <h2><span class="truncate ng-binding">Loa Karaoke Kimiso KM S1 Tặng 01 Micro Hát Hàng Chất Lượng</span></h2>

                                        <div class="wrap-price">
                                            <span class="price ng-binding">210,000 VND</span>
                                            <span ng-show="product.discountPercent > 0" class="old-price ng-binding">350,000 VNDđ</span>
                                            <span ng-show="product.discountPercent > 0" class="percent-discount ng-binding">-40%</span>
                                        </div>
                                        <p>Số lượng : <strong class="ng-binding">1</strong> - Tổng tiền : <strong class="ng-binding">210,000 VND</strong></p>
                                    </div>

                                </div><!-- end ngRepeat: product in feedbackData.productList | limitTo:1 -->
                                <div class="context-info">
                                    <h4>Thông tin người nhận</h4>
                                    <p style="word-break: break-word;" class="ng-binding">Nguyễn Hoàng Khánh Linh</p>
                                    <p class="ng-binding">Điện thoại: 84906748158</p>
                                    <p style="word-break: break-word;" class="ng-binding">Địa chỉ: 30/3 tô 8 kp phường trảng dài</p>
                                    <p style="word-break: break-word;" class="ng-binding">Tỉnh/ Thành phố: Thành phố Biên Hòa, Đồng Nai</p>
                                </div>
                            </div>
                            <div class="right-drw">
                                <div class="context-report">
                                    <h4>Lý do phản ánh</h4>
                                    <ul class="report-list">
                                        <!-- ngRepeat: (key,feedback) in feedbackTypeOAs --><li ng-repeat="(key,feedback) in feedbackTypeOAs" ng-click="setFeedbackOAType(key)" class="ng-scope">
                                            <input type="radio" id="radio-id1" name="radio">
                                            <label for="radio-id1" class="ng-binding">Không gọi được người mua</label>
                                        </li><!-- end ngRepeat: (key,feedback) in feedbackTypeOAs --><li ng-repeat="(key,feedback) in feedbackTypeOAs" ng-click="setFeedbackOAType(key)" class="ng-scope">
                                            <input type="radio" id="radio-id2" name="radio">
                                            <label for="radio-id2" class="ng-binding">Người mua không bắt máy nhận hàng</label>
                                        </li><!-- end ngRepeat: (key,feedback) in feedbackTypeOAs --><li ng-repeat="(key,feedback) in feedbackTypeOAs" ng-click="setFeedbackOAType(key)" class="ng-scope">
                                            <input type="radio" id="radio-id3" name="radio">
                                            <label for="radio-id3" class="ng-binding">Người mua spam đơn hàng</label>
                                        </li><!-- end ngRepeat: (key,feedback) in feedbackTypeOAs -->
                                    </ul>
                                    <span style="text-align: center" ng-show="feedbackErrorMessage.feedbackTypeError" class="error ng-binding ng-hide"></span>
                                </div>
                                <div class="context-rating">
                                    <h4>Viết phản ánh</h4>

                                    <textarea ng-model="feedbackData.message" type="textarea" placeholder="Nhập phản ảnh của bạn ..." class="ng-pristine ng-untouched ng-valid ng-empty"></textarea>
                                    <div class="under-textarea">
                                        <span ng-show="!feedbackErrorMessage.messageError" class="error"></span>
                                        <span ng-show="feedbackErrorMessage.messageError" class="error ng-binding ng-hide"></span>
                                        <span class="limit">Tối đa 1000 ký tự</span>
                                    </div>

                                    <div class="feedback-emoticon">
                                        <h4>Đánh giá của bạn?</h4>
                                        <ul class="emoticon-list">
                                            <li>
                                                <input type="radio" id="radio-emo1" name="radio-emo">
                                                <label ng-click="setRatingStar(1)" for="radio-emo1" style=" cursor: pointer;">
                                                    <i class="icn icn-negative"></i>
                                                    <i class="icn icn-bold-negative is-active"></i>
                                                    <span>Không hài lòng</span>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" id="radio-emo2" name="radio-emo">
                                                <label ng-click="setRatingStar(3)" for="radio-emo2" style=" cursor: pointer;">
                                                    <i class="icn icn-neutral"></i>
                                                    <i class="icn icn-bold-neutral is-active"></i>
                                                    <span>Bình thường</span>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" id="radio-emo3" name="radio-emo">
                                                <label ng-click="setRatingStar(5)" for="radio-emo3" style=" cursor: pointer;">
                                                    <i class="icn icn-positive"></i>
                                                    <i class="icn icn-bold-positive is-active"></i>
                                                    <span>Hài lòng</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <span ng-show="feedbackErrorMessage.ratingStarError" style="text-align: center;margin-top: -20px;" class="error ng-binding ng-hide"></span>
                                    <a class="btn btn-primary fr" href="#!" ng-click="submitInvoiceFeedback(feedbackData.invoiceId, feedbackData.feedbackOAType, feedbackData.message, feedbackData.ratingStar)">
                                        Gửi
                                    </a>
                                    <a class="btn btn-link fr" ng-click="hideModal()">Hủy</a>
                                    <div class="clear"></div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="orderHistory-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md" style="width:740px;">
            <div class="modal-content">
                <div class="wrap-popup">
                    <h3 class="title-popup">Lịch sử cập nhật đơn hàng<a class="close c-close" aria-hidden="true" data-dismiss="modal" title="Đóng lại"></a></h3>
                    <div class="popup-inside">
                        <div class="content-table has-bordered">
                            <div style="height: 500px; overflow-y: scroll">
                                <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow-y:scroll">
                                    <tbody>
                                        <tr>
                                            <th class="align-center" style="width:45px;">#</th>
                                            <th style="width:20%;">Thời gian</th>
                                            <th class="align-center" style="width:15%;">Người xử lí</th>
                                            <th class="align-center" style="width:20%;">Trạng thái ĐH</th>
                                            <th style="width:40%;">Ghi chú</th>
                                        </tr>
                                        <!-- ngRepeat: order in history.orderList -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="bottom-mn otr">
                                <div class="pagination fr mg-left-20">
                                    <paging page="history.currentPage" page-size="10" total="history.total" show-prev-next="true" show-first-last="true" paging-action="loadUpdateHistory(orderId, page - 1)" class="ng-isolate-scope"><ul data-ng-hide="Hide" data-ng-class="ulClass" class="pagination"> <!-- ngRepeat: Item in List --></ul></paging>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade in" id="confirm-update-order-modal" data-keyboard="true" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" style="width:450px;">
            <div class="modal-content">
                <div class="wrap-popup">
                    <h3 class="title-popup">
                        <strong ng-show="orderNewStatusName === 'Z_Cancel'" class="ng-hide">Hủy đơn hàng</strong>
                        <strong ng-show="orderNewStatusName === 'Z_Finish'" class="ng-hide">Cập nhật trạng thái đơn hàng</strong>
                        <a class="close c-close" aria-hidden="true" data-dismiss="modal" title="Đóng lại"></a>
                    </h3>
                    <div class="popup-inside form-default">
                        <p ng-show="orderNewStatusName === 'Z_Cancel'" class="ng-hide">Đơn hàng Hủy sẽ không thể chỉnh sửa. Bạn có chắc muốn hủy?</p>
                        <p ng-show="orderNewStatusName === 'Z_Finish'" class="ng-hide">Đơn hàng Thành công sẽ không thể tiếp tục cập nhật thông tin. Bạn có chắc muốn chuyển trạng thái đơn hàng thành "Thành công"?</p>
                        <div class="space"></div>
                        <a class="btn btn-primary fr" href="javascript:void(0)" data-dismiss="modal" ng-click="submitUpdateOrder();">Đồng ý</a>
                        <a class="btn btn-link fr" href="javascript:void(0)" data-dismiss="modal">Hủy</a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade in" id="cancel-reason-modal" data-keyboard="true" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" style="width:450px;">
            <div class="modal-content">
                <div class="wrap-popup">
                    <h3 class="title-popup">
                        Lý do hủy đơn hàng
                        <a class="close c-close" aria-hidden="true" data-dismiss="modal" title="Đóng lại"></a>
                    </h3>
                    <div class="popup-inside popup-cancel-reason-modal">
                        <div class="alert alert-danger ng-binding ng-hide" ng-show="reasonError !== ''"></div>
                        <ul class="list-why">
                            <!-- ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason1" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Sản phẩm đã hết hàng" ng-click="onClickToChooseCancelReason($event);" value="1">
                                <label for="cancelReason1" style="margin-left: 10px;" class="ng-binding">Sản phẩm đã hết hàng</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason2" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Không liên lạc được với khách hàng" ng-click="onClickToChooseCancelReason($event);" value="2">
                                <label for="cancelReason2" style="margin-left: 10px;" class="ng-binding">Không liên lạc được với khách hàng</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason3" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Khách yêu cầu hủy" ng-click="onClickToChooseCancelReason($event);" value="3">
                                <label for="cancelReason3" style="margin-left: 10px;" class="ng-binding">Khách yêu cầu hủy</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason4" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Vượt quá số lần hỗ trợ giao hàng" ng-click="onClickToChooseCancelReason($event);" value="4">
                                <label for="cancelReason4" style="margin-left: 10px;" class="ng-binding">Vượt quá số lần hỗ trợ giao hàng</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason5" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Địa chỉ không hỗ trợ giao hàng" ng-click="onClickToChooseCancelReason($event);" value="5">
                                <label for="cancelReason5" style="margin-left: 10px;" class="ng-binding">Địa chỉ không hỗ trợ giao hàng</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason6" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Lý do khác" ng-click="onClickToChooseCancelReason($event);" value="6">
                                <label for="cancelReason6" style="margin-left: 10px;" class="ng-binding">Lý do khác</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList -->
                        </ul>

                        <textarea id="cancelReasonOtherText" maxlength="350" style="margin-top: 10px; margin-bottom: 10px;" class="note-input ng-hide" rows="4" cols="80"></textarea>

                        <a class="btn btn-primary fr" href="javascript:void(0)" ng-click="acceptCancel();" ng-disabled="cancelReasonId === '0'" disabled="disabled">Cập nhật</a>
                        <a class="btn btn-link fr" href="javascript:void(0)" data-dismiss="modal">Hủy</a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="modal fade in" id="updateOrder-result-modal" data-keyboard="true" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" style="width:450px;">
            <div class="modal-content">
                <div class="wrap-popup">
                    <h3 class="title-popup">
                        Thông báo
                        <a class="close c-close" ng-click="hideResultPopupUpdateModal();" title="Đóng lại"></a>
                    </h3>
                    <div class="popup-inside form-default">
                        <p id="updateOrder-result-modal-content"></p>
                        <div class="space"></div>
                        <a class="btn btn-primary fr" href="javascript:void(0)" ng-click="hideResultPopupUpdateModal();">Đồng ý</a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade length" id="result-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" style="width:450px;">
            <div class="modal-content">
                <div class="wrap-popup">
                    <h3 class="title-popup">
                        Thông báo
                        <a class="close c-close" aria-hidden="true" data-dismiss="modal" title="Đóng lại"></a>
                    </h3>
                    <div class="popup-inside form-default">
                        <p id="result-modal-content"></p>
                        <div class="space"></div>
                        <a class="btn btn-primary fr" href="javascript:void(0)" aria-hidden="true" data-dismiss="modal">Đồng
                            ý</a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade length" id="qr-call-audio-modal" data-keyboard="true" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" style="width:350px;">
            <div class="modal-content">
                <div class="wrap-popup">
                    <a aria-hidden="true" data-dismiss="modal" class="close c-close" title="Đóng lại"></a>
                    <div class="header-popup" style="text-align: center; padding: 10px 40px;">
                        <span class="title ng-binding">Thực hiện cuộc gọi cho </span>
                    </div>
                    <div class="popup-inside popup-default">
                        <div class="align-center">
                            <img width="200px" height="200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="modal fade" id="modalHuyOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lý do hủy đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="popup-inside popup-cancel-reason-modal">
                       
                        <input type="hidden" name="contenOrder" class="contenOrder" value="">
                        <ul class="list-why">
                            <!-- ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason1" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Sản phẩm đã hết hàng" onclick="onClickToChooseCancelReason(1);" value="1">
                                <label for="cancelReason1" style="margin-left: 10px;" class="ng-binding">Sản phẩm đã hết hàng</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason2" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Không liên lạc được với khách hàng" onclick="onClickToChooseCancelReason(2);" value="2">
                                <label for="cancelReason2" style="margin-left: 10px;" class="ng-binding">Không liên lạc được với khách hàng</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason3" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Khách yêu cầu hủy" onclick="onClickToChooseCancelReason(3);" value="3">
                                <label for="cancelReason3" style="margin-left: 10px;" class="ng-binding">Khách yêu cầu hủy</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason4" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Vượt quá số lần hỗ trợ giao hàng" onclick="onClickToChooseCancelReason(4);" value="4">
                                <label for="cancelReason4" style="margin-left: 10px;" class="ng-binding">Vượt quá số lần hỗ trợ giao hàng</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason5" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Địa chỉ không hỗ trợ giao hàng" {{-- onclick="onClickToChooseCancelReason(5);" --}} value="5" onchange="showTextarea(5)">
                                <label for="cancelReason5" style="margin-left: 10px;" class="ng-binding">Địa chỉ không hỗ trợ giao hàng</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList --><li ng-repeat="item in cancelOrderReasonList" class="ng-scope">
                                <input type="radio" id="cancelReason6" name="cancelReason" class="cancelReason" ng-value="item.id" data-reason="Lý do khác" {{-- onclick="onClickToChooseCancelReason(6);" --}} onchange="showTextarea(6)" value="6">
                                <label for="cancelReason6" style="margin-left: 10px;" class="ng-binding" >Lý do khác</label>
                            </li><!-- end ngRepeat: item in cancelOrderReasonList -->
                        </ul>
                        <textarea id="cancelReasonOtherText" maxlength="350" style="margin-top: 10px; margin-bottom: 10px; display: none;" class="note-input" rows="4" cols="80" name="content"></textarea>
                        
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary submitForm">Cập nhật</button>
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
	function onClickSubmitUpdateOrder(){
       var content = $('textarea[name="contentAD"]').val();
       var status = $('input[name="valueStatus"]').val();
       var params = {};
       params['_token'] = $('input[name="_token"]').val();
       params['orderId'] = $('input[name="orderId"]').val();
       params['status'] = status;
       params['content'] = content;
       var locationv2 = window.location.href;
       var str = locationv2.split("/");
       params['zaloid'] = str[6];
       params['orderId'] = str[5];
       params['status']  = 'capnhat';
      //console.log(params);
        $.ajax({
	            url: '{{ url('order/updateStatusOrder') }}',
	            type: 'post',
	            dataType: 'json',
	            data: params,
	            success:function(data){
	            	 if(data.status == 200){

                        var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color: #00a65a;"></i>'+data.message+'</p>';
							 $('.contentpoppup').html(html);
							$('#popupmess').modal('show');


	            	 }else{

	            	 	 var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>'+data.message+'</p>';
						 $('.contentpoppup').html(html);
						$('#popupmess').modal('show');

	            	 }

	            setTimeout(function(){
                        window.location.reload();
                     }, 1000)
	              
	            },
	        });
	}

	function onClickNewStatus(ob){
       if(ob == 2){

       	   $('#orderNew-m2').hide();
       	   var html = '<span class="status status-pending">Đang xử lý</span>';
       	   $('.valueStatus').val(2);
           $('#choose-m2').html(html);

       }else if(ob == 3){

       	   $('#orderNew-m2').hide();
       	   var html = '<span class="status status-doing">Đã xác nhận</span>';
       	   $('.valueStatus').val(3);
       	   $('#choose-m2').html(html);

       }else if(ob == 6){

       	   $('#orderNew-m2').hide();
           var html = '<span class="status status-denied">Hủy</span></a>';
            $('.valueStatus').val(6);
           $('#choose-m2').html(html);
       }else if(ob == 4){
       	   $('#orderNew-m2').hide();
           var html = '<span style="color: #eda21b;" class="status status-denied">Đang giao hàng</span></a>';
            $('.valueStatus').val(4);
           $('#choose-m2').html(html);
       }else if(ob == 7){
           $('#orderNew-m2').hide();
           var html = '<span style="color: #d00;" class="status status-denied">Chuyển hoàn</span></a>';
            $('.valueStatus').val(7);
           $('#choose-m2').html(html);
       }
	}

	function onClickToChooseCancelReason(ob){
      if(ob == 1){
      	$('#modalHuyOrder .contenOrder').val('Sản phẩm đã hết hàng');
      }else if(ob == 2){
        $('#modalHuyOrder .contenOrder').val('Không liên lạc được với khách hàng');
      }else if(ob == 3){
      	$('#modalHuyOrder .contenOrder').val('Khách yêu cầu hủy');
      }else if(ob == 4){
      	$('#modalHuyOrder .contenOrder').val('Vượt quá số lần hỗ trợ giao hàng');
      }else if(ob == 5 ){
      	$('#modalHuyOrder .contenOrder').val('Địa chỉ không hỗ trợ giao hàng');
      }else if(ob == 6){
          
      }
	}

	function showTextarea(ob){
		
		if(ob == 6){
			$('#cancelReasonOtherText').show();
		var content = $('#modalHuyOrder textarea[name="content"]').val();
		}else if(ob == 5){
            ('#cancelReasonOtherText').hide();
 
        }
	}

	$('.submitForm').click(function(){
		var content = '';
		var params = {};
		if(document.getElementById('cancelReason1').checked) {
		    content = 'Sản phẩm đã hết hàng';
		}else if(document.getElementById('cancelReason2').checked) {
		    content = 'Không liên lạc được với khách hàng';
		}else if(document.getElementById('cancelReason3').checked){
            content = 'Khách yêu cầu hủy';
		}else if(document.getElementById('cancelReason4').checked){
            content = 'Vượt quá số lần hỗ trợ giao hàng';
		}else if(document.getElementById('cancelReason5').checked){
            content = 'Địa chỉ không hỗ trợ giao hàng';
		}else if(document.getElementById('cancelReason6').checked){
            content =  $('#modalHuyOrder textarea[name="content"]').val();
		}
		if(content ==''){
           
		}else{
           var locationv2 = window.location.href;
	       var str = locationv2.split("/");
	       params['zaloid'] = str[6];
	       params['orderId'] = str[5];
	       params['content'] = content;
	       params['status']  = 6;
	       params['_token'] = $('input[name="_token"]').val();
           
           $.ajax({
	            url: '{{ url('order/updateStatusOrder') }}',
	            type: 'post',
	            dataType: 'json',
	            data: params,
	            success:function(data){
	            	 if(data.status == 200){

                        var html = '<p class="contentmess"><i class="icon-checkmark-circle mr-3 icon-2x" style="color: #00a65a;"></i>'+data.message+'</p>';
							 $('.contentpoppup').html(html);
							$('#popupmess').modal('show');
                           $('#modalHuyOrder').modal('hide');

	            	 }else{

	            	 	 var html = '<p class="contentmess"><i class="icon-cancel-circle2 mr-3 icon-2x" style="color: red;"></i>'+data.message+'</p>';
						 $('.contentpoppup').html(html);
						$('#popupmess').modal('show');

	            	 }

	            setTimeout(function(){
                        window.location.reload();
                     }, 1500)
	              
	            },
	        });

		}
	});
</script>

	@stop