
// selected cat ID
var selectedCatID;

// data table
const dataTable = $('.table').DataTable( {
  responsive: true,
  order: [[ 0, "asc" ]]
});

function addCatModal() {
  $('#modalTitle').text("Add Category");
  $('#btnAddCat').show();
  $('#btnEditCat').hide();
  showModal();
}

function editCatModal(catID, catName) {
  $('#modalTitle').text("Edit Category : " + catName);
  $('#category').val(catName);
  $('#btnAddCat').hide();
  $('#btnEditCat').show();
  showModal();
  selectedCatID = catID;
}

function editCat() {
  var category = $('#category').val();
  var data = {
    cat_id: selectedCatID,
    cat_name: category
  }
  var url = '../../tasks/updateCategory.php';
  sendRequest(url, data);
}

function deleteCat(catID) {
  var data = {cat_id: catID}
  var url = '../../tasks/deleteCategory.php';
  sendRequest(url, data);
}

function addCat() {
  var category = $('#category').val();
  var data = {cat_name: category};
  var url = '../../tasks/addCategory.php';
  sendRequest(url, data);
}


function sendRequest(url,data) {
  hideModal();
  $.ajax({
    type: 'POST',
    url: url,
    data: data,
    dataType: "html",
    async: true,
    success: function(msg) {
      showOutput(url,msg);
      getCategoryData();
    }
  });
}


function showModal() {
  $('#catModal').modal('show');
}

function hideModal() {
  $('#catModal').modal('hide');
}

function showOutput(url, msg) {
  var type,result;
  switch (url) {
    case '../../tasks/addCategory.php':
    type = "Add Category";
    break;
    case '../../tasks/updateCategory.php':
    type = "Edit Category";
    break;
    case '../../tasks/deleteCategory.php':
    type = "Delete Category";
    break;
  }
  switch (msg) {
    case "1":
    result = " Completed!"
    break;
    default:
    result = " Failed!"
  }

  $.notify(type + result);
}

function getCategoryData() {
  dataTable.clear();
  $.get("../../tasks/getCategory.php" , function(data) {
    const catData = JSON.parse(data);
    for (item in catData) {
      dataTable.row.add([
        catData[item].cat_id,
        catData[item].name,
        `<button type="button" class="btn btn-primary" onclick="editCatModal('${catData[item].cat_id}', '${catData[item].name}')">Edit</button> <button type="button" class="btn btn-danger" onclick="deleteCat('${catData[item].cat_id}')">Delete</button>`
      ]).draw();
    }
});
}