<!--====== Jquery js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/jquery-3.6.0.min.js"></script>
<!--====== Bootstrap js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/popper/popper.min.js"></script>
<!--====== Bootstrap js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--====== Slick js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/slick/slick.min.js"></script>
<!--====== Magnific js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<!--====== Counterup js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/jquery.counterup.min.js"></script>
<!--====== Waypoints js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/jquery.waypoints.js"></script>
<!--====== Parallax js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/parallax.min.js"></script>
<!--====== AOS js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/aos/aos.js"></script>
<!--====== Main js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/js/theme.js"></script>
<!--====== Magnific popup js ======-->
<script src="{{URL::to('/')}}/templates/landing-page/assets/vendor/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script>
    $(function(){
        if($('.image-popup').length >= 1){
            $('.image-popup').magnificPopup({type:'image'});
        }
    })
</script>
@yield("script")