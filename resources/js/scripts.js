// Libraries
require('./libraries/libraries');

// Custom Jquery
$( document ).ready(function() {

    $('#image-input').on('change', function () {
        $('#image-edit-preview').hide();

        // TODO make jQuery
        document.getElementById('image-preview').src = window.URL.createObjectURL(this.files[0]);
    })


});
