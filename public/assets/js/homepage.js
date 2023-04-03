$(".compareBtn").on("click", compareItems);
function compareItems() {
  var id = $(this).attr('rel');
  var size = $(".compare").length;
  var quant = $(".quant").val();
  if (size == 5) {
    if ($(".post__content" + id).hasClass("compare")) {
      $(".post__content" + id).removeClass("compare")
    }
    else {
      alert("Already maximum amount selected");
    }
  } else {
    if (size == 0) {
      $("#final").show();
    }
    if ($(".post__content" + id).hasClass("compare")) {
      $(".post__content" + id).removeClass("compare")
    }
    else {
      $(".post__content" + id).addClass("compare");
      var pro1 = $("#card_one").val();
      var pro2 = $("#card_two").val();
      var pro3 = $("#card_three").val();
      var pro4 = $("#card_four").val();
      var pro5 = $("#card_five").val();
      if(pro1 == "") {
        $("#card_one").val(id,quant);
      }
      else if(pro2 == "") {
        $("#card_two").val(id,quant);
      }
      else if (pro3 == "") {
        $("#card_three").val(id,quant);
      }
      else if (pro4 == "") {
        $("#card_four").val(id,quant);
      }
      else if (pro5 == "") {
        $("#card_five").val(id,quant);
      }
    }
  }

}

