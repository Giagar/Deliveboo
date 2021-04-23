@if (Request::route()->getName() !== 'login' && Request::route()->getName() !== 'register' && Request::route()->getName() !== 'logout')

    <!-- Footer -->
    <footer class="page-footer font-small">

        <div class="top">
            <div class="container">

                <!-- Grid row-->
                <div class="grid-row row py-4 d-flex align-items-center px-3 mx-1">

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="text-uppercase mb-0">Connettiti con noi sui social</h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">

                        <!-- Facebook -->
                        <a class="fb-ic mr-4">
                            <i class="fab fa-facebook-f"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic mr-4">
                            <i class="fab fa-twitter white-text"> </i>
                        </a>
                        <!-- Google +-->
                        <a class="gplus-ic mr-4">
                            <i class="fab fa-google-plus-g white-text"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic mr-4">
                            <i class="fab fa-linkedin-in white-text"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fab fa-instagram white-text"> </i>
                        </a>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row-->

            </div>
        </div>

        <!-- Footer Links -->
        <div class="links container text-center text-md-left mt-5 text-sm-center">

            <!-- Grid row -->
            <div class="row mt-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Scopri Deliveboo</h6>
                    <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Lavora con noi</a>
                    </p>
                    <p>
                        <a href="#!">Negozi partner</a>
                    </p>
                    <p>
                        <a href="#!">Corrieri</a>
                    </p>
                    <p>
                        <a href="#!">Deliveboo Business</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Link di interesse</h6>
                    <hr class=" accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Chi siamo</a>
                    </p>
                    <p>
                        <a href="#!">FAQ</a>
                    </p>
                    <p>
                        <a href="#!">Blog</a>
                    </p>
                    <p>
                        <a href="#!">Diventa nostro partner</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Aiuto</h6>
                    <hr class=" accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Termini & Condizioni</a>
                    </p>
                    <p>
                        <a href="#!">Informativa sulla privacy</a>
                    </p>
                    <p>
                        <a href="#!">Cookies</a>
                    </p>
                    <p>
                        <a href="#!">Altro</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class=" accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                    <p class="contact-details">
                        <i class="fas fa-home mr-3 py-1"></i>
                        <span>via Cavour, 4, Roma, 00118</span>
                    </p>

                    <p>
                        <i class="fas fa-envelope mr-3 py-1"></i> info@deliveboo.it
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3 py-1"></i> + 01 234 567 88
                    </p>
                    <p>
                        <i class="fas fa-print mr-3 py-1"></i> + 01 234 567 89
                    </p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="#"> Deliveboo.com</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
@endif
