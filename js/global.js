var id = $('input#id').val();

$('input#charactername').on('blur', function() {
	
	//this turns the charactername field into a variable
	var charactername = $('input#charactername').val();
	
	//alert(id);
	
	//this if statement will ignore input of only spaces and disable the folowing code for an empty field
	if($.trim(charactername) != ''){
		
		//post the value to the php file
		//in {charactername: charactername} , the first instance of charactername is the variable listed above, the second is the value (ie: alex or ryan)
		//the function grabs the data from the charactername.php file and lets me do something with it.
		$.post('updates/charactername.php', {charactername: charactername, id: id}, function(data){
			//display the data
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});
//Below this comment, all the functions are the same, but for their respective field. No commentary will be given beyond here.
$('input#level').on('blur', function() {
	
	var level = $('input#level').val();
	
	if($.trim(level) != ''){
		
		$.post('updates/level.php', {level: level, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});


$('input#experience').on('blur', function() {
	
	var experience = $('input#experience').val();
	
	if($.trim(experience) != ''){
		
		$.post('updates/experience.php', {experience: experience, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});


$('input#inspiration').on('blur', function() {
	
	var inspiration = $('input#inspiration').val();
	
	if($.trim(inspiration) != ''){
		
		$.post('updates/inspiration.php', {inspiration: inspiration, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});


$('input#classlevel').on('blur', function() {
	
	var classlevel = $('input#classlevel').val();
	
	if($.trim(classlevel) != ''){
		
		$.post('updates/classlevel.php', {classlevel: classlevel, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});


$('input#background').on('blur', function() {
	
	var background = $('input#background').val();
	
	if($.trim(background) != ''){
		
		$.post('updates/background.php', {background: background, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});

$('input#race').on('blur', function() {
	
	var race = $('input#race').val();
	
	if($.trim(race) != ''){
		
		$.post('updates/race.php', {race: race, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});

$('input#alignment').on('blur', function() {
	
	var alignment = $('input#alignment').val();
	
	if($.trim(alignment) != ''){
		
		$.post('updates/alignment.php', {alignment: alignment, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});

$('input#max_hp').on('blur', function() {
	
	var max_hp = $('input#max_hp').val();
	
	if($.trim(max_hp) != ''){
		
		$.post('updates/max_hp.php', {max_hp: max_hp, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});

$('input#current_hp').on('blur', function() {
	
	var current_hp = $('input#current_hp').val();
	
	if($.trim(current_hp) != ''){
		
		$.post('updates/current_hp.php', {current_hp: current_hp, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});

$('input#hit_dice').on('blur', function() {
	
	var hit_dice = $('input#hit_dice').val();
	
	if($.trim(hit_dice) != ''){
		
		$.post('updates/hit_dice.php', {hit_dice: hit_dice, id: id}, function(data){
			
			$('div#update-data').text(data);
			$('div#update-data').fadeOut().fadeIn().fadeOut();
			
		});
	}
});