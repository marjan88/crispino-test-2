@if( Session::has('info') )
<div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert"> <span aria-hidden="true">&times;</span></button>
    {{ Session::get('info') }}
</div>
@elseif( Session::has('success') )
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert"> <span aria-hidden="true">&times;</span></button>
    {{ Session::get('success') }}
</div>
@elseif( Session::has('error') )
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert"> <span aria-hidden="true">&times;</span></button>
    {{ Session::get('error') }}
</div>
@endif
