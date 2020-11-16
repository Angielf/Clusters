function sort_rez() {
    var table=$('#collapseExample3');
    var tbody =$('#table2');

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


function sort_pr() {
    var table=$('#collapseExample3');
    var tbody =$('#table2');

    tbody.find('tr').sort(function(a, b) {
        if($('#pr_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#pr_order').val();
    if(sort_order=="asc") {
        document.getElementById("pr_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("pr_order").value="asc";
    }
}


function sort_ra() {
    var table=$('#collapseExample3');
    var tbody =$('#table2');

    tbody.find('tr').sort(function(a, b) {
        if($('#ra_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#ra_order').val();
    if(sort_order=="asc") {
        document.getElementById("ra_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("ra_order").value="asc";
    }
}


function sort_st() {
    var table=$('#collapseExample3');
    var tbody =$('#table2');

    tbody.find('tr').sort(function(a, b) {
        if($('#st_order').val()=='asc') {
            return $('td:first', a).text().localeCompare($('td:first', b).text());
        } else {
            return $('td:first', b).text().localeCompare($('td:first', a).text());
        }
    }).appendTo(tbody);

    var sort_order=$('#st_order').val();
    if(sort_order=="asc") {
        document.getElementById("st_order").value="desc";
    }
    if(sort_order=="desc") {
        document.getElementById("st_order").value="asc";
    }
}


function sort_dog() {
    var table=$('#collapseExample3');
    var tbody =$('#table2');

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
