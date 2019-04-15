<div class="select is-multiple">
    <select name="fabrics[]" multiple size="5">
        <option value="" disabled selected>Fabrics</option>
        @foreach ($fabrics as $key => $value) 
            <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>