@if ($status == null)
    @if ($logistic_status == '1')
        <span class="text-success">Label Create</span>
    @elseif($logistic_status=='2')
        <span class="text-primary">Approval</span>

    @elseif($logistic_status=='3')
        <span class="text-primary">Courier Assigned</span>

    @elseif($logistic_status=='4')
        <span class="text-primary">Courier Picked</span>

    @elseif($logistic_status=='5')
        <span class="text-primary">Unit Received</span>

    @elseif($logistic_status=='6')
        <span class="text-success">Unit Received (Sorted)</span>
    
    @elseif($logistic_status=='7')
        <span class="text-warning">To Delivery Unit</span>

    @elseif($logistic_status=='8')
        <span class="text-primary">Reached Delivery Unit</span>
    @elseif($logistic_status=='9')
        <span class="text-danger">Out for Delivery</span>
    @elseif($logistic_status=='10')
        <span class="text-danger">Return (to merchant)</span>
    @elseif($logistic_status=='11')
        <span class="text-success">Hand over to courier</span>
    @else
        <span class="text-warning">not labeled</span>
    @endif

@elseif($status=='cancelled')
    <span class="text-warning">Cancelled</span>
@elseif($status=='delivered')
    <span class="text-warning">Delivered</span>
    
@endif
