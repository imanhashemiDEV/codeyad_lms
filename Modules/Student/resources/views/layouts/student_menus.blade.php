<div class="offcanvas-body p-3 p-xl-0">
    <div class="bg-dark border rounded-3 p-3 w-100">
        <!-- Dashboard menu -->
        <div class="list-group list-group-dark list-group-borderless collapse-list">
            <a wire:ignore class="list-group-item @if(request()->routeIs('student.dashboard')) active @endif" href="{{route('student.dashboard')}}"><i class="bi bi-ui-checks-grid fa-fw me-2"></i>داشبورد</a>
            <a wire:ignore class="list-group-item @if(request()->routeIs('student.profile')) active @endif" href="{{route('student.profile')}}"><i class="bi bi-pencil-square fa-fw me-2"></i>پروفایل</a>


            <a class="list-group-item" href="#"><i class="bi bi-card-checklist fa-fw me-2"></i>مدیریت پکیج</a>
            <a class="list-group-item" href="#"><i class="bi bi-basket fa-fw me-2"></i>لیست دوره ها</a>
            <a class="list-group-item" href="#"><i class="far fa-fw fa-file-alt me-2"></i>توضیحات دوره</a>
            <a class="list-group-item" href="#"><i class="bi bi-question-diamond fa-fw me-2"></i>امتحانات</a>
            <a class="list-group-item" href="#"><i class="bi bi-credit-card-2-front fa-fw me-2"></i>اطلاعات کارت</a>
            <a class="list-group-item" href="#"><i class="bi bi-cart-check fa-fw me-2"></i>موردعلاقه ها</a>
            <a class="list-group-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>تنظیمات</a>
            <a class="list-group-item" href="#"><i class="bi bi-trash fa-fw me-2"></i>حذف پروفایل</a>
            <a class="list-group-item text-danger bg-danger-soft-hover" href="#"><i class="fas fa-sign-out-alt fa-fw me-2"></i>خروج</a>
            <!-- Collapse menu -->
            <a class="list-group-item" data-bs-toggle="collapse" href="#collapseauthentication" role="button" aria-expanded="false" aria-controls="collapseauthentication">
                <i class="bi bi-lock fa-fw me-2"></i>زیر منو
            </a>
            <!-- Submenu -->
            <ul class="nav collapse flex-column" id="collapseauthentication" data-bs-parent="#navbar-sidebar">
                <li class="nav-item"> <a class="nav-link" href="#">عنوان 1</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">عنوان 2</a></li>
            </ul>
        </div>
    </div>
</div>
