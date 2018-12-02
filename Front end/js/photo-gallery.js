$(document).ready(function(){        
	$('li img').on('click',function(){
		var src = $(this).attr('src');
		var img = '<img src="' + src + '" class="img-fluid"/>';
		
		//start of new code new code
		var index = $(this).parent('li').index();   
		
		var html = '';
		html += img;                
		html += '<div class="modal-footer">';
		html += '<a style="line-height:30px;" class="controls previous float-left" href="' + (index) + '"><i class="fa fa-arrow-circle-o-left" style="font-size:30px;"></i><label class="float-right ml-1">prev</label></a>';
		html += '<a style="line-height:30px;" class="controls next float-right" href="'+ (index+2) + '"><label class="float-left mr-1">next</label><i class="fa fa-arrow-circle-o-right" style="font-size:30px;"></i></a>';
		html += '</div>';
		
		$('#galleryModal').modal();
		$('#galleryModal').on('shown.bs.modal', function(){
			$('#galleryModal .modal-body').html(html);
			//new code
			$('a.controls').trigger('click');
		})
		$('#galleryModal').on('hidden.bs.modal', function(){
			$('#galleryModal .modal-body').html('');
		});
		
		
		
		
   });	
})
        
         
$(document).on('click', 'a.controls', function(){
	var index = $(this).attr('href');
	var src = $('ul.row li:nth-child('+ index +') img').attr('src');             
	
	$('.modal-body img').attr('src', src);
	
	var newPrevIndex = parseInt(index) - 1; 
	var newNextIndex = parseInt(newPrevIndex) + 2; 
	
	if($(this).hasClass('previous')){               
		$(this).attr('href', newPrevIndex); 
		$('a.next').attr('href', newNextIndex);
	}else{
		$(this).attr('href', newNextIndex); 
		$('a.previous').attr('href', newPrevIndex);
	}
	
	var total = $('ul.row li').length + 1; 
	//hide next button
	if(total === newNextIndex){
		$('a.next').hide();
	}else{
		$('a.next').show()
	}            
	//hide previous button
	if(newPrevIndex === 0){
		$('a.previous').hide();
	}else{
		$('a.previous').show()
	}
	
	
	return false;
});