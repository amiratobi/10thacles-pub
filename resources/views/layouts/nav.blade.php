    <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
      <ul class="nav nav-pills flex-column">
        @if (hasClaim('can-manage-own-merchant'))
          <li class="nav-item">
            <a class="nav-link active" href="{{ url(route('home')) }}" id="dashboard-navlink"><i class="fa fa-desktop mr-2"></i> Dashboard <span class="sr-only">(current)</span></a>
          </li>
        @endif
        
        <li class="nav-item">
          <a class="nav-link" href="/reports" id="reports-navlink"><i class="fa fa-line-chart mr-2"></i> Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url(route('payment.index')) }}" id="payments-navlink"><i class="fa fa-money mr-2"></i> Pending  Cash</a>
        </li>
        @if (hasClaim('can-manage-menus'))
          <li class="nav-item">
            <a class="nav-link" href="{{ url(route('payitem.index')) }}" id="payitems-navlink"><i class="fa fa-tasks mr-2"></i> Pay Items</a>
          </li>
        @endif
        @if (hasClaim('can-manage-users'))
          <li class="nav-item">
            <a class="nav-link" href="{{ url(route('user.index')) }}" id="users-navlink"><i class="fa fa-users mr-2"></i> Users</a>
          </li>
        @endif
      </ul>

    </nav>