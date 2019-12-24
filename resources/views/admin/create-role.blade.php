@extends('layout.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Role</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">General Form</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('saveRole')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Role</label>
                  <input type="text" class="form-control" id="permission" name="role" placeholder="Enter role">
                </div>

                <label for="exampleInputEmail1">Allow Permissions</label>
                @foreach ($permissions as $permission)
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->id}}" value="{{$permission->name}}">
                        <label for="{{$permission->id}}" class="custom-control-label">{{$permission->name}}</label>
                    </div>
                @endforeach
                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <div class="card col-md-9">
    <div class="card-header">
      <h3 class="card-title">All Roles</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Sr#</th>
          <th>Role Name</th>
          <th>Assigned Permissions</th>
          <th>Action</th>
        </tr>
        </thead>
        <?php 
          $srno = 1;
          $str='';
          
          
          // array_push($a,'grren');
          // array_push($a,'yellow');
        ?>
        <tbody>
        @foreach ($roles as $role)
          <?php $str=''?>
          <tr>
            <td>{{$srno++}}</td>
            <td>{{$role->name}}</td>
              @foreach ($role->permissions as $permission)
                    <?php
                        $per = $permission->name;
                        $str = $str .', '. $per; 
                        ?>    
              @endforeach
              <td>{{$str}}</td>    
            <td><a href="{{route('editRole',[$role])}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
              <a href="{{route('deleteRole',[$role])}}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</a></td>  
          </tr>    
        @endforeach
        

        </tbody>
        <tfoot>
        <tr>
          <th>Sr#</th>
          <th>Role Name</th>
          <th>Assigned Permissions</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
    
@endsection