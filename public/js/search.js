var searchTimer = null;

$('body').on('submit', 'form.ajaxSearch', function (e) {
    var form = $(this);

    ajaxSearch(form);
    return false;
});

$('body').on('keyup', 'form.ajaxSearch input[type=search]', function() {
    var form = $(this).closest('form.ajaxSearch');

    if(form) {
        if(searchTimer !== null) clearInterval(searchTimer);

        searchTimer = setTimeout(function() {
            ajaxSearch(form);
        }, 800);
    }
});

$(document).ready(function() {
    ajaxSearch($('form.ajaxSearch'));
});

var ajaxSearch = function(form) {
    $.post(form.attr('action'), {"query": form.find('input[name=query]').val(), "_token": csrf_token}
    ).done(function (res) {
        $('#results').html(res);
    }).fail(function (res) {
        alert('Failed to search');
    });
};