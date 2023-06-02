// Si soumettre le form

$("#soumettre_message").click(function () {
  var msgpart = $("#ecrire_message").val();
  $.post("post.php", { text: msgpart });
  $("#ecrire_message").val("");
  return false;
});