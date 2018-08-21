(function ($) {

    // images sorting handler
    $.fn.SortImagesHandler = function (action){

        $('#imagesContainer').sortable({
            items: "> .image-holder",
            update: function () {

                let newOrder = [];
                let itemId = 0;

                $('#imagesContainer .image-holder').each(function(i, e){
                    let data = $(e).find('img').data();
                    newOrder.push(data.id);
                    itemId = data.itemid;
                });

                $.ajax({
                    type: "POST",
                    url: action,
                    data: {
                        "items": newOrder,
                        "itemId" : itemId,
                    },
                    dataType: 'json'
                });
            }
        });
    };

    // delete image handler
    $.fn.DeleteImageHandler = function (action) {

        $('#imagesContainer .delete-icon').click(function () {
            let data = $(this).parent().find('img').data();
            let elem = $(this);

            $.ajax({
                type:'post',
                url: action,
                data: {itemId: data.itemid, photoId: data.id},
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    elem.parent().remove();
                }
            });

        });
    };

})(jQuery);