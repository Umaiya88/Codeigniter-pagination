<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Datatable</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link href="<?php echo base_url() ?>assets/jqwidgets/styles/jqx.base.css" type="text/css" rel="stylesheet"/>
        <link href="<?php echo base_url() ?>assets/jqwidgets/styles/jqx.bootstrap.css" type="text/css" rel="stylesheet"/>
        <script src="<?php echo base_url() ?>assets/scripts/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxcore.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxbuttons.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxscrollbar.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxmenu.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxgrid.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxgrid.selection.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxgrid.filter.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxgrid.sort.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxdata.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxlistbox.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxgrid.pager.js"></script>
        <script src="<?php echo base_url() ?>assets/jqwidgets/jqxdropdownlist.js"></script>
        
        
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 center">
                    <div class="row clear-fix">
                        <div class="col-md-12">
                            <blockquote style="background: #333; color: #fff">
                                <h2> Sorting, filtering, pagination in gridview using php codeigniter</h2>
                                <a href="https://www.facebook.com/webrocom.learn?ref=hl">by Umaiya Asma</a>
                            </blockquote>
                            <style>
                        #response{display: none}
                        div #fb, div #gp, div #tw{display: inline-block;}
                        #fb{width: 180px;}
                        #gp{width:  100px;}
                        #tw{width: 180px;}
                    </style>
                    <div id="fb">
                        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fwebrocom.learn&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21&amp;appId=1464599523806855" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
                    </div>
                    <div id="tw">
                        <a href="https://twitter.com/webrocom" class="twitter-follow-button" data-show-count="false" data-size="medium">Follow @webrocom</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </div>
                    <div id="gp">
                        <!-- Place this tag in your head or just before your close body tag. -->
                       <script src="https://apis.google.com/js/platform.js" async defer></script>
                       <!-- Place this tag where you want the +1 button to render. -->
                       <div class="g-plusone" data-href="https://plus.google.com/+WebrocomNetwebrocom/about"></div>
                   </div>
                            
                        </div>        
                    </div>
                    <div id="jqxgrid"></div>
                </div>
                </div>
            
            <div class="row">
                <div class="col-md-12">
                    <a href="#"><h3>Back to tutorial</h3></a>
                </div>
            </div>
            </div>
        
        
    </body>
    
    <script>
    $(document).ready(function () {
		// prepare the data
		
      
		var source =
		{
			datatype: "json",
			datafields: [
			{ name: 'country_code', type: 'string'},
			{ name: 'country_name', type: 'string' }
			
		],
		cache: false,
		url: '<?php echo base_url() ?>index.php/welcome/jqxdatatableAjax',
		filter: function()
		{
			// update the grid and send a request to the server.
			$("#jqxgrid").jqxGrid('updatebounddata', 'filter');
		},
		sort: function()
		{
			// update the grid and send a request to the server.
			$("#jqxgrid").jqxGrid('updatebounddata', 'sort');
		},
		root: 'Rows',
		beforeprocessing: function(data)
		{		
			if (data != null)
			{
				source.totalrecords = data[0].TotalRows;					
			}
		}
		};		
		var dataadapter = new $.jqx.dataAdapter(source, {
			loadError: function(xhr, status, error)
			{
				alert(error);
			}
		}
		);
	
		// initialize jqxGrid
		$("#jqxgrid").jqxGrid(
		{		
			source: dataadapter,
			
			filterable: true,
			sortable: true,
			autoheight: true,
			pageable: true,
			virtualmode: true,
			rendergridrows: function(obj)
			{
				return obj.data;    
			},
			columns: [
				{ text: 'Country code', datafield: 'country_code', width: 300 },
				{ text: 'Country Name', datafield: 'country_name', width: 300 }
		
			]
		});
	});
    </script>
</html>
