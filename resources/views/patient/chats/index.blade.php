<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Dokter - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --secondary: #64748b;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --completed: #8b5cf6;
      --bg: #f8fafc;
      --card-bg: #ffffff;
      --text: #1f2937;
      --text-light: #6b7280;
      --border: #e5e7eb;
      --radius: 16px;
      --shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      --gradient: linear-gradient(135deg, var(--primary), var(--primary-dark));
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--bg);
      color: var(--text);
      line-height: 1.6;
      padding-top: 80px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px 40px;
    }

    .card {
      background: var(--card-bg);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px;
      border: 1px solid var(--border);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin-bottom: 24px;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      flex-wrap: wrap;
      gap: 20px;
    }

    .header-content {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .header i {
      color: var(--primary);
      background: #e0f2fe;
      padding: 12px;
      border-radius: 12px;
      min-width: 46px;
      text-align: center;
      font-size: 18px;
    }

    .header h2 {
      font-size: 24px;
      font-weight: 700;
      color: var(--text);
      margin: 0;
    }

    .header-actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .btn {
      padding: 12px 20px;
      border-radius: 12px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 14px;
    }

    .btn-primary {
      background: var(--gradient);
      color: #fff;
      box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(37, 99, 235, 0.3);
    }

    .btn-secondary {
      background: #f1f5f9;
      color: var(--text);
      border: 1px solid var(--border);
    }

    .btn-secondary:hover {
      background: #e2e8f0;
      transform: translateY(-2px);
    }

    .btn-sm {
      padding: 10px 16px;
      font-size: 13px;
    }

    .search-container {
      position: relative;
      max-width: 400px;
      width: 100%;
    }

    .search-container i {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
      z-index: 2;
    }

    .search-input {
      width: 100%;
      padding: 12px 16px 12px 48px;
      border: 1px solid var(--border);
      border-radius: 12px;
      font-size: 14px;
      background: var(--card-bg);
      transition: all 0.3s;
    }

    .search-input:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .section-title {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 20px;
      font-size: 18px;
      font-weight: 600;
      color: var(--text);
    }

    .section-title i {
      color: var(--primary);
      background: #e0f2fe;
      padding: 8px;
      border-radius: 8px;
      font-size: 14px;
    }

    .chat-list {
      display: grid;
      gap: 12px;
    }

    .chat-item {
      display: flex;
      align-items: center;
      padding: 20px;
      background: var(--card-bg);
      border-radius: 12px;
      border: 1px solid var(--border);
      transition: all 0.3s ease;
      text-decoration: none;
      color: inherit;
    }

    .chat-item:hover {
      background: #f8fafc;
      border-color: var(--primary);
      transform: translateX(5px);
    }

    .avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      font-size: 18px;
      margin-right: 16px;
      flex-shrink: 0;
    }

    .chat-info {
      flex: 1;
      min-width: 0;
    }

    .doctor-name {
      font-weight: 600;
      margin-bottom: 4px;
      color: var(--text);
    }

    .last-message {
      color: var(--text-light);
      font-size: 14px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .chat-meta {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 6px;
      margin-left: 16px;
    }

    .unread-badge {
      background: var(--danger);
      color: white;
      border-radius: 20px;
      padding: 4px 10px;
      font-size: 12px;
      font-weight: 600;
      min-width: 20px;
      text-align: center;
    }

    .time-stamp {
      color: var(--text-light);
      font-size: 12px;
      white-space: nowrap;
    }

    .table-container {
      overflow-x: auto;
      border-radius: 10px;
      border: 1px solid var(--border);
      margin: 20px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 600px;
    }

    thead {
      background-color: #f8fafc;
    }

    th {
      padding: 16px 20px;
      text-align: left;
      font-weight: 600;
      color: var(--text-light);
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 1px solid var(--border);
    }

    td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--border);
    }

    tbody tr {
      transition: all 0.3s ease;
    }

    tbody tr:hover {
      background-color: #f8fafc;
    }

    .table-btn {
      padding: 8px 12px;
      border-radius: 8px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 12px;
    }

    .table-btn-primary {
      background: var(--gradient);
      color: #fff;
    }

    .table-btn-primary:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 8px rgba(37, 99, 235, 0.2);
    }

    .table-btn-outline {
      background: #f1f5f9;
      color: var(--text);
      border: 1px solid var(--border);
    }

    .table-btn-outline:hover {
      background: #e2e8f0;
      transform: translateY(-1px);
    }

    .empty-state {
      text-align: center;
      padding: 40px 20px;
      color: var(--text-light);
    }

    .empty-state i {
      font-size: 48px;
      margin-bottom: 16px;
      color: #d1d5db;
    }

    .empty-state h4 {
      font-size: 16px;
      margin-bottom: 8px;
      color: var(--text);
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
      .container {
        max-width: 100%;
        padding: 0 20px 30px;
      }
      
      .card {
        padding: 28px;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 0 15px 30px;
      }

      .card {
        padding: 24px;
      }

      .header {
        flex-direction: column;
        align-items: flex-start;
      }

      .header-content {
        flex-direction: row;
        text-align: left;
        gap: 12px;
        width: 100%;
      }

      .header h2 {
        font-size: 22px;
      }

      .header-actions {
        width: 100%;
        justify-content: flex-start;
      }

      .search-container {
        max-width: 100%;
      }

      .table-container {
        display: none;
      }

      .chat-list {
        display: grid;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }
    }

    @media (min-width: 769px) {
      .chat-list {
        display: none;
      }

      .table-container {
        display: block;
      }
    }

    @media (max-width: 640px) {
      body {
        padding-top: 70px;
      }

      .container {
        padding: 0 12px 20px;
      }

      .card {
        padding: 20px;
        border-radius: 14px;
      }

      .header h2 {
        font-size: 20px;
      }

      .header-content {
        flex-direction: column;
        text-align: center;
      }

      .header i {
        align-self: center;
      }

      .header-actions {
        flex-direction: column;
        width: 100%;
      }

      .chat-item {
        padding: 16px;
      }

      .avatar {
        width: 44px;
        height: 44px;
        font-size: 16px;
        margin-right: 12px;
      }
      
      .section-title {
        font-size: 16px;
      }
      
      .section-title i {
        padding: 6px;
        font-size: 12px;
      }
    }

    @media (max-width: 480px) {
      body {
        padding-top: 60px;
      }
      
      .container {
        padding: 0 10px 15px;
      }
      
      .card {
        padding: 16px;
        border-radius: 12px;
      }
      
      .header h2 {
        font-size: 18px;
      }
      
      .header i {
        padding: 10px;
        min-width: 40px;
        font-size: 16px;
      }

      .chat-meta {
        display: none;
      }

      .last-message {
        font-size: 13px;
      }
      
      .chat-item {
        padding: 14px;
      }
      
      .avatar {
        width: 40px;
        height: 40px;
        font-size: 14px;
        margin-right: 10px;
      }
      
      .doctor-name {
        font-size: 14px;
      }
      
      .empty-state {
        padding: 30px 15px;
      }
      
      .empty-state i {
        font-size: 40px;
      }
      
      .empty-state h4 {
        font-size: 15px;
      }
    }

    @media (max-width: 360px) {
      .header h2 {
        font-size: 16px;
      }
      
      .header i {
        padding: 8px;
        min-width: 36px;
        font-size: 14px;
      }
      
      .chat-item {
        padding: 12px;
      }
      
      .avatar {
        width: 36px;
        height: 36px;
        font-size: 13px;
        margin-right: 8px;
      }
      
      .doctor-name {
        font-size: 13px;
      }
      
      .last-message {
        font-size: 12px;
      }
      
      .empty-state i {
        font-size: 36px;
      }
    }

    /* Focus states for accessibility */
    .btn:focus, a:focus, input:focus, .table-btn:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }

    /* Animation */
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

    .chat-item {
      animation: fadeIn 0.3s ease-out;
    }
    
    /* Status indicator for doctors */
    .status-indicator {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 14px;
    }
    
    .status-online {
      color: var(--success);
    }
    
    .status-offline {
      color: var(--text-light);
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-comments"></i>
          <h2>Chat Dokter</h2>
        </div>
        <div class="header-actions">
          <a href="{{ route('patient.dashboard') }}" class="btn btn-secondary btn-sm">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
          </a>
        </div>
      </div>

      <!-- Search functionality can be added here if needed -->
      <!--
      <div class="search-container" style="margin-bottom: 24px;">
        <i class="fa-solid fa-search"></i>
        <input type="text" class="search-input" placeholder="Cari dokter...">
      </div>
      -->

      <!-- Recent Chats Section -->
      <div class="section-title">
        <i class="fa-solid fa-clock-rotate-left"></i>
        <span>Percakapan Terbaru</span>
      </div>

      @if(($recentDoctors ?? collect())->isEmpty())
        <div class="empty-state">
          <i class="fa-solid fa-comment-slash"></i>
          <h4>Belum ada percakapan</h4>
          <p>Mulai percakapan baru dengan dokter pilihan Anda</p>
        </div>
      @else
        <!-- Mobile List -->
        <div class="chat-list" id="recentList">
          @foreach($recentDoctors as $d)
            @php $unreadCount = (int)($unread[$d->id] ?? 0); @endphp
            <a href="{{ route('patient.chats.show', $d) }}" class="chat-item">
              <div class="avatar">
                {{ strtoupper(mb_substr($d->name, 0, 1)) }}
              </div>
              <div class="chat-info">
                <div class="doctor-name">{{ $d->name }}</div>
                <div class="last-message">Tap untuk melanjutkan percakapan</div>
              </div>
              <div class="chat-meta">
                @if($unreadCount > 0)
                  <span class="unread-badge">{{ $unreadCount }}</span>
                @endif
                <span class="time-stamp">Terbaru</span>
              </div>
            </a>
          @endforeach
        </div>

        <!-- Desktop Table -->
        <div class="table-container">
          <table id="recentTable">
            <thead>
              <tr>
                <th>Dokter</th>
                <th>Pesan Belum Dibaca</th>
                <th style="width: 150px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($recentDoctors as $d)
                @php $unreadCount = (int)($unread[$d->id] ?? 0); @endphp
                <tr>
                  <td>
                    <div style="display: flex; align-items: center; gap: 12px;">
                      <div class="avatar" style="width: 40px; height: 40px; font-size: 16px;">
                        {{ strtoupper(mb_substr($d->name, 0, 1)) }}
                      </div>
                      <div>
                        <div style="font-weight: 600;">{{ $d->name }}</div>
                        <div style="font-size: 12px; color: var(--text-light);">Percakapan terbaru</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    @if($unreadCount > 0)
                      <span class="unread-badge">{{ $unreadCount }} pesan baru</span>
                    @else
                      <span style="color: var(--text-light); font-size: 14px;">Tidak ada pesan baru</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('patient.chats.show', $d) }}" class="table-btn table-btn-primary">
                      <i class="fa-solid fa-message"></i> Buka Chat
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif

      <!-- All Doctors Section -->
      <div class="section-title" style="margin-top: 30px;">
        <i class="fa-solid fa-user-doctor"></i>
        <span>Semua Dokter Tersedia</span>
      </div>

      @php $allDoctorsList = $allDoctors ?? $doctors ?? collect(); @endphp
      @if($allDoctorsList->isEmpty())
        <div class="empty-state">
          <i class="fa-solid fa-user-doctor"></i>
          <h4>Belum ada dokter terdaftar</h4>
          <p>Silakan hubungi administrator untuk informasi lebih lanjut</p>
        </div>
      @else
        <!-- Mobile List -->
        <div class="chat-list" id="allList">
          @foreach($allDoctorsList as $d)
            <a href="{{ route('patient.chats.show', $d) }}" class="chat-item">
              <div class="avatar">
                {{ strtoupper(mb_substr($d->name, 0, 1)) }}
              </div>
              <div class="chat-info">
                <div class="doctor-name">{{ $d->name }}</div>
                <div class="last-message">Mulai percakapan baru</div>
              </div>
              <div class="chat-meta">
                <span class="time-stamp">Chat Baru</span>
              </div>
            </a>
          @endforeach
        </div>

        <!-- Desktop Table -->
        <div class="table-container">
          <table id="allTable">
            <thead>
              <tr>
                <th>Nama Dokter</th>
                <th>Status</th>
                <th style="width: 150px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allDoctorsList as $d)
                <tr>
                  <td>
                    <div style="display: flex; align-items: center; gap: 12px;">
                      <div class="avatar" style="width: 40px; height: 40px; font-size: 16px;">
                        {{ strtoupper(mb_substr($d->name, 0, 1)) }}
                      </div>
                      <div style="font-weight: 600;">{{ $d->name }}</div>
                    </div>
                  </td>
                  <td>
                    <span class="status-indicator status-online">
                      <i class="fa-solid fa-circle-check"></i> Tersedia
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('patient.chats.show', $d) }}" class="table-btn table-btn-outline">
                      <i class="fa-solid fa-message"></i> Mulai Chat
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add animation to chat items
      const chatItems = document.querySelectorAll('.chat-item');
      chatItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
      });

      // Add hover effects to chat items
      chatItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(8px)';
        });
        item.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(5px)';
        });
      });
      
      // Add animation to table rows
      const tableRows = document.querySelectorAll('tbody tr');
      tableRows.forEach((row, index) => {
        row.style.animationDelay = `${index * 0.1}s`;
      });
    });
  </script>
</body>
</html>