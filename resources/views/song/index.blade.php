@extends("admin-layout")

@section("breadcrumb-item", "Songs")
@section("breadcrumb-item-active", "Lists")

@section("content")
<div class="row">
    <div class="col-sm-12 col-md-12">
        <h3 class="text-center"> List songs</h3>
        <a class="btn btn-primary" href="{{ route('admin.song.add') }}"> Add Song + </a>
        <hr/>
        @if (Session::has('add-song'))
            <div class="alert alert-success">
                {{ Session::get('add-song') }}
            </div>
        @endif
        @if (Session::has('update-song'))
            <div class="alert alert-success">
                {{ Session::get('update-song') }}
            </div>
        @endif
        @if (Session::has('delete-song'))
            <div class="alert alert-info">
                {{ Session::get('delete-song') }}
            </div>
        @endif
        <hr/>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Source</th>
                    <th>Poster</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th colspan="2" width="5%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($songs as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <audio controls>
                                <source src="{{ URL::to('/uploads/songs')}}/{{$item->source }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </td>
                        <td>
                            <img width="70" class="img-fulid" src="{{ URL::to('/uploads/images') }}/{{ $item->poster_music }}" />
                        </td>
                        <td>
                            {{ number_format($item->price) }}
                        </td>
                        <td>
                            {{ $item->status == 1 ? 'Active' : 'Deactive' }}
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.song.edit',['id' => $item->id]) }}">Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.song.delete',['id' => $item->id]) }}">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection