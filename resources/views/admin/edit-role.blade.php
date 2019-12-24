@extends('layout.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Role</h1>
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
              <h3 class="card-title">Edit Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('updateRole',[$role])}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Role</label>
                  <input type="text" class="form-control" id="permission" value={{$role->name}} name="role" placeholder="Enter role">
                </div>
                
                <?php
                      $a = array(); 
                ?>
                    @foreach ($permissions as $permission)
                          <?php
                              $name = $permission->name;
                              array_push($a,$name); 
                          ?>
                    @endforeach
                    
                <label for="exampleInputEmail1">Allow Permissions</label>
                @foreach ($all_permissions as $a_permission)
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="permissions[]" 
                        <?php 
                        if(in_array($a_permission->name,$a))
                        {
                          echo "checked";
                        } 
                        ?> 
                        id="{{$a_permission->id}}" value="{{$a_permission->name}}">
                        <label for="{{$a_permission->id}}" class="custom-control-label">{{$a_permission->name}}</label>
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
    
@endsection