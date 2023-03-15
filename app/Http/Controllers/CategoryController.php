<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use COM;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        $categories = Category::orderBy('id', 'DESC')->get();
        $param = [
            'categories' => $categories,
        ];
        return view('admin.categories.index', $param);
    }
    public function create()
    {
        $this->authorize('create', Category::class);

        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)

    {
        $this->authorize('create', Category::class);
        $categories = new Category();
        $categories->name = $request->name;
       
        if ($request->hasFile('image')) {
            $get_image = $request->file('image');
            $path = 'public/assets/category/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $categories->image = $new_image;
            $data['product_image'] = $new_image;
        }
        $categories->save();
        alert()->success('Thêm', 'thành công');

        return redirect()->route('categories.index');
    }


    public function show( $id)
    {
        $this->authorize('view', Category::class);
        $item = Category::find($id);
        $this->authorize('view', $item);
    }


    public function edit( $id)
    {
        $this->authorize('update', Category::class);
        $categories = Category::find($id);
        // $this->authorize('update', $item);   
        return view('admin.categories.edit', compact('categories'));
    }


    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->authorize('update', Category::class);
        
        $categories = Category::find($id);
        $categories->name = $request->name;
        $get_image = $request->image;
        if ($get_image) {
            $path = 'public/assets/category/' . $categories->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/assets/category/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $categories->image = $new_image;
            // dd($product)
            $data['product_image'] = $new_image;
        }
        $categories->save();
        alert()->success('sửa', 'thành công');

        return redirect()->route('categories.index');
    }
    public function destroy( $id)
    {
        $this->authorize('delete', Category::class);
        $product = Category::withTrashed()->where('id', $id)->forceDelete();
        alert()->success('Sản phẩm đã được đưa vào thùng rác!');
        return redirect()->route('categories.index');
    }
    public function trash()
    {
        $this->authorize('viewtrash', Category::class);
        $softs = Category::onlyTrashed()->get();

        return view('admin.categories.trash', compact('softs'));
    }
    public function restore($id)
    {
        $this->authorize('restore', Category::class);
        try {
            $softs = Category::withTrashed()->find($id);
            $softs->restore();
            alert()->success('Khôi phục sản phẩm thành công!');
            return redirect()->route('categories.trash');
        } catch (\exception $e) {
            Log::error($e->getMessage());
            toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
            return redirect()->route('categories.trash');
      }
    }
    //xóa vĩnh viễn
   public function force_delete(string $id)
    {
        $this->authorize('forceDelete', Category::class);
        try {
              //1: tìm ra nhũng product có cate_id = $id
                $products = Product::where('category_id', $id)->get();
                //2: chuyển những product có cate_it đó về 1 cate _id khác
                foreach ($products as $product) {
                        $product->category_id = 1;
                        $product->save();
                        //xoá

                        $soft = Category::withTrashed()->where('id', $id)->forceDelete();

                        alert()->success('Xóa Vĩnh Viễn Thành Công!');
                        return redirect()->route('categories.trash');
                }
        } catch (\exception $e) {
                Log::error($e->getMessage());
                toast('Có Lỗi Xảy Ra!', 'error', 'top-right');
                return redirect()->route('categories.trash');
        }
     }

}