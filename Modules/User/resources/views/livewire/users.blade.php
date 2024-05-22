<div class="page-content-wrapper border">
    <div class="row mb-3">
        <h1 class="h3 mb-5 mb-sm-0 fs-5 ">نقش کاربر</h1>
        <div class="col-12 mt-5 d-sm-flex justify-content-between align-items-center">

            <div class="card-body">
                <form class="row g-4">
                    <div class="col-6">
                        <label class="form-label">سید ایمان هاشمی</label>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-primary mb-0">افزودن  نقش</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                        <th scope="col" class="border-0 rounded-start">عکس</th>
                        <th scope="col" class="border-0 rounded-start">نام و نام خانوادگی</th>
                        <th scope="col" class="border-0">نقش ها</th>
                        <th scope="col" class="border-0">تاریخ ایجاد</th>
                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($users as $user)
                       <tr>
                           <td>
                               <div class="d-flex align-items-center position-relative">
                                   <div class="avatar avatar-md flex-shrink-0">
                                       <img class="avatar-img rounded-circle" src="{{url('assets/images/avatar/01.jpg')}}" alt="avatar">
                                   </div>
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center position-relative">
                                   <h6 class="table-responsive-title mb-0 ms-2">
                                       <a href="#" class="stretched-link">{{$user->name}}</a>
                                   </h6>
                               </div>
                           </td>
                           <td>
                               <div class="d-flex align-items-center position-relative">
                                   <h6 class="table-responsive-title mb-0 ms-2">
                                       <a href="#" class="stretched-link">مدیر کل</a>
                                   </h6>
                               </div>
                           </td>
                           <td>{{ \Hekmatinasser\Verta\Verta::instance($user->created_at)->format('%B %d، %Y') }}</td>
                           <td>
                               <a href="#" class="btn btn-sm btn-success me-1 mb-1 mb-md-0">وضعیت</a>
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

        <div class="card-footer bg-transparent pt-0">
            <!-- Pagination START -->
            <div class="d-sm-flex justify-content-sm-between align-items-sm-center">
                {{$users->links('vendor.livewire.admin-pagination')}}
            </div>
            <!-- Pagination END -->
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('delete-category', (event) => {
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
                        Livewire.dispatch('destroy-category',{id:event.id})
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
