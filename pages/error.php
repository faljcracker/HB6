<?php require 'header.html'; ?>

<header class="contact-header">
    <div class="d-none d-md-block">
        <ul class="bg-blue-transparent px-2 py-2 nav justify-content-lg-end">
            <li class="nav-item mx-5 my-2"><i class="fa fa-phone mr-2" aria-hidden="true"></i>
                +1(707)340-3624
            </li>

            <li class="nav-item mx-5 my-2"><i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                info@universalcargologistics.com
            </li>
            <li class="nav-item mx-5 my-2"><i class="fas fa-clock mr-2" aria-hidden="true"></i>
                Mondays - Saturdays : 9:00 - 21:00 hours
            </li>
        </ul>
    </div>

    <div class="container-lg border-bottom p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent p-0" id="header-nav">
            <a class=" navbar-brand p-2" href="#"><img class="w-75 mx-auto img-fluid"
                    src="../src/assets/images/tracker-logo.png"></a>

            <button class="navbar-toggler p-0 text-center" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars fa-2x text-light"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav my-5 text-center">
                    <li class="nav-item m-2">
                        <a class="nav-link px-md-4" href="../Home">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item m-2 ">
                        <a class="nav-link px-md-4" href="../tracking">Track And Trace</a>
                    </li>
                    <li class="nav-item m-2 ">
                        <a class="nav-link px-md-4 " href="../about">About Us</a>
                    </li>

                    <li class="nav-item m-2 ">
                        <a class="nav-link px-md-4 " href="../contact">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="container p-5 my-5">
    <div class="text-center my-3">
        <h2>Sorry your <br class="d-md-none"><span class="text-danger"> message</span> was not sent</h2>
        <p>please try again!</p>
    </div>
</div>

<?php require 'footer.html'; ?>