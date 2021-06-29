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
            <div class="card-body">
                <h1>Thêm Sản Phẩm</h1>
                <form action="{{url("products/save")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" value="{{old("name")}}" class="ipf" id="name" name="name" >
                        @error("name")<div class="alert alert-danger" style="width: 100%;" >{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" value="{{old("image")}}" class="ipf"  name="image" >
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" value="{{old("description")}}" class="ipf" id="name" name="description">
                    </div>
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="number" min="0" value="{{old("price")}}" class="ipf" id="name" name="price">
                    </div>
                    <div class="form-group">
                        <label>Qty:</label>
                        <input type="number" min="0" class="ipf" id="name" name="qty" >
                    </div>
                    <div class="form-group">
                        <label>Category_id</label>
                        <select name="category_id" class="form-control" >
                            <option value="0">Select a category</option>
                                @foreach($category as $cat)
                                <option  @if(old("category_id")==$cat->id)selected @endif value="{{$cat->id}}">
                                    {{$cat->name}}
                                </option>
                                @endforeach
                        </select>
                    </div>
                    <button type="submit" name="dangky">Thêm</button>
                </form>
            </div>
        </div>
    </Main>
@endsection
