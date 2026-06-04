<!DOCTYPE html>
<html x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/icons/unpas.png') }}" type="image/x-icon">
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <style>
      .cke_notification_warning {
          display: none !important;
      }
   </style>

<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-xl font-bold mb-4">Konfirmasi Password</h2>

    <p class="mb-4 text-sm text-gray-600">
        Demi keamanan, silakan masukkan password kamu untuk melanjutkan.
    </p>

    @if (session('status'))
        <div class="mb-4 text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4">
            <label for="password" class="block font-medium">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full border px-3 py-2 rounded mt-1">
        </div>

        @error('password')
            <div class="text-red-500 text-sm mb-2">{{ $message }}</div>
        @enderror

        <div class="flex justify-between items-center">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                Konfirmasi
            </button>

            <a class="text-sm text-gray-600 hover:underline" href="{{ route('password.request') }}">
                Lupa Password?
            </a>
        </div>
    </form>
</div>
</body>
</html>