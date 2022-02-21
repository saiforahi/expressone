<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title">
                <img src="{{ asset('logo') }}/{{ basic_information()->company_logo }}" alt="Logo">
            </a>
        </div>
        <div class="clearfix"></div>
        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('admin-dashboard') }} "><i class="fa fa-dashboard"></i>Dashboard</a>
                    </li>
                    @role('super-admin|admin')
                        <li><a><i class="fa mdi mdi-google-maps"></i>Area Manage<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">

                                <li><a href="{{ route('unit') }}">Unit</a></li>
                                <li><a href="{{ route('point') }}">Point (District)</a></li>
                                <li><a href="{{ route('location') }}">Location (Area)</a></li>

                            </ul>
                        </li>
                        <li><a href="{{ route('shippingCharges') }}"><i class="fa mdi mdi-table"></i>Shipping Charge</a>
                        </li>
                    @endrole
                    <li><a href="{{ route('all-shipments') }}"><i class="fa mdi mdi-export"></i>All shipments</a>
                    </li>

                    {{-- <li><a><i class="fa fa-money"></i> Shipping Price <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if (checkAdminAccess('shipping-price-set') != 0)
                                <li><a href="{{ route('shippingPrice.set') }}">Price rate set</a></li>
                            @endif
                        </ul>
                    </li> --}}
                    <li>
                        <a><i class="fa mdi mdi-cube-send"></i>Logistics<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('AdminShipment.index') }}">Pick-up</a></li>
                            <li><a href="{{ route('AdminShipmentReceived') }}">Receive</a></li>
                            <li><a href="{{ route('AdminShipmentDispatch') }}">In-Transit</a></li>
                            {{-- <li><a href="{{ route('AdminAgentDispatch') }}">Agent Dispatch</a></li> --}}
                            {{-- <li><a href="{{ route('AdminReconcile') }}">Reconcile</a></li> --}}
                            <li><a href="{{ route('AdminDelivery') }}">Delivery</a></li>
                            <li><a href="{{ route('AdminDownload') }}">Download</a></li>
                            {{-- <li><a href="{{ route('AdminUploadCSV') }}">Upload CSV-File</a></li> --}}

                            <?php $units = \DB::table('units')
                                ->where('status', '1')
                                ->get(); ?>
                            @foreach ($units as $unit)
                                @if (Auth::guard('admin')->user()->type == 'admin')
                                    <li><a
                                            href="{{ route('thirdparty-shipments', $unit->id) }}">{{ $unit->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>

                    <li><a><i class="fa mdi mdi-cube-send"></i> Delivered Logistics <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('hold-shipments', 'hold') }}">Hold-parcels</a></li>

                            <li><a href="{{ route('hold-shipments', 'return') }}">Return-parcels</a></li>

                            <li><a href="{{ route('return-dispatch') }}">Dispatch</a></li>
                            {{-- <li><a href="{{ route('merchant-handover') }}">Return Handover</a></li> --}}
                            <li><a href="{{ route('merchant-handover') }}">Merchant Handover</a></li>
                            {{-- <li><a href="{{ route('receive-from-hub') }}">Receive From Hub</a></li>

                            <li><a href="{{ route('hold-shipments', 'partial') }}">Partially delivered</a></li> --}}
                        </ul>
                    </li>
                    <li><a href="{{ route('allPayments') }}"><i class="fa mdi mdi-cash"></i>Payments</a>
                    </li>
                    <li><a href="{{ route('allCourier') }}"><i class="fa mdi mdi-truck-fast"></i>Couriers</a>
                    </li>

                    <li><a href="{{ route('merchant.list') }}"><i class="fa mdi mdi-account-multiple-plus"></i>
                            Merchant List</a></li>

                    @if (Auth::guard('admin')->user()->hasRole('super-admin'))
                        <li>
                            <a><i class="fa mdi mdi-account"></i>Employee Manage<span
                                    class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{ route('admin-list') }}">Employee List</a></li>
                                {{-- <li><a href="{{ route('role-assign') }}">Role Assign</a></li> --}}
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a><i class="fa mdi mdi-cube-send"></i> Reports <span class="fa fa-paper"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Type A</a></li>

                            <li><a href="#">Type B</a></li>

                            <li><a href="#">Type C</a></li>
                            {{-- <li><a href="{{ route('merchant-handover') }}">Return Handover</a></li> --}}
                            <li><a href="#">Type D</a></li>
                            
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i> Website Management <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('basic-information') }}">Basic Information</a></li>

                            <li><a href="/admin/sliders">Slider Manage</a></li>

                            <li><a href="{{ route('adminAbout') }}">About Us page</a></li>

                            <li><a href="{{ route('adminMission') }}">Mission page</a></li>

                            <li><a href="{{ route('adminVision') }}">Vision page</a></li>

                            <li><a href="{{ route('adminPromise') }}">Our Promise page</a></li>

                            <li><a href="{{ route('adminHistory') }}">Company History page</a></li>

                            <li><a href="{{ route('adminTeam') }}">Management Team page</a></li>
                            <li><a href="{{ route('adminClientReview') }}">Client Reviews</a></li>
                            <li><a href="{{ route('contact-messages') }} ">Contact Messages</a></li>

                            <li><a> Blogs <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none;">
                                    <li><a href="{{ route('AdminBlog') }} ">Blog Posts</a> </li>
                                    <li><a href="{{ route('blog-category') }}">Blog Category</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('mail-setup') }}"><i class="fa mdi mdi-email-open"></i> Mail SetUp</a>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</div>
