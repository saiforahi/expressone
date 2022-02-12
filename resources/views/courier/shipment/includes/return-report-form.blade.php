<form method="post" id="reportSubmit" action="{{route('shipment-delivery')}}">@csrf
    <div class="form-group row">
        <label class="col-md-3 col-sm-3  control-label"> <br/> Please check the return delivery report status & submit</label>
        <div class="col-md-9 col-sm-9 ">
            <div class="checkbox">
               <div class="radio">
                    <label class="text-warning">
                        <input disabled type="radio" required="" value="hold" id="optionsRadios1" name="status"> On Hold - (if customer did not receive)
                    </label>
                </div>
                <div class="radio">
                    <label class="text-success">
                        <input disabled type="radio" required="" value="delivered" id="optionsRadios2" name="status"> Cash collected - (if customer receive)
                    </label>
                </div>
                <div class="radio">
                    <label class="text-info">
                        <input disabled type="radio" required="" value="partial" id="optionsRadios3" name="status">  Partial Delivery - (if customer receive partial)
                    </label>
                </div>
                <div class="radio">
                    <label class="text-danger">
                        <input type="radio" checked required="" value="return-to-merchant" id="optionsRadios3" name="status">  Return Delivery
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row pirceArea" style="display:none">
        <label class="col-md-3 col-sm-3  control-label">Customer given price</label>
        <div class="col-md-9 col-sm-9 ">
            <input type="number" class="form-control" name="price"/>
        </div>
    </div>
    
    <div class="form-group row otpArea" style="display:block">
        <label class="col-md-3 col-sm-3  control-label"> <br> Send OTP to</label>
        <div class="col-md-9 col-sm-9 ">
            <div class="checkbox">
                <div class="radio">
                     <label class="text-warning">
                         <input disabled type="radio" value="recipient" id="otp1" name="otp"> OTP to Recipient
                     </label>
                 </div>
                 <div class="radio">
                     <label class="text-success">
                         <input type="radio" checked="true" value="merchant" id="otp2" name="otp">OTP to Merchant
                     </label>
                 </div>
             </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-sm-3  control-label"> <br/>  <br/> Courier Note (if any)</label>
        <div class="col-md-9 col-sm-9 ">
            <textarea class="form-control" name="driver_note" rows="5"></textarea>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:1em">
        <input type="hidden" name="id"> 
        <input type="hidden" name="price">
        <div class="row">
            <div class="result"></div>
            <button class="btn btn-sm btn-info pull-right" type="submit"><i class="fa fa-send"></i> Submit Report</button>
        </div>
    </div>
</form>