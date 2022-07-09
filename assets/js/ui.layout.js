$(document).ready(function(){
  
  var myLayout;
  
  myLayout = $('body').layout({ 
		//applyDefaultStyles: true,
			closable:				true	// pane can open & close
		,	stateManagement__enabled:	true
		,	resizable:				false	// when open, pane can be resized 
		,	slidable:				false	// when closed, pane can 'slide' open over other 
		,	north__spacing_closed:	0		// big resizer-bar when open (zero height)
		,	north__spacing_open:	0		// big resizer-bar when open (zero height)
		,	south__spacing_open:	0		// no resizer-bar when open (zero height)
		,	south__spacing_closed:	0		// big resizer-bar when open (zero height)
		,	east__spacing_open:	0		// big resizer-bar when open (zero height)  
		,	east__spacing_closed:	0		// big resizer-bar when open (zero height)
		,	west__spacing_open:	6		// big resizer-bar when open (zero height)  
		,	west__spacing_closed:	6	// big resizer-bar when open (zero height)
		, west__initClosed: false
		, south__initClosed: false
		, center__onresize: "innerLayout.resizeAll"
  });
 
  // myLayout.addToggleBtn('#west-toggler', 'west');
  
  $_maincontentHeight = $('#wrapper').height();
  innerLayout = $('#contentpane').css({'height':$_maincontentHeight-29}).layout({ 
            closable:				true	
		,	resizable:				false	
		,	slidable:				true	
		,	north__spacing_closed:	6		
		,	north__spacing_open:	6		
		,	south__spacing_open:	6		
		,	south__spacing_closed:	6		
  });
  
  leftSidebar = $('#left-sidebar').layout({ 
            closable:				false	
		,	resizable:				false	
		,	slidable:				false	
		,	north__spacing_closed:	0		
		,	north__spacing_open:	0		
		,	south__spacing_open:	0		
		,	south__spacing_closed:	0		
  });
 });