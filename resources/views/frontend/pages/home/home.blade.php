@extends('frontend.master.master')
@section('content')

    <div class="slidertop">
        <section class="mbr-section welcome mbr-parallax-background mbr-after-navbar" id="content8-7"
                 style="background-image: url(pagegallery/67car-banner.jpg);">
            <div class="mbr-overlay">
            </div>
            <div class="container">
                <div class="col-md-6"><h1 class="mbr-section-title display-2">Cheap and Best Vehicle Rental in
                        Nepal</h1>
                    <ul class="clearfix">
                        <li class="col-sm-4 col-xs-5"><a class="btn btn-primary btn-lg book" href="inquiry.html"> Book
                                Now</a></li>

                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="vehiclebooking">
                        <form name="form1" method="post" action="inquiry.html">
                            <div class="form-group row">
                                <label class="col-md-4" for="vehicle_type">Vehicle Type:</label>
                                <div class="col-md-8">
                                    <select name="vehicle_type" id="vehicle_type" class="form-control">
                                        <option value="">Select Vehicle Type</option>
                                        <option value="Car">Car</option>
                                        <option value="Coaster">Coaster</option>
                                        <option value="Hiace">Hiace</option>
                                        <option value="Jeep">Jeep</option>
                                        <option value="Mini Bus">Mini Bus</option>
                                        <option value="Sutlej Bus">Sutlej Bus</option>
                                        <option value="Van">Van</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4" for="pickup_from">Pickup From:</label>
                                <div class="col-md-8">
                                    <select name="pickup_from" id="pickup_from" class="form-control">
                                        <option value="">Select Pickup Location</option>
                                        <option value="Chitwan">Chitwan</option>
                                        <option value="Kathmandu">Kathmandu</option>
                                        <option value="Lumbini">Lumbini</option>
                                        <option value="Pokhara">Pokhara</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4" for="drop_to">Drop To:</label>
                                <div class="col-md-8">
                                    <select name="drop_to" id="drop_to" class="form-control">
                                        <option value="">Select Drop Location</option>
                                        <option value="Airport : Mountain Flight">Airport : Mountain Flight</option>
                                        <option value="Airport : Overnight Charge">Airport : Overnight Charge</option>
                                        <option value="Airport Arrival / Departure">Airport Arrival / Departure</option>
                                        <option value="Begnas Halgday Sightseeing">Begnas Halgday Sightseeing</option>
                                        <option value="Besisahar">Besisahar</option>
                                        <option value="Besisahar Bhulbhule">Besisahar Bhulbhule</option>
                                        <option value="Bhaktapur tour only">Bhaktapur tour only</option>
                                        <option value="Bungmati/Khokana  tour">Bungmati/Khokana tour</option>
                                        <option value="Butwal">Butwal</option>
                                        <option value="Chagunarayan tour">Chagunarayan tour</option>
                                        <option value="Chandragiri">Chandragiri</option>
                                        <option value="Chitlang">Chitlang</option>
                                        <option value="Chitwan">Chitwan</option>
                                        <option value="Chitwan Jugodi">Chitwan Jugodi</option>
                                        <option value="Chitwan Jungle Lodge">Chitwan Jungle Lodge</option>
                                        <option value="Chitwan Narayanghadh">Chitwan Narayanghadh</option>
                                        <option value="Chitwan Sauraha">Chitwan Sauraha</option>
                                        <option value="Daman">Daman</option>
                                        <option value="Dhulikhel tour">Dhulikhel tour</option>
                                        <option value="Full day Bhaktapur- changunaraya- Nagarkot day tour">Full day
                                            Bhaktapur- changunaraya- Nagarkot day tour
                                        </option>
                                        <option value="Full day Daksinkali, Chovar and Kritipur tour">Full day
                                            Daksinkali, Chovar and Kritipur tour
                                        </option>
                                        <option value="Full day Kathmandu city, shoyambhu stupa, Patan durbar">Full day
                                            Kathmandu city, shoyambhu stupa, Patan durbar
                                        </option>
                                        <option value="Full day Kathmandu to Dhunche day return">Full day Kathmandu to
                                            Dhunche day return
                                        </option>
                                        <option value="Full day Kathmandu to Syaphrubesi day return">Full day Kathmandu
                                            to Syaphrubesi day return
                                        </option>
                                        <option value="Full day Kathmandu to Trisuli day return & Drop">Full day
                                            Kathmandu to Trisuli day return & Drop
                                        </option>
                                        <option
                                            value="Full day Pahupati Nath Temple, Boudha Stupa and Bhaktapur durbar squire">
                                            Full day Pahupati Nath Temple, Boudha Stupa and Bhaktapur durbar squire
                                        </option>
                                        <option value="Godawari">Godawari</option>
                                        <option value="Halesi">Halesi</option>
                                        <option value="Half day Bhaktapur tour only">Half day Bhaktapur tour only
                                        </option>
                                        <option
                                            value="Half day city Swoyambhu Stupa (Monkey Temple), Patan durbar squire.">
                                            Half day city Swoyambhu Stupa (Monkey Temple), Patan durbar squire.
                                        </option>
                                        <option value="Half day Daksinkali tour">Half day Daksinkali tour</option>
                                        <option value="Half day Sakhu tour">Half day Sakhu tour</option>
                                        <option value="Ilam">Ilam</option>
                                        <option value="Kalinchok">Kalinchok</option>
                                        <option value="Kathmandu">Kathmandu</option>
                                        <option value="Kerung">Kerung</option>
                                        <option value="Kritipur/Chovar tour">Kritipur/Chovar tour</option>
                                        <option value="Kulekhani">Kulekhani</option>
                                        <option value="Lele">Lele</option>
                                        <option value="Lumbini">Lumbini</option>
                                        <option value="Nagarkot">Nagarkot</option>
                                        <option value="Nagarkot tour">Nagarkot tour</option>
                                        <option value="Naudada Halfday Sightseeing">Naudada Halfday Sightseeing</option>
                                        <option value="Nayapool Droup">Nayapool Droup</option>
                                        <option value="Pashupati Nath and Boudhanath Stupa tour">Pashupati Nath and
                                            Boudhanath Stupa tour
                                        </option>
                                        <option value="Pathivara">Pathivara</option>
                                        <option value="Pokhara">Pokhara</option>
                                        <option value="Pokhara Chitwan">Pokhara Chitwan</option>
                                        <option value="Pokhara Chitwan Lumbini">Pokhara Chitwan Lumbini</option>
                                        <option value="Pokhara Lumbini">Pokhara Lumbini</option>
                                        <option value="Pokhara Sightseeing">Pokhara Sightseeing</option>
                                        <option value="Pokhara Sightseeing (Half Day)">Pokhara Sightseeing (Half Day)
                                        </option>
                                        <option value="Sarankot Half Day Sightseeing">Sarankot Half Day Sightseeing
                                        </option>
                                        <option value="Sukute">Sukute</option>
                                        <option value="Sukute Beach">Sukute Beach</option>
                                        <option value="Sundarijal tour">Sundarijal tour</option>
                                        <option value="Tilaurakot">Tilaurakot</option>
                                        <option value="Tindhara">Tindhara</option>
                                        <option value="Wedding">Wedding</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-8" for="price" id="price"></label>
                                <input type="hidden" name="cost_estimate" value="" id="cost_estimate"/>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4" for="direction">Trip Mode</label>
                                <div class="col-md-4">
                                    <input type="radio" name="direction" id="oneway" value="One Way"> One Way
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" name="direction" id="roundtrip" checked="checked"
                                           value="Round Trip"> Round Trip

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4" for="required_date">Required Date: </label>
                                <div class="col-md-8">
                                    <input name="required_date" id="required_date" type="text" placeholder="date"
                                           class="form-control" required>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-4" for="return_date">Return Date: </label>
                                <div class="col-md-8">
                                    <input name="return_date" id="return_date" type="text" placeholder="return date"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4"></label>
                                <div class="col-md-8">
                                    <input name="bookfrom" value="" type="hidden"/>
                                    <input type="submit" class="btn btn-primary" value="Submit"/>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </section>
    </div>
    <div class="services">
        <div class="container">
            <div class="row clearfix">
                <h1><a href="https://www.easyvehiclerental.com/about-us.html">Car on Rent in Kathmandu</a></h1>
                <p dir="ltr">Easy Vehicle Rental is one of the best car rental service providers based in Kathmandu
                    Nepal. The vehicle rental agency offers a wide range of vehicles on hire for personal and business
                    trips all over Nepal.</p>
                <p dir="ltr">Renting a car in Kathmandu to Pokhara, Chitwan, Lumbini, Biratnagar and other cities with
                    an experienced and professional driver makes your journey secure and comfortable one. Normal to
                    luxury cars or small group in normal roads and 4WD jeeps for off-road and muddy roads also available
                    for you. You can hire vehicles like Sedan or SUV cars, 4 wheels Jeeps, big or small vans and big or
                    mini buses. Most of all vehicles are new and in good condition.&nbsp;</p>
                <p dir="ltr">We provide a well maintained, neat and clean comfortable vehicle on rent . We have
                    different capacities vehicles for different group size passengers. We provide Japanese, Korean,
                    German and Indian brand vehicles with experienced drivers. Our divers are good in communication and
                    necessary support. We arrange all kinds of vehicles including Car, Van, Jeep, Hiace, Coaster,
                    Mini-Bus, Sutlej Bus, 4wd Jeep and Hilux Jeep.&nbsp;</p>
                <p dir="ltr">If you are looking to hire a car, jeep or van for a small group or coaster, mini bus or bus
                    for a big size group, we arrange vehicles for all kinds of people. Just make a call, we arrange
                    everything for your comfortable journey. We offer vehicles for tour, wedding, meetings and <a
                        href="https://nepalhelicopters.com" title="Helicopter Charter">helicopter charter services</a>
                    for your needs.</p></div>
        </div>
    </div>
    <div class="our-fleet">
        <div class="container">
            <div class="row">
                <h2><span>Available Vehicles on Hire</span></h2>
                @foreach($vehicleTypeData as $vehicle)
                    <div class="col-md-3 col-sm-3">
                        <div class="card cart-block">
                            @if($vehicle->image)
                                <div class="card-img">
                                    <a href="">
                                        <img src="{{url($vehicle->image)}}" class="card-img-top" alt="Car"/></a>
                                </div>
                            @else
                                <div class="card-img"><a href="">
                                        @include('lib.image-not-found')
                                    </a>
                                </div>
                            @endif
                            <div class="card-block"><h4 class="card-title">
                                    <a href="">{{$vehicle->type}}</a></h4>
                                <h5 class="card-subtitle"></h5>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
