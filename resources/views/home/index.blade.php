@extends('layout.app')

@section('content')
 @if (session('status'))
 
 <div class="box box-primary">
	 <div class="box-body pad table-responsive">
		 sdfafds
		 
	 </div>
	 
 </div>
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
@endif

<div class="box box-primary">

	<div class="box-body">
		Start creating your amazing application!
	</div>
</div>
@endsection
