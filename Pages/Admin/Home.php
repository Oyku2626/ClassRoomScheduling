<?php
// Üst kısım: header
include '../../_layout/adminlayout/header.php';

// Doğru bağlantı yolu: 4 klasör yukarı çık, sonra room-scheduler/dbo_test.php
include '../../../room-scheduler/dbo_test.php'; // ← VERİTABANI BAĞLANTISI BURADA

// Veritabanından sayılar
try {
    // Toplam admin sayısı
    $stmt = $pdo->query("SELECT COUNT(*) AS total_admins FROM admins");
    $totalAdmins = $stmt->fetch(PDO::FETCH_ASSOC)['total_admins'];

    // Toplam öğretim görevlisi
    $stmt = $pdo->query("SELECT COUNT(*) AS total_lecturers FROM lecturers");
    $totalLecturers = $stmt->fetch(PDO::FETCH_ASSOC)['total_lecturers'];

    // Toplam oda
    $stmt = $pdo->query("SELECT COUNT(*) AS total_rooms FROM rooms");
    $totalRooms = $stmt->fetch(PDO::FETCH_ASSOC)['total_rooms'];

    // Toplam rezervasyon
    $stmt = $pdo->query("SELECT COUNT(*) AS total_reservations FROM room_reservations");
    $totalReservations = $stmt->fetch(PDO::FETCH_ASSOC)['total_reservations'];
} catch (PDOException $e) {
    echo "<p style='color:red;'>Veri çekme hatası: " . $e->getMessage() . "</p>";
}
?>

<!-- Cam efektli ana konteyner -->
<div class="glass-container p-4 mt-4 mb-5">
  <p class="lead text-center mb-4" style=" color: #ffd6fa; font-size: 1.5rem;">Welcome to Space</p>

  <div class="row justify-content-center">
    <div class="col-md-3 mb-4">
      <div class="card-neon text-center p-4">
        <h5>Number of Commander Astronaut</h5>
        <p class="display-6"><?= $totalAdmins ?? '-' ?></p>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card-neon text-center p-4">
        <h5>Number of Crew</h5>
        <p class="display-6"><?= $totalLecturers ?? '-' ?></p>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card-neon text-center p-4">
        <h5>Number of Planet</h5>
        <p class="display-6"><?= $totalRooms ?? '-' ?></p>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card-neon text-center p-4">
        <h5>Number of Reservation</h5>
        <p class="display-6"><?= $totalReservations ?? '-' ?></p>
      </div>
    </div>
  </div>
</div>

<!-- Stil -->
<style>
  .glass-container {
    background-color: rgba(60, 10, 100, 0.45); /* Saydam mor */
    border-radius: 20px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 0 25px rgba(255, 105, 210, 0.3);
    color: #fff;
    font-family: 'Orbitron', sans-serif;
  }

  .card-neon {
    background: rgba(20, 10, 40, 0.6);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.08);
    box-shadow: 0 0 15px rgba(255, 105, 210, 0.2);
    color: #ffb6c1;
    font-family: 'Orbitron', sans-serif;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card-neon:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 25px rgba(255, 105, 210, 0.4);
  }

  .card-neon h5 {
    font-size: 1.1rem;
    margin-bottom: 10px;
    color: #fce4ec;
    text-shadow: 0 0 6px rgba(255, 255, 255, 0.2);
  }

  .card-neon p {
    font-size: 1.8rem;
    font-weight: bold;
    color: #ff6fd8;
    text-shadow: 0 0 10px rgba(255, 105, 210, 0.3);
  }
</style>

            </div>
        </div>
    </div>
</div>

<?php include '../../_layout/adminlayout/footer.php'; ?>
