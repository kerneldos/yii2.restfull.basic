/**
 * Main JS file
 */
$(document).ready(function () {
    $.ajax({
        'url': '/api/v1/link',
        'type': 'GET',
        'async': false,
        'success': function (response) {
            $(response).each(function (i, item) {
                insertItem(item);
            });
        },
    });

    $('.create-link').on('click', function (e) {
        e.preventDefault();

        $('.link-create-dialog').modal();
    });

    $('.link-create-form').on('submit', function (e) {
        e.preventDefault();

        let $form = $(this);

        $.ajax({
            'url': '/api/v1/link/create',
            'type': 'POST',
            'data': $form.serializeArray(),
            'success': function (item) {
                insertItem(item);

                $('.link-create-dialog').modal('hide');
            }
        });
    });

    /**
     *
     * @param {Object} item
     */
    function insertItem(item) {
        let $itemTemplate = $('.link-item tr', '#templates').clone();

        $('.link-item-id', $itemTemplate).text(item['id']);

        $('.link-item-url', $itemTemplate).text(item['url']);
        $('.link-item-url', $itemTemplate).attr('href', item['url']);

        $('.link-item-short-url', $itemTemplate).text(item['short_url']);
        $('.link-item-short-url', $itemTemplate).attr('href', item['short_url']);

        $('.link-item-counter', $itemTemplate).text(item['counter']);

        $itemTemplate.appendTo('.link-item-list tbody');
    }
});