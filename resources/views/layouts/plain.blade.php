<!doctype html>
<html lang="en">
  <head>
    @include ('layouts.meta')
  </head>

  <body style="background: grey">

    <div class="container-fluid">
      <div class="row">
        @yield ('content')
      </div>
    </div>
    @include ('layouts.footer')
    @yield ('scripts')
  </body>
</html>