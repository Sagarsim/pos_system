getdata = new XMLHttpRequest();
    getdata.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            final = jQuery.parseJSON(this.responseText);
            fdata = [];
            allitems = [];
            for(i=0;i<final[2].length;i++){
                obj = new Object();
                
                obj.period = final[2][i];
                jQuery.each( final[3][i], function( i, val ) {
                    obj[final[1][val]] = final[0][val];
                });
                
                fdata.push(obj);
            }
            for(i=0;i<final[4].length;i++){
                allitems.push(final[4][i]);
            }
            
            Morris.Bar({
                element: 'morris-bar-chart',
                data: fdata,
                xkey: 'period',
                ykeys: allitems,
                labels: allitems,
               hideHover: 'auto',
                resize: true
            })
        
        }
      }
getdata.open("POST", "../pages/getdata.php" );
getdata.send();
    

     
     
    