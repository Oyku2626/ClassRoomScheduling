<?php include '../../_layout/adminlayout/header.php'; ?>

<!-- Kullanıcı Ekleme Formu -->
<form id="addUserForm" class="needs-validation" novalidate>
  <div class="mb-3">
    <label for="name" class="form-label">Ad Soyad</label>
    <input type="text" class="form-control" id="name" required>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">E-posta</label>
    <input type="email" class="form-control" id="email" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Şifre</label>
    <input type="password" class="form-control" id="password" required>
  </div>

  <button type="submit" class="btn btn-primary">Kullanıcıyı Ekle</button>
</form>

<?php include '../../_layout/adminlayout/footer.php'; ?>

<!--  JavaScript kodunu footer'dan sonra buraya yaz! -->
<script>
$(document).ready(function () {
  console.log("jQuery hazır!");

  $('#addUserForm').on('submit', function (e) {
    e.preventDefault();

    const formData = {
      name: $('#name').val(),
      email: $('#email').val(),
      password: $('#password').val()
    };

    console.log("Form verisi:", formData);

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
