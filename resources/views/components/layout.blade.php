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


    
    {{-- <link rel="stylesheet" href="./assets/css/tailwind.output.css" /> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="/assets/js/init-alpine1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Tambahkan di <head> -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Tambahkan sebelum </body> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  

  </head>
  <body>
    <div
    class="flex bg-slate-200 relative  "
    :class="{ 'overflow-hidden': isSideMenuOpen }"
  >
  
        <x-navbar></x-navbar>
      
      <div class="flex flex-col flex-1 w-full min-h-screen">
          <x-header></x-header>
          <main>
            <div class="relative z-10">
              {{ $slot }}
            </div>
          </main>          
      </div>

    </div>


    
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    {{-- view Post --}}
    <script>
        CKEDITOR.replace('resume', {
          height: 100,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Image', 'Table'] },
            { name: 'styles', items: ['Format'] },
            { name: 'tools', items: ['Maximize'] }
        ],
    });
    </script>   
    <script>
        CKEDITOR.replace('content', {
          height: 150,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Image', 'Table'] },
            { name: 'styles', items: ['Format'] },
            { name: 'tools', items: ['Maximize'] }
        ],
    });
    </script>   

    {{-- view Identity --}}
    <script>
        CKEDITOR.replace('meta', {
          height: 150,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Image', 'Table'] },
            { name: 'styles', items: ['Format'] },
            { name: 'tools', items: ['Maximize'] }
        ],
    });
    </script>   
    <script>
        CKEDITOR.replace('adress', {
          height: 70,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Image', 'Table'] },
            { name: 'styles', items: ['Format'] },
            { name: 'tools', items: ['Maximize'] }
        ],
    });
    </script> 
  
    {{-- view sideBanner --}}
      <script>
        CKEDITOR.replace('description', {
          height: 70,
        toolbar: [
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
            { name: 'insert', items: ['Image', 'Table'] },
            { name: 'styles', items: ['Format'] },
            { name: 'tools', items: ['Maximize'] }
        ],
    });
    </script>
    
    {{-- view partner --}}
    <script>
      CKEDITOR.replace('detail', {
        height: 70,
      toolbar: [
          { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
          { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
          { name: 'insert', items: ['Image', 'Table'] },
          { name: 'styles', items: ['Format'] },
          { name: 'tools', items: ['Maximize'] }
      ],
  });
  </script>
   
   @if (session('success'))
   <script>
       Swal.fire({
       icon: 'success',
       title: 'Berhasil!',
       text: '{{ session('success') }}',
       confirmButtonText: 'OK',
       customClass: {
           confirmButton: 'bg-[#5676ff] text-white px-4 py-2 rounded hover:bg-green-700'
       },
       buttonsStyling: false // penting agar Tailwind tidak tertimpa
   });
   </script>
    @endif
   <!-- Menampilkan SweetAlert jika ada session 'success' -->
   @if (session('error'))
   <script>
       Swal.fire({
       icon: 'error',
       title: 'Berhasil!',
       text: '{{ session('error') }}',
       confirmButtonText: 'OK',
       customClass: {
           confirmButton: 'bg-[#5676ff] text-white px-4 py-2 rounded hover:bg-green-700'
       },
       buttonsStyling: false // penting agar Tailwind tidak tertimpa
   });
   </script>
   @endif
  
  </body>
  </html>