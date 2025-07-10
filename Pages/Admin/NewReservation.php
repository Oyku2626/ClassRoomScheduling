<?php
include '../../_layout/adminlayout/header.php';
?>

<!-- Form Container -->
<div class="container mt-4 mb-5" style="
    max-width: 600px;
    margin: 0 auto;
    padding: 30px;
    background-color: rgba(128, 0, 128, 0.5); 
    border-radius: 16px;
    box-shadow: 0 0 20px rgba(255, 105, 210, 0.2);
    color: #fff;
    font-family: 'Orbitron', sans-serif;
  ">

  <h3 style="text-align: center; color: #ffb6c1; margin-bottom: 25px;">Add New Reservation</h3>

  <form id="addReservationForm">
    <div class="mb-3">
      <label for="date" class="form-label">Date</label>
      <input type="date" id="date" name="date" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="start_time" class="form-label">Start Time</label>
      <input type="time" id="start_time" name="start_time" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="end_time" class="form-label">End Time</label>
      <input type="time" id="end_time" name="end_time" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="lecturer_id" class="form-label">Crew</label>
      <select id="lecturer_id" name="lecturer_id" class="form-control" required>
        <?php foreach ($lecturers as $lecturer): ?>
          <option value="<?= $lecturer['id'] ?>"><?= htmlspecialchars($lecturer['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="room_id" class="form-label">Planet Name</label>
      <select id="room_id" name="room_id" class="form-control" required>
        <?php foreach ($rooms as $room): ?>
          <option value="<?= $room['id'] ?>"><?= htmlspecialchars($room['name']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <input type="hidden" id="token" value="<?= $_SESSION['auth']['token'] ?>" />

    <button type="submit" class="btn btn-admin w-100">Create Reservation</button>
  </form>
</div>

<?php include '../../_layout/adminlayout/footer.php'; ?>

<!-- Stil -->
<style>
  .form-control {
    border-radius: 8px;
    padding: 10px 12px;
    border: 2px solid rgb(171, 106, 142);
    background-color: rgba(93, 124, 236, 0.15);
    color: #cdd3e7;
    transition: all 0.3s ease;
    font-family: 'Orbitron', sans-serif;
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
    padding: 12px;
  }

  .btn-admin:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 10px rgba(255, 105, 210, 0.5);
    background: linear-gradient(135deg, #d61a6f, #e255c5);
    border: 2px solid #ff6fd8;
  }
</style>
