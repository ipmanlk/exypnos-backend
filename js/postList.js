const dataTable = $('.table').DataTable( {
  responsive: true,
  order: [[ 1, "desc" ]]
});

function editPost(postID) {
  window.location = "./post.php?action=edit&post_id=" + postID;
}

function deletePost(postID,row) {
  $('#confirmModal').modal('show');
  $('#confirmDelete').click(function() {
    sendRequest('../../tasks/deletePost.php',{post_id:postID}, row);
    $('#confirmModal').modal('hide');
  });
}

function sendRequest(url,data, row) {
  $.ajax({
    type: 'POST',
    url: url,
    data: data,
    dataType: "html",
    async: true,
    success: function(msg) {
      showOutput(msg, row);
    }
  });
}

function showOutput(msg, row) {
  var type,result;
  type = "Delete Post"
  switch (msg) {
    case "1":
    row.closest('tr').remove();
    result = " Completed!"
    break;
    default:
    result = " Failed!"
  }

  $.notify(type + result);
}