const dataTable = $('.table').DataTable( {
  responsive: true,
  order: [[ 1, "desc" ]]
});

function editPost(postID) {
  window.location = "./post.php?action=edit&post_id=" + postID;
}