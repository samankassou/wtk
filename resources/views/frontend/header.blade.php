<div id="alert-container"></div>
<div class="bravo_topbar d-none d-sm-block">
    <div class="container-fluid w90">
        <div class="row">
            <div class="col-12">
                <div class="content">
                    <div class="topbar-left">
                        <div class="top-socials">
                            <a href="https://www.facebook.com" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://youtube.com" title="Youtube">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    <div class="topbar-right">
                        <ul class="topbar-items">
                            <li><a href="https://flex-home.botble.com/wishlist"><i class="fas fa-heart"></i>
                                    Wishlist(<span class="wishlist-count">0</span>)</a></li>
                        </ul>
                        <div class="header-deliver">/</div>
                        <div class="padtop10 mb-2 language">
                            <div class="language-switcher-wrapper">
                                <div class="d-inline-block d-sm-none language-label">
                                    Languages:
                                </div>
                                <div class="dropdown d-inline-block">
                                    <button class="btn btn-secondary dropdown-toggle btn-select-language" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <img src="{{ asset('assets/img/flags/us.svg') }}" title="English" width="16"
                                            alt="English">
                                        English
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu language_bar_chooser">
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/img/flags/fr.svg') }}" title="Français"
                                                    width="16" alt="Français"> <span>Français</span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="topbar-items">
                            <li class="login-item"><a href="https://flex-home.botble.com/account/dashboard"
                                    rel="nofollow"><i class="fas fa-user"></i> <span>Loyal Wuckert</span></a></li>
                            <li class="login-item"><a href="#"
                                    onclick="if (event.preventDefault(); document.getElementById('logout-form').submit();"
                                    rel="nofollow"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="topmenu bg-light">
    <div id="header-waypoint" class="main-header">
        <div class="container-fluid w90">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('frontend/images/logo-2.png') }}" class="logo" height="40"
                                alt="Wintakam logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" id="header-waypoint"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end animation" id="navbarSupportedContent">
                            <div class="main-menu-darken"></div>
                            <div class="main-menu-content">
                                <div class="d-lg-none bg-primary p-2">
                                    <span class="text-white">Menu</span>
                                    <span class="float-right toggle-main-menu-offcanvas text-white">
                                        <i class="far fa-times-circle"></i>
                                    </span>
                                </div>
                                <div class="main-menu-nav d-lg-flex">
                                    <ul class="navbar-nav justify-content-end menu menu--mobile">
                                        <li class="menu-item   ">
                                            <a href="https://flex-home.botble.com/properties" target="_self">
                                                Properties
                                            </a>
                                        </li>
                                        <li class="menu-item   ">
                                            <a href="https://flex-home.botble.com/agents" target="_self">
                                                Agents
                                            </a>
                                        </li>
                                        <li class="menu-item   ">
                                            <a href="https://flex-home.botble.com/contact" target="_self">
                                                Contact
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="btn btn-primary add-property rounded" href="#">
                                        <i class="fas fa-plus-circle"></i> Add Property
                                    </a>
                                    <div class="d-sm-none">
                                        <div>
                                            <ul class="topbar-items d-block">
                                                <li class="login-item">
                                                    <a href="https://flex-home.botble.com/wishlist"><i
                                                            class="fas fa-heart"></i> Wishlist(<span
                                                            class="wishlist-count">0</span>)</a>
                                                </li>
                                            </ul>
                                            <div class="header-deliver">/</div>
                                            <div class="padtop10 mb-2 language">
                                                <div class="language-switcher-wrapper">
                                                    <div class="d-inline-block d-sm-none language-label">
                                                        Languages:
                                                    </div>
                                                    <div class="dropdown d-inline-block">
                                                        <button
                                                            class="btn btn-secondary dropdown-toggle btn-select-language"
                                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="true">
                                                            <img src="https://flex-home.botble.com/vendor/core/core/base/images/flags/us.svg"
                                                                title="English" width="16" alt="English">
                                                            English
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu language_bar_chooser">
                                                            <li>
                                                                <a href="https://flex-home.botble.com/vi">
                                                                    <img src="https://flex-home.botble.com/vendor/core/core/base/images/flags/vn.svg"
                                                                        title="Français" width="16" alt="Français">
                                                                    <span>Français</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="topbar-items d-block">
                                                <li class="login-item"><a
                                                        href="https://flex-home.botble.com/account/dashboard"
                                                        rel="nofollow"><i class="fas fa-user"></i> <span>Loyal
                                                            Wuckert</span></a></li>
                                                <li class="login-item"><a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                        rel="nofollow"><i class="fas fa-sign-out-alt"></i>
                                                        Logout</a></li>
                                            </ul>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="home_banner"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)) ,url({{ asset('frontend/images/home/bg-md.jpg') }})">
        <div class="topsearch">
            <h1 class="text-center text-white mb-4 banner-text-description">
                Find your next house easely on <span style="color: #10B981;">Wintakam</span>
            </h1>
            <form action="https://flex-home.botble.com/properties" method="GET" id="frmhomesearch">
                <div class="typesearch" id="hometypesearch">
                    <a href="javascript:void(0)" class="active" rel="rent" data-url="https://flex-home.botble.com/properties">Rent</a>
                    <a href="javascript:void(0)" rel="sale"
                        data-url="https://flex-home.botble.com/properties">Sale</a>
                </div>
                <div class="input-group input-group-lg" style="background-color: rgba(0, 0, 0, 0.5)">
                    <input type="hidden" name="type" value="project" id="txttypesearch">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <div class="keyword-input">
                        <input type="text" class="form-control" name="k" placeholder="Enter keyword..." id="txtkey"
                            autocomplete="off">
                        <div class="spinner-icon">
                            <i class="fas fa-spin fa-spinner"></i>
                        </div>
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <div class="location-input" data-url="https://flex-home.botble.com/ajax/cities">
                        <input type="hidden" name="city_id">
                        <input class="select-city-state form-control" name="location" value=""
                            placeholder="Location, City" autocomplete="off">
                        <div class="spinner-icon">
                            <i class="fas fa-spin fa-spinner"></i>
                        </div>
                        <div class="suggestion">
                        </div>
                    </div>
                    <div class="input-group-append search-button-wrapper">
                        <button class="btn btn-orange" type="submit">Search</button>
                    </div>
                    <div class="advanced-search d-none d-sm-block">
                        <a href="#" class="advanced-search-toggler">Advanced <i class="fas fa-caret-down"></i></a>
                        <div class="advanced-search-content property-advanced-search">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 pr-md-1">
                                        <div class="form-group">
                                            <label for="select-category"
                                                class="control-label text-white">Category</label>
                                            <div class="select--arrow">
                                                <select name="category_id" id="select-category" class="form-control">
                                                    <option value="">-- Select --</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 px-md-1">
                                        <div class="form-group">
                                            <label for="select-bedroom"
                                                class="control-label text-white">Bedrooms</label>
                                            <div class="select--arrow">
                                                <select name="bedroom" id="select-bedroom" class="form-control">
                                                    <option value="">-- Select --</option>
                                                    <option value="1">
                                                        1 room
                                                    </option>
                                                    <option value="2">
                                                        2 rooms
                                                    </option>
                                                    <option value="3">
                                                        3 rooms
                                                    </option>
                                                    <option value="4">
                                                        4 rooms
                                                    </option>
                                                    <option value="5">5+ rooms</option>
                                                </select>
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 px-md-1">
                                        <div class="form-group">
                                            <label for="select-bathroom"
                                                class="control-label text-white">Bathrooms</label>
                                            <div class="select--arrow">
                                                <select name="bathroom" id="select-bathroom" class="form-control">
                                                    <option value="">-- Select --</option>
                                                    <option value="1">
                                                        1 room
                                                    </option>
                                                    <option value="2">
                                                        2 rooms
                                                    </option>
                                                    <option value="3">
                                                        3 rooms
                                                    </option>
                                                    <option value="4">
                                                        4 rooms
                                                    </option>
                                                    <option value="5">5+ rooms</option>
                                                </select>
                                                <i class="fas fa-angle-down"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listsuggest">
                </div>
            </form>
        </div>
    </div>
    </div>
</header>
