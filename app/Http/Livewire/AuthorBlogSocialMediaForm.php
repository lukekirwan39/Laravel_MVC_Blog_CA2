<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BlogSocialMedia;

class AuthorBlogSocialMediaForm extends Component
{
    public $blog_social_media;

    public $facebook_url, $instagram_url, $youtube_url, $linkedin_url;

    public function mount()
    {
        // Try to get the first row (or with id 1 if you prefer)
        $this->blog_social_media = BlogSocialMedia::first(); // or ::find(1);

        // Safely populate the form fields even if there is no record yet
        $this->facebook_url  = optional($this->blog_social_media)->bsm_facebook  ?? '';
        $this->instagram_url = optional($this->blog_social_media)->bsm_instagram ?? '';
        $this->youtube_url   = optional($this->blog_social_media)->bsm_youtube   ?? '';
        $this->linkedin_url  = optional($this->blog_social_media)->bsm_linkedin  ?? '';
        // If you're on PHP 8+, you could also use:
        // $this->facebook_url = $this->blog_social_media?->bsm_facebook ?? '';
    }

    public function updateBlogSocialMedia()
    {
        $this->validate([
            'facebook_url'  => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url'   => 'nullable|url',
            'linkedin_url'  => 'nullable|url',
        ]);

        // If there is already a record, update it; otherwise create a new one
        if ($this->blog_social_media) {
            $this->blog_social_media->update([
                'bsm_facebook'  => $this->facebook_url,
                'bsm_instagram' => $this->instagram_url,
                'bsm_youtube'   => $this->youtube_url,
                'bsm_linkedin'  => $this->linkedin_url,
            ]);
        } else {
            $this->blog_social_media = BlogSocialMedia::create([
                'bsm_facebook'  => $this->facebook_url,
                'bsm_instagram' => $this->instagram_url,
                'bsm_youtube'   => $this->youtube_url,
                'bsm_linkedin'  => $this->linkedin_url,
            ]);
        }

        session()->flash('message', 'Social media links updated successfully');
    }

    public function render()
    {
        return view('livewire.author-blog-social-media-form');
    }
}
