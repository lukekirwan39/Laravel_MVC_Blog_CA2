<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use App\Models\Post;

class Categories extends Component
{
    public $category_name;
    public $selected_category_id;
    public $updateCategoryMode = false;

    public $subcategory_name;
    public $parent_category = 0;
    public $selected_subcategory_id;
    public $updateSubCategoryMode = false;

    protected $listeners = [
        'deleteCategoryAction',
        'deleteSubCategoryAction',
        'updateCategoryOrdering',
        'updatedSubCategoryOrdering',
    ];

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

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $this->dispatchBrowserEvent('deleteCategory',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <b>'.$category->category_name.'</b> category',
            'id'=>$id
        ]);

    }

    public function deleteSubCategory($id){
        $subcategory = SubCategory::findOrFail($id);
        $this->dispatchBrowserEvent('deleteSubCategory',[
            'title'=>'Are you sure?',
            'html'=>'You want to delete <b>'.$subcategory->subcategory_name.'</b> sub category',
            'id'=>$id
        ]);
    }

    public function deleteCategoryAction($id){

        $category = Category::where('id', $id)->first();
        $subcategories = SubCategory::where('parent_category', $category->id)->whereHas('posts')->with('posts')->get();

        if (!empty($subcategories && count($subcategories)>0)){
            $totalPosts = 0;
            foreach ($subcategories as $subcat){
                $totalPosts += Post::where('category_id', $subcat->id)->get()->count();
            }

        }else{
            SubCategory::where('parent_category', $category->id)->delete();
            $category->delete();
        }

    }

    public function deleteSubCategoryAction($id){
        $subcategory = SubCategory::where('id',$id)->first();
        $posts = Post::where('category_id', $subcategory->id)->get()->toArray();

        if (!empty($posts) && count($posts)>0){
            session()->flash('error', 'You cannot delete this subcategory because it has posts.');
        }else{
            $subcategory->delete();
        }
    }

    public function updateCategoryOrdering($positions){
        foreach ($positions as $position){
            $index = $position[0];
            $newPosition = $position[1];
            Category::where('id', $index)->update([
                'ordering'=>$newPosition
            ]);

        }
    }

    public function updatedSubCategoryOrdering($positions){
        foreach ($positions as $position){
            $index = $position[0];
            $newPosition = $position[1];
            SubCategory::where('id', $index)->update([
                'ordering'=>$newPosition
            ]);

        }
    }

    public function render()
    {
        return view('livewire.categories', [
            'categories'=>Category::orderBy('ordering','asc')->get(),
            'subcategories'=>SubCategory::orderBy('ordering','asc')->get()
        ]);
    }
}
