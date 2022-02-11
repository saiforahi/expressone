<div class="row">
    @if($shipment !=null) <br>
    <div class="col-md-12 text-center">
        <div class="col-md-2 col-sm-3 col-xs-6">
            <div class="labelIn @if($shipment->logistic_status>='1')activeLabel @endif">
                <i class="fa fa-calendar-check-o fa-3x"></i> <br>
                Label Created
            </div>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
            <div class="labelIn @if($shipment->logistic_status>='4')activeLabel @endif">
                <i class="fa fa-archive fa-3x"></i> <br>
                PickUp
            </div>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
            <div class="labelIn @if($shipment->logistic_status>='6')activeLabel @endif">
                <i class="fa fa-cube fa-3x"></i> <br>
                Dispatch Center
            </div>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
            <div class="labelIn @if($shipment->logistic_status>='7')activeLabel @endif">
                <i class="fa fa-truck fa-3x"></i> <br>
               In Transit
            </div>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
            <div class="labelIn @if($shipment->logistic_status>='9')activeLabel @endif">
                <i class="fa fa-car fa-3x"></i> <br>
               Out for delivery
            </div>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
            <div class="labelIn @if($shipment->logistic_status>='10')activeLabel @endif">
               
                @if($shipment->logistic_status=='10')
                     <i class="fa fa-check-square-o fa-3x text-success"></i> <br>
                    <span class="text-success">Delivered</span>
                @elseif($shipment->logistic_status=='11')
                     <i class="fa fa-check-square-o fa-3x text-success"></i> <br>
                    <span class="text-success">Delivery confirmed</span>
                
                @elseif($shipment->logistic_status=='12' || $shipment->logistic_status=='13')
                     <i class="fa fa-check-square-o fa-3x text-warning"></i> <br>
                    <span class="text-success">On Hold</span>
                @elseif(in_array($shipment->logistic_status,['14','15','16','17','18','19']))
                    <i class="fa fa-check-square-o fa-3x text-danger"></i> <br>
                    <span class="text-success">Returned</span>

                @elseif($shipment->logistic_status=='20')
                    <i class="fa fa-check-square-o fa-3x text-warning"></i> <br>
                    <span class="text-warning">Hold</span>
                @elseif($shipment->logistic_status=='on-7')
                    <i class="fa fa-check-square-o fa-3x text-warning"></i> <br>
                    <span class="text-warning">Hold  (init)</span>
                
                @elseif($shipment->logistic_status=='8')
                    <i class="fa fa-check-square-o fa-3x text-danger"></i> <br>
                    <span class="text-danger">Return</span>
                @elseif($shipment->logistic_status=='on-8')
                    <i class="fa fa-check-square-o fa-3x text-danger"></i> <br>
                    <span class="text-danger">Return</span>
                
                @elseif($shipment->logistic_status=='9')
                    <i class="fa fa-check-square-o fa-3x text-danger"></i> <br>
                    <span class="text-danger">Return </span>
                @else 
                    <i class="fa fa-check-square-o fa-3x text-info"></i> <br>Delivery
                @endif
            </div>
        </div>
    </div> 
    <div class="col-md-12"><br><hr></div>

    <div class="col-md-7 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s">
        {{-- <center><img style="max-height:180px" src="/images/{{basic_information()->company_logo}}"></center> --}}
        <div class="alert alert-info">
            Dear <b>{{$shipment->name}}</b>,<br>
            item(s) from your order #{{$shipment->invoice_id}} is now in @include('includes.shipment-status',['status'=>$shipment->status,'logistic_status'=>$shipment->logistic_status]) stage. <br><br>
            You can track your order progreess anytime from anywhere. <br>Please keep tracking your order and let me know if you face any sort of trouble or have any askings</div>
    </div>
    <div class="col-md-5 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s">
        <div class="prod-info white-clr">
            <ul>
                <li> <span class="title-2">Customer Name:</span> <span class="fs-16">{{$shipment->recipient['name']}}</span> </li>
                <li> <span class="title-2">Invoice id:</span> <span class="fs-16">{{$shipment->invoice_id}}</span> </li>
                <li> <span class="title-2">order date:</span> <span class="fs-16">{{date('F d, Y',strtotime($shipment->created_at))}}</span> </li>
                <li> <span class="title-2">order status:</span> <span class="fs-16 theme-clr">@include('includes.shipment-status',['status'=>$shipment->status,'logistic_status'=>$shipment->logistic_step->step_name])</span> </li>
                <li> <span class="title-2">Weight (kg):</span> <span class="fs-16">{{$shipment->weight}} KG</span> </li>
                <li> <span class="title-2">order type:</span> <span class="fs-16">{{ucfirst($shipment->service_type)}}</span> </li>
            </ul>
        </div>
    </div>
    @else
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible fa-3x">
            <i class="fa fa-frown-o"></i> No match found with given code
             <button type="button" style="margin-top:11px" class="btn btn-danger pull-right" data-dismiss="alert" aria-label="close">X</button>
        </div>
    </div>
    @endif
</div>

<style type="text/css" scoped="">
    .labelIn {
        width: 72%; margin: 0px auto;
        border: 1px solid silver; border-radius: 60%;
        height: 112px; padding-top: 18px;
    }
    .activeLabel{border: 1px solid green;color:green;}
</style>