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
                                <li class="breadcrumb-item"><a href="{{ route('sliders.index')}}">{{ $title }}</a></li>
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
                        <tr class="border ">
                            <th class="border ">ID</th>
                            <th class="border ">Title</th>
                            <th class="border ">Sub Title</th>
                            <th class="border ">Description</th>
                            <th class="border ">URL</th>
                            <th class="border ">Image</th>
                            <th class="border ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $key=>$slider)
                        <tr class="border border-5">
                            <td class="border border-5">{{ ++$key }}</td>
                            <td class="border border-5">{{ $slider->title }}</td>
                            <td class="border border-5">{{ $slider->sub_title }}</td>
                            <td class="border border-5">{{ Str::limit($slider->description, 20, '...') }}</td>
                            <td class="border border-5"><a href="{{ $slider->url }}" target="_blank" class="btn btn-primary">Click</a></td>
                            <td class="border border-5"><img src="{{ asset('storage/'.$slider->image) }}" alt="" width="50px" height="30px"></td>
                            <td class="border border-5">
                                <a href="{{ route('sliders.edit', $slider->id)}}"><i class="fas fa-edit bg-primary text-light px-2 py-2" style="font-size: 17px;"></i></i></a>
                                <form action="{{ route('sliders.destroy',$slider->id )}}" method="POST" class="d-inline-block border rounded-3 ">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <i class="fas fa-trash-alt" style="font-size: 20px; cursor:pointer;" onclick="return confirm('Are you sure to delete?');"></i>
                                     --}}
                                     <button class="btn btn-danger fs-4 fw-bold text-light px-2 py-1" onclick="return confirm('Are you sure to delete?');"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>{{ $sliders->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
