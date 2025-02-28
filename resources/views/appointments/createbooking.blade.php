<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>โรงพยาบาลรวมชัยประชารักษ์</title>
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 p-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">จองการรับบริการ</h2>
            <form id="appointmentForm" action="{{ route('appointments.store') }}" method="POST" class="flex flex-col space-y-4">
                @csrf
                <div class="flex flex-col">
                    <label class="block text-gray-700">คำนำหน้า</label>
                    <select name="prefix" required class="w-full border-gray-300 rounded-lg p-2">
                        <option value="">-- เลือกคำนำหน้า --</option>
                        <option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>
                        <option value="ดร.">ดร.</option>
                        <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Miss.">Miss.</option>
                    </select>
                </div>                
                <div class='flex flex-col'>
                    <label class="block text-gray-700">ชื่อ</label>
                    <input type="text" name="first_name" required class="w-full border-gray-300 rounded-lg p-2">
                </div>
                <div class='flex flex-col'>
                    <label class="block text-gray-700">นามสกุล</label>
                    <input type="text" name="last_name" required class="w-full border-gray-300 rounded-lg p-2">
                </div>
                <div class='flex flex-col'>
                    <label class="block text-gray-700">เลขบัตรประชาชน</label>
                    <input type="text" name="id_card" required class="w-full border-gray-300 rounded-lg p-2">
                </div>
                <div class='flex flex-col'>
                    <label class="block text-gray-700">วัน-เดือน-ปี เกิด</label>
                    <input type="date" name="birthdate" required class="w-full border-gray-300 rounded-lg p-2">
                </div>
                <div class='flex flex-col'>
                    <label class="block text-gray-700">อีเมล</label>
                    <input type="email" name="email" required class="w-full border-gray-300 rounded-lg p-2">
                </div>
                <div class='flex flex-col'>
                    <label class="block text-gray-700">จองวันที่</label>
                    <input type="datetime-local" id="appointmentDateInput" name="appointment_date" required
                        class="w-full border-gray-300 rounded-lg p-2">
                </div>
                <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                    จอง
                </button>
            </form>
            <a href="{{ route('appointments.index') }}" class="block text-blue-500 mt-6">กลับ</a>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Get the selected date from URL
                const urlParams = new URLSearchParams(window.location.search);
                const selectedDate = urlParams.get("date");

                if (selectedDate) {
                    // Set the selected date in the date input
                    document.getElementById("appointmentDateInput").value = selectedDate + "T09:00";
                }
            });
        </script>
    </body>
</html>
