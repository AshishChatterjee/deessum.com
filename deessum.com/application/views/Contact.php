<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Deessum | Contact </title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include 'layout/header_links.php'; ?>

    <style>
        .contact-form select {
            width: 100%;
            height: 44px;
            border: none;
            padding: 0 18px;
            background: #f0f0f0;
            border-radius: 40px;
            margin-bottom: 17px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- Page Preloder  -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
   
    <?php include 'layout/header.php'; ?>

    <!-- Contact section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 contact-info">
                    <h3>Get in touch</h3>
                    <p>Main Str, no 23, New York</p>
                    <p>+546 990221 123</p>
                    <p>hosting@contact.com</p>
                    <form class="contact-form" method="post" action="<?php echo base_url("welcome/contact/"); ?>">
                        <?php if(form_error("name")!=null){ echo form_error("name"); } ?>
                        <input type="text" name="name" placeholder="Your name" value="<?php echo set_value("name"); ?>">

                        <?php if(form_error("email")!=null){ echo form_error("email"); } ?>
                        <input type="text" name="email" placeholder="Your e-mail" value="<?php echo set_value("email"); ?>">

                        <?php if(form_error("mobile")!=null){ echo form_error("mobile"); } ?>
                        <input type="text" name="mobile" placeholder="Mobile" value="<?php echo set_value("mobile"); ?>">

                        <?php if(form_error("subject")!=null){ echo form_error("subject"); } ?>
                        <input type="text" name="subject" placeholder="Subject" value="<?php echo set_value("subject"); ?>">

                        <?php if(form_error("message")!=null){ echo form_error("message"); } ?>
                        <textarea name="message" placeholder="Message"><?php echo set_value("message"); ?></textarea>

                        <button type="submit" class="site-btn">SEND NOW</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118324.79524898772!2d82.06855519507434!3d22.062985847031847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a280b117b9ab6a7%3A0xc6f3f89d9eac7caf!2sBilaspur%2C%20Chhattisgarh%2C%20India!5e0!3m2!1sen!2suk!4v1570646276943!5m2!1sen!2suk" style="border:0" allowfullscreen></iframe></div>
    </section>
    <!-- Contact section end -->
    <br/>
    <br/>


    <?php include 'layout/footer.php'; ?>
    <?php include 'layout/footer_scripts.php'; ?>
    <script>
        function submitForm(){
            $("#regForm").attr('action',"<?php echo base_url('customer/registerInputSource/');  ?>");
            $("#regForm").submit();
        }
    </script>
    

</body>

</html>