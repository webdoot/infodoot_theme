	<!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5> 
                <p class="font-weight-medium light-gray"><i class="fa fa-envelope mr-2"></i>MAIL@INFODOOT.COM</p>

                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6> 
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.facebook.com/infodootpage" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://twitter.com/Infodootid" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://instagram.com/infodootpage" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>            
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Important Links</h5>
                <p class="font-weight-medium"><a class="light-gray" href="<?php echo esc_html(get_bloginfo('url')) . '/about'; ?>">About</a></p>
                <p class="font-weight-medium"><a class="light-gray" href="<?php echo esc_html(get_bloginfo('url')) . '/contact'; ?>">Contact</a></p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Other Links</h5>
                <p class="font-weight-medium"><a class="light-gray" href="<?php echo esc_html(get_bloginfo('url')) . '/dmca'; ?>">DMCA</a></p>
                <p class="font-weight-medium"><a class="light-gray" href="<?php echo esc_html(get_bloginfo('url')) . '/disclaimer'; ?>">Disclaimer</a></p>
                <p class="font-weight-medium"><a class="light-gray" href="<?php echo esc_html(get_bloginfo('url')) . '/privacy-policy'; ?>">Privacy Policy</a></p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center light-gray">&copy; <a href="#" class="light-gray"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>. All Rights Reserved.<br>
    </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>