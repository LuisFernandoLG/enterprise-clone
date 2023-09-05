<nav class="nav">
    <ul class="nav-container">
        <li>
            <a href="{{ route('rent') }}"
                class="nav-container__link {{ request()->routeIs('rent') ? 'nav-container__link--active' : '' }}">Rent</a>
        </li>
        <li>
            <a href="{{ route('discover') }}"
                class="nav-container__link {{ request()->routeIs('discover') ? 'nav-container__link--active' : '' }}">Discover</a>
        </li>
        <li>
            <a href="{{ route('offices') }}"
                class="nav-container__link {{ request()->routeIs('offices') ? 'nav-container__link--active' : '' }}">Offices</a>
        </li>
        <li>
            <a href="{{ route('bussines') }}"
                class="nav-container__link {{ request()->routeIs('bussines') ? 'nav-container__link--active' : '' }}">Bussines</a>
        </li>
    </ul>
</nav>
