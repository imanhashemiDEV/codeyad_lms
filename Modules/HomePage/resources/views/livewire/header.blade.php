<header class="navbar-light navbar-sticky header-static">
    <!-- Nav START -->
    <nav class="navbar navbar-expand-xl">
        <div class="container-fluid px-3 px-xl-5">
            <!-- Logo START -->
            <a class="navbar-brand" href="{{route('home')}}">
                <img class="light-mode-item navbar-brand-item" src="{{url('assets/images/logo.svg')}}" alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="{{url('assets/images/logo-light.svg')}}" alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
            </button>

            <!-- Main navbar START -->
            <div class="navbar-collapse w-100 collapse" id="navbarCollapse">

                <!-- Nav category menu START -->
                <ul class="navbar-nav navbar-nav-scroll me-auto">
                    <!-- Nav item 1 Demos -->
                    <li class="nav-item dropdown dropdown-menu-shadow-stacked">
                        <a class="nav-link bg-primary bg-opacity-10 rounded-3 text-primary px-3 py-3 py-xl-0" href="#" id="categoryMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-ui-radios-grid me-2"></i><span>دسته بندی</span></a>
                        <ul class="dropdown-menu" aria-labelledby="categoryMenu">

                            <!-- Dropdown submenu -->
                            @foreach($this->categories as $category)
                                <li class="dropdown-submenu dropend">
                                    <a class="dropdown-item dropdown-toggle" href="#">{{$category->title}}</a>
                                    <ul class="dropdown-menu dropdown-menu-start" data-bs-popper="none">
                                        <!-- dropdown submenu open right -->
{{--                                        <li class="dropdown-submenu dropend">--}}
{{--                                            <a class="dropdown-item dropdown-toggle" href="#">طراحی وب</a>--}}
{{--                                            <ul class="dropdown-menu" data-bs-popper="none">--}}
{{--                                                <li> <a class="dropdown-item" href="#">CSS</a> </li>--}}
{{--                                                <li> <a class="dropdown-item" href="#">JavaScript</a> </li>--}}
{{--                                                <li> <a class="dropdown-item" href="#">Angular</a> </li>--}}
{{--                                                <li> <a class="dropdown-item" href="#">PHP</a> </li>--}}
{{--                                                <li> <a class="dropdown-item" href="#">HTML</a> </li>--}}
{{--                                                <li> <a class="dropdown-item" href="#">React</a> </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
                                        @foreach($category->child as $childCategory)
                                            <li> <a class="dropdown-item" href="#">{{$childCategory->title}}</a> </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            <li> <hr class="dropdown-divider"></li>
                            <li> <a class="dropdown-item bg-primary text-primary bg-opacity-10 rounded-2 mb-0" href="{{route('course.list')}}">مشاهده همه</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Nav category menu END -->

                <!-- Nav Main menu START -->
                <ul class="navbar-nav navbar-nav-scroll me-auto">
                    <!-- Nav item 1 Demos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link active" href="{{route('home')}}" id="demoMenu"  aria-expanded="false">صفحه اصلی</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="" id="demoMenu"  aria-expanded="false">تماس با ما</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="" id="demoMenu"  aria-expanded="false">درباره ما</a>
                    </li>

                </ul>
                <!-- Nav Main menu END -->

                <!-- Nav Search START -->
                <div class="nav my-3 my-xl-0 px-4 flex-nowrap align-items-center">
                    <div class="nav-item w-100">
                        <form class="position-relative">
                            <input class="form-control pe-5 bg-transparent" type="search" placeholder="جستجو..." aria-label="Search">
                            <button class="bg-transparent p-2 position-absolute top-50 end-0 translate-middle-y border-0 text-primary-hover text-reset" type="submit">
                                <i class="fas fa-search fs-6 "></i>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Nav Search END -->
            </div>
            <!-- Main navbar END -->

            <!-- Profile START -->
            <div class="dropdown ms-1 ms-lg-0">
                <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar-img rounded-circle" src="{{url('assets/images/avatar/01.jpg')}}" alt="avatar">
                </a>
                <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                    <!-- Profile info -->
                    <li class="px-3 mb-3">
                        @auth
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    <img class="avatar-img rounded-circle shadow" src="{{url('assets/images/avatar/01.jpg')}}" alt="avatar">
                                </div>
                                <div>
                                    <a class="h6" href="#">{{auth()->user()->name}}</a>
                                    <p class="small m-0">{{auth()->user()->email}}</p>
                                </div>
                            </div>
                        @endauth

                    </li>
                    <li> <hr class="dropdown-divider"></li>
                    <!-- Links -->
                    @guest
                        <li><a class="dropdown-item" href="{{route('login')}}"><i class="bi bi-person fa-fw me-2"></i>ورود / ثبت نام</a></li>
                    @endguest
                   @auth
                        @if(auth()->user()->roles)
                            <li><a class="dropdown-item" href="{{route('panel.index')}}"><i class="bi bi-gear fa-fw me-2"></i>پنل مدیریت</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{route('student.dashboard')}}"><i class="bi bi-gear fa-fw me-2"></i>پنل کاربری</a></li>
                        <li><a class="dropdown-item bg-danger-soft-hover" href="{{route('user.cart')}}"><i class="bi bi-shop fa-fw me-2"></i>سبد خرید</a></li>
                        <li><a class="dropdown-item bg-danger-soft-hover" href="{{route('logout')}}"><i class="bi bi-power fa-fw me-2"></i>خروج</a></li>
                   @endauth
                    <li> <hr class="dropdown-divider"></li>
                    <!-- Dark mode options START -->
                    <li>
                        <div class="bg-light dark-mode-switch theme-icon-active d-flex align-items-center p-1 rounded mt-2">
                            <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
                                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
                                    <use href="#"></use>
                                </svg> روشن
                            </button>
                            <button type="button" class="btn btn-sm mb-0" data-bs-theme-value="dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
                                    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                                    <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
                                    <use href="#"></use>
                                </svg> تیره
                            </button>
                            <button type="button" class="btn btn-sm mb-0 active" data-bs-theme-value="auto">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                                    <use href="#"></use>
                                </svg> خودکار
                            </button>
                        </div>
                    </li>
                    <!-- Dark mode options END-->
                </ul>
            </div>
            <!-- Profile START -->
        </div>
    </nav>
    <!-- Nav END -->
</header>
