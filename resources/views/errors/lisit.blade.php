@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        	<button type="button" class="close" data-dismiss="alert">x</button>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif