<div class="columns is-multiline">
    @foreach($products as $product)
        <div class="column is-one-quarter">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <a href="{{route('products.show', $product)}}">
                            <img src="{{$product->getPreview()}}" alt="Placeholder image" width="200px" height="200px">
                        </a>
                    </figure>
                </div>
                <div class="card-footer">
                    <div class="card-footer-item">
                        <h3>{{$product->code}} &ndash; {{$product->price}}р</h3>                    
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>