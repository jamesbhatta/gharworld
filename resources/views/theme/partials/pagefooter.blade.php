<!-- Footer Section -->
@include('theme.partials.messenger-chat')
<footer class="footer-section pt-4 ">
    <div class="container">

        <div class="row text-white ">
            <div class="col-md-4 text-xl-left text-center">
                <x-company-contact-component />
            </div>
            <div class="col-md-8 text-center">
                <h3><a href="{{url('/')}}">Gharworld.com</a></h3>
                <p><a href="http://gharworld.com"> Gharworld.com</a> is a platform to disseminate real estate
                    industry information. We provide comprehensive detail on real estate properties which are for
                    sale or rent, including current news and information about real estate market.</p>
            </div>
        </div>
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
