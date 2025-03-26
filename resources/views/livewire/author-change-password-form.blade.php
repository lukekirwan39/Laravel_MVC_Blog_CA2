<div>
    <form method="post" wire:submit.prevent="changePassword()" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Current Password</label>
                    <input type="password" placeholder="Current password" class="form-input" wire:model="current_password">
                    <span class="text-danger">@error('current_password'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" placeholder="New password" class="form-input" wire:model="new_password">
                    <span class="text-danger">@error('new_password'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" placeholder="Retype new password" class="form-input" wire:model="confirm_new_password">
                    <span class="text-danger">@error('confirm_new_password'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Change password</button>
    </form>
</div>
