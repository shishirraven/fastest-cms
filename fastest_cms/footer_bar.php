<script src="<?php echo BASEURL ?>bower_components/ContentTools/build/content-tools.min.js"></script>
<script src="<?php echo BASEURL ?>js/editor.js"></script>

      <link rel="stylesheet" type="text/css" href="bower_components/ContentTools/build/content-tools.min.css">

<div id="editor_bar" class="editor_bar">
	<div id="fastest-cms-editable-bar">
		<div class="h1" id="request-to-click">Click a section to make editable. </div>
		<div class="h2 fc_btn" id="fc_cancel_editable">Cancel</div>
		<div class="h2 fc_btn" id="save_as_editable">Save as Editable</div>
	</div>

	<div id="fastest-cms-remove-editable-bar">
		<div class="h1" id="request-to-click">Click to Remove an Editable. </div>
		<div class="h2 fc_btn" id="fc_cancel_remove_editable">Cancel</div>
	</div>

	<div id="fastest-cms-path-bar">

	</div>
	<div class="toolbar" id="editor_toolbar">
		<div class="logo">fastest cms</div>
		<ul id="enable_editable " class="menu-options">
			<li id="new_editable">+ New Editable</li>
			<li id="remove_editable">- Remove Editable</li>
		</ul>
	
	</div>
</div>

<style>
.border-for-editable {
	border:1px solid green;
}


#editable_bar.menu-options li{

	background-color: #3F51B5;
}#editable_bar.menu-options li{

	background-color: #3F51B5;
}
#editor_bar .menu-options{
	margin:0px;
	list-style: none;
	padding-left:10px;
	float:left;
}
#editor_bar .menu-options li{
	margin:0px;
	list-style: none;
	float:left;
	padding:7px;
	margin-top: 2px;
	font-size: 12px;
	cursor: pointer;
}
#editor_bar .menu-options li:hover{
	border-radius: 3px;
	padding:6px;
	border:1px solid black;
	
	background: rgba(56,55,56,1);
	background: -moz-linear-gradient(top, rgba(56,55,56,1) 0%, rgba(0,0,0,1) 100%);
	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(56,55,56,1)), color-stop(100%, rgba(0,0,0,1)));
	background: -webkit-linear-gradient(top, rgba(56,55,56,1) 0%, rgba(0,0,0,1) 100%);
	background: -o-linear-gradient(top, rgba(56,55,56,1) 0%, rgba(0,0,0,1) 100%);
	background: -ms-linear-gradient(top, rgba(56,55,56,1) 0%, rgba(0,0,0,1) 100%);
	background: linear-gradient(to bottom, rgba(56,55,56,1) 0%, rgba(0,0,0,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#383738', endColorstr='#000000', GradientType=0 );
}

#fastest-cms-editable-bar, #fastest-cms-remove-editable-bar{
		display:none;
	width:100%;
	background-color:#009688;
	color:#E0F2F1;
	padding:10px;
	text-align: center;
}

#fastest-cms-editable-bar .h2.fc_btn, #fastest-cms-remove-editable-bar .h2.fc_btn{
	display: inline-block;
	background-color:#009688;
	color:#E0F2F1;
	border-radius: 3px;
	/*padding:4px 10px;*/
	padding:10px;
	cursor:pointer;

	background: rgba(0,77,64,1);
	background: -moz-linear-gradient(top, rgba(0,77,64,1) 0%, rgba(0,105,93,1) 100%);
	background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(0,77,64,1)), color-stop(100%, rgba(0,105,93,1)));
	background: -webkit-linear-gradient(top, rgba(0,77,64,1) 0%, rgba(0,105,93,1) 100%);
	background: -o-linear-gradient(top, rgba(0,77,64,1) 0%, rgba(0,105,93,1) 100%);
	background: -ms-linear-gradient(top, rgba(0,77,64,1) 0%, rgba(0,105,93,1) 100%);
	background: linear-gradient(to bottom, rgba(0,77,64,1) 0%, rgba(0,105,93,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#004d40', endColorstr='#00695d', GradientType=0 );
}

#fastest-cms-editable-bar .h1, #fastest-cms-remove-editable-bar .h1{
	font-size: 20px;
	margin:0px;
	display: inline-block;
	margin:4px;
}
#fastest-cms-editable-bar .h2, #fastest-cms-remove-editable-bar .h2{
	font-size: 12px;
	margin:0px;
	padding:0px;

}

#fastest-cms-path-bar
{
	width:100%;
	background-color:#607D8B;
	padding-left:7px;
	color:#ECEFF1;
}
#fastest-cms-path-bar .path-node{
	float:left;
	padding:3px 10px;
	cursor: pointer;
	font-size: 12px;

}

.fcms_selected_element{
	border:1px solid red;
}
#fastest-cms-path-bar .path-node:hover
{
	background-color: #546E7A;
}


#fastest-cms-path-bar:after {
   content: " ";
    clear: both;
    display: table;
}

.path-node:before {
    content: ">";
    margin-right:5px;
}
.logo{
	font-family: arial;
	text-transform: uppercase;
	letter-spacing: 5px;
	font-size: 10px;
	float:left;
	padding:17px 10px;
	margin:-7px 0px -7px -7px;
	background: rgba(61,61,61,1);
	background: -moz-linear-gradient(-45deg, rgba(61,61,61,1) 0%, rgba(3,3,3,1) 100%);
	background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(61,61,61,1)), color-stop(100%, rgba(3,3,3,1)));
	background: -webkit-linear-gradient(-45deg, rgba(61,61,61,1) 0%, rgba(3,3,3,1) 100%);
	background: -o-linear-gradient(-45deg, rgba(61,61,61,1) 0%, rgba(3,3,3,1) 100%);
	background: -ms-linear-gradient(-45deg, rgba(61,61,61,1) 0%, rgba(3,3,3,1) 100%);
	background: linear-gradient(135deg, rgba(61,61,61,1) 0%, rgba(3,3,3,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3d3d3d', endColorstr='#030303', GradientType=1 );
}
.editor_bar
{
	position:fixed;
	bottom:0px;
	width:100%;
	background-color: #333333;
	color:white;
}
.editor_bar .toolbar{
	width:100%;
	padding:7px;
}.editor_bar .toolbar{
	   content: " ";
    clear: both;
    display: table;
	
}
</style>
<script>
	$(document).ready(
	function()
	{
		/* Enable Editing */
		var selected_element = "";
		fc_edtable_state = 0;
		fc_deletable_state = 0;
		fc_element_path = "";
		fc_element_path_index = "";

		$("#save_as_editable").click(function(){
				$('*[class=""]').removeAttr('class');

			node_identifier ="";
			node_name = selected_element.get(0).nodeName;
			node_id="";
			if(selected_element.attr("id")!=undefined)
			{
				node_id = selected_element.attr("id");
			}
			node_identifier = node_name + node_id;
			if(selected_element.attr('class')!=undefined)
			{
				var classList = selected_element.attr('class').split(/\s+/);
			}
			$.each(classList, function(index, item) {
				if(item!="fcms_selected_element" && item!="")
				{	
			    	node_identifier = node_identifier + "." + item;
				}
			});
			$( "*" ).removeClass("fcms_selected_element");
				$('*[class=""]').removeAttr('class');

			if(selected_element.children().length==0)
			{
				content_to_send = selected_element[0].outerHTML;
			}
			else
			{
				content_to_send = selected_element.html();
			}

			/* Event for Saving Editable into the file. */
			$.ajax({
			  method:"POST",
			  url: "fastest_cms/service_add_editable_box.php",
			  data :{content:content_to_send,
			  	page_name:"<?php echo addslashes($_SERVER["SCRIPT_FILENAME"]); ?>",
			  	path :fc_element_path
			  	}
			}).done(function() {
			  	alert("Added Editable, Page will reload");
				//location.reload();
			});


		});

		$('#new_editable').click(
			function()
			{
				$("#editor_toolbar").hide();
				$("#fastest-cms-editable-bar").show();
				$("#fastest-cms-path-bar").show();
				fc_edtable_state = 1;
			}
		);

		$('#remove_editable').click(
			function()
			{
				/* */
				$( "div[data-editable]" ).addClass("border-for-editable");
				$("#editor_toolbar").hide();
				$("#fastest-cms-remove-editable-bar").show();
				$("#fastest-cms-path-bar").hide();
				fc_deletable_state = 1;
			}
		);

		$( "div[data-editable]" ).one( "click",
			function()
			{

				if(fc_deletable_state == 0)
				{
					return;
				}
						
				alert($(this).attr("data-name"));
				$.ajax({
				  method:"POST",
				  url: "fastest_cms/service_delete_editable_box.php",
				  data :{
				  	element_to_delete :$(this).attr("data-name"),
				  	page_name:"<?php echo addslashes($_SERVER["SCRIPT_FILENAME"]); ?>"}
				}).done(function() {
				  alert("Deleted Editable, Page will reload");
				  location.reload();

				});

			}
		);



		$('#fc_cancel_editable,#fc_cancel_remove_editable').click(
			function()
			{
				$( "div[data-editable]" ).removeClass("border-for-editable");
				$("#editor_toolbar").show();
				$("#fastest-cms-editable-bar").hide();
				$("#fastest-cms-path-bar").empty();
				$("#fastest-cms-path-bar").hide();
				$("#fastest-cms-remove-editable-bar").hide();
				$( "*" ).removeClass("fcms_selected_element");
				$('*[class=""]').removeAttr('class');
				fc_edtable_state = 0;
				fc_deletable_state = 0;
			}
		);

	
		/* Helps in picking up the Areas of the Page. */

		/* Select Element and show up it into the Path Bar */
		$( "*" ).on('click',function(event){
			if(fc_edtable_state == 0)
			{
				return;
			}

			selected_element = $( event.target );
			 if (selected_element.parents(".editor_bar").length) 
			 {
				return;
			}
			/* Select the Element*/
			  event.stopPropagation();
			$( "*" ).removeClass("fcms_selected_element");
			selected_element.addClass("fcms_selected_element");
			create_path_bar(selected_element);
		})
		/* Setting up the clicks of Path */
		$(document).on('click',".path-node",function(){
			node_identifier = $(this).attr("rel");
			console.log("clicked_element"+node_identifier)
			selected_element = $(node_identifier);
			selected_element.click();

		});
		

		create_path_bar = function(element)
		{
			fc_element_path = element.getPath();
			$('#fastest-cms-path-bar').html("");

			for(i=0; i<5; i++)
			{
				node_identifier ="";
				node_name = element.get(0).nodeName;
				node_id="";
				if(element.attr("id")!=undefined)
				{
					node_id = element.attr("id");
				}
				node_identifier = node_name + node_id;
				if(element.attr('class')!=undefined)
				{
					var classList = element.attr('class').split(/\s+/);
					$.each(classList, function(index, item) {
						if(item!="fcms_selected_element" && item!="")
						{	
					    	node_identifier = node_identifier + "." + item;
						}
					});
				}
				//fc_element_path = node_identifier + fc_element_path;
				$('#fastest-cms-path-bar').prepend( "<div class='path-node' rel='"+element.getPath()+ "'>"+node_identifier+"</div>" );
				element= element.parent();
			}

		}

		

 
	});
</script>