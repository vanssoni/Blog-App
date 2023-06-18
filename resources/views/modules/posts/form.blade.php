<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" required value="{{old('title',@$post->title)}}" maxlength="191">
    @error('title')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea class="form-control" id="content" name="content" >{{old('content',@$post->content)}}</textarea>
    @error('content')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-select" id="category" name="category_id" required>
        <option value="">Select a category</option>
        @foreach($categories as $category )
         <option value={{$category->id}} {{(old('category_id', @$post->category_id) == $category->id ? 'selected': '')}}>{{$category->name}}</option>
        @endforeach
    </select>
    @error('category_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
@if(@$post && @$post->getRawOriginal('featured_image'))
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="exampleCheckbox" name="remove_featured_image">
        <label class="form-check-label" for="remove_featured_image">Remove Featured Image</label>
    </div>
@endif
<div class="mb-3">
    <label for="featuredImage" class="form-label">Featured Image</label>
    <input type="file" class="form-control" id="featuredImage" name="featured_image" accept="image/*">
    @error('featured_image')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

@push('scripts')

<script>
    $(function(){
        tinymce.init({
            selector: '#content',
            height: 300,
            theme: 'modern',
            plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true,
            templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
            ],
            setup: function (editor) {
                editor.on('init', function () {
                    if (editor.getContent().trim() === '') {
                        editor.setContent('');
                    }
                });
            }
        });
        $('.submit_btn').click(function(event) {
            var contentValue =        tinymce.get('content').getBody().innerHTML;
            console.log(contentValue.trim());
            if (!contentValue.trim() || contentValue.trim() == '<p><br data-mce-bogus="1"></p>') {
                $('div#mceu_16').addClass('error');
                event.preventDefault(); // Prevent form submission if content is empty
            }
        });
    });
    </script>
@endpush
