<?php
include '../../_layout/adminlayout/header.php';
?>

<!-- Form Container -->
<div class="container mt-4 mb-5" style="
    max-width: 600px;
    margin: 0 auto;
    padding: 30px;
    background-color: rgba(60, 18, 90, 0.7);
    border-radius: 16px;
    box-shadow: 0 0 20px rgba(255, 105, 210, 0.2);
    color: #fff;
    font-family: 'Orbitron', sans-serif;">

  <h3 style="text-align: center;  color: #ffd6fa; margin-bottom: 25px;">Add New Reservation</h3>

  <form id="addReservationForm">
    <div class="mb-3">
      <label for="date" class="form-label"style="color:rgb(222, 29, 196);">Date</label>
      <input type="date" id="date" name="date" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="start_time" class="form-label"style="color:rgb(222, 29, 196);">Start Time</label>
      <input type="time" id="start_time" name="start_time" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="end_time" class="form-label"style="color:rgb(222, 29, 196);">End Time</label>
      <input type="time" id="end_time" name="end_time" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="lecturer_id" class="form-label"style="color:rgb(222, 29, 196);">Crew</label>
      <select id="lecturer_id" name="lecturer_id" class="form-control" required>
        <?php foreach ($lecturers as $lecturer): ?>
          <option value="<?= $lecturer['id'] ?>"><?= htmlspecialchars($lecturer['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="room_id" class="form-label"style="color:rgb(222, 29, 196);">Planet Name</label>
      <select id="room_id" name="room_id" class="form-control" required>
        <?php foreach ($rooms as $room): ?>
          <option value="<?= $room['id'] ?>"><?= htmlspecialchars($room['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <input type="hidden" id="token" value="<?= $_SESSION['auth']['token'] ?>" />

    <button type="submit" class="btn btn-admin w-100"style="color:rgb(222, 29, 196);">Create Reservation</button>
  </form>
</div>
<div>
  <div>


<!-- Stil -->
<style>
  .form-control {
    border-radius: 8px;
    padding: 10px 12px;
    border: 2px solid rgb(235, 158, 235);
    background-color: rgba(93, 124, 236, 0.15);;
    color:rgba(213, 29, 191, 0.73);
    transition: all 0.3s ease;
    font-family: 'Orbitron', sans-serif;
  }

  .form-control:focus {
    outline: none;
    border-color:rgb(188, 37, 202);
    box-shadow: 0 0 8px #ff6fd8;
    background-color: rgba(226, 34, 207, 0.3);
    color: #fff;
  }

  .btn-admin {
    background: linear-gradient(135deg,rgb(136, 85, 218),rgb(136, 85, 218)));
    color: #fff;
    border: 2px solid #bb89ae;
    font-size: 16px;
    font-family: 'Orbitron', sans-serif;
    font-weight: bold;
    box-shadow: 0 4px 0 rgb(204, 177, 247);
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    border-radius: 8px;
    padding: 12px;
  }

  .btn-admin:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(255, 105, 210, 0.5);
 background: linear-gradient(135deg,rgb(136, 85, 218),rgb(136, 85, 218)));
    border: 2px solid #ff6fd8;
  }
</style>
<?php include '../../_layout/adminlayout/footer.php'; ?>