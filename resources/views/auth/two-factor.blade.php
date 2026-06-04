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
  </head>
  <body class="bg-gray-100 font-sans antialiased">
    <form method="POST" action="{{ route('two-factor.verify') }}" class="user">
      @csrf
      <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
        <h2 class="text-xl font-bold mb-4">Two-Factor Authentication</h2>
        <p class="mb-4 text-sm text-gray-600">
          Masukkan kode verifikasi yang telah dikirimkan ke email Anda.
        </p>

        @if (session('status'))
          <div class="mb-4 text-green-600">
            {{ session('status') }}
          </div>
        @endif

        @if ($errors->any())
          <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside text-sm">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <label for="code" class="block font-semibold text-sm mb-1">Kode Verifikasi</label>
        <input
          type="text"
          id="code"
          name="code"
          required
          autofocus
          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        />

        <button
          type="submit"
          class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
        >
          Verifikasi
        </button>
      </div>
    </form>
  </body>
</html>
