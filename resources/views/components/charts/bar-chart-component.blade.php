<div>
    <canvas id="myChart" width="600" height="200"></canvas>
    <script>
        fetch('{{ route('chart') }}')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.country);
                const values = data.map(item => item.city_count);

                const ctx = document.getElementById('myChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',

                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'عدد المدن لكل دولة',
                            data: values,
                            borderRadius : 1000,
                            hoverBackgroundColor : 'rgba(60, 100, 51)',
                            hoverBorderColor : 'rgba(255, 255, 255)',
                            backgroundColor: 'rgba(75, 150, 255, 0.6)'
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
</div>
