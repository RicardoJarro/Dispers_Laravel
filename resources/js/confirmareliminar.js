
const confirmareliminar = new Vue({
    el: '#confirmareliminar',
    data: {
        urlaeliminar: ''
    }, 
    
    methods: {
        deseas_eliminar(id) {
            //alert(id);
            this.urlaeliminar =document.getElementById('urlbase').innerHTML+'/'+id;
            $('#modal_eliminar').modal('show');
        },
        deseas_eliminar2(id) {
            //alert(id);
            this.urlaeliminar =document.getElementById('urlbase2').innerHTML+'/'+id;
            $('#modal_eliminar').modal('show');
        }
    }

});