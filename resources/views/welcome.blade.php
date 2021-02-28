<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="/css/welcomePage.css">
     <link rel="stylesheet" href="css/partials/NavBar.css">
    <link rel="stylesheet" href="css/partials/Footer.css">
   
    
 </head>
<body>
   @include('partials.nav')
   <div> 
      <img class="left" src="images/landing page icon.png" alt="landing page icon" >
   </div>
   <div style="clear:both;"></div> <!--important for body and html size-->
   <div>
      <nav class="right">
         <h1 class="now">Complete It Now</h1>
         <h2 class="classes">Connects teams,classes and workgroups.<br>Placeholder for all your workloads...</h4><br>
         <h4><a href="{{ route('register') }}" class="join" >Join Us</a></h4>
      </nav>
   </div>
   @include('partials.footer')

</body>
</html>
