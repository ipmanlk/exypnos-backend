$(document).ready(function() {
  $("#postForm").submit(function(e) {
    e.preventDefault();
    addItem();
  });
} );

function addItem() {
  $.ajax({
    type: 'POST',
    url: '../tasks/addPost.php',
    data: $('#postForm').serialize(),
    dataType: "html",
    async: true,
    success: function(msg) {
      if (msg == 1) {
        alert("Post added!");
      } else if (msg == 2) {
        alert("Inputs are missing!");
      } else {
        alert("Data insert error!");
      }
    }
  });
}

// Post content preview
$('#post').bind('input propertychange', function() {
  $('#preview').html($('#post').val());
});