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
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function getUsers(Request $request) {
        $userRepository = new UserRepository();
		$applicationService = new UserListGetApplicationService($userRepository);
        $command = new UserListGetCommand();

        try {
            $result = $applicationService->handle($command);
            $userResults = $result->userResult;
            $paginationResult = $result->paginationResult;
            $data = [];
            foreach ($userResults as $userResult) {
                $data[] = [
                    'user_id' => $userResult->userId,
                    'first_name' => $userResult->firstName,
                    'last_name' => $userResult->lastName,
                    'email' => $userResult->email,
                    'status' => $userResult->status,
                ];
            }
            $response = [
                'data' => $data,
                'pagination' => [
                    'total_page' => $paginationResult->totalPage,
                    'per_page' => $paginationResult->perPage,
                    'current_page' => $paginationResult->currentPage,
                ],
            ];

            return response()->json($response, 200);
        } catch (Exception $ex) {
            dd($ex);
            return response()->json(['data' => $ex->getErrors()], $ex->getCode());
        }
    }

    public function createUser(Request $request) {
        $userRepository = new UserRepository();
        $applicationService = new UserPostApplicationService($userRepository);
        $command = new UserPostCommand(
            $request->input('first_name'),
            $request->input('last_name'),
            $request->input('email'),
            $request->input('status'),
        );

        try {
            $result = $applicationService->handle($command);

            return response()->json(['user_id' => $result->userId], 200);
        } catch (Exception $ex) {
            return response()->json(['data' => $ex->getErrors()], $ex->getCode());
        }
    }

    public function getUser(string $id) {
        $userRepository = new UserRepository();
        $applicationService = new UserGetApplicationService($userRepository);
        $command = new UserGetCommand($id);

        try {
            $user = $applicationService->handle($command);
            $data = [
                'user_id' => $user->userId,
                'status' => $user->status,
                'email' => $user->email,
                'first_name' => $user->firstName,
                'last_name' => $user->lastName,
            ];

            return response()->json($data, 200);
        } catch (Exception $ex) {
            return response()->json(['data' => $ex->getErrors()], $ex->getCode());
        }
    }

    public function updateUser(Request $request, string $id) {
        $userRepository = new UserRepository();
        $applicationService = new UserPutApplicationService($userRepository);

        $command = new UserPutCommand(
            $id,
            $request->input('first_name'),
            $request->input('last_name'),
            $request->input('email'),
            $request->input('status'),
        );

        try {
            $result = $applicationService->handle($command);

            return response()->json(['user_id' => $result->userId], 200);
        } catch (Exception $ex) {
            return response()->json(['data' => $ex->getErrors()], $ex->getCode());
        }
    }

    public function deleteUser(string $id) {
        $userRepository = new UserRepository();
        $applicationService = new UserDeleteApplicationService($userRepository);
        $command = new UserDeleteCommand($id);

        try {
            $result = $applicationService->handle($command);

            return response()->json(['data' => []], 200);
        } catch (Exception $ex) {
            return response()->json(['data' => $ex->getErrors()], $ex->getCode());
        }
    }
}
