<form action="{{ route('tasks.edit', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="tasks" class="form-label">Task</label>
        <input type="text" class="form-control @error('tasks') is-invalid @enderror" 
               id="tasks" name="tasks" value="{{ old('tasks', $task->tasks) }}" required>

        @error('tasks')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
