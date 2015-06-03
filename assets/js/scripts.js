$.ajax({
    url: 'http://myjervey.com/menu-only-page',
    dataType: 'html'
}).done(function(response) {
    var nav = $('div.nav');
    nav.append(response);
    nav.find('a').each(function() {
        $(this).attr('href', "http://myjervey.com" + $(this).attr('href'));
    });
});