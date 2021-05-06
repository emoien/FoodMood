
@if (session()->has('success'))
      <div class="alert alert-success">
              {{ session('success') }}
      </div>
    @endif

    @if (session()->has('deleted'))
      <div class="alert alert-danger">
              {{ session('deleted') }}
      </div>
    @endif