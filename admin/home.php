<h1 class="mb-3">Tour Dashboard</h1>
<hr>

<div class="container mb-4">
  <div class="row">
    <!-- Stat Cards -->
    <div class="col-md-3 mb-3">
      <div class="card shadow border-left-primary">
        <div class="card-body">
          <h6 class="text-muted">Total Tours</h6>
          <h3 class="text-primary">25</h3> <!-- Replace with dynamic PHP count -->
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card shadow border-left-success">
        <div class="card-body">
          <h6 class="text-muted">Total Bookings</h6>
          <h3 class="text-success">120</h3> <!-- Replace with dynamic PHP count -->
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card shadow border-left-warning">
        <div class="card-body">
          <h6 class="text-muted">Visitors This Month</h6>
          <h3 class="text-warning">1,240</h3> <!-- Replace with dynamic PHP count -->
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="card shadow border-left-danger">
        <div class="card-body">
          <h6 class="text-muted">Revenue</h6>
          <h3 class="text-danger">₱45,000</h3> <!-- Replace with dynamic PHP amount -->
        </div>
      </div>
    </div>
  </div>

  <!-- Chart Section -->
  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="card shadow">
        <div class="card-header bg-light">
          <strong>Tour Category Distribution</strong>
        </div>
        <div class="card-body">
          <canvas id="tourChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card shadow">
        <div class="card-header bg-light">
          <strong>Monthly Bookings</strong>
        </div>
        <div class="card-body">
          <canvas id="bookingChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card shadow">
        <div class="card-header bg-light">
          <strong>Monthly Bookings</strong>
        </div>
        <div class="card-body">
          <canvas id="bookingChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart Setup -->
<script>
  const tourChart = new Chart(document.getElementById('tourChart'), {
    type: 'bar',
    data: {
      labels: ['Beach', 'Mountain', 'Falls', 'Cultural', 'Other'],
      datasets: [{
        label: 'Tours',
        data: [8, 5, 4, 3, 5], // Replace with PHP dynamic values
        backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d']
      }]
    },
    options: {
      responsive: true,
      plugins: {
        title: { display: false }
      }
    }
  });

  const bookingChart = new Chart(document.getElementById('bookingChart'), {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
      datasets: [{
        label: 'Bookings',
        data: [25, 40, 35, 60, 75], // Replace with PHP dynamic values
        fill: true,
        borderColor: '#17a2b8',
        backgroundColor: 'rgba(23, 162, 184, 0.2)',
        tension: 0.3
      }]
    },
    options: {
      responsive: true,
      plugins: {
        title: { display: false }
      }
    }
  });
</script>
