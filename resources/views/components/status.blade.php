@if(session()->has('status'))
<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ session()->get('status') }}</strong>
</div>
@endif
