<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat dengan Pasien - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    :root{
      --primary-color:#2563eb; --secondary-color:#1e40af; --accent-color:#60a5fa;
      --light-blue:#dbeafe; --extra-light-blue:#eff6ff; --text-color:#1f2937; --text-light:#6b7280; --white:#ffffff;
      --doctor-bubble:#dcf8c6; --patient-bubble:#ffffff;
      --gradient:linear-gradient(135deg,var(--primary-color),var(--secondary-color));
      --shadow:0 20px 50px rgba(37,99,235,.1); --shadow-hover:0 30px 70px rgba(37,99,235,.15);
    }

    body{
      line-height:1.6;
      color:var(--text-color);
      background:var(--white);
      font-family: 'Inter', sans-serif;
    }

    a{
      text-decoration:none;
      color:inherit
    }

    /* Container & main content */
    .container{
      max-width:1200px;
      margin:0 auto;
      padding:24px 20px;
      padding-top: 100px;
    }
    
    /* Header chat */
    .chat-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem 1.5rem;
      background: var(--white);
      border-radius: 12px;
      box-shadow: var(--shadow);
      margin-bottom: 1.5rem;
      position: sticky;
      top: 90px;
      z-index: 10;
    }
    
    .patient-avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
      flex-shrink: 0;
    }
    
    .patient-info h2 {
      font-size: 1.2rem;
      margin-bottom: 0.25rem;
      font-weight: 600;
    }
    
    .patient-info p {
      color: var(--text-light);
      font-size: 0.9rem;
    }
    
    /* Back button */
    .back-button {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.5rem 1rem;
      background: var(--extra-light-blue);
      color: var(--primary-color);
      border-radius: 8px;
      font-weight: 600;
      margin-bottom: 1rem;
      transition: all 0.2s ease;
    }
    
    .back-button:hover {
      background: var(--light-blue);
      transform: translateX(-3px);
    }
    
    /* Chat container */
    .chat-container {
      display: flex;
      flex-direction: column;
      height: calc(100vh - 220px);
      background: var(--white);
      border-radius: 12px;
      box-shadow: var(--shadow);
      overflow: hidden;
    }
    
    /* Chat messages */
    .chat-messages {
      flex: 1;
      padding: 1.5rem;
      overflow-y: auto;
      background: #e5ddd5;
      background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23aaaaaa' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
    }
    
    .message {
      display: flex;
      margin-bottom: 0.5rem;
      animation: fadeIn 0.3s ease;
    }
    
    .message.doctor {
      justify-content: flex-end;
    }
    
    .message.patient {
      justify-content: flex-start;
    }
    
    .message-content {
      max-width: 70%;
      padding: 0.5rem 0.75rem;
      border-radius: 7.5px;
      position: relative;
      box-shadow: 0 1px 0.5px rgba(0, 0, 0, 0.13);
    }
    
    .message.doctor .message-content {
      background: var(--doctor-bubble);
      border-top-right-radius: 0;
      margin-left: auto;
    }
    
    .message.patient .message-content {
      background: var(--patient-bubble);
      border-top-left-radius: 0;
    }
    
    /* Tail untuk bubble chat */
    .message.doctor .message-content:before {
      content: "";
      position: absolute;
      top: 0;
      right: -8px;
      width: 0;
      height: 0;
      border-left: 8px solid var(--doctor-bubble);
      border-top: 8px solid transparent;
      border-bottom: 8px solid transparent;
    }
    
    .message.patient .message-content:before {
      content: "";
      position: absolute;
      top: 0;
      left: -8px;
      width: 0;
      height: 0;
      border-right: 8px solid var(--patient-bubble);
      border-top: 8px solid transparent;
      border-bottom: 8px solid transparent;
    }
    
    .message-text {
      word-wrap: break-word;
    }
    
    .message-meta {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      margin-top: 0.25rem;
      font-size: 0.65rem;
      gap: 0.25rem;
    }
    
    .message-time {
      color: rgba(0, 0, 0, 0.45);
    }
    
    .message-status {
      display: inline-flex;
    }
    
    /* Chat input */
    .chat-input {
      display: flex;
      padding: 0.75rem;
      background: white;
      border-top: 1px solid #e5e7eb;
      align-items: flex-end;
    }
    
    .message-input {
      flex: 1;
      padding: 0.75rem 1rem;
      border: 1px solid #e5e7eb;
      border-radius: 24px;
      outline: none;
      font-family: 'Inter', sans-serif;
      resize: none;
      max-height: 120px;
      margin: 0 0.5rem;
    }
    
    .message-input:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
    }
    
    .send-button {
      background: var(--primary-color);
      color: white;
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s ease;
      flex-shrink: 0;
    }
    
    .send-button:hover {
      background: var(--secondary-color);
      transform: scale(1.05);
    }
    
    /* Empty state */
    .empty-state {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      color: var(--text-light);
      text-align: center;
      padding: 2rem;
    }
    
    .empty-state i {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: var(--accent-color);
    }
    
    .empty-state p {
      max-width: 400px;
    }
    
    /* Animations */
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
    
    /* Scrollbar styling */
    .chat-messages::-webkit-scrollbar {
      width: 6px;
    }
    
    .chat-messages::-webkit-scrollbar-track {
      background: rgba(0, 0, 0, 0.05);
      border-radius: 10px;
    }
    
    .chat-messages::-webkit-scrollbar-thumb {
      background: rgba(0, 0, 0, 0.2);
      border-radius: 10px;
    }
    
    .chat-messages::-webkit-scrollbar-thumb:hover {
      background: rgba(0, 0, 0, 0.3);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      .container {
        padding: 15px;
        padding-top: 90px;
      }
      
      .chat-header {
        padding: 0.75rem;
        margin-bottom: 1rem;
      }
      
      .patient-avatar {
        width: 40px;
        height: 40px;
        font-size: 1rem;
      }
      
      .message-content {
        max-width: 85%;
      }
      
      .chat-container {
        height: calc(100vh - 180px);
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <!-- Tombol kembali -->
    <a href="{{ route('doctor.dashboard') }}" class="back-button">
      <i class="fas fa-arrow-left"></i>
      Kembali ke Dashboard
    </a>
    
    <!-- Header dengan info pasien -->
    <div class="chat-header">
      <div class="patient-avatar">
        {{ substr($patient->name, 0, 1) }}
      </div>
      <div class="patient-info">
        <h2>{{ $patient->name }}</h2>
        <p>Pasien - ID: {{ $patient->id }}</p>
      </div>
    </div>
    
    <!-- Container chat -->
    <div class="chat-container">
      <!-- Area pesan -->
      <div class="chat-messages" id="chatMessages">
        @if($messages->count() > 0)
          @foreach($messages as $message)
            <div class="message {{ $message->sender_type === 'doctor' ? 'doctor' : 'patient' }}">
              <div class="message-content">
                <div class="message-text">{{ $message->message }}</div>
                <div class="message-meta">
                  <span class="message-time">{{ $message->created_at->format('H:i') }}</span>
                  @if($message->sender_type === 'doctor')
                    <span class="message-status">
                      @if($message->read_at)
                        <i class="fas fa-check-double" title="Dibaca"></i>
                      @else
                        <i class="fas fa-check" title="Terkirim"></i>
                      @endif
                    </span>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="empty-state">
            <i class="fas fa-comments"></i>
            <h3>Belum ada percakapan</h3>
            <p>Mulai percakapan dengan mengirim pesan pertama kepada {{ $patient->name }}.</p>
          </div>
        @endif
      </div>
      
      <!-- Form input pesan -->
      <form action="{{ route('doctor.chat.send', $patient->id) }}" method="POST" class="chat-input">
        @csrf
        <textarea 
          name="message" 
          class="message-input" 
          placeholder="Ketik pesan..." 
          rows="1"
          oninput="autoResize(this)"
        ></textarea>
        <button type="submit" class="send-button">
          <i class="fas fa-paper-plane"></i>
        </button>
      </form>
    </div>
  </main>

  <script>
    // Fungsi untuk auto-resize textarea
    function autoResize(textarea) {
      textarea.style.height = 'auto';
      textarea.style.height = (textarea.scrollHeight) + 'px';
      
      // Batasi tinggi maksimum
      if (textarea.scrollHeight > 120) {
        textarea.style.overflowY = 'auto';
      } else {
        textarea.style.overflowY = 'hidden';
      }
    }
    
    // Scroll ke bawah secara otomatis saat halaman dimuat
    window.addEventListener('load', function() {
      const chatMessages = document.getElementById('chatMessages');
      if (chatMessages) {
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }
    });
    
    // Validasi form
    document.querySelector('form').addEventListener('submit', function(e) {
      const messageInput = this.querySelector('textarea[name="message"]');
      if (!messageInput.value.trim()) {
        e.preventDefault();
        messageInput.focus();
        // Tambahkan efek visual untuk input kosong
        messageInput.style.borderColor = '#ef4444';
        setTimeout(() => {
          messageInput.style.borderColor = '#e5e7eb';
        }, 1000);
      }
    });
    
    // Auto-focus pada input pesan
    document.addEventListener('DOMContentLoaded', function() {
      const messageInput = document.querySelector('.message-input');
      if (messageInput) {
        messageInput.focus();
      }
    });
  </script>
</body>
</html>