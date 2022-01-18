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
                        <li><a href="{{ route('all-shipments') }}"><i class="fa mdi mdi-export"></i>All shipments</a>
                        </li>
                    @endrole
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

                            <li><a href="{{ route('AdminShipmentDispatch') }}">Dispatch</a></li>
                            <li><a href="{{ route('AdminAgentDispatch') }}">Agent Dispatch</a></li>
                            <li><a href="{{ route('AdminReconcile') }}">Reconcile</a></li>
                            <li><a href="{{ route('AdminDelivery') }}">Delivery</a></li>
                            <li><a href="{{ route('AdminDownload') }}">Download</a></li>
                            <li><a href="{{ route('AdminUploadCSV') }}">Upload CSV-File</a></li>

                            {{-- <?php $units = \DB::table('units')
                                ->where('status', '1')
                                ->get(); ?>
                            @foreach ($units as $unit)
                                @if (Auth::guard('admin')->user()->type == 'admin')
                                    <li><a
                                            href="{{ route('thirdparty-shipments', $unit->id) }}">{{ $unit->name }}</a>
                                    </li>
                                @endif
                            @endforeach --}}
                        </ul>
                    </li>

                    <li><a><i class="fa mdi mdi-cube-send"></i> Delivered Logistics <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if (checkAdminAccess('hold-shipments') != 0)
                                <li><a href="{{ route('hold-shipments', 'hold') }}">Hold-parcels</a></li>
                            @endif

                            @if (checkAdminAccess('hold-shipments') != 0)
                                <li><a href="{{ route('hold-shipments', 'return') }}">Return-parcels</a></li>
                            @endif

                            @if (checkAdminAccess('return-dispatch') != 0)
                                <li><a href="{{ route('return-dispatch') }}">Dispatch</a></li>
                            @endif

                            @if (checkAdminAccess('return-merchant-handover') != 0)
                                <li><a href="{{ route('merchant-handover') }}">Merchant Handover</a></li>
                            @endif
                            {{-- <li><a href="{{route('return-agent-dispatch')}}">Agent Dispatch</a></li> --}}

                            @if (checkAdminAccess('receive-from-hub') != 0)
                                <li><a href="{{ route('receive-from-hub') }}">Receive From Hub</a></li>
                            @endif

                            @if (checkAdminAccess('hold-shipments') != 0)
                                <li><a href="{{ route('hold-shipments', 'partial') }}">Partially delivered</a></li>
                            @endif
                        </ul>
                    </li>

                    <li><a href="{{ route('driver-list.index') }} "><i class="fa mdi mdi-truck-fast"></i> Riders</a>
                    </li>

                    @if (Auth::guard('admin')->user()->hasRole('super-admin'))
                        <li><a href="{{ route('merchant.list') }}"><i class="fa mdi mdi-account-multiple-plus"></i>
                                Merchant List</a></li>
                    @endif

                    <li>
                        <a><i class="fa mdi mdi-account"></i> Employee Manage<span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if (checkAdminAccess('admin-list') != 0)
                                <li><a href="{{ route('admin-list') }}">Employee List</a></li>
                            @endif
                            @if (checkAdminAccess('role-assign') != 0)
                                <li><a href="{{ route('role-assign') }}">Role Assign</a></li>
                            @endif
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i> Website Management <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            @if (checkAdminAccess('basic-information') != 0)
                                <li><a href="{{ route('basic-information') }}">Basic Information</a></li>
                            @endif

                            @if (checkAdminAccess('sliders') != 0)
                                <li><a href="/admin/sliders">Slider Manage</a></li>
                            @endif

                            @if (checkAdminAccess('about-us') != 0)
                                <li><a href="{{ route('adminAbout') }}">About Us page</a></li>
                            @endif

                            @if (checkAdminAccess('mission') != 0)
                                <li><a href="{{ route('adminMission') }}">Mission page</a></li>
                            @endif

                            @if (checkAdminAccess('vision') != 0)
                                <li><a href="{{ route('adminVision') }}">Vision page</a></li>
                            @endif

                            @if (checkAdminAccess('promise') != 0)
                                <li><a href="{{ route('adminPromise') }}">Our Promise page</a></li>
                            @endif

                            @if (checkAdminAccess('history') != 0)
                                <li><a href="{{ route('adminHistory') }}">Company History page</a></li>
                            @endif

                            @if (checkAdminAccess('team') != 0)
                                <li><a href="{{ route('adminTeam') }}">Management Team page</a></li>
                            @endif

                            @if (checkAdminAccess('client-reviews') != 0)
                                <li><a href="{{ route('adminClientReview') }}">Client Reviews</a></li>
                            @endif

                            @if (checkAdminAccess('messages') != 0)
                                <li><a href="{{ route('contact-messages') }} ">Contact Messages</a></li>
                            @endif

                            <li><a> Blogs <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none;">
                                    @if (checkAdminAccess('blog/index') != 0)
                                        <li><a href="{{ route('AdminBlog') }} ">Blog Posts</a> </li>
                                    @endif

                                    @if (checkAdminAccess('blog/category') != 0)
                                        <li><a href="{{ route('blog-category') }}">Blog Category</a> </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </li>

                    @if (checkAdminAccess('set-mail-info') != 0)
                        <li><a href="{{ route('mail-setup') }}"><i class="fa mdi mdi-email-open"></i> Mail SetUp</a>
                        </li>
                    @endif
                    {{-- <li class="text-danger">
                        <a href="javascript:;"><i class="fa mdi mdi-power"></i> Logout</a>

                    </li> --}}

                </ul>
            </div>

        </div>

    </div>
</div>
