<div class="page-content-wrapper border">

    <!-- Title -->
    <div class="row mb-3">
        <h1 class="h3 mb-5 mb-sm-0 fs-5 ">نقش ها</h1>
        <div class="col-12 mt-5 d-sm-flex justify-content-between align-items-center">

            <div class="card-body">
                <form class="row g-4">

                    <!-- Input item -->
                    <div class="col-6">
                        <label class="form-label">عنوان نقش</label>
                        <input wire:model="name" type="text" class="form-control">
                    </div>
                    <div class="d-sm-flex justify-content-start">
                        @if($editedIndex)
                            <button type="button" class="btn btn-primary mb-0" wire:click="updateRow">ویرایش</button>
                        @else
                            <button type="button" class="btn btn-primary mb-0" wire:click="createRole">ثبت</button>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Card START -->
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
                        <th scope="col" class="border-0 rounded-start">نام نقش</th>
                        <th scope="col" class="border-0">مجوزها</th>
                        <th scope="col" class="border-0">تاریخ ایجاد</th>
                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                    </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>

                    @foreach($roles as $index=>$role)
                        <tr>
                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <!-- Title -->
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$role->name}}</a>
                                    </h6>
                                </div>
                            </td>

                            <!-- Table data -->
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="btn btn-sm btn-success me-1 mb-1 mb-md-0">مجوزها</a>
                                </div>
                            </td>
                            <!-- Table data -->
                            <td> {{$role->created_at}}</td>

                            <!-- Table data -->
                            <td>
                                <a href="#" class="btn btn-sm btn-success me-1 mb-1 mb-md-0" wire:click="editRow({{$role->id}})">ویرایش</a>
                                <button class="btn btn-sm btn-danger mb-0" wire:click="$dispatch('delete-role',{id:{{$role->id}} })">حذف</button>
                            </td>
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

        <!-- Card footer START -->
        <div class="card-footer bg-transparent pt-0">
            <!-- Pagination START -->

            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                {{$roles->links('vendor.livewire.admin-pagination')}}
            </div>
            <!-- Pagination END -->
        </div>
        <!-- Card footer END -->
    </div>
    <!-- Card END -->
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('delete-role', (event) => {
                Swal.fire({
                    title: "آیا از حذف مطمئن هستید؟",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "بله!",
                    cancelButtonText:"خیر"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('destroy-role',{id:event.id})
                        Swal.fire({
                            title: "حذف انجام شد!",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endpush

