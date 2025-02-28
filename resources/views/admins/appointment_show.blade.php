<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลรวมชัยประชารักษ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>รายละเอียดการจอง</h1>

        <div class="card mt-3">
            <div class="card-body">
                <p><strong>คำนำหน้า:</strong> {{ $appointment->prefix }}</p>
                <p><strong>ชื่อ:</strong> {{ $appointment->first_name }}</p>
                <p><strong>นามสกุล:</strong> {{ $appointment->last_name }}</p>
                <p><strong>เลขบัตรประชาชน:</strong> {{ $appointment->id_card }}</p>
                <p><strong>วัน-เดือน-ปี เกิด:</strong> {{ \Carbon\Carbon::parse($appointment->birthdate)->format('d/m/Y') }}</p>
                <p><strong>อีเมล:</strong> {{ $appointment->email }}</p>
                <p><strong>จองวันที่:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <a href="{{ route('admins.appointments.index') }}" class="btn btn-secondary mt-3">กลับสู่หน้าการจอง</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
