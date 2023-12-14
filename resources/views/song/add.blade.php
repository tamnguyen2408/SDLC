@extends("admin-layout")

@section("breadcrumb-item", "Song")
@section("breadcrumb-item-active", "Create")

@section("content")
<div class="row">
    <div class="col-sm-12 col-md-12">
        <h4 class="text-center"> Add Song</h4>
        <a class="btn btn-info btn-sm" href="{{ route('admin.song') }}"> Back to list song</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('add-song'))
            <div class="alert alert-danger">
                {{ Session::get('add-song') }}
            </div>
        @endif

        <form action="{{ route('admin.song.handle.add') }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <label>Name's Song</label>
                        <input class="form-control" name="name" />
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option value=""> -- Select --</option>
                            @foreach ($categories as  $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Choose File</label>
                        <input type="file" class="form-control" name="source" />
                    </div>
                    <div class="mb-3">
                        <label> Price</label>
                        <input type="text" class="form-control" name="price" />
                    </div>
                    <div class="mb-3">
                        <label> Status</label>
                        <select class="form-control" name="status">
                            <option>-- Select --</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <label>Poster</label>
                        <input type="file" class="form-control" name="poster_music" />
                    </div>
                    <div class="mb-3">
                        <label>Lyrics</label>
                        <textarea rows="8" class="form-control" name="lyric"></textarea>
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