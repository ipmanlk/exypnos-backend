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
  $('#addPostBtn').prop("disabled",true);
  $.ajax({
    type: 'POST',
    url: '../tasks/addPost.php',
    data: $('#postForm').serialize(),
    dataType: "html",
    async: true,
    success: function(msg) {
      if (msg == 1) {
        showOutput("Post added!");
      } else if (msg == 2) {
        showOutput("Inputs are missing!");
      } else {
        showOutput("Data insert error!");
      }

    }
  });
}

function updatePost() {
  $('#updatePostBtn').prop("disabled",true);
  $.ajax({
    type: 'POST',
    url: '../tasks/updatePost.php',
    data: $('#postForm').serialize(),
    dataType: "html",
    async: true,
    success: function(msg) {
      var output;
      if (msg == 1) {
        output = "Post updated!";
      } else if (msg == 2) {
        output = "Inputs are missing!";
      } else {
        output = "Data update error!";
      }
      showOutput(output);
    }
  });
}

function showOutput(msg) {
  $('#updatePostBtn').prop("disabled",false);
  $('#addPostBtn').prop("disabled",false);
  $.notify(msg);
}