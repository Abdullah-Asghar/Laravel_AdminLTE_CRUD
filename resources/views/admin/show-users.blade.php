@extends('layout.app')

@section('content')
<div class="card col-md-12">
    <div class="card-header">
      <h3 class="card-title">All Users</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Sr#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Permissions</th>
          <th>Action</th>
        </tr>
        </thead>
        <?php 
          $srno = 1;
          
        ?>
        <tbody>
        @foreach ($users as $user)
        <?php 
            $str= ''; 
            $str1='';
            ?>
          <tr>
            <td>{{$srno++}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            @foreach ($user->roles as $role)
                <?php
                   $role_name =  $role->name; 
                   $str = $str. " / " .$role_name;       
                ?>
            @endforeach
            <td>{{$str}}</td>
            @foreach ($user->permissions as $permission)
                <?php
                    $permission_name = $permission->name;
                    $str1 = $str1.' / '.$permission_name;
                 ?>
            @endforeach
            <td>{{$str1}}</td>
            <td><a href="{{route('editUser',[$user])}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
              <a href="{{route('deleteUser',[$user])}}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</a></td>  
          </tr>    
        @endforeach
        

        </tbody>
        <tfoot>
        <tr>
          <th>Sr#</th>
          <th>Name</th>
          <th>Action</th>
          <th>Roles</th>
          <th>Permissions</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection