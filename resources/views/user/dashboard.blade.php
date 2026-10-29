{{-- resources/views/user/chatbot.blade.php --}}
@extends('template', ['title' => 'Jessica AI Chatbot'])

@section('content')
    {{-- ===== Tema Biru Jessica =====
         biru #2563eb | biru terang #3b82f6 | biru muda #dbeafe / #e8f1ff | navy #1e3a8a | garis #cfe0fb --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&display=swap');

        :root {
            --j-blue: #2563eb;
            --j-blue-2: #3b82f6;
            --j-blue-dark: #1d4ed8;
            --j-navy: #1e3a8a;
            --j-soft: #e3efff;
            --j-soft-2: #f1f7ff;
            --j-line: #cfe0fb;
            --j-text: #1e3a5f;
            --j-avatar: url('{{ asset('assets/images/jessica/jessica-avatar.jpg') }}');
        }

        /* ---------- Latar halaman ---------- */
        body,
        .content-page {
            background: linear-gradient(160deg, #eaf3ff 0%, #f5f9ff 100%);
            background-attachment: fixed;
        }

        /* ---------- Sidebar ---------- */
        .sidenav-menu {
            background: linear-gradient(180deg, #e3efff 0%, #d6e8ff 100%) !important;
            border-right: 1px solid var(--j-line);
            overflow: hidden;
        }

        .sidenav-menu .logo {
            background: transparent !important;
            height: 90px;
            display: flex;
            align-items: center;
            padding: 0 16px;
            overflow: hidden;
        }

        .sidenav-menu .logo-light,
        .sidenav-menu .logo-lg,
        .sidenav-menu .logo-sm {
            background: transparent !important;
        }

        .jessica-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .jessica-brand-img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            background: #fff;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(37, 99, 235, .25);
        }

        .jessica-brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .jessica-brand-text strong {
            font-size: 22px;
            font-weight: 800;
            color: var(--j-blue);
        }

        .jessica-brand-text small {
            font-size: 13px;
            font-weight: 600;
            color: var(--j-navy);
        }

        .sidenav-menu .side-nav {
            padding-top: 12px;
        }

        .sidenav-menu .side-nav-link,
        .sidenav-menu .side-nav-link:focus {
            background: transparent !important;
            color: var(--j-text) !important;
            border: 0 !important;
            outline: 0 !important;
            box-shadow: none !important;
            border-radius: 12px;
            margin: 4px 12px;
            padding-top: 12px;
            padding-bottom: 12px;
            font-weight: 500;
        }

        .sidenav-menu .side-nav-link .menu-icon {
            color: var(--j-navy) !important;
            font-size: 20px;
        }

        .sidenav-menu .side-nav-link:hover {
            background: rgba(255, 255, 255, .6) !important;
            color: var(--j-blue) !important;
        }

        .sidenav-menu .side-nav-link.active {
            background: #bfdbfe !important;
            color: var(--j-blue) !important;
            font-weight: 600;
        }

        .sidenav-menu .side-nav-link.active .menu-icon,
        .sidenav-menu .side-nav-link.active .menu-text {
            color: var(--j-blue) !important;
        }

        .sidenav-tagline {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 90px 24px 28px;
            font-family: 'Caveat', cursive;
            font-size: 24px;
            line-height: 1.15;
            color: var(--j-blue);
            transform-origin: left bottom;
            background:
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 300 120' preserveAspectRatio='none'%3E%3Cpath d='M0 60 Q70 20 140 55 T300 40 V120 H0Z' fill='%23bfdbfe'/%3E%3Cpath d='M0 85 Q80 50 150 80 T300 70 V120 H0Z' fill='%2393c5fd' fill-opacity='.7'/%3E%3C/svg%3E") bottom / 100% 120px no-repeat;
            pointer-events: none;
        }

        .sidenav-tagline i {
            font-size: 18px;
        }

        /* ---------- Topbar ---------- */
        .app-topbar {
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(6px);
            border-bottom: 1px solid var(--j-line);
            display: flex;
            align-items: center;
            min-height: 70px;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .app-topbar .topbar-menu {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .app-topbar .btn,
        .app-topbar .btn:hover,
        .app-topbar .btn:focus {
            box-shadow: none !important;
        }

        .sidenav-toggle-button,
        .sidenav-toggle-button:hover,
        .sidenav-toggle-button:focus {
            background: var(--j-soft-2) !important;
            border: 1px solid var(--j-line) !important;
            color: var(--j-blue) !important;
            box-shadow: none !important;
        }

        /* ---------- Footer ---------- */
        .footer {
            background: #fff;
            border-top: 1px solid var(--j-line);
        }

        /* ---------- Tombol & input ---------- */
        .btn-primary {
            background: var(--j-blue);
            border-color: var(--j-blue);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--j-blue-dark);
            border-color: var(--j-blue-dark);
            color: #fff;
        }

        .btn-primary:active,
        .btn-primary:focus,
        .btn-primary:focus-visible,
        .btn-primary.active {
            background: #fff !important;
            border-color: var(--j-blue) !important;
            color: var(--j-blue) !important;
            box-shadow: none !important;
        }

        /* Saat AI sedang mengetik (tombol & input dinonaktifkan) */
        .btn-primary:disabled,
        .btn-primary.disabled,
        #chat-send:disabled {
            background: #fff !important;
            border-color: #93c5fd !important;
            color: #60a5fa !important;
            opacity: 1 !important;
            box-shadow: none !important;
        }

        .form-control:disabled,
        #chat-input:disabled {
            background: transparent !important;
            color: #94a3b8 !important;
            opacity: 1 !important;
        }

        .form-control:focus {
            border-color: var(--j-blue);
            box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .15);
        }

        /* ---------- Susunan halaman: chat + panel kanan ---------- */
        .jessica-layout {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            max-width: 1100px;
            margin: 24px auto 0;
        }

        .jessica-main {
            flex: 1 1 auto;
            min-width: 0;
        }

        .jessica-side {
            flex: 0 0 300px;
            width: 300px;
        }

        @media (max-width: 1199.98px) {
            .jessica-side {
                display: none;
            }
        }

        /* ---------- Kotak chat ---------- */
        .chat-card {
            background: #fff;
            border: 1px solid var(--j-line);
            border-radius: 20px;
            box-shadow: 0 8px 28px rgba(37, 99, 235, .10);
            margin-bottom: 0;
            overflow: hidden;
        }

        .chat-card .card-header,
        .chat-card .card-footer {
            background: #fff;
            border-color: var(--j-line);
        }

        .chat-card .card-header {
            padding: 14px 20px;
        }

        .chat-head-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--j-soft);
        }

        .chat-head-name {
            font-size: 20px;
            font-weight: 700;
            color: var(--j-blue);
            line-height: 1.1;
        }

        .chat-head-status {
            font-size: 14px;
            color: var(--j-text);
        }

        .chat-head-status .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #22c55e;
            margin-right: 6px;
        }

        #chat-clear {
            width: 40px;
            height: 40px;
            padding: 0;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1px solid var(--j-line);
            color: var(--j-navy);
            font-size: 20px;
        }

        #chat-clear:hover {
            background: var(--j-soft);
            color: var(--j-blue);
        }

        #chat-clear:active,
        #chat-clear:focus {
            background: #fff !important;
            border-color: var(--j-blue) !important;
            color: var(--j-blue) !important;
            box-shadow: none !important;
        }

        #chat-box {
            background: #fff;
            padding: 24px 20px;
        }

        #chat-placeholder i {
            color: #93c5fd !important;
        }

        /* Gelembung pesan (dipakai chatbot.js) */
        .chat-msg {
            position: relative;
            max-width: 75%;
            padding: 12px 18px;
            margin-bottom: 18px;
            border-radius: 18px;
            word-wrap: break-word;
            white-space: pre-wrap;
            color: var(--j-text);
            line-height: 1.5;
        }

        /* Pesan AI: biru muda + avatar Jessica di kiri */
        .chat-msg.bot {
            margin-right: auto;
            margin-left: 58px;
            background: var(--j-soft);
            border-top-left-radius: 6px;
        }

        .chat-msg.bot::before {
            content: "";
            position: absolute;
            left: -58px;
            top: 0;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #fff var(--j-avatar) center / cover no-repeat;
            border: 2px solid var(--j-soft);
        }

        /* Pesan Anda: biru + ikon user di kanan */
        .chat-msg.user {
            margin-left: auto;
            margin-right: 58px;
            background: var(--j-blue-2);
            color: #fff;
            border-top-right-radius: 6px;
        }

        .chat-msg.user::after {
            content: "";
            position: absolute;
            right: -58px;
            top: 0;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--j-blue-2) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Ccircle cx='12' cy='8' r='4'/%3E%3Cpath d='M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8z'/%3E%3C/svg%3E") center / 24px no-repeat;
        }

        /* ---------- Input pesan ---------- */
        .chat-card .card-footer {
            padding: 16px 20px;
        }

        .chat-input-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 6px 6px 18px;
            background: #fff;
            border: 1px solid var(--j-line);
            border-radius: 999px;
            box-shadow: 0 2px 10px rgba(37, 99, 235, .06);
        }

        .chat-input-wrap:focus-within {
            border-color: var(--j-blue);
            box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .12);
        }

        #chat-input {
            flex: 1;
            border: 0 !important;
            box-shadow: none !important;
            background: transparent;
            resize: none;
            padding: 8px 0;
            color: var(--j-text);
        }

        #chat-input::placeholder {
            color: #6b8bc4;
        }

        #chat-send {
            width: 46px;
            height: 46px;
            flex: 0 0 46px;
            padding: 0;
            border-radius: 50% !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        /* ---------- Panel kanan ---------- */
        .side-hero {
            text-align: center;
            padding: 8px 8px 0;
        }

        .side-hero img {
            width: 190px;
            height: 190px;
            object-fit: cover;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 8px 24px rgba(37, 99, 235, .18);
        }

        .side-hero h3 {
            margin: 14px 0 0;
            font-size: 36px;
            font-weight: 800;
            color: var(--j-blue);
            line-height: 1;
        }

        .side-hero .sub {
            font-weight: 700;
            font-size: 20px;
            color: var(--j-navy);
        }

        .side-hero p {
            color: var(--j-text);
            margin: 8px 0 0;
        }

        .side-card {
            background: #fff;
            border: 1px solid var(--j-line);
            border-radius: 18px;
            padding: 18px;
            margin-top: 18px;
            box-shadow: 0 6px 20px rgba(37, 99, 235, .08);
        }

        .side-card h6 {
            font-weight: 700;
            color: var(--j-navy);
            margin-bottom: 14px;
        }

        .fitur-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }

        .fitur-item:last-child {
            margin-bottom: 0;
        }

        .fitur-icon {
            flex: 0 0 44px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--j-soft);
            color: var(--j-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .fitur-item strong {
            display: block;
            font-size: 14px;
            color: var(--j-text);
        }

        .fitur-item small {
            color: #6b7f9e;
        }

        .side-hello {
            font-family: 'Caveat', cursive;
            font-size: 28px;
            color: var(--j-blue);
            text-align: center;
            margin-top: 12px;
            transform: rotate(-4deg);
        }
    </style>

    <div class="jessica-layout">

        {{-- ===== Kolom tengah: kotak chat ===== --}}
        <div class="jessica-main">
            <div id="chatbot-app" class="card chat-card"
                data-url-kirim="{{ route('user.dashboard.chatbot.kirim') }}">

                {{-- Header --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('assets/images/jessica/jessica-avatar.jpg') }}" alt="Jessica"
                            class="chat-head-avatar">
                        <div>
                            <div class="chat-head-name">Jessica</div>
                        </div>
                    </div>
                    <button type="button" class="btn" id="chat-clear" title="Bersihkan chat">
                        <i class="ti ti-trash"></i>
                    </button>
                </div>

                {{-- Area pesan --}}
                <div class="card-body overflow-auto" id="chat-box" style="height: 62vh;">
                    <div class="text-center text-muted py-5" id="chat-placeholder">
                        <i class="ti ti-message-chatbot fs-48 d-block mb-2"></i>
                        Halo! Aku Jessica, AI Chatbot kamu. Ketik pesan di bawah untuk mulai mengobrol.
                    </div>
                </div>

                {{-- Input pesan --}}
                <div class="card-footer">
                    <div id="chat-form" class="chat-input-wrap">
                        @csrf
                        <textarea class="form-control" id="chat-input" rows="1" placeholder="Ketik pesan kamu di sini..." required></textarea>
                        <button type="button" class="btn btn-primary" id="chat-send" title="Kirim">
                            <i class="ti ti-send"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== Kolom kanan: profil & fitur Jessica ===== --}}
        <aside class="jessica-side">
            <div class="side-hero">
                <img src="{{ asset('assets/images/jessica/jessica-avatar.jpg') }}" alt="Jessica AI Chatbot">
                <h3>Jessica</h3>
                <div class="sub">AI Chatbot</div>
                <p>Siap membantu,<br>kapan saja, di mana saja</p>
            </div>

            <div class="side-card">
                <h6>Fitur Jessica</h6>
                <div class="fitur-item">
                    <span class="fitur-icon"><i class="ti ti-bolt"></i></span>
                    <div><strong>Jawab Pertanyaan</strong><small>Informasi cepat dan akurat</small></div>
                </div>
                <div class="fitur-item">
                    <span class="fitur-icon"><i class="ti ti-book"></i></span>
                    <div><strong>Bantu Belajar</strong><small>Penjelasan mudah dipahami</small></div>
                </div>
                <div class="fitur-item">
                    <span class="fitur-icon"><i class="ti ti-bulb"></i></span>
                    <div><strong>Solusi &amp; Rekomendasi</strong><small>Dari berbagai kebutuhan</small></div>
                </div>
            </div>

            <div class="side-hello">Happy Chatting! <i class="ti ti-heart-filled"></i></div>
        </aside>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/chatbot.js') }}"></script>
@endpush