<html>
<head>
  <script src="{{ elixir("js/lib.js") }}"></script>
  <script src="{{ elixir("js/site.js") }}"></script>
  <script src="{{ elixir("js/angular.dist.js") }}"></script>
  <link rel="stylesheet" href="{{ elixir("css/site.css") }}">
</head>
<body>
  <div class="container">
    @yield("content")
  </div>
</body>
</html>
