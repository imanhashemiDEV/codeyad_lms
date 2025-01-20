<main>

    <!-- =======================
    Page Banner START -->
    <section class="pt-0">
        <!-- Main banner background image -->
        <div class="container-fluid px-0">
            <div class="bg-blue h-100px h-md-200px rounded-0" style="background:url(assets/images/pattern/04.png) no-repeat center center; background-size:cover;">
            </div>
        </div>
        <div class="container mt-n4">
            <div class="row">
                <!-- Profile banner START -->
                <div class="col-12">
                    <div class="card bg-transparent card-body p-0">
                        <div class="row d-flex justify-content-between">
                            <!-- Avatar -->
                            <div class="col-auto mt-4 mt-md-0">
                                <div class="avatar avatar-xxl mt-n3">
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                            </div>
                            <!-- Profile info -->
                            <div class="col d-md-flex justify-content-between align-items-center mt-4">
                                <div>
                                    <h1 class="my-1 fs-5">الهام حسینی <i class="bi bi-patch-check-fill text-info small"></i></h1>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-star text-warning me-2"></i>4.5/5.0</li>
                                        <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-user-graduate text-orange me-2"></i>12k شرکت کننده</li>
                                        <li class="list-inline-item h6 fw-light me-3 mb-1 mb-sm-0"><i class="fas fa-book text-purple me-2"></i>25 دوره</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Profile banner END -->

                    <!-- Advanced filter responsive toggler START -->
                    <!-- Divider -->
                    <hr class="d-xl-none">
                    <div class="col-12 col-xl-3 d-flex justify-content-between align-items-center">
                        <a class="h6 mb-0 fw-bold d-xl-none" href="#">منوی کاربری</a>
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
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">پروفایل</h5>
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
                    <!-- Edit profile START -->
                    <div class="card bg-transparent border rounded-3">
                        <!-- Card header -->
                        <div class="card-header bg-transparent border-bottom">
                            <h3 class="card-header-title mb-0 ff-vb fs-5">ویرایش پروفایل</h3>
                        </div>
                        <!-- Card body START -->
                        <div class="card-body">
                            <!-- Form -->
                            <form class="row g-4" wire:submit="updateProfile">

                                <!-- Profile picture -->
                                <div class="col-12 justify-content-center align-items-center">
                                    <label class="form-label">تصویر</label>
                                    <div class="d-flex align-items-center">
                                        <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                            <!-- Avatar place holder -->
                                            <span class="avatar avatar-xl">
											<img id="uploadfile-1-preview" class="avatar-img rounded-circle border border-white border-3 shadow" src="assets/images/avatar/07.jpg" alt="">
										</span>
                                            <!-- Remove btn -->
                                            <button type="button" class="uploadremove"><i class="bi bi-x text-white"></i></button>
                                        </label>
                                        <!-- Upload button -->
                                        <label class="btn btn-primary-soft mb-0" for="uploadfile-1">تغییر</label>
                                        <input id="uploadfile-1" class="form-control d-none" type="file">
                                    </div>
                                </div>

                                <!-- Full name -->
                                <div class="col-12">
                                    <label class="form-label">نام</label>
                                    <div class="input-group">
                                        <input wire:model="name" type="text" class="form-control"  placeholder="نام">
                                    </div>
                                </div>

                                <!-- Email id -->
                                <div class="col-md-6">
                                    <label class="form-label">ایمیل</label>
                                    <input wire:model="email" class="form-control" type="email"   placeholder="ایمیل" disabled>
                                </div>

                                <!-- Phone number -->
                                <div class="col-md-6">
                                    <label class="form-label">شماره تماس</label>
                                    <input type="text" class="form-control" placeholder="شماره تماس">
                                </div>

                                <!-- Location -->
                                <div class="col-md-6">
                                    <label class="form-label">آدرس</label>
                                    <input class="form-control" type="text">
                                </div>

                                <!-- About me -->
                                <div class="col-12">
                                    <label class="form-label">درباره من</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                    <div class="form-text">توضیحات مختصری برای پروفایل شما</div>
                                </div>

                                <!-- Save button -->
                                <div class="d-sm-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mb-0">ذخیره</button>
                                </div>
                            </form>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Edit profile END -->

                    <div class="row g-4 mt-3">
                        <!-- Password change START -->
                        <div class="col-lg-6">
                            <div class="card border bg-transparent rounded-3">
                                <!-- Card header -->
                                <div class="card-header bg-transparent border-bottom">
                                    <h5 class="card-header-title mb-0">تغییر رمز عبور</h5>
                                </div>
                                <!-- Card body START -->
                                <div class="card-body">
                                    <!-- Current password -->
                                    <div class="mb-3">
                                        <label class="form-label">رمز فعلی</label>
                                        <input class="form-control" type="password" placeholder="********">
                                    </div>
                                    <!-- New password -->
                                    <div class="mb-3">
                                        <label class="form-label"> رمز جدید</label>
                                        <div class="input-group">
                                            <input class="form-control" type="password" placeholder="********">
                                            <span class="input-group-text p-0 bg-transparent">
											<i class="far fa-eye cursor-pointer p-2 w-40px"></i>
										</span>
                                        </div>
                                        <div class="rounded mt-1" id="psw-strength"></div>
                                    </div>
                                    <!-- Confirm password -->
                                    <div>
                                        <label class="form-label">تایید رمز جدید</label>
                                        <input class="form-control" type="password" placeholder="********">
                                    </div>
                                    <!-- Button -->
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="button" class="btn btn-primary mb-0">تغییر رمز</button>
                                    </div>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Password change end -->
                    </div>
                </div>
                <!-- Main content END -->
            </div><!-- Row END -->
        </div>
    </section>
    <!-- =======================
    Page content END -->

</main>
