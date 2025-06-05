<div class="container-fluid px-lg-0">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body d-flex justify-content-end">
                    <div class="dropdown internalPageNav">
                        <button class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="{{ Route::is('admin.billing.invoices.index') ? 'active' : '' }}" href="{{ route('admin.billing.invoices.index') }}">All Invoices</a>
                            </li>

                            <li>
                                <a class="{{ Route::is('admin.billing.invoices.draft-invoices') ? 'active' : '' }}" href="{{ route('admin.billing.invoices.draft-invoices') }}">Draft Invoices</a>
                            </li>
                            <li>
                                <a class="{{ Route::is('admin.billing.invoices.unpaid-invoices') ? 'active' : '' }}" href="{{ route('admin.billing.invoices.unpaid-invoices') }}">Unpaid Invoices</a>
                            </li>
                            <li>
                                <a class="{{ Route::is('admin.billing.invoices.overdue-invoices') ? 'active' : '' }}" href="{{ route('admin.billing.invoices.overdue-invoices') }}">Overdue Invoices</a>
                            </li>
                            <li>
                                <a class="{{ Route::is('admin.billing.invoices.cancelled-invoices') ? 'active' : '' }}" href="{{ route('admin.billing.invoices.cancelled-invoices') }}">Cancelled Invoices</a>
                            </li>
                            <li>
                                <a class="{{ Route::is('admin.billing.invoices.refunded-invoices') ? 'active' : '' }}" href="{{ route('admin.billing.invoices.refunded-invoices') }}">Refunded Invoices</a>
                            </li>
                            <li>
                                <a class="{{ Route::is('admin.billing.invoices.collections-invoices') ? 'active' : '' }}" href="{{ route('admin.billing.invoices.collections-invoices') }}">Collections Invoices</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
