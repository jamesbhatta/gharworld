<!-- Footer Section -->
<footer class="footer-section pt-4  {{ request()->is('/') ? 'd-none' : '' }}">
    <div class="container">
        <div class="row text-white ">
            <div class="row">
                <div class="col-md-3">
                    <x-company-contact-component/>
                </div>
                <div class="col-md-9 text-center">
                    <img src="{{asset('assets/img/gw.png') }}" alt="GharWorld Logo" style="height:70px;">
                    <p><a href="http://gharworld.com"> Gharworld.com</a> is a platform to disseminate real estate
                        industry information. We provide comprehensive detail on real estate properties which are for
                        sale or rent, including current news and information about real estate market.</p>
                </div>
            </div>
        </div>
        {{-- <div class="row text-white">
             <div class="col-lg-4">
                 <div class="footer-widger">
                     <div class="about-widget">
                         <div class="aw-text">
                             <img src="{{asset('assets/img/gw.png') }}" alt="GharWorld Logo" style="height:50px;">
        <p><a href="http://gharworld.com"> Gharworld.com</a> is a platform to disseminate real estate industry
            information. We provide comprehensive detail on real estate properties which are for sale or rent, including
            current news and information about real estate market.</p>
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-2 col-md-3 col-sm-6">
        <div class="footer-widger">
            <h2>Company</h2>
            <ul>
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Clients</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Carrers</a></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-2 col-md-3 col-sm-6">
        <div class="footer-widger">
            <h2>For Buyers</h2>
            <ul>
                <li><a href="#">Buy with us</a></li>
                <li><a href="#">Papers</a></li>
                <li><a href="#">Clients</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Homes</a></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-2 col-md-3 col-sm-6">
        <div class="footer-widger">
            <h2>For Sellers</h2>
            <ul>
                <li><a href="#">Seel With us</a></li>
                <li><a href="#">What do You Need</a></li>
                <li><a href="#">Clients</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Guideline</a></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-2 col-md-3 col-sm-6">
        <div class="footer-widger">
            <h2>For Renters</h2>
            <ul>
                <li><a href="#">Rent with us</a></li>
                <li><a href="#">Guidelines</a></li>
                <li><a href="#">Apartments</a></li>
                <li><a href="#">Flats</a></li>
                <li><a href="#">Houses</a></li>
            </ul>
        </div>
    </div>
    </div>
    --}}
    <div class="copyright text-center">
        Copyright &copy;
        <script>
            document.write(new Date().getFullYear());

        </script> All rights reserved | gharworld.com |
        Powered by : <a href="https://mohrain.com" target="_blank">Mohrain Websoft Pvt. Ltd. </a>
    </div>
    </div>
</footer>
<!-- Footer Section end -->