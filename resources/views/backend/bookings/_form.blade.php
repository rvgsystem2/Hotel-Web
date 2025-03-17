<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="guest_id" class="form-label">Guest</label>
        <select name="guest_id" id="guest_id" class="form-select" required>
            <option value="">Select Guest</option>
            @foreach($guests as $guest)
                <option value="{{ $guest->id }}" {{ (old('guest_id', $booking->guest_id ?? '') == $guest->id) ? 'selected' : '' }}>
                    {{ $guest->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="room_id" class="form-label">Room</label>
        <select name="room_id" id="room_id" class="form-select" required>
            <option value="">Select Room</option>
            @foreach($rooms as $room)
                <option value="{{ $room->id }}" {{ (old('room_id', $booking->room_id ?? '') == $room->id) ? 'selected' : '' }}>
                    {{ $room->room_number }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="check_in_date" class="form-label">Check-In Date</label>
        <input type="date" name="check_in_date" id="check_in_date" class="form-control" value="{{ old('check_in_date', $booking->check_in_date ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="check_out_date" class="form-label">Check-Out Date</label>
        <input type="date" name="check_out_date" id="check_out_date" class="form-control" value="{{ old('check_out_date', $booking->check_out_date ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="total_price" class="form-label">Total Price</label>
        <input type="number" name="total_price" id="total_price" class="form-control" value="{{ old('total_price', $booking->total_price ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">{{ $buttonText }}</button>
</form>
