@extends('layout.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create User</h1>
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
              <h3 class="card-title">Create User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('saveUser')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">User Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password"  id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Roles</label>
                        @foreach ($roles as $role)
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="roles[]" id="{{$role->id}}" value="{{$role->name}}">
                                <label for="{{$role->id}}" class="custom-control-label">{{$role->name}}</label>
                            </div>    
                        @endforeach    
                    </div>
                    
                    <div class="col-md-6">
                        <label for="">Permissions</label>
                        @foreach ($permissions as $permission)
                            <div class="custom-control custom-checkbox col-md-6">
                                <input class="custom-control-input" type="checkbox" name="permissions[]" id="{{$permission->id}}" value="{{$permission->name}}">
                                <label for="{{$permission->id}}" class="custom-control-label">{{$permission->name}}</label>
                            </div>    
                        @endforeach
                    </div>
                </div>
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