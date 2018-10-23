$(document).ready(function() {
  $("form").submit(function(e) {
    e.preventDefault();
  });
});

$('#editProfile').click(function () {
  $('#email,#uname,#name,#email,#about,#pwd,#pwd2,#profileimg').prop("disabled",false);
  $('#editProfile').hide();
  $('#saveChanges').fadeIn();
  $('#cancelChanges').fadeIn();
});

$('#saveChanges').click(function () {
  if ($('#pwd').val() !== $('#pwd2').val()) {
    showOutput("Passwords doesn't match!" ,"danger");
  } else {
    $('#saveChanges, #cancelChanges').prop("disabled",true);
    $.ajax({
      type: 'POST',
      url: '../tasks/updateProfile.php',
      data: $('form').serialize(),
      dataType: "html",
      async: true,
      success: function(msg) {
        switch (msg) {
          case "1":
          showOutput("Profile updated!");
          $('#email,#uname,#name,#email,#about,#pwd,#pwd2,#profileimg').prop("disabled",true);
          $('#saveChanges').hide();
          $('#cancelChanges').hide();
          $('#editProfile').fadeIn();
          break;
          case "2":
          showOutput("Profile update failed!" ,"danger");
          break;
          case "3":
          showOutput("Please fill all fileds including password!" ,"danger");
          break;
          default:
          $('#saveChanges, #cancelChanges').prop("disabled",false);
        }
      }
    });
  }
});

$('#cancelChanges').click(function () {
  window.location = "profile.php";
});

function showOutput(msg, type) {
  $.notify({
    message: msg
  },{
    type: type
  })
}