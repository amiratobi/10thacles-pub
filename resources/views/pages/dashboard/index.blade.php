@extends ('layouts.master')

@section ('content')

  <div class="d-flex flex-row justify-content-center">
    <p>
      <a href="/dashboard?range=yesterday" class="dash-range-link" id="range-yesterday">Yesterday </a> |
      <a href="/dashboard?range=today" class="dash-range-link" id="range-today"> Today </a> |
      <a href="/dashboard?range=month" class="dash-range-link" id="range-month"> This Month </a> |
      <a href="/dashboard?range=all" class="dash-range-link" id="range-all"> All Time </a> 
    </p>
  </div>

  @include ('pages.dashboard.panels')

  @include ('pages.dashboard.table')


@endsection

@section ('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
        var myPath = window.location.search;
        if (myPath.indexOf('yesterday') != -1)
        {
          $('.dash-range-link').removeClass('text-dark');
          $('#range-yesterday').addClass('text-dark font-weight-bold');
        }
        else if (myPath.indexOf('month') != -1)
        {
          $('.dash-range-link').removeClass('text-dark');
          $('#range-month').addClass('text-dark font-weight-bold');
        }
        else if (myPath.indexOf('all') != -1)
        {
          $('.dash-range-link').removeClass('text-dark');
          $('#range-all').addClass('text-dark font-weight-bold');
        }
        else
        {
          $('.dash-range-link').removeClass('text-dark');
          $('#range-today').addClass('text-dark font-weight-bold');
        }

        $('.nav-link').removeClass('active');
        $('#dashboard-navlink').addClass('active');
        $('#myTable').DataTable();
    });
  </script>
@endsection