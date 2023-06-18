@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Update Blog</h4>
                    {!! Form::open(['route' => ['posts.update',$post->slug], 'class' => 'forms-sample','files'  => true, 'id' =>'blog-form','method' => 'put']) !!}
                        @include('modules.posts.form')
                        {!! Form::submit('Update', ['class' => 'btn btn-primary mt-2 submit_btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
              