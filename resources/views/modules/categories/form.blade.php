<div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" required value="{{old('name',@$category->name)}}" maxlength="191">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
