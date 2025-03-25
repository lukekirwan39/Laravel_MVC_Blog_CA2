<div>
    <form method="POST" wire:submit.prevent="updateBlogSocialMedia()">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" class="form-input" placeholder="Facebook page URL" wire:model="facebook_url">
                    <span class="text-danger">@error('facebook_url'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" class="form-input" placeholder="Instagram URL" wire:model="instagram_url">
                    <span class="text-danger">@error('instagram_url'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">YouTube</label>
                    <input type="text" class="form-input" placeholder="YouTube channel URL" wire:model="youtube_url">
                    <span class="text-danger">@error('youtube_url'){{ $message }}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">LinkedIn</label>
                    <input type="text" class="form-input" placeholder="LinkedIn URL" wire:model="linkedin_url">
                    <span class="text-danger">@error('linkedin_url'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
