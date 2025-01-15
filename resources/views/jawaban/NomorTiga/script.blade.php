<script type="text/javascript">
    $('.table-schedule').DataTable({
        language: {
            paginate: {
                next: '<i class="bi bi-arrow-right"></i>',
                previous: '<i class="bi bi-arrow-left"></i>'
            },
            emptyTable: "Data tidak ditemukan",
        },
    });
    $('.edit-btn').on('click', function() {
        var eventId = $(this).data('id');

        $.get('/event/get-selected-data', { id: eventId }, function(data) {
            $('#editModal input[name="event"]').val(data.event);
            $('#editModal input[name="start"]').val(data.start);
            $('#editModal input[name="end"]').val(data.end);
            $('#editModal form').attr('action', '/event/update'); 
        });
    });

	$('.edit-event').on('click', function() {
        const eventId = $(this).data('id');
        
        $.ajax({
            url: '{{ route("event.get-selected-data") }}',
            method: 'GET',
            data: { id: eventId },
            success: function(data) {
                $('#event').val(data.event);
                $('#start').val(data.start);
                $('#end').val(data.end);
                $('#eventId').val(data.id);
            }
        });
    });
</script>
