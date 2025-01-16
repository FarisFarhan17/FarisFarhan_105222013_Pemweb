<script type="text/javascript">
    $(document).ready(function(){
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                right   : 'prev,next',
                center  : 'title', 
                left    : null,
            },
            locale: 'id',
            initialView: 'dayGridMonth',
            events: function(fetchInfo, successCallback, failureCallback) {
                $.ajax({
                    url: '{{ route("event.get-json") }}', 
                    type: 'GET',
                    success: function(data) {
                        successCallback(data); 
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading events:", error);
                        failureCallback(error);
                    }
                });
            }
        });
        calendar.render();
    });
</script>
