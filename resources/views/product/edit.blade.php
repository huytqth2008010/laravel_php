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
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sửa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <form action="{{url("products/update",["id"=>$item->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$item->name}}" class="form-control" placeholder="Tên..">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" value="{{$item->getImage()}}" class="form-control" placeholder="Image..">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" value="{{$item->description}}" class="form-control" placeholder="description..">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" value="{{$item->price}}" class="form-control" placeholder="price..">
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="number" name="qty" value="{{$item->qty}}" class="form-control" placeholder="qty..">
                            </div>
                            <div class="form-group">
                                <label>Category_id</label>
                                <select name="category_id" class="form-control" >
                                    @foreach($category as $cat)
                                        <option value="{{$cat->id}}">
                                            {{$cat->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
