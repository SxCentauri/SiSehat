<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Chat Pasien - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    /* ===== Styling sesuai tema MediCare ===== */
    *{margin:0;padding:0;box-sizing:border-box}
    :root{
      --primary-color:#2563eb;
      --secondary-color:#1e40af;
      --accent-color:#60a5fa;
      --light-blue:#dbeafe;
      --extra-light-blue:#eff6ff;
      --text-color:#1f2937;
      --text-light:#6b7280;
      --white:#ffffff;
      --success-color:#10b981;
      --warning-color:#f59e0b;
      --gradient:linear-gradient(135deg,var(--primary-color),var(--secondary-color));
      --shadow:0 10px 25px rgba(37,99,235,.08);
      --shadow-hover:0 15px 35px rgba(37,99,235,.12);
      --radius:12px;
      --transition:all 0.3s ease;
    }

    body {
      line-height: 1.6;
      color: var(--text-color);
      background: #f8fafc;
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 24px 20px;
    }

    /* Header */
    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      flex-wrap: wrap;
      gap: 1rem;
      background: var(--white);
      padding: 1.5rem;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
    }

    .page-title {
      font-size: 1.8rem;
      font-weight: 800;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      color: var(--secondary-color);
    }

    .page-title i {
      color: var(--primary-color);
      font-size: 1.8rem;
      background: var(--extra-light-blue);
      padding: 0.6rem;
      border-radius: 10px;
    }

    /* Search */
    .search-box {
      position: relative;
      max-width: 350px;
      width: 100%;
    }

    .search-input {
      width: 100%;
      padding: 0.85rem 1rem 0.85rem 3rem;
      border: 1px solid #e5e7eb;
      border-radius: var(--radius);
      outline: none;
      font-size: 0.95rem;
      transition: var(--transition);
      background: var(--extra-light-blue);
    }

    .search-input:focus {
      border-color: var(--accent-color);
      box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.2);
    }

    .search-icon {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
    }

    /* Empty state */
    .empty-state {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 4rem 2rem;
      text-align: center;
      background: var(--white);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      margin-top: 1rem;
    }

    .empty-state i {
      font-size: 4rem;
      color: var(--accent-color);
      margin-bottom: 1.5rem;
      opacity: 0.8;
    }

    .empty-state h3 {
      font-size: 1.5rem;
      margin-bottom: 0.75rem;
      color: var(--secondary-color);
    }

    .empty-state p {
      color: var(--text-light);
      max-width: 500px;
      line-height: 1.7;
    }

    /* Patient Card */
    .patient-list {
      display: grid;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .patient-card {
      display: flex;
      align-items: center;
      padding: 1.25rem;
      background: var(--white);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      transition: var(--transition);
      border-left: 4px solid transparent;
    }

    .patient-card:hover {
      transform: translateY(-3px);
      box-shadow: var(--shadow-hover);
      border-left-color: var(--primary-color);
    }

    .patient-avatar {
      width: 56px;
      height: 56px;
      border-radius: 50%;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      font-size: 1.3rem;
      margin-right: 1.25rem;
      flex-shrink: 0;
    }

    .patient-info {
      flex: 1;
      min-width: 0;
      padding-right: 1rem;
    }

    .patient-name {
      font-weight: 600;
      margin-bottom: 0.35rem;
      font-size: 1.05rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .online-status {
      display: inline-block;
      width: 8px;
      height: 8px;
      background: var(--success-color);
      border-radius: 50%;
    }

    .offline-status {
      display: inline-block;
      width: 8px;
      height: 8px;
      background: var(--text-light);
      border-radius: 50%;
    }

    .patient-message {
      color: var(--text-light);
      font-size: 0.9rem;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .patient-meta {
      text-align: right;
      font-size: 0.85rem;
      color: var(--text-light);
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 0.5rem;
    }

    .message-time {
      white-space: nowrap;
    }

    .unread-badge {
      background: var(--primary-color);
      color: white;
      font-size: 0.75rem;
      font-weight: 600;
      padding: 0.35rem 0.65rem;
      border-radius: 999px;
      min-width: 24px;
      text-align: center;
    }

    /* Table Desktop */
    .table-container {
      background: var(--white);
      border-radius: var(--radius);
      overflow: hidden;
      box-shadow: var(--shadow);
      margin-top: 1.5rem;
      display: none;
    }

    @media (min-width: 1024px) {
      .patient-list {
        display: none;
      }
      
      .table-container {
        display: block;
      }
      
      .patients-table {
        width: 100%;
        border-collapse: collapse;
      }

      .patients-table thead {
        background: var(--light-blue);
      }
      
      .patients-table th {
        padding: 1.15rem 1.25rem;
        text-align: left;
        color: var(--secondary-color);
        font-weight: 600;
        font-size: 0.95rem;
        border-bottom: 1px solid #e5e7eb;
      }

      .patients-table td {
        padding: 1.15rem 1.25rem;
        border-bottom: 1px solid #f1f5f9;
      }
      
      .patients-table tbody tr {
        transition: var(--transition);
      }
      
      .patients-table tbody tr:hover {
        background: var(--extra-light-blue);
      }
      
      .table-patient {
        display: flex;
        align-items: center;
        gap: 1rem;
      }
      
      .table-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 1rem;
      }
      
      .table-actions {
        display: flex;
        gap: 0.75rem;
      }
      
      .chat-btn {
        background: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: var(--transition);
      }
      
      .chat-btn:hover {
        background: var(--secondary-color);
      }
    }

    /* Filter Tabs */
    .filter-tabs {
      display: flex;
      gap: 0.5rem;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
    }
    
    .filter-tab {
      padding: 0.6rem 1.25rem;
      background: var(--white);
      border-radius: var(--radius);
      font-size: 0.9rem;
      font-weight: 500;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: var(--shadow);
      border: 1px solid #e5e7eb;
    }
    
    .filter-tab.active {
      background: var(--primary-color);
      color: var(--white);
    }
    
    .filter-tab:hover:not(.active) {
      background: var(--extra-light-blue);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .page-header {
        flex-direction: column;
        align-items: flex-start;
      }
      
      .search-box {
        max-width: 100%;
      }
      
      .patient-card {
        padding: 1rem;
      }
      
      .patient-avatar {
        width: 48px;
        height: 48px;
        margin-right: 1rem;
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="page-header">
      <h1 class="page-title">
        <i class="fas fa-comments"></i>
        Daftar Chat Pasien
      </h1>
    </div>

    <div class="filter-tabs">
      <div class="filter-tab active">Semua</div>
      <div class="filter-tab">Belum Dibaca</div>
      <div class="filter-tab">Online</div>
    </div>

    @if($patients->isEmpty())
      <div class="empty-state">
        <i class="fas fa-comment-slash"></i>
        <h3>Belum ada percakapan</h3>
        <p>Anda belum memiliki percakapan dengan pasien. Chat akan muncul ketika pasien mengirim pesan pertama.</p>
      </div>
    @else
      <!-- Mobile View -->
      <div class="patient-list">
        @foreach($patients as $patient)
          <a href="{{ route('doctor.chat.thread', $patient->id) }}" class="patient-card">
            <div class="patient-avatar">
              {{ substr($patient->name, 0, 1) }}
            </div>
            <div class="patient-info">
              <h3 class="patient-name">
                {{ $patient->name }}
                <span class="online-status"></span>
              </h3>
              <p class="patient-message">{{ $patient->latestMessage->message ?? 'Belum ada pesan' }}</p>
            </div>
            <div class="patient-meta">
              <div class="message-time">{{ optional($patient->latestMessage->created_at)->diffForHumans() ?? '-' }}</div>
              @if(isset($patient->unread_count) && $patient->unread_count > 0)
                <span class="unread-badge">{{ $patient->unread_count }}</span>
              @endif
            </div>
          </a>
        @endforeach
      </div>

      <!-- Desktop View -->
      <div class="table-container">
        <table class="patients-table">
          <thead>
            <tr>
              <th>Nama Pasien</th>
              <th>Pesan Terakhir</th>
              <th>Waktu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($patients as $patient)
              <tr>
                <td>
                  <div class="table-patient">
                    <div class="table-avatar">
                      {{ substr($patient->name, 0, 1) }}
                    </div>
                    <div>
                      {{ $patient->name }}
                    </div>
                  </div>
                </td>
                <td>{{ $patient->latestMessage->message ?? '-' }}</td>
                <td>{{ optional($patient->latestMessage->created_at)->diffForHumans() ?? '-' }}</td>
                <td>
                  <div class="table-actions">
                    <a href="{{ route('doctor.chat.thread', $patient->id) }}" class="chat-btn">
                      <i class="fas fa-comment-dots" style="margin-right: 5px;"></i>Chat
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
    @endif
  </main>

  <script>
    // Fungsi pencarian sederhana
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.querySelector('.search-input');
      const patientCards = document.querySelectorAll('.patient-card');
      const tableRows = document.querySelectorAll('.patients-table tbody tr');
      
      searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        // Filter untuk tampilan mobile
        patientCards.forEach(card => {
          const patientName = card.querySelector('.patient-name').textContent.toLowerCase();
          card.style.display = patientName.includes(searchTerm) ? 'flex' : 'none';
        });
        
        // Filter untuk tampilan desktop
        tableRows.forEach(row => {
          const patientName = row.querySelector('.table-patient div:last-child').textContent.toLowerCase();
          row.style.display = patientName.includes(searchTerm) ? '' : 'none';
        });
      });
      
      // Tab filter functionality
      const filterTabs = document.querySelectorAll('.filter-tab');
      filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
          filterTabs.forEach(t => t.classList.remove('active'));
          this.classList.add('active');
          // Di sini bisa ditambahkan logika filtering sesuai tab yang dipilih
        });
      });
    });
  </script>
</body>
</html>