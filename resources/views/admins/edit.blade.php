<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลรวมชัยประชารักษ์</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">แก้ไขข้อมูลผู้ใช้</h1>

        <form action="{{ route('admins.update', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">คำนำหน้า:</label>
                <input type="text" name="title" value="{{ $user->title }}" required
                    class="w-full px-3 py-2 border rounded">
            </div>

            <div>
                <label class="block font-medium">ชื่อ:</label>
                <input type="text" name="fname" value="{{ $user->fname }}" required
                    class="w-full px-3 py-2 border rounded">
            </div>

            <div>
                <label class="block font-medium">นามสกุล:</label>
                <input type="text" name="lname" value="{{ $user->lname }}" required
                    class="w-full px-3 py-2 border rounded">
            </div>

            <div>
                <label class="block font-medium">เลขบัตรประชาชน:</label>
                <input type="text" name="idcard" value="{{ $user->idcard }}" required
                    class="w-full px-3 py-2 border rounded">
            </div>

            <div>
                <label class="block font-medium">วัน-เดือน-ปี เกิด:</label>
                <input type="date" name="bday" value="{{ $user->bday }}" required
                    class="w-full px-3 py-2 border rounded">
            </div>

            <div>
                <label class="block font-medium">อีเมล:</label>
                <input type="email" name="email" value="{{ $user->email }}" required
                    class="w-full px-3 py-2 border rounded">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                บันทึก
            </button>
        </form>

        <a href="{{ route('admins.index') }}" 
            class="block text-center mt-4 text-gray-600 hover:underline">
            กลับหน้าหลัก
        </a>
    </div>
</body>
</html>
