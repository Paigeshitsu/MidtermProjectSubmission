<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<style type="text/css">
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-image: url('https://rachelvision.files.wordpress.com/2017/04/img_3650.gif');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  color:#FFE5E5;
  font-family: sans-serif;
}
.wrapper img{
width:100px;
height:100px;
float: left;
margin-left: 0px;

}
.wrapper{
  width: 800px;
  background:#E493B3  ;
  border: 2px solid #8E7AB5;
  color: #FFE5E5;
  padding: 30px 30px;

}
.wrapper h1{
  text-align: center;
  color:#8E7AB5 ;
  letter-spacing: 8px;
  font-size: 35px;
  padding-top: 30px;
  font-family: monospace;
  font-weight: bold;
}
.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;
  margin: 30px 0;
  margin-top: 35px;
}
.input-box input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: 2px solid #8E7AB5;
  padding: 20px 45px 20px 20px;
  color: #FFE5E5;
  font-size: 15px;

}
.wrapper .btn{
  width: 100%;
  height: 45px;
  background:#8E7AB5 ;
  border: 2px solid #8E7AB5;
  cursor: pointer;
  font-size: 18px;
  color:  #FFE5E5;
  font-weight: 600;
  transition: 0.6s ease-out;
}
button{
  cursor: pointer;
}
label{
  padding: 10px 5px;
  font-size: 20px;
}
.option {
  margin-top: 30px;
}
.gender-buttons {
  display: flex;
  justify-content: space-between;
  height: 55px;
  transition: 0.6s ease-out;
  border: #8E7AB5;
  outline: none;
}
 .column{
  color:#FFE5E5;
 }
.input-box{
  color:#FFE5E5  ;
}
.gender-buttons input[type="radio"] {
  display: none;
}

.gender-buttons label {
  flex: 1;
  background-color: #8E7AB5 ;
  color: #FFE5E5;
  border: 2px solid #8E7AB5;
  padding: 10px;
  cursor: pointer;
  margin: 4px;
  text-align: center;
}
.gender-buttons input[type="radio"]:checked + label {
  background-color: white;
  color:#BDB2CB;

  ;
}
</style>
<body>

    <div class="wrapper">
     <img src="https://media.tenor.com/qRZja15a_4oAAAAM/bocchi-the-rock-bocchi.gif"><h1>USER REGISTRATION</h1>
    <form id="myForm">
      <div class="column">
      <div class="input-box">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" placeholder="Enter First Name">
      </div>
      <div class="input-box">
        <label for="mname">Middle Name</label>
        <input type="text" name="mname" id="mname" placeholder="Enter Middle Name">
      </div>
      <div class="input-box">
        <label for="lname">Last Name</label>
        <input type="text" name="lname" id="lname" placeholder="Enter Last Name">
      </div>
    </div>
      <div class="option">
    <label for="gender">Gender</label>
    <div class="gender-buttons">
      <input type="radio" name="gender" id="gender-male">
      <label for="gender-male">Male</label>
      <input type="radio" name="gender" id="gender-female">
      <label for="gender-female">Female</label>
      <input type="radio" name="gender" id="gender-na">
      <label for="gender-na">N/A</label>
    </div>
    </div>
      <div class="input-box">
        <label for="bdate">Birthdate</label>
        <input type="date" name="bdate" id="bdate" onchange="ageCalculator()">
      </div>
      <div class="input-box">
        <label for="age">Age</label>
        <input type="text" name="age" id="age" disabled>
      </div>

      <div class="column">
      <div class="input-box">
        <label for="uname">Username</label>
        <input type="text" name="uname" id="uname" placeholder="Enter Username">
      </div>
      <div class="input-box">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" placeholder="Enter Email Address" required>
      </div>
      </div>
      <div class="input-box">
        <label for="pwd">Password</label>
        <input type="password" name="pwd" id="pwd" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>
      <div class="input-box">
        <label for="confirm_pwd">Confirm Password</label>
        <input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>
      <button type="submit" class="btn">Submit</button>
    </form>
  </div>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myForm").submit(function(e){
                e.preventDefault();
                const uname = document.getElementById("uname").value;
                const email = document.getElementById("email").value;
                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: {
                        "uname": uname,
                        "email": email
                    },
                    success: function(response) {
                        var data = JSON.stringify(response);
                        console.log(data)
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: ", error)
                    }
                });
            });
        });
    </script>
     <script type="text/javascript">
    function ageCalculator() {
      console.log("ageCalculator function called");
      var userinput = document.getElementById("bdate").value;
      var dob = new Date(userinput);
      if (!userinput) { 
        document.getElementById("age").value = '';
        return; 
      }
      var age = calculateAge(dob); 
      document.getElementById("age").value = age;
    }

    function calculateAge(birthDate) {
      var today = new Date();
      var age = today.getFullYear() - birthDate.getFullYear();
      var month = today.getMonth() - birthDate.getMonth();
      if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
        age--;
      }
      return age;
    }
  </script>
</body>
</html>