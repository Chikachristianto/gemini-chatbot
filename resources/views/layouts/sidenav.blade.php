<div class="sidenav-menu">

    {{-- Logo Jessica --}}
    <a href="{{ route('user.dashboard.chatbot') }}" class="logo">
        <span class="logo-light">
            <span class="logo-lg jessica-brand">
                <img src="{{ asset('assets/images/jessica/jessica-avatar.jpg') }}" alt="Jessica" class="jessica-brand-img">
                <span class="jessica-brand-text">
                    <strong>Jessica</strong>
                    <small>AI Chatbot</small>
                </span>
            </span>
            <span class="logo-sm text-center">
                <img src="{{ asset('assets/images/jessica/jessica-avatar.jpg') }}" alt="Jessica" class="jessica-brand-img">
            </span>
        </span>
    </a>

    {{-- Tombol bawaan template (hover & tutup sidebar mobile) --}}
    <button class="button-sm-hover"><i class="ti ti-circle align-middle"></i></button>
    <button class="button-close-fullsidebar"><i class="ti ti-x align-middle"></i></button>

    <div data-simplebar>
        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="{{ route('user.dashboard.chatbot') }}"
                    class="side-nav-link {{ request()->routeIs('user.dashboard.chatbot') ? 'active' : '' }}">
                    <span class="menu-icon"><i class="ti ti-message-circle"></i></span>
                    <span class="menu-text">Chat</span>
                </a>
            </li>
        </ul>
    </div>

    {{-- Tagline bawah sidebar --}}
    <div class="sidenav-tagline">
        Selalu ada<br>untuk membantu<br>kamu <i class="ti ti-heart-filled"></i>
    </div>
</div>