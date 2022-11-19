@if(isset($success)) 
<div class="alert alert-success alert-block">
    <strong>{{ $success }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif

@if(isset($info)) 
<div class="alert alert-info alert-block">
    <strong>{{ $info }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif

@if(isset($warning)) 
<div class="alert alert-danger alert-block">
    <strong>{{ $warning }}</strong>
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
@endif
