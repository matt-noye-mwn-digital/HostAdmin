<nav>
    <li>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('admin.clients.index') }}">Clients</a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
            Billing
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('admin.billing.transactions.index') }}">Transactions</a>
            </li>
            <li>
                <a href="{{ route('admin.billing.invoices.index') }}">Invoices</a>
            </li>
            <li>
                <a href="">Billable Items</a>
            </li>
            <li>
                <a href="">Quotes</a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
            Domain Names
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('admin.domain-names.index') }}">All Domains</a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
            Project Management
        </a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
            Products
        </a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
            Support
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="">Support Overview</a>
            </li>
            <li><a href="">Support Tickets</a></li>
            <li><a href="">Open New Ticket</a></li>
            <li><a href="">Announcements</a></li>
            <li><a href="">Downloads</a></li>
            <li><a href="">Knowledgebase</a></li>
            <li><a href="">Network Issues</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
            Reports
        </a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown">
            Utilities
        </a>
    </li>
    <li><a href="{{ route('admin.settings.index') }}">Settings</a></li>
</nav>
