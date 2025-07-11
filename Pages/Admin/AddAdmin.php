<?php include '../../_layout/adminlayout/header.php'; ?>

<div class="row justify-content-center">
  <div class="col-md-6 col-xl-5">
    <div class="card p-4 mt-4 mb-5 shadow-sm" style="background-color: rgba(60, 18, 90, 0.7)";>
      <h3 class="text-center mb-4" style="color: #ffd6fa;" font-family:'Cormorant Garamond', serif;">Add New Commander Astronaut</h3>
      <form id="addAdminForm">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="name" name="name" placeholder="Ad Soyad" required>
          <label for="name"style="color:rgb(222, 29, 196);">Name Surname </label>
        </div>

        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="E-posta" required>
          <label for="email"style="color:rgb(222, 29, 196);">E-posta</label>
        </div>

        <div class="form-floating mb-4">
          <input type="password" class="form-control" style="color:rgb(222, 29, 196);" id="password" name="password" placeholder="Şifre" required>
          <label for="password"style="color:rgb(222, 29, 196);">Password</label>
        </div>
        <input type="hidden" value="<?= $_SESSION["auth"]["token"];?>" id="token" />
        <button class="btn btn-admin w-100 py-2" type="submit" style="color:rgb(222, 29, 196);">Add Commander Astronaut </button>
      </form>
    </div>
  </div>
</div>

<style>
  
  .form-control {
  border-radius: 8px !important;
  padding: 10px 12px !important;
 border: 2px solid rgb(171, 106, 142);
   background-color: rgba(93, 124, 236, 0.15);;
  font-family: 'Orbitron', sans-serif; /* Temaya uygun font */
  color: #cdd3e7; /* Açık renk yazı */
  transition: all 0.3s ease;
}

.form-control:focus {
  outline: none;
  border-color: #d61a6f; /* Canlı pembe odak rengi */
  box-shadow: 0 0 8px #ff6fd8;
  background-color: rgba(93, 124, 236, 0.3);
  color: #fff;
}

.btn-admin {
  background: linear-gradient(135deg,rgb(136, 85, 218),rgb(136, 85, 218)));
  color: #c479c7;
  border: 2px solid #bb89ae;
  font-size: 16px;
  font-family: 'Orbitron', sans-serif;
  font-weight: bold;
 box-shadow: 0 4px 0 rgb(204, 177, 247);
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  border-radius: 8px;
  padding: 10px 20px;
}

.btn-admin:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 10px rgba(255, 105, 210, 0.5);
  background: linear-gradient(135deg,rgb(136, 85, 218),rgb(136, 85, 218)));
  color: #fff;
  border: 2px solid #ff6fd8;
}

</style>

<script>
  document.getElementById('addAdminForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    var token = $('#token').val();
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    if (!token) {
      Swal.fire({
        icon: 'error',
        title: 'Yetkisiz',
        text: 'Giriş yapmanız gerekiyor.',
        confirmButtonColor: '#715A3A'
      });
      return;
    }

    try {
      const response = await fetch('/room-scheduler/create-admin.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': `Bearer ${token}`
        },
        body: JSON.stringify(data)
      });

      const result = await response.json();
      console.log(response.status);
      if (response.status == 201) {
        Swal.fire({
          icon: 'success',
          title: 'Admin başarıyla eklendi!',
          confirmButtonText: 'Tamam',
          confirmButtonColor: '#715A3A'
        }).then(() => {
          window.location.href = 'Home.php';
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Hata',
          text: result.message || 'Bir hata oluştu.',
          confirmButtonColor: '#715A3A'
        });
      }

    } catch (error) {
      Swal.fire({
        icon: 'error',
        title: 'Sunucu Hatası',
        text: 'Lütfen daha sonra tekrar deneyin.',
        confirmButtonColor: '#715A3A'
      });
    }
  });
</script>

<?php include '../../_layout/adminlayout/footer.php'; ?>
