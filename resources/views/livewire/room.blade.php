<div class="mb-3">
    <select name="status" class="form-select mb-3" aria-label="Default select example">
        <option value="">Select Room Number</option>
        @foreach ($rooms as $room)
            <option value="{{$room->id}}">{{$room->room_number}}</option>
        @endforeach
    </select>
</div>