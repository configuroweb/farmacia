<?php
include('./constant/connect.php');

?>
</div>

</div>


<script src="assets/js/lib/jquery/jquery.min.js"></script>

<script src="assets/js/lib/bootstrap/js/popper.min.js"></script>
<script src="assets/js/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/lib/bootstrap/js/bootstrap.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>

<script src="assets/js/sidebarmenu.js"></script>

<script src="assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>


<script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>

<script src="assets/js/lib/sweetalert/sweetalert.init.js"></script>


<script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
<script src="assets/js/lib/weather/weather-init.js"></script>
<script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>




<script src="assets/js/custom.min.js"></script>


<script src="assets/js/lib/datatables/datatables.min.js"></script>
<script src="assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="assets/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="assets/js/lib/datatables/datatables-init.js"></script>



<script>
    function alphaOnly(event) {
        var key = event.keyCode;
        return ((key >= 65 && key <= 90) || key == 8);
    };
</script>
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
    .goog-logo-link {
        display: none !important;
    }

    .goog-te-gadget {
        color: transparent;
    }

    .goog-te-gadget .goog-te-combo {
        margin: 0px 0;
        padding: 8px;
    }

    #google_translate_element {
        padding-top: 14px;
    }
</style>
<footer class="bg-primary text-white text-center text-lg-start fixed-bottom">
    <!-- Grid container -->

    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        Para más desarrollos accede a
        <a class="text-white" href="https://www.configuroweb.com/">ConfiguroWeb</a>
    </div>
    <!-- Copyright -->
</footer>
<!--/ Copy this code to have a working example -->

</div>
</div>
</body>

</html>