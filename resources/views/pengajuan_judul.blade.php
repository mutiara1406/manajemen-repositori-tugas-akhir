<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pengajuan Judul TA | Repositori UIN Suka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-teal: #008B8B;
            --primary-dark: #006666;
            --accent-orange: #FF6B35;
            --bg-color: #f5f7fa;
            --card-border: #e1e8ed;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: #2c3e50;
            display: flex;
            flex-direction: column;
        }
        
        .main-wrapper {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 56px);
        }
        
        .sidebar-nav {
            width: 240px;
            background: #ffffff;
            padding: 0;
            height: calc(100vh - 56px);
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.08);
            position: fixed;
            top: 56px;
            left: 0;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            z-index: 999;
            transition: transform 0.3s ease;
            border-radius: 0 1rem 1rem 0;
            border-right: 1px solid #e0e0e0;
        }
        
        .sidebar-nav.sidebar-collapsed {
            transform: translateX(-100%);
        }
        
        .content-area-wrapper {
            margin-left: 240px;
            flex: 1;
            transition: margin-left 0.3s ease;
        }
        
        .content-area-wrapper.sidebar-collapsed {
            margin-left: 0;
        }
        
        /* Hamburger Menu Button */
        .hamburger-btn {
            width: 38px;
            height: 38px;
            border-radius: 0.5rem;
            background: rgba(255,255,255,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            padding: 0;
        }
        
        .hamburger-btn:hover {
            background: rgba(255,255,255,0.2);
        }
        
        .hamburger-btn span {
            display: block;
            width: 18px;
            height: 2px;
            background: white;
            border-radius: 1px;
            transition: all 0.3s ease;
        }

        /* Typing Indicator Animation */
        .typing-indicator {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .typing-indicator span {
            width: 8px;
            height: 8px;
            background: #667eea;
            border-radius: 50%;
            animation: typing 1.4s infinite ease-in-out;
        }
        
        .typing-indicator span:nth-child(1) { animation-delay: 0s; }
        .typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
        .typing-indicator span:nth-child(3) { animation-delay: 0.4s; }
        
        @keyframes typing {
            0%, 60%, 100% { transform: translateY(0); opacity: 0.4; }
            30% { transform: translateY(-8px); opacity: 1; }
        }
        
        /* Quick Option Buttons */
        .quick-option {
            transition: all 0.3s ease;
            font-size: 0.8rem;
        }
        
        .quick-option:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .sidebar-nav .nav-link {
            color: #2c3e50;
            padding: 0.65rem 0.85rem;
            border-left: 3px solid transparent;
            transition: all 0.2s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-size: 0.8rem;
            margin: 0.15rem 0.5rem;
            border-radius: 0.5rem;
            position: relative;
        }
        
        .sidebar-nav .nav-link:hover {
            background: #e6f2f2;
            color: #008B8B;
            border-left-color: #008B8B;
        }
        
        .sidebar-nav .nav-link.active {
            background: #d9efef;
            color: #008B8B;
            border-left-color: #008B8B;
            font-weight: 600;
        }
        
        .sidebar-nav .nav-link svg {
            width: 30px;
            height: 30px;
            padding: 7px;
            background: #e6f2f2;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            color: #008B8B;
        }
        
        .sidebar-nav .nav-link:hover svg,
        .sidebar-nav .nav-link.active svg {
            background: #008B8B;
            color: white;
        }
        
        .content-area {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
            background: #f8f9fa;
        }
        
        .tab-content {
            animation: fadeIn 0.3s ease-in;
        }
        
        @media (max-width: 768px) {
            .sidebar-nav {
                width: 100%;
                min-height: auto;
                padding: 1rem 0;
                display: flex;
                overflow-x: auto;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }
            
            .sidebar-nav .nav-link {
                padding: 0.75rem 1rem;
                border-left: none;
                border-bottom: 3px solid transparent;
                white-space: nowrap;
            }
            
            .sidebar-nav .nav-link:hover {
                border-left: none;
                border-bottom-color: var(--primary-teal);
            }
            
            .sidebar-nav .nav-link.active {
                border-left: none;
                border-bottom: 3px solid var(--primary-teal);
            }
            
            .main-wrapper {
                flex-direction: column;
            }
            
            .content-area {
                padding: 1rem;
            }
        }
        
        .navbar-custom {
            background-color: #ffffff;
            border-bottom: 1px solid var(--card-border);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .brand-text {
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        .btn-custom-green {
            background-color: var(--primary-teal);
            border-color: var(--primary-teal);
            color: #ffffff;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        .btn-custom-green:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(46, 204, 113, 0.3);
        }
        
        .card {
            border: 1px solid var(--card-border);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: white !important;
            border-bottom: 1px solid var(--card-border);
            padding: 0.875rem 1rem;
        }
        .card-header h5 {
            color: #2c3e50;
            font-weight: 600;
            margin: 0;
            font-size: 0.95rem;
        }
        
        .card-body {
            padding: 1rem;
            font-size: 0.85rem;
        }
        
        .form-label {
            font-size: 0.8rem;
            margin-bottom: 0.3rem;
        }
        
        .form-control, .form-select {
            font-size: 0.8rem;
            padding: 0.4rem 0.65rem;
        }
        
        .btn {
            font-size: 0.8rem;
            padding: 0.4rem 0.75rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-teal);
            box-shadow: 0 0 0 0.15rem rgba(0, 139, 139, 0.15);
        }
        .badge-peminatan {
            font-size: 0.75rem;
            padding: 0.35rem 0.5rem;
        }
        .chat-box .message {
            margin-bottom: 1rem;
        }
        .message.sent {
            text-align: right;
        }
        .message.sent .bubble {
            background-color: var(--primary-teal);
            color: white;
            display: inline-block;
            padding: 0.75rem 1rem;
            border-radius: 1rem;
            max-width: 70%;
        }
        .message.received .bubble {
            background-color: #e9ecef;
            display: inline-block;
            padding: 0.75rem 1rem;
            border-radius: 1rem;
            max-width: 70%;
        }
        
        .tab-content {
            animation: fadeIn 0.4s ease-in;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .judul-card {
            background: white;
            padding: 1rem;
            border: 1px solid var(--card-border);
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .judul-card:hover {
            box-shadow: 0 4px 12px rgba(0, 139, 139, 0.15);
            border-color: var(--primary-teal);
        }
        .judul-card h6 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.5rem;
            line-height: 1.4;
            font-size: 0.85rem;
        }
        .judul-card p {
            color: #7f8c8d;
            font-size: 0.8rem;
            margin-bottom: 0.75rem;
            line-height: 1.5;
        }
        
        .table {
            font-size: 0.8rem;
        }
        .table thead {
            background-color: var(--bg-color);
            border-bottom: 2px solid var(--card-border);
        }
        .table thead th {
            font-weight: 600;
            color: #2c3e50;
            border: none;
            font-size: 0.8rem;
            padding: 0.6rem 0.75rem;
        }
        .table tbody td {
            padding: 0.5rem 0.75rem;
            font-size: 0.8rem;
        }
        .table tbody tr {
            border-bottom: 1px solid var(--card-border);
            transition: all 0.2s ease;
        }
        .table tbody tr:hover {
            background-color: var(--bg-color);
        }

        /* Pagination Styling */
        .pagination {
            gap: 0.15rem;
        }
        .page-link {
            color: var(--primary-dark);
            border: 1px solid var(--card-border);
            border-radius: 0.3rem;
            padding: 0.3rem 0.5rem;
            font-weight: 500;
            font-size: 0.75rem;
            transition: all 0.2s ease;
            background-color: white;
        }
        .page-link:hover {
            background-color: var(--primary-teal);
            border-color: var(--primary-teal);
            color: white;
        }
        .page-item.active .page-link {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white;
        }
        .page-item.disabled .page-link {
            color: #bdbdbd;
            background-color: #f5f5f5;
            border-color: #e0e0e0;
            cursor: not-allowed;
        }
        .pagination + .text-center {
            margin-top: 0.75rem;
            font-size: 0.75rem;
        }
        
        /* Content Area Text Sizes */
        .content-area h5, .content-area h6 {
            font-size: 0.9rem;
        }
        .content-area p, .content-area span, .content-area label {
            font-size: 0.8rem;
        }
        .content-area small {
            font-size: 0.7rem;
        }
        .fw-bold {
            font-size: 0.8rem;
        }
        .mb-3 label.form-label {
            font-size: 0.8rem;
        }

        /* ========== FLOATING CHAT STYLES ========== */
        .floating-chat-btn {
            position: fixed;
            bottom: 25px;
            right: 25px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #006666 0%, #008B8B 100%);
            border: none;
            cursor: grab;
            box-shadow: 0 4px 20px rgba(0, 102, 102, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            transition: box-shadow 0.3s ease, transform 0.1s ease;
            user-select: none;
            touch-action: none;
        }
        .floating-chat-btn:active {
            cursor: grabbing;
        }
        .floating-chat-btn.dragging {
            cursor: grabbing;
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(0, 102, 102, 0.6);
        }
        .floating-chat-btn:hover:not(.dragging) {
            box-shadow: 0 6px 25px rgba(0, 102, 102, 0.5);
        }
        .floating-chat-btn .chat-icon,
        .floating-chat-btn .close-icon {
            transition: all 0.3s ease;
        }
        .floating-chat-btn .close-icon {
            display: none;
        }
        .floating-chat-btn.active .chat-icon {
            display: none;
        }
        .floating-chat-btn.active .close-icon {
            display: block;
        }
        .floating-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #dc3545;
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            min-width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }

        .floating-chat-window {
            position: fixed;
            bottom: 100px;
            right: 25px;
            width: 380px;
            height: 520px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            display: none;
            flex-direction: column;
            z-index: 9999;
            overflow: hidden;
            animation: slideUp 0.3s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .floating-chat-window.active {
            display: flex;
        }

        .floating-chat-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .floating-chat-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }
        .floating-chat-info h6 {
            color: white;
            margin: 0;
            font-size: 0.95rem;
            font-weight: 600;
        }
        .floating-chat-info span {
            color: rgba(255,255,255,0.8);
            font-size: 0.75rem;
        }
        .floating-chat-info .online-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background: #4ADE80;
            border-radius: 50%;
            margin-right: 5px;
        }

        .floating-chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            background: #e5ddd5 url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAASUlEQVRoge3QMQEAIAzAsKB/z2MB4hckGdCb3T0r/P5+ACyjhLyUkJcS8lJCXkrISwl5KSEvJeSlhLyUkJcS8lJCXkrISwl5nQfvZQLDjNXlTAAAAABJRU5ErkJggg==');
        }
        .floating-message {
            display: flex;
            align-items: flex-end;
            gap: 8px;
            margin-bottom: 12px;
        }
        .floating-message.user {
            flex-direction: row-reverse;
        }
        .floating-message-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            flex-shrink: 0;
        }
        .floating-message-content {
            max-width: 75%;
        }
        .floating-message-bubble {
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 0.85rem;
            line-height: 1.4;
        }
        .floating-message.bot .floating-message-bubble {
            background: white;
            border-bottom-left-radius: 4px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        .floating-message.user .floating-message-bubble {
            background: #dcf8c6;
            border-bottom-right-radius: 4px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        .floating-message-time {
            font-size: 0.65rem;
            color: #667;
            margin-top: 3px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .floating-message.user .floating-message-time {
            justify-content: flex-end;
        }
        .floating-message-time .check-marks svg {
            width: 14px;
            height: 14px;
            color: #667;
        }
        .floating-message-time .check-marks svg.read {
            color: #53bdeb;
        }

        .floating-quick-options {
            padding: 10px 15px;
            background: #f7f8fa;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .floating-quick-btn {
            padding: 8px 14px;
            border-radius: 20px;
            border: 1px solid #ddd;
            background: white;
            font-size: 0.75rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .floating-quick-btn:hover {
            background: var(--primary-teal);
            border-color: var(--primary-teal);
            color: white;
        }

        .floating-chat-input {
            padding: 12px 15px;
            background: #f0f0f0;
            display: flex;
            align-items: center;
            gap: 10px;
            border-top: 1px solid #e0e0e0;
        }
        .floating-chat-input input {
            flex: 1;
            border: none;
            background: white;
            border-radius: 20px;
            padding: 10px 15px;
            font-size: 0.85rem;
            outline: none;
        }
        .floating-chat-input button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            background: var(--primary-dark);
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        .floating-chat-input button:hover {
            background: #005252;
        }

        .floating-typing-indicator {
            display: flex;
            gap: 4px;
            padding: 8px 0;
        }
        .floating-typing-indicator span {
            width: 8px;
            height: 8px;
            background: #90949c;
            border-radius: 50%;
            animation: floatTyping 1.4s infinite ease-in-out;
        }
        .floating-typing-indicator span:nth-child(1) { animation-delay: -0.32s; }
        .floating-typing-indicator span:nth-child(2) { animation-delay: -0.16s; }
        @keyframes floatTyping {
            0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
            40% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>

    <!-- Modern Header -->
    <header style="background: #ffffff; padding: 0; position: sticky; top: 0; z-index: 1000; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08); border-bottom: 1px solid #e0e0e0;">
        <div style="max-width: 100%; margin: 0; padding: 0.5rem 1.5rem; display: flex; justify-content: space-between; align-items: center;">
            <!-- Left Side: UIN Logo + Text + Title -->
            <div style="display: flex; align-items: center; gap: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="padding: 0.35rem;">
                        <img src="{{ asset('images/OIP.png') }}" alt="UIN Logo" style="height: 40px;">
                    </div>
                    <div style="display: flex; flex-direction: column; line-height: 1.2;">
                        <span style="font-weight: 600; color: #666; font-size: 0.65rem; letter-spacing: 0.5px; text-transform: uppercase;">Universitas Islam Negeri</span>
                        <span style="font-weight: 700; color: #2c3e50; font-size: 1rem;">SUNAN KALIJAGA</span>
                    </div>
                </div>
                <!-- Divider -->
                <div style="width: 1px; height: 35px; background: #e0e0e0;"></div>
                <!-- Title -->
                <div style="display: flex; flex-direction: column; line-height: 1.2;">
                    <span style="font-size: 0.95rem; color: #008B8B; font-weight: 600;">Manajemen Repositori Tugas Akhir</span>
                    <span style="font-size: 0.7rem; color: #666;">Sistem Informasi Akademik</span>
                </div>
            </div>

            <!-- Right Side: Logout Only -->
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <!-- Logout Button -->
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();" style="display: flex; align-items: center; gap: 0.5rem; background: #dc3545; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.8rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.background='#c82333'" onmouseout="this.style.background='#dc3545'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                    Keluar
                </a>
                <form id="logout-form-header" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <div class="main-wrapper">
        <!-- Modern Sidebar Navigation -->
        <nav class="sidebar-nav" id="pengajuanNav">
            <!-- Profile Section - Centered -->
            <div style="padding: 1.25rem 0.75rem; background: #ffffff; display: flex; flex-direction: column; align-items: center; gap: 0.5rem; border-bottom: 1px solid #e0e0e0;">
                <!-- Profile Avatar -->
                <div style="width: 50px; height: 50px; border-radius: 50%; background: #e6f2f2; display: flex; align-items: center; justify-content: center; border: 2px solid #008B8B;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#008B8B" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                </div>
                <!-- Profile Info -->
                <div style="text-align: center;">
                    <h6 style="color: #2c3e50; margin: 0; font-weight: 600; font-size: 0.75rem;">MUTIARA HASIBUAN</h6>
                    <span style="color: #666; font-size: 0.65rem;">22106050070</span>
                </div>
                <span class="badge" style="background: #008B8B; color: white; font-size: 0.6rem;">Mahasiswa</span>
            </div>

            <!-- Menu Label -->
            <div style="padding: 0.75rem 0.75rem 0.4rem 0.75rem;">
                <h6 style="color: #999; margin: 0; font-size: 0.6rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Menu</h6>
            </div>

            <!-- Menu Items -->
            <a href="#kumpulan-judul" class="nav-link active" data-bs-toggle="tab" data-bs-target="#kumpulan-judul">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                </svg>
                <span>Kumpulan Judul</span>
            </a>
            <a href="#pengajuan" class="nav-link" data-bs-toggle="tab" data-bs-target="#pengajuan">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10.5a.5.5 0 0 0 1 0V9H10a.5.5 0 0 0 0-1H8.5V6.5z"/>
                </svg>
                <span>Pengajuan Judul</span>
            </a>
            <a href="#konsultasi" class="nav-link" data-bs-toggle="tab" data-bs-target="#konsultasi">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <span>Konsultasi</span>
            </a>
            <a href="#progres-bimbingan" class="nav-link" data-bs-toggle="tab" data-bs-target="#progres-bimbingan">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                </svg>
                <span>Progres Bimbingan</span>
            </a>
            <a href="#dokumentasi" class="nav-link" data-bs-toggle="tab" data-bs-target="#dokumentasi">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 10a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0-2a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0-2a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0-2a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0-2a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                </svg>
                <span>Dokumentasi</span>
            </a>
        </nav>

        <!-- Content Area Wrapper -->
        <div class="content-area-wrapper" id="contentWrapper">
            <!-- Content Area -->
            <div class="content-area">
            <!-- Tabs Content -->
            <div class="tab-content" id="pengajuanTabsContent">
                
                <!-- TAB 1: KUMPULAN JUDUL -->
                <div class="tab-pane fade show active" id="kumpulan-judul" role="tabpanel">
                    <div class="card" style="min-height: 700px;">
                        <div class="card-header">
                            <h5 class="mb-0"> Daftar Judul Tugas Akhir</h5>
                        </div>
                        <div class="card-body">
                            <!-- Search Section -->
                            <div class="mb-4">
                                <form method="GET" action="{{ route('pengajuan.index') }}" class="d-flex gap-2">
                                    <input type="hidden" name="peminatan" value="{{ $peminatan ?? 'semua' }}">
                                    <input type="hidden" name="arah_profesi" value="{{ $arahProfesi ?? 'semua' }}">
                                    <input type="hidden" name="angkatan" value="{{ request('angkatan', '') }}">
                                    <input type="text" name="search" class="form-control" placeholder="🔍 Cari judul tugas akhir..." value="{{ request('search', '') }}">
                                    <button type="submit" class="btn btn-custom-green">Cari</button>
                                    @if(request('search'))
                                        <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Reset</a>
                                    @endif
                                </form>
                            </div>

                            <form method="GET" class="mb-4" action="{{ route('pengajuan.index') }}">
                                <input type="hidden" name="search" value="{{ request('search', '') }}">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Peminatan:</label>
                                        <select name="peminatan" class="form-select">
                                            <option value="semua" {{ $peminatan === 'semua' ? 'selected' : '' }}>-- Semua --</option>
                                            <option value="sistem_informasi" {{ $peminatan === 'sistem_informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                                            <option value="sistem_cerdas" {{ $peminatan === 'sistem_cerdas' ? 'selected' : '' }}>Sistem Cerdas</option>
                                            <option value="rekayasa_perangkat_lunak" {{ $peminatan === 'rekayasa_perangkat_lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                            <option value="jaringan_komputer" {{ $peminatan === 'jaringan_komputer' ? 'selected' : '' }}>Jaringan Komputer</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Arah Profesi:</label>
                                        <select name="arah_profesi" class="form-select">
                                            <option value="semua" {{ $arahProfesi === 'semua' ? 'selected' : '' }}>-- Semua --</option>
                                            <option value="ilmuan" {{ $arahProfesi === 'ilmuan' ? 'selected' : '' }}>Ilmuan</option>
                                            <option value="wirausaha" {{ $arahProfesi === 'wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                                            <option value="professional" {{ $arahProfesi === 'professional' ? 'selected' : '' }}>Professional</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label fw-bold">Angkatan:</label>
                                        <select name="angkatan" class="form-select">
                                            <option value="">-- Semua --</option>
                                            <option value="2024" {{ request('angkatan') == '2024' ? 'selected' : '' }}>2024</option>
                                            <option value="2023" {{ request('angkatan') == '2023' ? 'selected' : '' }}>2023</option>
                                            <option value="2022" {{ request('angkatan') == '2022' ? 'selected' : '' }}>2022</option>
                                            <option value="2021" {{ request('angkatan') == '2021' ? 'selected' : '' }}>2021</option>
                                            <option value="2020" {{ request('angkatan') == '2020' ? 'selected' : '' }}>2020</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 d-flex align-items-end">
                                        <button type="submit" class="btn btn-custom-green w-100">Filter</button>
                                    </div>
                                </div>
                            </form>

                            @if($hasFilter && $judulList->count() > 0)
                            <div class="row">
                                @foreach($judulList as $judul)
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100 shadow-sm">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $judul->judul }}</h6>
                                                <p class="card-text small text-muted">{{ $judul->abstrak_bahasa_indonesia ?? $judul->deskripsi }}</p>
                                                <div class="mb-2">
                                                    <span class="badge bg-info badge-peminatan">
                                                        @switch($judul->peminatan)
                                                            @case('sistem_informasi') Sistem Informasi @break
                                                            @case('sistem_cerdas') Sistem Cerdas @break
                                                            @case('rekayasa_perangkat_lunak') Rekayasa Perangkat Lunak @break
                                                            @case('jaringan_komputer') Jaringan Komputer @break
                                                        @endswitch
                                                    </span>
                                                    <span class="badge bg-warning badge-peminatan">
                                                        @switch($judul->arah_profesi)
                                                            @case('ilmuan') Ilmuan @break
                                                            @case('wirausaha') Wirausaha @break
                                                            @case('professional') Professional @break
                                                        @endswitch
                                                    </span>
                                                    <span class="badge bg-secondary badge-peminatan">{{ $judul->angkatan }}</span>
                                                </div>
                                                <small class="text-secondary">Oleh: <strong>{{ $judul->nama_penulis }}</strong> (NIM: {{ $judul->nim_penulis }})</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Search Bottom Section -->
                            <div class="row mt-4 mb-4">
                                <div class="col-12">
                                    <form method="GET" action="{{ route('pengajuan.index') }}" class="d-flex gap-2">
                                        <input type="hidden" name="peminatan" value="{{ $peminatan ?? 'semua' }}">
                                        <input type="hidden" name="arah_profesi" value="{{ $arahProfesi ?? 'semua' }}">
                                        <input type="hidden" name="angkatan" value="{{ request('angkatan', '') }}">
                                        <input type="text" name="search" class="form-control" placeholder="🔍 Cari judul tugas akhir..." value="{{ request('search', '') }}">
                                        <button type="submit" class="btn btn-custom-green">Cari</button>
                                        @if(request('search'))
                                            <a href="{{ route('pengajuan.index') }}" class="btn btn-secondary">Reset</a>
                                        @endif
                                    </form>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    {{ $judulList->links('pagination.custom') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- TAB 2: PENGAJUAN JUDUL -->
            <div class="tab-pane fade" id="pengajuan" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"> Form Pengajuan Judul</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengajuan.store') ?? '#' }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Tugas Akhir:</label>
                                <input type="text" name="judul" class="form-control form-control-lg" 
                                    placeholder="Masukkan judul TA Anda" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Upload File:</label>
                                <input type="file" name="file" class="form-control" accept="*" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom-green btn-lg">
                                    ✓ Ajukan Judul
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- TAB 3: KONSULTASI -->
            <div class="tab-pane fade" id="konsultasi" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">💬 Ruang Konsultasi</h5>
                        <div id="chatStatus" class="badge bg-info">
                            <span class="status-dot"></span> Terhubung dengan Bot
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row g-0" style="height: 550px;">
                            <!-- Sebelah Kiri: Chat Messages -->
                            <div class="col-md-8 d-flex flex-column" style="border-right: 1px solid #e9ecef;">
                                <!-- Chat Header Info -->
                                <div id="chatHeaderInfo" class="p-3 border-bottom" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                    <div class="d-flex align-items-center gap-3">
                                        <div id="chatAvatar" style="width: 40px; height: 40px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                                            🤖
                                        </div>
                                        <div>
                                            <h6 id="chatPartnerName" class="mb-0 text-white fw-bold" style="font-size: 0.9rem;">Asisten Virtual TA</h6>
                                            <small id="chatPartnerStatus" class="text-white-50" style="font-size: 0.75rem;">Online • Siap membantu Anda</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Chat Messages Area -->
                                <div id="chatMessages" class="chat-box flex-grow-1 p-3" style="overflow-y: auto; background: #E5DDD5; background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23000000&quot; fill-opacity=&quot;0.03&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
                                    <!-- Bot Welcome Message -->
                                    <div class="chat-message bot mb-3">
                                        <div class="d-flex justify-content-start align-items-end gap-2">
                                            <div class="message-avatar" style="width: 28px; height: 28px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; flex-shrink: 0;">
                                                🤖
                                            </div>
                                            <div class="message-content">
                                                <div class="message-bubble" style="background: white; color: #333; padding: 10px 14px; border-radius: 12px 12px 12px 4px; max-width: 100%; box-shadow: 0 1px 2px rgba(0,0,0,0.1); font-size: 0.85rem;">
                                                    <p class="mb-1">Halo! 👋 Selamat datang di <strong>Layanan Konsultasi TA</strong>.</p>
                                                    <p class="mb-1">Saya adalah Asisten Virtual yang akan membantu Anda.</p>
                                                    <p class="mb-0">Silakan pilih topik konsultasi:</p>
                                                </div>
                                                <small class="text-muted" style="font-size: 0.65rem;">Baru saja</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bot Quick Options -->
                                    <div id="botQuickOptions" class="mb-3 ms-4 ps-2">
                                        <div class="d-flex flex-wrap gap-2">
                                            <button class="btn btn-sm btn-outline-primary rounded-pill quick-option" data-option="judul" style="font-size: 0.75rem;">
                                                📝 Judul TA
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill quick-option" data-option="proposal" style="font-size: 0.75rem;">
                                                📄 Proposal
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill quick-option" data-option="bab" style="font-size: 0.75rem;">
                                                📚 BAB Skripsi
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill quick-option" data-option="revisi" style="font-size: 0.75rem;">
                                                ✏️ Revisi
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill quick-option" data-option="dosen" style="font-size: 0.75rem;">
                                                👨‍🏫 Langsung ke Dosen
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Dynamic Chat Messages -->
                                    <div id="dynamicMessages"></div>
                                </div>

                                <!-- Form Input Chat -->
                                <div class="p-3 border-top" style="background: #F0F0F0;">
                                    <form id="chatForm" method="POST" action="{{ route('pengajuan.sendChat') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="dosen_id" value="1">
                                        <input type="hidden" id="chatMode" name="chat_mode" value="bot">
                                        <div class="d-flex gap-2 align-items-center" style="background: white; border-radius: 24px; padding: 6px 12px;">
                                            <button type="button" class="btn btn-link p-1" id="attachBtn" title="Lampirkan File" style="color: #54656f;">
                                                📎
                                            </button>
                                            <input type="text" name="pesan" id="chatInput" class="form-control border-0" 
                                                placeholder="Ketik pesan..." style="font-size: 0.85rem; box-shadow: none;">
                                            <button class="btn btn-success rounded-circle p-2" type="submit" id="sendBtn" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.5.5 0 0 1-.928-.086l-2.18-6.076-6.076-2.18a.5.5 0 0 1-.086-.928L15.314.036a.5.5 0 0 1 .54.11z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <input type="file" name="file_attachment" id="fileInput" class="d-none">
                                        <div id="filePreview" class="mt-2 d-none">
                                            <span class="badge bg-secondary" style="font-size: 0.75rem;">
                                                <span id="fileName"></span>
                                                <button type="button" class="btn-close btn-close-white ms-2" id="removeFile" style="font-size: 0.5rem;"></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Sebelah Kanan: Info Panel -->
                            <div class="col-md-4 d-flex flex-column" style="background: #fafbfc;">
                                <!-- Current Chat Partner -->
                                <div class="p-3 border-bottom">
                                    <h6 class="fw-bold mb-2 text-muted" style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.5px;">Berbicara Dengan</h6>
                                    <div id="currentPartner" class="card border-0 shadow-sm">
                                        <div class="card-body text-center py-3">
                                            <div id="partnerAvatar" style="width: 55px; height: 55px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; margin: 0 auto 0.5rem; display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                                🤖
                                            </div>
                                            <h6 id="partnerName" class="fw-bold mb-0" style="font-size: 0.85rem;">Asisten Virtual</h6>
                                            <p id="partnerDesc" class="text-muted mb-0" style="font-size: 0.7rem;">Bot Konsultasi TA</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Dosen Pembimbing Info -->
                                <div class="p-3 flex-grow-1">
                                    <h6 class="fw-bold mb-2 text-muted" style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.5px;">Dosen Pembimbing</h6>
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body py-2">
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #006666, #008B8B); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1rem;">
                                                    👨‍🎓
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold mb-0" style="font-size: 0.8rem;">Dr. Ahmad Wijaya</h6>
                                                    <small class="text-muted" style="font-size: 0.7rem;">Sistem Informasi</small>
                                                </div>
                                            </div>
                                            <hr class="my-2">
                                            <div style="font-size: 0.7rem;">
                                                <p class="mb-1">📧 ahmad.wijaya@uin-suka.ac.id</p>
                                                <p class="mb-1">📱 +62-812-3456-7890</p>
                                                <p class="mb-0">🕐 09:00 - 15:00</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Connect to Dosen Button -->
                                    <button id="connectDosenBtn" class="btn btn-success w-100 mt-2 d-none" onclick="connectToDosen()" style="font-size: 0.8rem;">
                                        👨‍🏫 Hubungi Dosen Pembimbing
                                    </button>
                                </div>

                                <!-- Quick Tips -->
                                <div class="p-3 border-top" style="background: #f0f4f8;">
                                    <h6 class="fw-bold mb-1" style="font-size: 0.65rem; color: #667;">💡 TIPS</h6>
                                    <ul class="mb-0 ps-3" style="font-size: 0.65rem; color: #666;">
                                        <li>Jelaskan dengan detail</li>
                                        <li>Lampirkan dokumen jika perlu</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 5: PROGRES BIMBINGAN -->
            <div class="tab-pane fade" id="progres-bimbingan" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Progres Bimbingan</h5>
                        <button class="btn btn-custom-green btn-sm" data-bs-toggle="modal" data-bs-target="#modalUploadProgres">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                            Upload Progres Baru
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Info Panel -->
                        <div class="alert alert-info mb-4" style="font-size: 0.8rem;">
                            <strong>Petunjuk:</strong> Upload progres bimbingan Anda (file dokumen, screenshot, gambar, dll) beserta deskripsi. Dosen pembimbing akan memberikan feedback pada setiap progres yang Anda kirim.
                        </div>

                        <!-- Progres Timeline -->
                        <div class="progres-timeline">
                            @forelse($progresBimbinganList ?? [] as $index => $progres)
                            <div class="progres-item mb-4">
                                <div class="card border-start border-4 {{ $progres->status === 'reviewed' ? 'border-success' : 'border-warning' }} shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <span class="badge {{ $progres->status === 'reviewed' ? 'bg-success' : 'bg-warning text-dark' }} mb-2">
                                                    {{ $progres->status_label }}
                                                </span>
                                                <h6 class="fw-bold mb-1" style="font-size: 0.9rem;">{{ $progres->judul }}</h6>
                                                <small class="text-muted">Dikirim: {{ $progres->created_at->format('d F Y, H:i') }}</small>
                                            </div>
                                            <span class="badge bg-light text-dark">Progres #{{ $loop->remaining + 1 }}</span>
                                        </div>
                                        <p class="mb-2" style="font-size: 0.85rem;">{{ $progres->deskripsi }}</p>
                                        
                                        <!-- Attached Files -->
                                        @if($progres->files && count($progres->files) > 0)
                                        <div class="mb-3">
                                            <small class="text-muted d-block mb-1">File Terlampir:</small>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach($progres->files as $file)
                                                <a href="{{ asset('storage/' . $file['path']) }}" target="_blank" class="btn btn-outline-secondary btn-sm" style="font-size: 0.75rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                                    </svg>
                                                    {{ $file['original_name'] }}
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif

                                        @if($progres->feedback)
                                        <!-- Dosen Feedback -->
                                        <div class="bg-light p-3 rounded border-start border-3 border-primary">
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <div style="width: 30px; height: 30px; background: linear-gradient(135deg, #006666, #008B8B); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" viewBox="0 0 16 16">
                                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <strong style="font-size: 0.8rem;">{{ $progres->dosen->name ?? 'Dosen Pembimbing' }}</strong>
                                                    <small class="text-muted d-block" style="font-size: 0.7rem;">{{ $progres->feedback_at ? $progres->feedback_at->format('d F Y, H:i') : '' }}</small>
                                                </div>
                                            </div>
                                            <p class="mb-0" style="font-size: 0.85rem;">{{ $progres->feedback }}</p>
                                        </div>
                                        @else
                                        <!-- No feedback yet -->
                                        <div class="text-muted" style="font-size: 0.8rem; font-style: italic;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                            Menunggu feedback dari dosen...
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @empty
                            <!-- Empty State -->
                            <div class="text-center py-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#ccc" viewBox="0 0 16 16" class="mb-3">
                                    <path d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                                </svg>
                                <h6 class="text-muted">Belum ada progres bimbingan</h6>
                                <p class="text-muted" style="font-size: 0.85rem;">Klik tombol "Upload Progres Baru" untuk mengirim progres pertama Anda.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Upload Progres -->
            <div class="modal fade" id="modalUploadProgres" tabindex="-1" aria-labelledby="modalUploadProgresLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background: linear-gradient(135deg, #006666 0%, #008B8B 100%); color: white;">
                            <h5 class="modal-title" id="modalUploadProgresLabel">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                                Upload Progres Bimbingan
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="formUploadProgres" method="POST" action="{{ route('pengajuan.storeProgresBimbingan') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <!-- Kategori Progres -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Kategori <span class="text-danger">*</span></label>
                                    <select name="kategori_progres" class="form-select" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="proposal">Proposal</option>
                                        <option value="bab1">BAB 1 - Pendahuluan</option>
                                        <option value="bab2">BAB 2 - Tinjauan Pustaka</option>
                                        <option value="bab3">BAB 3 - Metodologi</option>
                                        <option value="bab4">BAB 4 - Hasil & Pembahasan</option>
                                        <option value="bab5">BAB 5 - Penutup</option>
                                        <option value="revisi">Revisi</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Deskripsi Progres <span class="text-danger">*</span></label>
                                    <textarea name="deskripsi_progres" class="form-control" rows="4" placeholder="Jelaskan progres yang Anda kerjakan, kendala yang dihadapi, atau pertanyaan untuk dosen..." required></textarea>
                                    <small class="text-muted">Jelaskan dengan detail agar dosen dapat memberikan feedback yang tepat.</small>
                                </div>

                                <!-- Upload Files -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Upload File <span class="text-danger">*</span></label>
                                    <input type="file" name="file_progres[]" class="form-control" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.zip,.rar" required>
                                    <small class="text-muted">Format: PDF, DOC, DOCX, JPG, PNG, ZIP, RAR (Maks. 50MB per file). Bisa upload beberapa file sekaligus.</small>
                                </div>

                                <!-- Preview Files -->
                                <div id="previewFilesProgres" class="mb-3 d-none">
                                    <label class="form-label fw-bold">File yang akan diupload:</label>
                                    <div id="fileListProgres" class="d-flex flex-wrap gap-2"></div>
                                </div>

                                <!-- Pilih Dosen -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Kirim ke Dosen Pembimbing</label>
                                    <select name="dosen_id" class="form-select">
                                        <option value="1" selected>Dr. Ahmad Fauzi, M.Kom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-custom-green">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="me-1">
                                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                                    </svg>
                                    Kirim Progres
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- TAB 4: DOKUMENTASI -->
            <div class="tab-pane fade" id="dokumentasi" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"> Form Dokumentasi Tugas Akhir</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pengajuan.storeDokumentasi') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <!-- Row 1: Judul -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul Tugas Akhir:</label>
                                <input type="text" name="judul" class="form-control form-control-lg" 
                                    placeholder="Masukkan judul TA" required>
                            </div>

    
                            <!-- Row 3: Jenis TA dan Prodi -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Jenis Tugas Akhir:</label>
                                    <select name="jenis_ta" class="form-select" required>
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="Skripsi">Skripsi</option>
                                        <option value="Thesis">Thesis</option>
                                        <option value="Disertasi">Disertasi</option>
                                    </select>
                                </div>
                                
                            </div>

                           
                            <!-- Row 5: Abstrak Bahasa Indonesia -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Abstrak Bahasa Indonesia:</label>
                                <textarea name="abstrak_bahasa_indonesia" class="form-control" rows="4" 
                                    placeholder="Masukkan abstrak dalam bahasa Indonesia" required></textarea>
                            </div>

                            <!-- Row 6: Abstrak Bahasa Inggris -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Abstrak Bahasa Inggris:</label>
                                <textarea name="abstrak_bahasa_inggris" class="form-control" rows="4" 
                                    placeholder="Masukkan abstrak dalam bahasa Inggris" required></textarea>
                            </div>

                            <!-- Row 7: File Upload -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">File Lembar Pengesahan (PDF):</label>
                                    <input type="file" name="file_pengesahan" class="form-control" 
                                        accept=".pdf">
                                    <small class="text-muted">Upload lembar pengesahan yang sudah ditandatangani</small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">File Kode Program (ZIP):</label>
                                    <input type="file" name="file_kode" class="form-control" 
                                        accept=".zip,.rar,.7z">
                                    <small class="text-muted">Upload source code dalam format ZIP/RAR</small>
                                </div>
                            </div>

                            <!-- Row 8: File Upload Tambahan -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">File Transkrip (PDF):</label>
                                    <input type="file" name="file_transkrip" class="form-control" 
                                        accept=".pdf">
                                    <small class="text-muted">Upload transkrip nilai terbaru</small>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-outline-secondary">Bersihkan</button>
                                <button type="submit" class="btn btn-custom-green">Simpan Dokumentasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>

    <!-- ========== FLOATING CHAT BUTTON & WINDOW ========== -->
    <!-- Floating Chat Button -->
    <button class="floating-chat-btn" id="floatingChatBtn" onclick="toggleFloatingChat()">
        <span class="chat-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </span>
        <span class="close-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </span>
        @if(isset($unreadChatCount) && $unreadChatCount > 0)
        <span class="floating-badge" id="floatingBadge">{{ $unreadChatCount > 99 ? '99+' : $unreadChatCount }}</span>
        @endif
    </button>

    <!-- Floating Chat Window -->
    <div class="floating-chat-window" id="floatingChatWindow">
        <!-- Header -->
        <div class="floating-chat-header" id="floatingHeader">
            <div class="floating-chat-avatar" id="floatingAvatar">🤖</div>
            <div class="floating-chat-info">
                <h6 id="floatingName">Asisten Virtual</h6>
                <span id="floatingStatus"><span class="online-dot"></span> Online • Bot Konsultasi</span>
            </div>
        </div>

        <!-- Messages -->
        <div class="floating-chat-messages" id="floatingMessages">
            <!-- Welcome Message -->
            <div class="floating-message bot">
                <div class="floating-message-avatar" style="background: linear-gradient(135deg, #667eea, #764ba2);">🤖</div>
                <div class="floating-message-content">
                    <div class="floating-message-bubble">
                        <p class="mb-0">👋 Halo! Selamat datang di Layanan Konsultasi Tugas Akhir.</p>
                    </div>
                    <div class="floating-message-time">{{ now()->format('H:i') }}</div>
                </div>
            </div>
            <div class="floating-message bot">
                <div class="floating-message-avatar" style="background: linear-gradient(135deg, #667eea, #764ba2);">🤖</div>
                <div class="floating-message-content">
                    <div class="floating-message-bubble">
                        <p class="mb-0">Saya adalah asisten virtual yang siap membantu Anda. Silakan pilih topik konsultasi di bawah ini:</p>
                    </div>
                    <div class="floating-message-time">{{ now()->format('H:i') }}</div>
                </div>
            </div>
        </div>

        <!-- Quick Options -->
        <div class="floating-quick-options" id="floatingQuickOpts">
            <button class="floating-quick-btn" data-option="judul">📝 Judul TA</button>
            <button class="floating-quick-btn" data-option="proposal">📄 Proposal</button>
            <button class="floating-quick-btn" data-option="bimbingan">📅 Jadwal Bimbingan</button>
            <button class="floating-quick-btn" data-option="revisi">🔄 Revisi</button>
            <button class="floating-quick-btn" data-option="dosen">👨‍🏫 Langsung ke Dosen</button>
        </div>

        <!-- Input -->
        <form class="floating-chat-input" id="floatingChatForm">
            <input type="text" id="floatingInput" placeholder="Ketik pesan..." autocomplete="off">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                </svg>
            </button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Sidebar Toggle Functionality
    function toggleSidebar() {
        const sidebar = document.getElementById('pengajuanNav');
        const contentWrapper = document.getElementById('contentWrapper');
        const hamburger = document.getElementById('sidebarToggle');
        
        sidebar.classList.toggle('sidebar-collapsed');
        contentWrapper.classList.toggle('sidebar-collapsed');
        
        // Save state to localStorage
        const isCollapsed = sidebar.classList.contains('sidebar-collapsed');
        localStorage.setItem('sidebarCollapsed', isCollapsed);
    }
    
    // Initialize sidebar toggle on page load
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('pengajuanNav');
        const contentWrapper = document.getElementById('contentWrapper');
        
        // Add click event to hamburger button
        if (hamburger) {
            hamburger.addEventListener('click', toggleSidebar);
        }
        
        // Restore sidebar state from localStorage
        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed) {
            sidebar.classList.add('sidebar-collapsed');
            contentWrapper.classList.add('sidebar-collapsed');
        }
    });

    // Initialize sidebar active state on page load
    function initSidebar() {
        const activeTab = document.querySelector('.tab-pane.show.active');
        if (activeTab) {
            const tabId = activeTab.id;
            const navLink = document.querySelector(`.sidebar-nav .nav-link[href="#${tabId}"]`);
            if (navLink) {
                document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => l.classList.remove('active'));
                navLink.classList.add('active');
            }
        }
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        initSidebar();
    });
    
    // Handle sidebar active state on tab change
    document.addEventListener('shown.bs.tab', function (e) {
        const target = e.target;
        const tabTarget = target.getAttribute('data-bs-target') || target.getAttribute('href');
        
        // Remove active from all nav links
        document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
            link.classList.remove('active');
        });
        
        // Add active to the corresponding nav link
        const activeLink = document.querySelector(`.sidebar-nav .nav-link[href="${tabTarget}"]`);
        if (activeLink) {
            activeLink.classList.add('active');
        }
    });
    
    // Handle sidebar click to activate tab
    document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const tabPane = document.querySelector(targetId);
            
            if (tabPane) {
                // Remove active from all tabs and nav links
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => {
                    l.classList.remove('active');
                });
                
                // Add active to current tab and nav link
                tabPane.classList.add('show', 'active');
                this.classList.add('active');
            }
        });
    });

    // Function to open Konsultasi tab from header chat icon
    function openKonsultasiTab() {
        const konsultasiPane = document.querySelector('#konsultasi');
        const konsultasiLink = document.querySelector('.sidebar-nav .nav-link[href="#konsultasi"]');
        
        if (konsultasiPane) {
            // Remove active from all tabs and nav links
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('show', 'active');
            });
            document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => {
                l.classList.remove('active');
            });
            
            // Add active to konsultasi tab and nav link
            konsultasiPane.classList.add('show', 'active');
            if (konsultasiLink) {
                konsultasiLink.classList.add('active');
            }
        }
    }

    // Mark chat as read and hide badge
    function markChatAsRead() {
        // Hide badge immediately
        const badge = document.getElementById('chatBadge');
        if (badge) {
            badge.style.display = 'none';
        }

        // Send request to server to mark as read
        fetch('{{ route("pengajuan.markChatAsRead") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).catch(err => console.log('Mark read error:', err));
    }

    // ========== CHATBOT FUNCTIONALITY ==========
    let chatMode = 'bot'; // 'bot' or 'dosen'
    let currentStep = 'welcome';
    let selectedTopic = null;

    // Bot responses based on topic
    const botResponses = {
        judul: {
            question: "Baik, Anda ingin berkonsultasi tentang <strong>Judul Tugas Akhir</strong>. 📝\n\nSebelum terhubung dengan Dosen Pembimbing, boleh ceritakan:\n\n1. Apakah Anda sudah memiliki ide judul?\n2. Bidang apa yang ingin Anda teliti?",
            followUp: "Terima kasih atas informasinya! 🙏\n\nSaya sudah mencatat kebutuhan konsultasi Anda tentang judul TA.\n\nSekarang Anda bisa langsung terhubung dengan <strong>Dr. Ahmad Wijaya</strong> untuk mendiskusikan lebih lanjut.\n\nKlik tombol <strong>\"Hubungi Dosen Pembimbing\"</strong> di sebelah kanan untuk memulai konsultasi."
        },
        proposal: {
            question: "Baik, Anda ingin berkonsultasi tentang <strong>Proposal</strong>. 📄\n\nUntuk membantu Dosen memahami kebutuhan Anda:\n\n1. Sudah sampai mana progres proposal Anda?\n2. Bagian mana yang ingin dikonsultasikan? (BAB 1, 2, atau 3)",
            followUp: "Terima kasih! 🙏\n\nSaya sudah mencatat kebutuhan konsultasi proposal Anda.\n\nSilakan hubungi <strong>Dr. Ahmad Wijaya</strong> untuk mendiskusikan proposal Anda lebih detail.\n\nJangan lupa lampirkan file proposal jika sudah ada! 📎"
        },
        bab: {
            question: "Baik, Anda ingin berkonsultasi tentang <strong>BAB Skripsi</strong>. 📚\n\nMohon informasikan:\n\n1. BAB berapa yang ingin dikonsultasikan?\n2. Apakah ada kendala spesifik yang dihadapi?",
            followUp: "Terima kasih atas informasinya! 🙏\n\nDosen Pembimbing Anda siap membantu menyelesaikan kendala pada BAB tersebut.\n\nSilakan klik <strong>\"Hubungi Dosen Pembimbing\"</strong> dan lampirkan draft BAB yang sudah Anda kerjakan."
        },
        revisi: {
            question: "Baik, Anda ingin berkonsultasi tentang <strong>Revisi & Perbaikan</strong>. ✏️\n\nMohon jelaskan:\n\n1. Revisi dari sidang apa? (Proposal/Hasil/Akhir)\n2. Poin revisi apa yang ingin ditanyakan?",
            followUp: "Terima kasih! 🙏\n\nDosen Pembimbing akan membantu menjelaskan poin revisi yang Anda maksud.\n\nPastikan Anda sudah menyiapkan dokumen revisi dan catatan dari penguji.\n\nKlik <strong>\"Hubungi Dosen Pembimbing\"</strong> untuk melanjutkan."
        },
        dosen: {
            question: "Baik, Anda akan langsung terhubung dengan <strong>Dr. Ahmad Wijaya</strong>. 👨‍🏫\n\nMohon tunggu sebentar, saya akan menghubungkan Anda...",
            followUp: null
        }
    };

    // Get current time
    function getCurrentTime() {
        const now = new Date();
        return now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
    }

    // Add message to chat
    function addMessage(content, isUser = false, isTyping = false) {
        const messagesContainer = document.getElementById('dynamicMessages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `message mb-3 ${isUser ? 'user-message' : 'bot-message'}`;
        
        if (isTyping) {
            messageDiv.innerHTML = `
                <div class="d-flex justify-content-start align-items-end gap-2">
                    <div class="bot-avatar" style="width: 32px; height: 32px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; flex-shrink: 0;">
                        🤖
                    </div>
                    <div class="bubble typing-indicator" style="background: white; padding: 12px 20px; border-radius: 18px 18px 18px 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            `;
        } else if (isUser) {
            messageDiv.innerHTML = `
                <div class="d-flex justify-content-end">
                    <div class="bubble" style="background: linear-gradient(135deg, #006666, #008B8B); color: white; padding: 12px 16px; border-radius: 18px 18px 4px 18px; max-width: 70%; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        <p class="mb-0">${content}</p>
                    </div>
                </div>
                <div class="text-end">
                    <small class="text-muted" style="font-size: 0.7rem;">${getCurrentTime()}</small>
                </div>
            `;
        } else {
            const avatarIcon = chatMode === 'dosen' ? '👨‍🎓' : '🤖';
            const avatarBg = chatMode === 'dosen' ? 'linear-gradient(135deg, #006666, #008B8B)' : 'linear-gradient(135deg, #667eea, #764ba2)';
            messageDiv.innerHTML = `
                <div class="d-flex justify-content-start align-items-end gap-2">
                    <div class="bot-avatar" style="width: 32px; height: 32px; background: ${avatarBg}; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; flex-shrink: 0;">
                        ${avatarIcon}
                    </div>
                    <div class="bubble" style="background: white; color: #333; padding: 12px 16px; border-radius: 18px 18px 18px 4px; max-width: 70%; box-shadow: 0 1px 2px rgba(0,0,0,0.1);">
                        <p class="mb-0">${content}</p>
                    </div>
                </div>
                <small class="text-muted ms-5 ps-3" style="font-size: 0.7rem;">${getCurrentTime()}</small>
            `;
        }
        
        messagesContainer.appendChild(messageDiv);
        scrollToBottom();
        return messageDiv;
    }

    // Show typing indicator then message
    function showTypingThenMessage(content, delay = 1500) {
        const typingDiv = addMessage('', false, true);
        setTimeout(() => {
            typingDiv.remove();
            addMessage(content);
        }, delay);
    }

    // Scroll chat to bottom
    function scrollToBottom() {
        const chatBox = document.getElementById('chatMessages');
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    // Handle quick option click
    document.querySelectorAll('.quick-option').forEach(btn => {
        btn.addEventListener('click', function() {
            const option = this.dataset.option;
            selectedTopic = option;
            
            // Hide quick options
            document.getElementById('botQuickOptions').style.display = 'none';
            
            // Add user selection message
            addMessage(this.textContent.trim(), true);
            
            // Show bot response
            setTimeout(() => {
                if (option === 'dosen') {
                    showTypingThenMessage(botResponses[option].question, 1000);
                    setTimeout(() => {
                        connectToDosen();
                    }, 2500);
                } else {
                    showTypingThenMessage(botResponses[option].question, 1000);
                    currentStep = 'follow-up';
                    
                    // Show connect button
                    setTimeout(() => {
                        document.getElementById('connectDosenBtn').classList.remove('d-none');
                    }, 2000);
                }
            }, 500);
        });
    });

    // Handle chat form submission
    document.getElementById('chatForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const input = document.getElementById('chatInput');
        const message = input.value.trim();
        
        if (!message) return;
        
        // Add user message
        addMessage(message, true);
        input.value = '';
        
        if (chatMode === 'bot') {
            // Bot mode - auto reply
            if (currentStep === 'follow-up' && selectedTopic && botResponses[selectedTopic].followUp) {
                setTimeout(() => {
                    showTypingThenMessage(botResponses[selectedTopic].followUp, 1500);
                    currentStep = 'done';
                    document.getElementById('connectDosenBtn').classList.remove('d-none');
                }, 500);
            } else if (currentStep === 'done') {
                setTimeout(() => {
                    showTypingThenMessage("Untuk pertanyaan lebih lanjut, silakan hubungi Dosen Pembimbing Anda dengan mengklik tombol <strong>\"Hubungi Dosen Pembimbing\"</strong>. 😊", 1000);
                }, 500);
            } else {
                // Generic bot response
                setTimeout(() => {
                    showTypingThenMessage("Terima kasih atas pesan Anda. Silakan pilih topik konsultasi di atas, atau klik <strong>\"Langsung ke Dosen\"</strong> jika ingin berbicara langsung dengan Dosen Pembimbing.", 1000);
                }, 500);
            }
        } else {
            // Dosen mode - actually submit to server
            this.submit();
        }
    });

    // Connect to Dosen
    function connectToDosen() {
        chatMode = 'dosen';
        document.getElementById('chatMode').value = 'dosen';
        
        // Update header
        const chatHeader = document.getElementById('chatHeaderInfo');
        chatHeader.style.background = 'linear-gradient(135deg, #006666 0%, #008B8B 100%)';
        document.getElementById('chatAvatar').innerHTML = '👨‍🎓';
        document.getElementById('chatPartnerName').textContent = 'Dr. Ahmad Wijaya';
        document.getElementById('chatPartnerStatus').textContent = 'Online • Dosen Pembimbing';
        
        // Update status badge
        const statusBadge = document.getElementById('chatStatus');
        statusBadge.className = 'badge bg-success';
        statusBadge.innerHTML = '<span class="status-dot"></span> Terhubung dengan Dosen';
        
        // Update partner info
        document.getElementById('partnerAvatar').style.background = 'linear-gradient(135deg, #006666, #008B8B)';
        document.getElementById('partnerAvatar').innerHTML = '👨‍🎓';
        document.getElementById('partnerName').textContent = 'Dr. Ahmad Wijaya';
        document.getElementById('partnerDesc').textContent = 'Dosen Pembimbing';
        
        // Hide connect button
        document.getElementById('connectDosenBtn').classList.add('d-none');
        
        // Add connection message
        setTimeout(() => {
            addMessage("✅ Anda sekarang terhubung dengan <strong>Dr. Ahmad Wijaya</strong>.\n\nSilakan sampaikan pertanyaan atau konsultasi Anda. Dosen akan membalas pesan Anda secepatnya.");
        }, 500);
    }

    // File attachment handling
    const attachBtn = document.getElementById('attachBtn');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const removeFile = document.getElementById('removeFile');

    if (attachBtn) {
        attachBtn.addEventListener('click', function() {
            fileInput.click();
        });
    }

    if (fileInput) {
        fileInput.addEventListener('change', function() {
            if (this.files.length > 0) {
                fileName.textContent = this.files[0].name;
                filePreview.classList.remove('d-none');
            }
        });
    }

    if (removeFile) {
        removeFile.addEventListener('click', function() {
            fileInput.value = '';
            filePreview.classList.add('d-none');
        });
    }

    // ========== FLOATING CHAT FUNCTIONALITY ==========
    let floatingChatMode = 'bot';
    let floatingCurrentStep = 'welcome';
    let floatingSelectedTopic = null;
    let isChatOpen = false;

    // Bot responses for floating chat
    const floatingBotResponses = {
        judul: {
            question: "Baik, Anda ingin berkonsultasi tentang <strong>Judul TA</strong>. 📝\n\nSilakan jelaskan ide judul atau topik yang ingin Anda ajukan.",
            followUp: "Terima kasih atas informasinya! 📋\n\nUntuk konsultasi lebih lanjut tentang judul TA, saya sarankan untuk menghubungi Dosen Pembimbing langsung. Klik tombol 'Langsung ke Dosen' untuk melanjutkan."
        },
        proposal: {
            question: "Anda ingin berkonsultasi tentang <strong>Proposal</strong>. 📄\n\nApa kendala atau pertanyaan spesifik tentang proposal Anda?",
            followUp: "Baik, saya sudah mencatat pertanyaan Anda. 📝\n\nUntuk pembahasan detail proposal, silakan konsultasikan langsung dengan Dosen Pembimbing. Klik 'Langsung ke Dosen' untuk terhubung."
        },
        bimbingan: {
            question: "Anda ingin mengatur <strong>Jadwal Bimbingan</strong>. 📅\n\nKapan waktu yang Anda inginkan untuk bimbingan?",
            followUp: "Untuk mengatur jadwal bimbingan, silakan koordinasikan langsung dengan Dosen Pembimbing. Klik 'Langsung ke Dosen' untuk melanjutkan."
        },
        revisi: {
            question: "Anda ingin berkonsultasi tentang <strong>Revisi</strong>. 🔄\n\nBagian mana yang perlu direvisi atau Anda bingung?",
            followUp: "Untuk panduan revisi yang lebih detail, silakan diskusikan dengan Dosen Pembimbing. Klik 'Langsung ke Dosen' untuk terhubung."
        },
        dosen: {
            question: "Baik, saya akan menghubungkan Anda dengan Dosen Pembimbing... 👨‍🏫"
        }
    };

    // Toggle floating chat
    function toggleFloatingChat() {
        const chatWindow = document.getElementById('floatingChatWindow');
        const chatBtn = document.getElementById('floatingChatBtn');
        const floatingBadge = document.getElementById('floatingBadge');

        isChatOpen = !isChatOpen;

        if (isChatOpen) {
            chatWindow.classList.add('active');
            chatBtn.classList.add('active');
            if (floatingBadge) floatingBadge.style.display = 'none';
            markChatAsRead();
            scrollFloatingToBottom();
        } else {
            chatWindow.classList.remove('active');
            chatBtn.classList.remove('active');
        }
    }

    // Get current time
    function getFloatingTime() {
        const now = new Date();
        return now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
    }

    // Add floating message with WhatsApp-style checkmarks
    function addFloatingMessage(content, isUser = false, status = 'sent') {
        const messagesContainer = document.getElementById('floatingMessages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `floating-message ${isUser ? 'user' : 'bot'}`;

        // Checkmark SVGs
        const singleCheck = `<svg viewBox="0 0 16 15"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512z" fill="currentColor"/></svg>`;
        
        const doubleCheck = `<svg class="check-double" viewBox="0 0 16 15"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512z" fill="currentColor"/><path d="M10.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L3.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512z" fill="currentColor"/></svg>`;

        let checkmarkHtml = '';
        if (isUser) {
            if (status === 'sent') checkmarkHtml = `<span class="check-marks">${singleCheck}</span>`;
            else if (status === 'delivered') checkmarkHtml = `<span class="check-marks">${doubleCheck}</span>`;
            else if (status === 'read') checkmarkHtml = `<span class="check-marks"><svg class="read" viewBox="0 0 16 15"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512z" fill="currentColor"/><path d="M10.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L3.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512z" fill="currentColor"/></svg></span>`;
        }

        if (isUser) {
            messageDiv.innerHTML = `
                <div class="floating-message-content">
                    <div class="floating-message-bubble">
                        <p class="mb-0">${content}</p>
                    </div>
                    <div class="floating-message-time">${getFloatingTime()} ${checkmarkHtml}</div>
                </div>
            `;
        } else {
            const avatarIcon = floatingChatMode === 'dosen' ? '👨‍🎓' : '🤖';
            const avatarBg = floatingChatMode === 'dosen' ? 'linear-gradient(135deg, #006666, #008B8B)' : 'linear-gradient(135deg, #667eea, #764ba2)';
            messageDiv.innerHTML = `
                <div class="floating-message-avatar" style="background: ${avatarBg}">${avatarIcon}</div>
                <div class="floating-message-content">
                    <div class="floating-message-bubble">
                        <p class="mb-0">${content}</p>
                    </div>
                    <div class="floating-message-time">${getFloatingTime()}</div>
                </div>
            `;
        }

        messagesContainer.appendChild(messageDiv);
        scrollFloatingToBottom();

        // Simulate status updates for user messages
        if (isUser) {
            setTimeout(() => updateFloatingMessageStatus(messageDiv, 'delivered'), 500);
            setTimeout(() => updateFloatingMessageStatus(messageDiv, 'read'), 1500);
        }

        return messageDiv;
    }

    // Update message status (checkmarks)
    function updateFloatingMessageStatus(messageDiv, status) {
        const checkMarks = messageDiv.querySelector('.check-marks');
        if (!checkMarks) return;

        const doubleCheck = `<svg class="check-double${status === 'read' ? ' read' : ''}" viewBox="0 0 16 15"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512z" fill="currentColor"/><path d="M10.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L3.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512z" fill="currentColor"/></svg>`;

        checkMarks.innerHTML = doubleCheck;
    }

    // Show typing indicator then message
    function showFloatingTypingThenMessage(content, delay = 1200) {
        const messagesContainer = document.getElementById('floatingMessages');
        const typingDiv = document.createElement('div');
        typingDiv.className = 'floating-message bot';
        const avatarIcon = floatingChatMode === 'dosen' ? '👨‍🎓' : '🤖';
        const avatarBg = floatingChatMode === 'dosen' ? 'linear-gradient(135deg, #006666, #008B8B)' : 'linear-gradient(135deg, #667eea, #764ba2)';
        
        typingDiv.innerHTML = `
            <div class="floating-message-avatar" style="background: ${avatarBg}">${avatarIcon}</div>
            <div class="floating-message-content">
                <div class="floating-message-bubble">
                    <div class="floating-typing-indicator">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            </div>
        `;
        messagesContainer.appendChild(typingDiv);
        scrollFloatingToBottom();

        setTimeout(() => {
            typingDiv.remove();
            addFloatingMessage(content);
        }, delay);
    }

    // Scroll floating chat to bottom
    function scrollFloatingToBottom() {
        const chatMessages = document.getElementById('floatingMessages');
        if (chatMessages) {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    }

    // Connect to Dosen
    function connectFloatingToDosen() {
        floatingChatMode = 'dosen';

        // Update header
        const header = document.getElementById('floatingHeader');
        header.style.background = 'linear-gradient(135deg, #006666 0%, #008B8B 100%)';
        document.getElementById('floatingAvatar').innerHTML = '👨‍🎓';
        document.getElementById('floatingName').textContent = 'Dr. Ahmad Wijaya';
        document.getElementById('floatingStatus').innerHTML = '<span class="online-dot"></span> Online • Dosen Pembimbing';

        // Hide quick options
        document.getElementById('floatingQuickOpts').style.display = 'none';

        // Add connection message
        setTimeout(() => {
            addFloatingMessage("✅ Anda sekarang terhubung dengan <strong>Dr. Ahmad Wijaya</strong>.<br><br>Silakan sampaikan pertanyaan Anda. Dosen akan membalas secepatnya.");
        }, 500);
    }

    // Handle floating quick option clicks
    document.querySelectorAll('.floating-quick-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const option = this.dataset.option;
            floatingSelectedTopic = option;

            // Add user selection message
            addFloatingMessage(this.textContent.trim(), true, 'sent');

            // Show bot response
            setTimeout(() => {
                if (option === 'dosen') {
                    showFloatingTypingThenMessage(floatingBotResponses[option].question, 1000);
                    setTimeout(() => {
                        connectFloatingToDosen();
                    }, 2500);
                } else {
                    showFloatingTypingThenMessage(floatingBotResponses[option].question, 1000);
                    floatingCurrentStep = 'follow-up';
                }
            }, 500);
        });
    });

    // Handle floating chat form submit
    document.getElementById('floatingChatForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const input = document.getElementById('floatingInput');
        const message = input.value.trim();

        if (!message) return;

        // Add user message
        addFloatingMessage(message, true, 'sent');
        input.value = '';

        if (floatingChatMode === 'bot') {
            if (floatingCurrentStep === 'follow-up' && floatingSelectedTopic && floatingBotResponses[floatingSelectedTopic].followUp) {
                setTimeout(() => {
                    showFloatingTypingThenMessage(floatingBotResponses[floatingSelectedTopic].followUp, 1500);
                    floatingCurrentStep = 'done';
                }, 500);
            } else if (floatingCurrentStep === 'done') {
                setTimeout(() => {
                    showFloatingTypingThenMessage("Untuk melanjutkan, silakan klik tombol '👨‍🏫 Langsung ke Dosen' untuk berbicara dengan Dosen Pembimbing. 😊", 1000);
                }, 500);
            } else {
                setTimeout(() => {
                    showFloatingTypingThenMessage("Silakan pilih topik konsultasi dari pilihan yang tersedia. 😊", 1000);
                }, 500);
            }
        } else {
            // Dosen mode - send to server via AJAX
            fetch('{{ route("pengajuan.sendChat") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    pesan: message,
                    dosen_id: 1,
                    chat_mode: 'dosen'
                })
            }).then(response => {
                // Message sent successfully
            }).catch(err => console.log('Send error:', err));
        }
    });

    // ========== DRAGGABLE FLOATING CHAT ==========
    (function() {
        const floatBtn = document.getElementById('floatingChatBtn');
        const chatWindow = document.getElementById('floatingChatWindow');
        
        let isDragging = false;
        let wasDragged = false;
        let startX, startY, startLeft, startTop;
        let btnRect;

        // Get initial position
        function getPosition() {
            const rect = floatBtn.getBoundingClientRect();
            return {
                left: rect.left,
                top: rect.top
            };
        }

        // Mouse/Touch start
        function onDragStart(e) {
            e.preventDefault();
            isDragging = true;
            wasDragged = false;
            floatBtn.classList.add('dragging');

            const pos = getPosition();
            startLeft = pos.left;
            startTop = pos.top;

            if (e.type === 'touchstart') {
                startX = e.touches[0].clientX;
                startY = e.touches[0].clientY;
            } else {
                startX = e.clientX;
                startY = e.clientY;
            }

            // Switch to left/top positioning
            floatBtn.style.right = 'auto';
            floatBtn.style.bottom = 'auto';
            floatBtn.style.left = startLeft + 'px';
            floatBtn.style.top = startTop + 'px';
        }

        // Mouse/Touch move
        function onDragMove(e) {
            if (!isDragging) return;

            let clientX, clientY;
            if (e.type === 'touchmove') {
                clientX = e.touches[0].clientX;
                clientY = e.touches[0].clientY;
            } else {
                clientX = e.clientX;
                clientY = e.clientY;
            }

            const deltaX = clientX - startX;
            const deltaY = clientY - startY;

            // Check if actually dragged (more than 5px)
            if (Math.abs(deltaX) > 5 || Math.abs(deltaY) > 5) {
                wasDragged = true;
            }

            let newLeft = startLeft + deltaX;
            let newTop = startTop + deltaY;

            // Boundary constraints
            const btnWidth = 60;
            const btnHeight = 60;
            const maxLeft = window.innerWidth - btnWidth;
            const maxTop = window.innerHeight - btnHeight;

            newLeft = Math.max(0, Math.min(newLeft, maxLeft));
            newTop = Math.max(0, Math.min(newTop, maxTop));

            floatBtn.style.left = newLeft + 'px';
            floatBtn.style.top = newTop + 'px';

            // Update chat window position
            updateChatWindowPosition(newLeft, newTop);
        }

        // Mouse/Touch end
        function onDragEnd(e) {
            if (!isDragging) return;
            isDragging = false;
            floatBtn.classList.remove('dragging');

            // Save position to localStorage
            const pos = getPosition();
            localStorage.setItem('floatingChatPos', JSON.stringify({ left: pos.left, top: pos.top }));

            // If it was just a click (not dragged), toggle chat
            if (!wasDragged) {
                toggleFloatingChat();
            }
        }

        // Update chat window position based on button position
        function updateChatWindowPosition(btnLeft, btnTop) {
            const windowWidth = 380;
            const windowHeight = 520;
            const gap = 15;
            const btnWidth = 60;
            const btnHeight = 60;

            let windowLeft = btnLeft - windowWidth - gap;
            let windowTop = btnTop - windowHeight + btnHeight;

            // If no space on left, put on right
            if (windowLeft < 10) {
                windowLeft = btnLeft + btnWidth + gap;
            }

            // If no space above, put below
            if (windowTop < 10) {
                windowTop = btnTop + btnHeight + gap;
            }

            // Keep within viewport
            windowLeft = Math.max(10, Math.min(windowLeft, window.innerWidth - windowWidth - 10));
            windowTop = Math.max(10, Math.min(windowTop, window.innerHeight - windowHeight - 10));

            chatWindow.style.right = 'auto';
            chatWindow.style.bottom = 'auto';
            chatWindow.style.left = windowLeft + 'px';
            chatWindow.style.top = windowTop + 'px';
        }

        // Event listeners
        floatBtn.addEventListener('mousedown', onDragStart);
        document.addEventListener('mousemove', onDragMove);
        document.addEventListener('mouseup', onDragEnd);

        // Touch events for mobile
        floatBtn.addEventListener('touchstart', onDragStart, { passive: false });
        document.addEventListener('touchmove', onDragMove, { passive: false });
        document.addEventListener('touchend', onDragEnd);

        // Restore saved position on load
        const savedPos = localStorage.getItem('floatingChatPos');
        if (savedPos) {
            try {
                const pos = JSON.parse(savedPos);
                floatBtn.style.right = 'auto';
                floatBtn.style.bottom = 'auto';
                floatBtn.style.left = pos.left + 'px';
                floatBtn.style.top = pos.top + 'px';
                updateChatWindowPosition(pos.left, pos.top);
            } catch (e) {
                console.log('Could not restore chat position');
            }
        }

        // Override toggle function to not fire on drag
        const originalToggle = window.toggleFloatingChat;
        window.toggleFloatingChat = function() {
            // Update window position when opening
            const pos = getPosition();
            updateChatWindowPosition(pos.left, pos.top);
            originalToggle();
        };
    })();

    // ========== PROGRES BIMBINGAN FILE UPLOAD PREVIEW ==========
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.querySelector('input[name="file_progres[]"]');
        const previewContainer = document.getElementById('previewFilesProgres');
        const fileListContainer = document.getElementById('fileListProgres');

        if (fileInput) {
            fileInput.addEventListener('change', function(e) {
                const files = e.target.files;
                fileListContainer.innerHTML = '';

                if (files.length > 0) {
                    previewContainer.classList.remove('d-none');
                    
                    Array.from(files).forEach((file, index) => {
                        const fileSize = (file.size / 1024 / 1024).toFixed(2);
                        const fileExt = file.name.split('.').pop().toLowerCase();
                        
                        let iconSvg = '';
                        if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExt)) {
                            iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/><path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/></svg>';
                        } else if (['pdf'].includes(fileExt)) {
                            iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/></svg>';
                        } else if (['doc', 'docx'].includes(fileExt)) {
                            iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/><path d="M4.5 12.5A.5.5 0 0 1 5 12h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 10h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/></svg>';
                        } else if (['zip', 'rar'].includes(fileExt)) {
                            iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M6.5 7.5a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v.938l.4 1.599a1 1 0 0 1-.416 1.074l-.93.62a1 1 0 0 1-1.109 0l-.93-.62a1 1 0 0 1-.415-1.074l.4-1.599V7.5zm2 0h-1v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.93-.62-.4-1.598a1 1 0 0 1-.03-.243V7.5z"/><path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm5.5-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9v1H8v1h1v1H8v1h1v1H7.5V5h-1V4h1V3h-1V2h1V1z"/></svg>';
                        } else {
                            iconSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16"><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg>';
                        }

                        const fileItem = document.createElement('span');
                        fileItem.className = 'badge bg-light text-dark border d-flex align-items-center gap-1 py-2 px-3';
                        fileItem.innerHTML = `${iconSvg} ${file.name} (${fileSize}MB)`;
                        fileListContainer.appendChild(fileItem);
                    });
                } else {
                    previewContainer.classList.add('d-none');
                }
            });
        }

        // Handle form submission with AJAX
        const formProgres = document.getElementById('formUploadProgres');
        if (formProgres) {
            formProgres.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Mengirim...';
                submitBtn.disabled = true;

                // Create FormData and send via AJAX
                const formData = new FormData(this);

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close modal
                        const modal = bootstrap.Modal.getInstance(document.getElementById('modalUploadProgres'));
                        modal.hide();

                        // Reset form
                        formProgres.reset();
                        previewContainer.classList.add('d-none');
                        fileListContainer.innerHTML = '';

                        // Show success alert
                        const alertHtml = `
                            <div class="alert alert-success alert-dismissible fade show position-fixed" style="top: 80px; right: 20px; z-index: 9999; max-width: 400px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16" class="me-2">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                <strong>Berhasil!</strong> Progres bimbingan telah dikirim ke dosen pembimbing.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                        document.body.insertAdjacentHTML('beforeend', alertHtml);

                        // Reload page after 1.5s to show new progres
                        setTimeout(() => {
                            window.location.href = window.location.pathname + '#progres-bimbingan';
                            window.location.reload();
                        }, 1500);
                    } else {
                        throw new Error(data.message || 'Terjadi kesalahan');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan: ' + error.message);
                })
                .finally(() => {
                    // Reset button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });
        }
    });
</script>
</body>
</html>