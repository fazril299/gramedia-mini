<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ebook App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.5.1/dist/css/tabler.min.css" />
      {{-- Font awsome --}}
      {{-- Font Awesome --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
      {{-- Google Fonts - Roboto Condensed (Marvel style typography) --}}
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;0,800;0,900;1,700&display=swap" rel="stylesheet">
      <style>
          html {
              scrollbar-color: #e62429 #111111;
              scrollbar-width: thin;
          }
          ::-webkit-scrollbar {
              width: 8px;
          }
          ::-webkit-scrollbar-track {
              background: #111111;
          }
          ::-webkit-scrollbar-thumb {
              background: #e62429;
          }
          ::-webkit-scrollbar-thumb:hover {
              background: #b51a1e;
          }
      </style>
</head>
<body>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.5.1/dist/js/tabler.min.js"></script>
</body>
</html>