@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Manage Blogs</h4>
                    <p class='text-end'><a href='/posts/create' class='btn btn-primary mb-3 '><i class="fa fa-plus-circle" aria-hidden="true"></i> Post a blog</a></p>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Published On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($posts as $post)
                                    <tr>
                                        <td>{{@$loop->iteration}}</td>
                                        <td>{{@$post->title}}</td>
                                        <td>{{@$post->category->name}}</td>
                                        <td>{{@$post->user->name}}</td>
                                        <td>{{@$post->created_at->format('F, d Y')}}</td>
                                        <td>@include('modules.posts.action',['post' => $post])</td>
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

