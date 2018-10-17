const dataTable = $('.table').DataTable( {
  responsive: true
});

function editPost(postID) {
  window.location = "./post.php?action=edit&post_id=" + postID;
}