function valido(){
    let año = document.getElementsByName('año');
    let puntaje = document.getElementsByName('puntaje');
    let genero = document.getElementsByName('genero');
    let duracion = document.getElementsByName('duracion');
    let descripcion = document.getElementsByName('descripcion');


    if( año && puntaje && genero && duracion && descripcion  ){
    
        if(puntaje > 10 || puntaje < 0 ){
            alert('El puntaje debe estar entre los rangos 10 y 0');
            return;
        }if(año > 2020){
            alert('Ponga un año valido');
            return;
        }
        if(!isNaN(genero) ){
            alert('El genero no debe contener numeros');
            return;
        }
        if(descripcion.length > 255){
            alert('La descripcion no puede sobrepasar los 255 caracteres');
            return;
        }
    }else{
        return;
    }
}