<table class="table table-striped">
    <thead>
      <tr>
        <th>Fill Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
{{ $users->links() }}
@if(!empty($users))      
      @foreach($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><ul>
            <li><a href="{{url('/edit/'.$user->id)}}">Edit</a></li>
            <li><a href="javascript:void(0)" onclick="deleteUser('{{$user->id}}')">Delete</a></li>
          </ul>
        </td>
      </tr>
      @endforeach
@else
      <tr>
        <td colspan="3">No record found</td>
      </tr>
@endif
</tbody>
  </table>
<script>
$(document).ready(function(){
  $('.pagination a').on('click', function(e){
    e.preventDefault();
    var url = $(this).attr('href');
       console.log(url);
       getUserList(url);
     });
});
</script>



