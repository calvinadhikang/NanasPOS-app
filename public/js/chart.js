$('#grafik-menu').html('asede')

$(document).ready(function () {
    $('#btnLaporan').click(function() {
        createLaporanGrafik();
    })
})

async function createLaporanGrafik() {
    let dateStart = $('#date-start').val();
    let dateEnd = $('#date-end').val();

    if (dateStart != '' && dateEnd != '') {
        let request = await fetch('api/transaksi/laporan', {
            method: 'POST',
            body: JSON.stringify({
                'name': 'calvin',
                'dateStart': dateStart,
                'dateEnd': dateEnd,
            })
        })
        let response = await request.json();
        console.log(response);

        const ctx = document.getElementById('grafik-menu');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: response.menu,
                datasets: [{
                    label: 'Jumlah Pembelian',
                    data: response.count_menu,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
}
