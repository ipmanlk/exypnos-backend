$(document).ready(function() {
  $("#postForm").submit(function(e) {
    e.preventDefault();
  });

  // init summer note
  $('#post').summernote({
    tabsize: 2,
    height: 280,
    toolbar: [
      ['Insert', ['picture', 'link', 'video']],
      ['Font',['fontsize']],
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['para', ['paragraph']],
      ['color', ['color']],
      ['list', ['ul', 'ol']],
      ['Misc', ['undo', 'redo', 'codeview']],
    ],
    callbacks: {
      onChange: function(contents) {
        $('#preview').html(contents);
      }
    }
  });
} );

function addPost() {
  $('#addPostBtn').prop("disabled",true);
  $.ajax({
    type: 'POST',
    url: '../../tasks/addPost.php',
    data: $('#postForm').serialize(),
    dataType: "html",
    async: true,
    success: function(msg) {
      if (msg == 1) {
        showOutput("Post added!");
      } else if (msg == 2) {
        showOutput("Inputs are missing!","danger");
      } else {
        showOutput("Data insert error!","danger");
      }

    }
  });
}

// handle url shortner details
function addPostHandler(elementID="coverimg") {
  if (elementID == "coverimg") {
      urlShortner($('#coverimg').val(), "coverimg");
  } else if (elementID == "cardimg1") {
    urlShortner($('#cardimg1').val(), "cardimg1");
  } else if (elementID == "cardimg2") {
    urlShortner($('#cardimg2').val(), "cardimg2");
  } else {
    addPost();
  }
}

function urlShortner(longUrl,elementID) {
  $.ajax({
    type: 'POST',
    data: {
      access_token:"3241ee7565a888422d82314399bc09e0550e0c48",
      longUrl:longUrl,
      format:"json"
    },
    url: "https://api-ssl.bitly.com/v3/shorten",
    dataType: "json",
    async: true,
    success: function(msg) {
      if (elementID == "coverimg") {
        $('#coverimg').val(msg.data['url']);
        addPostHandler('cardimg1');
      } else if (elementID == "cardimg1") {
        $('#cardimg1').val(msg.data['url']);
        addPostHandler('cardimg2');
      } else if (elementID == "cardimg2") {
        $('#cardimg2').val(msg.data['url']);
        addPostHandler('post');
      }
    }
  });
}


function updatePost() {
  $('#updatePostBtn').prop("disabled",true);
  $.ajax({
    type: 'POST',
    url: '../../tasks/updatePost.php',
    data: $('#postForm').serialize(),
    dataType: "html",
    async: true,
    success: function(msg) {
      var output;
      if (msg == 1) {
        output = "Post updated!";
        showOutput(output);
      } else if (msg == 2) {
        output = "Inputs are missing!";
        showOutput(output,"danger");
      } else {
        output = "Data update error!";
        showOutput(output,"danger");
      }

      btnDisable(false);
    }
  });
}

function btnDisable(val) {
  $('#updatePostBtn,#addPostBtn').prop("disabled",val);
}

function showOutput(msg, type) {
  $.notify({
    message: msg
  },{
    type: type
  })
}

$("input[type=text]").on("change paste", function() {
  var elementID = $(this).attr('id');
  changeHandler(elementID);
});

function changeHandler(id) {
  var elementID = "#" + id;
  switch (id) {
    case "title":
    if (validateString($(elementID).val())) {
      btnDisable(false);
    } else {
      btnDisable(true);
      showOutput("Title can't contain html tags!","danger");
    }
    break;
    case "shortdes":
    if (validateString($(elementID).val())) {
      btnDisable(false);
    } else {
      btnDisable(true);
      showOutput("Short description can't contain html tags!","danger");
    }
    break;
    default:
    if (validateURL($(elementID).val())) {
      btnDisable(false);
    } else {
      btnDisable(true);
      showOutput("Please enter valid url!","danger");
    }
  }
}

function validateURL(textval) {
  var urlregex = /^(https?|ftp):\/\/([a-zA-Z0-9.-]+(:[a-zA-Z0-9.&%$-]+)*@)*((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}|([a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(:[0-9]+)*(\/($|[a-zA-Z0-9.,?'\\+&%$#=~_-]+))*$/;
  return urlregex.test(textval);
}

function validateString(str) {
  var pattern = /^[<>[] ]*$/;
  return !(pattern.test(str));
}