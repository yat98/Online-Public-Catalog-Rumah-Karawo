function createChart(selector, labels, data) {
    let chartColor = "#FFFFFF";

    let ctx = selector;

    console.log(ctx);


    let myChart = new Chart(ctx, {
        type: 'line',

        data: {
            labels: labels,
            datasets: [{
                borderColor: "#6bd098",
                backgroundColor: "#6bd098",
                pointRadius: 0,
                pointHoverRadius: 0,
                borderWidth: 3,
                data: data
            }, ]
        },
        options: {
            legend: {
                display: false
            },

            tooltips: {
                enabled: false
            },

            scales: {
                yAxes: [{

                    ticks: {
                        fontColor: "#9f9f9f",
                        beginAtZero: false,
                        maxTicksLimit: 5,
                        fontSize: 16,
                        //padding: 20
                    },
                    gridLines: {
                        drawBorder: false,
                        zeroLineColor: "#ccc",
                        color: 'rgba(255,255,255,0.05)'
                    }

                }],

                xAxes: [{
                    barPercentage: 1.6,
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(255,255,255,0.1)',
                        zeroLineColor: "transparent",
                        display: false,
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9f9f9f",
                        // fontSize: 16,
                    }
                }]
            },
        }
    });
}

function deleteAlert(title, urlIndex) {
    $('body').on('click', '.delete-button', function (e) {
        e.preventDefault();
        let url = $(this).parent().attr('action');
        let token = $(this).prev().attr('value');

        Swal.fire({
            title: title,
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Hapus",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        '_method': 'DELETE',
                        '_token': token
                    },
                    success: function (response) {
                        $('.content').empty();
                        $.ajax({
                            url: urlIndex,
                            dataType: 'html',
                            success: function (response) {
                                $('.content').append(response);
                            }
                        });
                        Swal.fire({
                            type: 'success',
                            title: 'Berhasil',
                            text: 'Data berhasil di hapus!'
                        });
                    },
                    error: function (response) {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Data gagal di hapus!'
                        });
                    }
                });
            }
        });
    });
}
