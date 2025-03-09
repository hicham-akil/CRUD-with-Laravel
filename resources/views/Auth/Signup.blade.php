<h1>Signup</h1>
<form action="{{route('Auth.store')}}" method='Post'>
    @csrf
       <span>nom</span>
       <input type="text" name="name" value={{old('name')}}>
       @error('name')
       <span>{{$message}}</span>
       @enderror
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