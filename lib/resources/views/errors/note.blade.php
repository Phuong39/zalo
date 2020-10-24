@if(Session::has('message'))
     <p class="alert alert-danger">{{Session::get('message')}}</p>
@endif

@foreach($errors->all() as $error)
<div class="alert alert-info bg-white alert-styled-left alert-arrow-left alert-dismissible" style="border-color: #f43636 !important;">
					<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
					{{$error}}
			    </div>
@endforeach