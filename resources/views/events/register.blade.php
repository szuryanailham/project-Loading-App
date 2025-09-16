<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Event Registration</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-xl p-8">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">Event Registration</h1>

        <form action="{{ route('event.register') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Full Name</label>
                <input type="text" name="name" id="name" 
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                    placeholder="Enter your name" required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" id="email" 
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                    placeholder="Enter your email" required>
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-600">Phone Number</label>
                <input type="text" name="phone" id="phone" 
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" 
                    placeholder="08xxxxxxxx" required>
            </div>

            <!-- Event -->
            <div>
                <label for="event" class="block text-sm font-medium text-gray-600">Choose Event</label>
                <select name="event" id="event" 
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    <option value="">-- Select Event --</option>
                    <option value="seminar">Seminar</option>
                    <option value="workshop">Workshop</option>
                    <option value="konser">Konser Musik</option>
                </select>
            </div>

            <!-- Submit -->
            <div class="pt-4">
                <button type="submit" 
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                    Register Now
                </button>
            </div>
        </form>
    </div>
</body>
</html>
