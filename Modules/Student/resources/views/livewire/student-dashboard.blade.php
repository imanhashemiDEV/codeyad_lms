<main>

    <!-- =======================
    Page Banner START -->
    <section class="pt-0">
        <div class="container-fluid px-0">
            <div class="card bg-blue h-100px h-md-200px rounded-0" style="background:url({{url("assets/images/pattern/04.png")}}) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container mt-n4">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-transparent card-body pb-0 px-0 mt-2 mt-sm-0">
                        <div class="row d-sm-flex justify-sm-content-between mt-2 mt-md-0">
                            <!-- Avatar -->
                            <div class="col-auto">
                                <div class="avatar avatar-xxl position-relative mt-n3">
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{url('assets/images/avatar/09.jpg')}}" alt="">
                                    <span class="badge text-bg-success rounded-pill position-absolute top-50 start-100 translate-middle mt-4 mt-md-5 ms-n3 px-md-3">حرفه ای</span>
                                </div>
                            </div>
                            <!-- Profile info -->
                            <div class="col d-sm-flex justify-content-between align-items-center">
                                <div>
                                    <h1 class="my-1 fs-4">{{auth()->user()->name}}</h1>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                            <span class="h6">255</span>
                                            <span class="text-body fw-light">امتیازات</span>
                                        </li>
                                        <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                            <span class="h6">7</span>
                                            <span class="text-body fw-light">دوره های تکمیل شده</span>
                                        </li>
                                        <li class="list-inline-item me-3 mb-1 mb-sm-0">
                                            <span class="h6">52</span>
                                            <span class="text-body fw-light">ویدیو</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Button -->
                                <div class="mt-2 mt-sm-0">
                                    <a href="#" class="btn btn-outline-primary mb-0">مشاهده دوره های من</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced filter responsive toggler START -->
                    <!-- Divider -->
                    <hr class="d-xl-none">
                    <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                        <a class="h6 mb-0 fw-bold d-xl-none" href="#">منو</a>
                        <button class="btn btn-primary d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                            <i class="fas fa-sliders-h"></i>
                        </button>
                    </div>
                    <!-- Advanced filter responsive toggler END -->
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Page Banner END -->

    <!-- =======================
    Page content START -->
    <section class="pt-0">
        <div class="container">
            <div class="row">

                <!-- Left sidebar START -->
                <div class="col-xl-3">
                    <!-- Responsive offcanvas body START -->
                    <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
                        <!-- Offcanvas header -->
                        <div class="offcanvas-header bg-light">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">پروفایل من</h5>
                            <button  type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
                        </div>
                        <!-- Offcanvas body -->
                        @include('student::layouts.student_menus')
                    </div>
                    <!-- Responsive offcanvas body END -->
                </div>
                <!-- Left sidebar END -->

                <!-- Main content START -->
                <div class="col-xl-9">

                    <!-- Counter boxes START -->
                    <div class="row mb-4">
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                            <div class="d-flex justify-content-center align-items-center p-4 bg-orange bg-opacity-15 rounded-3">
                                <span class="display-6 lh-1 text-orange mb-0"><i class="fas fa-tv fa-fw"></i></span>
                                <div class="ms-4">
                                    <div wire:ignore class="d-flex">
                                        <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="{{count($courses)}}"	data-purecounter-delay="200">0</h5>
                                    </div>
                                    <p class="mb-0 h6 fw-light">دوره ها</p>
                                </div>
                            </div>
                        </div>
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                            <div class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-15 rounded-3">
                                <span class="display-6 lh-1 text-purple mb-0"><i class="fas fa-clipboard-check fa-fw"></i></span>
                                <div class="ms-4">
                                    <div class="d-flex">
                                        <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="52"	data-purecounter-delay="200">0</h5>
                                    </div>
                                    <p class="mb-0 h6 fw-light">ویدیو</p>
                                </div>
                            </div>
                        </div>
                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-4 mb-3 mb-lg-0">
                            <div class="d-flex justify-content-center align-items-center p-4 bg-success bg-opacity-10 rounded-3">
                                <span class="display-6 lh-1 text-success mb-0"><i class="fas fa-medal fa-fw"></i></span>
                                <div class="ms-4">
                                    <div class="d-flex">
                                        <h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="8" data-purecounter-delay="300">0</h5>
                                    </div>
                                    <p class="mb-0 h6 fw-light">مدارک معتبر</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Counter boxes END -->

                    <div class="card bg-transparent border rounded-3">
                        <!-- Card header START -->
                        <div class="card-header bg-transparent border-bottom">
                            <h3 class="mb-0 fs-5 ff-vb">لیست دوره های من</h3>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body">

                            <!-- Search and select START -->
                            <div class="row g-3 align-items-center justify-content-between mb-4">
                                <!-- Content -->
                                <div class="col-md-8">
                                    <form class="rounded position-relative">
                                        <input wire:model.live.debounce.1000="search" class="form-control pe-5 bg-transparent" type="search" placeholder="جستجوی دوره" aria-label="Search">
                                        <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                                            <i class="fas fa-search fs-6 "></i>
                                        </button>
                                    </form>
                                </div>

                                <!-- Select option -->
                                <div class="col-md-3">
                                    <!-- Short by filter -->
                                    <form>
                                        <select wire:model="sort" wire:change="$refresh" class="form-select js-choice border-0 z-index-9 bg-transparent" aria-label=".form-select-sm">
                                            <option>مرتب سازی</option>
                                            <option value="most_viewed">پربازدیدترین</option>
                                            <option value="most_sold">پرفروش ترین</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <!-- Search and select END -->

                            <!-- Course list table START -->
                            <div class="table-responsive border-0">
                                <table class="table table-dark-gray align-middle p-4 mb-0 table-hover">
                                    <!-- Table head -->
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0">ردیف</th>
                                        <th scope="col" class="border-0">عکس دوره</th>
                                        <th scope="col" class="border-0 rounded-start"> عنوان دوره</th>
                                        <th scope="col" class="border-0">جزئیات دوره</th>
                                    </tr>
                                    </thead>

                                    <!-- Table body START -->
                                    <tbody>
                                    <!-- Table item -->
                                     @foreach($courses as $index =>$student_course)
                                         <tr>

                                             <td>{{$courses->firstItem() + $index}}</td>
                                             <!-- Table data -->
                                             <td>
                                                 <div class="d-flex align-items-center">
                                                     <!-- Image -->
                                                     <div class="w-100px">
                                                         <img src="{{url('images/courses/'.$student_course->course_id.'/'. $student_course->course->image)}}" class="rounded" alt="">
                                                     </div>
                                                 </div>
                                             </td>

                                             <!-- Table data -->
                                             <td>{{$student_course->course->title}}</td>

                                             <!-- Table data -->
                                             <td>
                                                 <a href="{{route('course.details',$student_course->course_id)}}" class="btn btn-sm btn-primary-soft me-1 mb-1 mb-md-0"><i class="bi bi-play-circle me-1"></i>جزئیات دوره</a>
                                             </td>
                                         </tr>
                                     @endforeach
                                    </tbody>
                                    <!-- Table body END -->
                                </table>
                            </div>
                            <!-- Course list table END -->

                            <!-- Pagination START -->
                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3 justify-content-center">
                                {{$courses->links('homepage::layouts.pagination')}}
                            </div>
                            <!-- Pagination END -->
                        </div>
                        <!-- Card body START -->
                    </div>
                    <!-- Main content END -->
                </div><!-- Row END -->
            </div>
        </div>
    </section>
    <!-- =======================
    Page content END -->

</main>
