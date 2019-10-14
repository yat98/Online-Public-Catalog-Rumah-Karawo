<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix footer-bottom">
    <div class="container">
        <div class="row align-items-center">
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-4">
                <div class="single_widget_area">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="index.html"><img src="{{ asset('img/core-img/logo.png') }}" alt=""></a>
                    </div>
                    <!-- Copywrite Text -->
                    <p class="copywrite text-dark">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        All rights reserved | By Rumah Karawo
                    </p>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-8">
                <div class="single_widget_area">
                    <!-- Footer Menu -->
                    <div class="footer_menu">
                        <nav class="navbar navbar-expand-lg justify-content-end">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false"
                                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                            <div class="collapse navbar-collapse" id="footerNavContent">
                                <ul class="navbar-nav ml-auto text-dark">

                                    @if (!empty($halaman) && $halaman == 'home')
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ url('/') }}">Home</a>
                                    </li>
                                    @endif

                                    @if (!empty($halaman) && $halaman == 'product')
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('product') }}">Product</a>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="{{ url('product') }}">Product</a>
                                    </li>
                                    @endif
                                    
                                    <li class="nav-item"><a class="nav-link text-dark" href="mailto:rumahkarawo1@gmail.com">Ask Us</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->