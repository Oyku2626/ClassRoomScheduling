
$(document).ready(function () {

  window.addEventListener('offline', () =>
    alert('İnternet bağlantınızı kontrol ediniz.')
  );

  Engine.init();
});

function Engine() {
  Engine.MasterPage();
}
Engine.init = function () {
  var module = this.getModul().split(',');

  for (var i = 0; i < module.length; i++) {
    this.runModule(module[i]);
  }
};

Engine.getModul = function () {
  var scripts = document.getElementById('engine');
  return scripts.getAttribute("data-module");
};

Engine.getPage = function () {
  var scripts = document.getElementById('engine');
  return scripts.getAttribute("data-page");
};

Engine.runModule = function (module) {
  var page = this.getPage();

  switch (module) {
    case "Admin":
      switch (page) {
        case "Home":
          this.AdminHome();
          break;
        case "NewReservation":
          this.AdminNewReservation();
          break;
        default:
          break;
      }
      break;

    case "User":
      switch (page) {
        case "Home":
          this.UserHome();
          break;
        case "MyReservations":
          this.UserMyReservations();
          break;
        case "userNewReservation":     // <-- Buraya ekledim
          this.UserNewReservation();
          break;
        default:
          break;
      }
      break;
    default:
      break;
  }

};

Engine.AdminHome = function () {
  console.log("Admin/Home yüklendi");
  // Buraya admin home işlemleri
};

Engine.UserHome = function () {
  console.log("User/Home yüklendi");
  // Buraya user home işlemleri
};

Engine.AdminNewReservation = function () {
  $(document).ready(function () {
    // Hoca listesini getir
    $.ajax({
      url: '/ClassroomScheduling/_management/data-bridge/get-lecturers.php',
      method: 'GET',
      dataType: 'json',
      success: function (data) {
        const select = $('#lecturer_id');
        select.append('<option value="">-- CREW --</option>');
        data.forEach(function (item) {
          select.append(`<option value="${item.id}">${item.name}</option>`);
        });
      },
      error: function () {
        alert('Hoca listesi alınamadı.');
      }
    });

    // Oda listesini getir
    $.ajax({
      url: '/ClassroomScheduling/_management/data-bridge/get-rooms.php',
      method: 'GET',
      dataType: 'json',
      success: function (data) {
        const select = $('#room_id');
        select.append('<option value="">-- PLANET --</option>');
        data.forEach(function (item) {
          select.append(`<option value="${item.id}">${item.name}</option>`);
        });
      },
      error: function () {
        alert('Oda listesi alınamadı.');
      }
    });
  });


  $('#addReservationForm').on('submit', function (e) {
    e.preventDefault();
    const data = {
      date: $('#date').val(),
      start_time: $('#start_time').val(),
      end_time: $('#end_time').val(),
      room_id: $('#room_id').val(),
      lecturer_id: $('#lecturer_id').val()
    };
    const token = $('#token').val();
    $.ajax({
      url: '/room-scheduler/reservations.php',
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(data),
      headers: {
        'Authorization': 'Bearer ' + token
      },
      success: function (response) {
        if (response.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: response.message || 'Rezervasyon kaydedildi.'
          }).then(() => {
            window.location.href = 'reservations.php';
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Hata',
            text: response.message || 'Rezervasyon eklenemedi.'
          });
        }
      },
      error: function (xhr) {
        Swal.fire({
          icon: 'error',
          title: 'Sunucu Hatası',
          text: xhr.responseJSON?.message || 'Bir hata oluştu.'
        });
      }
    });
  });
}

Engine.UserNewReservation = function () {
  $(document).ready(function () {
    // Hoca listesini getir
    $.ajax({
      url: '/ClassroomScheduling/_management/data-bridge/get-lecturers.php',
      method: 'GET',
      dataType: 'json',
      success: function (data) {
        const select = $('#lecturer_id');
        select.append('<option value="">-- CREW --</option>');
        data.forEach(function (item) {
          select.append(`<option value="${item.id}">${item.name}</option>`);
        });
      },
      error: function () {
        alert('Hoca listesi alınamadı.');
      }
    });

    // Oda listesini getir
    $.ajax({
      url: '/ClassroomScheduling/_management/data-bridge/get-rooms.php',
      method: 'GET',
      dataType: 'json',
      success: function (data) {
        const select = $('#room_id');
        select.append('<option value="">-- PLANET --</option>');
        data.forEach(function (item) {
          select.append(`<option value="${item.id}">${item.name}</option>`);
        });
      },
      error: function () {
        alert('Oda listesi alınamadı.');
      }
    });
  });


  $('#adduserReservationForm').on('submit', function (e) {
    e.preventDefault();
    const data = {
      date: $('#userdate').val(),
      start_time: $('#userstart_time').val(),
      end_time: $('#userend_time').val(),
      room_id: $('#userroom_id').val(),
      lecturer_id: $('#userlecturer_id').val()
    };
    const token = $('#usertoken').val();
    $.ajax({
      url: '/room-scheduler/reservations.php',
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(data),
      headers: {
        'Authorization': 'Bearer ' + token
      },
      success: function (response) {
        if (response.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Başarılı',
            text: response.message || 'Rezervasyon kaydedildi.'
          }).then(() => {
            window.location.href = 'MyReservations.php';
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Hata',
            text: response.message || 'Rezervasyon eklenemedi.'
          });
        }
      },
      error: function (xhr) {
        Swal.fire({
          icon: 'error',
          title: 'Sunucu Hatası',
          text: xhr.responseJSON?.message || 'Bir hata oluştu.'
        });
      }
    });
  });
}


Engine.UserMyReservations = function () {
  var userId = $('#userId').val();

  console.log('userid : ' + userId);


  if ($.fn.DataTable.isDataTable('#example2')) {
    $('#example2').DataTable().clear().destroy();
  }



  $('#example2').DataTable({
    ajax: {
      url: '/room-scheduler/get-user-reservations.php?id=' + userId,
      type: 'GET',
      dataSrc: ''
    },
    columns: [{
      data: 'date'
    },
    {
      data: 'start_time'
    },
    {
      data: 'end_time'
    },
    {
      data: 'status',
      render: function (data) {
        return data === 'onaylandi' ? '<span class="badge bg-success">Onaylandı</span>' :
          data === 'reddedildi' ? '<span class="badge bg-danger">Reddedildi</span>' :
            '<span class="badge bg-warning text-dark">Beklemede</span>';
      }
    },
    {
      data: 'oda_adi'
    },
    {
      data: 'id',
      render: function (data) {
        return `<a class="btn btn-sm btn-outline-primary reservation-edit" data-id="${data}">Düzenle</a>`;
      }
    }
    ],
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.13.4/i18n/tr.json"
    },
    responsive: true
  });

  $(document).on('click', '.reservation-edit', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    Swal.fire({
      title: 'Rezervasyon Düzenle',
      text: 'Rezervasyon ID: ' + id,
      icon: 'info',
      confirmButtonText: 'Tamam'
    });
  });
};
