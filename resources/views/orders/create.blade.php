<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Order - JastipGo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6">➕ Create Order JastipGo</h1>

    <form method="POST" action="/orders">
        @csrf

        <!-- Nama Barang -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Barang</label>
            <input 
                type="text" 
                name="item_name" 
                class="w-full border p-2 rounded" 
                placeholder="Masukkan nama barang"
                required
            >
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Harga</label>
            <input 
                type="number" 
                name="price" 
                class="w-full border p-2 rounded" 
                placeholder="Masukkan harga"
                required
            >
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Deskripsi</label>
            <textarea 
                name="description" 
                class="w-full border p-2 rounded" 
                placeholder="Deskripsi barang"
            ></textarea>
        </div>

        <!-- Button -->
        <button 
            type="submit" 
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
        >
            Simpan Order
        </button>

        <a href="/dashboard" class="ml-3 text-gray-600 hover:underline">
            Kembali
        </a>

    </form>

</div>

</body>
</html>