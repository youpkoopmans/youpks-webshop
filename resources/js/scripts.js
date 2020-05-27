// Libraries
require('./libraries/libraries');

// Custom Jquery
$( document ).ready(function() {

    $('.delete-product').click(function (e) {
        let id = $(this).data('id');
        axios.post('product/destroy', {id})
            .then(() => {
                location.reload();
            })
            .catch((e) => {
                console.log(e);
            })
    })

    $('.delete-brand').click(function (e) {
        let id = $(this).data('id');
        axios.post('brand/destroy', {id})
            .then(() => {
                location.reload();
            })
            .catch((e) => {
                console.log(e);
            })
    })

});
