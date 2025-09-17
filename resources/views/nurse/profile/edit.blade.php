<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profil Perawat - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary-color: #2563eb;
        --secondary-color: #1e40af;
        --accent-color: #60a5fa;
        --light-blue: #dbeafe;
        --extra-light-blue: #eff6ff;
        --text-color: #1f2937;
        --text-light: #6b7280;
        --white: #ffffff;
        --success-color: #10b981;
        --danger-color: #ef4444;
        --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        --gradient-light: linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
        --shadow: 0 20px 50px rgba(37, 99, 235, 0.1);
        --shadow-hover: 0 30px 70px rgba(37, 99, 235, 0.15);
        --border-radius: 16px;
    }

    body {
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
        color: var(--text-color);
        background: #f8fafc;
        padding: 100px 20px 40px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .grid {
        display: grid;
        gap: 24px;
        margin-bottom: 30px;
    }

    .grid-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    /* Flash Message */
    .flash {
        padding: 16px 24px;
        background: #dcfce7;
        color: #166534;
        border-radius: var(--border-radius);
        margin-bottom: 30px;
        font-weight: 600;
        border: 1px solid #bbf7d0;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.15);
    }

    .flash i {
        font-size: 20px;
    }

    /* Card Styles */
    .card {
        background: #fff;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        padding: 32px;
        transition: all 0.3s ease;
        border: 1px solid rgba(96, 165, 250, 0.1);
    }

    .card:hover {
        box-shadow: var(--shadow-hover);
    }

    /* Section Title */
    .section-title {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
        font-size: 24px;
        font-weight: 700;
        color: var(--text-color);
    }

    .section-title i {
        color: var(--primary-color);
        font-size: 22px;
        width: 50px;
        height: 50px;
        background: var(--gradient-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 24px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--text-color);
        font-size: 15px;
    }

    .form-control {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .error-message {
        display: block;
        margin-top: 6px;
        color: var(--danger-color);
        font-size: 14px;
        font-weight: 500;
    }

    /* File Upload Styles */
    .file-upload {
        position: relative;
        margin-bottom: 24px;
    }

    .file-upload-input {
        width: 100%;
        padding: 14px 16px;
        border: 2px dashed #e5e7eb;
        border-radius: 12px;
        background: #fafafa;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload-input:hover {
        border-color: var(--primary-color);
        background: var(--extra-light-blue);
    }

    .file-upload-input::file-selector-button {
        padding: 8px 16px;
        margin-right: 16px;
        border: 2px solid var(--primary-color);
        border-radius: 8px;
        background: var(--white);
        color: var(--primary-color);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .file-upload-input::file-selector-button:hover {
        background: var(--primary-color);
        color: var(--white);
    }

    /* Avatar Preview */
    .avatar-preview {
        margin-top: 20px;
        text-align: center;
    }

    .avatar-image {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        border: 4px solid var(--white);
        outline: 2px solid var(--primary-color);
    }

    .no-avatar {
        text-align: center;
        padding: 30px;
        background: var(--extra-light-blue);
        border-radius: var(--border-radius);
        border: 2px dashed var(--light-blue);
    }

    .no-avatar i {
        font-size: 48px;
        color: var(--accent-color);
        margin-bottom: 12px;
    }

    .no-avatar p {
        color: var(--text-light);
        margin: 0;
    }

    /* Button Styles */
    .btn {
        padding: 12px 24px;
        font-size: 15px;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-align: center;
    }

    .btn-primary {
        background: var(--gradient);
        color: white;
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 40px rgba(37, 99, 235, 0.3);
    }

    .btn-outline {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.1);
    }

    .btn-outline:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(37, 99, 235, 0.2);
    }

    /* Actions */
    .actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 32px;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        body {
            padding: 90px 15px 30px;
        }

        .card {
            padding: 24px;
        }

        .section-title {
            font-size: 22px;
        }

        .section-title i {
            width: 45px;
            height: 45px;
            font-size: 20px;
        }
    }

    @media (max-width: 768px) {
        body {
            padding: 80px 10px 20px;
        }

        .grid-2 {
            grid-template-columns: 1fr;
        }

        .card {
            padding: 20px;
            border-radius: 14px;
        }

        .section-title {
            font-size: 20px;
            gap: 12px;
            margin-bottom: 20px;
        }

        .section-title i {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }

        .actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }

        .avatar-image {
            width: 120px;
            height: 120px;
        }
    }

    @media (max-width: 480px) {
        .section-title {
            font-size: 18px;
        }

        .form-control {
            padding: 12px 14px;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card {
        animation: fadeIn 0.5s ease-out;
    }

    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
  </style>
</head>
<body>
  @include('layouts.medicare')
  <div class="container">
    @if(session('ok'))
      <div class="flash">
        <i class="fa-solid fa-circle-check"></i> {{ session('ok') }}
      </div>
    @endif

    <div class="grid grid-2">
      <!-- Informasi Profil -->
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-user-nurse"></i>
          <h3>Informasi Profil Perawat</h3>
        </div>

        <form method="POST" action="{{ route('nurse.profile.update') }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label class="form-label">Departemen</label>
            <input type="text" name="department" class="form-control"
                   value="{{ old('department', $profile->department) }}"
                   placeholder="Contoh: Unit Gawat Darurat, ICU, Bedah Umum">
            @error('department')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Bio / Deskripsi Profil</label>
            <textarea name="bio" class="form-control" rows="4"
                      placeholder="Ceritakan tentang latar belakang dan pengalaman Anda sebagai perawat">{{ old('bio', $profile->bio) }}</textarea>
            @error('bio')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Nomor Telepon</label>
            <input type="text" name="phone" class="form-control"
                   value="{{ old('phone', $profile->phone) }}"
                   placeholder="Nomor telepon yang dapat dihubungi">
            @error('phone')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="actions">
            <button class="btn btn-primary" type="submit">
              <i class="fa-solid fa-save"></i> Simpan Perubahan
            </button>
            <a class="btn btn-outline" href="{{ route('nurse.dashboard') }}">
              <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
          </div>
        </form>
      </div>

      <!-- Avatar -->
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-image"></i>
          <h3>Foto Profil</h3>
        </div>

        <form method="POST" action="{{ route('nurse.profile.update') }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label class="form-label">Unggah Foto Profil</label>
            <input type="file" name="avatar" class="file-upload-input" accept="image/*">
            @error('avatar')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="avatar-preview">
            @if($profile->avatar_path)
              <img src="{{ asset('storage/'.$profile->avatar_path) }}" alt="Avatar Perawat" class="avatar-image">
            @else
              <div class="no-avatar">
                <i class="fa-solid fa-user-nurse"></i>
                <p>Belum ada foto profil</p>
              </div>
            @endif
          </div>

          <div class="actions">
            <button class="btn btn-primary" type="submit">
              <i class="fa-solid fa-cloud-arrow-up"></i> Unggah Foto
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Preview image sebelum upload
      const avatarInput = document.querySelector('input[name="avatar"]');
      const avatarPreview = document.querySelector('.avatar-image') || document.querySelector('.no-avatar');

      if (avatarInput) {
        avatarInput.addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
              if (avatarPreview.classList.contains('no-avatar')) {
                // Replace no-avatar with image preview
                const newAvatar = document.createElement('img');
                newAvatar.src = e.target.result;
                newAvatar.alt = 'Preview Avatar';
                newAvatar.className = 'avatar-image';
                avatarPreview.parentNode.replaceChild(newAvatar, avatarPreview);
              } else {
                // Update existing image
                avatarPreview.src = e.target.result;
              }
            };
            reader.readAsDataURL(file);
          }
        });
      }

      // Form validation
      const forms = document.querySelectorAll('form');
      forms.forEach(form => {
        form.addEventListener('submit', function(e) {
          const submitBtn = this.querySelector('button[type="submit"]');
          if (submitBtn) {
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
            submitBtn.disabled = true;
          }
        });
      });
    });
  </script>
</body>
</html>
