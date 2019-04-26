@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
</div>

<div class="card card-default">
    <div class="card-header">Posts</div>
    <div class="card-body">
        @if ($posts->count()>0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><img src="/storage/{{$post->image}}" width="120px"></td>
                    <td>{{$post->title}}</td>
                    @if (!$post->trashed())
                    <td><button class="btn btn-info btn-sm">Edit</button></td>
                    @endif
                    <td>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm"> {{$post->trashed()?'Delete':'Trash'}}
                            </button>
                        </form>
                    </td>
                </tr> @endforeach </tbody>
        </table>
        @else
        <h3 class="text-center">No Post Yet.</h3>
        @endif

    </div>
</div> @endsection