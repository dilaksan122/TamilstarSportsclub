<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a href="{{ route('aboutUs.index') }}" aria-expanded="false">
                    <i class="icon icon-info"></i>
                    <span class="nav-text">About Us</span>
                </a>
            </li>
            <li>
                <a href="{{ route('galleries.index') }}" aria-expanded="false">
                    <i class="icon icon-picture"></i>
                    <span class="nav-text">Galleries</span>
                </a>
            </li>
            <li>
                <a href="{{ route('match-features.index') }}" aria-expanded="false">
                    <i class="icon icon-trophy"></i>
                    <span class="nav-text">Match Features</span>
                </a>
            </li>
            <li>
                <a href="{{ route('events.index') }}" aria-expanded="false">
                    <i class="icon icon-calendar"></i>
                    <span class="nav-text">Events</span>
                </a>
            </li>
            <li>
                <a href="{{ route('news.index') }}" aria-expanded="false">
                    <i class="icon icon-news"></i>
                    <span class="nav-text">News</span>
                </a>
            </li>
            <li>
                <a href="{{ route('players.index') }}" aria-expanded="false">
                    <i class="icon icon-group"></i>
                    <span class="nav-text">Players</span>
                </a>
            </li>
            <!-- New Menu Items -->
            <li>
                <a href="{{ route('admin.club_info.index') }}" aria-expanded="false">
                    <i class="icon icon-info-circle"></i>
                    <span class="nav-text">Club Info</span>
                </a>
            </li>
            <li>
                <a href="{{ route('founders.index') }}" aria-expanded="false">
                    <i class="icon icon-star"></i>
                    <span class="nav-text">Founders</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.comments.index') }}" aria-expanded="false">
                    <i class="icon icon-comment"></i>
                    <span class="nav-text">Comments</span>
                </a>
            </li>
            <!-- Logout Menu Item -->
            <li>
                <a href="{{ route('admin.logout') }}" aria-expanded="false">
                    <i class="icon icon-logout"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
