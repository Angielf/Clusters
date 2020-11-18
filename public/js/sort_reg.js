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
