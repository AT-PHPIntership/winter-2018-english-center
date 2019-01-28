$(function (){
    $('#list-vocalbularies').select2({
        allowClear: false,
        placeholder: 'Select Vocabularies',
        multiple: true,
        ajax: {
            url: '/api/admin/list-vocabularies',
            dataType: 'json',
            delay: 250,
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
