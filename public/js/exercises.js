$(function () {
    $('#list-exercises').select2({
        allowClear: false,
        placeholder: 'Select Exercises',
        multiple: true,
        ajax: {
            url: '/api/admin/list-exercises',
            dataType: 'json',
            delay: 500,
            data: function (params) {
                return {
                    term: params.term || '',
                    page: params.page || 1
                };
            },
            cache: false,
        },

    });
});
