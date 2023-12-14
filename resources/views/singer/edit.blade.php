@extends('admin-layout')

@section("breadcrumb-item", "Singer")
@section("breadcrumb-item-active", "Update")

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <h4 class="text-center"> Update Singer</h4>
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

        @if (Session::has('update-singer'))
            <div class="alert alert-danger">
                {{ Session::get('update-singer') }}
            </div>
        @endif

        <form action="{{ route('admin.handle.edit',['id' => $singer->id]) }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <label>Name's Singer</label>
                        <input class="form-control" name="name" value="{{ $singer->name }}" />
                    </div>
                    <div class="mb-3">
                        <label>Information</label>
                        <input class="form-control" name="information" value="{{ $singer->information }}"/>
                    </div>
                      
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" />
                        <img width="20%" class="img-fluid" src="{{ URL::to('uploads/images') }}/{{ $singer->image }}" />
                    </div>
                    <div class="mb-3">
                        <label> Status</label>
                        <select class="form-control" name="status">
                            <option>-- Select --</option>
                            <option value="1" {{ $singer->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $singer->status == 0 ? 'selected' : '' }}>Deactive</option>
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