var idleTime = 0; 
var standby = false; 
function CheckInactivity() 
{ idleTime += 10; if(idleTime > 60) { InitializeStandBy(); } }

function InitializeStandBy() 
{ if(!standby) { var h = 0; h = jQuery(window).height(); jQuery("#energysaving").show().css({ height: "0", width: "0", left: "50%", top: "50%" }).animate({ width: "100%", height: h, left: "0", top: "0", opacity: "1" }, 1000); standby = true; } }

function StopStandBy() 
{ if(standby) { jQuery("#energysaving").animate({ width: "0", height: "0", opacity: "0", left: "50%", top: "50%" }, 500); setTimeout('jQuery("#energysaving").hide();', 800); standby = false; } }

if(typeof(jQuery) == "undefined") 
{ document.write('<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>'); } 

function InitJQuery() 
{ if(typeof(jQuery) == "undefined") { setTimeout("InitJQuery();", 50); } else { jQuery(function() { jQuery(document).ready(function() { setInterval("CheckInactivity();", 10000); jQuery(this).mousemove(function(e) { idleTime = 0; StopStandBy(); }); jQuery(document).keypress(function(e) { idleTime = 0; StopStandBy(); }); jQuery("body").append('<div id="energysaving" style="z-index: 9999999;"><p>Hey, I think you were busy somewhere, so i thought i should take a nap<br /><span>You should move your mouse to wake me up.</span></p></div>'); jQuery("#energysaving").hide(); }); }); } }

InitJQuery();