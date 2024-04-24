<div class="page-content-wrapper border">

    <!-- Title -->
    <div class="row mb-3">
        <h1 class="h3 mb-5 mb-sm-0 fs-5 "> دسته بندی</h1>
        <div class="col-12 mt-5 d-sm-flex justify-content-between align-items-center">

            <div class="card-body">
                <form class="row g-4" wire:submit="createCategory">

                    <!-- Input item -->
                    <div class="col-6">
                        <label class="form-label">عنوان دسته بندی</label>
                        <input wire:model="title" type="text" class="form-control">
                    </div>

                    <!-- Choice item -->
                    <div class="col-lg-6">
                        <label class="form-label">دسته پدر</label>
                        <select wire:model="parent_id" class="form-select js-choice z-index-9 border-0 bg-light" aria-label=".form-select-sm">
                            <option value="0">انتخاب</option>
                            @foreach($parentCategories as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-sm-flex justify-content-start">
                        <button type="submit" class="btn btn-primary mb-0">افزودن دسته بندی</button>
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
                        <th scope="col" class="border-0 rounded-start">نام دسته بندی</th>
                        <th scope="col" class="border-0">دسته پدر</th>
                        <th scope="col" class="border-0">تاریخ ایجاد</th>
                        <th scope="col" class="border-0 rounded-end">عملیات</th>
                    </tr>
                    </thead>

                    <!-- Table body START -->
                    <tbody>

                   @foreach($categories as $index=>$category)
                       <tr>
                           <!-- Table data -->
                           <td>
                               <div class="d-flex align-items-center position-relative">
                                   <!-- Title -->
                                   <h6 class="table-responsive-title mb-0 ms-2">
                                       <a href="#" class="stretched-link">{{$category->title}}</a>
                                   </h6>
                               </div>
                           </td>

                           <!-- Table data -->
                           <td>
                               <div class="d-flex align-items-center">
                                   <!-- Info -->
                                   <div class="ms-2">
                                       <h6 class="mb-0 fw-light">{{$category->parent->title}}</h6>
                                   </div>
                               </div>
                           </td>
                           <!-- Table data -->
                           <td> {{$category->created_at}}</td>

                           <!-- Table data -->
                           <td>
                               <a href="#" class="btn btn-sm btn-success me-1 mb-1 mb-md-0">ویرایش</a>
                               <button class="btn btn-sm btn-danger mb-0">حذف</button>
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
                <!-- Pagination -->
                <nav class="d-flex justify-content-center mb-0" aria-label="navigation">
                    <ul class="pagination pagination-sm pagination-primary-soft d-inline-block d-md-flex rounded mb-0">
                        <li class="page-item mb-0"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-right"></i></a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">1</a></li>
                        <li class="page-item mb-0 active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#">3</a></li>
                        <li class="page-item mb-0"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                    </ul>
                </nav>
            </div>
            <!-- Pagination END -->
        </div>
        <!-- Card footer END -->
    </div>
    <!-- Card END -->
</div>
