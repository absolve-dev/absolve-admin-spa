<html>
<head>
  <script src="{{ elixir("js/lib.dist.js") }}"></script>
  <script src="{{ elixir("js/site.dist.js") }}"></script>
  <script src="{{ elixir("js/angular.dist.js") }}"></script>
  <link rel="stylesheet" href="{{ elixir("css/site.css") }}">
</head>
<body>
  <div class="container">
    @yield("content")
  </div>
</body>
</html>
