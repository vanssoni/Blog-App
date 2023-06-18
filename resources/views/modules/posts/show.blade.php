@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>{{$post->title}}</h3>  
                    <p>{{$post->created_at->format('F, d Y')}} -<a href='{{ route('posts-by-category',['slug' => $post->category->slug]) }}'>{{$post->category->name}}</a>
                    </p> 
                    {!! $post->content!!}
                    <p class='text-end'>By <b></b>{{$post->user->name}}</p>
                    <h4 class='text-center mt-5'>Related Blogs</h4>
                    <div class='row'>
                        @forelse($related_blogs as $post)
                            <div class="card col-md-6">
                                <div class="card-body">
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
                                </div>
                            </div>
                        @empty 
                            <p class='text-center'>No related blogs!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

