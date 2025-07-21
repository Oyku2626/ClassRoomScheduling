<?php include '../../_layout/userlayout/header.php'; ?>
<link href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" rel="stylesheet">

<input id="userId" type="hidden" value="<?= $_SESSION['auth']['id']; ?>">

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
    text-align: left; /* tüm hücreler sola hizalı */
    border-bottom: 1px solid #e4b8ebff;
  }

  /* DATE sütununu kesinlikle sola hizala */
  .reservations-table th:first-child,
  .reservations-table td:first-child {
    text-align: left !important;
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

<div class="table-responsive">
  <table id="example2" class="reservations-table">
    <thead style="color:rgb(222, 29, 196);">
      <tr>
        <th>DATE</th>
        <th>STRAT TIME</th>
        <th>END TIME</th>
        <th>STATUS</th>
        <th>PLANET</th>
        <th>EDIT</th>
      </tr>
    </thead>
  </table>
</div>


<?php include '../../_layout/userlayout/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="/tt/ClassroomNew/assets/js/engine.js"></script>