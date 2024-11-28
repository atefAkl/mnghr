<<<<<<< HEAD
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
=======
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
>>>>>>> 4443ea6d67e6cbb05c99cb3973035dd4a3bf64f1
