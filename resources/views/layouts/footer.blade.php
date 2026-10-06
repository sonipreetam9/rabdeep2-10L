<!-- WhatsApp Button (With Special Pulse Animation) -->
<div class="floating-action-menu">

    <a href="https://wa.me/91{{ $CompanyWhatsapp }}?text=Hello%20Rabdeep%20Motors%2C%20I%20am%20interested%20in%20your%20Jeep%20and%20SUV%20services."
        class="float-btn whatsapp-btn" title="Chat with Rabdeep Motors on WhatsApp" target="_blank"
        rel="noopener noreferrer">
        <img src="{{ asset('images/whatsapp.png') }}" alt="Rabdeep Motors WhatsApp" title="Chat with Rabdeep Motors">
    </a>

</div>

<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
<footer class="footer-bg">
    <!-- Footer Content -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3  col-sm-6 col-xs-12">
                    <!-- Info Widget -->
                    <div class="widget">
                        <div class="logo"> <img alt="" src="{{ asset('images/logo.png') }}"> </div>
                        <p>At Rabdeep Motors, we redefine the art of car modification and customization. Our passion for
                            high-performance, luxury, and uniquely modified cars drives us to offer a handpicked
                            collection of custom-tuned vehicles that turn heads on the road.</p>

                    </div>

                    <!-- Info Widget Exit -->
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <!-- Follow Us -->
                    <div class="widget socail-icons">
                        <h5>Follow Us</h5>
                        <ul>
                            <li><a class="Facebook" href="{{ $CompanyFacebook }}" target="_blank"><i
                                        class="fa fa-facebook"></i></a><span>Facebook</span></li>
                            <li><a class="Instagram" href="{{ $CompanyInstagram }}" target="_blank"><i
                                        class="fa fa-instagram"></i></a><span>Instagram</span></li>
                            <li><a class="Youtube" href="{{ $CompanyYoutube }}" target="_blank"><i
                                        class="fa fa-youtube"></i></a><span>Youtube</span></li>
                            <li><a class="Whatsapp" href="{{ $CompanyWhatsapp }}" target="_blank"><i
                                        class="fa fa-whatsapp"></i></a><span>WhatsApp</span></li>
                        </ul>
                    </div>
                    <!-- Follow Us End -->
                </div>
                <div class="col-md-2  col-sm-6 col-xs-12">
                    <!-- Follow Us -->
                    <div class="widget my-quicklinks">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="#">Faqs</a></li>
                            <li><a href="#">Packages</a></li>
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- Follow Us End -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <!-- Contact Us -->
                    <div class="widget widget-newsletter">
                        <h5>Contact Us</h5>
                        <div class="fieldset">

                            <ul class="contact-info">
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <strong>Phone:</strong>
                                    <a href="tel:+91{{ $CompanyPhone1 }}">+91 {{ $CompanyPhone1 }}</a>
                                </li><br>

                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <strong>Email:</strong>
                                    <a href="mailto:{{ $CompanyEmail }}">{{ $CompanyEmail }}</a>
                                </li><br>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <strong>Address:</strong>
                                    <span>{{ $CompanyAddress }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <!-- Contact Us -->
                    <div class="widget widget-newsletter">
                        <h5>Business Profile</h5>
                        <div class="fieldset">

                            <img src="{{ asset('images/business_profile.png') }}" alt="Business Profile"
                                class="img-fluid">

                        </div>
                    </div>

                    <!-- <div class="copyright">
                        <p>
                            © 2026 {{ $CompanyName }}. All rights reserved.
                        </p>
                    </div> -->
                    <!-- Contact Us -->
                </div>

            </div>
        </div>
    </div>

</footer>
<!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
</div>

<!-- Back To Top -->
<a href="#0" class="cd-top">Top</a>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/easing.js') }}"></script>
<script src="{{ asset('js/carspot-menu.js') }}"></script>
<script src="{{ asset('js/jquery.appear.min.js') }}"></script>
<script src="{{ asset('js/jquery.countTo.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/nouislider.all.min.js') }}"></script>
<script src="{{ asset('js/carousel.min.js') }}"></script>
<script src="{{ asset('js/slide.js') }}"></script>
<script src="{{ asset('js/imagesloaded.js') }}"></script>
<script src="{{ asset('js/isotope.min.js') }}"></script>
<script src="{{ asset('js/icheck.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('js/color-switcher.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<!-- MasterSlider -->
<script src="{{ asset('js/masterslider/masterslider.min.js') }}"></script>
<script type="text/javascript">
    (function ($) {
        "use strict";

        var slider = new MasterSlider();
        slider.control('arrows');

        slider.setup('masterslider', {
            width: 1400,
            height: 560,
            layout: 'fullwidth',
            loop: true,
            preload: 0,
            fillMode: 'fill',
            instantStartLayers: true,
            autoplay: true,
            view: "basic"

        });

    })(jQuery);


</script>

<!-- Custom JavaScript for Slider Buttons -->
<script>
    const cardsWrapper = document.getElementById('cardsWrapper');
    const slideLeft = document.getElementById('slideLeft');
    const slideRight = document.getElementById('slideRight');

    // Ek baar click karne par kitna pixel scroll hoga (card width + gap ke hisab se set karein)
    const scrollAmount = 300;

    slideLeft.addEventListener('click', () => {
        cardsWrapper.scrollBy({
            top: 0,
            left: -scrollAmount,
            behavior: 'smooth'
        });
    });

    slideRight.addEventListener('click', () => {
        cardsWrapper.scrollBy({
            top: 0,
            left: scrollAmount,
            behavior: 'smooth'
        });
    });
</script>
</body>

</html>