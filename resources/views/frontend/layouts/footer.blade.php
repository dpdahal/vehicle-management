@section('footer')
    <section class="mbr-footer footer mbr-section mbr-section-md-padding" id="contacts4-3">
        <div class="container">
            <div class="mbr-contacts row">
                <div class="col-sm-3">
                    <h2><span>Useful links</span></h2>
                    <ul>
                        <li><a title="Home" href="./">Home</a></li>
                        <li><a title="Book a Vehicle" href="https://www.easyvehiclerental.com/inquiry.html">Book a
                                Vehicle</a></li>
                        <li><a title="Testimonials" href="https://www.easyvehiclerental.com/testimonials.html">Testimonials</a>
                        </li>
                        <li><a title="Contact Us" href="https://www.easyvehiclerental.com/contact-us.html">Contact
                                Us</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h2><span>Destinations</span></h2>
                    <ul>
                        <li><a title="Kathmandu" href="https://www.easyvehiclerental.com/kathmandu-car-rental.html">Kathmandu</a>
                        </li>
                        <li><a title="Pokhara"
                               href="https://www.easyvehiclerental.com/pokhara-car-rental.html">Pokhara</a></li>
                        <li><a title="Chitwan"
                               href="https://www.easyvehiclerental.com/chitwan-car-rental.html">Chitwan</a></li>
                        <li><a title="Lumbini"
                               href="https://www.easyvehiclerental.com/lumbini-car-rental.html">Lumbini</a></li>
                        <li><a title="Birgunj"
                               href="https://www.easyvehiclerental.com/birgunj-car-rental.html">Birgunj</a></li>
                        <li><a title="Sukute"
                               href="https://www.easyvehiclerental.com/kathmandu-to-sukute-beach-jeep-or-car-rental.html">Sukute</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h2><span>Available Vehicles on Hire</span></h2>
                    <ul>
                        <li><a title="Car" href="https://www.easyvehiclerental.com/cars.html">Car</a></li>
                        <li><a title="Jeep" href="https://www.easyvehiclerental.com/jeep.html">Jeep</a></li>
                        <li><a title="Van" href="https://www.easyvehiclerental.com/van.html">Van</a></li>
                        <li><a title="Bus" href="https://www.easyvehiclerental.com/bus.html">Bus</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h2><a href="https://www.easyvehiclerental.com/contact-us.html">Contact Us</a></h2>
                    <p>Easy Vehicle Rental <br/>Thamel, Kathmandu, Nepal<b><br/>Phone: </b>+977<b>9749411470<br/>Email:
                        </b>info@easyvehiclerental.com<b><br/></b></p>
                    <div class="clear"></div>
                </div>
                <div class="hline"></div>
            </div>
        </div>
        </div>
    </section>

    <!-- footer section starts -->
    <footer class="mbr-small-footer design mbr-section mbr-section-nopadding" id="footer1-4">

        <div class="container">

            <div class="row">

                <div class="col-sm-7">

                    <p class="text-xs-center">&copy;2021 All rights reserved to Easy Vehicle Rental</p>

                </div>

                <div class="col-sm-5">

                    <p class="text-xs-center">Design By : <a href="//www.xenatechnepal.com"
                                                             title="Vehicle Rental Website Development in Nepal"
                                                             target="_blank">Xenatech Nepal</a></p>

                </div>

            </div>

        </div>

    </footer>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/menu.js" defer></script>

    <script>
        $(function () {
            $("#required_date").datepicker();
            $("#return_date").datepicker();
        });
    </script>


    <script type="text/javascript">

        $(document).ready(function () {

            $("#booking_form").on("submit", function () {

                $("#result").empty().append("<i class='fa fa-loading'> ..loading</i>");

                $.post("booknow/", $(this).serialize(), function (data) {

                    if (data == 'success') {

                        $(".bookingform form").empty().append("<div id='result'>Message Sent Successfully.</div>");

                    } else {

                        $("#result").empty().append(data);

                    }

                });
                return false;

            });

        });

    </script>

    <input name="animation" type="hidden">
    <script type="text/javascript" src="js/calculate.js"></script>
    </body>
    </html>

@endsection
