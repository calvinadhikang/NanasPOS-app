$('#grafik-menu').html('asede')

$(document).ready(function () {
    $('#btnLaporan').click(function() {
        createLaporanGrafik();
    })
})

async function createLaporanGrafik(){
    let dateStart = $('#date-start').val();
    let dateEnd = $('#date-start').val();

    if (dateStart != '' && dateEnd != '') {
        let request = await fetch('api/transaksi/laporan', {
            method: 'POST',
            body: JSON.stringify({
                'name': 'calvin',
                'date-start': dateStart,
                'date-end': dateEnd,
            })
        })
        let response = await request.text();
        console.log(response);
    }
}
