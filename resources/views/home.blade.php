@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="card-title text-center">{{(request()->slug ? getCategoryNameBySlug(request()->slug) : 'Blogs')}}</h3>
                    {{-- <div > --}}
                        <p class='text-end'><a href='/posts/create' class='btn btn-primary mb-3 '><i class="fa fa-plus-circle" aria-hidden="true"></i> Post a blog</a></p>
                        
                    {{-- </div> --}}
                     @forelse($posts as $post)

                        <a href='/posts/{{$post->slug}}' class='blog_link'>
                            <div class="card mb-5 shadow hover">
                                <img src="{{$post->featured_image}}" class="card-img-top img-fluid blog_image" alt="Card image">
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    @if(!request()->slug)
                                        -{{@$post->category->name}}
                                    @endif
                                    <p class="card-text">{!! $post->short_content !!}</p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center">
                                        <img src="{{url('/images/no-user-image.gif')}}" class="rounded-circle me-2" alt="Author profile image" width="40" height="40">
                                        <span class="flex-grow-1">{{$post->user->name}}</span>
                                        <span class="text-muted">{{$post->created_at->format('F, d Y')}}</span>
                                        {{-- <div>
                                            <i class="fas fa-edit me-2"></i>
                                            <i class="fas fa-trash"></i>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty 
                        <p class='text-center'>No blogs added yet!</p>
                    @endforelse
                    <div class="pagination_links">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
