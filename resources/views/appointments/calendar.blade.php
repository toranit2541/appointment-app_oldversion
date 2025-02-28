<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลรวมชัยประชารักษ์</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">ปฏิทินการจอง</h1>
        <div id="calendar" class="shadow-md p-4 bg-gray-50 rounded-md"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/appointments/events',
                eventClick: function(info) {
                    window.location.href = info.event.url; // Redirect to appointment details
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>
