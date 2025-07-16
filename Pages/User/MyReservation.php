<?php include '../../_layout/userlayout/header.php';
require_once '../../../room-scheduler/dbo_test.php';

$sql = "SELECT rr.id, rr.date, rr.start_time, rr.end_time, rr.status, rr.created_at, 
               l.name AS lecturer_name, r.name AS room_name
        FROM room_reservations rr
        JOIN lecturers l ON rr.lecturer_id = l.id
        JOIN rooms r ON rr.room_id = r.id
        ORDER BY rr.created_at DESC";
$stmt = $pdo->query($sql);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" rel="stylesheet">

<div class="table-responsive">
    <table id="example" class="display table table-bordered">
        <thead>
            <style>
  .reservations-table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: rgba(60, 10, 100, 0.45);
    box-shadow: 0 0 25px rgba(255, 105, 210, 0.3);
    border-radius: 16px;
    overflow: hidden;
  }

  .reservations-table th,
  .reservations-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #e4b8ebff;
  }

  .reservations-table thead {
   background-color: rgba(60, 10, 100, 0.45);
    color: #4a4a4a;
  }

  .reservations-table tbody tr:hover {
    background-color: #674d6eff;
  }

  h2.title {
    text-align: center;
     color: #ffd6fa;
    margin-top: 40px;
    margin-bottom: 20px;
  }
</style>
<table class="reservations-table">
   <thead style="color:rgb(222, 29, 196);">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PLANET</th>
            <th>DATE</th>
            <th>START TIME</th>
            <th>END TIME</th>
            <th>STATUS</th>
            <th>CREATED AT</th>
        </tr>
        </thead>
          <tbody> <?php foreach ($reservations as $reservation): ?> <tr>
      <td> <?= htmlspecialchars($reservation['id']) ?> </td>
      <td> <?= htmlspecialchars($reservation['lecturer_name']) ?> </td>
      <td> <?= htmlspecialchars($reservation['room_name']) ?> </td>
      <td> <?= htmlspecialchars($reservation['date']) ?> </td>
      <td> <?= htmlspecialchars($reservation['start_time']) ?> </td>
      <td> <?= htmlspecialchars($reservation['end_time']) ?> </td>
      <td> <?= htmlspecialchars($reservation['status']) ?> </td>
      <td> <?= htmlspecialchars($reservation['created_at']) ?> </td>
    </tr> <?php endforeach; ?> </tbody>
    </table>
</div>


<?php include '../../_layout/userlayout/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>