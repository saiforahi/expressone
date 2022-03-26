<div class="row">
    <div class="col-md-12">
        <h5>Apply Filters</h5>
    </div>
</div>
<div class="row" style="border-block-end-color: black">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <select class="form-control select2" name="hub_id" id="hub_id" onchange="get_hub()">
                    <option value="">Search By Unit</option>
                    @foreach($units as $hub)
                    <option @if(request()->hub_id==$hub->id)selected @endif value="{{$hub->id}}">{{$hub->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px !important">
            <div class="col-md-12">
                <select class="form-control select2" name="area_id" id="area_id" onchange="get_area()">
                    <option value="">Search By Area/Location</option>
                    @foreach($locations as $area)
                    <option @if(request()->area_id==$area->id)selected @endif value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px !important">
            <div class="col-md-12">
                <input style="padding:18px;" type="text" class="form-control" id="invoice_id" name="invoice_id" placeholder="Type Invoice ID/s" value="{{request()->invoice_id}}" >
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <input style="padding:18px;" class="form-control" type="search" name="phone" placeholder="Customer phone" value="{{request()->phone}}" />
            </div>
        </div>
        <div class="row" style="margin-top: 10px !important">
            <div class="col-md-12">
                <select class="form-control select2" name="merchant_id" id="merchant_id" onchange="get_merchant()">
                    <option value="">Search By merchant</option>
                    @foreach($users as $user)
                    <option @if(request()->merchant_id==$user->id)selected @endif value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px !important">
            <div class="col-md-12">
                @php $drivers = \App\Models\Courier::where('status','1')->get(); @endphp
                <select class="form-control select2" name="courier_id" onchange="get_driver()">
                    <option value="">Search By Courier</option>
                    @foreach($drivers as $driver)
                    <option @if(request()->courier_id==$driver->id)selected @endif  value="{{$driver->id}}">{{$driver->first_name}} {{$driver->last_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    </div>
    <div class="col-md-4">
        {{-- <div class="row">
            <div class="col-md-12">
                <select class="form-control select2" name="status" id="status" onchange="get_status()">
                    <option value="">Status</option>
                    @foreach (\App\Models\LogisticStep::orderBy('id','ASC')->get() as $item)
                        <option value="{{$item->id}}">{{$item->step_name}}</option>    
                    @endforeach
                </select>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-6">
                <label>From</label>
                <input class="form-control" type="date" name="date1" placeholder="date from" id="datepicker" value="{{request()->date1}}">
            </div>
            <div class="col-md-6">
                <label>To</label>
                <input  class="form-control" type="date" name="date2" placeholder="date to" onchange="get_dates()"
                value="{{request()->date2}}">
            </div>
        </div>
    </div>
</div>
<br/>
 <br/>
