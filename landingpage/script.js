$(document).ready(function() {
    $(".menu-icon").on("click", function() {
          $("nav ul").toggleClass("showing");
    });
});


$(window).on("scroll", function() {
    if($(window).scrollTop()) {
          $('nav').addClass('black');
    }

    else {
          $('nav').removeClass('black');
    }
})


function validate1(){
      var username = document.signin.username.value;
      var password = document.signin.password.value;
      if (username==null || username==""){ 
          document.getElementById("usernameErr1").innerText = "Username is required";
          return false; 
      }
      else
          document.getElementById("usernameErr1").innerText = "";
      if (password==null || password==""){ 
          document.getElementById("passErr1").innerText = "Password is required";
          return false; 
      }
      else
          document.getElementById("passErr1").innerText = "";
  }
  function validate2(){ 
      var username = document.register.username.value;
      var email = document.register.email.value;
      var password = document.register.password.value;
      var password1 = document.register.password1.value;
      if (username==null || username==""){ 
          document.getElementById("usernameErr").innerText = "Username is required";
          return false;
      }
      else
          document.getElementById("usernameErr").innerText = "";


      if (email==null || email==""){ 
          document.getElementById("emailErr").innerText = "Email Address is required";
          return false; 
      }
      
      else{ 
          if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)){
              document.getElementById("emailErr").innerText = "";
          }
          else{
              document.getElementById("emailErr").innerText = "invalid email address!";
              return false;
          }
      }





      if (password==null || password==""){ 
          document.getElementById("passErr").innerText = "Password is required";
          return false; 
      }
      else
          document.getElementById("passErr").innerText = "";
      
      
      if (password1==null || password1==""){ 
          document.getElementById("pass1Err").innerText = "Please confirm password";
          return false; 
      }
      else{
          if (password == password1)
              document.getElementById("pass1Err").innerText = "";
          else{
              document.getElementById("pass1Err").innerText = "password did not match please check and try again";
              return false;
          }
      }
      
  }
  function toggleForm(){
      var container = document.querySelector('.container');
      container.classList.toggle('active')
  }
  function register1(){
      document.getElementById('id01').style.display='flex';
      var container = document.querySelector('.container');
      container.classList.remove('active');
  }
  function signIn(){
      document.getElementById('id01').style.display='flex';
      var container = document.querySelector('.container');
      container.classList.add('active');
  }
  function login_a(){
    document.getElementById('id02').style.display='flex';
    var container = document.querySelector('.container');
    container.classList.add('active');
  }



  function SubmitFormData() {
    var uname1 = $("#uname").val();
    var password1 = $("#password").val();

    $.ajax({ url: 'get-data.php',
     data: {uname : uname1, password : password1},
     type: 'post',
     success: function(output) {
                var result = output
                console.log(result);
	            if (result == 00) {
	            	window.location.href = "../adminpage";
	            }
              if (result == 13) {
                  document.getElementById("loginErr").innerText = "Invalid Email or Password";
              }
	            if (result == 10){
	                document.getElementById("usernameErr2").innerText = "Please enter a valid Email";
	                document.getElementById("passErr2").innerText = "";
	            }
	            if (result == 11){
	                document.getElementById("usernameErr2").innerText = "Please enter a valid Email";
	                document.getElementById("passErr2").innerText = "Password field cannot be empty please enter password";
	            }
	            if(result == 12){
	                document.getElementById("usernameErr2").innerText = "Please enter a valid Email";
	                document.getElementById("passErr2").innerText = "Password must be atleast 6 character long";
	            }
	            if (result == 02){
                  document.getElementById("usernameErr2").innerText = "";
	                document.getElementById("passErr2").innerText = "Password must be atleast 6 character long";
				      }
				      if (result == 01){
					       document.getElementById("usernameErr2").innerText = "";
	               document.getElementById("passErr2").innerText = "Password field cannot be empty please enter password";
				      }
              },
      error: function(request, status, error){
        alert("Error: ");
      }

	});
            //document.getElementById("usernameErr").innerText = result;
            
}