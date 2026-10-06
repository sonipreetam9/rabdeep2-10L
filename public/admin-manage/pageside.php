<aside class="app-sidebar sticky" id="sidebar">
    <div class="main-sidebar-header">
        <a href="dashboard.php" class="header-logo">
            <img src="assets/images/logo.png" alt="logo" class="desktop-logo" style="height: 60px;">
            <img src="assets/images/logo.png" alt="logo" class="toggle-dark">
            <img src="assets/images/logo.png" alt="logo" class="desktop-dark"
                style="height: 55px; border-radius: 10px;">
            <img src="assets/images/logo.png" alt="logo" class="toggle-logo">
        </a>
    </div>

    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Dashboards</span></li>

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="dashboard.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path
                                d="M104,216V152h48v64h64V120a8,8,0,0,0-2.34-5.66l-80-80a8,8,0,0,0-11.32,0l-80,80A8,8,0,0,0,40,120v96Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Dashboards</span>
                    </a>
                    <ul class="slide-menu child1">

                    </ul>
                </li>

                <li class="slide has-sub">
                    <a href="about.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M32,216V56a8,8,0,0,1,8-8H216a8,8,0,0,1,8,8V216l-32-16-32,16-32-16L96,216,64,200Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" />
                            <line x1="144" y1="112" x2="192" y2="112" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="144" y1="144" x2="192" y2="144" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <rect x="64" y="96" width="48" height="64" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">About us</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="about.php">About us</a>
                        </li>
                    </ul>
                </li>
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Product</span></li>

                <!-- Start::slide -->
                <!-- <li class="slide has-sub">
                    <a href="add-category.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M32,216V56a8,8,0,0,1,8-8H216a8,8,0,0,1,8,8V216l-32-16-32,16-32-16L96,216,64,200Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" />
                            <line x1="144" y1="112" x2="192" y2="112" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="144" y1="144" x2="192" y2="144" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <rect x="64" y="96" width="48" height="64" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Add Category</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="add-category.php">Add Category</a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="slide has-sub">
                    <a href="add-sub-category.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M32,216V56a8,8,0,0,1,8-8H216a8,8,0,0,1,8,8V216l-32-16-32,16-32-16L96,216,64,200Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" />
                            <line x1="144" y1="112" x2="192" y2="112" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="144" y1="144" x2="192" y2="144" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <rect x="64" y="96" width="48" height="64" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Add Sub Category</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="add-sub-category.php">Add Sub Category</a>
                        </li>
                    </ul>
                </li> -->


                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="ri-arrow-right-s-line side-menu__angle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <rect x="32" y="48" width="192" height="160" rx="8" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="80" y1="96" x2="176" y2="96" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="80" y1="128" x2="176" y2="128" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="80" y1="160" x2="176" y2="160" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Product</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Product</a>
                        </li>
                        <li class="slide">
                            <a href="add-product.php" class="side-menu__item">Add New Product</a>
                        </li>
                        <li class="slide">
                            <a href="all-product.php" class="side-menu__item">All Product</a>
                        </li>
                    </ul>
                </li>

                <li class="slide has-sub">
                    <a href="gallery.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M32,216V56a8,8,0,0,1,8-8H216a8,8,0,0,1,8,8V216l-32-16-32,16-32-16L96,216,64,200Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" />
                            <line x1="144" y1="112" x2="192" y2="112" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="144" y1="144" x2="192" y2="144" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <rect x="64" y="96" width="48" height="64" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Add Image</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="gallery.php">Add Image</a>
                        </li>
                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="accessories.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M32,216V56a8,8,0,0,1,8-8H216a8,8,0,0,1,8,8V216l-32-16-32,16-32-16L96,216,64,200Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" />
                            <line x1="144" y1="112" x2="192" y2="112" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="144" y1="144" x2="192" y2="144" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <rect x="64" y="96" width="48" height="64" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Add Accessories</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="accessories.php">Add Accessories</a>
                        </li>
                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="portfolio.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M32,216V56a8,8,0,0,1,8-8H216a8,8,0,0,1,8,8V216l-32-16-32,16-32-16L96,216,64,200Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" />
                            <line x1="144" y1="112" x2="192" y2="112" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="144" y1="144" x2="192" y2="144" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <rect x="64" y="96" width="48" height="64" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Add Portfolio</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="portfolio.php">Add Portfolio</a>
                        </li>
                    </ul>
                </li>
                <li class="slide has-sub">
                    <a href="instagram_reels.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M32,216V56a8,8,0,0,1,8-8H216a8,8,0,0,1,8,8V216l-32-16-32,16-32-16L96,216,64,200Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" />
                            <line x1="144" y1="112" x2="192" y2="112" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="144" y1="144" x2="192" y2="144" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <rect x="64" y="96" width="48" height="64" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Add Instagram Reels</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="instagram_reels.php">Add Instagram Reels</a>
                        </li>
                    </ul>
                </li>

                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <i class="ri-arrow-right-s-line side-menu__angle"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <circle cx="128" cy="96" r="40" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                            <path d="M30,216a98,98,0,0,1,196,0Z" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Blog</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Blog</a>
                        </li>
                        <li class="slide">
                            <a href="add-blogs.php" class="side-menu__item">Add New Blog</a>
                        </li>
                        <li class="slide">
                            <a href="all-blogs.php" class="side-menu__item">All Blogs</a>
                        </li>


                    </ul>
                </li>
                <!-- End::slide -->


                <!-- Start::slide__category -->
                <!-- <li class="slide__category"><span class="category-name">Admin</span></li>  -->




                <!-- <li class="slide has-sub">
                    <a href="today-orders.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <path d="M32,216V56a8,8,0,0,1,8-8H216a8,8,0,0,1,8,8V216l-32-16-32,16-32-16L96,216,64,200Z"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" />
                            <line x1="144" y1="112" x2="192" y2="112" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <line x1="144" y1="144" x2="192" y2="144" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <rect x="64" y="96" width="48" height="64" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Today Order</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="today-orders.php">Today Orders</a>
                        </li>
                    </ul>
                </li>  -->
                <!-- <li class="slide__category"><span class="category-name">Users</span></li>
                <li class="slide">
                    <a href="all_user.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <circle cx="128" cy="96" r="40" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                            <path d="M30,216a98,98,0,0,1,196,0Z" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">All Users</span>
                    </a>
                </li> -->
                <li class="slide">
                    <a href="contact-form-request.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <circle cx="128" cy="96" r="40" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="16" />
                            <path d="M30,216a98,98,0,0,1,196,0Z" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Contact Form Request</span>
                    </a>
                </li>
                <!--<li class="slide">-->
                <!--    <a href="change-password.php" class="side-menu__item">-->
                        <!-- 👤 User Icon -->
                <!--        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">-->
                <!--            <rect width="256" height="256" fill="none"></rect>-->
                <!--            <rect x="40" y="88" width="176" height="128" rx="8" fill="none" stroke="currentColor"-->
                <!--                stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></rect>-->
                <!--            <circle cx="128" cy="152" r="12"></circle>-->
                <!--            <path d="M88,88V56a40,40,0,0,1,80,0V88" fill="none" stroke="currentColor"-->
                <!--                stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>-->
                <!--        </svg>-->
                <!--        <span class="side-menu__label">Change password</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="slide">
                    <a href="logout.php" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <rect x="40" y="88" width="176" height="128" rx="8" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <circle cx="128" cy="152" r="12" />
                            <path d="M88,88V56a40,40,0,0,1,80,0V88" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                        <span class="side-menu__label">Logout</span>
                    </a>
                </li>


                <!-- End::slide -->

            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                    height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>

    </div>

</aside>