
const frmBusca = document.getElementById('frmBusca');
if (frmBusca != null || typeof frmBusca != 'undefined') {

    frmBusca.addEventListener('submit', (event) => {
        let txtBusca = document.getElementById('txtTermoBusca');

        if (typeof txtBusca == 'undefined') {
            event.preventDefault();
            return;
        }

        if (txtBusca.value.length <= 2) {
            alert('Informe um termo para buscar!');
            event.preventDefault();
        }

        let action = frmBusca.action + "&termo=" + txtBusca.value;

        location.href = action;
        event.preventDefault();
    });
}