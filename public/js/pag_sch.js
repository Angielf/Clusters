$('#own_bids').paginathing({
    perPage: 3,
    insertAfter: '#pag1',

    // Limites your pagination number
    // false or number
    limitPagination: false,

    // Pagination controls
    prevNext: true,
    firstLast: true,
    prevText: '&laquo;',
    nextText: '&raquo;',
    firstText: 'Начало',
    lastText: 'Конец',

})
