<?php 
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="../csss/bootstrap.css" />
    
  </head>
  <body>
 <Section id="home"> 
  <div class="showcase">
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
      <div>


<?php
include ('../config/alert.php');
?>

</div>
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h3 >SIGN UP</h3>
          </div>
          <div class="panel-body">
            <form action="../Control/signupw.php" method="post"  >
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="username"
                      name="username"
                    />
                  </div>
              <div class="form-group">
                <label for="fname">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="fname"
                  name="fname"
                />
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lname"
                  name="lname"
                />
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label for="male" class="radio-inline"
                    ><input
                      type="radio"
                      name="sex"
                      value="m"
                      id="male"
                    />Male</label
                  >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="sex"
                      value="f"
                      id="female"
                    />Female</label >
                  
                </div>
              </div>
              <div class="form-group">
                <label for="number">Age</label>
                <input
                  type="number"
                  class="form-control"
                  id="age"
                  name="age"
                  min="25"
                  max="90"
                />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                />
              </div>
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="phonenumber"
                  name="phone"
                />
              </div>
              <div class="form-group">
                <label for="scity">Sub City</label>
                <input
                  type="text"
                  class="form-control"
                  id="scity"
                  name="scity"
                />
              </div>
              <div class="form-group">
                <label for="woreda">Woreda</label>
                <input
                  type="text"
                  class="form-control"
                  id="woreda"
                  name="woreda"
                />
              </div>
              <div class="form-group">
                <label for="kebele">Kebele</label>
                <input
                  type="text"
                  class="form-control"
                  id="kebele"
                  name="kebele"
                />
              </div>
               <div class="form-group">
                <label for="occup">Occupation Type</label><br>
                  <select class="input-field" name="occup_type">
                  <option value=""></option>
                    <option value="Plumber">Plumber</option> 
                    <option value="Electrician">Electrician</option>
                    <option value="dish technician">Dish Technician</option>
                </select>    
               </div>
               <div class="form-group">
                <label for="number">Experiance Year</label><br>
                <input
                  type="number"
                  class="form-control"
                  id="year"
                  name="year"
                  min="0"
                />
              </div>
              <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Sign Up" name="signup"/>
              </div>
            </form>
          </div>
         
        </div>
      </div>
    </div>
       

</div>
</Section>
  </body>
</html>