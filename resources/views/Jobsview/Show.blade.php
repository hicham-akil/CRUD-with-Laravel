<h1>Show tasks</h1>
@foreach($data as $task)
    <h1>{{$task->tasks}}</h1>
    @can('edit-task', $task)
    <a href="{{ route('tasks.editForm', ['task_id' => $task->id]) }}">Edit</a>
    @endcan
    <form action="{{route('tasks.delete',['task_id'=>$task->id])}}" method="POST">
    @csrf
    @method('DELETE')
    <button>delete</button>
    </form>

@endForeach

