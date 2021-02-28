<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
 </head>
<body>
<div id="col-1 secondary">
      <div class="profile-photo">
      <img src="{{ Gravatar::get( auth()->user()->email ) }}"  >
      </div>
      <div class="profile-name">
       {{ Auth::user()->name }}
      </div>


      @if(Auth::user()->roles =='admin')
      <!-- <div class="sidebar"> -->
      <div class="button classes">
            <a href="/admin/groups">
              <div class="button-icon">
                <img src="/images/classesicon.png" alt="" height=40px >
              </div>
              <div class="button-name">Classes</div>
            </a>
      </div>
      <div class="button chats">
          <a href="/chatify">
            <div class="button-icon">
              <img src="/images/chaticon.png" alt="" height=40px >
            </div>
              <div class="button-name">Chats</div>
          </a>
      </div>
      <div class="button users">
        <a href="/dashboard">
          <div class="button-icon">
            <img src="/images/usersicon.png" alt="" height=40px >
          </div>
            <div class="button-name">Users</div>
        </a>
      </div>

    
      @else
      <!-- <div class="button notifications">
          <a href="">
              <div class="button-icon">
                <img src="/images/notificationicon.png" alt="" height=40px width=40px>
              </div>
            
              <div class="button-name">
                Notifications
              </div>
          </a>
      </div> -->
      <div class="button assignments">
          <a href="">
            <div class="button-icon">
              <img src="/images/assignmenticon.png" alt="" height=40px >
            </div>
            
      @if(Auth::user()->roles =='teacher')
            <a href="{{ route('assignment') }}">
            @else
            <a href="{{route ('Stdashboard')}}">
            @endif
            <div class="button-name">Assignments</div>
            </a>
      </div>
      <div class="button chats">
          <a href="/chatify">
            <div class="button-icon">
              <img src="/images/chaticon.png" alt="" height=40px >
            </div>
              <div class="button-name">Chats</div>
          </a>
      </div>
      </div>
      </div>
    
</div>
  @endif
  
  </body>
  </html>