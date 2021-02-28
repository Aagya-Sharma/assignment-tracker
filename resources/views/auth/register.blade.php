<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/RegisterPage.css">
    <link rel="stylesheet" href="css/partials/NavBar.css">
    <link rel="stylesheet" href="css/partials/SideBar.css">
    <link rel="stylesheet" href="css/partials/Footer.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
</head>
<body>
   @include('partials.nav')
    <div> 
        <img class="left" src="images/landing page icon.png" alt="landing page icon">
    </div>

    <div class="right">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="email">Email:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>
            <div>
            <label for="roles">Roles:</label>
                <select name="roles" id="roles"class="form-control @error('roles') is-invalid @enderror"value="{{ old('roles') }}" ">
                   
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                </select>
                
                <!-- <input id="roles" type="roles" class="form-control @error('roles') is-invalid @enderror" name="roles" value="{{ old('roles') }}" required autocomplete="roles">  -->
                @error('roles')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>
          
            <div>
                <label for="password">Password:</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="password-confirm">Confirm Password:</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit"  class="rbutton">
                {{ __('Register') }}
            </button>
        </form>
    </div>
@include('partials.footer')
</body>
</html>