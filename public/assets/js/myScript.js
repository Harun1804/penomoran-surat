var SweetAlert2Demo = function() {

    //== Demos
    var initDemos = function() {
        window.addEventListener('swal:confirm',event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                buttons: true,
                dangerMode : true,
            })
            .then((willDelete) => {
                if(willDelete){
                    window.livewire.emit('destroy',event.detail.id);
                }
            });
        });
    };

    return {
        //== Init
        init: function() {
            initDemos();
        },
    };
}();

jQuery(document).ready(function() {
    SweetAlert2Demo.init();
});