@if (session('status'))
    <div class="notification is-primary">
        {{ session('status') }}
    </div>
@endif

@if (session('success'))
    <div class="notification is-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="notification is-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif