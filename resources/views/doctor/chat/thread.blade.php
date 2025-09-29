<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat dengan Pasien - MediCare</title>
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
      height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 0 20px 20px;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .card {
      background: var(--card-bg);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      border: 1px solid var(--border);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .card:hover {
      transform: translateY(-2px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .header {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 24px;
      border-bottom: 1px solid var(--border);
      background: var(--card-bg);
    }

    .avatar {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      font-size: 24px;
      flex-shrink: 0;
    }

    .header-info {
      flex: 1;
    }

    .title {
      font-size: 20px;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 4px;
    }

    .subtitle {
      font-size: 14px;
      color: var(--text-light);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .status-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--success);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% { opacity: 1; }
      50% { opacity: 0.5; }
      100% { opacity: 1; }
    }

    .header-actions {
      display: flex;
      gap: 12px;
    }

    .btn {
      padding: 10px 16px;
      border-radius: 10px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 13px;
    }

    .btn-secondary {
      background: #f1f5f9;
      color: var(--text);
      border: 1px solid var(--border);
    }

    .btn-secondary:hover {
      background: #e2e8f0;
      transform: translateY(-1px);
    }

    .chat-container {
      flex: 1;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .chat-messages {
      flex: 1;
      padding: 24px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 16px;
      max-height: 60vh;
    }

    .message {
      display: flex;
      max-width: 80%;
      animation: fadeIn 0.3s ease-out;
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

    .message.doctor {
      align-self: flex-end;
      flex-direction: row-reverse;
    }

    .message.patient {
      align-self: flex-start;
    }

    .message-bubble {
      padding: 12px 16px;
      border-radius: 18px;
      position: relative;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .message.doctor .message-bubble {
      background: var(--gradient);
      color: white;
      border-bottom-right-radius: 4px;
    }

    .message.patient .message-bubble {
      background: #f1f5f9;
      color: var(--text);
      border-bottom-left-radius: 4px;
    }

    .message-sender {
      font-weight: 600;
      font-size: 12px;
      margin-bottom: 4px;
      opacity: 0.9;
    }

    .message-content {
      font-size: 14px;
      line-height: 1.4;
    }

    .message-time {
      font-size: 11px;
      opacity: 0.7;
      margin-top: 4px;
      text-align: right;
    }

    .message.patient .message-time {
      text-align: left;
    }

    .empty-chat {
      text-align: center;
      padding: 60px 20px;
      color: var(--text-light);
    }

    .empty-chat i {
      font-size: 48px;
      margin-bottom: 16px;
      color: #d1d5db;
    }

    .empty-chat h4 {
      font-size: 16px;
      margin-bottom: 8px;
      color: var(--text);
    }

    .chat-input {
      padding: 20px 24px;
      border-top: 1px solid var(--border);
      background: #f8fafc;
    }

    .input-form {
      display: flex;
      gap: 12px;
      align-items: flex-end;
    }

    .input-field {
      flex: 1;
      position: relative;
    }

    .input-field textarea {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid var(--border);
      border-radius: 25px;
      font-size: 14px;
      background: white;
      transition: all 0.3s;
      resize: none;
      outline: none;
      font-family: 'Inter', sans-serif;
      max-height: 120px;
    }

    .input-field textarea:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .send-btn {
      padding: 12px 20px;
      border-radius: 25px;
      background: var(--gradient);
      color: white;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 6px;
      min-width: 100px;
      justify-content: center;
    }

    .send-btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .send-btn:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }

    /* Scrollbar Styling */
    .chat-messages::-webkit-scrollbar {
      width: 6px;
    }

    .chat-messages::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 3px;
    }

    .chat-messages::-webkit-scrollbar-thumb {
      background: #c1c1c1;
      border-radius: 3px;
    }

    .chat-messages::-webkit-scrollbar-thumb:hover {
      background: #a1a1a1;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        padding: 0 15px 15px;
      }

      .header {
        padding: 20px;
      }

      .avatar {
        width: 50px;
        height: 50px;
        font-size: 20px;
      }

      .title {
        font-size: 18px;
      }

      .chat-messages {
        padding: 20px;
        gap: 12px;
      }

      .message {
        max-width: 90%;
      }

      .chat-input {
        padding: 16px 20px;
      }

      .header-actions {
        display: none;
      }
    }

    @media (max-width: 640px) {
      body {
        padding-top: 70px;
      }

      .container {
        padding: 0 12px 12px;
      }

      .header {
        padding: 16px;
        gap: 12px;
      }

      .avatar {
        width: 44px;
        height: 44px;
        font-size: 18px;
      }

      .title {
        font-size: 16px;
      }

      .subtitle {
        font-size: 12px;
      }

      .chat-messages {
        padding: 16px;
        gap: 10px;
      }

      .message-bubble {
        padding: 10px 14px;
      }

      .chat-input {
        padding: 12px 16px;
      }

      .input-form {
        gap: 8px;
      }

      .send-btn {
        padding: 10px 16px;
        min-width: 80px;
        font-size: 12px;
      }
    }

    @media (max-width: 480px) {
      .message {
        max-width: 95%;
      }

      .message-bubble {
        padding: 8px 12px;
      }

      .message-content {
        font-size: 13px;
      }
    }

    /* Focus states for accessibility */
    .btn:focus, .send-btn:focus, textarea:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="card">
      <!-- Chat Header -->
      <div class="header">
        <div class="avatar">
          {{ strtoupper(mb_substr($patient->name, 0, 1)) }}
        </div>
        <div class="header-info">
          <div class="title">{{ $patient->name }}</div>
          <div class="subtitle">
            <span class="status-dot"></span>
            <span>Pasien - ID: {{ $patient->id }}</span>
          </div>
        </div>
        <div class="header-actions">
          <a href="{{ route('doctor.chat.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Kembali
          </a>
        </div>
      </div>

      <!-- Chat Messages -->
      <div class="chat-container">
        <div id="chatMessages" class="chat-messages">
          @if($messages->count() > 0)
            @foreach($messages as $message)
              @php $isDoctor = $message->sender_type === 'doctor'; @endphp
              <div class="message {{ $isDoctor ? 'doctor' : 'patient' }}">
                <div class="message-bubble">
                  <div class="message-sender">
                    {{ $isDoctor ? 'Anda' : $patient->name }}
                  </div>
                  <div class="message-content">
                    {{ $message->message }}
                  </div>
                  <div class="message-time">
                    {{ $message->created_at->format('H:i') }} • {{ $message->created_at->format('d M Y') }}
                    @if($isDoctor)
                      <span style="margin-left: 4px;">
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
            <div class="empty-chat">
              <i class="fa-solid fa-comments"></i>
              <h4>Belum ada percakapan</h4>
              <p>Mulai percakapan dengan mengirim pesan pertama kepada {{ $patient->name }}</p>
            </div>
          @endif
        </div>

        <!-- Chat Input -->
        <div class="chat-input">
          <form class="input-form" method="POST" action="{{ route('doctor.chat.send', $patient->id) }}">
            @csrf
            <div class="input-field">
              <textarea name="message" placeholder="Ketik pesan..." autocomplete="off" required oninput="autoResize(this)"></textarea>
            </div>
            <button class="send-btn" type="submit">
              <i class="fa-solid fa-paper-plane"></i>
              <span class="send-text">Kirim</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Auto-scroll to bottom
      const chatMessages = document.getElementById('chatMessages');
      if (chatMessages) {
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }

      // Form submission handling
      const form = document.querySelector('.input-form');
      const textarea = form.querySelector('textarea');
      const sendBtn = form.querySelector('.send-btn');

      form.addEventListener('submit', function(e) {
        e.preventDefault();

        if (textarea.value.trim() === '') return;

        // Disable button during submission
        sendBtn.disabled = true;
        sendBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mengirim';

        // Submit form
        this.submit();
      });

      // Re-enable button if form submission fails
      textarea.addEventListener('input', function() {
        if (sendBtn.disabled) {
          sendBtn.disabled = false;
          sendBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i><span class="send-text">Kirim</span>';
        }
      });

      // Add animation to new messages
      const messages = document.querySelectorAll('.message');
      messages.forEach((message, index) => {
        message.style.animationDelay = `${index * 0.1}s`;
      });

      // Focus textarea on load
      textarea.focus();
    });

    // Auto-resize function
    function autoResize(textarea) {
      textarea.style.height = 'auto';
      textarea.style.height = (textarea.scrollHeight) + 'px';

      if (textarea.scrollHeight > 120) {
        textarea.style.overflowY = 'auto';
      } else {
        textarea.style.overflowY = 'hidden';
      }
    }

    // Auto-refresh chat every 10 seconds (optional)
    setInterval(() => {
      // You can implement AJAX refresh here if needed
    }, 10000);
  </script>
</body>
</html>
