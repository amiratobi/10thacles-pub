<section class="row text-center pl-2 pr-2 mb-4">
  <div class="col-12 col-md-6 col-lg-3 dash-panel-container pl-3 pr-3 mb-3">
    <div class="dash-panel panel-1">
      <div class="d-flex flex-row justify-content-center">
        <div class="d-flex flex-column">
          <div class="p-2"><p class="text-white mb-0">Total Transaction Value</p></div>
          <div class="p-2"><h1 class="text-white mb-0 mt-0"><del>N</del>
            @if (($panelData['cash']->total + $panelData['card']->total) >= 1000000)
              {{ number_format(($panelData['cash']->total + $panelData['card']->total)/1000000, 2) }}M
            @else
              {{ number_format(($panelData['cash']->total + $panelData['card']->total)/1000, 2) }}K
            @endif
            </h1></div>
          <div class="p-2"><p class="text-white">{{ number_format($panelData['cash']->count + $panelData['card']->count) }} Transactions</p></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-3 dash-panel-container pl-3 pr-3 mb-3">
    <div class="dash-panel panel-2">
      <div class="d-flex flex-row justify-content-center">
        <div class="d-flex flex-column">
          <div class="p-2"><p class="text-white mb-0">Total Transaction Value (cash)</p></div>
          <div class="p-2"><h1 class="text-white mb-0 mt-0"><del>N</del>
          @if ($panelData['cash']->total >= 1000000)
            {{ number_format($panelData['cash']->total/1000000, 2) }}M
          @else
            {{ number_format($panelData['cash']->total/1000, 2) }}K
          @endif
          </h1></div>
          <div class="p-2"><p class="text-white">{{ number_format($panelData['cash']->count) }} Transactions</p></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-3 dash-panel-container pl-3 pr-3 mb-3">
    <div class="dash-panel panel-3">
      <div class="d-flex flex-row justify-content-center">
        <div class="d-flex flex-column">
          <div class="p-2"><p class="text-white mb-0">Total Transaction Value (card)</p></div>
          <div class="p-2"><h1 class="text-white mb-0 mt-0"><del>N</del>
          @if ($panelData['card']->total >= 1000000)
            {{ number_format($panelData['card']->total/1000000, 2) }}M
          @else 
            {{ number_format($panelData['card']->total/1000, 2) }}K
          @endif 
          </h1></div>
          <div class="p-2"><p class="text-white">{{ number_format($panelData['card']->count) }} Transactions</p></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-3 dash-panel-container pl-3 pr-3 mb-3">
    <div class="dash-panel panel-4">
      <div class="d-flex flex-row justify-content-center">
        <div class="d-flex flex-column">
          <div class="p-2"><p class="text-white mb-0">Cash Pending Deposit</p></div>
          <div class="p-2"><h1 class="text-white mb-0 mt-0"><del>N</del>
          @if ($panelData['cash_pending']->total >= 1000000)
            {{ number_format($panelData['cash_pending']->total/1000000, 2) }}M
          @else
            {{ number_format($panelData['cash_pending']->total/1000, 2) }}K
          @endif
          </h1></div>
          <div class="p-2"><p class="text-white">{{ number_format($panelData['cash_pending']->count) }} Transactions</p></div>
        </div>
      </div>
    </div>
  </div>
</section>