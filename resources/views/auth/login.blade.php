<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/LoginPage.css">
    <link rel="stylesheet" href="css/partials/NavBar.css">
    <link rel="stylesheet" href="css/partials/Footer.css">
    <link rel="stylesheet" href="css/partials/SideBar.css">
    <title></title>
</head>
<body>
   @include('partials.nav')
        <div> 
            <img class="left" src="images/landing page icon.png" alt="landing page icon">
        </div>

    <div class="right">
        <form action="{{ route('login') }}" method="post">
            @csrf
        <div class="field">
            <div>
                <label for="email">Email:</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                 @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          
            <div>
                <label for="password">Password:</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                 @error('password')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                @enderror
            </div>
        </div>
          
           
            <button type="submit"  class="lbutton">
                {{ __('login') }}
            </button>
        </form>
    </div>
    @include('partials.footer')
</body>
</html>