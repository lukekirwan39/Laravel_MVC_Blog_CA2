<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $category_name;
    public $selected_category_id;
    public $updateCategoryMode = false;

    public $subcategory_name;
    public $parent_category;
    public $selected_subcategory_id;
    public $updateSubCategoryMode = false;

    public function addCategory()
    {
        $this->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        $category = new Category();
        $category->category_name = $this->category_name;
        $saved = $category->save();

        if ($saved){
            $this->dispatchBrowserEvent('hideCategoriesModal');
            $this->category_name = null;
        } else{
            session()->flash('error', 'Something went wrong');
        }

        $this->dispatchBrowserEvent('hideCategoriesModal');

    }

    public function addSubCategory()
    {
        $this->validate([
            'parent_category' => 'required',
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name'
        ]);

        $subcategory = new SubCategory();
        $subcategory->subcategory_name = $this->subcategory_name;
        $subcategory->slug = Str::slug($this->subcategory_name);
        $subcategory->parent_category = $this->parent_category;
        $saved = $subcategory->save();

        if ($saved) {
            $this->dispatchBrowserEvent('hideSubCategoriesModal');
            session()->flash('success', 'Sub Category added successfully');
        } else {
            session()->flash('error', 'Something went wrong');
        }
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        $this->selected_category_id = $category->id;
        $this->category_name = $category->category_name;
        $this->updateCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showcategoriesModal');
    }

    public function editSubCategory($id){
        $subcategory = SubCategory::findOrFail($id);
        $this->selected_subcategory_id = $subcategory->id;
        $this->parent_category = $subcategory->parent_category;
        $this->subcategory_name = $subcategory->subcategory_name;
        $this->updateSubCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showSubCategoriesModal');
    }

    public function updateCategory(){
        if ($this->selected_category_id){
            $this->validate([
                'category_name' => 'required|unique:categories,category_name,'.$this->selected_category_id
            ]);

            $category = Category::findOrFail($this->selected_category_id);
            $category->category_name = $this->category_name;
            $updated = $category->save();

            if ($updated){
                $this->dispatchBrowserEvent('hideCategoriesModal');
                $this->updateCategoryMode = false;
                session()->flash('success', 'Category updated successfully');
            }else{
                session()->flash('error', 'Something went wrong');
            }
        }
    }

    public function updateSubCategory(){
        if ($this->selected_subcategory_id){
            $this->validate([
                'parent_category' => 'required',
                'subcategory_name'=>'required|unique:sub_categories,subcategory_name,'.$this->selected_subcategory_id
            ]);
        }

        $subcategory = SubCategory::findOrFail($this->selected_subcategory_id);
        $subcategory->subcategory_name = $this->subcategory_name;
        $subcategory->slug = Str::slug($this->subcategory_name);
        $subcategory->parent_category = $this->parent_category;
        $updated = $subcategory->save();

        if ($updated){
            $this->dispatchBrowserEvent('hideSubCategoriesModal');
            $this->updateSubCategoryMode = false;
            session()->flash('success', 'Sub Category updated successfully');
        }else{
            session()->flash('error', 'Something went wrong');
        }
    }

    public function resetCategoryForm()
    {
        $this->reset(['category_name', 'parent_category', 'selected_category_id', 'updateCategoryMode']);
        $this->resetErrorBag();
    }

    public function resetSubCategoryForm()
    {
        $this->reset(['subcategory_name', 'parent_category', 'selected_subcategory_id', 'updateSubCategoryMode']);
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.categories', [
            'categories'=>Category::orderBy('ordering','asc')->get(),
            'subcategories'=>SubCategory::orderBy('ordering','asc')->get()
        ]);
    }
}
