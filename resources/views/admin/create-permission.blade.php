@extends('layout.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Permission</h1>
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
              <h3 class="card-title">Quick Example</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{route('savePermission')}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Permssion</label>
                  <input type="text" class="form-control" id="permission" name="permission" placeholder="Enter permission">
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

  <div class="card col-md-9">
    <div class="card-header">
      <h3 class="card-title">All Permissions</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Sr#</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <?php
          $srno = 1;
        ?>
        <tbody>
        @foreach ($permissions as $permission)
          <tr>
          <td>{{$srno++}}</td>
            <td>{{$permission->name}}</td>
            <td><a href="{{route('editPermission',[$permission])}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
              <a href="{{route('deletePermission',[$permission])}}" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Delete</a></td>  
          </tr>    
        @endforeach
        

        </tbody>
        <tfoot>
        <tr>
          <th>Sr#</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>


  @endsection