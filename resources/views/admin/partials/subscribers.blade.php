<div class="subscriber-container">
    <div class="subscriber-header">
        <h2>Subscriber Management</h2>
        <div class="subscriber-actions">
            <button class="export-btn" id="export-subscribers">
                <i class="fas fa-download"></i> Export
            </button>
        </div>
    </div>

    {{-- this is component to show the stats cards --}}
    <div class="subscriber-stats">
        <x-subscriber-stat-box icon="fas fa-users" title="Total Subscribers" :count="$totalSubscribers ?? 0" />

        <x-subscriber-stat-box icon="fas fa-user-plus" title="New Subscribers" :count="$newSubscribers ?? 0"
            subtitle="last 24 hours" />
        {{-- <x-subscriber-stat-box icon="fas fa-chart-line" title="Growth Rate" value="+12.4%"
            subtitle="vs last month" />
        <x-subscriber-stat-box icon="fas fa-envelope-open" title="Open Rate" value="68.5%" subtitle="last campaign" />
        --}}

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
                    <th>Date Subscribed <i class="fas fa-sort"></i></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscribers as $subscriber)
                    <tr class="subscriber-row">
                        <td>
                            <label class="checkbox-container">
                                <input type="checkbox" class="subscriber-checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                        <td>{{ $subscriber->email }}</td>
                        <td>{{ $subscriber->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn email-btn" title="Copy Email"
                                    onclick="copyEmailToClipboard(this, '{{ $subscriber->email }}')">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        <!-- Display showing info -->
        <div class="showing-info">
            Showing
            {{ $subscribers->firstItem() }} -
            {{ $subscribers->lastItem() }} of
            {{ $subscribers->total() }} subscribers
        </div>

        <!-- Pagination controls -->
        <div class="pagination">
            <!-- Previous page button -->
            <button class="page-btn prev" @if (!$subscribers->previousPageUrl()) disabled @endif>
                <i class="fas fa-chevron-left"></i>
            </button>

            <!-- Page number buttons -->
            @foreach ($subscribers->getUrlRange(1, $subscribers->lastPage()) as $page => $url)
                <button class="page-btn {{ $page == $subscribers->currentPage() ? 'active' : '' }}" data-page="{{ $page }}">
                    {{ $page }}
                </button>
            @endforeach

            <!-- Next page button -->
            <button class="page-btn next" @if (!$subscribers->nextPageUrl()) disabled @endif>
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    {{-- <div class="export-modal" id="export-modal">
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
    </div> --}}
</div>