getdata = new XMLHttpRequest();
    getdata.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            final = jQuery.parseJSON(this.responseText);
            fdata = [];
            for(i=0;i<final[2].length;i++){
                obj = new Object();
                
                obj.period = final[2][i];
                jQuery.each( final[3][i], function( i, val ) {
                    obj[final[1][val]] = final[0][val];
                });
                
                fdata.push(obj);
            }
            console.log(fdata);
            Morris.Bar({
                element: 'morris-bar-chart',
                data: fdata,
                xkey: 'period',
                ykeys: ['Book', 'Pepsi', 'Pendrive'],
                labels: ['Book', 'Pepsi', 'Pendrive'],
               
                hideHover: 'auto',
                resize: true
            })
        
        }
      }
getdata.open("POST", "../pages/getdata.php" );
getdata.send();
    

     
     
    