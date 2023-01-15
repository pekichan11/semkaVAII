@if(session('success')) 
    <div class="alert alert-success alert-block">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
    @php
        session()->forget('success');
    @endphp
@endif

@if(session('info')) 
<div class="alert alert-info alert-block">
    <strong>{{ session('info') }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@php
    session()->forget('info');
@endphp
@endif

@if(session('warning')) 
<div class="alert alert-danger alert-block">
    <strong>{{ session('warning') }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@php
    session()->forget('warning');
@endphp
@endif

