

function submitSearchPage($page)
{
	$form = document.getElementById('search-form');

	$form.action +=	$page;

	$form.submit();

}



function commentPost($action,$formId)
{
	$form = $('#'+$formId);
	$data = {
		'comment':$form.comment
	};
	$.ajax({
		url:$action,
		type:"POST",
		data:$data,
		beforeSend:function(){
		},
		success:function(data,status,xhr){
			
		}
	});

	return false;
}

function loadComments()
{
	$.ajax({
		url:$action,
		type:"POST",
		data:$data,
		beforeSend:function(){
		},
		success:function(data,status,xhr){
			
		}
	});
}