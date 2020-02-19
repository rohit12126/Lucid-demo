@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Users List</h2>
 
  <div id="userList"></div>
</div>
<script>
$(document).ready(function(){
    getUserList('');
});

function getUserList(url){
    var link = url|| "{{url('/get-user-list')}}";
    $.ajax({
        type:'get',
        url: link,
        dataType:'json', 
        success: function(result){
          $("#userList").html(result.html);
  }});
}

function deleteUser(id){
    var link = "{{url('/delete-user')}}";
    $.ajax({
        type:'post',
        url: link,
        data:{"_token": "{{ csrf_token() }}",'id':id},
        dataType:'json', 
        success: function(result){
            if(result.success){
                alert(result.message);
                getUserList('');
            }else{
                alert(result.message);
            }
         
  }});
}

</script>
@endsection


