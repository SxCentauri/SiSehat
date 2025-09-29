<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Chat Pasien - MediCare</title>
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
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 100px 20px 40px;
    }

    .card {
      background: var(--card-bg);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px;
      border: 1px solid var(--border);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin-bottom: 30px;
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
      padding-bottom: 20px;
      border-bottom: 1px solid var(--border);
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
      flex-shrink: 0;
    }

    .header h2 {
      font-size: 24px;
      font-weight: 700;
      color: var(--text);
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

    .table-container {
      overflow-x: auto;
      border-radius: 10px;
      border: 1px solid var(--border);
    }

    table {
      width: 100%;
      border-collapse: collapse;
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
      transform: translateX(5px);
    }

    .badge {
      display: inline-flex;
      align-items: center;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      gap: 6px;
      border: 1px solid transparent;
    }

    .badge.success {
      background-color: #f0fdf4;
      color: var(--success);
      border-color: #bbf7d0;
    }

    .badge.warning {
      background-color: #fffbeb;
      color: var(--warning);
      border-color: #fef3c7;
    }

    .badge.info {
      background-color: #eff6ff;
      color: var(--primary);
      border-color: #dbeafe;
    }

    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: var(--text-light);
    }

    .empty-state i {
      font-size: 64px;
      margin-bottom: 16px;
      color: #d1d5db;
    }

    .empty-state h3 {
      font-size: 18px;
      margin-bottom: 8px;
      color: var(--text);
    }

    .empty-state p {
      font-size: 14px;
      margin-bottom: 20px;
    }

    .data-count-info {
      text-align: center;
      margin-top: 20px;
      color: var(--text-light);
      font-size: 14px;
      font-weight: 500;
      padding: 12px;
      background: #f8fafc;
      border-radius: var(--radius);
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

    .online-status {
      display: inline-block;
      width: 8px;
      height: 8px;
      background: var(--success);
      border-radius: 50%;
      margin-left: 8px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        padding: 90px 15px 30px;
      }

      .card {
        padding: 24px;
      }

      .header {
        flex-direction: column;
        align-items: stretch;
        gap: 16px;
      }

      .header-content {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
      }

      .header h2 {
        font-size: 22px;
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

      th, td {
        padding: 12px 16px;
      }

      .table-container {
        font-size: 14px;
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
      .container {
        padding: 80px 12px 20px;
      }

      .card {
        padding: 20px;
        border-radius: 14px;
      }

      .header {
        gap: 12px;
      }

      .header-content {
        flex-direction: column;
        gap: 10px;
      }

      .header h2 {
        font-size: 20px;
      }

      .header i {
        padding: 10px;
        min-width: 42px;
        font-size: 16px;
      }

      .empty-state {
        padding: 40px 15px;
      }

      .empty-state i {
        font-size: 48px;
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

      th, td {
        padding: 10px 12px;
        font-size: 13px;
      }

      /* Sembunyikan kolom tertentu di mobile */
      th:nth-child(3),
      td:nth-child(3) {
        display: none;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }
    }

    @media (max-width: 480px) {
      .header-content {
        gap: 8px;
      }

      .header h2 {
        font-size: 20px;
      }

      .header i {
        padding: 8px;
        min-width: 38px;
        font-size: 14px;
      }

      .chat-meta {
        display: none;
      }

      .last-message {
        font-size: 13px;
      }

      th, td {
        padding: 10px 12px;
        font-size: 13px;
      }

      /* Sembunyikan lebih banyak kolom di mobile kecil */
      th:nth-child(2),
      td:nth-child(2) {
        display: none;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }
    }

    @media (max-width: 360px) {
      .header-content {
        flex-direction: column;
        text-align: center;
      }

      .header h2 {
        font-size: 17px;
        text-align: center;
      }

      .header i {
        align-self: center;
      }
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

    .card {
      animation: fadeIn 0.5s ease-out;
    }

    .chat-item {
      animation: fadeIn 0.3s ease-out;
    }

    tbody tr {
      animation: fadeIn 0.3s ease-out;
    }

    /* Focus states for accessibility */
    .btn:focus, a:focus, input:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-comments"></i>
          <h2>Daftar Chat Pasien</h2>
        </div>
        <div class="header-actions">
          <a href="{{ route('doctor.dashboard') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
          </a>
        </div>
      </div>

      @if($patients->isEmpty())
        <div class="empty-state">
          <i class="fa-solid fa-comment-slash"></i>
          <h3>Belum ada percakapan</h3>
          <p>Anda belum memiliki percakapan dengan pasien. Chat akan muncul ketika pasien mengirim pesan pertama.</p>
        </div>
      @else
        <!-- Mobile List -->
        <div class="chat-list" id="recentList">
          @foreach($patients as $patient)
            <a href="{{ route('doctor.chat.thread', $patient->id) }}" class="chat-item">
              <div class="avatar">
                {{ strtoupper(mb_substr($patient->name, 0, 1)) }}
              </div>
              <div class="chat-info">
                <div class="doctor-name">
                  {{ $patient->name }}
                  <span class="online-status"></span>
                </div>
                <div class="last-message">{{ $patient->latestMessage->message ?? 'Belum ada pesan' }}</div>
              </div>
              <div class="chat-meta">
                @if(isset($patient->unread_count) && $patient->unread_count > 0)
                  <span class="unread-badge">{{ $patient->unread_count }}</span>
                @endif
                <span class="time-stamp">{{ optional($patient->latestMessage->created_at)->diffForHumans() ?? '-' }}</span>
              </div>
            </a>
          @endforeach
        </div>

        <!-- Desktop Table -->
        <div class="table-container">
          <table id="recentTable">
            <thead>
              <tr>
                <th>Nama Pasien</th>
                <th>Pesan Terakhir</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($patients as $patient)
                <tr>
                  <td>
                    <div style="display: flex; align-items: center; gap: 12px;">
                      <div class="avatar" style="width: 40px; height: 40px; font-size: 16px;">
                        {{ strtoupper(mb_substr($patient->name, 0, 1)) }}
                      </div>
                      <div>
                        <div style="font-weight: 600;">{{ $patient->name }}</div>
                      </div>
                    </div>
                  </td>
                  <td>{{ $patient->latestMessage->message ?? '-' }}</td>
                  <td>
                    <span class="badge success">
                      <i class="fa-solid fa-circle-check"></i> Online
                    </span>
                  </td>
                  <td>
                    <div style="display: flex; align-items: center; gap: 8px;">
                      <a href="{{ route('doctor.chat.thread', $patient->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-message"></i> Buka Chat
                      </a>
                      @if(isset($patient->unread_count) && $patient->unread_count > 0)
                        <span class="unread-badge">{{ $patient->unread_count }}</span>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Info jumlah data -->
        <div class="data-count-info">
          Menampilkan {{ $patients->count() }} percakapan dengan pasien
        </div>
      @endif
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Search functionality
      const searchInput = document.querySelector('.search-input');

      function filterTable(tableSelector) {
        const searchTerm = searchInput.value.toLowerCase();
        document.querySelectorAll(`${tableSelector} tbody tr`).forEach(row => {
          const name = row.querySelector('td:first-child')?.textContent?.toLowerCase() || '';
          if (name.includes(searchTerm)) {
            row.style.display = '';
            row.style.animation = 'fadeIn 0.3s ease-out';
          } else {
            row.style.display = 'none';
          }
        });
      }

      function filterList(listSelector) {
        const searchTerm = searchInput.value.toLowerCase();
        document.querySelectorAll(`${listSelector} .chat-item`).forEach(item => {
          const name = item.querySelector('.doctor-name')?.textContent?.toLowerCase() || '';
          if (name.includes(searchTerm)) {
            item.style.display = 'flex';
            item.style.animation = 'fadeIn 0.3s ease-out';
          } else {
            item.style.display = 'none';
          }
        });
      }

      searchInput.addEventListener('input', function() {
        filterTable('#recentTable');
        filterList('#recentList');
      });

      // Add hover effects to chat items
      const chatItems = document.querySelectorAll('.chat-item');
      chatItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(5px)';
        });
        item.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0)';
        });
      });
    });
  </script>
</body>
</html>
