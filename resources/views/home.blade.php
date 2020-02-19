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
    bootbox.confirm({
    message: "This is a confirm with custom button text and color! Do you like it?",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if(result){
            var link = "{{url('/delete-user')}}";
            $.ajax({
                type:'post',
                url: link,
                data:{"_token": "{{ csrf_token() }}",'id':id},
                dataType:'json', 
                success: function(result){
                    if(result.success){
                        getUserList('');
                        toastr.success(result.message);
                    }else{
                        toastr.error(result.message);
                    }
                
            }});
        }
    }
});

    
}

</script>
@endsection


