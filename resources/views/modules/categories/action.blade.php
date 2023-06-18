{!! Form::open([ 'route' => ['categories.destroy', $category->slug], 'method' => 'delete']) !!}
    <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('categories.edit', $category->slug) }}">
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
{!! Form::close() !!}