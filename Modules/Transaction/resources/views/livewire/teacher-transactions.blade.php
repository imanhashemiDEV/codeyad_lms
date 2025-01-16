<div class="page-content-wrapper border">
    <div class="card bg-transparent border">
        <!-- Card body START -->
        <div class="card-body">
            <!-- Course table START -->
            <div class="table-responsive border-0 rounded-3">
                <!-- Table START -->
                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th scope="col" class="border-0 rounded-start">ردیف</th>
                        <th scope="col" class="border-0 rounded-start">مبلغ تراکنش</th>
                        <th scope="col" class="border-0">توضیحات</th>
                        <th scope="col" class="border-0 rounded-end">نوع تراکنش</th>
                        <th scope="col" class="border-0">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($this->transactions as $index =>$transaction)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$this->transactions->firstItem() + $index}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$transaction->amount}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$transaction->description}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                @if($transaction->transaction_type === \Modules\Transaction\app\Enums\TransactionType::Receive->value)
                                    <a
                                       class="btn btn-sm btn-success me-1 mb-1 mb-md-0">دریافت</a>
                                @elseif($transaction->transaction_type == \Modules\Transaction\app\Enums\TransactionType::Pay->value)
                                    <a class="btn btn-sm btn-danger me-1 mb-1 mb-md-0">پرداخت</a>
                                @endif
                            </td>
                            <td>{{ \Hekmatinasser\Verta\Verta::instance($transaction->created_at)->format('%B %d، %Y') }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                    <!-- Table body END -->
                </table>
                <!-- Table END -->
            </div>
            <!-- Course table END -->
        </div>
        <!-- Card body END -->

        <div class="card-footer bg-transparent pt-0">
            <!-- Pagination START -->
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                {{$this->transactions->links('vendor.livewire.admin-pagination')}}
            </div>
            <!-- Pagination END -->
        </div>
    </div>
</div>


