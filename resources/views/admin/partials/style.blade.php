<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{
  --admin:#2563eb; --admin-dark:#1e40af; --success:#10b981; --danger:#ef4444;
  --bg:#f7f9fc; --card:#fff; --text:#0f172a; --muted:#64748b; --border:#e5e7eb;
  --radius:16px; --shadow:0 10px 25px rgba(2,6,23,.08);
  --grad:linear-gradient(135deg,var(--admin),var(--admin-dark));
}
*{box-sizing:border-box} body{font-family:Inter,system-ui,Arial;background:var(--bg);color:var(--text);margin:0;padding-top:80px}
.container{max-width:1220px;margin:0 auto;padding:0 20px 40px}
.card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);box-shadow:var(--shadow);padding:24px}
.header{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;gap:12px;flex-wrap:wrap}
.title{display:flex;align-items:center;gap:10px;font-weight:800}
.title i{background:#dbeafe;color:var(--admin);padding:10px;border-radius:12px}
.toolbar{display:flex;gap:10px;flex-wrap:wrap}
.toolbar input,.toolbar select{padding:10px 12px;border:1px solid var(--border);border-radius:12px}
.btn{display:inline-flex;align-items:center;gap:8px;border:none;border-radius:12px;padding:10px 14px;font-weight:600;cursor:pointer;text-decoration:none;transition:.2s;font-size:14px}
.btn-primary{background:var(--grad);color:#fff}
.btn-outline{background:#f1f5f9;border:1px solid var(--border);color:var(--text)}
.btn-danger{background:var(--danger);color:#fff}
.btn:hover{transform:translateY(-1px)}
.table{width:100%;border-collapse:separate;border-spacing:0}
.table th,.table td{padding:12px 14px;border-bottom:1px solid var(--border);text-align:left;font-size:14px}
.table thead th{background:#f8fafc;font-weight:700}
.actions{display:flex;gap:8px;flex-wrap:wrap;justify-content:flex-end}
.badge{padding:4px 10px;border-radius:999px;background:#eef2ff;color:#3730a3;font-size:12px}
.danger{background:#fee2e2;color:#991b1b}
.field{display:flex;flex-direction:column;gap:6px}
.field input,.field select,.field textarea{padding:12px;border:1px solid var(--border);border-radius:12px}
.row{display:grid;gap:14px}
.row-2{grid-template-columns:repeat(2,1fr)}
.row-3{grid-template-columns:repeat(3,1fr)}
@media(max-width:900px){.row-2,.row-3{grid-template-columns:1fr}}
.alert{padding:14px;border-radius:10px;margin-bottom:16px;display:flex;gap:10px;align-items:center}
.alert-success{background:#f0fdf4;border:1px solid #bbf7d0;color:#166534}
.muted{color:var(--muted)} .empty{color:var(--muted);font-size:14px}
</style>
