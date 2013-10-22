var collectionHolder = $('div#all-answers');

//configure link add_answers
var $addAnswersLink = $('<a href="#" class="buttom-embed">New Answer</a>');
var $newLinkLi = $('<table><tr><td></td></tr></table>').append($addAnswersLink);

jQuery(document).ready(function () {
	
	//Añade un enlace para borrar la answer relacionada
	collectionHolder.find('table.new-answers').each(function(){
		deleteAnswerForm($(this));
	})
	
    insertLinkAddNew($('#tipddy_surveybundle_question_answerType').val());
	
	
	function addAnswersForm(collectionHolder, $newLinkLi, $answerType) {
		
		var prototype;
		
		if ($answerType == 2) {   //PHOTO
	
			prototype = collectionHolder.attr('data-prototype-photo');
	
		} else if ($answerType == 3) {   //VIDEO
	
		    prototype = collectionHolder.attr('data-prototype-video');
	
		} else  {   //TEXT
   		
            prototype = collectionHolder.attr('data-prototype');
		
		}
		
		
		//Sustituye el $$name$$
		var newForm = prototype.replace(/__name__/g, collectionHolder.children().length);
		
		var $newFormLi = $('<div class="new-answers"></div>').append(newForm);
		$newLinkLi.before($newFormLi);
		
		deleteAnswerForm($newFormLi);
	}
	
	function deleteAnswerForm($answerFormLi)
	{
	   var $removeFormA = $('<a class="button-embed" href="#">Delete Answer</a>');
	   
	   $answerFormLi.find('td.adelete').append($removeFormA);
	   
	   $removeFormA.on('click', function(e){
		  
		  //envita redirección
		  e.preventDefault();
		  
		  //quita el li
		  $answerFormLi.remove();
	   });
	}
	
	
	function insertLinkAddNew($answerType)
	{
		//Añade el enlace "New Answer"
	    collectionHolder.append($newLinkLi);
		
     	$addAnswersLink.on('click', function(e){
	  
	       //evita la redirección
	       e.preventDefault();
	    
	       //Añade una nueva Answer en el siguiente bloque de código
	       addAnswersForm(collectionHolder, $newLinkLi, $answerType);
		
     	});
	}
	
	//Cuando se selecccione algo en AnswerType
	$('#tipddy_surveybundle_question_answerType').change(function(){
	 	$('div#all-answers').empty();
		//Añade el enlace "New Answer"
	    insertLinkAddNew($(this).val());
	
	})
	
	
	
})