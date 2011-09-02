// Valida Fecha By Luciano 1998
// Uso: Simple... se debe pasar la cadena de la fecha y devuelve false si no es válida...
// El Formato es dd-mm-aaaa
// Ejemplo: if (Validar('14-08-1981')==false) { alert('Entrada Incorrecta') }
// Uso en formularios: onSubmit="return Validar(this.fecha.value)"
//
// Este script y otros muchos pueden
// descarse on-line de forma gratuita
// en El Código: www.elcodigo.com

         
function ValidaCampoVacioConFormato2( frm ) {
    var strCamposVacios="", i=0,j=0,k=0;
    var camposVacios=new Array();
    var camposLlenos=new Array();
    
    
                
    var sAux="";
    
    var strElementos="";
    
    var prop;
    
                 
    for (i=0;i<frm.elements.length;i++){
        strElementos += frm.elements[i].type+"\n";
        elemento = frm.elements[i];
        //alert(i+"-"+elemento);
        if(elemento.className=="Obligado" && elemento.style.visibility !="hidden"){
            switch(elemento.type){
                case "text":
                case "select-one":
                case "select-multiple":
                case "textarea":
                case "file":
                    if(elemento.value==""){
                        camposVacios[j]=elemento;
                        j++;
                    }
                    else{
                        camposLlenos[k]=elemento;
                        k++;
                    }
                    //alert (elemento.name+"(select-one)"+elemento.value);
                    break;
                case "radio":
                    //document.example.test.checked
                    if(elemento.checked==false){
                        // alert ("VACIO"+elemento.name+"(radio)"+elemento.value);
                        camposVacios[j]=elemento;
                        //  alert (elemento.name+"(radio)"+elemento.value+","+elemento.checked);
                        j++;
                    }
                    else{
                        camposLlenos[k]=elemento;
                        k++;
                    }
                    
                    break;
                case "checkbox":
                    //document.example.test.checked
                    if(elemento.checked==false){
                        // alert ("VACIO"+elemento.name+"(radio)"+elemento.value);
                        camposVacios[j]=elemento;
                        //  alert (elemento.name+"(radio)"+elemento.value+","+elemento.checked);
                        j++;
                    }
                    else{
                        camposLlenos[k]=elemento;
                        k++;
                    }
                    
                    break;                    
                    
            }
        }
    }
            
    for (i=0;i<camposVacios.length;i++){
        elemento=camposVacios[i];
        if(elemento.type=="checkbox")
            strCamposVacios += elemento.name+"("+elemento.value+")\n" ;
        else
            strCamposVacios += elemento.name + "\n" ;
        elemento.style.borderColor="red";
        elemento.style.borderWidth =".25em";
        elemento.style.margin='1em';
    //alert ("Vacio: "+elemento.type+" - "+elemento.value);
    }
            
            
    for (i=0;i<camposLlenos.length;i++){
        elemento=camposLlenos[i];
        elemento.style.borderColor="grey";
        elemento.style.margin='0em';
    //alert ("Lleno: "+elemento.type+" - "+elemento.value);
    }            
            
            
              

    //window.alert(strElementos);
    
    if(j>0){
        var mensaje="("+j+") - Faltan los siguientes campos obligatorios:\n"
        window.alert(mensaje+strCamposVacios);
        //window.alert(mensaje);
        return false;
    }
    else return true;

}


function getStyle(oElm, strCssRule){
    var strValue = "";
    if(document.defaultView && document.defaultView.getComputedStyle){
        strValue = document.defaultView.getComputedStyle(oElm, "").getPropertyValue(strCssRule);
    }
    else if(oElm.currentStyle){
        strCssRule = strCssRule.replace(/\-(\w)/g, function (strMatch, p1){
            return p1.toUpperCase();
        });
        strValue = oElm.currentStyle[strCssRule];
    }
    return strValue;
}