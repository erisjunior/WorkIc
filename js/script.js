$(".button-collapse").sideNav({
    closeOnClick: true,
    draggable: true,
});

$("#calendario").hide();
$("#dividas").hide();

function mudaPag(a,b,c){
    
    var view = "views/"+a+".php?"+b+"="+c;
    
    $("#main").fadeOut(100);
    $("#titulo").fadeOut(100);
    setTimeout(function(){
        $("#main").load(view);
    }, 100);

    var A = a.charAt(0).toUpperCase() + a.slice(1);
    if (A == "Calendario") {A = "Calendário"}

    document.getElementById("titulo").innerText = "- "+A;

    $("#main").fadeIn(100);
    $("#titulo").fadeIn(100);

    window.history.pushState('Object', 'WorkIC', '/index.php?p='+a);

}