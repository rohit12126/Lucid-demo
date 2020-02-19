@extends('api::app')
@section('content')
        <div class="container">
  <h2>User Table</h2>         
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
      <tr>
        <td>{{$user['name']}}</td>
        <td>{{$user['last_name']}}</td>
        <td>{{$user['email']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection

