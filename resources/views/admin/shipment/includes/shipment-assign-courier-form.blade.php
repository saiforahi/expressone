<select class="form-control" name="courier_id" required="">
    <option value="">Choose Courier</option>
    @foreach ($couriers as $courier)
        <option value="{{ $courier->id }}">{{ $courier->first_name . ' ' . $courier->last_name }} ({{ $courier->phone }})
        </option>
    @endforeach
</select>
<br>
<textarea class="form-control" rows="5" placeholder="Type notes (if any)" name="note"></textarea>
