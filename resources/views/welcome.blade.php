<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grayscale - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('welcomepage/css/styles.css') }}" rel="stylesheet" />


        
        
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg fixed-top" id="mainNav" >
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top" style="color: white;"><strong>HiddenGems</strong></a>
                <button class="navbar-toggler navbar-toggler-right navbar" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="color: black; border: solid black;">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive" >
                    <ul class="navbar-nav ms-auto" >
                        <li class="nav-item"><a class="nav-link" href="#about" style="color: white;"><Strong>Sing in</Strong></a></li>
                        <li class="nav-item"><a class="nav-link" href="#projects" style="color: white;"><strong>Log in</strong></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <img src="{{ asset('welcomepage/assets/img/diamond.png') }}" alt="" width="200" height="200">
                        <h1 class="mx-auto my-0 text-uppercase " style="background-color: rgb(99, 59, 137);">Hidden Gems</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Buy Quiality at Walmart Price.</h2>
                        <a class="btn  btn-dark" href="#about">¡Sing In Now!</a>

                    </div>
                </div>
            </div>
        </header>
        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">


                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100" style="border-bottom: black;">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-dark mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" style="border-color: black;"/>
                                <div class="small text-black-50">Av. Revolucion CUCEI</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100" style="border-bottom: black;">
                            <div class="text-center">
                                <i class="fas fa-envelope text-dark mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" style="border-color: black;"/>
                                <div class="small text-black-50"><a href="#!" style="color: black;">hiddengems@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100" style="border-bottom: black;">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-dark mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" style="border-color: black;"/>
                                <div class="small text-black-50">+52 3328987898</div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('welcomepage/js/scripts.js') }}"></script>

        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
