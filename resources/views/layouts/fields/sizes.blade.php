<div class="select is-multiple">
    <select name="sizes[]" multiple size="5">
        <option value="" disabled selected>Sizes</option>
        @foreach ($sizes as $key => $value) 
            <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>