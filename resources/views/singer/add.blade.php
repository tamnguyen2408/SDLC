@extends("admin-layout")

@section("breadcrumb-item", "Singer")
@section("breadcrumb-item-active", "Create")

@section("content")
<div class="row">
    <div class="col-sm-12 col-md-12">
        <h4 class="text-center"> Add Singer</h4>
        <a class="btn btn-info btn-sm" href="{{ route('admin.singer') }}"> Back to list singer</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('add-singer'))
            <div class="alert alert-danger">
                {{ Session::get('add-singer') }}
            </div>
        @endif

        <form action="{{ route('admin.singer.handle.add') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <label>Singer Name</label>
                        <input class="form-control" name="name" />
                    </div>
                    <div class="mb-3">
                        <label>Singer Information</label>
                        <input class="form-control" name="information"/>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" />
                    </div>
                    <div class="mb-3">
                        <label>Singer Status</label>
                        <select class="form-control" name="status">
                            <option value="">-- Select --</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                   
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit"> Save</button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
@endsection
