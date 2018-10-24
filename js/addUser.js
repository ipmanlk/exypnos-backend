const dataTable = $('.table').DataTable( {
  responsive: true
});

$(document).ready(function() {
  $("#addUserForm").submit(function(e) {
    e.preventDefault();
    addUser();
  });
} );

function addUser() {
  $.ajax({
    type: 'POST',
    url: '../../tasks/addUser.php',
    data: $('#addUserForm').serialize(),
    dataType: "html",
    async: true,
    success: function(msg) {
      if (msg == 1) {
        alert("User Adeed!");
      } else {
        alert("User add failed!");
      }
    }
  });
}