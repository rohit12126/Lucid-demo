@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Horizontal form</h2>
  <form class="form-horizontal" action="{{url('/update-user')}}" method="post" novalidate="true" data-toggle="validator" role="form">
  @if ($errors->any())
		    <div class="alert alert-danger">
		    	<strong>Whoops!</strong> Please correct errors and try again!.
						<br/>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
  <input type="hidden" name="id" value="{{$user->id}}">
  {{ csrf_field() }} 
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Full Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{$user->name}}" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">          
        <input type="email" class="form-control" id="email" placeholder="Enter passemail" name="email" value="{{$user->email}}" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
@endsection
@push('js')
<script type="text/javascript" src="https://1000hz.github.io/bootstrap-validator/dist/validator.min.js"></script>
@endpush

