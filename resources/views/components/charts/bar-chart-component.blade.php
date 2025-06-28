<div class="container my-4">

    <h4>عدد المدن لكل دولة</h4>
    <canvas id="cityChart" width="600" height="200"></canvas>

    <h4 class="mt-5">عدد السكان لكل دولة</h4>
    <canvas id="populationChart" width="600" height="200"></canvas>

    <h4 class="mt-5">عدد المناطق لكل دولة</h4>
    <canvas id="areaChart" width="600" height="200"></canvas>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = ['مصر', 'السعودية', 'الإمارات', 'المغرب', 'الأردن'];

    const cityCounts = [12, 10, 8, 9, 6];
    const population = [100000000, 34000000, 9500000, 37000000, 11000000];
    const areaCounts = [6, 7, 5, 8, 4];

    // 1️⃣ المدن
    new Chart(document.getElementById('cityChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'عدد المدن',
                data: cityCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.6)'
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    // 2️⃣ السكان
    new Chart(document.getElementById('populationChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'عدد السكان',
                data: population,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    // 3️⃣ المناطق
    new Chart(document.getElementById('areaChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'عدد المناطق',
                data: areaCounts,
                backgroundColor: 'rgba(153, 102, 255, 0.6)'
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });
</script>
