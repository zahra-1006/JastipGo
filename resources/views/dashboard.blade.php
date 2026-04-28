<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JastipGo Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-amber-50">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <div class="w-64 bg-blue-400 text-white p-6">
    <h1 class="text-2xl font-bold mb-8">🚀 JastipGo</h1>

    <ul class="space-y-4">
        <li><a href="/dashboard" class="hover:text-amber-100">📊 Dashboard</a></li>
        <li><a href="/orders/create" class="hover:text-amber-100">➕ Add Order</a></li>
        <li><a href="/settings" class="hover:text-amber-100">⚙️ Settings</a></li>

        <li>
            <form method="POST" action="/logout">
                @csrf
                <button class="hover:text-amber-100 text-left">
                    🚪 Logout
                </button>
            </form>
        </li>
    </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="flex-1 p-8">

        <h1 class="text-3xl font-bold mb-2">
    👋 Welcome, {{ auth()->user()->name }}
</h1>

<p class="text-gray-600 mb-6">
    Selamat datang di JastipGo Dashboard 🚀
</p>

        <!-- CARD STAT -->
        <div class="grid grid-cols-3 gap-4 mb-6">

            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-gray-500">Total Orders</h2>
                <p class="text-2xl font-bold">{{ $orders->count() }}</p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-gray-500">Active</h2>
                <p class="text-2xl font-bold text-green-500">Running</p>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-gray-500">Revenue</h2>
                <p class="text-2xl font-bold">Rp {{ $orders->sum('price') }}</p>
            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white p-4 rounded shadow">

            <h2 class="text-xl font-bold mb-4">📦 Order List</h2>

            <table class="w-full border">

                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border">Nama</th>
                        <th class="p-2 border">Harga</th>
                        <th class="p-2 border">Deskripsi</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                    <tr class="text-center">
                        <td class="p-2 border">{{ $order->item_name }}</td>
                        <td class="p-2 border">Rp {{ $order->price }}</td>
                        <td class="p-2 border">{{ $order->description }}</td>

                        <td class="p-2 border">
                            <a href="/orders/{{ $order->id }}/edit" class="text-blue-500">Edit</a>
                            |
                            <a href="/orders/{{ $order->id }}/delete" class="text-red-500">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>