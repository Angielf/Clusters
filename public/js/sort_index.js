function sort_mun() {
    var table=$('#myTable');
    var tbody =$('#table1');

    tbody.find('tr').sort(function(a, b) {
        if($('#mun_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#mun_order').val();
    if(sort_order=="asc") {
        document.getElementById("mun_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("mun_order").value="asc";
    }
}


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
function sort_mun2() {
    var table=$('#myTable2');
    var tbody =$('#table2');

    tbody.find('tr').sort(function(a, b) {
        if($('#mun2_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#mun2_order').val();
    if(sort_order=="asc") {
        document.getElementById("mun2_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("mun2_order").value="asc";
    }
}


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
