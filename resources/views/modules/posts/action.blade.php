{!! Form::open([ 'route' => ['posts.destroy', $post->slug], 'method' => 'delete']) !!}
    <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('posts.show', $post->slug) }}">
        <i class="fa fa-eye"></i>
    </a>
    <a class="btn btn-warning btn-icon-text btn-xs" href="{{ route('posts.edit', $post->slug) }}">
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger btn-icon-text btn-xs delete', 'type' => 'submit']) !!}
{!! Form::close() !!}