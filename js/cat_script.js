$(document).ready(function(){
    var li = $('.menu>li',this).has('.sub-menu');
    $('>a',li).click(function(e){
        e.preventDefault();
        $('.sub-menu',li).toggle();
    });
});
