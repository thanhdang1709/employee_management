$('#department').select2();


$(document).ready(function(){
    setTimeout(function(){
        $(".alert").fadeOut();
        },4000)
        
    setTimeout(function(){
        $("a[href='"+window.location.href+"']").closest('li.has-treeview').addClass('menu-open');
        $("a[href='"+window.location.href+"']").closest('a.nav-link').addClass('active');
        $("a[href='"+window.location.href+"']").closest('a[href="#"]').addClass('active');
    },1000);

    
});

$(function(){
    var current = window.location.href;
    $('#nav li a').each(function(){
        var $this = $(this);
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    });
    console.log('why????');
})
