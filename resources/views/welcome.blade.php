<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Css Styles -->


    <link rel="stylesheet" href="{{ asset('gymlife/css/bootstrap.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('gymlife/css/font-awesome.min.css') }}" type="text/css">
     {{--<link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('gymlife/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        {{-- <div class="canvas-search search-switch">
            <i class="fa fa-search"></i>
        </div> --}}
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./about-us.html">About Us</a></li>
                <li><a href="./classes.html">Classes</a></li>
                <li><a href="./services.html">Services</a></li>
                <li><a href="./team.html">Our Team</a></li>
                <li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./about-us.html">About us</a></li>
                        <li><a href="./class-timetable.html">Classes timetable</a></li>
                        <li><a href="./bmi-calculator.html">Bmi calculate</a></li>
                        <li><a href="./team.html">Our team</a></li>
                        <li><a href="./gallery.html">Gallery</a></li>
                        <li><a href="./blog.html">Our blog</a></li>
                        <li><a href="./404.html">404</a></li>
                    </ul>
                </li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="http://gym.test:8080/login">Entrar al Sistema</a>
            <a href="http://gym.test:8080/register">Registrate</a>

            {{-- <a target="_blank" title="Envíanos un mensaje de WhatsApp" href="https://api.whatsapp.com/send?phone=5352774834&text=Hola, Nececito mas informacion!"><i class="fa fa-whatsapp"></i></a> --}}
            <!-- <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a> -->
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="/">

                            <img src="{{ asset('gymlife/img/logo-xl.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- <nav class="nav-menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="./about-us.html">About Us</a></li>
                            <li><a href="./class-details.html">Classes</a></li>
                            <li><a href="./services.html">Services</a></li>
                            <li><a href="./team.html">Our Team</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./about-us.html">About us</a></li>
                                    <li><a href="./class-timetable.html">Classes timetable</a></li>
                                    <li><a href="./bmi-calculator.html">Bmi calculate</a></li>
                                    <li><a href="./team.html">Our team</a></li>
                                    <li><a href="./gallery.html">Gallery</a></li>
                                    <li><a href="./blog.html">Our blog</a></li>
                                    <li><a href="./404.html">404</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav> -->
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <!-- <div class="to-search search-switch">
                            <i class="fa fa-search"></i>
                        </div> -->
                        <div class="to-social">
                            <a href="http://gym.test:8080/login">Entrar al Sistema</a>|
                            <a href="http://gym.test:8080/register">Registrate</a>

                            {{-- <a target="_blank" title="Envíanos un mensaje de WhatsApp" href="https://api.whatsapp.com/send?phone=5352774834&text=Hola, Nececito mas informacion!"><i class="fa fa-whatsapp"></i></a> --}}
                            <!-- <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- ChoseUs Section Begin -->
    <!-- <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>Plataforma Informática</h4>
                        <p>Para los propietarios de gimnasios y estudios de fitness que desean ahorrar tiempo y gestionar su base de clientes. Permiten tener el control de tu negocio, por lo que no tienes que preocuparte por las cosas pequeñas: desde la
                            programación y la gestión de miembros hasta los pagos y la generación de informes.</p>
                    </div>
                </div>
            </div>

        </div>
    </section> -->
    <!-- ChoseUs Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Nuestros Planes</span>
                        <h2>Elige tu plan </h2>
                        {{-- <h2>Choose your pricing plan</h2> --}}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Gratis</h3>
                        <div class="pi-price">
                            <h2>$ 00.00</h2>
                            <span>Funcionalidades</span>
                        </div>
                        <ul>
                            <li>Nuevo cliente</li>
                            <li>Listado de clientes</li>
                            <li>Dar de baja a un cliente</li>
                            {{-- <li>Hace socio a un cliente</li> --}}
                            <li>Nuevo grupo</li>
                            <li>Listado de grupos</li>
                            <li>Asociar clientes a un grupo</li>
                            <li>Gestionar trabajadores</li>
                            <li>3 clasificadores</li>
                        </ul>
                        {{-- <a href="#" class="primary-btn pricing-btn">Enroll now</a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Semi Pro</h3>
                        <div class="pi-price">
                            <h2>$ 5,500.00</h2>
                            <span>Funcionalidades</span>
                        </div>
                        <ul>
                            <li>Gestionar clientes </li>
                            <li>Dar de baja a un cliente</li>
                            <li>Registrar el pago de un cliente </li>
                            <li>Alerta de clientes morosos </li>
                            <li>Gestionar la membrecia del cliente</li>
                            <li>Gestionar grupos</li>
                            <li>Ver clientes asociados a un grupo</li>
                            <li>Gestionar trabajadores</li>
                            <li>Gestionar propietarios</li>  {{-- permite agregar un propietario--}}
                            <li>Gestionar datos del negocio </li> {{-- permite agregar  un negocio --}}
                            <li>5 clasificadores</li>
                        </ul>
                        {{-- <a href="#" class="primary-btn pricing-btn">Enroll now</a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Profesional</h3>
                        <div class="pi-price">
                            <h2>$ 7,500.00</h2>
                            <span>Funcionalidades</span>
                        </div>
                        <ul>
                            <li>Dashboard </li>
                            <li>Gestionar clientes </li>
                            <li>Dar de baja a un cliente</li>
                            <li>Registrar el pago de un cliente </li>
                            <li>Alerta de clientes morosos </li>
                            <li>Gestionar la membrecia del cliente</li>
                            <li>Gestionar grupos</li>
                            <li>Ver clientes asociados a un grupo</li>
                            <li>Gestionar trabajadores</li>
                            <li>Gestionar propietarios</li> {{-- permite agregar mas de un propietario--}}
                            <li>Gestionar datos del negocio</li> {{-- permite agregar mas de un negocio --}}
                            <li>5 clasificadores</li>
                            <li>8 Reporte</li>

                        </ul>
                        {{-- <a href="#" class="primary-btn pricing-btn">Enroll now</a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->




    <!-- Contact Section Begin -->
    <section style="margin-top: -12%" class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title contact-title">
                        <span>Contacténos</span>
                        <h2>Pongase en contacnto</h2>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">
                   <span style="color: white" ><i  class="fa fa-link"> </i> SITIO WEB </span>
                    <p>    <a style="color: white"target="_blank" href="https://www.novum.nat.cu/">https://www.novum.nat.cu/</a></p>
                </div>
                <div class="col">
                    <span style="color: white" ><i  class="fa fa-whatsapp"> </i> WHATSAPP </span>
                    <p>    <a style="color: white" target="_blank" title="Envíanos un mensaje de WhatsApp" href="https://api.whatsapp.com/send?phone=5352774834&text=Hola, Nececito mas informacion!"> +53 52774834</a></a>

                </div>
                <div class="col">
                    <span style="color: white" ><i  class="fa fa-envelope"> </i> CORREO ELECTRÓNICO </span>
                    <p>    <a style="color: white"target="_blank" href="mailto:novum.cu@gmail.com">novum.cu@gmail.com</a></p>
                </div>
            </div>

        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <section style="margin-top: -6%" class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="fs-about">
                        <div class="fa-logo">
                            <a href="/">  <img src="{{ asset('gymlife/img/logo-xl.png') }}" alt="logo"></a>
                        </div>
                        <p>Una plataforma para los propietarios de gimnasios y estudios de fitness que desean ahorrar tiempo y gestionar su base de clientes. Permiten tener el control de tu negocio, por lo que no tienes que preocuparte por las cosas pequeñas:
                            desde la programación y la gestión de miembros hasta los pagos y la generación de informes.</p>
                        <div class="fa-social">
                            <a target="_blank" title="Envíanos un mensaje de WhatsApp" href="https://api.whatsapp.com/send?phone=5352774834&text=Hola, Nececito mas informacion!"><i class="fa fa-whatsapp"></i></a>
                            <a target="_blank" href="https://www.facebook.com/Novum-111139738041948"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="#"><i class="fa fa-linkedin"></i></a>
                            <a target="_blank"href="https://twitter.com/NovumCu"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="https://t.me/NovumCu"><i class="fa fa-telegram"></i></a>
                            <!-- <a href="#"><i class="fa  fa-envelope-o"></i></a> -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>

                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Todos los Derechos Reservados <a href="https://www.novum.nat.cu.com" target="_blank">NOVUM</a> Soluciones Informáticas
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('gymlife/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('gymlife/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('gymlife/js//main.js') }}"></script>
    {{-- <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script> --}}



</body>

</html>
