<!DOCTYPE html>
<html lang="en">
<head>
 
  <title>Login to CRM</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
  
 

</head>
<body>
  
   <div class="modal-dialog text-center">
      <div class="col-sm-8 main-section">
         <div class="modal-content">
            <div class="col-12 user-img">
                <img src="{{asset('img/face.png')}}" alt="">
            </div>
            @if(Session::has('message-error'))
                <div class="alert alert-danger">
                    <strong>Danger!</strong> {{ Session::get('message-error') }}
                </div>
            @elseif(Session::has('message-success'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{ Session::get('message-success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login/process') }}" class="col-12">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  
                   <input type="email" name="email" class="form-control" placeholder="Entrez votre e-mail">
                    
                </div>
           
                <div class="form-group">
                  
                   <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
                    
                </div>
                <div class="">
                    
                    <input type="checkbox" name="admin" value="admin" class="mr-2"><label style="color:white;">administrateur</label>
                </div>
                <button type="submit" class="btn">
                   <i class="fas fa-sign-in-alt"></i>
                    Login
                </button>
            </form>
            
            <div class="col-12 forgot">
                <a href="#">Forgot Password?</a>
                
            </div>
            
             
         </div> <!---end of modal content --->
          
      </div>
       
   </div>
        
</body>
</html>