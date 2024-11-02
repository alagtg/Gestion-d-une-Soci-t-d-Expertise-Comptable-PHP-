
		<script type="text/javascript" src="scripts/jquery-1.2.6.min.js"></script>
		<?php include("sfbrowser/init.php"); ?>

		<script type="text/javascript">
			<!--
			function addFiles(aFiles) {
				if ($('#addfiles>ul').length==0) $('#addfiles').html('<ul/>');
				for (var i=0;i<aFiles.length;i++) $("#addfiles>ul").append("<li onclick=\"$(this).remove()\">"+aFiles[i].file+" is "+aFiles[i].size+"</li>");
			}
			function addImages(aFiles) {
				$.each(aFiles,function(i,o){
					$("#addimages").append("<img src=\""+o.file+"\" onclick=\"$(this).remove();\" />");
				});
			}
			$(function(){
				$("h1").text("jQuery."+$.sfbrowser.id+" "+$.sfbrowser.version);
				$("#page tr:odd").addClass("odd");
				$("#page tbody>tr").find("td:eq(0)").addClass("property");

				var mMenu = $("<ul id=\"menu\" />").appendTo("#header");
				$("h2").each(function(i,o){
					mMenu.append("<li><a href=\"#"+$(this).text()+"\">"+$(this).text()+"</a></li>");
					$(this).attr("id",$(this).text());
				});
			});
			$(window).load(function() {
			$.fn.sfbrowser();
		});
	
		</script>
