
function sort_rez() {
    var table=$('#myTable');
    var tbody =$('#table1');

    tbody.find('tr').sort(function(a, b) {
        if($('#rez_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#rez_order').val();
    if(sort_order=="asc") {
        document.getElementById("rez_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("rez_order").value="asc";
    }
}

function sort_bas() {
    var table=$('#myTable');
    var tbody =$('#table1');

    tbody.find('tr').sort(function(a, b) {
        if($('#bas_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#bas_order').val();
    if(sort_order=="asc") {
        document.getElementById("bas_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("bas_order").value="asc";
    }
}


function sort_dog() {
    var table=$('#myTable');
    var tbody =$('#table1');

    tbody.find('tr').sort(function(a, b) {
        if($('#dog_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#dog_order').val();
    if(sort_order=="asc") {
        document.getElementById("dog_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("dog_order").value="asc";
    }
}



// Остальные---------------------------------------------------------------------------------------------

function sort_rez2() {
    var table=$('#myTable2');
    var tbody =$('#table2');

    tbody.find('tr').sort(function(a, b) {
        if($('#rez2_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#rez2_order').val();
    if(sort_order=="asc") {
        document.getElementById("rez2_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("rez2_order").value="asc";
    }
}

//Выбранные программы----------------------------------------------------------------------------------------------------------------
function sel_sort_rez() {
    var table=$('#myTable4');
    var tbody =$('#table4');

    tbody.find('tr').sort(function(a, b) {
        if($('#sel_rez_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#sel_rez_order').val();
    if(sort_order=="asc") {
        document.getElementById("sel_rez_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("sel_rez_order").value="asc";
    }
}

function sel_sort_bas() {
    var table=$('#myTable4');
    var tbody =$('#table4');

    tbody.find('tr').sort(function(a, b) {
        if($('#sel_bas_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#sel_bas_order').val();
    if(sort_order=="asc") {
        document.getElementById("sel_bas_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("sel_bas_order").value="asc";
    }
}
