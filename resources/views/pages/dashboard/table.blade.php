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
      @foreach ($divisions->yearToDate as $yearToDate)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $yearToDate->name }}</td>
          @if (isset($divisions->today[$loop->index]))
            <td>{{ number_format($divisions->today[$loop->index]->count) }}</td>
            <td>{{ number_format($divisions->today[$loop->index]->total, 2) }}</td>
          @else
            <td>-</td>
            <td>-</td>
          @endif
          <td>{{ number_format($yearToDate->count) }}</td>
          <td>{{ number_format($yearToDate->total, 2) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>