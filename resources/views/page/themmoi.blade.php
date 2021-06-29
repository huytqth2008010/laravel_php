@extends("layout")
@section("main")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    <Main id="Main">
        <div class="main-form">
            <div class=" aaa">
                <div class="forms">
                    <h1>Thêm Sản Phẩm</h1>
                    <form action="{{url("categories/save")}}" method="post">
                        @csrf
                        <div class="forms-1">
                            <div class="form-group form1">
                                <label>Tên SP:</label>
                                <input type="text" class="ipf" id="name" name="ten" required>
                            </div>
                            <button type="submit" name="dangky">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </Main>
@endsection
