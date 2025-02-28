<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลรวมชัยประชารักษ์</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-lg">

        <h1 class="text-3xl font-bold text-gray-800 mb-4">การจองทั้งหมด</h1>
        <a href="{{ route('appointments.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            สมุดการจอง
        </a>

        {{-- <a href="{{ route('admins.appointments') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
            สมุดการจอง
        </a> --}}

        @if(session('success'))
            <p class="text-green-600">{{ session('success') }}</p>
        @endif

        <table class="table-auto w-full border-collapse border border-gray-400 mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">ลำดับ</th>
                    <th class="border border-gray-300 px-4 py-2">ชื่อ</th>
                    <th class="border border-gray-300 px-4 py-2">อีเมล</th>
                    <th class="border border-gray-300 px-4 py-2">วันที่จอง</th>
                    <th class="border border-gray-300 px-4 py-2">สร้างวันที่</th>
                    <th class="border border-gray-300 px-4 py-2">อื่นๆ</th>
                    <th class="border border-gray-300 px-4 py-2">ยีนยัน</th>

                </tr>
            </thead>
            <tbody>
                @forelse($pendingAppointments as $appointment)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $appointment->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $appointment->prefix }} {{ $appointment->first_name }} {{ $appointment->last_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $appointment->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $appointment->created_at->format('Y-m-d H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('admins.appointments.show', $appointment->id) }}" class="text-blue-500 hover:text-blue-700">ตรวจสอบ</a> |
                            <a href="{{ route('admins.appointments.edit', $appointment->id) }}" class="text-yellow-500 hover:text-yellow-700">แก้ไข</a> |
                            <form action="{{ route('admins.appointments.destroy', $appointment->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">ลบ</button>
                            </form>
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{ route('admins.appointments.approve', $appointment->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">อนุมัติ</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">ไม่มีการจองที่รออนุมัติ.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <h1 class="text-2xl font-bold text-gray-800 mt-6">approved</h1>
        {{-- when admin approve user will show in this table --}}
        <table class="table-auto w-full border-collapse border border-gray-400 mt-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">ลำดับ</th>
                    <th class="border border-gray-300 px-4 py-2">ชื่อ</th>
                    <th class="border border-gray-300 px-4 py-2">อีเมล</th>
                    <th class="border border-gray-300 px-4 py-2">วันที่จอง</th>
                    <th class="border border-gray-300 px-4 py-2">สร้างวันที่</th>
                    <th class="border border-gray-300 px-4 py-2">อื่นๆ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($approvedAppointments as $appointment)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $appointment->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $appointment->prefix }} {{ $appointment->first_name }} {{ $appointment->last_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $appointment->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $appointment->created_at->format('Y-m-d H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('admins.appointments.show', $appointment->id) }}" class="text-blue-500 hover:text-blue-700">ตรวจสอบ</a> |
                            <a href="{{ route('admins.appointments.edit', $appointment->id) }}" class="text-yellow-500 hover:text-yellow-700">แก้ไข</a> |
                            <form action="{{ route('admins.appointments.destroy', $appointment->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">ลบ</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">ไม่มีการจองที่อนุมัติ.</td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>

        <div class="mt-4">
            <a href="{{ route('admins.appointments.export') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Export CSV</a>
        </div>

        <h1 class="text-2xl font-bold text-gray-800 mt-6">ปฏิทินการจอง</h1>
        <div id="calendar" class="mt-4"></div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: '/appointments/events', // This will be your Laravel route returning JSON
                });
                calendar.render();
            });
        </script>

        <div class="mt-4">
            <a href="{{ route('admins.index') }}" class="text-blue-500 hover:text-blue-700">กลับหน้าหลัก</a>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
