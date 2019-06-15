@if (session('message'))
    <div class="alert alert-{{session('alert-class')}}" role="alert">
        {{ session('message') }}
    </div>
@endif