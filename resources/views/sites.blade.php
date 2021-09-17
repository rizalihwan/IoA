@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('sites.store') }}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="body">Body</label>
                        <input type="text" name="body" id="body" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_id">UserID</label>
                        <input type="text" name="user_id" id="user_id" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-2">Save Data</button>
            </form>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="{{ route('sites.detail', $item->id) }}" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
