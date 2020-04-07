$('table').on('click', 'a[data-toggle]', function () {
    let modal = $(this).attr('data-target');
    $(this).parents('tr').find('td[data-target]').each(function (i, item) {
        let input = $(modal).find(`[name="${$(item).attr('data-target')}"]`),
            value = $(item).hasClass('number') ? $(item).text().trim().replace(/,/g, '') : $(item).text().trim();
        if (input.is('input'))
            input.val(value);
        else if(input.is('select'))
            input.find(`option:contains(${value})`).prop('selected', true);
    });
});
