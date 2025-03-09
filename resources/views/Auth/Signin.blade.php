<h1>hellow Signin</h1>
<form action="{{route('Auth.check')}}" method='Post'>
    @csrf
       
       <span>email</span>
       <input type="text" name="email" value={{old('email')}}>
       @error('email')
       <span>{{$message}}</span>
       @enderror
       <span>password</span>
       <input type="text" name="password" value={{old('password')}}>
       @error('password')
       <span>{{$message}}</span>
       @enderror
       <button>submit</button>

</form>
@section('error')
    @if ($errors->has('error'))
        <span>{{ $errors->first('error') }}</span>
    @endif
@endsection