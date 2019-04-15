<div class="select is-multiple">
    <select name="colors[]" multiple size="5">
        <option value="" disabled selected>Colors</option>
        @foreach ($colors as $key => $value) 
            <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>