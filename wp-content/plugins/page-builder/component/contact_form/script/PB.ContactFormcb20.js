/******************************************************************************/
/******************************************************************************/

;(function($,doc,win) 
{
	"use strict";
	
	var PBContactForm=function(object,option)
	{
		/**********************************************************************/
		
		var $this=$(object);
		var $option=option;

		/**********************************************************************/

		this.build=function() 
		{	
			var self=this;
			
			$.fn.qtip.zindex=10;
			
			$this.find('.pb-infield-label').inFieldLabels();
			
			$this.submit(function() 
			{
				self.block('block');
				
				var data=$this.serialize()+'&action=page_builder_contact_form_submit&id='+$this.attr('id');
				jQuery.post($option.url,data,function(response) 
				{
					self.handleResponse(response);
					self.block('unblock');
					
					return(false);
				
				},'json');

				return(false);
			});
		};
		
		/**********************************************************************/
		
		this.handleResponse=function(response)
		{
			$this.find('.qtip').remove();
			
			for(var i in response.field)
			{
				$('#'+i).parent('.pb-contact-form-field').qtip(
				{
					style			:      
					{ 
						classes		:	'pb-qtip pb-qtip-error'					
					},
					content: 	
					{ 
						text		:	response.field[i].notice				
					},
					position		: 	
					{ 
						my			:	'bottom right',
						at			:	'top right',
						container	:	$this
					}
				}).qtip('show');			
			}
			
			$this.find('input[type="submit"]:last').parent('.pb-contact-form-field').qtip(
			{
				style			:      
				{ 
					classes		:	(parseInt(response.error)===1 ? 'pb-qtip pb-qtip-error' : 'pb-qtip pb-qtip-success')
				},
				content: 	
				{ 
					text		:	(parseInt(response.error)===1 ? response.notice.error : response.notice.success)
				},
				position		: 	
				{ 
					my			:	'bottom right',
					at			:	'top right',
					container	:	$this
				}
			}).qtip('show');	
			
			if(parseInt(response.reset)===1)
			{
				if(parseInt(response.error)!==1)
				{
					$this.find('input[type="text"],textarea').val('').blur();
					window.setTimeout(function() 
					{
						$this.find('li').qtip('destroy'); 
					},2000);
				}
			}
		};
		
		/**********************************************************************/
		
		this.block=function(action)
		{
			if(action==='block') $this.find('.pb-contact-form-field').block({message:false,overlayCSS:{opacity:'0.3'}});
			else $this.find('.pb-contact-form-field').unblock();	
		};

		/**********************************************************************/
	};
	
	/**************************************************************************/
	
	$.fn.PBContactForm=function(option) 
	{
		var object=new PBContactForm(this,option);
		object.build();
	};
	
	/**************************************************************************/

})(jQuery,document,window);

/******************************************************************************/
/******************************************************************************/