<h2 class="text-center">Summary By Divisions</h2>
<div class="table-responsive">
  <table class="table table-sm" id="myTable">
    <thead class="bg-dark text-light">
      <tr class="">
        <th rowspan="2">#</th>
        <th rowspan="2">Division</th>
        <th class="text-center" colspan="2">{{$now}}</th>
        <th class="text-center" colspan="2">Year to Date</th>
      </tr>
      <tr>
        <th>Total Transaction Count</th>
        <th>Total Transaction Value</th>
        <th>Total Transaction Count</th>
        <th>Total Transaction Value</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($divisions as $division)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $division->name }}</td>
          <td>{{ number_format($division->count) }}</td>
          <td>{{ number_format($division->value, 2) }}</td>
          <td>{{ number_format($division->count * 2) }}</td>
          <td>{{ number_format($division->value * 3,2) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>