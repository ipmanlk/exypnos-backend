$(document).ready(function() {
  $("#postForm").submit(function(e) {
    e.preventDefault();
  });
} );

// Post content preview
$('#post').bind('input propertychange', function() {
  $('#preview').html($('#post').val());
});

function addPost() {
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

function updatePost() {
  $.ajax({
    type: 'POST',
    url: '../tasks/updatePost.php',
    data: $('#postForm').serialize(),
    dataType: "html",
    async: true,
    success: function(msg) {
      if (msg == 1) {
        alert("Post updated!");
      } else if (msg == 2) {
        alert("Inputs are missing!");
      } else {
        alert("Data update error!");
      }
    }
  });
}