@include('sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- For Success Message -->
    @if(session('status'))
        <div class="col-md-6 offset-md-3 alert alert-success alert-dismissible fade show" role="alert">{{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          @foreach ($posts as $post)
            <div class="col-lg-6">
               <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $post->name }}</h5>

                <p class="card-text">{{ Str::limit("$post->description",'200')}}</p>

              <a class="button btn btn-primary" href="{{url("admin/post/update/$post->id")}}">Edit</a>
              <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this item ?')" 
                        href="{{url("admin/post/delete/$post->id")}}">Delete</a>
              </div>
            </div> 
            </div>
          @endforeach
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

