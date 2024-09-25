@props(['category'=>'category','value'=>'value','name'=>'name','label'=>'label'])

<div class="form-check">
    <input class="form-check-input" type="checkbox" value="{{$value}}" id="flexCheckChecked" name="{{$name}}" @if(old($name)??$category==$value)checked @else @endif>
    <label class="form-check-label" for="flexCheckChecked">
        {{$label}}
    </label>
</div>
