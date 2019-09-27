function callajax(link, d) {
    $.ajax({
        type : 'get',
        url : link,
        data : d,
        success : function (data) {
            alert(data);
        },
        error : function () {
            alert("file not found");
        }
    })
}


function load(id) {
    var lim = $("#load").attr("data");
    $("#load").attr("data", parseInt(lim)+1);
    $("#"+id).load( window.location+"?limit="+lim+" #"+id+">*");
}
