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
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">สมุดการจองการรับบริการ</h1>


        <h2 class="text-xl font-semibold text-gray-700 mb-4">ปฏิทินการจอง</h2>
        <div id="calendar" class="border p-4 rounded-lg shadow-md bg-gray-50"></div>

        @if($errors->any())
            <ul class="text-red-500 mt-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <a href="{{ route('appointments.index') }}" class="block text-blue-500 mt-6">กลับ</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: '/appointments/events', // Load existing events
                    dateClick: function (info) {
                        // Redirect to createbooking.blade.php with selected date
                        window.location.href = "/appointments/createbooking?date=" + info.dateStr;
                    }
                });
                calendar.render();
            }
        });
    </script>
</body>

</html>