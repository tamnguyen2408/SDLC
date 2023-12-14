@extends('admin-layout')

@section('breadcrumb-item', 'Singers')
@section('breadcrumb-item-active', 'Lists')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h3 class="text-center"> List singers</h3>
            <a class="btn btn-primary" href="{{ route('admin.singer.add') }}"> Add Singer + </a>
            <hr />
            @if (Session::has('add-singer'))
                <div class="alert alert-success">
                    {{ Session::get('add-singer') }}
                </div>
            @endif
            @if (Session::has('update-singer'))
            <div class="alert alert-success">
                {{ Session::get('update-singer') }}
            </div>
        @endif
        @if (Session::has('delete-singer'))
            <div class="alert alert-info">
                {{ Session::get('delete-singer') }}
            </div>
        @endif
            <hr />
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Info</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th colspan="2" width="5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($singers as $singer)
                    <tr>
                        <td>{{ $singer->id }}</td>
                        <td>{{ $singer->name }}</td>
                        <td>{{ $singer->information }}</td>
                            <td>
                                <img width="70" class="img-fulid" src="{{ URL::to('/uploads/images') }}/{{ $singer->image }}" />
                            </td>
                     
                        <td>{{ $singer->status == 1 ? 'Active' : 'Deactive' }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('admin.singer.edit',['id' => $singer->id]) }}">Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.singer.delete',['id' => $singer->id]) }}">
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
