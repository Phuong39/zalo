@extends('master')

@section('title','Theo dõi kết bạn')

@section('main')

			<!-- Content area -->

			<div class="content">

				

				   <!-- Page header -->

							<div class="page-header">

								<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">

							    <div class="d-flex">

							        <div class="breadcrumb">

							            <a href="{{ asset('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Trang chủ</a>

							            <span class="breadcrumb-item active">Kết bạn</span>

							            <span class="breadcrumb-item active">Theo dõi kết bạn</span>

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

				    <div class="card">

				        <div class="card-body">

				        <input type="hidden" name="_token" value="dQQHrNFaYgJsqCsU02PY31slSNul3uKavUedLG8j">        

				        <form method="GET">

				            <div class="row">

				                <div class="col-md-2"><button class="btn btn-danger" type="button" onclick="deleteSchedulefb()"><i class="icon-folder-remove mr-3 icon-1x"></i> Xóa</button></div>

				                <div class="col-md-5">

				                    {{-- <input type="text" placeholder="Tìm kiếm" name="key" class="form-control" value=""> --}}

				                </div><!--col-md-9-->

				                <div class="col-md-3">

				                    {{-- <button type="submit" class="btn btn-dark"><i class="icon-search4"></i> Tìm kiếm</button> --}}

				                </div>

				            </div>

				        </form>

				        </div>

				    </div>

				    </div><!--col-md-12-->

				    <div class="col-md-12">

				        <div class="card formfb">

					        <div class="card-header header-elements-inline bg-slate-800">

					            <h5 class="card-title">Danh sách</h5>

					            {{ csrf_field() }}

					        </div>

					       <div class="table-responsive">

					                    <table class="table table-striped">

					                <thead>

					                    <tr>

					                        <th>

					                            <div class="form-check">

												<label class="form-check-label">

													<input type="checkbox" class="form-check-input-styled-warning" data-fouc onclick="checkAllCheckboxfb(this)">

													

												</label>

											</div>

					                        </th>

					                        <th>ID</th>

					                        <th>Tổng SĐT</th>

					                        <th>Nội dung</th>

					                        <th>Đã gửi</th>

					                        <th>Còn lại</th>


					                    </tr>

					                </thead>

					                <tbody>

                                     @foreach($list as $row)

					                       <tr>

					                        <td>

					                       <div class="form-check form-check-inline">

											<label class="form-check-label formPostfb">

												<input type="checkbox" class="form-check-input-styled" name="selectGroup[]" data-fouc value="">

												

											</label>

										</div>

					                        </td>

					                        <td>{{ $row->id }}</td>

					                        <td>{{ $row->total }}</td>

					                        <td>{{ $row->content }}</td>

					                        <td>{{ $row->countsend }}</td>

					                        <td>{{ $row->count }}</td>

					                    </tr>
                                    @endforeach
					                   

					                  </tbody>

					            </table>

					            <div class="mt-1 mb-1 ml-3">

					                

					            </div>

					                    </div>

					    </div>

				    </div><!--col-md-6-->



				</div><!--row-->

			</div>

			<script>

				

			</script>



			<!-- /content area -->

			@stop





			