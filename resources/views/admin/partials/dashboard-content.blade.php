<div class="dashboard-content">
    <div class="page-header">
        <h1>Dashboard Overview</h1>
        <div class="date-picker">
            <button class="date-btn active">Today</button>
            <button class="date-btn">Week</button>
            <button class="date-btn">Month</button>
            <button class="date-btn">Year</button>
            <button class="date-btn custom"><i class="fas fa-calendar"></i> Custom</button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-container">
        <div class="stat-card visitors">
            <div class="stat-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div class="stat-details">
                <h3>Total Visitors</h3>
                <div class="stat-number" data-count="24859">0</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i> 12.5% <span>vs last week</span>
                </div>
            </div>
        </div>
        <div class="stat-card clicks">
            <div class="stat-icon">
                <i class="fas fa-mouse-pointer"></i>
            </div>
            <div class="stat-details">
                <h3>App store redirects</h3>
                <div class="stat-number" data-count="8742">0</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i> 8.3% <span>vs last week</span>
                </div>
            </div>
        </div>
        <div class="stat-card subscribers">
            <div class="stat-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="stat-details">
                <h3>Subscribers</h3>
                <div class="stat-number" data-count="5621">0</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i> 5.7% <span>vs last week</span>
                </div>
            </div>
        </div>
        <div class="stat-card conversion">
            <div class="stat-icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <div class="stat-details">
                <h3>Conversion Rate</h3>
                <div class="stat-number" data-count="35">0<span>%</span></div>
                <div class="stat-change negative">
                    <i class="fas fa-arrow-down"></i> 2.1% <span>vs last week</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-container">
        <div class="chart-card visitors-chart">
            <div class="chart-header">
                <h3>Visitor Traffic</h3>
                <div class="chart-actions">
                    <button class="chart-action active">Daily</button>
                    <button class="chart-action">Weekly</button>
                    <button class="chart-action">Monthly</button>
                    <button class="chart-action"><i class="fas fa-ellipsis-v"></i></button>
                </div>
            </div>
            <div class="chart-body">
                <canvas id="visitorChart"></canvas>
            </div>
        </div>
        <div class="chart-card conversion-chart">
            <div class="chart-header">
                <h3>Conversion Funnel</h3>
                <div class="chart-actions">
                    <button class="chart-action"><i class="fas fa-ellipsis-v"></i></button>
                </div>
            </div>
            <div class="chart-body">
                <canvas id="conversionChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    {{-- <div class="activity-section">
        <div class="section-header">
            <h2>Recent Activity</h2>
            <button class="view-all">View All <i class="fas fa-arrow-right"></i></button>
        </div>
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon download">
                    <i class="fas fa-download"></i>
                </div>
                <div class="activity-details">
                    <h4>New Download</h4>
                    <p>User from San Francisco downloaded the app</p>
                    <span class="activity-time">2 minutes ago</span>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon subscribe">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="activity-details">
                    <h4>New Subscriber</h4>
                    <p>john.doe@example.com subscribed to the newsletter</p>
                    <span class="activity-time">15 minutes ago</span>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon visit">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="activity-details">
                    <h4>Page Visit</h4>
                    <p>Spike in traffic from Google search</p>
                    <span class="activity-time">45 minutes ago</span>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon download">
                    <i class="fas fa-download"></i>
                </div>
                <div class="activity-details">
                    <h4>New Download</h4>
                    <p>User from Tokyo downloaded the app</p>
                    <span class="activity-time">1 hour ago</span>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon subscribe">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="activity-details">
                    <h4>New Subscriber</h4>
                    <p>jane.smith@example.com subscribed to the newsletter</p>
                    <span class="activity-time">2 hours ago</span>
                </div>
            </div>
        </div>
    </div>--}}

    <!-- Top Referrers and Devices -->
    <div class="split-section">
        <div class="referrers-card">
            <div class="section-header">
                <h2>Top Referrers</h2>
                <button class="view-all">View All <i class="fas fa-arrow-right"></i></button>
            </div>
            <div class="referrers-list">
                <div class="referrer-item">
                    <div class="referrer-icon google">
                        <i class="fab fa-google"></i>
                    </div>
                    <div class="referrer-details">
                        <h4>Google</h4>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 65%"></div>
                        </div>
                    </div>
                    <div class="referrer-stats">
                        <span>65%</span>
                    </div>
                </div>
                <div class="referrer-item">
                    <div class="referrer-icon facebook">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <div class="referrer-details">
                        <h4>Facebook</h4>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 18%"></div>
                        </div>
                    </div>
                    <div class="referrer-stats">
                        <span>18%</span>
                    </div>
                </div>
                <div class="referrer-item">
                    <div class="referrer-icon twitter">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <div class="referrer-details">
                        <h4>Twitter</h4>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 12%"></div>
                        </div>
                    </div>
                    <div class="referrer-stats">
                        <span>12%</span>
                    </div>
                </div>
                <div class="referrer-item">
                    <div class="referrer-icon direct">
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="referrer-details">
                        <h4>Direct</h4>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 5%"></div>
                        </div>
                    </div>
                    <div class="referrer-stats">
                        <span>5%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="devices-card">
            <div class="section-header">
                <h2>Devices</h2>
                <button class="view-all">View All <i class="fas fa-arrow-right"></i></button>
            </div>
            <div class="devices-chart">
                <canvas id="devicesChart"></canvas>
            </div>
            <div class="devices-legend">
                <div class="legend-item">
                    <div class="legend-color mobile"></div>
                    <div class="legend-label">Mobile</div>
                    <div class="legend-value">68%</div>
                </div>
                <div class="legend-item">
                    <div class="legend-color desktop"></div>
                    <div class="legend-label">Desktop</div>
                    <div class="legend-value">24%</div>
                </div>
                <div class="legend-item">
                    <div class="legend-color tablet"></div>
                    <div class="legend-label">Tablet</div>
                    <div class="legend-value">8%</div>
                </div>
            </div>
        </div>
    </div> 
</div>