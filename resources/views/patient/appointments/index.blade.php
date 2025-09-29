<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Janji Temu Saya - MediCare</title>
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
    }

    .header h2 {
      font-size: 24px;
      font-weight: 700;
      color: var(--text);
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

    .badge.pending {
      background-color: #fffbeb;
      color: var(--warning);
      border-color: #fef3c7;
    }

    .badge.confirmed {
      background-color: #f0fdf4;
      color: var(--success);
      border-color: #bbf7d0;
    }

    .badge.completed {
      background-color: #faf5ff;
      color: var(--completed);
      border-color: #e9d5ff;
    }

    .badge.cancelled {
      background-color: #fef2f2;
      color: var(--danger);
      border-color: #fecaca;
    }

    .badge.approved {
      background-color: #f0fdf4;
      color: var(--success);
      border-color: #bbf7d0;
    }

    .doctor-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .doctor-icon {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 14px;
    }

    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 24px;
      gap: 8px;
      flex-wrap: wrap;
    }

    .pagination a, .pagination span {
      padding: 8px 16px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s;
      font-size: 14px;
    }

    .pagination a {
      color: var(--primary);
      border: 1px solid var(--border);
    }

    .pagination a:hover {
      background-color: #eff6ff;
      border-color: var(--primary);
    }

    .pagination .current {
      background: var(--gradient);
      color: white;
      border: 1px solid var(--primary);
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
    }

    .header-actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    /* Filter Section */
    .filter-section {
      display: flex;
      gap: 8px;
      margin-bottom: 20px;
      flex-wrap: wrap;
      align-items: center;
    }

    .filter-btn {
      padding: 8px 16px;
      border: 1px solid var(--border);
      border-radius: 8px;
      background: white;
      color: var(--text-light);
      cursor: pointer;
      transition: all 0.3s;
      font-size: 14px;
      white-space: nowrap;
    }

    .filter-btn.active {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
    }

    .filter-btn:hover {
      border-color: var(--primary);
    }

    /* Mobile Cards View */
    .mobile-cards {
      display: none;
      gap: 12px;
      flex-direction: column;
    }

    .appointment-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 16px;
      transition: all 0.3s ease;
    }

    .appointment-card:hover {
      border-color: var(--primary);
      transform: translateY(-2px);
      box-shadow: var(--shadow);
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 12px;
    }

    .card-date-time {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .card-date {
      font-weight: 600;
      color: var(--text);
      font-size: 15px;
    }

    .card-time {
      font-size: 14px;
      color: var(--text-light);
    }

    .card-doctor {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 12px;
    }

    .card-doctor .doctor-icon {
      width: 28px;
      height: 28px;
      font-size: 12px;
    }

    .doctor-details {
      flex: 1;
    }

    .doctor-name {
      font-weight: 600;
      font-size: 14px;
    }

    .doctor-specialty {
      font-size: 12px;
      color: var(--text-light);
    }

    .card-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 12px;
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
      .container {
        max-width: 100%;
        padding: 100px 20px 30px;
      }
      
      .card {
        padding: 28px;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 90px 15px 30px;
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

      th, td {
        padding: 14px 16px;
      }

      .table-container {
        display: none;
      }

      .mobile-cards {
        display: flex;
      }

      .filter-section {
        justify-content: center;
      }

      .filter-btn {
        flex: 1;
        text-align: center;
        min-width: 80px;
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

      .btn {
        width: 100%;
        justify-content: center;
      }

      .empty-state {
        padding: 40px 15px;
      }

      .empty-state i {
        font-size: 48px;
      }

      .badge {
        padding: 6px 12px;
        font-size: 11px;
      }

      .filter-section {
        gap: 6px;
      }

      .filter-btn {
        padding: 6px 12px;
        font-size: 13px;
        min-width: 70px;
      }

      .appointment-card {
        padding: 14px;
      }

      .card-header {
        flex-direction: column;
        gap: 8px;
        align-items: flex-start;
      }

      .card-footer {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }
    }

    @media (max-width: 480px) {
      body {
        padding-top: 70px;
      }
      
      .container {
        padding: 70px 10px 15px;
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

      .empty-state {
        padding: 30px 10px;
      }
      
      .empty-state i {
        font-size: 40px;
      }
      
      .empty-state h3 {
        font-size: 16px;
      }
      
      .empty-state p {
        font-size: 13px;
      }

      .filter-btn {
        padding: 6px 10px;
        font-size: 12px;
        min-width: 60px;
      }

      .pagination a, .pagination span {
        padding: 6px 12px;
        font-size: 13px;
      }

      .appointment-card {
        padding: 12px;
      }

      .card-date {
        font-size: 14px;
      }

      .card-time {
        font-size: 13px;
      }

      .doctor-name {
        font-size: 13px;
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
      
      .empty-state i {
        font-size: 36px;
      }
      
      .filter-btn {
        padding: 5px 8px;
        font-size: 11px;
        min-width: 55px;
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

    tbody tr {
      animation: fadeIn 0.3s ease-out;
    }

    .appointment-card {
      animation: fadeIn 0.4s ease-out;
    }

    /* Focus states for accessibility */
    .btn:focus, a:focus, .filter-btn:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-calendar-check"></i>
          <h2>Janji Temu Saya</h2>
        </div>
        <div class="header-actions">
          <a href="{{ route('patient.dashboard') }}" class="btn btn-secondary btn-sm">
            <i class="fa-solid fa-arrow-left"></i> Kembali
          </a>
          <a class="btn btn-primary btn-sm" href="{{ route('patient.appointments.create') }}">
            <i class="fa-solid fa-plus"></i> Buat Janji
          </a>
        </div>
      </div>

      <!-- Filter Section -->
      <div class="filter-section">
        <button class="filter-btn active" onclick="filterAppointments('all')">Semua</button>
        <button class="filter-btn" onclick="filterAppointments('pending')">Pending</button>
        <button class="filter-btn" onclick="filterAppointments('confirmed')">Dikonfirmasi</button>
        <button class="filter-btn" onclick="filterAppointments('approved')">Disetujui</button>
        <button class="filter-btn" onclick="filterAppointments('completed')">Selesai</button>
        <button class="filter-btn" onclick="filterAppointments('cancelled')">Dibatalkan</button>
      </div>

      @if($items->isEmpty())
        <div class="empty-state">
          <i class="fa-solid fa-calendar-xmark"></i>
          <h3>Belum ada janji temu</h3>
          <p>Mulai dengan membuat janji temu baru</p>
        </div>
      @else
        <!-- Desktop Table View -->
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Dokter</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $a)
                <tr class="appointment-row" data-status="{{ $a->status }}">
                  <td>
                    <div class="appointment-date">
                      <div class="date-main">{{ \Carbon\Carbon::parse($a->date)->format('d M Y') }}</div>
                      <div class="date-day">{{ \Carbon\Carbon::parse($a->date)->isoFormat('dddd') }}</div>
                    </div>
                  </td>
                  <td>
                    <div class="appointment-time">
                      {{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}
                    </div>
                  </td>
                  <td>
                    <div class="doctor-info">
                      <div class="doctor-icon">
                        <i class="fa-solid fa-user-md"></i>
                      </div>
                      <div>
                        <div class="doctor-name">{{ $a->doctor->name ?? ('#'.$a->doctor_id) }}</div>
                        <div class="doctor-specialty" style="font-size: 11px; color: var(--text-light);">
                          {{ $a->doctor->specialty ?? 'Spesialis' }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="badge {{ $a->status }}">
                      @if($a->status == 'pending')
                        <i class="fa-solid fa-clock"></i>
                      @elseif($a->status == 'confirmed' || $a->status == 'approved')
                        <i class="fa-solid fa-check-circle"></i>
                      @elseif($a->status == 'completed')
                        <i class="fa-solid fa-check-double"></i>
                      @else
                        <i class="fa-solid fa-times-circle"></i>
                      @endif
                      {{ ucfirst($a->status) }}
                    </span>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Mobile Cards View -->
        <div class="mobile-cards" id="mobileCards">
          @foreach($items as $a)
            <div class="appointment-card mobile-appointment-row" data-status="{{ $a->status }}">
              <div class="card-header">
                <div class="card-date-time">
                  <div class="card-date">{{ \Carbon\Carbon::parse($a->date)->format('d M Y') }}</div>
                  <div class="card-time">{{ \Carbon\Carbon::parse($a->date)->isoFormat('dddd') }} • {{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</div>
                </div>
                <span class="badge {{ $a->status }}">
                  @if($a->status == 'pending')
                    <i class="fa-solid fa-clock"></i>
                  @elseif($a->status == 'confirmed' || $a->status == 'approved')
                    <i class="fa-solid fa-check-circle"></i>
                  @elseif($a->status == 'completed')
                    <i class="fa-solid fa-check-double"></i>
                  @else
                    <i class="fa-solid fa-times-circle"></i>
                  @endif
                  {{ ucfirst($a->status) }}
                </span>
              </div>
              <div class="card-doctor">
                <div class="doctor-icon">
                  <i class="fa-solid fa-user-md"></i>
                </div>
                <div class="doctor-details">
                  <div class="doctor-name">{{ $a->doctor->name ?? ('#'.$a->doctor_id) }}</div>
                  <div class="doctor-specialty">{{ $a->doctor->specialty ?? 'Spesialis' }}</div>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        @if(method_exists($items,'links'))
          <div class="pagination">
            {{ $items->links() }}
          </div>
        @endif
      @endif
    </div>
  </main>

  <script>
    // Filter appointments function
    function filterAppointments(status) {
      // Update active filter button
      document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
      });
      event.target.classList.add('active');

      // Filter desktop table rows
      const desktopRows = document.querySelectorAll('.appointment-row');
      const mobileCards = document.querySelectorAll('.mobile-appointment-row');
      let visibleCount = 0;

      // Filter desktop view
      desktopRows.forEach(row => {
        if (status === 'all' || row.dataset.status === status) {
          row.style.display = '';
          visibleCount++;
        } else {
          row.style.display = 'none';
        }
      });

      // Filter mobile view
      mobileCards.forEach(card => {
        if (status === 'all' || card.dataset.status === status) {
          card.style.display = 'flex';
          card.style.flexDirection = 'column';
        } else {
          card.style.display = 'none';
        }
      });

      // Show empty state if no rows visible
      const emptyStates = document.querySelectorAll('.empty-state');
      if (visibleCount === 0 && status !== 'all') {
        emptyStates.forEach(state => {
          state.style.display = 'block';
          state.innerHTML = `
            <i class="fa-solid fa-filter"></i>
            <h3>Tidak ada janji temu dengan status ${getStatusText(status)}</h3>
            <p>Coba pilih filter status lainnya</p>
          `;
        });
      } else {
        emptyStates.forEach(state => {
          state.style.display = 'none';
        });
      }
    }

    function getStatusText(status) {
      const statusMap = {
        'pending': 'Pending',
        'confirmed': 'Dikonfirmasi',
        'approved': 'Disetujui',
        'completed': 'Selesai',
        'cancelled': 'Dibatalkan'
      };
      return statusMap[status] || status;
    }

    document.addEventListener('DOMContentLoaded', function() {
      // Add animation to cards
      const cards = document.querySelectorAll('.appointment-card');
      cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
      });

      // Adjust layout based on screen size
      function adjustLayout() {
        const tableContainer = document.querySelector('.table-container');
        const mobileCards = document.getElementById('mobileCards');
        
        if (window.innerWidth <= 768) {
          if (tableContainer) tableContainer.style.display = 'none';
          if (mobileCards) mobileCards.style.display = 'flex';
        } else {
          if (tableContainer) tableContainer.style.display = 'block';
          if (mobileCards) mobileCards.style.display = 'none';
        }
      }

      // Initial adjustment
      adjustLayout();
      
      // Adjust on resize
      window.addEventListener('resize', adjustLayout);
    });
  </script>
</body>
</html>