<?php

namespace App\Http\Controllers\API\App;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Plan;
use App\Models\UserSelectedPlan;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Resources\PlanResource;
use App\Http\Resources\UserSelectedPlansResource;

use Carbon\Carbon;

use OpenAI;

class GptController extends BaseController
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = Product::all();
    return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $input = $request->all();
    $validator = Validator::make($input, [
      'prompt' => 'required'
    ]);
    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }

    $yourApiKey = getenv('GPT_TOKEN');
    $client = OpenAI::client($yourApiKey);

    $response = $client->chat()->create([
      'model' => 'gpt-3.5-turbo',
      'messages' => [
        ['role' => 'user', 'content' => $input['prompt']],
      ],
    ]);
    return $this->sendResponse(array_merge(array('prompt' => $input['prompt']), $response->toArray()), "Message received!");
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $product = Product::find($id);

    if (is_null($product)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    $input = $request->all();

    $validator = Validator::make($input, [
      'name' => 'required',
      'detail' => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }

    $product->name = $input['name'];
    $product->detail = $input['detail'];
    $product->save();

    return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    $product->delete();

    return $this->sendResponse([], 'Product deleted successfully.');
  }
}
