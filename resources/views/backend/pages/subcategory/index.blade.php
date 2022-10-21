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
                                <li class="breadcrumb-item"><a href="{{ route('subcategories.index')}}">{{ $title }}</a></li>
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
                            <th class="border ">Sub-Category Name</th>
                            <th class="border ">Category Name</th>
                            <th class="border ">Status</th>
                            <th class="border ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategories as $key=>$subcat)
                        <tr class="border border-5">
                            <td class="border border-5">{{ ++$key }}</td>
                            <td class="border border-5">{{ $subcat->name }}</td>
                            <td class="border border-5">{{ $subcat->category->name }}</td>
                            <td class="border border-5">
                                @if ($subcat->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td class="border border-5">
                                <a href="{{ route('subcategories.edit', $subcat->id)}}"><i class="fas fa-edit bg-primary text-light px-2 py-2" style="font-size: 17px;"></i></i></a>
                                <form action="{{ route('subcategories.destroy',$subcat->id )}}" method="POST" class="d-inline-block border rounded-3 ">
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
                <div>{{ $subCategories->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
