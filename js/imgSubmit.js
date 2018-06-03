
document.addEventListener("DOMContentLoaded", ()=>{
  var form = document.getElementById('formSubir');
  
  form.addEventListener('submit',function(event){
    event.preventDefault();
    subir_archivos(this);
  })
})


function subir_archivos(form){
  var barra_estado = form.children[1].children[0],
      span = barra_estado.children[0],
      cancelar = form.children[2].children[1];
  
  barra_estado.classList.remove('barra_verde','barra_roja');

  var peticion = new XMLHttpRequest();

  peticion.upload.addEventListener('progress', (event)=>{
    var porcentaje = Math.round((event.loaded/event.total)*100);

    console.log(porcentaje);

    barra_estado.style.width = porcentaje+'%';
    span.innerHTML = porcentaje+"%";
  });

  peticion.addEventListener('load', ()=> {
    barra_estado.classList.add('barra_verde');
    span.innerHTML = "proceso completado";
  })

  peticion.open('post','../archivos/upload.php');
  peticion.send(new FormData(form));
  console.log('vamos aqui');
  

  cancelar.addEventListener('click',()=>{
    peticion.abort();
    barra_estado.classList.remove('barra_verde');
    barra_estado.classList.add('barra_roja');
    span.innerHTML = "proceso cancelado";
    
  })

}