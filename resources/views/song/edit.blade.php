@extends('admin-layout')

@section("breadcrumb-item", "Song")
@section("breadcrumb-item-active", "Update")

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <h4 class="text-center"> Update Song</h4>
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

        @if (Session::has('update-song'))
            <div class="alert alert-danger">
                {{ Session::get('update-song') }}
            </div>
        @endif

        <form action="{{ route('admin.handle.edit',['id' => $song->id]) }}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <label>Name's Song</label>
                        <input class="form-control" name="name" value="{{ $song->name }}" />
                    </div>
                    <div class="mb-3">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option value=""> -- Select --</option>
                            @foreach ($categories as  $item)
                                <option value="{{ $item->id }}" {{ $item->id == $song->id ? 'selected' : '' }} > {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Choose File</label>
                        <input type="file" class="form-control" name="source" />
                        <audio controls>
                            <source src="{{ URL::to('/uploads/songs')}}/{{$song->source }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="mb-3">
                        <label> Price</label>
                        <input type="text" class="form-control" name="price" value="{{ $song->price }}" />
                    </div>
                    <div class="mb-3">
                        <label> Status</label>
                        <select class="form-control" name="status">
                            <option>-- Select --</option>
                            <option value="1" {{ $song->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $song->status == 0 ? 'selected' : '' }}>Deactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <label>Poster</label>
                        <input type="file" class="form-control" name="poster_music" />
                        <img width="20%" class="img-fluid" src="{{ URL::to('uploads/images') }}/{{ $song->poster_music }}" />
                    </div>
                    <div class="mb-3">
                        <label>Lyrics</label>
                        <textarea rows="8" class="form-control" name="lyric">{{ $song->lyric }}</textarea>
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