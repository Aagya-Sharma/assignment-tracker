<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/css/admin/DashboardPage.css">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
</head>
<body>
  @include('partials.nav')
  @include('partials.sidebar')
  <div id="col-2">
 
    <div class="first">
        <h1> Users List </h1>
        <div class="">
          <form action="{{ route('userslist')}}" method="post">
                @csrf
                <button type="submit" class="second">Approved Users</button>
          </form>
        </div>
    </div>  
      <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Roles</th>
              
            </tr>  
          </thead>
          <tbody>
            @foreach($users as $user)
               <tr>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email }} </td>
                <td><form action="" method="post"></form>
                  <!-- {{ $user->roles}} -->
                
                
                <div class="firsts">
                <form action=" {{ route('approve', $user->id) }}" method="post">
                    @csrf
                    <select name="roles" id="roles">
                    <option value="{{$user->roles}}">{{$user->roles}}</option>
                    @if($user->roles=="teacher")
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                    @elseif($user->roles == "student")
                    <option value="teacher">Teacher</option>
                    <option value="admin">Admin</option>
                    @else
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    @endif

                    </select>
                    </td>
                    <td>
                    <button type="submit" class="save">Save</button>
                </form><br>
                <form action=" {{ route('delete', $user->id) }}"  method="post">
                    @method('DELETE')
                    @csrf
                    <button type="delete" class="delete">Delete</button>
                </form>
              </div>
                </td>
                </tr>
            @endforeach
          </tbody>
</table>
  </div>
  @include('partials.footer')
</body>
</html>

