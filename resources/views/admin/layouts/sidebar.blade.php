<!-- Sidebar Menu -->
<nav class="mt-2">

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Bosh sahifa -->
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Саҳифайи асосий</p>
            </a>
        </li>

    @php
        $movieActive = request()->is('movies*');
        $statisticActive = request()->is('statistic*');
        $botActive = request()->is('bots*');
        $adsActive = request()->is('ads*');
    @endphp

    <!-- Movies Menyusi -->
        <li class="nav-item {{ $movieActive ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ $movieActive ? 'active' : '' }}">

                <p>🎬 Филмҳо</p>
                <i class="right fas fa-angle-left"></i>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('movies.create') }}"
                       class="nav-link {{ request()->is('movies/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>➕ Илова кардан</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('movies.index') }}"
                       class="nav-link {{ request()->is('movies') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>👁️ Чизҳои иловашуда</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Bot Ads Menyusi -->
        <li class="nav-item {{ $botActive ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ $botActive ? 'active' : '' }}">
                <p>🤖 Рекламаҳои бот</p>
                <i class="right fas fa-angle-left"></i>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('bots.create') }}"
                       class="nav-link {{ request()->is('bots/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>➕ Илова кардан</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('bots.index') }}"
                       class="nav-link {{ request()->is('bots') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>👁️ Дидан</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Ads Menyusi -->
        <li class="nav-item {{ $adsActive ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ $adsActive ? 'active' : '' }}">
                <p>📢 Рекламаҳо</p>
                <i class="right fas fa-angle-left"></i>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('ads.create') }}"
                       class="nav-link {{ request()->is('ads/create') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>➕ Илова кардан</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('ads.index') }}"
                       class="nav-link {{ request()->is('ads') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>👁️ Дидан</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Statistics Menyusi -->
        <li class="nav-item {{ $statisticActive ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ $statisticActive ? 'active' : '' }}">
                <p>📊 Статистика</p>
                <i class="right fas fa-angle-left"></i>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('statistic.index') }}"
                       class="nav-link {{ request()->is('statistic') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>👁️ Дидан</p>
                    </a>
                </li>
            </ul>
        </li>


    </ul>

</nav>
<!-- /.sidebar-menu -->
