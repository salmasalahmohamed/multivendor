@props(['type','name','value'=>'','category'=>''])
<div>
    <div class="form-group">
        <label> {{$name}} </label>
            <input type="{{$type}}" id="file" name="{{$name}}"  value="{{old($name)??$value}}"
            >
            <span class="file-custom"></span>
            @if($category!=null)
                <td><img src="{{asset($category)}}"></td>

            @endif
        @error($name)
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
