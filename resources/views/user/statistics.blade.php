{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> --}}

@extends('layouts.baseuser')
@section('title', 'Statistiche')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.min.js"></script>


<script>
const orders ={!! $orders !!};
console.log(orders);

// amount
// created_at

let result = {
    "01": {
        totalOrders: 0,
        money: 0,
        monthName: "Gennaio",
    },

    "02": {
        totalOrders: 0,
        money: 0,
        monthName: "Febbraio",
    },

    "03": {
        totalOrders: 0,
        money: 0,
        monthName: "Marzo",
    },

    "04": {
        totalOrders: 0,
        money: 0,
        monthName: "Aprile",
    },

}

    orders.forEach(order => {
        result[order.created_at.slice(5,7)].totalOrders += 1;
        result[order.created_at.slice(5,7)].money += order.amount;
    });

    console.log(result)

    const orderValues = []; // restaurant's order, from the api
    const moneyValues = []; // restaurant's money gained, from the api
    const monthValues = []; // months

    for (let key in result) {
        // console.log(key)
        orderValues.push(result[key].totalOrders);
        moneyValues.push(result[key].money);
        monthValues.push(result[key].monthName);
    }



    // console.table("orders", orderValues, "money", moneyValues, "months", monthValues);
    // console.table(result);


</script>

<section class="section stats wrapper">
    <div class="section-title-container">
        <h1 class="section-title">Statistiche</h1>
    </div>

    <div class="stats-year">Anno 2021</div>

    <div class="chart-container">
        <canvas id="myChart" width="100" height="75"></canvas>
    </div>

</section>


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line', // set the kind of chart
    data: {
        labels: [...monthValues],
        datasets: [
          // first graph
          {
            label: 'Numero ordini', // legend
            data: [...orderValues], // the y value adapt automatically to contain all the values in the array
            fill: false, // fil color under the graph
            backgroundColor: 'hsla(181, 53%, 45%, 0.7)', // color of the graph under the line
            borderColor: 'hsla(181, 53%, 45%, 0.7)', // graph line color
            // pointBackgroundColor: 'hsl(0, 1%, 21%)', // color of the graph line nodes
            borderWidth: 1.5, // width of the graph line
            tension: 0.1, // roundness of the graph line
        },
          // second graph
        {
            label: 'Totale incasso', // legend
            data: [...moneyValues],
            fill: false,
            backgroundColor: 'orange', // color of the graph under the line
            borderColor: 'orange',
            // pointBackgroundColor: 'hsl(0, 1%, 21%)',
            borderWidth: 1.5,
            tension: 0.1,
        }

                  ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return '€ ' + value;
                    },
                    // autoSkip: false,
                    // maxRotation: 90,
                    // minRotation: 45
                },
                // title: {
                //     display: true,
                //     text: 'Month',
                //     color: '#911',
                //     font: {
                //         family: 'Comic Sans MS',
                //         size: 20,
                //         weight: 'bold',
                //         lineHeight: 1.2,
                //     },
                //     padding: {top: 20, left: 0, right: 0, bottom: 0}
                // }
            },
            x: {
                beginAtZero: true,
                ticks: {
                    maxRotation: 90,
                    minRotation: 45
                },
            }

        }
    }
});
</script>

@endsection
