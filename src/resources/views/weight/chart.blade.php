 <!-- Column 2: Weight Chart -->
    <div class="w3-col l8 m6 w3-margin-bottom">
        <div class="w3-white w3-card-4 w3-round-xlarge w3-padding-large">
            <h3 style="font-weight: 500;">Your Progress</h3>
            <div class="w3-padding-16">
                <!-- The chart will be rendered inside this canvas -->
                <canvas id="weightChart" style="width:100%; max-height:400px;"></canvas>
            </div>
        </div>
    </div>



    <!-- Load Chart.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart.js Setup Script -->
<script>
    // Get the log data from our controller (passed as a Blade variable)
    const logData = @json($logs);

    // Format the data for Chart.js
    const labels = logData.map(log => {
        // Format date as "Oct 22"
        const date = new Date(log.log_date);
        return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', timeZone: 'UTC' });
    });

    const dataPoints = logData.map(log => log.weight_kg);

    // Chart Configuration
    const config = {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Weight (kg)',
                data: dataPoints,
                fill: false,
                borderColor: '#007aff', // Apple blue
                backgroundColor: '#007aff',
                tension: 0.1, // Makes the line slightly curved
                pointRadius: 4,
                pointBackgroundColor: '#007aff',
                pointBorderWidth: 0,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false // Hide the legend for a cleaner look
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    titleFont: { weight: 'bold' },
                    bodyFont: { size: 14 },
                    displayColors: false, // Don't show the little color box
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false // Hide X-axis grid lines
                    },
                    ticks: {
                        font: { family: "'Inter', sans-serif" }
                    }
                },
                y: {
                    grid: {
                        color: '#e5e5e5', // Light gray grid lines
                        borderDash: [2, 4], // Make grid lines dotted
                    },
                    ticks: {
                        font: { family: "'Inter', sans-serif" }
                    }
                }
            }
        }
    };

    // Render the chart
    const ctx = document.getElementById('weightChart').getContext('2d');
    new Chart(ctx, config);
</script>


