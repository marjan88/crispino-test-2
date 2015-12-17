@extends('templates/default')
@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 3px 3px 3px; padding: 20px; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
    #sortable li span { position: absolute; margin-left: -1.3em; }
    #sortable li:hover {cursor: pointer;}
</style>
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Task list
            <div class="pull-right">
                <a class="btn btn-default" href="{{route('task.create')}}"><i class="fa fa-plus"></i> Create task</a>
            </div>
        </h2>
        <hr>     
        <ul class="list-unstyled" id="sortable">
            @if(count($tasks))
            @foreach($tasks as $task)
            <li id="{{ $task->id}}" class="ui-state-default"><a href="{{route('task.edit', ['task' => $task->id ])}}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span> {{$task->name}}</a></li>
            @endforeach
            @else
            <p>Sorry there are no task at the moment.</p>
            @endif
        </ul>

    </div>

</div>

@stop
@section('scripts')
@parent
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function () {
    $("#sortable").sortable({
        update: function (event, ui) {
            var data = $(this).sortable('toArray').toString();
            $.ajax({
                type: "post",                
                url: "/order",  
                data: data,
                success: function (data) {
                   
                }
            });
        }
    }).disableSelection();

});
</script>
@stop