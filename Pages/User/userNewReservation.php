<?php 


include '../../_layout/userlayout/header.php'; 
include '../../../room-scheduler/dbo_test.php';  // Bu dosyada $pdo bağlantısı olduğunu varsayıyorum

try {
    // Akademisyenleri çek
    $stmtLecturers = $pdo->prepare("SELECT id, name FROM lecturers");
    $stmtLecturers->execute();
    $lecturers = $stmtLecturers->fetchAll(PDO::FETCH_ASSOC);

    // Odaları çek
    $stmtRooms = $pdo->prepare("SELECT id, name FROM rooms");
    $stmtRooms->execute();
    $rooms = $stmtRooms->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Veri çekme hatası: " . $e->getMessage());
}
?>

<!-- Buradan sonra dropdownlarınız aynı şekilde çalışacak -->



<div class="row justify-content-center">
  <div class="col-md-6 col-xl-5">
    <div class="card p-4 mt-4 mb-5 shadow-sm" style="background-color: rgba(6, 5, 51, 0.6) !important;">
      <h3 class="text-center mb-4" style="color: rgba(220, 9, 164, 1); font-family:'Orbitron', sans-serif;">Create New Reservation</h3>
      <form id="adduserReservationForm">
        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="userdate" name="date" placeholder="Tarih" required>
          <label for="date"style="color:rgb(222, 29, 196);">Date</label>
        </div>

        <div class="form-floating mb-3">
          <input type="time" class="form-control" id="userstart_time" name="start_time" placeholder="Başlangıç Saati" required>
          <label for="start_time"style="color:rgb(222, 29, 196);">Start Time</label>
        </div>

        <div class="form-floating mb-3">
          <input type="time" class="form-control" id="userend_time" name="end_time" placeholder="Bitiş Saati" required>
          <label for="end_time"style="color:rgb(222, 29, 196);">End Time</label>
        </div>

       

        <div class="form-floating mb-4">
          <select class="form-select" id="userroom_id" name="room_id" required>
            <?php foreach ($rooms as $room): ?>
              <option value="<?= $room['id'] ?>"><?= htmlspecialchars($room['name']) ?></option>
            <?php endforeach; ?>
          </select>
          <label for="room_id"style="color:rgb(222, 29, 196);">Planet Name</label>
        </div>

        <input type="hidden" id="usertoken" value="<?= $_SESSION['auth']['token'] ?>" />
        <button type="submit" class="btn btn-admin w-100"style="color:rgb(222, 29, 196);">Create Reservation</button>
      </form>
    </div>
  </div>
</div>

<!-- Stil (ortak temaya uygun) -->
<style>
  .form-control, .form-select {
    border-radius: 8px !important;
    padding: 10px 12px !important;
    border: 2px solid rgb(235, 158, 235);
    background-color: rgba(93, 124, 236, 0.15);;
    font-family: 'Orbitron', sans-serif;
    
  }

  .btn-admin {
    background-color: rgb(230, 228, 227);
    color: rgb(11, 11, 10);
    border: 2px solid #bb89ae;
    font-size: 16px;
    font-family: inherit;
    font-weight: bold;
    box-shadow: 0 4px 0 rgb(204, 177, 247);
    transition: all 0.3s ease-in-out;
  }

  .btn-admin:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(255, 105, 210, 0.5);
 background: linear-gradient(135deg,rgb(136, 85, 218),rgb(136, 85, 218)));
    border: 2px solid #ff6fd8;
    
   
  }
</style>

<?php include '../../_layout/userlayout/footer.php'; ?>
