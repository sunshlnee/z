<div class="tabs is-centered is-medium is-toggle is-toggle-rounded"> 
    @can ('admin-panel')
    <ul>
        <li class="{{ $page === '' ? ' is-active' : '' }}"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="{{ $page === 'products' ? ' is-active' : '' }}"><a href="{{ route('admin.products.index') }}">Products</a></li>
        <li class="{{ $page === 'users' ? ' is-active' : '' }}"><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="{{ $page === 'categories' ? ' is-active' : '' }}"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
        <li class="{{ $page === 'brands' ? ' is-active' : '' }}"><a href="{{ route('admin.brands.index') }}">Brands</a></li>
        <li class="{{ $page === 'colors' ? ' is-active' : '' }}"><a href="{{ route('admin.colors.index') }}">Colors</a></li>
        <li class="{{ $page === 'fabrics' ? ' is-active' : '' }}"><a href="{{ route('admin.fabrics.index') }}">Fabrics</a></li>
        <li class="{{ $page === 'sizes' ? ' is-active' : '' }}"><a href="{{ route('admin.sizes.index') }}">Sizes</a></li>
    </ul>
    @endcan
</div>