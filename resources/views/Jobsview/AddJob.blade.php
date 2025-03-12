<form action="{{route('tasks.store')}}" method="POST">
    @csrf
    <span>tasks</span>
    <input type="text" name="tasks" value="{{old('tasks')}}">
    @error('tasks')
    <span>{{$message}}</span>
    @enderror
    <button>submite</button>
</form>
<a href="{{route('tasks.show')}}">go see tasks</a>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif