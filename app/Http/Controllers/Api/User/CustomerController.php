<?php
namespace App\Http\Controllers\Api\User;

use App\Bundle\User\Application\UserDeleteApplicationService;
use App\Bundle\User\Application\UserDeleteCommand;
use App\Bundle\User\Application\UserGetApplicationService;
use App\Bundle\User\Application\UserGetCommand;
use App\Bundle\User\Application\UserListGetApplicationService;
use App\Bundle\User\Application\UserListGetCommand;
use App\Bundle\User\Application\UserPostApplicationService;
use App\Bundle\User\Application\UserPostCommand;
use App\Bundle\User\Application\UserPutApplicationService;
use App\Bundle\User\Application\UserPutCommand;
use App\Bundle\User\Infrastructure\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPutRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller {

	public function createCustomer(Request $request) {
        try {
            $result = Customer::create([
                'name' => 'thinhlam',
                'description' => 'happy'
            ]);
            $data = ['id' => $result->id];

            return response()->json($data, 200);
        } catch (Exception $ex) {
            return response()->json(['data' => $ex->getErrors()], $ex->getCode());
        }
    }
}
