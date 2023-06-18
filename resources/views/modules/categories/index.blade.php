@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Manage Categories</h4>
                    <p class='text-end'><a href='/categories/create' class='btn btn-primary mb-3 '><i class="fa fa-plus-circle" aria-hidden="true"></i> Add a category</a></p>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Post Count</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($categories as $category)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{@$category->name}}</td>
                                        <td><a href='{{ route('posts-by-category',['slug' => $category->slug]) }}'>{{@$category->posts_count}}</a></td>
                                        <td>{{@$category->created_at->format('F, d Y')}}</td>
                                        <td>@include('modules.categories.action',['category' => $category])</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

