@section('menu')
    <div class="header">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-6 hidden-xs"><a href="{{route('index')}}">
                        <img src="https://www.easyvehiclerental.com/images/logo.png" class="img-responsive"
                             alt="Easy Vehicle Rental"/></a></div>

                <div class="col-md-9">

                    <div class="main-menu">

                        <div class="row">

                            <nav class="navbar navbar-default">

                                <div class="navbar-header">
                                    <a href="./"><img src="https://www.easyvehiclerental.com/images/logo.png"
                                                      class="navbar-brand img-responsive visible-xs"
                                                      alt="Easy Vehicle Rental"/></a>
                                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                                            data-target="#mainmenu"><span class="sr-only">Toggle navigation</span> <span
                                            class="icon-bar"></span> <span class="icon-bar"></span> <span
                                            class="icon-bar"></span></button>

                                </div>

                                <div class="collapse navbar-collapse" id="mainmenu">

                                    <ul class="nav navbar-nav">
                                        <li class="first Home"><a title="Home" href="{{route('index')}}">Home</a></li>
                                        @foreach($vehicleTypeData as $vType)
                                            <li class="dropdown">
                                                <a data-toggle="dropdown" class="dropdown-toggle"
                                                   href="">{{$vType->type}}

                                                    <b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                    @foreach($vType->getVehicleTripePage as $page)
                                                        <li class=" first"><a title="Kathmandu Car Rental"
                                                                              href="">
                                                                {{$page->title}}
                                                                <b class="caret navbar-toggle sub-arrow"></b></a>
                                                            <ul class="dropdown-menu">
                                                                <li class=" first"><a title="Kathmandu Airport Transfer"
                                                                                      href="">Kathmandu
                                                                        Airport Transfer</a></li>
                                                                <li class=""><a title="Kathmandu Sightseeing by Car"
                                                                                href="">Kathmandu
                                                                        Sightseeing by Car</a></li>
                                                            </ul>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </li>
                                        @endforeach


                                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"
                                                                href="https://www.easyvehiclerental.com/vehicle-tours.html">Trips
                                                <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class=" first"><a title="Kathmandu – Pokhara Tour"
                                                                      href="https://www.easyvehiclerental.com/kathmandu-pokhara-tour-by-car-jeep-bus-hiace.html">Kathmandu
                                                        – Pokhara Tour</a></li>
                                                <li class=""><a title="Kathmandu Nagarkot Tour"
                                                                href="https://www.easyvehiclerental.com/kathmandu-nagarkot-tour-by-car-jeep.html">Kathmandu
                                                        Nagarkot Tour</a></li>
                                                <li class=""><a title="Kathmandu Chitwan Tour"
                                                                href="https://www.easyvehiclerental.com/kathmandu-chitwan-tour-by-car-jeep-bus-hiace.html">Kathmandu
                                                        Chitwan Tour</a></li>
                                                <li class=""><a title="Kathmandu Bardia Trip"
                                                                href="https://www.easyvehiclerental.com/kathmandu-bardia-trip.html">Kathmandu
                                                        Bardia Trip</a></li>
                                                <li class=""><a title="Kathmandu Lumbini Trip"
                                                                href="https://www.easyvehiclerental.com/kathmandu-lumbini-trip.html">Kathmandu
                                                        Lumbini Trip</a></li>
                                                <li class=""><a title="Kathmandu to Butwal Tour"
                                                                href="https://www.easyvehiclerental.com/kathmandu-butwal-tour.html">Kathmandu
                                                        to Butwal Tour</a></li>
                                            </ul>
                                        <li class="Contact Us"><a title="Contact Us"
                                                                  href="https://www.easyvehiclerental.com/contact-us.html">Contact
                                                Us</a>
                                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"
                                                                href="https://www.easyvehiclerental.com/vehicles.html">Vehicles
                                                <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class=" first"><a title="Mahindra Scorpio"
                                                                      href="https://www.easyvehiclerental.com/mahindra-scorpio.html">Mahindra
                                                        Scorpio</a></li>
                                                <li class=""><a title="Toyota Land Cruiser"
                                                                href="https://www.easyvehiclerental.com/toyota-land-cruiser.html">Toyota
                                                        Land Cruiser</a></li>
                                                <li class=""><a title="Mitsubishi Pajero Rent in Nepal"
                                                                href="https://www.easyvehiclerental.com/mitsubishi-pajero-rent-in-nepal.html">Mitsubishi
                                                        Pajero Rent in Nepal</a></li>
                                            </ul>
                                        <li class="Blog"><a title="Blog" href="{{route('blog')}}">Blog</a>
                                        <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"
                                                                href="https://www.easyvehiclerental.com/services.html">Services
                                                <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class=" first"><a title="Car Rent for Wedding"
                                                                      href="https://www.easyvehiclerental.com/wedding-car-rent-nepal.html">Car
                                                        Rent for Wedding</a></li>
                                                <li class=""><a title="Single Day Car Rental"
                                                                href="https://www.easyvehiclerental.com/single-day-car-rental.html">Single
                                                        Day Car Rental</a></li>
                                                <li class=""><a title="Bus Rent for Picnic Porgam"
                                                                href="https://www.easyvehiclerental.com/bus-rent-for-picnic-nepal.html">Bus
                                                        Rent for Picnic Porgam</a></li>
                                            </ul>
                                    </ul>
                                </div>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
