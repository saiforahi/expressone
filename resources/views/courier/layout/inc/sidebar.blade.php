<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/courier')}}" class="site_title"><img
                    src="/images/{{basic_information()->company_logo}}"></a>
        </div>
        <div class="clearfix"></div>
        <br/>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ url('/courier')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li><a href="{{ url('/collections')}}"><i class="fa fa-money"></i> Collections</a>
                    </li>
                    <li><a><i class="fa mdi mdi-cube-send"></i> Logistics <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('courierShipments') }}">Pickup</a></li>
                            <li><a href="/courier/agent-dispatch">Delivery Parcels</a></li>
                            {{-- <li><a href="/courier/my-shipments/hold">Hold Deliveries</a></li> --}}
                            <li><a href="/courier/my-shipments/return">Return Deliveries</a></li>

                        </ul>
                    </li>
                    {{-- <li><a><i class="fa mdi mdi-cube-send"></i> Delivered Logistics <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/courier/return-agent-dispatch">Return Deliveries</a></li>
                        </ul>
                    </li>
                     --}}
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
