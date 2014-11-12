
function leapTo (link)
   {
   var new_url=link;
   if (  (new_url != "")  &&  (new_url != null)  )
      window.location=new_url;
   else
      alert("\nYou must make a selection.");
   }
function viewSource()
   {
   var current_url="";
   current_url=document.location;
   window.location="view-source:"+current_url;
   }
function WinOpen() 
   {
   alert('\nPage will load to full screen.\n\nUse View/Document Source from menu bar to view source.\n\nUse File/Save As from menu bar to save.\n\nClose new window to return to this page. ');
   window.open("radioleap1.html","DisplayWindow","menubar=yes,scrollbars=yes");
   window.open("radioleap1.html","DisplayWindow","menubar=yes,scrollbars=yes");   // double for Macs
   }
// Deactivate Cloaking -->
