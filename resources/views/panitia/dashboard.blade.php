<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Panitia</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f6;
            color: #1f2937;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            background: #166534;
            color: white;
            padding: 25px 18px;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 35px;
        }

        .menu {
            display: block;
            padding: 13px 15px;
            margin-bottom: 8px;
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }

        .menu.active,
        .menu:hover {
            background: rgba(255,255,255,.15);
        }

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .welcome h1 {
            margin: 0 0 6px;
        }

        .welcome p {
            margin: 0;
            color: #64748b;
        }

        .profile {
            background: white;
            padding: 10px 16px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,.06);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 4px 15px rgba(0,0,0,.06);
        }

        .card small {
            color: #64748b;
        }

        .number {
            font-size: 30px;
            font-weight: bold;
            margin-top: 8px;
        }

        .task-box {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,.06);
        }

        .task-box h2 {
            margin-top: 0;
        }

        .task {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 12px;
        }

        .task:last-child {
            margin-bottom: 0;
        }

        .task-title {
            font-weight: bold;
            font-size: 17px;
        }

        .task-info {
            margin-top: 8px;
            color: #64748b;
            font-size: 14px;
        }

        .status {
            display: inline-block;
            margin-top: 10px;
            padding: 6px 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            background: #f1f5f9;
        }

        .empty {
            padding: 30px;
            text-align: center;
            color: #64748b;
        }

        @media (max-width: 900px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .sidebar {
                width: 210px;
            }

            .main {
                margin-left: 210px;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: static;
                width: 100%;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .topbar {
                display: block;
            }

            .profile {
                margin-top: 15px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="logo">
        Payakumbuh Event Hub
    </div>

    <a href="{{ route('panitia.dashboard') }}" class="menu active">
        Dashboard
    </a>

    <a href="#tugas" class="menu">
        Tugas Saya
    </a>

    <a href="{{ route('logout') }}"
       class="menu"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form"
          action="{{ route('logout') }}"
          method="POST"
          style="display:none;">
        @csrf
    </form>
</aside>

<main class="main">

    <div class="topbar">
        <div class="welcome">
            <h1>Dashboard Panitia</h1>
            <p>Kelola dan pantau tugas yang diberikan kepada Anda.</p>
        </div>

        <div class="profile">
            {{ $user->name }}
        </div>
    </div>

    @php
        $total = $tugas->count();
        $belum = $tugas->where('status', 'belum_dimulai')->count();
        $proses = $tugas->where('status', 'sedang_dikerjakan')->count();
        $selesai = $tugas->where('status', 'selesai')->count();
    @endphp

    <div class="cards">
        <div class="card">
            <small>Total Tugas</small>
            <div class="number">{{ $total }}</div>
        </div>

        <div class="card">
            <small>Belum Dimulai</small>
            <div class="number">{{ $belum }}</div>
        </div>

        <div class="card">
            <small>Sedang Dikerjakan</small>
            <div class="number">{{ $proses }}</div>
        </div>

        <div class="card">
            <small>Selesai</small>
            <div class="number">{{ $selesai }}</div>
        </div>
    </div>

    <div class="task-box" id="tugas">
        <h2>Tugas Saya</h2>

        @forelse ($tugas as $item)

            <div class="task">

                <div class="task-title">
                    {{ $item->judul_tugas }}
                </div>

                <div class="task-info">
                    Event:
                    {{ $item->eventPanitia?->event?->nama_event ?? '-' }}
                </div>

                <div class="task-info">
                    Tanggal:
                    {{ $item->tanggal ?? '-' }}
                </div>

                <div class="task-info">
                    Lokasi:
                    {{ $item->lokasi ?? '-' }}
                </div>

                <span class="status">
                    {{ ucwords(str_replace('_', ' ', $item->status)) }}
                </span>

            </div>

        @empty

            <div class="empty">
                Belum ada tugas yang diberikan kepada Anda.
            </div>

        @endforelse
    </div>

</main>

</body>
</html>
