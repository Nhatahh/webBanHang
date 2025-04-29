<!-- Header -->
<header class="sticky-top">
    <div class="marquee-container" style="background-color: white">
    <marquee behavior="scroll" direction="left"
        >🔥 Giảm giá sốc 30% toàn bộ sản phẩm! Mua ngay kẻo lỡ! 🚀</marquee
    >
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand fs-1" href="{{ route('user.home') }}">
        <img
            src="{{ asset('images/logo2.jpg') }}"
            alt="logo"
            width="50"
            height="50"
            class="d-inline-block align-text-top"
        />
        NHATAHH
        </a>
        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarScroll"
        aria-controls="navbarScroll"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
        <ul
            class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
            style="--bs-scroll-height: 100px"
        >
            <li class="nav-item">
            <a class="nav-link" href="{{ route('user.tatcasp') }}">
                SẢN PHẨM <i class="bi bi-chevron-compact-down"></i
            ></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('user.ao') }}">
                ÁO NAM <i class="bi bi-chevron-compact-down"></i
            ></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('user.quan') }}">
                QUẦN NAM <i class="bi bi-chevron-compact-down"></i
            ></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('user.membership') }}">
                MEMBERSHIP
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('user.chinhsach') }}">
                CHÍNH SÁCH
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('user.ptthanhtoan') }}">
                PHƯƠNG THỨC THANH TOÁN
            </a>
            </li>
        </ul>
        <form id="searchForm">
            <div class="input-group">
                <input id="searchInput" class="form-control" placeholder="Tìm kiếm sản phẩm..." />
                <button class="btn btn-outline-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form> 
        <div class="nav-icons mx-3">
            <a href="{{ route('user.giohang') }}"><i class="bi bi-bag"></i></a>
            <a href="{{ route('user.dangnhap') }}"
            ><i class="bi bi-person-circle"></i
            ></a>
        </div>
        </div>
    </div>
    <div id="searchResults" class="search-results" style="position: absolute;"></div>
    </nav>
</header>