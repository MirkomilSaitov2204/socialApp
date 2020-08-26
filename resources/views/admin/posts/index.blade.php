@extends('admin.layouts.master')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="panel">
            <div class="panel-header">
                <h3 class="text-center" style="padding-top: 20px">Posts List</h3>
                <hr>

            </div>
            <div class="panel-body">
                    <div class="d-flex justify-content-end mb-5">
                        @can('create-users')
                            <a href="{{ route('post.create') }}" class="btn btn-outline-secondary"><i class="fa fa-user-plus"></i> Create Posts</a>
                        @endcan
                    </div>
                    <div class="col-md-12">
                        <table id="table" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Image</th>
                                        <th>title</th>
                                        <th>Language</th>
                                        <th>is Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $k=>$post)
                                        <tr>
                                            <td>{{ ++$k }}</td>
                                            <td>
                                                <img src="/storage/postImage/{{ $post->image }}" alt="" width="80px" height="80px">
                                            </td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->iso_code }}</td>
                                            <td>
                                                @if ($post->is_active == 1)
                                                    No
                                                @else
                                                    Yes
                                                @endif
                                            </td>
                                            <td>
                                                @can('read-users')
                                                    <a href="{{ route('post.show', ['id' => $post->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                @endcan
                                                @can('update-users')
                                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                                @endcan
                                                @can('delete-users')
                                                    <form action="{{ route('user.destroy', ['id'=>$post->id]) }}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button  type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>№</th>
                                        <th>Image</th>
                                        <th>title</th>
                                        <th>Language</th>
                                        <th>is Active</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                    </div>
            </div>
        </div>
    </section>
</section>
@endsection
