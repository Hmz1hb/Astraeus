<?php
session_start();
$error = '';
$host = 'localhost';
$db   = 'gymdata';
$user = 'root';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user);
try {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if(isset($_POST["register"])){
        if(isset($_POST["terms"])) {
            $name = $_POST['name'];
            // $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $repeat_password = $_POST['repeat_password'];
            if ($password !== $repeat_password) {
              $error = 'The passwords do not match.';
          } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if (!preg_match("/^((\+|00)212|0)[567]\d{8}$/", $phone)) {
              $error = 'Numéro de téléphone invalide. Veuillez saisir un numéro de téléphone marocain valide.';
            } else {
            $sql = "SELECT * FROM User WHERE Email = ? OR Phone = ?";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$email, $phone]);
            $user = $stmt->fetch();

            if($user) {
              $error =  "A user with this email or phone number already exists.";
            } else {
                $sql = "INSERT INTO User (Name, Email, Phone, Password) VALUES (?, ?, ?, ?)";
                $stmt= $pdo->prepare($sql);
                $stmt->execute([$name, $email, $phone, $password]);
                $lastInsertId = $pdo->lastInsertId();

                // Start a new session and save the user's ID into the session.
                session_start();
                $_SESSION['user_id'] = $lastInsertId;
               
              }
            }
        } 
      } 
    }
 
} 
} catch (PDOException $e) {
  $error = 'Connection failed: ' . $e->getMessage();
}

?>










<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Astraeus - Sign In</title>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700;1,800;1,900&display=swap');
    :root
{
	--primary-font: 'Poppins', sans-serif;

	--primary-color: #f9ef23;   /*--- Yellow color ----*/
}


*
{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

.logo
{
	color: var(--third-color);
	font-weight: 900;
	font-style: italic;
	text-transform: uppercase;
}
.logo span
{
	color: var(--primary-color);
}
  </style>

</head>
<body>
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="errorModalLabel">Error</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php echo $error; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
    <section class="vh-100 bg-image"
    style="background-image: url('./img/pexels-tima-miroshnichenko-6389892.jpg');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h1 class="logo mb-5 text-center">WITH <span>Astraeus</span></h1>
                <h2 class="text-uppercase text-center mb-5 mt-5">Create an account</h2>
  
                <form action="" method="post">
  
                  <div class="form-outline  mb-4">
                    <input type="text" id="form3Example1cg" name="name" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example1cg">Full Name</label>
                  </div>
                  <!-- <div class="form-outline  mb-4">
                    <input type="text" id="form3Example1cg" name="lastname" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example1cg">Last Name</label>
                  </div> -->
  
                  <div class="form-outline mb-4">
                    <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" id="phone" name="phone" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example3cg">Phone</label>
                  </div>
                
                  <div class="form-outline mb-4">
                    <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example4cg">Password</label>
                  </div>
  
                  <div class="form-outline mb-4">
                    <input type="password" id="form3Example4cdg" name="repeat_password" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  </div>
  
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" name="terms" id="form2Example3cg" />
                    <label class="form-check-label" for="form2Example3g">
                      I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                    </label>
                  </div>
  
                  <div class="d-flex justify-content-center">
                    <button type="submit"
                      class="btn btn-block btn-lg gradient-custom-4 text-body" name="register" style="background-color:#f9ef23">Register</button>
                  </div>
  
                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="./login.php"
                      class="fw-bold text-body"><u>Login here</u></a></p>
  
                </form>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsEhcYf-NZNlL6-FVHfT1GT3XAth8EJk4&callback=initMap"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const error = <?php echo isset($error) ? json_encode($error) : 'null'; ?>;
      if (error) {
        const errorModal = new bootstrap.Modal(document.getElementById("errorModal"));
        errorModal.show();
      }
    });
  </script>

</body>
</html>