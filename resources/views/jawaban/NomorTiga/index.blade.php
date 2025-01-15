<table class="table table-schedule">
    <thead>
        <tr>
            <th>Event</th>
            <th>Start</th>
            <th>End</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
            <tr>
                <td>{{ $event['event'] }}</td>
                <td>{{ $event['start'] }}</td>
                <td>{{ $event['end'] }}</td>
                <td>
                    <!-- Edit -->
                    <button class="btn btn-warning btn-sm edit-event" data-id="{{ $event['id'] }}" data-toggle="modal" data-target="#editModal">
                        <i class="bi bi-pencil-square"></i>
                    </button>

                    <!-- Delete -->
                    <form action="{{ route('event.delete') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $event['id'] }}">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.update') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="event">Event Name</label>
                    <input type="text" name="event" id="event" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="start">Start Date</label>
                    <input type="date" name="start" id="start" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end">End Date</label>
                    <input type="date" name="end" id="end" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="eventId">
                <button type="submit" class="btn btn-primary">Update Event</button>
            </div>
        </form>
    </div>
</div>
