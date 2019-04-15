<div class="select">
    <select name="brand_id">
        <option value="" disabled selected>Brand</option>
        @foreach ($brands as $key => $value) 
            <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>