<div class="subscriber-container">
    <div class="subscriber-header">
        <h2>Subscriber Management</h2>
        <div class="subscriber-actions">
            <div class="search-wrapper">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search subscribers..." id="subscriber-search">
            </div>
            <div class="filter-dropdown">
                <button class="filter-btn">
                    <i class="fas fa-filter"></i> Filter
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="filter-menu">
                    <label><input type="checkbox" checked> Active</label>
                    <label><input type="checkbox" checked> Inactive</label>
                    <label><input type="checkbox" checked> New (Last 7 days)</label>
                </div>
            </div>
            <button class="export-btn" id="export-subscribers">
                <i class="fas fa-download"></i> Export
            </button>
        </div>
    </div>

    <div class="subscriber-stats">
        <div class="stat-box">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3>Total Subscribers</h3>
                <div class="stat-value" data-count="5621">0</div>
            </div>
        </div>
        <div class="stat-box">
            <div class="stat-icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-info">
                <h3>Growth Rate</h3>
                <div class="stat-value">+12.4%</div>
                <div class="stat-period">vs last month</div>
            </div>
        </div>
        <div class="stat-box">
            <div class="stat-icon">
                <i class="fas fa-envelope-open"></i>
            </div>
            <div class="stat-info">
                <h3>Open Rate</h3>
                <div class="stat-value">68.5%</div>
                <div class="stat-period">last campaign</div>
            </div>
        </div>
        <div class="stat-box">
            <div class="stat-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="stat-info">
                <h3>New Subscribers</h3>
                <div class="stat-value" data-count="247">0</div>
                <div class="stat-period">last 7 days</div>
            </div>
        </div>
    </div>

    <div class="subscriber-table-wrapper">
        <table class="subscriber-table" id="subscriber-table">
            <thead>
                <tr>
                    <th>
                        <label class="checkbox-container">
                            <input type="checkbox" id="select-all">
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <th>Email <i class="fas fa-sort"></i></th>
                    <th>Name <i class="fas fa-sort"></i></th>
                    <th>Date Subscribed <i class="fas fa-sort"></i></th>
                    <th>Status <i class="fas fa-sort"></i></th>
                    <th>Source <i class="fas fa-sort"></i></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="subscriber-row">
                    <td>
                        <label class="checkbox-container">
                            <input type="checkbox" class="subscriber-checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>john.doe@example.com</td>
                    <td>John Doe</td>
                    <td>Apr 15, 2023</td>
                    <td><span class="status-badge active">Active</span></td>
                    <td>Landing Page</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="action-btn email-btn" title="Send Email"><i class="fas fa-envelope"></i></button>
                            <button class="action-btn delete-btn" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>
                <tr class="subscriber-row">
                    <td>
                        <label class="checkbox-container">
                            <input type="checkbox" class="subscriber-checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>jane.smith@example.com</td>
                    <td>Jane Smith</td>
                    <td>Apr 18, 2023</td>
                    <td><span class="status-badge active">Active</span></td>
                    <td>App Download</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-btn edit-btn" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="action-btn email-btn" title="Send Email"><i class="fas fa-envelope"></i></button>
                            <button class="action-btn delete-btn" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        <div class="showing-info">Showing 1-5 of 5,621 subscribers</div>
        <div class="pagination">
            <button class="page-btn prev" disabled><i class="fas fa-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <span class="page-ellipsis">...</span>
            <button class="page-btn">563</button>
            <button class="page-btn next"><i class="fas fa-chevron-right"></i></button>
        </div>
        <div class="per-page">
            <label>
                Show
                <select class="per-page-select">
                    <option>10</option>
                    <option selected>20</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                per page
            </label>
        </div>
    </div>

    <div class="export-modal" id="export-modal">
        <div class="export-modal-content">
            <div class="export-modal-header">
                <h3>Export Subscribers</h3>
                <button class="close-modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="export-modal-body">
                <div class="export-options">
                    <h4>Export Format</h4>
                    <div class="export-format-options">
                        <label class="export-format">
                            <input type="radio" name="export-format" value="csv" checked>
                            <div class="format-icon"><i class="fas fa-file-csv"></i></div>
                            <div class="format-info">
                                <span class="format-name">CSV</span>
                                <span class="format-desc">Comma-separated values</span>
                            </div>
                        </label>
                        <label class="export-format">
                            <input type="radio" name="export-format" value="xlsx">
                            <div class="format-icon"><i class="fas fa-file-excel"></i></div>
                            <div class="format-info">
                                <span class="format-name">Excel</span>
                                <span class="format-desc">Microsoft Excel spreadsheet</span>
                            </div>
                        </label>
                        <label class="export-format">
                            <input type="radio" name="export-format" value="json">
                            <div class="format-icon"><i class="fas fa-file-code"></i></div>
                            <div class="format-info">
                                <span class="format-name">JSON</span>
                                <span class="format-desc">JavaScript Object Notation</span>
                            </div>
                        </label>
                    </div>
                    
                    <h4>Select Fields</h4>
                    <div class="export-fields">
                        <label><input type="checkbox" checked> Email</label>
                        <label><input type="checkbox" checked> Name</label>
                        <label><input type="checkbox" checked> Date Subscribed</label>
                        <label><input type="checkbox" checked> Status</label>
                        <label><input type="checkbox" checked> Source</label>
                        <label><input type="checkbox"> Last Activity</label>
                        <label><input type="checkbox"> Open Rate</label>
                        <label><input type="checkbox"> Click Rate</label>
                    </div>
                    
                    <h4>Export Range</h4>
                    <div class="export-range">
                        <label class="radio-label">
                            <input type="radio" name="export-range" value="all" checked>
                            All subscribers
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="export-range" value="filtered">
                            Filtered subscribers only
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="export-range" value="selected">
                            Selected subscribers only
                        </label>
                    </div>
                </div>
            </div>
            <div class="export-modal-footer">
                <button class="cancel-export">Cancel</button>
                <button class="confirm-export">Export <i class="fas fa-download"></i></button>
            </div>
        </div>
    </div>
</div>