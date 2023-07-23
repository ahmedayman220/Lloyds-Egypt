<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li>
{{--                    <a href="{{ route('setting.index') }}">--}}
                        <i class="mdi mdi-calendar"></i>
                        <span> Setting </span>
                    </a>
                </li>
                <li class="menu-title mt-2">Apps</li>

                {{-- banner --}}
                <li>
                    <a href="{{ route('banner.index') }}">
                        <span> Banner </span>
                    </a>
                </li>
                {{-- About Us --}}

                <li>
                    <a href="{{ route('about.index') }}">
                        <span> About Us </span>
                    </a>
                </li>

                {{-- Mission --}}
                <li>
                    <a href="{{ route('mission.index') }}">
                        <span> Mission </span>
                    </a>
                </li>


                {{-- Services --}}
                <li>
                    <a href="#Services" data-bs-toggle="collapse">
                        <span> Services </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Services">
                        <ul class="nav-second-level">

                            <li>
                                <a href="{{ route('service_category.index') }}">Service Category</a>
                            </li>

                            <li>
                                <a href="{{ route('service_item.index') }}">Service Item</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Suppliers --}}
                <li>
                    <a href="#Suppliers" data-bs-toggle="collapse">
                        <span> Suppliers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Suppliers">
                        <ul class="nav-second-level">

                            <li>
                                <a href="{{ route('supplier_category.index') }}">Supplier Category</a>
                            </li>

                            <li>
                                <a href="{{ route('supplier_item.index') }}">Service Item</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Instructors --}}
                <li>
                    <a href="{{ route('instructors.index') }}">
                        <span> Instructors </span>
                    </a>
                </li>


                {{-- Instructors --}}
                <li>
                    <a href="{{ route('courses.index') }}">
                        <span> Courses </span>
                    </a>
                </li>

                {{-- Generate Qr code --}}
                <li>
                    <a href="{{ route('QrCode.index') }}">
                        <span> Generate Qr code </span>
                    </a>
                </li>



                {{-- Training --}}
                <li>
                    <a href="#Training" data-bs-toggle="collapse">
                        <span> Training </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="Training">
                        <ul class="nav-second-level">

{{--                            <li>--}}
{{--                                <a href="{{ route('Training.index') }}">Supplier Category</a>--}}
{{--                            </li>--}}

{{--                            <li>--}}
{{--                                <a href="{{ route('supplier_item.index') }}">Service Item</a>--}}
{{--                            </li>--}}

                        </ul>
                    </div>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>
