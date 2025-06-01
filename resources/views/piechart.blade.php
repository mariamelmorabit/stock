@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Répartition des Produits par Catégorie (Pie Chart)</h2>

    <canvas id="pieChart" width="400" height="400"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Nombre de Produits',
                data: {!! json_encode($data) !!},
                backgroundColor: [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                    '#FF9F40', '#FFCD56', '#4BC0C0', '#36A2EB', '#FF6384'
                ],
                hoverOffset: 30
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
