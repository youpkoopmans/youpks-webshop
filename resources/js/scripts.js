// Libraries
require('./libraries/libraries');

// Custom Jquery
$( document ).ready(function() {

    $('#image-input').on('change', function () {
        $('#image-edit-preview').hide();
        $('#image-preview').attr('src', window.URL.createObjectURL(this.files[0]));
    })


});
