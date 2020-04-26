$(document).ready(function() {
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if (activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
	
	$(window).scroll(function(){
		
		if($(window).scrollTop()>=100)
			$('#toTop').show();
		else
			$('#toTop').hide();
		
	});
    
    
});

function add() {
    
    var sub1 = Number(document.getElementById('sbjct1').value),
    sub2 = Number(document.getElementById('sbjct2').value),
    sub3 = Number(document.getElementById('sbjct3').value),
    sub4 = Number(document.getElementById('sbjct4').value),
    pract = Number(document.getElementById('prctcl').value),
    total = document.getElementById('ttl'); 
    total.value = sub1+sub2+sub3+sub4+pract;

}

function sum() {
    var sub1 = Number(document.getElementById('subject1').value),
    sub2 = Number(document.getElementById('subject2').value),
    sub3 = Number(document.getElementById('subject3').value),
    sub4 = Number(document.getElementById('subject4').value),
    pract = Number(document.getElementById('practical').value),
    total = document.getElementById('total'); 
    total.value = sub1+sub2+sub3+sub4+pract;

}
