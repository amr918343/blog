@if (Session::has('success'))
    <div class="container">
        <div class="alert alert-success">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    </div>
@endif
