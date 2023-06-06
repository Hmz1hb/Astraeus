<?php
session_start();

include 'db.php';

try {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["login"])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];  

            $stmt = $pdo->prepare("SELECT * FROM User WHERE Email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['Password'])) {
                // Password is correct, start a new session and save the user's ID in to the session.
                session_start();
                $_SESSION['user_id'] = $user['UserID'];
                header("Location: PersonalSpace.php");  // redirect to dashboard page or whatever your success page is
            } else {
                // If the password is not correct or no such user
                $error =  "Incorrect email or password!";
            }
        } else {
          $error =  "You must enter email and password.";
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
  <title>Bootstrap Site</title>
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
    :root {
      --primary-font: 'Poppins', sans-serif;
      --primary-color: #f9ef23;   /*--- Yellow color ----*/
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .logo {
      color: var(--third-color);
      font-weight: 900;
      font-style: italic;
      text-transform: uppercase;
    }

    .logo span {
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





    <section class="vh-100 bg-image" style="background-image: url('./img/pexels-tima-miroshnichenko-6389856.jpg');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h1 class="logo mb-5 text-center"><span>Astraeus</span></h1>
                <h2 class="text-uppercase text-center mb-5 mt-5">Login to your account</h2>
  
                <form action="" method="post">
  
                  <div class="form-outline mb-4">
                    <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                  </div>
  
                  <div class="form-outline mb-4">
                    <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example4cg">Password</label>
                  </div>
  
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" name="checkremember" type="checkbox" value="" id="form2Example3cg" />
                    <label class="form-check-label" for="form2Example3g">
                      Remember me
                    </label>
                  </div>
  
                  <div class="d-flex justify-content-center">
                    <button type="submit" name="login" class="btn btn-block btn-lg gradient-custom-4 text-body" style="background-color:#f9ef23">Login</button>
                  </div>
  
                  <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a href="./sigup.html" class="fw-bold text-body"><u>Sign up here</u></a></p>
  
                </form>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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
