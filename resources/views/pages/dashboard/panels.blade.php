<section class="row text-center pl-2 pr-2 mb-4">
  <div class="col-12 col-md-6 col-lg-3 dash-panel-container pl-3 pr-3 mb-3">
    <div class="dash-panel panel-1">
      <div class="d-flex flex-row justify-content-center">
        <div class="d-flex flex-column">
          <div class="p-2"><p class="text-white mb-0">Total Transaction Value</p></div>
          <div class="p-2"><h1 class="text-white mb-0 mt-0"><del>N</del>{{ number_format(($panelData->cash->value + $panelData->card->value)/1000000, 2) }}M</h1></div>
          <div class="p-2"><p class="text-white">{{ number_format($panelData->cash->count + $panelData->card->count) }} Transactions</p></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-3 dash-panel-container pl-3 pr-3 mb-3">
    <div class="dash-panel panel-2">
      <div class="d-flex flex-row justify-content-center">
        <div class="d-flex flex-column">
          <div class="p-2"><p class="text-white mb-0">Total Transaction Value (cash)</p></div>
          <div class="p-2"><h1 class="text-white mb-0 mt-0"><del>N</del>{{ number_format($panelData->cash->value/1000000, 2) }}M</h1></div>
          <div class="p-2"><p class="text-white">{{ number_format($panelData->cash->count) }} Transactions</p></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-3 dash-panel-container pl-3 pr-3 mb-3">
    <div class="dash-panel panel-3">
      <div class="d-flex flex-row justify-content-center">
        <div class="d-flex flex-column">
          <div class="p-2"><p class="text-white mb-0">Total Transaction Value (card)</p></div>
          <div class="p-2"><h1 class="text-white mb-0 mt-0"><del>N</del>{{ number_format($panelData->card->value/1000000, 2) }}M</h1></div>
          <div class="p-2"><p class="text-white">{{ number_format($panelData->card->count) }} Transactions</p></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-3 dash-panel-container pl-3 pr-3 mb-3">
    <div class="dash-panel panel-4">
      <div class="d-flex flex-row justify-content-center">
        <div class="d-flex flex-column">
          <div class="p-2"><p class="text-white mb-0">Cash Pending Deposit</p></div>
          <div class="p-2"><h1 class="text-white mb-0 mt-0"><del>N</del>{{ number_format($panelData->cash->pending->value/1000000, 2) }}M</h1></div>
          <div class="p-2"><p class="text-white">{{ number_format($panelData->cash->pending->count) }} Transactions</p></div>
        </div>
      </div>
    </div>
  </div>
</section>