<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-xl font-bold mb-4">✏️ Edit Order</h1>

    <form method="POST" action="/orders/{{ $order->id }}/update">
        @csrf

        <input type="text" name="item_name" value="{{ $order->item_name }}" class="w-full border p-2 mb-3">

        <input type="number" name="price" value="{{ $order->price }}" class="w-full border p-2 mb-3">

        <textarea name="description" class="w-full border p-2 mb-3">{{ $order->description }}</textarea>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

</body>
</html>