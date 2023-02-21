<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş - Çevrimiçi Eğitim Sistemi</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <style>
    </style>
</head>

<body class="min-vh-100">
    <nav class="navbar bg-primary bg-opacity-75">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Çevrimiçi Eğitim Sistemi</a>
        </div>
    </nav>

    <header id="header" class="bg-dark">
        <div class="container text-center py-3 text-white">
            <h3 class="m-0">Eğitmen/Öğrenci Alanı <span class="text-light-emphasis h4">Hesap Giriş</span></h3>
        </div>
    </header>

    <main id="main" class="container-fluid m-0">
        <div class="row bg-light justify-content-center align-items-center py-3" style="height:71vh;">
            <div class="col-12 col-md-4">
                <form action="#" method="POST" class="py-5 px-3 rounded-3 shadow border border-1 needs-validation"
                    novalidate>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control shadow-none" name="username" id="username"
                            placeholder="Kullanıcı Adı" pattern="^(?=.*[a-zA-Z])(?=.*\d)[A-Za-z\d]{5,}" required>
                        <label for="username" class="">Kullanıcı Adı</label>
                        <div class="invalid-feedback">
                            Kullanıcı Adı Giriniz!
                        </div>
                        <div class="valid-feedback">
                            Geçerli!
                        </div>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control shadow-none" name="password" id="password"
                            placeholder="Şifre" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{10,}$"
                            required>
                        <label for="password">Şifre</label>
                        <div class="invalid-feedback">
                            Şifreniz en az bir küçük karakter, bir büyük karakter, bir sayı içermeli ve minimum 10
                            karakterden oluşmalı.
                        </div>
                        <div class="valid-feedback">
                            Geçerli!
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input type="submit" class="btn btn-outline-primary w-50" value="Giriş">
                    </div>
                </form>
            </div>
        </div>
    </main>


    <footer id="footer" class="text-bg-dark text-center p-2 fixed-bottom">
        <p class="m-0">Copyrights Çevrimiçi Eğitim Sistemi, &copy; 2023</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>
