@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Add Category</h4>
                    {!! Form::open(['route' => 'categories.store', 'class' => 'forms-sample','files'  => true, 'id' =>'blog-form']) !!}
                        @include('modules.categories.form')
                        {!! Form::submit('Create', ['class' => 'btn btn-primary mt-2 submit_btn']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
              