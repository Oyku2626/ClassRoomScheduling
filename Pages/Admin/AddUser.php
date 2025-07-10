<?php include '../../_layout/adminlayout/header.php'; ?>

<!-- Kullanıcı Ekleme Formu -->
<div class="container mt-5 mb-5" style="max-width: 600px; background-color: rgba(60, 18, 90, 0.7); padding: 30px; border-radius: 16px; box-shadow: 0 0 20px rgba(255, 105, 210, 0.2); color: #fff;">
  <h3 class="text-center mb-4" style="font-family: 'Orbitron', sans-serif; color: #ffd6fa;">Add New Crew</h3>

  <form id="addUserForm" class="needs-validation" novalidate>
    <div class="mb-3">
      <label for="name" class="form-label"style="color:rgb(222, 29, 196);">Name Surname</label>
      <input type="text" class="form-control" id="name" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label"style="color:rgb(222, 29, 196);">E-posta</label>
      <input type="email" class="form-control" id="email" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label"style="color:rgb(222, 29, 196);">Password</label>
      <input type="password" class="form-control" id="password" required>
    </div>

    <button type="submit" class="btn btn-admin w-100"style="color:rgb(222, 29, 196);">Add Crew</button>
  </form>
</div>

<?php include '../../_layout/adminlayout/footer.php'; ?>

<!-- JavaScript -->
<script>
$(document).ready(function () {
  $('#addUserForm').on('submit', function (e) {
    e.preventDefault();

    const formData = {
      name: $('#name').val(),
      email: $('#email').val(),
      password: $('#password').val()
    };

    $.ajax({
      url: '../../create-user.php',
      method: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(formData),
      success: function (response) {
        if (response.status === 'success') {
          Swal.fire('Başarılı!', response.message, 'success');
          $('#addUserForm')[0].reset();
        } else {
          Swal.fire('Hata!', response.message, 'error');
        }
      },
      error: function () {
        Swal.fire('Sunucu Hatası', 'Sunucuya ulaşılamadı.', 'error');
      }
    });
  });
});
</script>

<!-- Stil (Uzay temalı buton) -->
<style>
  .form-control {
    border-radius: 8px !important;
    padding: 10px 12px !important;
    border: 2px solid rgb(171, 106, 142);
    background-color: rgba(93, 124, 236, 0.15);
    font-family: 'Orbitron', sans-serif;
    color: #cdd3e7;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    outline: none;
    border-color: #d61a6f;
    box-shadow: 0 0 8px #ff6fd8;
    background-color: rgba(93, 124, 236, 0.3);
    color: #fff;
  }

  .btn-admin {
    background: linear-gradient(135deg, #a3768a, #bb89ae);
    color: #fff;
    border: 2px solid #bb89ae;
    font-size: 16px;
    font-family: 'Orbitron', sans-serif;
    font-weight: bold;
    box-shadow: 0 4px 0 #8b3e8f;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    border-radius: 8px;
    padding: 10px 20px;
  }

  .btn-admin:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(255, 105, 210, 0.5);
    background: linear-gradient(135deg, #d61a6f, #e255c5);
    border: 2px solid #ff6fd8;
  }
</style>

