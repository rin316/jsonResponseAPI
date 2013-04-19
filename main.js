/*!
 * main.js
 */
;(function ($, window, undefined) {
	$(document).ready( function () {
		// get url param
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}

		var url = vars.url;
		var id;
		if (vars.id) {id = vars.id;};
		$.ajax({
			type: 'GET'
			,url: 'json.php'
			,data: {
				url: url
				,id: id
			}
			,dataType:'json'
			,success:function (res) {
				console.log( res );
			}
		});
		
	});
})(jQuery, this);
