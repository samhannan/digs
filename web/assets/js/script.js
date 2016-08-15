$(document).ready(function() {
	
	$("input.town-search").autocomplete({
		valueKey: 'name',
		minLength: 3,
		appendMethod:'replace',
		source:[
			function(q, add) {
				if(q == '')
					return;

				$.getJSON("/api/get-towns-json/" + encodeURIComponent(q), function(resp) {
					add(resp);
				})
			}
		],
		getTitle:function(item){
			return item['name']
		},
		getValue:function(item){
			return item['name']
		}
	});

})