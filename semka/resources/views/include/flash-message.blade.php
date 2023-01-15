@if(session('success')) 
<div class="alert alert-success alert-block">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif

@if(session('info')) 
<div class="alert alert-info alert-block">
    <strong>{{ session('info') }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif

@if(session('warning')) 
<div class="alert alert-danger alert-block">
    <strong>{{ session('warning') }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif
