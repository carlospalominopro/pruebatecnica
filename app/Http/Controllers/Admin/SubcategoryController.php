<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Repositories\SubcategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SubcategoryController extends AppBaseController
{
    /** @var  SubcategoryRepository */
    private $subcategoryRepository;

    public function __construct(SubcategoryRepository $subcategoryRepo)
    {
        $this->subcategoryRepository = $subcategoryRepo;
    }

    /**
     * Display a listing of the Subcategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subcategories = \App\Subcategory::get();

        $categories = \App\Category::pluck('name','id');


        return view('subcategories.index')
            ->with(['subcategories'=> $subcategories, 'categories'=> $categories ]);
    }

    /**
     * Show the form for creating a new Subcategory.
     *
     * @return Response
     */
    public function create()
    {

        $categories = \App\Category::where('status',1)->pluck('name','id');

        return view('subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created Subcategory in storage.
     *
     * @param CreateSubcategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateSubcategoryRequest $request)
    {
        $input = $request->all();

        $subcategory = $this->subcategoryRepository->create($input);

        Flash::success('Subcategory saved successfully.');

        return redirect(route('admin.subcategories.index'));
    }

    /**
     * Display the specified Subcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subcategory = $this->subcategoryRepository->find($id);

        $categories = \App\Category::pluck('name','id');


        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('admin.subcategories.index'));
        }

        return view('subcategories.show',compact('subcategory','categories'));
    }

    /**
     * Show the form for editing the specified Subcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subcategory = $this->subcategoryRepository->find($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('admin.subcategories.index'));
        }

        $categories = \App\Category::where('status',1)->pluck('name','id');

        return view('subcategories.edit')->with(['subcategory'=> $subcategory,'categories'=> $categories]);
    }

    /**
     * Update the specified Subcategory in storage.
     *
     * @param int $id
     * @param UpdateSubcategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubcategoryRequest $request)
    {
        $subcategory = $this->subcategoryRepository->find($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('admin.subcategories.index'));
        }

        $subcategory = $this->subcategoryRepository->update($request->all(), $id);

        if ($subcategory->status == 0) {
            
            $prods = \App\Product::where('subcategory_id',$subcategory->id)->update(['status'=>0]);
        }

        Flash::success('Subcategory updated successfully.');

        return redirect(route('admin.subcategories.index'));
    }

    /**
     * Remove the specified Subcategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subcategory = $this->subcategoryRepository->find($id);

        if (empty($subcategory)) {
            Flash::error('Subcategory not found');

            return redirect(route('admin.subcategories.index'));
        }

        $prod = \App\Product::where('subcategory_id',$id)->get();

        if(count($prod)>0){

            Flash::error('Existen Productos asociados');

            return redirect(route('admin.subcategories.index'));
        }

        $this->subcategoryRepository->delete($id);

        Flash::success('Subcategory deleted successfully.');

        return redirect(route('admin.subcategories.index'));
    }
}
