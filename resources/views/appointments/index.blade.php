<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลรวมชัยประชารักษ์</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-6xl mx-auto bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-3xl font-semibold mb-4 text-gray-800">ระบบนัดกายภาพ ออนไลน์</h1>
        <a class="text-sm text-red-500">*** คำแนะนำ ***</a>
        
        <ul class="list-disc pl-6 text-gray-700 mt-2">
            <li>คลีนิกกายภาพบำบัดให้บริการ ทุกวัน เวลา 08:00 น. - 18:00 น.</li>
            <li>สำหรับ ผู้ป่วย ที่ต้องการมารับบริการทางกายภาพบำบัด ต้องติดต่อเวชระเบียนก่อนทุกครั้ง</li>
        </ul>
        <br>
        <a href="{{ route('appointments.create') }}" class="mt-4 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600">
            สมุดการจอง
        </a>

        @if(session('success'))
            <p class="text-green-600 mt-4 text-lg">{{ session('success') }}</p>
            <p class="text-red-600 mt-4 text-lg">*** หมายเหตุ ภ้าต้องการเปลี่ยนแปลงกรุราโทรยกเลิก ก่อนทำการใหม่</p>
        @endif
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
