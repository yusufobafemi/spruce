<div class="app-links-container">
    <h3 class="section-title">App Download Links</h3>
    <form id="app-links-form">
        @csrf
        <div class="input-group">
            <label for="apple-store-link">
                <i class="fab fa-apple"></i> Apple App Store Link
            </label>
            <div class="input-wrapper">
                <input type="url" name="apple_link" id="apple-store-link" value="{{ $appleLink }}" required>
                <button class="copy-btn" data-target="apple-store-link"><i class="fas fa-copy"></i></button>
            </div>
        </div>

        <div class="input-group">
            <label for="google-play-link">
                <i class="fab fa-google-play"></i> Google Play Store Link
            </label>
            <div class="input-wrapper">
                <input type="url" name="google_link" id="google-play-link" value="{{ $googleLink }}" required>
                <button class="copy-btn" data-target="google-play-link"><i class="fas fa-copy"></i></button>
            </div>
        </div>

        <div class="app-links-actions">
            <button type="submit" class="save-links-btn">
                <i class="fas fa-save"></i> Save Changes
            </button>
            <span id="saving-status" style="display: none;">
                <i class="fas fa-spinner fa-spin"></i> Saving...
            </span>
        </div>
    </form>
</div>
<script>
    window.routes = {
        saveAppLinks: "{{ route('admin.save-app-links') }}",
        getDashboardStats: '{{ route("admin.get-dashboard-stats") }}'
    };
</script>