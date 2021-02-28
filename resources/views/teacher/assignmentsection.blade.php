<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <link rel="stylesheet" href="/css/teacher/AssignmentForm.css">

    <title></title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
    $(function(){
        setTimeout(function() {
            $('.fade-message').fadeOut();
        }, 3000);
    });
    </script>
</head>
<body>
    @include('partials.nav')
    @include('partials.sidebar')
    <div id="col-2">
        @if(Session::has('message'))
        <div class="fade-message" style="color:red">
          <p>{{ Session::get('message') }}</p>
          </div>
        @endif
        <h2>Select a class</h2>
        <hr>
        <table>
          @foreach($groups as $group)
          <tr>
            <td>{{ $group->classname}}</td>
            <td>
              <form action=" {{ route('assignmentdashboard', $group->id) }}" method="post">
                  @csrf
                  <button type="submit" class="select">select</button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
    </div>
    @include('partials.footer')
</body>
</html>