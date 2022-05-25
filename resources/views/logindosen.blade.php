<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container-fluid bg-secondary">
      <div class="container d-flex justify-content-center align-items-center" style="min-height:720px">
        <div class="card w-50">
          <div class="card-body">
            <p class="h3 text-center mb-3">Login Dosen</p>
            <form class="needs-validation" novalidate>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Masukkan username" required>
                <div class="invalid-feedback">Harus masukkan username</div>
              </div>
              <div class="mb-3">
                <label for="password">Password</label>
                <input type="text" class="form-control" placeholder="Masukkan password" required>
                <div class="invalid-feedback">Harus masukkan password</div>
              </div>
              <div class="mb-3 text-center">
                <button class="btn btn-success w-100" type="submit">Login</button>
              </div>
            </form>
            <div class="mb-2">
              <button class="btn btn-light w-100" type="button">Lupa Password</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
      })()
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <span class="align-middle">
      <div class=" h-100 row justify-content-center">
        <div class="col-auto">
        </div>
      </div>
    </span> -->
  </body>
</html>
