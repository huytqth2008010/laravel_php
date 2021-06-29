@extends("layout")
@section("main")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thêm Mới</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Thêm Mới</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    <Main id="Main">
        <div class="main-form">
            <div class="card-body">
                <h1>Thêm Mới</h1>
                <form action="{{url("brands/save1")}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" value="{{old("name")}}" class="ipf" id="name" name="name" >
                        @error("name")<div class="alert alert-danger" style="width: 100%;" >{{$message}}</div>@enderror
                    </div>
                    <div class="form-group ">
                        <label>Year:</label>
                        <input type="text" value="{{old("year")}}" class="ipf" id="name" name="year" >
                        @error("year")<div class="alert alert-danger" style="width: 100%;" >{{$message}}</div>@enderror
                    </div>
                    <button type="submit" name="dangky">Thêm</button>
                </form>
            </div>
        </div>
    </Main>
@endsection
