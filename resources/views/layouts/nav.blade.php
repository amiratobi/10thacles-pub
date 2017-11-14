    <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="/dashboard" id="dashboard-navlink"><i class="fa fa-desktop mr-2"></i> Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/reports" id="reports-navlink"><i class="fa fa-line-chart mr-2"></i> Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url(route('payment.index')) }}" id="payments-navlink"><i class="fa fa-money mr-2"></i> Payments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/collections" id="collections-navlink"><i class="fa fa-tasks mr-2"></i> Collections</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/users" id="users-navlink"><i class="fa fa-users mr-2"></i> Users</a>
        </li>
      </ul>

    </nav>