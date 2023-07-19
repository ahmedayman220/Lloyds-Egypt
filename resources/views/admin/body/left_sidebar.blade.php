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


                {{-- Services Category --}}
                <li>
                    <a href="#services" data-bs-toggle="collapse">
                        <span> Services Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="services">
                        <ul class="nav-second-level">

                            <li>
                                <a href="crm-dashboard.html">Services Category</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Add Services Category</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Edit Services Category</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Service Details --}}
                <li>
                    <a href="#service_details" data-bs-toggle="collapse">
                        <span> Service Details </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="service_details">
                        <ul class="nav-second-level">

                            <li>
                                <a href="crm-dashboard.html">Service Details</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Add Service Details</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Edit Service Details</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Suppliers Category --}}
                <li>
                    <a href="#supliers_category" data-bs-toggle="collapse">
                        <span> Suppliers Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="supliers_category">
                        <ul class="nav-second-level">

                            <li>
                                <a href="crm-dashboard.html">Suppliers Category</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Add Suppliers Category</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Suppliers Details --}}
                <li>
                    <a href="#suppliers_details" data-bs-toggle="collapse">
                        <span> Suppliers Details </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="suppliers_details">
                        <ul class="nav-second-level">

                            <li>
                                <a href="crm-dashboard.html">Suppliers Details</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Add Suppliers Details</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Edit Suppliers Details</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Company --}}
                <li>
                    <a href="#company" data-bs-toggle="collapse">
                        <span> Company </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <div class="collapse" id="company">
                        <ul class="nav-second-level">

                            <li>
                                <a href="crm-dashboard.html">Companies</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Add Company</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Instractor --}}
                <li>
                    <a href="#instructor" data-bs-toggle="collapse">
                        <span> Instractor </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <div class="collapse" id="instructor">
                        <ul class="nav-second-level">

                            <li>
                                <a href="crm-dashboard.html">Instractor</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Add Instractor</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Course --}}
                <li>
                    <a href="#course" data-bs-toggle="collapse">
                        <span> Courses </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <div class="collapse" id="course">
                        <ul class="nav-second-level">

                            <li>
                                <a href="crm-dashboard.html">Course</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Add Course</a>
                            </li>

                        </ul>
                    </div>
                </li>

                {{-- Training --}}
                <li>
                    <a href="#training" data-bs-toggle="collapse">
                        <span> Training </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <div class="collapse" id="training">
                        <ul class="nav-second-level">

                            <li>
                                <a href="crm-dashboard.html">Training</a>
                            </li>

                            <li>
                                <a href="crm-dashboard.html">Add Training</a>
                            </li>

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
