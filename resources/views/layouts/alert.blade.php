<div class="row">
    <div class="col-1"></div>
    <div class="col-10">

        @if($message = Session::get('Listo'))
            <div class="col-12 alert alert-success alert-dismissable fade show" role="alert">
                <h5>Mensaje:</h5>
                <span> {{ $message }}</span>    
            </div>
        @endif
        @if($message = Session::get('ErrorInsert'))
            <div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
                <h5>Errores:</h5>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>    
            </div>
        @endif
    </div>
</div>