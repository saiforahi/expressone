@if ($status == null)
    @if ($logistic_status == '1')
        <span class="text-success">Label Create</span>
    @elseif($logistic_status=='2')
        <span class="text-primary">Pick-up</span>

    @elseif($logistic_status=='3')
        <span class="text-primary">Dispatch Center</span>

    @elseif($logistic_status=='4')
        <span class="text-primary">In Transit</span>

    @elseif($logistic_status=='5')
        <span class="text-primary">Out for delivery</span>

        {{-- multi status --}}
    @elseif($logistic_status=='6')
        <span class="text-success">Delivered</span>
    @elseif($logistic_status=='on-6')
        <span class="text-success">Delivered (init)</span>

    @elseif($logistic_status=='6.5')
        <span class="text-success">Partial delivery</span>
    @elseif($logistic_status=='on-6.5')
        <span class="text-success">Partial delivery (init)</span>

    @elseif($logistic_status=='7')
        <span class="text-warning">Hold</span>
    @elseif($logistic_status=='on-7')
        <span class="text-warning">Hold (init)</span>

    @elseif($logistic_status=='8')
        <span class="text-danger">Return</span>
    @elseif($logistic_status=='on-8')
        <span class="text-danger">Return (init)</span>
    @elseif($logistic_status=='9')
        <span class="text-danger">Return (to merchant)</span>
    @elseif($logistic_status=='10')
        <span class="text-success">Hand over to courier</span>
    @else
        <span class="text-warning">not labeled</span>
    @endif

@elseif($status=='cancelled')
    <span class="text-warning">Cancelled</span>
@elseif($status=='delivered')
    <span class="text-warning">Delivered</span>
    
@endif
