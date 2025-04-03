const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);
$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();

  // get modal with classname
  const modalClassNames = $(".modal").attr("class");
  // find targeted classname looks like /w-600/
  var targetClassName = modalClassNames.match(/w-\d+/);
  if (targetClassName.length) {
    var modalWidth = targetClassName[0].split("-")[1];
    $(".modal").css("--bs-modal-width", modalWidth + "px");
  }
});
