@extends('templates/default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Create Task
            <div class="pull-right">
                <a class="btn btn-default" href="/"><i class="fa fa-backward"></i> Back</a>
            </div>
        </h2>
         <hr>     
         <form class="form-horizontal col-lg-6 " method="post" @if($task)  action="{{route('task.update', ['id' => $task->id])}}" @else action="{{route('task.store')}}"  @endif>
             <input type="hidden" name="_token" value="{{csrf_token()}}"/>
             <div class="form-group">
                 <label for="name">Name</label>
                 <input id="name" class="form-control" type="text" value="{{($task) ? $task->name : ''}}" name="name"/>
             </div>
             <div class="form-group">
                @if($task)
                 <button type="submit" class="btn btn-success">Edit</button>
                 <a onclick="return confirm('Are you sure you want to delete this item?')" href="{{route('task.destroy', ['id' => $task->id])}}" class="btn btn-danger">Delete</a>
                 @else
                 <button type="submit" class="btn btn-success">Create</button>
                 @endif
             </div>
         </form>
         
    </div>

</div>

@stop