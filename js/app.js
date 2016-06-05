//gets the element by its id
var file = document.getElementById('file');

//binds to onchange event of the input field
file.addEventListener('change', function() {
  //this.files[0].name gets the name of your file.
  alert("You have chosen " + this.files[0].name);
});

function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}

$('.modal').on('show.bs.modal', centerModal);
$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});