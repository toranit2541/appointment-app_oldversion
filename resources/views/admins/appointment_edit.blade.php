<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลรวมชัยประชารักษ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>แก้ไขการจอง</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admins.appointments.edit', $appointment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="prefix" class="form-label">คำนำหน้า:</label>
                <input type="text" name="prefix" id="prefix" class="form-control" value="{{ $appointment->prefix }}" required>
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">ชื่อ:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $appointment->first_name }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">นามสกุล:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $appointment->last_name }}" required>
            </div>

            <div class="mb-3">
                <label for="id_card" class="form-label">เลขบัตรประชาชน:</label>
                <input type="text" name="id_card" id="id_card" class="form-control" value="{{ $appointment->id_card }}" required>
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">วัน-เดือน-ปี เกิด:</label>
                <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ $appointment->birthdate }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">อีเมล:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $appointment->email }}" required>
            </div>

            <div class="mb-3">
                <label for="appointment_date" class="form-label">จองวันที่:</label>
                <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\TH:i') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
        </form>

        <a href="{{ route('admins.appointments.index') }}" class="btn btn-secondary mt-3">กลับสู่หน้าหลัก</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
