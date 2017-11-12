
@if(session()->has('warning'))
    <div class="warning-message">
        <i class="fa fa-exclamation"></i>
        <strong>Warning!</strong>  {{ session() -> get('warning') }} 
    </div>
@endif
@if(session()->has('info'))
    <div class="info-message">
        <i class="fa fa-info"></i>
        <strong>Note!</strong> {{ session() -> get('info') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="info-message">
        <i class="fa fa-info"></i>
        <strong>Error!</strong> {{ session() -> get('error') }}
    </div>
@endif
@if(session()->has('danger'))
    <div class="error-message">
        <i class="fa fa-close"></i>
        <strong>Oops!</strong> {{ session() -> get('danger') }}
    </div>
@endif
@if(session()->has('success'))
    <div class="success-message">
        <i class="fa fa-check"></i>
        <strong>Success!</strong> {{ session() -> get('success') }} 
    </div>
@endif
@if (session()->has('message'))
    <div class="success-message">
        <i class="fa fa-check"></i>
        <strong>Success!</strong> {!! session('message') !!}
    </div>
@endif
@if(session()->has('errors'))
    <div class="error-message">
        <!-- <i class="fa fa-close"></i> -->
        <strong>Oops!</strong> 
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif