{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> --}}

@extends('layouts.base')
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
    },

    "02": {
        totalOrders: 0,
        money: 0,
    },

    "03": {
        totalOrders: 0,
        money: 0,
    },

    "04": {
        totalOrders: 0,
        money: 0,
    },

    "05": {
        totalOrders: 0,
        money: 0,
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
        monthValues.push(key);
    }



    // console.table("orders", orderValues, "money", moneyValues, "months", monthValues);
    // console.table(result);


</script>



<canvas id="myChart" width="400" height="400"></canvas>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line', // set the kind of chart
    data: {
        labels: [...monthValues],
        datasets: [
          // first graph
          {
            label: 'orders', // legend
            data: [...orderValues], // the y value adapt automatically to contain all the values in the array
            fill: true, // fil color under the graph
            backgroundColor: 'rgba(0, 255, 0, 0.5)', // color of the graph under the line
            borderColor: 'rgba(255, 99, 132, 1)', // graph line color
            pointBackgroundColor: 'blue', // color of the graph line nodes
            borderWidth: 1, // width of the graph line
            tension: 0.1, // roundness of the graph line
        },
          // second graph
        {
            label: 'money', // legend
            data: [...moneyValues],
            fill: false,
            borderColor: 'rgba(0, 0, 255, 1)',
            pointBackgroundColor: 'blue',
            borderWidth: 1,
            tension: 0.1,
        }

                  ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endsection
