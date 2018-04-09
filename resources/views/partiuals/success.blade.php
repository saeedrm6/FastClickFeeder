@if(session()->has('success'))
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Done!</strong> {{session()->get('success')}}
        </div>
    </div>

@endif