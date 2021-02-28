<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <link rel="stylesheet" href="/css/Admin/usersList.css">
</head>
<body>
    @include('partials.nav')
    @include('partials.sidebar')
    <div id="col-2">
    <div style="height:1000px">
    <ul class="assign-main">
                <li class="assign-head">Teachers List</li>
        </ul>
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Roles</th>
            </tr>  
          </thead>
          <tbody>
          @foreach($teachers as $teacher)
                      <tr>
                        <td>{{ $teacher->name}}</td>
                      
                        <td>{{ $teacher->roles}}</td>
                      </tr>
              @endforeach
</tbody>
</table>
<br><br>
        <ul class="assign-main">
            <li class="assign-head">Students List</li>
        </ul>
        <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                    <th>Roles</th>
                    <th>Class</th>
                </tr>  
              </thead>
              <tbody>
                  @foreach($students as $student)
                      <tr>
                        <td>{{ $student->name}}</td>
                      
                        <td>{{ $student->roles}}</td>
                        <td>
                        
                          <form action="/classeditprocess/{{$student->id}}" method="post">
                            @csrf
                          
                            <select name="class" id="class">
                            <option value="">{{$student->class}}</option>
                            @foreach($classes as $class)
                            <option value="{{$class->classname}}">{{$class->classname}}</option>
                            @endforeach
                            </select>
                            <input type="submit" value="Edit">
                          </form>
                        </td>
                      </tr>
                   @endforeach
                      
                 </tbody>
           </table>
          </div>
    </div>
    @include('partials.footer')
</body>
</html>
