<html>

<header>
    <nav>
         <ul class="main-nav">
            <img class="img" src="/images/logo.png" alt="logo">
            @guest
                <li><a href="{{ route('login') }}" class="log" >Log In</a></li>
                <li><a href="{{ route('register') }}" class="register" >Register</a></li>
            @endguest
            @auth
            <li><div class="button-noti">
                <a href="/notifications"><img src="/images/notificationicon.png" alt="" height=40px width=40px></a>
                <span class="noti-count">
                   @if(Auth::user()->roles=='admin')
                {{ Auth::user()->unreadnotifications->count() }}
                @elseif(Auth::user()->roles=='student')
                <?php $count = 0; ?>
                @foreach(Auth::user()->unreadnotifications as $notification)
           
                 @if(Auth::user()->class_id == trim(json_encode($notification->data['createdAssignment']['group_id']), ' " '  )) 
                    <?php $count = $count +1; ?>
                @endif
               
                @endforeach
                <?php echo $count; ?>
                @endif
                
                
  

            </span> 
            </div>

           
        </div></li>
          @endauth

       
    </nav>
</header>

