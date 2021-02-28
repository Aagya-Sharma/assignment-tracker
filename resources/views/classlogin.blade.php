<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/LoginPage.css">
    <link rel="stylesheet" href="/css/partials/NavBar.css">
    <link rel="stylesheet" href="/css/partials/SideBar.css">
    <link rel="stylesheet" href="/css/partials/Footer.css">
    <title></title>
</head>
<body>
   @include('partials.nav')
        <div> 
            <img class="left" src="images/landing page icon.png" alt="landing page icon">
        </div>
       
            <div class="right">
                <label for="email" >Select your class:</label><br><br>
                <select style="width:350px; height:40px;"onchange="location = this.value">
        <option value="" style="width:350px; height:40px;">--select class--</option>
        @foreach($groups as $group)
        
        <option value = "{{route('classloginprocess', $group->id)}}">  {{$group->classname}} </option>
      @endforeach
</select>
        
        
          
     
    
          
        
  
    </div>
    @include('partials.footer')
</body>
</html>