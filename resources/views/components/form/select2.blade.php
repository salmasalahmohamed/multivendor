@props(['label'=>'label','name'=>'name','options'=>'','slected'])


<div class="form-group">
    <label> {{$label}}  </label>
    <label id="projectinput7" class="file center-block">
        <select name={{$name}}>
            @foreach($options as $key=> $option)
                <option value="{{$option->id}} "@if($option==$slected) selected @else @endif>{{$option->name}}</option>
            @endforeach
        </select>
        <span class="file-custom"></span>
    </label>

</div>
