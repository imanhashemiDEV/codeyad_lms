<div class="page-content-wrapper border">

    <div class="row mb-3">
        <h1 class="h3 mb-5 mb-sm-0 fs-5 "> لیست دوره های {{auth()->user()->name}}</h1>
        <div class="col-12 mt-5 d-sm-flex justify-content-between align-items-center">

            <div class="card-body">
                <div class="d-sm-flex justify-content-start">
                    <a href="{{route('panel.add_course')}}" class="btn btn-primary mb-0">افزودن دوره</a>
                </div>
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
                        <th scope="col" class="border-0 rounded-start">ردیف</th>
                        <th scope="col" class="border-0 rounded-start">عنوان دوره</th>
                        <th scope="col" class="border-0">قیمت</th>
                        <th scope="col" class="border-0">تاریخ ایجاد</th>
                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $index =>$course)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$courses->firstItem() + $index}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$course->title}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center position-relative">
                                    <h6 class="table-responsive-title mb-0 ms-2">
                                        <a href="#" class="stretched-link">{{$course->price}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td>{{ \Hekmatinasser\Verta\Verta::instance($course->created_at)->format('%B %d، %Y') }}</td>
                            <td>
                                <a href="#"  class="btn btn-sm btn-info me-1 mb-1 mb-md-0">افزودن قسمت</a>
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
                {{$courses->links('vendor.livewire.admin-pagination')}}
            </div>
            <!-- Pagination END -->
        </div>
    </div>
</div>
@push('scripts')
    <script>


        // Upload image
        document.querySelector(".upload-button-image").onclick = function() {
            document.querySelector(".hidden-upload-image").click();
        };

        document.querySelector(".hidden-upload-image").onchange = function() {
            document.querySelector(".upload-name-image").value = event.target.files[0].name;
        };

        // Upload Video .mp4
        document.querySelector(".upload-button-mp4").onclick = function() {
            document.querySelector(".hidden-upload-mp4").click();
        };

        document.querySelector(".hidden-upload-mp4").onchange = function() {
            document.querySelector(".upload-name-mp4").value = event.target.files[0].name;
        };



    </script>
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
