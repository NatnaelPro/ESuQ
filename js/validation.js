//signin input
const loginForm = document.getElementById('login');
const email = document.getElementById('email');
const password = document.getElementById('password');

// signup input
const signupForm = document.getElementById('singup');
const firstName = document.getElementById('firstName');
const lastName = document.getElementById('lastName');
const usename = document.getElementById('username');
const emailSignup = document.getElementById('emailSignup');
const phoneNumber = document.getElementById('phoneNumber');
const address = document.getElementById('address');
const region = document.getElementById('region');
const passwordSignup = document.getElementById('passwordSignup');
const passwordConfirm = document.getElementById('passwordConfirm');







function checkErrorLogin(){
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
  if(emailValue == ''){
    setErrorMessage(email, 'email cannot be blank');
  }

  if(passwordValue == ''){
    setErrorMessage(password, 'password cannot be blank');
  }

  if(firstName.value == ''){
    setErrorMessage(firstName, 'first name cannot be blank');
  }

  if(lastName.value == ''){
    setErrorMessage(lastName, 'last name cannot be blank');
  }

  if(username.value == ''){
    setErrorMessage(username, 'username cannot be blank');
  }

  if(emailSignup.value == ''){
    setErrorMessage(emailSignup, 'email cannot be blank');
  }

  if(phoneNumber.value == ''){
    setErrorMessage(phoneNumber, 'phone cannot be blank');
  }

  if(address.value == ''){
    setErrorMessage(address, 'address cannot be blank');
  }

  if(region.value == ''){
    setErrorMessage(region, 'region cannot be blank');
  }

  if(passwordSignup.value == ''){
    setErrorMessage(passwordSignup, 'password cannot be blank');
  }

  if(passwordConfirm.value == ''){
    setErrorMessage(passwordConfirm, 'conform password cannot be blank');
  }
}


//validate when the login submit button clicked

  loginForm.addEventListener('submit', function(e){
    if(email.value === '' || password.value === ''){
      e.preventDefault();
      checkErrorLogin();
    }
  });

  // validate when the signup submit button clicked
  signupForm.addEventListener('submit', function(e){
    if(firstName.value === '' || lastName.value === '' || usename.value === '' ||
    emailSignup === '' || phoneNumber === '' || address === '' ||
    region === '' || passwordSignup === '' || passwordConfirm === ''){
      e.preventDefault();
      checkErrorLogin();
    }
  });


//set error message
function setErrorMessage(input, message){
  const formControl = input.parentElement;
  const small = formControl.querySelector('small');
  small.innerText = message;
  formControl.className = 'form-group error';
}




// check login email 
email.addEventListener('blur', function(){
  if(email.value != ''){
    var regex = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
    if(!regex.test(email.value))
      setSingleErrorMessage(email, 'Invalid Email Address');
    else
      setSuccessMessage(email);
  }else{
    setSingleErrorMessage(email, 'email cannot be blank');
  }
});


//check loin password 
password.addEventListener('blur', function(){
  if(password.value != ''){
    setSuccessMessage(password);
  }else{
    setSingleErrorMessage(password, 'password cannot be blank');
  }
});

//check signup first name 
firstName.addEventListener('blur', function(){
  if(firstName.value != ''){
    var test = firstName.value.search(/^[a-zA-Z]{4,20}$/);
    if(test == -1){
      if(firstName.value.length <= 4)
        setSingleErrorMessage(firstName, 'first name must be atleast 4 characters.');
      else if(firstName.value.length >= 20)
        setSingleErrorMessage(firstName, 'first name can not be more than 20 characters.');
      else
        setSingleErrorMessage(firstName, 'Please enter only letters');
    }else{
      setSuccessMessage(firstName);
    }
  }else{
    setSingleErrorMessage(firstName, 'first name cannot be blank');
  }
});


//check signup last name 
lastName.addEventListener('blur', function(){
  if(lastName.value != ''){
    var test = lastName.value.search(/^[a-zA-Z]{4,20}$/);
    if(test == -1){
      if(lastName.value.length <= 4)
        setSingleErrorMessage(lastName, 'last name must be atleast 4 characters.');
      else if(lastName.value.length >= 20)
        setSingleErrorMessage(lastName, 'last name can not be more than 20 characters.');
      else
        setSingleErrorMessage(lastName, 'Please enter only letters');
    }else{
      setSuccessMessage(lastName);
    }
  }else{
    setSingleErrorMessage(lastName, 'last name cannot be blank');
  }
});


//check signup username 
usename.addEventListener('blur', function(){
  if(usename.value != ''){
    regex = /^[a-zA-Z0-9](_(?!(\.|_))|\.(?!(_|\.))|[a-zA-Z0-9]){2,20}[a-zA-Z0-9]$/;
    if(!regex.test(username.value)){
      if(username.value.length <= 4)
        setSingleErrorMessage(username, 'first name must be atleast 4 characters');
      else if(username.value[0] == '_' || username.value[0] == '.' || usename.value[usename.value.length-1] == '_' || usename.value[usename.value.length-1] == '.'){
        console.log();
        setSingleErrorMessage(username, 'Underscore and dot can not be at the start');
      }
      else
        setSingleErrorMessage(username, 'usename must be alphanumerics, underscore or dot');
    }else{
      setSuccessMessage(username);
    }
  }else{
    setSingleErrorMessage(usename, 'username cannot be blank');
  }
});


//check signup email 
emailSignup.addEventListener('blur', function(){
  if(emailSignup.value != ''){
    var regex = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;
    if(!regex.test(emailSignup.value))
      setSingleErrorMessage(emailSignup, 'Invalid Email Address');
    else
      setSuccessMessage(emailSignup);
  }else{
    setSingleErrorMessage(emailSignup, 'email cannot be blank');
  }
});


//check loin phone number 
phoneNumber.addEventListener('blur', function(){
  if(phoneNumber.value != ''){
    if(phoneNumber.value[0] != '0' || phoneNumber.value[1] != '9')
      {
        var regex = /^([+]?[0-9]{11,12})*$/;      
        if(regex.test(phoneNumber.value)){
             if((phoneNumber.value[0] != '+') && (phoneNumber.value[phoneNumber.value.length -1] > 11 || phoneNumber.value[phoneNumber.value.length -1] < 12))
                 setSingleErrorMessage(phoneNumber, 'Invalid phone number');
             else
                setSuccessMessage(phoneNumber);
        }else{
          if(/^[0-9]*$/.test(phoneNumber.value))
          setSingleErrorMessage(phoneNumber, 'Invalid phone number');
        else 
          setSingleErrorMessage(phoneNumber, 'phone number cannot be a letter');
        }
      }
    else
      {
        var regex = /^([0-9]{10,10})*$/;
        if(regex.test(phoneNumber.value)){
          if(phoneNumber.value[0] != '0' || phoneNumber.value[1] != '9')
            setSingleErrorMessage(phoneNumber, 'Invalid phone number');
          else 
            setSuccessMessage(phoneNumber);
        }
        else 
        {
          console.log(phoneNumber.value.length);
          if(/^[0-9]*$/.test(phoneNumber.value))
            setSingleErrorMessage(phoneNumber, 'Invalid phone number');
          else 
            setSingleErrorMessage(phoneNumber, 'phone number cannot be a letter');
        }
      }
      
  }else{
    setSingleErrorMessage(phoneNumber, 'phone number cannot be blank');
  }
});

// phoneNumber.addEventListener('mousedown', function(){
//   phoneNumber.value = "+251";
// });



//check signup address 
address.addEventListener('blur', function(){
  if(address.value != ''){
    setSuccessMessage(address);
  }else{
    setSingleErrorMessage(address, 'address cannot be blank');
  }
});


//check signup region 
region.addEventListener('blur', function(){
  if(region.value != ''){
    setSuccessMessage(region);
  }else{
    setSingleErrorMessage(region, 'region cannot be blank');
  }
});


//check signup password 
passwordSignup.addEventListener('blur', function(){
  if(passwordSignup.value != ''){
    // setSuccessMessage(passwordSignup);
    document.getElementById('passwordError').style.display = 'none';
    let strengthLabel = document.getElementById('passwordStrengthLabel');
    strengthLabel.style.display = 'block';
    strengthLabel.style.backgroundColor = "mediumaquamarine";
    strengthLabel.textContent = "checking strength...";

    let timeout;
    clearTimeout(timeout);
    timeout = setTimeout(() => strengthChecker(passwordSignup.value), 500);
  }else{
    document.getElementById('passwordStrengthLabel').style.display = 'none';
    setSingleErrorMessage(passwordSignup, 'password cannot be blank');
  }
});


//check signup conform password 
passwordConfirm.addEventListener('blur', function(){
  if(passwordConfirm.value != ''){
    if(passwordSignup.value != passwordConfirm.value){
      setSingleErrorMessage(passwordConfirm, 'password not match');
      passwordConfirm.value = "";
    }else{
      setSuccessMessage(passwordConfirm);
    }
  }else{
    setSingleErrorMessage(passwordConfirm, 'confirm password cannot be blank');
  }
});






function setSingleErrorMessage(input, message){
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    small.innerText = message;
    formControl.className = 'form-group error';
}

//set success message
function setSuccessMessage(input){
  const formControl = input.parentElement;
  formControl.className = 'form-group success';
}



function strengthChecker(passwordInput){
  passwordSignup.parentElement.className = 'form-group';
  let strengthLabel = document.getElementById('passwordStrengthLabel');
  let strongPassword = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;
  let mediumPassword = /((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))/;
  if(strongPassword.test(passwordInput)){
    strengthLabel.style.backgroundColor = "green";
    strengthLabel.textContent = "Strong";
  }else if(mediumPassword.test(passwordInput)){
    strengthLabel.style.backgroundColor = "gold";
    strengthLabel.textContent = "medium";
  }else{
    strengthLabel.style.backgroundColor = "orangeRed";
    strengthLabel.textContent = "weak";
  }
}









 //login signup slide
 const signUpButton = document.getElementById('signUp');
 const signInButton = document.getElementById('signIn');
 const container = document.getElementById('container');


 signInButton.addEventListener('click', () =>
     container.classList.remove('right-panel-active')
 );

 signUpButton.addEventListener('click', () =>
     container.classList.add('right-panel-active')
 );

