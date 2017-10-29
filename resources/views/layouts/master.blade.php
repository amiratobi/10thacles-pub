<!doctype html>
<html lang="en">
  <head>
    @include ('layouts.meta')
  </head>

  <body>
    @include ('layouts.header')

    <div class="container-fluid">
      <div class="row">
        @include ('layouts.nav')
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          @yield ('content')
        </main>
      </div>
    </div>
    @include ('layouts.footer')
    @yield ('scripts')
  </body>
</html>