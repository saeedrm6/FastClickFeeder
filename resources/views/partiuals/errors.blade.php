@if(isset($errors) && count($errors)>0)
    <div class="col-md-6">
        <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            @foreach($errors->all as $error)
                <li><strong>{{$error}}</strong></li>
            @endforeach
        </div>
    </div>
@endif