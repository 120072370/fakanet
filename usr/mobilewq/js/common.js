var hideMsg=function(){
	$('#tipMsg').fadeOut();
}

var addNew=function(){
  $('#addNew').toggle();
}
	
$(function(){
	$('tr.lightbox:odd').addClass('odd');
	$('tr.lightbox:even').addClass('even');

	$('tr.lightbox').mouseover(function(){
		$(this).addClass('selected');
    })

    $('tr.lightbox:odd').mouseout(function(){
		$(this).removeClass('selected');
		$(this).addClass('odd');
    })

    $('tr.lightbox:even').mouseout(function(){
		$(this).removeClass('selected');
		$(this).addClass('even');
    })
		
$('#selectall').click(function(){
    $('[type=checkbox]').prop('checked', true);
})

$('#selectall2').click(function(){
	var op=$(this).attr('checked');
	if ($(this).prop("checked")) {
	    $('[type=checkbox]').prop('checked', true);
	} else {
	    $('[type=checkbox]').prop('checked', false);
	}
})

$('.selectAllCheckbox').click(function(){
	//var op=$(this).attr('checked');
	if ($(this).prop("checked")) {
	    $('[type=checkbox]').prop('checked', true);
	} else {
	    $('[type=checkbox]').prop('checked', false);
	}
})

$('#unselectall').click(function(){
    $('[type=checkbox]').each(function(){
        if(this.checked){
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
        }
    })
})
})

var page_jump=function(url){
    var page=$('[name=page_options]').val();
	window.location.href=url+page;
}