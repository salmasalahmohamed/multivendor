<div class="form-group">
    <label> parent  </label>
    <label id="projectinput7" class="file center-block">
        <select name="parent_id">
            <option value="">primary category</option>
            @foreach($items as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <span class="file-custom"></span>
    </label>
    @error('parent_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
