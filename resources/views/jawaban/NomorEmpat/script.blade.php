<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: '{{ route("event.get-json") }}', // Use Blade syntax to output the route URL
            type: 'GET',
            success: function(data) {
                $('#calendar').fullCalendar({
                    events: data,
                    eventRender: function(event, element) {
                        element.attr('title', 'User ID: ' + event.user);
                        element.css('background-color', event.color);
                    },
                    editable: true,
                    droppable: true,
                });
            },
            error: function(xhr, status, error) {
                console.log("Error loading events:", error);
            }
        });
    });
</script>
