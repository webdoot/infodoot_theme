<?php 
	get_header();
?>
    
    <!-- Contact Start -->
    <div class="container-fluid my-3 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-0">
                        <h1 class="h4 m-0 text-uppercase font-weight-bold">Have Queries?</h1>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <div class="mb-4">
                            <h6 class="text-uppercase font-weight-bold">Email Us</h6>
                            <p class="mb-4">mail@infodoot.com</p>
                        </div>

                        <br> <br>
                        
                        <div id="response-message"> </div> 

                        <h6 class="text-uppercase font-weight-bold mb-3">Contact Us</h6>

                        <form id="contact-form" method="post" action="<?php echo esc_url( admin_url('admin-ajax.php') ); ?>">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control p-4" placeholder="Your Name" required="required"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control p-4" placeholder="Your Email" required="required"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="4" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                    type="submit">Send Message</button>
                            </div>
                            <?php wp_nonce_field('contact_form_submit', 'contact_form_nonce'); ?>
                            <input type="hidden" name="action" value="contact_form">
                        </form>

                    </div>
                </div>
                <div class="col-lg-4">
                    <?php 
                        get_sidebar('article');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php 
	get_footer();
?>   