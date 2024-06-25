<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/mainpage.css') }}" />
</head>

<body>
    <div>
        <div>
            <aside class="sidebar">
                <div class="sidebar-header"></div>
                <ul class="sidebar-links">
                    <h4>
                        <span>Main Menu</span>
                        <div style="height: 20px"></div>
                    </h4>
                    <li>
                        <a href="{{ route('mainpage.index') }}">
                            <span class="material-symbols-outlined"> dashboard </span> Stok
                            Barang</a>
                    </li>
                    </li>
                    <li>
                        <a href="{{ route('purchase.index') }}"><span class="material-symbols-outlined"> move_up
                            </span>Purchase Item</a>
                    </li>
                    <li>
                        <a href="{{ route('sold_item.index') }}"><span class="material-symbols-outlined"> flag
                            </span>Sold
                            item</a>
                    </li>
                    <li>
                        <a href="{{ route('service') }}"><span class="material-symbols-outlined"> flag
                            </span>Service</a>
                    </li>
                    <li>
                        <a href="{{ route('note') }}"><span class="material-symbols-outlined"> flag </span>Note</a>
                    </li>
                </ul>
            </aside>
        </div>

        <div class="profile-button">
            <nav class="nav-profile">
                <img src="{{ asset('image/Goedang.png') }}" class="brand-logo" style="width: 30px; height: 30px" />
                <ul class="navbar-list-left">
                    <li class="navbar-list-item">
                        <a href="#" class="navbar-link">Goedang</a>
                    </li>
                </ul>

                <ul class="navbar-list-right">
                    <li class="navbar-list-item">
                        <a href="#" class="navbar-link">Inbox</a>
                    </li>
                </ul>
                <img src="{{ asset('image/profile-img.jpg') }}" class="profile-logo" onclick="toggleMenu()"
                    style="width: 30px; height: 30px" />
                <div class="sub-menu-wrap" id="submenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <div class="user-profile">
                                <img src="{{ asset('image/profile-img.jpg') }}" alt="Profile Image" />
                                <div class="user-detail">
                                    <h3>Vincent Alexander</h3>
                                </div>
                            </div>
                        </div>
                        <hr class="sub-menu-hr" />
                        <a href="/profile" class="sub-menu-link">
                            <i class="fa-solid fa-user sub-menu-link-img"></i>
                            <p class="profile-dropdown-button" href="route('profile.edit')">Edit Profile</p>
                        </a>
                        <!-- <hr class="sub-menu-link-hr"> -->
                        <a href="#" class="sub-menu-link">
                            <i class="fa-solid fa-gear sub-menu-link-img"></i>
                            <p class="profile-dropdown-button">Settings & Privacy</p>
                        </a>
                        <!-- <hr class="sub-menu-link-hr"> -->
                        <a href="#" class="sub-menu-link">
                            <i class="fa-solid fa-circle-question sub-menu-link-img"></i>
                            <p class="profile-dropdown-button">Help & Support</p>
                        </a>
                        <!-- <hr class="sub-menu-link-hr"> -->
                        <a href="#" class="sub-menu-link" style=" height: 24px">
                            <i class="fa-solid fa-arrow-right-from-bracket sub-menu-link-img"></i>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <p :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                    style="color: white; margin-bottom: 0">
                                    {{ __('Log Out') }}
                                </p>
                            </form>
                        </a>
                        <!-- <hr class="sub-menu-link-hr"> -->
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <main>
        {{ $slot }}
    </main>
    <script src="{{ asset('js/mainpage.js') }}"></script>


</body>

</html>
