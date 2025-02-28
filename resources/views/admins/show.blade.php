<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>โรงพยาบาลรวมชัยประชารักษ์</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">User Details</h1>

        @if(isset($user))
            <p class="mb-2"><strong>ID:</strong> {{ $user->id }}</p>
            <p class="mb-2"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="mb-4"><strong>Email:</strong> {{ $user->email }}</p>
        @else
            <p class="text-red-500">User not found.</p>
        @endif

        <a href="{{ route('admins.index') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
           Back to List
        </a>
    </div>
</body>
</html>
