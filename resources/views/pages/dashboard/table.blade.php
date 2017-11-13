<h2 class="text-center">Summary By Divisions</h2>
<div class="table-responsive">
  <table class="table table-sm " id="myTable">
    <thead class="bg-dark text-light">
      <tr class="">
        <th rowspan="2">#</th>
        <th rowspan="2">Division</th>
        <th class="text-center" colspan="2">{{ now()->toFormattedDateString() }}</th>
        <th class="text-center" colspan="2">Year to Date</th>
      </tr>
      <tr>
        <th>Transaction Count</th>
        <th>Transaction Value</th>
        <th>Transaction Count</th>
        <th>Transaction Value</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($divisions->today as $division)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $division->name }}</td>
          <td>{{ number_format($division->count) }}</td>
          <td>{{ number_format($division->total, 2) }}</td>
          <td>{{ number_format($divisions->yearToDate[$loop->iteration - 1]->count) }}</td>
          <td>{{ number_format($divisions->yearToDate[$loop->iteration - 1]->total, 2) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>