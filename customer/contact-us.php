<?php require_once __DIR__."/autoload/controller.php"; ?>
<?php require_once __DIR__."/layouts/header.php"; ?>
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Liên hệ với chúng tôi</h2>
                <div id="gmap" class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d237780.98963629035!2d105.73203983664204!3d21.37698744799517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x3135019979cf5ad7%3A0x489bef1baee321f8!2zU-G7kSBOaMOgIDExMiAtIFRow7RuIFPGoW4gRHUgWMOjIE5ndXnDqm4gS2jDqiwgU8ahbiBEdSwgTmd1ecOqbiBLaMOqLCDEkMO0bmcgQW5oLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!3m2!1d21.177726!2d105.82045!4m5!1s0x31352734a13f2b95%3A0x9dc2d308a7b459c4!2zNCBUw6JuIFRo4buLbmgsIFRo4buLbmggxJDDoW4sIFRow6BuaCBwaOG7kSBUaMOhaSBOZ3V5w6puLCBUaMOhaSBOZ3V5w6puLCBWaeG7h3QgTmFt!3m2!1d21.568393099999998!2d105.8111814!5e0!3m2!1svi!2s!4v1632590055881!5m2!1svi!2s"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Điền thông tin</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Họ tên">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Nội dung"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gửi">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Thông tin liên lạc</h2>
                    <address>
                        <p>QuangHai17</p>
                        <p>Số 65, Hoàng Văn Thụ, Thành phố Thái Nguyên</p>
                        <p><i class="fa fa-phone"></i> : +84 234 567 89</p>
                        <p><i class="fa fa-phone-square"></i> : 0208 333 444</p>
                        <p><i class="fa fa-envelope-o"></i> : info@quanghai17.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->
<?php require_once __DIR__."/layouts/footer.php"; ?>