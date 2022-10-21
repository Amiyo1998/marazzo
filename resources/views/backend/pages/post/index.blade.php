@extends('backend.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('posts.index')}}">{{ $title }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">{{ session('message') }}</div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr class="border border-2">
                            <th class="border border-2">ID</th>
                            <th class="border border-2">Title</th>
                            <th class="border border-2">Category Name</th>
                            <th class="border border-2">Short Description</th>
                            <th class="border border-2">Description</th>
                            <th class="border border-2">Image</th>
                            <th class="border border-2">Tag</th>
                            <th class="border border-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key=>$post)
                        <tr class="border border-5">
                            <td class="border border-5">{{ ++$key }}</td>
                            <td class="border border-5">{{ Str::limit($post->title, 20, '...')}}</td>
                            <td class="border border-5">{{ $post->category->name }}</td>
                            <td class="border border-5">{{ Str::limit($post->short_description, 20, '...') }}</td>
                            <td class="border border-5">{{ Str::limit($post->description, 20, '...') }}</td>
                            <td class="border border-5"><img src="{{ asset('storage/'.$post->image) }}" alt="" width="50px" height="30px"></td>
                            <td class="border border-5">
                                <a href="{{ route('posts.edit', $post->id)}}"><i class="fas fa-edit bg-primary text-light px-2 py-2" style="font-size: 17px;"></i></i></a>
                                <form action="{{ route('posts.destroy',$post->id )}}" method="POST" class="d-inline-block border rounded-3 ">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <i class="fas fa-trash-alt" style="font-size: 20px; cursor:pointer;" onclick="return confirm('Are you sure to delete?');"></i>
                                     --}}
                                     <button class="btn btn-danger fs-4 fw-bold text-light px-2 py-1" onclick="return confirm('Are you sure to delete?');"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td class="border border-5">{{ $post->tags->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>{{ $posts->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
